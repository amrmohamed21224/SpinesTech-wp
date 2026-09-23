<?php
/**
 * Service landing page — rich SEO + conversion template.
 */
$st_service_queried = get_queried_object();
$st_service_slug = ($st_service_queried instanceof WP_Post) ? (string) $st_service_queried->post_name : '';
$st_service_cfg = $st_service_slug !== '' && function_exists('st_service_config')
    ? st_service_config($st_service_slug)
    : null;

if ($st_service_cfg) {
    $st_service_locale = function_exists('st_locale') ? st_locale() : 'ar';
    add_filter('pre_get_document_title', static function () use ($st_service_cfg, $st_service_locale) {
        return (string) st_service_text($st_service_cfg['meta_title'], $st_service_locale);
    }, 999);
    add_action('wp_head', static function () use ($st_service_cfg, $st_service_locale) {
        st_seo_set_description((string) st_service_text($st_service_cfg['meta_description'], $st_service_locale));
    }, 3);
}

get_header();

while (have_posts()) :
    the_post();
    $slug = get_post_field('post_name', get_the_ID());
    $cfg = $st_service_cfg ?: (function_exists('st_service_config') ? st_service_config((string) $slug) : null);
    $locale = st_locale();
    $is_rtl = $locale === 'ar';
    $arrow = $is_rtl ? 'arrow_back' : 'arrow_forward';

    $title = $cfg ? (string) st_service_text($cfg['title'], $locale) : get_the_title();
    $intro = $cfg ? (string) st_service_text($cfg['intro'], $locale) : get_the_excerpt();
    $problem = $cfg ? (string) st_service_text($cfg['problem'], $locale) : '';
    $audience = $cfg ? (array) st_service_text($cfg['audience'], $locale) : [];
    $scope = $cfg ? (array) st_service_text($cfg['scope'], $locale) : [];
    $capabilities = $cfg ? (array) st_service_text($cfg['capabilities'], $locale) : [];
    $process = $cfg ? (array) st_service_text($cfg['process'], $locale) : [];
    $stack = $cfg ? (array) st_service_text($cfg['stack'], $locale) : [];
    $faq = function_exists('st_service_faq_for_slug') ? st_service_faq_for_slug((string) $slug) : [];
    $icon = $cfg['icon'] ?? (get_post_meta(get_the_ID(), 'st_icon', true) ?: 'code');
    $cases = function_exists('st_get_linked_case_studies') ? st_get_linked_case_studies((string) $slug, 3) : [];
    $articles = function_exists('st_get_linked_articles') ? st_get_linked_articles((string) $slug, 3) : [];
    ?>
