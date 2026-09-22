<?php
$dir = st_dir();
$locale = st_locale();
$is_rtl = $dir === 'rtl';
$logo_webp = st_asset('images/brand/icon-128.webp');
$logo_png  = st_asset('images/brand/icon-128.png');

$nav = [
    ['path' => '/', 'label' => $is_rtl ? "\u{0627}\u{0644}\u{0631}\u{0626}\u{064A}\u{0633}\u{064A}\u{0629}" : 'Home', 'icon' => 'home'],
    ['path' => '/about/', 'label' => $is_rtl ? "\u{0645}\u{0646}\u{0020}\u{0646}\u{062D}\u{0646}" : 'About', 'icon' => 'info'],
    ['path' => '/services/', 'label' => $is_rtl ? "\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}" : 'Services', 'icon' => 'design_services'],
    ['path' => '/articles/', 'label' => $is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0642}\u{0627}\u{0644}\u{0627}\u{062A}" : 'Articles', 'icon' => 'article'],
    ['path' => '/case-studies/', 'label' => $is_rtl ? "\u{062F}\u{0631}\u{0627}\u{0633}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062D}\u{0627}\u{0644}\u{0629}" : 'Case Studies', 'icon' => 'cases'],
    ['path' => '/contact/', 'label' => $is_rtl ? "\u{062A}\u{0648}\u{0627}\u{0635}\u{0644}\u{0020}\u{0645}\u{0639}\u{0646}\u{0627}" : 'Contact', 'icon' => 'mail'],
];

$hidden_nav_paths = ['/products/', '/sectors/', '/careers/'];
$nav = array_values(array_filter($nav, function ($item) use ($hidden_nav_paths) {
    return !in_array($item['path'], $hidden_nav_paths, true);
}));

$target_locale = $locale === 'ar' ? 'en' : 'ar';
$switch_label = $locale === 'ar' ? 'EN' : 'AR';
$switch_full_label = $locale === 'ar' ? 'English' : "\u{0627}\u{0644}\u{0639}\u{0631}\u{0628}\u{064A}\u{0629}";
$switch_aria = $locale === 'ar' ? "\u{062A}\u{063A}\u{064A}\u{064A}\u{0631}\u{0020}\u{0627}\u{0644}\u{0644}\u{063A}\u{0629}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0625}\u{0646}\u{062C}\u{0644}\u{064A}\u{0632}\u{064A}\u{0629}" : "\u{062A}\u{063A}\u{064A}\u{064A}\u{0631}\u{0020}\u{0627}\u{0644}\u{0644}\u{063A}\u{0629}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0639}\u{0631}\u{0628}\u{064A}\u{0629}";
$switch_url = st_lang_switch_url();
$cta_label = $is_rtl ? "\u{0627}\u{0628}\u{062F}\u{0623}\u{0020}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0643}" : 'Start a Project';
$arrow_icon = $is_rtl ? 'arrow_back' : 'arrow_forward';
$home_aria_label = $is_rtl ? "\u{0627}\u{0644}\u{0631}\u{0626}\u{064A}\u{0633}\u{064A}\u{0629}\u{0020}\u{0053}\u{0070}\u{0069}\u{006E}\u{0065}\u{0073}\u{0054}\u{0065}\u{0063}\u{0068}" : 'SpinesTech Home';
$main_nav_label = $is_rtl ? "\u{0627}\u{0644}\u{0642}\u{0627}\u{0626}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{0631}\u{0626}\u{064A}\u{0633}\u{064A}\u{0629}" : 'Main navigation';
$open_menu_label = $is_rtl ? "\u{0641}\u{062A}\u{062D}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0626}\u{0645}\u{0629}" : 'Open menu';
$close_menu_label = $is_rtl ? "\u{0625}\u{063A}\u{0644}\u{0627}\u{0642}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0626}\u{0645}\u{0629}" : 'Close menu';
?>
<header id="st-navbar" class="navbar" role="banner" dir="<?php echo esc_attr($dir); ?>" data-dir="<?php echo esc_attr($dir); ?>">
    <div class="navbar__inner container">

        <a href="<?php echo esc_url(st_url('/')); ?>" class="navbar__brand" aria-label="<?php echo esc_attr($home_aria_label); ?>">
            <span class="navbar__brand-mark">
                <picture>
                    <source srcset="<?php echo esc_url($logo_webp); ?>" type="image/webp">
                    <img src="<?php echo esc_url($logo_png); ?>" alt="SpinesTech Logo" class="navbar__brand-logo" width="104" height="64" decoding="async" fetchpriority="high">
                </picture>
            </span>
            <span class="navbar__brand-word">SpinesTech</span>
        </a>

        <nav class="navbar__nav" role="navigation" aria-label="<?php echo esc_attr($main_nav_label); ?>">
            <ul class="navbar__list">
                <?php foreach ($nav as $i => $item):
                    $active = st_is_current($item['path']);
                ?>
                <li class="navbar__item" style="--i: <?php echo (int) $i; ?>">
                    <a href="<?php echo esc_url(st_url($item['path'])); ?>"
                       class="navbar__link<?php echo $active ? ' navbar__link--active' : ''; ?>"
                       <?php echo $active ? 'aria-current="page"' : ''; ?>>
                        <span class="material-symbols-outlined navbar__link-icon" aria-hidden="true"><?php echo esc_html($item['icon']); ?></span>
                        <span class="navbar__link-text"><?php echo esc_html($item['label']); ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="navbar__actions">
            <a href="<?php echo esc_url($switch_url); ?>" class="navbar__lang" hreflang="<?php echo esc_attr($target_locale); ?>" aria-label="<?php echo esc_attr($switch_aria); ?>" rel="nofollow">
                <span class="navbar__lang-text"><?php echo esc_html($switch_label); ?></span>
            </a>

            <a href="<?php echo esc_url(st_url('/contact/')); ?>" class="navbar__cta">
                <span class="navbar__cta-text"><?php echo esc_html($cta_label); ?></span>
                <span class="material-symbols-outlined navbar__cta-icon" aria-hidden="true"><?php echo esc_html($arrow_icon); ?></span>
            </a>

            <button type="button" id="st-menu-open" class="navbar__burger" aria-label="<?php echo esc_attr($open_menu_label); ?>" aria-expanded="false" aria-controls="st-mobile-drawer">
                <span class="navbar__burger-box" aria-hidden="true">
                    <span class="navbar__burger-line"></span>
                    <span class="navbar__burger-line"></span>
                    <span class="navbar__burger-line"></span>
                </span>
            </button>
        </div>
    </div>

    <div class="navbar__spine" aria-hidden="true">
        <span class="navbar__spine-progress"></span>
    </div>
