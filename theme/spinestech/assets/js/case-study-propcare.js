/**
 * Case Study — PropCare 360
 * theme/spinestech/assets/js/case-study-propcare.js
 *
 * Scroll-reveal for sections/cards (staggered via data-pc-delay).
 * Purely progressive enhancement: without JS every element is fully
 * visible immediately (see the CSS — hidden state only applies once
 * this script adds the 'js-ready' class).
 */
(function () {
    'use strict';

    var root = document.querySelector('.pc');
    if (!root) return;

    if (!('IntersectionObserver' in window)) return;

    root.classList.add('js-ready');

    var targets = root.querySelectorAll('[data-pc-reveal]');
    if (!targets.length) return;

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                var delay = el.getAttribute('data-pc-delay');
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
})();