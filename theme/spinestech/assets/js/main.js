(function () {
  const topBtn = document.getElementById('st-back-to-top');
  const modal = document.getElementById('st-consultation-modal');

  window.addEventListener('scroll', () => {
    if (!topBtn) return;
    const show = window.scrollY > 300;
    topBtn.classList.toggle('opacity-0', !show);
    topBtn.classList.toggle('pointer-events-none', !show);
    topBtn.classList.toggle('opacity-100', show);
  }, { passive: true });

  topBtn?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  const openModal = () => {
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.setAttribute('aria-hidden', 'false');
    document.documentElement.classList.add('scroll-locked');
    document.body.classList.add('scroll-locked');
  };

  const closeModal = () => {
    if (!modal) return;
    modal.classList.add('hidden');
    modal.setAttribute('aria-hidden', 'true');
    document.documentElement.classList.remove('scroll-locked');
    document.body.classList.remove('scroll-locked');
  };

  document.querySelectorAll('[data-st-open-consultation]').forEach((el) => el.addEventListener('click', openModal));
  document.querySelectorAll('[data-st-close-consultation]').forEach((el) => el.addEventListener('click', closeModal));
})();
