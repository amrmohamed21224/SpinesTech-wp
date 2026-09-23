<?php
/**
 * Single Article template â€” "THE DISPATCH â€” READING VIEW" redesign.
 * All helper functions and content logic below are unchanged; only
 * the HTML/CSS layer was rebuilt. Featured Image is still
 * intentionally not shown here (archive/related cards only), per
 * the earlier client decision.
 */

// â”€â”€ SEO: dynamic per-post title & meta pulled from WordPress post data â”€â”€â”€â”€
add_filter( 'pre_get_document_title', function () {
    if ( ! is_singular( 'post' ) ) {
        return '';
    }
    $slug = (string) get_post_field( 'post_name', get_queried_object_id() );
    $title = '';
    
    if ( function_exists( 'st_article_config' ) ) {
        $cfg = st_article_config( $slug );
        if ( $cfg && ! empty( $cfg['title'] ) ) {
            $title = (string) st_article_text( $cfg['title'] );
        }
    }
    
    if ( ! $title ) {
        $title = (string) get_the_title( get_queried_object_id() );
    }
    
    if ( ! $title ) {
        return 'SpinesTech Blog';
    }
    
    // Prevent title from being too long by omitting the site name
    if ( mb_strlen( $title ) > 50 ) {
        if ( mb_strlen( $title ) > 60 ) {
            // Hard truncate to keep it strictly under 60 characters for SEO tools
            $title = mb_substr( $title, 0, 57 ) . '...';
        }
        return $title;
    }
    
    return $title . ' | SpinesTech';
}, 999 );

add_action('wp_head', function () {
    if (!is_singular('post')) {
        return;
    }
    $slug = (string) get_post_field('post_name', get_queried_object_id());
    if (function_exists('st_article_config')) {
        $cfg = st_article_config($slug);
        if ($cfg && !empty($cfg['meta_description']) && function_exists('st_seo_set_description')) {
            st_seo_set_description((string) st_article_text($cfg['meta_description']));
            return;
        }
    }
    $excerpt = trim((string) get_the_excerpt());
    if ($excerpt !== '' && function_exists('st_seo_set_description')) {
        st_seo_set_description($excerpt);
    }
}, 3);
// â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€

get_header();


/* â”€â”€ helper: reading time, Arabic + Latin aware â”€â”€ */
if (!function_exists('st_reading_time')) {
    function st_reading_time($post_id)
    {
        $content = wp_strip_all_tags(get_post_field('post_content', $post_id));
        $words   = preg_split('/\s+/u', trim($content), -1, PREG_SPLIT_NO_EMPTY);
        $count   = is_array($words) ? count($words) : 0;
        return max(1, (int) ceil($count / 180));
    }
}

/* â”€â”€ helper: real category, ignoring WordPress's default "Uncategorized" bucket â”€â”€ */
if (!function_exists('st_article_category_name')) {
    function st_article_category_name($post_id, $fallback)
    {
        $cats = get_the_category($post_id);
        foreach ($cats as $cat) {
            if ($cat->slug !== 'uncategorized') {
                return $cat;
            }
        }
        return null;
    }
}

/* â”€â”€ helper: safe thumbnail with fallback chain (used ONLY for archive/related cards) â”€â”€ */
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

