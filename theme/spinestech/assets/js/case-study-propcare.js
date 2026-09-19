/**
 * Case Study — PropCare 360
 * theme/spinestech/assets/js/case-study-propcare.js
 *
 * Scroll reveal, staggered cards, soft parallax, image reveals.
 * Progressive enhancement: content stays visible without JS.
 */
(function () {
    'use strict';

    var root = document.querySelector('.pc');
    if (!root) return;

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!('IntersectionObserver' in window)) return;

    root.classList.add('js-ready');

    /* ── Scroll reveal ─────────────────────────────────────── */
    var targets = root.querySelectorAll('[data-pc-reveal]');
    if (targets.length) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                var delay = el.getAttribute('data-pc-delay');
                if (delay && !reduceMotion) {
                    el.style.transitionDelay = delay + 'ms';
                }
                el.classList.add('is-visible');
                revealObserver.unobserve(el);
            });
        }, {
            threshold: 0,
            rootMargin: '50px 0px -8% 0px'
        });

        targets.forEach(function (el) {
            var rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                el.classList.add('is-visible');
            }
            revealObserver.observe(el);
        });
    }

    /* ── Media / image reveal ──────────────────────────────── */
    var mediaNodes = root.querySelectorAll('.pc__media-reveal');
    if (mediaNodes.length) {
        var mediaObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-revealed');
                mediaObserver.unobserve(entry.target);
            });
        }, {
            threshold: 0,
            rootMargin: '50px 0px -6% 0px'
        });

        mediaNodes.forEach(function (el) {
            var rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                el.classList.add('is-revealed');
            }
            mediaObserver.observe(el);
        });
    }

    if (reduceMotion) return;

    /* ── Soft parallax on hero floats ──────────────────────── */
    var parallaxHost = root.querySelector('[data-pc-parallax]');
    if (!parallaxHost) return;

    var floats = parallaxHost.querySelectorAll('.pc__float');
    var phone = parallaxHost.querySelector('.pc__hero-phone');
    var ticking = false;
    var lastY = 0;

    function applyParallax() {
        ticking = false;
        var rect = parallaxHost.getBoundingClientRect();
        var viewH = window.innerHeight || 1;
        if (rect.bottom < 0 || rect.top > viewH) return;

        var progress = (viewH * 0.5 - (rect.top + rect.height * 0.35)) / viewH;
        var offset = Math.max(-18, Math.min(18, progress * 28));

        floats.forEach(function (el, i) {
            var factor = i === 1 ? -0.7 : (i === 2 ? 0.55 : 0.9);
            el.style.translate = '0 ' + (offset * factor).toFixed(2) + 'px';
        });

        if (phone) {
            phone.style.translate = '0 ' + (offset * -0.35).toFixed(2) + 'px';
        }
    }

    function onScroll() {
        lastY = window.scrollY || window.pageYOffset;
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(applyParallax);
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    applyParallax();

    /* silence unused var warning in some linters */
    void lastY;
})();
