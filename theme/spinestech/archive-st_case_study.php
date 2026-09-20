<?php
/**
 * Archive: Case Studies
 * File: archive-st_case_study.php
 *
 * Sourced directly from Figma/design references provided.
 * Uses .cs2- BEM classes matching assets/css/pages/case-studies.css
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ── SEO Meta ─────────────────────────────────────────────────────────
add_filter( 'pre_get_document_title', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    return $is_rtl
        ? 'دراسات الحالة | SpinesTech — منتجات رقمية مكتملة التشغيل'
        : 'Case Studies | SpinesTech — Operational Digital Products';
}, 999 );

add_action( 'wp_head', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    st_seo_set_description( $is_rtl
        ? 'استعرض دراسات الحالة لمشاريع SpinesTech: Backway للخدمات اللوجستية، Merchant للتجارة الإلكترونية، PropCare 360 لإدارة الأملاك، ولحظة لحجز المناسبات.'
        : 'Explore SpinesTech case studies: Backway logistics, Merchant e-commerce, PropCare 360 property management, and Lahza event booking platform.' );
}, 3 );
// ─────────────────────────────────────────────────────────────────────

get_header();

$is_rtl = st_locale() === 'ar';
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';

/* ─────────────────────────────────────────────
   Image URLs — loaded from local case study assets
───────────────────────────────────────────── */
$img_phone    = st_asset('images/case-studies/backway/shipper-home-page.png');
$img_desktop  = st_asset('images/case-studies/backway/admin-home.png');
$img_map      = st_asset('images/case-studies/backway/shipper-Shipment-details-Live-tracking.png');
$img_customer = st_asset('images/case-studies/backway/shipper-home-page.png');
$img_driver   = st_asset('images/case-studies/backway/driver-home-page.png');
$img_admin    = st_asset('images/case-studies/backway/admin-home.png');

/* Merchant case study images */
$img_merchant_dashboard = st_asset('images/case-studies/merchant/Dashboard.jpg');
$img_merchant_product   = st_asset('images/case-studies/merchant/Item+Details.jpg');

/* ─────────────────────────────────────────────
   Helper: resolve a case-study URL by trying
   multiple slugs, with a safe fallback.
───────────────────────────────────────────── */
$resolve_case_url = static function ( array $slugs ): string {
    foreach ( $slugs as $slug ) {
        if ( function_exists( 'st_case_study_url_by_slug' ) ) {
            return st_case_study_url_by_slug( $slug );
        }
    }

    static $base = null;
    if ( $base === null ) {
        $base = trailingslashit( (string) get_post_type_archive_link( 'st_case_study' ) );
    }

    return $base;
};

/* Helper: derive a short monospace "file reference" from a client name */
$file_ref = static function ( string $title, int $index ): string {
    $words = preg_split( '/\s+/', trim( $title ) );
    $letters = '';
    foreach ( $words as $w ) {
        $letters .= mb_strtoupper( mb_substr( $w, 0, 1 ) );
        if ( mb_strlen( $letters ) >= 2 ) break;
    }
    if ( $letters === '' ) $letters = 'SP';
    return $letters . '–' . str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT );
};

/* ─────────────────────────────────────────────
   DATA
───────────────────────────────────────────── */
$featured = [
    [
        'title'       => 'Backway Logistics',
        'title_ar'    => 'باكواي للحلول اللوجستية',
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
        'image'       => st_asset( 'images/case-studies/backway/card-opt.jpg' ),
        'style'       => 'photo',
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
        'image'       => st_asset( 'images/case-studies/merchant/card-veo.jpg' ),
        'style'       => 'photo',
        'slugs'       => [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ],
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
        'image'       => st_asset( 'images/case-studies/propcare/screen-card.png' ),
        'style'       => 'photo',
        'slugs'       => [ 'propcare', 'propcare-360', 'property-management' ],
    ],
    [
        'title'       => 'Lahza',
        'title_ar'    => 'لحظة',
        'kicker'      => '04 / Events & Bookings',
        'kicker_ar'   => '04 / حجز وتنظيم المناسبات',
        'headline'    => 'A seamless digital platform for booking and managing events',
        'headline_ar' => 'منصة رقمية متكاملة لحجز وتنظيم المناسبات',
        'summary'     => 'A refined digital experience connecting customers with the best event service providers in the Kingdom, with full booking and payment management.',
        'summary_ar'  => 'حل رقمي متطور يجمع بين الفخامة والسهولة، صُمم لربط العملاء بأفضل مزودي خدمات المناسبات في المملكة، مع إدارة كاملة لكل تفاصيل الحجز والدفع.',
        'client'      => $is_rtl ? 'لحظة' : 'Lahza',
        'scope'       => 'iOS, Android, Web Dashboard',
        'scope_ar'    => 'iOS, Android, لوحة تحكم ويب',
        'tag'         => $is_rtl ? 'منصة حجوزات' : 'Booking Platform',
        'image'       => st_asset( 'images/case-studies/lahza/card-case.png' ),
        'style'       => 'photo',
        'slugs'       => [ 'lahza', 'lahza-events', 'event-booking' ],
    ],
];