/* â”€â”€ helper: related articles â€” same category first, padded with recent posts â”€â”€ */
if (!function_exists('st_related_articles')) {
    function st_related_articles($post_id, $category, $count = 3)
    {
        $exclude = [$post_id];
        $results = [];

        if ($category) {
            $cat_query = new WP_Query([
                'posts_per_page' => $count,
                'post_status'    => 'publish',
                'post__not_in'   => $exclude,
                'cat'            => $category->term_id,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);
            $results = $cat_query->posts;
            wp_reset_postdata();
        }

        if (count($results) < $count) {
            $need = $count - count($results);
            $exclude_ids = array_merge($exclude, wp_list_pluck($results, 'ID'));
            $recent_query = new WP_Query([
                'posts_per_page' => $need,
                'post_status'    => 'publish',
                'post__not_in'   => $exclude_ids,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);
            $results = array_merge($results, $recent_query->posts);
            wp_reset_postdata();
        }

        return $results;
    }
}

/* â”€â”€ helper: find the actual live URL of the articles archive page â”€â”€ */
if (!function_exists('st_articles_page_url')) {
    function st_articles_page_url()
    {
        static $url = null;
        if ($url !== null) {
            return $url;
        }
        $pages = get_posts([
            'post_type'      => 'page',
            'posts_per_page' => 1,
            'meta_key'       => '_wp_page_template',
            'meta_value'     => 'page-articles.php',
            'post_status'    => 'publish',
        ]);
        $url = !empty($pages) ? get_permalink($pages[0]->ID) : home_url('/');
        return $url;
    }
}

/* â”€â”€ helper: human-relative time for recent posts, absolute date after 7 days â”€â”€ */
if (!function_exists('st_article_date_display')) {
    function st_article_date_display($post_id, $is_rtl, $arabic_months)
    {
        $published = get_post_time('U', true, $post_id);
        $now       = current_time('timestamp', true);
        $diff      = $now - $published;

        if ($diff < WEEK_IN_SECONDS) {
            $human = human_time_diff($published, $now);
            return $is_rtl ? "Ù…Ù†Ø° {$human}" : "{$human} ago";
        }

        $day       = get_the_date('j', $post_id);
        $month_num = (int) get_the_date('n', $post_id);
        $year      = get_the_date('Y', $post_id);
        return $is_rtl ? "{$day} {$arabic_months[$month_num]} {$year}" : get_the_date('F j, Y', $post_id);
    }
}

/* â”€â”€ helper: force lazy-loading + async decode on content images (except the
   first one) so the browser doesn't try to decode every image at once â”€â”€ */
if (!function_exists('st_lazy_content_images')) {
    function st_lazy_content_images($content)
    {
        $count = 0;
        return preg_replace_callback('/<img\s[^>]*>/i', function ($m) use (&$count) {
            $count++;
            $tag = $m[0];
            if ($count === 1) {
                if (!preg_match('/\sdecoding=/i', $tag)) {
                    $tag = preg_replace('/<img/i', '<img decoding="async"', $tag, 1);
                }
                return $tag;
            }
            if (!preg_match('/\sloading=/i', $tag)) {
                $tag = preg_replace('/<img/i', '<img loading="lazy"', $tag, 1);
            }
            if (!preg_match('/\sdecoding=/i', $tag)) {
                $tag = preg_replace('/<img/i', '<img decoding="async"', $tag, 1);
            }
            return $tag;
        }, $content);
    }
}

$is_rtl = st_locale() === 'ar';
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';

/*
 * â”€â”€ Detect article content direction (professional bilingual approach) â”€â”€
 * Count Arabic Unicode characters vs total alphabetic chars in the title
 * + first 600 chars of body. If Arabic > 30 % â†’ RTL, otherwise â†’ LTR.
 * This mirrors how BBC Arabic, Al-Jazeera English, and The Guardian Arabic
 * handle bilingual content: the ARTICLE body direction follows the text,
 * not the site locale. A helper is declared here so it is available below.
 */
if ( ! function_exists( 'st_detect_content_dir' ) ) {
    function st_detect_content_dir( $post_id ) {
        $raw    = wp_strip_all_tags( get_post_field( 'post_content', $post_id ) );
        $sample = get_the_title( $post_id ) . ' ' . mb_substr( $raw, 0, 600 );
        $arabic = preg_match_all( '/[\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}]/u', $sample );
        $total  = preg_match_all( '/\pL/u', $sample );
        if ( ! $total ) return 'ltr';
        return ( $arabic / $total ) > 0.30 ? 'rtl' : 'ltr';
    }
}

$arabic_months = [
    1 => 'ÙŠÙ†Ø§ÙŠØ±', 2 => 'ÙØ¨Ø±Ø§ÙŠØ±', 3 => 'Ù…Ø§Ø±Ø³', 4 => 'Ø£Ø¨Ø±ÙŠÙ„', 5 => 'Ù…Ø§ÙŠÙˆ', 6 => 'ÙŠÙˆÙ†ÙŠÙˆ',
    7 => 'ÙŠÙˆÙ„ÙŠÙˆ', 8 => 'Ø£ØºØ³Ø·Ø³', 9 => 'Ø³Ø¨ØªÙ…Ø¨Ø±', 10 => 'Ø£ÙƒØªÙˆØ¨Ø±', 11 => 'Ù†ÙˆÙÙ…Ø¨Ø±', 12 => 'Ø¯ÙŠØ³Ù…Ø¨Ø±',
];

while (have_posts()) : the_post();
    $post_id   = get_the_ID();
    $category  = st_article_category_name($post_id, null);
    $cat_name  = $category ? $category->name : ($is_rtl ? 'Ù…Ù‚Ø§Ù„Ø§Øª' : 'Articles');
    $rt        = st_reading_time($post_id);
    $date_str  = st_article_date_display($post_id, $is_rtl, $arabic_months);
    $author_id = (int) get_the_author_meta('ID');

    $article_slug = (string) get_post_field('post_name', $post_id);
    $article_cfg = function_exists('st_article_config') ? st_article_config($article_slug) : null;
    $locale = function_exists('st_locale') ? st_locale() : 'ar';

    // Prefer live WP content from writers. Theme landings only for shell/empty posts.
    $use_theme_landing = $article_cfg
        && !empty($article_cfg['content'])
        && function_exists('st_article_post_is_theme_shell')
        && st_article_post_is_theme_shell($post_id);

    $display_title = ($use_theme_landing && !empty($article_cfg['title']))
        ? (string) st_article_text($article_cfg['title'], $locale)
        : get_the_title($post_id);

    $display_excerpt = ($use_theme_landing && !empty($article_cfg['excerpt']))
        ? wp_strip_all_tags((string) st_article_text($article_cfg['excerpt'], $locale))
        : '';

    if ($use_theme_landing) {
        $rendered = (string) st_article_text($article_cfg['content'], $locale);
    } else {
        $rendered = apply_filters('the_content', get_the_content());
    }

    $article_inline_css = '';
    $article_json_ld = [];
    if (function_exists('st_prepare_article_content')) {
        $prepared = st_prepare_article_content($rendered);
        $rendered = $prepared['html'];
        $article_inline_css = $prepared['css'];
        $article_json_ld = $prepared['json_ld'] ?? [];
    } elseif (function_exists('st_clean_article_html')) {
        $rendered = st_clean_article_html($rendered);
    }

    // Old posts sometimes stored only a CSS dump — fall back to excerpt for body text.
    if (trim(wp_strip_all_tags($rendered)) === '') {
        $fallback = $display_excerpt !== ''
            ? $display_excerpt
            : trim((string) get_post_field('post_excerpt', $post_id));
        if ($fallback === '') {
            $fallback = $is_rtl
                ? 'محتوى هذا المقال قيد التحديث. تواصل معنا لمناقشة الموضوع.'
                : 'This article is being updated. Contact us to discuss this topic.';
        }
        $rendered = '<p>' . esc_html($fallback) . '</p>';
        if (function_exists('st_url')) {
            $contact = esc_url(st_url('/contact/'));
            $label = $is_rtl ? 'تواصل معنا' : 'Contact us';
            $rendered .= '<p><a href="' . $contact . '">' . esc_html($label) . '</a></p>';
        }
    }

    $rendered = st_lazy_content_images($rendered);

    if (function_exists('st_localize_internal_url')) {
        $rendered = preg_replace_callback('/href="(\/(?:contact|services|articles|case-studies|web-projects|about)[^"]*)"/i', static function (array $m) use ($locale): string {
            return 'href="' . esc_url(st_localize_internal_url($m[1], $locale)) . '"';
        }, $rendered);
    }

    $article_related = function_exists('st_get_article_related')
        ? st_get_article_related($article_slug)
        : ['related_services' => [], 'related_cases' => [], 'related_articles' => []];

    $related_service_slugs = !empty($article_related['related_services'])
        ? $article_related['related_services']
        : (function_exists('st_get_services_for_article') ? st_get_services_for_article($article_slug) : []);

    $related_case_slugs = $article_related['related_cases'] ?? [];
    $related_article_slugs = $article_related['related_articles'] ?? [];

    $article_faq = [];
    if ($article_cfg && !empty($article_cfg['faq']) && is_array($article_cfg['faq'])) {
        $faq_raw = $article_cfg['faq'];
        if (isset($faq_raw[$locale]) && is_array($faq_raw[$locale])) {
            $article_faq = $faq_raw[$locale];
        } elseif (isset($faq_raw['ar']) && is_array($faq_raw['ar'])) {
            $article_faq = $faq_raw['ar'];
        } elseif (array_is_list($faq_raw)) {
            $article_faq = $faq_raw;
        }
    }

    /* Detect per-article text direction — independent of site locale */
    if ($use_theme_landing) {
        $content_dir = $locale === 'ar' ? 'rtl' : 'ltr';
    } else {
        $content_dir = st_detect_content_dir($post_id);
    }
    $content_is_rtl = ($content_dir === 'rtl');

    $related = st_related_articles($post_id, $category, 3);
    if ($related_article_slugs !== []) {
        $related = [];
        foreach ($related_article_slugs as $rel_slug) {
            $rel_post = get_page_by_path($rel_slug, OBJECT, 'post');
            if ($rel_post instanceof WP_Post && (int) $rel_post->ID !== $post_id) {
                $related[] = $rel_post;
            }
        }
    }

    if ($use_theme_landing) {
        $words = preg_split('/\s+/u', trim(wp_strip_all_tags($rendered)), -1, PREG_SPLIT_NO_EMPTY);
        $rt = max(1, (int) ceil((is_array($words) ? count($words) : 0) / 180));
    }
?>
<?php
if ($article_inline_css !== '' && function_exists('st_sanitize_article_css')) {
    $safe_css = st_sanitize_article_css($article_inline_css);
    if ($safe_css !== '') {
        echo '<style id="st-article-author-css">' . $safe_css . "</style>\n";
    }
}

if (!empty($article_json_ld) && is_array($article_json_ld)) {
    foreach ($article_json_ld as $i => $json) {
        $json = trim((string) $json);
        if ($json === '') {
            continue;
        }
        // Re-validate when possible; still output valid-looking JSON for SEO.
        $decoded = json_decode($json, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $json = wp_json_encode($decoded, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } else {
            // Broken leaked fragment — skip rather than print garbage on the page.
            continue;
        }
        printf(
            '<script type="application/ld+json" id="st-article-jsonld-%d">%s</script>' . "\n",
            (int) $i,
            $json
        );
    }
}
?>
<style id="st-article-mobile-guard">
@media (max-width: 767px) {
  /* Wins over per-article author CSS (.st-article / .zt-article). */
  body.single-post { overflow-x: clip !important; }
  .single-art {
    max-width: 100% !important;
    width: 100% !important;
    overflow-x: clip !important;
  }
  .single-art__wrap {
    max-width: 100% !important;
    width: 100% !important;
    min-width: 0 !important;
    padding-inline: 1rem !important;
    box-sizing: border-box !important;
  }
  .single-art__content {
    max-width: 100% !important;
    width: 100% !important;
    min-width: 0 !important;
    contain: inline-size;
    overflow-x: clip !important;
  }
  .single-art__content > .st-article,
  .single-art__content > .zt-article,
  .single-art__content .st-article,
  .single-art__content .zt-article {
    width: 100% !important;
    max-width: 100% !important;
    min-width: 0 !important;
    margin-inline: 0 !important;
    padding-inline: 0.75rem !important;
    box-sizing: border-box !important;
  }
  .single-art__content .st-choice-grid,
  .single-art__content .st-redline,
  .single-art__content .st-grid,
  .single-art__content .st-clause {
    grid-template-columns: 1fr !important;
  }
  .single-art__content .st-tablewrap,
  .single-art__content .zt-tablewrap,
  .single-art__content [class*="tablewrap"] {
    width: 100% !important;
    max-width: 100% !important;
    overflow-x: auto !important;
  }
  .single-art__content h1,
  .single-art__content h2,
  .single-art__content h3,
  .single-art__content h4 {
    overflow: visible !important;
    line-height: 1.45 !important;
    max-width: 100% !important;
  }
  .single-art__content img,
  .single-art__content video,
  .single-art__content iframe,
  .single-art__content svg {
    max-width: 100% !important;
    height: auto !important;
  }
}
</style>
<div class="art-progress"><div class="art-progress__bar" id="art-progress-bar"></div></div>

<main class="single-art" dir="<?php echo esc_attr(st_dir()); ?>">
    <article class="single-art__wrap">

        <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
             BREADCRUMB
        â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
        <a href="<?php echo esc_url(st_articles_page_url()); ?>" class="single-art__back">
            <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($is_rtl ? 'arrow_forward' : 'arrow_back'); ?></span>
            <?php echo esc_html($is_rtl ? 'Ø§Ù„Ø¹ÙˆØ¯Ø© Ù„Ù„Ù…Ù‚Ø§Ù„Ø§Øª' : 'Back to articles'); ?>
        </a>

        <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
             HEADER
        â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
        <header class="single-art__header">
            <div class="single-art__eyebrow">
                <span class="single-art__cat"><?php echo esc_html($cat_name); ?></span>
                <span class="single-art__dot" aria-hidden="true"></span>
                <span class="single-art__label"><?php echo esc_html($is_rtl ? "\u{0628}\u{062D}\u{062B}\u{0020}\u{0645}\u{0624}\u{0633}\u{0633}\u{064A}" : 'Institutional Research'); ?></span>
            </div>

            <h1 class="single-art__title"><?php echo esc_html($display_title); ?></h1>

            <?php
            $manual_excerpt = $display_excerpt !== '' ? $display_excerpt : get_post_field('post_excerpt', $post_id);
            if ($manual_excerpt) {
                $lead = wp_strip_all_tags($manual_excerpt);
            } else {
                $raw_for_lead = function_exists('st_clean_article_html')
                    ? st_clean_article_html((string) get_the_content(null, false, $post_id))
                    : (string) get_the_content(null, false, $post_id);
                $raw_content = wp_strip_all_tags($raw_for_lead);
                $words = preg_split( '/\s+/u', trim( $raw_content ), -1, PREG_SPLIT_NO_EMPTY );
                $lead  = is_array($words) && count( $words ) > 40
                    ? implode( ' ', array_slice( $words, 0, 40 ) ) . '…'
                    : implode( ' ', is_array($words) ? $words : [] );
            }
            if ( $lead ) : ?>
                <p class="single-art__subtitle"><?php echo esc_html( $lead ); ?></p>
            <?php endif; ?>

            <div class="single-art__stats-strip">
                <span class="single-art__stat-pill">
                    <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                    <?php echo esc_html($is_rtl ? "قراءة {$rt} دقائق" : "{$rt} min read"); ?>
                </span>
                <span class="single-art__stat-sep" aria-hidden="true"></span>
                <span class="single-art__stat-pill">
                    <span class="material-symbols-outlined" aria-hidden="true">calendar_today</span>
                    <?php echo esc_html($is_rtl ? 'نُشر: ' : 'Published: '); ?><?php echo esc_html(get_the_date('', $post_id)); ?>
                </span>
                <?php if (get_the_modified_time('U', $post_id) > get_the_time('U', $post_id)) : ?>
                <span class="single-art__stat-sep" aria-hidden="true"></span>
                <span class="single-art__stat-pill">
                    <span class="material-symbols-outlined" aria-hidden="true">update</span>
                    <?php echo esc_html($is_rtl ? 'تحديث: ' : 'Updated: '); ?><?php echo esc_html(get_the_modified_date('', $post_id)); ?>
                </span>
                <?php endif; ?>
            </div>

            <div class="single-art__byline">
                <div class="single-art__byline-block">
                    <span class="single-art__byline-label"><?php echo esc_html($is_rtl ? 'الكاتب' : 'Author'); ?></span>
                    <strong>SpinesTech Engineering</strong>
                </div>
                <div class="single-art__byline-block">
                    <span class="single-art__byline-label"><?php echo esc_html($is_rtl ? 'المراجع' : 'Reviewer'); ?></span>
                    <strong>SpinesTech Engineering</strong>
                </div>
            </div>
        </header>

        <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
             ARTICLE BODY
        â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
        <div class="single-art__content single-art__content--dropcap"
             dir="<?php echo esc_attr( $content_dir ); ?>"
             style="text-align:<?php echo $content_is_rtl ? 'right' : 'left'; ?>; font-family:<?php echo $content_is_rtl ? 'var(--font-display)' : "Georgia,'Times New Roman',serif"; ?>;">
            <?php echo wp_kses_post($rendered); ?>
        </div>

        <?php if (!empty($article_faq)) : ?>
        <section class="single-art__faq container">
            <h3><?php echo esc_html($is_rtl ? 'أسئلة شائعة' : 'FAQ'); ?></h3>
            <div class="single-art__faq-list">
                <?php foreach ($article_faq as $item) :
                    if (!is_array($item)) {
                        continue;
                    }
                    $q = (string) ($item['q'] ?? $item['question'] ?? '');
                    $a = (string) ($item['a'] ?? $item['answer'] ?? '');
                    if ($q === '' || $a === '') {
                        continue;
                    }
                    ?>
                    <details class="single-art__faq-item">
                        <summary><?php echo esc_html($q); ?></summary>
                        <p><?php echo esc_html($a); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>


        <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
             SHARE / TAGS FOOTER
        â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
        <footer class="single-art__footer">
            <?php
            $tags = get_the_tags($post_id);
            if ($tags) : ?>
                <div class="single-art__tags">
                    <?php foreach ($tags as $tag) : ?>
                        <span class="single-art__tag">#<?php echo esc_html($tag->name); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="single-art__share">
                <span class="single-art__share-label"><?php echo esc_html($is_rtl ? 'Ø´Ø§Ø±Ùƒ Ø§Ù„Ù…Ù‚Ø§Ù„' : 'Share article'); ?></span>
                <div class="single-art__share-links">

                    <?php /* â”€â”€ Button 1: Native Web Share (OS share sheet) â”€â”€ */ ?>
                    <button
                        type="button"
                        class="single-art__share-btn"
                        id="sa-share-native"
                        aria-label="<?php echo esc_attr($is_rtl ? 'Ø´Ø§Ø±Ùƒ' : 'Share'); ?>"
                        data-share-url="<?php echo esc_attr(get_permalink()); ?>"
                        data-share-title="<?php echo esc_attr(get_the_title()); ?>"
                        title="<?php echo esc_attr($is_rtl ? 'Ø´Ø§Ø±Ùƒ Ø§Ù„Ù…Ù‚Ø§Ù„' : 'Share article'); ?>">
                        <span class="material-symbols-outlined" aria-hidden="true">share</span>
                    </button>

                    <?php /* â”€â”€ Button 2: Copy link to clipboard â”€â”€ */ ?>
                    <button
                        type="button"
                        class="single-art__share-btn"
                        id="sa-share-copy"
                        aria-label="<?php echo esc_attr($is_rtl ? 'Ù†Ø³Ø® Ø§Ù„Ø±Ø§Ø¨Ø·' : 'Copy link'); ?>"
                        data-copy-url="<?php echo esc_attr(get_permalink()); ?>"
                        title="<?php echo esc_attr($is_rtl ? 'Ù†Ø³Ø® Ø±Ø§Ø¨Ø· Ø§Ù„Ù…Ù‚Ø§Ù„' : 'Copy article link'); ?>">
                        <span class="material-symbols-outlined" id="sa-copy-icon" aria-hidden="true">content_copy</span>
                    </button>

                    <?php /* â”€â”€ Button 3: Send via Email â”€â”€ */ ?>
                    <a
                        href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo rawurlencode(($is_rtl ? 'Ø§Ù‚Ø±Ø£ Ù‡Ø°Ø§ Ø§Ù„Ù…Ù‚Ø§Ù„: ' : 'Check out this article: ') . get_permalink()); ?>"
                        class="single-art__share-btn"
                        aria-label="<?php echo esc_attr($is_rtl ? 'Ù…Ø´Ø§Ø±ÙƒØ© Ø¨Ø§Ù„Ø¨Ø±ÙŠØ¯' : 'Share via email'); ?>"
                        title="<?php echo esc_attr($is_rtl ? 'Ø¥Ø±Ø³Ø§Ù„ Ø¨Ø§Ù„Ø¨Ø±ÙŠØ¯ Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠ' : 'Send via email'); ?>">
                        <span class="material-symbols-outlined" aria-hidden="true">mail</span>
                    </a>

                </div>
            </div>

            <?php /* â”€â”€ Copy-link toast notification â”€â”€ */ ?>
            <div class="single-art__copy-toast" id="sa-copy-toast" aria-live="polite">
                <span class="material-symbols-outlined" aria-hidden="true">check_circle</span>
                <?php echo esc_html($is_rtl ? 'ØªÙ… Ù†Ø³Ø® Ø§Ù„Ø±Ø§Ø¨Ø·!' : 'Link copied!'); ?>
            </div>
        </footer>

    </article>

    <?php if (!empty($related_service_slugs)) : ?>
        <section class="single-art__related container">
            <h3><?php echo esc_html($is_rtl ? 'خدمات ذات صلة' : 'Related services'); ?></h3>
            <ul class="single-art__service-links">
                <?php foreach ($related_service_slugs as $service_slug) :
                    $cfg = function_exists('st_service_config') ? st_service_config($service_slug) : null;
                    if (!$cfg) {
                        continue;
                    }
                    ?>
                    <li><a href="<?php echo esc_url(function_exists('st_service_related_url') ? st_service_related_url($service_slug) : st_service_permalink($service_slug)); ?>"><?php echo esc_html(function_exists('st_service_related_label') ? st_service_related_label($service_slug) : (string) st_service_text($cfg['title'])); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($related_case_slugs)) : ?>
        <section class="single-art__related container">
            <h3><?php echo esc_html($is_rtl ? 'دراسات حالة ذات صلة' : 'Related case studies'); ?></h3>
            <ul class="single-art__service-links">
                <?php foreach ($related_case_slugs as $case_slug) :
                    $cs_cfg = function_exists('st_case_study_config') ? st_case_study_config($case_slug) : null;
                    $label = $cs_cfg && !empty($cs_cfg['title'])
                        ? (string) st_case_study_text($cs_cfg['title'], $locale)
                        : $case_slug;
                    $url = function_exists('st_case_study_url_by_slug')
                        ? st_case_study_url_by_slug($case_slug)
                        : home_url('/case-studies/' . $case_slug . '/');
                    ?>
                    <li><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════
         RELATED ARTICLES
    â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â• â•  -->
    <?php if (!empty($related)) : ?>
        <section class="single-art__related container">
            <h3 class="reveal"><?php echo esc_html($is_rtl ? 'مقالات ذات صلة' : 'Related Articles'); ?></h3>
            <div class="single-art__related-grid">
                <?php foreach ($related as $i => $rpost) :
                    $rpid = $rpost->ID;
                    $rthumb = st_article_thumb($rpid, 'medium_large');
                    $rcat = st_article_category_name($rpid, null);
                    $rcat_name = $rcat ? $rcat->name : ($is_rtl ? 'Ù…Ù‚Ø§Ù„Ø§Øª' : 'Articles');
                ?>
                    <a href="<?php echo esc_url(get_permalink($rpid)); ?>" class="single-art__related-card reveal" style="--delay:<?php echo esc_attr($i * 90); ?>ms">
                        <div class="single-art__related-media">
                            <img src="<?php echo esc_url($rthumb); ?>" alt="<?php echo esc_attr(get_the_title($rpid)); ?>" width="400" height="225" loading="lazy" decoding="async">
                            <span class="single-art__related-badge"><?php echo esc_html($rcat_name); ?></span>
                        </div>
                        <div class="single-art__related-body">
                            <span class="single-art__related-cat"><?php echo esc_html($rcat_name); ?></span>
                            <h4><?php echo esc_html(get_the_title($rpid)); ?></h4>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         FINAL CTA
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="single-art__cta reveal">
        <div class="container single-art__cta-inner">
            <h2><?php echo esc_html($is_rtl ? 'Ø¬Ø§Ù‡Ø² Ù„Ø¨Ù†Ø§Ø¡ Ù…Ù†ØµØªÙƒ Ø§Ù„Ù‚Ø§Ø¯Ù…Ø©ØŸ' : 'Ready to build your next platform?'); ?></h2>
            <p><?php echo esc_html($is_rtl
                ? 'Ø§Ù†Ø¶Ù… Ø¥Ù„Ù‰ Ø¹Ø´Ø±Ø§Øª Ø§Ù„Ø´Ø±ÙƒØ§Øª Ø§Ù„ØªÙŠ ØªØ¹ØªÙ…Ø¯ Ø¹Ù„Ù‰ Ù…Ù†Ù‡Ø¬ÙŠØ© SpinesTech Ù„ØªØµÙ…ÙŠÙ… ÙˆØ¨Ù†Ø§Ø¡ ÙˆØªÙˆØ³ÙŠØ¹ ØªØ¬Ø§Ø±Ø¨ Ø±Ù‚Ù…ÙŠØ© Ø¬Ø§Ù‡Ø²Ø© Ù„Ù„Ù…Ø³ØªÙ‚Ø¨Ù„.'
                : 'Join dozens of enterprises leveraging SpinesTech\'s methodology to design, build, and scale future-proof digital experiences.'); ?></p>
            <div class="single-art__cta-actions">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="single-art__cta-btn single-art__cta-btn--fill"><?php echo esc_html($is_rtl ? 'Ø§Ø¨Ø¯Ø£ Ù…Ø´Ø±ÙˆØ¹Ùƒ' : 'Start Your Project'); ?></a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="single-art__cta-btn single-art__cta-btn--outline"><?php echo esc_html($is_rtl ? 'ØªÙˆØ§ØµÙ„ Ù…Ø¹Ù†Ø§' : 'Contact Us'); ?></a>
            </div>
        </div>
    </section>

</main>
<?php endwhile; ?>
<?php get_footer(); ?>