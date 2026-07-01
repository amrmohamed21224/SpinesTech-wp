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
})();
