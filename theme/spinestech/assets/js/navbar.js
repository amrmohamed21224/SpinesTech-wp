(function () {
  const header = document.getElementById('st-navbar');
  const glass = header ? header.querySelector('.navbar__glass') : null;
  const glow = header ? header.querySelector('.navbar__glow') : null;

  // Scroll effect: add 'scrolled' class for deeper glass background
  const onScroll = () => {
    if (!header) return;
    header.classList.toggle('scrolled', window.scrollY > 20);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // Mouse-follow glow inside the glass navbar
  if (glass && glow) {
    glass.addEventListener('pointermove', (e) => {
      const rect = glass.getBoundingClientRect();
      const x = ((e.clientX - rect.left) / rect.width) * 100;
      const y = ((e.clientY - rect.top) / rect.height) * 100;
      glass.style.setProperty('--glow-x', x + '%');
      glass.style.setProperty('--glow-y', y + '%');
    });
  }

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