<main class="svc-landing" dir="<?php echo esc_attr(st_dir()); ?>">
    <div class="container svc-landing__wrap">
        <a href="<?php echo esc_url(get_post_type_archive_link('st_service') ?: st_url('/services/')); ?>" class="svc-landing__back">
            <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($is_rtl ? 'arrow_forward' : 'arrow_back'); ?></span>
            <?php echo esc_html($is_rtl ? 'كل الخدمات' : 'All services'); ?>
        </a>

        <header class="svc-landing__hero">
            <div class="svc-landing__hero-icon" aria-hidden="true">
                <span class="material-symbols-outlined"><?php echo esc_attr($icon); ?></span>
            </div>
            <h1 class="svc-landing__title"><?php echo esc_html($title); ?></h1>
            <?php if ($intro) : ?>
                <p class="svc-landing__intro"><?php echo esc_html($intro); ?></p>
            <?php endif; ?>
            <div class="svc-landing__hero-cta">
                <a href="<?php echo esc_url(st_url('contact')); ?>" class="svc-btn svc-btn--primary">
                    <?php echo esc_html($is_rtl ? 'ناقش مشروعك معنا' : 'Discuss your project'); ?>
                </a>
                <a href="<?php echo esc_url(get_post_type_archive_link('st_case_study') ?: st_url('case-studies')); ?>" class="svc-btn svc-btn--ghost">
                    <?php echo esc_html($is_rtl ? 'شاهد أعمالنا' : 'View our work'); ?>
                </a>
            </div>
        </header>

        <?php if ($problem) : ?>
        <section class="svc-block">
            <h3><?php echo esc_html($is_rtl ? 'المشكلة التي نحلها' : 'The problem we solve'); ?></h3>
            <p><?php echo esc_html($problem); ?></p>
        </section>
        <?php endif; ?>

        <?php if ($audience) : ?>
        <section class="svc-block">
            <h3><?php echo esc_html($is_rtl ? 'لمن هذه الخدمة؟' : 'Who is this for?'); ?></h3>
            <ul class="svc-list"><?php foreach ($audience as $item) : ?><li><?php echo esc_html($item); ?></li><?php endforeach; ?></ul>
        </section>
        <?php endif; ?>

        <?php if ($scope) : ?>
        <section class="svc-block">
            <h3><?php echo esc_html($is_rtl ? 'ماذا يشمل التنفيذ؟' : 'What does delivery include?'); ?></h3>
            <ul class="svc-list"><?php foreach ($scope as $item) : ?><li><?php echo esc_html($item); ?></li><?php endforeach; ?></ul>
        </section>
        <?php endif; ?>

        <?php if ($capabilities) : ?>
        <section class="svc-block">
            <h3><?php echo esc_html($is_rtl ? 'قدرات أعمال رئيسية' : 'Key business capabilities'); ?></h3>
            <div class="svc-pills"><?php foreach ($capabilities as $item) : ?><span class="svc-pill"><?php echo esc_html($item); ?></span><?php endforeach; ?></div>
        </section>
        <?php endif; ?>

        <?php if (!empty($cases)) : ?>
        <section class="svc-block">
            <h3><?php echo esc_html($is_rtl ? 'مشاريع ذات صلة' : 'Related case studies'); ?></h3>
            <div class="svc-related">
                <?php foreach ($cases as $case) : ?>
                    <a class="svc-related__card" href="<?php echo esc_url(get_permalink($case)); ?>">
                        <h3><?php echo esc_html(get_the_title($case)); ?></h3>
                        <span class="svc-related__link"><?php echo esc_html($is_rtl ? 'استعرض المشروع' : 'View project'); ?> <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($arrow); ?></span></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php if ($process) : ?>
        <section class="svc-block">
            <h3><?php echo esc_html($is_rtl ? 'منهجية التنفيذ' : 'Our process'); ?></h3>
            <ol class="svc-process">
                <?php foreach ($process as $step) : ?>
                    <li>
                        <strong><?php echo esc_html($step['title'] ?? ''); ?></strong>
                        <span><?php echo esc_html($step['desc'] ?? ''); ?></span>
                    </li>
                <?php endforeach; ?>
            </ol>
        </section>
        <?php endif; ?>

        <?php if ($stack) : ?>
        <section class="svc-block">
            <h3><?php echo esc_html($is_rtl ? 'التقنيات' : 'Technology stack'); ?></h3>
            <div class="svc-pills"><?php foreach ($stack as $item) : ?><span class="svc-pill svc-pill--tech"><?php echo esc_html($item); ?></span><?php endforeach; ?></div>
        </section>
        <?php endif; ?>

        <?php if ($faq) :
            get_template_part('template-parts/components/faq', null, ['faq_items' => $faq, 'faq_id' => 'svc-faq-' . $slug]);
        endif; ?>

        <?php if (!empty($articles)) : ?>
        <section class="svc-block">
            <h3><?php echo esc_html($is_rtl ? 'مقالات ذات صلة' : 'Related articles'); ?></h3>
            <ul class="svc-articles">
                <?php foreach ($articles as $art) : ?>
                    <li><a href="<?php echo esc_url(get_permalink($art)); ?>"><?php echo esc_html(get_the_title($art)); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php endif; ?>

        <section class="svc-cta">
            <h3><?php echo esc_html($is_rtl ? 'جاهز لبدء مشروعك؟' : 'Ready to start your project?'); ?></h3>
            <p><?php echo esc_html($is_rtl ? 'شاركنا متطلباتك وسنعود إليك بخطة تنفيذ واضحة.' : 'Share your requirements and we will respond with a clear execution plan.'); ?></p>
            <a href="<?php echo esc_url(st_url('contact')); ?>" class="svc-btn svc-btn--primary"><?php echo esc_html($is_rtl ? 'ابدأ مناقشة مشروعك' : 'Start your project discussion'); ?></a>
        </section>
    </div>
</main>
    <?php
endwhile;
get_footer();
