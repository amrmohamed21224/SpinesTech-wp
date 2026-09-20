<?php
/**
 * Template Name: About
 */

// â”€â”€ SEO â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
add_filter( 'pre_get_document_title', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    return $is_rtl
        ? 'عن SpinesTech | استوديو هندسة المنتجات الرقمية'
        : 'About SpinesTech | Digital Product Engineering Studio';
}, 999 );

add_action( 'wp_head', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    if (function_exists('st_seo_set_description')) {
        st_seo_set_description($is_rtl
            ? 'تعرّف على SpinesTech: فريق هندسي يساعد الشركات في الخليج على تحويل الأفكار المعقدة إلى منتجات رقمية قابلة للتوسع.'
            : 'Learn about SpinesTech, a product engineering studio helping companies build mobile apps, web platforms, and operational systems across the GCC.');
    }
}, 3 );
// â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€

get_header();
$is_rtl = st_locale() === 'ar';
?>
<main class="about-page" dir="<?php echo esc_attr( st_dir() ); ?>">

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         1. HERO
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-hero">
        <canvas class="st-hero-canvas"></canvas>
        <div class="ab-hero__grid"></div>
        <div class="ab-hero__glow ab-hero__glow--1"></div>
        <div class="ab-hero__glow ab-hero__glow--2"></div>

        <div class="container ab-hero__inner">
            <div class="ab-hero__badge reveal">
                <span class="ab-hero__badge-dot"></span>
                <span><?php echo esc_html( $is_rtl ? 'Ø§Ù„ØªÙ…ÙŠÙ‘Ø² Ø§Ù„Ù…Ø¤Ø³Ø³ÙŠ' : 'Engineering Excellence' ); ?></span>
            </div>

<style>
    .ab-hero__title {
        line-height: 1.5 !important;
    }
    @media (max-width: 768px) {
        .ab-hero__title {
            line-height: 1.4 !important;
        }
    }
</style>
<h1 class="ab-hero__title reveal" style="--delay:100ms;">
    <?php if ( $is_rtl ) : ?>
        Ù„Ø§ Ù†Ø¨Ù†ÙŠ ØªØ·Ø¨ÙŠÙ‚Ø§Øª ÙØ­Ø³Ø¨â€¦ Ù†Ø¨Ù†ÙŠ <br class="hidden-md"> <span class="ab-hero__title-accent">Ø£Ù†Ø¸Ù…Ø© Ø£Ø¹Ù…Ø§Ù„ Ù‚Ø§Ø¨Ù„Ø© Ù„Ù„ØªØ´ØºÙŠÙ„ ÙˆØ§Ù„Ù†Ù…Ùˆ</span>
    <?php else : ?>
        We don't just build appsâ€¦ we build <br class="hidden-md"> <span class="ab-hero__title-accent">operational business systems built to scale</span>
    <?php endif; ?>
