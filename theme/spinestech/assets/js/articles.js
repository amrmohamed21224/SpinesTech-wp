/**
 * SpinesTech Articles — shared animation script
 * Used by: page-articles.php (hero shader) and single.php (reading progress)
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
        window.addEventListener('mousemove', function (e) {
            var rect = canvas.getBoundingClientRect();
            mouseX = e.clientX - rect.left;
            mouseY = rect.height - (e.clientY - rect.top);
        });

        function render(t) {
            canvas.width = canvas.clientWidth;
            canvas.height = canvas.clientHeight;
            gl.viewport(0, 0, canvas.width, canvas.height);
            gl.uniform1f(timeLoc, t * 0.001);
            gl.uniform2f(resLoc, canvas.width, canvas.height);
            gl.uniform2f(mouseLoc, mouseX, mouseY);
            gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
            requestAnimationFrame(render);
        }
        requestAnimationFrame(render);
    }

    /* ─────────────────────────────
       2. SCROLL REVEAL
    ───────────────────────────── */
    function initReveal() {
        var els = document.querySelectorAll('.reveal');
        if (!els.length) return;
        if (!('IntersectionObserver' in window)) {
            els.forEach(function (el) { el.classList.add('reveal--visible'); });
            return;
        }
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal--visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
        els.forEach(function (el) { observer.observe(el); });
    }

    /* ─────────────────────────────
       3. READING PROGRESS BAR (single article)
    ───────────────────────────── */
    function initReadingProgress() {
        var bar = document.getElementById('art-progress-bar');
        if (!bar) return;
        window.addEventListener('scroll', function () {
            var scrollTop = window.scrollY || document.documentElement.scrollTop;
            var docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            bar.style.width = pct + '%';
        }, { passive: true });
    }

    /* ─────────────────────────────
       INIT
    ───────────────────────────── */
    document.addEventListener('DOMContentLoaded', function () {
        initShader('art-shader-canvas');
        initReveal();
        initReadingProgress();
    });
})();