$mobile_cards = [
    [
        'title' => 'Merchant',
        'tag'   => $is_rtl ? 'واجهة المتجر' : 'Storefront UI',
        'image' => st_asset('images/case-studies/merchant/Wishlist.jpg'),
        'slugs' => [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ],
    ],
    [
        'title' => 'Backway App',
        'tag'   => $is_rtl ? 'سير عمل السائق' : 'Driver Workflow',
        'image' => st_asset('images/case-studies/backway/driver-home-page.png'),
        'slugs' => [ 'backway-logistics', 'backway', 'supply-chain-erp' ],
    ],
    [
        'title' => 'PropCare 360',
        'tag'   => $is_rtl ? 'خدمات الأملاك' : 'Property Services',
        'image' => st_asset('images/case-studies/propcare/mobile-home.png'),
        'slugs' => [ 'propcare', 'propcare-360', 'property-management' ],
    ],
    [
        'title' => $is_rtl ? 'لحظة' : 'Lahza',
        'tag'   => $is_rtl ? 'حجز مناسبات' : 'Event Booking',
        'image' => st_asset('images/case-studies/lahza/app-home.png'),
        'slugs' => [ 'lahza', 'lahza-events', 'event-booking' ],
    ],
];

$figma_cards = [
    [
        'title'   => 'PropCare 360',
        'badge'   => 'Precision',
        'desc'    => 'A complete digital platform for property services and maintenance delivered flawlessly.',
        'desc_ar' => 'منصة رقمية متكاملة لخدمات الأملاك والصيانة مُسلَّمة بدقة تامة.',
        'image'   => st_asset('images/case-studies/propcare/screen.png'),
        'slugs'   => [ 'propcare', 'propcare-360', 'property-management' ],
    ],
    [
        'title'   => 'Merchant',
        'badge'   => 'Figma Approved',
        'desc'    => 'Visual details and interactions preserved from design to implementation.',
        'desc_ar' => 'تفاصيل التصميم والتفاعلات محفوظة من الـ Figma حتى التطبيق الفعلي.',
        'image'   => $img_merchant_product,
        'slugs'   => [ 'merchant', 'merchant-ecommerce', 'fashion-marketplace' ],
    ],
    [
        'title'   => $is_rtl ? 'لحظة' : 'Lahza',
        'badge'   => 'UI System',
        'desc'    => 'A seamless digital platform for booking and managing events translated pixel-perfectly.',
        'desc_ar' => 'منصة متكاملة لحجز المناسبات مترجمة للبرمجة بدقة البكسل.',
        'image'   => st_asset('images/case-studies/lahza/app-services.png'),
        'slugs'   => [ 'lahza', 'lahza-events', 'event-booking' ],
    ],
];

$tech_badges = $is_rtl
    ? [ 'متعدد المنصات', 'خدمات مصغرة', 'مؤسسي', 'سحابي بالكامل' ]
    : [ 'Cross-Platform', 'Microservices', 'Enterprise', 'Cloud Native' ];

