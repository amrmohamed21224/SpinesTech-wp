(function () {
    'use strict';

    function init() {
        var header = document.getElementById('st-navbar');
        var root = document.documentElement;

        /* ---- Scroll state: solidify the bar + drive the spine's
           live progress segment off real scroll position ---- */
        var ticking = false;
        var onScroll = function () {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    var y = window.scrollY;
                    var max = (root.scrollHeight - root.clientHeight) || 1;
                    
                    if (header) {
                        header.classList.toggle('is-scrolled', y > 12);
                    }
                    var pct = Math.min(100, Math.max(0, (y / max) * 100));
                    root.style.setProperty('--stn-progress', pct + '%');
                    
                    ticking = false;
                });
                ticking = true;
            }
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll, { passive: true });
        onScroll();

        /* ---- Mobile drawer ---- */
        var drawer = document.getElementById('st-mobile-drawer');
        var overlay = document.getElementById('st-mobile-overlay');
        var openBtn = document.getElementById('st-menu-open');
        var closeBtn = document.getElementById('st-menu-close');

        if (!drawer || !overlay) {
            return;
        }

        var isOpen = false;
        var setMenu = function (open) {
            isOpen = open;
            drawer.classList.toggle('is-open', open);
            overlay.classList.toggle('is-open', open);
            drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
            overlay.setAttribute('aria-hidden', open ? 'false' : 'true');
            if (openBtn) {
                openBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                openBtn.classList.toggle('is-active', open);
            }
            document.body.classList.toggle('st-drawer-open', open);
        };
        setMenu(false);

        if (openBtn) {
            openBtn.addEventListener('click', function (e) {
                e.preventDefault();
                setMenu(!isOpen);
            });
        }
        if (closeBtn) {
            closeBtn.addEventListener('click', function (e) {
                e.preventDefault();
                setMenu(false);
            });
        }
        overlay.addEventListener('click', function () {
            setMenu(false);
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && isOpen) setMenu(false);
        });

        /* Fallback: event delegation in case a button is re-rendered
           or a direct listener above didn't bind for any reason. */
        document.addEventListener('click', function (e) {
            var openTarget = e.target.closest ? e.target.closest('#st-menu-open') : null;
            var closeTarget = e.target.closest ? e.target.closest('#st-menu-close') : null;
            if (openTarget && !isOpen) {
                e.preventDefault();
                setMenu(true);
            } else if (closeTarget && isOpen) {
                e.preventDefault();
                setMenu(false);
            }
        });

        /* Close the drawer automatically if the viewport grows back
           into desktop nav territory. */
        var mq = window.matchMedia('(min-width: 1100px)');
        var onMqChange = function (e) {
            if (e.matches && isOpen) setMenu(false);
        };
        if (mq.addEventListener) {
            mq.addEventListener('change', onMqChange);
        } else if (mq.addListener) {
            mq.addListener(onMqChange);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();