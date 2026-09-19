<?php
/**
 * Template Name: Articles
 * "THE DISPATCH" redesign â€” full markup rebuild. All query logic,
 * helper functions, and SEO hooks below are unchanged from the
 * previous version; only the HTML/CSS layer was rebuilt.
 */

// â”€â”€ SEO â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
add_filter( 'pre_get_document_title', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    return $is_rtl
        ? 'Ø§Ù„Ù…Ø¯ÙˆÙ†Ø© | SpinesTech â€” Ø±Ø¤Ù‰ ØªÙ‚Ù†ÙŠØ© Ù„Ø¨Ù†Ø§Ø¡ Ù…Ù†ØªØ¬Ø§Øª Ø±Ù‚Ù…ÙŠØ© Ø£ÙØ¶Ù„'
        : 'Blog | SpinesTech â€” Tech Insights for Building Better Digital Products';
}, 999 );

add_action( 'wp_head', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    st_seo_set_description( $is_rtl
        ? 'مقالات SpinesTech التقنية حول بناء التطبيقات، المنصات الرقمية، لوحات التحكم، والأنظمة التشغيلية في السعودية والخليج.'
        : 'SpinesTech technical articles on building apps, digital platforms, dashboards, and operational systems across Saudi Arabia and the GCC.' );
}, 3 );
// â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€

get_header();

/* â”€â”€ helper: reading time, Arabic + Latin aware (word-boundary regex, not str_word_count) â”€â”€ */
if (!function_exists('st_reading_time')) {
    function st_reading_time($post_id)
    {
        $content = wp_strip_all_tags(get_post_field('post_content', $post_id));
        $words   = preg_split('/\s+/u', trim($content), -1, PREG_SPLIT_NO_EMPTY);
        $count   = is_array($words) ? count($words) : 0;
        return max(1, (int) ceil($count / 180)); // ~180 wpm average reading speed
    }
}

/* â”€â”€ helper: arabic-safe excerpt â”€â”€ */
if (!function_exists('st_short_excerpt')) {
    function st_short_excerpt($post_id, $length = 26)
    {
        $text = wp_strip_all_tags(get_the_excerpt($post_id));
        $words = preg_split('/\s+/u', trim($text), -1, PREG_SPLIT_NO_EMPTY);
        if (count($words) > $length) {
            $words = array_slice($words, 0, $length);
            return implode(' ', $words) . 'â€¦';
        }
        return $text;
    }
}

/* â”€â”€ helper: safe thumbnail with fallback chain â”€â”€ */
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

/* â”€â”€ helper: real category name, ignoring WordPress's default "Uncategorized" bucket â”€â”€ */
if (!function_exists('st_article_category_name')) {
    function st_article_category_name($post_id, $fallback)
    {
        $cats = get_the_category($post_id);
        foreach ($cats as $cat) {
            if ($cat->slug !== 'uncategorized') {
                return $cat->name;
            }
        }
        return $fallback;
    }
}

$is_rtl = st_locale() === 'ar';
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';

