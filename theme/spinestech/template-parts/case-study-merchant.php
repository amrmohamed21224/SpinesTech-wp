<?php
/**
 * Case Study — Merchant (standalone template part)
 * File: template-parts/case-study-merchant.php
 *
 * Fully self-contained: calls get_header()/get_footer() and runs its own
 * loop. Loaded ONLY by a tiny redirect snippet added at the very top of
 * single-st_case_study.php (see patch instructions) — it does NOT replace
 * or touch that file's existing Backway content in any way.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$contact_url = home_url( '/quote/' );

while ( have_posts() ) : the_post();
    $mc_logo       = 'https://lh3.googleusercontent.com/aida-public/AB6AXuB3WDPhaXlUaFNzvMYI9Ns7WOobKCjl3_iheIWUi3CPkypM5gz86aZVx3oDI-kJBCsxEzInN30HqAiext6azrfJ8TrwGXai6uPSnwyVGc90nfIzh_3xUF11vxygP0Y8pPV_tmEKNOGUvgPItjzrXZ0CPaTEzIozUPy5IgdvTb77p1AaXr0nVtyq4gU3ijIQ9JmeqRf6BCkF_pqPfXeLPZ6y6RDhBNdSK6jp_fYl2yM7msRbQLEV4isG9ZtligX_yoEZ0XKMaMprIoE';
    $mc_welcome    = $mc_logo; /* same asset reused as the welcome mobile screen in the source design */
    $mc_product    = 'https://lh3.googleusercontent.com/aida-public/AB6AXuAyZsqol7z9Ue9KH2KG2lvLCSjMoe_anP1DrV1ZdmINtekEzJ3M_fsf0XOJLy7A2DlvEfE0s0y0QDU0OLN5LssS_St26d1y__bnTQ4aTETy1b4h29iV-P7HBBBjZ2wKjIekiuUCBkgL81ASDcX2omfAX0p80gikMhb5dkfJPFN7IWKbt1XJXJ11EXAy7aEgTdcZOMorCC7x434nb7NYxdfUUPo9_k-3jk6_5v9SWoFEy6b4wYhatLtMFtGkvCaNMPlkkT4jgwatWow';
    $mc_wishlist   = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCnX67urxI4dPF-PfzPqh6doXex2wgAzS44DpBzH2LBvyWNakrnwD20kxNh5A8Vo8j3ATWOu6GRJ8OS2tWCRMUfpap9d7_o7gsRYfAbHhECbQqIZ1Tj4n63r2dDZHPFo0lHpHc7jrUW2kq8To8RFssWCs6ptpjW7rQnheNdA5HAlNjq30TjKXzhE9XQ3_YSEouDVdeLURYhRwhOiftVqhGviibWw3lZ-ufSO6Ex0-IrMnRqiGzu5IVxKOfCxBVKof86fkxosWnIvYg';
    $mc_dashboard  = 'https://lh3.googleusercontent.com/aida-public/AB6AXuABmSjnknukfQY09JZuMi2mL3oAbDAke0MlpdALUVH3u_uXeUAaa4wNzthZrZ_Jmzh8puKmSMc0CBR02jG9JIrQhgrAtG3kzKfw676mUV2hgLQ8P9BiYuMOTWxPd434XcUZP56Ppfzu8CB4rKyl_YzBJFstCKOeW5ASsoJnKP8KmyF6gvx6Jj-5RIQoNRj_QoT81Xs12cz9nz8nZVAg5RLGFknr5-L2oKf9MWuQxck3hNF2bNwRT5bx2yvZKUwI3J88TEhiDyNr-iQ';
    $mc_video1     = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCTUr6xoLY3q_VM6w0Aacf598rhcUFHD1WGUNYYNoFFEIMBN3zKtaE68JA2mVArhM3AoYdlGNvBGDgPiolSe1xX7OuD3ouvlFHiCYJkm5IDd2h6-Tu8ezKNhLad-1DdM_J0MkW-EO1Bn-YZdXQILB6Et4q1o41h13xGYEL1tizR8KE13a0G7YLZl4SfPlUR6nkyJJsxhKLRfxRHs33SWqcm0vtBNMbp197K9zupRLX6V6UYMt54RiLH8a7h9AQdrh5DDoW8xMphjwc';
    $mc_video2     = 'https://lh3.googleusercontent.com/aida-public/AB6AXuAM6f6nS7xZlGgWMG3-B9IsfnA-oVtI4b0DC1e2kGhgvWmDJSWFAFDqbWBDx9N0kQhDuZfD_KQR6LMB-uLEYu-DIrCA-687W3exN2L0GaxJztj1tR_Joi_rmeeemhPSf_crBAEmDZXFas6xu30ABv5MH_XHFbPpEybufF3G5OXP4DQIm5Is0FFcnuLJF6PEYg_B1lMyXmWoFabyYJO6BUBWrtfNsmYJYJeheL3ozrhPQyVgtHZUNPd02n2jABEMuKSaY1A8ZCyBQGo';
    $mc_admin      = 'https://lh3.googleusercontent.com/aida-public/AB6AXuClBpsAvyf4NWgnFtectPkzpPBCWf02ODO-2zsZb74Dil1jn4wHxDM7CMflDSxXtHRNuxzJ7YCCWwR8SK65GAWPxwXh96I6IzZQAjvSs2y-da5IR_sqg9ipTVdiaOAlbjViI1HNWGHmeJMqrW9G-VAPtzhafzcFWOjpR-sz2NrepuAb80AWN9LsgMijxb0ELKwobwIou7upQQN4L0L1ET-4HZXdbwOgnxpeg2SByF2RR_W8SShdUeIBtahl8ZfYkLSr4z71pl4e-DE';
    $mc_review     = 'https://lh3.googleusercontent.com/aida-public/AB6AXuB_3fkv1NZZHEF-Pei0stjWydq50SXbm342XbXDz9u7A8gcknpwQP58BXdL-faxFSF1BMDkfGUUcHdoija92_Q_HVk91hT0DRVCHPta1wRrzJjB0xqxf0VJUZFvoDYAMsY-eyrzQfFvygioBFiMfsZWqD_FSmpEGiaO8LAZqB_3S_pTXUCu7ILG7U21NO0yjbSPDtnm2e6wc8Ln7I9POySZO5PICac3DVn6Fp93KT_Hed--bftXu4TTm_Xy5inbYegFeVM9CE_K0AE';
    $mc_payment    = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCfVWkAfFr_ZcNXAhsWBWSQucspStS0o1mpXP8sLKO_qeM8Uksp_S_rWZR7Ct6YLTwST-Fc5T4WFr4uk2mCgGH8wmcp86zkjONQH7xH-RuzWGUhN-PO0KZA1lSgyoJaEdCPNKvpfv4cuhCoBSn0UiDyCVTXE4FD4818olnUGXiCCsDacNTjK9hB86ZUd4YU82txwz7EAxc3Ot7zbXn11Bfn-pLuO7N-HUGeazlLLo_U9So3J8LEWJZBy9bfomtkH0o-2wkhLvSSEmk';
    $mc_admintable = 'https://lh3.googleusercontent.com/aida-public/AB6AXuC-1QRHzwrzda12KJjXMeYxZPWyRvNTIUrrlGR1K0Ml7NV0g_qpigROaeYqGLc0SbS9pXC5U_uHZ-y1at8OIgacKW771N7YkeMQ6YC29jO9FxmVIANRVqIuYooYVyNMcRmSBNa6bysNfY_eMuVsqe_ZtltwioDjsSeagCrX51A-cHJagHiKiPrurYhdaKY5jSMlD--KidRJWIsJ9BzDW6hK9A7jkj2Osh7AGpq_KRt8tNnzW5CN-pDUlJVYyGYsozCsfWkKazcgDQI';
    $mc_lifestyle  = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDOxn-zW66JfG1JXYBHu1ZDw-GhByZTiHFFmeyLl_N-SMjyYU_rj6_ICZktzz8dluV_qEqyht3OlFnkUYdY8kCYfgTUF-98SPsg4Y8nP3AyiYvMKr3xw2cvkRAoTdxid-88RMem3zSA5cm9cbFj1gU2jma-0UHUVv3dPOLk724ULavvx_RwwMHwbvCpRRY3o4OS7Tkf-W2QRihvkT4GwZOEDKrim5E0P3VfFbNrhqwlVz33HFXA-1YDsA5MIvl7mPVVW4OL2yU4u3Y';
    $mc_video1_alt = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBOd995XBrH4PbFjDxjJqWXjt_T6Xl2lTj_hOaBI-2EDyIRH_iGkheguq3K7Tc4UT4Rak80MiPsAsBHAS8-S02NvozfR6ywN9tRaQ9oXFb825seWWPIc4Y6sCkEjATD7Fv1EqN37OPvh00ILZ-PywR_JoUdnzSfD4fCX83YSh4UllaYTczeqzxxxIEj1W6bHQEe9hTb4ed6DWmf5KnQzUkGZnYiK2TJarXyNSieu5KT5cfnOwKZT6sDrAEW6cqp_RC80dOdxGjxo0w';
    $mc_video2_alt = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDs4MVyEFGsXbxJpf0-VUKOvfY21MVxl5Hb0z77eICzbFuwQXbwKM4q0gB05-NXw6fazlhX4FToJlbUFgqpSXpUZAvI9ED_FY5Ct2vzxZg6lPsBITZQwmx5_G1uXHfHV_J8iL7Idqy7aCyU1eaNPDbfDg6C3CJDE4Yt7c50MfiYlk_OVBObSMqma-gC_IaptgVctN8CDwNr6u0Q1F2zuXEzX3YiFTCJ2noY5Q_Ik3N-u0mAWtrp5p3G7SSwG4udwcLtkJKLoaiTo74';
