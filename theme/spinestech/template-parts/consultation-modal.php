<?php
/**
 * Template Part: Consultation Modal
 * Usage: get_template_part('template-parts/consultation-modal');
 */
?>
<div id="st-consultation-modal" class="modal" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="modal__backdrop"></div>

    <div class="modal__panel-wrapper" data-st-close-consultation data-st-close-wrapper="true" style="position: relative; z-index: 10; display: flex; align-items: center; justify-content: center; min-height: 100%; padding: 1.5rem;">
        <div class="modal__panel" dir="<?php echo esc_attr(st_dir()); ?>" style="width: 100%; max-width: 64rem; max-height: calc(100vh - 3rem); overflow-y: auto;">
            
            <div class="modal__hero">
                <div class="modal__hero-top">
                    <span class="material-symbols-outlined" style="color: #4ade80;">verified_user</span>
                    <span style="color: #4ade80;">استشارة مجانية</span>
                </div>

                <h3 class="modal__hero-title">لنبدأ رحلة التحول الرقمي معاً</h3>

                <p class="modal__hero-copy">
                    نساعدك في تحويل أفكارك إلى حلول تقنية عملية مدعومة بالخبرة والتكنولوجيا المناسبة لاحتياجات عملك.
                </p>

                <div class="modal__features">
                    <div class="modal__feature">
                        <div class="modal__feature-icon">
                            <span class="material-symbols-outlined" style="color: #4ade80;">manage_search</span>
                        </div>
                        <div>
                            <div style="font-weight: 600;">تحليل احتياجات واضح</div>
                            <div style="font-size: 0.875rem; opacity: 0.7;">نحدد أولوياتك واحتياجاتك بدقة</div>
                        </div>
                    </div>

                    <div class="modal__feature">
                        <div class="modal__feature-icon">
                            <span class="material-symbols-outlined" style="color: #4ade80;">rocket_launch</span>
                        </div>
                        <div>
                            <div style="font-weight: 600;">خطة تنفيذ عملية</div>
                            <div style="font-size: 0.875rem; opacity: 0.7;">نختار الحلول الأنسب وسير العمل</div>
                        </div>
                    </div>

                    <div class="modal__feature">
                        <div class="modal__feature-icon">
                            <span class="material-symbols-outlined" style="color: #4ade80;">schedule</span>
                        </div>
                        <div>
                            <div style="font-weight: 600;">رد خلال 24 ساعة</div>
                            <div style="font-size: 0.875rem; opacity: 0.7;">نرد عليك في أقرب وقت ممكن</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal__content" style="position: relative;">
                <button type="button" data-st-close-consultation aria-label="<?php echo st_dir() === 'rtl' ? 'إغلاق' : 'Close'; ?>" style="position: absolute; top: 1.5rem; inset-inline-end: 1.5rem; width: 2.25rem; height: 2.25rem; border-radius: 50%; background: rgba(0,0,0,0.05); border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--color-on-surface); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgba(0,0,0,0.1)'" onmouseout="this.style.backgroundColor='rgba(0,0,0,0.05)'">
                    <span class="material-symbols-outlined" style="font-size: 1.25rem;">close</span>
                </button>
                <div class="modal__stepper" style="padding-inline-end: 3rem;">
                    <div class="modal__step-label" data-st-step-label>الخطوة 1 من 2</div>
                    <div class="modal__step-dots">
                        <div data-st-step-dot="1" class="modal__step-dot is-active">1</div>
                        <div style="height: 2px; width: 2rem; background: var(--color-outline-variant); opacity: 0.4;"></div>
                        <div data-st-step-dot="2" class="modal__step-dot">2</div>
                    </div>
                </div>

                <div id="st-modal-alert" class="alert hidden"></div>

                <form data-st-modal-consult-form class="modal__form">
                    <input type="text" name="website" class="is-hidden" tabindex="-1" autocomplete="off">
                    <input type="hidden" name="goal" value="">
                    <input type="hidden" name="company_size" value="">
                    <input type="hidden" name="sector" value="">
                    <input type="hidden" name="job_title" value="">

                    <div id="st-modal-step-1" class="modal__body">
                        <div class="row--2">
                            <div class="form-group">
                                <label class="page-contact__label">الاسم الكامل</label>
                                <input required name="name" type="text" placeholder="أدخل الاسم الكامل" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="page-contact__label">البريد الإلكتروني</label>
                                <input required name="email" type="email" placeholder="example@domain.com" class="form-control" dir="ltr">
                            </div>
                        </div>

                        <div class="row--2">
                            <div class="form-group">
                                <label class="page-contact__label">رقم الهاتف</label>
                                <input required name="phone" type="tel" placeholder="05XXXXXXXX" class="form-control" dir="ltr">
                            </div>
                            <div class="form-group">
                                <label class="page-contact__label">الشركة</label>
                                <input name="company" type="text" placeholder="اسم الشركة" class="form-control">
                            </div>
                        </div>

                        <div class="row--2">
                            <div class="form-group">
                                <label class="page-contact__label">الوظيفة</label>
                                <input name="job_title" type="text" placeholder="مثل: مدير تقنية المعلومات" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="page-contact__label">حجم الشركة</label>
                                <select name="company_size_select" class="form-control">
                                    <option value="">اختر</option>
                                    <option value="1-10">1–10 موظفين</option>
                                    <option value="11-50">11–50 موظفاً</option>
                                    <option value="51-200">51–200 موظفاً</option>
                                    <option value="200+">200+ موظف</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="page-contact__label">القطاع</label>
                            <select name="sector_select" class="form-control">
                                <option value="">اختر القطاع</option>
                                <option value="قطاع خاص">قطاع خاص</option>
                                <option value="حكومي">حكومي</option>
                                <option value="استثماري">استثماري</option>
                                <option value="تعليمي">تعليمي</option>
                                <option value="صحي">صحي</option>
                            </select>
                        </div>

                        <div class="modal__actions">
                            <button id="st-modal-next" type="button" class="button button--primary">التالي <span class="material-symbols-outlined text-base">arrow_forward</span></button>
                        </div>
                    </div>

                    <div id="st-modal-step-2" class="modal__body is-hidden">
                        <div class="form-group">
                            <label class="page-contact__label">ما هو هدف الاستشارة؟</label>
                            <div class="modal__goal-list" data-st-consult-goals>
                                <button type="button" class="st-goal-chip" data-goal="تحليل احتياجات">تحليل احتياجات</button>
                                <button type="button" class="st-goal-chip" data-goal="نظام ERP">نظام ERP</button>
                                <button type="button" class="st-goal-chip" data-goal="تطبيق مخصص">تطبيق مخصص</button>
                                <button type="button" class="st-goal-chip" data-goal="ذكاء اصطناعي">ذكاء اصطناعي</button>
                                <button type="button" class="st-goal-chip" data-goal="استشارة تقنية">استشارة تقنية</button>
                                <button type="button" class="st-goal-chip" data-goal="تحول رقمي">تحول رقمي</button>
                                <button type="button" class="st-goal-chip" data-goal="أمن معلومات">أمن معلومات</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="page-contact__label">وصف المشروع</label>
                            <textarea required name="message" rows="4" placeholder="أخبرنا عن أهدافك واحتياجاتك..." class="form-control"></textarea>
                        </div>

                        <div class="modal__actions" style="justify-content: space-between; margin-top: 1rem;">
                            <button id="st-modal-back" type="button" class="button button--ghost"><span class="material-symbols-outlined text-base">arrow_back</span> رجوع</button>
                            <button type="submit" class="button button--primary"><span class="material-symbols-outlined text-base">send</span> إرسال الطلب</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        const modal = document.getElementById('st-consultation-modal');
        if (!modal) return;

        const form = modal.querySelector('[data-st-modal-consult-form]');
        const step1 = document.getElementById('st-modal-step-1');
        const step2 = document.getElementById('st-modal-step-2');
        const nextBtn = document.getElementById('st-modal-next');
        const backBtn = document.getElementById('st-modal-back');
        const stepLabel = modal.querySelector('[data-st-step-label]');
        const dots = Array.from(modal.querySelectorAll('[data-st-step-dot]'));
        const goalButtons = Array.from(form ? form.querySelectorAll('.st-goal-chip') : []);
        const goalField = form ? form.querySelector('[name="goal"]') : null;
        const companySizeField = form ? form.querySelector('[name="company_size"]') : null;
        const sectorField = form ? form.querySelector('[name="sector"]') : null;
        const jobTitleField = form ? form.querySelector('[name="job_title"]') : null;
        const messageField = form ? form.querySelector('[name="message"]') : null;

        let selectedGoals = [];

        const playBell = () => {
            try {
                const ctx = new(window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.type = 'sine';
                osc.frequency.setValueAtTime(880, ctx.currentTime);
                osc.frequency.exponentialRampToValueAtTime(440, ctx.currentTime + 0.4);
                gain.gain.setValueAtTime(0.25, ctx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.5);
                osc.start(ctx.currentTime);
                osc.stop(ctx.currentTime + 0.5);
            } catch (e) {}
        };

        const setStep = (step) => {
            if (step === 1) {
                step1.classList.remove('is-hidden');
                step2.classList.add('is-hidden');
            } else {
                step1.classList.add('is-hidden');
                step2.classList.remove('is-hidden');
            }

            dots.forEach((dot) => {
                const number = Number(dot.getAttribute('data-st-step-dot'));
                const isActive = number === step;
                const isDone = number < step;
                dot.classList.toggle('is-active', isActive || isDone);
            });

            if (stepLabel) {
                stepLabel.textContent = 'الخطوة ' + step + ' من 2';
            }
        };

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                const requiredFields = Array.from(step1.querySelectorAll('[required]'));
                const invalid = requiredFields.filter((field) => !field.value.trim());
                if (invalid.length) {
                    invalid[0].focus();
                    return;
                }
                setStep(2);
            });
        }

        if (backBtn) {
            backBtn.addEventListener('click', () => setStep(1));
        }

        goalButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const goal = button.getAttribute('data-goal') || '';
                const idx = selectedGoals.indexOf(goal);
                if (idx === -1) {
                    selectedGoals.push(goal);
                    button.classList.add('is-selected');
                } else {
                    selectedGoals.splice(idx, 1);
                    button.classList.remove('is-selected');
                }
                if (goalField) {
                    goalField.value = selectedGoals.join(', ');
                }
            });
        });

        if (form) {
            form.addEventListener('submit', (event) => {
                const companySizeSelect = form.querySelector('[name="company_size_select"]');
                const sectorSelect = form.querySelector('[name="sector_select"]');
                const jobInput = form.querySelector('[name="job_title"]');
                if (companySizeField) companySizeField.value = companySizeSelect ? companySizeSelect.value : '';
                if (sectorField) sectorField.value = sectorSelect ? sectorSelect.value : '';
                if (jobTitleField) jobTitleField.value = jobInput ? jobInput.value : '';

                const details = [];
                if (selectedGoals.length) {
                    details.push('الأهداف: ' + selectedGoals.join('، '));
                }
                if (companySizeField && companySizeField.value) {
                    details.push('حجم الشركة: ' + companySizeField.value);
                }
                if (sectorField && sectorField.value) {
                    details.push('القطاع: ' + sectorField.value);
                }
                if (jobTitleField && jobTitleField.value) {
                    details.push('الوظيفة: ' + jobTitleField.value);
                }
                if (messageField && details.length) {
                    const base = (messageField.value || '').trim();
                    messageField.value = [details.join(' | '), base].filter(Boolean).join('\n\n');
                }
            }, true);
        }

        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'class') {
                    if (modal.classList.contains('modal--visible')) {
                        playBell();
                        setStep(1);
                        form.reset();
                        selectedGoals = [];
                        goalButtons.forEach((btn) => {
                            btn.classList.remove('is-selected');
                        });
                        if (goalField) goalField.value = '';
                        if (companySizeField) companySizeField.value = '';
                        if (sectorField) sectorField.value = '';
                        if (jobTitleField) jobTitleField.value = '';
                        modal.setAttribute('aria-hidden', 'false');
                    } else {
                        modal.setAttribute('aria-hidden', 'true');
                    }
                }
            });
        });

        observer.observe(modal, {
            attributes: true
        });
        setStep(1);
    })();
</script>