</header>

<div id="st-mobile-overlay" class="drawer-overlay" aria-hidden="true"></div>

<aside id="st-mobile-drawer" class="drawer <?php echo $is_rtl ? 'drawer--rtl' : 'drawer--ltr'; ?>" dir="<?php echo esc_attr($dir); ?>" aria-hidden="true">
    <div class="drawer__spine" aria-hidden="true">
        <?php foreach ($nav as $i => $item): ?>
        <span class="drawer__spine-tick" style="--i: <?php echo (int) $i; ?>"></span>
        <?php endforeach; ?>
    </div>

    <div class="drawer__panel">
        <div class="drawer__head">
            <a href="<?php echo esc_url(st_url('/')); ?>" class="drawer__brand">
                <span class="navbar__brand-mark">
                    <picture>
                        <source srcset="<?php echo esc_url($logo_webp); ?>" type="image/webp">
                        <img src="<?php echo esc_url($logo_png); ?>" alt="SpinesTech Logo" class="navbar__brand-logo" width="104" height="64" decoding="async">
                    </picture>
                </span>
                <span class="navbar__brand-word">SpinesTech</span>
            </a>
            <button type="button" id="st-menu-close" class="drawer__close" aria-label="<?php echo esc_attr($close_menu_label); ?>">
                <span class="material-symbols-outlined" aria-hidden="true">close</span>
            </button>
        </div>

        <nav class="drawer__nav" aria-label="<?php echo esc_attr($main_nav_label); ?>">
            <ul class="drawer__list">
                <?php foreach ($nav as $i => $item):
                    $active = st_is_current($item['path']);
                ?>
                <li class="drawer__item" style="--i: <?php echo (int) $i; ?>">
                    <a href="<?php echo esc_url(st_url($item['path'])); ?>"
                       class="drawer__link<?php echo $active ? ' drawer__link--active' : ''; ?>"
                       <?php echo $active ? 'aria-current="page"' : ''; ?>>
                        <span class="material-symbols-outlined drawer__link-icon" aria-hidden="true"><?php echo esc_html($item['icon']); ?></span>
                        <span class="drawer__link-text"><?php echo esc_html($item['label']); ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="drawer__foot">
            <a href="<?php echo esc_url(st_url('/contact/')); ?>" class="drawer__cta">
                <span><?php echo esc_html($cta_label); ?></span>
                <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($arrow_icon); ?></span>
            </a>
            <a href="<?php echo esc_url($switch_url); ?>" class="drawer__lang" hreflang="<?php echo esc_attr($target_locale); ?>" rel="nofollow">
                <span class="material-symbols-outlined" aria-hidden="true">translate</span>
                <span><?php echo esc_html($switch_full_label); ?></span>
            </a>
        </div>
    </div>
</aside>