</h1>
            <p class="ab-hero__subtitle reveal" style="--delay:200ms">
                <?php echo esc_html( function_exists('st_entity_description') ? st_entity_description() : ($is_rtl
                    ? 'SpinesTech استوديو هندسة منتجات يساعد الشركات على تحويل الأفكار المعقدة إلى أنظمة رقمية متكاملة.'
                    : 'SpinesTech is a product engineering studio helping companies turn complex ideas into integrated digital systems.') ); ?>
            </p>

            <p class="ab-hero__desc reveal" style="--delay:300ms">
                <?php echo esc_html( $is_rtl
                    ? 'Ù†Ø¨Ø¯Ø£ Ø¨ÙÙ‡Ù… Ù†Ù…ÙˆØ°Ø¬ Ø§Ù„Ø¹Ù…Ù„ØŒ Ø§Ù„Ø£Ø¯ÙˆØ§Ø±ØŒ Ø§Ù„ØµÙ„Ø§Ø­ÙŠØ§ØªØŒ Ø³ÙŠØ± Ø§Ù„Ø¹Ù…Ù„ÙŠØ§ØªØŒ ÙˆÙ‚ÙˆØ§Ø¹Ø¯ Ø§Ù„Ù†Ø¸Ø§Ù… â€” Ø«Ù… Ù†Ø­ÙˆÙ‘Ù„ Ø°Ù„Ùƒ Ø¥Ù„Ù‰ Ù…Ù†ØªØ¬ Ø±Ù‚Ù…ÙŠ Ø¬Ø§Ù‡Ø² Ù„Ù„ØªÙˆØ³Ø¹.'
                    : 'We start by understanding your business model, roles, permissions, workflows, and system rules â€” then we turn that into a scalable digital product.' ); ?>
            </p>

            <div class="ab-hero__actions reveal" style="--delay:400ms">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ab-btn ab-btn--primary">
                    <?php echo esc_html( $is_rtl ? 'Ø§Ø¨Ø¯Ø£ Ù…Ø´Ø±ÙˆØ¹Ùƒ' : 'Start Your Project' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="ab-btn ab-btn--ghost">
                    <?php echo esc_html( $is_rtl ? 'Ø§Ø³ØªØ¹Ø±Ø¶ Ø£Ø¹Ù…Ø§Ù„Ù†Ø§' : 'View Our Work' ); ?>
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo $is_rtl ? 'arrow_back' : 'arrow_forward'; ?></span>
                </a>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         2. ENGINEERING PARTNER
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--white">
        <div class="container">
            <div class="ab-split-header reveal">
                <div class="ab-split-header__main">
                    <div class="ab-eyebrow">
                        <span class="ab-eyebrow__dot"></span>
                        <?php echo esc_html( $is_rtl ? 'Ø§Ù„ØªÙ…ÙŠÙ‘Ø² Ø§Ù„ØªØ´ØºÙŠÙ„ÙŠ' : 'Operational Excellence' ); ?>
                    </div>
                    <h2 class="ab-title">
                        <?php echo $is_rtl
                            ? 'Ø´Ø±ÙŠÙƒ Ù‡Ù†Ø¯Ø³ÙŠ Ù„Ù…Ù†ØªØ¬Ø§Øª<br>Ø±Ù‚Ù…ÙŠØ© ØªØ´ØºÙŠÙ„ÙŠØ©'
                            : 'An engineering partner for<br>operational digital products'; ?>
                    </h2>
                </div>
                <div class="ab-split-header__side">
                    <p><?php echo esc_html( $is_rtl
                        ? 'Ù†ØªØ¹Ø§Ù…Ù„ Ù…Ø¹ ÙƒÙ„ Ù…Ø´Ø±ÙˆØ¹ ÙƒÙ†Ø¸Ø§Ù… Ø£Ø¹Ù…Ø§Ù„ Ù…ØªÙƒØ§Ù…Ù„ØŒ Ù„Ø§ Ù…Ø¬Ø±Ø¯ Ø´Ø§Ø´Ø§Øª Ù…Ù†ÙØµÙ„Ø©. Ø¨Ù†ÙŠØªÙ†Ø§ Ø§Ù„ØªÙ‚Ù†ÙŠØ© Ù…ØµÙ…Ù…Ø© Ù„ØªØªØ­Ù…Ù„ ÙˆØ§Ù‚Ø¹ Ø§Ù„ØªÙˆØ³Ø¹ Ø§Ù„Ø­Ù‚ÙŠÙ‚ÙŠ.'
                        : 'We treat every project as a complete business system, not just separate screens. Our technical architecture is designed to withstand the reality of true scalability.' ); ?>
                    </p>
                </div>
            </div>

            <div class="ab-bento">
                <div class="ab-bento__col ab-bento__col--main">
                    <div class="ab-card ab-card--light reveal">
                        <span class="ab-card__tag"><?php echo esc_html( $is_rtl ? 'Ø¨Ù†ÙŠØ© Ù‚Ø§Ø¨Ù„Ø© Ù„Ù„ØªÙˆØ³Ø¹' : 'Highly Scalable' ); ?></span>
                        <div class="ab-card__icon-circle">
                            <span class="material-symbols-outlined" aria-hidden="true">lightbulb</span>
                        </div>
                        <div class="ab-card__body">
                            <h3><?php echo esc_html( $is_rtl ? 'Ù†ÙÙ‡Ù… Ø§Ù„Ø£Ø¹Ù…Ø§Ù„ Ø£ÙˆÙ„Ø§Ù‹' : 'Business First' ); ?></h3>
                            <p><?php echo esc_html( $is_rtl
                                ? 'Ù†Ø­Ù„Ù„ Ø§Ø­ØªÙŠØ§Ø¬Ø§ØªÙƒ Ø§Ù„ØªØ´ØºÙŠÙ„ÙŠØ© Ù‚Ø¨Ù„ ÙƒØªØ§Ø¨Ø© Ø£ÙŠ Ø³Ø·Ø± ÙƒÙˆØ¯ Ù„Ø¶Ù…Ø§Ù† Ø¬Ø¯ÙˆÙ‰ Ø§Ù„Ù…Ù†ØªØ¬ ÙˆØ§Ø³ØªÙ…Ø±Ø§Ø±ÙŠØªÙ‡ Ø¹Ù„Ù‰ Ø§Ù„Ù…Ø¯Ù‰ Ø§Ù„Ø·ÙˆÙŠÙ„.'
                                : 'We analyze your operational needs before writing a single line of code to ensure product viability and long-term sustainability.' ); ?>
                            </p>
                        </div>
                    </div>

                    <div class="ab-card ab-card--dark reveal" style="--delay:150ms">
                        <div class="ab-card__grid-bg"></div>
                        <span class="ab-card__tag ab-card__tag--dark"><?php echo esc_html( $is_rtl ? 'Ù…Ø³ØªÙˆÙ‰ Ù…Ø¤Ø³Ø³ÙŠ' : 'Enterprise Grade' ); ?></span>
                        <div class="ab-card__icon-circle ab-card__icon-circle--glass">
                            <span class="material-symbols-outlined" aria-hidden="true">hub</span>
                        </div>
                        <div class="ab-card__body">
                            <h3><?php echo esc_html( $is_rtl ? 'Ù†Ø¨Ù†ÙŠ Ø£Ù†Ø¸Ù…Ø©ØŒ Ù„Ø§ Ø´Ø§Ø´Ø§Øª' : 'Systems, Not Screens' ); ?></h3>
                            <p><?php echo esc_html( $is_rtl
                                ? 'Ù†Ø±Ø¨Ø· Ø§Ù„ØªØ·Ø¨ÙŠÙ‚ Ø¨Ù„ÙˆØ­Ø§Øª Ø§Ù„Ø¥Ø¯Ø§Ø±Ø©ØŒ Ø§Ù„Ù…Ø­Ø§Ø³Ø¨Ø©ØŒ ÙˆØ§Ù„Ù…Ø®Ø§Ø²Ù† ÙÙŠ Ù†Ø¸Ø§Ù… ÙˆØ§Ø­Ø¯ Ù…ØªÙ†Ø§ØºÙ… ÙŠØ¹Ù…Ù„ Ù„ØµØ§Ù„Ø­Ùƒ.'
                                : 'We connect your app to admin dashboards, accounting, and inventory in one harmonious system working for you.' ); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="ab-bento__col ab-bento__col--side">
                    <div class="ab-mini-card reveal" style="--delay:100ms">
                        <div class="ab-mini-card__icon">
                            <span class="material-symbols-outlined" aria-hidden="true">trending_up</span>
                        </div>
                        <div>
                            <h3><?php echo esc_html( $is_rtl ? 'ØªØµÙ…ÙŠÙ… Ù„Ù„ØªÙˆØ³Ø¹' : 'Designed to Scale' ); ?></h3>
                            <p><?php echo esc_html( $is_rtl
                                ? 'Ø¨Ù†ÙŠØ© Ù…Ø±Ù†Ø© ØªØ¯Ø¹Ù… Ù†Ù…Ùˆ Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ† ÙˆØ§Ù„Ø¹Ù…Ù„ÙŠØ§Øª Ø¨ÙƒÙØ§Ø¡Ø© ØªØ´ØºÙŠÙ„ÙŠØ© Ø¹Ø§Ù„ÙŠØ©.'
                                : 'Flexible architecture supporting user and operations growth with high operational efficiency.' ); ?>
                            </p>
                        </div>
                    </div>
                    <div class="ab-mini-card reveal" style="--delay:250ms">
                        <div class="ab-mini-card__icon">
                            <span class="material-symbols-outlined" aria-hidden="true">verified</span>
                        </div>
                        <div>
                            <h3><?php echo esc_html( $is_rtl ? 'ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø¶Ø­' : 'Clear Delivery' ); ?></h3>
                            <p><?php echo esc_html( $is_rtl
                                ? 'ØªÙ‚Ø§Ø±ÙŠØ± Ø¯ÙˆØ±ÙŠØ©ØŒ ÙƒÙˆØ¯ Ù†Ø¸ÙŠÙØŒ ÙˆØªÙˆØ«ÙŠÙ‚ ØªÙ‚Ù†ÙŠ Ø´Ø§Ù…Ù„ ÙŠØ¶Ù…Ù† Ù„Ùƒ Ø§Ù„Ù…Ù„ÙƒÙŠØ© Ø§Ù„ÙƒØ§Ù…Ù„Ø©.'
                                : 'Periodic reports, clean code, and full technical documentation guaranteeing complete ownership.' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Methodology -->
    <section class="ab-section ab-section--muted-soft ab-methodology-section">
        <div class="container">
            <div class="ab-header ab-header--center reveal">
                <span class="ab-eyebrow ab-eyebrow--center"><?php echo esc_html($is_rtl ? 'كيف نعمل' : 'How we work'); ?></span>
                <h2 class="ab-title"><?php echo esc_html($is_rtl ? 'منهجية التنفيذ' : 'Our methodology'); ?></h2>
                <p class="ab-subtitle"><?php echo esc_html($is_rtl ? 'مسار واضح من الفهم إلى الإطلاق — بدون قفز مباشرة إلى الكود.' : 'A clear path from understanding to launch — without jumping straight into code.'); ?></p>
            </div>
            <div class="ab-grid ab-grid--methodology">
                <?php
                $methodology = [
                    ['manage_search', $is_rtl ? 'الفهم' : 'Understand', $is_rtl ? 'فهم نموذج العمل، المستخدمين، والقيود التشغيلية.' : 'Understand the business model, users, and operational constraints.'],
                    ['draw', $is_rtl ? 'التصميم' : 'Design', $is_rtl ? 'تصميم التجربة ومسارات الاستخدام قبل التنفيذ.' : 'Design journeys and product experience before build.'],
                    ['hub', $is_rtl ? 'الهندسة' : 'Architect', $is_rtl ? 'هندسة الأدوار، البيانات، والتكاملات بشكل قابل للتوسع.' : 'Architect roles, data, and integrations for scale.'],
                    ['code_blocks', $is_rtl ? 'البناء' : 'Build', $is_rtl ? 'تنفيذ تدريجي بجودة هندسية عالية ومراجعات مستمرة.' : 'Incremental build with engineering quality and ongoing review.'],
                    ['verified', $is_rtl ? 'التحقق' : 'Validate', $is_rtl ? 'اختبار، مراجعة، وتحسين قبل الإطلاق.' : 'Test, review, and refine before launch.'],
                    ['rocket_launch', $is_rtl ? 'الإطلاق' : 'Launch', $is_rtl ? 'إطلاق مدعوم ومتابعة بعد التشغيل.' : 'Supported launch and post-go-live care.'],
                ];
                foreach ($methodology as $i => [$icon, $title, $desc]) : ?>
                    <article class="ab-method-card reveal" style="--delay:<?php echo esc_attr($i * 70); ?>ms">
                        <span class="ab-method-card__step"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
                        <div class="ab-method-card__icon-wrap" aria-hidden="true">
                            <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                        </div>
                        <h3 class="ab-method-card__title"><?php echo esc_html($title); ?></h3>
                        <p class="ab-method-card__desc"><?php echo esc_html($desc); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         3. DIFFERENTIATORS TIMELINE
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--muted ab-timeline-section">
        <div class="ab-timeline-glow ab-timeline-glow--1"></div>
        <div class="ab-timeline-glow ab-timeline-glow--2"></div>
        <div class="container">
            <div class="ab-header reveal">
                <div class="ab-eyebrow ab-eyebrow--center">
                    <span class="ab-eyebrow__dot"></span>
                    <?php echo esc_html( $is_rtl ? 'Ø§Ù„Ù…ÙŠØ²Ø© Ø§Ù„Ø§Ø³ØªØ±Ø§ØªÙŠØ¬ÙŠØ©' : 'Strategic Advantage' ); ?>
                </div>
                <h2 class="ab-title">
                    <?php echo $is_rtl
                        ? 'Ù…Ø§ Ø§Ù„Ø°ÙŠ ÙŠÙ…ÙŠØ²<br>SpinesTechØŸ'
                        : 'What sets<br>SpinesTech apart?'; ?>
                </h2>
                <p class="ab-subtitle">
                    <?php echo esc_html( $is_rtl
                        ? 'Ù†ØªØ¬Ø§ÙˆØ² ÙˆÙƒØ§Ù„Ø§Øª Ø§Ù„ØªØ·ÙˆÙŠØ± Ø§Ù„ØªÙ‚Ù„ÙŠØ¯ÙŠØ©. Ù†Ù‡Ø¬Ù†Ø§ Ù…ØªØ¬Ø°Ø± ÙÙŠ Ù‡Ù†Ø¯Ø³Ø© Ø§Ù„Ù…Ù†ØªØ¬Ø§Øª ÙˆØ§Ù„Ø§Ø³ØªØ±Ø§ØªÙŠØ¬ÙŠØ© Ø§Ù„ØªØ¬Ø§Ø±ÙŠØ©ØŒ Ù…ØµÙ…Ù… Ù„Ù„ØªÙ…ÙŠØ² Ø§Ù„Ù…Ø¤Ø³Ø³ÙŠ.'
                        : 'We go beyond traditional development agencies. Our approach is rooted in product engineering and business strategy, designed for enterprise excellence.' ); ?>
                </p>
            </div>

            <div class="ab-timeline">
                <div class="ab-timeline__spine"><div class="ab-timeline__spine-fill"></div></div>
                <?php
                $steps = [
                    ['01', $is_rtl ? 'Ø§Ù„ØªÙÙƒÙŠØ± Ù…Ù† Ù…Ù†Ø·Ù‚ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„ Ø£ÙˆÙ„Ø§Ù‹'   : 'Business Logic First',          $is_rtl ? 'Ù†Ù†Ø§Ù‚Ø´ Ø§Ù„Ø±Ø¨Ø­ÙŠØ© ÙˆØ§Ù„Ù…Ù†Ø·Ù‚ Ù‚Ø¨Ù„ Ø§Ù„ØªØµÙ…ÙŠÙ… Ù„ØªØ¹Ø¸ÙŠÙ… Ø¹Ø§Ø¦Ø¯ Ø§Ù„Ø§Ø³ØªØ«Ù…Ø§Ø± Ù„ÙƒÙ„ Ù…ÙŠØ²Ø©.' : 'We discuss profitability and logic before design to maximize ROI for every feature.', 'left',  'dark'],
                    ['02', $is_rtl ? 'Ø®Ø¨Ø±Ø© Ø§Ù„Ù…Ù†ØµØ§Øª Ù…ØªØ¹Ø¯Ø¯Ø© Ø§Ù„Ø£Ø¯ÙˆØ§Ø±'     : 'Multi-Role Platform Expertise',  $is_rtl ? 'Ø£Ù†Ø¸Ù…Ø© Ù„Ù„Ø¹Ù…Ù„Ø§Ø¡ ÙˆØ§Ù„Ù…ÙˆØ¸ÙÙŠÙ† ÙˆØ§Ù„Ø¥Ø¯Ø§Ø±Ø© Ù…Ø¹ ØµÙ„Ø§Ø­ÙŠØ§Øª Ø¯Ù‚ÙŠÙ‚Ø© Ù‚Ø§Ø¦Ù…Ø© Ø¹Ù„Ù‰ Ø§Ù„Ø£Ø¯ÙˆØ§Ø±.' : 'Systems for customers, employees, and management with fine-grained role-based permissions.', 'right', 'light'],
                    ['03', $is_rtl ? 'Ù…Ù† Ø§Ù„Ø¬ÙˆØ§Ù„ Ø¥Ù„Ù‰ Ù„ÙˆØ­Ø© Ø§Ù„ØªØ­ÙƒÙ…'       : 'Mobile to Dashboard',            $is_rtl ? 'Ø­Ù„ÙˆÙ„ Ù…ØªÙƒØ§Ù…Ù„Ø© ØªØ¶Ù…Ù† ØªØ¬Ø±Ø¨Ø© Ù…Ø³ØªØ®Ø¯Ù… Ø³Ù„Ø³Ø© Ø¹Ø¨Ø± ÙƒÙ„ Ø§Ù„Ù…Ù†ØµØ§Øª.' : 'Integrated solutions ensuring seamless UX across all platforms.', 'left',  'light'],
                    ['04', $is_rtl ? 'Ø§Ù„Ø£Ù…Ù† ÙˆØ§Ù„ÙˆØ¹ÙŠ Ø¨Ø§Ù„Ù…Ø®Ø§Ø·Ø±'           : 'Security & Risk Awareness',      $is_rtl ? 'ØªØ·Ø¨ÙŠÙ‚ Ù…Ø¹Ø§ÙŠÙŠØ± Ø­Ù…Ø§ÙŠØ© Ø§Ù„Ø¨ÙŠØ§Ù†Ø§Øª ÙˆØ§Ù„Ø®ØµÙˆØµÙŠØ© Ù…Ù† Ø§Ù„Ø·Ø¨Ù‚Ø§Øª Ø§Ù„Ø£Ø³Ø§Ø³ÙŠØ© Ù„Ù„Ø¨Ù†ÙŠØ©.' : 'Applying data protection and privacy standards from the foundational architecture layers.', 'right', 'light'],
                    ['05', $is_rtl ? 'ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø¶Ø­ ÙˆÙ‚Ø§Ø¨Ù„ Ù„Ù„ØªØªØ¨Ø¹'        : 'Clear & Trackable Delivery',     $is_rtl ? 'Ø¥Ø¯Ø§Ø±Ø© Ù…Ø´Ø§Ø±ÙŠØ¹ Ø§Ø­ØªØ±Ø§ÙÙŠØ© ØªØ¨Ù‚ÙŠÙƒ Ø¹Ù„Ù‰ Ø§Ø·Ù„Ø§Ø¹ Ø¨ÙƒÙ„ Ø®Ø·ÙˆØ© ÙÙŠ Ø§Ù„Ù…Ø³Ø§Ø± Ø¨Ø´ÙØ§ÙÙŠØ© ÙƒØ§Ù…Ù„Ø©.' : 'Professional project management keeping you informed at every step with full transparency.', 'left',  'primary'],
                    ['06', $is_rtl ? 'ØªØ¹Ø§ÙˆÙ† Ù…Ø±Ù†'                       : 'Flexible Collaboration',         $is_rtl ? 'Ù†Ø¹Ù…Ù„ ÙƒØ´Ø±ÙŠÙƒ ØªÙ‚Ù†ÙŠ Ø£Ùˆ ÙƒØ°Ø±Ø§Ø¹ ØªÙ†ÙÙŠØ°ÙŠ Ø­Ø³Ø¨ Ø§Ø­ØªÙŠØ§Ø¬Ø§ØªÙƒ Ø§Ù„Ø®Ø§ØµØ© ÙˆÙ‚Ø¯Ø±Ø§ØªÙƒ Ø§Ù„Ø¯Ø§Ø®Ù„ÙŠØ©.' : 'We work as a tech partner or execution arm based on your specific needs and internal capabilities.', 'right', 'light'],
                ];
                foreach ( $steps as $i => [ $num, $title, $desc, $side, $variant ] ) : ?>
                    <div class="ab-timeline__step ab-timeline__step--<?php echo esc_attr( $side ); ?> reveal" style="--delay:<?php echo esc_attr( $i * 80 ); ?>ms">
                        <div class="ab-timeline__text">
                            <h4><?php echo esc_html( $title ); ?></h4>
                            <p><?php echo esc_html( $desc ); ?></p>
                        </div>
                        <div class="ab-timeline__dot ab-timeline__dot--<?php echo esc_attr( $variant ); ?>">
                            <span><?php echo esc_html( $num ); ?></span>
                        </div>
                        <div class="ab-timeline__spacer"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         4. ENGINEERING EXPERTISE
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--dark">
        <div class="ab-section--dark__grid"></div>
        <div class="container">
            <div class="ab-header ab-header--center reveal">
                <h2 class="ab-title ab-title--light"><?php echo esc_html( $is_rtl ? 'Ø®Ø¨Ø±Ø© Ù‡Ù†Ø¯Ø³ÙŠØ© Ø®Ù„Ù ÙƒÙ„ Ø¹Ù…Ù„ÙŠØ©' : 'Engineering Expertise Behind Every Operation' ); ?></h2>
                <p class="ab-subtitle ab-subtitle--light"><?php echo esc_html( $is_rtl ? 'Ù…Ø¨Ù†ÙŠØ© Ø¹Ù„Ù‰ Ø®Ø¨Ø±Ø© Ø¹Ù…Ù„ÙŠØ© ÙÙŠ ØªÙ†ÙÙŠØ° Ù…Ù†ØªØ¬Ø§Øª Ø±Ù‚Ù…ÙŠØ© Ø­Ø³Ø§Ø³Ø© Ø¹Ø¨Ø± Ù‚Ø·Ø§Ø¹Ø§Øª Ù…Ø¹Ù‚Ø¯Ø©.' : 'Built on real-world experience delivering high-stakes digital products across complex sectors.' ); ?></p>
            </div>

            <div class="ab-grid ab-grid--3">
                <?php
                $expertise = [
                    ['precision_manufacturing', $is_rtl ? 'Ø®Ø¨Ø±Ø© ØªØ´ØºÙŠÙ„ÙŠØ©'           : 'Operational Expertise',    $is_rtl ? 'Ø¨Ù†Ø§Ø¡ Ø£Ù†Ø¸Ù…Ø© ØªØ¹Ø§Ù„Ø¬ Ø¢Ù„Ø§Ù Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª ÙŠÙˆÙ…ÙŠØ§Ù‹ Ø¨ÙƒÙØ§Ø¡Ø© Ø­Ø±Ø¬Ø© Ù„Ù„Ù…Ù‡Ø§Ù….'                        : 'Building systems processing thousands of daily operations with mission-critical efficiency.'],
                    ['stack',                   $is_rtl ? 'Ø¥ØªÙ‚Ø§Ù† Ø§Ù„Ù€ Stack Ø§Ù„ØªÙ‚Ù†ÙŠ'  : 'Full-Stack Mastery',       $is_rtl ? 'Ø¥ØªÙ‚Ø§Ù† ØªÙ‚Ù†ÙŠ Ø´Ø§Ù…Ù„ ÙŠØºØ·ÙŠ Ø§Ù„ÙˆØ§Ø¬Ù‡Ø§Øª Ø§Ù„Ø­Ø¯ÙŠØ«Ø© ÙˆØ§Ù„Ø£Ù†Ø¸Ù…Ø© Ø§Ù„Ø®Ù„ÙÙŠØ© Ø§Ù„Ù…ÙˆØ²Ø¹Ø© Ø§Ù„Ù…Ø¹Ù‚Ø¯Ø©.'          : 'Complete technical mastery covering modern frontends and complex distributed backend systems.'],
                    ['encrypted',               $is_rtl ? 'ØªØ±ÙƒÙŠØ² Ø¹Ù„Ù‰ Ø§Ù„Ø£Ù…Ù†'        : 'Security Focus',           $is_rtl ? 'ØªØ´ÙÙŠØ± Ø§Ù„Ø¨ÙŠØ§Ù†Ø§Øª ÙˆØ­Ù…Ø§ÙŠØ© Ø§Ù„Ø«ØºØ±Ø§Øª ÙˆÙÙ‚ Ø£Ø¹Ù„Ù‰ Ø§Ù„Ù…Ø¹Ø§ÙŠÙŠØ± Ø§Ù„Ø¹Ø§Ù„Ù…ÙŠØ© Ù„Ù„ØµÙ†Ø§Ø¹Ø©.'               : 'Data encryption and vulnerability protection according to the highest global industry standards.'],
                    ['cloud_upload',             $is_rtl ? 'Ù†Ø´Ø± Ø³Ù„Ø³'               : 'Seamless Deployment',      $is_rtl ? 'Ø§Ù„ØªØ¹Ø§Ù…Ù„ Ù…Ø¹ Ù…ØªØ·Ù„Ø¨Ø§Øª Ø§Ù„Ø±ÙØ¹ Ø§Ù„ØµØ§Ø±Ù…Ø© ÙˆÙ…Ø¹Ø§ÙŠÙŠØ± Ø§Ù„Ù‚Ø¨ÙˆÙ„ ÙÙŠ Ù…ØªØ§Ø¬Ø± Ø§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ø§Ù„Ø¹Ø§Ù„Ù…ÙŠØ©.'    : 'Handling strict submission requirements and acceptance standards for global app stores.'],
                    ['handshake',               $is_rtl ? 'ØªÙ†ÙÙŠØ° Ø¨Ù‚ÙŠØ§Ø¯Ø© Ø§Ù„Ø´Ø±ÙŠÙƒ'   : 'Partner-Led Execution',    $is_rtl ? 'Ø§Ù„Ø¹Ù…Ù„ Ø¨Ø§Ù†Ø³Ø¬Ø§Ù… Ù…Ø¹ ÙØ±Ù‚ Ø®Ø§Ø±Ø¬ÙŠØ© Ù„Ø¶Ù…Ø§Ù† ÙˆØ­Ø¯Ø© ÙƒØ§Ù…Ù„Ø© ÙÙŠ Ø§Ù„Ø±Ø¤ÙŠØ© ÙˆØ§Ù„ØªÙ…Ø§Ø³Ùƒ Ø§Ù„ØªÙ‚Ù†ÙŠ.'         : 'Working harmoniously with external teams to ensure full vision unity and technical cohesion.'],
                    ['sync_alt',                $is_rtl ? 'Ø³ÙŠØ± Ø¹Ù…Ù„ Ø­Ø¯ÙŠØ«'           : 'Modern Workflow',          $is_rtl ? 'Ø§Ø¹ØªÙ…Ø§Ø¯ Ù…Ù†Ù‡Ø¬ÙŠØ§Øª Agile Ù…Ø­Ø³Ù‘Ù†Ø© ÙˆØ®Ø·ÙˆØ· CI/CD Ù„Ø¶Ù…Ø§Ù† Ø§Ù„Ø³Ø±Ø¹Ø© ÙˆØ¬ÙˆØ¯Ø© Ø§Ù„ÙƒÙˆØ¯.'              : 'Adopting enhanced Agile methodologies and CI/CD pipelines for speed and code quality.'],
                ];
                foreach ( $expertise as $i => [ $icon, $title, $desc ] ) : ?>
                    <div class="ab-glass-card reveal" style="--delay:<?php echo esc_attr( $i * 90 ); ?>ms">
                        <div class="ab-glass-card__icon">
                            <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $icon ); ?></span>
                        </div>
                        <h5><?php echo esc_html( $title ); ?></h5>
                        <p><?php echo esc_html( $desc ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         5. PRODUCT PHILOSOPHY
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--white">
        <div class="container">
            <div class="ab-header ab-header--center reveal">
                <h2 class="ab-title"><?php echo esc_html( $is_rtl ? 'ÙÙ„Ø³ÙØªÙ†Ø§ ÙÙŠ Ø§Ù„Ù…Ù†ØªØ¬Ø§Øª' : 'Our Product Philosophy' ); ?></h2>
                <div class="ab-divider"></div>
            </div>

            <div class="ab-philosophy">
                <?php
                $philosophy = [
                    ['01', $is_rtl ? 'Ù„Ø§ Ù†Ø¨Ø¯Ø£ Ø¨Ø§Ù„ÙƒÙˆØ¯'         : 'We Don\'t Start With Code',         $is_rtl ? 'Ù†Ø¨Ø¯Ø£ Ø¨Ø±Ø³Ù… Ù…Ù†Ø·Ù‚ Ø§Ù„Ø¹Ù…Ù„ ÙˆØ±Ø­Ù„Ø© Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù… Ø§Ù„ÙƒØ§Ù…Ù„Ø© Ù‚Ø¨Ù„ ÙƒØªØ§Ø¨Ø© Ø£ÙˆÙ„ Ø³Ø·Ø± ÙƒÙˆØ¯. ÙÙ‡Ù… "Ù„Ù…Ø§Ø°Ø§" Ù‡Ùˆ Ø´Ø±Ø·Ù†Ø§ Ø§Ù„Ø£Ø³Ø§Ø³ÙŠ.'         : 'We start by mapping business logic and the full user journey before writing a single line of code. Understanding "why" is our prerequisite.'],
                    ['02', $is_rtl ? 'Ù„Ø§ Ù†Ø¨Ù†ÙŠ ÙˆØ§Ø¬Ù‡Ø§Øª ÙØ­Ø³Ø¨'    : 'We Don\'t Just Build Interfaces',   $is_rtl ? 'Ø§Ù„Ø¬Ù…Ø§Ù„ Ù…Ù‡Ù…ØŒ Ù„ÙƒÙ† Ø§Ù„ÙˆØ¸ÙŠÙØ© ÙˆØ§Ù„ÙƒÙØ§Ø¡Ø© ÙˆØ§Ù„Ø£Ù…Ø§Ù† Ø£Ø³Ø³ Ù„Ø§ Ù†Ø³Ø§ÙˆÙ… Ø¹Ù„ÙŠÙ‡Ø§ Ø£Ø¨Ø¯Ø§Ù‹. Ø§Ù„Ø´Ø§Ø´Ø© Ø§Ù„Ø¬Ù…ÙŠÙ„Ø© Ø¹Ø¯ÙŠÙ…Ø© Ø§Ù„ÙØ§Ø¦Ø¯Ø© Ø¥Ø°Ø§ ÙØ´Ù„ Ø§Ù„Ù†Ø¸Ø§Ù… Ø®Ù„ÙÙ‡Ø§.' : 'Beauty matters, but function, efficiency, and security are non-negotiable foundations. A beautiful screen is useless if the system behind it fails.'],
                    ['03', $is_rtl ? 'Ù„Ø§ Ù†Ø¨Ø§Ù„Øº ÙÙŠ Ø§Ù„ÙˆØ¹ÙˆØ¯'     : 'We Don\'t Over-Promise',            $is_rtl ? 'Ù†ØªØ­Ø¯Ø« Ø¨Ø´ÙØ§ÙÙŠØ© Ø¹Ù…Ù‘Ø§ ÙŠÙ…ÙƒÙ† ØªØ­Ù‚ÙŠÙ‚Ù‡ ØªÙ‚Ù†ÙŠØ§Ù‹ ÙˆØ§Ù„Ø¬Ø¯Ø§ÙˆÙ„ Ø§Ù„Ø²Ù…Ù†ÙŠØ© Ø§Ù„ÙˆØ§Ù‚Ø¹ÙŠØ© Ø¯ÙˆÙ† Ù…Ø¨Ø§Ù„ØºØ©. Ø§Ù„Ù†Ø²Ø§Ù‡Ø© Ù‡ÙŠ Ø¬ÙˆÙ‡Ø± Ø«Ù‚Ø§ÙØªÙ†Ø§.'  : 'We speak transparently about what can be achieved technically and realistic timelines without exaggeration. Integrity is at the core of our culture.'],
                    ['04', $is_rtl ? 'Ù†Ø¨Ù†ÙŠ Ù„Ù„ØªÙˆØ³Ø¹'             : 'We Build to Scale',                 $is_rtl ? 'Ù†ØªÙˆÙ‚Ø¹ Ù†Ø¬Ø§Ø­ÙƒØŒ ÙˆÙ†ØµÙ…Ù… Ø§Ù„Ù†Ø¸Ø§Ù… Ù„Ø§Ø³ØªÙŠØ¹Ø§Ø¨ Ù†Ù…Ùˆ Ø¶Ø®Ù… ÙÙŠ Ø§Ù„Ø­Ø¬Ù… Ù…Ù†Ø° Ø§Ù„ÙŠÙˆÙ… Ø§Ù„Ø£ÙˆÙ„. Ø¨Ù†ÙŠØªÙ†Ø§ ØªÙ†Ù…Ùˆ Ù…Ø¹ Ù†Ù…Ùˆ Ø£Ø¹Ù…Ø§Ù„Ùƒ.'   : 'We anticipate your success and design the system to handle massive growth from day one. Our architecture grows as your business grows.'],
                ];
                foreach ( $philosophy as $i => [ $num, $title, $desc ] ) : ?>
                    <div class="ab-phil-item reveal" style="--delay:<?php echo esc_attr( $i * 100 ); ?>ms">
                        <div class="ab-phil-item__num"><?php echo esc_html( $num ); ?></div>
                        <div class="ab-phil-item__body">
                            <h4><?php echo esc_html( $title ); ?></h4>
                            <p><?php echo esc_html( $desc ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         6. SECTOR EXPERIENCE
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--muted-soft">
        <div class="container">
            <div class="ab-split-header reveal">
                <div class="ab-split-header__main">
                    <h2 class="ab-title"><?php echo esc_html( $is_rtl ? 'ØªØ¬Ø±Ø¨Ø© Ø¹Ø¨Ø± Ù…Ø®ØªÙ„Ù Ø§Ù„Ù‚Ø·Ø§Ø¹Ø§Øª' : 'Experience Across Sectors' ); ?></h2>
                    <p class="ab-subtitle"><?php echo esc_html( $is_rtl ? 'Ø­Ù„ÙˆÙ„ ØªÙ‚Ù†ÙŠØ© Ù…ØªØ®ØµØµØ© ÙˆÙÙ‡Ù… Ø¹Ù…ÙŠÙ‚ Ù„Ù„ØªØ­Ø¯ÙŠØ§Øª Ø§Ù„ÙØ±ÙŠØ¯Ø© ÙÙŠ ØµÙ†Ø§Ø¹Ø§Øª Ø³Ø±ÙŠØ¹Ø© Ø§Ù„Ù†Ù…Ùˆ.' : 'Specialized tech solutions and deep understanding of unique challenges in fast-growing industries.' ); ?></p>
                </div>
            </div>

            <div class="ab-sector-grid">
                <?php
                $sectors = $is_rtl
                    ? ['Ø§Ù„Ù„ÙˆØ¬Ø³ØªÙŠØ§Øª ÙˆØ§Ù„ØªÙˆØµÙŠÙ„', 'Ø­ÙÙ„Ø§Øª Ø§Ù„Ø£Ø¹Ø±Ø§Ø³ ÙˆØ§Ù„ÙØ¹Ø§Ù„ÙŠØ§Øª', 'Ø§Ù„Ø®Ø¯Ù…Ø§Øª Ø§Ù„Ø¹Ù‚Ø§Ø±ÙŠØ© ÙˆØ§Ù„ØµÙŠØ§Ù†Ø©', 'Ø§Ù„Ø£Ø³ÙˆØ§Ù‚ Ø§Ù„Ø±Ù‚Ù…ÙŠØ©', 'Ø§Ù„ØªØ¬Ø§Ø±Ø© Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©', 'Ø§Ù„ØªØ¹Ù„ÙŠÙ… ÙˆØ§Ù„ØªØ¯Ø±ÙŠØ¨', 'Ù…Ù†ØµØ§Øª Ø§Ù„Ø®Ø¯Ù…Ø§Øª', 'Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª Ø§Ù„ØªØ¬Ø§Ø±ÙŠØ©']
                    : ['Logistics & Delivery', 'Weddings & Events', 'Real Estate & Maintenance', 'Digital Marketplaces', 'E-Commerce', 'Education & Training', 'Service Platforms', 'Business Operations'];
                foreach ( $sectors as $i => $sector ) : ?>
                    <div class="ab-sector-pill reveal" style="--delay:<?php echo esc_attr( $i * 60 ); ?>ms"><?php echo esc_html( $sector ); ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         7. TECHNICAL PARTNERSHIPS
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--dark">
        <div class="ab-section--dark__grid"></div>
        <div class="ab-timeline-glow ab-timeline-glow--1"></div>
        <div class="ab-timeline-glow ab-timeline-glow--2"></div>
        <div class="container">
            <div class="ab-header ab-header--center reveal">
                <div class="ab-eyebrow ab-eyebrow--center ab-eyebrow--outline"><?php echo esc_html( $is_rtl ? 'ØªØ­Ø§Ù„ÙØ§Øª Ø§Ø³ØªØ±Ø§ØªÙŠØ¬ÙŠØ©' : 'Strategic Alliances' ); ?></div>
                <h2 class="ab-title ab-title--light"><?php echo esc_html( $is_rtl ? 'Ø´Ø±Ø§ÙƒØ§Øª ÙˆØªØ¹Ø§ÙˆÙ†Ø§Øª ØªÙ‚Ù†ÙŠØ©' : 'Tech Partnerships & Collaborations' ); ?></h2>
                <p class="ab-subtitle ab-subtitle--light"><?php echo esc_html( $is_rtl
                    ? 'Ù†ÙˆÙØ± Ù†Ù…Ø§Ø°Ø¬ ØªØ¹Ø§ÙˆÙ† Ø§Ø­ØªØ±Ø§ÙÙŠØ© Ù„ÙˆÙƒØ§Ù„Ø§Øª Ø§Ù„ØªØµÙ…ÙŠÙ… ÙˆØ´Ø±ÙƒØ§Øª Ø§Ù„Ø¨Ø±Ù…Ø¬ÙŠØ§Øª Ù„Ø¥ØªÙ…Ø§Ù… Ù…Ø´Ø§Ø±ÙŠØ¹Ù‡Ø§ Ø¨Ø£Ø¹Ù„Ù‰ Ø¬ÙˆØ¯Ø© Ù‡Ù†Ø¯Ø³ÙŠØ©.'
                    : 'We offer professional collaboration models for design agencies and software companies to complete their projects with the highest engineering quality.' ); ?></p>
            </div>

            <div class="ab-grid ab-grid--3">
                <?php
                $partnerships = [
                    ['smartphone',        $is_rtl ? 'ØªÙ†ÙÙŠØ° ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ø§Ù„Ø¬ÙˆØ§Ù„'    : 'Mobile App Execution',           $is_rtl ? 'Ø§Ù„ØªØ¹Ø§Ù…Ù„ Ù…Ø¹ Ø§Ù„Ø¬Ø§Ù†Ø¨ Ø§Ù„ØªÙ‚Ù†ÙŠ Ù„Ø´Ø±ÙƒØ§Øª Ø§Ù„ØªÙ‚Ù†ÙŠØ© Ù…Ø¹ Ø§Ù„Ø§Ù„ØªØ²Ø§Ù… Ø§Ù„ØµØ§Ø±Ù… Ø¨Ù‡ÙˆÙŠØ© Ø§Ù„Ø¹Ù„Ø§Ù…Ø© ÙˆØ§Ù„Ù…ØªØ·Ù„Ø¨Ø§Øª.' : 'Handling the technical side for tech companies while strictly adhering to brand identity and requirements.'],
                    ['extension',         $is_rtl ? 'ØªØ·ÙˆÙŠØ± ÙˆØ­Ø¯Ø§Øª Ø§Ù„Ù…Ù†ØªØ¬'      : 'Product Module Development',     $is_rtl ? 'Ø¨Ù†Ø§Ø¡ Ù…ÙŠØ²Ø§Øª Ø¬Ø¯ÙŠØ¯Ø© Ø£Ùˆ ØªØ­Ø³ÙŠÙ† ÙˆØ­Ø¯Ø§Øª ØªÙ‚Ù†ÙŠØ© Ù…ØªØ®ØµØµØ© Ø¯Ø§Ø®Ù„ Ø£Ù†Ø¸Ù…ØªÙƒ Ø§Ù„Ø­Ø§Ù„ÙŠØ©.'                    : 'Building new features or improving specialized technical modules within your existing systems.'],
                    ['branding_watermark',$is_rtl ? 'ØªØ·Ø¨ÙŠÙ‚ White-label'       : 'White-Label Platforms',          $is_rtl ? 'Ù…Ù†ØµØ§Øª Ù…Ø®ØµØµØ© ØªÙØ³Ù„Ù‘Ù… Ù„Ùƒ Ù„ØªÙƒÙˆÙ† Ø¬Ø²Ø¡Ø§Ù‹ Ù…Ù† Ø®Ø¯Ù…Ø§ØªÙƒ ØªØ­Øª Ø¹Ù„Ø§Ù…ØªÙƒ Ø§Ù„ØªØ¬Ø§Ø±ÙŠØ©.'                    : 'Custom platforms delivered to you to be part of your services under your brand.'],
                    ['handshake',         $is_rtl ? 'ØªÙ†ÙÙŠØ° Ù…Ø´ØªØ±Ùƒ'             : 'Co-Execution',                   $is_rtl ? 'Ø§Ù„Ø¹Ù…Ù„ ÙƒÙØ±ÙŠÙ‚ Ù…ÙˆØ­Ø¯ Ø¹Ù„Ù‰ Ù…Ø´Ø§Ø±ÙŠØ¹ Ø¶Ø®Ù…Ø© ØªØªØ·Ù„Ø¨ ØªÙˆØ²ÙŠØ¹ Ø§Ù„Ø¬Ù‡ÙˆØ¯ ÙˆØ®Ø¨Ø±Ø© Ø¹Ù…ÙŠÙ‚Ø©.'                      : 'Working as a unified team on large projects requiring distributed efforts and deep expertise.'],
                    ['support_agent',     $is_rtl ? 'Ø¯Ø¹Ù… ÙØ±ÙŠÙ‚ Ø§Ù„ØªØ·ÙˆÙŠØ±'        : 'Dev Team Augmentation',          $is_rtl ? 'ØªÙˆÙÙŠØ± Ù…Ù‡Ù†Ø¯Ø³ÙŠÙ† Ù…ØªØ®ØµØµÙŠÙ† Ù„Ø³Ø¯ ÙØ¬ÙˆØ§Øª Ø§Ù„Ù…Ù‡Ø§Ø±Ø§Øª ÙÙŠ ÙØ±ÙŠÙ‚Ùƒ Ù„ÙØªØ±Ø§Øª Ø£Ùˆ Ù…Ø±Ø§Ø­Ù„ Ù…Ø­Ø¯Ø¯Ø©.'              : 'Providing specialized engineers to bridge skill gaps in your team for specific periods or phases.'],
                    ['history_edu',       $is_rtl ? 'ØªØ­Ø³ÙŠÙ† Ø§Ù„Ù…Ù†ØªØ¬Ø§Øª Ø§Ù„Ø­Ø§Ù„ÙŠØ©'  : 'Existing Product Enhancement',  $is_rtl ? 'Ù…Ø±Ø§Ø¬Ø¹Ø© Ø§Ù„ÙƒÙˆØ¯ Ø§Ù„Ø­Ø§Ù„ÙŠØŒ Ø¥ØµÙ„Ø§Ø­ Ø§Ù„Ø£Ø®Ø·Ø§Ø¡ØŒ ÙˆØ²ÙŠØ§Ø¯Ø© ÙƒÙØ§Ø¡Ø© Ø§Ù„Ø£Ù†Ø¸Ù…Ø© Ø§Ù„Ù‚Ø¯ÙŠÙ…Ø© Ø§Ù„Ù…ØªØ¹Ø«Ø±Ø©.'             : 'Reviewing existing code, fixing bugs, and increasing the efficiency of struggling legacy systems.'],
                ];
                foreach ( $partnerships as $i => [ $icon, $title, $desc ] ) : ?>
                    <div class="ab-glass-card reveal" style="--delay:<?php echo esc_attr( $i * 90 ); ?>ms">
                        <div class="ab-glass-card__icon">
                            <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $icon ); ?></span>
                        </div>
                        <h5><?php echo esc_html( $title ); ?></h5>
                        <p><?php echo esc_html( $desc ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="ab-center-btn reveal">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ab-btn ab-btn--primary ab-btn--lg">
                    <?php echo esc_html( $is_rtl ? 'Ù†Ø§Ù‚Ø´ Ø´Ø±Ø§ÙƒØ©' : 'Discuss a Partnership' ); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
         TEAM / EXPERTISE
    ══════════════════════════════════════════ -->
    <section class="ab-section ab-section--muted ab-expertise-section">
        <div class="container">
            <div class="ab-header ab-header--center reveal">
                <span class="ab-eyebrow ab-eyebrow--center"><?php echo esc_html($is_rtl ? 'التخصصات' : 'Specializations'); ?></span>
                <h2 class="ab-title"><?php echo esc_html($is_rtl ? 'خبرات الفريق' : 'Team expertise'); ?></h2>
                <p class="ab-subtitle"><?php echo esc_html($is_rtl
                    ? 'فريق هندسي متعدد التخصصات يغطي دورة المنتج كاملة — بدون ادعاءات غير موثقة.'
                    : 'A multi-disciplinary engineering team covering the full product lifecycle — without unverified claims.'); ?></p>
            </div>
            <div class="ab-expertise-grid">
                <?php
                $expertise = [
                    ['code_blocks', $is_rtl ? 'هندسة المنتج' : 'Product engineering', $is_rtl ? 'تحليل المتطلبات، تصميم التدفقات، وبناء الحلول القابلة للتشغيل.' : 'Requirements analysis, flow design, and building solutions that run in production.'],
                    ['smartphone', $is_rtl ? 'تطبيقات الجوال' : 'Mobile apps', $is_rtl ? 'iOS، Android، وFlutter للمنتجات متعددة الأدوار.' : 'iOS, Android, and Flutter for multi-role products.'],
                    ['monitoring', $is_rtl ? 'لوحات التحكم' : 'Dashboards', $is_rtl ? 'تقارير، صلاحيات، وسير عمل للفرق التشغيلية.' : 'Reporting, permissions, and workflows for operations teams.'],
                    ['hub', $is_rtl ? 'أنظمة الأعمال' : 'Business systems', $is_rtl ? 'ERP مخصص، سلاسل إمداد، ومنصات تشغيلية متكاملة.' : 'Custom ERP, supply chain, and integrated operational platforms.'],
                    ['shield_lock', $is_rtl ? 'الجودة والأمان' : 'Quality & security', $is_rtl ? 'اختبار، مراجعة كود، واعتبارات الامتثال حسب نطاق المشروع.' : 'Testing, code review, and compliance considerations per project scope.'],
                ];
                foreach ($expertise as $i => [$icon, $title, $desc]) : ?>
                    <article class="ab-expertise-card reveal" style="--delay:<?php echo esc_attr(120 + ($i * 70)); ?>ms">
                        <div class="ab-expertise-card__icon-wrap" aria-hidden="true">
                            <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                        </div>
                        <h3 class="ab-expertise-card__title"><?php echo esc_html($title); ?></h3>
                        <p class="ab-expertise-card__desc"><?php echo esc_html($desc); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         8. STRATEGIC PARTNERSHIPS (LOGOS)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--white ab-logos-section">
        <div class="container">
            <h2 class="ab-logos__label reveal"><?php echo esc_html( $is_rtl ? 'Ù…Ù†Ø¸ÙˆÙ…Ø© ØªÙ‚Ù†ÙŠØ§Øª Ù†Ø³ØªØ®Ø¯Ù…Ù‡Ø§' : 'Technologies & Platforms We Use' ); ?></h2>

            <div class="ab-logos__grid reveal" style="--delay:100ms">
                <?php
                $companies = [
                    ['Microsoft', 'https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg'],
                    ['Google',    'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg'],
                    ['Amazon',    'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'],
                    ['AWS',       'https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg'],
                    ['Azure',     'https://upload.wikimedia.org/wikipedia/commons/f/fa/Microsoft_Azure.svg'],
                    ['Apple',     'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg'],
                    ['IBM',       'https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg'],
                    ['Oracle',    'https://upload.wikimedia.org/wikipedia/commons/5/50/Oracle_logo.svg'],
                ];
                foreach ( $companies as $i => [ $name, $src ] ) : ?>
                    <div class="ab-logos__item" style="--delay:<?php echo esc_attr( $i * 60 ); ?>ms">
                        <img src="<?php echo esc_url( $src ); ?>" alt="<?php echo esc_attr( $name ); ?>" width="120" height="40" loading="lazy" decoding="async">
                    </div>
                <?php endforeach; ?>
            </div>

            <p class="ab-logos__disclaimer reveal" style="--delay:200ms">
                <?php echo esc_html( $is_rtl
                    ? 'ØªØ®ØªÙ„Ù Ø·Ø¨ÙŠØ¹Ø© Ø§Ù„ØªØ¹Ø§ÙˆÙ†Ø› ÙÙ‚Ø¯ Ø¹Ù…Ù„Ù†Ø§ ÙƒØ´Ø±ÙŠÙƒ ØªÙ‚Ù†ÙŠ Ø¨Ø¹Ù„Ø§Ù…Ø© Ø¨ÙŠØ¶Ø§Ø¡ (White-label) Ù„ÙˆÙƒØ§Ù„Ø§ØªØŒ Ø£Ùˆ ÙƒÙ…Ø·ÙˆØ±ÙŠÙ† Ù„ÙˆØ­Ø¯Ø§Øª Ù…ØªØ®ØµØµØ©ØŒ Ø£Ùˆ ÙƒÙ…Ø³ØªØ´Ø§Ø±ÙŠÙ† Ù‡Ù†Ø¯Ø³ÙŠÙŠÙ† Ù„ÙØ±Ù‚ Ù†Ø§Ù…ÙŠØ©.'
                    : 'The nature of collaboration varies; we have worked as a white-label tech partner for agencies, as developers for specialized modules, or as engineering consultants for growing teams.' ); ?>
            </p>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         9. TRANSPARENCY
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--white">
        <div class="container">
            <div class="ab-transparency-card reveal">
                <div class="ab-transparency-card__icon">
                    <span class="material-symbols-outlined" aria-hidden="true">verified_user</span>
                </div>
                <div class="ab-transparency-card__body">
                    <h2><?php echo esc_html( $is_rtl ? 'Ø§Ù„Ø´ÙØ§ÙÙŠØ© ÙÙŠ Ø§Ù„Ø¹Ù…Ù„ ÙˆØ§Ù„Ø£Ø¯ÙˆØ§Ø±' : 'Transparency in Work & Roles' ); ?></h2>
                    <p><?php echo esc_html( $is_rtl
                        ? 'ÙÙŠ SpinesTechØŒ Ù†Ø¤Ù…Ù† Ø¨Ø§Ù„ÙˆØ¶ÙˆØ­ Ø§Ù„Ù…Ù‡Ù†ÙŠ. Ø¨Ø¹Ø¶ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„ Ø§Ù„ØªÙŠ Ù†ÙØ°Ù†Ø§Ù‡Ø§ ÙƒØ§Ù†Øª ÙƒØ´Ø±ÙŠÙƒ ØªÙ‚Ù†ÙŠ Ø®ÙÙŠ (White-label) Ù„ÙˆÙƒØ§Ù„Ø§Øª Ø£Ø®Ø±Ù‰ØŒ Ø¨ÙŠÙ†Ù…Ø§ Ù…Ø´Ø§Ø±ÙŠØ¹ Ø£Ø®Ø±Ù‰ ÙƒØ§Ù†Øª Ù…Ø¨Ø§Ø´Ø±Ø© Ù„Ø¹Ù…Ù„Ø§Ø¦Ù†Ø§. Ù†Ù„ØªØ²Ù… Ø¯Ø§Ø¦Ù…Ø§Ù‹ Ø¨Ø§ØªÙØ§Ù‚ÙŠØ§Øª Ø¹Ø¯Ù… Ø§Ù„Ø¥ÙØµØ§Ø­ (NDA) ÙˆÙ†ÙØ®Ø± Ø¨Ø¯ÙˆØ±Ù†Ø§ ÙÙŠ Ù†Ø¬Ø§Ø­ ÙƒÙ„ Ù…Ø´Ø±ÙˆØ¹ Ø¨ØºØ¶ Ø§Ù„Ù†Ø¸Ø± Ø¹Ù† Ø¸Ù‡ÙˆØ± ÙˆØ§Ø¬Ù‡ØªÙ†Ø§.'
                        : 'At SpinesTech, we believe in professional clarity. Some work was executed as a hidden white-label tech partner for other agencies, while other projects were directly for our clients. We always comply with NDAs and take pride in our role in every project\'s success regardless of our visibility.' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         10. GULF MARKET FIT
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-section ab-section--muted-soft">
        <div class="container">
            <h2 class="ab-title ab-title--center reveal">
                <?php echo esc_html( $is_rtl ? 'Ù…ØµÙ…Ù… Ù„ÙÙ‡Ù… Ø§Ø­ØªÙŠØ§Ø¬Ø§Øª Ø³ÙˆÙ‚ Ø§Ù„Ø®Ù„ÙŠØ¬' : 'Designed for the GCC Market' ); ?>
            </h2>

            <div class="ab-grid ab-grid--5">
                <?php
                $gulf = [
                    ['language',            $is_rtl ? 'Ø¹Ø±Ø¨ÙŠ Ø£ÙˆÙ„Ø§Ù‹ / RTL'           : 'Arabic First / RTL',          $is_rtl ? 'Ø¯Ø¹Ù… ÙƒØ§Ù…Ù„ Ù„ØªØ¬Ø§Ø±Ø¨ Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù… Ø§Ù„Ø¹Ø±Ø¨ÙŠØ© Ùˆ RTL Ù…Ù† Ù…Ø³ØªÙˆÙ‰ Ø§Ù„ÙƒÙˆØ¯.'                              : 'Full support for Arabic user experiences and RTL from the code level.'],
                    ['account_tree',        $is_rtl ? 'Ø§Ù„ØªØ±ÙƒÙŠØ² Ø¹Ù„Ù‰ Ø³ÙŠØ± Ø§Ù„Ø¹Ù…Ù„'       : 'Workflow Focused',             $is_rtl ? 'ØªØµÙ…ÙŠÙ… Ø£Ù†Ø¸Ù…Ø© ØªÙ†Ø§Ø³Ø¨ Ø³ÙŠØ± Ø§Ù„Ø¹Ù…Ù„ Ø§Ù„ØªØ¬Ø§Ø±ÙŠ Ø§Ù„Ø¥Ù‚Ù„ÙŠÙ…ÙŠ ÙˆØ§Ù„ØªÙˆÙ‚Ø¹Ø§Øª Ø§Ù„Ø«Ù‚Ø§ÙÙŠØ©.'                    : 'Designing systems suited to regional business workflows and cultural expectations.'],
                    ['admin_panel_settings',$is_rtl ? 'ØªØ­ÙƒÙ… Ø¥Ø¯Ø§Ø±ÙŠ'                 : 'Admin Control',               $is_rtl ? 'Ù„ÙˆØ­Ø§Øª ØªØ­ÙƒÙ… Ù‚ÙˆÙŠØ© ØªÙ…Ù†Ø­Ùƒ Ø³ÙŠØ·Ø±Ø© ÙƒØ§Ù…Ù„Ø© Ø¹Ù„Ù‰ Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª Ø§Ù„Ù…Ø­Ù„ÙŠØ© Ø§Ù„Ù…Ø¹Ù‚Ø¯Ø©.'                      : 'Powerful dashboards giving you full control over complex local operations.'],
                    ['rocket_launch',       $is_rtl ? 'ØªØ³Ù„ÙŠÙ… Ù‚Ø§Ø¨Ù„ Ù„Ù„ØªÙˆØ³Ø¹'          : 'Scalable Delivery',           $is_rtl ? 'Ù…ÙˆØ§ÙƒØ¨Ø© Ø§Ù„Ø·ÙØ±Ø© Ø§Ù„Ø±Ù‚Ù…ÙŠØ© ÙˆØ§Ù„Ù†Ù…Ùˆ Ø§Ù„Ø³Ø±ÙŠØ¹ ÙÙŠ Ù…Ù†Ø·Ù‚Ø© Ø§Ù„Ø®Ù„ÙŠØ¬.'                                 : 'Keeping pace with the digital boom and rapid growth in the Gulf region.'],
                    ['handshake',           $is_rtl ? 'ØµØ¯ÙŠÙ‚ Ù„Ù„Ø´Ø±ÙƒØ§Ø¡'               : 'Partner Friendly',            $is_rtl ? 'Ø¨Ù†Ø§Ø¡ Ø¹Ù„Ø§Ù‚Ø§Øª Ø¥Ù‚Ù„ÙŠÙ…ÙŠØ© Ø·ÙˆÙŠÙ„Ø© Ø§Ù„Ø£Ù…Ø¯ Ù‚Ø§Ø¦Ù…Ø© Ø¹Ù„Ù‰ Ø§Ù„Ø«Ù‚Ø© ÙˆØ§Ù„Ø§Ø­ØªØ±Ø§ÙÙŠØ©.'                         : 'Building long-term regional relationships based on trust and professionalism.'],
                ];
                foreach ( $gulf as $i => [ $icon, $title, $desc ] ) : ?>
                    <div class="ab-gulf-card reveal" style="--delay:<?php echo esc_attr( $i * 90 ); ?>ms">
                        <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $icon ); ?></span>
                        <h6><?php echo esc_html( $title ); ?></h6>
                        <p><?php echo esc_html( $desc ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         11. FINAL CTA
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="ab-cta">
        <div class="ab-cta__grid"></div>
        <div class="ab-cta__glow"></div>
        <div class="container ab-cta__inner reveal">
            <h2>
                <?php echo $is_rtl
                    ? 'ØªØ¨Ø­Ø« Ø¹Ù† Ø´Ø±ÙŠÙƒ ÙŠØ¨Ù†ÙŠ Ø§Ù„Ù…Ù†ØªØ¬Ø§Øª<br>ÙƒØ£Ù†Ø¸Ù…Ø© Ø£Ø¹Ù…Ø§Ù„ Ù‚Ø§Ø¨Ù„Ø© Ù„Ù„ØªÙˆØ³Ø¹ØŸ'
                    : 'Looking for a partner who builds products<br>as scalable business systems?'; ?>
            </h2>
            <p>
                <?php echo esc_html( $is_rtl
                    ? 'Ø¯Ø¹Ù†Ø§ Ù†Ù†Ø§Ù‚Ø´ ÙƒÙŠÙ ÙŠÙ…ÙƒÙ†Ù†Ø§ ØªØ­ÙˆÙŠÙ„ Ø±Ø¤ÙŠØªÙƒ Ø¥Ù„Ù‰ Ù…Ù†ØªØ¬ Ø±Ù‚Ù…ÙŠ Ù…ØªÙŠÙ† ÙˆÙ‚Ø§Ø¨Ù„ Ù„Ù„ØªÙˆØ³Ø¹ ÙŠØªØµØ¯Ù‘Ø± Ø§Ù„Ø³ÙˆÙ‚.'
                    : 'Let us discuss how we can transform your vision into a robust, scalable digital product that leads the market.' ); ?>
            </p>
            <div class="ab-cta__actions">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ab-btn ab-btn--primary ab-btn--lg">
                    <?php echo esc_html( $is_rtl ? 'Ø§Ø¨Ø¯Ø£ Ù…Ø´Ø±ÙˆØ¹Ùƒ' : 'Start Your Project' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="ab-btn ab-btn--outline-light ab-btn--lg">
                    <?php echo esc_html( $is_rtl ? 'ØªØµÙØ­ Ø¯Ø±Ø§Ø³Ø§Øª Ø§Ù„Ø­Ø§Ù„Ø©' : 'Browse Case Studies' ); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<script>
(function () {
    var els = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window)) {
        els.forEach(function (el) { el.classList.add('reveal--visible'); });
        return;
    }
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal--visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
    els.forEach(function (el) { observer.observe(el); });
})();
</script>

<?php get_footer(); ?>
