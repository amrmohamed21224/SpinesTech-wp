<?php
add_filter( 'pre_get_document_title', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    return $is_rtl
        ? 'احجز استشارة تقنية مجانية 45 دقيقة | SpinesTech'
        : 'Book a Free 45-Min Tech Consultation | SpinesTech';
}, 999 );

add_action( 'wp_head', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    if (function_exists('st_seo_set_description')) {
        st_seo_set_description($is_rtl
            ? 'جلسة استشارية متخصصة لمدة 45 دقيقة مع مهندسي SpinesTech لمناقشة فكرة مشروعك، بنيته التقنية، ونموذج إطلاقه.'
            : 'Book a free 45-minute technical session with SpinesTech engineers to evaluate project architecture, stack, and launch roadmap.');
    }
}, 3 );

get_header(); $locale = st_locale(); ?>
<main class="page-consultation" data-st-consultation-page>
    <div class="container">
        <div class="page-consultation__grid">
            <div class="page-consultation__info">
                <span class="page-consultation__eyebrow">
                    <?php echo $locale === 'ar' ? 'Ø§Ø³ØªØ´Ø§Ø±Ø© Ù…Ø¬Ø§Ù†ÙŠØ© Â· 45 Ø¯Ù‚ÙŠÙ‚Ø©' : 'Free Â· 45 min'; ?>
                </span>
                <h1 class="page-consultation__title"><?php echo esc_html(st_t('consultation.title')); ?></h1>
                <p class="page-consultation__subtitle"><?php echo esc_html(st_t('consultation.subtitle')); ?></p>
                <div class="page-consultation__goals" data-st-consult-goals>
                    <?php foreach ([
                        ['growth', $locale === 'ar' ? 'Ù†Ù…Ùˆ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„' : 'Business growth'],
                        ['automation', $locale === 'ar' ? 'Ø£ØªÙ…ØªØ©' : 'Automation'],
                        ['ai', $locale === 'ar' ? 'Ø°ÙƒØ§Ø¡ Ø§ØµØ·Ù†Ø§Ø¹ÙŠ' : 'AI'],
                        ['rebuild', $locale === 'ar' ? 'Ø¥Ø¹Ø§Ø¯Ø© Ø¨Ù†Ø§Ø¡' : 'Rebuild'],
                    ] as [$id, $label]) : ?>
                        <button type="button" data-goal="<?php echo esc_attr($id); ?>" class="page-consultation__goal-chip">
                            <?php echo esc_html($label); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="page-consultation__form-wrapper">
                <div id="st-consult-alert" class="alert alert--hidden"></div>
                <form data-st-consult-form class="page-consultation__form">
                    <h2 class="page-consultation__form-title"><?php echo esc_html(st_t('consultation.title')); ?></h2>
                    <input type="text" name="website" class="is-hidden" tabindex="-1">
                    <input type="hidden" name="goal" value="">
                    
                    <div class="form-group">
                        <input required name="name" placeholder="<?php echo esc_attr(st_t('contact.fullName')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input required name="email" type="email" placeholder="<?php echo esc_attr(st_t('contact.emailLabel')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="phone" placeholder="<?php echo esc_attr(st_t('contact.phoneLabel')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="company" placeholder="<?php echo esc_attr(st_t('contact.company')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea required name="message" rows="4" placeholder="<?php echo $locale === 'ar' ? 'Ù…Ø§ Ø§Ù„Ø°ÙŠ ØªØ±ÙŠØ¯ Ù…Ù†Ø§Ù‚Ø´ØªÙ‡ØŸ' : 'What to discuss?'; ?>" class="form-control"></textarea>
                    </div>
                    
                    <button type="submit" class="button button--secondary page-consultation__submit">
                        <?php echo esc_html(st_t('consultation.title')); ?>
                    </button>
                </form>
                <p class="page-consultation__form-footer">
                    <a href="<?php echo esc_url(st_url('/quote/')); ?>" class="page-consultation__quote-link">
                        <?php echo esc_html(st_t('home.requestQuote')); ?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
