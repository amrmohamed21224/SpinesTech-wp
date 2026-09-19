<?php
/**
 * Template Part: Consultation Modal
 * Usage: get_template_part('template-parts/consultation-modal');
 */
$is_rtl = st_locale() === 'ar';
?>
<div id="st-consultation-modal" class="modal" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="modal__backdrop"></div>

    <div class="modal__panel-wrapper" data-st-close-consultation data-st-close-wrapper="true" style="position: relative; z-index: 10; display: flex; align-items: center; justify-content: center; min-height: 100%; padding: 1.5rem;">
        <div class="modal__panel" dir="<?php echo esc_attr(st_dir()); ?>" style="width: 100%; max-width: 64rem; max-height: calc(100vh - 3rem); overflow-y: auto;">
            
            <div class="modal__hero">
                <div class="modal__hero-top">
                    <span class="material-symbols-outlined" style="color: #4ade80;" aria-hidden="true">verified_user</span>
                    <span style="color: #4ade80;"><?php echo esc_html($is_rtl ? 'Ø§Ø³ØªØ´Ø§Ø±Ø© Ù…Ø¬Ø§Ù†ÙŠØ©' : 'Free Consultation'); ?></span>
                </div>

                <h3 class="modal__hero-title"><?php echo esc_html($is_rtl ? 'Ù„Ù†Ø¨Ø¯Ø£ Ø±Ø­Ù„Ø© Ø§Ù„ØªØ­ÙˆÙ„ Ø§Ù„Ø±Ù‚Ù…ÙŠ Ù…Ø¹Ø§Ù‹' : 'Let\'s Begin Your Digital Journey Together'); ?></h3>

                <p class="modal__hero-copy">
                    <?php echo esc_html($is_rtl ? 'Ù†Ø³Ø§Ø¹Ø¯Ùƒ ÙÙŠ ØªØ­ÙˆÙŠÙ„ Ø£ÙÙƒØ§Ø±Ùƒ Ø¥Ù„Ù‰ Ø­Ù„ÙˆÙ„ ØªÙ‚Ù†ÙŠØ© Ø¹Ù…Ù„ÙŠØ© Ù…Ø¯Ø¹ÙˆÙ…Ø© Ø¨Ø§Ù„Ø®Ø¨Ø±Ø© ÙˆØ§Ù„ØªÙƒÙ†ÙˆÙ„ÙˆØ¬ÙŠØ§ Ø§Ù„Ù…Ù†Ø§Ø³Ø¨Ø© Ù„Ø§Ø­ØªÙŠØ§Ø¬Ø§Øª Ø¹Ù…Ù„Ùƒ.' : 'We help turn your ideas into practical tech solutions backed by expertise and tailored technology.'); ?>
                </p>

                <div class="modal__features">
                    <div class="modal__feature">
                        <div class="modal__feature-icon">
                            <span class="material-symbols-outlined" style="color: #4ade80;" aria-hidden="true">manage_search</span>
                        </div>
                        <div>
                            <div style="font-weight: 600;"><?php echo esc_html($is_rtl ? 'ØªØ­Ù„ÙŠÙ„ Ø§Ø­ØªÙŠØ§Ø¬Ø§Øª ÙˆØ§Ø¶Ø­' : 'Clear Needs Analysis'); ?></div>
                            <div style="font-size: 0.875rem; opacity: 0.7;"><?php echo esc_html($is_rtl ? 'Ù†Ø­Ø¯Ø¯ Ø£ÙˆÙ„ÙˆÙŠØ§ØªÙƒ ÙˆØ§Ø­ØªÙŠØ§Ø¬Ø§ØªÙƒ Ø¨Ø¯Ù‚Ø©' : 'We precisely define your priorities & needs'); ?></div>
                        </div>
                    </div>

                    <div class="modal__feature">
                        <div class="modal__feature-icon">
                            <span class="material-symbols-outlined" style="color: #4ade80;" aria-hidden="true">rocket_launch</span>
                        </div>
                        <div>
                            <div style="font-weight: 600;"><?php echo esc_html($is_rtl ? 'Ø®Ø·Ø© ØªÙ†ÙÙŠØ° Ø¹Ù…Ù„ÙŠØ©' : 'Practical Roadmap'); ?></div>
                            <div style="font-size: 0.875rem; opacity: 0.7;"><?php echo esc_html($is_rtl ? 'Ù†Ø®ØªØ§Ø± Ø§Ù„Ø­Ù„ÙˆÙ„ Ø§Ù„Ø£Ù†Ø³Ø¨ ÙˆØ³ÙŠØ± Ø§Ù„Ø¹Ù…Ù„' : 'We choose optimal workflows & solutions'); ?></div>
                        </div>
                    </div>

                    <div class="modal__feature">
                        <div class="modal__feature-icon">
                            <span class="material-symbols-outlined" style="color: #4ade80;" aria-hidden="true">schedule</span>
                        </div>
                        <div>
                            <div style="font-weight: 600;"><?php echo esc_html($is_rtl ? 'Ø±Ø¯ Ø®Ù„Ø§Ù„ 24 Ø³Ø§Ø¹Ø©' : '24-Hour Response'); ?></div>
                            <div style="font-size: 0.875rem; opacity: 0.7;"><?php echo esc_html($is_rtl ? 'Ù†Ø±Ø¯ Ø¹Ù„ÙŠÙƒ ÙÙŠ Ø£Ù‚Ø±Ø¨ ÙˆÙ‚Øª Ù…Ù…ÙƒÙ†' : 'We respond as quickly as possible'); ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal__content" style="position: relative;">
                <button type="button" data-st-close-consultation aria-label="<?php echo $is_rtl ? 'Ø¥ØºÙ„Ø§Ù‚' : 'Close'; ?>" style="position: absolute; top: 1.5rem; inset-inline-end: 1.5rem; width: 2.25rem; height: 2.25rem; border-radius: 50%; background: rgba(0,0,0,0.05); border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--color-on-surface); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgba(0,0,0,0.1)'" onmouseout="this.style.backgroundColor='rgba(0,0,0,0.05)'">
                    <span class="material-symbols-outlined" style="font-size: 1.25rem;" aria-hidden="true">close</span>
                </button>
                <div class="modal__stepper" style="padding-inline-end: 3rem;">
                    <div class="modal__step-label" data-st-step-label><?php echo esc_html($is_rtl ? 'Ø§Ù„Ø®Ø·ÙˆØ© 1 Ù…Ù† 2' : 'Step 1 of 2'); ?></div>
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
                                <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'Ø§Ù„Ø§Ø³Ù… Ø§Ù„ÙƒØ§Ù…Ù„' : 'Full Name'); ?></label>
                                <input required name="name" type="text" placeholder="<?php echo esc_attr($is_rtl ? 'Ø£Ø¯Ø®Ù„ Ø§Ù„Ø§Ø³Ù… Ø§Ù„ÙƒØ§Ù…Ù„' : 'Enter your full name'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'Ø§Ù„Ø¨Ø±ÙŠØ¯ Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠ' : 'Email Address'); ?></label>
                                <input required name="email" type="email" placeholder="example@domain.com" class="form-control" dir="ltr">
                            </div>
                        </div>

                        <div class="row--2">
                            <div class="form-group">
                                <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'Ø±Ù‚Ù… Ø§Ù„Ù‡Ø§ØªÙ' : 'Phone Number'); ?></label>
                                <input required name="phone" type="tel" placeholder="05XXXXXXXX" class="form-control" dir="ltr">
                            </div>
                            <div class="form-group">
                                <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'Ø§Ù„Ø´Ø±ÙƒØ©' : 'Company Name'); ?></label>
                                <input name="company" type="text" placeholder="<?php echo esc_attr($is_rtl ? 'Ø§Ø³Ù… Ø§Ù„Ø´Ø±ÙƒØ©' : 'Company name'); ?>" class="form-control">
                            </div>
                        </div>

                        <div class="row--2">
                            <div class="form-group">
                                <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'Ø§Ù„ÙˆØ¸ÙŠÙØ©' : 'Job Title'); ?></label>
                                <input name="job_title" type="text" placeholder="<?php echo esc_attr($is_rtl ? 'Ù…Ø«Ù„: Ù…Ø¯ÙŠØ± ØªÙ‚Ù†ÙŠØ© Ø§Ù„Ù…Ø¹Ù„ÙˆÙ…Ø§Øª' : 'e.g. CTO / IT Manager'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'Ø­Ø¬Ù… Ø§Ù„Ø´Ø±ÙƒØ©' : 'Company Size'); ?></label>
                                <select name="company_size_select" class="form-control">
                                    <option value=""><?php echo esc_html($is_rtl ? 'Ø§Ø®ØªØ±' : 'Select'); ?></option>
                                    <option value="1-10"><?php echo esc_html($is_rtl ? '1â€“10 Ù…ÙˆØ¸ÙÙŠÙ†' : '1â€“10 employees'); ?></option>
                                    <option value="11-50"><?php echo esc_html($is_rtl ? '11â€“50 Ù…ÙˆØ¸ÙØ§Ù‹' : '11â€“50 employees'); ?></option>
                                    <option value="51-200"><?php echo esc_html($is_rtl ? '51â€“200 Ù…ÙˆØ¸ÙØ§Ù‹' : '51â€“200 employees'); ?></option>
                                    <option value="200+"><?php echo esc_html($is_rtl ? '200+ Ù…ÙˆØ¸Ù' : '200+ employees'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'Ø§Ù„Ù‚Ø·Ø§Ø¹' : 'Industry'); ?></label>
                            <select name="sector_select" class="form-control">
                                <option value=""><?php echo esc_html($is_rtl ? 'Ø§Ø®ØªØ± Ø§Ù„Ù‚Ø·Ø§Ø¹' : 'Select Sector'); ?></option>
                                <option value="Ù‚Ø·Ø§Ø¹ Ø®Ø§Øµ"><?php echo esc_html($is_rtl ? 'Ù‚Ø·Ø§Ø¹ Ø®Ø§Øµ' : 'Private Sector'); ?></option>
                                <option value="Ø­ÙƒÙˆÙ…ÙŠ"><?php echo esc_html($is_rtl ? 'Ø­ÙƒÙˆÙ…ÙŠ' : 'Government'); ?></option>
                                <option value="Ø§Ø³ØªØ«Ù…Ø§Ø±ÙŠ"><?php echo esc_html($is_rtl ? 'Ø§Ø³ØªØ«Ù…Ø§Ø±ÙŠ' : 'Investment'); ?></option>
                                <option value="ØªØ¹Ù„ÙŠÙ…ÙŠ"><?php echo esc_html($is_rtl ? 'ØªØ¹Ù„ÙŠÙ…ÙŠ' : 'Education'); ?></option>
                                <option value="ØµØ­ÙŠ"><?php echo esc_html($is_rtl ? 'ØµØ­ÙŠ' : 'Healthcare'); ?></option>
                            </select>
                        </div>

                        <div class="modal__actions">
                            <button id="st-modal-next" type="button" class="button button--primary"><?php echo esc_html($is_rtl ? 'Ø§Ù„ØªØ§Ù„ÙŠ' : 'Next'); ?> <span class="material-symbols-outlined text-base"><?php echo $is_rtl ? 'arrow_forward' : 'arrow_back'; ?></span></button>
                        </div>
                    </div>

                    <div id="st-modal-step-2" class="modal__body is-hidden">
                        <div class="form-group">
                            <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'Ù…Ø§ Ù‡Ùˆ Ù‡Ø¯Ù Ø§Ù„Ø§Ø³ØªØ´Ø§Ø±Ø©ØŸ' : 'What is your consultation goal?'); ?></label>
                            <div class="modal__goal-list" data-st-consult-goals>
                                <button type="button" class="st-goal-chip" data-goal="ØªØ­Ù„ÙŠÙ„ Ø§Ø­ØªÙŠØ§Ø¬Ø§Øª"><?php echo esc_html($is_rtl ? 'ØªØ­Ù„ÙŠÙ„ Ø§Ø­ØªÙŠØ§Ø¬Ø§Øª' : 'Needs Analysis'); ?></button>
                                <button type="button" class="st-goal-chip" data-goal="Ù†Ø¸Ø§Ù… ERP"><?php echo esc_html($is_rtl ? 'Ù†Ø¸Ø§Ù… ERP' : 'ERP System'); ?></button>
                                <button type="button" class="st-goal-chip" data-goal="ØªØ·Ø¨ÙŠÙ‚ Ù…Ø®ØµØµ"><?php echo esc_html($is_rtl ? 'ØªØ·Ø¨ÙŠÙ‚ Ù…Ø®ØµØµ' : 'Custom App'); ?></button>
                                <button type="button" class="st-goal-chip" data-goal="Ø°ÙƒØ§Ø¡ Ø§ØµØ·Ù†Ø§Ø¹ÙŠ"><?php echo esc_html($is_rtl ? 'Ø°ÙƒØ§Ø¡ Ø§ØµØ·Ù†Ø§Ø¹ÙŠ' : 'AI Solution'); ?></button>
                                <button type="button" class="st-goal-chip" data-goal="Ø§Ø³ØªØ´Ø§Ø±Ø© ØªÙ‚Ù†ÙŠØ©"><?php echo esc_html($is_rtl ? 'Ø§Ø³ØªØ´Ø§Ø±Ø© ØªÙ‚Ù†ÙŠØ©' : 'Tech Advisory'); ?></button>
                                <button type="button" class="st-goal-chip" data-goal="ØªØ­ÙˆÙ„ Ø±Ù‚Ù…ÙŠ"><?php echo esc_html($is_rtl ? 'ØªØ­ÙˆÙ„ Ø±Ù‚Ù…ÙŠ' : 'Digital Transformation'); ?></button>
                                <button type="button" class="st-goal-chip" data-goal="Ø£Ù…Ù† Ù…Ø¹Ù„ÙˆÙ…Ø§Øª"><?php echo esc_html($is_rtl ? 'Ø£Ù…Ù† Ù…Ø¹Ù„ÙˆÙ…Ø§Øª' : 'Cybersecurity'); ?></button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="page-contact__label"><?php echo esc_html($is_rtl ? 'ÙˆØµÙ Ø§Ù„Ù…Ø´Ø±ÙˆØ¹' : 'Project Description'); ?></label>
                            <textarea required name="message" rows="4" placeholder="<?php echo esc_attr($is_rtl ? 'Ø£Ø®Ø¨Ø±Ù†Ø§ Ø¹Ù† Ø£Ù‡Ø¯Ø§ÙÙƒ ÙˆØ§Ø­ØªÙŠØ§Ø¬Ø§ØªÙƒ...' : 'Tell us about your goals and requirements...'); ?>" class="form-control"></textarea>
                        </div>

                        <div class="modal__actions" style="justify-content: space-between; margin-top: 1rem;">
                            <button id="st-modal-back" type="button" class="button button--ghost"><span class="material-symbols-outlined text-base"><?php echo $is_rtl ? 'arrow_back' : 'arrow_forward'; ?></span> <?php echo esc_html($is_rtl ? 'Ø±Ø¬ÙˆØ¹' : 'Back'); ?></button>
                            <button type="submit" class="button button--primary"><span class="material-symbols-outlined text-base">send</span> <?php echo esc_html($is_rtl ? 'Ø¥Ø±Ø³Ø§Ù„ Ø§Ù„Ø·Ù„Ø¨' : 'Submit Request'); ?></button>
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
                const isAr = document.documentElement.dir === 'rtl';
                stepLabel.textContent = isAr ? ('Ø§Ù„Ø®Ø·ÙˆØ© ' + step + ' Ù…Ù† 2') : ('Step ' + step + ' of 2');
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
                    details.push('Ø§Ù„Ø£Ù‡Ø¯Ø§Ù: ' + selectedGoals.join('ØŒ '));
                }
                if (companySizeField && companySizeField.value) {
                    details.push('Ø­Ø¬Ù… Ø§Ù„Ø´Ø±ÙƒØ©: ' + companySizeField.value);
                }
                if (sectorField && sectorField.value) {
                    details.push('Ø§Ù„Ù‚Ø·Ø§Ø¹: ' + sectorField.value);
                }
                if (jobTitleField && jobTitleField.value) {
                    details.push('Ø§Ù„ÙˆØ¸ÙŠÙØ©: ' + jobTitleField.value);
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