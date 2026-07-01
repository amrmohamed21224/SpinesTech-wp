/**
 * Case Study — scroll reveal animations
 * theme/spinestech/assets/js/case-study.js
 *
 * Adds 'js-ready' to the page root (enables the CSS reveal transition,
 * which is invisible-by-default so content never depends on JS to show),
 * then reveals [data-reveal] elements via IntersectionObserver as they
 * enter the viewport. Falls back gracefully if IO isn't supported.
 */
(function () {
    'use strict';

    var root = document.querySelector('.case-study-detail');
    if (!root) return;

    if (!('IntersectionObserver' in window)) {
        // No IO support — leave content visible, skip animation entirely.
        return;
    }

    root.classList.add('js-ready');

    var targets = root.querySelectorAll('[data-reveal]');
    if (!targets.length) return;

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                var delay = el.getAttribute('data-reveal-delay');
                if (delay) {
                    el.style.transitionDelay = delay + 'ms';
                }
                el.classList.add('is-visible');
                observer.unobserve(el);
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px'
    });

    targets.forEach(function (el) {
        observer.observe(el);
    });

    // Animated counters for stat values that look numeric, e.g. "98%", "1.2k"
    var counters = root.querySelectorAll('[data-counter]');
    if (counters.length && 'IntersectionObserver' in window) {
        var counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                var raw = el.getAttribute('data-counter') || '';
                var match = raw.match(/^(\D*)(\d+(?:\.\d+)?)(\D*)$/);
                if (!match) {
                    counterObserver.unobserve(el);
                    return;
                }
                var prefix = match[1];
                var endValue = parseFloat(match[2]);
                var suffix = match[3];
                var isFloat = match[2].indexOf('.') !== -1;
                var duration = 900;
                var startTime = null;

                function step(timestamp) {
                    if (!startTime) startTime = timestamp;
                    var progress = Math.min((timestamp - startTime) / duration, 1);
                    var eased = 1 - Math.pow(1 - progress, 3);
                    var current = endValue * eased;
                    el.textContent = prefix + (isFloat ? current.toFixed(1) : Math.round(current)) + suffix;
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        el.textContent = raw;
                    }
                }

                window.requestAnimationFrame(step);
                counterObserver.unobserve(el);
            });
        }, { threshold: 0.4 });

        counters.forEach(function (el) {
            counterObserver.observe(el);
        });
    }
})();