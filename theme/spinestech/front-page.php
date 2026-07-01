<?php get_header(); ?>
<?php
$is_rtl = st_locale() === 'ar';
$arrow = $is_rtl ? 'arrow_back' : 'arrow_forward';
$trust = ['home.trustCustom', 'home.trustErp', 'home.trustAi', 'home.trustLocal'];
$stats = [
    ['value' => '+150', 'label' => st_t('home.projects'), 'icon' => 'rocket_launch'],
    ['value' => '+50', 'label' => st_t('home.experts'), 'icon' => 'groups'],
    ['value' => '+8', 'label' => $is_rtl ? 'سنوات خبرة' : 'Years of experience', 'icon' => 'workspace_premium'],
    ['value' => '99.9%', 'label' => $is_rtl ? 'استقرار تقني' : 'Platform stability', 'icon' => 'verified'],
];
?>
<main class="home">
    <section class="home-hero">
        <div class="container home-hero__content">
            <div class="home-hero__media">
                <div class="home-hero__image-card">
                    <img src="<?php echo esc_url(st_asset('images/about/hero.png')); ?>" alt="" class="home-hero__image" loading="eager">
                    <div class="home-hero__metric home-hero__metric--top">+50<br><span><?php echo esc_html($is_rtl ? 'خبير' : 'Experts'); ?></span></div>
                    <div class="home-hero__metric home-hero__metric--bottom">+150<br><span><?php echo esc_html($is_rtl ? 'مشروع' : 'Projects'); ?></span></div>
                </div>
            </div>

            <div class="home-hero__text-side">
                <span class="home-pill">
                    <span class="material-symbols-outlined">verified</span>
                    <?php echo esc_html($is_rtl ? 'شريك تقني موثوق في السعودية' : 'Trusted technology partner'); ?>
                </span>
                <h1 class="home-hero__title"><?php echo esc_html(st_t('home.heroTitle')); ?></h1>
                <p class="home-hero__subtitle"><?php echo esc_html(st_t('home.heroSubtitle')); ?></p>
                <div class="home-hero__actions">
                    <a href="<?php echo esc_url(st_url('/consultation/')); ?>" class="button button--primary">
                        <?php echo esc_html(st_t('home.bookConsultation')); ?>
                        <span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span>
                    </a>
                    <a href="<?php echo esc_url(st_url('/quote/')); ?>" class="button button--outline">
                        <?php echo esc_html(st_t('home.requestQuote')); ?>
                    </a>
                </div>
                <div class="home-hero__trust">
                    <?php foreach ($trust as $key) : ?>
                        <div class="home-hero__trust-item">
                            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">check_circle</span>
                        <span><?php echo esc_html(st_t($key)); ?></span>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="home-stats" aria-label="<?php echo esc_attr($is_rtl ? 'إحصائيات SpinesTech' : 'SpinesTech stats'); ?>">
        <div class="container home-stats__grid">
            <?php foreach ($stats as $stat) : ?>
                <div class="home-stats__item">
                    <span class="material-symbols-outlined"><?php echo esc_html($stat['icon']); ?></span>
                    <strong><?php echo esc_html($stat['value']); ?></strong>
                    <span><?php echo esc_html($stat['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/home/sections'); ?>
</main>
<?php get_footer(); ?>
