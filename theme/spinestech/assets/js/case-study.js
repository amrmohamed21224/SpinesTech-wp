/**
 * Backway Case Study — scroll reveal
 * theme/spinestech/assets/js/case-study.js
 *
 * Progressive enhancement only: adds 'js-ready' to .cs-page (which is
 * what makes the CSS hide [data-reveal] elements before they animate
 * in), then reveals them via IntersectionObserver as they scroll into
 * view. If this script fails to load or IntersectionObserver isn't
 * supported, every section is still fully visible immediately — the
 * CSS default state (outside .js-ready) is always opacity:1.
 */
(function () {
    'use strict';

    var page = document.querySelector('.cs-page');
    if (!page) return;

    if (!('IntersectionObserver' in window)) {
        // No IO support — leave everything visible, skip animation.
        return;
    }

    page.classList.add('js-ready');

    var targets = page.querySelectorAll('[data-reveal]');
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
        threshold: 0,
        rootMargin: '50px 0px -40px 0px'
    });

    targets.forEach(function (el) {
        observer.observe(el);
    });
})();