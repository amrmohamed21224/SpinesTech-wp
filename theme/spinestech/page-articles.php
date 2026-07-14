<?php
/**
 * Template Name: Articles
 * Static hero/topics/CTA + dynamic WordPress posts for featured/grid.
 */
get_header();

/* ── helper: reading time from word count ── */
if (!function_exists('st_reading_time')) {
    function st_reading_time($post_id)
    {
        $content = get_post_field('post_content', $post_id);
        $words   = str_word_count(wp_strip_all_tags($content));
        $minutes = (int) ceil($words / 200);
        return max(1, $minutes);
    }
}

/* ── helper: arabic-safe excerpt ── */
if (!function_exists('st_short_excerpt')) {
    function st_short_excerpt($post_id, $length = 26)
    {
        $text = get_the_excerpt($post_id);
        $text = wp_strip_all_tags($text);
        $words = preg_split('/\s+/u', trim($text));
        if (count($words) > $length) {
            $words = array_slice($words, 0, $length);
            return implode(' ', $words) . '…';
        }
        return $text;
    }
}

/* ── helper: safe thumbnail with fallback chain (fixes missing 'large'/'medium_large' sizes) ── */
if (!function_exists('st_article_thumb')) {
    function st_article_thumb($post_id, $preferred_size = 'full')
    {
        $thumb = get_the_post_thumbnail_url($post_id, $preferred_size);
        if (!$thumb) {
            $thumb = get_the_post_thumbnail_url($post_id, 'full');
        }
        if (!$thumb) {
            $thumb = st_url('images/hero.png');
        }
        return $thumb;
    }
}

$is_rtl = st_locale() === 'ar';
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';

