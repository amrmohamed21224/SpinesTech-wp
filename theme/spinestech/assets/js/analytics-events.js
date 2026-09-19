/**
 * SpinesTech analytics event bridge — GTM-ready.
 */
(function () {
    'use strict';

    window.stTrack = function (eventName, payload) {
        if (!eventName) {
            return;
        }
        var data = payload && typeof payload === 'object' ? payload : {};
        data.event = eventName;

        if (window.dataLayer && Array.isArray(window.dataLayer)) {
            window.dataLayer.push(data);
            return;
        }

        if (window.gtag && typeof window.gtag === 'function') {
            window.gtag('event', eventName, data);
            return;
        }

        if (window.location.hostname === 'localhost' || window.location.hostname.indexOf('127.0.0.1') !== -1) {
            console.debug('[stTrack]', eventName, data);
        }
    };

    document.addEventListener('click', function (e) {
        var target = e.target;
        if (!target || !target.closest) {
            return;
        }
        var wa = target.closest('[data-st-track="whatsapp"]');
        if (wa) {
            window.stTrack('whatsapp_click', { link_url: wa.getAttribute('href') || '' });
            return;
        }
        var mail = target.closest('[data-st-track="email"]');
        if (mail) {
            window.stTrack('email_click', { link_url: mail.getAttribute('href') || '' });
        }
    }, { passive: true });
})();
