<?php
get_header();
while (have_posts()) :
    the_post();
    $id = get_the_ID();
    $icon = get_post_meta($id, 'st_icon', true) ?: 'inventory_2';
    $badge = get_post_meta($id, 'st_badge', true);
    $tagline = get_post_meta($id, 'st_tagline', true);
    $features = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_features') : [];
    $highlights = st_parse_pipe_meta($id, 'st_highlights');
    $modules = st_parse_pipe_meta($id, 'st_modules');
    $use_cases = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_use_cases') : [];
    $specs = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_tech_specs') : [];
    if (!$highlights && $features) {
        foreach ($features as $i => $f) {
            $highlights[] = ['icon' => 'check_circle', 'title' => $f, 'body' => ''];
        }
    }
    ?>
<main class="text-start overflow-hidden">
    <section class="relative min-h-[85vh] flex items-center bg-primary-container text-on-primary overflow-hidden" data-st-product-hero>
        <div class="absolute inset-0 islamic-pattern opacity-[0.04]"></div>
        <div class="absolute top-20 right-10 w-72 h-72 bg-secondary/20 rounded-full blur-3xl"></div>
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-32 relative z-10 w-full">
            <a href="<?php echo esc_url(st_url('/products/')); ?>" class="inline-flex items-center gap-2 text-secondary-fixed font-bold mb-8"><span class="material-symbols-outlined">arrow_back</span><?php echo esc_html(st_t('nav.products')); ?></a>
            <?php if ($badge) : ?><span class="inline-block px-4 py-1 bg-secondary/20 text-secondary-fixed rounded-full text-caption font-bold mb-4"><?php echo esc_html($badge); ?></span><?php endif; ?>
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center gap-4 mb-6"><span class="material-symbols-outlined text-5xl text-secondary-fixed bg-white/10 p-4 rounded-2xl"><?php echo esc_attr($icon); ?></span></div>
                    <h1 class="text-display-lg-mobile md:text-display-lg font-bold mb-4"><?php the_title(); ?></h1>
                    <?php if ($tagline) : ?><p class="text-body-lg opacity-90 mb-6"><?php echo esc_html($tagline); ?></p><?php endif; ?>
                    <p class="text-body-md opacity-80 mb-8 max-w-xl"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php if ($features) : ?>
                        <div class="flex flex-wrap gap-2 mb-8"><?php foreach (array_slice($features, 0, 4) as $f) : ?><span class="px-3 py-1.5 bg-white/10 rounded-full text-sm border border-white/10"><?php echo esc_html($f); ?></span><?php endforeach; ?></div>
                    <?php endif; ?>
                    <div class="flex flex-wrap gap-4">
                        <a href="<?php echo esc_url(st_url('/quote/?product=' . urlencode(get_post_field('post_name', $id)))); ?>" class="bg-secondary text-on-secondary px-8 py-4 rounded-xl font-bold hover:shadow-xl transition-all"><?php echo esc_html(get_post_meta($id, 'st_cta_primary', true) ?: st_t('home.requestQuote')); ?></a>
                        <button type="button" data-st-open-consultation class="border-2 border-white/30 px-8 py-4 rounded-xl font-bold hover:bg-white/10 transition-all"><?php echo esc_html(st_t('nav.bookConsultation')); ?></button>
                    </div>
                </div>
                <div class="hidden lg:grid grid-cols-2 gap-4">
                    <div class="p-6 bg-white/10 rounded-2xl backdrop-blur border border-white/10 text-center"><div class="text-3xl font-bold text-secondary-fixed" data-st-counter="150">0</div><div class="text-sm opacity-70 mt-1"><?php echo esc_html(st_t('home.projects')); ?></div></div>
                    <div class="p-6 bg-white/10 rounded-2xl backdrop-blur border border-white/10 text-center"><div class="text-3xl font-bold text-secondary-fixed" data-st-counter="99">0</div><div class="text-sm opacity-70 mt-1">SLA %</div></div>
                    <div class="p-6 bg-white/10 rounded-2xl backdrop-blur border border-white/10 text-center col-span-2"><div class="text-3xl font-bold text-secondary-fixed">24/7</div><div class="text-sm opacity-70 mt-1"><?php echo st_locale() === 'ar' ? 'دعم فني' : 'Support'; ?></div></div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($highlights) : ?>
    <section class="py-24 px-margin-mobile md:px-margin-desktop bg-background">
        <div class="max-w-container-max mx-auto grid sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
            <?php foreach ($highlights as $h) : ?>
                <div class="p-8 bg-white border border-outline-variant/30 rounded-2xl hover:shadow-xl hover:-translate-y-1 transition-all">
                    <span class="material-symbols-outlined text-3xl text-secondary mb-4"><?php echo esc_html($h['icon']); ?></span>
                    <h2 class="text-headline-sm font-bold text-primary mb-2"><?php echo esc_html($h['title']); ?></h2>
                    <?php if ($h['body']) : ?><p class="text-on-surface-variant text-sm"><?php echo esc_html($h['body']); ?></p><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($modules) : ?>
    <section class="py-24 px-margin-mobile md:px-margin-desktop bg-surface-container-low" data-st-product-modules>
        <div class="max-w-container-max mx-auto">
            <h2 class="text-headline-xl font-bold text-primary mb-8 text-center"><?php echo st_locale() === 'ar' ? 'الوحدات' : 'Modules'; ?></h2>
            <div class="flex flex-wrap gap-2 mb-8 justify-center">
                <?php foreach ($modules as $i => $m) : ?>
                    <button type="button" data-module="<?php echo (int) $i; ?>" class="st-module-tab px-5 py-2.5 rounded-full border font-bold text-sm transition-all <?php echo $i === 0 ? 'bg-secondary text-on-secondary border-secondary' : 'border-outline-variant/40 text-on-surface-variant hover:border-secondary'; ?>"><?php echo esc_html($m['title']); ?></button>
                <?php endforeach; ?>
            </div>
            <?php foreach ($modules as $i => $m) : ?>
                <div class="st-module-panel p-10 bg-white rounded-2xl border border-outline-variant/20 <?php echo $i === 0 ? '' : 'hidden'; ?>" data-panel="<?php echo (int) $i; ?>">
                    <span class="material-symbols-outlined text-4xl text-secondary mb-4"><?php echo esc_html($m['icon']); ?></span>
                    <h3 class="text-headline-sm font-bold text-primary mb-3"><?php echo esc_html($m['title']); ?></h3>
                    <p class="text-on-surface-variant"><?php echo esc_html($m['body']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <section class="py-24 px-margin-mobile md:px-margin-desktop">
        <div class="max-w-container-max mx-auto grid lg:grid-cols-2 gap-12">
            <?php if ($use_cases) : ?>
                <div><h2 class="text-headline-lg font-bold text-primary mb-6"><?php echo st_locale() === 'ar' ? 'حالات الاستخدام' : 'Use cases'; ?></h2><ul class="space-y-3"><?php foreach ($use_cases as $u) : ?><li class="flex gap-3"><span class="material-symbols-outlined text-secondary text-sm mt-1">check</span><?php echo esc_html($u); ?></li><?php endforeach; ?></ul></div>
            <?php endif; ?>
            <?php if ($specs) : ?>
                <div><h2 class="text-headline-lg font-bold text-primary mb-6"><?php echo st_locale() === 'ar' ? 'المواصفات' : 'Specs'; ?></h2><ul class="space-y-3"><?php foreach ($specs as $s) : ?><li class="flex gap-3"><span class="material-symbols-outlined text-secondary text-sm mt-1">settings</span><?php echo esc_html($s); ?></li><?php endforeach; ?></ul></div>
            <?php endif; ?>
        </div>
        <?php if (get_the_content()) : ?><div class="max-w-container-max mx-auto mt-16 prose max-w-none"><?php the_content(); ?></div><?php endif; ?>
    </section>
</main>
<?php endwhile; get_footer(); ?>
