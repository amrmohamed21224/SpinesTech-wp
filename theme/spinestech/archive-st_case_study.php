<?php
/**
 * Archive: Case Studies
 * File: archive-st_case_study.php
 *
 * Images sourced directly from the Figma/design reference provided.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$is_rtl = st_locale() === 'ar';
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';

/* ─────────────────────────────────────────────
   Image URLs — taken directly from Figma design
───────────────────────────────────────────── */
$img_phone    = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDxWRGeVthaBFQzTnRnY9a7Ot31Mj5O_sJJcG4ZRxba9iTPJaMwu9-HGayk05YVs-jAKPv4e2wUia7SXa8tFAQKKp9766TrjMI2sc5wRmGuZSFuC7hI0Mj9rLvOD70wWz7ouMENc95je__EP6JnJ3T74R-mW3cMLo2zSbUNfYrWkogLkLDC36tyPThn887msFkSg8XTsc2xOwIs63toE8GW42N-n8Oao-_B9iBAZ6dWVyLsFKjG5sqNx435nzHUEwj1fXitK8F6BA';
$img_desktop  = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBdrz59eUmbWi4CUgxkfcEr_ly7uDKTk7tp90rYKgffzEPNq49hUiFQ3KUX4DKzm4QPlyorfbVURoIQYWRmffl-hgjloEi9r2PZKJcxSvuJ-QKvD0HlZXQkR4fvBfz5Q7kYx-U0vnnV_Jy2iYdsEdTnAS2FjCXyh1boV2_yJc__AaBspyeeH-fqlnBByd-OVYEQulLxom7_tFRfw2Y06ozvA23Y8LxAVX99RhryLL97oODDunz2m89EPO_K_xy5p53kjZKsm84XNQ';
$img_map      = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCSTB4gw6R2AB5wIaD_ZGwgQjbEc7JLxpRmMnyO8h3URFC8mlaCHFN2GzV_fn86hBwLEIZNUvjs4aMDPp_Bw7Fra-HQmn-uvVyIkIShPos1i32EZ6Zv-gEne-gLx_pJIdQdHQ8EvpYc-AGrAJiDx0ROHEzF6bz44KKzBgW_aoF4pNZcWBQmkY0u6ScO80r4EpjDo4qMA3bOurZyLAIHrgV4soli8vUPHrhqIqmQgmw1Zc_g_788WrT7eNpBKJ-McSTT-lLe-IocNw';
$img_customer = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDB5Y6kRQAdmuKIs4rBq9yEmT-smkgsGdlYdJbXsBEfbdoEn749XbHBXN-h5qi-4cc25F4yS4F3xRC8rFbkQjs3uwLeZJRb6ztg_rRo3nqxSh0qhfpff9vW_df8ZCyuZi_6Giu8Ilnki_RwnWSQUUzbmEFx5rhKatolGYFfYYSa1NtbK8Ns8BnlerUB6YWpV5GJBNSYrVGHVjoiSoTRNKdnmhsiXv4_BDrhgkyXx9eSO7sAd7FHQ8-gW0DdgeacJfxcKzFYtVuVXg';
$img_driver   = 'https://lh3.googleusercontent.com/aida-public/AB6AXuAYCW5elAr01gMuFCBHXJCBR7NL9QIXHzPv52hcY1ilDU0BJVlqJAyqD6UvjpFaM2JerCfmT84GdVkRGms8x8OKZ2tw5gYjoa2plSF0baV0W8uUk_PnLUUqU1ruBGRX6dObH0z9UM5JZRrS1N_MIJCHzlineojb17xWUgnVtZymIRrh0Ffi4NTcJhqEsBPjDp4wg2isezRurNcitB8YHrf_KNRhg0q0hVd0QlH6aHiN3AJnI2HMTxzxf0uKmn6_eqLjvDMPoCLvbA';
$img_admin    = 'https://lh3.googleusercontent.com/aida-public/AB6AXuD9RriQyjPxTAA3N3nsT26UVJ5GFTcarodgRn7023DfVab8iJfkpDgp_sSYN9jk8kgnpxoZWInqZZU1xyWb2J1M8ENYDMy3i7uW4-4QhDyYDpIYZuy0HdM4TLpzF7a6wEN_Fq-5ksPOxjmy90OLoraEuPK5Z3guXGCtV-ywf5tPzKRtERml3lwzA_LappMAWYJPGFX9CyCH_E4LxJTa9euvfsSawsP2xaKVpnRT_WxZzygSeXrBtmwNrCt1TevBZY-Bcv5DjMt8IQ';

