/**
 * Case Study — Merchant
 * theme/spinestech/assets/js/case-study-merchant.js
 *
 * Two real interactions that need JS (not achievable in pure CSS):
 * 1) Scrollspy — highlights the active section link in the fixed side
 *    dock nav as the visitor scrolls (behaves like the reference design).
 * 2) Reveal-on-scroll — fades/slides sections and cards into view.
 *
 * Purely progressive enhancement: without JS, the dock nav links still
 * work as plain anchor jumps, and all content is visible immediately.
 */
(function () {
    'use strict';

    var root = document.querySelector('.mcs');
    if (!root) return;

    /* ── 1) Scrollspy for the side dock nav ────────────────── */
    var dockLinks = root.querySelectorAll('[data-mcs-dock]');
    var sections = [];

    dockLinks.forEach(function (link) {
        var id = link.getAttribute('href');
        if (!id || id.charAt(0) !== '#') return;
        var target = root.querySelector(id);
        if (target) {
            sections.push({ link: link, el: target });
        }
    });

    if (sections.length && 'IntersectionObserver' in window) {
        var spyObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                var match = sections.filter(function (s) { return s.el === entry.target; })[0];
                if (!match) return;

                if (entry.isIntersecting) {
                    dockLinks.forEach(function (l) { l.classList.remove('is-active'); });
                    match.link.classList.add('is-active');
                }
            });
        }, {
            // Trigger when a section occupies the middle band of the viewport
            rootMargin: '-40% 0px -50% 0px',
            threshold: 0
        });

        sections.forEach(function (s) { spyObserver.observe(s.el); });
    }

    /* ── 2) Reveal-on-scroll ───────────────────────────────── */
    if ('IntersectionObserver' in window) {
        root.classList.add('js-ready');

        var targets = root.querySelectorAll('[data-mcs-reveal]');

        if (targets.length) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var el = entry.target;
                        var delay = el.getAttribute('data-mcs-delay');
                        if (delay) {
                            el.style.transitionDelay = delay + 'ms';
                        }
                        el.classList.add('is-visible');
                        revealObserver.unobserve(el);
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -40px 0px'
            });

            targets.forEach(function (el) { revealObserver.observe(el); });
        }
    }
})();