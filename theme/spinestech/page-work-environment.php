<?php
/**
 * Page slug: work-environment (child of careers)
 */
get_header();
$locale = st_locale();
$cards = [
    ['groups', $locale === 'ar' ? 'ÙØ±ÙŠÙ‚ Ù…ØªØ¹Ø§ÙˆÙ†' : 'Collaborative team', $locale === 'ar' ? 'Ø«Ù‚Ø§ÙØ© Ù…Ø¨Ù†ÙŠØ© Ø¹Ù„Ù‰ Ø§Ù„Ø«Ù‚Ø© ÙˆØ§Ù„Ø§Ø¨ØªÙƒØ§Ø±.' : 'Culture built on trust and innovation.'],
    ['school', $locale === 'ar' ? 'ØªØ¹Ù„Ù… Ù…Ø³ØªÙ…Ø±' : 'Continuous learning', $locale === 'ar' ? 'Ù…ÙŠØ²Ø§Ù†ÙŠØ© ØªØ¯Ø±ÙŠØ¨ ÙˆØ´Ù‡Ø§Ø¯Ø§Øª.' : 'Training budget and certifications.'],
    ['home_work', $locale === 'ar' ? 'Ù…Ø±ÙˆÙ†Ø©' : 'Flexibility', $locale === 'ar' ? 'Ø¹Ù…Ù„ Ù‡Ø¬ÙŠÙ† ÙˆÙ…Ø±ÙˆÙ†Ø© ÙÙŠ Ø§Ù„ÙˆÙ‚Øª.' : 'Hybrid work and flexible hours.'],
    ['rocket_launch', $locale === 'ar' ? 'ØªØ£Ø«ÙŠØ± Ø­Ù‚ÙŠÙ‚ÙŠ' : 'Real impact', $locale === 'ar' ? 'Ù…Ø´Ø§Ø±ÙŠØ¹ ØªÙØ­Ø¯Ø« ÙØ±Ù‚Ø§Ù‹ ÙÙŠ Ø§Ù„Ø³ÙˆÙ‚.' : 'Projects that move the market.'],
];
?>
<main class="page-work-env">
    <div class="container">
        <a href="<?php echo esc_url(st_url('/careers/')); ?>" class="page-work-env__back-link">
            <span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
            <?php echo esc_html(st_t('careers.workEnvironmentButton')); ?>
        </a>
        <h1 class="page-work-env__title"><?php echo esc_html(st_t('careers.workEnvironmentButton')); ?></h1>
        <div class="page-work-env__grid">
            <?php foreach ($cards as [$icon, $title, $body]) : ?>
                <div class="work-env-card">
                    <span class="material-symbols-outlined work-env-card__icon"><?php echo esc_html($icon); ?></span>
                    <h2 class="work-env-card__title"><?php echo esc_html($title); ?></h2>
                    <p class="work-env-card__body"><?php echo esc_html($body); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="page-work-env__cta">
            <a href="<?php echo esc_url(st_url('/careers/jobs/')); ?>" class="button button--secondary">
                <?php echo esc_html(st_t('careers.jobsButton')); ?>
            </a>
        </div>
    </div>
</main>
<?php get_footer(); ?>
