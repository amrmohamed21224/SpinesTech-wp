<?php
/**
 * SpinesTech — Premium Site Loader
 *
 * This template part is included ONCE, as the very first thing inside
 * <body>, before any other markup. All CSS and the minimal bootstrap
 * script below are intentionally INLINE (not in external files).
 *
 * WHY INLINE: this overlay must be painted by the browser before a
 * single external stylesheet has finished downloading, or the page
 * underneath will flash for a frame before the loader covers it
 * (FOUC). Inlining removes that network round-trip from the critical
 * path entirely. This is deliberate, not an oversight — the same
 * technique used by Stripe, Linear, and Vercel for their loaders.
 *
 * The exit ANIMATION LOGIC (non-critical, can load a beat later
 * without any visual risk) lives in assets/js/loader.js, enqueued
 * normally through wp_enqueue_script().
 */
?>
<style id="st-loader-critical-css">
  html.st-loading { overflow: hidden; height: 100%; }
  html.st-loading body { overflow: hidden; height: 100%; }

  #st-loader {
    position: fixed;
    inset: 0;
    z-index: 999999;
    display: flex;
    align-items: center;
    justify-content: center;
    background: radial-gradient(120% 120% at 50% 20%, #0e2a3f 0%, #071a2c 55%, #050f1a 100%);
    overflow: hidden;
    will-change: opacity, transform, filter;
  }

  #st-loader .st-loader__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
  }

  #st-loader .st-loader__glow {
    position: absolute;
    border-radius: 50%;
    filter: blur(90px);
    opacity: 0.55;
  }
  #st-loader .st-loader__glow--1 {
    width: 46vw;
    height: 46vw;
    max-width: 620px;
    max-height: 620px;
    background: radial-gradient(circle, rgba(3,109,54,0.55) 0%, transparent 70%);
    top: -10%;
    inset-inline-end: -8%;
    animation: stLoaderDrift1 9s ease-in-out infinite;
  }
  #st-loader .st-loader__glow--2 {
    width: 38vw;
    height: 38vw;
    max-width: 520px;
    max-height: 520px;
    background: radial-gradient(circle, rgba(153,243,174,0.28) 0%, transparent 70%);
    bottom: -12%;
    inset-inline-start: -10%;
    animation: stLoaderDrift2 11s ease-in-out infinite;
  }

  #st-loader .st-loader__grid {
    position: absolute;
    inset: 0;
    background-image:
      linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px);
    background-size: 44px 44px;
    -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 45%, #000 30%, transparent 78%);
            mask-image: radial-gradient(ellipse 70% 60% at 50% 45%, #000 30%, transparent 78%);
  }

  #st-loader .st-loader__content {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.75rem;
    opacity: 0;
    transform: translateY(10px) scale(0.98);
    animation: stLoaderContentIn 1s cubic-bezier(0.16,1,0.3,1) 0.15s forwards;
  }

  #st-loader .st-loader__mark {
    width: 64px;
    height: 148px;
    filter: drop-shadow(0 0 18px rgba(3,109,54,0.45));
  }
  #st-loader .st-loader__mark svg { width: 100%; height: 100%; display: block; }

  #st-loader .st-loader__spine {
    fill: none;
    stroke: url(#stLoaderSpineGradient);
    stroke-width: 2.5;
    stroke-linecap: round;
    stroke-dasharray: 100;
    stroke-dashoffset: 100;
    pathLength: 100;
    animation: stLoaderDraw 1.6s cubic-bezier(0.65,0,0.35,1) 0.3s forwards;
  }

  #st-loader .st-loader__node {
    fill: #9cf6b0;
    opacity: 0;
    transform-origin: center;
    animation: stLoaderNodeIn 0.6s cubic-bezier(0.34,1.56,0.64,1) forwards;
  }
  #st-loader .st-loader__node--1 { animation-delay: 0.55s; }
  #st-loader .st-loader__node--2 { animation-delay: 1.0s; }
  #st-loader .st-loader__node--3 { animation-delay: 1.45s; }

  #st-loader .st-loader__wordmark {
    font-family: 'IBM Plex Sans Arabic', ui-sans-serif, system-ui, sans-serif;
    font-size: 1.35rem;
    font-weight: 600;
    letter-spacing: 0.14em;
    color: rgba(255,255,255,0.92);
    text-transform: uppercase;
  }
  #st-loader .st-loader__accent { color: #9cf6b0; font-weight: 700; }

  #st-loader .st-loader__bar {
    width: 132px;
    height: 2px;
    border-radius: 999px;
    background: rgba(255,255,255,0.1);
    overflow: hidden;
  }
  #st-loader .st-loader__bar-fill {
    height: 100%;
    width: 0%;
    border-radius: 999px;
    background: linear-gradient(90deg, #036d36, #9cf6b0);
    transition: width 0.4s cubic-bezier(0.4,0,0.2,1);
  }
  #st-loader .st-loader__bar-fill.is-indeterminate {
    animation: stLoaderIndeterminate 1.8s ease-in-out infinite;
  }

  /* Breathing pulse on the whole mark, subtle */
  #st-loader .st-loader__mark {
    animation: stLoaderBreathe 3.2s ease-in-out 1.9s infinite;
  }

  @keyframes stLoaderContentIn {
    to { opacity: 1; transform: translateY(0) scale(1); }
  }
  @keyframes stLoaderDraw {
    to { stroke-dashoffset: 0; }
  }
  @keyframes stLoaderNodeIn {
    to { opacity: 1; transform: scale(1); }
    from { transform: scale(0); }
  }
  @keyframes stLoaderBreathe {
    0%, 100% { transform: scale(1); filter: drop-shadow(0 0 18px rgba(3,109,54,0.45)); }
    50% { transform: scale(1.035); filter: drop-shadow(0 0 26px rgba(3,109,54,0.65)); }
  }
  @keyframes stLoaderIndeterminate {
    0% { width: 12%; margin-inline-start: 0%; }
    50% { width: 46%; margin-inline-start: 54%; }
    100% { width: 12%; margin-inline-start: 88%; }
  }
  @keyframes stLoaderDrift1 {
    0%, 100% { transform: translate(0,0); }
    50% { transform: translate(-3%, 4%); }
  }
  @keyframes stLoaderDrift2 {
    0%, 100% { transform: translate(0,0); }
    50% { transform: translate(4%, -3%); }
  }

  /* Exit sequence */
  #st-loader.st-loader--exit {
    animation: stLoaderExit 0.75s cubic-bezier(0.65,0,0.35,1) forwards;
    pointer-events: none;
  }
  #st-loader.st-loader--exit .st-loader__content {
    animation: stLoaderContentExit 0.55s cubic-bezier(0.65,0,0.35,1) forwards;
  }
  @keyframes stLoaderExit {
    0% { opacity: 1; -webkit-backdrop-filter: blur(0); backdrop-filter: blur(0); }
    100% { opacity: 0; visibility: hidden; }
  }
  @keyframes stLoaderContentExit {
    0% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
    100% { opacity: 0; transform: translateY(-14px) scale(1.05); filter: blur(6px); }
  }

  /* Respect reduced motion: keep it simple, fast, no scale/blur/drift */
  @media (prefers-reduced-motion: reduce) {
    #st-loader .st-loader__glow--1,
    #st-loader .st-loader__glow--2,
    #st-loader .st-loader__mark { animation: none !important; }
    #st-loader .st-loader__content { animation: stLoaderContentInReduced 0.4s ease forwards; }
    #st-loader .st-loader__spine { animation-duration: 0.01s; }
    #st-loader .st-loader__node { animation-duration: 0.01s; }
    #st-loader .st-loader__bar-fill.is-indeterminate { animation: none; width: 40%; }
    #st-loader.st-loader--exit { animation-duration: 0.25s; }
    #st-loader.st-loader--exit .st-loader__content { animation: stLoaderContentExitReduced 0.25s ease forwards; }
  }
  @keyframes stLoaderContentInReduced { from { opacity: 0; } to { opacity: 1; } }
  @keyframes stLoaderContentExitReduced { from { opacity: 1; } to { opacity: 0; } }