$tech_stack = [
    [ 'name' => 'Flutter',    'icon'   => 'https://cdn.simpleicons.org/flutter/e8ebe4' ],
    [ 'name' => 'Node.js',    'icon'   => 'https://cdn.simpleicons.org/nodedotjs/e8ebe4' ],
    [ 'name' => 'NestJS',     'icon'   => 'https://cdn.simpleicons.org/nestjs/e8ebe4' ],
    [ 'name' => 'Next.js',    'icon'   => 'https://cdn.simpleicons.org/nextdotjs/e8ebe4' ],
    [ 'name' => 'React',      'icon'   => 'https://cdn.simpleicons.org/react/e8ebe4' ],
    [ 'name' => 'Vue',        'icon'   => 'https://cdn.simpleicons.org/vuedotjs/e8ebe4' ],
    [ 'name' => 'Laravel',    'icon'   => 'https://cdn.simpleicons.org/laravel/e8ebe4' ],
    [ 'name' => 'Swift',      'icon'   => 'https://cdn.simpleicons.org/swift/e8ebe4' ],
    [ 'name' => 'K8s',        'icon'   => 'https://cdn.simpleicons.org/kubernetes/e8ebe4' ],
    [ 'name' => 'Docker',     'icon'   => 'https://cdn.simpleicons.org/docker/e8ebe4' ],
    [ 'name' => 'Python',     'icon'   => 'https://cdn.simpleicons.org/python/e8ebe4' ],
    [ 'name' => 'TypeScript', 'icon'   => 'https://cdn.simpleicons.org/typescript/e8ebe4' ],
    [ 'name' => 'Postgres',   'icon'   => 'https://cdn.simpleicons.org/postgresql/e8ebe4' ],
    [ 'name' => 'MySQL',      'icon'   => 'https://cdn.simpleicons.org/mysql/e8ebe4' ],
    [ 'name' => 'MongoDB',    'icon'   => 'https://cdn.simpleicons.org/mongodb/e8ebe4' ],
    [ 'name' => 'Redis',      'icon'   => 'https://cdn.simpleicons.org/redis/e8ebe4' ],
    [ 'name' => 'Firebase',   'icon'   => 'https://cdn.simpleicons.org/firebase/e8ebe4' ],
    [ 'name' => 'GraphQL',    'icon'   => 'https://cdn.simpleicons.org/graphql/e8ebe4' ],
    [ 'name' => 'Tailwind',   'icon'   => 'https://cdn.simpleicons.org/tailwindcss/e8ebe4' ],
    [ 'name' => 'RabbitMQ',   'icon'   => 'https://cdn.simpleicons.org/rabbitmq/e8ebe4' ],
    [ 'name' => 'AI Agents',  'symbol' => 'psychology' ],
    [ 'name' => 'Automation', 'symbol' => 'precision_manufacturing' ],
];
?>

