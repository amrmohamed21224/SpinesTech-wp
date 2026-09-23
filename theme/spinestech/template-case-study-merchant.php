<?php
/**
 * Template Name: Case Study â€” Merchant
 * Template Post Type: st_case_study
 *
 * theme/spinestech/template-case-study-merchant.php
 *
 * Fully static, hardcoded one-off case study page for the "Merchant"
 * project. Assign this template to the specific st_case_study post
 * from Page Attributes â†’ Template in the WP editor.
 *
 * No dynamic postmeta, no ACF â€” every section is literal content
 * matching the approved design 1:1. Uses the theme's real header/
 * footer (get_header/get_footer); everything between them is unique
 * to this page only.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$is_rtl = function_exists('st_locale') ? st_locale() === 'ar' : false;
$dir    = $is_rtl ? 'rtl' : 'ltr';
?>

<div class="mcs" dir="<?php echo esc_attr( $dir ); ?>">

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         SIDE DOCK NAV (desktop only, in-page anchors)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <aside class="mcs__dock" aria-label="<?php echo esc_attr( $is_rtl ? "\u{0627}\u{0644}\u{062A}\u{0646}\u{0642}\u{0644}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0623}\u{0642}\u{0633}\u{0627}\u{0645}" : 'Section navigation' ); ?>">
        <span class="mcs__dock-label"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0646}\u{0642}\u{0644}" : 'Nav' ); ?></span>
        <a href="#overview" class="mcs__dock-link is-active" data-mcs-dock title="<?php echo esc_attr( $is_rtl ? "\u{0646}\u{0638}\u{0631}\u{0629}\u{0020}\u{0639}\u{0627}\u{0645}\u{0629}" : 'Overview' ); ?>">
            <span class="material-symbols-outlined" aria-hidden="true">segment</span>
        </a>
        <a href="#challenge" class="mcs__dock-link" data-mcs-dock title="<?php echo esc_attr( $is_rtl ? "\u{0627}\u{0644}\u{062A}\u{062D}\u{062F}\u{064A}" : 'Challenge' ); ?>">
            <span class="material-symbols-outlined" aria-hidden="true">error_outline</span>
        </a>
        <a href="#solution" class="mcs__dock-link" data-mcs-dock title="<?php echo esc_attr( $is_rtl ? "\u{0627}\u{0644}\u{062D}\u{0644}" : 'Solution' ); ?>">
            <span class="material-symbols-outlined" aria-hidden="true">lightbulb</span>
        </a>
        <a href="#results" class="mcs__dock-link" data-mcs-dock title="<?php echo esc_attr( $is_rtl ? "\u{0627}\u{0644}\u{0646}\u{062A}\u{0627}\u{0626}\u{062C}" : 'Results' ); ?>">
            <span class="material-symbols-outlined" aria-hidden="true">trending_up</span>
        </a>
    </aside>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         01 Â· HERO
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__hero" id="hero">
        <div class="mcs__hero-grid-bg" aria-hidden="true"></div>
        <div class="mcs__container mcs__hero-inner">

            <div class="mcs__hero-content" data-mcs-reveal>
                <span class="mcs__badge"><?php echo esc_html( $is_rtl ? "\u{062D}\u{0644}\u{0020}\u{062C}\u{0627}\u{0647}\u{0632}" : 'Ready-Made Solution' ); ?></span>
                <h1 class="mcs__hero-title">Merchant</h1>
                <h3 class="mcs__hero-subtitle"><?php echo esc_html( $is_rtl ? "\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{062A}\u{062C}\u{0627}\u{0631}\u{0629}\u{0020}\u{0625}\u{0644}\u{0643}\u{062A}\u{0631}\u{0648}\u{0646}\u{064A}\u{0629}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0626}\u{0639}\u{064A}\u{0646}\u{0020}\u{0644}\u{0644}\u{0623}\u{0632}\u{064A}\u{0627}\u{0621}" : 'Multi-Vendor Fashion E-Commerce Platform' ); ?></h3>
                <p class="mcs__hero-copy">
                    <?php echo esc_html( $is_rtl
                        ? "\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0020}\u{0645}\u{0646}\u{0020}\u{0637}\u{0631}\u{0641}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0637}\u{0631}\u{0641}\u{0020}\u{064A}\u{0636}\u{0645}\u{0020}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0627}\u{064B}\u{0020}\u{0623}\u{0646}\u{064A}\u{0642}\u{0627}\u{064B}\u{0020}\u{0644}\u{0644}\u{0639}\u{0645}\u{0644}\u{0627}\u{0621}\u{060C}\u{0020}\u{0648}\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0642}\u{0648}\u{064A}\u{0629}\u{0020}\u{0644}\u{0639}\u{0645}\u{0644}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{060C}\u{0020}\u{0648}\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{064A}\u{0629}\u{0020}\u{0645}\u{0631}\u{0643}\u{0632}\u{064A}\u{0629}\u{0020}\u{0644}\u{0644}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0627}\u{0644}\u{0643}\u{0627}\u{0645}\u{0644}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0633}\u{0648}\u{0642}\u{002E}"
                        : 'A robust, end-to-end digital ecosystem featuring a sleek customer application, a powerful merchant operations dashboard, and a centralized administrative panel for total marketplace control.'
                    ); ?>
                </p>

                <div class="mcs__hero-stats">
                    <div class="mcs__hero-stat">
                        <p class="mcs__hero-stat-label"><?php echo esc_html( $is_rtl ? "\u{0646}\u{0648}\u{0639}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}" : 'Project Type' ); ?></p>
                        <p class="mcs__hero-stat-value"><?php echo esc_html( $is_rtl ? "\u{062A}\u{062C}\u{0627}\u{0631}\u{0629}\u{0020}\u{0625}\u{0644}\u{0643}\u{062A}\u{0631}\u{0648}\u{0646}\u{064A}\u{0629}" : 'E-Commerce' ); ?></p>
                    </div>
                    <div class="mcs__hero-stat">
                        <p class="mcs__hero-stat-label"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0642}\u{0637}\u{0627}\u{0639}" : 'Industry' ); ?></p>
                        <p class="mcs__hero-stat-value"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0623}\u{0632}\u{064A}\u{0627}\u{0621}" : 'Fashion' ); ?></p>
                    </div>
                    <div class="mcs__hero-stat">
                        <p class="mcs__hero-stat-label"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}" : 'Platform' ); ?></p>
                        <p class="mcs__hero-stat-value"><?php echo esc_html( $is_rtl ? "\u{0648}\u{064A}\u{0628}\u{0020}\u{002B}\u{0020}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}" : 'Web + App' ); ?></p>
                    </div>
                    <div class="mcs__hero-stat">
                        <p class="mcs__hero-stat-label"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{062D}\u{0627}\u{0644}\u{0629}" : 'Status' ); ?></p>
                        <p class="mcs__hero-stat-value"><?php echo esc_html( $is_rtl ? "\u{0645}\u{062D}\u{0641}\u{0638}\u{0629}\u{0020}\u{0646}\u{0634}\u{0637}\u{0629}" : 'Live Portfolio' ); ?></p>
                    </div>
                </div>
            </div>

            <div class="mcs__hero-visual" data-mcs-reveal data-mcs-delay="150">
                <div class="mcs__phone mcs__phone--left">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Welcome.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0631}\u{062D}\u{064A}\u{0628}\u{0020}\u{0641}\u{064A}\u{0020}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{004D}\u{0065}\u{0072}\u{0063}\u{0068}\u{0061}\u{006E}\u{0074}" : 'Merchant app welcome screen' ); ?>" loading="eager" fetchpriority="high" decoding="async" width="195" height="415" />
                </div>
                <div class="mcs__phone mcs__phone--center">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Item+Details.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{062A}\u{0641}\u{0627}\u{0635}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0641}\u{064A}\u{0020}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{004D}\u{0065}\u{0072}\u{0063}\u{0068}\u{0061}\u{006E}\u{0074}" : 'Merchant product detail screen' ); ?>" loading="eager" fetchpriority="high" decoding="async" width="195" height="415" />
                </div>
                <div class="mcs__phone mcs__phone--right">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Wishlist.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0642}\u{0627}\u{0626}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{0623}\u{0645}\u{0646}\u{064A}\u{0627}\u{062A}\u{0020}\u{0641}\u{064A}\u{0020}\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{004D}\u{0065}\u{0072}\u{0063}\u{0068}\u{0061}\u{006E}\u{0074}" : 'Merchant wishlist screen' ); ?>" loading="eager" fetchpriority="low" decoding="async" width="195" height="415" />
                </div>
            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         02 Â· THE DIGITAL ECOSYSTEM (overview)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__overview" id="overview">
        <div class="mcs__container mcs__overview-grid">

            <div data-mcs-reveal>
                <h3 class="mcs__h2"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{0627}\u{0644}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}" : 'The Digital Ecosystem' ); ?></h3>
                <p class="mcs__p">
                    <?php echo esc_html( $is_rtl
                        ? "\u{0635}\u{064F}\u{0645}\u{0651}\u{0645}\u{0020}\u{004D}\u{0065}\u{0072}\u{0063}\u{0068}\u{0061}\u{006E}\u{0074}\u{0020}\u{0644}\u{064A}\u{0643}\u{0648}\u{0646}\u{0020}\u{0623}\u{0643}\u{062B}\u{0631}\u{0020}\u{0645}\u{0646}\u{0020}\u{0645}\u{062C}\u{0631}\u{062F}\u{0020}\u{0648}\u{0627}\u{062C}\u{0647}\u{0629}\u{0020}\u{0645}\u{062A}\u{062C}\u{0631}\u{002E}\u{0020}\u{0625}\u{0646}\u{0647}\u{0020}\u{0628}\u{0646}\u{064A}\u{0629}\u{0020}\u{062A}\u{062D}\u{062A}\u{064A}\u{0629}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0626}\u{0639}\u{064A}\u{0646}\u{0020}\u{062A}\u{0631}\u{0628}\u{0637}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0639}\u{0644}\u{0627}\u{0645}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0623}\u{0632}\u{064A}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{062E}\u{0635}\u{0635}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{0647}\u{0644}\u{0643}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{0639}\u{0627}\u{0635}\u{0631}\u{064A}\u{0646}\u{002E}\u{0020}\u{0628}\u{0646}\u{064A}\u{0646}\u{0627}\u{0020}\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{062A}\u{062F}\u{064A}\u{0631}\u{0020}\u{062A}\u{0639}\u{0642}\u{064A}\u{062F}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062E}\u{0632}\u{0648}\u{0646}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0626}\u{0639}\u{064A}\u{0646}\u{060C}\u{0020}\u{0648}\u{0625}\u{0639}\u{062F}\u{0627}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{060C}\u{0020}\u{0648}\u{0627}\u{0644}\u{0625}\u{0634}\u{0631}\u{0627}\u{0641}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{064A}\u{0020}\u{0636}\u{0645}\u{0646}\u{0020}\u{062A}\u{062C}\u{0631}\u{0628}\u{0629}\u{0020}\u{0633}\u{0644}\u{0633}\u{0629}\u{0020}\u{0639}\u{0627}\u{0644}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{062B}\u{0648}\u{0642}\u{064A}\u{0629}\u{002E}"
                        : "Merchant was conceived as more than just a storefront. It's a cohesive multi-vendor infrastructure designed to bridge the gap between boutique fashion brands and modern consumers. We built a platform that manages the complexity of multi-vendor inventory, merchant onboarding, and administrative supervision into a seamless, high-integrity experience."
                    ); ?>
                </p>
                <p class="mcs__p">
                    <?php echo esc_html( $is_rtl
                        ? "\u{0645}\u{0646}\u{0020}\u{062E}\u{0644}\u{0627}\u{0644}\u{0020}\u{0627}\u{0644}\u{062A}\u{0631}\u{0643}\u{064A}\u{0632}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0631}\u{0636}\u{0627}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{062E}\u{062F}\u{0645}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0648}\u{0627}\u{062C}\u{0647}\u{0629}\u{0020}\u{0627}\u{0644}\u{0623}\u{0645}\u{0627}\u{0645}\u{064A}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0627}\u{0646}\u{0636}\u{0628}\u{0627}\u{0637}\u{0020}\u{0627}\u{0644}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}\u{064A}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0648}\u{0627}\u{062C}\u{0647}\u{0629}\u{0020}\u{0627}\u{0644}\u{062E}\u{0644}\u{0641}\u{064A}\u{0629}\u{060C}\u{0020}\u{0623}\u{0646}\u{0634}\u{0623}\u{0646}\u{0627}\u{0020}\u{062D}\u{0644}\u{0627}\u{064B}\u{0020}\u{064A}\u{062A}\u{0648}\u{0633}\u{0639}\u{0020}\u{0628}\u{0633}\u{0644}\u{0627}\u{0633}\u{0629}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{0634}\u{0631}\u{0643}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0646}\u{0627}\u{0634}\u{0626}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{062D}\u{0644}\u{064A}\u{0629}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0633}\u{0648}\u{0642}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0633}\u{062A}\u{0648}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0624}\u{0633}\u{0633}\u{0627}\u{062A}\u{002E}"
                        : 'By focusing on both the front-end user delight and the back-end operational rigor, we created a solution that scales effortlessly from local startups to enterprise-level marketplace operations.'
                    ); ?>
                </p>
            </div>

            <div class="mcs__feature-stack" data-mcs-reveal data-mcs-delay="120">
                <div class="mcs__feature-row">
                    <div class="mcs__feature-icon mcs__feature-icon--primary">
                        <span class="material-symbols-outlined" aria-hidden="true">smartphone</span>
                    </div>
                    <div>
                        <h3 class="mcs__feature-title"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{0627}\u{0621}" : 'Customer App' ); ?></h3>
                        <p class="mcs__feature-desc"><?php echo esc_html( $is_rtl ? "\u{062A}\u{062C}\u{0631}\u{0628}\u{0629}\u{0020}\u{062A}\u{0633}\u{0648}\u{0642}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0069}\u{004F}\u{0053}\u{0020}\u{0648}\u{0041}\u{006E}\u{0064}\u{0072}\u{006F}\u{0069}\u{0064}\u{0020}\u{0645}\u{0628}\u{0646}\u{064A}\u{0629}\u{0020}\u{0628}\u{0640}\u{0020}\u{0046}\u{006C}\u{0075}\u{0074}\u{0074}\u{0065}\u{0072}\u{002E}" : 'Flutter-based iOS &amp; Android shopping experience.' ); ?></p>
                    </div>
                </div>
                <div class="mcs__feature-row">
                    <div class="mcs__feature-icon mcs__feature-icon--gold">
                        <span class="material-symbols-outlined" aria-hidden="true">storefront</span>
                    </div>
                    <div>
                        <h3 class="mcs__feature-title"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}" : 'Merchant Dashboard' ); ?></h3>
                        <p class="mcs__feature-desc"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0634}\u{0627}\u{0645}\u{0644}\u{0629}\u{0020}\u{0644}\u{0623}\u{0635}\u{062D}\u{0627}\u{0628}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0627}\u{062C}\u{0631}\u{0020}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0627}\u{062A}\u{0647}\u{0645}\u{002E}" : 'Comprehensive vendor control panel for store owners.' ); ?></p>
                    </div>
                </div>
                <div class="mcs__feature-row">
                    <div class="mcs__feature-icon mcs__feature-icon--tertiary">
                        <span class="material-symbols-outlined" aria-hidden="true">admin_panel_settings</span>
                    </div>
                    <div>
                        <h3 class="mcs__feature-title"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" : 'Admin Panel' ); ?></h3>
                        <p class="mcs__feature-desc"><?php echo esc_html( $is_rtl ? "\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{0625}\u{0634}\u{0631}\u{0627}\u{0641}\u{0020}\u{0634}\u{0627}\u{0645}\u{0644}\u{0020}\u{0648}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0644}\u{0644}\u{0633}\u{0648}\u{0642}\u{0020}\u{0627}\u{0644}\u{0625}\u{0644}\u{0643}\u{062A}\u{0631}\u{0648}\u{0646}\u{064A}\u{002E}" : 'Global oversight and marketplace management system.' ); ?></p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         03 Â· OPERATIONAL HURDLES (challenge)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__challenge" id="challenge">
        <div class="mcs__challenge-glow" aria-hidden="true"></div>
        <div class="mcs__container">
            <div class="mcs__challenge-head" data-mcs-reveal>
                <h3 class="mcs__h2 mcs__h2--light mcs__h2--center"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{062A}\u{062D}\u{062F}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}\u{064A}\u{0629}" : 'Operational Hurdles' ); ?></h3>
                <p class="mcs__challenge-sub"><?php echo esc_html( $is_rtl ? "\u{064A}\u{062A}\u{0637}\u{0644}\u{0628}\u{0020}\u{062A}\u{0648}\u{0633}\u{064A}\u{0639}\u{0020}\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0626}\u{0639}\u{064A}\u{0646}\u{0020}\u{0645}\u{0639}\u{0627}\u{0644}\u{062C}\u{0629}\u{0020}\u{0646}\u{0642}\u{0627}\u{0637}\u{0020}\u{0627}\u{062D}\u{062A}\u{0643}\u{0627}\u{0643}\u{0020}\u{0644}\u{0648}\u{062C}\u{0633}\u{062A}\u{064A}\u{0629}\u{0020}\u{0648}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{0020}\u{0639}\u{0645}\u{064A}\u{0642}\u{0629}\u{002E}" : 'Scaling a multi-vendor platform requires solving deep logistical and technical friction points.' ); ?></p>
            </div>

            <div class="mcs__challenge-grid" data-mcs-reveal-group>
                <div class="mcs__challenge-card" data-mcs-reveal>
                    <span class="material-symbols-outlined mcs__challenge-icon">inventory_2</span>
                    <h4><?php echo esc_html( $is_rtl ? "\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0626}\u{0639}\u{064A}\u{0646}" : 'Multi-vendor management' ); ?></h4>
                    <p><?php echo esc_html( $is_rtl ? "\u{0645}\u{0632}\u{0627}\u{0645}\u{0646}\u{0629}\u{0020}\u{0643}\u{062A}\u{0627}\u{0644}\u{0648}\u{062C}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{062A}\u{062C}\u{0627}\u{062A}\u{0020}\u{0639}\u{0628}\u{0631}\u{0020}\u{0645}\u{0626}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0626}\u{0639}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{0642}\u{0644}\u{064A}\u{0646}\u{0020}\u{0645}\u{0639}\u{0020}\u{0627}\u{0644}\u{062D}\u{0641}\u{0627}\u{0638}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0639}\u{0627}\u{064A}\u{064A}\u{0631}\u{0020}\u{0627}\u{0644}\u{062C}\u{0648}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0639}\u{0627}\u{0644}\u{064A}\u{0629}\u{0020}\u{0648}\u{0627}\u{062A}\u{0633}\u{0627}\u{0642}\u{0020}\u{0627}\u{0644}\u{0628}\u{064A}\u{0627}\u{0646}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0648}\u{0635}\u{0641}\u{064A}\u{0629}\u{002E}" : 'Synchronizing product catalogs across hundreds of independent sellers while maintaining high quality standards and metadata consistency.' ); ?></p>
                </div>
                <div class="mcs__challenge-card" data-mcs-reveal>
                    <span class="material-symbols-outlined mcs__challenge-icon">verified_user</span>
                    <h4><?php echo esc_html( $is_rtl ? "\u{0627}\u{0639}\u{062A}\u{0645}\u{0627}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}" : 'Merchant Approval' ); ?></h4>
                    <p><?php echo esc_html( $is_rtl ? "\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0629}\u{0020}\u{0625}\u{0639}\u{062F}\u{0627}\u{062F}\u{0020}\u{0622}\u{0645}\u{0646}\u{0629}\u{0020}\u{0648}\u{0645}\u{0648}\u{062B}\u{0642}\u{0629}\u{0020}\u{0644}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{062C}\u{062F}\u{062F}\u{0020}\u{0644}\u{062D}\u{0645}\u{0627}\u{064A}\u{0629}\u{0020}\u{0633}\u{0645}\u{0639}\u{0629}\u{0020}\u{0627}\u{0644}\u{0633}\u{0648}\u{0642}\u{0020}\u{0648}\u{0633}\u{0644}\u{0627}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{0627}\u{0621}\u{002E}" : 'Ensuring a secure and vetted onboarding process for new vendors to protect marketplace reputation and customer safety.' ); ?></p>
                </div>
                <div class="mcs__challenge-card" data-mcs-reveal>
                    <span class="material-symbols-outlined mcs__challenge-icon">local_shipping</span>
                    <h4><?php echo esc_html( $is_rtl ? "\u{062A}\u{0646}\u{0633}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}" : 'Order Coordination' ); ?></h4>
                    <p><?php echo esc_html( $is_rtl ? "\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0645}\u{0633}\u{0627}\u{0631}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{0020}\u{0627}\u{0644}\u{0645}\u{0639}\u{0642}\u{062F}\u{0629}\u{0020}\u{062D}\u{064A}\u{062B}\u{0020}\u{0642}\u{062F}\u{0020}\u{062A}\u{062D}\u{062A}\u{0648}\u{064A}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0627}\u{062A}\u{0020}\u{0645}\u{0646}\u{0020}\u{062A}\u{062C}\u{0627}\u{0631}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{064A}\u{0646}\u{0020}\u{0641}\u{064A}\u{0020}\u{0645}\u{0646}\u{0627}\u{0637}\u{0642}\u{0020}\u{0645}\u{062E}\u{062A}\u{0644}\u{0641}\u{0629}\u{002E}" : 'Managing complex delivery workflows where orders might contain items from multiple vendors located in different regions.' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         04 Â· THE INTEGRATED SOLUTION
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__solution" id="solution">
        <div class="mcs__container">
            <div class="mcs__solution-head" data-mcs-reveal>
                <h3 class="mcs__h2 mcs__h2--center"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{062D}\u{0644}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}" : 'The Integrated Solution' ); ?></h3>
                <p class="mcs__solution-sub"><?php echo esc_html( $is_rtl ? "\u{0628}\u{0646}\u{064A}\u{0629}\u{0020}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{0020}\u{0645}\u{0648}\u{062D}\u{062F}\u{0629}\u{0020}\u{062A}\u{062A}\u{0648}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{062A}\u{0639}\u{0642}\u{064A}\u{062F}\u{0020}\u{062D}\u{062A}\u{0649}\u{0020}\u{0644}\u{0627}\u{0020}\u{064A}\u{0636}\u{0637}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{062E}\u{062F}\u{0645}\u{0648}\u{0646}\u{0020}\u{0644}\u{0630}\u{0644}\u{0643}\u{002E}" : "A unified technical architecture that handles the complexity so users don't have to." ); ?></p>
            </div>

            <div class="mcs__solution-panel" data-mcs-reveal-group>
                <div class="mcs__solution-col" data-mcs-reveal>
                    <div class="mcs__solution-eyebrow mcs__solution-eyebrow--primary">
                        <span class="material-symbols-outlined" aria-hidden="true">devices</span> <?php echo esc_html( $is_rtl ? "\u{062C}\u{0627}\u{0646}\u{0628}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" : 'Customer Side' ); ?>
                    </div>
                    <h3 class="mcs__solution-title"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0645}\u{0648}\u{062D}\u{062F}" : 'Unified App' ); ?></h3>
                    <ul class="mcs__checklist">
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0633}\u{0644}\u{0629}\u{0020}\u{062A}\u{0633}\u{0648}\u{0642}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0626}\u{0639}\u{064A}\u{0646}\u{0020}\u{0628}\u{0633}\u{0644}\u{0627}\u{0633}\u{0629}" : 'Seamless multi-vendor cart' ); ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0628}\u{062D}\u{062B}\u{0020}\u{0645}\u{062A}\u{0642}\u{062F}\u{0645}\u{0020}\u{0648}\u{0641}\u{0644}\u{0627}\u{062A}\u{0631}" : 'Advanced search &amp; filters' ); ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0642}\u{0627}\u{0626}\u{0645}\u{0629}\u{0020}\u{0623}\u{0645}\u{0646}\u{064A}\u{0627}\u{062A}\u{0020}\u{0645}\u{062E}\u{0635}\u{0635}\u{0629}" : 'Personalized wishlist' ); ?></li>
                    </ul>
                </div>
                <div class="mcs__solution-col mcs__solution-col--tint" data-mcs-reveal data-mcs-delay="100">
                    <div class="mcs__solution-eyebrow mcs__solution-eyebrow--gold">
                        <span class="material-symbols-outlined" aria-hidden="true">dashboard</span> <?php echo esc_html( $is_rtl ? "\u{062C}\u{0627}\u{0646}\u{0628}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}" : 'Merchant Side' ); ?>
                    </div>
                    <h3 class="mcs__solution-title"><?php echo esc_html( $is_rtl ? "\u{0648}\u{062D}\u{062F}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}" : 'Vendor Console' ); ?></h3>
                    <ul class="mcs__checklist">
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{062A}\u{062C}\u{0627}\u{062A}\u{0020}\u{0628}\u{0627}\u{0644}\u{062C}\u{0645}\u{0644}\u{0629}" : 'Bulk product management' ); ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{062A}\u{0628}\u{0639}\u{0020}\u{062D}\u{0627}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}" : 'Order status tracking' ); ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0645}\u{0624}\u{0634}\u{0631}\u{0627}\u{062A}\u{0020}\u{0623}\u{062F}\u{0627}\u{0621}\u{0020}\u{0627}\u{0644}\u{0645}\u{0628}\u{064A}\u{0639}\u{0627}\u{062A}" : 'Sales performance metrics' ); ?></li>
                    </ul>
                </div>
                <div class="mcs__solution-col" data-mcs-reveal data-mcs-delay="200">
                    <div class="mcs__solution-eyebrow mcs__solution-eyebrow--tertiary">
                        <span class="material-symbols-outlined" aria-hidden="true">settings_accessibility</span> <?php echo esc_html( $is_rtl ? "\u{062C}\u{0627}\u{0646}\u{0628}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" : 'Admin Side' ); ?>
                    </div>
                    <h3 class="mcs__solution-title"><?php echo esc_html( $is_rtl ? "\u{0645}\u{0631}\u{0643}\u{0632}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0633}\u{0648}\u{0642}" : 'Marketplace HQ' ); ?></h3>
                    <ul class="mcs__checklist">
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0627}\u{0639}\u{062A}\u{0645}\u{0627}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0633}\u{062A}\u{0648}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}" : 'Global merchant approval' ); ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0645}\u{0631}\u{0627}\u{0642}\u{0628}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0639}\u{0627}\u{0645}\u{0644}\u{0627}\u{062A}" : 'Transaction monitoring' ); ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0625}\u{0639}\u{062F}\u{0627}\u{062F}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}" : 'Platform configuration' ); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         05 Â· THE SHOPPING EXPERIENCE
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__shopping">
        <div class="mcs__container mcs__shopping-grid">

            <div class="mcs__shopping-phones" data-mcs-reveal>
                <div class="mcs__mini-phone mcs__mini-phone--up">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Welcome.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0631}\u{062D}\u{064A}\u{0628}" : 'Welcome screen' ); ?>" loading="lazy" decoding="async" width="195" height="415" />
                </div>
                <div class="mcs__mini-phone">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Item+Details.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{062A}\u{0641}\u{0627}\u{0635}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{062A}\u{062C}" : 'Product details' ); ?>" loading="lazy" decoding="async" width="195" height="415" />
                </div>
                <div class="mcs__mini-phone mcs__mini-phone--up">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Wishlist.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0642}\u{0627}\u{0626}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{0623}\u{0645}\u{0646}\u{064A}\u{0627}\u{062A}" : 'Wishlist' ); ?>" loading="lazy" decoding="async" width="195" height="415" />
                </div>
            </div>

            <div data-mcs-reveal data-mcs-delay="120">
                <h3 class="mcs__h2"><?php echo esc_html( $is_rtl ? "\u{062A}\u{062C}\u{0631}\u{0628}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0648}\u{0642}" : 'The Shopping Experience' ); ?></h3>
                <p class="mcs__p"><?php echo esc_html( $is_rtl ? "\u{0623}\u{0648}\u{0644}\u{064A}\u{0646}\u{0627}\u{0020}\u{062A}\u{0635}\u{0645}\u{064A}\u{0645}\u{0627}\u{064B}\u{0020}\u{064A}\u{0631}\u{0643}\u{0632}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{062D}\u{062A}\u{0648}\u{0649}\u{060C}\u{0020}\u{0628}\u{062D}\u{064A}\u{062B}\u{0020}\u{062A}\u{0628}\u{0642}\u{0649}\u{0020}\u{0635}\u{0648}\u{0631}\u{0020}\u{0627}\u{0644}\u{0623}\u{0632}\u{064A}\u{0627}\u{0621}\u{0020}\u{0647}\u{064A}\u{0020}\u{0627}\u{0644}\u{0628}\u{0637}\u{0644}\u{0020}\u{0628}\u{064A}\u{0646}\u{0645}\u{0627}\u{0020}\u{062A}\u{0648}\u{0641}\u{0631}\u{0020}\u{0627}\u{0644}\u{0648}\u{0627}\u{062C}\u{0647}\u{0629}\u{0020}\u{0623}\u{062F}\u{0648}\u{0627}\u{062A}\u{0020}\u{0639}\u{0645}\u{0644}\u{064A}\u{0629}\u{0020}\u{0628}\u{0644}\u{0627}\u{0020}\u{0627}\u{062D}\u{062A}\u{0643}\u{0627}\u{0643}\u{002E}" : "We prioritized a 'content-first' design language, ensuring that the fashion photography remains the star of the show while the UI provides frictionless utility." ); ?></p>
                <div class="mcs__dots-grid">
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{0633}\u{062C}\u{064A}\u{0644}\u{0020}\u{062F}\u{062E}\u{0648}\u{0644}\u{0020}\u{0633}\u{0631}\u{064A}\u{0639}\u{0020}\u{0648}\u{0622}\u{0645}\u{0646}" : 'Fast Secure Login' ); ?></div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{0641}\u{0627}\u{0635}\u{064A}\u{0644}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{063A}\u{0646}\u{064A}\u{0629}" : 'Rich Product Details' ); ?></div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> <?php echo esc_html( $is_rtl ? "\u{0642}\u{0627}\u{0626}\u{0645}\u{0629}\u{0020}\u{0623}\u{0645}\u{0646}\u{064A}\u{0627}\u{062A}\u{0020}\u{062A}\u{0641}\u{0627}\u{0639}\u{0644}\u{064A}\u{0629}" : 'Interactive Wishlist' ); ?></div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> <?php echo esc_html( $is_rtl ? "\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{0633}\u{0644}\u{0629}\u{0020}\u{062F}\u{064A}\u{0646}\u{0627}\u{0645}\u{064A}\u{0643}\u{064A}" : 'Dynamic Cart System' ); ?></div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> <?php echo esc_html( $is_rtl ? "\u{0633}\u{062C}\u{0644}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}" : 'Order History' ); ?></div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> <?php echo esc_html( $is_rtl ? "\u{0627}\u{0633}\u{062A}\u{0643}\u{0634}\u{0627}\u{0641}\u{0020}\u{0627}\u{0644}\u{0641}\u{0626}\u{0627}\u{062A}" : 'Category Discovery' ); ?></div>
                </div>
            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         06 Â· MERCHANT DASHBOARD
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__dashboard">
        <div class="mcs__container">
            <div class="mcs__dashboard-head" data-mcs-reveal>
                <h3 class="mcs__h2 mcs__h2--gold"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}" : 'Merchant Dashboard' ); ?></h3>
                <p class="mcs__dashboard-sub"><?php echo esc_html( $is_rtl ? "\u{0645}\u{0631}\u{0643}\u{0632}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0645}\u{062E}\u{0635}\u{0635}\u{0020}\u{0644}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{0020}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{062D}\u{0636}\u{0648}\u{0631}\u{0647}\u{0645}\u{0020}\u{0627}\u{0644}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0628}\u{0627}\u{0644}\u{0643}\u{0627}\u{0645}\u{0644}\u{060C}\u{0020}\u{0645}\u{0646}\u{0020}\u{0631}\u{0641}\u{0639}\u{0020}\u{0627}\u{0644}\u{0645}\u{062E}\u{0632}\u{0648}\u{0646}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}\u{0020}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{002E}" : 'A dedicated control center for vendors to manage their entire digital presence, from inventory uploads to order fulfillment.' ); ?></p>
            </div>

            <div class="mcs__browser-frame" data-mcs-reveal>
                <div class="mcs__browser-chrome">
                    <span class="mcs__browser-dot mcs__browser-dot--red"></span>
                    <span class="mcs__browser-dot mcs__browser-dot--gold"></span>
                    <span class="mcs__browser-dot mcs__browser-dot--green"></span>
                    <span class="mcs__browser-url">dashboard.merchant.spines.tech</span>
                </div>
                <div class="mcs__browser-body">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Dashboard.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0646}\u{0638}\u{0631}\u{0629}\u{0020}\u{0639}\u{0627}\u{0645}\u{0629}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{062A}\u{062D}\u{0644}\u{064A}\u{0644}\u{0627}\u{062A}\u{0020}\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}" : 'Merchant dashboard analytics overview' ); ?>" loading="lazy" decoding="async" width="1280" height="720" />
                </div>
            </div>

            <div class="mcs__video-grid" data-mcs-reveal-group>
                <div class="mcs__video-card" data-mcs-reveal>
                    <h4><?php echo esc_html( $is_rtl ? "\u{0639}\u{0631}\u{0636}\u{0020}\u{062A}\u{0633}\u{062C}\u{064A}\u{0644}\u{0020}\u{062F}\u{062E}\u{0648}\u{0644}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}" : 'Merchant Login Demo' ); ?></h4>
                    <a href="https://www.youtube.com/watch?v=OvxffxGhQ9E" target="_blank" rel="noopener noreferrer" class="mcs__video-thumb">
                        <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Dashboard.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "صورة مصغرة لعرض تسجيل دخول التاجر" : 'Merchant login demo thumbnail' ); ?>" width="640" height="360" loading="lazy" decoding="async" />
                        <div class="mcs__video-overlay">
                            <span class="material-symbols-outlined" aria-hidden="true">play_circle</span>
                            <p><?php echo esc_html( $is_rtl ? "مشاهدة الفيديو" : 'Watch Video' ); ?></p>
                        </div>
                    </a>
                </div>
                <div class="mcs__video-card" data-mcs-reveal data-mcs-delay="120">
                    <h4><?php echo esc_html( $is_rtl ? "إضافة وتعديل المنتجات" : 'Products Adding &amp; Editing' ); ?></h4>
                    <a href="https://www.youtube.com/watch?v=KJGuiAH6qoc" target="_blank" rel="noopener noreferrer" class="mcs__video-thumb">
                        <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Dashboard2.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "صورة مصغرة لعرض إدارة المنتجات" : 'Product management demo thumbnail' ); ?>" width="640" height="360" loading="lazy" decoding="async" />
                        <div class="mcs__video-overlay">
                            <span class="material-symbols-outlined" aria-hidden="true">play_circle</span>
                            <p><?php echo esc_html( $is_rtl ? "\u{0645}\u{0634}\u{0627}\u{0647}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0641}\u{064A}\u{062F}\u{064A}\u{0648}" : 'Watch Video' ); ?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         07 Â· ADMIN OVERSIGHT
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__admin">
        <div class="mcs__container mcs__admin-grid">

            <div data-mcs-reveal>
                <h3 class="mcs__h2 mcs__h2--light"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0625}\u{0634}\u{0631}\u{0627}\u{0641}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{064A}" : 'Admin Oversight' ); ?></h3>
                <p class="mcs__admin-copy"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0648}\u{0641}\u{0631}\u{0020}\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0639}\u{062C}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{0642}\u{064A}\u{0627}\u{062F}\u{0629}\u{0020}\u{0639}\u{0627}\u{0644}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{0648}\u{0649}\u{0020}\u{0644}\u{0644}\u{0633}\u{0648}\u{0642}\u{0020}\u{0628}\u{0623}\u{0643}\u{0645}\u{0644}\u{0647}\u{002E}\u{0020}\u{064A}\u{0645}\u{0643}\u{0646}\u{0020}\u{0644}\u{0644}\u{0645}\u{0633}\u{0624}\u{0648}\u{0644}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{062A}\u{062D}\u{0642}\u{0642}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{062C}\u{062F}\u{062F}\u{060C}\u{0020}\u{0648}\u{0645}\u{0631}\u{0627}\u{0642}\u{0628}\u{0629}\u{0020}\u{0645}\u{0624}\u{0634}\u{0631}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}\u{060C}\u{0020}\u{0648}\u{062D}\u{0644}\u{0020}\u{0627}\u{0644}\u{0646}\u{0632}\u{0627}\u{0639}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}\u{064A}\u{0629}\u{0020}\u{0628}\u{062F}\u{0642}\u{0629}\u{0020}\u{0639}\u{0627}\u{0644}\u{064A}\u{0629}\u{002E}" : 'The Admin Panel provides the high-level steering wheel for the entire marketplace. Administrators can vet new merchants, monitor site-wide metrics, and resolve operational disputes with surgical precision.' ); ?></p>

                <div class="mcs__admin-list">
                    <div class="mcs__admin-item">
                        <span class="material-symbols-outlined mcs__admin-icon">shield_person</span>
                        <div>
                            <h4><?php echo esc_html( $is_rtl ? "\u{0645}\u{0633}\u{0627}\u{0631}\u{0020}\u{0627}\u{0639}\u{062A}\u{0645}\u{0627}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}" : 'Merchant Approval Flow' ); ?></h4>
                            <p><?php echo esc_html( $is_rtl ? "\u{0645}\u{0631}\u{0627}\u{062C}\u{0639}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{0646}\u{062F}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{062A}\u{062D}\u{0642}\u{0642}\u{0020}\u{0645}\u{0646}\u{0020}\u{0628}\u{064A}\u{0627}\u{0646}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}\u{0020}\u{0642}\u{0628}\u{0644}\u{0020}\u{0645}\u{0646}\u{062D}\u{0020}\u{0627}\u{0644}\u{0648}\u{0635}\u{0648}\u{0644}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}\u{002E}" : 'Review documentation and verify vendor credentials before granting platform access.' ); ?></p>
                        </div>
                    </div>
                    <div class="mcs__admin-item">
                        <span class="material-symbols-outlined mcs__admin-icon">payments</span>
                        <div>
                            <h4><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0625}\u{0634}\u{0631}\u{0627}\u{0641}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0639}\u{0627}\u{0645}\u{0644}\u{0627}\u{062A}" : 'Transaction Supervision' ); ?></h4>
                            <p><?php echo esc_html( $is_rtl ? "\u{0645}\u{0631}\u{0627}\u{0642}\u{0628}\u{0629}\u{0020}\u{062A}\u{062F}\u{0641}\u{0642}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0625}\u{064A}\u{0631}\u{0627}\u{062F}\u{0627}\u{062A}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0633}\u{062A}\u{0648}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{0648}\u{0645}\u{0639}\u{0627}\u{0644}\u{062C}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0648}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{064A}\u{062F}\u{0648}\u{064A}\u{0629}\u{002E}" : 'Monitor platform-wide revenue streams and handle manual settlement reconciliations.' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mcs__admin-visual" data-mcs-reveal data-mcs-delay="150">
                <div class="mcs__admin-glow" aria-hidden="true"></div>
                <div class="mcs__admin-frame">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Dashboard2.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "لوحة الإدارة مع خريطة التجار العالمية" : 'Admin dashboard with global merchant map' ); ?>" width="1280" height="720" loading="lazy" decoding="async" />
                </div>
            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         08 Â· ONBOARDING LIFECYCLE
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__onboarding">
        <div class="mcs__container">
            <div class="mcs__onboarding-head" data-mcs-reveal>
                <h3 class="mcs__h2 mcs__h2--center"><?php echo esc_html( $is_rtl ? "\u{062F}\u{0648}\u{0631}\u{0629}\u{0020}\u{0625}\u{0639}\u{062F}\u{0627}\u{062F}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}" : 'Onboarding Lifecycle' ); ?></h3>
                <p class="mcs__onboarding-sub"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0633}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0638}\u{0645}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{062F}\u{064A}\u{0645}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}\u{0020}\u{0627}\u{0644}\u{0646}\u{0634}\u{0637}\u{002E}" : 'The structured path from application to active merchant.' ); ?></p>
            </div>

            <div class="mcs__steps" data-mcs-reveal-group>
                <div class="mcs__steps-line" aria-hidden="true"></div>

                <div class="mcs__step" data-mcs-reveal>
                    <span class="mcs__step-num">1</span>
                    <h4><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}" : 'Request' ); ?></h4>
                    <p><?php echo esc_html( $is_rtl ? "\u{064A}\u{0642}\u{062F}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}\u{0020}\u{0645}\u{0644}\u{0641}\u{0020}\u{0627}\u{0644}\u{0639}\u{0644}\u{0627}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{064A}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{0646}\u{062F}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0646}\u{0648}\u{0646}\u{064A}\u{0629}\u{002E}" : 'Merchant submits brand profile and legal documents.' ); ?></p>
                </div>
                <div class="mcs__step" data-mcs-reveal data-mcs-delay="80">
                    <span class="mcs__step-num">2</span>
                    <h4><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0631}\u{0627}\u{062C}\u{0639}\u{0629}" : 'Review' ); ?></h4>
                    <p><?php echo esc_html( $is_rtl ? "\u{064A}\u{0642}\u{064A}\u{0651}\u{0645}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{0624}\u{0648}\u{0644}\u{0020}\u{062C}\u{0648}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{0639}\u{0644}\u{0627}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{064A}\u{0629}\u{0020}\u{0648}\u{0628}\u{064A}\u{0627}\u{0646}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{062D}\u{0642}\u{0642}\u{002E}" : 'Admin evaluates the brand quality and verification data.' ); ?></p>
                </div>
                <div class="mcs__step" data-mcs-reveal data-mcs-delay="160">
                    <span class="mcs__step-num">3</span>
                    <h4><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0627}\u{0639}\u{062A}\u{0645}\u{0627}\u{062F}" : 'Approval' ); ?></h4>
                    <p><?php echo esc_html( $is_rtl ? "\u{062A}\u{0641}\u{0639}\u{064A}\u{0644}\u{0020}\u{062D}\u{0633}\u{0627}\u{0628}\u{0020}\u{0627}\u{0644}\u{062A}\u{0627}\u{062C}\u{0631}\u{0020}\u{0645}\u{0639}\u{0020}\u{0648}\u{0635}\u{0648}\u{0644}\u{0020}\u{0643}\u{0627}\u{0645}\u{0644}\u{0020}\u{0644}\u{0644}\u{0645}\u{062A}\u{062C}\u{0631}\u{002E}" : 'Merchant account activated with full store access.' ); ?></p>
                </div>
                <div class="mcs__step" data-mcs-reveal data-mcs-delay="240">
                    <span class="mcs__step-num">4</span>
                    <h4><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" : 'Management' ); ?></h4>
                    <p><?php echo esc_html( $is_rtl ? "\u{0628}\u{062F}\u{0621}\u{0020}\u{0631}\u{0641}\u{0639}\u{0020}\u{0627}\u{0644}\u{0645}\u{062E}\u{0632}\u{0648}\u{0646}\u{0020}\u{0648}\u{0639}\u{0645}\u{0644}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{062C}\u{0631}\u{002E}" : 'Inventory upload and store operations commence.' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         09 Â· PAYMENTS & DELIVERY
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__pay-delivery">
        <div class="mcs__container mcs__pay-grid" data-mcs-reveal-group>

            <div class="mcs__glass-card mcs__glass-card--primary" data-mcs-reveal>
                <div class="mcs__glass-icon mcs__glass-icon--primary">
                    <span class="material-symbols-outlined" aria-hidden="true">payments</span>
                </div>
                <div>
                    <h3><?php echo esc_html( $is_rtl ? "\u{0645}\u{062F}\u{0641}\u{0648}\u{0639}\u{0627}\u{062A}\u{0020}\u{0645}\u{0631}\u{0646}\u{0629}" : 'Flexible Payments' ); ?></h3>
                    <p><?php echo esc_html( $is_rtl ? "\u{0645}\u{0635}\u{0645}\u{0645}\u{0629}\u{0020}\u{0644}\u{0644}\u{0648}\u{062C}\u{0633}\u{062A}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0625}\u{0642}\u{0644}\u{064A}\u{0645}\u{064A}\u{0629}\u{060C}\u{0020}\u{0645}\u{0639}\u{0020}\u{062F}\u{0639}\u{0645}\u{0020}\u{0627}\u{0644}\u{062F}\u{0641}\u{0639}\u{0020}\u{0639}\u{0646}\u{062F}\u{0020}\u{0627}\u{0644}\u{0627}\u{0633}\u{062A}\u{0644}\u{0627}\u{0645}\u{0020}\u{0643}\u{062E}\u{064A}\u{0627}\u{0631}\u{0020}\u{0623}\u{0633}\u{0627}\u{0633}\u{064A}\u{060C}\u{0020}\u{0648}\u{0625}\u{0645}\u{0643}\u{0627}\u{0646}\u{064A}\u{0629}\u{0020}\u{0631}\u{0628}\u{0637}\u{0020}\u{0627}\u{0644}\u{0645}\u{062D}\u{0627}\u{0641}\u{0638}\u{0020}\u{0627}\u{0644}\u{0631}\u{0642}\u{0645}\u{064A}\u{0629}\u{0020}\u{0648}\u{0628}\u{0648}\u{0627}\u{0628}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0628}\u{0637}\u{0627}\u{0642}\u{0627}\u{062A}\u{002E}" : 'Designed for regional logistics, supporting Cash on Delivery as primary, with hooks for digital wallet and card gateway integrations.' ); ?></p>
                    <div class="mcs__chip-row">
                        <span class="mcs__chip"><?php echo esc_html( $is_rtl ? "\u{062F}\u{0639}\u{0645}\u{0020}\u{0627}\u{0644}\u{062F}\u{0641}\u{0639}\u{0020}\u{0639}\u{0646}\u{062F}\u{0020}\u{0627}\u{0644}\u{0627}\u{0633}\u{062A}\u{0644}\u{0627}\u{0645}" : 'COD SUPPORT' ); ?></span>
                        <span class="mcs__chip"><?php echo esc_html( $is_rtl ? "\u{062C}\u{0627}\u{0647}\u{0632}\u{0020}\u{0644}\u{0644}\u{0631}\u{0628}\u{0637}" : 'API READY' ); ?></span>
                    </div>
                </div>
            </div>

            <div class="mcs__glass-card mcs__glass-card--gold" data-mcs-reveal data-mcs-delay="120">
                <div class="mcs__glass-icon mcs__glass-icon--gold">
                    <span class="material-symbols-outlined" aria-hidden="true">local_shipping</span>
                </div>
                <div>
                    <h3><?php echo esc_html( $is_rtl ? "\u{0645}\u{0646}\u{0637}\u{0642}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}" : 'Delivery Logic' ); ?></h3>
                    <p><?php echo esc_html( $is_rtl ? "\u{0633}\u{064A}\u{0631}\u{0020}\u{0639}\u{0645}\u{0644}\u{0020}\u{062A}\u{0646}\u{0633}\u{064A}\u{0642}\u{0020}\u{064A}\u{062F}\u{0648}\u{064A}\u{0020}\u{064A}\u{0645}\u{0646}\u{062D}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0627}\u{0631}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0627}\u{064B}\u{0020}\u{0643}\u{0627}\u{0645}\u{0644}\u{0627}\u{064B}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0644}\u{0648}\u{062C}\u{0633}\u{062A}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062D}\u{0644}\u{064A}\u{0629}\u{0020}\u{0648}\u{062C}\u{062F}\u{0627}\u{0648}\u{0644}\u{0020}\u{0627}\u{0644}\u{062A}\u{062D}\u{0636}\u{064A}\u{0631}\u{002E}" : 'A manual coordination workflow that gives merchants total control over their local logistics and preparation timelines.' ); ?></p>
                    <div class="mcs__chip-row">
                        <span class="mcs__chip"><?php echo esc_html( $is_rtl ? "\u{0645}\u{0633}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{062A}\u{062A}\u{0628}\u{0639}" : 'TRACKING FLOW' ); ?></span>
                        <span class="mcs__chip"><?php echo esc_html( $is_rtl ? "\u{0625}\u{062F}\u{062E}\u{0627}\u{0644}\u{0020}\u{064A}\u{062F}\u{0648}\u{064A}" : 'MANUAL CAPTURE' ); ?></span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         10 Â· PERFORMANCE FOUNDATION (tech stack)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__stack">
        <div class="mcs__container mcs__stack-inner" data-mcs-reveal>
            <h3 class="mcs__stack-eyebrow"><?php echo esc_html( $is_rtl ? "\u{0623}\u{0633}\u{0627}\u{0633}\u{0020}\u{0627}\u{0644}\u{0623}\u{062F}\u{0627}\u{0621}" : 'Performance Foundation' ); ?></h3>
            <div class="mcs__stack-pills">
                <span class="mcs__pill">Flutter</span>
                <span class="mcs__pill">Node.js</span>
                <span class="mcs__pill">NoSQL</span>
                <span class="mcs__pill">Nginx</span>
                <span class="mcs__pill">Firebase</span>
            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         11 Â· VISUAL SHOWCASE
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__showcase">
        <div class="mcs__container">
            
            <div class="mcs__browser-frame mcs__showcase-desktop" data-mcs-reveal>
                <div class="mcs__browser-chrome">
                    <span class="mcs__browser-dot mcs__browser-dot--red"></span>
                    <span class="mcs__browser-dot mcs__browser-dot--gold"></span>
                    <span class="mcs__browser-dot mcs__browser-dot--green"></span>
                    <span class="mcs__browser-url">dashboard.merchant.spines.tech</span>
                </div>
                <div class="mcs__browser-body">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Dashboard.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "عروض لوحة التحكم المتجاوبة" : 'Dashboard responsive views' ); ?>" width="1280" height="720" loading="lazy" decoding="async" />
                </div>
            </div>

            <div class="mcs__showcase-phones" data-mcs-reveal-group>
                <div class="mcs__showcase-phone" data-mcs-reveal data-mcs-delay="80">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Home.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "الشاشة الرئيسية للعميل" : 'Customer home screen' ); ?>" width="320" height="680" loading="lazy" decoding="async" />
                </div>
                <div class="mcs__showcase-phone" data-mcs-reveal data-mcs-delay="160">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Welcome.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "شاشة الترحيب" : 'Welcome screen' ); ?>" width="320" height="680" loading="lazy" decoding="async" />
                </div>
                <div class="mcs__showcase-phone" data-mcs-reveal data-mcs-delay="240">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Wishlist.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "شاشة قائمة الأمنيات" : 'Wishlist screen montage' ); ?>" width="320" height="680" loading="lazy" decoding="async" />
                </div>
            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         12 Â· READY FOR MARKET (results)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__results" id="results">
        <div class="mcs__container mcs__results-grid">

            <div data-mcs-reveal>
                <h3 class="mcs__h2"><?php echo esc_html( $is_rtl ? "\u{062C}\u{0627}\u{0647}\u{0632}\u{0020}\u{0644}\u{0644}\u{0633}\u{0648}\u{0642}" : 'Ready for Market' ); ?></h3>
                <p class="mcs__p"><?php echo esc_html( $is_rtl ? "\u{004D}\u{0065}\u{0072}\u{0063}\u{0068}\u{0061}\u{006E}\u{0074}\u{0020}\u{0628}\u{0646}\u{064A}\u{0629}\u{0020}\u{0645}\u{0639}\u{0645}\u{0627}\u{0631}\u{064A}\u{0629}\u{0020}\u{0645}\u{062C}\u{0631}\u{0628}\u{0629}\u{0020}\u{062A}\u{0632}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{0639}\u{0642}\u{0628}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0646}\u{064A}\u{0629}\u{0020}\u{0623}\u{0645}\u{0627}\u{0645}\u{0020}\u{0631}\u{0648}\u{0627}\u{062F}\u{0020}\u{0627}\u{0644}\u{0623}\u{0639}\u{0645}\u{0627}\u{0644}\u{0020}\u{0641}\u{064A}\u{0020}\u{0642}\u{0637}\u{0627}\u{0639}\u{0020}\u{0627}\u{0644}\u{0623}\u{0632}\u{064A}\u{0627}\u{0621}\u{002E}\u{0020}\u{064A}\u{0648}\u{0641}\u{0631}\u{0020}\u{0645}\u{0633}\u{0627}\u{0631}\u{0627}\u{064B}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0627}\u{064B}\u{0020}\u{0645}\u{0646}\u{0020}\u{0623}\u{0648}\u{0644}\u{0020}\u{062A}\u{0641}\u{0627}\u{0639}\u{0644}\u{0020}\u{0645}\u{0639}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{062A}\u{062D}\u{0642}\u{0642}\u{0020}\u{0627}\u{0644}\u{0646}\u{0647}\u{0627}\u{0626}\u{064A}\u{0020}\u{0645}\u{0646}\u{0020}\u{0627}\u{0644}\u{062A}\u{0633}\u{0644}\u{064A}\u{0645}\u{002E}" : 'Merchant is a battle-tested architecture that removes technical roadblocks for fashion entrepreneurs. It provides a complete end-to-end flow from first customer engagement to final delivery verification.' ); ?></p>

                <div class="mcs__stars-list">
                    <div class="mcs__stars-item"><span class="material-symbols-outlined" aria-hidden="true">stars</span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0639}\u{0645}\u{0644}\u{0627}\u{0621}\u{0020}\u{0046}\u{006C}\u{0075}\u{0074}\u{0074}\u{0065}\u{0072}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}" : 'Complete Flutter Customer App' ); ?></div>
                    <div class="mcs__stars-item"><span class="material-symbols-outlined" aria-hidden="true">stars</span> <?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{062A}\u{062C}\u{0627}\u{0631}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0645}\u{0633}\u{062A}\u{0648}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0624}\u{0633}\u{0633}\u{0627}\u{062A}" : 'Enterprise Merchant Dashboard' ); ?></div>
                    <div class="mcs__stars-item"><span class="material-symbols-outlined" aria-hidden="true">stars</span> <?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0633}\u{0648}\u{0642}\u{0020}\u{0645}\u{0631}\u{0643}\u{0632}\u{064A}\u{0629}" : 'Centralized Marketplace Admin Panel' ); ?></div>
                    <div class="mcs__stars-item"><span class="material-symbols-outlined" aria-hidden="true">stars</span> <?php echo esc_html( $is_rtl ? "\u{0633}\u{064A}\u{0631}\u{0020}\u{0639}\u{0645}\u{0644}\u{0020}\u{0645}\u{062A}\u{0639}\u{062F}\u{062F}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0626}\u{0639}\u{064A}\u{0646}\u{0020}\u{0628}\u{0633}\u{0644}\u{0627}\u{0633}\u{0629}" : 'Seamless Multi-Vendor Workflow' ); ?></div>
                </div>
            </div>

            <div class="mcs__results-gallery" data-mcs-reveal data-mcs-delay="150">
                <div class="mcs__results-img">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Home.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "الشاشة الرئيسية للعميل" : 'Customer home screen' ); ?>" width="400" height="300" loading="lazy" decoding="async" />
                </div>
                <div class="mcs__results-img mcs__results-img--down">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Item+Details.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "شاشة تفاصيل المنتج" : 'Product details screen' ); ?>" width="400" height="300" loading="lazy" decoding="async" />
                </div>
                <div class="mcs__results-img mcs__results-img--up">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Dashboard2.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "جدول قائمة التجار في لوحة الإدارة" : 'Admin merchant listing table' ); ?>" width="400" height="300" loading="lazy" decoding="async" />
                </div>
                <div class="mcs__results-img">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Dashboard.webp')); ?>" alt="<?php echo esc_attr( $is_rtl ? "تاجر يستخدم لوحة التحكم داخل المتجر" : 'Merchant using dashboard in-store' ); ?>" width="400" height="300" loading="lazy" decoding="async" />
                </div>
            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         13 Â· FINAL CTA
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="mcs__final-cta">
        <div class="mcs__container">
            <div class="mcs__final-cta-card" data-mcs-reveal>
                <div class="mcs__final-cta-glow" aria-hidden="true"></div>
                <div class="mcs__final-cta-inner">
                    <h3><?php echo esc_html( $is_rtl ? "\u{0627}\u{0628}\u{0646}\u{0650}\u{0020}\u{0646}\u{0638}\u{0627}\u{0645}\u{0643}\u{0020}\u{0627}\u{0644}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0627}\u{0644}\u{062E}\u{0627}\u{0635}" : 'Build Your Own Ecosystem' ); ?></h3>
                    <p><?php echo esc_html( $is_rtl ? "\u{062D}\u{0648}\u{0651}\u{0644}\u{0020}\u{0631}\u{0624}\u{064A}\u{0629}\u{0020}\u{0633}\u{0648}\u{0642}\u{0643}\u{0020}\u{0627}\u{0644}\u{0625}\u{0644}\u{0643}\u{062A}\u{0631}\u{0648}\u{0646}\u{064A}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0648}\u{0627}\u{0642}\u{0639}\u{0020}\u{0639}\u{0627}\u{0644}\u{064A}\u{0020}\u{0627}\u{0644}\u{0623}\u{062F}\u{0627}\u{0621}\u{0020}\u{0645}\u{0639}\u{0020}\u{0627}\u{0644}\u{0623}\u{0633}\u{0627}\u{0633}\u{0020}\u{0627}\u{0644}\u{062C}\u{0627}\u{0647}\u{0632}\u{0020}\u{0645}\u{0646}\u{0020}\u{0053}\u{0070}\u{0069}\u{006E}\u{0065}\u{0073}\u{0054}\u{0065}\u{0063}\u{0068}\u{002E}" : "Transform your marketplace vision into a high-performance reality with SpinesTech's ready-made foundation." ); ?></p>
                    <div class="mcs__final-cta-ctas">
                        <a href="<?php echo esc_url( function_exists('st_url') ? st_url('/contact/') : '/contact/' ); ?>" class="mcs__btn mcs__btn--gold"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0628}\u{062F}\u{0623}\u{0020}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0643}" : 'Start Your Project' ); ?></a>
                        <a href="<?php echo esc_url( function_exists('st_url') ? st_url('/contact/') : '/contact/' ); ?>" class="mcs__btn mcs__btn--outline"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0648}\u{0627}\u{0635}\u{0644}\u{0020}\u{0645}\u{0639}\u{0020}\u{0053}\u{0070}\u{0069}\u{006E}\u{0065}\u{0073}\u{0054}\u{0065}\u{0063}\u{0068}" : 'Contact SpinesTech' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div><!-- /.mcs -->

<?php
get_template_part('template-parts/case-study/related-links', null, ['slug' => 'merchant']);
get_footer();
?>
