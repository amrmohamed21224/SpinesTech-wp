<?php
/**
 * Single Case Study Template
 * Template: single-st_case_study.php
 *
 * Dynamic content driven by ACF fields with fallback to post meta.
 * All sections are optional and will not render if empty.
 */

if (!defined('ABSPATH')) exit;

// Route Merchant case study to its own dedicated template
$st_cs_slug     = get_post_field( 'post_name', get_the_ID() );
$merchant_slugs = [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ];

if ( in_array( $st_cs_slug, $merchant_slugs, true ) ) {
    include get_template_directory() . '/template-case-study-merchant.php';
    exit;
}

// Route PropCare case study to its own dedicated template
$propcare_slugs = [ 'propcare', 'propcare-360', 'property-management' ];
if ( in_array( $st_cs_slug, $propcare_slugs, true ) ) {
    include get_template_directory() . '/template-case-study-propcare.php';
    exit;
}

get_header();

while (have_posts()) : the_post();
    $post_id = get_the_ID();
    $title = get_the_title();
    $featured_img = get_the_post_thumbnail_url($post_id, 'full');

    // Hero Section
    $hero_tags = get_field('st_hero_tags', $post_id) ?: [];
    $hero_images = get_field('st_hero_images', $post_id) ?: [];
    $hero_phone_img = $hero_images[0]['url'] ?? ($hero_images[0] ?? '');
    $hero_desktop_img = $hero_images[1]['url'] ?? ($hero_images[1] ?? '');

    // Project Snapshot
    $snapshot = get_field('st_project_snapshot', $post_id) ?: [];

    // Opportunity Section
    $opp_title = get_field('st_opportunity_title', $post_id);
    $opp_text = get_field('st_opportunity_text', $post_id);
    $opp_steps = get_field('st_opportunity_steps', $post_id) ?: [];

    // Perspectives Section
    $perspectives = get_field('st_perspectives', $post_id) ?: [];

    // Process Section
    $proc_title = get_field('st_process_title', $post_id);
    $proc_sub = get_field('st_process_subtitle', $post_id);
    $proc_steps = get_field('st_process_steps', $post_id) ?: [];
    $proc_image = get_field('st_process_image', $post_id);
    $proc_cap_t = get_field('st_process_caption_title', $post_id);
    $proc_cap_s = get_field('st_process_caption_sub', $post_id);

    // Pillars Section
    $pillars = get_field('st_pillars', $post_id) ?: [];

    // Operational Depth Section
    $depth_cards = get_field('st_operational_depth', $post_id) ?: [];

    // Trust Section
    $trust_title = get_field('st_trust_title', $post_id);
    $trust_text = get_field('st_trust_text', $post_id);
    $trust_items = get_field('st_trust_items', $post_id) ?: [];

    // Live Section
    $live_title = get_field('st_live_title', $post_id);
    $live_text = get_field('st_live_text', $post_id);
    $live_url = get_field('st_live_url', $post_id);
    $live_apps = get_field('st_live_apps', $post_id) ?: [];

    // Tech Stack Section
    $tech_stack = get_field('st_tech_stack', $post_id) ?: [];

    // CTA Section
    $cta_title = get_field('st_cta_title', $post_id);
    $cta_text = get_field('st_cta_text', $post_id);
    if (empty($cta_title)) $cta_title = st_t('Building a Logistics Platform or Marketplace?');
    if (empty($cta_text)) $cta_text = st_t('Leverage our experience in creating high-stakes operational dashboards and multi-role marketplaces.');

    // Detect RTL
    $dir = function_exists('st_dir') ? st_dir() : (is_rtl() ? 'rtl' : 'ltr');
?>

