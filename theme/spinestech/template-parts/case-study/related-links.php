<?php
/**
 * Related services, articles, and contact CTA for config-driven case studies.
 *
 * @var array $args Template part arguments (optional 'slug').
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$slug = '';
if (!empty($args['slug']) && is_string($args['slug'])) {
    $slug = $args['slug'];
} elseif (function_exists('st_case_study_current_slug')) {
    $slug = st_case_study_current_slug();
} else {
    $slug = (string) get_post_field('post_name', get_the_ID());
}

$config = function_exists('st_case_study_config') ? st_case_study_config($slug) : null;
if ($config === null) {
    return;
}

$is_rtl = function_exists('st_locale') && st_locale() === 'ar';
$contact_url = function_exists('st_url') ? st_url('/contact/') : home_url('/contact/');
$sections = $config['sections'] ?? [];
$internal_note = '';

if (!empty($sections['internal_links_note']['body']) && is_array($sections['internal_links_note']['body'])) {
    $internal_note = (string) st_case_study_text($sections['internal_links_note']['body']);
}

$service_slugs = array_values(array_filter(
    (array) ($config['related_services'] ?? []),
    static fn($s): bool => is_string($s) && $s !== ''
));

$article_slugs = array_values(array_filter(
    (array) ($config['related_articles'] ?? []),
    static fn($s): bool => is_string($s) && $s !== ''
));

$other_slugs = array_values(array_filter(
    st_case_study_slugs(),
    static fn(string $cs_slug): bool => $cs_slug !== $slug
));
$other_slugs = array_slice($other_slugs, 0, 3);
?>

<aside class="cs-config-related" aria-label="<?php echo esc_attr($is_rtl ? 'روابط ذات صلة' : 'Related links'); ?>">
    <?php if ($internal_note !== '') : ?>
        <div class="cs-config-related__note">
            <span class="material-symbols-outlined" aria-hidden="true">info</span>
            <p><?php echo esc_html($internal_note); ?></p>
        </div>
    <?php endif; ?>

    <div class="cs-config-related__grid">
        <?php if ($service_slugs !== []) : ?>
            <section class="cs-config-related__panel">
                <h3 class="cs-config-related__heading">
                    <span class="material-symbols-outlined" aria-hidden="true">design_services</span>
                    <?php echo esc_html($is_rtl ? 'خدمات ذات صلة' : 'Related Services'); ?>
                </h3>
                <ul class="cs-config-related__list">
                    <?php foreach ($service_slugs as $service_slug) :
                        $label = function_exists('st_service_related_label')
                            ? st_service_related_label($service_slug)
                            : $service_slug;
                        $url = function_exists('st_service_related_url')
                            ? st_service_related_url($service_slug)
                            : (function_exists('st_service_permalink')
                                ? st_service_permalink($service_slug)
                                : home_url('/services/#' . $service_slug));
                        ?>
                        <li>
                            <a href="<?php echo esc_url($url); ?>">
                                <span><?php echo esc_html($label); ?></span>
                                <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($is_rtl ? 'chevron_left' : 'chevron_right'); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <?php if ($article_slugs !== []) : ?>
            <section class="cs-config-related__panel">
                <h3 class="cs-config-related__heading">
                    <span class="material-symbols-outlined" aria-hidden="true">menu_book</span>
                    <?php echo esc_html($is_rtl ? 'مقالات ذات صلة' : 'Related Articles'); ?>
                </h3>
                <ul class="cs-config-related__list">
                    <?php foreach ($article_slugs as $article_slug) :
                        $post = function_exists('st_find_published_post')
                            ? st_find_published_post($article_slug)
                            : get_page_by_path($article_slug, OBJECT, 'post');
                        $meta = function_exists('st_published_article_meta')
                            ? st_published_article_meta($article_slug)
                            : null;

                        if ($post instanceof WP_Post && $post->post_status === 'publish') {
                            $label = get_the_title($post);
                            $url = (string) get_permalink($post);
                        } elseif ($meta !== null) {
                            $label = (string) st_article_text($meta['title']);
                            $url = function_exists('st_article_permalink')
                                ? st_article_permalink($article_slug)
                                : home_url('/' . $article_slug . '/');
                        } else {
                            continue;
                        }
                        ?>
                        <li>
                            <a href="<?php echo esc_url($url); ?>">
                                <span><?php echo esc_html($label); ?></span>
                                <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($is_rtl ? 'chevron_left' : 'chevron_right'); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <?php if ($other_slugs !== []) : ?>
            <section class="cs-config-related__panel">
                <h3 class="cs-config-related__heading">
                    <span class="material-symbols-outlined" aria-hidden="true">work_history</span>
                    <?php echo esc_html($is_rtl ? 'دراسات حالة أخرى' : 'Other Case Studies'); ?>
                </h3>
                <ul class="cs-config-related__list">
                    <?php foreach ($other_slugs as $cs_slug) :
                        $cs_cfg = st_case_study_config($cs_slug);
                        $label = $cs_cfg && isset($cs_cfg['title'])
                            ? (string) st_case_study_text($cs_cfg['title'])
                            : $cs_slug;
                        $url = function_exists('st_case_study_url_by_slug')
                            ? st_case_study_url_by_slug($cs_slug)
                            : home_url('/case-studies/' . $cs_slug . '/');
                        ?>
                        <li>
                            <a href="<?php echo esc_url($url); ?>">
                                <span><?php echo esc_html($label); ?></span>
                                <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($is_rtl ? 'chevron_left' : 'chevron_right'); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>
    </div>

    <section class="cs-config-related__cta">
        <div class="cs-config-related__cta-inner">
            <h3 class="cs-config-related__cta-title"><?php echo esc_html($is_rtl ? 'لنناقش مشروعك' : 'Discuss Your Project'); ?></h3>
            <p><?php echo esc_html($is_rtl
                ? 'تواصل مع فريق SpinesTech لمناقشة متطلباتك والحصول على استشارة أولية.'
                : 'Contact the SpinesTech team to discuss your requirements and get an initial consultation.'); ?></p>
            <a class="cs-config-related__cta-link" href="<?php echo esc_url($contact_url); ?>">
                <?php echo esc_html($is_rtl ? 'تواصل معنا' : 'Contact Us'); ?>
                <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($is_rtl ? 'arrow_back' : 'arrow_forward'); ?></span>
            </a>
        </div>
    </section>
</aside>
