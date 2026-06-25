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
<main class="pt-24 sm:pt-28 lg:pt-32 pb-24 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto">
        <a href="<?php echo esc_url(st_url('/careers/')); ?>" class="text-secondary font-bold mb-8 inline-flex items-center gap-2"><span class="material-symbols-outlined">arrow_back</span><?php echo esc_html(st_t('careers.workEnvironmentButton')); ?></a>
        <h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold mb-12 text-center"><?php echo esc_html(st_t('careers.workEnvironmentButton')); ?></h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter mb-16">
            <?php foreach ($cards as [$icon, $title, $body]) : ?>
                <div class="p-8 bg-white border border-outline-variant/30 rounded-2xl hover:border-secondary hover:shadow-lg transition-all">
                    <span class="material-symbols-outlined text-4xl text-secondary mb-4"><?php echo esc_html($icon); ?></span>
                    <h2 class="text-headline-sm font-bold text-primary mb-2"><?php echo esc_html($title); ?></h2>
                    <p class="text-on-surface-variant"><?php echo esc_html($body); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center"><a href="<?php echo esc_url(st_url('/careers/jobs/')); ?>" class="inline-flex bg-secondary text-on-secondary px-8 py-4 rounded-xl font-bold"><?php echo esc_html(st_t('careers.jobsButton')); ?></a></div>
    </div>
</main>
<?php get_footer(); ?>
