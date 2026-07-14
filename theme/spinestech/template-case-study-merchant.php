<?php
/**
 * Template Name: Case Study — Merchant
 * Template Post Type: st_case_study
 *
 * theme/spinestech/template-case-study-merchant.php
 *
 * Fully static, hardcoded one-off case study page for the "Merchant"
 * project. Assign this template to the specific st_case_study post
 * from Page Attributes → Template in the WP editor.
 *
 * No dynamic postmeta, no ACF — every section is literal content
 * matching the approved design 1:1. Uses the theme's real header/
 * footer (get_header/get_footer); everything between them is unique
 * to this page only.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<div class="mcs" dir="ltr">

    <!-- ═══════════════════════════════════════════
         SIDE DOCK NAV (desktop only, in-page anchors)
    ═══════════════════════════════════════════ -->
    <aside class="mcs__dock" aria-label="Section navigation">
        <span class="mcs__dock-label">Nav</span>
        <a href="#overview" class="mcs__dock-link is-active" data-mcs-dock title="Overview">
            <span class="material-symbols-outlined">segment</span>
        </a>
        <a href="#challenge" class="mcs__dock-link" data-mcs-dock title="Challenge">
            <span class="material-symbols-outlined">error_outline</span>
        </a>
        <a href="#solution" class="mcs__dock-link" data-mcs-dock title="Solution">
            <span class="material-symbols-outlined">lightbulb</span>
        </a>
        <a href="#results" class="mcs__dock-link" data-mcs-dock title="Results">
            <span class="material-symbols-outlined">trending_up</span>
        </a>
    </aside>

    <!-- ═══════════════════════════════════════════
         01 · HERO
    ═══════════════════════════════════════════ -->
    <section class="mcs__hero" id="hero">
        <div class="mcs__hero-grid-bg" aria-hidden="true"></div>
        <div class="mcs__container mcs__hero-inner">

            <div class="mcs__hero-content" data-mcs-reveal>
                <span class="mcs__badge">Ready-Made Solution</span>
                <h1 class="mcs__hero-title">Merchant</h1>
                <h2 class="mcs__hero-subtitle">Multi-Vendor Fashion E-Commerce Platform</h2>
                <p class="mcs__hero-copy">
                    A robust, end-to-end digital ecosystem featuring a sleek customer application, a powerful merchant operations dashboard, and a centralized administrative panel for total marketplace control.
                </p>

                <div class="mcs__hero-stats">
                    <div class="mcs__hero-stat">
                        <p class="mcs__hero-stat-label">Project Type</p>
                        <p class="mcs__hero-stat-value">E-Commerce</p>
                    </div>
                    <div class="mcs__hero-stat">
                        <p class="mcs__hero-stat-label">Industry</p>
                        <p class="mcs__hero-stat-value">Fashion</p>
                    </div>
                    <div class="mcs__hero-stat">
                        <p class="mcs__hero-stat-label">Platform</p>
                        <p class="mcs__hero-stat-value">Web + App</p>
                    </div>
                    <div class="mcs__hero-stat">
                        <p class="mcs__hero-stat-label">Status</p>
                        <p class="mcs__hero-stat-value">Live Portfolio</p>
                    </div>
                </div>
            </div>

            <div class="mcs__hero-visual" data-mcs-reveal data-mcs-delay="150">
                <div class="mcs__phone mcs__phone--left">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Welcome.png')); ?>" alt="Merchant app welcome screen" loading="eager" />
                </div>
                <div class="mcs__phone mcs__phone--center">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Item+Details.png')); ?>" alt="Merchant product detail screen" loading="eager" />
                </div>
                <div class="mcs__phone mcs__phone--right">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Wishlist.png')); ?>" alt="Merchant wishlist screen" loading="eager" />
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         02 · THE DIGITAL ECOSYSTEM (overview)
    ═══════════════════════════════════════════ -->
    <section class="mcs__overview" id="overview">
        <div class="mcs__container mcs__overview-grid">

            <div data-mcs-reveal>
                <h2 class="mcs__h2">The Digital Ecosystem</h2>
                <p class="mcs__p">
                    Merchant was conceived as more than just a storefront. It's a cohesive multi-vendor infrastructure designed to bridge the gap between boutique fashion brands and modern consumers. We built a platform that manages the complexity of multi-vendor inventory, merchant onboarding, and administrative supervision into a seamless, high-integrity experience.
                </p>
                <p class="mcs__p">
                    By focusing on both the front-end user delight and the back-end operational rigor, we created a solution that scales effortlessly from local startups to enterprise-level marketplace operations.
                </p>
            </div>

            <div class="mcs__feature-stack" data-mcs-reveal data-mcs-delay="120">
                <div class="mcs__feature-row">
                    <div class="mcs__feature-icon mcs__feature-icon--primary">
                        <span class="material-symbols-outlined">smartphone</span>
                    </div>
                    <div>
                        <h3 class="mcs__feature-title">Customer App</h3>
                        <p class="mcs__feature-desc">Flutter-based iOS &amp; Android shopping experience.</p>
                    </div>
                </div>
                <div class="mcs__feature-row">
                    <div class="mcs__feature-icon mcs__feature-icon--gold">
                        <span class="material-symbols-outlined">storefront</span>
                    </div>
                    <div>
                        <h3 class="mcs__feature-title">Merchant Dashboard</h3>
                        <p class="mcs__feature-desc">Comprehensive vendor control panel for store owners.</p>
                    </div>
                </div>
                <div class="mcs__feature-row">
                    <div class="mcs__feature-icon mcs__feature-icon--tertiary">
                        <span class="material-symbols-outlined">admin_panel_settings</span>
                    </div>
                    <div>
                        <h3 class="mcs__feature-title">Admin Panel</h3>
                        <p class="mcs__feature-desc">Global oversight and marketplace management system.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         03 · OPERATIONAL HURDLES (challenge)
    ═══════════════════════════════════════════ -->
    <section class="mcs__challenge" id="challenge">
        <div class="mcs__challenge-glow" aria-hidden="true"></div>
        <div class="mcs__container">
            <div class="mcs__challenge-head" data-mcs-reveal>
                <h2 class="mcs__h2 mcs__h2--light mcs__h2--center">Operational Hurdles</h2>
                <p class="mcs__challenge-sub">Scaling a multi-vendor platform requires solving deep logistical and technical friction points.</p>
            </div>

            <div class="mcs__challenge-grid" data-mcs-reveal-group>
                <div class="mcs__challenge-card" data-mcs-reveal>
                    <span class="material-symbols-outlined mcs__challenge-icon">inventory_2</span>
                    <h4>Multi-vendor management</h4>
                    <p>Synchronizing product catalogs across hundreds of independent sellers while maintaining high quality standards and metadata consistency.</p>
                </div>
                <div class="mcs__challenge-card" data-mcs-reveal>
                    <span class="material-symbols-outlined mcs__challenge-icon">verified_user</span>
                    <h4>Merchant Approval</h4>
                    <p>Ensuring a secure and vetted onboarding process for new vendors to protect marketplace reputation and customer safety.</p>
                </div>
                <div class="mcs__challenge-card" data-mcs-reveal>
                    <span class="material-symbols-outlined mcs__challenge-icon">local_shipping</span>
                    <h4>Order Coordination</h4>
                    <p>Managing complex delivery workflows where orders might contain items from multiple vendors located in different regions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         04 · THE INTEGRATED SOLUTION
    ═══════════════════════════════════════════ -->
    <section class="mcs__solution" id="solution">
        <div class="mcs__container">
            <div class="mcs__solution-head" data-mcs-reveal>
                <h2 class="mcs__h2 mcs__h2--center">The Integrated Solution</h2>
                <p class="mcs__solution-sub">A unified technical architecture that handles the complexity so users don't have to.</p>
            </div>

            <div class="mcs__solution-panel" data-mcs-reveal-group>
                <div class="mcs__solution-col" data-mcs-reveal>
                    <div class="mcs__solution-eyebrow mcs__solution-eyebrow--primary">
                        <span class="material-symbols-outlined">devices</span> Customer Side
                    </div>
                    <h3 class="mcs__solution-title">Unified App</h3>
                    <ul class="mcs__checklist">
                        <li><span class="material-symbols-outlined">check_circle</span> Seamless multi-vendor cart</li>
                        <li><span class="material-symbols-outlined">check_circle</span> Advanced search &amp; filters</li>
                        <li><span class="material-symbols-outlined">check_circle</span> Personalized wishlist</li>
                    </ul>
                </div>
                <div class="mcs__solution-col mcs__solution-col--tint" data-mcs-reveal data-mcs-delay="100">
                    <div class="mcs__solution-eyebrow mcs__solution-eyebrow--gold">
                        <span class="material-symbols-outlined">dashboard</span> Merchant Side
                    </div>
                    <h3 class="mcs__solution-title">Vendor Console</h3>
                    <ul class="mcs__checklist">
                        <li><span class="material-symbols-outlined">check_circle</span> Bulk product management</li>
                        <li><span class="material-symbols-outlined">check_circle</span> Order status tracking</li>
                        <li><span class="material-symbols-outlined">check_circle</span> Sales performance metrics</li>
                    </ul>
                </div>
                <div class="mcs__solution-col" data-mcs-reveal data-mcs-delay="200">
                    <div class="mcs__solution-eyebrow mcs__solution-eyebrow--tertiary">
                        <span class="material-symbols-outlined">settings_accessibility</span> Admin Side
                    </div>
                    <h3 class="mcs__solution-title">Marketplace HQ</h3>
                    <ul class="mcs__checklist">
                        <li><span class="material-symbols-outlined">check_circle</span> Global merchant approval</li>
                        <li><span class="material-symbols-outlined">check_circle</span> Transaction monitoring</li>
                        <li><span class="material-symbols-outlined">check_circle</span> Platform configuration</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         05 · THE SHOPPING EXPERIENCE
    ═══════════════════════════════════════════ -->
    <section class="mcs__shopping">
        <div class="mcs__container mcs__shopping-grid">

            <div class="mcs__shopping-phones" data-mcs-reveal>
                <div class="mcs__mini-phone mcs__mini-phone--up">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Home.png')); ?>" alt="Home screen" loading="lazy" />
                </div>
                <div class="mcs__mini-phone">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Item+Details.png')); ?>" alt="Product details" loading="lazy" />
                </div>
                <div class="mcs__mini-phone mcs__mini-phone--up">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Wishlist.png')); ?>" alt="Wishlist" loading="lazy" />
                </div>
            </div>

            <div data-mcs-reveal data-mcs-delay="120">
                <h2 class="mcs__h2">The Shopping Experience</h2>
                <p class="mcs__p">We prioritized a 'content-first' design language, ensuring that the fashion photography remains the star of the show while the UI provides frictionless utility.</p>
                <div class="mcs__dots-grid">
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> Fast Secure Login</div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> Rich Product Details</div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> Interactive Wishlist</div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> Dynamic Cart System</div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> Order History</div>
                    <div class="mcs__dot-item"><span class="mcs__dot"></span> Category Discovery</div>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         06 · MERCHANT DASHBOARD
    ═══════════════════════════════════════════ -->
    <section class="mcs__dashboard">
        <div class="mcs__container">
            <div class="mcs__dashboard-head" data-mcs-reveal>
                <h2 class="mcs__h2 mcs__h2--gold">Merchant Dashboard</h2>
                <p class="mcs__dashboard-sub">A dedicated control center for vendors to manage their entire digital presence, from inventory uploads to order fulfillment.</p>
            </div>

            <div class="mcs__browser-frame" data-mcs-reveal>
                <div class="mcs__browser-chrome">
                    <span class="mcs__browser-dot mcs__browser-dot--red"></span>
                    <span class="mcs__browser-dot mcs__browser-dot--gold"></span>
                    <span class="mcs__browser-dot mcs__browser-dot--green"></span>
                    <span class="mcs__browser-url">dashboard.merchant.spines.tech</span>
                </div>
                <div class="mcs__browser-body">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard.png')); ?>" alt="Merchant dashboard analytics overview" loading="lazy" />
                </div>
            </div>

            <div class="mcs__video-grid" data-mcs-reveal-group>
                <div class="mcs__video-card" data-mcs-reveal>
                    <h4>Merchant Login Demo</h4>
                    <a href="https://www.youtube.com/watch?v=OvxffxGhQ9E" target="_blank" class="mcs__video-thumb">
                        <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard.png')); ?>" alt="Merchant login demo thumbnail" loading="lazy" />
                        <div class="mcs__video-overlay">
                            <span class="material-symbols-outlined">play_circle</span>
                            <p>Watch Video</p>
                        </div>
                    </a>
                </div>
                <div class="mcs__video-card" data-mcs-reveal data-mcs-delay="120">
                    <h4>Products Adding &amp; Editing</h4>
                    <a href="https://www.youtube.com/watch?v=KJGuiAH6qoc" target="_blank" class="mcs__video-thumb">
                        <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard2.png')); ?>" alt="Product management demo thumbnail" loading="lazy" />
                        <div class="mcs__video-overlay">
                            <span class="material-symbols-outlined">play_circle</span>
                            <p>Watch Video</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         07 · ADMIN OVERSIGHT
    ═══════════════════════════════════════════ -->
    <section class="mcs__admin">
        <div class="mcs__container mcs__admin-grid">

            <div data-mcs-reveal>
                <h2 class="mcs__h2 mcs__h2--light">Admin Oversight</h2>
                <p class="mcs__admin-copy">The Admin Panel provides the high-level steering wheel for the entire marketplace. Administrators can vet new merchants, monitor site-wide metrics, and resolve operational disputes with surgical precision.</p>

                <div class="mcs__admin-list">
                    <div class="mcs__admin-item">
                        <span class="material-symbols-outlined mcs__admin-icon">shield_person</span>
                        <div>
                            <h4>Merchant Approval Flow</h4>
                            <p>Review documentation and verify vendor credentials before granting platform access.</p>
                        </div>
                    </div>
                    <div class="mcs__admin-item">
                        <span class="material-symbols-outlined mcs__admin-icon">payments</span>
                        <div>
                            <h4>Transaction Supervision</h4>
                            <p>Monitor platform-wide revenue streams and handle manual settlement reconciliations.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mcs__admin-visual" data-mcs-reveal data-mcs-delay="150">
                <div class="mcs__admin-glow" aria-hidden="true"></div>
                <div class="mcs__admin-frame">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard2.png')); ?>" alt="Admin dashboard with global merchant map" loading="lazy" />
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         08 · ONBOARDING LIFECYCLE
    ═══════════════════════════════════════════ -->
    <section class="mcs__onboarding">
        <div class="mcs__container">
            <div class="mcs__onboarding-head" data-mcs-reveal>
                <h2 class="mcs__h2 mcs__h2--center">Onboarding Lifecycle</h2>
                <p class="mcs__onboarding-sub">The structured path from application to active merchant.</p>
            </div>

            <div class="mcs__steps" data-mcs-reveal-group>
                <div class="mcs__steps-line" aria-hidden="true"></div>

                <div class="mcs__step" data-mcs-reveal>
                    <span class="mcs__step-num">1</span>
                    <h4>Request</h4>
                    <p>Merchant submits brand profile and legal documents.</p>
                </div>
                <div class="mcs__step" data-mcs-reveal data-mcs-delay="80">
                    <span class="mcs__step-num">2</span>
                    <h4>Review</h4>
                    <p>Admin evaluates the brand quality and verification data.</p>
                </div>
                <div class="mcs__step" data-mcs-reveal data-mcs-delay="160">
                    <span class="mcs__step-num">3</span>
                    <h4>Approval</h4>
                    <p>Merchant account activated with full store access.</p>
                </div>
                <div class="mcs__step" data-mcs-reveal data-mcs-delay="240">
                    <span class="mcs__step-num">4</span>
                    <h4>Management</h4>
                    <p>Inventory upload and store operations commence.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         09 · PAYMENTS & DELIVERY
    ═══════════════════════════════════════════ -->
    <section class="mcs__pay-delivery">
        <div class="mcs__container mcs__pay-grid" data-mcs-reveal-group>

            <div class="mcs__glass-card mcs__glass-card--primary" data-mcs-reveal>
                <div class="mcs__glass-icon mcs__glass-icon--primary">
                    <span class="material-symbols-outlined">payments</span>
                </div>
                <div>
                    <h3>Flexible Payments</h3>
                    <p>Designed for regional logistics, supporting Cash on Delivery as primary, with hooks for digital wallet and card gateway integrations.</p>
                    <div class="mcs__chip-row">
                        <span class="mcs__chip">COD SUPPORT</span>
                        <span class="mcs__chip">API READY</span>
                    </div>
                </div>
            </div>

            <div class="mcs__glass-card mcs__glass-card--gold" data-mcs-reveal data-mcs-delay="120">
                <div class="mcs__glass-icon mcs__glass-icon--gold">
                    <span class="material-symbols-outlined">local_shipping</span>
                </div>
                <div>
                    <h3>Delivery Logic</h3>
                    <p>A manual coordination workflow that gives merchants total control over their local logistics and preparation timelines.</p>
                    <div class="mcs__chip-row">
                        <span class="mcs__chip">TRACKING FLOW</span>
                        <span class="mcs__chip">MANUAL CAPTURE</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         10 · PERFORMANCE FOUNDATION (tech stack)
    ═══════════════════════════════════════════ -->
    <section class="mcs__stack">
        <div class="mcs__container mcs__stack-inner" data-mcs-reveal>
            <h2 class="mcs__stack-eyebrow">Performance Foundation</h2>
            <div class="mcs__stack-pills">
                <span class="mcs__pill">Flutter</span>
                <span class="mcs__pill">Node.js</span>
                <span class="mcs__pill">NoSQL</span>
                <span class="mcs__pill">Nginx</span>
                <span class="mcs__pill">Firebase</span>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         11 · VISUAL SHOWCASE
    ═══════════════════════════════════════════ -->
    <section class="mcs__showcase">
        <div class="mcs__container">
            <div class="mcs__premium-card" data-mcs-reveal>
                <div class="mcs__premium-card-inner">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/card-veo.png')); ?>" alt="Merchant brand identity and project overview" loading="lazy" />
                </div>
            </div>

            <div class="mcs__showcase-grid" data-mcs-reveal-group>
                <div class="mcs__showcase-item" data-mcs-reveal data-mcs-delay="80">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Home.png')); ?>" alt="Customer home screen" loading="lazy" />
                </div>
                <div class="mcs__showcase-item" data-mcs-reveal data-mcs-delay="160">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Welcome.png')); ?>" alt="Welcome screen" loading="lazy" />
                </div>
                <div class="mcs__showcase-item" data-mcs-reveal data-mcs-delay="240">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Wishlist.png')); ?>" alt="Wishlist screen montage" loading="lazy" />
                </div>
                <div class="mcs__showcase-item" data-mcs-reveal data-mcs-delay="320">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard.png')); ?>" alt="Dashboard responsive views" loading="lazy" />
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         12 · WATCH IT IN ACTION
    ═══════════════════════════════════════════ -->
    <section class="mcs__demos">
        <div class="mcs__container">
            <h2 class="mcs__h2 mcs__h2--center" data-mcs-reveal>Watch it in Action</h2>

            <div class="mcs__demos-grid" data-mcs-reveal-group>
                <div class="mcs__demo" data-mcs-reveal>
                    <a href="https://www.youtube.com/watch?v=OvxffxGhQ9E" target="_blank" class="mcs__demo-thumb mcs__demo-thumb--primary">
                        <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard.png')); ?>" alt="Merchant login workflow thumbnail" loading="lazy" />
                        <div class="mcs__demo-overlay">
                            <span class="material-symbols-outlined">play_arrow</span>
                        </div>
                    </a>
                    <h4>Merchant Login Workflow</h4>
                    <p>A step-by-step demonstration of the secure merchant entry and multi-factor authentication process.</p>
                </div>

                <div class="mcs__demo" data-mcs-reveal data-mcs-delay="120">
                    <a href="https://www.youtube.com/watch?v=KJGuiAH6qoc" target="_blank" class="mcs__demo-thumb mcs__demo-thumb--gold">
                        <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard2.png')); ?>" alt="Product management demo thumbnail" loading="lazy" />
                        <div class="mcs__demo-overlay">
                            <span class="material-symbols-outlined">play_arrow</span>
                        </div>
                    </a>
                    <h4>Product Management Demo</h4>
                    <p>See how vendors can easily list, edit, and categorize products within their storefront in seconds.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         13 · READY FOR MARKET (results)
    ═══════════════════════════════════════════ -->
    <section class="mcs__results" id="results">
        <div class="mcs__container mcs__results-grid">

            <div data-mcs-reveal>
                <h2 class="mcs__h2">Ready for Market</h2>
                <p class="mcs__p">Merchant is a battle-tested architecture that removes technical roadblocks for fashion entrepreneurs. It provides a complete end-to-end flow from first customer engagement to final delivery verification.</p>

                <div class="mcs__stars-list">
                    <div class="mcs__stars-item"><span class="material-symbols-outlined">stars</span> Complete Flutter Customer App</div>
                    <div class="mcs__stars-item"><span class="material-symbols-outlined">stars</span> Enterprise Merchant Dashboard</div>
                    <div class="mcs__stars-item"><span class="material-symbols-outlined">stars</span> Centralized Marketplace Admin Panel</div>
                    <div class="mcs__stars-item"><span class="material-symbols-outlined">stars</span> Seamless Multi-Vendor Workflow</div>
                </div>
            </div>

            <div class="mcs__results-gallery" data-mcs-reveal data-mcs-delay="150">
                <div class="mcs__results-img">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Home.png')); ?>" alt="Customer home screen" loading="lazy" />
                </div>
                <div class="mcs__results-img mcs__results-img--down">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Item+Details.png')); ?>" alt="Product details screen" loading="lazy" />
                </div>
                <div class="mcs__results-img mcs__results-img--up">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard2.png')); ?>" alt="Admin merchant listing table" loading="lazy" />
                </div>
                <div class="mcs__results-img">
                    <img src="<?php echo esc_url(st_asset('images/case-studies/merchant/Deshboard.png')); ?>" alt="Merchant using dashboard in-store" loading="lazy" />
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         14 · FINAL CTA
    ═══════════════════════════════════════════ -->
    <section class="mcs__final-cta">
        <div class="mcs__container">
            <div class="mcs__final-cta-card" data-mcs-reveal>
                <div class="mcs__final-cta-glow" aria-hidden="true"></div>
                <div class="mcs__final-cta-inner">
                    <h2>Build Your Own Ecosystem</h2>
                    <p>Transform your marketplace vision into a high-performance reality with SpinesTech's ready-made foundation.</p>
                    <div class="mcs__final-cta-ctas">
                        <a href="/contact/" class="mcs__btn mcs__btn--gold">Start Your Project</a>
                        <a href="/contact/" class="mcs__btn mcs__btn--outline">Contact SpinesTech</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div><!-- /.mcs -->

<?php get_footer(); ?>