/* ── featured post = latest published ── */
$featured_query = new WP_Query([
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
$featured_id = $featured_query->have_posts() ? $featured_query->posts[0]->ID : 0;

/* ── grid: paginated, excluding featured ── */
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$grid_query = new WP_Query([
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $paged,
    'post__not_in'   => $paged === 1 ? [$featured_id] : [],
]);
?>
<main class="art-page" dir="<?php echo esc_attr(st_dir()); ?>">

    <!-- ═══════════════════════════════
         HERO — static, animated shader
    ═══════════════════════════════ -->
    <section class="art-hero">
        <canvas id="art-shader-canvas" class="art-hero__shader"></canvas>
        <div class="art-hero__fade"></div>

        <div class="container art-hero__inner">
            <h1 class="art-cinematic art-hero__title" style="--delay:0.1s">رؤى تقنية لبناء منتجات رقمية أفضل</h1>
            <p class="art-cinematic art-hero__subtitle" style="--delay:0.3s">
                مقالات عملية حول بناء التطبيقات، المنصات الرقمية، لوحات التحكم، الأنظمة التشغيلية، ونماذج التعاون التقني — من زاوية الأعمال والتنفيذ، لا من زاوية الكود فقط.
            </p>
            <p class="art-cinematic art-hero__note" style="--delay:0.5s">
                نشارك خبرات تساعد الشركات وروّاد الأعمال والجهات التقنية على اتخاذ قرارات أوضح قبل بناء المنتج أو تطويره.
            </p>
            <div class="art-cinematic art-hero__pills" style="--delay:0.5s">
                <?php foreach (['بناء المنتجات', 'تطبيقات الجوال', 'لوحات التحكم', 'الشراكات التقنية', 'MVP', 'الأنظمة التشغيلية'] as $pill) : ?>
                    <span class="art-pill"><?php echo esc_html($pill); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         FEATURED ARTICLE — dynamic
    ═══════════════════════════════ -->
    <?php if ($featured_id) :
        $cats = get_the_category($featured_id);
        $cat_name = !empty($cats) ? $cats[0]->name : ($is_rtl ? 'مقالات' : 'Articles');
        $thumb = st_article_thumb($featured_id, 'large');
        $rt = st_reading_time($featured_id);
    ?>
    <section class="art-featured container reveal">
        <div class="art-featured__card">
            <div class="art-featured__media">
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title($featured_id)); ?>" loading="eager">
            </div>
            <div class="art-featured__body">
                <div class="art-featured__eyebrow">
                    <span><?php echo esc_html($cat_name); ?></span>
                    <span class="art-featured__eyebrow-line"></span>
                </div>
                <h2><a href="<?php echo esc_url(get_permalink($featured_id)); ?>"><?php echo esc_html(get_the_title($featured_id)); ?></a></h2>
                <p><?php echo esc_html(st_short_excerpt($featured_id, 30)); ?></p>
                <div class="art-featured__footer">
                    <a href="<?php echo esc_url(get_permalink($featured_id)); ?>" class="art-read-link">
                        <span><?php echo esc_html($is_rtl ? 'قراءة المقال' : 'Read article'); ?></span>
                        <span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span>
                    </a>
                    <span class="art-featured__time"><?php echo esc_html(($is_rtl ? 'قراءة ' : '') . $rt . ($is_rtl ? ' دقائق' : ' min read')); ?></span>
                </div>
            </div>
        </div>
    </section>
    <?php endif; wp_reset_postdata(); ?>

    <!-- ═══════════════════════════════
         LATEST ARTICLES GRID — dynamic
    ═══════════════════════════════ -->
    <section class="art-grid-section container">
        <div class="art-grid-section__head reveal">
            <h2><?php echo esc_html($is_rtl ? 'آخر المقالات' : 'Latest Articles'); ?></h2>
            <span class="art-grid-section__rule"></span>
        </div>

        <?php if ($grid_query->have_posts()) : ?>
            <div class="art-grid">
                <?php $i = 0; while ($grid_query->have_posts()) : $grid_query->the_post();
                    $cats = get_the_category(get_the_ID());
                    $cat_name = !empty($cats) ? $cats[0]->name : ($is_rtl ? 'مقالات' : 'Articles');
                    $thumb = st_article_thumb(get_the_ID(), 'medium_large');
                    $rt = st_reading_time(get_the_ID());
                    $i++;
                ?>
                    <article class="art-card reveal" style="--delay:<?php echo esc_attr(($i - 1) * 70); ?>ms">
                        <a href="<?php the_permalink(); ?>" class="art-card__media">
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                        </a>
                        <div class="art-card__body">
                            <span class="art-card__cat"><?php echo esc_html($cat_name); ?></span>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(st_short_excerpt(get_the_ID(), 20)); ?></p>
                            <div class="art-card__footer">
                                <a href="<?php the_permalink(); ?>" class="art-read-link art-read-link--sm">
                                    <span><?php echo esc_html($is_rtl ? 'قراءة المقال' : 'Read article'); ?></span>
                                    <span class="material-symbols-outlined">arrow_back</span>
                                </a>
                                <span class="art-card__time"><?php echo esc_html($is_rtl ? "$rt دقائق" : "$rt min"); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <?php
            $big_links = paginate_links([
                'total'     => $grid_query->max_num_pages,
                'current'   => $paged,
                'mid_size'  => 2,
                'prev_text' => '<span class="material-symbols-outlined">' . ($is_rtl ? 'chevron_right' : 'chevron_left') . '</span>',
                'next_text' => '<span class="material-symbols-outlined">' . ($is_rtl ? 'chevron_left' : 'chevron_right') . '</span>',
                'type'      => 'array',
            ]);
            if (!empty($big_links)) : ?>
                <nav class="art-pagination reveal">
                    <?php foreach ($big_links as $link) : ?>
                        <?php echo str_replace('page-numbers', 'art-page-btn', $link); ?>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>

        <?php else : ?>
            <p class="art-empty"><?php echo esc_html($is_rtl ? 'لا توجد مقالات منشورة بعد.' : 'No articles published yet.'); ?></p>
        <?php endif; ?>
    </section>

    <!-- ═══════════════════════════════
         محاور نكتب عنها — static
    ═══════════════════════════════ -->
    <section class="art-topics">
        <div class="container">
            <div class="art-topics__head reveal">
                <h2>محاور نكتب عنها</h2>
                <span class="art-topics__rule"></span>
            </div>
            <div class="art-grid art-grid--4">
                <?php
                $topics = [
                    ['lightbulb', 'من الفكرة إلى المنتج', 'تحويل الرؤى الطموحة إلى تجارب مستخدم ملموسة وناجحة تخدم أهداف الأعمال.'],
                    ['dashboard', 'التشغيل ولوحات التحكم', 'بناء الأدوات التي تمنحك السيطرة الكاملة على عملياتك اليومية بكفاءة عالية.'],
                    ['handshake', 'نماذج التعاون التقني', 'كيفية بناء شراكات تقنية مستدامة وفعالة تعزز من قدرات الشركة ونموها.'],
                    ['language', 'تجارب السوق الخليجي', 'حلول مصممة لتناسب الاحتياجات الثقافية والتجارية الفريدة للمنطقة الخليجية.'],
                ];
                foreach ($topics as $i => [$icon, $title, $desc]) : ?>
                    <div class="art-topic-card reveal" style="--delay:<?php echo esc_attr($i * 90); ?>ms">
                        <div class="art-topic-card__icon"><span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span></div>
                        <h4><?php echo esc_html($title); ?></h4>
                        <p><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         FINAL CTA — static
    ═══════════════════════════════ -->
    <section class="container art-cta-wrap">
        <div class="art-cta reveal">
            <div class="art-cta__glow art-cta__glow--1"></div>
            <div class="art-cta__glow art-cta__glow--2"></div>
            <div class="art-cta__inner">
                <h2>هل تحتاج مقالًا… أم تحتاج خطة تنفيذ؟</h2>
                <p>في SpinesTech، لا نكتفي بالكتابة عن التقنية، بل نقوم ببنائها وفق أعلى معايير الجودة المؤسسية. دعنا نناقش فكرتك القادمة ونحولها إلى منتج رقمي رائد.</p>
                <div class="art-cta__actions">
                    <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="art-btn art-btn--primary">احجز استشارة مجانية</a>
                    <a href="<?php echo esc_url(home_url('/case-studies/')); ?>" class="art-btn art-btn--ghost">استعراض أعمالنا</a>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>