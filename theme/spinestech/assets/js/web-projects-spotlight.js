/**
 * web-projects-spotlight.js
 *
 * Spotlight effect for the web projects section on the case studies page.
 * Uses CSS custom properties (--wp-mx / --wp-my) to drive a radial-gradient
 * in CSS — no canvas, no WebGL, ~30 lines of actual logic.
 *
 * Performance strategy:
 *  - requestAnimationFrame batches all DOM writes.
 *  - Intersection Observer prevents running off-screen.
 *  - Pointer events only — no scroll listeners.
 */
(function () {
    'use strict';

    function init() {
        var section = document.querySelector('.cs2-webp');
        if (!section) return;

        var ticking  = false;
        var mouseX   = -9999;
        var mouseY   = -9999;
        var isActive = false;

        // Activate only when section is visible in viewport.
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                isActive = entries[0].isIntersecting;
            }, { threshold: 0.05 });
            io.observe(section);
        } else {
            isActive = true;
        }

        // Track mouse position relative to the section.
        section.addEventListener('mousemove', function (e) {
            if (!isActive) return;
            var rect = section.getBoundingClientRect();
            mouseX   = e.clientX - rect.left;
            mouseY   = e.clientY - rect.top;

            if (!ticking) {
                ticking = true;
                requestAnimationFrame(function () {
                    section.style.setProperty('--wp-mx', mouseX + 'px');
                    section.style.setProperty('--wp-my', mouseY + 'px');
                    section.classList.add('has-mouse');
                    ticking = false;
                });
            }
        });

        section.addEventListener('mouseleave', function () {
            section.classList.remove('has-mouse');
        });

        // Entrance reveal — reuse the existing .cs-reveal / IntersectionObserver
        // already registered in archive-st_case_study.php inline script.
        // Cards get .cs2-webp-card class which is handled by that observer.
        // Nothing extra needed here.
    }

    // Run after DOM ready.
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
