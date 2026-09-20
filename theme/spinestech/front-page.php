<?php
// â”€â”€ SEO â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
add_filter( 'pre_get_document_title', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    return $is_rtl
        ? 'شركة تطوير تطبيقات وأنظمة أعمال في الخليج | SpinesTech'
        : 'Custom Business App & Software Studio | SpinesTech';
}, 999 );

add_action('wp_head', function () {
    $is_rtl = function_exists('st_locale') && st_locale() === 'ar';
    st_seo_set_description($is_rtl
        ? 'استوديو هندسة منتجات يطور تطبيقات الجوال ومنصات الويب والأنظمة التشغيلية للشركات في السعودية والخليج.'
        : 'Product engineering studio building mobile apps, web platforms, and operational software across the GCC.');
}, 3);
// â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€

get_header();
$is_rtl = st_locale() === 'ar';
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';
?>
<main class="home" dir="<?php echo esc_attr( st_dir() ); ?>">

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         1. HERO
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="home-hero">
        <canvas class="st-hero-canvas"></canvas>
        <div class="home-hero__bg">
            <div class="home-hero__grid"></div>
            <div class="home-hero__glow home-hero__glow--1"></div>
            <div class="home-hero__glow home-hero__glow--2"></div>
        </div>

        <div class="container home-hero__inner">
            <div class="home-hero__badge">
                <span class="material-symbols-outlined" aria-hidden="true">verified</span>
                <?php echo esc_html( $is_rtl ? 'Ø´Ø±ÙŠÙƒ ØªÙ‚Ù†ÙŠ Ù„Ø¨Ù†Ø§Ø¡ Ù…Ù†ØªØ¬Ø§Øª Ø±Ù‚Ù…ÙŠØ© Ø¬Ø§Ù‡Ø²Ø© Ù„Ù„ØªØ´ØºÙŠÙ„' : 'Trusted technology partner for operational digital products' ); ?>
            </div>

            <h1 class="home-hero__title">
                <?php echo esc_html( $is_rtl
                    ? 'نطوّر تطبيقات ومنصات أعمال مخصصة للشركات في الخليج'
                    : 'We build custom business apps and digital platforms for GCC companies' ); ?>
            </h1>

            <p class="home-hero__subtitle">
                <?php echo esc_html( $is_rtl
                    ? 'نحوّل العمليات والأفكار إلى منتجات رقمية قابلة للتشغيل والتوسع، تشمل تطبيقات الجوال، منصات الويب، لوحات التحكم والأنظمة التشغيلية.'
                    : 'We turn operations and ideas into digital products built to run and scale — mobile apps, web platforms, dashboards, and operational systems.' ); ?>
            </p>

            <p class="home-hero__quote">
                <?php echo esc_html( $is_rtl
                    ? 'Ù†Ù…Ø²Ø¬ Ø¨ÙŠÙ† Ø§Ù„ØªÙÙƒÙŠØ± Ø§Ù„Ù…Ù†ØªØ¬ØŒ Ø§Ù„Ø¹Ù…Ù‚ Ø§Ù„Ù‡Ù†Ø¯Ø³ÙŠØŒ ÙˆÙÙ‡Ù… Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª Ø§Ù„ØªØ¬Ø§Ø±ÙŠØ© Ù„Ø¨Ù†Ø§Ø¡ Ø­Ù„ÙˆÙ„ ØªØ®Ø¯Ù… Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†ØŒ Ø§Ù„ÙØ±Ù‚ Ø§Ù„ØªØ´ØºÙŠÙ„ÙŠØ©ØŒ ÙˆÙ†Ù…Ùˆ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„.'
                    : 'We blend product thinking, engineering depth, and business process understanding to build solutions that serve users, operations teams, and business growth.' ); ?>
            </p>

            <div class="home-hero__actions">
                <a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( 'contact' ) : home_url( '/contact/' ) ); ?>" class="home-hero__btn home-hero__btn--primary">
                    <?php echo esc_html( $is_rtl ? 'ناقش مشروعك' : 'Discuss your project' ); ?>
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo $arrow; ?></span>
                </a>
                <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="home-hero__btn home-hero__btn--ghost">
                    <?php echo esc_html( $is_rtl ? 'شاهد مشاريعنا' : 'View our projects' ); ?>
                </a>
            </div>

            <div class="home-hero__chips">
                <div class="home-hero__chip">
                    <span class="material-symbols-outlined" aria-hidden="true">smartphone</span>
                    <?php echo esc_html( $is_rtl ? 'ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ø¬ÙˆØ§Ù„' : 'Mobile apps' ); ?>
                </div>
                <div class="home-hero__chip">
                    <span class="material-symbols-outlined" aria-hidden="true">dashboard</span>
                    <?php echo esc_html( $is_rtl ? 'Ù„ÙˆØ­Ø§Øª ØªØ­ÙƒÙ…' : 'Dashboards' ); ?>
                </div>
                <div class="home-hero__chip">
                    <span class="material-symbols-outlined" aria-hidden="true">settings_suggest</span>
                    <?php echo esc_html( $is_rtl ? 'Ù…Ù†ØµØ§Øª ØªØ´ØºÙŠÙ„ÙŠØ©' : 'Operational platforms' ); ?>
                </div>
                <div class="home-hero__chip">
                    <span class="material-symbols-outlined" aria-hidden="true">handshake</span>
                    <?php echo esc_html( $is_rtl ? 'Ø´Ø±Ø§ÙƒØ§Øª ØªÙ†ÙÙŠØ° ØªÙ‚Ù†ÙŠØ©' : 'Tech execution partnerships' ); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/home/sections' ); ?>

    <div class="home-sticky-cta" aria-hidden="false">
        <a href="<?php echo esc_url( st_url( 'contact' ) ); ?>" class="home-sticky-cta__btn">
            <?php echo esc_html( $is_rtl ? 'ناقش مشروعك' : 'Discuss your project' ); ?>
        </a>
    </div>

</main>
<?php get_footer(); ?>