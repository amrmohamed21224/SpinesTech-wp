<?php
/**
 * Backway Case Study — single-st_case_study.php
 *
 * UPDATED: every hotlinked/external screenshot replaced with the real
 * local product screenshots in assets/images/case-studies/backway/.
 * Layout, spacing, and section structure are unchanged — only image
 * sources, alt text, and light animation hooks were added.
 *
 * Image → section mapping (all 8 provided screenshots are used):
 *   Hero (back phone)          → driver-negotiation.webp
 *   Hero (front phone)         → shipper-home-page.webp
 *   The Trip Comes First       → admin-home.webp (cinematic browser frame)
 *   Ecosystem · Customer App   → shipper-Shipment-details-Live-tracking.webp (phone)
 *   Ecosystem · Driver App     → driver-home-page.webp (front phone)
 *                                 + driver-Trips History.webp (back phone)
 *   Ecosystem · Admin Panel    → admin-login.webp (browser frame — genuine
 *                                 web content, kept as a desktop screen
 *                                 rather than forced into a phone shape)
 *   Final CTA                  → driver-settlments.webp (tilted phone)
 */

/* ════════════════════════════════════════════════════════════════
 * ROUTER — runs BEFORE get_header() so no HTML is output yet.
 * Each bespoke case study gets its own fully self-contained template.
 * Add new slugs here whenever a new premium case study is created.
 * ════════════════════════════════════════════════════════════════ */
$_cs_slug = function_exists('st_case_study_current_slug')
    ? st_case_study_current_slug()
    : (string) get_post_field('post_name', get_the_ID());

// Merchant / fashion-marketplace
if ( in_array( $_cs_slug, [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ], true ) ) {
    if ( function_exists( 'st_case_study_apply_seo_hooks' ) ) {
        st_case_study_apply_seo_hooks( 'merchant' );
    }
    include get_template_directory() . '/template-case-study-merchant.php';
    exit;
}

// PropCare 360 / property-management
if ( in_array( $_cs_slug, [ 'propcare', 'propcare-360', 'property-management' ], true ) ) {
    if ( function_exists( 'st_case_study_apply_seo_hooks' ) ) {
        st_case_study_apply_seo_hooks( 'propcare' );
    }
    include get_template_directory() . '/template-case-study-propcare.php';
    exit;
}

// Lahza / event booking
if ( in_array( $_cs_slug, [ 'lahza', 'lahza-events', 'event-booking' ], true ) ) {
    if ( function_exists( 'st_case_study_apply_seo_hooks' ) ) {
        st_case_study_apply_seo_hooks( 'lahza' );
    }
    include get_template_directory() . '/template-case-study-lahza.php';
    exit;
}

// Supply chain ERP — config-driven template
if ( in_array( $_cs_slug, [ 'supply-chain-erp' ], true ) ) {
    include get_template_directory() . '/template-case-study-config.php';
    exit;
}

/* ════════════════════════════════════════════════════════════════
 * DEFAULT TEMPLATE — Backway case study (rendered below).
 * Only reached if the slug did NOT match any route above.
 * ════════════════════════════════════════════════════════════════ */

if ( ! function_exists( 'cs_bw_img' ) ) {
    /**
     * Resolve a Backway case-study image URL, safely encoding spaces
     * in filenames that still contain them (e.g. "driver-Trips History.webp").
     */
    function cs_bw_img( $filename ) {
        $path = 'images/case-studies/backway/' . str_replace( ' ', '%20', $filename );
        return function_exists( 'st_asset' ) ? st_asset( $path ) : get_template_directory_uri() . '/assets/' . $path;
    }
}

$is_rtl = function_exists( 'st_locale' ) ? st_locale() === 'ar' : true;
$dir    = $is_rtl ? 'rtl' : 'ltr';

/* Live product links — Backway */
$bw_website_url     = 'https://backway.ca';
$bw_app_store_url   = 'https://apps.apple.com/eg/app/backway/id6778889588';
$bw_google_play_url = 'https://play.google.com/store/apps/details?id=com.spinestech.backway';

if ( ! function_exists( 'cs_bw_text' ) ) {
    function cs_bw_text( string $en, string $ar ): string {
        $is_rtl = function_exists( 'st_locale' ) ? st_locale() === 'ar' : true;
        return $is_rtl ? $ar : $en;
    }
}

if ( function_exists( 'st_case_study_apply_seo_hooks' ) ) {
    st_case_study_apply_seo_hooks( 'backway' );
}

get_header();
?>

