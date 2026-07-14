/**
 * Footer — scroll animations
 * theme/spinestech/assets/js/footer.js
 *
 * 1) Parallax drift on the giant background watermark as the footer
 *    scrolls through the viewport (subtle, capped, GPU-friendly).
 * 2) Reveal-on-scroll for the brand widget and nav columns.
 *
 * Runs globally (the footer appears on every page). Everything here
 * is purely progressive enhancement — the footer is fully visible and
 * usable with JS disabled, since the reveal classes only kick in after
 * 'js-ready' is added by this script.
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
        var MAX_OFFSET = 30; // px, keeps the drift subtle

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
})();