<main class="page-case-studies" dir="<?php echo esc_attr( $is_rtl ? 'rtl' : 'ltr' ); ?>">

    <!-- ══════════════════════════════════════════════════════
         1. HERO
    ══════════════════════════════════════════════════════ -->
    <section class="cs2-hero">
        <canvas class="st-hero-canvas"></canvas>
        <div class="cs2-hero-bg" aria-hidden="true">
            <div class="cs2-hero-glow-1"></div>
            <div class="cs2-hero-glow-2"></div>
            <div class="cs2-hero-grid"></div>
            <div class="cs2-hero-scan"></div>
        </div>
        <div class="container cs2-hero-content">
            <span class="cs2-eyebrow cs2-hero__eyebrow">
                <?php echo esc_html( $is_rtl ? 'ملفات أعمال منجزة' : 'Delivered Case Files' ); ?>
            </span>
            <h1 class="cs2-hero-title">
                <?php if ( $is_rtl ) : ?>
                    كل مشروع هنا <span class="text-gradient-green">ملف قضية مغلق</span><br>
                    بنيناه من الفكرة حتى التشغيل الفعلي
                <?php else : ?>
                    Every project here is a
                    <span class="text-gradient-green">closed case file</span> —
                    built from idea to real operation
                <?php endif; ?>
            </h1>
            <p class="cs2-hero-copy">
                <?php echo esc_html( $is_rtl
                    ? 'نحوّل الأفكار والواجهات ومسارات التشغيل إلى منصات رقمية قابلة للنمو، واضحة للمستخدم، ومهيأة للتشغيل الحقيقي.'
                    : 'From logistics marketplaces to booking flows and mobile products, explore how ideas become usable digital systems.'
                ); ?>
            </p>
            <div class="cs2-hero-actions">
                <a class="cs2-btn cs2-btn--primary" href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( 'contact' ) : home_url( '/contact/' ) ); ?>">
                    <?php echo esc_html( $is_rtl ? 'ابدأ مشروعك معنا' : 'Start Your Project' ); ?>
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $arrow ); ?></span>
                </a>
                <a class="cs2-btn cs2-btn--ghost" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                    <?php echo esc_html( $is_rtl ? 'عرض الخدمات' : 'View Services' ); ?>
                </a>
            </div>

            <div class="cs2-hero-ticker" aria-hidden="true">
                <div class="cs2-hero-ticker__track">
                    <?php
                    $ticker_pass = static function () use ( $featured, $is_rtl, $file_ref ) {
                        foreach ( $featured as $i => $t ) {
                            $name = $is_rtl ? $t['title_ar'] : $t['title'];
                            echo '<span class="cs2-hero-ticker__item"><b>' . esc_html( $name ) . '</b> — ' . esc_html( $file_ref( $t['title'], $i ) ) . '</span>';
                            echo '<span class="cs2-hero-ticker__dot"></span>';
                        }
                    };
                    $ticker_pass();
                    $ticker_pass(); // duplicate for seamless loop
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════════════
         2. FEATURED — cinematic reel
    ══════════════════════════════════════════════════════ -->
    <section class="cs2-files" aria-labelledby="cs2-files-title">
        <div class="container">
            <div class="cs2-head cs2-files__head cs-reveal">
                <span class="cs2-eyebrow">
                    <?php echo esc_html( $is_rtl ? 'دراسات مختارة' : 'Selected Work' ); ?>
                </span>
                <h2 class="cs2-head__title" id="cs2-files-title">
                    <?php echo esc_html( $is_rtl
                        ? 'تسليم منظومات تقنية متكاملة'
                        : 'Platforms crafted for real operations'
                    ); ?>
                </h2>
                <p class="cs2-head__copy">
                    <?php echo esc_html( $is_rtl
                        ? 'كل دراسة حالة تكشف كيف نبني المنتج من القرار المعماري حتى التجربة النهائية للمستخدم.'
                        : 'Each case study reveals how we shape the product from architecture to the final user experience.'
                    ); ?>
                </p>
            </div>
        </div>

        <div class="cs2-file-list">
            <?php foreach ( $featured as $index => $item ) :
                $reverse    = ( $index % 2 === 1 );
                $flip_cls   = $reverse ? ' cs2-file--flip' : '';
                $tone_cls   = $reverse ? ' cs2-file--ink' : '';
                $align_cls  = $is_rtl  ? 'rtl-right' : 'ltr-right';
                $title_out  = $is_rtl  ? $item['title_ar']     : $item['title'];
                $kicker_out = $is_rtl  ? $item['kicker_ar']    : $item['kicker'];
                $head_out   = $is_rtl  ? $item['headline_ar']  : $item['headline'];
                $summ_out   = $is_rtl  ? $item['summary_ar']   : $item['summary'];
                $scope_out  = $is_rtl  ? ( $item['scope_ar'] ?? $item['scope'] ) : $item['scope'];
                $num_out    = str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT );
            ?>
            <a class="cs2-file cs-reveal<?php echo esc_attr( $flip_cls . $tone_cls ); ?>"
               href="<?php echo esc_url( $item['url'] ?? $resolve_case_url( $item['slugs'] ) ); ?>">
                <div class="container cs2-file__inner">
                    <div class="cs2-file__frame-col">
                        <div class="cs2-file__frame">
                            <div class="cs2-file__frame-img"
                                 style="background-image:url('<?php echo esc_url( $item['image'] ); ?>');"
                                 role="img"
                                 aria-label="<?php echo esc_attr( $title_out ); ?>">
                            </div>
                            <div class="cs2-file__frame-overlay" aria-hidden="true"></div>
                            <div class="cs2-file__tag <?php echo esc_attr( $align_cls ); ?>">
                                <span class="cs2-file__tag-pill"><?php echo esc_html( $item['tag'] ); ?></span>
                                <span class="cs2-file__tag-name"><?php echo esc_html( $title_out ); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="cs2-file__meta-col">
                        <span class="cs2-file__stamp" aria-hidden="true"><?php echo esc_html( $num_out ); ?></span>
                        <div class="cs2-file__body">
                            <span class="cs2-file__kicker"><?php echo esc_html( $kicker_out ); ?></span>
                            <h3 class="cs2-file__title"><?php echo esc_html( $head_out ); ?></h3>
                            <p class="cs2-file__desc"><?php echo esc_html( $summ_out ); ?></p>
                            <div class="cs2-file__stats">
                                <div>
                                    <div class="cs2-file__stat-label"><?php echo esc_html( $is_rtl ? 'العميل' : 'Client' ); ?></div>
                                    <div class="cs2-file__stat-value"><?php echo esc_html( $item['client'] ); ?></div>
                                </div>
                                <div>
                                    <div class="cs2-file__stat-label"><?php echo esc_html( $is_rtl ? 'النطاق' : 'Scope' ); ?></div>
                                    <div class="cs2-file__stat-value"><?php echo esc_html( $scope_out ); ?></div>
                                </div>
                            </div>
                            <span class="cs2-file__cta">
                                <?php echo esc_html( $is_rtl ? 'استعراض تفاصيل المشروع' : 'Explore case study' ); ?>
                                <span class="material-symbols-outlined <?php echo $is_rtl ? 'rtl' : 'ltr'; ?>" aria-hidden="true">
                                    <?php echo esc_html( $arrow ); ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════════════
         3. TECH STACK
    ══════════════════════════════════════════════════════ -->
    <section class="cs2-tech">
        <div class="container">
            <div class="cs2-tech-head cs-reveal">
                <div class="cs2-head cs2-head--ink">
                    <span class="cs2-eyebrow cs2-eyebrow--dark">
                        <?php echo esc_html( $is_rtl ? 'تميز تقني' : 'Technical Excellence' ); ?>
                    </span>
                    <h2 class="cs2-head__title">
                        <?php echo esc_html( $is_rtl
                            ? 'القوة الكامنة خلف بنيتكم الرقمية'
                            : 'The Power Behind Your Digital Infrastructure'
                        ); ?>
                    </h2>
                    <p class="cs2-head__copy">
                        <?php echo esc_html( $is_rtl
                            ? 'نستخدم حزمة تقنية عالمية لبناء أنظمة مرنة وعالية الأداء تدعم نمو الأعمال والكفاءة التشغيلية.'
                            : 'We leverage a world-class technology stack to build resilient, high-performance systems that drive business growth and operational efficiency.'
                        ); ?>
                    </p>
                </div>
                <div class="cs2-tech-badges" aria-label="<?php echo esc_attr( $is_rtl ? 'مزایا تقنية' : 'Technical capabilities' ); ?>">
                    <?php foreach ( $tech_badges as $badge ) : ?>
                    <span class="cs2-tech-badge">
                        <span class="cs2-tech-badge__dot" aria-hidden="true"></span>
                        <span class="cs2-tech-badge__text"><?php echo esc_html( $badge ); ?></span>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="cs2-tech-marquee cs-reveal">
                <div class="cs2-tech-marquee__track">
                    <?php
                    $tech_pass = static function () use ( $tech_stack ) {
                        foreach ( $tech_stack as $tech ) {
                            echo '<span class="cs2-tech-item">';
                            echo '<span class="cs2-tech-item__icon">';
                            if ( ! empty( $tech['icon'] ) ) {
                                echo '<img src="' . esc_url( $tech['icon'] ) . '" alt="' . esc_attr( $tech['name'] ) . '" width="30" height="30" loading="lazy">';
                            } else {
                                echo '<span class="material-symbols-outlined" aria-hidden="true">' . esc_html( $tech['symbol'] ) . '</span>';
                            }
                            echo '</span>';
                            echo '<span class="cs2-tech-item__name">' . esc_html( $tech['name'] ) . '</span>';
                            echo '</span>';
                        }
                    };
                    $tech_pass();
                    $tech_pass(); // duplicate for seamless loop
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════════════
         4. MOBILE APP CARDS
    ══════════════════════════════════════════════════════ -->
    <section class="cs2-mobile">
        <div class="container">
            <div class="cs2-mobile-head cs-reveal">
                <div class="cs2-head">
                    <span class="cs2-eyebrow">
                        <?php echo esc_html( $is_rtl ? 'تطبيقات الجوال' : 'Mobile App Designs' ); ?>
                    </span>
                    <h2 class="cs2-head__title">
                        <?php echo esc_html( $is_rtl
                            ? 'مساهماتنا في تصميم تطبيقات الجوال'
                            : 'Mobile App Designs & Contributions'
                        ); ?>
                    </h2>
                </div>
                <span class="cs2-mobile-note">
                    <?php echo esc_html( $is_rtl
                        ? 'اضغط على أي كارت لاستعراض دراسة الحالة'
                        : 'Tap any card to view the full case study'
                    ); ?>
                </span>
            </div>

            <div class="cs2-mobile-grid">
                <?php foreach ( $mobile_cards as $mi => $card ) : ?>
                <a class="cs2-mobile-card cs-reveal"
                   href="<?php echo esc_url( $resolve_case_url( $card['slugs'] ) ); ?>">
                    <div class="cs2-mobile-card__frame">
                        <div class="cs2-mobile-card__img"
                             style="background-image:url('<?php echo esc_url( $card['image'] ); ?>');"
                             role="img"
                             aria-label="<?php echo esc_attr( $card['title'] ); ?>">
                        </div>
                        <span class="cs2-mobile-card__number" aria-hidden="true">№ <?php echo esc_html( str_pad( (string) ( $mi + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
                        <span class="cs2-mobile-card__badge"><?php echo esc_html( $card['tag'] ); ?></span>
                    </div>
                    <div>
                        <h3 class="cs2-mobile-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
                        <p class="cs2-mobile-card__meta">
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
         5. WEB PROJECTS SPOTLIGHT
    ══════════════════════════════════════════════════════ -->
    <?php
    // Auto-require config if not already loaded by functions.php
    if ( ! function_exists( 'st_web_projects_config' ) ) {
        $cfg_file = get_template_directory() . '/inc/web-projects-config.php';
        if ( file_exists( $cfg_file ) ) {
            require_once $cfg_file;
        }
    }

    $web_projects = function_exists( 'st_web_projects_config' ) ? st_web_projects_config() : [];

    // Fallback data if config is not available or empty
    if ( empty( $web_projects ) ) {
        $web_projects = [
            'lawyer' => [
                'name'     => [ 'ar' => 'محمد محسن للمحاماة', 'en' => 'Mohamed Mohsen Law Office' ],
                'tagline'  => [ 'ar' => 'محامٍ جنائي — مساندة قانونية احترافية ووضوح في التواصل', 'en' => 'Criminal Lawyer — Professional Legal Support' ],
                'type'     => [ 'ar' => 'موقع خدمات قانونية', 'en' => 'Legal Services Website' ],
                'color'    => '#b8963e',
                'year'     => '2025',
                'live_url' => 'https://mohamed-mohsen-lawyer.great-site.net/?i=1',
                'images'   => [ 'preview' => 'web-projects/lawyer/preview.webp' ],
            ],
            'awan-digital' => [
                'name'     => [ 'ar' => 'أوان ديجيتال', 'en' => 'Awan Digital' ],
                'tagline'  => [ 'ar' => 'وكالة تسويق رقمي وخدمات SEO متقدمة للنمو الرقمي', 'en' => 'Digital Marketing & SEO Agency' ],
                'type'     => [ 'ar' => 'موقع وكالة تسويق رقمي', 'en' => 'Digital Agency Website' ],
                'color'    => '#2563eb',
                'year'     => '2025',
                'live_url' => 'https://awan-digital.great-site.net/?i=1',
                'images'   => [ 'preview' => 'web-projects/awan-digital/preview.webp' ],
            ],
        ];
    }
    ?>

    <!-- [SPINESTECH_WEB_PROJECTS_ACTIVE count="<?php echo count( $web_projects ); ?>"] -->
    <?php
    // TOGGLE: Set to true to re-enable the Web Projects spotlight section
    $show_web_projects_section = false;
    ?>
    <?php if ( $show_web_projects_section ) : ?>
    <?php if ( ! wp_style_is( 'st-web-projects-spotlight', 'enqueued' ) ) : ?>
    <link rel="stylesheet" id="st-web-projects-spotlight-direct-css" href="<?php echo esc_url( function_exists('st_asset') ? st_asset('css/components/web-projects-spotlight.css') : get_template_directory_uri() . '/assets/css/components/web-projects-spotlight.css' ); ?>">
    <?php endif; ?>

    <section class="cs2-webp" id="web-projects" aria-labelledby="webp-heading">
        <div class="cs2-webp__spotlight" aria-hidden="true"></div>

        <div class="container cs2-webp__inner">

            <!-- Header -->
            <div class="cs2-webp__header">
                <div class="cs2-webp__heading">
                    <div class="cs2-head cs-reveal">
                        <span class="cs2-eyebrow">
                            <?php echo esc_html( $is_rtl ? 'مشاريع الويب' : 'Web Projects' ); ?>
                        </span>
                        <h2 id="webp-heading" class="cs2-head__title" style="color:#fff;">
                            <?php echo esc_html( $is_rtl
                                ? 'مواقع ويب أطلقناها لعملائنا'
                                : 'Websites We Launched for Our Clients'
                            ); ?>
                        </h2>
                    </div>
                </div>
                <span class="cs2-webp__note">
                    <?php echo esc_html( $is_rtl
                        ? 'اضغط على أي مشروع لاستعراضه كاملاً'
                        : 'Click any project to explore it in full'
                    ); ?>
                </span>
            </div>

            <!-- Cards grid -->
            <div class="cs2-webp__grid">
                <?php foreach ( $web_projects as $wp_key => $wp ) :
                    $wp_name_out    = function_exists( 'st_wp_text' ) ? (string) st_wp_text( (array) ( $wp['name']    ?? [] ) ) : ( $is_rtl ? ( $wp['name']['ar'] ?? $wp_key ) : ( $wp['name']['en'] ?? $wp_key ) );
                    $wp_tagline_out = function_exists( 'st_wp_text' ) ? (string) st_wp_text( (array) ( $wp['tagline'] ?? [] ) ) : ( $is_rtl ? ( $wp['tagline']['ar'] ?? '' ) : ( $wp['tagline']['en'] ?? '' ) );
                    $wp_type_out    = function_exists( 'st_wp_text' ) ? (string) st_wp_text( (array) ( $wp['type']    ?? [] ) ) : ( $is_rtl ? ( $wp['type']['ar'] ?? '' ) : ( $wp['type']['en'] ?? '' ) );
                    $wp_preview     = function_exists( 'st_wp_img'  ) ? st_wp_img( (string) ( $wp['images']['preview'] ?? '' ) ) : ( function_exists('st_asset') ? st_asset('images/' . ( $wp['images']['preview'] ?? '' )) : get_template_directory_uri() . '/assets/images/' . ( $wp['images']['preview'] ?? '' ) );
                    $wp_card_url    = function_exists( 'st_web_project_url' ) ? st_web_project_url( $wp_key ) : ( function_exists('st_url') ? st_url('/web-projects/' . $wp_key . '/') : home_url('/web-projects/' . $wp_key . '/') );
                    $wp_accent      = esc_attr( (string) ( $wp['color']  ?? '#036d36' ) );
                    $wp_year_out    = esc_html( (string) ( $wp['year']   ?? '' ) );
                    $wp_live_out    = esc_url( (string) ( $wp['live_url'] ?? '#' ) );
                    $wp_host        = esc_html( (string) ( parse_url( (string) ( $wp['live_url'] ?? '' ), PHP_URL_HOST ) ?: '' ) );
                ?>
                <a class="cs2-webp-card cs-reveal"
                   href="<?php echo esc_url( $wp_card_url ); ?>"
                   style="--wp-card-accent:<?php echo $wp_accent; ?>;"
                   aria-label="<?php echo esc_attr( $wp_name_out . ' — ' . ( $is_rtl ? 'عرض المشروع' : 'View project' ) ); ?>">

                    <!-- Image frame -->
                    <div class="cs2-webp-card__frame">
                        <!-- Browser bar -->
                        <div class="cs2-webp-card__browser-bar" aria-hidden="true">
                            <span class="cs2-webp-card__dot cs2-webp-card__dot--r"></span>
                            <span class="cs2-webp-card__dot cs2-webp-card__dot--y"></span>
                            <span class="cs2-webp-card__dot cs2-webp-card__dot--g"></span>
                            <?php if ( $wp_host ) : ?>
                            <span class="cs2-webp-card__url"><?php echo $wp_host; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Screenshot -->
                        <?php if ( $wp_preview ) : ?>
                        <div class="cs2-webp-card__img"
                             style="background-image:url('<?php echo esc_url( $wp_preview ); ?>');"
                             role="img"
                             aria-label="<?php echo esc_attr( $wp_name_out ); ?>">
                        </div>
                        <?php else : ?>
                        <!-- Placeholder while image is being prepared -->
                        <div class="cs2-webp-card__img" style="background:#111c14;" aria-hidden="true"></div>
                        <?php endif; ?>

                        <div class="cs2-webp-card__overlay" aria-hidden="true"></div>

                        <?php if ( $wp_type_out ) : ?>
                        <span class="cs2-webp-card__type"><?php echo esc_html( $wp_type_out ); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Body -->
                    <div class="cs2-webp-card__body">
                        <h3 class="cs2-webp-card__name"><?php echo esc_html( $wp_name_out ); ?></h3>
                        <?php if ( $wp_tagline_out ) : ?>
                        <p class="cs2-webp-card__tagline"><?php echo esc_html( $wp_tagline_out ); ?></p>
                        <?php endif; ?>

                        <div class="cs2-webp-card__footer">
                            <?php if ( $wp_year_out ) : ?>
                            <span class="cs2-webp-card__year"><?php echo $wp_year_out; ?></span>
                            <?php endif; ?>
                            <span class="cs2-webp-card__cta">
                                <?php echo esc_html( $is_rtl ? 'استعراض المشروع' : 'View Project' ); ?>
                                <span class="material-symbols-outlined" aria-hidden="true">
                                    <?php echo esc_html( $arrow ); ?>
                                </span>
                            </span>
                        </div>
                    </div>

                </a>
                <?php endforeach; ?>
            </div><!-- .cs2-webp__grid -->

        </div><!-- .container -->
    </section>
    <?php endif; // end $show_web_projects_section ?>


    <!-- ══════════════════════════════════════════════════════
         6. FIGMA TO CODE
    ══════════════════════════════════════════════════════ -->
    <section class="cs2-figma">
        <div class="container">
            <div class="cs2-head cs2-head--center cs2-head--ink cs-reveal">
                <span class="cs2-eyebrow cs2-eyebrow--dark" style="justify-content:center;">
                    <?php echo esc_html( $is_rtl ? 'من التصميم إلى البرمجة' : 'Figma to Code Excellence' ); ?>
                </span>
                <h2 class="cs2-head__title">
                    <?php echo esc_html( $is_rtl
                        ? 'التميز في ترجمة التصميم إلى برمجة'
                        : 'Design systems converted into real product pages'
                    ); ?>
                </h2>
            </div>

            <div class="cs2-figma-grid cs-reveal">
                <?php foreach ( $figma_cards as $card ) :
                    $desc_out = $is_rtl ? $card['desc_ar'] : $card['desc'];
                ?>
                <a class="cs2-figma-card" href="<?php echo esc_url( $resolve_case_url( $card['slugs'] ) ); ?>">
                    <div class="cs2-figma-device">
                        <div class="cs2-figma-notch" aria-hidden="true"></div>
                        <div class="cs2-figma-screen">
                            <div class="cs2-figma-bg"
                                 style="background-image:url('<?php echo esc_url( $card['image'] ); ?>');"
                                 role="img"
                                 aria-label="<?php echo esc_attr( $card['title'] ); ?>">
                            </div>
                            <span class="cs2-figma-badge <?php echo esc_attr( $is_rtl ? 'rtl' : 'ltr' ); ?>" aria-hidden="true">
                                <?php echo esc_html( $card['badge'] ); ?>
                            </span>
                        </div>
                    </div>
                    <div class="cs2-figma-title-row">
                        <span class="material-symbols-outlined cs2-figma-arrow" aria-hidden="true">
                            <?php echo esc_html( $arrow ); ?>
                        </span>
                        <h3 class="cs2-figma-title"><?php echo esc_html( $card['title'] ); ?></h3>
                    </div>
                    <p class="cs2-figma-desc"><?php echo esc_html( $desc_out ); ?></p>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<script>
function safeRun( fn ) {
    try { fn(); } catch ( e ) { if ( window.console ) console.error( e ); }
}

safeRun( function () {
    if ( ! ( 'IntersectionObserver' in window ) ) return;

    document.documentElement.classList.add( 'cs-js' );

    var targets = document.querySelectorAll( '.page-case-studies .cs-reveal' );
    if ( ! targets.length ) return;

    var observer = new IntersectionObserver( function ( entries ) {
        entries.forEach( function ( entry ) {
            if ( entry.isIntersecting ) {
                entry.target.classList.add( 'is-visible' );
                observer.unobserve( entry.target );
            }
        } );
    }, { threshold: 0.15, rootMargin: '0px 0px -8% 0px' } );

    targets.forEach( function ( el ) { observer.observe( el ); } );

    document.documentElement.classList.add( 'cs-case-studies-js-ready' );
} );
</script>

<?php get_footer(); ?>