/* Merchant case study images (sourced from its design reference) */
$img_merchant_dashboard = 'https://lh3.googleusercontent.com/aida-public/AB6AXuABmSjnknukfQY09JZuMi2mL3oAbDAke0MlpdALUVH3u_uXeUAaa4wNzthZrZ_Jmzh8puKmSMc0CBR02jG9JIrQhgrAtG3kzKfw676mUV2hgLQ8P9BiYuMOTWxPd434XcUZP56Ppfzu8CB4rKyl_YzBJFstCKOeW5ASsoJnKP8KmyF6gvx6Jj-5RIQoNRj_QoT81Xs12cz9nz8nZVAg5RLGFknr5-L2oKf9MWuQxck3hNF2bNwRT5bx2yvZKUwI3J88TEhiDyNr-iQ';
$img_merchant_product   = 'https://lh3.googleusercontent.com/aida-public/AB6AXuAyZsqol7z9Ue9KH2KG2lvLCSjMoe_anP1DrV1ZdmINtekEzJ3M_fsf0XOJLy7A2DlvEfE0s0y0QDU0OLN5LssS_St26d1y__bnTQ4aTETy1b4h29iV-P7HBBBjZ2wKjIekiuUCBkgL81ASDcX2omfAX0p80gikMhb5dkfJPFN7IWKbt1XJXJ11EXAy7aEgTdcZOMorCC7x434nb7NYxdfUUPo9_k-3jk6_5v9SWoFEy6b4wYhatLtMFtGkvCaNMPlkkT4jgwatWow';

/* ─────────────────────────────────────────────
   Helper: resolve a case-study URL by trying
   multiple slugs, with a safe fallback.
───────────────────────────────────────────── */
$resolve_case_url = static function ( array $slugs ): string {
    foreach ( $slugs as $slug ) {
        $post = get_page_by_path( $slug, OBJECT, 'st_case_study' );
        if ( $post instanceof WP_Post ) {
            return (string) get_permalink( $post );
        }
    }
    return (string) get_post_type_archive_link( 'st_case_study' );
};


