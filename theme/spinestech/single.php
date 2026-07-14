<?php
/**
 * Single Article template — matches the reference editorial design 1:1 (RTL-adapted)
 */
get_header();

if (!function_exists('st_reading_time')) {
    function st_reading_time($post_id)
    {
        $content = get_post_field('post_content', $post_id);
        $words   = str_word_count(wp_strip_all_tags($content));
        return max(1, (int) ceil($words / 200));
    }
}


$is_rtl = st_locale() === 'ar';

$arabic_months = [
    1 => 'يناير', 2 => 'فبراير', 3 => 'مارس', 4 => 'أبريل', 5 => 'مايو', 6 => 'يونيو',
    7 => 'يوليو', 8 => 'أغسطس', 9 => 'سبتمبر', 10 => 'أكتوبر', 11 => 'نوفمبر', 12 => 'ديسمبر',
];

while (have_posts()) : the_post();
    $post_id   = get_the_ID();
    $cats      = get_the_category($post_id);
    $cat_name  = !empty($cats) ? $cats[0]->name : ($is_rtl ? 'مقالات' : 'Articles');
    $cat_id    = !empty($cats) ? $cats[0]->term_id : 0;
    $rt        = st_reading_time($post_id);
    $day       = get_the_date('j', $post_id);
    $month_num = (int) get_the_date('n', $post_id);
    $year      = get_the_date('Y', $post_id);
    $date_str  = $is_rtl ? "{$day} {$arabic_months[$month_num]} {$year}" : get_the_date('F j, Y', $post_id);

    $thumb = get_the_post_thumbnail_url($post_id, 'full');
    if (!$thumb) {
        $thumb = st_url('images/hero.png');
    }
    $caption   = get_the_post_thumbnail_caption($post_id);
?>
<div class="art-progress"><div class="art-progress__bar" id="art-progress-bar"></div></div>

<main class="single-art" dir="<?php echo esc_attr(st_dir()); ?>">
    <article class="single-art__wrap">

        <!-- ═══════════════════════════════
             HEADER
        ═══════════════════════════════ -->
        <header class="single-art__header reveal">
            <div class="single-art__eyebrow">
                <span class="single-art__cat"><?php echo esc_html($cat_name); ?></span>
                <span class="single-art__dot">•</span>
                <span class="single-art__label"><?php echo esc_html($is_rtl ? 'بحث مؤسسي' : 'Institutional Research'); ?></span>
            </div>

            <h1 class="single-art__title"><?php the_title(); ?></h1>

            <?php $excerpt = get_the_excerpt(); if ($excerpt) : ?>
                <p class="single-art__subtitle"><?php echo esc_html($excerpt); ?></p>
            <?php endif; ?>

            <div class="single-art__meta">
                <div class="single-art__avatar">
                    <?php echo get_avatar($post_id, 48) ?: '<span class="material-symbols-outlined">person</span>'; ?>
                </div>
                <div class="single-art__meta-main">
                    <div class="single-art__meta-top">
                        <div>
                            <p class="single-art__author"><?php the_author(); ?></p>
                            <p class="single-art__role"><?php echo esc_html($is_rtl ? 'فريق التحرير والبحث' : 'Editorial & Research'); ?></p>
                        </div>
                        <div class="single-art__meta-right">
                            <span><?php echo esc_html($date_str); ?></span>
                            <span>•</span>
                            <span class="single-art__readtime">
                                <span class="material-symbols-outlined">schedule</span>
                                <?php echo esc_html($rt . ($is_rtl ? ' دقائق قراءة' : ' min read')); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ═══════════════════════════════
             FEATURED IMAGE
        ═══════════════════════════════ -->
        <div class="single-art__figure reveal">
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
            <?php if ($caption) : ?><p class="single-art__caption"><?php echo esc_html($caption); ?></p><?php endif; ?>
        </div>

        <!-- ═══════════════════════════════
             ARTICLE BODY
        ═══════════════════════════════ -->
        <div class="single-art__content reveal">
            <?php the_content(); ?>
        </div>

    </article>

    <!-- ═══════════════════════════════
         RELATED ARTICLES
    ═══════════════════════════════ -->
    <?php
    if ($cat_id) {
        $related = new WP_Query([
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'post__not_in'   => [$post_id],
            'cat'            => $cat_id,
        ]);
        if ($related->have_posts()) : ?>
        <section class="single-art__related container">
            <h2 class="reveal"><?php echo esc_html($is_rtl ? 'مقالات ذات صلة' : 'Related Articles'); ?></h2>
            <div class="single-art__related-grid">
                <?php $i = 0; while ($related->have_posts()) : $related->the_post();
                    $rpid = get_the_ID();
                    $rthumb = get_the_post_thumbnail_url($rpid, 'medium_large');
                    if (!$rthumb) {
                        $rthumb = st_url('images/hero.png');
                    }
                    $i++;
                ?>
                    <a href="<?php the_permalink(); ?>" class="single-art__related-card reveal" style="--delay:<?php echo esc_attr(($i - 1) * 80); ?>ms">
                        <div class="single-art__related-media">
                            <img src="<?php echo esc_url($rthumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                        </div>
                        <h4><?php the_title(); ?></h4>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </section>
        <?php endif;
    }
    ?>

    <!-- ═══════════════════════════════
         FINAL CTA
    ═══════════════════════════════ -->
    <section class="single-art__cta reveal">
        <div class="container single-art__cta-inner">
            <h2><?php echo esc_html($is_rtl ? 'جاهز لبناء منصتك القادمة؟' : 'Ready to build your next platform?'); ?></h2>
            <p><?php echo esc_html($is_rtl
                ? 'انضم إلى عشرات الشركات التي تعتمد على منهجية SpinesTech لتصميم وبناء وتوسيع تجارب رقمية جاهزة للمستقبل.'
                : 'Join dozens of enterprises leveraging SpinesTech\'s methodology to design, build, and scale future-proof digital experiences.'); ?></p>
            <div class="single-art__cta-actions">
                <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="single-art__cta-btn single-art__cta-btn--fill"><?php echo esc_html($is_rtl ? 'ابدأ مشروعك' : 'Start Your Project'); ?></a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="single-art__cta-btn single-art__cta-btn--outline"><?php echo esc_html($is_rtl ? 'تواصل معنا' : 'Contact Us'); ?></a>
            </div>
        </div>
    </section>

</main>
<?php endwhile; ?>
<?php get_footer(); ?>