<div class="single-case-study" dir="<?php echo esc_attr($dir); ?>">

    <!-- ========================================
         HERO SECTION
    ========================================= -->
    <section class="hero">
        <div class="grid-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="tag-case-study">
                    <span class="material-symbols-outlined">verified</span>
                    <span><?php echo esc_html(st_t('Case Study')) . ': ' . esc_html($title); ?></span>
                </div>
                <h1 class="hero-title">
                    <?php echo esc_html($title); ?>
                </h1>
                <?php if (has_excerpt()) : ?>
                <p class="hero-description">
                    <?php echo esc_html(get_the_excerpt()); ?>
                </p>
                <?php endif; ?>

                <?php if (!empty($hero_tags)) : ?>
                <div class="hero-tags-wrapper">
                    <?php foreach ($hero_tags as $tag) : ?>
                    <span class="hero-tag"><?php echo esc_html($tag['text'] ?? ''); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="hero-actions">
                    <a href="#cs-details" class="btn btn-primary">
                        <?php echo esc_html(st_t('Explore Case Study')); ?>
                    </a>
                    <?php if (!empty($opp_steps)) : ?>
                    <a href="#cs-flow" class="btn btn-outline">
                        <?php echo esc_html(st_t('View Platform Flow')); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="hero-visual">
                <div class="collage-container">
                    <div class="collage-bg-glow"></div>
                    <?php if (!empty($hero_phone_img)) : ?>
                    <img src="<?php echo esc_url($hero_phone_img); ?>" alt="Mobile Mockup" class="collage-img-phone" loading="lazy" />
                    <?php endif; ?>
                    <?php if (!empty($hero_desktop_img)) : ?>
                    <img src="<?php echo esc_url($hero_desktop_img); ?>" alt="Desktop Mockup" class="collage-img-desktop" loading="lazy" />
                    <?php endif; ?>
                    <div class="collage-note"><?php echo esc_html(st_t('Note: Replace mockups with real product screenshots')); ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         PROJECT SNAPSHOT SECTION
    ========================================= -->
    <?php if (!empty($snapshot)) : ?>
    <section class="snapshot-section">
        <div class="container">
            <div class="section-title-centered">
                <h2><?php echo esc_html(st_t('Project Snapshot')); ?></h2>
            </div>
            <div class="snapshot-grid">
                <?php foreach ($snapshot as $snap) :
                    $label = $snap['label'] ?? '';
                    $value = $snap['value'] ?? '';
                    $highlight = !empty($snap['highlight']);
                    if (empty($label) && empty($value)) continue;
                ?>
                <div class="snapshot-card">
                    <span class="badge-mono"><?php echo esc_html($label); ?></span>
                    <p class="snapshot-val<?php echo $highlight ? ' highlight-orange' : ''; ?>">
                        <?php echo esc_html($value); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         OPPORTUNITY SECTION
    ========================================= -->
    <?php if (!empty($opp_title) || !empty($opp_steps)) : ?>
    <section class="opportunity-section">
        <div class="container">
            <div class="opportunity-header">
                <?php if (!empty($opp_title)) : ?>
                <h2><?php echo esc_html($opp_title); ?></h2>
                <?php endif; ?>
                <?php if (!empty($opp_text)) : ?>
                <p class="body-lg">
                    <?php echo esc_html($opp_text); ?>
                </p>
                <?php endif; ?>
            </div>

            <?php if (!empty($opp_steps)) : ?>
            <div class="flow-container">
                <?php foreach ($opp_steps as $i => $step) :
                    $icon = $step['icon'] ?? 'circle';
                    $label = $step['label'] ?? '';
                ?>
                <div class="flow-step">
                    <div class="flow-icon-circle">
                        <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                    </div>
                    <p class="flow-title"><?php echo esc_html($label); ?></p>
                </div>
                <?php if ($i < count($opp_steps) - 1) : ?>
                <div class="flow-line-dashed"></div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         PERSPECTIVES SECTION
    ========================================= -->
    <?php if (!empty($perspectives)) : ?>
    <section class="perspectives-section">
        <div class="container">
            <div class="bento-grid-perspectives">
                <?php foreach ($perspectives as $p) :
                    $style = ($p['style'] ?? 'light') === 'dark' ? 'dark' : 'light';
                    $icon = $p['icon'] ?? 'person';
                    $ptitle = $p['title'] ?? '';
                    $items = $p['items'] ?? [];
                ?>
                <div class="bento-card-<?php echo esc_attr($style); ?>">
                    <div class="perspective-header">
                        <div class="perspective-icon-box">
                            <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                        </div>
                        <h3><?php echo esc_html($ptitle); ?></h3>
                    </div>
                    <?php if (!empty($items)) : ?>
                    <ul class="perspective-list">
                        <?php foreach ($items as $item) : ?>
                        <li class="perspective-item">
                            <span class="material-symbols-outlined">check_circle</span>
                            <p class="perspective-text"><?php echo esc_html($item['text'] ?? ''); ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         TRIP COMES FIRST SECTION
    ========================================= -->
    <?php if (!empty($proc_title) || !empty($proc_steps)) : ?>
    <section class="trip-comes-first-section">
        <div class="container">
            <div class="section-title-centered">
                <h2><?php echo esc_html($proc_title ?: st_t('The Trip Comes First')); ?></h2>
                <?php if (!empty($proc_sub)) : ?>
                <p class="body-lg">
                    <?php echo esc_html($proc_sub); ?>
                </p>
                <?php endif; ?>
            </div>

            <?php if (!empty($proc_steps)) : ?>
            <div class="trip-grid-three">
                <?php foreach ($proc_steps as $step) :
                    $num = $step['num'] ?? '';
                    $stitle = $step['title'] ?? '';
                    $stext = $step['text'] ?? '';
                ?>
                <div class="trip-card-numbered">
                    <div class="trip-number"><?php echo esc_html($num); ?></div>
                    <h4><?php echo esc_html($stitle); ?></h4>
                    <p class="trip-card-description">
                        <?php echo esc_html($stext); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($proc_image)) : ?>
            <div class="dashboard-mockup-showcase">
                <div class="dashboard-mockup-img" style="background-image: url('<?php echo esc_url($proc_image); ?>');"></div>
                <div class="dashboard-mockup-overlay">
                    <div class="dashboard-mockup-info">
                        <h5><?php echo esc_html($proc_cap_t ?: st_t('Live Route Dashboard')); ?></h5>
                        <p><?php echo esc_html($proc_cap_s ?: st_t('Real-time status monitoring for Admin oversight')); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         PILLARS SECTION
    ========================================= -->
    <?php if (!empty($pillars)) : ?>
    <section class="pillars-section">
        <div class="container">
            <div class="section-title-centered">
                <h2><?php echo esc_html(st_t('Three Pillars of the Ecosystem')); ?></h2>
            </div>
            <div class="pillars-grid">
                <?php foreach ($pillars as $pillar) :
                    $image = $pillar['image'] ?? '';
                    $ptitle = $pillar['title'] ?? '';
                    $items = $pillar['items'] ?? [];
                ?>
                <div class="pillar-card">
                    <?php if (!empty($image)) : ?>
                    <div class="pillar-img-wrapper">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($ptitle); ?>" loading="lazy" />
                    </div>
                    <?php endif; ?>
                    <div class="pillar-content">
                        <h4><?php echo esc_html($ptitle); ?></h4>
                        <?php if (!empty($items)) : ?>
                        <ul class="pillar-list">
                            <?php foreach ($items as $item) : ?>
                            <li class="pillar-item">
                                <span class="material-symbols-outlined">check</span>
                                <span><?php echo esc_html($item['text'] ?? ''); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         OPERATIONAL DEPTH SECTION
    ========================================= -->
    <?php if (!empty($depth_cards)) : ?>
    <section class="operational-depth-section">
        <div class="container">
            <div class="section-title-centered">
                <h2><?php echo esc_html(st_t('Operational Depth')); ?></h2>
            </div>
            <div class="operational-grid">
                <?php foreach ($depth_cards as $card) :
                    $icon = $card['icon'] ?? 'bolt';
                    $ctitle = $card['title'] ?? '';
                    $ctext = $card['text'] ?? '';
                ?>
                <div class="operational-card">
                    <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                    <h5><?php echo esc_html($ctitle); ?></h5>
                    <p><?php echo esc_html($ctext); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         TRUST SECTION
    ========================================= -->
    <?php if (!empty($trust_title) || !empty($trust_items)) : ?>
    <section class="trust-section">
        <div class="container">
            <div class="trust-flex-layout">
                <div class="trust-content">
                    <?php if (!empty($trust_title)) : ?>
                    <h2><?php echo esc_html($trust_title); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($trust_text)) : ?>
                    <p class="section-sub">
                        <?php echo esc_html($trust_text); ?>
                    </p>
                    <?php endif; ?>

                    <?php if (!empty($trust_items)) : ?>
                    <div class="trust-grid-items">
                        <?php foreach ($trust_items as $item) :
                            $icon = $item['icon'] ?? 'check_circle';
                            $ititle = $item['title'] ?? '';
                            $itext = $item['text'] ?? '';
                        ?>
                        <div class="trust-item">
                            <div class="trust-item-icon">
                                <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                            </div>
                            <div class="trust-item-details">
                                <h6><?php echo esc_html($ititle); ?></h6>
                                <p><?php echo esc_html($itext); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="trust-visual-shield">
                    <div class="shield-circle-wrapper">
                        <div class="shield-circle-inner">
                            <span class="material-symbols-outlined">shield_lock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         EXPERIENCE LIVE SECTION
    ========================================= -->
    <?php if (!empty($live_title)) : ?>
    <section class="experience-live-section">
        <div class="container">
            <div class="experience-container">
                <h2 class="experience-title"><?php echo esc_html($live_title); ?></h2>
                <?php if (!empty($live_text)) : ?>
                <p class="experience-desc">
                    <?php echo esc_html($live_text); ?>
                </p>
                <?php endif; ?>
                <div class="badges-action-row">
                    <?php if (!empty($live_url)) : ?>
                    <a href="<?php echo esc_url($live_url); ?>" class="btn btn-primary btn-visit-website" target="_blank" rel="noopener">
                        <span class="material-symbols-outlined">language</span>
                        <span><?php echo esc_html(st_t('Visit Website')); ?></span>
                    </a>
                    <?php endif; ?>
                    <?php foreach ($live_apps as $app) :
                        $icon = $app['icon'] ?? 'smartphone';
                        $label = $app['label'] ?? '';
                        $url = $app['url'] ?? '#';
                    ?>
                    <a href="<?php echo esc_url($url); ?>" class="badge-store-link" target="_blank" rel="noopener">
                        <img src="data:image/png;base64,<?php echo esc_attr(base64_encode(file_get_contents('https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg'))); ?>" alt="<?php echo esc_attr($label); ?>" loading="lazy" />
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         TECHNOLOGY STACK SECTION
    ========================================= -->
    <?php if (!empty($tech_stack)) : ?>
    <section class="tech-stack-section">
        <div class="container">
            <h2 class="heading-lg" style="text-align: center; margin-bottom: 60px;"><?php echo esc_html(st_t('Technology Stack')); ?></h2>
            <div class="tech-grid-wrapper">
                <?php foreach ($tech_stack as $tech) :
                    $icon = $tech['icon'] ?? 'code';
                    $label = $tech['label'] ?? '';
                ?>
                <div class="tech-item">
                    <div class="tech-icon-card">
                        <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                    </div>
                    <p><?php echo esc_html($label); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ========================================
         FINAL CTA SECTION
    ========================================= -->
    <section class="container">
        <div class="final-cta">
            <div class="final-cta-bg-overlay"></div>
            <div class="final-cta-content-grid">
                <div class="final-cta-text">
                    <h2><?php echo esc_html($cta_title); ?></h2>
                    <p><?php echo esc_html($cta_text); ?></p>
                    <?php
                    $contact_url = function_exists('st_url') ? st_url('contact') : home_url('/contact/');
                    ?>
                    <a href="<?php echo esc_url($contact_url); ?>" class="btn btn-primary btn-primary-orange">
                        <?php echo esc_html(st_t('Start Your Project')); ?>
                    </a>
                </div>
                <div class="final-cta-visual">
                    <?php if (!empty($featured_img)) : ?>
                    <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr($title); ?>" class="final-cta-img-card" loading="lazy" />
                    <?php else : ?>
                    <div class="final-cta-img-card" style="background: linear-gradient(135deg, var(--color-primary-light), var(--color-primary));"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</div><!-- /.single-case-study -->

<script>
(function () {
    if (!('IntersectionObserver' in window)) return;
    var items = document.querySelectorAll('.cs-reveal');
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
    items.forEach(function (el) { io.observe(el); });
})();
</script>

<?php
endwhile;

get_footer();
?>