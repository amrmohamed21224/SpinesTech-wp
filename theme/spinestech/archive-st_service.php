<?php
/**
 * Archive Template: Services Page ("خدماتنا")
 * File: archive-st_service.php
 *
 * 100% static Arabic content — no ACF, no custom fields, no DB queries.
 * All copy is hardcoded as provided by the design spec.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$dir    = function_exists( 'st_dir' ) ? st_dir() : 'rtl';
$is_rtl = ( $dir === 'rtl' );
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';
?>

<div class="sv-page" dir="<?php echo esc_attr( $dir ); ?>">
<main>

<!-- ══════════════════════════════════════════
     HERO — animated shader + 3D spine
══════════════════════════════════════════ -->
<section class="sv-hero">
    <canvas id="sv-hero-canvas" class="sv-hero__canvas"></canvas>
    <div id="sv-hero-3d" class="sv-hero__3d"></div>

    <div class="sv-hero__labels" aria-hidden="true">
        <span class="sv-float-pill sv-float-pill--1">REST API</span>
        <span class="sv-float-pill sv-float-pill--2">iOS / Android</span>
        <span class="sv-float-pill sv-float-pill--3">لوحات تحكم</span>
        <span class="sv-float-pill sv-float-pill--4">أتمتة العمليات</span>
        <span class="sv-float-pill sv-float-pill--5">Realtime</span>
        <span class="sv-float-pill sv-float-pill--6">Cloud Native</span>
    </div>

    <div class="sv-ornament sv-ornament--tr" aria-hidden="true">COORDINATES: 24.7136N / 46.6753E</div>
    <div class="sv-ornament sv-ornament--tl" aria-hidden="true">PROTOCOL: INSTITUTIONAL_v2.4</div>
    <div class="sv-ornament sv-ornament--bl" aria-hidden="true">FRAME_RATE: 60FPS_STABLE</div>

    <div class="container sv-hero__inner">
        <div class="sv-reveal sv-hero__badge" style="--sv-delay:0.05s">
            <span class="sv-hero__badge-dot"></span>
            التميّز الهندسي الرقمي
        </div>

        <h1 class="sv-reveal sv-hero__title" style="--sv-delay:0.15s">
            نصمم <span class="sv-hero__title-accent">المستقبل</span> بهندسة دقيقة
        </h1>

        <p class="sv-reveal sv-hero__subtitle" style="--sv-delay:0.25s">
            تحويل الرؤى الطموحة إلى أنظمة برمجية معقدة تتسم بالكفاءة والجمال التقني المطلق.
        </p>

        <div class="sv-reveal sv-hero__actions" style="--sv-delay:0.35s">
            <a href="#sv-build" class="sv-btn sv-btn--primary">ابدأ رحلتك التقنية</a>
            <a href="#sv-models" class="sv-btn sv-btn--ghost">استكشاف خدماتنا</a>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     1. ما الذي نبنيه؟
══════════════════════════════════════════ -->
<section class="sv-section sv-section--white" id="sv-build">
    <div class="container">
        <div class="sv-reveal sv-intro">
            <h2 class="sv-h2">ما الذي نبنيه؟</h2>
            <p class="sv-lead">نبني منتجات رقمية متكاملة تربط المستخدمين، البيانات، الفرق التشغيلية، وقواعد العمل داخل منظومة قابلة للتوسع.</p>
        </div>

        <div class="sv-cards-grid">
            <?php
            $build_cards = array(
                array( 'icon' => 'smartphone',            'title' => 'تطبيقات الجوال',        'text' => 'تطبيقات Native و Cross-platform تركز على الأداء الفائق وتجربة المستخدم السلسة.', 'tags' => array( 'IOS/ANDROID', 'FLUTTER' ) ),
                array( 'icon' => 'language',               'title' => 'منصات الويب',            'text' => 'منصات ويب تفاعلية ومعقدة، مبنية بأحدث أطر العمل لضمان السرعة والقابلية للتوسع.', 'tags' => array( 'NEXT.JS', 'REACT' ) ),
                array( 'icon' => 'dashboard_customize',    'title' => 'لوحات التحكم الإدارية',  'text' => 'أدوات إدارية ذكية تمنحك السيطرة الكاملة على بياناتك وعملياتك التشغيلية في مكان واحد.', 'tags' => array( 'DATA VISUALS', 'ADMIN OPS' ) ),
                array( 'icon' => 'storefront',             'title' => 'الأسواق الرقمية',        'text' => 'بناء منصات Multi-vendor متكاملة تشمل محافظ رقمية ونظام عمولات معقد.', 'tags' => array( 'MARKETPLACE', 'E-COMMERCE' ) ),
                array( 'icon' => 'calendar_month',         'title' => 'أنظمة الحجوزات',         'text' => 'حلول متطورة لإدارة الحجوزات، الجدولة، والموارد لقطاعات الخدمات والفعاليات.', 'tags' => array( 'BOOKING ENGINE', 'REAL-TIME' ) ),
                array( 'icon' => 'settings_applications',  'title' => 'الأنظمة التشغيلية',       'text' => 'أتمتة العمليات الداخلية للشركات (ERP-Lite) المصممة خصيصاً لاحتياجاتك الفريدة.', 'tags' => array( 'WORKFLOW', 'AUTOMATION' ) ),
            );
            foreach ( $build_cards as $i => $c ) :
            ?>
            <div class="sv-reveal sv-build-card" style="--sv-delay:<?php echo esc_attr( $i * 0.08 ); ?>s">
                <div class="sv-build-card__icon">
                    <span class="material-symbols-outlined"><?php echo esc_html( $c['icon'] ); ?></span>
                </div>
                <h3 class="sv-build-card__title"><?php echo esc_html( $c['title'] ); ?></h3>
                <p class="sv-build-card__text"><?php echo esc_html( $c['text'] ); ?></p>
                <div class="sv-tag-row">
                    <?php foreach ( $c['tags'] as $tag ) : ?>
                    <span class="sv-tag"><?php echo esc_html( $tag ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     2. نماذج تنفيذ مرنة تناسب احتياجك
══════════════════════════════════════════ -->
<section class="sv-section sv-section--dark" id="sv-models">
    <div class="sv-blueprint-grid" aria-hidden="true"></div>
    <div class="sv-glow-blob" style="width:26rem;height:26rem;background:rgba(3,109,54,0.35);inset-block-start:-8rem;inset-inline-start:-6rem;" aria-hidden="true"></div>
    <div class="sv-glow-blob" style="width:20rem;height:20rem;background:rgba(0,132,255,0.22);inset-block-end:-6rem;inset-inline-end:-4rem;animation-delay:3s;" aria-hidden="true"></div>
    <div class="container">
        <div class="sv-reveal sv-intro sv-intro--center">
            <h2 class="sv-h2 sv-h2--light">نماذج تنفيذ مرنة تناسب احتياجك</h2>
            <p class="sv-lead sv-lead--dark">نحن لسنا مجرد مزود كود، بل شريك تقني ينمو معك عبر نماذج تعاون احترافية.</p>
        </div>

        <div class="sv-cards-grid">
            <?php
            $model_cards = array(
                array( 'unit' => 'UNIT_01 // END-TO-END',         'title' => 'تنفيذ مشروع كامل',              'text' => 'من الفكرة إلى الإطلاق، نتحمل المسؤولية الكاملة عن هندسة وتطوير المنتج.' ),
                array( 'unit' => 'UNIT_02 // MOBILE_SPECIALIST',  'title' => 'تطوير تطبيق الجوال فقط',        'text' => 'إذا كان لديك API جاهز، نقوم ببناء تجربة جوال استثنائية ترتبط بنظامك القائم.' ),
                array( 'unit' => 'UNIT_03 // CTO_PARTNER',        'title' => 'تنفيذ لصالح شريك تقني',         'text' => 'نعمل كفريق تطوير مدمج تحت قيادة CTO الشركة لتعزيز سرعة التنفيذ.' ),
                array( 'unit' => 'UNIT_04 // WHITELABEL_DEPLOY',  'title' => 'تنفيذ White-label',             'text' => 'إعادة تخصيص حلولنا الجاهزة لتعمل تحت علامتك التجارية وهويتك البصرية.' ),
                array( 'unit' => 'UNIT_05 // MODULE_EXPANSION',   'title' => 'تطوير وحدات داخل منتج قائم',    'text' => 'إضافة ميزات جديدة أو ربط تكاملات معقدة بمنتجك الحالي دون تعطيله.' ),
                array( 'unit' => 'UNIT_06 // PRODUCT_REFINE',     'title' => 'تحسين أو استكمال منتج قائم',    'text' => 'استلام مشاريع متعثرة وتحديث الكود والتقنيات لضمان الجاهزية التشغيلية.' ),
            );
            foreach ( $model_cards as $i => $m ) :
            ?>
            <div class="sv-reveal sv-model-card" style="--sv-delay:<?php echo esc_attr( $i * 0.08 ); ?>s">
                <span class="sv-model-card__unit"><?php echo esc_html( $m['unit'] ); ?></span>
                <h4 class="sv-model-card__title"><?php echo esc_html( $m['title'] ); ?></h4>
                <p class="sv-model-card__text"><?php echo esc_html( $m['text'] ); ?></p>
                <div class="sv-model-card__bar"></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     3. ماذا يشمل العمل معنا؟
══════════════════════════════════════════ -->
<section class="sv-section sv-section--white">
    <div class="container">
        <div class="sv-reveal sv-intro sv-intro--center">
            <h2 class="sv-h2">ماذا يشمل العمل معنا؟</h2>
            <p class="sv-lead sv-lead--center">لا نُسلّم كودًا فقط. نساعدك على تحويل الفكرة أو الاحتياج إلى نطاق واضح، منتج قابل للتنفيذ، وتجربة جاهزة للإطلاق.</p>
        </div>

        <div class="sv-steps-grid">
            <?php
            $steps = array(
                array( '1', 'تحليل المتطلبات', 'نغوص في تفاصيل فكرتك لنخرج بنطاق عمل (Scope) تقني دقيق.' ),
                array( '2', 'رسم سير المنتج', 'تخطيط رحلة المستخدم (User Flow) والعمليات الخلفية (Logic Flow).' ),
                array( '3', 'تصميم UI/UX', 'واجهات عصرية تركز على سهولة الاستخدام وتوافق الهوية.' ),
                array( '4', 'التطوير', 'كتابة كود نظيف، آمن، وقابل للتوسع باستخدام أحدث التقنيات.' ),
                array( '5', 'التكاملات', 'ربط النظام ببوابات الدفع، الرسائل النصية، والأنظمة الخارجية.' ),
                array( '6', 'الاختبار والتسليم', 'فحص شامل للجودة والأمان قبل التسليم النهائي للعميل.' ),
                array( '7', 'الإطلاق', 'رفع التطبيقات على المتاجر وتجهيز الخوادم للإنتاج الفعلي.' ),
                array( '8', 'التوثيق والدعم', 'تسليم كامل التوثيق التقني مع فترة ضمان ودعم تشغيلي.' ),
            );
            foreach ( $steps as $i => $s ) :
                list( $num, $stitle, $stext ) = $s;
            ?>
            <div class="sv-reveal sv-step" style="--sv-delay:<?php echo esc_attr( $i * 0.05 ); ?>s">
                <div class="sv-step__num"><?php echo esc_html( $num ); ?></div>
                <h4 class="sv-step__title"><?php echo esc_html( $stitle ); ?></h4>
                <p class="sv-step__text"><?php echo esc_html( $stext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     4. قدرات نبنيها داخل المنتجات
══════════════════════════════════════════ -->
<section class="sv-section sv-section--gray">
    <div class="container">
        <div class="sv-reveal sv-intro sv-intro--center">
            <h2 class="sv-h2">قدرات نبنيها داخل المنتجات</h2>
        </div>

        <div class="sv-capabilities-grid">
            <?php
            $capabilities = array(
                array( 'group',                  'المستخدمون', array( 'إدارة الحسابات', 'الأدوار والصلاحيات', 'نظم الولاء' ) ),
                array( 'shopping_cart',          'الطلبات',    array( 'تتبع الشحنات', 'سير العمل الآلي', 'الفوترة الإلكترونية' ) ),
                array( 'account_balance_wallet', 'المالية',    array( 'تكامل بوابات الدفع', 'المحافظ الرقمية', 'تقسيم العوائد' ) ),
                array( 'insights',               'الإدارة',    array( 'لوحات BI', 'تقارير تشغيلية', 'سجل النشاطات' ) ),
                array( 'api',                    'التكاملات',  array( 'ربط API خارجي', 'تنبيهات Push/SMS', 'دعم الـ Webhooks' ) ),
            );
            foreach ( $capabilities as $cap ) :
                list( $icon, $ctitle, $items ) = $cap;
            ?>
            <div class="sv-cap-cell">
                <h5 class="sv-cap-cell__title">
                    <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                    <?php echo esc_html( $ctitle ); ?>
                </h5>
                <ul class="sv-cap-cell__list">
                    <?php foreach ( $items as $item ) : ?>
                    <li><?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     5. متى تحتاج إلى SpinesTech؟
══════════════════════════════════════════ -->
<section class="sv-section sv-section--white">
    <div class="container">
        <h2 class="sv-reveal sv-h2 sv-h2--center">متى تحتاج إلى SpinesTech؟</h2>

        <div class="sv-cards-grid">
            <?php
            $needs = array(
                array( 'لديك فكرة وتحتاج MVP واضح', 'تحويل الرؤية الأولية إلى منتج حقيقي يختبر السوق في أسرع وقت.' ),
                array( 'لديك مشروع قائم يحتاج تطوير', 'تطوير ميزات جديدة أو إعادة بناء تقنية لنظامك الحالي للنمو.' ),
                array( 'تحتاج تطبيق جوال قوي', 'بناء واجهات مستخدم مذهلة وأداء لا يضاهى على أنظمة iOS و Android.' ),
                array( 'تحتاج لوحة تحكم تشغيلية', 'تحويل الفوضى الإدارية إلى لوحة تحكم ذكية تدير بها أعمالك بكفاءة.' ),
                array( 'تدير عمليات يدويًا', 'أتمتة المهام المتكررة وبناء نظام يقلل الخطأ البشري في شركتك.' ),
                array( 'شركة تقنية تحتاج شريك تنفيذ', 'زيادة سعة فريقك التقني عبر شريك خبير يلتزم بالمعايير الهندسية.' ),
            );
            foreach ( $needs as $i => $n ) :
                list( $ntitle, $ntext ) = $n;
            ?>
            <div class="sv-reveal sv-need-card" style="--sv-delay:<?php echo esc_attr( $i * 0.06 ); ?>s">
                <h4 class="sv-need-card__title"><?php echo esc_html( $ntitle ); ?></h4>
                <p class="sv-need-card__text"><?php echo esc_html( $ntext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     6. قطاعات نخدمها
══════════════════════════════════════════ -->
<section class="sv-section sv-section--gray">
    <div class="container">
        <h2 class="sv-reveal sv-h2 sv-h2--center">قطاعات نخدمها</h2>

        <div class="sv-sectors-wrap">
            <?php
            $sectors = array(
                array( 'local_shipping',  'اللوجستيات' ),
                array( 'celebration',     'المناسبات' ),
                array( 'domain',          'العقارات' ),
                array( 'hub',             'الأسواق الرقمية' ),
                array( 'shopping_bag',    'التجارة الإلكترونية' ),
                array( 'school',          'التعليم' ),
                array( 'construction',    'الخدمات' ),
                array( 'business_center', 'تشغيل الأعمال' ),
            );
            foreach ( $sectors as $i => $sec ) :
                list( $icon, $label ) = $sec;
            ?>
            <div class="sv-reveal sv-sector-pill" style="--sv-delay:<?php echo esc_attr( $i * 0.04 ); ?>s">
                <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                <span><?php echo esc_html( $label ); ?></span>
            </div>
            <?php endforeach; ?>
        </div>

        <p class="sv-reveal sv-sectors-note">لا تقتصر خدماتنا على هذه القطاعات، نحن نتحمس دائماً للهندسة البرمجية في أي قطاع يتطلب الابتكار.</p>
    </div>
</section>


<!-- ══════════════════════════════════════════
     7. كيف نبدأ العمل؟
══════════════════════════════════════════ -->
<section class="sv-section sv-section--white">
    <div class="container">
        <h2 class="sv-reveal sv-h2 sv-h2--center">كيف نبدأ العمل؟</h2>

        <div class="sv-process">
            <div class="sv-process__line" aria-hidden="true"></div>
            <?php
            $process = array(
                array( '1', 'جلسة استكشاف', 'نفهم احتياجك، السوق، وأهداف المنتج الكبرى.' ),
                array( '2', 'تحديد النطاق', 'نحول الرؤية إلى وثيقة فنية وخطة عمل واضحة.' ),
                array( '3', 'خطة تنفيذ', 'عرض السعر، الجدول الزمني، وفريق العمل المخصص.' ),
                array( '4', 'بدء التطوير', 'انطلاق العمل بنظام الـ Sprints والتقارير الأسبوعية.' ),
            );
            foreach ( $process as $i => $p ) :
                list( $num, $ptitle, $ptext ) = $p;
            ?>
            <div class="sv-reveal sv-process__step" style="--sv-delay:<?php echo esc_attr( $i * 0.08 ); ?>s">
                <div class="sv-process__num"><?php echo esc_html( $num ); ?></div>
                <h4 class="sv-process__title"><?php echo esc_html( $ptitle ); ?></h4>
                <p class="sv-process__text"><?php echo esc_html( $ptext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     8. FINAL CTA — animated shader background
══════════════════════════════════════════ -->
<section class="sv-cta">
    <canvas id="sv-cta-canvas" class="sv-cta__canvas"></canvas>
    <div class="sv-glow-blob" style="width:22rem;height:22rem;background:rgba(156,246,176,0.28);inset-block-start:-6rem;inset-inline-end:-4rem;" aria-hidden="true"></div>
    <div class="container sv-cta__inner">
        <h2 class="sv-reveal sv-cta__title">
            هل تعرف نوع الخدمة <br class="sv-cta__break" /> التي تحتاجها؟
        </h2>
        <p class="sv-reveal sv-cta__text">
            دعنا نساعدك في تحديد النطاق الصحيح وتحويل فكرتك أو سير عملك إلى منتج رقمي قابل للتشغيل والنمو.
        </p>
        <div class="sv-reveal sv-cta__actions">
            <a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( 'contact' ) : home_url( '/contact/' ) ); ?>" class="sv-btn sv-btn--primary sv-btn--pulse">
                ابدأ مشروعك معنا
            </a>
            <a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( 'consultation' ) : home_url( '/consultation/' ) ); ?>" class="sv-btn sv-btn--ghost">
                احجز جلسة استكشاف
            </a>
        </div>
        <p class="sv-reveal sv-cta__note">انضم إلى قائمة شركائنا اليوم واحصل على استشارة تقنية مجانية.</p>
    </div>
</section>

</main>
</div><!-- /.sv-page -->

<?php get_footer(); ?>