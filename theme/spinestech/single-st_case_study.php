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
 *   Hero (back phone)          → driver-negotiation.png
 *   Hero (front phone)         → shipper-home-page.png
 *   The Trip Comes First       → admin-home.png (cinematic browser frame)
 *   Ecosystem · Customer App   → shipper-Shipment-details-Live-tracking.png (phone)
 *   Ecosystem · Driver App     → driver-home-page.png (front phone)
 *                                 + driver-Trips History.png (back phone)
 *   Ecosystem · Admin Panel    → admin-login.png (browser frame — genuine
 *                                 web content, kept as a desktop screen
 *                                 rather than forced into a phone shape)
 *   Final CTA                  → driver-settlments.jpg (tilted phone)
 */

/* ════════════════════════════════════════════════════════════════
 * ROUTER — runs BEFORE get_header() so no HTML is output yet.
 * Each bespoke case study gets its own fully self-contained template.
 * Add new slugs here whenever a new premium case study is created.
 * ════════════════════════════════════════════════════════════════ */
$_cs_slug = get_post_field( 'post_name', get_the_ID() );

// Merchant / fashion-marketplace
if ( in_array( $_cs_slug, [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ], true ) ) {
    include get_template_directory() . '/template-case-study-merchant.php';
    exit;
}

// PropCare 360 / property-management
if ( in_array( $_cs_slug, [ 'propcare', 'propcare-360', 'property-management' ], true ) ) {
    include get_template_directory() . '/template-case-study-propcare.php';
    exit;
}

/* ════════════════════════════════════════════════════════════════
 * DEFAULT TEMPLATE — Backway case study (rendered below).
 * Only reached if the slug did NOT match any route above.
 * ════════════════════════════════════════════════════════════════ */

if ( ! function_exists( 'cs_bw_img' ) ) {
    /**
     * Resolve a Backway case-study image URL, safely encoding spaces
     * in filenames that still contain them (e.g. "driver-Trips History.png").
     */
    function cs_bw_img( $filename ) {
        $path = 'images/case-studies/backway/' . str_replace( ' ', '%20', $filename );
        return function_exists( 'st_asset' ) ? st_asset( $path ) : get_template_directory_uri() . '/assets/' . $path;
    }
}

get_header();
?>

