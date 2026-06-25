<?php get_header(); while (have_posts()) : the_post();
    $id = get_the_ID();
    $client = get_post_meta($id, 'st_client', true);
    $sector = get_post_meta($id, 'st_sector', true);
    $challenge = get_post_meta($id, 'st_challenge', true);
    $solution = get_post_meta($id, 'st_solution', true);
    $result = get_post_meta($id, 'st_result', true);
?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto">
        <div class="flex flex-wrap gap-2 mb-4"><?php if ($sector) : ?><span class="px-3 py-1 bg-secondary/10 text-secondary rounded-full text-caption font-bold"><?php echo esc_html($sector); ?></span><?php endif; ?><?php if ($client) : ?><span class="px-3 py-1 bg-surface-container-high rounded-full text-caption"><?php echo esc_html($client); ?></span><?php endif; ?></div>
        <h1 class="text-headline-xl font-bold text-primary mb-8"><?php the_title(); ?></h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <?php foreach ([['تحدي','lightbulb',$challenge],['الحل','build',$solution],['النتيجة','trending_up',$result]] as [$label,$icon,$text]) : if (!$text) continue; ?>
                <div class="p-8 bg-white border border-outline-variant/30 rounded-2xl"><span class="material-symbols-outlined text-secondary mb-4"><?php echo esc_html($icon); ?></span><h3 class="font-bold text-primary mb-2"><?php echo esc_html($label); ?></h3><p class="text-on-surface-variant text-sm"><?php echo esc_html($text); ?></p></div>
            <?php endforeach; ?>
        </div>
        <div class="prose max-w-none"><?php the_content(); ?></div>
    </div>
</main>
<?php endwhile; get_footer(); ?>
