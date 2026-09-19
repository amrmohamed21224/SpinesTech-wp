(function () {
  const topBtn = document.getElementById('st-back-to-top');
  const modal = document.getElementById('st-consultation-modal');

  const unlockPageScroll = () => {
    document.documentElement.classList.remove('scroll-locked');
    document.body.classList.remove('scroll-locked');
  };

  if (!modal || !modal.classList.contains('modal--visible')) {
    unlockPageScroll();
  }

  window.addEventListener('scroll', () => {
    if (!topBtn) return;
    topBtn.classList.toggle('is-visible', window.scrollY > 300);
  }, { passive: true });

  topBtn?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  const openModal = () => {
    if (!modal) return;
    modal.classList.add('modal--visible');
    modal.setAttribute('aria-hidden', 'false');
    document.documentElement.classList.add('scroll-locked');
    document.body.classList.add('scroll-locked');
  };

  const closeModal = () => {
    if (!modal) return;
    modal.classList.remove('modal--visible');
    modal.setAttribute('aria-hidden', 'true');
    unlockPageScroll();
  };

  document.querySelectorAll('[data-st-open-consultation]').forEach((el) => el.addEventListener('click', openModal));
  document.querySelectorAll('[data-st-close-consultation]').forEach((el) => {
    el.addEventListener('click', (e) => {
      if (el.hasAttribute('data-st-close-wrapper')) {
        if (e.target === el) closeModal();
      } else {
        closeModal();
      }
    });
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      closeModal();
    }
  });

  /* ── Glowing Scroll Progress Line ───────────────────────────────
     Creates a fixed 3px line on the right edge of the viewport.
     A glowing dot rides the tip of the fill as you scroll.
  ─────────────────────────────────────────────────────────────── */
  (function initScrollLine() {
    const line = document.createElement('div');
    line.className = 'st-scroll-line';
    line.setAttribute('aria-hidden', 'true');
    line.innerHTML =
      '<div class="st-scroll-line__track"></div>' +
      '<div class="st-scroll-line__fill"></div>' +
      '<div class="st-scroll-line__dot"></div>';
    document.body.appendChild(line);

    let ticking = false;

    function updateLine() {
      ticking = false;
      const scrolled = window.scrollY || window.pageYOffset;
      const docH = document.documentElement.scrollHeight - window.innerHeight;
      const pct = docH > 0 ? Math.min(scrolled / docH, 1) : 0;
      line.style.setProperty('--st-scroll-pct', pct.toFixed(4));
    }

    window.addEventListener('scroll', function () {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(updateLine);
    }, { passive: true });

    updateLine();
  })();
})();
