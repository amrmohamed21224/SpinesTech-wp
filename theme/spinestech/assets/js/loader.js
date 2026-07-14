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

    var MIN_VISIBLE_MS = 550;   // avoids an unpleasant "blink" on very fast cached loads
    var SAFETY_TIMEOUT_MS = 6000; // hard ceiling — never trap the user behind the loader
    var EXIT_DURATION_MS = 750; // must match the CSS animation duration in loader.php

    var startedAt = Date.now();
    var exited = false;

    function runExit() {
        if (exited) return;
        exited = true;

        // Snap the progress bar to 100% and stop the indeterminate sweep
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

    // Real signal: the page (including images/fonts/subframes) has finished loading.
    if (document.readyState === 'complete') {
        runExit();
    } else {
        window.addEventListener('load', runExit, { once: true });
    }

    // Safety net only — not a fake timer driving normal behavior, just a
    // ceiling so a single slow/hanging resource can never trap the user
    // behind a full-screen overlay indefinitely.
    window.setTimeout(runExit, SAFETY_TIMEOUT_MS);
})();