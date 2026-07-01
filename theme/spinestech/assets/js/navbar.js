(function () {
  const header = document.getElementById('st-navbar');
  const logo = document.querySelector('.navbar__logo');

  // Scroll effect: add 'scrolled' class for background blur
  const onScroll = () => {
    if (!header) return;
    header.classList.toggle('scrolled', window.scrollY > 20);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // Mobile drawer
  const drawer = document.getElementById('st-mobile-drawer');
  const overlay = document.getElementById('st-mobile-overlay');
  const openBtn = document.getElementById('st-menu-open');
  const closeBtn = document.getElementById('st-menu-close');

  const setMenu = (open) => {
    if (!drawer || !overlay || !openBtn) return;
    drawer.classList.toggle('is-open', open);
    overlay.classList.toggle('hidden', !open);
    drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
    openBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    document.body.style.overflow = open ? 'hidden' : '';
  };

  setMenu(false);

  openBtn?.addEventListener('click', () => setMenu(true));
  closeBtn?.addEventListener('click', () => setMenu(false));
  overlay?.addEventListener('click', () => setMenu(false));

  // Close drawer on ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') setMenu(false);
  });
})();
