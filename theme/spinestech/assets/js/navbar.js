(function () {
  const header = document.getElementById('st-navbar');
  const logo = document.querySelector('.st-nav-logo');
  const onScroll = () => {
    const scrolled = window.scrollY > 20;
    if (!header) return;
    header.classList.toggle('bg-surface/90', scrolled);
    header.classList.toggle('backdrop-blur-xl', scrolled);
    header.classList.toggle('border-outline-variant/20', scrolled);
    header.classList.toggle('shadow-lg', scrolled);
    header.classList.toggle('border-transparent', !scrolled);
    header.classList.toggle('bg-transparent', !scrolled);
    if (logo) {
      logo.classList.toggle('h-12', scrolled);
      logo.classList.toggle('lg:h-14', scrolled);
      logo.classList.toggle('h-14', !scrolled);
      logo.classList.toggle('lg:h-20', !scrolled);
    }
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  const drawer = document.getElementById('st-mobile-drawer');
  const overlay = document.getElementById('st-mobile-overlay');
  const openBtn = document.getElementById('st-menu-open');
  const closeBtn = document.getElementById('st-menu-close');
  const rtl = document.documentElement.getAttribute('dir') === 'rtl';

  const setMenu = (open) => {
    if (!drawer || !overlay || !openBtn) return;
    drawer.classList.toggle(rtl ? 'translate-x-0' : 'translate-x-0', open);
    drawer.classList.toggle(rtl ? 'translate-x-full' : '-translate-x-full', !open);
    overlay.classList.toggle('hidden', !open);
    drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
    openBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    document.documentElement.classList.toggle('scroll-locked', open);
    document.body.classList.toggle('scroll-locked', open);
  };

  openBtn?.addEventListener('click', () => setMenu(true));
  closeBtn?.addEventListener('click', () => setMenu(false));
  overlay?.addEventListener('click', () => setMenu(false));
})();
