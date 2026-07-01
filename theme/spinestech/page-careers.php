<?php get_header(); $locale = st_locale(); ?>
<main class="page-careers">
    <section class="page-careers__hero">
        <div class="container page-careers__hero-grid">
            <div class="page-careers__hero-content">
                <span class="page-careers__hero-badge"><?php echo esc_html(st_t('careers.heroBadge')); ?></span>
                <h1 class="page-careers__hero-title"><?php echo esc_html(st_t('careers.heroTitle')); ?></h1>
                <p class="page-careers__hero-subtitle"><?php echo esc_html(st_t('careers.heroSubtitle')); ?></p>
                <div class="page-careers__hero-actions">
                    <a href="<?php echo esc_url(st_url('/careers/jobs/')); ?>" class="button button--primary page-careers__hero-btn">
                        <?php echo esc_html(st_t('careers.jobsButton')); ?>
                        <span class="material-symbols-outlined">work</span>
                    </a>
                    <a href="<?php echo esc_url(st_url('/careers/work-environment/')); ?>" class="button button--outline page-careers__hero-btn">
                        <?php echo esc_html(st_t('careers.workEnvironmentButton')); ?>
                        <span class="material-symbols-outlined">diversity_3</span>
                    </a>
                </div>
            </div>
            <div class="page-careers__hero-image-wrapper">
                <img src="<?php echo esc_url(st_asset('images/about/hero.png')); ?>" alt="" class="page-careers__hero-image">
            </div>
        </div>
    </section>

    <div class="container">
        <div class="page-careers__options">
            <a href="<?php echo esc_url(st_url('/careers/work-environment/')); ?>" class="career-option-card">
                <span class="material-symbols-outlined career-option-card__icon">diversity_3</span>
                <h2 class="career-option-card__title"><?php echo esc_html(st_t('careers.workEnvironmentButton')); ?></h2>
                <p class="career-option-card__description">
                    <?php echo $locale === 'ar' ? 'ثقافة فريق، تعلم، ومرونة.' : 'Team culture, learning, and flexibility.'; ?>
                </p>
            </a>
            
            <a href="<?php echo esc_url(st_url('/careers/jobs/')); ?>" class="career-option-card career-option-card--highlight">
                <span class="material-symbols-outlined career-option-card__icon career-option-card__icon--light">work</span>
                <h2 class="career-option-card__title"><?php echo esc_html(st_t('careers.jobsButton')); ?></h2>
                <p class="career-option-card__description">
                    <?php echo $locale === 'ar' ? 'تصفّح الفرص المتاحة الآن.' : 'Browse current openings.'; ?>
                </p>
            </a>
        </div>
    </div>
</main>
<?php get_footer(); ?>
