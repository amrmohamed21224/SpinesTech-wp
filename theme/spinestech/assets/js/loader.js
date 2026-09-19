/**
 * SpinesTech — Premium Site Loader
 * Exit-sequence logic. The overlay markup + critical CSS live in
 * template-parts/loader.php (inlined there on purpose — see comment
 * in that file). This script only controls WHEN and HOW the overlay
 * leaves, driven by the page's real load state, never a fake timer.
 */
(function () {
    'use strict';

    var overlay = document.getElementById('st-loader');
    if (!overlay) return;

    var fill = document.getElementById('st-loader-fill');
    var html = document.documentElement;
    var isMobile = !!(window.stTheme && window.stTheme.isMobile)
        || /Mobi|Android|iPhone|iPad/i.test(navigator.userAgent || '');

    // Mobile: shorter floor so interaction isn't delayed for decoration.
    var MIN_VISIBLE_MS = isMobile ? 180 : 550;
    var SAFETY_TIMEOUT_MS = isMobile ? 3500 : 6000;
    var EXIT_DURATION_MS = isMobile ? 320 : 750;

    var startedAt = Date.now();
    var exited = false;

    function runExit() {
        if (exited) return;
        exited = true;

        if (fill) {
            fill.classList.remove('is-indeterminate');
            fill.style.width = '100%';
        }

        var elapsed = Date.now() - startedAt;
        var remaining = Math.max(0, MIN_VISIBLE_MS - elapsed);

        window.setTimeout(function () {
            overlay.classList.add('st-loader--exit');
            html.classList.remove('st-loading');

            window.setTimeout(function () {
                if (overlay && overlay.parentNode) {
                    overlay.parentNode.removeChild(overlay);
                }
            }, EXIT_DURATION_MS + 60);
        }, remaining);
    }

    if (document.readyState === 'complete') {
        runExit();
    } else {
        window.addEventListener('load', runExit, { once: true });
    }

    window.setTimeout(runExit, SAFETY_TIMEOUT_MS);
})();
