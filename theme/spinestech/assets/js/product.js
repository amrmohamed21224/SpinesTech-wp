(function () {
  const hero = document.querySelector('[data-st-product-hero]');
  if (hero) {
    window.addEventListener('scroll', () => {
      hero.style.transform = `translateY(${window.scrollY * 0.08}px)`;
    }, { passive: true });
  }

  document.querySelectorAll('[data-st-counter]').forEach((el) => {
    const target = parseInt(el.getAttribute('data-st-counter') || '0', 10);
    const obs = new IntersectionObserver(([e]) => {
      if (!e.isIntersecting) return;
      let n = 0;
      const step = Math.ceil(target / 40);
      const t = setInterval(() => {
        n += step;
        if (n >= target) {
          el.textContent = String(target);
          clearInterval(t);
        } else el.textContent = String(n);
      }, 30);
      obs.disconnect();
    }, { threshold: 0.3 });
    obs.observe(el);
  });

  const root = document.querySelector('[data-st-product-modules]');
  if (!root) return;
  root.querySelectorAll('.st-module-tab').forEach((tab) => {
    tab.addEventListener('click', () => {
      const id = tab.getAttribute('data-module');
      root.querySelectorAll('.st-module-tab').forEach((t) => {
        t.classList.remove('bg-secondary', 'text-on-secondary', 'border-secondary');
        t.classList.add('border-outline-variant/40', 'text-on-surface-variant');
      });
      tab.classList.add('bg-secondary', 'text-on-secondary', 'border-secondary');
      tab.classList.remove('border-outline-variant/40', 'text-on-surface-variant');
      root.querySelectorAll('.st-module-panel').forEach((p) => p.classList.toggle('hidden', p.getAttribute('data-panel') !== id));
    });
  });
})();
