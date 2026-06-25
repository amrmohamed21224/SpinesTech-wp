(function () {
  const rest = () => window.stTheme?.restUrl || '';
  const locale = () => window.stTheme?.locale || 'ar';

  const alert = (el, msg, ok) => {
    if (!el) return;
    el.textContent = msg;
    el.classList.remove('hidden', 'bg-error-container', 'bg-secondary-container');
    el.classList.add(ok ? 'bg-secondary-container' : 'bg-error-container');
  };

  const postJson = async (path, body) => {
    const res = await fetch(rest() + path, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ ...body, locale: locale() }),
    });
    const data = await res.json();
    if (!res.ok) throw new Error(data.message || 'Error');
    return data;
  };

  document.querySelectorAll('[data-st-contact-form], [data-st-modal-consult-form], [data-st-consult-form]').forEach((form) => {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const fd = new FormData(form);
      if (fd.get('website')) return;
      const alertEl = form.closest('main')?.querySelector('[id$="-alert"]') || document.getElementById('st-modal-alert') || document.getElementById('st-form-alert');
      const btn = form.querySelector('[type="submit"]');
      btn.disabled = true;
      try {
        const goal = fd.get('goal');
        let message = fd.get('message') || '';
        if (goal) message = `[Goal: ${goal}]\n${message}`;
        const data = await postJson('submissions/contact', {
          name: fd.get('name'),
          email: fd.get('email'),
          phone: fd.get('phone') || '',
          company: fd.get('company') || '',
          message,
          source: form.hasAttribute('data-st-modal-consult-form') ? 'consultation' : 'consultation-page',
        });
        alert(alertEl, data.message, true);
        form.reset();
      } catch (err) {
        alert(alertEl, err.message, false);
      } finally {
        btn.disabled = false;
      }
    });
  });

  document.querySelectorAll('[data-st-quote-form]').forEach((form) => {
    const page = form.closest('[data-st-quote-page]');
    const setChip = (root, sel, hidden) => {
      root?.querySelectorAll(sel).forEach((btn) => {
        btn.addEventListener('click', () => {
          root.querySelectorAll(sel).forEach((b) => b.classList.remove('border-secondary', 'bg-secondary/10'));
          btn.classList.add('border-secondary', 'bg-secondary/10');
          if (hidden) form.querySelector(`[name="${hidden}"]`).value = btn.dataset.value || '';
        });
      });
    };
    setChip(page, '[data-st-quote-services] .st-quote-chip', 'projectType');
    setChip(page, '[data-st-quote-budget] .st-quote-chip', 'budget');

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const fd = new FormData(form);
      if (fd.get('website')) return;
      const alertEl = document.getElementById('st-quote-alert');
      const btn = form.querySelector('[type="submit"]');
      btn.disabled = true;
      try {
        const data = await postJson('submissions/quote', {
          name: fd.get('name'),
          email: fd.get('email'),
          phone: fd.get('phone') || '',
          company: fd.get('company') || '',
          projectType: fd.get('projectType') || '',
          budget: fd.get('budget') || '',
          details: fd.get('details') || '',
        });
        alert(alertEl, data.message, true);
        form.reset();
      } catch (err) {
        alert(alertEl, err.message, false);
      } finally {
        btn.disabled = false;
      }
    });
  });

  document.querySelectorAll('[data-st-career-form]').forEach((form) => {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const fd = new FormData(form);
      if (fd.get('website')) return;
      fd.append('locale', locale());
      const alertEl = document.getElementById('st-career-alert');
      const btn = form.querySelector('[type="submit"]');
      btn.disabled = true;
      try {
        const res = await fetch(rest() + 'submissions/career', { method: 'POST', body: fd });
        const data = await res.json();
        if (!res.ok) throw new Error(data.message || 'Error');
        alert(alertEl, data.message, true);
        form.reset();
      } catch (err) {
        alert(alertEl, err.message, false);
      } finally {
        btn.disabled = false;
      }
    });
  });

  document.querySelectorAll('[data-st-consult-goals]').forEach((root) => {
    const form = root.closest('main')?.querySelector('[data-st-consult-form]');
    const hidden = form?.querySelector('[name="goal"]');
    root.querySelectorAll('.st-goal-chip').forEach((btn) => {
      btn.addEventListener('click', () => {
        root.querySelectorAll('.st-goal-chip').forEach((b) => b.classList.remove('border-secondary', 'bg-secondary/10'));
        btn.classList.add('border-secondary', 'bg-secondary/10');
        if (hidden) hidden.value = btn.dataset.goal || '';
      });
    });
  });

  const needKeywords = {
    software: ['software', 'web', 'mobile', 'custom', 'برمج', 'تطبيق', 'منص'],
    ai: ['ai', 'agent', 'automation', 'ذكاء', 'أتمت'],
    operations: ['erp', 'crm', 'systems', 'نظام', 'تشغيل'],
    commerce: ['ecommerce', 'commerce', 'store', 'pos', 'تجار', 'متجر'],
  };

  const page = document.getElementById('st-solutions-page');
  if (page) {
    let need = 'software';
    let sector = '';
    const filter = () => {
      page.querySelectorAll('.st-solution-card').forEach((card) => {
        const text = card.dataset.keywords || '';
        const keys = needKeywords[need] || [];
        const matchNeed = keys.some((k) => text.includes(k));
        const matchSector = !sector || text.includes(sector);
        card.classList.toggle('hidden', !(matchNeed && matchSector));
      });
    };
    page.querySelectorAll('[data-st-solution-needs] .st-need-chip').forEach((btn) => {
      btn.addEventListener('click', () => {
        page.querySelectorAll('.st-need-chip').forEach((b) => b.classList.remove('border-secondary', 'bg-secondary/5'));
        btn.classList.add('border-secondary', 'bg-secondary/5');
        need = btn.dataset.need || 'software';
        filter();
      });
    });
    page.querySelectorAll('[data-st-solution-sectors] .st-sector-chip').forEach((btn) => {
      btn.addEventListener('click', () => {
        page.querySelectorAll('.st-sector-chip').forEach((b) => b.classList.remove('border-secondary', 'bg-secondary/10'));
        btn.classList.add('border-secondary', 'bg-secondary/10');
        sector = btn.dataset.sector || '';
        filter();
      });
    });
    filter();
  }
})();
