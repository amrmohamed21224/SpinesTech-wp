<?php
/**
 * Template Name: Contact
 */
get_header();
$locale = st_locale();
$dir    = st_dir();
$is_rtl = $dir === 'rtl';

$settings = [];
if (class_exists('SpinesTech_Headless_Mappers')) {
    $settings = SpinesTech_Headless_Mappers::settings();
}
$email   = $settings['contactEmail'] ?? get_option('admin_email');
$phone   = $settings['contactPhone'] ?? '+966 11 123 4567';
$address = $settings['officeAddress'] ?? ($is_rtl ? 'الرياض، حي النخيل، طريق الملك فهد، المملكة العربية السعودية' : 'Riyadh, Al Nakheel District, King Fahd Road, KSA');
?>
<main dir="<?php echo esc_attr($dir); ?>" class="page-contact">
    <div class="container">

        <!-- ═══ Header ═══ -->
        <header class="page-contact__header">
            <span class="page-contact__badge">
                <span class="page-contact__badge-dot"></span>
                <?php echo $is_rtl ? 'تواصل معنا' : 'Contact Us'; ?>
            </span>
            <h1 class="page-contact__title">
                <?php echo $is_rtl ? 'يسعدنا دائماً التحدث إليك' : 'We\'re Always Happy to Talk'; ?>
            </h1>
            <p class="page-contact__subtitle">
                <?php echo $is_rtl
                    ? 'هل لديك فكرة مشروع تقني، أو ترغب في استشارة حول أنظمة ERP والذكاء الاصطناعي؟ فريقنا جاهز للإجابة على استفساراتك.'
                    : 'Have a tech project idea, or want a consultation on ERP systems and AI? Our team is ready to answer your inquiries.'; ?>
            </p>
        </header>

        <!-- ═══ Main Grid ═══ -->
        <div class="page-contact__grid">

            <!-- Left: Form Card -->
            <div class="page-contact__form-card">
                <div class="page-contact__form-card-header">
                    <h2 class="page-contact__form-card-title">
                        <?php echo $is_rtl ? 'أرسل لنا رسالة' : 'Send Us a Message'; ?>
                    </h2>
                    <p class="page-contact__form-card-subtitle">
                        <?php echo $is_rtl ? 'املأ النموذج وسنقوم بالرد عليك في أقرب وقت.' : 'Fill out the form and we will get back to you shortly.'; ?>
                    </p>
                </div>

                <div id="st-form-alert" class="contact-alert contact-alert--hidden"></div>

                <form data-st-contact-form class="page-contact__form" novalidate>
                    <input type="text" name="website" class="is-hidden" tabindex="-1" autocomplete="off">

                    <div class="page-contact__row">
                        <div class="page-contact__field">
                            <label class="page-contact__label">
                                <?php echo $is_rtl ? 'الاسم الكامل *' : 'Full Name *'; ?>
                            </label>
                            <input required name="name" type="text"
                                   placeholder="<?php echo $is_rtl ? 'أدخل اسمك الكريم' : 'Enter your name'; ?>"
                                   class="page-contact__input">
                        </div>
                        <div class="page-contact__field">
                            <label class="page-contact__label">
                                <?php echo $is_rtl ? 'البريد الإلكتروني *' : 'Email Address *'; ?>
                            </label>
                            <input required name="email" type="email"
                                   placeholder="example@domain.com"
                                   class="page-contact__input" dir="ltr">
                        </div>
                    </div>

                    <div class="page-contact__row">
                        <div class="page-contact__field">
                            <label class="page-contact__label">
                                <?php echo $is_rtl ? 'رقم الجوال' : 'Phone Number'; ?>
                            </label>
                            <input name="phone" type="tel"
                                   placeholder="05xxxxxxxx"
                                   class="page-contact__input" dir="ltr">
                        </div>
                        <div class="page-contact__field">
                            <label class="page-contact__label">
                                <?php echo $is_rtl ? 'الشركة / المنظمة' : 'Company / Organization'; ?>
                            </label>
                            <input name="company" type="text"
                                   placeholder="<?php echo $is_rtl ? 'اسم شركتك' : 'Company name'; ?>"
                                   class="page-contact__input">
                        </div>
                    </div>

                    <div class="page-contact__field">
                        <label class="page-contact__label">
                            <?php echo $is_rtl ? 'تفاصيل الرسالة *' : 'Message Details *'; ?>
                        </label>
                        <textarea required name="message" rows="5"
                                  placeholder="<?php echo $is_rtl ? 'اكتب استشارتك بالتفصيل...' : 'Write your consultation in detail...'; ?>"
                                  class="page-contact__textarea"></textarea>
                    </div>

                    <button type="submit" class="page-contact__submit">
                        <?php echo $is_rtl ? 'إرسال الرسالة' : 'Send Message'; ?>
                        <span class="material-symbols-outlined page-contact__submit-icon">send</span>
                    </button>
                </form>
            </div>

            <!-- Right: Info Panel -->
            <div class="page-contact__info-panel">
                <div class="page-contact__info-panel-header">
                    <h2 class="page-contact__info-title">
                        <?php echo $is_rtl ? 'معلومات الاتصال' : 'Contact Information'; ?>
                    </h2>
                    <p class="page-contact__info-subtitle">
                        <?php echo $is_rtl
                            ? 'يمكنك التواصل معنا مباشرة عبر القنوات الرسمية أو زيارة مكتبنا في الرياض.'
                            : 'You can contact us directly through official channels or visit our office in Riyadh.'; ?>
                    </p>
                </div>

                <div class="page-contact__info-cards">
                    <!-- Email -->
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="page-contact__info-card">
                        <div class="page-contact__info-content">
                            <span class="page-contact__info-label">
                                <?php echo $is_rtl ? 'البريد الإلكتروني' : 'Email Address'; ?>
                            </span>
                            <span class="page-contact__info-value" dir="ltr"><?php echo esc_html($email); ?></span>
                        </div>
                        <div class="page-contact__info-icon page-contact__info-icon--email">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                    </a>

                    <!-- Phone -->
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="page-contact__info-card">
                        <div class="page-contact__info-content">
                            <span class="page-contact__info-label">
                                <?php echo $is_rtl ? 'الهاتف' : 'Phone Number'; ?>
                            </span>
                            <span class="page-contact__info-value" dir="ltr"><?php echo esc_html($phone); ?></span>
                        </div>
                        <div class="page-contact__info-icon page-contact__info-icon--phone">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                    </a>

                    <!-- Address -->
                    <div class="page-contact__info-card page-contact__info-card--static">
                        <div class="page-contact__info-content">
                            <span class="page-contact__info-label">
                                <?php echo $is_rtl ? 'المقر الرئيسي' : 'Headquarters'; ?>
                            </span>
                            <span class="page-contact__info-value"><?php echo esc_html($address); ?></span>
                        </div>
                        <div class="page-contact__info-icon page-contact__info-icon--location">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                    </div>
                </div>

                <!-- Working Hours -->
                <div class="page-contact__hours">
                    <div class="page-contact__hours-icon-wrap">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <div class="page-contact__hours-text">
                        <span class="page-contact__hours-label">
                            <?php echo $is_rtl ? 'ساعات العمل' : 'Working Hours'; ?>
                        </span>
                        <span class="page-contact__hours-value">
                            <?php echo $is_rtl ? 'الأحد - الخميس: 9 صباحاً إلى 5 مساءً' : 'Sunday - Thursday: 9 AM to 5 PM'; ?>
                        </span>
                    </div>
                </div>
            </div>

        </div><!-- /.page-contact__grid -->
    </div>
</main>
<?php get_footer(); ?>
