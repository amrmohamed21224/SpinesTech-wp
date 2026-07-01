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
<main class="page-solutions" id="st-solutions-page">
    <div class="container">
        <header class="page-solutions__header">
            <span class="page-solutions__eyebrow"><?php echo esc_html(st_t('solutions.title')); ?></span>
            <h1 class="page-solutions__title"><?php echo esc_html(st_t('solutions.title')); ?></h1>
            <p class="page-solutions__subtitle"><?php echo esc_html(st_t('solutions.subtitle')); ?></p>
        </header>

        <div class="page-solutions__grid">
            <aside class="page-solutions__sidebar">
                <div class="page-solutions__filter-group">
                    <h2 class="page-solutions__filter-title"><?php echo $locale === 'ar' ? 'ما الذي تبحث عنه؟' : 'What do you need?'; ?></h2>
                    <div class="page-solutions__filter-list" data-st-solution-needs>
                        <?php foreach ($needs as $id => $label) : ?>
                            <button type="button" data-need="<?php echo esc_attr($id); ?>" class="page-solutions__filter-btn <?php echo $id === 'software' ? 'is-active' : ''; ?>">
                                <?php echo esc_html($label); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if ($sectors) : ?>
                    <div class="page-solutions__filter-group">
                        <h2 class="page-solutions__filter-title"><?php echo $locale === 'ar' ? 'القطاع' : 'Sector'; ?></h2>
                        <div class="page-solutions__filter-chips" data-st-solution-sectors>
                            <button type="button" data-sector="" class="page-solutions__filter-chip is-active">
                                <?php echo $locale === 'ar' ? 'الكل' : 'All'; ?>
                            </button>
                            <?php foreach ($sectors as $sec) : ?>
                                <button type="button" data-sector="<?php echo esc_attr($sec['slug']); ?>" class="page-solutions__filter-chip">
                                    <?php echo esc_html($sec['title']); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </aside>

            <div class="page-solutions__content">
                <h2 class="page-solutions__content-title"><?php echo $locale === 'ar' ? 'الترشيحات' : 'Recommendations'; ?></h2>
                <div class="page-solutions__results-grid" data-st-solution-results>
                    <?php foreach ($services as $s) : ?>
                        <article class="solution-card" data-keywords="<?php echo esc_attr(strtolower($s['title'] . ' ' . ($s['description'] ?? ''))); ?>">
                            <h3 class="solution-card__title"><?php echo esc_html($s['title']); ?></h3>
                            <p class="solution-card__description"><?php echo esc_html($s['description']); ?></p>
                            <div class="solution-card__actions">
                                <a href="<?php echo esc_url(st_cpt_link('services', $s['slug'])); ?>" class="solution-card__link">
                                    <?php echo esc_html(st_t('common.learnMore')); ?>
                                </a>
                                <a href="<?php echo esc_url(st_url('/quote/?service=' . urlencode($s['slug']))); ?>" class="solution-card__link solution-card__link--muted">
                                    | <?php echo esc_html(st_t('home.requestQuote')); ?>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
