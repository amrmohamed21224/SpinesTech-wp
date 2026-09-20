<?php
add_filter( 'pre_get_document_title', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    return $is_rtl
        ? 'وظائف وانضمام للفريق الهندسي | SpinesTech'
        : 'Careers at SpinesTech | Join Our Engineering Team';
}, 999 );

add_action( 'wp_head', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    if (function_exists('st_seo_set_description')) {
        st_seo_set_description($is_rtl
            ? 'اكتشف الفرص الوظيفية في SpinesTech وانضم لفريق يطور منتجات رقمية ومنصات معقدة بأعلى المعايير الهندسية.'
            : 'Explore career opportunities at SpinesTech and join an engineering team building complex digital platforms to the highest standards.');
    }
}, 3 );

get_header(); $locale = st_locale(); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <section class="max-w-container-max mx-auto mb-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-block py-1 px-3 bg-secondary-container text-on-secondary-container text-label-md rounded-full mb-6"><?php echo esc_html(st_t('careers.heroBadge')); ?></span>
            <h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold mb-6"><?php echo esc_html(st_t('careers.heroTitle')); ?></h1>
            <p class="text-body-lg text-on-surface-variant mb-10"><?php echo esc_html(st_t('careers.heroSubtitle')); ?></p>
            <div class="flex flex-wrap gap-4">
                <a href="<?php echo esc_url(st_url('/careers/jobs/')); ?>" class="px-8 py-4 bg-primary text-on-primary rounded-xl font-bold inline-flex items-center gap-2 hover:shadow-xl transition-all"><?php echo esc_html(st_t('careers.jobsButton')); ?><span class="material-symbols-outlined" aria-hidden="true">work</span></a>
                <a href="<?php echo esc_url(st_url('/careers/work-environment/')); ?>" class="px-8 py-4 border-2 border-secondary text-secondary rounded-xl font-bold inline-flex items-center gap-2 hover:bg-secondary hover:text-on-secondary transition-all"><?php echo esc_html(st_t('careers.workEnvironmentButton')); ?><span class="material-symbols-outlined" aria-hidden="true">diversity_3</span></a>
            </div>
        </div>
        <img src="<?php echo esc_url(st_asset('images/about/hero.png')); ?>" alt="<?php echo esc_attr($locale === 'ar' ? 'فريق العمل في SpinesTech' : 'SpinesTech Team'); ?>" width="1024" height="1024" loading="lazy" decoding="async" class="rounded-3xl shadow-2xl w-full h-[400px] object-cover hidden md:block">
    </section>
    <div class="max-w-container-max mx-auto grid md:grid-cols-2 gap-gutter">
        <a href="<?php echo esc_url(st_url('/careers/work-environment/')); ?>" class="p-10 bg-surface-container-low rounded-2xl border border-outline-variant/20 hover:shadow-xl transition-all group">
            <span class="material-symbols-outlined text-4xl text-secondary mb-4">diversity_3</span>
            <h2 class="text-headline-sm font-bold text-primary mb-2"><?php echo esc_html(st_t('careers.workEnvironmentButton')); ?></h2>
            <p class="text-on-surface-variant"><?php echo $locale === 'ar' ? 'Ø«Ù‚Ø§ÙØ© ÙØ±ÙŠÙ‚ØŒ ØªØ¹Ù„Ù…ØŒ ÙˆÙ…Ø±ÙˆÙ†Ø©.' : 'Team culture, learning, and flexibility.'; ?></p>
        </a>
        <a href="<?php echo esc_url(st_url('/careers/jobs/')); ?>" class="p-10 bg-primary-container text-on-primary rounded-2xl hover:shadow-xl transition-all group">
            <span class="material-symbols-outlined text-4xl text-secondary-fixed mb-4">work</span>
            <h2 class="text-headline-sm font-bold mb-2"><?php echo esc_html(st_t('careers.jobsButton')); ?></h2>
            <p class="opacity-80"><?php echo $locale === 'ar' ? 'ØªØµÙÙ‘Ø­ Ø§Ù„ÙØ±Øµ Ø§Ù„Ù…ØªØ§Ø­Ø© Ø§Ù„Ø¢Ù†.' : 'Browse current openings.'; ?></p>
        </a>
    </div>
</main>
<?php get_footer(); ?>
