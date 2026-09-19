/**
 * SpinesTech Articles — shared animation script
 * Used by: page-articles.php (hero shader) and single.php (reading progress)
 *
 * FIXES in this version:
 * - Canvas backing-store size (canvas.width/height) was being reassigned on
 *   EVERY animation frame regardless of whether it changed. Setting
 *   canvas.width/height forces the browser to reset and fully clear the
 *   WebGL drawing buffer, which is an expensive layout/paint operation.
 *   Doing this 60 times per second was the direct cause of the scroll
 *   jank/freeze reported — the browser was fighting between "compose
 *   scroll" and "reset+repaint canvas" on every single frame, even while
 *   the hero was scrolled far out of view.
 * - The shader's requestAnimationFrame loop now pauses automatically once
 *   the hero section scrolls out of the viewport (IntersectionObserver),
 *   and resumes only when it's visible again. This removes ~all animation
 *   cost while reading the rest of the article.
 */
(function () {
    'use strict';

    /* ─────────────────────────────
       1. WEBGL SHADER (Articles hero)
    ───────────────────────────── */
    var vertexShaderSource =
        'attribute vec2 a_position;' +
        'varying vec2 v_texCoord;' +
        'void main() {' +
        '    v_texCoord = a_position * 0.5 + 0.5;' +
        '    gl_Position = vec4(a_position, 0.0, 1.0);' +
        '}';

    var fragmentShaderSource =
        'precision highp float;' +
        'uniform float u_time;' +
        'uniform vec2 u_resolution;' +
        'uniform vec2 u_mouse;' +
        'varying vec2 v_texCoord;' +
        'float random(vec2 st) {' +
        '    return fract(sin(dot(st.xy, vec2(12.9898, 78.233))) * 43758.5453123);' +
        '}' +
        'float noise(vec2 st) {' +
        '    vec2 i = floor(st);' +
        '    vec2 f = fract(st);' +
        '    float a = random(i);' +
        '    float b = random(i + vec2(1.0, 0.0));' +
        '    float c = random(i + vec2(0.0, 1.0));' +
        '    float d = random(i + vec2(1.0, 1.0));' +
        '    vec2 u = f * f * (3.0 - 2.0 * f);' +
        '    return mix(a, b, u.x) + (c - a) * u.y * (1.0 - u.x) + (d - b) * u.x * u.y;' +
        '}' +
        'void main() {' +
        '    vec2 uv = v_texCoord;' +
        '    vec2 m = u_mouse / u_resolution;' +
        '    vec3 navy = vec3(0.027, 0.102, 0.173);' +
        '    vec3 green = vec3(0.0, 0.424, 0.208);' +
        '    vec3 blue = vec3(0.0, 0.518, 1.0);' +
        '    float t1 = noise(uv * 2.5 + u_time * 0.05);' +
        '    float t2 = noise(uv * 3.5 - u_time * 0.03);' +
        '    vec3 baseColor = mix(navy, navy * 1.3, uv.y + t1 * 0.1);' +
        '    vec3 accentColor = mix(green, blue, t2);' +
        '    vec2 gridUv = uv * 30.0;' +
        '    float grid = (smoothstep(0.98, 1.0, fract(gridUv.x)) + smoothstep(0.98, 1.0, fract(gridUv.y)));' +
        '    vec3 finalColor = mix(baseColor, accentColor, t1 * 0.1);' +
        '    finalColor += accentColor * grid * 0.03 * (0.5 + 0.5 * sin(u_time * 0.5));' +
        '    float dist = distance(uv, m);' +
        '    float glow = smoothstep(0.3, 0.0, dist) * 0.15;' +
        '    finalColor += blue * glow;' +
        '    float vignette = 1.0 - smoothstep(0.5, 1.5, length(uv - 0.5));' +
        '    finalColor *= (0.8 + 0.2 * vignette);' +
        '    gl_FragColor = vec4(finalColor, 1.0);' +
        '}';

    function initShader(canvasId) {
        var canvas = document.getElementById(canvasId);
        if (!canvas) return;
        var gl = canvas.getContext('webgl');
        if (!gl) return;

        function createShader(type, source) {
            var shader = gl.createShader(type);
            gl.shaderSource(shader, source);
            gl.compileShader(shader);
            return shader;
        }

        var program = gl.createProgram();
        gl.attachShader(program, createShader(gl.VERTEX_SHADER, vertexShaderSource));
        gl.attachShader(program, createShader(gl.FRAGMENT_SHADER, fragmentShaderSource));
        gl.linkProgram(program);
        gl.useProgram(program);

        var buffer = gl.createBuffer();
        gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
        gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, -1, 1, 1, 1]), gl.STATIC_DRAW);

        var posLoc = gl.getAttribLocation(program, 'a_position');
        gl.enableVertexAttribArray(posLoc);
        gl.vertexAttribPointer(posLoc, 2, gl.FLOAT, false, 0, 0);

        var timeLoc = gl.getUniformLocation(program, 'u_time');
        var resLoc  = gl.getUniformLocation(program, 'u_resolution');
        var mouseLoc = gl.getUniformLocation(program, 'u_mouse');

        var mouseX = 0, mouseY = 0;
        canvas.addEventListener('mousemove', function (e) {
            var rect = canvas.getBoundingClientRect();
            mouseX = e.clientX - rect.left;
            mouseY = rect.height - (e.clientY - rect.top);
        });

        // FIX: only touch canvas.width/height when the CSS size actually
        // changed (e.g. on real resize), instead of every single frame.
        function syncSize() {
            var w = canvas.clientWidth || 1;
            var h = canvas.clientHeight || 1;
            if (canvas.width !== w || canvas.height !== h) {
                canvas.width = w;
                canvas.height = h;
            }
        }

        if (typeof ResizeObserver !== 'undefined') {
            new ResizeObserver(syncSize).observe(canvas);
        } else {
            window.addEventListener('resize', syncSize, { passive: true });
        }
        syncSize();

        // FIX: pause the animation loop entirely while the hero is scrolled
        // out of view, instead of running requestAnimationFrame forever on
        // every page (including the whole time the reader is scrolling
        // through the article body far below the hero).
        var isRunning = false;
        var rafId = null;

        function render(t) {
            gl.viewport(0, 0, canvas.width, canvas.height);
            gl.uniform1f(timeLoc, t * 0.001);
            gl.uniform2f(resLoc, canvas.width, canvas.height);
            gl.uniform2f(mouseLoc, mouseX, mouseY);
            gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
            if (isRunning) {
                rafId = requestAnimationFrame(render);
            }
        }

        function start() {
            if (isRunning) return;
            isRunning = true;
            rafId = requestAnimationFrame(render);
        }

        function stop() {
            isRunning = false;
            if (rafId) {
                cancelAnimationFrame(rafId);
                rafId = null;
            }
        }

        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        start();
                    } else {
                        stop();
                    }
                });
            }, { threshold: 0.01 });
            io.observe(canvas);
        } else {
            // No IntersectionObserver support: just run continuously (old behavior)
            start();
        }
    }

    /* ─────────────────────────────
       2. SCROLL REVEAL
    ───────────────────────────── */
    function initReveal() {
        var singleRoot = document.querySelector('.single-art');
        var artRoot = document.querySelector('.art-page');
        var roots = singleRoot ? [singleRoot] : artRoot ? [artRoot] : [];
        if (!roots.length) return;

        function markVisible(el) {
            el.classList.add('reveal--visible');
        }

        function revealAll(root) {
            root.querySelectorAll('.reveal').forEach(markVisible);
        }

        function revealInView(root) {
            root.querySelectorAll('.reveal').forEach(function (el) {
                var rect = el.getBoundingClientRect();
                if (rect.bottom > 0 && rect.top < window.innerHeight) {
                    markVisible(el);
                }
            });
        }

        document.documentElement.classList.add('art-js-ready');

        /* Reading view: never hide the article behind scroll-reveal. */
        if (singleRoot) {
            revealAll(singleRoot);
            return;
        }

        var els = artRoot.querySelectorAll('.reveal');
        if (!els.length) return;

        if (!('IntersectionObserver' in window)) {
            els.forEach(markVisible);
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    markVisible(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0, rootMargin: '50px 0px 150px 0px' });

        els.forEach(function (el) {
            observer.observe(el);
        });
        revealInView(artRoot);
    }

    /* ─────────────────────────────
       3. READING PROGRESS BAR (single article)
    ───────────────────────────── */
    function initReadingProgress() {
        var bar = document.getElementById('art-progress-bar');
        if (!bar) return;
        var ticking = false;
        function update() {
            var scrollTop = window.scrollY || document.documentElement.scrollTop;
            var docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            bar.style.width = pct + '%';
            ticking = false;
        }
        window.addEventListener('scroll', function () {
            if (!ticking) {
                requestAnimationFrame(update);
                ticking = true;
            }
        }, { passive: true });
    }

    /* ─────────────────────────────
       4. SHARE BUTTONS
    ───────────────────────────── */
    function initShareButtons() {

        var toast      = document.getElementById('sa-copy-toast');
        var toastTimer = null;

        /* ── Toast helper ── */
        function showToast() {
            if (!toast) return;
            clearTimeout(toastTimer);
            toast.classList.add('is-visible');
            toastTimer = setTimeout(function () {
                toast.classList.remove('is-visible');
            }, 2500);
        }

        /* ── Copy feedback helper ── */
        var copyIcon = document.getElementById('sa-copy-icon');
        function onCopied() {
            if (copyIcon) { copyIcon.textContent = 'check'; }
            showToast();
            setTimeout(function () {
                if (copyIcon) { copyIcon.textContent = 'content_copy'; }
            }, 2500);
        }

        /* ── Button 1: Native Web Share ── */
        var nativeBtn = document.getElementById('sa-share-native');
        if (nativeBtn) {
            if (!navigator.share) {
                nativeBtn.style.display = 'none';
            } else {
                nativeBtn.addEventListener('click', function () {
                    navigator.share({
                        title: nativeBtn.getAttribute('data-share-title') || document.title,
                        url:   nativeBtn.getAttribute('data-share-url')   || location.href
                    })['catch'](function () { /* user cancelled */ });
                });
            }
        }

        /* ── Button 2: Copy link ── */
        var copyBtn = document.getElementById('sa-share-copy');
        if (copyBtn) {
            copyBtn.addEventListener('click', function () {
                var url = copyBtn.getAttribute('data-copy-url') || location.href;
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(url).then(onCopied)['catch'](onCopied);
                } else {
                    /* Legacy fallback — create off-screen textarea */
                    var ta = document.createElement('textarea');
                    ta.value = url;
                    ta.setAttribute('readonly', '');
                    ta.style.cssText = 'position:fixed;top:-9999px;left:-9999px;opacity:0';
                    document.body.appendChild(ta);
                    ta.focus();
                    ta.select();
                    try { document.execCommand('copy'); } catch (e) { /* silent */ }
                    document.body.removeChild(ta);
                    onCopied();
                }
            });
        }
    }

    /* ─────────────────────────────
       INIT
    ───────────────────────────── */
    function bootArticlesPage() {
        initShader('art-shader-canvas');
        initReveal();
        initReadingProgress();
        initShareButtons();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootArticlesPage);
    } else {
        bootArticlesPage();
    }
})();

