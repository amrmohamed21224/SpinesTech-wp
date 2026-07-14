<?php
$dir = st_dir();
$locale = st_locale();
$logo = st_asset('images/brand/icon.png');
$nav = [
    ['path' => '/', 'label' => st_t('nav.home'), 'icon' => 'home'],
    ['path' => '/about/', 'label' => st_t('nav.about'), 'icon' => 'info'],
    ['path' => '/services/', 'label' => st_t('nav.services'), 'icon' => 'design_services'],
    ['path' => '/articles/', 'label' => 'المقالات', 'icon' => 'article'],
    ['path' => '/case-studies/', 'label' => st_t('nav.caseStudies'), 'icon' => 'cases'],
    ['path' => '/contact/', 'label' => st_t('nav.contact'), 'icon' => 'mail'],
];

$hidden_nav_paths = ['/products/', '/sectors/', '/careers/'];
$nav = array_values(array_filter($nav, function ($item) use ($hidden_nav_paths) {
    return !in_array($item['path'], $hidden_nav_paths, true);
}));
?>
<header id="st-navbar" class="navbar" role="banner" dir="<?php echo esc_attr($dir); ?>">
    <div class="navbar__shell container">
        <nav class="navbar__glass" role="navigation" aria-label="<?php echo esc_attr(st_t('nav.mainNav')); ?>">
            <div class="navbar__glow" aria-hidden="true"></div>

            <div class="navbar__mobile-controls">
                <button type="button" id="st-menu-open" class="navbar__toggle" aria-label="<?php echo esc_attr(st_t('nav.openMenu')); ?>" aria-expanded="false" aria-controls="st-mobile-drawer">
                    <span class="material-symbols-outlined" aria-hidden="true">menu</span>
                </button>
                <a href="<?php echo esc_url(st_lang_switch_url()); ?>" class="navbar__lang-mobile" aria-label="<?php echo esc_attr($locale === 'ar' ? st_t('nav.switchToEnglish') : st_t('nav.switchToArabic')); ?>">
                    <?php echo esc_html($locale === 'ar' ? 'EN' : 'AR'); ?>
                </a>
            </div>

            <a href="<?php echo esc_url(st_url('/')); ?>" class="navbar__logo-link" aria-label="<?php echo esc_attr(st_t('nav.homeAria')); ?>">
                <img src="<?php echo esc_url($logo); ?>" alt="SpinesTech" class="navbar__logo">
            </a>

            <div class="navbar__menu">
                <?php foreach ($nav as $i => $item) :
                    $active = st_is_current($item['path']);
                    $cls = $active ? 'navbar__link--active' : '';
                ?>
                    <a href="<?php echo esc_url(st_url($item['path'])); ?>" class="navbar__link <?php echo esc_attr($cls); ?>" style="--nav-i: <?php echo (int) $i; ?>"><?php echo esc_html($item['label']); ?></a>
                <?php endforeach; ?>
            </div>

            <div class="navbar__actions">
                <a href="<?php echo esc_url(st_lang_switch_url()); ?>" class="navbar__lang-switch" aria-label="<?php echo esc_attr($locale === 'ar' ? st_t('nav.switchToEnglish') : st_t('nav.switchToArabic')); ?>">
                    <?php echo esc_html($locale === 'ar' ? 'EN' : 'AR'); ?>
                </a>
                <button type="button" data-st-open-consultation class="navbar__cta">
                    <span class="navbar__cta-inner">
                        <?php echo esc_html(st_t('nav.bookConsultation')); ?>
                        <span class="material-symbols-outlined">call_made</span>
                    </span>
                </button>
            </div>
        </nav>
    </div>
</header>

<div id="st-mobile-overlay" class="mobile-drawer__overlay hidden" aria-hidden="true"></div>
<aside id="st-mobile-drawer" class="mobile-drawer <?php echo $dir === 'rtl' ? 'mobile-drawer--rtl' : 'mobile-drawer--ltr'; ?>" dir="<?php echo esc_attr($dir); ?>" aria-hidden="true">
    <div class="mobile-drawer__header">
        <a href="<?php echo esc_url(st_url('/')); ?>"><img src="<?php echo esc_url($logo); ?>" alt="SpinesTech" class="mobile-drawer__logo"></a>
        <button type="button" id="st-menu-close" class="mobile-drawer__close" aria-label="<?php echo esc_attr(st_t('nav.closeMenu')); ?>">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    <div class="mobile-drawer__body">
        <div class="mobile-drawer__nav">
            <?php foreach ($nav as $item) : ?>
                <a href="<?php echo esc_url(st_url($item['path'])); ?>" class="mobile-drawer__link">
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($item['icon']); ?></span>
                    <?php echo esc_html($item['label']); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="mobile-drawer__footer">
            <a href="<?php echo esc_url(st_lang_switch_url()); ?>" class="mobile-drawer__lang-btn">
                <span class="material-symbols-outlined">translate</span>
                <?php echo esc_html($locale === 'ar' ? st_t('nav.english') : st_t('nav.arabic')); ?>
            </a>
            <button type="button" data-st-open-consultation class="mobile-drawer__cta button button--primary">
                <?php echo esc_html(st_t('nav.bookConsultation')); ?>
            </button>
        </div>
    </div>
</aside>