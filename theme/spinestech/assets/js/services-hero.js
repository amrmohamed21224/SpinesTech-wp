/**
 * services-hero.js
 * SpinesTech — Services page hero animation.
 * Loaded only on the services archive page.
 * Depends on Three.js (r128) being loaded first as a script dependency.
 */
(function () {
    'use strict';

    var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ──────────────────────────────────────────────────────────────
       1. WebGL shader background (used for hero canvas + CTA canvas)
       ────────────────────────────────────────────────────────────── */

    var VERTEX_SRC =
        'attribute vec2 position;' +
        'varying vec2 v_texCoord;' +
        'void main() {' +
        '  v_texCoord = position * 0.5 + 0.5;' +
        '  gl_Position = vec4(position, 0.0, 1.0);' +
        '}';

    var FRAGMENT_SRC =
        'precision highp float;' +
        'uniform float u_time;' +
        'uniform vec2 u_resolution;' +
        'uniform vec2 u_mouse;' +
        'varying vec2 v_texCoord;' +
        'float random(vec2 st) {' +
        '  return fract(sin(dot(st.xy, vec2(12.9898, 78.233))) * 43758.5453123);' +
        '}' +
        'float noise(vec2 st) {' +
        '  vec2 i = floor(st);' +
        '  vec2 f = fract(st);' +
        '  float a = random(i);' +
        '  float b = random(i + vec2(1.0, 0.0));' +
        '  float c = random(i + vec2(0.0, 1.0));' +
        '  float d = random(i + vec2(1.0, 1.0));' +
        '  vec2 u = f * f * (3.0 - 2.0 * f);' +
        '  return mix(a, b, u.x) + (c - a) * u.y * (1.0 - u.x) + (d - b) * u.x * u.y;' +
        '}' +
        'void main() {' +
        '  vec2 uv = v_texCoord;' +
        '  vec2 m = u_mouse / u_resolution;' +
        '  vec3 navy = vec3(0.027, 0.102, 0.173);' +
        '  vec3 green = vec3(0.0, 0.424, 0.208);' +
        '  vec3 blue = vec3(0.0, 0.518, 1.0);' +
        '  float t1 = noise(uv * 2.0 + u_time * 0.05);' +
        '  vec3 finalColor = mix(navy, navy * 1.5, uv.y + t1 * 0.1);' +
        '  float line = sin(uv.y * 40.0 + u_time * 1.0 + t1 * 8.0) * 0.5 + 0.5;' +
        '  line *= pow(1.0 - abs(uv.x - 0.5), 10.0);' +
        '  finalColor += blue * line * 0.1;' +
        '  float p = step(0.99, random(uv + fract(u_time * 0.0005)));' +
        '  finalColor += green * p * (0.4 + 0.6 * sin(u_time + uv.x * 20.0));' +
        '  float dist = distance(uv, vec2(m.x, 1.0 - m.y));' +
        '  float glow = smoothstep(0.5, 0.0, dist) * 0.15;' +
        '  finalColor += blue * glow;' +
        '  vec2 grid = fract(uv * vec2(50.0, 50.0 * (u_resolution.y / u_resolution.x)));' +
        '  float gridLine = (smoothstep(0.0, 0.015, grid.x) * smoothstep(1.0, 0.985, grid.x) *' +
        '                   smoothstep(0.0, 0.015, grid.y) * smoothstep(1.0, 0.985, grid.y));' +
        '  finalColor += (1.0 - gridLine) * 0.02;' +
        '  float vignette = 1.0 - smoothstep(0.4, 1.6, length(uv - 0.5));' +
        '  finalColor *= (0.8 + 0.2 * vignette);' +
        '  gl_FragColor = vec4(finalColor, 1.0);' +
        '}';

    function createShader(gl, type, source) {
        var shader = gl.createShader(type);
        gl.shaderSource(shader, source);
        gl.compileShader(shader);
        return shader;
    }

    function initShader(canvasId) {
        var canvas = document.getElementById(canvasId);
        if (!canvas) return;

        var gl = canvas.getContext('webgl');
        if (!gl) return;

        var program = gl.createProgram();
        gl.attachShader(program, createShader(gl, gl.VERTEX_SHADER, VERTEX_SRC));
        gl.attachShader(program, createShader(gl, gl.FRAGMENT_SHADER, FRAGMENT_SRC));
        gl.linkProgram(program);
        gl.useProgram(program);

        var positionBuffer = gl.createBuffer();
        gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);
        gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, -1, 1, 1, 1]), gl.STATIC_DRAW);

        var positionLocation = gl.getAttribLocation(program, 'position');
        gl.enableVertexAttribArray(positionLocation);
        gl.vertexAttribPointer(positionLocation, 2, gl.FLOAT, false, 0, 0);

        var timeLoc = gl.getUniformLocation(program, 'u_time');
        var resLoc  = gl.getUniformLocation(program, 'u_resolution');
        var mouseLoc = gl.getUniformLocation(program, 'u_mouse');

        var mouseX = 0, mouseY = 0;
        window.addEventListener('mousemove', function (e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        var rafId;
        function render(time) {
            canvas.width = canvas.clientWidth;
            canvas.height = canvas.clientHeight;
            gl.viewport(0, 0, canvas.width, canvas.height);
            gl.uniform1f(timeLoc, time * 0.001);
            gl.uniform2f(resLoc, canvas.width, canvas.height);
            gl.uniform2f(mouseLoc, mouseX, mouseY);
            gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
            rafId = requestAnimationFrame(render);
        }

        if (prefersReducedMotion) {
            render(0);
        } else {
            rafId = requestAnimationFrame(render);
        }
    }

    /* ──────────────────────────────────────────────────────────────
       2. Three.js glowing spine + particle nodes
       ────────────────────────────────────────────────────────────── */

    function initSpine3D() {
        var container = document.getElementById('sv-hero-3d');
        if (!container || typeof THREE === 'undefined') return;
        if (prefersReducedMotion) return;

        var scene = new THREE.Scene();
        var camera = new THREE.PerspectiveCamera(
            75,
            container.clientWidth / container.clientHeight,
            0.1,
            1000
        );
        var renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        container.appendChild(renderer.domElement);

        var BLUE = 0x0084ff;
        var GREEN = 0x006c35;

        scene.add(new THREE.AmbientLight(0xffffff, 0.6));
        var pointLight = new THREE.PointLight(BLUE, 2);
        pointLight.position.set(10, 10, 10);
        scene.add(pointLight);

        var group = new THREE.Group();
        scene.add(group);

        var curvePoints = [];
        for (var i = 0; i < 40; i++) {
            curvePoints.push(
                new THREE.Vector3(
                    Math.sin(i * 0.4) * 2.5,
                    (i - 20) * 0.9,
                    Math.cos(i * 0.4) * 2.5
                )
            );
        }
        var curve = new THREE.CatmullRomCurve3(curvePoints);
        var tubeGeo = new THREE.TubeGeometry(curve, 100, 0.1, 12, false);
        var tubeMat = new THREE.MeshPhongMaterial({
            color: GREEN,
            emissive: BLUE,
            emissiveIntensity: 0.5,
            transparent: true,
            opacity: 0.8,
            shininess: 120
        });
        var spine = new THREE.Mesh(tubeGeo, tubeMat);
        group.add(spine);

        for (var r = 0; r < 12; r++) {
            var ringGeo = new THREE.TorusGeometry(4 + Math.random() * 3, 0.03, 16, 100);
            var ringMat = new THREE.MeshBasicMaterial({ color: BLUE, transparent: true, opacity: 0.2 });
            var ring = new THREE.Mesh(ringGeo, ringMat);
            ring.rotation.x = Math.random() * Math.PI;
            ring.rotation.y = Math.random() * Math.PI;
            group.add(ring);
        }

        var nodeGeo = new THREE.SphereGeometry(0.15, 16, 16);
        var nodeMat = new THREE.MeshPhongMaterial({ color: BLUE, emissive: BLUE, emissiveIntensity: 1.5 });
        var nodes = [];
        for (var n = 0; n < 60; n++) {
            var node = new THREE.Mesh(nodeGeo, nodeMat);
            var t = Math.random();
            var p = curve.getPoint(t);
            node.position.copy(p);
            node.position.x += (Math.random() - 0.5) * 8;
            node.position.z += (Math.random() - 0.5) * 8;
            node.userData = { t: t, offset: Math.random() * 10 };
            group.add(node);
            nodes.push(node);
        }

        camera.position.z = 20;

        var mouseX = 0, mouseY = 0;
        window.addEventListener('mousemove', function (e) {
            mouseX = e.clientX / window.innerWidth - 0.5;
            mouseY = e.clientY / window.innerHeight - 0.5;
        });

        function animate() {
            requestAnimationFrame(animate);
            var time = Date.now() * 0.001;
            group.rotation.y += 0.002;
            group.rotation.x = mouseY * 0.2;
            group.rotation.z = mouseX * 0.2;
            spine.material.emissiveIntensity = 0.5 + Math.sin(time * 2.5) * 0.2;
            nodes.forEach(function (node) {
                node.position.y += Math.sin(time + node.userData.offset) * 0.008;
                node.scale.setScalar(1 + Math.sin(time * 4 + node.userData.offset) * 0.3);
            });
            renderer.render(scene, camera);
        }

        window.addEventListener('resize', function () {
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        });

        animate();
    }

    /* ──────────────────────────────────────────────────────────────
       3. Scroll-reveal (IntersectionObserver)
       ────────────────────────────────────────────────────────────── */

    function initScrollReveal() {
        var items = document.querySelectorAll('.sv-reveal');
        if (!items.length) return;

        if (prefersReducedMotion || !('IntersectionObserver' in window)) {
            items.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }

        var observer = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.15, rootMargin: '0px 0px -60px 0px' }
        );

        items.forEach(function (el) { observer.observe(el); });
    }

    /* ──────────────────────────────────────────────────────────────
       Init on DOM ready
       ────────────────────────────────────────────────────────────── */

    function init() {
        // Mark JS as ready so CSS scroll-reveal animations activate
        document.documentElement.classList.add('sv-js-ready');

        initShader('sv-hero-canvas');
        initShader('sv-cta-canvas');
        initScrollReveal();

        // Three.js may still be loading from CDN — poll for up to 3s
        if (typeof THREE !== 'undefined') {
            initSpine3D();
        } else {
            var attempts = 0;
            var maxAttempts = 30; // 30 × 100ms = 3 seconds
            var threeCheck = setInterval(function () {
                attempts++;
                if (typeof THREE !== 'undefined') {
                    clearInterval(threeCheck);
                    initSpine3D();
                } else if (attempts >= maxAttempts) {
                    clearInterval(threeCheck);
                    // Three.js failed to load — silently skip 3D, page remains functional
                    console.warn('SpinesTech: Three.js CDN did not load within 3s, skipping 3D hero.');
                }
            }, 100);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();