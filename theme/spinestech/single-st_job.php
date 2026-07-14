<?php get_header(); while (have_posts()) : the_post();
    $id = get_the_ID();
    $reqs = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_requirements') : [];
    $benefits = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_benefits') : [];
?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto">
        <a href="<?php echo esc_url(st_url('/careers/jobs/')); ?>" class="text-secondary font-bold mb-8 inline-block"><?php echo esc_html(st_t('careers.jobsTitle')); ?></a>
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <span class="text-caption text-secondary font-bold"><?php echo esc_html(get_post_meta($id, 'st_department', true)); ?></span>
                <h1 class="text-headline-xl font-bold text-primary my-4"><?php the_title(); ?></h1>
                <p class="text-body-lg text-on-surface-variant mb-8"><?php echo esc_html(get_the_excerpt()); ?></p>
                <div class="prose max-w-none mb-8"><?php the_content(); ?></div>
                <?php if ($reqs) : ?><h2 class="font-bold text-primary mb-4"><?php echo st_locale() === 'ar' ? 'المتطلبات' : 'Requirements'; ?></h2><ul class="list-disc ps-6 space-y-2 mb-8"><?php foreach ($reqs as $r) : ?><li><?php echo esc_html($r); ?></li><?php endforeach; ?></ul><?php endif; ?>
                <?php if ($benefits) : ?><h2 class="font-bold text-primary mb-4"><?php echo st_locale() === 'ar' ? 'المميزات' : 'Benefits'; ?></h2><ul class="list-disc ps-6 space-y-2"><?php foreach ($benefits as $b) : ?><li><?php echo esc_html($b); ?></li><?php endforeach; ?></ul><?php endif; ?>
            </div>
            <aside class="p-8 bg-surface-container-low rounded-2xl border border-outline-variant/20 h-fit sticky top-28">
                <ul class="space-y-3 text-sm text-on-surface-variant mb-6">
                    <?php if ($loc = get_post_meta($id, 'st_location', true)) : ?><li class="flex gap-2"><span class="material-symbols-outlined text-secondary text-sm">location_on</span><?php echo esc_html($loc); ?></li><?php endif; ?>
                    <?php if ($type = get_post_meta($id, 'st_type', true)) : ?><li><?php echo esc_html($type); ?></li><?php endif; ?>
                    <?php if ($exp = get_post_meta($id, 'st_experience', true)) : ?><li><?php echo esc_html($exp); ?></li><?php endif; ?>
                </ul>
                <a href="<?php echo esc_url(st_url('/careers/jobs/#career-form')); ?>" class="block w-full text-center bg-primary text-on-primary py-3.5 rounded-xl font-bold"><?php echo esc_html(st_t('careers.applyTitle')); ?></a>
            </aside>
        </div>
    </div>
</main>
<?php endwhile; get_footer(); ?>
