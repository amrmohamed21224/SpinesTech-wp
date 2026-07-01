<?php
/**
 * Page slug: work-environment (child of careers)
 */
get_header();
$locale = st_locale();
$cards = [
    ['groups', $locale === 'ar' ? 'فريق متعاون' : 'Collaborative team', $locale === 'ar' ? 'ثقافة مبنية على الثقة والابتكار.' : 'Culture built on trust and innovation.'],
    ['school', $locale === 'ar' ? 'تعلم مستمر' : 'Continuous learning', $locale === 'ar' ? 'ميزانية تدريب وشهادات.' : 'Training budget and certifications.'],
    ['home_work', $locale === 'ar' ? 'مرونة' : 'Flexibility', $locale === 'ar' ? 'عمل هجين ومرونة في الوقت.' : 'Hybrid work and flexible hours.'],
    ['rocket_launch', $locale === 'ar' ? 'تأثير حقيقي' : 'Real impact', $locale === 'ar' ? 'مشاريع تُحدث فرقاً في السوق.' : 'Projects that move the market.'],
];
?>
<main class="page-work-env">
    <div class="container">
        <a href="<?php echo esc_url(st_url('/careers/')); ?>" class="page-work-env__back-link">
            <span class="material-symbols-outlined">arrow_back</span>
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
