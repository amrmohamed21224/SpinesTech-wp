<?php
/**
 * Archive Template: Services Page
 * File: archive-st_service.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// â”€â”€ SEO â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
add_filter( 'pre_get_document_title', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    return $is_rtl
        ? 'Ø®Ø¯Ù…Ø§ØªÙ†Ø§ | SpinesTech â€” ØªØ·ÙˆÙŠØ± ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ø§Ù„Ø¬ÙˆØ§Ù„ ÙˆØ§Ù„Ù…Ù†ØµØ§Øª Ø§Ù„Ø±Ù‚Ù…ÙŠØ©'
        : 'Our Services | SpinesTech â€” Mobile App & Digital Platform Development';
}, 999 );

add_action( 'wp_head', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    st_seo_set_description( $is_rtl
        ? 'اكتشف خدمات SpinesTech في تطوير تطبيقات الجوال، منصات الويب، لوحات التحكم، الأسواق الرقمية، وأنظمة الحجوزات في السعودية والخليج.'
        : 'Explore SpinesTech services in mobile app development, web platforms, admin dashboards, digital marketplaces, and booking systems across Saudi Arabia and the GCC.' );
}, 3 );
// â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€

get_header();

$dir    = function_exists( 'st_dir' ) ? st_dir() : 'rtl';
$is_rtl = ( $dir === 'rtl' );
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';
?>

<div class="sv-page" dir="<?php echo esc_attr( $dir ); ?>">
<main>

<!-- HERO -->
<section class="sv-hero">
    <canvas class="st-hero-canvas sv-hero__canvas"></canvas>
    <div id="sv-hero-3d" class="sv-hero__3d"></div>

    <div class="sv-hero__labels" aria-hidden="true">
        <span class="sv-float-pill sv-float-pill--1">REST API</span>
        <span class="sv-float-pill sv-float-pill--2">iOS / Android</span>
        <span class="sv-float-pill sv-float-pill--3"><?php echo $is_rtl ? 'Ù„ÙˆØ­Ø§Øª ØªØ­ÙƒÙ…' : 'Dashboards'; ?></span>
        <span class="sv-float-pill sv-float-pill--4"><?php echo $is_rtl ? 'Ø£ØªÙ…ØªØ© Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª' : 'Automation'; ?></span>
        <span class="sv-float-pill sv-float-pill--5">Realtime</span>
        <span class="sv-float-pill sv-float-pill--6">Cloud Native</span>
    </div>
    <div class="sv-ornament sv-ornament--tr" aria-hidden="true">NATIVE & CROSS-PLATFORM</div>
    <div class="sv-ornament sv-ornament--tl" aria-hidden="true">SCALABLE ARCHITECTURE</div>
    <div class="sv-ornament sv-ornament--bl" aria-hidden="true">ENTERPRISE GRADE</div>

    <div class="container sv-hero__inner">
        <div class="sv-reveal sv-hero__badge" style="--sv-delay:0.05s">
            <span class="sv-hero__badge-dot"></span>
            <?php echo $is_rtl ? 'Ø§Ù„ØªÙ…ÙŠÙ‘Ø² Ø§Ù„Ù‡Ù†Ø¯Ø³ÙŠ Ø§Ù„Ø±Ù‚Ù…ÙŠ' : 'Digital Engineering Excellence'; ?>
        </div>

        <h1 class="sv-reveal sv-hero__title" style="--sv-delay:0.15s">
            <?php echo $is_rtl
                ? 'خدمات تطوير البرمجيات <span class="sv-hero__title-accent">من التحليل</span> حتى دعم ما بعد الإطلاق'
                : 'Software development services <span class="sv-hero__title-accent">from discovery</span> through post-launch support'; ?>
        </h1>

        <p class="sv-reveal sv-hero__subtitle" style="--sv-delay:0.25s">
            <?php echo esc_html( $is_rtl
                ? 'من تحليل الأعمال وتحديد النطاق إلى التصميم والتطوير والإطلاق والتوسع — نبني تطبيقات ومنصات وأنظمة تشغيلية للشركات في الخليج.'
                : 'From business analysis and scoping through design, build, launch, and scale — we deliver apps, platforms, and operational systems for GCC companies.' ); ?>
        </p>

        <div class="sv-reveal sv-hero__actions" style="--sv-delay:0.35s">
            <a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( 'contact' ) : home_url( '/contact/' ) ); ?>" class="sv-btn sv-btn--primary"><?php echo $is_rtl ? 'Ø§Ø¨Ø¯Ø£ Ø±Ø­Ù„ØªÙƒ Ø§Ù„ØªÙ‚Ù†ÙŠØ©' : 'Start Your Tech Journey'; ?></a>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'st_case_study' ) ); ?>" class="sv-btn sv-btn--ghost"><?php echo $is_rtl ? 'Ø§Ø·Ù„Ø¹ Ø¹Ù„Ù‰ Ø£Ø¹Ù…Ø§Ù„Ù†Ø§' : 'View Case Studies'; ?></a>
        </div>
    </div>
</section>


<!-- 1. Ù…Ø§ Ø§Ù„Ø°ÙŠ Ù†Ø¨Ù†ÙŠÙ‡ -->
<section class="sv-section sv-section--white" id="sv-build">
    <div class="container">
        <div class="sv-reveal sv-intro">
            <h2 class="sv-h2"><?php echo $is_rtl ? 'Ù…Ø§ Ø§Ù„Ø°ÙŠ Ù†Ø¨Ù†ÙŠÙ‡ØŸ' : 'What Do We Build?'; ?></h2>
            <p class="sv-lead"><?php echo esc_html( $is_rtl
                ? 'Ù†Ø¨Ù†ÙŠ Ù…Ù†ØªØ¬Ø§Øª Ø±Ù‚Ù…ÙŠØ© Ù…ØªÙƒØ§Ù…Ù„Ø© ØªØ±Ø¨Ø· Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†ØŒ Ø§Ù„Ø¨ÙŠØ§Ù†Ø§ØªØŒ Ø§Ù„ÙØ±Ù‚ Ø§Ù„ØªØ´ØºÙŠÙ„ÙŠØ©ØŒ ÙˆÙ‚ÙˆØ§Ø¹Ø¯ Ø§Ù„Ø¹Ù…Ù„ Ø¯Ø§Ø®Ù„ Ù…Ù†Ø¸ÙˆÙ…Ø© Ù‚Ø§Ø¨Ù„Ø© Ù„Ù„ØªÙˆØ³Ø¹.'
                : 'We build integrated digital products connecting users, data, operational teams, and business rules within a scalable ecosystem.' ); ?>
            </p>
        </div>

        <div class="sv-cards-grid">
            <?php
            $hub_slugs = function_exists('st_hub_anchor_slugs') ? st_hub_anchor_slugs() : [];
            $build_cards = [
                [ 'mobile-apps', 'smartphone',           $is_rtl ? 'تطبيقات الجوال' : 'Mobile Apps',                 $is_rtl ? 'تطبيقات Native و Cross-platform تركز على الأداء الفائق وتجربة المستخدم السلسة.' : 'Native and cross-platform apps focused on superior performance and smooth user experience.', ['IOS/ANDROID', 'FLUTTER'] ],
                [ 'web-platforms', 'language',             $is_rtl ? 'منصات الويب' : 'Web Platforms',                   $is_rtl ? 'منصات ويب تفاعلية ومعقدة، مبنية بأحدث أطر العمل لضمان السرعة والقابلية للتوسع.' : 'Interactive and complex web platforms built with modern frameworks for speed and scalability.', ['NEXT.JS', 'REACT'] ],
                [ 'admin-dashboards', 'dashboard_customize',  $is_rtl ? 'لوحات التحكم الإدارية' : 'Admin Dashboards',     $is_rtl ? 'أدوات إدارية ذكية تمنحك السيطرة الكاملة على بياناتك وعملياتك التشغيلية في مكان واحد.' : 'Smart admin tools giving you full control over your data and operational processes in one place.', ['DATA VISUALS', 'ADMIN OPS'] ],
                [ 'marketplaces', 'storefront',           $is_rtl ? 'الأسواق الرقمية' : 'Digital Marketplaces',        $is_rtl ? 'بناء منصات Multi-vendor متكاملة تشمل محافظ رقمية ونظام عمولات معقد.' : 'Building integrated multi-vendor platforms with digital wallets and complex commission systems.', ['MARKETPLACE', 'E-COMMERCE'] ],
                [ 'booking-systems', 'calendar_month',       $is_rtl ? 'أنظمة الحجوزات' : 'Booking Systems',              $is_rtl ? 'حلول متطورة لإدارة الحجوزات، الجدولة، والموارد لقطاعات الخدمات والفعاليات.' : 'Advanced solutions for booking management, scheduling, and resource allocation for service sectors.', ['BOOKING ENGINE', 'REAL-TIME'] ],
                [ 'operational-systems', 'settings_applications',$is_rtl ? 'الأنظمة التشغيلية' : 'Operational Systems',      $is_rtl ? 'أتمتة العمليات الداخلية للشركات (ERP-Lite) المصممة خصيصاً لاحتياجاتك الفريدة.' : 'Automating internal company operations (ERP-Lite) designed specifically for your unique needs.', ['WORKFLOW', 'AUTOMATION'] ],
            ];
            foreach ( $build_cards as $i => [ $id, $icon, $title, $text, $tags ] ) :
                $service_slug = $hub_slugs[ $id ] ?? '';
                $service_url = $service_slug && function_exists('st_service_permalink') ? st_service_permalink( $service_slug ) : '#' . $id;
            ?>
            <a id="<?php echo esc_attr( $id ); ?>" href="<?php echo esc_url( $service_url ); ?>" class="sv-reveal sv-build-card sv-build-card--link" style="--sv-delay:<?php echo esc_attr( $i * 0.08 ); ?>s; scroll-margin-top: 100px;">
                <div class="sv-build-card__icon">
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $icon ); ?></span>
                </div>
                <h3 class="sv-build-card__title"><?php echo esc_html( $title ); ?></h3>
                <p class="sv-build-card__text"><?php echo esc_html( $text ); ?></p>
                <div class="sv-tag-row">
                    <?php foreach ( $tags as $tag ) : ?>
                    <span class="sv-tag"><?php echo esc_html( $tag ); ?></span>
                    <?php endforeach; ?>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- 2. Ù†Ù…Ø§Ø°Ø¬ ØªÙ†ÙÙŠØ° -->
<section class="sv-section sv-section--dark" id="sv-models">
    <div class="sv-blueprint-grid" aria-hidden="true"></div>
    <div class="sv-glow-blob" style="width:26rem;height:26rem;background:rgba(3,109,54,0.35);inset-block-start:-8rem;inset-inline-start:-6rem;" aria-hidden="true"></div>
    <div class="sv-glow-blob" style="width:20rem;height:20rem;background:rgba(0,132,255,0.22);inset-block-end:-6rem;inset-inline-end:-4rem;animation-delay:3s;" aria-hidden="true"></div>
    <div class="container">
        <div class="sv-reveal sv-intro sv-intro--center">
            <h2 class="sv-h2 sv-h2--light"><?php echo $is_rtl ? 'Ù†Ù…Ø§Ø°Ø¬ ØªÙ†ÙÙŠØ° Ù…Ø±Ù†Ø© ØªÙ†Ø§Ø³Ø¨ Ø§Ø­ØªÙŠØ§Ø¬Ùƒ' : 'Flexible Execution Models for Your Needs'; ?></h2>
            <p class="sv-lead sv-lead--dark"><?php echo esc_html( $is_rtl
                ? 'Ù†Ø­Ù† Ù„Ø³Ù†Ø§ Ù…Ø¬Ø±Ø¯ Ù…Ø²ÙˆØ¯ ÙƒÙˆØ¯ØŒ Ø¨Ù„ Ø´Ø±ÙŠÙƒ ØªÙ‚Ù†ÙŠ ÙŠÙ†Ù…Ùˆ Ù…Ø¹Ùƒ Ø¹Ø¨Ø± Ù†Ù…Ø§Ø°Ø¬ ØªØ¹Ø§ÙˆÙ† Ø§Ø­ØªØ±Ø§ÙÙŠØ©.'
                : 'We are not just a code provider, but a tech partner that grows with you through professional collaboration models.' ); ?>
            </p>
        </div>

        <div class="sv-cards-grid">
            <?php
            $model_cards = [
                [ 'UNIT_01 // END-TO-END',         $is_rtl ? 'ØªÙ†ÙÙŠØ° Ù…Ø´Ø±ÙˆØ¹ ÙƒØ§Ù…Ù„' : 'Full Project Execution',            $is_rtl ? 'Ù…Ù† Ø§Ù„ÙÙƒØ±Ø© Ø¥Ù„Ù‰ Ø§Ù„Ø¥Ø·Ù„Ø§Ù‚ØŒ Ù†ØªØ­Ù…Ù„ Ø§Ù„Ù…Ø³Ø¤ÙˆÙ„ÙŠØ© Ø§Ù„ÙƒØ§Ù…Ù„Ø© Ø¹Ù† Ù‡Ù†Ø¯Ø³Ø© ÙˆØªØ·ÙˆÙŠØ± Ø§Ù„Ù…Ù†ØªØ¬.' : 'From idea to launch, we take full responsibility for product architecture and development.' ],
                [ 'UNIT_02 // MOBILE_SPECIALIST',  $is_rtl ? 'ØªØ·ÙˆÙŠØ± ØªØ·Ø¨ÙŠÙ‚ Ø§Ù„Ø¬ÙˆØ§Ù„ ÙÙ‚Ø·' : 'Mobile App Only',             $is_rtl ? 'Ø¥Ø°Ø§ ÙƒØ§Ù† Ù„Ø¯ÙŠÙƒ API Ø¬Ø§Ù‡Ø²ØŒ Ù†Ù‚ÙˆÙ… Ø¨Ø¨Ù†Ø§Ø¡ ØªØ¬Ø±Ø¨Ø© Ø¬ÙˆØ§Ù„ Ø§Ø³ØªØ«Ù†Ø§Ø¦ÙŠØ© ØªØ±ØªØ¨Ø· Ø¨Ù†Ø¸Ø§Ù…Ùƒ Ø§Ù„Ù‚Ø§Ø¦Ù….' : 'If you have a ready API, we build an exceptional mobile experience connecting to your existing system.' ],
                [ 'UNIT_03 // CTO_PARTNER',        $is_rtl ? 'ØªÙ†ÙÙŠØ° Ù„ØµØ§Ù„Ø­ Ø´Ø±ÙŠÙƒ ØªÙ‚Ù†ÙŠ' : 'Tech Partner Execution',       $is_rtl ? 'Ù†Ø¹Ù…Ù„ ÙƒÙØ±ÙŠÙ‚ ØªØ·ÙˆÙŠØ± Ù…Ø¯Ù…Ø¬ ØªØ­Øª Ù‚ÙŠØ§Ø¯Ø© CTO Ø§Ù„Ø´Ø±ÙƒØ© Ù„ØªØ¹Ø²ÙŠØ² Ø³Ø±Ø¹Ø© Ø§Ù„ØªÙ†ÙÙŠØ°.' : 'We work as an integrated development team under the company CTO leadership to boost execution speed.' ],
                [ 'UNIT_04 // WHITELABEL_DEPLOY',  $is_rtl ? 'ØªÙ†ÙÙŠØ° White-label' : 'White-Label Execution',            $is_rtl ? 'Ø¥Ø¹Ø§Ø¯Ø© ØªØ®ØµÙŠØµ Ø­Ù„ÙˆÙ„Ù†Ø§ Ø§Ù„Ø¬Ø§Ù‡Ø²Ø© Ù„ØªØ¹Ù…Ù„ ØªØ­Øª Ø¹Ù„Ø§Ù…ØªÙƒ Ø§Ù„ØªØ¬Ø§Ø±ÙŠØ© ÙˆÙ‡ÙˆÙŠØªÙƒ Ø§Ù„Ø¨ØµØ±ÙŠØ©.' : 'Customizing our ready solutions to work under your brand identity and visual language.' ],
                [ 'UNIT_05 // MODULE_EXPANSION',   $is_rtl ? 'ØªØ·ÙˆÙŠØ± ÙˆØ­Ø¯Ø§Øª Ø¯Ø§Ø®Ù„ Ù…Ù†ØªØ¬ Ù‚Ø§Ø¦Ù…' : 'Module Development',      $is_rtl ? 'Ø¥Ø¶Ø§ÙØ© Ù…ÙŠØ²Ø§Øª Ø¬Ø¯ÙŠØ¯Ø© Ø£Ùˆ Ø±Ø¨Ø· ØªÙƒØ§Ù…Ù„Ø§Øª Ù…Ø¹Ù‚Ø¯Ø© Ø¨Ù…Ù†ØªØ¬Ùƒ Ø§Ù„Ø­Ø§Ù„ÙŠ Ø¯ÙˆÙ† ØªØ¹Ø·ÙŠÙ„Ù‡.' : 'Adding new features or connecting complex integrations to your existing product without disruption.' ],
                [ 'UNIT_06 // PRODUCT_REFINE',     $is_rtl ? 'ØªØ­Ø³ÙŠÙ† Ø£Ùˆ Ø§Ø³ØªÙƒÙ…Ø§Ù„ Ù…Ù†ØªØ¬ Ù‚Ø§Ø¦Ù…' : 'Product Enhancement',     $is_rtl ? 'Ø§Ø³ØªÙ„Ø§Ù… Ù…Ø´Ø§Ø±ÙŠØ¹ Ù…ØªØ¹Ø«Ø±Ø© ÙˆØªØ­Ø¯ÙŠØ« Ø§Ù„ÙƒÙˆØ¯ ÙˆØ§Ù„ØªÙ‚Ù†ÙŠØ§Øª Ù„Ø¶Ù…Ø§Ù† Ø§Ù„Ø¬Ø§Ù‡Ø²ÙŠØ© Ø§Ù„ØªØ´ØºÙŠÙ„ÙŠØ©.' : 'Taking over stalled projects and updating code and technologies to ensure operational readiness.' ],
            ];
            foreach ( $model_cards as $i => [ $unit, $title, $text ] ) : ?>
            <div class="sv-reveal sv-model-card" style="--sv-delay:<?php echo esc_attr( $i * 0.08 ); ?>s">
                <span class="sv-model-card__unit"><?php echo esc_html( $unit ); ?></span>
                <h4 class="sv-model-card__title"><?php echo esc_html( $title ); ?></h4>
                <p class="sv-model-card__text"><?php echo esc_html( $text ); ?></p>
                <div class="sv-model-card__bar"></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- 3. Ù…Ø§Ø°Ø§ ÙŠØ´Ù…Ù„ Ø§Ù„Ø¹Ù…Ù„ Ù…Ø¹Ù†Ø§ -->
<section class="sv-section sv-section--white">
    <div class="container">
        <div class="sv-reveal sv-intro sv-intro--center">
            <h2 class="sv-h2"><?php echo $is_rtl ? 'Ù…Ø§Ø°Ø§ ÙŠØ´Ù…Ù„ Ø§Ù„Ø¹Ù…Ù„ Ù…Ø¹Ù†Ø§ØŸ' : 'What Does Working With Us Include?'; ?></h2>
            <p class="sv-lead sv-lead--center"><?php echo esc_html( $is_rtl
                ? 'Ù„Ø§ Ù†ÙØ³Ù„Ù‘Ù… ÙƒÙˆØ¯Ù‹Ø§ ÙÙ‚Ø·. Ù†Ø³Ø§Ø¹Ø¯Ùƒ Ø¹Ù„Ù‰ ØªØ­ÙˆÙŠÙ„ Ø§Ù„ÙÙƒØ±Ø© Ø£Ùˆ Ø§Ù„Ø§Ø­ØªÙŠØ§Ø¬ Ø¥Ù„Ù‰ Ù†Ø·Ø§Ù‚ ÙˆØ§Ø¶Ø­ØŒ Ù…Ù†ØªØ¬ Ù‚Ø§Ø¨Ù„ Ù„Ù„ØªÙ†ÙÙŠØ°ØŒ ÙˆØªØ¬Ø±Ø¨Ø© Ø¬Ø§Ù‡Ø²Ø© Ù„Ù„Ø¥Ø·Ù„Ø§Ù‚.'
                : 'We don\'t just deliver code. We help you turn your idea or need into a clear scope, actionable product, and launch-ready experience.' ); ?>
            </p>
        </div>

        <div class="sv-steps-grid">
            <?php
            $steps = [
                [ '1', $is_rtl ? 'ØªØ­Ù„ÙŠÙ„ Ø§Ù„Ù…ØªØ·Ù„Ø¨Ø§Øª' : 'Requirements Analysis', $is_rtl ? 'Ù†ØºÙˆØµ ÙÙŠ ØªÙØ§ØµÙŠÙ„ ÙÙƒØ±ØªÙƒ Ù„Ù†Ø®Ø±Ø¬ Ø¨Ù†Ø·Ø§Ù‚ Ø¹Ù…Ù„ (Scope) ØªÙ‚Ù†ÙŠ Ø¯Ù‚ÙŠÙ‚.' : 'We dive deep into your idea to emerge with a precise technical scope of work.' ],
                [ '2', $is_rtl ? 'Ø±Ø³Ù… Ø³ÙŠØ± Ø§Ù„Ù…Ù†ØªØ¬' : 'Product Mapping',        $is_rtl ? 'ØªØ®Ø·ÙŠØ· Ø±Ø­Ù„Ø© Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù… (User Flow) ÙˆØ§Ù„Ø¹Ù…Ù„ÙŠØ§Øª Ø§Ù„Ø®Ù„ÙÙŠØ© (Logic Flow).' : 'Planning the user flow and backend logic flow.' ],
                [ '3', $is_rtl ? 'ØªØµÙ…ÙŠÙ… UI/UX' : 'UI/UX Design',              $is_rtl ? 'ÙˆØ§Ø¬Ù‡Ø§Øª Ø¹ØµØ±ÙŠØ© ØªØ±ÙƒØ² Ø¹Ù„Ù‰ Ø³Ù‡ÙˆÙ„Ø© Ø§Ù„Ø§Ø³ØªØ®Ø¯Ø§Ù… ÙˆØªÙˆØ§ÙÙ‚ Ø§Ù„Ù‡ÙˆÙŠØ©.' : 'Modern interfaces focused on usability and brand alignment.' ],
                [ '4', $is_rtl ? 'Ø§Ù„ØªØ·ÙˆÙŠØ±' : 'Development',                   $is_rtl ? 'ÙƒØªØ§Ø¨Ø© ÙƒÙˆØ¯ Ù†Ø¸ÙŠÙØŒ Ø¢Ù…Ù†ØŒ ÙˆÙ‚Ø§Ø¨Ù„ Ù„Ù„ØªÙˆØ³Ø¹ Ø¨Ø§Ø³ØªØ®Ø¯Ø§Ù… Ø£Ø­Ø¯Ø« Ø§Ù„ØªÙ‚Ù†ÙŠØ§Øª.' : 'Writing clean, secure, and scalable code using the latest technologies.' ],
                [ '5', $is_rtl ? 'Ø§Ù„ØªÙƒØ§Ù…Ù„Ø§Øª' : 'Integrations',                $is_rtl ? 'Ø±Ø¨Ø· Ø§Ù„Ù†Ø¸Ø§Ù… Ø¨Ø¨ÙˆØ§Ø¨Ø§Øª Ø§Ù„Ø¯ÙØ¹ØŒ Ø§Ù„Ø±Ø³Ø§Ø¦Ù„ Ø§Ù„Ù†ØµÙŠØ©ØŒ ÙˆØ§Ù„Ø£Ù†Ø¸Ù…Ø© Ø§Ù„Ø®Ø§Ø±Ø¬ÙŠØ©.' : 'Connecting the system to payment gateways, SMS, and external systems.' ],
                [ '6', $is_rtl ? 'Ø§Ù„Ø§Ø®ØªØ¨Ø§Ø± ÙˆØ§Ù„ØªØ³Ù„ÙŠÙ…' : 'QA & Delivery',       $is_rtl ? 'ÙØ­Øµ Ø´Ø§Ù…Ù„ Ù„Ù„Ø¬ÙˆØ¯Ø© ÙˆØ§Ù„Ø£Ù…Ø§Ù† Ù‚Ø¨Ù„ Ø§Ù„ØªØ³Ù„ÙŠÙ… Ø§Ù„Ù†Ù‡Ø§Ø¦ÙŠ Ù„Ù„Ø¹Ù…ÙŠÙ„.' : 'Comprehensive quality and security testing before final client delivery.' ],
                [ '7', $is_rtl ? 'Ø§Ù„Ø¥Ø·Ù„Ø§Ù‚' : 'Launch',                        $is_rtl ? 'Ø±ÙØ¹ Ø§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ø¹Ù„Ù‰ Ø§Ù„Ù…ØªØ§Ø¬Ø± ÙˆØªØ¬Ù‡ÙŠØ² Ø§Ù„Ø®ÙˆØ§Ø¯Ù… Ù„Ù„Ø¥Ù†ØªØ§Ø¬ Ø§Ù„ÙØ¹Ù„ÙŠ.' : 'Publishing apps to stores and preparing servers for production.' ],
                [ '8', $is_rtl ? 'Ø§Ù„ØªÙˆØ«ÙŠÙ‚ ÙˆØ§Ù„Ø¯Ø¹Ù…' : 'Documentation & Support', $is_rtl ? 'ØªØ³Ù„ÙŠÙ… ÙƒØ§Ù…Ù„ Ø§Ù„ØªÙˆØ«ÙŠÙ‚ Ø§Ù„ØªÙ‚Ù†ÙŠ Ù…Ø¹ ÙØªØ±Ø© Ø¶Ù…Ø§Ù† ÙˆØ¯Ø¹Ù… ØªØ´ØºÙŠÙ„ÙŠ.' : 'Complete technical documentation delivery with a warranty and operational support period.' ],
            ];
            foreach ( $steps as $i => [ $num, $stitle, $stext ] ) : ?>
            <div class="sv-reveal sv-step" style="--sv-delay:<?php echo esc_attr( $i * 0.05 ); ?>s">
                <div class="sv-step__num"><?php echo esc_html( $num ); ?></div>
                <h4 class="sv-step__title"><?php echo esc_html( $stitle ); ?></h4>
                <p class="sv-step__text"><?php echo esc_html( $stext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- 4. Ù‚Ø¯Ø±Ø§Øª Ù†Ø¨Ù†ÙŠÙ‡Ø§ -->
<section class="sv-section sv-section--gray">
    <div class="container">
        <div class="sv-reveal sv-intro sv-intro--center">
            <h2 class="sv-h2"><?php echo $is_rtl ? 'Ù‚Ø¯Ø±Ø§Øª Ù†Ø¨Ù†ÙŠÙ‡Ø§ Ø¯Ø§Ø®Ù„ Ø§Ù„Ù…Ù†ØªØ¬Ø§Øª' : 'Capabilities We Build Into Products'; ?></h2>
        </div>

        <div class="sv-capabilities-grid">
            <?php
            $capabilities = [
                [ 'group',                  $is_rtl ? 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙˆÙ†' : 'Users',       $is_rtl ? ['Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ø­Ø³Ø§Ø¨Ø§Øª', 'Ø§Ù„Ø£Ø¯ÙˆØ§Ø± ÙˆØ§Ù„ØµÙ„Ø§Ø­ÙŠØ§Øª', 'Ù†Ø¸Ù… Ø§Ù„ÙˆÙ„Ø§Ø¡'] : ['Account Management', 'Roles & Permissions', 'Loyalty Systems'] ],
                [ 'shopping_cart',          $is_rtl ? 'Ø§Ù„Ø·Ù„Ø¨Ø§Øª' : 'Orders',         $is_rtl ? ['ØªØªØ¨Ø¹ Ø§Ù„Ø´Ø­Ù†Ø§Øª', 'Ø³ÙŠØ± Ø§Ù„Ø¹Ù…Ù„ Ø§Ù„Ø¢Ù„ÙŠ', 'Ø§Ù„ÙÙˆØªØ±Ø© Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©'] : ['Shipment Tracking', 'Automated Workflow', 'E-Invoicing'] ],
                [ 'account_balance_wallet', $is_rtl ? 'Ø§Ù„Ù…Ø§Ù„ÙŠØ©' : 'Finance',        $is_rtl ? ['ØªÙƒØ§Ù…Ù„ Ø¨ÙˆØ§Ø¨Ø§Øª Ø§Ù„Ø¯ÙØ¹', 'Ø§Ù„Ù…Ø­Ø§ÙØ¸ Ø§Ù„Ø±Ù‚Ù…ÙŠØ©', 'ØªÙ‚Ø³ÙŠÙ… Ø§Ù„Ø¹ÙˆØ§Ø¦Ø¯'] : ['Payment Gateway Integration', 'Digital Wallets', 'Revenue Splitting'] ],
                [ 'insights',               $is_rtl ? 'Ø§Ù„Ø¥Ø¯Ø§Ø±Ø©' : 'Management',     $is_rtl ? ['Ù„ÙˆØ­Ø§Øª BI', 'ØªÙ‚Ø§Ø±ÙŠØ± ØªØ´ØºÙŠÙ„ÙŠØ©', 'Ø³Ø¬Ù„ Ø§Ù„Ù†Ø´Ø§Ø·Ø§Øª'] : ['BI Dashboards', 'Operational Reports', 'Activity Logs'] ],
                [ 'api',                    $is_rtl ? 'Ø§Ù„ØªÙƒØ§Ù…Ù„Ø§Øª' : 'Integrations',  $is_rtl ? ['Ø±Ø¨Ø· API Ø®Ø§Ø±Ø¬ÙŠ', 'ØªÙ†Ø¨ÙŠÙ‡Ø§Øª Push/SMS', 'Ø¯Ø¹Ù… Ø§Ù„Ù€ Webhooks'] : ['External API Connection', 'Push/SMS Notifications', 'Webhook Support'] ],
            ];
            foreach ( $capabilities as [ $icon, $ctitle, $items ] ) : ?>
            <div class="sv-cap-cell">
                <h5 class="sv-cap-cell__title">
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $icon ); ?></span>
                    <?php echo esc_html( $ctitle ); ?>
                </h5>
                <ul class="sv-cap-cell__list">
                    <?php foreach ( $items as $item ) : ?>
                    <li><?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- 5. Ù…ØªÙ‰ ØªØ­ØªØ§Ø¬ Ø¥Ù„Ù‰ SpinesTech -->
<section class="sv-section sv-section--white">
    <div class="container">
        <h2 class="sv-reveal sv-h2 sv-h2--center"><?php echo $is_rtl ? 'Ù…ØªÙ‰ ØªØ­ØªØ§Ø¬ Ø¥Ù„Ù‰ SpinesTechØŸ' : 'When Do You Need SpinesTech?'; ?></h2>

        <div class="sv-cards-grid">
            <?php
            $needs = [
                [ $is_rtl ? 'Ù„Ø¯ÙŠÙƒ ÙÙƒØ±Ø© ÙˆØªØ­ØªØ§Ø¬ MVP ÙˆØ§Ø¶Ø­' : 'You have an idea and need a clear MVP',         $is_rtl ? 'ØªØ­ÙˆÙŠÙ„ Ø§Ù„Ø±Ø¤ÙŠØ© Ø§Ù„Ø£ÙˆÙ„ÙŠØ© Ø¥Ù„Ù‰ Ù…Ù†ØªØ¬ Ø­Ù‚ÙŠÙ‚ÙŠ ÙŠØ®ØªØ¨Ø± Ø§Ù„Ø³ÙˆÙ‚ ÙÙŠ Ø£Ø³Ø±Ø¹ ÙˆÙ‚Øª.' : 'Turning your initial vision into a real product that tests the market as quickly as possible.' ],
                [ $is_rtl ? 'Ù„Ø¯ÙŠÙƒ Ù…Ø´Ø±ÙˆØ¹ Ù‚Ø§Ø¦Ù… ÙŠØ­ØªØ§Ø¬ ØªØ·ÙˆÙŠØ±' : 'You have an existing project needing growth',  $is_rtl ? 'ØªØ·ÙˆÙŠØ± Ù…ÙŠØ²Ø§Øª Ø¬Ø¯ÙŠØ¯Ø© Ø£Ùˆ Ø¥Ø¹Ø§Ø¯Ø© Ø¨Ù†Ø§Ø¡ ØªÙ‚Ù†ÙŠØ© Ù„Ù†Ø¸Ø§Ù…Ùƒ Ø§Ù„Ø­Ø§Ù„ÙŠ Ù„Ù„Ù†Ù…Ùˆ.' : 'Developing new features or technical rebuild for your existing system to grow.' ],
                [ $is_rtl ? 'ØªØ­ØªØ§Ø¬ ØªØ·Ø¨ÙŠÙ‚ Ø¬ÙˆØ§Ù„ Ù‚ÙˆÙŠ' : 'You need a powerful mobile app',                     $is_rtl ? 'Ø¨Ù†Ø§Ø¡ ÙˆØ§Ø¬Ù‡Ø§Øª Ù…Ø³ØªØ®Ø¯Ù… Ù…ØªØ¬Ø§ÙˆØ¨Ø© ÙˆØ£Ø¯Ø§Ø¡ Ø¹Ø§Ù„ÙŠ Ø§Ù„ÙƒÙØ§Ø¡Ø© Ø¹Ù„Ù‰ Ø£Ù†Ø¸Ù…Ø© iOS Ùˆ Android.' : 'Building responsive user interfaces and optimized performance on iOS and Android.' ],
                [ $is_rtl ? 'ØªØ­ØªØ§Ø¬ Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… ØªØ´ØºÙŠÙ„ÙŠØ©' : 'You need an operational dashboard',               $is_rtl ? 'ØªØ­ÙˆÙŠÙ„ Ø§Ù„ÙÙˆØ¶Ù‰ Ø§Ù„Ø¥Ø¯Ø§Ø±ÙŠØ© Ø¥Ù„Ù‰ Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… Ø°ÙƒÙŠØ© ØªØ¯ÙŠØ± Ø¨Ù‡Ø§ Ø£Ø¹Ù…Ø§Ù„Ùƒ Ø¨ÙƒÙØ§Ø¡Ø©.' : 'Transforming administrative chaos into a smart dashboard to manage your business efficiently.' ],
                [ $is_rtl ? 'ØªØ¯ÙŠØ± Ø¹Ù…Ù„ÙŠØ§Øª ÙŠØ¯ÙˆÙŠÙ‹Ø§' : 'You manage operations manually',                       $is_rtl ? 'Ø£ØªÙ…ØªØ© Ø§Ù„Ù…Ù‡Ø§Ù… Ø§Ù„Ù…ØªÙƒØ±Ø±Ø© ÙˆØ¨Ù†Ø§Ø¡ Ù†Ø¸Ø§Ù… ÙŠÙ‚Ù„Ù„ Ø§Ù„Ø®Ø·Ø£ Ø§Ù„Ø¨Ø´Ø±ÙŠ ÙÙŠ Ø´Ø±ÙƒØªÙƒ.' : 'Automating repetitive tasks and building a system that reduces human error in your company.' ],
                [ $is_rtl ? 'Ø´Ø±ÙƒØ© ØªÙ‚Ù†ÙŠØ© ØªØ­ØªØ§Ø¬ Ø´Ø±ÙŠÙƒ ØªÙ†ÙÙŠØ°' : 'Tech company needing execution partner',       $is_rtl ? 'Ø²ÙŠØ§Ø¯Ø© Ø³Ø¹Ø© ÙØ±ÙŠÙ‚Ùƒ Ø§Ù„ØªÙ‚Ù†ÙŠ Ø¹Ø¨Ø± Ø´Ø±ÙŠÙƒ Ø®Ø¨ÙŠØ± ÙŠÙ„ØªØ²Ù… Ø¨Ø§Ù„Ù…Ø¹Ø§ÙŠÙŠØ± Ø§Ù„Ù‡Ù†Ø¯Ø³ÙŠØ©.' : 'Increasing your tech team\'s capacity through an expert partner committed to engineering standards.' ],
            ];
            foreach ( $needs as $i => [ $ntitle, $ntext ] ) : ?>
            <div class="sv-reveal sv-need-card" style="--sv-delay:<?php echo esc_attr( $i * 0.06 ); ?>s">
                <h4 class="sv-need-card__title"><?php echo esc_html( $ntitle ); ?></h4>
                <p class="sv-need-card__text"><?php echo esc_html( $ntext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- 6. Ù‚Ø·Ø§Ø¹Ø§Øª Ù†Ø®Ø¯Ù…Ù‡Ø§ -->
<section class="sv-section sv-section--gray">
    <div class="container">
        <h2 class="sv-reveal sv-h2 sv-h2--center"><?php echo $is_rtl ? 'Ù‚Ø·Ø§Ø¹Ø§Øª Ù†Ø®Ø¯Ù…Ù‡Ø§' : 'Sectors We Serve'; ?></h2>

        <div class="sv-sectors-wrap">
            <?php
            $sectors = [
                [ 'local_shipping',  $is_rtl ? 'Ø§Ù„Ù„ÙˆØ¬Ø³ØªÙŠØ§Øª' : 'Logistics' ],
                [ 'celebration',     $is_rtl ? 'Ø§Ù„Ù…Ù†Ø§Ø³Ø¨Ø§Øª' : 'Events' ],
                [ 'domain',          $is_rtl ? 'Ø§Ù„Ø¹Ù‚Ø§Ø±Ø§Øª' : 'Real Estate' ],
                [ 'hub',             $is_rtl ? 'Ø§Ù„Ø£Ø³ÙˆØ§Ù‚ Ø§Ù„Ø±Ù‚Ù…ÙŠØ©' : 'Digital Marketplaces' ],
                [ 'shopping_bag',    $is_rtl ? 'Ø§Ù„ØªØ¬Ø§Ø±Ø© Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©' : 'E-Commerce' ],
                [ 'school',          $is_rtl ? 'Ø§Ù„ØªØ¹Ù„ÙŠÙ…' : 'Education' ],
                [ 'construction',    $is_rtl ? 'Ø§Ù„Ø®Ø¯Ù…Ø§Øª' : 'Services' ],
                [ 'business_center', $is_rtl ? 'ØªØ´ØºÙŠÙ„ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„' : 'Business Ops' ],
            ];
            foreach ( $sectors as $i => [ $icon, $label ] ) : ?>
            <div class="sv-reveal sv-sector-pill" style="--sv-delay:<?php echo esc_attr( $i * 0.04 ); ?>s">
                <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $icon ); ?></span>
                <span><?php echo esc_html( $label ); ?></span>
            </div>
            <?php endforeach; ?>
        </div>

        <p class="sv-reveal sv-sectors-note"><?php echo esc_html( $is_rtl
            ? 'Ù„Ø§ ØªÙ‚ØªØµØ± Ø®Ø¯Ù…Ø§ØªÙ†Ø§ Ø¹Ù„Ù‰ Ù‡Ø°Ù‡ Ø§Ù„Ù‚Ø·Ø§Ø¹Ø§ØªØŒ Ù†Ø­Ù† Ù†ØªØ­Ù…Ø³ Ø¯Ø§Ø¦Ù…Ø§Ù‹ Ù„Ù„Ù‡Ù†Ø¯Ø³Ø© Ø§Ù„Ø¨Ø±Ù…Ø¬ÙŠØ© ÙÙŠ Ø£ÙŠ Ù‚Ø·Ø§Ø¹ ÙŠØªØ·Ù„Ø¨ Ø§Ù„Ø§Ø¨ØªÙƒØ§Ø±.'
            : 'Our services are not limited to these sectors; we are always enthusiastic about software engineering in any sector that demands innovation.' ); ?>
        </p>
    </div>
</section>


<!-- 7. ÙƒÙŠÙ Ù†Ø¨Ø¯Ø£ Ø§Ù„Ø¹Ù…Ù„ -->
<section class="sv-section sv-section--white">
    <div class="container">
        <h2 class="sv-reveal sv-h2 sv-h2--center"><?php echo $is_rtl ? 'ÙƒÙŠÙ Ù†Ø¨Ø¯Ø£ Ø§Ù„Ø¹Ù…Ù„ØŸ' : 'How Do We Start?'; ?></h2>

        <div class="sv-process">
            <div class="sv-process__line" aria-hidden="true"></div>
            <?php
            $process = [
                [ '1', $is_rtl ? 'Ø¬Ù„Ø³Ø© Ø§Ø³ØªÙƒØ´Ø§Ù' : 'Discovery Session',  $is_rtl ? 'Ù†ÙÙ‡Ù… Ø§Ø­ØªÙŠØ§Ø¬ÙƒØŒ Ø§Ù„Ø³ÙˆÙ‚ØŒ ÙˆØ£Ù‡Ø¯Ø§Ù Ø§Ù„Ù…Ù†ØªØ¬ Ø§Ù„ÙƒØ¨Ø±Ù‰.' : 'We understand your need, market, and major product goals.' ],
                [ '2', $is_rtl ? 'ØªØ­Ø¯ÙŠØ¯ Ø§Ù„Ù†Ø·Ø§Ù‚' : 'Scope Definition',    $is_rtl ? 'Ù†Ø­ÙˆÙ„ Ø§Ù„Ø±Ø¤ÙŠØ© Ø¥Ù„Ù‰ ÙˆØ«ÙŠÙ‚Ø© ÙÙ†ÙŠØ© ÙˆØ®Ø·Ø© Ø¹Ù…Ù„ ÙˆØ§Ø¶Ø­Ø©.' : 'We transform the vision into a technical document and clear work plan.' ],
                [ '3', $is_rtl ? 'Ø®Ø·Ø© ØªÙ†ÙÙŠØ°' : 'Execution Plan',         $is_rtl ? 'Ø¹Ø±Ø¶ Ø§Ù„Ø³Ø¹Ø±ØŒ Ø§Ù„Ø¬Ø¯ÙˆÙ„ Ø§Ù„Ø²Ù…Ù†ÙŠØŒ ÙˆÙØ±ÙŠÙ‚ Ø§Ù„Ø¹Ù…Ù„ Ø§Ù„Ù…Ø®ØµØµ.' : 'Quotation, timeline, and dedicated team presentation.' ],
                [ '4', $is_rtl ? 'Ø¨Ø¯Ø¡ Ø§Ù„ØªØ·ÙˆÙŠØ±' : 'Development Kickoff',  $is_rtl ? 'Ø§Ù†Ø·Ù„Ø§Ù‚ Ø§Ù„Ø¹Ù…Ù„ Ø¨Ù†Ø¸Ø§Ù… Ø§Ù„Ù€ Sprints ÙˆØ§Ù„ØªÙ‚Ø§Ø±ÙŠØ± Ø§Ù„Ø£Ø³Ø¨ÙˆØ¹ÙŠØ©.' : 'Work kicks off with Sprint system and weekly progress reports.' ],
            ];
            foreach ( $process as $i => [ $num, $ptitle, $ptext ] ) : ?>
            <div class="sv-reveal sv-process__step" style="--sv-delay:<?php echo esc_attr( $i * 0.08 ); ?>s">
                <div class="sv-process__num"><?php echo esc_html( $num ); ?></div>
                <h4 class="sv-process__title"><?php echo esc_html( $ptitle ); ?></h4>
                <p class="sv-process__text"><?php echo esc_html( $ptext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- 8. FINAL CTA -->
<section class="sv-cta">
    <canvas class="st-hero-canvas sv-cta__canvas"></canvas>
    <div class="sv-glow-blob" style="width:22rem;height:22rem;background:rgba(156,246,176,0.28);inset-block-start:-6rem;inset-inline-end:-4rem;" aria-hidden="true"></div>
    <div class="container sv-cta__inner">
        <h2 class="sv-reveal sv-cta__title">
            <?php echo $is_rtl
                ? 'Ù‡Ù„ ØªØ¹Ø±Ù Ù†ÙˆØ¹ Ø§Ù„Ø®Ø¯Ù…Ø© <br class="sv-cta__break" /> Ø§Ù„ØªÙŠ ØªØ­ØªØ§Ø¬Ù‡Ø§ØŸ'
                : 'Do You Know What Service <br class="sv-cta__break" /> You Need?'; ?>
        </h2>
        <p class="sv-reveal sv-cta__text">
            <?php echo esc_html( $is_rtl
                ? 'Ø¯Ø¹Ù†Ø§ Ù†Ø³Ø§Ø¹Ø¯Ùƒ ÙÙŠ ØªØ­Ø¯ÙŠØ¯ Ø§Ù„Ù†Ø·Ø§Ù‚ Ø§Ù„ØµØ­ÙŠØ­ ÙˆØªØ­ÙˆÙŠÙ„ ÙÙƒØ±ØªÙƒ Ø£Ùˆ Ø³ÙŠØ± Ø¹Ù…Ù„Ùƒ Ø¥Ù„Ù‰ Ù…Ù†ØªØ¬ Ø±Ù‚Ù…ÙŠ Ù‚Ø§Ø¨Ù„ Ù„Ù„ØªØ´ØºÙŠÙ„ ÙˆØ§Ù„Ù†Ù…Ùˆ.'
                : 'Let us help you define the right scope and turn your idea or workflow into a scalable, launch-ready digital product.' ); ?>
        </p>
        <div class="sv-reveal sv-cta__actions">
            <a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( 'contact' ) : home_url( '/contact/' ) ); ?>" class="sv-btn sv-btn--primary sv-btn--pulse" style="padding: 1.2rem 3rem; font-size: 1.1rem;">
                <?php echo $is_rtl ? 'Ø§Ø­Ø¬Ø² Ø¬Ù„Ø³Ø© Ø§Ø³ØªÙƒØ´Ø§Ù Ù…Ø¬Ø§Ù†ÙŠØ© Ø§Ù„Ø¢Ù†' : 'Book Your Free Discovery Session Now'; ?>
            </a>
        </div>
        <p class="sv-reveal sv-cta__note"><?php echo esc_html( $is_rtl
            ? 'Ø§Ù†Ø¶Ù… Ø¥Ù„Ù‰ Ù‚Ø§Ø¦Ù…Ø© Ø´Ø±ÙƒØ§Ø¦Ù†Ø§ Ø§Ù„ÙŠÙˆÙ… ÙˆØ§Ø­ØµÙ„ Ø¹Ù„Ù‰ Ø§Ø³ØªØ´Ø§Ø±Ø© ØªÙ‚Ù†ÙŠØ© Ù…Ø¬Ø§Ù†ÙŠØ©.'
            : 'Join our partners list today and get a free technical consultation.' ); ?>
        </p>
    </div>
</section>

</main>
</div><!-- /.sv-page -->

<?php get_footer(); ?>