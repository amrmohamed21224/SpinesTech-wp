<?php
get_header();
while (have_posts()) : the_post();
    $id = get_the_ID();
    $icon = get_post_meta($id, 'st_icon', true) ?: 'code';
    $features = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_features') : [];
?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto">
        <a href="<?php echo esc_url(st_url('/services/')); ?>" class="inline-flex items-center gap-2 text-secondary font-bold mb-8"><span class="material-symbols-outlined">arrow_back</span><?php echo esc_html(st_t('services.viewAll')); ?></a>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-4 mb-6"><span class="material-symbols-outlined text-4xl text-secondary bg-secondary/10 p-4 rounded-xl"><?php echo esc_attr($icon); ?></span><h1 class="text-headline-xl font-bold text-primary"><?php the_title(); ?></h1></div>
                <p class="text-body-lg text-on-surface-variant mb-8"><?php echo esc_html(get_the_excerpt()); ?></p>
                <div class="prose max-w-none text-on-surface-variant"><?php the_content(); ?></div>
                <?php if ($features) : ?>
                    <ul class="mt-8 space-y-3"><?php foreach ($features as $f) : ?><li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-secondary rounded-full"></span><?php echo esc_html($f); ?></li><?php endforeach; ?></ul>
                <?php endif; ?>
            </div>
            <aside class="lg:col-span-1">
                <div class="p-8 bg-surface-container-low rounded-2xl border border-outline-variant/20 sticky top-28">
                    <a href="<?php echo esc_url(st_url('/quote/')); ?>" class="block w-full text-center bg-secondary text-on-secondary py-3.5 rounded-xl font-bold mb-3"><?php echo esc_html(st_t('home.requestQuote')); ?></a>
                    <button type="button" data-st-open-consultation class="block w-full text-center border-2 border-primary text-primary py-3.5 rounded-xl font-bold"><?php echo esc_html(st_t('nav.bookConsultation')); ?></button>
                </div>
            </aside>
        </div>
    </div>
</main>
<?php endwhile; get_footer(); ?>
