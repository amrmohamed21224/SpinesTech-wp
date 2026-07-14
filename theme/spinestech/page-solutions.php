<?php
get_header();
$services = st_query_cpt('st_service');
$sectors = st_query_cpt('st_sector');
$locale = st_locale();
$needs = [
    'software' => $locale === 'ar' ? 'منصة أو تطبيق' : 'Custom app',
    'ai' => $locale === 'ar' ? 'ذكاء اصطناعي' : 'AI & automation',
    'operations' => $locale === 'ar' ? 'ERP / CRM' : 'ERP / CRM',
    'commerce' => $locale === 'ar' ? 'تجارة إلكترونية' : 'E-commerce',
];
?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-24 px-margin-mobile md:px-margin-desktop text-start" id="st-solutions-page">
    <div class="max-w-container-max mx-auto mb-12">
        <span class="text-secondary font-bold text-label-md uppercase tracking-widest mb-4 block"><?php echo esc_html(st_t('solutions.title')); ?></span>
        <h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold mb-4"><?php echo esc_html(st_t('solutions.title')); ?></h1>
        <p class="text-body-lg text-on-surface-variant max-w-3xl"><?php echo esc_html(st_t('solutions.subtitle')); ?></p>
    </div>
    <div class="max-w-container-max mx-auto grid lg:grid-cols-12 gap-8">
        <aside class="lg:col-span-4 space-y-8">
            <div>
                <h2 class="text-headline-sm font-bold text-primary mb-4"><?php echo $locale === 'ar' ? 'ما الذي تبحث عنه؟' : 'What do you need?'; ?></h2>
                <div class="flex flex-col gap-2" data-st-solution-needs>
                    <?php foreach ($needs as $id => $label) : ?>
                        <button type="button" data-need="<?php echo esc_attr($id); ?>" class="st-need-chip p-4 rounded-xl border border-outline-variant/30 text-start font-medium hover:border-secondary transition-all <?php echo $id === 'software' ? 'border-secondary bg-secondary/5' : ''; ?>"><?php echo esc_html($label); ?></button>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if ($sectors) : ?>
                <div>
                    <h2 class="text-headline-sm font-bold text-primary mb-4"><?php echo $locale === 'ar' ? 'القطاع' : 'Sector'; ?></h2>
                    <div class="flex flex-wrap gap-2" data-st-solution-sectors>
                        <button type="button" data-sector="" class="st-sector-chip px-3 py-1.5 rounded-full border border-secondary bg-secondary/10 text-sm font-bold"><?php echo $locale === 'ar' ? 'الكل' : 'All'; ?></button>
                        <?php foreach ($sectors as $sec) : ?>
                            <button type="button" data-sector="<?php echo esc_attr($sec['slug']); ?>" class="st-sector-chip px-3 py-1.5 rounded-full border border-outline-variant/30 text-sm hover:border-secondary"><?php echo esc_html($sec['title']); ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </aside>
        <div class="lg:col-span-8">
            <h2 class="text-headline-sm font-bold text-primary mb-6"><?php echo $locale === 'ar' ? 'الترشيحات' : 'Recommendations'; ?></h2>
            <div class="grid md:grid-cols-2 gap-gutter" data-st-solution-results>
                <?php foreach ($services as $s) : ?>
                    <article class="st-solution-card p-8 bg-white border border-outline-variant/30 rounded-2xl hover:shadow-xl hover:-translate-y-1 transition-all" data-keywords="<?php echo esc_attr(strtolower($s['title'] . ' ' . ($s['description'] ?? ''))); ?>">
                        <h3 class="text-headline-sm font-bold text-primary mb-3"><?php echo esc_html($s['title']); ?></h3>
                        <p class="text-on-surface-variant text-sm mb-6"><?php echo esc_html($s['description']); ?></p>
                        <div class="flex flex-wrap gap-2">
                            <a href="<?php echo esc_url(st_cpt_link('services', $s['slug'])); ?>" class="text-secondary font-bold text-sm"><?php echo esc_html(st_t('common.learnMore')); ?></a>
                            <a href="<?php echo esc_url(st_url('/quote/?service=' . urlencode($s['slug']))); ?>" class="text-sm text-on-surface-variant">| <?php echo esc_html(st_t('home.requestQuote')); ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
