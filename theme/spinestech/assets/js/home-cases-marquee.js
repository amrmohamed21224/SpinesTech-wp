/**
 * Homepage case-studies marquee — seamless infinite loop.
 * Measures one group width in px so the loop reset has no visible gap.
 */
(function () {
    'use strict';

    var PX_PER_SECOND = 72;
    var REDUCED_MOTION = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function whenImagesReady(root, callback) {
        var images = root.querySelectorAll('img');
        if (!images.length) {
            callback();
            return;
        }

        var pending = images.length;
        function done() {
            pending -= 1;
            if (pending <= 0) {
                callback();
            }
        }

        images.forEach(function (img) {
            if (img.complete) {
                done();
            } else {
                img.addEventListener('load', done, { once: true });
                img.addEventListener('error', done, { once: true });
            }
        });
    }

    function syncMarquee(track) {
        var group = track.querySelector('.hs-cases-marquee__group');
        if (!group) {
            return;
        }

        var distance = group.getBoundingClientRect().width;
        if (!distance) {
            return;
        }

        var duration = Math.max(distance / PX_PER_SECOND, 18);
        track.style.setProperty('--hs-marquee-distance', distance + 'px');
        track.style.setProperty('--hs-marquee-duration', duration + 's');
        track.classList.add('is-ready');
    }

    function initMarquee(marquee) {
        var track = marquee.querySelector('.hs-cases-marquee__track');
        if (!track || REDUCED_MOTION) {
            if (track) {
                track.classList.add('is-ready');
            }
            return;
        }

        var synced = false;
        var sync = function () {
            if (!synced) {
                track.classList.remove('is-ready');
            }
            window.requestAnimationFrame(function () {
                syncMarquee(track);
                synced = true;
            });
        };

        whenImagesReady(marquee, sync);

        if ('ResizeObserver' in window) {
            var observer = new ResizeObserver(function () {
                sync();
            });
            observer.observe(track);
        } else {
            window.addEventListener('resize', sync, { passive: true });
        }
    }

    function boot() {
        document.querySelectorAll('.hs-cases-marquee').forEach(initMarquee);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})();
