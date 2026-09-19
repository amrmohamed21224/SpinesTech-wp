/**
 * case-study-lahza.js
 * theme/spinestech/assets/js/case-study-lahza.js
 *
 * Self-contained interactions for the "لحظة" (Lahza) case study page:
 *  - scroll-reveal for [data-lh-reveal] elements (staggered via data-lh-delay)
 *  - animated count-up for [data-lh-count] stat numbers
 *  - subtle mouse-tilt on the hero phone stack ([data-lh-tilt])
 *
 * Does not depend on any external/shared script — safe to enqueue on its
 * own for this page only.
 */
(function () {
	'use strict';

	var root = document.querySelector( '.lh' );
	if ( ! root ) return;

	// Mark as JS-ready so the CSS reveal transitions can activate
	// (elements are visible by default if this never runs, e.g. JS error).
	root.classList.add( 'js-ready' );

	/* ── Scroll reveal ────────────────────────────────────────── */
	var revealEls = root.querySelectorAll( '[data-lh-reveal]' );

	revealEls.forEach( function ( el ) {
		var delay = el.getAttribute( 'data-lh-delay' );
		if ( delay ) {
			el.style.transitionDelay = delay + 'ms';
		}
	} );

	if ( 'IntersectionObserver' in window ) {
		var revealObserver = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'is-visible' );
						revealObserver.unobserve( entry.target );
					}
				} );
			},
			{ threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
		);
		revealEls.forEach( function ( el ) { revealObserver.observe( el ); } );
	} else {
		// No IntersectionObserver support — just show everything.
		revealEls.forEach( function ( el ) { el.classList.add( 'is-visible' ); } );
	}

	/* ── Animated stat counters ───────────────────────────────── */
	var counters = root.querySelectorAll( '[data-lh-count]' );

	function animateCount( el ) {
		var target = parseInt( el.getAttribute( 'data-lh-count' ), 10 ) || 0;
		var suffix = el.getAttribute( 'data-lh-suffix' ) || '';
		var duration = 1200;
		var start = null;

		function step( timestamp ) {
			if ( start === null ) start = timestamp;
			var progress = Math.min( ( timestamp - start ) / duration, 1 );
			// ease-out-ish curve
			var eased = 1 - Math.pow( 1 - progress, 3 );
			el.textContent = Math.round( eased * target ) + suffix;
			if ( progress < 1 ) {
				window.requestAnimationFrame( step );
			} else {
				el.textContent = target + suffix;
			}
		}
		window.requestAnimationFrame( step );
	}

	if ( counters.length && 'IntersectionObserver' in window ) {
		var countObserver = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						animateCount( entry.target );
						countObserver.unobserve( entry.target );
					}
				} );
			},
			{ threshold: 0.6 }
		);
		counters.forEach( function ( el ) { countObserver.observe( el ); } );
	} else {
		counters.forEach( function ( el ) {
			var target = parseInt( el.getAttribute( 'data-lh-count' ), 10 ) || 0;
			el.textContent = target + ( el.getAttribute( 'data-lh-suffix' ) || '' );
		} );
	}

	/* ── Hero phone-stack mouse tilt (desktop only, subtle) ──────── */
	var tiltEl = root.querySelector( '[data-lh-tilt]' );
	if ( tiltEl && window.matchMedia( '(pointer: fine)' ).matches && ! window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		var maxTilt = 6; // degrees

		tiltEl.addEventListener( 'mousemove', function ( e ) {
			var rect = tiltEl.getBoundingClientRect();
			var x = ( e.clientX - rect.left ) / rect.width - 0.5;
			var y = ( e.clientY - rect.top ) / rect.height - 0.5;
			tiltEl.style.transform =
				'rotateX(' + ( -y * maxTilt ) + 'deg) rotateY(' + ( x * maxTilt ) + 'deg)';
		} );

		tiltEl.addEventListener( 'mouseleave', function () {
			tiltEl.style.transform = 'rotateX(0deg) rotateY(0deg)';
		} );

		tiltEl.style.transition = 'transform 0.3s ease-out';
		tiltEl.style.transformStyle = 'preserve-3d';
	}
})();