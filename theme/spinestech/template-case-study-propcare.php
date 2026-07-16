<?php
/**
 * Template Name: Case Study â€” PropCare 360
 * Template Post Type: st_case_study
 *
 * theme/spinestech/template-case-study-propcare.php
 *
 * Fully static, hardcoded one-off case study page for "PropCare 360".
 * Assign this template to the specific st_case_study post from
 * Page Attributes â†’ Template in the WP editor.
 *
 * Bilingual Arabic/English content based on st_locale().
 * No dynamic postmeta, no ACF â€” everything is literal content.
 * Uses the theme's real header/footer (get_header/get_footer).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$is_rtl = function_exists( 'st_locale' ) ? st_locale() === 'ar' : true;
$dir    = $is_rtl ? 'rtl' : 'ltr';

$pc_img = static function ( $file ) {
	return esc_url( st_asset( 'images/case-studies/propcare/' . ltrim( $file, '/' ) ) );
};

get_header();
?>

<main class="pc" dir="<?php echo esc_attr( $dir ); ?>" lang="<?php echo esc_attr( $is_rtl ? 'ar' : 'en' ); ?>">

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         01 Â· HERO
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="pc__hero" id="hero" aria-labelledby="pc-hero-title">
        <div class="pc__hero-glow pc__hero-glow--1" aria-hidden="true"></div>
        <div class="pc__hero-glow pc__hero-glow--2" aria-hidden="true"></div>

        <div class="pc__container pc__hero-inner">

            <div class="pc__hero-content" data-pc-reveal>
                <span class="pc__badge"><?php echo $is_rtl ? 'Ø¯Ø±Ø§Ø³Ø© Ø­Ø§Ù„Ø© Ù…Ù† SpinesTech' : 'Case Study by SpinesTech'; ?></span>
                <h1 class="pc__hero-title" id="pc-hero-title"><?php echo $is_rtl ? 'Ù…Ù†ØµØ© Ø±Ù‚Ù…ÙŠØ© Ù…ØªÙƒØ§Ù…Ù„Ø© Ù„Ø¥Ø¯Ø§Ø±Ø© Ø®Ø¯Ù…Ø§Øª Ø§Ù„Ø£Ù…Ù„Ø§Ùƒ ÙˆØ§Ù„ØµÙŠØ§Ù†Ø©' : 'An Integrated Digital Platform for Property Services & Maintenance Management'; ?></h1>
                <p class="pc__hero-copy">
                    <?php echo $is_rtl
                        ? 'PropCare 360 ØªØ³Ø§Ø¹Ø¯ Ø´Ø±ÙƒØ§Øª Ø®Ø¯Ù…Ø§Øª Ø§Ù„Ø£Ù…Ù„Ø§Ùƒ Ø¹Ù„Ù‰ Ø£ØªÙ…ØªØ© Ø§Ù„Ø¹Ù…Ù„ÙŠØ§ØªØŒ Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ø¹Ù‚ÙˆØ¯ØŒ ÙˆØ±ÙØ¹ ÙƒÙØ§Ø¡Ø© ÙØ±Ù‚ Ø§Ù„ØµÙŠØ§Ù†Ø© Ø¹Ø¨Ø± ØªØ¬Ø±Ø¨Ø© Ù…Ø³ØªØ®Ø¯Ù… Ø¹Ø§Ù„Ù…ÙŠØ©.'
                        : 'PropCare 360 helps property service companies automate operations, manage contracts, and boost maintenance team efficiency through a world-class user experience.'; ?>
                </p>
            </div>

            <div class="pc__hero-visual" data-pc-reveal data-pc-delay="150" data-pc-parallax>

                <div class="pc__float pc__float--1" aria-hidden="true">
                    <span class="material-symbols-outlined pc__float-icon pc__float-icon--secondary" aria-hidden="true">verified_user</span>
                    <span><?php echo $is_rtl ? 'Ø¹Ù‚ÙˆØ¯ Ù†Ø´Ø·Ø©' : 'Active Contracts'; ?></span>
                </div>
                <div class="pc__float pc__float--2" aria-hidden="true">
                    <span class="material-symbols-outlined pc__float-icon pc__float-icon--error" aria-hidden="true">pending_actions</span>
                    <span><?php echo $is_rtl ? 'Ø·Ù„Ø¨Ø§Øª Ù…Ø¹Ù„Ù‚Ø©' : 'Pending Requests'; ?></span>
                </div>
                <div class="pc__float pc__float--3" aria-hidden="true">
                    <span class="material-symbols-outlined pc__float-icon pc__float-icon--tertiary" aria-hidden="true">check_circle</span>
                    <span><?php echo $is_rtl ? 'Ø²ÙŠØ§Ø±Ø§Øª Ù…ÙƒØªÙ…Ù„Ø©' : 'Completed Visits'; ?></span>
                </div>

                <div class="pc__hero-frame">
                    <div class="pc__browser pc__media-reveal">
                        <div class="pc__browser-chrome" aria-hidden="true">
                            <span class="pc__browser-dot pc__browser-dot--red"></span>
                            <span class="pc__browser-dot pc__browser-dot--gold"></span>
                            <span class="pc__browser-dot pc__browser-dot--green"></span>
                        </div>
                        <img
                            src="<?php echo $pc_img( 'admin-dashboard-overview.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… PropCare 360 â€” Ù†Ø¸Ø±Ø© Ø¹Ø§Ù…Ø© Ø¹Ù„Ù‰ Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª ÙˆØ§Ù„Ø¹Ù‚ÙˆØ¯' : 'PropCare 360 Admin Dashboard â€” Overview of Operations and Contracts' ); ?>"
                            width="1440"
                            height="900"
                            loading="eager"
                            fetchpriority="high"
                            decoding="async"
                        />
                    </div>
                    <div class="pc__hero-phone pc__media-reveal">
                        <img
                            src="<?php echo $pc_img( 'mobile-home.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'ØªØ·Ø¨ÙŠÙ‚ PropCare 360 â€” Ø§Ù„Ø´Ø§Ø´Ø© Ø§Ù„Ø±Ø¦ÙŠØ³ÙŠØ© Ù„Ù„Ø¹Ù…ÙŠÙ„' : 'PropCare 360 Mobile App â€” Customer Home Screen' ); ?>"
                            width="390"
                            height="844"
                            loading="eager"
                            fetchpriority="high"
                            decoding="async"
                        />
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         02 Â· Ø§Ù„ØªØ­Ø¯ÙŠØ§Øª (Before / After)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="pc__challenge" id="challenge" aria-labelledby="pc-challenge-title">
        <div class="pc__container">

            <div class="pc__challenge-head" data-pc-reveal>
                <h2 class="pc__h2 pc__h2--light pc__h2--center" id="pc-challenge-title"><?php echo $is_rtl ? 'Ø§Ù„ØªØ­Ø¯ÙŠØ§Øª ÙˆØ­Ù„ÙˆÙ„ Ø§Ù„ØªØ­ÙˆÙ„ Ø§Ù„Ø±Ù‚Ù…ÙŠ' : 'Challenges & Digital Transformation Solutions'; ?></h2>
                <span class="pc__underline" aria-hidden="true"></span>
            </div>

            <div class="pc__challenge-grid" data-pc-reveal-group>

                <article class="pc__before" data-pc-reveal>
                    <h3 class="pc__before-title">
                        <span class="material-symbols-outlined" aria-hidden="true">history</span> <?php echo $is_rtl ? 'Ù‚Ø¨Ù„ Ø§Ù„ØªØ­ÙˆÙ„' : 'Before Transformation'; ?>
                    </h3>
                    <ul class="pc__numbered-list">
                        <li>
                            <span class="pc__num pc__num--error" aria-hidden="true">01</span>
                            <p><?php echo $is_rtl ? 'ØªÙˆØ§ØµÙ„ ÙŠØ¯ÙˆÙŠ Ù…Ø¨Ø¹Ø«Ø± Ø¹Ø¨Ø± Ø§Ù„Ù…ÙƒØ§Ù„Ù…Ø§Øª ÙˆØ§Ù„Ø±Ø³Ø§Ø¦Ù„ Ù…Ù…Ø§ ÙŠØ¤Ø¯ÙŠ Ù„Ø¶ÙŠØ§Ø¹ Ø·Ù„Ø¨Ø§Øª Ø§Ù„Ø¹Ù…Ù„Ø§Ø¡.' : 'Scattered manual communication via calls and messages, leading to lost customer requests.'; ?></p>
                        </li>
                        <li>
                            <span class="pc__num pc__num--error" aria-hidden="true">02</span>
                            <p><?php echo $is_rtl ? 'ØºÙŠØ§Ø¨ ØªØ§Ù… Ù„Ù„Ø´ÙØ§ÙÙŠØ©Ø› Ø§Ù„Ø¹Ù…ÙŠÙ„ Ù„Ø§ ÙŠØ¹Ø±Ù Ø­Ø§Ù„Ø© Ø²ÙŠØ§Ø±ØªÙ‡ØŒ ÙˆØ§Ù„Ø¥Ø¯Ø§Ø±Ø© Ù„Ø§ ØªÙ…Ù„Ùƒ Ø¨ÙŠØ§Ù†Ø§Øª Ø¯Ù‚ÙŠÙ‚Ø©.' : 'Complete lack of transparency; customers cannot track visit status, and management lacks accurate data.'; ?></p>
                        </li>
                        <li>
                            <span class="pc__num pc__num--error" aria-hidden="true">03</span>
                            <p><?php echo $is_rtl ? 'ØµØ¹ÙˆØ¨Ø© Ù‡Ø§Ø¦Ù„Ø© ÙÙŠ ØªØªØ¨Ø¹ ØªØ¬Ø¯ÙŠØ¯ Ø§Ù„Ø¹Ù‚ÙˆØ¯ Ø§Ù„Ø³Ù†ÙˆÙŠØ© ÙˆØ¬Ø¯ÙˆÙ„Ø© Ø§Ù„ÙÙ†ÙŠÙŠÙ† Ù…ÙŠØ¯Ø§Ù†ÙŠØ§Ù‹.' : 'Major difficulty tracking annual contract renewals and scheduling field technicians.'; ?></p>
                        </li>
                    </ul>
                </article>

                <article class="pc__after" data-pc-reveal data-pc-delay="120">
                    <h3 class="pc__after-title">
                        <span class="material-symbols-outlined" aria-hidden="true">rocket_launch</span> <?php echo $is_rtl ? 'Ø¨Ø¹Ø¯ PropCare 360' : 'After PropCare 360'; ?>
                    </h3>
                    <ul class="pc__numbered-list">
                        <li>
                            <span class="pc__num pc__num--secondary" aria-hidden="true">01</span>
                            <p><?php echo $is_rtl ? 'Ù…Ù†ØµØ© Ù…ÙˆØ­Ø¯Ø© Ù„Ø§Ø³ØªÙ„Ø§Ù… ÙˆÙ…Ø¹Ø§Ù„Ø¬Ø© Ø§Ù„Ø·Ù„Ø¨Ø§Øª ØªØ¶Ù…Ù† Ø¹Ø¯Ù… ÙÙ‚Ø¯Ø§Ù† Ø£ÙŠ Ø¹Ù…ÙŠÙ„.' : 'A unified platform for receiving and processing requests, ensuring no customer is ever lost.'; ?></p>
                        </li>
                        <li>
                            <span class="pc__num pc__num--secondary" aria-hidden="true">02</span>
                            <p><?php echo $is_rtl ? 'ØªØ­Ø¯ÙŠØ«Ø§Øª ÙÙˆØ±ÙŠØ© Ù„Ù„Ø¹Ù…ÙŠÙ„ ÙˆÙ„ÙˆØ­Ø§Øª ØªØ­ÙƒÙ… ØªÙØ§Ø¹Ù„ÙŠØ© Ù„Ù„Ø¥Ø¯Ø§Ø±Ø© ÙÙŠ Ø§Ù„ÙˆÙ‚Øª Ø§Ù„ÙØ¹Ù„ÙŠ.' : 'Real-time customer updates and interactive management dashboards.'; ?></p>
                        </li>
                        <li>
                            <span class="pc__num pc__num--secondary" aria-hidden="true">03</span>
                            <p><?php echo $is_rtl ? 'Ø£ØªÙ…ØªØ© Ø°ÙƒÙŠØ© Ù„Ù„Ø¹Ù‚ÙˆØ¯ ÙˆØ¬Ø¯ÙˆÙ„Ø© ØªÙ„Ù‚Ø§Ø¦ÙŠØ© ØªÙˆÙØ± 60% Ù…Ù† Ø§Ù„ÙˆÙ‚Øª Ø§Ù„Ø¥Ø¯Ø§Ø±ÙŠ.' : 'Smart contract automation and automatic scheduling that saves 60% of administrative time.'; ?></p>
                        </li>
                    </ul>
                </article>

            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         03 Â· Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… Ø§Ù„Ø¥Ø¯Ø§Ø±Ø© (Dashboard Showcase)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="pc__dashboard" id="dashboard" aria-labelledby="pc-dashboard-title">
        <div class="pc__container">

            <div class="pc__dashboard-head" data-pc-reveal>
                <h2 class="pc__h2 pc__h2--center" id="pc-dashboard-title"><?php echo $is_rtl ? 'Ø§Ù„Ù‚ÙˆØ© Ø§Ù„Ù…Ø±ÙƒØ²ÙŠØ©: Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… Ø§Ù„Ø¥Ø¯Ø§Ø±Ø©' : 'Central Command: Admin Dashboard'; ?></h2>
                <p class="pc__dashboard-sub"><?php echo $is_rtl ? 'Ù…Ø±ÙƒØ² Ø¹Ù…Ù„ÙŠØ§Øª Ø´Ø§Ù…Ù„ ÙŠÙ…Ù†Ø­ ØµÙ†Ø§Ø¹ Ø§Ù„Ù‚Ø±Ø§Ø± Ø±Ø¤ÙŠØ© 360 Ø¯Ø±Ø¬Ø© Ù„ÙƒÙ„ Ù…Ø§ ÙŠØ­Ø¯Ø« ÙÙŠ Ø§Ù„Ù…Ù†Ø´Ø£Ø©.' : 'A comprehensive operations hub giving decision-makers a 360-degree view of everything happening across the organization.'; ?></p>
            </div>

            <figure class="pc__showcase-block" data-pc-reveal>
                <div class="pc__browser pc__browser--wide pc__media-reveal">
                    <div class="pc__browser-chrome" aria-hidden="true">
                        <span class="pc__browser-dot pc__browser-dot--red"></span>
                        <span class="pc__browser-dot pc__browser-dot--gold"></span>
                        <span class="pc__browser-dot pc__browser-dot--green"></span>
                    </div>
                    <img
                        src="<?php echo $pc_img( 'admin-dashboard-orders-chart.jpg' ); ?>"
                        alt="<?php echo esc_attr( $is_rtl ? 'ØªØ­Ù„ÙŠÙ„Ø§Øª Ø¹Ø±ÙˆØ¶ Ø§Ù„Ø£Ø³Ø¹Ø§Ø± ÙˆØ­Ø§Ù„Ø© Ø§Ù„ØµÙŠØ§Ù†Ø© Ø­Ø³Ø¨ Ù†ÙˆØ¹ Ø§Ù„Ø®Ø¯Ù…Ø© ÙˆØ§Ù„Ù…Ø¨Ù†Ù‰' : 'Quote analytics and maintenance status by service type and building' ); ?>"
                        width="1440"
                        height="900"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
                <figcaption class="pc__showcase-caption pc__showcase-caption--center">
                    <h3><?php echo $is_rtl ? 'ØªØ­Ù„ÙŠÙ„Ø§Øª Ø°ÙƒÙŠØ© ÙˆØ¹Ø±ÙˆØ¶ Ø§Ù„Ø£Ø³Ø¹Ø§Ø±' : 'Smart Analytics & Quotes'; ?></h3>
                    <p><?php echo $is_rtl ? 'ØªØ­Ù„ÙŠÙ„Ø§Øª ÙˆØ§Ø¶Ø­Ø© Ù„Ø¹Ø±ÙˆØ¶ Ø§Ù„Ø£Ø³Ø¹Ø§Ø± ÙˆØ­Ø§Ù„Ø© Ø§Ù„ØµÙŠØ§Ù†Ø©ØŒ Ù…ØµÙ†ÙØ© Ø­Ø³Ø¨ Ù†ÙˆØ¹ Ø§Ù„Ø®Ø¯Ù…Ø© ÙˆØ§Ù„Ù…Ø¨Ù†Ù‰.' : 'Clear analytics for quotes and maintenance status, categorized by service type and building.'; ?></p>
                </figcaption>
            </figure>

            <div class="pc__showcase-2col" data-pc-reveal-group>
                <figure class="pc__showcase-block" data-pc-reveal>
                    <div class="pc__browser pc__media-reveal">
                        <div class="pc__browser-chrome" aria-hidden="true">
                            <span class="pc__browser-dot pc__browser-dot--red"></span>
                            <span class="pc__browser-dot pc__browser-dot--gold"></span>
                            <span class="pc__browser-dot pc__browser-dot--green"></span>
                        </div>
                        <img
                            src="<?php echo $pc_img( 'admin-dashboard-service-chart.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'ØªÙ‚Ø§Ø±ÙŠØ± ØªØ´ØºÙŠÙ„ÙŠØ© ÙˆÙ…Ø¤Ø´Ø±Ø§Øª Ø¥Ù†Ø¬Ø§Ø² Ø§Ù„Ø®Ø¯Ù…Ø§Øª Ø§Ù„ÙŠÙˆÙ…ÙŠØ©' : 'Operational reports and daily service performance metrics' ); ?>"
                            width="1200"
                            height="800"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <figcaption class="pc__showcase-caption">
                        <h3><?php echo $is_rtl ? 'ØªÙ‚Ø§Ø±ÙŠØ± ØªØ´ØºÙŠÙ„ÙŠØ©' : 'Operational Reports'; ?></h3>
                        <p><?php echo $is_rtl ? 'ØªÙ‚Ø§Ø±ÙŠØ± ØªØ´ØºÙŠÙ„ÙŠØ© ØªØ³Ø§Ø¹Ø¯ Ø§Ù„Ø¥Ø¯Ø§Ø±Ø© Ø¹Ù„Ù‰ Ù…ØªØ§Ø¨Ø¹Ø© Ø§Ù„Ø£Ø¯Ø§Ø¡ ÙˆÙ…Ø¤Ø´Ø±Ø§Øª Ø§Ù„Ø¥Ù†Ø¬Ø§Ø² Ø§Ù„ÙŠÙˆÙ…ÙŠØ©.' : 'Operational reports that help management track performance and daily achievement metrics.'; ?></p>
                    </figcaption>
                </figure>
                <figure class="pc__showcase-block" data-pc-reveal data-pc-delay="120">
                    <div class="pc__browser pc__media-reveal">
                        <div class="pc__browser-chrome" aria-hidden="true">
                            <span class="pc__browser-dot pc__browser-dot--red"></span>
                            <span class="pc__browser-dot pc__browser-dot--gold"></span>
                            <span class="pc__browser-dot pc__browser-dot--green"></span>
                        </div>
                        <img
                            src="<?php echo $pc_img( 'admin-dashboard-summary.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'Ù…Ù„Ø®Øµ Ù…Ø¤Ø´Ø±Ø§Øª Ø§Ù„Ø¹Ù‚ÙˆØ¯ ÙˆØ§Ù„Ø²ÙŠØ§Ø±Ø§Øª ÙˆØ§Ù„Ø·Ù„Ø¨Ø§Øª ÙÙŠ Ù„ÙˆØ­Ø© Ø§Ù„ØªØ­ÙƒÙ…' : 'Summary of contracts, visits, and request metrics in the admin dashboard' ); ?>"
                            width="1200"
                            height="800"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <figcaption class="pc__showcase-caption">
                        <h3><?php echo $is_rtl ? 'Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ø¹Ù‚ÙˆØ¯ ÙˆØ§Ù„Ø²ÙŠØ§Ø±Ø§Øª' : 'Contract & Visit Management'; ?></h3>
                        <p><?php echo $is_rtl ? 'Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… ØªØ¹Ø±Ø¶ Ù…Ø¤Ø´Ø±Ø§Øª Ø§Ù„Ø¹Ù‚ÙˆØ¯ ÙˆØ§Ù„Ø²ÙŠØ§Ø±Ø§Øª ÙˆØ§Ù„Ø·Ù„Ø¨Ø§Øª Ø¨Ø¯Ù‚Ø© Ù…ØªÙ†Ø§Ù‡ÙŠØ©.' : 'A dashboard displaying contracts, visits, and request metrics with pinpoint accuracy.'; ?></p>
                    </figcaption>
                </figure>
            </div>

            <figure class="pc__showcase-block" data-pc-reveal>
                <div class="pc__browser pc__browser--wide pc__media-reveal">
                    <div class="pc__browser-chrome" aria-hidden="true">
                        <span class="pc__browser-dot pc__browser-dot--red"></span>
                        <span class="pc__browser-dot pc__browser-dot--gold"></span>
                        <span class="pc__browser-dot pc__browser-dot--green"></span>
                    </div>
                    <img
                        src="<?php echo $pc_img( 'admin-dashboard-full.jpg' ); ?>"
                        alt="<?php echo esc_attr( $is_rtl ? 'ÙˆØ§Ø¬Ù‡Ø© Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ø®Ø¯Ù…Ø§Øª ÙˆØ§Ù„Ù…Ø­ØªÙˆÙ‰ Ø¨Ù…Ø§ ÙÙŠ Ø°Ù„Ùƒ Ø§Ù„Ø¨Ø§Ù†Ø±Ø§Øª ÙˆØ§Ù„Ø£Ø³Ø¦Ù„Ø© Ø§Ù„Ø´Ø§Ø¦Ø¹Ø©' : 'Services and content management interface including banners and FAQs' ); ?>"
                        width="1440"
                        height="900"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
                <figcaption class="pc__showcase-caption pc__showcase-caption--center">
                    <h3><?php echo $is_rtl ? 'Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ø®Ø¯Ù…Ø§Øª ÙˆØ§Ù„Ù…Ø­ØªÙˆÙ‰' : 'Services & Content Management'; ?></h3>
                    <p><?php echo $is_rtl ? 'Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ø®Ø¯Ù…Ø§Øª ÙˆØ§Ù„Ù…Ø­ØªÙˆÙ‰ Ù…Ù† Ù…ÙƒØ§Ù† ÙˆØ§Ø­Ø¯ØŒ Ø¨Ù…Ø§ ÙÙŠ Ø°Ù„Ùƒ Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª Ø§Ù„Ù…ÙˆÙ‚Ø¹ØŒ Ø§Ù„Ø¨Ø§Ù†Ø±Ø§ØªØŒ ÙˆØ§Ù„Ø£Ø³Ø¦Ù„Ø© Ø§Ù„Ø´Ø§Ø¦Ø¹Ø©.' : 'Manage services and content from one place, including site settings, banners, and FAQs.'; ?></p>
                </figcaption>
            </figure>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         04 Â· Feature Spotlights (3 alternating rows)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="pc__spotlights" aria-label="<?php echo esc_attr( $is_rtl ? 'Ø£Ø¨Ø±Ø² Ù…Ù…ÙŠØ²Ø§Øª Ø§Ù„Ù…Ù†ØµØ©' : 'Platform Feature Highlights' ); ?>">
        <div class="pc__container pc__spotlights-inner">

            <article class="pc__spotlight" data-pc-reveal>
                <div class="pc__spotlight-text">
                    <span class="pc__pill pc__pill--secondary"><?php echo $is_rtl ? 'Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ø¹Ù‚ÙˆØ¯ ÙˆØ§Ù„Ø²ÙŠØ§Ø±Ø§Øª' : 'Contract & Visit Management'; ?></span>
                    <h2 class="pc__h2"><?php echo $is_rtl ? 'ØªØ­ÙƒÙ… ÙƒØ§Ù…Ù„ ÙÙŠ Ø§Ù„Ø¹Ù‚ÙˆØ¯ Ø§Ù„Ø³Ù†ÙˆÙŠØ©' : 'Full Control Over Annual Contracts'; ?></h2>
                    <p class="pc__p"><?php echo $is_rtl ? 'Ø£ØªÙ…ØªØ© Ø¹Ù…Ù„ÙŠØ© ØªØ¬Ø¯ÙŠØ¯ Ø§Ù„Ø¹Ù‚ÙˆØ¯ Ù…Ø¹ Ø¥Ø±Ø³Ø§Ù„ ØªÙ†Ø¨ÙŠÙ‡Ø§Øª Ø°ÙƒÙŠØ© Ù„Ù„Ø¹Ù…Ù„Ø§Ø¡ Ù‚Ø¨Ù„ Ø§Ù†ØªÙ‡Ø§Ø¡ Ø§Ù„Ø§Ø´ØªØ±Ø§ÙƒØŒ Ù…Ù…Ø§ ÙŠØ¶Ù…Ù† Ø§Ø³ØªÙ…Ø±Ø§Ø±ÙŠØ© Ø§Ù„Ø¥ÙŠØ±Ø§Ø¯Ø§Øª ÙˆØ§Ù„Ø®Ø¯Ù…Ø©.' : 'Automate contract renewals with smart alerts sent to customers before subscription expiry, ensuring revenue continuity and uninterrupted service.'; ?></p>
                    <ul class="pc__checklist">
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'ØªÙ†Ø¨ÙŠÙ‡Ø§Øª Ø¢Ù„ÙŠØ© Ù„Ù„ØªØ¬Ø¯ÙŠØ¯' : 'Automated renewal alerts'; ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'Ø£Ø±Ø´ÙØ© Ø±Ù‚Ù…ÙŠØ© Ù„ÙƒØ§ÙØ© Ø¨Ù†ÙˆØ¯ Ø§Ù„Ø¹Ù‚Ø¯' : 'Digital archive of all contract terms'; ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'Ø¬Ø¯ÙˆÙ„Ø© Ø§Ù„Ø²ÙŠØ§Ø±Ø§Øª Ø§Ù„Ø¯ÙˆØ±ÙŠØ© ØªÙ„Ù‚Ø§Ø¦ÙŠØ§Ù‹' : 'Automatic recurring visit scheduling'; ?></li>
                    </ul>
                </div>
                <div class="pc__spotlight-visual pc__spotlight-visual--secondary pc__media-reveal">
                    <img
                        src="<?php echo $pc_img( 'mobile-subscriptions.jpg' ); ?>"
                        alt="<?php echo esc_attr( $is_rtl ? 'Ø´Ø§Ø´Ø© Ø§Ø´ØªØ±Ø§ÙƒØ§Øª Ø§Ù„Ø¹Ù‚ÙˆØ¯ Ø§Ù„Ø³Ù†ÙˆÙŠØ© ÙÙŠ ØªØ·Ø¨ÙŠÙ‚ PropCare 360' : 'Annual contract subscriptions screen in the PropCare 360 app' ); ?>"
                        width="390"
                        height="844"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </article>

            <article class="pc__spotlight pc__spotlight--reverse" data-pc-reveal>
                <div class="pc__spotlight-text">
                    <span class="pc__pill pc__pill--primary"><?php echo $is_rtl ? 'Ø·Ù„Ø¨Ø§Øª Ø§Ù„ØµÙŠØ§Ù†Ø©' : 'Maintenance Requests'; ?></span>
                    <h2 class="pc__h2"><?php echo $is_rtl ? 'Ø±ÙØ¹ Ø§Ù„Ø·Ù„Ø¨Ø§Øª ÙˆÙ…ØªØ§Ø¨Ø¹Ø© Ø§Ù„Ø­Ø§Ù„Ø©' : 'Submit Requests & Track Status'; ?></h2>
                    <p class="pc__p"><?php echo $is_rtl ? 'ÙˆØ§Ø¬Ù‡Ø© Ø¨Ø¯ÙŠÙ‡ÙŠØ© ØªØ³Ù…Ø­ Ù„Ù„Ø¹Ù…Ù„Ø§Ø¡ Ø¨ÙˆØµÙ Ø§Ù„Ù…Ø´ÙƒÙ„Ø©ØŒ Ø¥Ø±ÙØ§Ù‚ Ø§Ù„ØµÙˆØ±ØŒ ÙˆØªØ­Ø¯ÙŠØ¯ Ø§Ù„Ù…ÙˆÙ‚Ø¹ Ø§Ù„Ø¬ØºØ±Ø§ÙÙŠ Ø¨Ø¯Ù‚Ø© ÙÙŠ Ø«ÙˆØ§Ù†Ù Ù…Ø¹Ø¯ÙˆØ¯Ø©.' : 'An intuitive interface that lets customers describe the issue, attach photos, and pinpoint their location in seconds.'; ?></p>
                    <ul class="pc__checklist">
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'Ø¥Ø±ÙØ§Ù‚ ØµÙˆØ± ÙˆÙÙŠØ¯ÙŠÙˆÙ‡Ø§Øª Ù„Ù„Ù…Ø´ÙƒÙ„Ø©' : 'Attach photos and videos of the issue'; ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'ØªØªØ¨Ø¹ Ø­ÙŠ Ù„Ù…Ø±Ø§Ø­Ù„ Ø§Ù„Ø·Ù„Ø¨' : 'Live tracking of request stages'; ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'Ø¯Ø±Ø¯Ø´Ø© Ù…Ø¨Ø§Ø´Ø±Ø© Ù…Ø¹ Ø§Ù„Ø¯Ø¹Ù… Ø§Ù„ÙÙ†ÙŠ' : 'Direct chat with technical support'; ?></li>
                    </ul>
                </div>
                <div class="pc__spotlight-visual pc__spotlight-visual--primary pc__media-reveal">
                    <img
                        src="<?php echo $pc_img( 'mobile-support-request.jpg' ); ?>"
                        alt="<?php echo esc_attr( $is_rtl ? 'Ø´Ø§Ø´Ø© Ø±ÙØ¹ Ø·Ù„Ø¨ ØµÙŠØ§Ù†Ø© Ø¬Ø¯ÙŠØ¯ Ù…Ø¹ ØªÙØ§ØµÙŠÙ„ Ø§Ù„Ù…Ø´ÙƒÙ„Ø©' : 'New maintenance request screen with issue details' ); ?>"
                        width="390"
                        height="844"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </article>

            <article class="pc__spotlight" data-pc-reveal>
                <div class="pc__spotlight-text">
                    <span class="pc__pill pc__pill--tertiary"><?php echo $is_rtl ? 'Ø¹Ø±ÙˆØ¶ Ø§Ù„Ø£Ø³Ø¹Ø§Ø±' : 'Quotes'; ?></span>
                    <h2 class="pc__h2"><?php echo $is_rtl ? 'Ù…Ø´Ø§Ø±ÙŠØ¹ New Ùˆ Reno' : 'New & Reno Projects'; ?></h2>
                    <p class="pc__p"><?php echo $is_rtl ? 'Ø³ÙˆØ§Ø¡ ÙƒØ§Ù† Ø§Ù„Ø¹Ù…ÙŠÙ„ ÙŠØ±ØºØ¨ ÙÙŠ ØªØ£Ø³ÙŠØ³ Ø¬Ø¯ÙŠØ¯ (New) Ø£Ùˆ ØªØ±Ù…ÙŠÙ… Ù…Ø¨Ù†Ù‰ Ù‚Ø§Ø¦Ù… (Reno)ØŒ Ø§Ù„Ù…Ù†ØµØ© ØªÙˆÙØ± ØªØ¯ÙÙ‚ Ø¹Ù…Ù„ Ù…Ø®ØµØµ Ù„ÙƒÙ„ Ø­Ø§Ù„Ø©.' : 'Whether the customer needs a new build (New) or renovation of an existing property (Reno), the platform provides a tailored workflow for each scenario.'; ?></p>
                    <ul class="pc__checklist">
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'ØªÙ‚Ø¯ÙŠÙ… Ø¹Ø±Ø¶ Ø³Ø¹Ø± Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠ Ù…ÙØµÙ„' : 'Submit detailed electronic quotes'; ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'Ø§Ù„Ù…ÙˆØ§ÙÙ‚Ø© ÙˆØ§Ù„Ø¯ÙØ¹ Ø§Ù„Ø±Ù‚Ù…ÙŠ Ø§Ù„ÙÙˆØ±ÙŠ' : 'Instant digital approval and payment'; ?></li>
                        <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo $is_rtl ? 'Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ø´Ø§Ø±ÙŠØ¹ Ø¹Ø¨Ø± Ù…Ø±Ø§Ø­Ù„ Ø²Ù…Ù†ÙŠØ©' : 'Project management across timeline stages'; ?></li>
                    </ul>
                </div>
                <div class="pc__spotlight-visual pc__spotlight-visual--tertiary pc__media-reveal">
                    <img
                        src="<?php echo $pc_img( 'mobile-services.jpg' ); ?>"
                        alt="<?php echo esc_attr( $is_rtl ? 'Ø´Ø§Ø´Ø© Ø®Ø¯Ù…Ø§Øª Ø¹Ø±ÙˆØ¶ Ø§Ù„Ø£Ø³Ø¹Ø§Ø± Ù„Ù…Ø´Ø§Ø±ÙŠØ¹ Ø§Ù„ØªØ£Ø³ÙŠØ³ ÙˆØ§Ù„ØªØ±Ù…ÙŠÙ…' : 'Quote services screen for new build and renovation projects' ); ?>"
                        width="390"
                        height="844"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </article>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         05 Â· Ø±Ø­Ù„Ø© Ø§Ù„Ø¹Ù…ÙŠÙ„ Ø§Ù„Ø±Ù‚Ù…ÙŠØ© (Mobile App Journey)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="pc__journey" id="app" aria-labelledby="pc-journey-title">
        <div class="pc__container">
            <div class="pc__journey-head" data-pc-reveal>
                <h2 class="pc__h2 pc__h2--center" id="pc-journey-title"><?php echo $is_rtl ? 'Ø±Ø­Ù„Ø© Ø§Ù„Ø¹Ù…ÙŠÙ„ Ø§Ù„Ø±Ù‚Ù…ÙŠØ©' : 'The Digital Customer Journey'; ?></h2>
                <p class="pc__journey-sub"><?php echo $is_rtl ? 'ØªØ¯ÙÙ‚Ø§Øª Ù…Ø³ØªØ®Ø¯Ù… Ù…Ø¯Ø±ÙˆØ³Ø© Ø¨Ø¹Ù†Ø§ÙŠØ© Ù„Ø¶Ù…Ø§Ù† Ø£Ø¹Ù„Ù‰ Ù…Ø¹Ø¯Ù„Ø§Øª Ø§Ù„ØªØ­ÙˆÙŠÙ„ ÙˆØ§Ù„Ø±Ø¶Ø§.' : 'Carefully crafted user flows designed to maximize conversion rates and customer satisfaction.'; ?></p>
            </div>

            <div class="pc__journey-grid" data-pc-reveal-group>

                <article class="pc__journey-item" data-pc-reveal>
                    <div class="pc__mini-frame pc__media-reveal">
                        <img
                            src="<?php echo $pc_img( 'mobile-home.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'Ø§Ù„Ø´Ø§Ø´Ø© Ø§Ù„Ø±Ø¦ÙŠØ³ÙŠØ© ÙˆÙ„ÙˆØ­Ø© ØªØ­ÙƒÙ… Ø§Ù„Ø¹Ù…ÙŠÙ„' : 'Home screen and customer dashboard' ); ?>"
                            width="390"
                            height="844"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <h3><?php echo $is_rtl ? 'Ø§Ù„Ø±Ø¦ÙŠØ³ÙŠØ© ÙˆÙ„ÙˆØ­Ø© Ø§Ù„ØªØ­ÙƒÙ…' : 'Home & Dashboard'; ?></h3>
                    <p><?php echo $is_rtl ? 'Ù†Ø¸Ø±Ø© Ø´Ø§Ù…Ù„Ø© Ø¹Ù„Ù‰ Ø§Ù„Ø®Ø¯Ù…Ø§Øª ÙˆØ§Ù„Ø¹Ø±ÙˆØ¶' : 'A comprehensive overview of services and offers'; ?></p>
                </article>

                <article class="pc__journey-item pc__journey-item--offset" data-pc-reveal data-pc-delay="80">
                    <div class="pc__mini-frame pc__media-reveal">
                        <img
                            src="<?php echo $pc_img( 'mobile-subscriptions.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'Ø§Ø´ØªØ±Ø§ÙƒØ§Øª ÙˆØ¨ÙŠØ§Ù†Ø§Øª Ø§Ù„Ø¹Ù…ÙŠÙ„ ÙˆØ§Ù„Ø¹Ù‚Ø§Ø±Ø§Øª' : 'Subscriptions, customer data, and properties' ); ?>"
                            width="390"
                            height="844"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <h3><?php echo $is_rtl ? 'Ø¨ÙŠØ§Ù†Ø§Øª Ø§Ù„Ø¹Ù…ÙŠÙ„' : 'Customer Profile'; ?></h3>
                    <p><?php echo $is_rtl ? 'Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ø¹Ù„ÙˆÙ…Ø§Øª Ø§Ù„Ø´Ø®ØµÙŠØ© ÙˆØ§Ù„Ø¹Ù‚Ø§Ø±Ø§Øª' : 'Manage personal information and properties'; ?></p>
                </article>

                <article class="pc__journey-item" data-pc-reveal data-pc-delay="160">
                    <div class="pc__mini-frame pc__media-reveal">
                        <img
                            src="<?php echo $pc_img( 'mobile-menu.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'Ø§Ù„Ù‚Ø§Ø¦Ù…Ø© Ø§Ù„Ø¬Ø§Ù†Ø¨ÙŠØ© Ù„Ù„ØªÙ†Ù‚Ù„ Ø¨ÙŠÙ† Ø£Ù‚Ø³Ø§Ù… Ø§Ù„ØªØ·Ø¨ÙŠÙ‚' : 'Side menu for navigating app sections' ); ?>"
                            width="390"
                            height="844"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <h3><?php echo $is_rtl ? 'Ø§Ù„Ù‚Ø§Ø¦Ù…Ø© Ø§Ù„Ø¬Ø§Ù†Ø¨ÙŠØ©' : 'Side Menu'; ?></h3>
                    <p><?php echo $is_rtl ? 'Ø³Ù‡ÙˆÙ„Ø© Ø§Ù„ÙˆØµÙˆÙ„ Ù„ÙƒØ§ÙØ© Ø£Ù‚Ø³Ø§Ù… Ø§Ù„Ù…Ù†ØµØ©' : 'Easy access to all platform sections'; ?></p>
                </article>

                <article class="pc__journey-item pc__journey-item--offset" data-pc-reveal data-pc-delay="240">
                    <div class="pc__mini-frame pc__media-reveal">
                        <img
                            src="<?php echo $pc_img( 'mobile-support-request.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'Ù†Ù…ÙˆØ°Ø¬ Ø·Ù„Ø¨ ØµÙŠØ§Ù†Ø© Ø¬Ø¯ÙŠØ¯ Ø¨Ø®Ø·ÙˆØ§Øª Ø¨Ø³ÙŠØ·Ø©' : 'New maintenance request form with simple steps' ); ?>"
                            width="390"
                            height="844"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <h3><?php echo $is_rtl ? 'Ø·Ù„Ø¨ ØµÙŠØ§Ù†Ø© Ø¬Ø¯ÙŠØ¯' : 'New Maintenance Request'; ?></h3>
                    <p><?php echo $is_rtl ? 'Ø®Ø·ÙˆØ§Øª Ø¨Ø³ÙŠØ·Ø© Ù„Ø±ÙØ¹ Ø¨Ù„Ø§Øº ØµÙŠØ§Ù†Ø©' : 'Simple steps to submit a maintenance ticket'; ?></p>
                </article>

                <article class="pc__journey-item" data-pc-reveal data-pc-delay="320">
                    <div class="pc__mini-frame pc__media-reveal">
                        <img
                            src="<?php echo $pc_img( 'mobile-request-details.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'ØªØ®ØµÙŠØµ Ø§Ù„Ø·Ù„Ø¨ Ø­Ø³Ø¨ Ù†ÙˆØ¹ Ø§Ù„Ø®Ø¯Ù…Ø© ÙˆØ§Ù„Ù…Ø¨Ù†Ù‰' : 'Customize request by service type and building' ); ?>"
                            width="390"
                            height="844"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <h3><?php echo $is_rtl ? 'ØªØ®ØµÙŠØµ Ø§Ù„Ø·Ù„Ø¨' : 'Request Customization'; ?></h3>
                    <p><?php echo $is_rtl ? 'ØªØ­Ø¯ÙŠØ¯ Ù†ÙˆØ¹ Ø§Ù„Ø®Ø¯Ù…Ø© ÙˆØ§Ù„Ù…Ø¨Ù†Ù‰ Ø¨Ø¯Ù‚Ø©' : 'Specify service type and building with precision'; ?></p>
                </article>

                <article class="pc__journey-item pc__journey-item--offset" data-pc-reveal data-pc-delay="400">
                    <div class="pc__mini-frame pc__media-reveal">
                        <img
                            src="<?php echo $pc_img( 'mobile-orders-history.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'ØªØ°Ø§ÙƒØ± Ø§Ù„Ø¯Ø¹Ù… Ø§Ù„ÙÙ†ÙŠ ÙˆÙ…ØªØ§Ø¨Ø¹Ø© Ø­Ø§Ù„Ø© Ø§Ù„Ù…Ø´ÙƒÙ„Ø§Øª' : 'Support tickets and issue status tracking' ); ?>"
                            width="390"
                            height="844"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <h3><?php echo $is_rtl ? 'ØªØ°Ø§ÙƒØ± Ø§Ù„Ø¯Ø¹Ù… Ø§Ù„ÙÙ†ÙŠ' : 'Support Tickets'; ?></h3>
                    <p><?php echo $is_rtl ? 'Ù…ØªØ§Ø¨Ø¹Ø© Ø­Ø§Ù„Ø© Ø§Ù„Ù…Ø´ÙƒÙ„Ø§Øª Ø§Ù„ØªÙ‚Ù†ÙŠØ©' : 'Track the status of technical issues'; ?></p>
                </article>

                <article class="pc__journey-item pc__journey-item--wide" data-pc-reveal data-pc-delay="480">
                    <div class="pc__mini-frame pc__media-reveal">
                        <img
                            src="<?php echo $pc_img( 'mobile-chat.jpg' ); ?>"
                            alt="<?php echo esc_attr( $is_rtl ? 'Ù…Ø­Ø§Ø¯Ø«Ø© Ø¯Ø¹Ù… ÙÙ†ÙŠ Ù…Ø¨Ø§Ø´Ø±Ø© Ø¯Ø§Ø®Ù„ Ø§Ù„ØªØ·Ø¨ÙŠÙ‚' : 'Live in-app technical support chat' ); ?>"
                            width="390"
                            height="844"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <h3><?php echo $is_rtl ? 'Ø§Ù„Ø¯Ø±Ø¯Ø´Ø© Ø§Ù„Ù…Ø¨Ø§Ø´Ø±Ø©' : 'Live Chat'; ?></h3>
                    <p><?php echo $is_rtl ? 'ØªÙˆØ§ØµÙ„ ÙÙˆØ±ÙŠ Ù…Ø¹ ÙØ±ÙŠÙ‚ Ø§Ù„Ø¯Ø¹Ù…' : 'Instant communication with the support team'; ?></p>
                </article>

            </div>
        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         06 Â· ØªØ·Ø¨ÙŠÙ‚ Ø§Ù„ÙÙ†ÙŠÙŠÙ† (V2 Technician App)
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="pc__v2" aria-labelledby="pc-v2-title">
        <div class="pc__v2-skew" aria-hidden="true"></div>
        <div class="pc__container pc__v2-inner">

            <div class="pc__v2-text" data-pc-reveal>
                <span class="pc__v2-badge"><?php echo $is_rtl ? 'Ø§Ù„ØªÙˆØ³Ø¹ Ø§Ù„Ù…Ø³ØªÙ‚Ø¨Ù„ÙŠ' : 'Future Expansion'; ?></span>
                <h2 class="pc__h2 pc__h2--light" id="pc-v2-title"><?php echo $is_rtl ? 'ØªØ·Ø¨ÙŠÙ‚ Ø§Ù„ÙÙ†ÙŠÙŠÙ† Ø§Ù„Ù…ÙŠØ¯Ø§Ù†ÙŠ (Ø§Ù„Ù…Ø±Ø­Ù„Ø© Ø§Ù„Ø«Ø§Ù†ÙŠØ©)' : 'Field Technician App (Phase Two)'; ?></h2>
                <p class="pc__v2-copy"><?php echo $is_rtl ? 'ØªÙ… ØªØ¬Ù‡ÙŠØ² Ø§Ù„Ù…Ù†ØµØ© Ù„Ù„ØªÙˆØ³Ø¹ Ù…Ø³ØªÙ‚Ø¨Ù„Ø§Ù‹ Ù…Ù† Ø®Ù„Ø§Ù„ ØªØ·Ø¨ÙŠÙ‚ Ù„Ù„ÙÙ†ÙŠÙŠÙ† ÙŠØºÙ„Ù‚ Ø§Ù„Ø­Ù„Ù‚Ø© Ø§Ù„ØªØ´ØºÙŠÙ„ÙŠØ© Ø¨Ø§Ù„ÙƒØ§Ù…Ù„ØŒ Ù…Ù…Ø§ ÙŠØ³Ù…Ø­ Ø¨Ù…ØªØ§Ø¨Ø¹Ø© Ø¯Ù‚ÙŠÙ‚Ø© Ù„ÙƒÙ„ Ø²ÙŠØ§Ø±Ø© Ù…ÙŠØ¯Ø§Ù†ÙŠØ©.' : 'The platform is built for future expansion with a technician app that closes the operational loop entirely, enabling precise tracking of every field visit.'; ?></p>
                <ul class="pc__v2-list">
                    <li><span class="material-symbols-outlined" aria-hidden="true">gps_fixed</span> <?php echo $is_rtl ? 'ØªÙƒØ§Ù…Ù„ Ù…Ø¹ GPS Ù„ØªØ­Ø¯ÙŠØ¯ Ù…ÙˆØ§Ù‚Ø¹ Ø§Ù„Ø¹Ù‚Ø§Ø±Ø§Øª Ø¨Ø¯Ù‚Ø©.' : 'GPS integration for precise property location tracking.'; ?></li>
                    <li><span class="material-symbols-outlined" aria-hidden="true">photo_camera</span> <?php echo $is_rtl ? 'ØªÙ‚Ø§Ø±ÙŠØ± ØµÙˆØ± Ø§Ù„Ø¥Ù†Ø¬Ø§Ø² (Ù‚Ø¨Ù„ ÙˆØ¨Ø¹Ø¯) Ø§Ù„Ø®Ø¯Ù…Ø© Ù…Ø¨Ø§Ø´Ø±Ø©.' : 'On-site before-and-after photo completion reports.'; ?></li>
                    <li><span class="material-symbols-outlined" aria-hidden="true">assignment_turned_in</span> <?php echo $is_rtl ? 'ØªÙˆØ²ÙŠØ¹ Ø°ÙƒÙŠ Ù„Ù„Ù…Ù‡Ø§Ù… Ø­Ø³Ø¨ Ø§Ù„Ù…ÙˆÙ‚Ø¹ ÙˆØ§Ù„Ø®Ø¨Ø±Ø©.' : 'Smart task assignment based on location and expertise.'; ?></li>
                </ul>
            </div>

            <div class="pc__v2-visual" data-pc-reveal data-pc-delay="150">
                <div class="pc__v2-phone pc__media-reveal">
                    <img
                        src="<?php echo $pc_img( 'mobile-splash.jpg' ); ?>"
                        alt="<?php echo esc_attr( $is_rtl ? 'Ù…ÙÙ‡ÙˆÙ… ØªØ·Ø¨ÙŠÙ‚ Ø§Ù„ÙÙ†ÙŠÙŠÙ† Ø§Ù„Ù…ÙŠØ¯Ø§Ù†ÙŠ â€” Ø§Ù„Ù…Ø±Ø­Ù„Ø© Ø§Ù„Ø«Ø§Ù†ÙŠØ©' : 'Field technician app concept â€” Phase Two' ); ?>"
                        width="390"
                        height="844"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
                <div class="pc__v2-tag" aria-hidden="true">
                    <?php if ( $is_rtl ) : ?>
                    <span>V2<br>Ù‚Ø±ÙŠØ¨Ø§Ù‹</span>
                    <?php else : ?>
                    <span>V2<br>Coming Soon</span>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         07 Â· CTA
    â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="pc__cta" aria-labelledby="pc-cta-title">
        <div class="pc__cta-bg" aria-hidden="true"></div>
        <div class="pc__container pc__cta-inner" data-pc-reveal>
            <h2 class="pc__cta-heading" id="pc-cta-title"><?php echo $is_rtl ? 'Ù‡Ù„ ØªØ­ØªØ§Ø¬ Ù…Ù†ØµØ© ØªØ´ØºÙŠÙ„ÙŠØ© Ù…Ø´Ø§Ø¨Ù‡Ø© Ù„Ø¹Ù…Ù„ÙƒØŸ' : 'Need a Similar Operations Platform for Your Business?'; ?></h2>
            <p class="pc__cta-copy">
                <?php echo $is_rtl
                    ? 'ÙÙŠ SpinesTechØŒ Ù†Ø­ÙˆÙ„ Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª Ø§Ù„Ù…Ø¹Ù‚Ø¯Ø© Ø¥Ù„Ù‰ Ù…Ù†ØªØ¬Ø§Øª Ø±Ù‚Ù…ÙŠØ© ÙˆØ§Ø¶Ø­Ø©ØŒ Ù‚Ø§Ø¨Ù„Ø© Ù„Ù„ØªÙˆØ³Ø¹ØŒ ÙˆÙ…ØµÙ…Ù…Ø© Ù„ØªØ®Ø¯Ù… ÙØ±Ù‚ Ø§Ù„ØªØ´ØºÙŠÙ„ ÙˆØ§Ù„Ø¹Ù…Ù„Ø§Ø¡ ÙÙŠ Ù†ÙØ³ Ø§Ù„ÙˆÙ‚Øª.'
                    : 'At SpinesTech, we transform complex operations into clear, scalable digital products designed to serve both operations teams and customers simultaneously.'; ?>
            </p>
            <span class="pc__cta-eyebrow">MOBILE APPS â€¢ DASHBOARDS â€¢ OPERATIONS PLATFORMS</span>

            <div class="pc__cta-ctas">
                <a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( '/contact/' ) : home_url( '/contact/' ) ); ?>" class="pc__btn pc__btn--secondary"><?php echo $is_rtl ? 'Ø§Ø¨Ø¯Ø£ Ù…Ø´Ø±ÙˆØ¹Ùƒ Ù…Ø¹ SpinesTech' : 'Start Your Project with SpinesTech'; ?></a>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'st_case_study' ) ?: ( function_exists( 'st_url' ) ? st_url( '/case-studies/' ) : home_url( '/case-studies/' ) ) ); ?>" class="pc__btn pc__btn--outline"><?php echo $is_rtl ? 'Ù…Ø´Ø§Ù‡Ø¯Ø© Ø£Ø¹Ù…Ø§Ù„Ù†Ø§ Ø§Ù„Ø³Ø§Ø¨Ù‚Ø©' : 'View Our Previous Work'; ?></a>
            </div>
        </div>
    </section>

</main><!-- /.pc -->

<?php get_footer(); ?>