/* â”€â”€ featured post = latest published â”€â”€ */
$featured_query = new WP_Query([
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
$featured_id = $featured_query->have_posts() ? $featured_query->posts[0]->ID : 0;
wp_reset_postdata();

/* â”€â”€ grid: paginated, ALWAYS excluding featured â”€â”€ */
$paged = isset($_GET['articles_page']) ? max(1, absint($_GET['articles_page'])) : 1;
$grid_query = new WP_Query([
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $paged,
    'post__not_in'   => $featured_id ? [$featured_id] : [],
]);
?>
<main class="art-page" dir="<?php echo esc_attr(st_dir()); ?>">

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         HERO
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="art2-hero">
        <canvas class="st-hero-canvas art2-hero__shader"></canvas>
        <div class="art2-hero__glow-1" aria-hidden="true"></div>
        <div class="art2-hero__glow-2" aria-hidden="true"></div>
        <div class="art2-hero__grid" aria-hidden="true"></div>
        <div class="art2-hero__scan" aria-hidden="true"></div>

        <div class="container art2-hero__inner">
            <span class="art2-eyebrow art2-eyebrow--hero art-cinematic" style="--delay:0s">
                <?php echo esc_html($is_rtl ? 'Ù…Ø¬Ù„Ø© SpinesTech' : 'The SpinesTech Journal'); ?>
            </span>
            <h1 class="art-cinematic art2-hero__title" style="--delay:0.1s">
                <?php if ( $is_rtl ) : ?>
                    Ø±Ø¤Ù‰ ØªÙ‚Ù†ÙŠØ© Ù„Ø¨Ù†Ø§Ø¡ <span class="art2-hero__title-accent">Ù…Ù†ØªØ¬Ø§Øª Ø±Ù‚Ù…ÙŠØ© Ø£ÙØ¶Ù„</span>
                <?php else : ?>
                    Tech Insights for Building <span class="art2-hero__title-accent">Better Digital Products</span>
                <?php endif; ?>
            </h1>
            <p class="art-cinematic art2-hero__subtitle" style="--delay:0.3s">
                <?php echo esc_html($is_rtl
                    ? 'Ù…Ù‚Ø§Ù„Ø§Øª Ø¹Ù…Ù„ÙŠØ© Ø­ÙˆÙ„ Ø¨Ù†Ø§Ø¡ Ø§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§ØªØŒ Ø§Ù„Ù…Ù†ØµØ§Øª Ø§Ù„Ø±Ù‚Ù…ÙŠØ©ØŒ Ù„ÙˆØ­Ø§Øª Ø§Ù„ØªØ­ÙƒÙ…ØŒ Ø§Ù„Ø£Ù†Ø¸Ù…Ø© Ø§Ù„ØªØ´ØºÙŠÙ„ÙŠØ©ØŒ ÙˆÙ†Ù…Ø§Ø°Ø¬ Ø§Ù„ØªØ¹Ø§ÙˆÙ† Ø§Ù„ØªÙ‚Ù†ÙŠ â€” Ù…Ù† Ø²Ø§ÙˆÙŠØ© Ø§Ù„Ø£Ø¹Ù…Ø§Ù„ ÙˆØ§Ù„ØªÙ†ÙÙŠØ°ØŒ Ù„Ø§ Ù…Ù† Ø²Ø§ÙˆÙŠØ© Ø§Ù„ÙƒÙˆØ¯ ÙÙ‚Ø·.'
                    : 'Practical articles on building apps, digital platforms, dashboards, operational systems, and tech collaboration models â€” from a business and execution perspective, not just code.'); ?>
            </p>
            <p class="art-cinematic art2-hero__note" style="--delay:0.4s">
                <?php echo esc_html($is_rtl
                    ? 'Ù†Ø´Ø§Ø±Ùƒ Ø®Ø¨Ø±Ø§Øª ØªØ³Ø§Ø¹Ø¯ Ø§Ù„Ø´Ø±ÙƒØ§Øª ÙˆØ±ÙˆÙ‘Ø§Ø¯ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„ ÙˆØ§Ù„Ø¬Ù‡Ø§Øª Ø§Ù„ØªÙ‚Ù†ÙŠØ© Ø¹Ù„Ù‰ Ø§ØªØ®Ø§Ø° Ù‚Ø±Ø§Ø±Ø§Øª Ø£ÙˆØ¶Ø­ Ù‚Ø¨Ù„ Ø¨Ù†Ø§Ø¡ Ø§Ù„Ù…Ù†ØªØ¬ Ø£Ùˆ ØªØ·ÙˆÙŠØ±Ù‡.'
                    : 'We share experiences that help companies and entrepreneurs make clearer decisions before building or developing their product.'); ?>
            </p>
            <div class="art-cinematic art2-hero__pills" style="--delay:0.5s">
                <?php
                $pills = $is_rtl
                    ? ['Ø¨Ù†Ø§Ø¡ Ø§Ù„Ù…Ù†ØªØ¬Ø§Øª', 'ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ø§Ù„Ø¬ÙˆØ§Ù„', 'Ù„ÙˆØ­Ø§Øª Ø§Ù„ØªØ­ÙƒÙ…', 'Ø§Ù„Ø´Ø±Ø§ÙƒØ§Øª Ø§Ù„ØªÙ‚Ù†ÙŠØ©', 'MVP', 'Ø§Ù„Ø£Ù†Ø¸Ù…Ø© Ø§Ù„ØªØ´ØºÙŠÙ„ÙŠØ©']
                    : ['Product Building', 'Mobile Apps', 'Dashboards', 'Tech Partnerships', 'MVP', 'Operational Systems'];
                foreach ($pills as $pill) : ?>
                    <span class="art2-pill"><?php echo esc_html($pill); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         FEATURED ARTICLE
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <?php if ($featured_id) :
        $cat_name = st_article_category_name($featured_id, $is_rtl ? 'Ù…Ù‚Ø§Ù„Ø§Øª' : 'Articles');
        $thumb = st_article_thumb($featured_id, 'large');
        $rt = st_reading_time($featured_id);
    ?>
    <section class="art2-featured container reveal">
        <div class="art2-featured__card art2-frame">
            <div class="art2-featured__media">
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title($featured_id)); ?>" loading="eager">
                <div class="art2-featured__media-overlay" aria-hidden="true"></div>
                <span class="art2-featured__badge">
                    <span class="material-symbols-outlined" aria-hidden="true">auto_awesome</span>
                    <?php echo esc_html($is_rtl ? 'Ø§Ù„Ø£Ø­Ø¯Ø«' : 'Latest Dispatch'); ?>
                </span>
            </div>
            <div class="art2-featured__body">
                <div class="art2-featured__eyebrow">
                    <span><?php echo esc_html($cat_name); ?></span>
                    <span class="art2-featured__eyebrow-line"></span>
                </div>
                <h2><a href="<?php echo esc_url(get_permalink($featured_id)); ?>"><?php echo esc_html(get_the_title($featured_id)); ?></a></h2>
                <p><?php echo esc_html(st_short_excerpt($featured_id, 30)); ?></p>
                <div class="art2-featured__footer">
                    <a href="<?php echo esc_url(get_permalink($featured_id)); ?>" class="art2-read-link">
                        <span><?php echo esc_html($is_rtl ? 'Ù‚Ø±Ø§Ø¡Ø© Ø§Ù„Ù…Ù‚Ø§Ù„' : 'Read article'); ?></span>
                        <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($arrow); ?></span>
                    </a>
                    <span class="art2-featured__time">
                        <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                        <?php echo esc_html(($is_rtl ? 'Ù‚Ø±Ø§Ø¡Ø© ' : '') . $rt . ($is_rtl ? ' Ø¯Ù‚Ø§Ø¦Ù‚' : ' min read')); ?>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         LATEST ARTICLES GRID
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="art2-grid-section container">
        <div class="art2-grid-section__head reveal">
            <h2><?php echo esc_html($is_rtl ? 'Ø¢Ø®Ø± Ø§Ù„Ù…Ù‚Ø§Ù„Ø§Øª' : 'Latest Articles'); ?></h2>
            <span class="art2-grid-section__rule"></span>
        </div>

        <?php if ($grid_query->have_posts()) : ?>
            <div class="art2-grid">
                <?php $i = 0; while ($grid_query->have_posts()) : $grid_query->the_post();
                    $cat_name = st_article_category_name(get_the_ID(), $is_rtl ? 'Ù…Ù‚Ø§Ù„Ø§Øª' : 'Articles');
                    $thumb = st_article_thumb(get_the_ID(), 'medium_large');
                    $rt = st_reading_time(get_the_ID());
                    $i++;
                ?>
                    <article class="art2-card reveal" style="--delay:<?php echo esc_attr(($i - 1) * 70); ?>ms">
                        <a href="<?php the_permalink(); ?>" class="art2-card__media">
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            <span class="art2-card__cat-badge"><?php echo esc_html($cat_name); ?></span>
                        </a>
                        <div class="art2-card__body">
                            <span class="art2-card__cat"><?php echo esc_html($cat_name); ?></span>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(st_short_excerpt(get_the_ID(), 20)); ?></p>
                            <div class="art2-card__footer">
                                <a href="<?php the_permalink(); ?>" class="art2-read-link art2-read-link--sm">
                                    <span><?php echo esc_html($is_rtl ? 'Ù‚Ø±Ø§Ø¡Ø© Ø§Ù„Ù…Ù‚Ø§Ù„' : 'Read article'); ?></span>
                                    <span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
                                </a>
                                <span class="art2-card__time"><?php echo esc_html($is_rtl ? "$rt Ø¯Ù‚Ø§Ø¦Ù‚" : "$rt min"); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <?php
            $pagination_base = trailingslashit(remove_query_arg('articles_page', get_permalink()));
            $big_links = paginate_links([
                'total'     => $grid_query->max_num_pages,
                'current'   => $paged,
                'base'      => $pagination_base . '%_%',
                'format'    => '?articles_page=%#%',
                'mid_size'  => 2,
                'prev_text' => '<span class="material-symbols-outlined" aria-hidden="true">' . ($is_rtl ? 'chevron_right' : 'chevron_left') . '</span>',
                'next_text' => '<span class="material-symbols-outlined" aria-hidden="true">' . ($is_rtl ? 'chevron_left' : 'chevron_right') . '</span>',
                'type'      => 'array',
            ]);
            if (!empty($big_links)) : ?>
                <nav class="art2-pagination reveal">
                    <?php foreach ($big_links as $link) : ?>
                        <?php echo str_replace('page-numbers', 'art2-page-btn', $link); ?>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>

        <?php else : ?>
            <p class="art2-empty"><?php echo esc_html($is_rtl ? 'Ù„Ø§ ØªÙˆØ¬Ø¯ Ù…Ù‚Ø§Ù„Ø§Øª Ù…Ù†Ø´ÙˆØ±Ø© Ø¨Ø¹Ø¯.' : 'No articles published yet.'); ?></p>
        <?php endif; ?>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         Ù…Ø­Ø§ÙˆØ± Ù†ÙƒØªØ¨ Ø¹Ù†Ù‡Ø§
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="art2-topics">
        <div class="container">
            <div class="art2-topics__head reveal">
                <span class="art2-eyebrow"><?php echo esc_html($is_rtl ? 'Ù…Ø¬Ø§Ù„Ø§Øª Ø§Ù„ØªØºØ·ÙŠØ©' : 'Coverage Areas'); ?></span>
                <h2><?php echo esc_html($is_rtl ? 'Ù…Ø­Ø§ÙˆØ± Ù†ÙƒØªØ¨ Ø¹Ù†Ù‡Ø§' : 'Topics We Cover'); ?></h2>
                <span class="art2-topics__rule"></span>
            </div>
            <div class="art2-topics__grid">
                <?php
                $topics = [
                    ['lightbulb', $is_rtl ? 'Ù…Ù† Ø§Ù„ÙÙƒØ±Ø© Ø¥Ù„Ù‰ Ø§Ù„Ù…Ù†ØªØ¬'   : 'From Idea to Product',      $is_rtl ? 'ØªØ­ÙˆÙŠÙ„ Ø§Ù„Ø±Ø¤Ù‰ Ø§Ù„Ø·Ù…ÙˆØ­Ø© Ø¥Ù„Ù‰ ØªØ¬Ø§Ø±Ø¨ Ù…Ø³ØªØ®Ø¯Ù… Ù…Ù„Ù…ÙˆØ³Ø© ÙˆÙ†Ø§Ø¬Ø­Ø© ØªØ®Ø¯Ù… Ø£Ù‡Ø¯Ø§Ù Ø§Ù„Ø£Ø¹Ù…Ø§Ù„.'    : 'Turning ambitious visions into tangible, successful user experiences that serve business goals.'],
                    ['dashboard', $is_rtl ? 'Ø§Ù„ØªØ´ØºÙŠÙ„ ÙˆÙ„ÙˆØ­Ø§Øª Ø§Ù„ØªØ­ÙƒÙ…'   : 'Operations & Dashboards',  $is_rtl ? 'Ø¨Ù†Ø§Ø¡ Ø§Ù„Ø£Ø¯ÙˆØ§Øª Ø§Ù„ØªÙŠ ØªÙ…Ù†Ø­Ùƒ Ø§Ù„Ø³ÙŠØ·Ø±Ø© Ø§Ù„ÙƒØ§Ù…Ù„Ø© Ø¹Ù„Ù‰ Ø¹Ù…Ù„ÙŠØ§ØªÙƒ Ø§Ù„ÙŠÙˆÙ…ÙŠØ© Ø¨ÙƒÙØ§Ø¡Ø© Ø¹Ø§Ù„ÙŠØ©.' : 'Building the tools that give you full control over your daily operations.'],
                    ['handshake', $is_rtl ? 'Ù†Ù…Ø§Ø°Ø¬ Ø§Ù„ØªØ¹Ø§ÙˆÙ† Ø§Ù„ØªÙ‚Ù†ÙŠ'    : 'Tech Collaboration',        $is_rtl ? 'ÙƒÙŠÙÙŠØ© Ø¨Ù†Ø§Ø¡ Ø´Ø±Ø§ÙƒØ§Øª ØªÙ‚Ù†ÙŠØ© Ù…Ø³ØªØ¯Ø§Ù…Ø© ÙˆÙØ¹Ø§Ù„Ø© ØªØ¹Ø²Ø² Ù…Ù† Ù‚Ø¯Ø±Ø§Øª Ø§Ù„Ø´Ø±ÙƒØ© ÙˆÙ†Ù…ÙˆÙ‡Ø§.'      : 'How to build sustainable, effective tech partnerships that enhance company capabilities.'],
                    ['language',  $is_rtl ? 'ØªØ¬Ø§Ø±Ø¨ Ø§Ù„Ø³ÙˆÙ‚ Ø§Ù„Ø®Ù„ÙŠØ¬ÙŠ'     : 'GCC Market Insights',       $is_rtl ? 'Ø­Ù„ÙˆÙ„ Ù…ØµÙ…Ù…Ø© Ù„ØªÙ†Ø§Ø³Ø¨ Ø§Ù„Ø§Ø­ØªÙŠØ§Ø¬Ø§Øª Ø§Ù„Ø«Ù‚Ø§ÙÙŠØ© ÙˆØ§Ù„ØªØ¬Ø§Ø±ÙŠØ© Ø§Ù„ÙØ±ÙŠØ¯Ø© Ù„Ù„Ù…Ù†Ø·Ù‚Ø© Ø§Ù„Ø®Ù„ÙŠØ¬ÙŠØ©.'  : 'Solutions designed to suit the unique cultural and business needs of the Gulf region.'],
                ];
                foreach ($topics as $i => [$icon, $title, $desc]) : ?>
                    <div class="art2-topic-card reveal" style="--delay:<?php echo esc_attr($i * 90); ?>ms">
                        <div class="art2-topic-card__icon"><span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($icon); ?></span></div>
                        <h4><?php echo esc_html($title); ?></h4>
                        <p><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         FINAL CTA
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="container art2-cta-wrap">
        <div class="art2-cta reveal">
            <div class="art2-cta__glow art2-cta__glow--1" aria-hidden="true"></div>
            <div class="art2-cta__glow art2-cta__glow--2" aria-hidden="true"></div>
            <div class="art2-cta__inner">
                <span class="art2-eyebrow"><?php echo esc_html($is_rtl ? 'Ù…Ù† Ø§Ù„Ù‚Ø±Ø§Ø¡Ø© Ø¥Ù„Ù‰ Ø§Ù„ØªÙ†ÙÙŠØ°' : 'From Reading to Building'); ?></span>
                <h2><?php echo esc_html($is_rtl ? 'Ù‡Ù„ ØªØ­ØªØ§Ø¬ Ù…Ù‚Ø§Ù„Ù‹Ø§â€¦ Ø£Ù… ØªØ­ØªØ§Ø¬ Ø®Ø·Ø© ØªÙ†ÙÙŠØ°ØŸ' : 'Do You Need an Articleâ€¦ or an Execution Plan?'); ?></h2>
                <p><?php echo esc_html($is_rtl
                    ? 'ÙÙŠ SpinesTechØŒ Ù„Ø§ Ù†ÙƒØªÙÙŠ Ø¨Ø§Ù„ÙƒØªØ§Ø¨Ø© Ø¹Ù† Ø§Ù„ØªÙ‚Ù†ÙŠØ©ØŒ Ø¨Ù„ Ù†Ù‚ÙˆÙ… Ø¨Ø¨Ù†Ø§Ø¦Ù‡Ø§ ÙˆÙÙ‚ Ø£Ø¹Ù„Ù‰ Ù…Ø¹Ø§ÙŠÙŠØ± Ø§Ù„Ø¬ÙˆØ¯Ø© Ø§Ù„Ù…Ø¤Ø³Ø³ÙŠØ©.'
                    : 'At SpinesTech, we don\'t just write about technology â€” we build it according to the highest enterprise quality standards.'); ?></p>
                <div class="art2-cta__actions">
                    <a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( 'contact' ) : home_url( '/contact/' ) ); ?>" class="art-btn art-btn--primary"><?php echo esc_html($is_rtl ? 'Ø§Ø­Ø¬Ø² Ø§Ø³ØªØ´Ø§Ø±Ø© Ù…Ø¬Ø§Ù†ÙŠØ©' : 'Book a Free Consultation'); ?></a>
                    <a href="<?php echo esc_url(home_url('/case-studies/')); ?>" class="art-btn art-btn--ghost"><?php echo esc_html($is_rtl ? 'Ø§Ø³ØªØ¹Ø±Ø§Ø¶ Ø£Ø¹Ù…Ø§Ù„Ù†Ø§' : 'View Our Work'); ?></a>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>
