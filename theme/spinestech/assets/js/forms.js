(function () {
  const rest = () => window.stTheme?.restUrl || '';
  const locale = () => window.stTheme?.locale || 'ar';

  const alert = (el, msg, ok) => {
    if (!el) return;
    el.innerHTML = ok 
      ? `<div style="display:flex;align-items:center;gap:0.75rem;padding:0.25rem;"><span class="material-symbols-outlined" style="font-size:1.5rem;color:inherit;">check_circle</span> <span style="font-weight:700;">${msg}</span></div>` 
      : `<div style="display:flex;align-items:center;gap:0.75rem;padding:0.25rem;"><span class="material-symbols-outlined" style="font-size:1.5rem;color:inherit;">error</span> <span style="font-weight:700;">${msg}</span></div>`;
    el.classList.remove('hidden', 'alert--hidden', 'bg-error-container', 'bg-secondary-container', 'alert--error', 'alert--success');
    el.classList.add(ok ? 'alert--success' : 'alert--error');
    el.scrollIntoView({ behavior: 'smooth', block: 'center' });
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
    
    // Auto-insert country code based on country selection
    const countrySelect = form.querySelector('[name="country"]');
    const phoneInput = form.querySelector('[name="phone"]');
    if (countrySelect && phoneInput) {
      countrySelect.addEventListener('change', (e) => {
        const val = e.target.value;
        if (val.includes('مصر') || val.includes('Egypt')) {
          if (!phoneInput.value.trim() || phoneInput.value.trim().startsWith('+966')) {
            phoneInput.value = '+20 ';
          }
        } else if (val.includes('السعودية') || val.includes('Saudi Arabia')) {
          if (!phoneInput.value.trim() || phoneInput.value.trim().startsWith('+20')) {
            phoneInput.value = '+966 ';
          }
        }
      });
    }

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      const isRtl = locale() === 'ar';
      let isValid = true;
      let firstErrorEl = null;

      const setError = (input, msg) => {
        if (!input) return;
        isValid = false;
        input.style.borderColor = '#dc2626';
        
        let errorEl = input.parentElement.querySelector('.form-error-msg');
        if (!errorEl) {
          errorEl = document.createElement('div');
          errorEl.className = 'form-error-msg';
          errorEl.style.color = '#dc2626';
          errorEl.style.fontSize = '0.85rem';
          errorEl.style.marginTop = '4px';
          input.parentElement.appendChild(errorEl);
        }
        errorEl.textContent = msg;
        
        if (!firstErrorEl) firstErrorEl = input;
      };

      const clearErrors = () => {
        form.querySelectorAll('.form-error-msg').forEach(el => el.remove());
        form.querySelectorAll('.form-control, input, select, textarea').forEach(el => {
          el.style.borderColor = '';
        });
      };

      clearErrors();
      const fd = new FormData(form);
      if (fd.get('website')) return; // honeypot

      // Validation Rules
      
      // 1. Full Name
      const name = fd.get('name');
      if (form.querySelector('[name="name"]') && name !== null) {
        if (name.trim().length < 3) {
          setError(form.querySelector('[name="name"]'), isRtl ? 'يرجى إدخال اسمك الكامل بشكل صحيح.' : 'Please enter your full name correctly.');
        }
      }

      // 2. Email
      const email = fd.get('email');
      if (form.querySelector('[name="email"]') && email !== null) {
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email.trim())) {
          setError(form.querySelector('[name="email"]'), isRtl ? 'يرجى إدخال بريد إلكتروني صالح ويجب أن يحتوي على @' : 'Please enter a valid email address.');
        }
      }

      // 3. Country
      const country = fd.get('country');
      if (form.querySelector('[name="country"]')) {
        if (!country) {
          setError(form.querySelector('[name="country"]'), isRtl ? 'يرجى اختيار الدولة.' : 'Please select a country.');
        }
      }

      // 4. Phone
      const phone = fd.get('phone');
      if (form.querySelector('[name="phone"]') && phone !== null) {
        if (phone.trim() === '') {
          setError(form.querySelector('[name="phone"]'), isRtl ? 'يرجى إدخال رقم واتساب.' : 'Please enter your WhatsApp number.');
        }
      }

      // 5. Request Type
      const requestType = fd.get('request_type');
      if (form.querySelector('[name="request_type"]')) {
        if (!requestType) {
          setError(form.querySelector('[name="request_type"]'), isRtl ? 'يرجى تحديد نوع الطلب من القائمة.' : 'Please select a request type.');
        }
      }

      // 6. Project Stage
      const stage = fd.get('stage');
      if (form.querySelector('[name="stage"]')) {
        if (!stage) {
          setError(form.querySelector('[name="stage"]'), isRtl ? 'يرجى تحديد مرحلة المشروع الحالية من القائمة.' : 'Please select the project stage.');
        }
      }

      // 7. Budget (Optional but numbers only)
      const budget = fd.get('budget');
      if (form.querySelector('[name="budget"]') && budget !== null && budget.trim() !== '') {
        if (!/^\d+$/.test(budget.trim())) {
          setError(form.querySelector('[name="budget"]'), isRtl ? 'يرجى إدخال أرقام فقط للميزانية.' : 'Please enter numbers only for budget.');
        }
      }

      // 8. Short Description
      const messageField = fd.get('message');
      if (form.querySelector('[name="message"]') && messageField !== null) {
        // Remove consecutive spaces to prevent bypassing validation
        const normalizedMessage = messageField.trim().replace(/\s{2,}/g, ' ');
        if (normalizedMessage.length < 20) {
          setError(form.querySelector('[name="message"]'), isRtl ? 'وصف المشروع يجب ألا يقل عن 20 حرفاً.' : 'Project description must be at least 20 characters.');
        }
      }

      if (!isValid) {
        if (firstErrorEl) {
          firstErrorEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        return; // Stop submission
      }

      const alertEl = form.closest('main')?.querySelector('[id$="-alert"]') || document.getElementById('st-modal-alert') || document.getElementById('st-form-alert');
      const btn = form.querySelector('[type="submit"]');
      btn.disabled = true;
      try {
        const goal = fd.get('goal');
        let message = messageField || '';

        const extraLines = [];
        if (country) extraLines.push(`الدولة: ${country}`);
        if (requestType) extraLines.push(`نوع الطلب: ${requestType}`);
        if (stage) extraLines.push(`مرحلة المشروع: ${stage}`);
        if (budget) extraLines.push(`الميزانية المتوقعة: ${budget}`);
        if (extraLines.length) {
          message = extraLines.join('\n') + '\n\n' + message;
        }

        if (goal) message = `[Goal: ${goal}]\n${message}`;
        const data = await postJson('submissions/contact', {
          name: name,
          email: email,
          phone: phone || '',
          company: fd.get('company') || '',
          message: message,
          source: form.hasAttribute('data-st-modal-consult-form') ? 'consultation' : 'contact',
        });
        if (typeof window.stTrack === 'function') {
          window.stTrack('form_submit', { form: 'contact', source: form.hasAttribute('data-st-modal-consult-form') ? 'consultation' : 'contact' });
        }
        const thankYou = document.getElementById('st-form-thankyou');
        if (thankYou) {
          form.classList.add('ct-form--hidden');
          thankYou.classList.remove('ct-thankyou--hidden');
          thankYou.scrollIntoView({ behavior: 'smooth', block: 'center' });
        } else {
          alert(alertEl, data.message, true);
        }
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