/* ─────────────────────────────────────────────
   DATA
───────────────────────────────────────────── */
$featured = [
    [
        'title'       => 'Backway Logistics',
        'title_ar'    => 'Backway للحلول اللوجستية',
        'kicker'      => '01 / Logistics and delivery',
        'kicker_ar'   => '01 / الخدمات اللوجستية والشحن',
        'headline'    => 'Building the future of last-mile delivery',
        'headline_ar' => 'بناء مستقبل خدمات التوصيل',
        'summary'     => 'SpinesTech built an operational experience that connects orders, drivers, and admin dashboards in a scalable delivery ecosystem.',
        'summary_ar'  => 'قادت SpinesTech عملية بناء تجربة تشغيلية متكاملة تربط الطلبات والسائقين ولوحات التحكم ضمن منظومة مرنة عالية الأداء.',
        'client'      => 'Backway',
        'scope'       => 'iOS, Android, Web App',
        'scope_ar'    => 'iOS, Android, تطبيق ويب',
        'tag'         => $is_rtl ? 'منصة تشغيل' : 'Operations Platform',
        'image'       => $img_map,      /* Live route dashboard screenshot */
        'slugs'       => [ 'backway-logistics', 'backway', 'supply-chain-erp', 'logistics' ],
    ],
    [
        'title'       => 'Merchant',
        'title_ar'    => 'ميرشانت للتجارة الإلكترونية',
        'kicker'      => '02 / Fashion e-commerce',
        'kicker_ar'   => '02 / التجارة الإلكترونية والأزياء',
        'headline'    => 'A multi-vendor fashion marketplace, built ready for market',
        'headline_ar' => 'سوق أزياء متعدد التجار، جاهز للتشغيل الفعلي',
        'summary'     => 'A complete multi-vendor platform pairing a Flutter customer app with an enterprise merchant dashboard and a centralized admin panel.',
        'summary_ar'  => 'منصة متكاملة متعددة التجار تجمع تطبيق عملاء بـ Flutter، ولوحة تحكم تجار احترافية، ولوحة إدارة مركزية.',
        'client'      => $is_rtl ? 'ميرشانت' : 'Merchant',
        'scope'       => 'iOS, Android, Web Dashboard',
        'scope_ar'    => 'iOS, Android, لوحة تحكم ويب',
        'tag'         => $is_rtl ? 'سوق إلكتروني' : 'E-Commerce Platform',
        'image'       => $img_merchant_dashboard,
        'style'       => 'mockup',
        'slugs'       => [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ],
        'url'         => trailingslashit( (string) get_post_type_archive_link( 'st_case_study' ) ) . 'merchant/',
    ],
    [
        'title'       => 'PropCare 360',
        'title_ar'    => 'PropCare 360',
        'kicker'      => '03 / Property Management',
        'kicker_ar'   => '03 / إدارة الأملاك والمرافق',
        'headline'    => 'A complete digital platform for property services and maintenance',
        'headline_ar' => 'منصة رقمية متكاملة لإدارة خدمات الأملاك والصيانة',
        'summary'     => 'PropCare 360 helps property management companies automate operations, manage contracts, and increase maintenance team efficiency.',
        'summary_ar'  => 'تساعد PropCare 360 شركات خدمات الأملاك على أتمتة العمليات، وإدارة العقود، ورفع كفاءة فرق الصيانة.',
        'client'      => 'PropCare 360',
        'scope'       => 'iOS, Android, Web Dashboard',
        'scope_ar'    => 'iOS, Android, لوحة تحكم ويب',
        'tag'         => $is_rtl ? 'منصة تشغيل' : 'Operations Platform',
        'image'       => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCmEcMblEGonXBUcWDLYRGAdH3fRDWBbRqMrYq0WU4CtvOiLQ-UXuai4E7h-FrIOL-uF5Hk3gn6ot5LBTeu7eartskzk8CNPBJqm4fobBNAf8dF62xun638hLDwHaGfUnHafkAdwUX_wW3wEkp81kP3jmrNeGNYk4EuDbdKcq1cVKdJ726e-eXyR9ZlfunPFsspTo1JJgb54Y-eWv4ZglmfBuBpz6dA2PsjY9LmVeWxeP4UnZIdcJUd-qMcf9qjrVE1mOBMzjocFEbf',
        'style'       => 'photo',
        'slugs'       => [ 'propcare', 'propcare-360', 'property-management' ],
        'url'         => trailingslashit( (string) get_post_type_archive_link( 'st_case_study' ) ) . 'propcare/',
    ],
];

$mobile_cards = [
    [
        'title' => 'Swift UI',
        'tag'   => $is_rtl ? 'منتج موبايل' : 'Mobile Product',
        'image' => $img_phone,    /* Hero phone mockup */
        'slugs' => [ 'fittrack-pro', 'fittrack', 'customer-service-ai-agent' ],
    ],
    [
        'title' => 'FitTrack Pro',
        'tag'   => $is_rtl ? 'تتبع صحي' : 'Health Tracking',
        'image' => $img_driver,   /* Driver app screen */
        'slugs' => [ 'fittrack-pro', 'fittrack', 'customer-service-ai-agent' ],
    ],
    [
        'title' => 'Backway App',
        'tag'   => $is_rtl ? 'سير عمل السائق' : 'Driver Workflow',
        'image' => $img_customer, /* Customer app screen */
        'slugs' => [ 'backway-logistics', 'backway', 'supply-chain-erp' ],
    ],
    [
        'title' => 'Merchant Kit',
        'tag'   => $is_rtl ? 'واجهة المتجر' : 'Storefront UI',
        'image' => $img_merchant_product, /* Product detail screen */
        'slugs' => [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ],
    ],
];