<div class="cs-page" dir="<?php echo esc_attr( $dir ); ?>" lang="<?php echo esc_attr( $is_rtl ? 'ar' : 'en' ); ?>">

    <!-- ═══════════════════════════════════════
         SECTION 1 · HERO
    ═══════════════════════════════════════ -->
    <section class="cs-hero">
        <div class="cs-hero__grid-bg" aria-hidden="true"></div>

        <div class="cs-container cs-hero__inner">

            <div class="cs-hero__content" data-reveal>

                <div class="cs-hero__badge">
                    <span class="material-symbols-outlined cs-hero__badge-icon" aria-hidden="true">verified</span>
                    <?php echo esc_html( cs_bw_text( 'Case Study: Backway', "\u{062F}\u{0631}\u{0627}\u{0633}\u{0629}\u{0020}\u{062D}\u{0627}\u{0644}\u{0629}\u{003A}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0077}\u{0061}\u{0079}" ) ); ?>
                </div>

                <h1 class="cs-hero__title">
                    <?php echo esc_html( cs_bw_text( 'Backway — Trip-Based Logistics Marketplace Platform', "Backway — منصة شحن قائمة على الرحلات لشركة لوجستية ناشئة في كندا" ) ); ?>
                </h1>

                <p class="cs-hero__subtitle">
                    <?php echo esc_html( cs_bw_text( 'A robust, multi-role logistics ecosystem designed to monetize existing intercity vehicle space through a highly governed, trip-first marketplace model.', "\u{0645}\u{0646}\u{0638}\u{0648}\u{0645}\u{0629}\u{0020}\u{0644}\u{0648}\u{062C}\u{0633}\u{062A}\u{064A}\u{0629}\u{0020}\u{0642}\u{0648}\u{064A}\u{0629}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0623}\u{062F}\u{0648}\u{0627}\u{0631}\u{0020}\u{062A}\u{0633}\u{062A}\u{062B}\u{0645}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{062D}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0627}\u{062D}\u{0629}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0646}\u{0020}\u{0639}\u{0628}\u{0631}\u{0020}\u{0646}\u{0645}\u{0648}\u{0630}\u{062C}\u{0020}\u{0633}\u{0648}\u{0642}\u{0020}\u{0645}\u{0646}\u{0638}\u{0645}\u{0020}\u{064A}\u{0628}\u{062F}\u{0623}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0646}\u{0641}\u{0633}\u{0647}\u{0627}\u{002E}" ) ); ?>
                </p>

                <div class="cs-hero__tags">
                    <span class="cs-tag"><?php echo esc_html( cs_bw_text( 'Customer App', "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" ) ); ?></span>
                    <span class="cs-tag"><?php echo esc_html( cs_bw_text( 'Driver App', "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}" ) ); ?></span>
                    <span class="cs-tag"><?php echo esc_html( cs_bw_text( 'Admin Panel', "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" ) ); ?></span>
                    <span class="cs-tag"><?php echo esc_html( cs_bw_text( 'OTP Delivery', "\u{062A}\u{0623}\u{0643}\u{064A}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{0020}\u{004F}\u{0054}\u{0050}" ) ); ?></span>
                    <span class="cs-tag"><?php echo esc_html( cs_bw_text( 'Wallet &amp; Settlements', "\u{0627}\u{0644}\u{0645}\u{062D}\u{0641}\u{0638}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{062A}\u{0633}\u{0648}\u{064A}\u{0627}\u{062A}" ) ); ?></span>
                    <span class="cs-tag"><?php echo esc_html( cs_bw_text( 'Multi-Language', "\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0020}\u{0627}\u{0644}\u{0644}\u{063A}\u{0627}\u{062A}" ) ); ?></span>
                </div>

                <div class="cs-hero__ctas">
                    <a href="#cs-snapshot" class="cs-btn cs-btn--primary"><?php echo esc_html( cs_bw_text( 'Explore Case Study', "\u{0627}\u{0633}\u{062A}\u{0643}\u{0634}\u{0641}\u{0020}\u{062F}\u{0631}\u{0627}\u{0633}\u{0629}\u{0020}\u{0627}\u{0644}\u{062D}\u{0627}\u{0644}\u{0629}" ) ); ?></a>
                    <a href="<?php echo esc_url( $bw_website_url ); ?>" target="_blank" rel="noopener noreferrer" class="cs-btn cs-btn--outline">
                        <span class="material-symbols-outlined" aria-hidden="true">language</span>
                        <?php echo esc_html( cs_bw_text( 'Visit Live Website', "\u{0632}\u{064A}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{0642}\u{0639}\u{0020}\u{0627}\u{0644}\u{062D}\u{064A}" ) ); ?>
                    </a>
                </div>

            </div>

            <div class="cs-hero__visual" data-reveal data-reveal-delay="150">
                <div class="cs-hero__mockups">

                    <div class="cs-hero__phone cs-hero__phone--back">
                        <div class="cs-hero__phone-notch" aria-hidden="true"></div>
                        <img
                            src="<?php echo esc_url( cs_bw_img( 'driver-negotiation.webp' ) ); ?>"
                            alt="<?php echo esc_attr( cs_bw_text( 'Backway driver app price negotiation screen for a shipment request', "\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{062A}\u{0641}\u{0627}\u{0648}\u{0636}\u{0020}\u{0627}\u{0644}\u{0633}\u{0639}\u{0631}\u{0020}\u{0641}\u{064A}\u{0020}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0077}\u{0061}\u{0079}\u{0020}\u{0644}\u{0637}\u{0644}\u{0628}\u{0020}\u{0634}\u{062D}\u{0646}" ) ); ?>"
                            loading="eager"
                            decoding="async"
                        />
                    </div>

                    <div class="cs-hero__phone cs-hero__phone--front">
                        <div class="cs-hero__phone-notch" aria-hidden="true"></div>
                        <img
                            src="<?php echo esc_url( cs_bw_img( 'shipper-home-page.webp' ) ); ?>"
                            alt="<?php echo esc_attr( cs_bw_text( 'Backway customer app home screen showing available trips and quick shipment actions', "\u{0627}\u{0644}\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{0631}\u{0626}\u{064A}\u{0633}\u{064A}\u{0629}\u{0020}\u{0644}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0639}\u{0645}\u{064A}\u{0644}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0077}\u{0061}\u{0079}\u{0020}\u{062A}\u{0639}\u{0631}\u{0636}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0627}\u{062D}\u{0629}\u{0020}\u{0648}\u{0625}\u{062C}\u{0631}\u{0627}\u{0621}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0634}\u{062D}\u{0646}\u{0020}\u{0627}\u{0644}\u{0633}\u{0631}\u{064A}\u{0639}\u{0629}" ) ); ?>"
                            loading="eager"
                            decoding="async"
                        />
                    </div>

                    <div class="cs-hero__glow" aria-hidden="true"></div>
                </div>
            </div>

        </div>
    </section>

    <?php get_template_part( 'template-parts/cs-proof-header' ); ?>

    <!-- -------------------------------------------------------------------- 
         SECTION 2 � PROJECT SNAPSHOT
    --------------------------------------------------------------------  -->
    <section class="cs-snapshot" id="cs-snapshot">
        <div class="cs-container">
            <h2 class="cs-section-title" data-reveal><?php echo esc_html( cs_bw_text( 'Project Snapshot', "\u{0644}\u{0645}\u{062D}\u{0629}\u{0020}\u{0639}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}" ) ); ?></h2>
            <div class="cs-snapshot__grid" data-reveal-group>
                <div class="cs-snapshot__card" data-reveal>
                    <span class="cs-snapshot__label"><?php echo esc_html( cs_bw_text( 'CLIENT', "\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" ) ); ?></span>
                    <p class="cs-snapshot__value"><?php echo esc_html( cs_bw_text( 'Canadian Startup', "\u{0634}\u{0631}\u{0643}\u{0629}\u{0020}\u{0646}\u{0627}\u{0634}\u{0626}\u{0629}\u{0020}\u{0643}\u{0646}\u{062F}\u{064A}\u{0629}" ) ); ?></p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="60">
                    <span class="cs-snapshot__label"><?php echo esc_html( cs_bw_text( 'INDUSTRY', "\u{0627}\u{0644}\u{0642}\u{0637}\u{0627}\u{0639}" ) ); ?></span>
                    <p class="cs-snapshot__value"><?php echo esc_html( cs_bw_text( 'Logistics Tech', "\u{062A}\u{0642}\u{0646}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0644}\u{0648}\u{062C}\u{0633}\u{062A}\u{064A}\u{0627}\u{062A}" ) ); ?></p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="120">
                    <span class="cs-snapshot__label"><?php echo esc_html( cs_bw_text( 'PLATFORMS', "\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0627}\u{062A}" ) ); ?></span>
                    <p class="cs-snapshot__value"><?php echo esc_html( cs_bw_text( 'iOS, Android, Web', "\u{0069}\u{004F}\u{0053}\u{060C}\u{0020}\u{0041}\u{006E}\u{0064}\u{0072}\u{006F}\u{0069}\u{0064}\u{060C}\u{0020}\u{0648}\u{064A}\u{0628}" ) ); ?></p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="180">
                    <span class="cs-snapshot__label"><?php echo esc_html( cs_bw_text( 'MODEL', "\u{0627}\u{0644}\u{0646}\u{0645}\u{0648}\u{0630}\u{062C}" ) ); ?></span>
                    <p class="cs-snapshot__value"><?php echo esc_html( cs_bw_text( 'Trip Marketplace', "\u{0633}\u{0648}\u{0642}\u{0020}\u{0642}\u{0627}\u{0626}\u{0645}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}" ) ); ?></p>
                </div>
                <div class="cs-snapshot__card cs-snapshot__card--accent" data-reveal>
                    <span class="cs-snapshot__label"><?php echo esc_html( cs_bw_text( 'STATUS', "\u{0627}\u{0644}\u{062D}\u{0627}\u{0644}\u{0629}" ) ); ?></span>
                    <p class="cs-snapshot__value"><?php echo esc_html( cs_bw_text( 'Delivered', "\u{062A}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}" ) ); ?></p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="60">
                    <span class="cs-snapshot__label"><?php echo esc_html( cs_bw_text( 'LANGUAGES', "\u{0627}\u{0644}\u{0644}\u{063A}\u{0627}\u{062A}" ) ); ?></span>
                    <p class="cs-snapshot__value"><?php echo esc_html( cs_bw_text( 'EN, AR, FR', "\u{0625}\u{0646}\u{062C}\u{0644}\u{064A}\u{0632}\u{064A}\u{060C}\u{0020}\u{0639}\u{0631}\u{0628}\u{064A}\u{060C}\u{0020}\u{0641}\u{0631}\u{0646}\u{0633}\u{064A}" ) ); ?></p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="120">
                    <span class="cs-snapshot__label"><?php echo esc_html( cs_bw_text( 'CORE ROLE', "\u{0627}\u{0644}\u{0623}\u{062F}\u{0648}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0623}\u{0633}\u{0627}\u{0633}\u{064A}\u{0629}" ) ); ?></span>
                    <p class="cs-snapshot__value"><?php echo esc_html( cs_bw_text( 'Driver / Admin', "\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{002F}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" ) ); ?></p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="180">
                    <span class="cs-snapshot__label"><?php echo esc_html( cs_bw_text( 'GOVERNANCE', "\u{0627}\u{0644}\u{062D}\u{0648}\u{0643}\u{0645}\u{0629}" ) ); ?></span>
                    <p class="cs-snapshot__value"><?php echo esc_html( cs_bw_text( 'OTP Secured', "\u{0645}\u{0624}\u{0645}\u{0646}\u{0020}\u{0628}\u{062A}\u{0623}\u{0643}\u{064A}\u{062F}\u{0020}\u{004F}\u{0054}\u{0050}" ) ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 3 · THE OPPORTUNITY
    ═══════════════════════════════════════ -->
    <section class="cs-opportunity">
        <div class="cs-container cs-opportunity__inner">

            <div class="cs-opportunity__text" data-reveal>
                <h2 class="cs-opportunity__heading">
                    <?php echo esc_html( cs_bw_text( 'Turning Existing Intercity Trips Into Delivery Opportunities', "\u{062A}\u{062D}\u{0648}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0646}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0641}\u{0631}\u{0635}\u{0020}\u{062A}\u{0648}\u{0635}\u{064A}\u{0644}\u{0020}\u{0641}\u{0639}\u{0644}\u{064A}\u{0629}" ) ); ?>
                </h2>
                <p class="cs-opportunity__copy">
                    <?php echo esc_html( cs_bw_text( 'Most intercity travel involves unused vehicle space. Backway creates a secure bridge between travelers (Drivers) and people needing to send items (Customers), creating a sustainable, speed-focused delivery network.', "\u{063A}\u{0627}\u{0644}\u{0628}\u{0627}\u{0020}\u{062A}\u{062D}\u{062A}\u{0648}\u{064A}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0646}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0633}\u{0627}\u{062D}\u{0629}\u{0020}\u{063A}\u{064A}\u{0631}\u{0020}\u{0645}\u{0633}\u{062A}\u{063A}\u{0644}\u{0629}\u{0020}\u{062F}\u{0627}\u{062E}\u{0644}\u{0020}\u{0627}\u{0644}\u{0645}\u{0631}\u{0643}\u{0628}\u{0627}\u{062A}\u{002E}\u{0020}\u{064A}\u{0631}\u{0628}\u{0637}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0077}\u{0061}\u{0079}\u{0020}\u{0628}\u{0634}\u{0643}\u{0644}\u{0020}\u{0622}\u{0645}\u{0646}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{0641}\u{0631}\u{064A}\u{0646}\u{0020}\u{0643}\u{0633}\u{0627}\u{0626}\u{0642}\u{064A}\u{0646}\u{0020}\u{0648}\u{0628}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{0630}\u{064A}\u{0646}\u{0020}\u{064A}\u{062D}\u{062A}\u{0627}\u{062C}\u{0648}\u{0646}\u{0020}\u{0644}\u{0625}\u{0631}\u{0633}\u{0627}\u{0644}\u{0020}\u{0634}\u{062D}\u{0646}\u{0627}\u{062A}\u{060C}\u{0020}\u{0644}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0634}\u{0628}\u{0643}\u{0629}\u{0020}\u{062A}\u{0648}\u{0635}\u{064A}\u{0644}\u{0020}\u{0645}\u{0633}\u{062A}\u{062F}\u{0627}\u{0645}\u{0629}\u{0020}\u{0648}\u{0633}\u{0631}\u{064A}\u{0639}\u{0629}\u{002E}" ) ); ?>
                </p>
            </div>

            <div class="cs-opportunity__flow" data-reveal-group>
                <div class="cs-flow-step" data-reveal>
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined" aria-hidden="true">route</span>
                    </div>
                    <p><?php echo esc_html( cs_bw_text( 'Driver Route', "\u{0645}\u{0633}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}" ) ); ?></p>
                </div>
                <div class="cs-flow-connector" aria-hidden="true"></div>
                <div class="cs-flow-step" data-reveal data-reveal-delay="80">
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined" aria-hidden="true">package_2</span>
                    </div>
                    <p><?php echo esc_html( cs_bw_text( 'Shipment Creation', "\u{0625}\u{0646}\u{0634}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{0634}\u{062D}\u{0646}\u{0629}" ) ); ?></p>
                </div>
                <div class="cs-flow-connector" aria-hidden="true"></div>
                <div class="cs-flow-step" data-reveal data-reveal-delay="160">
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined" aria-hidden="true">handshake</span>
                    </div>
                    <p><?php echo esc_html( cs_bw_text( 'Negotiation', "\u{0627}\u{0644}\u{062A}\u{0641}\u{0627}\u{0648}\u{0636}" ) ); ?></p>
                </div>
                <div class="cs-flow-connector" aria-hidden="true"></div>
                <div class="cs-flow-step" data-reveal data-reveal-delay="240">
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined" aria-hidden="true">payments</span>
                    </div>
                    <p><?php echo esc_html( cs_bw_text( 'Secure Payment', "\u{062F}\u{0641}\u{0639}\u{0020}\u{0622}\u{0645}\u{0646}" ) ); ?></p>
                </div>
                <div class="cs-flow-connector" aria-hidden="true"></div>
                <div class="cs-flow-step" data-reveal data-reveal-delay="320">
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined" aria-hidden="true">key</span>
                    </div>
                    <p><?php echo esc_html( cs_bw_text( 'OTP Delivery', "\u{062A}\u{0623}\u{0643}\u{064A}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}" ) ); ?></p>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 4 · PRODUCT IDEA (PERSPECTIVES)
    ═══════════════════════════════════════ -->
    <section class="cs-perspective">
        <div class="cs-container">
            <div class="cs-perspective__grid" data-reveal-group>

                <!-- Customer -->
                <div class="cs-perspective__card cs-perspective__card--light" data-reveal>
                    <div class="cs-perspective__head">
                        <div class="cs-perspective__icon-wrap">
                            <span class="material-symbols-outlined" aria-hidden="true">person</span>
                        </div>
                        <h3><?php echo esc_html( cs_bw_text( 'Customer Perspective', "\u{0645}\u{0646}\u{0638}\u{0648}\u{0631}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" ) ); ?></h3>
                    </div>
                    <ul class="cs-checklist">
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Search and select routes between cities.', "\u{0627}\u{0644}\u{0628}\u{062D}\u{062B}\u{0020}\u{0648}\u{0627}\u{062E}\u{062A}\u{064A}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{0631}\u{0627}\u{062A}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0646}\u{002E}" ) ); ?>
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Browse available drivers on the selected route.', "\u{0627}\u{0633}\u{062A}\u{0639}\u{0631}\u{0627}\u{0636}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0627}\u{062D}\u{064A}\u{0646}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{062E}\u{062A}\u{0627}\u{0631}\u{002E}" ) ); ?>
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Manual selection of preferred drivers based on rating/price.', "\u{0627}\u{062E}\u{062A}\u{064A}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0020}\u{064A}\u{062F}\u{0648}\u{064A}\u{0627}\u{0020}\u{062D}\u{0633}\u{0628}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{064A}\u{064A}\u{0645}\u{0020}\u{0648}\u{0627}\u{0644}\u{0633}\u{0639}\u{0631}\u{002E}" ) ); ?>
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Negotiate prices directly within the app.', "\u{0627}\u{0644}\u{062A}\u{0641}\u{0627}\u{0648}\u{0636}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0633}\u{0639}\u{0631}\u{0020}\u{0645}\u{0628}\u{0627}\u{0634}\u{0631}\u{0629}\u{0020}\u{062F}\u{0627}\u{062E}\u{0644}\u{0020}\u{0627}\u{0644}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{002E}" ) ); ?>
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Pay through secure wallet-integrated system.', "\u{0627}\u{0644}\u{062F}\u{0641}\u{0639}\u{0020}\u{0645}\u{0646}\u{0020}\u{062E}\u{0644}\u{0627}\u{0644}\u{0020}\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{0622}\u{0645}\u{0646}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0020}\u{0645}\u{0639}\u{0020}\u{0627}\u{0644}\u{0645}\u{062D}\u{0641}\u{0638}\u{0629}\u{002E}" ) ); ?>
                        </li>
                    </ul>
                </div>

                <!-- Driver -->
                <div class="cs-perspective__card cs-perspective__card--dark" data-reveal data-reveal-delay="120">
                    <div class="cs-perspective__head">
                        <div class="cs-perspective__icon-wrap cs-perspective__icon-wrap--dark">
                            <span class="material-symbols-outlined" aria-hidden="true">local_shipping</span>
                        </div>
                        <h3><?php echo esc_html( cs_bw_text( 'Driver Perspective', "\u{0645}\u{0646}\u{0638}\u{0648}\u{0631}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}" ) ); ?></h3>
                    </div>
                    <ul class="cs-checklist cs-checklist--dark">
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Rigorous registration and admin manual approval.', "\u{062A}\u{0633}\u{062C}\u{064A}\u{0644}\u{0020}\u{062F}\u{0642}\u{064A}\u{0642}\u{0020}\u{0648}\u{0645}\u{0648}\u{0627}\u{0641}\u{0642}\u{0629}\u{0020}\u{064A}\u{062F}\u{0648}\u{064A}\u{0629}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{002E}" ) ); ?>
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Create trips by defining source, destination, and path.', "\u{0625}\u{0646}\u{0634}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0639}\u{0628}\u{0631}\u{0020}\u{062A}\u{062D}\u{062F}\u{064A}\u{062F}\u{0020}\u{0646}\u{0642}\u{0637}\u{0629}\u{0020}\u{0627}\u{0644}\u{0627}\u{0646}\u{0637}\u{0644}\u{0627}\u{0642}\u{0020}\u{0648}\u{0627}\u{0644}\u{0648}\u{062C}\u{0647}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{0631}\u{002E}" ) ); ?>
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Automatic visibility for shipments in passing cities.', "\u{0638}\u{0647}\u{0648}\u{0631}\u{0020}\u{062A}\u{0644}\u{0642}\u{0627}\u{0626}\u{064A}\u{0020}\u{0644}\u{0644}\u{0634}\u{062D}\u{0646}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0627}\u{062D}\u{0629}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0646}\u{0020}\u{0627}\u{0644}\u{0648}\u{0627}\u{0642}\u{0639}\u{0629}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{0631}\u{002E}" ) ); ?>
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Manage multiple orders within a single active trip.', "\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0639}\u{062F}\u{0629}\u{0020}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{0020}\u{062F}\u{0627}\u{062E}\u{0644}\u{0020}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0646}\u{0634}\u{0637}\u{0629}\u{0020}\u{0648}\u{0627}\u{062D}\u{062F}\u{0629}\u{002E}" ) ); ?>
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            <?php echo esc_html( cs_bw_text( 'Scheduled settlement upon successful delivery confirmation.', "\u{062A}\u{0633}\u{0648}\u{064A}\u{0629}\u{0020}\u{0645}\u{062C}\u{062F}\u{0648}\u{0644}\u{0629}\u{0020}\u{0628}\u{0639}\u{062F}\u{0020}\u{062A}\u{0623}\u{0643}\u{064A}\u{062F}\u{0020}\u{0646}\u{062C}\u{0627}\u{062D}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{002E}" ) ); ?>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 5 · THE TRIP COMES FIRST
    ═══════════════════════════════════════ -->
    <section class="cs-model" id="cs-model">
        <div class="cs-container">

            <div class="cs-model__head" data-reveal>
                <h2 class="cs-section-title"><?php echo esc_html( cs_bw_text( 'The Trip Comes First', "\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0623}\u{0648}\u{0644}\u{0627}" ) ); ?></h2>
                <p class="cs-model__subtitle">
                    <?php echo esc_html( cs_bw_text( 'A unique model where delivery capability is defined by a traveler\'s intent, not algorithmic dispatch.', "\u{0646}\u{0645}\u{0648}\u{0630}\u{062C}\u{0020}\u{0641}\u{0631}\u{064A}\u{062F}\u{0020}\u{064A}\u{062D}\u{062F}\u{062F}\u{0020}\u{0642}\u{062F}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0648}\u{0635}\u{064A}\u{0644}\u{0020}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0646}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0633}\u{0641}\u{0631}\u{060C}\u{0020}\u{0648}\u{0644}\u{064A}\u{0633}\u{0020}\u{0639}\u{0628}\u{0631}\u{0020}\u{062A}\u{0648}\u{0632}\u{064A}\u{0639}\u{0020}\u{0622}\u{0644}\u{064A}\u{0020}\u{0644}\u{0644}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{002E}" ) ); ?>
                </p>
            </div>

            <div class="cs-model__cards" data-reveal-group>
                <div class="cs-model__card" data-reveal>
                    <span class="cs-model__num">01</span>
                    <h4><?php echo esc_html( cs_bw_text( 'Exclusive Trips', "\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{062D}\u{0635}\u{0631}\u{064A}\u{0629}" ) ); ?></h4>
                    <p><?php echo esc_html( cs_bw_text( 'Only one active trip per driver at any time to ensure focus and delivery reliability.', "\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0646}\u{0634}\u{0637}\u{0629}\u{0020}\u{0648}\u{0627}\u{062D}\u{062F}\u{0629}\u{0020}\u{0641}\u{0642}\u{0637}\u{0020}\u{0644}\u{0643}\u{0644}\u{0020}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{0641}\u{064A}\u{0020}\u{0643}\u{0644}\u{0020}\u{0648}\u{0642}\u{062A}\u{0020}\u{0644}\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{0627}\u{0644}\u{062A}\u{0631}\u{0643}\u{064A}\u{0632}\u{0020}\u{0648}\u{0645}\u{0648}\u{062B}\u{0648}\u{0642}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{002E}" ) ); ?></p>
                </div>
                <div class="cs-model__card" data-reveal data-reveal-delay="100">
                    <span class="cs-model__num">02</span>
                    <h4><?php echo esc_html( cs_bw_text( 'Multi-Order Batching', "\u{062A}\u{062C}\u{0645}\u{064A}\u{0639}\u{0020}\u{0639}\u{062F}\u{0629}\u{0020}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}" ) ); ?></h4>
                    <p><?php echo esc_html( cs_bw_text( 'Drivers can accept multiple orders along their route until vehicle capacity is met.', "\u{064A}\u{0645}\u{0643}\u{0646}\u{0020}\u{0644}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{0642}\u{0628}\u{0648}\u{0644}\u{0020}\u{0639}\u{062F}\u{0629}\u{0020}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0633}\u{0627}\u{0631}\u{0647}\u{0020}\u{062D}\u{062A}\u{0649}\u{0020}\u{0627}\u{0644}\u{0648}\u{0635}\u{0648}\u{0644}\u{0020}\u{0644}\u{0633}\u{0639}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0631}\u{0643}\u{0628}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0627}\u{062D}\u{0629}\u{002E}" ) ); ?></p>
                </div>
                <div class="cs-model__card" data-reveal data-reveal-delay="200">
                    <span class="cs-model__num">03</span>
                    <h4><?php echo esc_html( cs_bw_text( 'Independent Status', "\u{062D}\u{0627}\u{0644}\u{0629}\u{0020}\u{0645}\u{0633}\u{062A}\u{0642}\u{0644}\u{0629}\u{0020}\u{0644}\u{0643}\u{0644}\u{0020}\u{0637}\u{0644}\u{0628}" ) ); ?></h4>
                    <p><?php echo esc_html( cs_bw_text( 'Each order has its own lifecycle; closing an order doesn\'t force a trip to end.', "\u{0644}\u{0643}\u{0644}\u{0020}\u{0637}\u{0644}\u{0628}\u{0020}\u{062F}\u{0648}\u{0631}\u{0629}\u{0020}\u{062D}\u{064A}\u{0627}\u{0629}\u{0020}\u{0645}\u{0633}\u{062A}\u{0642}\u{0644}\u{0629}\u{061B}\u{0020}\u{0625}\u{063A}\u{0644}\u{0627}\u{0642}\u{0020}\u{0637}\u{0644}\u{0628}\u{0020}\u{0644}\u{0627}\u{0020}\u{064A}\u{0639}\u{0646}\u{064A}\u{0020}\u{0625}\u{0646}\u{0647}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0628}\u{0627}\u{0644}\u{0643}\u{0627}\u{0645}\u{0644}\u{002E}" ) ); ?></p>
                </div>
            </div>

            <div class="cs-model__visual" data-reveal>
                <div class="cs-model__visual-chrome" aria-hidden="true">
                    <span class="cs-model__visual-dot cs-model__visual-dot--red"></span>
                    <span class="cs-model__visual-dot cs-model__visual-dot--gold"></span>
                    <span class="cs-model__visual-dot cs-model__visual-dot--green"></span>
                </div>
                <div class="cs-model__visual-frame">
                    <img
                        src="<?php echo esc_url( cs_bw_img( 'admin-home.webp' ) ); ?>"
                        alt="<?php echo esc_attr( cs_bw_text( 'Backway admin dashboard showing platform-wide trip and shipment overview', "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0077}\u{0061}\u{0079}\u{0020}\u{062A}\u{0639}\u{0631}\u{0636}\u{0020}\u{0646}\u{0638}\u{0631}\u{0629}\u{0020}\u{0639}\u{0627}\u{0645}\u{0629}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{0634}\u{062D}\u{0646}\u{0627}\u{062A}\u{0020}\u{0639}\u{0628}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}" ) ); ?>"
                        loading="lazy"
                        decoding="async"
                    />
                    <div class="cs-model__visual-overlay" aria-hidden="true"></div>
                </div>
                <div class="cs-model__visual-caption">
                    <p class="cs-model__visual-title"><?php echo esc_html( cs_bw_text( 'Live Operations Dashboard', "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}\u{0020}\u{0644}\u{062D}\u{0638}\u{064A}\u{0629}" ) ); ?></p>
                    <p class="cs-model__visual-sub"><?php echo esc_html( cs_bw_text( 'Real-time visibility into every trip and shipment across the platform', "\u{0631}\u{0624}\u{064A}\u{0629}\u{0020}\u{0645}\u{0628}\u{0627}\u{0634}\u{0631}\u{0629}\u{0020}\u{0644}\u{0643}\u{0644}\u{0020}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0648}\u{0634}\u{062D}\u{0646}\u{0629}\u{0020}\u{062F}\u{0627}\u{062E}\u{0644}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}" ) ); ?></p>
                </div>
                <div class="cs-model__visual-glow" aria-hidden="true"></div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 6 · THREE PILLARS (ECOSYSTEM)
    ═══════════════════════════════════════ -->
    <section class="cs-ecosystem">
        <div class="cs-container">
            <h2 class="cs-section-title" data-reveal><?php echo esc_html( cs_bw_text( 'Three Pillars of the Ecosystem', "\u{062B}\u{0644}\u{0627}\u{062B}\u{0020}\u{0631}\u{0643}\u{0627}\u{0626}\u{0632}\u{0020}\u{0644}\u{0644}\u{0645}\u{0646}\u{0638}\u{0648}\u{0645}\u{0629}" ) ); ?></h2>
            <div class="cs-ecosystem__grid" data-reveal-group>

                <!-- Customer App — single phone mockup -->
                <div class="cs-ecosystem__card" data-reveal>
                    <div class="cs-ecosystem__media cs-ecosystem__media--phone">
                        <div class="cs-ecosystem__phone">
                            <div class="cs-ecosystem__phone-notch" aria-hidden="true"></div>
                            <img
                                src="<?php echo esc_url( cs_bw_img( 'shipper-Shipment-details-Live-tracking.webp' ) ); ?>"
                                alt="<?php echo esc_attr( cs_bw_text( 'Backway customer app live shipment tracking and delivery details screen', "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0639}\u{0645}\u{064A}\u{0644}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0077}\u{0061}\u{0079}\u{0020}\u{064A}\u{0639}\u{0631}\u{0636}\u{0020}\u{062A}\u{062A}\u{0628}\u{0639}\u{0020}\u{0627}\u{0644}\u{0634}\u{062D}\u{0646}\u{0629}\u{0020}\u{0648}\u{062A}\u{0641}\u{0627}\u{0635}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}" ) ); ?>"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                    </div>
                    <div class="cs-ecosystem__body">
                        <h4><?php echo esc_html( cs_bw_text( 'Customer App', "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" ) ); ?></h4>
                        <ul class="cs-feature-list">
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Trip Search & Filters', "\u{0627}\u{0644}\u{0628}\u{062D}\u{062B}\u{0020}\u{0639}\u{0646}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{062A}\u{0635}\u{0641}\u{064A}\u{0629}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Manual Driver Selection', "\u{0627}\u{062E}\u{062A}\u{064A}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{064A}\u{062F}\u{0648}\u{064A}\u{0627}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Price Negotiation Engine', "\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{0641}\u{0627}\u{0648}\u{0636}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0633}\u{0639}\u{0631}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Secure Wallet Integration', "\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0020}\u{0645}\u{062D}\u{0641}\u{0638}\u{0629}\u{0020}\u{0622}\u{0645}\u{0646}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'OTP Delivery Confirmation', "\u{062A}\u{0623}\u{0643}\u{064A}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{0020}\u{0639}\u{0628}\u{0631}\u{0020}\u{004F}\u{0054}\u{0050}" ) ); ?></li>
                        </ul>
                    </div>
                </div>

                <!-- Driver App — two small overlapping phones (home
                     screen in front, trip history peeking behind),
                     echoing the hero's phone-duo composition -->
                <div class="cs-ecosystem__card" data-reveal data-reveal-delay="120">
                    <div class="cs-ecosystem__media cs-ecosystem__media--duo-phone">
                        <div class="cs-ecosystem__phone cs-ecosystem__phone--back">
                            <div class="cs-ecosystem__phone-notch" aria-hidden="true"></div>
                            <img
                                src="<?php echo esc_url( cs_bw_img( 'driver-Trips History.webp' ) ); ?>"
                                alt="<?php echo esc_attr( cs_bw_text( 'Driver app trip history', 'سجل رحلات تطبيق السائق' ) ); ?>"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                        <div class="cs-ecosystem__phone cs-ecosystem__phone--front">
                            <div class="cs-ecosystem__phone-notch" aria-hidden="true"></div>
                            <img
                                src="<?php echo esc_url( cs_bw_img( 'driver-home-page.webp' ) ); ?>"
                                alt="<?php echo esc_attr( cs_bw_text( 'Driver app home screen', 'الرئيسية لتطبيق السائق' ) ); ?>"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                    </div>
                    <div class="cs-ecosystem__body">
                        <h4><?php echo esc_html( cs_bw_text( 'Driver App', "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}" ) ); ?></h4>
                        <ul class="cs-feature-list">
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Profile & Identity Verification', "\u{0627}\u{0644}\u{0645}\u{0644}\u{0641}\u{0020}\u{0627}\u{0644}\u{0634}\u{062E}\u{0635}\u{064A}\u{0020}\u{0648}\u{062A}\u{0648}\u{062B}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0647}\u{0648}\u{064A}\u{0629}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Trip Creation & Route Mapping', "\u{0625}\u{0646}\u{0634}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0648}\u{0631}\u{0633}\u{0645}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{0631}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Multi-Order Request Handling', "\u{0627}\u{0644}\u{062A}\u{0639}\u{0627}\u{0645}\u{0644}\u{0020}\u{0645}\u{0639}\u{0020}\u{0639}\u{062F}\u{0629}\u{0020}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Status Lifecycle Management', "\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{062F}\u{0648}\u{0631}\u{0629}\u{0020}\u{062D}\u{064A}\u{0627}\u{0629}\u{0020}\u{0627}\u{0644}\u{062D}\u{0627}\u{0644}\u{0629}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Automated Settlement View', "\u{0639}\u{0631}\u{0636}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0648}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0622}\u{0644}\u{064A}\u{0629}" ) ); ?></li>
                        </ul>
                    </div>
                </div>

                <!-- Admin Panel — this is genuinely a desktop/web
                     screen (not a mobile app), so it keeps a browser
                     frame instead of being forced into a phone shape -->
                <div class="cs-ecosystem__card" data-reveal data-reveal-delay="240">
                    <div class="cs-ecosystem__media cs-ecosystem__media--browser">
                        <div class="cs-ecosystem__browser-chrome" aria-hidden="true">
                            <span class="cs-ecosystem__browser-dot cs-ecosystem__browser-dot--red"></span>
                            <span class="cs-ecosystem__browser-dot cs-ecosystem__browser-dot--gold"></span>
                            <span class="cs-ecosystem__browser-dot cs-ecosystem__browser-dot--green"></span>
                        </div>
                        <img
                            src="<?php echo esc_url( cs_bw_img( 'admin-login.webp' ) ); ?>"
                            alt="<?php echo esc_attr( cs_bw_text( 'Admin panel login', 'تسجيل دخول لوحة الإدارة' ) ); ?>"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <div class="cs-ecosystem__body">
                        <h4><?php echo esc_html( cs_bw_text( 'Admin Panel', "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" ) ); ?></h4>
                        <ul class="cs-feature-list">
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Driver Document Verification', "\u{0645}\u{0631}\u{0627}\u{062C}\u{0639}\u{0629}\u{0020}\u{0645}\u{0633}\u{062A}\u{0646}\u{062F}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{064A}\u{0646}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Real-time Order Monitoring', "\u{0645}\u{062A}\u{0627}\u{0628}\u{0639}\u{0629}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{0020}\u{0644}\u{062D}\u{0638}\u{064A}\u{0627}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Financial Settlement Control', "\u{0627}\u{0644}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0648}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0627}\u{0644}\u{064A}\u{0629}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'Global Settings & Master Data', "\u{0627}\u{0644}\u{0625}\u{0639}\u{062F}\u{0627}\u{062F}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0639}\u{0627}\u{0645}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0628}\u{064A}\u{0627}\u{0646}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0631}\u{0626}\u{064A}\u{0633}\u{064A}\u{0629}" ) ); ?></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check</span> <?php echo esc_html( cs_bw_text( 'User Roles & Permission Matrix', "\u{0623}\u{062F}\u{0648}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{062E}\u{062F}\u{0645}\u{064A}\u{0646}\u{0020}\u{0648}\u{0635}\u{0644}\u{0627}\u{062D}\u{064A}\u{0627}\u{062A}\u{0647}\u{0645}" ) ); ?></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 7 · OPERATIONAL DEPTH
    ═══════════════════════════════════════ -->
    <section class="cs-depth">
        <div class="cs-container">
            <h2 class="cs-section-title" data-reveal><?php echo esc_html( cs_bw_text( 'Operational Depth', "\u{0639}\u{0645}\u{0642}\u{0020}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}\u{064A}" ) ); ?></h2>
            <div class="cs-depth__grid" data-reveal-group>
                <div class="cs-depth__card" data-reveal>
                    <span class="material-symbols-outlined cs-depth__icon">ads_click</span>
                    <h5><?php echo esc_html( cs_bw_text( 'Customer Choice', "\u{0627}\u{062E}\u{062A}\u{064A}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" ) ); ?></h5>
                    <p><?php echo esc_html( cs_bw_text( 'Not an algorithm — customers manually vet and select their drivers.', "\u{0644}\u{064A}\u{0633}\u{0020}\u{0627}\u{062E}\u{062A}\u{064A}\u{0627}\u{0631}\u{0627}\u{0020}\u{0622}\u{0644}\u{064A}\u{0627}\u{061B}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}\u{0020}\u{064A}\u{0631}\u{0627}\u{062C}\u{0639}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{064A}\u{0646}\u{0020}\u{0648}\u{064A}\u{062E}\u{062A}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0623}\u{0646}\u{0633}\u{0628}\u{0020}\u{0628}\u{0646}\u{0641}\u{0633}\u{0647}\u{002E}" ) ); ?></p>
                </div>
                <div class="cs-depth__card" data-reveal data-reveal-delay="80">
                    <span class="material-symbols-outlined cs-depth__icon">route</span>
                    <h5><?php echo esc_html( cs_bw_text( 'Trip First', "\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0629}\u{0020}\u{0623}\u{0648}\u{0644}\u{0627}" ) ); ?></h5>
                    <p><?php echo esc_html( cs_bw_text( 'Delivery availability is based on actual planned travel routes.', "\u{0625}\u{062A}\u{0627}\u{062D}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0648}\u{0635}\u{064A}\u{0644}\u{0020}\u{062A}\u{0639}\u{062A}\u{0645}\u{062F}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0633}\u{0627}\u{0631}\u{0627}\u{062A}\u{0020}\u{0633}\u{0641}\u{0631}\u{0020}\u{0645}\u{062E}\u{0637}\u{0637}\u{0629}\u{0020}\u{0641}\u{0639}\u{0644}\u{064A}\u{0627}\u{002E}" ) ); ?></p>
                </div>
                <div class="cs-depth__card" data-reveal data-reveal-delay="160">
                    <span class="material-symbols-outlined cs-depth__icon">account_balance_wallet</span>
                    <h5><?php echo esc_html( cs_bw_text( 'Secure Escrow', "\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{0645}\u{0627}\u{0644}\u{064A}\u{0020}\u{0622}\u{0645}\u{0646}" ) ); ?></h5>
                    <p><?php echo esc_html( cs_bw_text( 'Funds are held securely until OTP confirmation is received.', "\u{064A}\u{062A}\u{0645}\u{0020}\u{062D}\u{0641}\u{0638}\u{0020}\u{0627}\u{0644}\u{0623}\u{0645}\u{0648}\u{0627}\u{0644}\u{0020}\u{0628}\u{0623}\u{0645}\u{0627}\u{0646}\u{0020}\u{062D}\u{062A}\u{0649}\u{0020}\u{0627}\u{0633}\u{062A}\u{0644}\u{0627}\u{0645}\u{0020}\u{062A}\u{0623}\u{0643}\u{064A}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{0020}\u{0639}\u{0628}\u{0631}\u{0020}\u{004F}\u{0054}\u{0050}\u{002E}" ) ); ?></p>
                </div>
                <div class="cs-depth__card" data-reveal data-reveal-delay="240">
                    <span class="material-symbols-outlined cs-depth__icon">gavel</span>
                    <h5><?php echo esc_html( cs_bw_text( 'Admin Governance', "\u{062D}\u{0648}\u{0643}\u{0645}\u{0629}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{064A}\u{0629}" ) ); ?></h5>
                    <p><?php echo esc_html( cs_bw_text( 'Human-in-the-loop for driver vetting and final settlements.', "\u{0645}\u{0631}\u{0627}\u{062C}\u{0639}\u{0629}\u{0020}\u{0628}\u{0634}\u{0631}\u{064A}\u{0629}\u{0020}\u{0644}\u{0627}\u{0639}\u{062A}\u{0645}\u{0627}\u{062F}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{064A}\u{0646}\u{0020}\u{0648}\u{0625}\u{062A}\u{0645}\u{0627}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0648}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0646}\u{0647}\u{0627}\u{0626}\u{064A}\u{0629}\u{002E}" ) ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 8 · BUILT FOR TRUST
    ═══════════════════════════════════════ -->
    <section class="cs-trust">
        <div class="cs-container cs-trust__inner">

            <div class="cs-trust__text" data-reveal>
                <h2 class="cs-trust__heading"><?php echo esc_html( cs_bw_text( 'Built for Trust', "\u{0645}\u{0635}\u{0645}\u{0645}\u{0020}\u{0644}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{062B}\u{0642}\u{0629}" ) ); ?></h2>
                <p class="cs-trust__copy">
                    <?php echo esc_html( cs_bw_text( 'In a person-to-person marketplace, trust is the primary currency. We built multiple safety nets to ensure reliable exchanges.', "\u{0641}\u{064A}\u{0020}\u{0633}\u{0648}\u{0642}\u{0020}\u{064A}\u{0631}\u{0628}\u{0637}\u{0020}\u{0627}\u{0644}\u{0623}\u{0634}\u{062E}\u{0627}\u{0635}\u{0020}\u{0628}\u{0628}\u{0639}\u{0636}\u{0647}\u{0645}\u{060C}\u{0020}\u{0627}\u{0644}\u{062B}\u{0642}\u{0629}\u{0020}\u{0647}\u{064A}\u{0020}\u{0627}\u{0644}\u{0639}\u{0627}\u{0645}\u{0644}\u{0020}\u{0627}\u{0644}\u{0623}\u{0647}\u{0645}\u{002E}\u{0020}\u{0644}\u{0630}\u{0644}\u{0643}\u{0020}\u{0628}\u{0646}\u{064A}\u{0646}\u{0627}\u{0020}\u{0637}\u{0628}\u{0642}\u{0627}\u{062A}\u{0020}\u{0623}\u{0645}\u{0627}\u{0646}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0629}\u{0020}\u{0644}\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0627}\u{062A}\u{0020}\u{062A}\u{0628}\u{0627}\u{062F}\u{0644}\u{0020}\u{0645}\u{0648}\u{062B}\u{0648}\u{0642}\u{0629}\u{002E}" ) ); ?>
                </p>
                <div class="cs-trust__grid">
                    <div class="cs-trust__item">
                        <span class="material-symbols-outlined cs-trust__item-icon">verified_user</span>
                        <div>
                            <h6><?php echo esc_html( cs_bw_text( 'Identity Locked', "\u{0647}\u{0648}\u{064A}\u{0629}\u{0020}\u{0645}\u{0648}\u{062B}\u{0642}\u{0629}" ) ); ?></h6>
                            <p><?php echo esc_html( cs_bw_text( 'Driver ID and Vehicle documents verified by Admin before any trip creation.', "\u{062A}\u{0631}\u{0627}\u{062C}\u{0639}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0647}\u{0648}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{0648}\u{0645}\u{0633}\u{062A}\u{0646}\u{062F}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0631}\u{0643}\u{0628}\u{0629}\u{0020}\u{0642}\u{0628}\u{0644}\u{0020}\u{0627}\u{0644}\u{0633}\u{0645}\u{0627}\u{062D}\u{0020}\u{0628}\u{0625}\u{0646}\u{0634}\u{0627}\u{0621}\u{0020}\u{0623}\u{064A}\u{0020}\u{0631}\u{062D}\u{0644}\u{0629}\u{002E}" ) ); ?></p>
                        </div>
                    </div>
                    <div class="cs-trust__item">
                        <span class="material-symbols-outlined cs-trust__item-icon">key</span>
                        <div>
                            <h6><?php echo esc_html( cs_bw_text( 'OTP Handshake', "\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{0020}\u{0645}\u{0624}\u{0643}\u{062F}\u{0020}\u{0628}\u{0640}\u{0020}\u{004F}\u{0054}\u{0050}" ) ); ?></h6>
                            <p><?php echo esc_html( cs_bw_text( 'Deliveries cannot be closed without a customer-provided OTP at the drop-off point.', "\u{0644}\u{0627}\u{0020}\u{064A}\u{0645}\u{0643}\u{0646}\u{0020}\u{0625}\u{063A}\u{0644}\u{0627}\u{0642}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{0020}\u{062F}\u{0648}\u{0646}\u{0020}\u{0631}\u{0645}\u{0632}\u{0020}\u{004F}\u{0054}\u{0050}\u{0020}\u{064A}\u{0642}\u{062F}\u{0645}\u{0647}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}\u{0020}\u{0639}\u{0646}\u{062F}\u{0020}\u{0646}\u{0642}\u{0637}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{002E}" ) ); ?></p>
                        </div>
                    </div>
                    <div class="cs-trust__item">
                        <span class="material-symbols-outlined cs-trust__item-icon">payments</span>
                        <div>
                            <h6><?php echo esc_html( cs_bw_text( 'Upfront Funding', "\u{062F}\u{0641}\u{0639}\u{0020}\u{0645}\u{0633}\u{0628}\u{0642}\u{0020}\u{0622}\u{0645}\u{0646}" ) ); ?></h6>
                            <p><?php echo esc_html( cs_bw_text( 'Customer pays before shipment starts, ensuring driver compensation intent.', "\u{064A}\u{062F}\u{0641}\u{0639}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}\u{0020}\u{0642}\u{0628}\u{0644}\u{0020}\u{0628}\u{062F}\u{0621}\u{0020}\u{0627}\u{0644}\u{0634}\u{062D}\u{0646}\u{0629}\u{0020}\u{0644}\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{062C}\u{062F}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{064A}\u{0629}\u{0020}\u{0648}\u{062D}\u{0642}\u{0020}\u{0627}\u{0644}\u{0633}\u{0627}\u{0626}\u{0642}\u{002E}" ) ); ?></p>
                        </div>
                    </div>
                    <div class="cs-trust__item">
                        <span class="material-symbols-outlined cs-trust__item-icon">history_edu</span>
                        <div>
                            <h6><?php echo esc_html( cs_bw_text( 'Audit Ready', "\u{0633}\u{062C}\u{0644}\u{0020}\u{0642}\u{0627}\u{0628}\u{0644}\u{0020}\u{0644}\u{0644}\u{0645}\u{0631}\u{0627}\u{062C}\u{0639}\u{0629}" ) ); ?></h6>
                            <p><?php echo esc_html( cs_bw_text( 'Every status change, payment, and negotiation is logged for dispute resolution.', "\u{064A}\u{062A}\u{0645}\u{0020}\u{062A}\u{0633}\u{062C}\u{064A}\u{0644}\u{0020}\u{0643}\u{0644}\u{0020}\u{062A}\u{063A}\u{064A}\u{064A}\u{0631}\u{0020}\u{062D}\u{0627}\u{0644}\u{0629}\u{0020}\u{0648}\u{0643}\u{0644}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0629}\u{0020}\u{062F}\u{0641}\u{0639}\u{0020}\u{0623}\u{0648}\u{0020}\u{062A}\u{0641}\u{0627}\u{0648}\u{0636}\u{0020}\u{0644}\u{062F}\u{0639}\u{0645}\u{0020}\u{062D}\u{0644}\u{0020}\u{0627}\u{0644}\u{0646}\u{0632}\u{0627}\u{0639}\u{0627}\u{062A}\u{002E}" ) ); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cs-trust__visual" aria-hidden="true" data-reveal data-reveal-delay="150">
                <div class="cs-trust__ring">
                    <div class="cs-trust__ring-inner">
                        <span class="material-symbols-outlined" aria-hidden="true">shield_lock</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 9 · EXPERIENCE BACKWAY LIVE
    ═══════════════════════════════════════ -->
    <section class="cs-live">
        <div class="cs-live__glow" aria-hidden="true"></div>
        <div class="cs-container cs-live__inner" data-reveal>
            <h2 class="cs-live__heading"><?php echo esc_html( cs_bw_text( 'Experience Backway Live', "\u{062C}\u{0631}\u{0651}\u{0628}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0077}\u{0061}\u{0079}\u{0020}\u{0645}\u{0628}\u{0627}\u{0634}\u{0631}\u{0629}" ) ); ?></h2>
            <p class="cs-live__copy">
                <?php echo esc_html( cs_bw_text( 'Visit the official website or download the apps to experience the trip-based shipment marketplace firsthand.', "\u{0632}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{0642}\u{0639}\u{0020}\u{0627}\u{0644}\u{0631}\u{0633}\u{0645}\u{064A}\u{0020}\u{0623}\u{0648}\u{0020}\u{062D}\u{0645}\u{0651}\u{0644}\u{0020}\u{0627}\u{0644}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0627}\u{062A}\u{0020}\u{0644}\u{062A}\u{062C}\u{0631}\u{0628}\u{0629}\u{0020}\u{0633}\u{0648}\u{0642}\u{0020}\u{0627}\u{0644}\u{0634}\u{062D}\u{0646}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0626}\u{0645}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0631}\u{062D}\u{0644}\u{0627}\u{062A}\u{0020}\u{0628}\u{0646}\u{0641}\u{0633}\u{0643}\u{002E}" ) ); ?>
            </p>
            <?php
            $website_url     = function_exists( 'get_field' ) ? get_field( 'website_url' ) : get_post_meta( get_the_ID(), 'website_url', true );
            $app_store_url   = function_exists( 'get_field' ) ? get_field( 'app_store_url' ) : get_post_meta( get_the_ID(), 'app_store_url', true );
            $google_play_url = function_exists( 'get_field' ) ? get_field( 'google_play_url' ) : get_post_meta( get_the_ID(), 'google_play_url', true );

            $website_url     = ! empty( $website_url ) ? $website_url : $bw_website_url;
            $app_store_url   = ! empty( $app_store_url ) ? $app_store_url : $bw_app_store_url;
            $google_play_url = ! empty( $google_play_url ) ? $google_play_url : $bw_google_play_url;
            ?>
            <div class="cs-live__ctas">
                <a href="<?php echo esc_url( $website_url ); ?>" target="_blank" rel="noopener noreferrer" class="cs-btn cs-btn--primary cs-live__btn">
                    <span class="material-symbols-outlined" aria-hidden="true">language</span>
                    <?php echo esc_html( cs_bw_text( 'Visit Website', "\u{0632}\u{064A}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{0642}\u{0639}" ) ); ?>
                </a>

                <a href="<?php echo esc_url( $app_store_url ); ?>" target="_blank" rel="noopener noreferrer" class="cs-live__store" aria-label="<?php echo esc_attr( cs_bw_text( 'Download on the App Store', "\u{062A}\u{062D}\u{0645}\u{064A}\u{0644}\u{0020}\u{0645}\u{0646}\u{0020}\u{0041}\u{0070}\u{0070}\u{0020}\u{0053}\u{0074}\u{006F}\u{0072}\u{0065}" ) ); ?>">
                    <svg class="cs-live__store-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M17.6 13.5c0-2.6 2.1-3.8 2.2-3.9-1.2-1.8-3.1-2-3.7-2-1.6-.2-3.1.9-3.9.9-.8 0-2-.9-3.3-.9-1.7 0-3.3 1-4.2 2.5-1.8 3.1-.5 7.7 1.3 10.2.9 1.2 1.9 2.6 3.3 2.6 1.3-.1 1.8-.9 3.4-.9s2 .9 3.4.8c1.4 0 2.3-1.2 3.2-2.5.6-.9.9-1.4 1.4-2.4-3.5-1.3-3.1-4.9-3.1-4.4zM15.2 6c.7-.9 1.2-2.1 1.1-3.3-1.1.1-2.4.7-3.1 1.6-.7.8-1.3 2-1.1 3.2 1.2.1 2.4-.6 3.1-1.5z"/>
                    </svg>
                    <span class="cs-live__store-text">
                        <small><?php echo esc_html( cs_bw_text( 'Download on the', "\u{062A}\u{062D}\u{0645}\u{064A}\u{0644}\u{0020}\u{0645}\u{0646}" ) ); ?></small>
                        App Store
                    </span>
                </a>

                <a href="<?php echo esc_url( $google_play_url ); ?>" target="_blank" rel="noopener noreferrer" class="cs-live__store" aria-label="<?php echo esc_attr( cs_bw_text( 'Get it on Google Play', "\u{0627}\u{062D}\u{0635}\u{0644}\u{0020}\u{0639}\u{0644}\u{064A}\u{0647}\u{0020}\u{0645}\u{0646}\u{0020}\u{0047}\u{006F}\u{006F}\u{0067}\u{006C}\u{0065}\u{0020}\u{0050}\u{006C}\u{0061}\u{0079}" ) ); ?>">
                    <svg class="cs-live__store-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M3.6 2.6c-.3.3-.5.8-.5 1.4v16c0 .6.2 1.1.5 1.4l.1.1L13 12.2v-.2L3.7 2.5l-.1.1z" fill="#4ade80"/>
                        <path d="M16.1 15.3 13 12.2v-.2l3.1-3.1 6.9 4c1 .5 1 1.4 0 1.9l-6.9 4z" fill="#facc15"/>
                        <path d="M16.1 15.3 13 12l-9.4 9.4c.4.4 1 .4 1.7.1l10.8-6.2" fill="#f87171"/>
                        <path d="M16.1 8.7 5.3 2.5c-.7-.4-1.3-.3-1.7.1L13 12l3.1-3.3z" fill="#60a5fa"/>
                    </svg>
                    <span class="cs-live__store-text">
                        <small><?php echo esc_html( cs_bw_text( 'Get it on', "\u{0627}\u{062D}\u{0635}\u{0644}\u{0020}\u{0639}\u{0644}\u{064A}\u{0647}\u{0020}\u{0645}\u{0646}" ) ); ?></small>
                        Google Play
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 10 · TECHNOLOGY STACK
    ═══════════════════════════════════════ -->
    <section class="cs-stack">
        <div class="cs-container">
            <h2 class="cs-section-title" data-reveal><?php echo esc_html( cs_bw_text( 'Technology Stack', "\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{062E}\u{062F}\u{0645}\u{0629}" ) ); ?></h2>
            <div class="cs-stack__grid" data-reveal-group>
                <div class="cs-stack__item" data-reveal>
                    <div class="cs-stack__icon"><span class="material-symbols-outlined" aria-hidden="true">smartphone</span></div>
                    <p><?php echo esc_html( cs_bw_text( 'Mobile', "\u{0627}\u{0644}\u{0645}\u{0648}\u{0628}\u{0627}\u{064A}\u{0644}" ) ); ?></p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="40">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined" aria-hidden="true">api</span></div>
                    <p><?php echo esc_html( cs_bw_text( 'Backend', "\u{0627}\u{0644}\u{062E}\u{0644}\u{0641}\u{064A}\u{0629}" ) ); ?></p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="80">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined" aria-hidden="true">desktop_windows</span></div>
                    <p><?php echo esc_html( cs_bw_text( 'Web App', "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0648}\u{064A}\u{0628}" ) ); ?></p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="120">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined" aria-hidden="true">database</span></div>
                    <p><?php echo esc_html( cs_bw_text( 'Database', "\u{0642}\u{0627}\u{0639}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{064A}\u{0627}\u{0646}\u{0627}\u{062A}" ) ); ?></p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="160">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined" aria-hidden="true">lock</span></div>
                    <p><?php echo esc_html( cs_bw_text( 'Auth', "\u{0627}\u{0644}\u{062A}\u{0648}\u{062B}\u{064A}\u{0642}" ) ); ?></p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="200">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined" aria-hidden="true">credit_card</span></div>
                    <p><?php echo esc_html( cs_bw_text( 'Payments', "\u{0627}\u{0644}\u{0645}\u{062F}\u{0641}\u{0648}\u{0639}\u{0627}\u{062A}" ) ); ?></p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="240">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined" aria-hidden="true">notifications</span></div>
                    <p><?php echo esc_html( cs_bw_text( 'Push', "\u{0627}\u{0644}\u{0625}\u{0634}\u{0639}\u{0627}\u{0631}\u{0627}\u{062A}" ) ); ?></p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="280">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined" aria-hidden="true">cloud</span></div>
                    <p><?php echo esc_html( cs_bw_text( 'Cloud', "\u{0627}\u{0644}\u{0633}\u{062D}\u{0627}\u{0628}\u{0629}" ) ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 11 · FINAL CTA
    ═══════════════════════════════════════ -->
    <section class="cs-final-cta">
        <div class="cs-final-cta__glow" aria-hidden="true"></div>
        <div class="cs-container cs-final-cta__inner" data-reveal>
            <div class="cs-final-cta__text">
                <h2 class="cs-final-cta__heading"><?php echo esc_html( cs_bw_text( 'Building a Logistics Platform or Marketplace?', "\u{062A}\u{062E}\u{0637}\u{0637}\u{0020}\u{0644}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{0644}\u{0648}\u{062C}\u{0633}\u{062A}\u{064A}\u{0629}\u{0020}\u{0623}\u{0648}\u{0020}\u{0633}\u{0648}\u{0642}\u{0020}\u{0631}\u{0642}\u{0645}\u{064A}\u{061F}" ) ); ?></h2>
                <p class="cs-final-cta__copy">
                    <?php echo esc_html( cs_bw_text( 'Leverage our experience in creating high-stakes operational dashboards and multi-role marketplaces.', "\u{0627}\u{0633}\u{062A}\u{0641}\u{062F}\u{0020}\u{0645}\u{0646}\u{0020}\u{062E}\u{0628}\u{0631}\u{062A}\u{0646}\u{0627}\u{0020}\u{0641}\u{064A}\u{0020}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0644}\u{0648}\u{062D}\u{0627}\u{062A}\u{0020}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}\u{0020}\u{062D}\u{0633}\u{0627}\u{0633}\u{0629}\u{0020}\u{0648}\u{0623}\u{0633}\u{0648}\u{0627}\u{0642}\u{0020}\u{0631}\u{0642}\u{0645}\u{064A}\u{0629}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0623}\u{062F}\u{0648}\u{0627}\u{0631}\u{002E}" ) ); ?>
                </p>
                <a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( '/contact/' ) : home_url( '/contact/' ) ); ?>" class="cs-btn cs-btn--primary cs-btn--lg"><?php echo esc_html( cs_bw_text( 'Start Your Project', "\u{0627}\u{0628}\u{062F}\u{0623}\u{0020}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0643}" ) ); ?></a>
            </div>
            <div class="cs-final-cta__visual">
                <div class="cs-final-cta__phone">
                    <div class="cs-final-cta__phone-notch" aria-hidden="true"></div>
                    <img
                        src="<?php echo esc_url( cs_bw_img( 'driver-settlments.webp' ) ); ?>"
                        alt="<?php echo esc_attr( cs_bw_text( 'Backway driver settlements screen showing completed payouts and earnings history', "\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{062A}\u{0633}\u{0648}\u{064A}\u{0627}\u{062A}\u{0020}\u{0633}\u{0627}\u{0626}\u{0642}\u{0020}\u{0042}\u{0061}\u{0063}\u{006B}\u{0077}\u{0061}\u{0079}\u{0020}\u{062A}\u{0639}\u{0631}\u{0636}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0641}\u{0648}\u{0639}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0643}\u{062A}\u{0645}\u{0644}\u{0629}\u{0020}\u{0648}\u{0633}\u{062C}\u{0644}\u{0020}\u{0627}\u{0644}\u{0623}\u{0631}\u{0628}\u{0627}\u{062D}" ) ); ?>"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </div>
        </div>
    </section>

</div><!-- /.cs-page -->

<?php
get_template_part('template-parts/case-study/related-links', null, ['slug' => 'backway']);
get_footer();
?>