?>
<div class="case-study-detail mc-page" dir="ltr">
<main>

    <!-- Side nav rail (scrollspy, desktop only) -->
    <nav class="mc-side-nav" data-mc-sidenav aria-label="Section navigation">
        <span class="mc-side-nav__label">Case</span>
        <a href="#overview" class="mc-side-nav__link is-active" title="Overview"><span class="material-symbols-outlined">segment</span></a>
        <a href="#challenge" class="mc-side-nav__link" title="Challenge"><span class="material-symbols-outlined">error_outline</span></a>
        <a href="#solution" class="mc-side-nav__link" title="Solution"><span class="material-symbols-outlined">lightbulb</span></a>
        <a href="#results" class="mc-side-nav__link" title="Results"><span class="material-symbols-outlined">trending_up</span></a>
    </nav>

    <!-- 1. HERO -->
    <section class="mc-section mc-hero" id="hero">
        <div class="container mc-hero__grid">
            <div data-reveal>
                <span class="mc-hero__badge">Ready-Made Solution</span>
                <h1 class="mc-hero__name">Merchant</h1>
                <p class="mc-hero__tagline">Multi-Vendor Fashion E-Commerce Platform</p>
                <p class="mc-hero__desc">A robust, end-to-end digital ecosystem featuring a sleek customer application, a powerful merchant operations dashboard, and a centralized administrative panel for total marketplace control.</p>
                <div class="mc-hero__stats">
                    <div class="mc-hero__stat"><div class="mc-hero__stat-label">Project Type</div><div class="mc-hero__stat-value">E-Commerce</div></div>
                    <div class="mc-hero__stat"><div class="mc-hero__stat-label">Industry</div><div class="mc-hero__stat-value">Fashion</div></div>
                    <div class="mc-hero__stat"><div class="mc-hero__stat-label">Platform</div><div class="mc-hero__stat-value">Web + App</div></div>
                    <div class="mc-hero__stat"><div class="mc-hero__stat-label">Status</div><div class="mc-hero__stat-value">Live Portfolio</div></div>
                </div>
            </div>
            <div class="mc-hero__visual" data-reveal data-reveal-delay="150">
                <div class="mc-hero__phone mc-hero__phone--back-left"><img src="<?php echo esc_url( $mc_welcome ); ?>" alt="Merchant customer app — welcome screen" loading="eager"></div>
                <div class="mc-hero__phone mc-hero__phone--center"><img src="<?php echo esc_url( $mc_product ); ?>" alt="Merchant customer app — product detail" loading="eager"></div>
                <div class="mc-hero__phone mc-hero__phone--back-right"><img src="<?php echo esc_url( $mc_wishlist ); ?>" alt="Merchant customer app — wishlist" loading="eager"></div>
            </div>
        </div>
    </section>

    <!-- 2. OVERVIEW -->
    <section class="mc-section mc-section--white" id="overview">
        <div class="container mc-overview__grid">
            <div class="mc-overview__copy" data-reveal>
                <span class="mc-eyebrow">The Digital Ecosystem</span>
                <h2 class="mc-title">A Cohesive Multi-Vendor Infrastructure</h2>
                <p style="margin-block-start:1.5rem;">Merchant was conceived as more than just a storefront. It's a cohesive multi-vendor infrastructure designed to bridge the gap between boutique fashion brands and modern consumers. We built a platform that manages the complexity of multi-vendor inventory, merchant onboarding, and administrative supervision into a seamless, high-integrity experience.</p>
                <p>By focusing on both the front-end user delight and the back-end operational rigor, we created a solution that scales effortlessly from local startups to enterprise-level marketplace operations.</p>
            </div>
            <div class="mc-icon-list">
                <div class="mc-icon-card mc-hover-lift" data-reveal data-reveal-delay="0">
                    <div class="mc-icon-card__icon"><span class="material-symbols-outlined">smartphone</span></div>
                    <div><div class="mc-icon-card__title">Customer App</div><div class="mc-icon-card__text">Flutter-based iOS &amp; Android shopping experience.</div></div>
                </div>
                <div class="mc-icon-card mc-hover-lift" data-reveal data-reveal-delay="100">
                    <div class="mc-icon-card__icon mc-icon-card__icon--gold"><span class="material-symbols-outlined">storefront</span></div>
                    <div><div class="mc-icon-card__title">Merchant Dashboard</div><div class="mc-icon-card__text">Comprehensive vendor control panel for store owners.</div></div>
                </div>
                <div class="mc-icon-card mc-hover-lift" data-reveal data-reveal-delay="200">
                    <div class="mc-icon-card__icon mc-icon-card__icon--tertiary"><span class="material-symbols-outlined">admin_panel_settings</span></div>
                    <div><div class="mc-icon-card__title">Admin Panel</div><div class="mc-icon-card__text">Global oversight and marketplace management system.</div></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CHALLENGE -->
    <section class="mc-section mc-section--dark" id="challenge">
        <div class="container">
            <div class="mc-header mc-header--center" data-reveal>
                <h2 class="mc-title">Operational Hurdles</h2>
                <p class="mc-subtitle mc-subtitle--center">Scaling a multi-vendor platform requires solving deep logistical and technical friction points.</p>
            </div>
            <div class="mc-challenge-grid">
                <div class="mc-challenge-card" data-reveal data-reveal-delay="0">
                    <span class="material-symbols-outlined mc-challenge-card__icon">inventory_2</span>
                    <h4 class="mc-challenge-card__title">Multi-vendor management</h4>
                    <p class="mc-challenge-card__text">Synchronizing product catalogs across hundreds of independent sellers while maintaining high quality standards and metadata consistency.</p>
                </div>
                <div class="mc-challenge-card" data-reveal data-reveal-delay="100">
                    <span class="material-symbols-outlined mc-challenge-card__icon">verified_user</span>
                    <h4 class="mc-challenge-card__title">Merchant Approval</h4>
                    <p class="mc-challenge-card__text">Ensuring a secure and vetted onboarding process for new vendors to protect marketplace reputation and customer safety.</p>
                </div>
                <div class="mc-challenge-card" data-reveal data-reveal-delay="200">
                    <span class="material-symbols-outlined mc-challenge-card__icon">local_shipping</span>
                    <h4 class="mc-challenge-card__title">Order Coordination</h4>
                    <p class="mc-challenge-card__text">Managing complex delivery workflows where orders might contain items from multiple vendors located in different regions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. SOLUTION -->
    <section class="mc-section mc-section--white" id="solution">
        <div class="container">
            <div class="mc-header mc-header--center" data-reveal>
                <h2 class="mc-title mc-title--ink">The Integrated Solution</h2>
                <p class="mc-subtitle mc-subtitle--center">A unified technical architecture that handles the complexity so users don't have to.</p>
            </div>
            <div class="mc-solution-panels" data-reveal>
                <div class="mc-solution-panel">
                    <div class="mc-solution-panel__eyebrow"><span class="material-symbols-outlined">devices</span> Customer Side</div>
                    <h3>Unified App</h3>
                    <div class="mc-check-list">
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Seamless multi-vendor cart</div>
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Advanced search &amp; filters</div>
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Personalized wishlist</div>
                    </div>
                </div>
                <div class="mc-solution-panel mc-solution-panel--alt">
                    <div class="mc-solution-panel__eyebrow"><span class="material-symbols-outlined">dashboard</span> Merchant Side</div>
                    <h3>Vendor Console</h3>
                    <div class="mc-check-list">
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Bulk product management</div>
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Order status tracking</div>
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Sales performance metrics</div>
                    </div>
                </div>
                <div class="mc-solution-panel">
                    <div class="mc-solution-panel__eyebrow"><span class="material-symbols-outlined">settings_accessibility</span> Admin Side</div>
                    <h3>Marketplace HQ</h3>
                    <div class="mc-check-list">
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Global merchant approval</div>
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Transaction monitoring</div>
                        <div class="mc-check-list__row"><span class="material-symbols-outlined">check_circle</span>Platform configuration</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. SHOPPING EXPERIENCE -->
    <section class="mc-section mc-section--low">
        <div class="container mc-shop__grid">
            <div class="mc-shop__phones" data-reveal>
                <div class="mc-shop__phone-wrap mc-shop__phone-wrap--raised"><div class="mc-shop__phone"><img src="<?php echo esc_url( $mc_welcome ); ?>" alt="Welcome screen" loading="lazy"></div></div>
                <div class="mc-shop__phone-wrap"><div class="mc-shop__phone"><img src="<?php echo esc_url( $mc_product ); ?>" alt="Product details screen" loading="lazy"></div></div>
                <div class="mc-shop__phone-wrap mc-shop__phone-wrap--raised"><div class="mc-shop__phone"><img src="<?php echo esc_url( $mc_wishlist ); ?>" alt="Wishlist screen" loading="lazy"></div></div>
            </div>
            <div data-reveal data-reveal-delay="150">
                <h2 class="mc-title mc-title--ink">The Shopping Experience</h2>
                <p style="color:var(--mc-muted);margin-block:1.5rem 2rem;line-height:1.75;">We prioritized a 'content-first' design language, ensuring that the fashion photography remains the star of the show while the UI provides frictionless utility.</p>
                <div class="mc-feature-grid">
                    <div class="mc-feature-grid__item"><span class="mc-feature-grid__dot"></span>Fast Secure Login</div>
                    <div class="mc-feature-grid__item"><span class="mc-feature-grid__dot"></span>Rich Product Details</div>
                    <div class="mc-feature-grid__item"><span class="mc-feature-grid__dot"></span>Interactive Wishlist</div>
                    <div class="mc-feature-grid__item"><span class="mc-feature-grid__dot"></span>Dynamic Cart System</div>
                    <div class="mc-feature-grid__item"><span class="mc-feature-grid__dot"></span>Order History</div>
                    <div class="mc-feature-grid__item"><span class="mc-feature-grid__dot"></span>Category Discovery</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. MERCHANT DASHBOARD -->
    <section class="mc-section mc-section--white">
        <div class="container">
            <div class="mc-header" data-reveal>
                <span class="mc-eyebrow">&nbsp;</span>
                <h2 class="mc-title">Merchant Dashboard</h2>
                <p class="mc-subtitle">A dedicated control center for vendors to manage their entire digital presence, from inventory uploads to order fulfillment.</p>
            </div>
            <div class="mc-browser" data-reveal>
                <div class="mc-browser__chrome">
                    <div class="mc-browser__dots">
                        <span class="mc-browser__dot mc-browser__dot--red"></span>
                        <span class="mc-browser__dot mc-browser__dot--gold"></span>
                        <span class="mc-browser__dot mc-browser__dot--primary"></span>
                    </div>
                    <span class="mc-browser__url">dashboard.merchant.spines.tech</span>
                </div>
                <div class="mc-browser__screen"><img src="<?php echo esc_url( $mc_dashboard ); ?>" alt="Merchant dashboard analytics overview" loading="lazy"></div>
            </div>
            <div class="mc-video-grid">
                <div class="mc-video-card" data-reveal data-reveal-delay="0">
                    <div class="mc-video-card__title">Merchant Login Demo</div>
                    <div class="mc-video-thumb">
                        <img src="<?php echo esc_url( $mc_video1 ); ?>" alt="Merchant login demo video thumbnail" loading="lazy">
                        <div class="mc-video-thumb__play"><span class="material-symbols-outlined">play_circle</span><span>Watch Video</span></div>
                    </div>
                </div>
                <div class="mc-video-card" data-reveal data-reveal-delay="120">
                    <div class="mc-video-card__title">Products Adding &amp; Editing</div>
                    <div class="mc-video-thumb">
                        <img src="<?php echo esc_url( $mc_video2 ); ?>" alt="Product management demo video thumbnail" loading="lazy">
                        <div class="mc-video-thumb__play"><span class="material-symbols-outlined">play_circle</span><span>Watch Video</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. ADMIN OVERSIGHT -->
    <section class="mc-section mc-section--dark">
        <div class="container mc-admin__grid">
            <div data-reveal>
                <h2 class="mc-title">Admin Oversight</h2>
                <p class="mc-subtitle" style="margin-block:1rem 2rem;">The Admin Panel provides the high-level steering wheel for the entire marketplace. Administrators can vet new merchants, monitor site-wide metrics, and resolve operational disputes with surgical precision.</p>
                <div class="mc-admin__feature">
                    <span class="material-symbols-outlined mc-admin__feature-icon">shield_person</span>
                    <div><div class="mc-admin__feature-title">Merchant Approval Flow</div><div class="mc-admin__feature-text">Review documentation and verify vendor credentials before granting platform access.</div></div>
                </div>
                <div class="mc-admin__feature">
                    <span class="material-symbols-outlined mc-admin__feature-icon">payments</span>
                    <div><div class="mc-admin__feature-title">Transaction Supervision</div><div class="mc-admin__feature-text">Monitor platform-wide revenue streams and handle manual settlement reconciliations.</div></div>
                </div>
            </div>
            <div class="mc-admin__visual" data-reveal data-reveal-delay="150">
                <div class="mc-admin__visual-glow" aria-hidden="true"></div>
                <div class="mc-admin__visual-frame"><img src="<?php echo esc_url( $mc_admin ); ?>" alt="Admin panel — global map and transaction feeds"></div>
            </div>
        </div>
    </section>

    <!-- 8. ONBOARDING LIFECYCLE -->
    <section class="mc-section mc-section--white">
        <div class="container mc-onboard">
            <div class="mc-header mc-header--center" data-reveal>
                <h2 class="mc-title mc-title--ink">Onboarding Lifecycle</h2>
                <p class="mc-subtitle mc-subtitle--center">The structured path from application to active merchant.</p>
            </div>
            <div class="mc-onboard__grid">
                <div class="mc-onboard__line" aria-hidden="true"></div>
                <div class="mc-onboard__step" data-reveal data-reveal-delay="0"><div class="mc-onboard__num">1</div><div class="mc-onboard__title">Request</div><div class="mc-onboard__text">Merchant submits brand profile and legal documents.</div></div>
                <div class="mc-onboard__step" data-reveal data-reveal-delay="80"><div class="mc-onboard__num">2</div><div class="mc-onboard__title">Review</div><div class="mc-onboard__text">Admin evaluates the brand quality and verification data.</div></div>
                <div class="mc-onboard__step" data-reveal data-reveal-delay="160"><div class="mc-onboard__num">3</div><div class="mc-onboard__title">Approval</div><div class="mc-onboard__text">Merchant account activated with full store access.</div></div>
                <div class="mc-onboard__step" data-reveal data-reveal-delay="240"><div class="mc-onboard__num">4</div><div class="mc-onboard__title">Management</div><div class="mc-onboard__text">Inventory upload and store operations commence.</div></div>
            </div>
        </div>
    </section>

    <!-- 9. PAYMENTS & DELIVERY -->
    <section class="mc-section mc-section--low">
        <div class="container mc-glass-grid">
            <div class="mc-glass-card" data-reveal data-reveal-delay="0">
                <div class="mc-glass-card__icon"><span class="material-symbols-outlined">payments</span></div>
                <div>
                    <h3>Flexible Payments</h3>
                    <p>Designed for regional logistics, supporting Cash on Delivery as primary, with hooks for digital wallet and card gateway integrations.</p>
                    <div class="mc-glass-card__chips"><span class="mc-chip">COD SUPPORT</span><span class="mc-chip">API READY</span></div>
                </div>
            </div>
            <div class="mc-glass-card mc-glass-card--gold" data-reveal data-reveal-delay="120">
                <div class="mc-glass-card__icon"><span class="material-symbols-outlined">local_shipping</span></div>
                <div>
                    <h3>Delivery Logic</h3>
                    <p>A manual coordination workflow that gives merchants total control over their local logistics and preparation timelines.</p>
                    <div class="mc-glass-card__chips"><span class="mc-chip">TRACKING FLOW</span><span class="mc-chip">MANUAL CAPTURE</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. TECH STACK -->
    <section class="mc-section mc-section--white">
        <div class="container" style="text-align:center;">
            <span class="mc-eyebrow">Performance Foundation</span>
            <div class="mc-tech-pills" data-reveal>
                <span class="mc-tech-pill">Flutter</span>
                <span class="mc-tech-pill">Node.js</span>
                <span class="mc-tech-pill">NoSQL</span>
                <span class="mc-tech-pill">Nginx</span>
                <span class="mc-tech-pill">Firebase</span>
            </div>
        </div>
    </section>

    <!-- 11. VISUAL SHOWCASE -->
    <section class="mc-section mc-section--low">
        <div class="container">
            <div class="mc-masonry" data-reveal>
                <div class="mc-masonry__item"><img src="<?php echo esc_url( $mc_logo ); ?>" alt="Merchant brand showcase" loading="lazy"></div>
                <div class="mc-masonry__item"><img src="<?php echo esc_url( $mc_product ); ?>" alt="Fashion texture detail" loading="lazy"></div>
                <div class="mc-masonry__item"><img src="<?php echo esc_url( $mc_wishlist ); ?>" alt="Category montage" loading="lazy"></div>
                <div class="mc-masonry__item"><img src="<?php echo esc_url( $mc_dashboard ); ?>" alt="Responsive dashboard views" loading="lazy"></div>
            </div>
        </div>
    </section>

    <!-- 12. DEMO VIDEOS -->
    <section class="mc-section mc-section--low">
        <div class="container">
            <div class="mc-header mc-header--center" data-reveal>
                <h2 class="mc-title mc-title--ink">Watch it in Action</h2>
            </div>
            <div class="mc-video-grid">
                <div data-reveal data-reveal-delay="0">
                    <div class="mc-video-thumb" style="border-radius:1.5rem;">
                        <img src="<?php echo esc_url( $mc_video1_alt ); ?>" alt="Merchant login workflow video" loading="lazy">
                        <div class="mc-video-thumb__play"><span class="material-symbols-outlined">play_arrow</span></div>
                    </div>
                    <h4 style="margin-block:1rem 0.5rem;font-weight:800;">Merchant Login Workflow</h4>
                    <p style="color:var(--mc-muted);font-size:0.92rem;">A step-by-step demonstration of the secure merchant entry and multi-factor authentication process.</p>
                </div>
                <div data-reveal data-reveal-delay="120">
                    <div class="mc-video-thumb" style="border-radius:1.5rem;">
                        <img src="<?php echo esc_url( $mc_video2_alt ); ?>" alt="Product management demo video" loading="lazy">
                        <div class="mc-video-thumb__play"><span class="material-symbols-outlined">play_arrow</span></div>
                    </div>
                    <h4 style="margin-block:1rem 0.5rem;font-weight:800;">Product Management Demo</h4>
                    <p style="color:var(--mc-muted);font-size:0.92rem;">See how vendors can easily list, edit, and categorize products within their storefront in seconds.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 13. RESULTS -->
    <section class="mc-section mc-section--white" id="results">
        <div class="container mc-results__grid">
            <div data-reveal>
                <h2 class="mc-title">Ready for Market</h2>
                <p style="color:var(--mc-muted);margin-block:1.5rem 2.5rem;line-height:1.75;">Merchant is a battle-tested architecture that removes technical roadblocks for fashion entrepreneurs. It provides a complete end-to-end flow from first customer engagement to final delivery verification.</p>
                <div class="mc-star-list">
                    <div class="mc-star-item"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">stars</span><span>Complete Flutter Customer App</span></div>
                    <div class="mc-star-item"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">stars</span><span>Enterprise Merchant Dashboard</span></div>
                    <div class="mc-star-item"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">stars</span><span>Centralized Marketplace Admin Panel</span></div>
                    <div class="mc-star-item"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">stars</span><span>Seamless Multi-Vendor Workflow</span></div>
                </div>
            </div>
            <div class="mc-image-grid" data-reveal data-reveal-delay="150">
                <div class="mc-image-grid__item"><img src="<?php echo esc_url( $mc_review ); ?>" alt="Customer review section"></div>
                <div class="mc-image-grid__item mc-image-grid__item--down"><img src="<?php echo esc_url( $mc_payment ); ?>" alt="Payment confirmation screen"></div>
                <div class="mc-image-grid__item mc-image-grid__item--up"><img src="<?php echo esc_url( $mc_admintable ); ?>" alt="Admin merchant listing table"></div>
                <div class="mc-image-grid__item"><img src="<?php echo esc_url( $mc_lifestyle ); ?>" alt="Merchant using dashboard in-store"></div>
            </div>
        </div>
    </section>

    <!-- ENGINEERING SUCCESS METRICS -->
    <section class="mc-section mc-section--low">
        <div class="container mc-metrics" data-reveal>
            <div class="mc-metric-box mc-metric-box--primary">
                <h3>Engineering Success</h3>
                <p>How we scaled Merchant from a concept to a high-volume marketplace handling thousands of daily transactions with zero downtime.</p>
            </div>
            <div class="mc-metric-box mc-metric-box--gold">
                <span class="mc-metric-box__value" data-counter="120%">0%</span>
                <span class="mc-metric-box__label">Conversion Growth</span>
            </div>
        </div>
    </section>

    <!-- 14. FINAL CTA -->
    <section class="mc-section mc-section--white">
        <div class="container">
            <div class="mc-cta" data-reveal>
                <h2 class="mc-cta__title">Build Your Own Ecosystem</h2>
                <p class="mc-cta__text">Transform your marketplace vision into a high-performance reality with SpinesTech's ready-made foundation.</p>
                <div class="mc-cta__actions">
                    <a href="<?php echo esc_url( $contact_url ); ?>" class="mc-btn mc-btn--gold">Start Your Project</a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mc-btn mc-btn--outline-light">Contact SpinesTech</a>
                </div>
            </div>
        </div>
    </section>

</main>
</div><!-- /.case-study-detail -->

<?php
endwhile;
get_footer();