$figma_cards = [
    [
        'title'   => 'Backway Logistics',
        'badge'   => 'Precision',
        'desc'    => 'Complex logistics flows delivered as a polished, high-performance case study.',
        'desc_ar' => 'مسارات لوجستية معقدة مُسلَّمة كدراسة حالة راقية وعالية الأداء.',
        'image'   => $img_map,      /* Route map dashboard */
        'slugs'   => [ 'backway-logistics', 'backway', 'supply-chain-erp' ],
    ],
    [
        'title'   => 'Merchant',
        'badge'   => 'Figma Approved',
        'desc'    => 'Visual details and interactions preserved from design to implementation.',
        'desc_ar' => 'تفاصيل التصميم والتفاعلات محفوظة من الـ Figma حتى التطبيق الفعلي.',
        'image'   => $img_merchant_product, /* Product detail screen */
        'slugs'   => [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ],
    ],
    [
        'title'   => 'FitTrack Pro',
        'badge'   => 'UI System',
        'desc'    => 'A clear mobile interface for tracking activity and turning data into action.',
        'desc_ar' => 'واجهة موبايل واضحة لتتبع النشاط وتحويل البيانات لقرارات.',
        'image'   => $img_phone,    /* Phone mockup */
        'slugs'   => [ 'fittrack-pro', 'fittrack', 'customer-service-ai-agent' ],
    ],
];

$tech_badges = $is_rtl
    ? [ 'متعدد المنصات', 'خدمات مصغرة', 'مؤسسي', 'سحابي بالكامل' ]
    : [ 'Cross-Platform', 'Microservices', 'Enterprise', 'Cloud Native' ];

$tech_stack = [
    [ 'name' => 'Flutter',    'icon'   => 'https://cdn.simpleicons.org/flutter/025EB9',    'offset' => false ],
    [ 'name' => 'Node.js',    'icon'   => 'https://cdn.simpleicons.org/nodedotjs/339933',  'offset' => true  ],
    [ 'name' => 'NestJS',     'icon'   => 'https://cdn.simpleicons.org/nestjs/E0234E',     'offset' => false ],
    [ 'name' => 'React',      'icon'   => 'https://cdn.simpleicons.org/react/61DAFB',      'offset' => true  ],
    [ 'name' => 'Swift',      'icon'   => 'https://cdn.simpleicons.org/swift/F05138',      'offset' => false ],
    [ 'name' => 'K8s',        'icon'   => 'https://cdn.simpleicons.org/kubernetes/326CE5', 'offset' => true  ],
    [ 'name' => 'Docker',     'icon'   => 'https://cdn.simpleicons.org/docker/2496ED',     'offset' => false ],
    [ 'name' => 'Python',     'icon'   => 'https://cdn.simpleicons.org/python/3776AB',     'offset' => true  ],
    [ 'name' => 'TypeScript', 'icon'   => 'https://cdn.simpleicons.org/typescript/3178C6', 'offset' => false ],
    [ 'name' => 'Postgres',   'icon'   => 'https://cdn.simpleicons.org/postgresql/4169E1', 'offset' => true  ],
    [ 'name' => 'AI Agents',  'symbol' => 'psychology',              'offset' => false ],
    [ 'name' => 'Automation', 'symbol' => 'precision_manufacturing', 'offset' => true  ],
];
?>