<div class="cs-page" dir="ltr">

    <!-- ═══════════════════════════════════════
         SECTION 1 · HERO
    ═══════════════════════════════════════ -->
    <section class="cs-hero">
        <div class="cs-hero__grid-bg" aria-hidden="true"></div>

        <div class="cs-container cs-hero__inner">

            <div class="cs-hero__content" data-reveal>

                <div class="cs-hero__badge">
                    <span class="material-symbols-outlined cs-hero__badge-icon">verified</span>
                    Case Study: Backway
                </div>

                <h1 class="cs-hero__title">
                    Backway — Trip-Based Shipment Marketplace for a Canadian Logistics Startup
                </h1>

                <p class="cs-hero__subtitle">
                    A robust, multi-role logistics ecosystem designed to monetize existing intercity vehicle space through a highly governed, trip-first marketplace model.
                </p>

                <div class="cs-hero__tags">
                    <span class="cs-tag">Customer App</span>
                    <span class="cs-tag">Driver App</span>
                    <span class="cs-tag">Admin Panel</span>
                    <span class="cs-tag">OTP Delivery</span>
                    <span class="cs-tag">Wallet &amp; Settlements</span>
                    <span class="cs-tag">Multi-Language</span>
                </div>

                <div class="cs-hero__ctas">
                    <a href="#cs-snapshot" class="cs-btn cs-btn--primary">Explore Case Study</a>
                    <a href="#cs-model" class="cs-btn cs-btn--outline">View Platform Flow</a>
                </div>

            </div>

            <div class="cs-hero__visual" data-reveal data-reveal-delay="150">
                <div class="cs-hero__mockups">

                    <div class="cs-hero__phone cs-hero__phone--back">
                        <div class="cs-hero__phone-notch" aria-hidden="true"></div>
                        <img
                            src="<?php echo esc_url( cs_bw_img( 'driver-negotiation.png' ) ); ?>"
                            alt="Backway driver app price negotiation screen for a shipment request"
                            loading="eager"
                            decoding="async"
                        />
                    </div>

                    <div class="cs-hero__phone cs-hero__phone--front">
                        <div class="cs-hero__phone-notch" aria-hidden="true"></div>
                        <img
                            src="<?php echo esc_url( cs_bw_img( 'shipper-home-page.png' ) ); ?>"
                            alt="Backway customer app home screen showing available trips and quick shipment actions"
                            loading="eager"
                            decoding="async"
                        />
                    </div>

                    <div class="cs-hero__glow" aria-hidden="true"></div>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════
         SECTION 2 · PROJECT SNAPSHOT
    ═══════════════════════════════════════ -->
    <section class="cs-snapshot" id="cs-snapshot">
        <div class="cs-container">
            <h2 class="cs-section-title" data-reveal>Project Snapshot</h2>
            <div class="cs-snapshot__grid" data-reveal-group>
                <div class="cs-snapshot__card" data-reveal>
                    <span class="cs-snapshot__label">CLIENT</span>
                    <p class="cs-snapshot__value">Canadian Startup</p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="60">
                    <span class="cs-snapshot__label">INDUSTRY</span>
                    <p class="cs-snapshot__value">Logistics Tech</p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="120">
                    <span class="cs-snapshot__label">PLATFORMS</span>
                    <p class="cs-snapshot__value">iOS, Android, Web</p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="180">
                    <span class="cs-snapshot__label">MODEL</span>
                    <p class="cs-snapshot__value">Trip Marketplace</p>
                </div>
                <div class="cs-snapshot__card cs-snapshot__card--accent" data-reveal>
                    <span class="cs-snapshot__label">STATUS</span>
                    <p class="cs-snapshot__value">Delivered</p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="60">
                    <span class="cs-snapshot__label">LANGUAGES</span>
                    <p class="cs-snapshot__value">EN, AR, FR</p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="120">
                    <span class="cs-snapshot__label">CORE ROLE</span>
                    <p class="cs-snapshot__value">Driver / Admin</p>
                </div>
                <div class="cs-snapshot__card" data-reveal data-reveal-delay="180">
                    <span class="cs-snapshot__label">GOVERNANCE</span>
                    <p class="cs-snapshot__value">OTP Secured</p>
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
                    Turning Existing Intercity Trips Into Delivery Opportunities
                </h2>
                <p class="cs-opportunity__copy">
                    Most intercity travel involves unused vehicle space. Backway creates a secure bridge between travelers (Drivers) and people needing to send items (Customers), creating a sustainable, speed-focused delivery network.
                </p>
            </div>

            <div class="cs-opportunity__flow" data-reveal-group>
                <div class="cs-flow-step" data-reveal>
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined">route</span>
                    </div>
                    <p>Driver Route</p>
                </div>
                <div class="cs-flow-connector" aria-hidden="true"></div>
                <div class="cs-flow-step" data-reveal data-reveal-delay="80">
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined">package_2</span>
                    </div>
                    <p>Shipment Creation</p>
                </div>
                <div class="cs-flow-connector" aria-hidden="true"></div>
                <div class="cs-flow-step" data-reveal data-reveal-delay="160">
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined">handshake</span>
                    </div>
                    <p>Negotiation</p>
                </div>
                <div class="cs-flow-connector" aria-hidden="true"></div>
                <div class="cs-flow-step" data-reveal data-reveal-delay="240">
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <p>Secure Payment</p>
                </div>
                <div class="cs-flow-connector" aria-hidden="true"></div>
                <div class="cs-flow-step" data-reveal data-reveal-delay="320">
                    <div class="cs-flow-step__icon">
                        <span class="material-symbols-outlined">key</span>
                    </div>
                    <p>OTP Delivery</p>
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
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <h3>Customer Perspective</h3>
                    </div>
                    <ul class="cs-checklist">
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Search and select routes between cities.
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Browse available drivers on the selected route.
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Manual selection of preferred drivers based on rating/price.
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Negotiate prices directly within the app.
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Pay through secure wallet-integrated system.
                        </li>
                    </ul>
                </div>

                <!-- Driver -->
                <div class="cs-perspective__card cs-perspective__card--dark" data-reveal data-reveal-delay="120">
                    <div class="cs-perspective__head">
                        <div class="cs-perspective__icon-wrap cs-perspective__icon-wrap--dark">
                            <span class="material-symbols-outlined">local_shipping</span>
                        </div>
                        <h3>Driver Perspective</h3>
                    </div>
                    <ul class="cs-checklist cs-checklist--dark">
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Rigorous registration and admin manual approval.
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Create trips by defining source, destination, and path.
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Automatic visibility for shipments in passing cities.
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Manage multiple orders within a single active trip.
                        </li>
                        <li>
                            <span class="material-symbols-outlined cs-checklist__icon">check_circle</span>
                            Scheduled settlement upon successful delivery confirmation.
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
                <h2 class="cs-section-title">The Trip Comes First</h2>
                <p class="cs-model__subtitle">
                    A unique model where delivery capability is defined by a traveler's intent, not algorithmic dispatch.
                </p>
            </div>

            <div class="cs-model__cards" data-reveal-group>
                <div class="cs-model__card" data-reveal>
                    <span class="cs-model__num">01</span>
                    <h4>Exclusive Trips</h4>
                    <p>Only one active trip per driver at any time to ensure focus and delivery reliability.</p>
                </div>
                <div class="cs-model__card" data-reveal data-reveal-delay="100">
                    <span class="cs-model__num">02</span>
                    <h4>Multi-Order Batching</h4>
                    <p>Drivers can accept multiple orders along their route until vehicle capacity is met.</p>
                </div>
                <div class="cs-model__card" data-reveal data-reveal-delay="200">
                    <span class="cs-model__num">03</span>
                    <h4>Independent Status</h4>
                    <p>Each order has its own lifecycle; closing an order doesn't force a trip to end.</p>
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
                        src="<?php echo esc_url( cs_bw_img( 'admin-home.png' ) ); ?>"
                        alt="Backway admin dashboard showing platform-wide trip and shipment overview"
                        loading="lazy"
                        decoding="async"
                    />
                    <div class="cs-model__visual-overlay" aria-hidden="true"></div>
                </div>
                <div class="cs-model__visual-caption">
                    <p class="cs-model__visual-title">Live Operations Dashboard</p>
                    <p class="cs-model__visual-sub">Real-time visibility into every trip and shipment across the platform</p>
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
            <h2 class="cs-section-title" data-reveal>Three Pillars of the Ecosystem</h2>
            <div class="cs-ecosystem__grid" data-reveal-group>

                <!-- Customer App — single phone mockup -->
                <div class="cs-ecosystem__card" data-reveal>
                    <div class="cs-ecosystem__media cs-ecosystem__media--phone">
                        <div class="cs-ecosystem__phone">
                            <div class="cs-ecosystem__phone-notch" aria-hidden="true"></div>
                            <img
                                src="<?php echo esc_url( cs_bw_img( 'shipper-Shipment-details-Live-tracking.png' ) ); ?>"
                                alt="Backway customer app live shipment tracking and delivery details screen"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                    </div>
                    <div class="cs-ecosystem__body">
                        <h4>Customer App</h4>
                        <ul class="cs-feature-list">
                            <li><span class="material-symbols-outlined">check</span> Trip Search &amp; Filters</li>
                            <li><span class="material-symbols-outlined">check</span> Manual Driver Selection</li>
                            <li><span class="material-symbols-outlined">check</span> Price Negotiation Engine</li>
                            <li><span class="material-symbols-outlined">check</span> Secure Wallet Integration</li>
                            <li><span class="material-symbols-outlined">check</span> OTP Delivery Confirmation</li>
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
                                src="<?php echo esc_url( cs_bw_img( 'driver-Trips History.png' ) ); ?>"
                                alt="Backway driver app trip history screen listing completed and past trips"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                        <div class="cs-ecosystem__phone cs-ecosystem__phone--front">
                            <div class="cs-ecosystem__phone-notch" aria-hidden="true"></div>
                            <img
                                src="<?php echo esc_url( cs_bw_img( 'driver-home-page.png' ) ); ?>"
                                alt="Backway driver app home screen showing active trip and incoming shipment requests"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                    </div>
                    <div class="cs-ecosystem__body">
                        <h4>Driver App</h4>
                        <ul class="cs-feature-list">
                            <li><span class="material-symbols-outlined">check</span> Profile &amp; Identity Verification</li>
                            <li><span class="material-symbols-outlined">check</span> Trip Creation &amp; Route Mapping</li>
                            <li><span class="material-symbols-outlined">check</span> Multi-Order Request Handling</li>
                            <li><span class="material-symbols-outlined">check</span> Status Lifecycle Management</li>
                            <li><span class="material-symbols-outlined">check</span> Automated Settlement View</li>
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
                            src="<?php echo esc_url( cs_bw_img( 'admin-login.png' ) ); ?>"
                            alt="Backway admin panel secure login screen"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <div class="cs-ecosystem__body">
                        <h4>Admin Panel</h4>
                        <ul class="cs-feature-list">
                            <li><span class="material-symbols-outlined">check</span> Driver Document Verification</li>
                            <li><span class="material-symbols-outlined">check</span> Real-time Order Monitoring</li>
                            <li><span class="material-symbols-outlined">check</span> Financial Settlement Control</li>
                            <li><span class="material-symbols-outlined">check</span> Global Settings &amp; Master Data</li>
                            <li><span class="material-symbols-outlined">check</span> User Roles &amp; Permission Matrix</li>
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
            <h2 class="cs-section-title" data-reveal>Operational Depth</h2>
            <div class="cs-depth__grid" data-reveal-group>
                <div class="cs-depth__card" data-reveal>
                    <span class="material-symbols-outlined cs-depth__icon">ads_click</span>
                    <h5>Customer Choice</h5>
                    <p>Not an algorithm—customers manually vet and select their drivers.</p>
                </div>
                <div class="cs-depth__card" data-reveal data-reveal-delay="80">
                    <span class="material-symbols-outlined cs-depth__icon">route</span>
                    <h5>Trip First</h5>
                    <p>Delivery availability is based on actual planned travel routes.</p>
                </div>
                <div class="cs-depth__card" data-reveal data-reveal-delay="160">
                    <span class="material-symbols-outlined cs-depth__icon">account_balance_wallet</span>
                    <h5>Secure Escrow</h5>
                    <p>Funds are held securely until OTP confirmation is received.</p>
                </div>
                <div class="cs-depth__card" data-reveal data-reveal-delay="240">
                    <span class="material-symbols-outlined cs-depth__icon">gavel</span>
                    <h5>Admin Governance</h5>
                    <p>Human-in-the-loop for driver vetting and final settlements.</p>
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
                <h2 class="cs-trust__heading">Built for Trust</h2>
                <p class="cs-trust__copy">
                    In a person-to-person marketplace, trust is the primary currency. We built multiple safety nets to ensure reliable exchanges.
                </p>
                <div class="cs-trust__grid">
                    <div class="cs-trust__item">
                        <span class="material-symbols-outlined cs-trust__item-icon">verified_user</span>
                        <div>
                            <h6>Identity Locked</h6>
                            <p>Driver ID and Vehicle documents verified by Admin before any trip creation.</p>
                        </div>
                    </div>
                    <div class="cs-trust__item">
                        <span class="material-symbols-outlined cs-trust__item-icon">key</span>
                        <div>
                            <h6>OTP Handshake</h6>
                            <p>Deliveries cannot be closed without a customer-provided OTP at the drop-off point.</p>
                        </div>
                    </div>
                    <div class="cs-trust__item">
                        <span class="material-symbols-outlined cs-trust__item-icon">payments</span>
                        <div>
                            <h6>Upfront Funding</h6>
                            <p>Customer pays before shipment starts, ensuring driver compensation intent.</p>
                        </div>
                    </div>
                    <div class="cs-trust__item">
                        <span class="material-symbols-outlined cs-trust__item-icon">history_edu</span>
                        <div>
                            <h6>Audit Ready</h6>
                            <p>Every status change, payment, and negotiation is logged for dispute resolution.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cs-trust__visual" aria-hidden="true" data-reveal data-reveal-delay="150">
                <div class="cs-trust__ring">
                    <div class="cs-trust__ring-inner">
                        <span class="material-symbols-outlined">shield_lock</span>
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
            <h2 class="cs-live__heading">Experience Backway Live</h2>
            <p class="cs-live__copy">
                Visit the official website or download the apps to experience the trip-based shipment marketplace firsthand.
            </p>
            <div class="cs-live__ctas">
                <a href="#" class="cs-btn cs-btn--primary cs-live__btn">
                    <span class="material-symbols-outlined">language</span>
                    Visit Website
                </a>
                <a href="#" class="cs-live__store" aria-label="Download on the App Store">
                    <svg class="cs-live__store-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M17.6 13.5c0-2.6 2.1-3.8 2.2-3.9-1.2-1.8-3.1-2-3.7-2-1.6-.2-3.1.9-3.9.9-.8 0-2-.9-3.3-.9-1.7 0-3.3 1-4.2 2.5-1.8 3.1-.5 7.7 1.3 10.2.9 1.2 1.9 2.6 3.3 2.6 1.3-.1 1.8-.9 3.4-.9s2 .9 3.4.8c1.4 0 2.3-1.2 3.2-2.5.6-.9.9-1.4 1.4-2.4-3.5-1.3-3.1-4.9-3.1-4.4zM15.2 6c.7-.9 1.2-2.1 1.1-3.3-1.1.1-2.4.7-3.1 1.6-.7.8-1.3 2-1.1 3.2 1.2.1 2.4-.6 3.1-1.5z"/>
                    </svg>
                    <span class="cs-live__store-text">
                        <small>Download on the</small>
                        App Store
                    </span>
                </a>
                <a href="#" class="cs-live__store" aria-label="Get it on Google Play">
                    <svg class="cs-live__store-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M3.6 2.6c-.3.3-.5.8-.5 1.4v16c0 .6.2 1.1.5 1.4l.1.1L13 12.2v-.2L3.7 2.5l-.1.1z" fill="#4ade80"/>
                        <path d="M16.1 15.3 13 12.2v-.2l3.1-3.1 6.9 4c1 .5 1 1.4 0 1.9l-6.9 4z" fill="#facc15"/>
                        <path d="M16.1 15.3 13 12l-9.4 9.4c.4.4 1 .4 1.7.1l10.8-6.2" fill="#f87171"/>
                        <path d="M16.1 8.7 5.3 2.5c-.7-.4-1.3-.3-1.7.1L13 12l3.1-3.3z" fill="#60a5fa"/>
                    </svg>
                    <span class="cs-live__store-text">
                        <small>Get it on</small>
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
            <h2 class="cs-section-title" data-reveal>Technology Stack</h2>
            <div class="cs-stack__grid" data-reveal-group>
                <div class="cs-stack__item" data-reveal>
                    <div class="cs-stack__icon"><span class="material-symbols-outlined">smartphone</span></div>
                    <p>Mobile</p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="40">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined">api</span></div>
                    <p>Backend</p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="80">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined">desktop_windows</span></div>
                    <p>Web App</p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="120">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined">database</span></div>
                    <p>Database</p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="160">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined">lock</span></div>
                    <p>Auth</p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="200">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined">credit_card</span></div>
                    <p>Payments</p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="240">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined">notifications</span></div>
                    <p>Push</p>
                </div>
                <div class="cs-stack__item" data-reveal data-reveal-delay="280">
                    <div class="cs-stack__icon"><span class="material-symbols-outlined">cloud</span></div>
                    <p>Cloud</p>
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
                <h2 class="cs-final-cta__heading">Building a Logistics Platform or Marketplace?</h2>
                <p class="cs-final-cta__copy">
                    Leverage our experience in creating high-stakes operational dashboards and multi-role marketplaces.
                </p>
                <a href="/contact" class="cs-btn cs-btn--primary cs-btn--lg">Start Your Project</a>
            </div>
            <div class="cs-final-cta__visual">
                <div class="cs-final-cta__phone">
                    <div class="cs-final-cta__phone-notch" aria-hidden="true"></div>
                    <img
                        src="<?php echo esc_url( cs_bw_img( 'driver-settlments.jpg' ) ); ?>"
                        alt="Backway driver settlements screen showing completed payouts and earnings history"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </div>
        </div>
    </section>

</div><!-- /.cs-page -->

<?php get_footer(); ?>