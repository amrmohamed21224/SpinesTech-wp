<?php
$dir = st_dir();
$locale = st_locale();
$logo = st_asset('images/brand/icon.png');
$nav = [
    ['path' => '/', 'label' => st_t('nav.home'), 'icon' => 'home'],
    ['path' => '/about/', 'label' => st_t('nav.about'), 'icon' => 'info'],
    ['path' => '/services/', 'label' => st_t('nav.services'), 'icon' => 'design_services'],
    ['path' => '/products/', 'label' => st_t('nav.products'), 'icon' => 'inventory_2'],
    ['path' => '/sectors/', 'label' => st_t('nav.sectors'), 'icon' => 'domain'],
    ['path' => '/case-studies/', 'label' => st_t('nav.caseStudies'), 'icon' => 'cases'],
    ['path' => '/careers/', 'label' => st_t('nav.careers'), 'icon' => 'work'],
    ['path' => '/contact/', 'label' => st_t('nav.contact'), 'icon' => 'mail'],
];
?>
<header id="st-navbar" class="fixed top-0 inset-x-0 z-50 transition-all duration-500 ease-out border-b border-transparent bg-transparent" role="banner">
    <nav class="max-w-container-max w-full mx-auto px-4 sm:px-6 lg:px-margin-desktop flex items-center justify-between gap-4 transition-all duration-500 ease-out h-20 lg:h-28" role="navigation" aria-label="<?php echo esc_attr(st_t('nav.mainNav')); ?>" dir="<?php echo esc_attr($dir); ?>">
        <div class="flex items-center gap-3 lg:gap-4 shrink-0">
            <button type="button" id="st-menu-open" class="lg:hidden relative group inline-flex items-center justify-center size-10 rounded-xl bg-surface-container-lowest border border-outline-variant/30 text-primary cursor-pointer hover:shadow-md" aria-label="<?php echo esc_attr(st_t('nav.openMenu')); ?>" aria-expanded="false" aria-controls="st-mobile-drawer">
                <span class="material-symbols-outlined text-[24px]" aria-hidden="true">menu</span>
            </button>
            <a href="<?php echo esc_url(st_url('/')); ?>" class="flex items-center gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-secondary/50 rounded-lg py-1 group" aria-label="<?php echo esc_attr(st_t('nav.homeAria')); ?>">
                <img src="<?php echo esc_url($logo); ?>" alt="SpinesTech" class="st-nav-logo w-auto object-contain drop-shadow-sm group-hover:scale-105 transition-all duration-300 h-14 lg:h-20" width="80" height="80">
            </a>
        </div>
        <div class="hidden lg:flex items-center gap-6 xl:gap-8 mx-auto flex-1 justify-center">
            <?php foreach ($nav as $item) :
                $active = st_is_current($item['path']);
                $cls = $active ? 'text-primary font-bold after:scale-x-100' : 'text-on-surface hover:text-primary after:scale-x-0 hover:after:scale-x-100';
                ?>
                <a href="<?php echo esc_url(st_url($item['path'])); ?>" class="relative font-label-lg whitespace-nowrap px-1 py-2 transition-colors duration-300 after:content-[''] after:absolute after:bottom-0 after:inset-x-0 after:h-[2px] after:bg-secondary after:origin-left after:transition-transform after:duration-300 <?php echo esc_attr($cls); ?>"><?php echo esc_html($item['label']); ?></a>
            <?php endforeach; ?>
        </div>
        <div class="hidden lg:flex items-center gap-4 shrink-0">
            <a href="<?php echo esc_url(st_lang_switch_url()); ?>" class="group flex items-center justify-center size-12 rounded-full border border-outline-variant/30 text-on-surface-variant font-label-md hover:text-primary hover:bg-surface-container hover:border-primary/30 hover:shadow-md transition-all" aria-label="<?php echo esc_attr($locale === 'ar' ? st_t('nav.switchToEnglish') : st_t('nav.switchToArabic')); ?>">
                <span class="material-symbols-outlined group-hover:rotate-180 transition-transform duration-500">translate</span>
            </a>
            <button type="button" data-st-open-consultation class="group relative overflow-hidden bg-primary text-on-primary font-label-lg py-3.5 px-8 rounded-full cursor-pointer whitespace-nowrap shadow-lg shadow-primary/20 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                <span class="relative z-10 flex items-center gap-2"><?php echo esc_html(st_t('nav.bookConsultation')); ?><span class="material-symbols-outlined text-[18px]">call_made</span></span>
            </button>
        </div>
    </nav>
</header>

<div id="st-mobile-overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[60] hidden" aria-hidden="true"></div>
<aside id="st-mobile-drawer" class="fixed inset-y-0 w-[min(100vw-2rem,360px)] bg-surface z-[70] shadow-2xl flex flex-col transform transition-transform duration-300 <?php echo $dir === 'rtl' ? 'right-0 translate-x-full' : 'left-0 -translate-x-full'; ?>" dir="<?php echo esc_attr($dir); ?>" aria-hidden="true">
    <div class="flex items-center justify-between px-6 py-5 border-b border-outline-variant/20">
        <a href="<?php echo esc_url(st_url('/')); ?>"><img src="<?php echo esc_url($logo); ?>" alt="SpinesTech" class="h-10 w-auto"></a>
        <button type="button" id="st-menu-close" class="size-10 inline-flex items-center justify-center rounded-xl border border-outline-variant/30" aria-label="<?php echo esc_attr(st_t('nav.closeMenu')); ?>"><span class="material-symbols-outlined">close</span></button>
    </div>
    <div class="flex flex-col flex-1 px-4 py-6 overflow-y-auto gap-2">
        <?php foreach ($nav as $item) : ?>
            <a href="<?php echo esc_url(st_url($item['path'])); ?>" class="flex items-center gap-4 py-4 px-5 rounded-2xl font-label-lg text-on-surface hover:bg-surface-container-highest hover:text-primary transition-all">
                <span class="material-symbols-outlined opacity-70" aria-hidden="true"><?php echo esc_html($item['icon']); ?></span>
                <?php echo esc_html($item['label']); ?>
            </a>
        <?php endforeach; ?>
        <div class="mt-auto pt-6 flex flex-col gap-3">
            <a href="<?php echo esc_url(st_lang_switch_url()); ?>" class="w-full flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl border-2 border-outline-variant/20 text-on-surface-variant font-label-lg hover:text-primary transition-all">
                <span class="material-symbols-outlined text-[20px]">translate</span><?php echo esc_html($locale === 'ar' ? st_t('nav.english') : st_t('nav.arabic')); ?>
            </a>
            <button type="button" data-st-open-consultation class="w-full flex items-center justify-center gap-2 bg-primary text-on-primary font-bold py-4 px-5 rounded-xl shadow-lg"><?php echo esc_html(st_t('nav.bookConsultation')); ?></button>
        </div>
    </div>
</aside>
