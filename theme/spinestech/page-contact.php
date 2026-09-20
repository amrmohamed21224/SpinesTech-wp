<?php
/**
 * Page Template: Contact ("\u{062A}\u{0648}\u{0627}\u{0635}\u{0644}\u{0020}\u{0645}\u{0639}\u{0646}\u{0627}")
 * File: page-contact.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ── SEO INJECTION ──────────────────────────────────────────────────────────
add_filter('pre_get_document_title', function($title) {
    $is_rtl = function_exists('st_locale') ? st_locale() === 'ar' : false;
    return $is_rtl 
        ? 'تواصل معنا | ابدأ مشروعك التقني مع SpinesTech'
        : 'Contact Us | SpinesTech Software Engineering';
}, 999);

add_action('wp_head', function() {
    $is_rtl = function_exists('st_locale') ? st_locale() === 'ar' : false;
    st_seo_set_description($is_rtl
        ? 'تواصل مع فريق SpinesTech الهندسي لبدء مشروعك أو حجز استشارة تقنية مجانية لتطبيقات الجوال والمنصات الرقمية.'
        : 'Get in touch with the SpinesTech engineering team to launch your next mobile app, dashboard, or digital platform across Saudi Arabia and the GCC.');
}, 3);
// ───────────────────────────────────────────────────────────────────────────

get_header();

$dir    = function_exists( 'st_dir' ) ? st_dir() : 'rtl';
$is_rtl = ( $dir === 'rtl' );
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';
?>

<div class="ct-page" dir="<?php echo esc_attr( $dir ); ?>">
<main>

<!-- ══════════════════════════════════════════
     HERO
══════════════════════════════════════════ -->
<section class="ct-hero">
    <canvas class="st-hero-canvas ct-hero__canvas"></canvas>

    <div class="ct-hero__labels" aria-hidden="true">
        <span class="ct-float-pill ct-float-pill--1"><?php echo esc_html($is_rtl ? "\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0020}\u{062C}\u{062F}\u{064A}\u{062F}" : 'New Project'); ?></span>
        <span class="ct-float-pill ct-float-pill--2"><?php echo esc_html($is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{062C}\u{0648}\u{0627}\u{0644}" : 'Mobile App'); ?></span>
        <span class="ct-float-pill ct-float-pill--3"><?php echo esc_html($is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}" : 'Admin Dashboard'); ?></span>
        <span class="ct-float-pill ct-float-pill--4"><?php echo esc_html($is_rtl ? "\u{0634}\u{0631}\u{0627}\u{0643}\u{0629}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}" : 'Tech Partnership'); ?></span>
        <span class="ct-float-pill ct-float-pill--5"><?php echo esc_html($is_rtl ? "\u{062A}\u{062D}\u{062A}\u{0020}\u{0647}\u{0648}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0634}\u{0631}\u{064A}\u{0643}" : 'White Label'); ?></span>
        <span class="ct-float-pill ct-float-pill--6"><?php echo esc_html($is_rtl ? "\u{062A}\u{0637}\u{0648}\u{064A}\u{0631}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0642}\u{0627}\u{0626}\u{0645}" : 'Product Refactoring'); ?></span>
    </div>

    <div class="container ct-hero__inner">
        <span class="ct-reveal ct-badge" style="--ct-delay:0.05s"><?php echo esc_html($is_rtl ? "\u{062A}\u{0648}\u{0627}\u{0635}\u{0644}\u{0020}\u{0645}\u{0639}\u{0646}\u{0627}" : 'Contact Us'); ?></span>
        <h1 class="ct-reveal ct-hero__title" style="--ct-delay:0.15s">
            <?php echo esc_html($is_rtl ? "\u{0644}\u{0646}\u{062D}\u{0648}\u{0651}\u{0644}\u{0020}\u{0641}\u{0643}\u{0631}\u{062A}\u{0643}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0642}\u{0627}\u{0628}\u{0644}\u{0020}\u{0644}\u{0644}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}\u{0020}\u{0648}\u{0627}\u{0644}\u{0646}\u{0645}\u{0648}" : 'Turn Your Vision Into a Scalable Digital Product'); ?>
        </h1>
        <p class="ct-reveal ct-hero__subtitle" style="--ct-delay:0.25s">
            <?php echo esc_html($is_rtl 
                ? "\u{0646}\u{062D}\u{0646}\u{0020}\u{0634}\u{0631}\u{064A}\u{0643}\u{0643}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{062B}\u{0648}\u{0642}\u{0020}\u{0641}\u{064A}\u{0020}\u{0645}\u{0646}\u{0637}\u{0642}\u{0629}\u{0020}\u{0627}\u{0644}\u{062E}\u{0644}\u{064A}\u{062C}\u{060C}\u{0020}\u{0646}\u{0642}\u{062F}\u{0645}\u{0020}\u{062D}\u{0644}\u{0648}\u{0644}\u{0627}\u{064B}\u{0020}\u{0628}\u{0631}\u{0645}\u{062C}\u{064A}\u{0629}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0629}\u{0020}\u{062A}\u{0628}\u{062F}\u{0623}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{0641}\u{0643}\u{0631}\u{0629}\u{0020}\u{0648}\u{062A}\u{0635}\u{0644}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0627}\u{0633}\u{062A}\u{0642}\u{0631}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0020}\u{0648}\u{0627}\u{0644}\u{062A}\u{0648}\u{0633}\u{0639}\u{0020}\u{0627}\u{0644}\u{0628}\u{0631}\u{0645}\u{062C}\u{064A}\u{002E}" 
                : 'Your trusted engineering partner across Saudi Arabia & the GCC, delivering end-to-end software solutions from concept to full scale.'); ?>
        </p>
        <div class="ct-reveal ct-hero__trust" style="--ct-delay:0.35s">
            <span><span class="material-symbols-outlined">check_circle</span> <?php echo esc_html($is_rtl ? 'سرية تامة لمعلومات مشروعك' : 'Full project confidentiality'); ?></span>
            <span><span class="material-symbols-outlined">check_circle</span> <?php echo esc_html($is_rtl ? 'رد خلال 24 ساعة عمل' : 'Reply within 24 business hours'); ?></span>
            <span><span class="material-symbols-outlined">check_circle</span> <?php echo esc_html($is_rtl ? 'تطبيقات وأنظمة أعمال' : 'Apps & business systems'); ?></span>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     FORM + INFO
══════════════════════════════════════════ -->
<section class="ct-section ct-section--white" id="ct-form-section">
    <div class="container ct-form-grid">

        <!-- Form -->
        <div class="ct-reveal ct-form-col" style="--ct-delay:0.05s">
            <div class="ct-form-card">
                <h3 class="ct-form-card__title"><?php echo esc_html($is_rtl ? 'ابدأ مناقشة مشروعك' : 'Start your project discussion'); ?></h3>

                <p class="ct-form-trust-intro">
                    <?php echo esc_html($is_rtl
                        ? 'نستقبل طلبات تطوير تطبيقات الجوال، منصات الويب، لوحات التحكم، والأنظمة التشغيلية. معلوماتك سرية، ونرد عادة خلال 24 ساعة عمل.'
                        : 'We handle mobile apps, web platforms, dashboards, and operational systems. Your details stay confidential — we typically reply within one business day.'); ?>
                </p>

                <div id="st-form-alert" class="alert alert--hidden" role="alert"></div>
                <div id="st-form-thankyou" class="ct-thankyou ct-thankyou--hidden" role="status" aria-live="polite">
                    <span class="material-symbols-outlined" aria-hidden="true">check_circle</span>
                    <div>
                        <h4><?php echo esc_html($is_rtl ? 'شكراً — استلمنا طلبك' : 'Thank you — we received your request'); ?></h4>
                        <p><?php echo esc_html($is_rtl ? 'سيتواصل معك فريق SpinesTech خلال 24 ساعة عمل لبدء مناقشة مشروعك.' : 'The SpinesTech team will reach out within one business day to discuss your project.'); ?></p>
                    </div>
                </div>

                <form id="st-contact-form" class="ct-form" data-st-contact-form novalidate>
                    <!-- honeypot -->
                    <input type="text" name="website" class="visually-hidden" tabindex="-1" autocomplete="off" />

                    <div class="ct-form-row">
                        <div class="form-group">
                            <label for="ct-name"><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0627}\u{0633}\u{0645}\u{0020}\u{0627}\u{0644}\u{0643}\u{0627}\u{0645}\u{0644}" : 'Full Name'); ?></label>
                            <input class="form-control" type="text" id="ct-name" name="name" placeholder="<?php echo esc_attr($is_rtl ? "\u{0645}\u{062B}\u{0627}\u{0644}\u{003A}\u{0020}\u{0639}\u{0628}\u{062F}\u{0020}\u{0627}\u{0644}\u{0644}\u{0647}\u{0020}\u{0628}\u{0646}\u{0020}\u{0645}\u{062D}\u{0645}\u{062F}" : 'e.g. John Smith'); ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="ct-email"><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0628}\u{0631}\u{064A}\u{062F}\u{0020}\u{0627}\u{0644}\u{0625}\u{0644}\u{0643}\u{062A}\u{0631}\u{0648}\u{0646}\u{064A}" : 'Email Address'); ?></label>
                            <input class="form-control" type="email" id="ct-email" name="email" placeholder="example@domain.com" required />
                        </div>
                    </div>

                    <div class="ct-form-row">
                        <div class="form-group">
                            <label for="ct-company"><?php echo esc_html($is_rtl ? 'الشركة' : 'Company'); ?></label>
                            <input class="form-control" type="text" id="ct-company" name="company" placeholder="<?php echo esc_attr($is_rtl ? 'اسم الشركة (اختياري)' : 'Company name (optional)'); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="ct-phone"><?php echo esc_html($is_rtl ? 'رقم واتساب / الهاتف' : 'WhatsApp / Phone'); ?></label>
                            <input class="form-control" type="tel" id="ct-phone" name="phone" placeholder="+966 000 000 000" />
                        </div>
                    </div>

                    <div class="ct-form-row">
                        <div class="form-group">
                            <label for="ct-country"><?php echo esc_html($is_rtl ? 'الدولة' : 'Country'); ?></label>
                            <select class="form-control" id="ct-country" name="country">
                                <option value="" disabled selected><?php echo esc_html($is_rtl ? "\u{0623}\u{062E}\u{062A}\u{0631}\u{0020}\u{0627}\u{0644}\u{062F}\u{0648}\u{0644}\u{0629}" : 'Select Country'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0633}\u{0639}\u{0648}\u{062F}\u{064A}\u{0629}" : 'Saudi Arabia'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0625}\u{0645}\u{0627}\u{0631}\u{0627}\u{062A}" : 'UAE'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0643}\u{0648}\u{064A}\u{062A}" : 'Kuwait'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0642}\u{0637}\u{0631}" : 'Qatar'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0628}\u{062D}\u{0631}\u{064A}\u{0646}" : 'Bahrain'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0639}\u{0645}\u{0627}\u{0646}" : 'Oman'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0645}\u{0635}\u{0631}" : 'Egypt'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0623}\u{062E}\u{0631}\u{0649}" : 'Other'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="ct-form-row">
                        <div class="form-group">
                            <label for="ct-request-type"><?php echo esc_html($is_rtl ? "\u{0646}\u{0648}\u{0639}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}" : 'Request Type'); ?></label>
                            <select class="form-control" id="ct-request-type" name="request_type">
                                <option value="" disabled selected><?php echo esc_html($is_rtl ? "\u{0628}\u{0631}\u{062C}\u{0627}\u{0621}\u{0020}\u{062A}\u{062D}\u{062F}\u{064A}\u{062F}\u{0020}\u{0646}\u{0648}\u{0639}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}" : 'Please select request type'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0020}\u{062C}\u{062F}\u{064A}\u{062F}" : 'New Project'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{062A}\u{0637}\u{0648}\u{064A}\u{0631}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0642}\u{0627}\u{0626}\u{0645}" : 'Scale Existing Product'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{062C}\u{0648}\u{0627}\u{0644}\u{0020}\u{0641}\u{0642}\u{0637}" : 'Mobile App Only'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{002F}\u{0020}\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{0648}\u{064A}\u{0628}" : 'Web Platform / Dashboard'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0634}\u{0631}\u{0627}\u{0643}\u{0629}\u{0020}\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}" : 'Tech Execution Partnership'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{062A}\u{062D}\u{062A}\u{0020}\u{0647}\u{0648}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0634}\u{0631}\u{064A}\u{0643}" : 'White-Label Execution'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0627}\u{0633}\u{062A}\u{0634}\u{0627}\u{0631}\u{0629}\u{0020}\u{0645}\u{0628}\u{062F}\u{0626}\u{064A}\u{0629}" : 'Initial Advisory'); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ct-stage"><?php echo esc_html($is_rtl ? "\u{0645}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}" : 'Project Stage'); ?></label>
                            <select class="form-control" id="ct-stage" name="stage">
                                <option value="" disabled selected><?php echo esc_html($is_rtl ? "\u{064A}\u{0631}\u{062C}\u{0649}\u{0020}\u{062A}\u{062D}\u{062F}\u{064A}\u{062F}\u{0020}\u{0645}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0020}\u{0627}\u{0644}\u{062D}\u{0627}\u{0644}\u{064A}\u{0629}" : 'Please select project stage'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0641}\u{0643}\u{0631}\u{0629}\u{0020}\u{0641}\u{0642}\u{0637}" : 'Idea Stage'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0644}\u{062F}\u{064A}\u{0020}\u{062A}\u{0635}\u{0645}\u{064A}\u{0645}" : 'UI/UX Design Ready'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0644}\u{062F}\u{064A}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0065}\u{006E}\u{0064}\u{0020}\u{0623}\u{0648}\u{0020}\u{0041}\u{0050}\u{0049}" : 'Backend/API Ready'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0644}\u{062F}\u{064A}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0642}\u{0627}\u{0626}\u{0645}" : 'Live Product'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{0623}\u{062D}\u{062A}\u{0627}\u{062C}\u{0020}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0643}\u{0627}\u{0645}\u{0644}" : 'Full End-to-End Build'); ?></option>
                                <option><?php echo esc_html($is_rtl ? "\u{063A}\u{064A}\u{0631}\u{0020}\u{0645}\u{062D}\u{062F}\u{062F}\u{0020}\u{0628}\u{0639}\u{062F}" : 'Not Specified Yet'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ct-budget"><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0645}\u{064A}\u{0632}\u{0644}\u{0646}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0648}\u{0642}\u{0639}\u{0629}\u{0020}\u{0028}\u{0627}\u{062E}\u{062A}\u{064A}\u{0627}\u{0631}\u{064A}\u{0029}" : 'Estimated Budget (Optional)'); ?></label>
                        <input class="form-control" type="text" id="ct-budget" name="budget" placeholder="<?php echo esc_attr($is_rtl ? "\u{0646}\u{0637}\u{0627}\u{0642}\u{0020}\u{0627}\u{0644}\u{0645}\u{064A}\u{0632}\u{0627}\u{0646}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0631}\u{064A}\u{0628}\u{064A}" : 'Approximate budget range'); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="ct-message"><?php echo esc_html($is_rtl ? "\u{0648}\u{0635}\u{0641}\u{0020}\u{0645}\u{062E}\u{062A}\u{0635}\u{0631}\u{0020}\u{0644}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}" : 'Short Project Overview'); ?></label>
                        <textarea class="form-control" id="ct-message" name="message" rows="4" placeholder="<?php echo esc_attr($is_rtl ? "\u{0623}\u{062E}\u{0628}\u{0631}\u{0646}\u{0627}\u{0020}\u{0627}\u{0644}\u{0645}\u{0632}\u{064A}\u{062F}\u{0020}\u{0639}\u{0646}\u{0620}\u{0631}\u{0624}\u{064A}\u{062A}\u{0643}\u{002E}\u{002E}\u{002E}" : 'Tell us more about your requirements...'); ?>"></textarea>
                    </div>

                    <button type="submit" class="ct-submit-btn">
                        <span><?php echo esc_html($is_rtl ? "\u{0627}\u{0628}\u{062F}\u{0623}\u{0020}\u{0645}\u{0646}\u{0627}\u{0642}\u{0634}\u{0629}\u{0020}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0643}" : 'Start your project discussion'); ?></span>
                    </button>
                    
                    <p class="ct-form-privacy-note" style="margin-top: 1rem; font-size: 0.85rem; opacity: 0.7; text-align: center;">
                        <?php echo $is_rtl 
                            ? "\u{0628}\u{0625}\u{0631}\u{0633}\u{0627}\u{0644}\u{0643}\u{0020}\u{0644}\u{0647}\u{0630}\u{0627}\u{0020}\u{0627}\u{0644}\u{0646}\u{0645}\u{0648}\u{0630}\u{062C}\u{060C}\u{0020}\u{0623}\u{0646}\u{062A}\u{0020}\u{062A}\u{0648}\u{0627}\u{0641}\u{0642}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}<a href=\"" . esc_url( st_url( '/privacy-policy/' ) ) . "\" style=\"color: inherit; text-decoration: underline;\">\u{0633}\u{064A}\u{0627}\u{0633}\u{0629}\u{0020}\u{0627}\u{0644}\u{062E}\u{0635}\u{0648}\u{0635}\u{064A}\u{0629}</a>\u{0020}\u{0627}\u{0644}\u{062E}\u{0627}\u{0635}\u{0629}\u{0020}\u{0628}\u{0646}\u{0627}\u{002E}" 
                            : 'By submitting this form, you agree to our <a href="' . esc_url( st_url( '/privacy-policy/' ) ) . '" style="color: inherit; text-decoration: underline;">Privacy Policy</a>.'; ?>
                    </p>
                </form>
            </div>
        </div>

        <!-- Info sidebar -->
        <div class="ct-reveal ct-info-col" style="--ct-delay:0.15s">

            <div class="ct-contact-panel">
                <div class="ct-contact-panel__glow ct-contact-panel__glow--1" aria-hidden="true"></div>
                <div class="ct-contact-panel__glow ct-contact-panel__glow--2" aria-hidden="true"></div>
                <h3 class="ct-contact-panel__title"><?php echo esc_html($is_rtl ? "\u{062A}\u{0648}\u{0627}\u{0635}\u{0644}\u{0020}\u{0645}\u{0628}\u{0627}\u{0634}\u{0631}" : 'Direct Contact'); ?></h3>

                <div class="ct-contact-item">
                    <span class="material-symbols-outlined">schedule</span>
                    <div>
                        <p class="ct-contact-item__label"><?php echo esc_html($is_rtl ? "\u{0645}\u{062A}\u{0648}\u{0633}\u{0637}\u{0020}\u{0648}\u{0642}\u{062A}\u{0020}\u{0627}\u{0644}\u{0631}\u{062F}" : 'Avg. Response Time'); ?></p>
                        <p class="ct-contact-item__value"><?php echo esc_html($is_rtl ? "\u{062E}\u{0644}\u{0627}\u{0644}\u{0020}\u{0032}\u{0034}\u{0020}\u{0633}\u{0627}\u{0639}\u{0629}\u{0020}\u{0639}\u{0645}\u{0644}" : 'Within 24 Business Hours'); ?></p>
                    </div>
                </div>
                <div class="ct-contact-item">
                    <span class="material-symbols-outlined">mail</span>
                    <div>
                        <p class="ct-contact-item__label"><?php echo esc_html($is_rtl ? 'البريد الإلكتروني' : 'Email'); ?></p>
                        <p class="ct-contact-item__value"><a href="mailto:admin@spinestech.com" data-st-track="email" data-st-location="contact-page">admin@spinestech.com</a></p>
                    </div>
                </div>
                <?php if (function_exists('st_whatsapp_url')) : ?>
                <div class="ct-contact-item">
                    <span class="material-symbols-outlined">chat</span>
                    <div>
                        <p class="ct-contact-item__label">WhatsApp</p>
                        <p class="ct-contact-item__value">
                            <a href="<?php echo esc_url(st_whatsapp_url($is_rtl ? 'مرحباً SpinesTech، أود مناقشة مشروع.' : 'Hello SpinesTech, I would like to discuss a project.')); ?>" data-st-track="whatsapp" data-st-location="contact-page" target="_blank" rel="noopener noreferrer">
                                <?php echo esc_html($is_rtl ? 'تواصل عبر واتساب' : 'Chat on WhatsApp'); ?>
                            </a>
                        </p>
                    </div>
                </div>
                <?php endif; ?>
                <div class="ct-contact-item">
                    <span class="material-symbols-outlined">public</span>
                    <div>
                        <p class="ct-contact-item__label"><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0646}\u{0637}\u{0642}\u{0629}" : 'Region'); ?></p>
                        <p class="ct-contact-item__value"><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0645}\u{0644}\u{0643}\u{0629}\u{0020}\u{0627}\u{0644}\u{0639}\u{0631}\u{0628}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0633}\u{0639}\u{0648}\u{062F}\u{064A}\u{0629}\u{0020}\u{0026}\u{0020}\u{0627}\u{0644}\u{062E}\u{0644}\u{064A}\u{062C}\u{0020}\u{0627}\u{0644}\u{0639}\u{0631}\u{0628}\u{064A}" : 'Saudi Arabia & GCC Region'); ?></p>
                    </div>
                </div>
            </div>

            <?php
            $perks = array(
                array( 'verified',     $is_rtl ? "\u{0631}\u{062F}\u{0020}\u{0648}\u{0627}\u{0636}\u{062D}" : 'Fast Response',                       $is_rtl ? "\u{0646}\u{0631}\u{0627}\u{062C}\u{0639}\u{0020}\u{062C}\u{0645}\u{064A}\u{0639}\u{0020}\u{0627}\u{0633}\u{062A}\u{0641}\u{0633}\u{0627}\u{0631}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0627}\u{0631}\u{064A}\u{0639}\u{0020}\u{062E}\u{0644}\u{0627}\u{0644}\u{0020}\u{0633}\u{0627}\u{0639}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{0020}\u{0648}\u{0646}\u{0631}\u{062F}\u{0020}\u{062E}\u{0644}\u{0627}\u{0644}\u{0020}\u{0032}\u{0034}\u{0020}\u{0633}\u{0627}\u{0639}\u{0629}\u{0020}\u{0639}\u{0645}\u{0644}\u{002E}" : 'We review all project inquiries during business hours and respond within 24 business hours.' ),
                array( 'architecture', $is_rtl ? "\u{0646}\u{0637}\u{0627}\u{0642}\u{0020}\u{0623}\u{0648}\u{0636}\u{062D}\u{0020}\u{0642}\u{0628}\u{0644}\u{0020}\u{0627}\u{0644}\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}" : 'Clear Scope Roadmap',         $is_rtl ? "\u{0646}\u{0642}\u{0648}\u{0645}\u{0020}\u{0628}\u{062A}\u{062D}\u{0644}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0627}\u{064B}\u{0020}\u{0644}\u{0646}\u{0639}\u{0637}\u{064A}\u{0643}\u{0020}\u{0635}\u{0648}\u{0631}\u{0629}\u{0020}\u{062F}\u{0642}\u{064A}\u{0642}\u{0629}\u{0020}\u{0639}\u{0646}\u{0020}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0637}\u{0648}\u{064A}\u{0631}\u{002E}" : 'We analyze tech specs up-front for absolute delivery clarity.' ),
                array( 'groups',       $is_rtl ? "\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0020}\u{0644}\u{0644}\u{0634}\u{0631}\u{0643}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{0634}\u{0631}\u{0643}\u{0627}\u{0621}" : 'Agency & Corporate Ready',       $is_rtl ? "\u{0646}\u{0645}\u{0627}\u{0630}\u{062C}\u{0020}\u{062A}\u{0639}\u{0627}\u{0648}\u{0646}\u{0020}\u{0645}\u{0631}\u{0646}\u{0629}\u{0020}\u{062A}\u{0646}\u{0627}\u{0633}\u{0628}\u{0020}\u{0627}\u{0644}\u{0634}\u{0631}\u{0643}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0646}\u{0627}\u{0634}\u{0626}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0648}\u{0643}\u{0627}\u{0644}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0628}\u{0631}\u{0645}\u{062C}\u{064A}\u{0629}\u{002E}" : 'Flexible engagement models for startups, scaleups, and agencies.' ),
            );
            foreach ( $perks as $perk ) :
                list( $icon, $ptitle, $ptext ) = $perk;
            ?>
            <div class="ct-perk-card">
                <div class="ct-perk-card__icon">
                    <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                </div>
                <div>
                    <h4 class="ct-perk-card__title"><?php echo esc_html( $ptitle ); ?></h4>
                    <p class="ct-perk-card__text"><?php echo esc_html( $ptext ); ?></p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     REQUEST TYPE CARDS
══════════════════════════════════════════ -->
<section class="ct-section ct-section--gray">
    <div class="container">
        <div class="ct-reveal ct-section__header ct-section__header--center">
            <h2 class="ct-h2"><?php echo esc_html($is_rtl ? "\u{0645}\u{0627}\u{0020}\u{0627}\u{0644}\u{0630}\u{064A}\u{0020}\u{062A}\u{062D}\u{062A}\u{0627}\u{062C}\u{0647}\u{0020}\u{0627}\u{0644}\u{064A}\u{0648}\u{0645}\u{061F}" : 'What Do You Need Built Today?'); ?></h2>
            <p class="ct-lead"><?php echo esc_html($is_rtl ? "\u{062D}\u{0644}\u{0648}\u{0644}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{0020}\u{0645}\u{0635}\u{0645}\u{0645}\u{0629}\u{0020}\u{0644}\u{062A}\u{0644}\u{0628}\u{064A}\u{0629}\u{0020}\u{0627}\u{062D}\u{062A}\u{064A}\u{0627}\u{062C}\u{0627}\u{062A}\u{0643}\u{0020}\u{0627}\u{0644}\u{062E}\u{0627}\u{0635}\u{0629}" : 'Engineered software solutions tailored to your goals'); ?></p>
        </div>

        <div class="ct-cards-grid">
            <?php
            $request_cards = array(
                array( 'rocket_launch', $is_rtl ? "\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0020}\u{062C}\u{062F}\u{064A}\u{062F}" : 'Greenfield MVP / App',              $is_rtl ? "\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{0635}\u{0641}\u{0631}\u{060C}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{0641}\u{0643}\u{0631}\u{0629}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0625}\u{0637}\u{0644}\u{0627}\u{0642}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0627}\u{062C}\u{0631}\u{002E}" : 'Building products ground-up, from specification to store launch.' ),
                array( 'upgrade',       $is_rtl ? "\u{062A}\u{0637}\u{0648}\u{064A}\u{0631}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0642}\u{0627}\u{0626}\u{0645}" : 'Scaling Existing Platform',         $is_rtl ? "\u{062A}\u{062D}\u{0633}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0623}\u{062F}\u{0627}\u{0621}\u{060C}\u{0020}\u{0625}\u{0636}\u{0627}\u{0641}\u{0629}\u{0020}\u{0645}\u{064A}\u{0632}\u{0627}\u{062A}\u{0020}\u{062C}\u{062F}\u{064A}\u{062F}\u{0629}\u{060C}\u{0020}\u{0623}\u{0648}\u{0020}\u{0625}\u{0639}\u{0627}\u{062F}\u{0629}\u{0020}\u{0647}\u{064A}\u{0643}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{0643}\u{0648}\u{062F}\u{002E}" : 'Performance boost, new modules, and code refactoring.' ),
                array( 'smartphone',    $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{062C}\u{0648}\u{0627}\u{0644}\u{0020}\u{0641}\u{0642}\u{0637}" : 'Mobile App Engineering',          $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0627}\u{062A}\u{0020}\u{006E}\u{0061}\u{0074}\u{0069}\u{0076}\u{0065}\u{0020}\u{0623}\u{0648}\u{0020}\u{0063}\u{0072}\u{006F}\u{0073}\u{0073}\u{002D}\u{0070}\u{006C}\u{0061}\u{0074}\u{0066}\u{006F}\u{0072}\u{006D}\u{0020}\u{0628}\u{062A}\u{062C}\u{0631}\u{0628}\u{0629}\u{0020}\u{0645}\u{0633}\u{062A}\u{062E}\u{062F}\u{0645}\u{0020}\u{0627}\u{0633}\u{062A}\u{062B}\u{0646}\u{0627}\u{0626}\u{064A}\u{0629}\u{002E}" : 'Native or cross-platform mobile builds with smooth UX.' ),
                array( 'dashboard',     $is_rtl ? "\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{0648}\u{064A}\u{0628}\u{0020}\u{002F}\u{0020}\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}" : 'Web Platform & Dashboard',    $is_rtl ? "\u{0623}\u{0646}\u{0638}\u{0645}\u{0629}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0628}\u{064A}\u{0627}\u{0646}\u{0627}\u{062A}\u{0020}\u{0645}\u{0639}\u{0642}\u{062F}\u{0629}\u{0020}\u{0648}\u{0645}\u{0646}\u{0635}\u{0627}\u{062A}\u{0020}\u{0053}\u{0061}\u{0061}\u{0053}\u{0020}\u{0627}\u{062D}\u{062A}\u{0631}\u{0627}\u{0641}\u{064A}\u{0629}\u{002E}" : 'Complex data management consoles and SaaS platforms.' ),
                array( 'handshake',     $is_rtl ? "\u{0634}\u{0631}\u{0627}\u{0643}\u{0629}\u{0020}\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}" : 'Tech Partner Co-Execution',       $is_rtl ? "\u{0646}\u{0639}\u{0645}\u{0644}\u{0020}\u{0643}\u{0641}\u{0631}\u{064A}\u{0642}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0020}\u{062F}\u{0627}\u{062E}\u{0644}\u{064A}\u{0020}\u{0644}\u{0634}\u{0631}\u{0643}\u{062A}\u{0643}\u{0020}\u{0628}\u{0645}\u{0631}\u{0648}\u{0646}\u{0629}\u{0020}\u{062A}\u{0627}\u{0645}\u{0629}\u{002E}" : 'Operating as an integrated extension of your engineering team.' ),
                array( 'visibility_off',$is_rtl ? "\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{062A}\u{062D}\u{062A}\u{0020}\u{0647}\u{0648}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0634}\u{0631}\u{064A}\u{0643}" : 'White-Label Agency Partner',   $is_rtl ? "\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0627}\u{0631}\u{064A}\u{0639}\u{0020}\u{0644}\u{0635}\u{0627}\u{0644}\u{062D}\u{0020}\u{0627}\u{0644}\u{0648}\u{0643}\u{0627}\u{0644}\u{0627}\u{062A}\u{0020}\u{0643}\u{0641}\u{0631}\u{064A}\u{0642}\u{0020}\u{063A}\u{064A}\u{0631}\u{0020}\u{0645}\u{0639}\u{0644}\u{0646}\u{0020}\u{0028}\u{0057}\u{0068}\u{0069}\u{0074}\u{0065}\u{0020}\u{004C}\u{0061}\u{0062}\u{0065}\u{006C}\u{0029}\u{002E}" : 'Executing projects under your brand for your end-clients.' ),
            );
            foreach ( $request_cards as $i => $card ) :
                list( $icon, $ctitle, $ctext ) = $card;
            ?>
            <div class="ct-reveal ct-req-card" style="--ct-delay:<?php echo esc_attr( $i * 0.07 ); ?>s">
                <div class="ct-req-card__icon">
                    <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                </div>
                <h4 class="ct-req-card__title"><?php echo esc_html( $ctitle ); ?></h4>
                <p class="ct-req-card__text"><?php echo esc_html( $ctext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     WHAT HAPPENS NEXT — timeline
══════════════════════════════════════════ -->
<section class="ct-section ct-section--white">
    <div class="container">
        <div class="ct-reveal ct-section__header ct-section__header--center">
            <h2 class="ct-h2"><?php echo esc_html($is_rtl ? "\u{0645}\u{0627}\u{0630}\u{0627}\u{0020}\u{064A}\u{062D}\u{062F}\u{062B}\u{0020}\u{0628}\u{0639}\u{062F}\u{0020}\u{0625}\u{0631}\u{0633}\u{0627}\u{0644}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{061F}" : 'What Happens After You Submit?'); ?></h2>
        </div>

        <div class="ct-timeline">
            <div class="ct-timeline__line" aria-hidden="true"></div>
            <?php
            $timeline = array(
                array( '1', $is_rtl ? "\u{0645}\u{0631}\u{0627}\u{062C}\u{0639}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0641}\u{0627}\u{0635}\u{064A}\u{0644}" : 'Spec Review', $is_rtl ? "\u{0641}\u{0631}\u{064A}\u{0642}\u{0646}\u{0627}\u{0020}\u{064A}\u{062D}\u{0644}\u{0644}\u{0020}\u{0637}\u{0644}\u{0628}\u{0643}\u{0020}\u{0628}\u{062F}\u{0642}\u{0629}\u{0020}\u{0644}\u{0641}\u{0647}\u{0645}\u{0020}\u{0627}\u{0644}\u{0631}\u{0624}\u{064A}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0623}\u{0647}\u{062F}\u{0627}\u{0641}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{002E}" : 'Our engineers review your inquiry to understand tech goals.' ),
                array( '2', $is_rtl ? "\u{062A}\u{062D}\u{062F}\u{064A}\u{062F}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}" : 'Architecture Fit', $is_rtl ? "\u{0646}\u{0642}\u{062A}\u{0631}\u{062D}\u{0020}\u{0623}\u{0641}\u{0636}\u{0644}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{0645}\u{0646}\u{0647}\u{062C}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0629}\u{0020}\u{0644}\u{0645}\u{064A}\u{0632}\u{0627}\u{0646}\u{064A}\u{062A}\u{0643}\u{0020}\u{0648}\u{062C}\u{062F}\u{0648}\u{0644}\u{0643}\u{002E}" : 'We propose optimal stacks and delivery timelines for your budget.' ),
                array( '3', $is_rtl ? "\u{0645}\u{0646}\u{0627}\u{0642}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{0646}\u{0637}\u{0627}\u{0642}" : 'Scope Alignment', $is_rtl ? "\u{062C}\u{0644}\u{0633}\u{0629}\u{0020}\u{0639}\u{0645}\u{0644}\u{0020}\u{0644}\u{0636}\u{0628}\u{0637}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{0627}\u{0635}\u{0641}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0646}\u{0647}\u{0627}\u{0626}\u{064A}\u{0629}\u{0020}\u{0648}\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{062A}\u{0648}\u{0627}\u{0641}\u{0642}\u{0020}\u{0627}\u{0644}\u{0631}\u{0624}\u{0649}\u{002E}" : 'A discovery session to align on final scope and deliverables.' ),
                array( '4', $is_rtl ? "\u{062E}\u{0637}\u{0648}\u{0629}\u{0020}\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{0648}\u{0627}\u{0636}\u{062D}\u{0629}" : 'Sprint Kickoff', $is_rtl ? "\u{0627}\u{0644}\u{0627}\u{0646}\u{062A}\u{0642}\u{0627}\u{0644}\u{0020}\u{0627}\u{0644}\u{0641}\u{0639}\u{0644}\u{064A}\u{0020}\u{0644}\u{0644}\u{062A}\u{0639}\u{0627}\u{0642}\u{062F}\u{0020}\u{0648}\u{0627}\u{0644}\u{0628}\u{062F}\u{0621}\u{0020}\u{0641}\u{064A}\u{0020}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0643}\u{0020}\u{0627}\u{0644}\u{0631}\u{0642}\u{0645}\u{064A}\u{002E}" : 'Formal agreement and immediate sprint kickoff.' ),
            );
            foreach ( $timeline as $i => $step ) :
                list( $num, $stitle, $stext ) = $step;
            ?>
            <div class="ct-reveal ct-timeline__step" style="--ct-delay:<?php echo esc_attr( $i * 0.08 ); ?>s">
                <div class="ct-timeline__num"><?php echo esc_html( $num ); ?></div>
                <h4 class="ct-timeline__title"><?php echo esc_html( $stitle ); ?></h4>
                <p class="ct-timeline__text"><?php echo esc_html( $stext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     B2B PARTNERSHIP
══════════════════════════════════════════ -->
<section class="ct-section ct-section--dark">
    <div class="ct-b2b__glow" aria-hidden="true"></div>
    <div class="container ct-b2b">

        <div class="ct-reveal ct-b2b__content" style="--ct-delay:0.05s">
            <span class="ct-badge ct-badge--light"><?php echo esc_html($is_rtl ? "\u{0634}\u{0631}\u{0627}\u{0643}\u{0627}\u{062A}\u{0020}\u{0042}\u{0032}\u{0042}" : 'B2B Tech Alliances'); ?></span>
            <h2 class="ct-b2b__title"><?php echo esc_html($is_rtl ? "\u{0646}\u{062F}\u{0639}\u{0645}\u{0020}\u{0627}\u{0644}\u{0648}\u{0643}\u{0627}\u{0644}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{0634}\u{0631}\u{0643}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{0020}\u{0643}\u{0630}\u{0631}\u{0627}\u{0639}\u{0020}\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{0645}\u{0648}\u{062B}\u{0648}\u{0642}" : 'Supporting Agencies & Tech Firms as a Dedicated Execution Arm'); ?></h2>
            <p class="ct-b2b__text"><?php echo esc_html($is_rtl ? "\u{0625}\u{0630}\u{0627}\u{0020}\u{0643}\u{0646}\u{062A}\u{0020}\u{0648}\u{0643}\u{0627}\u{0644}\u{0629}\u{0020}\u{062A}\u{0633}\u{0648}\u{064A}\u{0642}\u{060C}\u{0020}\u{0634}\u{0631}\u{0643}\u{0629}\u{0020}\u{0627}\u{0633}\u{062A}\u{0634}\u{0627}\u{0631}\u{0627}\u{062A}\u{060C}\u{0020}\u{0623}\u{0648}\u{0020}\u{0634}\u{0631}\u{0643}\u{0629}\u{0020}\u{0628}\u{0631}\u{0645}\u{062C}\u{064A}\u{0627}\u{062A}\u{0020}\u{062A}\u{062D}\u{062A}\u{0627}\u{062C}\u{0020}\u{0644}\u{062A}\u{0648}\u{0633}\u{064A}\u{0639}\u{0020}\u{0642}\u{062F}\u{0631}\u{0627}\u{062A}\u{0020}\u{0641}\u{0631}\u{064A}\u{0642}\u{0643}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{060C}\u{0020}\u{0641}\u{0646}\u{062D}\u{0646}\u{0020}\u{0646}\u{0648}\u{0641}\u{0631}\u{0020}\u{0644}\u{0643}\u{0020}\u{0646}\u{0645}\u{0627}\u{0630}\u{062C}\u{0020}\u{062A}\u{0639}\u{0627}\u{0648}\u{0646}\u{0020}\u{0627}\u{062D}\u{062A}\u{0631}\u{0627}\u{0641}\u{064A}\u{0629}\u{0020}\u{062A}\u{062D}\u{062A}\u{0020}\u{0647}\u{0648}\u{064A}\u{062A}\u{0643}\u{0020}\u{0623}\u{0648}\u{0020}\u{0643}\u{0634}\u{0631}\u{064A}\u{0643}\u{0020}\u{0627}\u{0633}\u{062A}\u{0631}\u{0627}\u{062A}\u{064A}\u{062C}\u{064A}\u{002E}" : 'If you are a design agency, consultancy, or software company expanding engineering capacity, we offer flexible white-label and strategic co-execution models.'); ?></p>

            <div class="ct-b2b__box">
                <p class="ct-b2b__box-title"><?php echo esc_html($is_rtl ? "\u{0646}\u{0645}\u{0627}\u{0630}\u{062C}\u{0646}\u{0627}\u{0020}\u{0645}\u{062B}\u{0627}\u{0644}\u{064A}\u{0629}\u{0020}\u{0644}\u{0640}\u{003A}" : 'Ideal for:'); ?></p>
                <ul class="ct-b2b__list">
                    <li><span class="material-symbols-outlined">check_circle</span> <?php echo esc_html($is_rtl ? "\u{0648}\u{0643}\u{0627}\u{0644}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0648}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{062A}\u{064A}\u{0020}\u{062A}\u{0631}\u{064A}\u{062F}\u{0020}\u{062A}\u{0642}\u{062F}\u{064A}\u{0645}\u{0020}\u{062D}\u{0644}\u{0648}\u{0644}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0629}\u{0020}\u{0644}\u{0639}\u{0645}\u{0644}\u{0627}\u{0626}\u{0647}\u{0627}\u{002E}" : 'Agencies offering full-scale app builds to their clients.'); ?></li>
                    <li><span class="material-symbols-outlined">check_circle</span> <?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0634}\u{0631}\u{0643}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{064A}\u{0020}\u{062A}\u{062D}\u{062A}\u{0627}\u{062C}\u{0020}\u{0641}\u{0631}\u{064A}\u{0642}\u{0020}\u{062F}\u{0639}\u{0645}\u{0020}\u{0633}\u{0631}\u{064A}\u{0639}\u{0020}\u{0644}\u{0645}\u{0634}\u{0627}\u{0631}\u{064A}\u{0639}\u{0020}\u{0645}\u{0641}\u{0627}\u{062C}\u{0626}\u{0629}\u{002E}" : 'Tech companies needing rapid engineering scaling for overflow projects.'); ?></li>
                    <li><span class="material-symbols-outlined">check_circle</span> <?php echo esc_html($is_rtl ? "\u{0631}\u{0648}\u{0627}\u{062F}\u{0020}\u{0627}\u{0644}\u{0623}\u{0639}\u{0645}\u{0627}\u{0644}\u{0020}\u{0627}\u{0644}\u{0630}\u{064A}\u{0646}\u{0020}\u{064A}\u{062D}\u{062A}\u{0627}\u{062C}\u{0648}\u{0646}\u{0020}\u{0634}\u{0631}\u{064A}\u{0643}\u{0627}\u{064B}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0627}\u{064B}\u{0020}\u{0645}\u{0624}\u{0633}\u{0633}\u{0627}\u{064B}\u{0020}\u{0028}\u{0043}\u{0054}\u{004F}\u{0020}\u{0061}\u{0073}\u{0020}\u{0061}\u{0020}\u{0053}\u{0065}\u{0072}\u{0076}\u{0069}\u{0063}\u{0065}\u{0029}\u{002E}" : 'Founders seeking a strategic CTO-as-a-Service partner.'); ?></li>
                </ul>
            </div>
        </div>

        <div class="ct-b2b__grid">
            <?php
            $b2b_cards = array(
                array( 'partner_exchange', $is_rtl ? "\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{0644}\u{0635}\u{0627}\u{0644}\u{062D}\u{0020}\u{0634}\u{0631}\u{064A}\u{0643}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}" : 'Strategic Co-Execution',        $is_rtl ? "\u{0646}\u{0639}\u{0645}\u{0644}\u{0020}\u{0645}\u{0639}\u{0643}\u{0020}\u{0643}\u{0641}\u{0631}\u{064A}\u{0642}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0020}\u{0644}\u{0625}\u{062A}\u{0645}\u{0627}\u{0645}\u{0020}\u{0645}\u{0634}\u{0627}\u{0631}\u{064A}\u{0639}\u{0020}\u{0639}\u{0645}\u{0644}\u{0627}\u{0626}\u{0643}\u{0020}\u{0628}\u{0623}\u{0639}\u{0644}\u{0649}\u{0020}\u{062C}\u{0648}\u{062F}\u{0629}\u{002E}" : 'Working with your team to deliver client software with enterprise quality.' ),
                array( 'shield_person',    $is_rtl ? "\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{062A}\u{062D}\u{062A}\u{0020}\u{0647}\u{0648}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0634}\u{0631}\u{064A}\u{0643}" : 'White-Label Delivery',        $is_rtl ? "\u{0057}\u{0068}\u{0069}\u{0074}\u{0065}\u{002D}\u{004C}\u{0061}\u{0062}\u{0065}\u{006C}\u{003A}\u{0020}\u{0646}\u{062D}\u{0646}\u{0020}\u{0646}\u{0639}\u{0645}\u{0644}\u{0020}\u{062E}\u{0644}\u{0641}\u{0020}\u{0627}\u{0644}\u{0643}\u{0648}\u{0627}\u{0644}\u{064A}\u{0633}\u{060C}\u{0020}\u{0648}\u{0623}\u{0646}\u{062A}\u{0020}\u{0627}\u{0644}\u{0648}\u{0627}\u{062C}\u{0647}\u{0629}\u{0020}\u{0623}\u{0645}\u{0627}\u{0645}\u{0020}\u{0639}\u{0645}\u{064A}\u{0644}\u{0643}\u{002E}" : 'White-label execution behind the scenes while you own the client relationship.' ),
                array( 'group_add',        $is_rtl ? "\u{062F}\u{0639}\u{0645}\u{0020}\u{0641}\u{0631}\u{0642}\u{0020}\u{0627}\u{0644}\u{062A}\u{0637}\u{0648}\u{064A}\u{0631}" : 'Team Augmentation',              $is_rtl ? "\u{0632}\u{064A}\u{0627}\u{062F}\u{0629}\u{0020}\u{0633}\u{0639}\u{0629}\u{0020}\u{0641}\u{0631}\u{064A}\u{0642}\u{0643}\u{0020}\u{0627}\u{0644}\u{062D}\u{0627}\u{0644}\u{064A}\u{0020}\u{0628}\u{0645}\u{0637}\u{0648}\u{0631}\u{064A}\u{0646}\u{0020}\u{0645}\u{062A}\u{062E}\u{0635}\u{0635}\u{064A}\u{0646}\u{0020}\u{0641}\u{064A}\u{0020}\u{0645}\u{062C}\u{0627}\u{0644}\u{0627}\u{062A}\u{0020}\u{0645}\u{062D}\u{062F}\u{062F}\u{0629}\u{002E}" : 'Augmenting internal teams with specialized senior developers.' ),
                array( 'extension',        $is_rtl ? "\u{062A}\u{0637}\u{0648}\u{064A}\u{0631}\u{0020}\u{0648}\u{062D}\u{062F}\u{0627}\u{062A}\u{0020}\u{062F}\u{0627}\u{062E}\u{0644}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0642}\u{0627}\u{0626}\u{0645}" : 'Module Engineering',   $is_rtl ? "\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0645}\u{064A}\u{0632}\u{0627}\u{062A}\u{0020}\u{0623}\u{0648}\u{0020}\u{004D}\u{0069}\u{0063}\u{0072}\u{006F}\u{0073}\u{0065}\u{0072}\u{0076}\u{0069}\u{0063}\u{0065}\u{0073}\u{0020}\u{0645}\u{0633}\u{062A}\u{0642}\u{0644}\u{0629}\u{0020}\u{0644}\u{062F}\u{0645}\u{062C}\u{0647}\u{0627}\u{0020}\u{0641}\u{064A}\u{0020}\u{0623}\u{0646}\u{0638}\u{0645}\u{062A}\u{0643}\u{002E}" : 'Engineering standalone microservices or custom modules.' ),
            );
            foreach ( $b2b_cards as $i => $card ) :
                list( $icon, $ctitle, $ctext ) = $card;
            ?>
            <div class="ct-reveal ct-b2b-card" style="--ct-delay:<?php echo esc_attr( 0.1 + $i * 0.07 ); ?>s">
                <span class="material-symbols-outlined ct-b2b-card__icon"><?php echo esc_html( $icon ); ?></span>
                <h4 class="ct-b2b-card__title"><?php echo esc_html( $ctitle ); ?></h4>
                <p class="ct-b2b-card__text"><?php echo esc_html( $ctext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ══════════════════════════════════════════
     FAQ
══════════════════════════════════════════ -->
<section class="ct-section ct-section--white">
    <div class="container ct-faq-container">
        <div class="ct-reveal ct-section__header ct-section__header--center">
            <h2 class="ct-h2"><?php echo esc_html($is_rtl ? "\u{0627}\u{0644}\u{0623}\u{0633}\u{0626}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{0634}\u{0627}\u{0626}\u{0639}\u{0629}" : 'Frequently Asked Questions'); ?></h2>
        </div>

        <div class="ct-faq">
            <?php
            $faqs = array(
                array( $is_rtl ? "\u{0643}\u{0645}\u{0020}\u{062A}\u{0633}\u{062A}\u{063A}\u{0631}\u{0642}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{062F}\u{0621}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{061F}" : 'How long does it take to kick off a project?', $is_rtl ? "\u{0628}\u{0639}\u{062F}\u{0020}\u{0627}\u{0633}\u{062A}\u{0644}\u{0627}\u{0645}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{0020}\u{0648}\u{0645}\u{0646}\u{0627}\u{0642}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0641}\u{0627}\u{0635}\u{064A}\u{0644}\u{060C}\u{0020}\u{0639}\u{0627}\u{062F}\u{0629}\u{0020}\u{0645}\u{0627}\u{0020}\u{0646}\u{0628}\u{062F}\u{0623}\u{0020}\u{0641}\u{064A}\u{0020}\u{0645}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{062E}\u{0637}\u{064A}\u{0637}\u{0020}\u{0648}\u{0627}\u{0644}\u{0646}\u{0645}\u{0630}\u{062C}\u{0629}\u{0020}\u{062E}\u{0644}\u{0627}\u{0644}\u{0020}\u{0033}\u{002D}\u{0035}\u{0020}\u{0623}\u{064A}\u{0627}\u{0645}\u{0020}\u{0639}\u{0645}\u{0644}\u{0020}\u{0645}\u{0646}\u{0020}\u{062A}\u{0648}\u{0642}\u{064A}\u{0639}\u{0020}\u{0627}\u{0644}\u{0627}\u{062A}\u{0641}\u{0627}\u{0642}\u{064A}\u{0629}\u{002E}" : 'Following initial inquiry review and scope alignment, we typically kick off sprint planning within 3-5 business days.', true ),
                array( $is_rtl ? "\u{0647}\u{0644}\u{0020}\u{062A}\u{0642}\u{062F}\u{0645}\u{0648}\u{0646}\u{0020}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062F}\u{0639}\u{0645}\u{0020}\u{0627}\u{0644}\u{0641}\u{0646}\u{064A}\u{0020}\u{0628}\u{0639}\u{062F}\u{0020}\u{0627}\u{0644}\u{0625}\u{0637}\u{0644}\u{0627}\u{0642}\u{061F}" : 'Do you provide post-launch maintenance & support?', $is_rtl ? "\u{0646}\u{0639}\u{0645}\u{060C}\u{0020}\u{062C}\u{0645}\u{064A}\u{0639}\u{0020}\u{0645}\u{0634}\u{0627}\u{0631}\u{064A}\u{0639}\u{0646}\u{0627}\u{0020}\u{062A}\u{0634}\u{0645}\u{0644}\u{0020}\u{0641}\u{062A}\u{0631}\u{0629}\u{0020}\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{0648}\u{062F}\u{0639}\u{0645}\u{0020}\u{0641}\u{0646}\u{064A}\u{0020}\u{0645}\u{062C}\u{0627}\u{0646}\u{064A}\u{0629}\u{060C}\u{0020}\u{0645}\u{0639}\u{0020}\u{0625}\u{0645}\u{0643}\u{0627}\u{0646}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0639}\u{0627}\u{0642}\u{062F}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0635}\u{064A}\u{0627}\u{0646}\u{0629}\u{0020}\u{0633}\u{0646}\u{0648}\u{064A}\u{0629}\u{0020}\u{0644}\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{0627}\u{0633}\u{062A}\u{0642}\u{0631}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0648}\u{062A}\u{062D}\u{062F}\u{064A}\u{062B}\u{0647}\u{002E}" : 'Yes, all builds include a warranty and SLA support period, with optional long-term annual maintenance contracts.', false ),
                array( $is_rtl ? "\u{0647}\u{0644}\u{0020}\u{064A}\u{0645}\u{0643}\u{0646}\u{0643}\u{0645}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{0020}\u{0645}\u{0639}\u{0020}\u{0641}\u{0631}\u{064A}\u{0642}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0020}\u{062F}\u{0627}\u{062E}\u{0644}\u{064A}\u{0020}\u{0644}\u{062F}\u{064A}\u{0646}\u{0627}\u{061F}" : 'Can you collaborate with our in-house dev team?', $is_rtl ? "\u{0628}\u{0627}\u{0644}\u{062A}\u{0623}\u{0643}\u{064A}\u{062F}\u{060C}\u{0020}\u{0644}\u{062F}\u{064A}\u{0646}\u{0627}\u{0020}\u{062E}\u{0628}\u{0631}\u{0629}\u{0020}\u{0648}\u{0627}\u{0633}\u{0639}\u{0629}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0627}\u{0646}\u{062F}\u{0645}\u{0627}\u{062C}\u{0020}\u{0645}\u{0639}\u{0020}\u{0627}\u{0644}\u{0641}\u{0631}\u{0642}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0626}\u{0645}\u{0629}\u{060C}\u{0020}\u{0633}\u{0648}\u{0627}\u{0621}\u{0020}\u{0641}\u{064A}\u{0020}\u{0643}\u{062A}\u{0627}\u{0628}\u{0629}\u{0020}\u{0627}\u{0644}\u{0643}\u{0648}\u{062F}\u{0020}\u{0623}\u{0648}\u{0020}\u{0645}\u{0631}\u{0627}\u{062C}\u{0639}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0639}\u{0645}\u{0627}\u{0631}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{0020}\u{0623}\u{0648}\u{0020}\u{062A}\u{0637}\u{0648}\u{064A}\u{0631}\u{0020}\u{0648}\u{062D}\u{062F}\u{0627}\u{062A}\u{0020}\u{0645}\u{0633}\u{062A}\u{0642}\u{0644}\u{0629}\u{002E}" : 'Absolutely. We regularly integrate with client dev teams for co-execution, architecture audits, or module builds.', false ),
                array( $is_rtl ? "\u{0647}\u{0644}\u{0020}\u{062A}\u{062D}\u{0641}\u{0638}\u{0648}\u{0646}\u{0020}\u{062D}\u{0642}\u{0648}\u{0642}\u{0020}\u{0627}\u{0644}\u{0645}\u{0644}\u{0643}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0641}\u{0643}\u{0631}\u{064A}\u{0629}\u{0020}\u{0644}\u{0644}\u{0643}\u{0648}\u{062F}\u{061F}" : 'Who owns the source code and IP rights?', $is_rtl ? "\u{0628}\u{0645}\u{062C}\u{0631}\u{062F}\u{0020}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0020}\u{0648}\u{062F}\u{0641}\u{0639}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{062D}\u{0642}\u{0627}\u{062A}\u{060C}\u{0020}\u{062A}\u{0646}\u{062A}\u{0642}\u{0644}\u{0020}\u{0645}\u{0644}\u{0643}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0643}\u{0648}\u{062F}\u{0020}\u{0627}\u{0644}\u{0645}\u{0635}\u{062F}\u{0631}\u{064A}\u{0020}\u{0648}\u{0627}\u{0644}\u{062D}\u{0642}\u{0648}\u{0642}\u{0020}\u{0627}\u{0644}\u{0641}\u{0643}\u{0631}\u{064A}\u{0629}\u{0020}\u{0628}\u{0627}\u{0644}\u{0643}\u{0627}\u{0645}\u{0644}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}\u{0020}\u{0648}\u{0641}\u{0642}\u{0627}\u{064B}\u{0020}\u{0644}\u{0644}\u{0627}\u{062A}\u{0641}\u{0627}\u{0642}\u{0020}\u{0627}\u{0644}\u{0645}\u{0628}\u{0631}\u{0645}\u{002E}" : 'Upon project completion, the full source code, IP rights, and technical documentation are legally transferred to you.', false ),
            );
            foreach ( $faqs as $i => $faq ) :
                list( $q, $a, $open ) = $faq;
            ?>
            <details class="ct-faq__item"<?php echo $open ? ' open' : ''; ?>>
                <summary class="ct-faq__trigger">
                    <?php echo esc_html( $q ); ?>
                    <span class="material-symbols-outlined ct-faq__chevron">expand_more</span>
                </summary>
                <div class="ct-faq__panel"><?php echo esc_html( $a ); ?></div>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════ -->
<section class="ct-section-wrap-cta">
    <div class="container">
        <div class="ct-cta">
            <svg class="ct-cta__waves" preserveAspectRatio="none" viewBox="0 0 100 100" aria-hidden="true">
                <path d="M0,50 Q25,25 50,50 T100,50" fill="none" stroke="white" stroke-width="0.15"></path>
                <path d="M0,30 Q25,55 50,30 T100,30" fill="none" stroke="white" stroke-width="0.15"></path>
                <path d="M0,70 Q25,45 50,70 T100,70" fill="none" stroke="white" stroke-width="0.15"></path>
            </svg>
            <div class="ct-cta__inner">
                <h2 class="ct-reveal ct-cta__title"><?php echo esc_html($is_rtl ? "\u{0645}\u{0633}\u{062A}\u{0639}\u{062F}\u{0020}\u{0644}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0634}\u{064A}\u{0621}\u{0020}\u{0627}\u{0633}\u{062A}\u{062B}\u{0646}\u{0627}\u{0626}\u{064A}\u{061F}" : 'Ready to Build Something Exceptional?'); ?></h2>
                <p class="ct-reveal ct-cta__text"><?php echo esc_html($is_rtl ? "\u{0641}\u{0631}\u{064A}\u{0642}\u{0020}\u{0053}\u{0070}\u{0069}\u{006E}\u{0065}\u{0073}\u{0054}\u{0065}\u{0063}\u{0068}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0020}\u{062C}\u{0627}\u{0647}\u{0632}\u{0020}\u{0644}\u{0644}\u{0627}\u{0633}\u{062A}\u{0645}\u{0627}\u{0639}\u{0020}\u{0644}\u{062A}\u{062D}\u{062F}\u{064A}\u{0643}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{062F}\u{0645}\u{0020}\u{0648}\u{062A}\u{062D}\u{0648}\u{064A}\u{0644}\u{0647}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0648}\u{0627}\u{0642}\u{0639}\u{0020}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0645}\u{0644}\u{0645}\u{0648}\u{0633}\u{002E}" : 'The SpinesTech engineering team is ready to analyze your next challenge and build a market-ready solution.'); ?></p>
                <div class="ct-reveal ct-cta__actions">
                    <a href="#ct-form-section" class="ct-btn ct-btn--primary"><?php echo esc_html($is_rtl ? "\u{0627}\u{0628}\u{062F}\u{0623}\u{0020}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0643}\u{0020}\u{0627}\u{0644}\u{0622}\u{0646}" : 'Start Your Project Now'); ?></a>
                    <a href="<?php echo esc_url(home_url('/case-studies/')); ?>" class="ct-btn ct-btn--ghost"><?php echo esc_html($is_rtl ? "\u{0627}\u{0633}\u{062A}\u{0639}\u{0631}\u{0636}\u{0020}\u{0633}\u{0627}\u{0628}\u{0642}\u{0629}\u{0020}\u{0623}\u{0639}\u{0645}\u{0627}\u{0644}\u{0646}\u{0627}" : 'View Case Studies'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
</div><!-- /.ct-page -->

<?php get_footer(); ?>