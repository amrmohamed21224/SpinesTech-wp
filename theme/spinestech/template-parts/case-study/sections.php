<?php
/**
 * Config-driven case study sections.
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
if ($config === null || empty($config['sections']) || !is_array($config['sections'])) {
    return;
}

$labels = st_case_study_section_labels();
$sections = $config['sections'];
$contact_url = function_exists('st_url') ? st_url('/contact/') : home_url('/contact/');
$is_rtl = function_exists('st_locale') && st_locale() === 'ar';

$section_icons = [
    'business_context' => 'travel_explore',
    'problem'          => 'report_problem',
    'users'            => 'groups',
    'solution'         => 'lightbulb',
    'architecture'     => 'hub',
    'features'         => 'extension',
    'process'          => 'route',
    'outcomes'         => 'trending_up',
    'lessons'          => 'school',
    'cta'              => 'rocket_launch',
];

$section_index = 0;
?>
<div class="cs-config-sections">
    <?php
    foreach ($labels as $key => $label_field) {
        if ($key === 'internal_links_note') {
            continue;
        }

        if (empty($sections[$key]) || !is_array($sections[$key])) {
            continue;
        }

        $section = $sections[$key];
        $body = isset($section['body']) && is_array($section['body'])
            ? (string) st_case_study_text($section['body'])
            : '';

        if ($body === '') {
            continue;
        }

        $title_field = isset($section['title']) && is_array($section['title'])
            ? $section['title']
            : $label_field;
        $title = (string) st_case_study_text($title_field);
        $icon = $section_icons[$key] ?? 'article';
        $section_index++;

        if ($key === 'cta') :
            ?>
            <section class="cs-config-section cs-config-section--cta" aria-labelledby="cs-config-cta-title">
                <div class="cs-config-section__card cs-config-section__card--cta">
                    <div class="cs-config-section__icon-wrap cs-config-section__icon-wrap--cta" aria-hidden="true">
                        <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                    </div>
                    <?php if ($title !== '') : ?>
                        <h2 class="cs-config-section__title" id="cs-config-cta-title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                    <div class="cs-config-section__body">
                        <?php
                        foreach (array_filter(array_map('trim', preg_split('/\n{2,}/', $body))) as $paragraph) {
                            echo '<p>' . esc_html($paragraph) . '</p>';
                        }
                        ?>
                    </div>
                    <div class="cs-config-section__cta-action">
                        <a class="cs-config-section__cta-link" href="<?php echo esc_url($contact_url); ?>">
                            <?php echo esc_html($is_rtl ? 'تواصل معنا' : 'Contact Us'); ?>
                            <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($is_rtl ? 'arrow_back' : 'arrow_forward'); ?></span>
                        </a>
                    </div>
                </div>
            </section>
            <?php
            continue;
        endif;
        ?>
        <section class="cs-config-section<?php echo ($section_index % 2 === 0) ? ' cs-config-section--alt' : ''; ?>" aria-labelledby="cs-config-<?php echo esc_attr($key); ?>-title">
            <div class="cs-config-section__card">
                <div class="cs-config-section__head">
                    <div class="cs-config-section__icon-wrap" aria-hidden="true">
                        <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                    </div>
                    <span class="cs-config-section__step"><?php echo esc_html(sprintf('%02d', $section_index)); ?></span>
                </div>
                <?php if ($title !== '') : ?>
                    <h2 class="cs-config-section__title" id="cs-config-<?php echo esc_attr($key); ?>-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <div class="cs-config-section__body">
                    <?php
                    foreach (array_filter(array_map('trim', preg_split('/\n{2,}/', $body))) as $paragraph) {
                        echo '<p>' . esc_html($paragraph) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
</div>
