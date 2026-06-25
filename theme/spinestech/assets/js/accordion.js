(function () {
  document.querySelectorAll('[data-st-accordion]').forEach((root) => {
    root.querySelectorAll('.st-accordion-trigger').forEach((btn) => {
      btn.addEventListener('click', () => {
        const panel = btn.nextElementSibling;
        const open = btn.getAttribute('aria-expanded') === 'true';
        root.querySelectorAll('.st-accordion-trigger').forEach((b) => {
          b.setAttribute('aria-expanded', 'false');
          const p = b.nextElementSibling;
          if (p) {
            p.classList.remove('max-h-96', 'opacity-100', 'p-6', 'pt-0');
            p.classList.add('max-h-0', 'opacity-0');
          }
          b.querySelector('.material-symbols-outlined')?.classList.remove('rotate-180');
        });
        if (!open && panel) {
          btn.setAttribute('aria-expanded', 'true');
          panel.classList.remove('max-h-0', 'opacity-0');
          panel.classList.add('max-h-96', 'opacity-100', 'p-6', 'pt-0');
          btn.querySelector('.material-symbols-outlined')?.classList.add('rotate-180');
        }
      });
    });
  });
})();