<main class="page-case-studies">

    <!-- ══════════════════════════════════════════════════════
         1. HERO
    ══════════════════════════════════════════════════════ -->
    <section class="case-studies__hero">
        <div class="case-studies__hero-bg" aria-hidden="true">
            <div class="case-studies__hero-glow-1"></div>
            <div class="case-studies__hero-glow-2"></div>
            <div class="case-studies__hero-pattern"></div>
        </div>
        <div class="container case-studies__hero-content">
            <span class="case-studies__label">
                <?php echo esc_html( $is_rtl ? 'أعمال مختارة' : 'Selected Work' ); ?>
            </span>
            <h1 class="case-studies__hero-title">
                <?php if ( $is_rtl ) : ?>
                    أعمالنا المختارة تبرز كيف نبني منصات
                    <span class="text-gradient-green">جاهزة للأعمال</span>
                <?php else : ?>
                    Selected Work That Shows How We Build
                    <span class="text-gradient-green">Business-Ready</span> Platforms
                <?php endif; ?>
            </h1>
            <p class="case-studies__hero-copy">
                <?php echo esc_html( $is_rtl
                    ? 'نحوّل الأفكار والواجهات ومسارات التشغيل إلى منصات رقمية قابلة للنمو، واضحة للمستخدم، ومهيأة للتشغيل الحقيقي.'
                    : 'From logistics marketplaces to booking flows and mobile products, explore how ideas become usable digital systems.'
                ); ?>
            </p>
            <div class="case-studies__hero-actions">
                <a class="case-studies__btn case-studies__btn--primary"
                   href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">
                    <?php echo esc_html( $is_rtl ? 'ابدأ مشروعك معنا' : 'Start Your Project' ); ?>
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $arrow ); ?></span>
                </a>
                <a class="case-studies__btn case-studies__btn--outline"
                   href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                    <?php echo esc_html( $is_rtl ? 'عرض الخدمات' : 'View Services' ); ?>
                </a>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════════════
         2. FEATURED PROJECTS
    ══════════════════════════════════════════════════════ -->
    <section class="case-studies__featured">
        <div class="container">
            <div class="case-studies__section-header">
                <span class="case-studies__label">
                    <?php echo esc_html( $is_rtl ? 'دراسات مختارة' : 'Featured full platform delivery' ); ?>
                </span>
                <h2 class="case-studies__section-title">
                    <?php echo esc_html( $is_rtl
                        ? 'تسليم منظومات تقنية متكاملة'
                        : 'Built with the same standard as Backway'
                    ); ?>
                </h2>
                <p class="case-studies__section-copy">
                    <?php echo esc_html( $is_rtl
                        ? 'نختار من هذه النماذج ما يوضح طريقة بناء المنصة من التصميم المعماري حتى المنتج القابل للتشغيل.'
                        : 'Every project opens a detailed case study page using the premium case-study template.'
                    ); ?>
                </p>
            </div>

            <div class="case-studies__projects">
                <?php foreach ( $featured as $index => $item ) :
                    $reverse     = ( $index % 2 === 1 );
                    $img_cls     = $reverse ? 'case-studies__project-image--right' : 'case-studies__project-image--left';
                    $content_cls = $reverse ? 'case-studies__project-content--left' : 'case-studies__project-content--right';
                    $align_cls   = $is_rtl  ? 'rtl-right' : 'ltr-right';
                    $title_out   = $is_rtl  ? $item['title_ar']    : $item['title'];
                    $kicker_out  = $is_rtl  ? $item['kicker_ar']   : $item['kicker'];
                    $head_out    = $is_rtl  ? $item['headline_ar']  : $item['headline'];
                    $summ_out    = $is_rtl  ? $item['summary_ar']   : $item['summary'];
                    $scope_out   = $is_rtl  ? ( $item['scope_ar'] ?? $item['scope'] ) : $item['scope'];
                    $card_style  = $item['style'] ?? 'photo';
                ?>
                <a class="case-studies__project case-studies__project-link-card"
                   href="<?php echo esc_url( $item['url'] ?? $resolve_case_url( $item['slugs'] ) ); ?>">

                    <?php if ( $card_style === 'mockup' ) : ?>
                    <div class="case-studies__project-image <?php echo esc_attr( $img_cls ); ?> case-studies__project-image--mockup">
                        <div class="mockup-browser">
                            <div class="mockup-browser__bar">
                                <span class="mockup-browser__brand">Merchant Hub</span>
                                <span class="mockup-browser__icons" aria-hidden="true">
                                    <span class="material-symbols-outlined">settings</span>
                                    <span class="material-symbols-outlined">notifications</span>
                                    <span class="material-symbols-outlined">account_circle</span>
                                </span>
                            </div>
                            <div class="mockup-browser__body">
                                <div class="mockup-dash__head">
                                    <h5>Merchant Case Study: Summer Collection Growth</h5>
                                    <div class="mockup-dash__actions">
                                        <span class="mockup-dash__range">June 1 – July 31, 2025</span>
                                        <span class="mockup-dash__export"><span class="material-symbols-outlined">ios_share</span>Export Report</span>
                                    </div>
                                </div>
                                <div class="mockup-dash__stats">
                                    <div class="mockup-stat"><span class="mockup-stat__label">Total Revenue</span><span class="mockup-stat__value">$145,890 <em>+18%</em></span></div>
                                    <div class="mockup-stat"><span class="mockup-stat__label">Orders</span><span class="mockup-stat__value">3,452 <em>+12%</em></span></div>
                                    <div class="mockup-stat"><span class="mockup-stat__label">Average Order Value</span><span class="mockup-stat__value">$42.26 <em>+5%</em></span></div>
                                    <div class="mockup-stat"><span class="mockup-stat__label">Conversion Rate</span><span class="mockup-stat__value">3.8% <em>+0.5%</em></span></div>
                                </div>
                                <div class="mockup-dash__chart">
                                    <span class="mockup-dash__chart-title">Sales Overview</span>
                                    <svg viewBox="0 0 400 90" preserveAspectRatio="none" class="mockup-dash__chart-svg">
                                        <path d="M0,60 C20,55 35,25 55,30 C75,35 85,65 105,60 C125,55 140,15 160,18 C180,21 190,55 210,50 C230,45 245,20 265,22 C285,24 300,58 320,55 C340,52 355,30 375,32 C385,33 395,45 400,48"
                                              fill="none" stroke="#5aa9a7" stroke-width="2.5"/>
                                        <path d="M0,60 C20,55 35,25 55,30 C75,35 85,65 105,60 C125,55 140,15 160,18 C180,21 190,55 210,50 C230,45 245,20 265,22 C285,24 300,58 320,55 C340,52 355,30 375,32 C385,33 395,45 400,48 L400,90 L0,90 Z"
                                              fill="rgba(0,103,101,0.08)" stroke="none"/>
                                    </svg>
                                </div>
                                <div class="mockup-dash__products">
                                    <span class="mockup-dash__products-title">Recently Added Products</span>
                                    <div class="mockup-products-grid">
                                        <div class="mockup-product"><span class="mockup-product__thumb mockup-product__thumb--1"></span><span class="mockup-product__name">Floral Maxi Dress</span><span class="mockup-product__price">$89.00</span></div>
                                        <div class="mockup-product"><span class="mockup-product__thumb mockup-product__thumb--2"></span><span class="mockup-product__name">Denim Jacket</span><span class="mockup-product__price">$68.00</span></div>
                                        <div class="mockup-product"><span class="mockup-product__thumb mockup-product__thumb--3"></span><span class="mockup-product__name">Linen Shirt</span><span class="mockup-product__price">$45.00</span></div>
                                        <div class="mockup-product"><span class="mockup-product__thumb mockup-product__thumb--4"></span><span class="mockup-product__name">Denim Jacket</span><span class="mockup-product__price">$68.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="case-studies__project-image-overlay case-studies__project-image-overlay--mockup" aria-hidden="true"></div>
                        <div class="case-studies__project-image-content <?php echo esc_attr( $align_cls ); ?>">
                            <span class="case-studies__project-tag"><?php echo esc_html( $item['tag'] ); ?></span>
                            <h3 class="case-studies__project-name"><?php echo esc_html( $title_out ); ?></h3>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="case-studies__project-image <?php echo esc_attr( $img_cls ); ?>">
                        <div class="case-studies__project-image-bg"
                             style="background-image:url('<?php echo esc_url( $item['image'] ); ?>');"
                             role="img"
                             aria-label="<?php echo esc_attr( $title_out ); ?>">
                        </div>
                        <div class="case-studies__project-image-overlay" aria-hidden="true"></div>
                        <div class="case-studies__project-image-content <?php echo esc_attr( $align_cls ); ?>">
                            <span class="case-studies__project-tag"><?php echo esc_html( $item['tag'] ); ?></span>
                            <h3 class="case-studies__project-name"><?php echo esc_html( $title_out ); ?></h3>
                        </div>
                    </div>
                    <?php endif; ?>


                    <div class="case-studies__project-content <?php echo esc_attr( $content_cls ); ?>">
                        <span class="case-studies__project-sector"><?php echo esc_html( $kicker_out ); ?></span>
                        <h3 class="case-studies__project-title"><?php echo esc_html( $head_out ); ?></h3>
                        <p class="case-studies__project-desc"><?php echo esc_html( $summ_out ); ?></p>
                        <div class="case-studies__project-meta">
                            <div>
                                <div class="case-studies__meta-label">
                                    <?php echo esc_html( $is_rtl ? 'العميل' : 'Client' ); ?>
                                </div>
                                <div class="case-studies__meta-value"><?php echo esc_html( $item['client'] ); ?></div>
                            </div>
                            <div>
                                <div class="case-studies__meta-label">
                                    <?php echo esc_html( $is_rtl ? 'النطاق' : 'Scope' ); ?>
                                </div>
                                <div class="case-studies__meta-value"><?php echo esc_html( $scope_out ); ?></div>
                            </div>
                        </div>
                        <span class="case-studies__project-link" aria-hidden="true">
                            <?php echo esc_html( $is_rtl ? 'استعرض تفاصيل المشروع' : 'Explore case study' ); ?>
                            <span class="material-symbols-outlined <?php echo $is_rtl ? 'rtl' : 'ltr'; ?>">
                                <?php echo esc_html( $arrow ); ?>
                            </span>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════════════
         3. TECH STACK
    ══════════════════════════════════════════════════════ -->
    <section class="case-studies__tech">
        <div class="container">
            <div class="case-studies__tech-header">
                <div class="case-studies__tech-title-wrapper">
                    <span class="case-studies__label">
                        <?php echo esc_html( $is_rtl ? 'تميز تقني' : 'Technical Excellence' ); ?>
                    </span>
                    <h2 class="case-studies__section-title">
                        <?php echo esc_html( $is_rtl
                            ? 'القوة الكامنة خلف بنيتكم الرقمية'
                            : 'The Power Behind Your Digital Infrastructure'
                        ); ?>
                    </h2>
                    <p class="case-studies__section-copy">
                        <?php echo esc_html( $is_rtl
                            ? 'نستخدم حزمة تقنية عالمية لبناء أنظمة مرنة وعالية الأداء تدعم نمو الأعمال والكفاءة التشغيلية.'
                            : 'We leverage a world-class technology stack to build resilient, high-performance systems that drive business growth and operational efficiency.'
                        ); ?>
                    </p>
                </div>
                <div class="case-studies__tech-badges"
                     aria-label="<?php echo esc_attr( $is_rtl ? 'مزايا تقنية' : 'Technical capabilities' ); ?>">
                    <?php foreach ( $tech_badges as $badge ) : ?>
                    <span class="case-studies__tech-badge">
                        <span class="case-studies__tech-badge-dot" aria-hidden="true"></span>
                        <span class="case-studies__tech-badge-text"><?php echo esc_html( $badge ); ?></span>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="case-studies__tech-grid">
                <?php foreach ( $tech_stack as $tech ) :
                    $offset_cls = ! empty( $tech['offset'] ) ? ' case-studies__tech-card--offset' : '';
                ?>
                <div class="case-studies__tech-card case-studies__premium-card<?php echo esc_attr( $offset_cls ); ?>">
                    <span class="case-studies__tech-icon-wrapper">
                        <?php if ( ! empty( $tech['icon'] ) ) : ?>
                            <img src="<?php echo esc_url( $tech['icon'] ); ?>"
                                 alt="<?php echo esc_attr( $tech['name'] ); ?>"
                                 width="40" height="40"
                                 loading="lazy">
                        <?php else : ?>
                            <span class="material-symbols-outlined case-studies__tech-symbol" aria-hidden="true">
                                <?php echo esc_html( $tech['symbol'] ); ?>
                            </span>
                        <?php endif; ?>
                    </span>
                    <span class="case-studies__tech-name"><?php echo esc_html( $tech['name'] ); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════════════
         4. MOBILE APP CARDS
    ══════════════════════════════════════════════════════ -->
    <section class="case-studies__mobile">
        <div class="container">
            <div class="case-studies__mobile-header">
                <div>
                    <span class="case-studies__label">
                        <?php echo esc_html( $is_rtl ? 'تطبيقات الجوال' : 'Mobile App Designs' ); ?>
                    </span>
                    <h2 class="case-studies__section-title">
                        <?php echo esc_html( $is_rtl
                            ? 'مساهماتنا في تصميم تطبيقات الجوال'
                            : 'Mobile App Designs & Contributions'
                        ); ?>
                    </h2>
                </div>
                <span class="case-studies__mobile-disclaimer">
                    <?php echo esc_html( $is_rtl
                        ? 'اضغط على أي كارت لاستعراض دراسة الحالة'
                        : 'Tap any card to view the full case study'
                    ); ?>
                </span>
            </div>

            <div class="case-studies__mobile-grid">
                <?php foreach ( $mobile_cards as $card ) : ?>
                <a class="case-studies__mobile-card case-studies__premium-card"
                   href="<?php echo esc_url( $resolve_case_url( $card['slugs'] ) ); ?>">
                    <div class="case-studies__mobile-image-wrapper">
                        <div class="case-studies__mobile-image"
                             style="background-image:url('<?php echo esc_url( $card['image'] ); ?>');"
                             role="img"
                             aria-label="<?php echo esc_attr( $card['title'] ); ?>">
                        </div>
                        <span class="case-studies__mobile-badge <?php echo esc_attr( $is_rtl ? 'rtl' : 'ltr' ); ?>"
                              aria-hidden="true">
                            <?php echo esc_html( $card['tag'] ); ?>
                        </span>
                    </div>
                    <div>
                        <h3 class="case-studies__mobile-title"><?php echo esc_html( $card['title'] ); ?></h3>
                        <p class="case-studies__mobile-meta">
                            <?php echo esc_html( $is_rtl
                                ? 'واجهة وتجربة مستخدم جاهزة للإنتاج.'
                                : 'Production-ready interface and journey design.'
                            ); ?>
                        </p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════════════
         5. FIGMA TO CODE
    ══════════════════════════════════════════════════════ -->
    <section class="case-studies__figma">
        <div class="container">
            <div class="case-studies__section-header">
                <span class="case-studies__label">
                    <?php echo esc_html( $is_rtl ? 'من التصميم إلى البرمجة' : 'Figma to Code Excellence' ); ?>
                </span>
                <h2 class="case-studies__section-title">
                    <?php echo esc_html( $is_rtl
                        ? 'التميز في ترجمة التصميم إلى برمجة'
                        : 'Design systems converted into real product pages'
                    ); ?>
                </h2>
            </div>

            <div class="case-studies__figma-grid">
                <?php foreach ( $figma_cards as $card ) :
                    $desc_out = $is_rtl ? $card['desc_ar'] : $card['desc'];
                ?>
                <a class="case-studies__figma-card"
                   href="<?php echo esc_url( $resolve_case_url( $card['slugs'] ) ); ?>">
                    <div class="case-studies__figma-device">
                        <div class="case-studies__figma-notch" aria-hidden="true"></div>
                        <div class="case-studies__figma-screen">
                            <div class="case-studies__figma-bg"
                                 style="background-image:url('<?php echo esc_url( $card['image'] ); ?>');"
                                 role="img"
                                 aria-label="<?php echo esc_attr( $card['title'] ); ?>">
                            </div>
                            <span class="case-studies__figma-badge <?php echo esc_attr( $is_rtl ? 'rtl' : 'ltr' ); ?>"
                                  aria-hidden="true">
                                <?php echo esc_html( $card['badge'] ); ?>
                            </span>
                        </div>
                    </div>
                    <div class="case-studies__figma-title-wrapper">
                        <span class="material-symbols-outlined case-studies__figma-arrow" aria-hidden="true">
                            <?php echo esc_html( $arrow ); ?>
                        </span>
                        <h3 class="case-studies__figma-title"><?php echo esc_html( $card['title'] ); ?></h3>
                    </div>
                    <p class="case-studies__figma-desc"><?php echo esc_html( $desc_out ); ?></p>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>