</style>

<div id="st-loader" role="status" aria-live="polite" aria-label="<?php echo esc_attr(st_locale() === 'ar' ? 'جارِ تحميل الموقع' : 'Loading site'); ?>">
    <div class="st-loader__bg" aria-hidden="true">
        <div class="st-loader__glow st-loader__glow--1"></div>
        <div class="st-loader__glow st-loader__glow--2"></div>
        <div class="st-loader__grid"></div>
    </div>

    <div class="st-loader__content">
        <div class="st-loader__mark" aria-hidden="true">
            <svg viewBox="0 0 60 136" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="stLoaderSpineGradient" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#9cf6b0"/>
                        <stop offset="100%" stop-color="#036d36"/>
                    </linearGradient>
                </defs>
                <path class="st-loader__spine" d="M30 8 C 55 28, 5 48, 30 68 C 55 88, 5 108, 30 128" pathLength="100"/>
                <circle class="st-loader__node st-loader__node--1" cx="30" cy="8" r="4.5"/>
                <circle class="st-loader__node st-loader__node--2" cx="30" cy="68" r="5.5"/>
                <circle class="st-loader__node st-loader__node--3" cx="30" cy="128" r="4.5"/>
            </svg>
        </div>

        <div class="st-loader__wordmark">Spines<span class="st-loader__accent">Tech</span></div>

        <div class="st-loader__bar">
            <div class="st-loader__bar-fill is-indeterminate" id="st-loader-fill"></div>
        </div>
    </div>
</div>

<noscript>
    <style>#st-loader { display: none !important; } html.st-loading { overflow: auto !important; height: auto !important; }</style>
</noscript>

<script>
  // Critical bootstrap only: lock scroll immediately so the page can't
  // jump underneath the overlay while the full loader.js (exit logic)
  // finishes loading a moment later. Everything else lives in loader.js.
  document.documentElement.classList.add('st-loading');
</script>