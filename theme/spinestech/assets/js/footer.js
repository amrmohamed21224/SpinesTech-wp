/**
 * Footer — scroll & interaction animations
 * theme/spinestech/assets/js/footer.js
 *
 * 1) Parallax drift on the giant background watermark as the footer
 *    scrolls through the viewport (subtle, capped, GPU-friendly).
 * 2) Reveal-on-scroll for the brand widget, nav columns, and bottom bar.
 * 3) Subtle mouse-tilt on the brand widget card (desktop pointer only).
 *
 * Runs globally (the footer appears on every page). Everything here
 * is purely progressive enhancement — the footer is fully visible and
 * usable with JS disabled, since the reveal/tilt effects only kick in
 * after this script runs and detects the right conditions.
 */
(function () {
    'use strict';

    var footer = document.querySelector('.footer');
    if (!footer) return;

    var prefersReducedMotion = window.matchMedia &&
        window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ── 1) Watermark parallax ─────────────────────────────── */
    var watermark = footer.querySelector('[data-footer-watermark]');

    if (watermark && !prefersReducedMotion) {
        var ticking = false;
        var MAX_OFFSET = 26; // px, keeps the drift subtle and premium-feeling

        function updateParallax() {
            var rect = footer.getBoundingClientRect();
            var viewportH = window.innerHeight || document.documentElement.clientHeight;

            // Progress: 0 when footer top just enters viewport bottom,
            // 1 when footer top reaches viewport top.
            var progress = 1 - (rect.top / viewportH);
            progress = Math.max(0, Math.min(1, progress));

            var offset = (progress - 0.5) * 2 * MAX_OFFSET;
            watermark.style.setProperty('--wm-offset', offset.toFixed(1) + 'px');
            ticking = false;
        }

        function onScroll() {
            if (!ticking) {
                window.requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
        updateParallax();
    }

    /* ── 2) Reveal-on-scroll ───────────────────────────────── */
    if ('IntersectionObserver' in window) {
        footer.classList.add('js-ready');

        var targets = footer.querySelectorAll('[data-footer-reveal]');

        if (targets.length) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var el = entry.target;
                        var delay = el.getAttribute('data-footer-reveal-delay');
                        if (delay) {
                            el.style.transitionDelay = delay + 'ms';
                        }
                        el.classList.add('is-visible');
                        observer.unobserve(el);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -30px 0px'
            });

            targets.forEach(function (el) {
                observer.observe(el);
            });
        }
    }

    /* ── 3) Subtle mouse-tilt on the brand widget ──────────── */
    var widget = footer.querySelector('.footer__widget');
    var hasFinePointer = window.matchMedia && window.matchMedia('(pointer: fine)').matches;

    if (widget && hasFinePointer && !prefersReducedMotion) {
        var MAX_TILT = 5; // degrees — kept small and tasteful, not gimmicky

        // The widget also has a CSS keyframe float animation on `transform`.
        // Pause it while the pointer is over the card so the JS-driven tilt
        // (also on `transform`) doesn't fight the animation every frame.
        widget.addEventListener('mouseenter', function () {
            widget.style.animationPlayState = 'paused';
        });

        widget.addEventListener('mousemove', function (e) {
            var rect = widget.getBoundingClientRect();
            var x = (e.clientX - rect.left) / rect.width;  // 0 → 1
            var y = (e.clientY - rect.top) / rect.height;   // 0 → 1

            var rotateY = (x - 0.5) * 2 * MAX_TILT;
            var rotateX = (0.5 - y) * 2 * MAX_TILT;

            widget.style.transform =
                'perspective(800px) rotateX(' + rotateX.toFixed(2) + 'deg) ' +
                'rotateY(' + rotateY.toFixed(2) + 'deg) translateY(-2px)';
        });

        widget.addEventListener('mouseleave', function () {
            widget.style.transform = '';
            widget.style.animationPlayState = 'running';
        });
    }
})();