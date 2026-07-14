<?php
$is_rtl  = st_locale() === 'ar';
$arrow   = $is_rtl ? 'arrow_back' : 'arrow_forward';
$services = st_query_cpt('st_service', 3);
$plans    = st_query_cpt('st_pricing', 3);
$faqs     = st_query_cpt('st_faq', 6);

/* ── sort pricing so recommended is always in the middle ── */
if ($plans) {
    $featIdx = null;
    foreach ($plans as $i => $p) {
        if (!empty($p['recommended'])) { $featIdx = $i; break; }
    }
    if ($featIdx !== null) {
        $feat = $plans[$featIdx];
        unset($plans[$featIdx]);
        $plans = array_values($plans);
        array_splice($plans, (int) floor(count($plans) / 2), 0, [$feat]);
    }
}

$capabilities = [
    ['smartphone',         $is_rtl ? 'تطوير الجوال'                : 'Mobile Development',    $is_rtl ? 'تطبيقات native و cross-platform بأداء عالي وتجربة مستخدم سلسة.' : 'Native and cross-platform apps with high performance.'],
    ['data_object',        $is_rtl ? 'الخلفيات البرمجية و APIs'    : 'Backend & APIs',        $is_rtl ? 'بنية تحتية قوية قابلة للتوسع وتكامل آمن مع الأنظمة الخارجية.' : 'Scalable infrastructure with secure external integrations.'],
    ['dashboard_customize',$is_rtl ? 'لوحات التحكم والتشغيل'       : 'Dashboards & Ops',     $is_rtl ? 'أدوات إدارية ذكية تمنحك سيطرة كاملة على العمليات والبيانات.' : 'Smart admin tools for full operational control.'],
    ['hub',                $is_rtl ? 'خصائص الأعمال'               : 'Business Features',    $is_rtl ? 'أتمتة الفوترة، إدارة المحافظ، الصلاحيات، والذكاء الاصطناعي التشغيلي.' : 'Billing automation, wallets, permissions and operational AI.'],
];

$case_studies = [
    [
        'sector'  => 'LOGISTICS & SUPPLY CHAIN',
        'title'   => $is_rtl ? 'Backway: هندسة سلاسل الإمداد الرقمية' : 'Backway: Digital Supply Chain Engineering',
        'desc'    => $is_rtl ? 'بنينا نظاماً متكاملاً لإدارة عمليات الميل الأخير، يربط السائقين بمركز العمليات عبر تطبيق جوال ذكي ولوحة تحكم مركزية متقدمة تدعم التتبع الفوري والأتمتة المالية.' : 'We built an integrated last-mile operations system connecting drivers to operations via a smart mobile app and advanced dashboard.',
        'tags'    => $is_rtl ? ['تطبيق السائقين (iOS/Android)', 'لوحة تحكم المشرفين', 'نظام تتبع GPS لحظي', 'محرك أتمتة الفوترة'] : ['Driver App (iOS/Android)', 'Admin Dashboard', 'Real-time GPS', 'Billing Automation'],
        'img'     => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB33hL_JB4-mI6kBtgDKl0VuZ_AEUnqmSJ8vNE8fRCkFKfa8XDECq3bxENOihEM_prYUUELP2fDu-qXlxFHyEpa3NBGI_hJDgC0UpI9koAqHq1iizs3ci2x259tNLWm9MmrC9F2dLAqTgNazkfMfckWGa-VPeKkskYDdJqQtKcGZBRNmRUB7BRO_BYHp-8_UiQF6j1cPWDVSXivqU1EsnJzapsn_4zKBQ88OGRrrT2NvqSfbawo7zHqygbKW0DBERqYmaRcEypLo-G-',
        'img_pos' => 'start',
        'color'   => '#ea580c',
    ],
    [
        'sector'  => 'EVENTS & BOOKINGS',
        'title'   => $is_rtl ? 'Lahza: السوق الرقمي الأول للقاعات' : 'Lahza: First Digital Venue Marketplace',
        'desc'    => $is_rtl ? 'تحويل تجربة حجز القاعات التقليدية إلى منصة رقمية سلسة. مكنّا ملاك القاعات من إدارة حجوزاتهم ومدفوعاتهم، ووفرنا للعملاء تجربة بحث وحجز فورية وموثوقة.' : 'Transforming traditional venue booking into a seamless digital platform for owners and customers.',
        'tags'    => $is_rtl ? ['منصة حجز العملاء', 'تطبيق ملاك القاعات', 'نظام دفع وسداد إلكتروني', 'تقويم حجوزات ذكي'] : ['Customer Booking Platform', 'Venue Owner App', 'Payment System', 'Smart Calendar'],
        'img'     => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAmy3r27P06-PxVLObbNcP0FqUVBzS8MrQZOKrM02ebrL6TPcIGhTFaxocrHTUzy9JG9UAPMr_4irP8nTp342HxsekxL_rTkEcUzQON9jGLU9BNN4LhEWuHrMdxibNjZAK8KHSCceAT-Oke8RpME_lfd89S1dfDbuhdBvHR0_DVSZ9hPV2nCy8Rd-o2icFDnvspVoSmkxqGYXceBOVrWatzUYVEbOrHDLCDtcXsTGHfLEESxbCj31NUVY71DamGCHBzVSh8iu34MjGy',
        'img_pos' => 'end',
        'color'   => '#2563eb',
    ],
    [
        'sector'  => 'PROP-TECH & MAINTENANCE',
        'title'   => $is_rtl ? 'EstateCare: رقمنة الصيانة العقارية' : 'EstateCare: Digitizing Property Maintenance',
        'desc'    => $is_rtl ? 'نظام تشغيل عقاري يربط ملاك المجمعات السكنية بفرق الصيانة والمستأجرين. أتمتنا دورة الصيانة بالكامل، من فتح التذكرة حتى التقييم الفني النهائي، مع إدارة كاملة للعقود والمستندات.' : 'A property operations system connecting complex owners with maintenance teams and tenants.',
        'tags'    => $is_rtl ? ['تطبيق المستأجرين', 'تطبيق الفنيين الميدانيين', 'نظام إدارة التذاكر', 'لوحة تحكم إدارة الأملاك'] : ['Tenant App', 'Field Technician App', 'Ticketing System', 'Property Management Dashboard'],
        'img'     => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDTg4mAz8ORW8UanYP8_9n9oeOgbdI0AUvRG_MMutTHYSTx0OZAYIsCLJsqPjAhkMrGqcpzH2pI25T8QFUu2XOQusybmCgBo5Hhr-VIQjBCK_egqUR9ayoKdFzCgQsbFumCaObBvGSVG99WIH7rWK-SaBwHr0ChwISZUpD_UHBYFhytQHciFXGyKD2EPMxBd-PDxr1UoUsMLyNbavb12eJRodIHsA4znfm_ghwhE_dCNetq5UX4zx7LCGE4qBbuFlqBZksznAMUp-YC',
        'img_pos' => 'start',
        'color'   => '#059669',
    ],
];

$mobile_apps = [
    ['restaurant',      $is_rtl ? 'تطبيقات المطاعم والـ POS'    : 'Restaurant & POS Apps',     $is_rtl ? 'تطوير واجهات الطلب السريع ونظام نقاط البيع السحابي المتكامل.' : 'Fast-order interfaces and cloud POS systems.',        'منشور',      'badge--green'],
    ['shopping_bag',    $is_rtl ? 'متاجر إلكترونية متعددة'      : 'Multi-store E-commerce',    $is_rtl ? 'بناء محرك المتاجر المتعددة وتكامل بوابات الدفع العالمية.' : 'Multi-store engine with global payment gateways.',    'تم التسليم', 'badge--orange'],
    ['health_and_safety',$is_rtl ? 'تطبيقات الرعاية الصحية'    : 'Healthcare Apps',            $is_rtl ? 'بناء نظام جدولة المواعيد الآمن وتشفير بيانات المرضى الحساسة.' : 'Secure appointment scheduling and patient data encryption.', 'منشور', 'badge--green'],
    ['local_shipping',  $is_rtl ? 'أنظمة التوصيل السريع'        : 'Fast Delivery Systems',     $is_rtl ? 'تحسين مسارات التوصيل وتتبع الشحنات في الوقت الفعلي.' : 'Route optimization and real-time shipment tracking.',  'مؤرشف',      'badge--gray'],
    ['payments',        $is_rtl ? 'تطبيقات المحافظ الرقمية'     : 'Digital Wallet Apps',       $is_rtl ? 'تطوير واجهات الدفع السريع وإدارة الرصيد والمكافآت.' : 'Fast payment interfaces and balance/rewards management.', 'منشور',   'badge--green'],
    ['fitness_center',  $is_rtl ? 'تطبيقات اللياقة البدنية'     : 'Fitness Apps',              $is_rtl ? 'بناء أنظمة تتبع التمارين والاشتراكات الشهرية للمدربين.' : 'Workout tracking and subscription management for coaches.', 'تم التسليم', 'badge--orange'],
];

$industries = [
    ['local_shipping', $is_rtl ? 'اللوجستيات والنقل'   : 'Logistics & Transport', $is_rtl ? 'تتبع الأساطيل، إدارة المناديب، وتحسين المسارات الذكي للطلبات.' : 'Fleet tracking, courier management and smart route optimization.'],
    ['event_seat',     $is_rtl ? 'المناسبات والفعاليات' : 'Events & Venues',       $is_rtl ? 'منصات حجز القاعات، التذاكر الرقمية، وإدارة الموردين والمدفوعات.' : 'Venue booking platforms, digital tickets and vendor management.'],
    ['real_estate_agent',$is_rtl ? 'الخدمات العقارية'  : 'Real Estate Services',  $is_rtl ? 'إدارة المجمعات، تذاكر الصيانة، وعقود الإيجار الرقمية الموثقة.' : 'Complex management, maintenance tickets and digital lease contracts.'],
    ['storefront',     $is_rtl ? 'الأسواق الرقمية'     : 'Digital Marketplaces',  $is_rtl ? 'منصات (Marketplaces) معقدة تدعم تعدد التجار وأنظمة العمولات.' : 'Complex marketplaces supporting multiple vendors and commission systems.'],
];

$why_us = [
    ['business_center',  $is_rtl ? 'تفكير منطق الأعمال أولاً'   : 'Business Logic First',       $is_rtl ? 'لا نبدأ بالبرمجة حتى نفهم نموذج عملك وكيف سيحقق المنتج أهدافه التجارية فعلياً.' : 'We start with your business model before writing a single line of code.', false],
    ['hub',              $is_rtl ? 'منصات متعددة الأدوار'        : 'Multi-Role Platforms',       $is_rtl ? 'خبرة في بناء أنظمة تربط العميل، الموظف، السائق، والمدير في منصة واحدة متكاملة.' : 'Experience building systems that connect customers, employees and managers.', false],
    ['devices',          $is_rtl ? 'App + Web + Admin'            : 'App + Web + Admin',           $is_rtl ? 'نغطي كافة الجوانب التقنية للمشروع، مما يضمن تناغم البيانات وسهولة التشغيل.' : 'Full-stack coverage ensuring data harmony and operational ease.', false],
    ['verified',         $is_rtl ? 'جاهزية الإطلاق الفوري'      : 'Launch-Ready Products',      $is_rtl ? 'نسلم منتجات مختبرة بدقة ومستوفية لكافة المعايير الأمنية والتشغيلية المطلوبة.' : 'Rigorously tested products meeting all security and operational standards.', false],
    ['handshake',        $is_rtl ? 'شريك تقني حقيقي'            : 'True Tech Partner',          $is_rtl ? 'نعمل كفريقك التقني الداخلي، نقدم المشورة والحلول المستدامة وليس فقط تنفيذ الطلبات.' : 'We work as your internal tech team, offering advice and sustainable solutions.', false],
    ['speed',            $is_rtl ? 'سرعة في التنفيذ المرن'       : 'Agile Execution Speed',      $is_rtl ? 'نعتمد منهجيات Agile لضمان تسليم سريع وفعال بجودة تضاهي المعايير العالمية.' : 'Agile methodologies ensuring fast, quality delivery.', false],
    ['architecture',     $is_rtl ? 'هندسة برمجية مستدامة'       : 'Sustainable Engineering',    $is_rtl ? 'بناء كود نظيف، موثق، وقابل للتوسع من قبل أي فريق تقني مستقبلاً دون الحاجة لإعادة البناء.' : 'Clean, documented, scalable code any future team can maintain.', true],
];

$engineering = [
    ['01', $is_rtl ? 'البنية التحتية السحابية'    : 'Cloud Infrastructure',       $is_rtl ? 'نستخدم أفضل ممارسات AWS و Azure لضمان استقرار النظام تحت أي ضغط مستخدمين مع توفير تكاليف التشغيل.' : 'AWS and Azure best practices for stability under any user load.'],
    ['02', $is_rtl ? 'أمن البيانات والخصوصية'    : 'Security & Privacy',          $is_rtl ? 'تشفير كامل للبيانات الحساسة والتزام صارم بمعايير الأمن السيبراني السعودية والعالمية.' : 'Full encryption and strict cybersecurity compliance.'],
    ['03', $is_rtl ? 'واجهات API متينة'           : 'Robust APIs',                $is_rtl ? 'تطوير Backend قوي يسهل التكامل مع أي خدمات خارجية، بوابات دفع، أو أنظمة ERP.' : 'Powerful backend enabling integration with any external service or ERP.'],
    ['04', $is_rtl ? 'اختبارات جودة آلية'        : 'Automated QA',               $is_rtl ? 'لا نعتمد فقط على الفحص اليدوي، بل نجري اختبارات برمجية شاملة لضمان استقرار كل تحديث جديد.' : 'Automated testing suites ensuring every update is stable.'],
    ['05', $is_rtl ? 'تجربة مستخدم موجهة بالأرقام' : 'Data-Driven UX',           $is_rtl ? 'قرارات التصميم لدينا مبنية على دراسة سلوك المستخدم لزيادة معدلات التحويل والولاء.' : 'Design decisions driven by user behavior analytics.'],
    ['06', $is_rtl ? 'توثيق تقني شامل'            : 'Full Documentation',         $is_rtl ? 'نسلمك المشروع مع توثيق كامل للكود، وقواعد البيانات، وسير العمل التشغيلي لضمان ملكيتك الكاملة.' : 'Complete code, database and workflow documentation for full ownership.'],
];

$process_steps = [
    ['١', $is_rtl ? 'الاستكشاف'          : 'Discovery',       $is_rtl ? 'فهم احتياجاتك، السوق، وتحديد نطاق العمل الهندسي.' : 'Understanding needs, market and engineering scope.'],
    ['٢', $is_rtl ? 'رسم المنتج'         : 'Product Mapping', $is_rtl ? 'بناء خارطة الطريق وتحديد الميزات التشغيلية والتقنية.' : 'Building the roadmap and defining operational features.'],
    ['٣', $is_rtl ? 'تصميم التجربة'      : 'UX Design',       $is_rtl ? 'تصميم واجهات احترافية تركز على سهولة الاستخدام والكفاءة.' : 'Professional UI/UX focused on usability and efficiency.'],
    ['٤', $is_rtl ? 'التطوير'            : 'Development',     $is_rtl ? 'تحويل التصاميم إلى كود برمجي متين باستخدام أحدث التقنيات.' : 'Turning designs into solid code with latest technologies.'],
    ['٥', $is_rtl ? 'الاختبار والتسليم' : 'QA & Delivery',   $is_rtl ? 'فحص دقيق لكافة أجزاء النظام وضمان خلوه من الأخطاء.' : 'Thorough testing of all system components.'],
    ['٦', $is_rtl ? 'الإطلاق والدعم'    : 'Launch & Support', $is_rtl ? 'نرافقك في مرحلة الإطلاق ونوفر الدعم التقني المستمر.' : 'We accompany your launch and provide continuous technical support.'],
];

$partnerships = [
    ['rocket',                   $is_rtl ? 'تمكين الشركات الناشئة (MVPs)' : 'Startup Enablement (MVPs)'],
    ['settings_suggest',         $is_rtl ? 'التحول الرقمي للمؤسسات'       : 'Enterprise Digital Transformation'],
    ['integration_instructions', $is_rtl ? 'شريك تنفيذ تقني استراتيجي'    : 'Strategic Tech Execution Partner'],
    ['design_services',          $is_rtl ? 'تطوير المنتجات (White-Label)'  : 'White-Label Product Development'],
    ['support_agent',            $is_rtl ? 'دعم تقني وتشغيل مستمر'         : 'Ongoing Technical Support & Operations'],
];
?>

    <!-- ═══════════════════════════════
         2. TECHNICAL CAPABILITIES
    ═══════════════════════════════ -->
    <section class="hs-section hs-section--white">
        <div class="container">
            <div class="hs-header hs-header--center">
                <h2 class="hs-title"><?php echo esc_html($is_rtl ? 'قدرات تقنية لبناء منتجات حقيقية' : 'Technical capabilities for building real products'); ?></h2>
                <p class="hs-subtitle"><?php echo esc_html($is_rtl ? 'نمتلك الأدوات الهندسية اللازمة لتحويل الأفكار المعقدة إلى واقع تشغيلي ملموس.' : 'We have the engineering tools to turn complex ideas into real operational solutions.'); ?></p>
            </div>
            <div class="hs-grid hs-grid--4">
                <?php foreach ($capabilities as [$icon, $title, $desc]) : ?>
                    <div class="hs-cap-card">
                        <span class="material-symbols-outlined hs-cap-card__icon"><?php echo esc_html($icon); ?></span>
                        <h4 class="hs-cap-card__title"><?php echo esc_html($title); ?></h4>
                        <p class="hs-cap-card__desc"><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         3. CASE STUDIES
    ═══════════════════════════════ -->
    <section class="hs-section hs-section--light">
        <div class="container">
            <div class="hs-header">
                <h2 class="hs-title"><?php echo esc_html($is_rtl ? 'دراسات حالة مختارة' : 'Featured Case Studies'); ?></h2>
                <p class="hs-subtitle"><?php echo esc_html($is_rtl ? 'تحويل التحديات التشغيلية الصعبة إلى منتجات رقمية ناجحة ومربحة.' : 'Turning tough operational challenges into successful digital products.'); ?></p>
            </div>
            <div class="hs-cases">
                <?php foreach ($case_studies as $cs) : ?>
                    <div class="hs-case hs-case--<?php echo esc_attr($cs['img_pos']); ?>">
                        <div class="hs-case__media">
                            <img src="<?php echo esc_url($cs['img']); ?>" alt="<?php echo esc_attr($cs['title']); ?>" loading="lazy">
                            <div class="hs-case__media-overlay"></div>
                            <span class="hs-case__media-badge"><?php echo esc_html($is_rtl ? 'دراسة حالة لمنصة كاملة' : 'Full Platform Case Study'); ?></span>
                        </div>
                        <div class="hs-case__body">
                            <div class="hs-case__sector" style="color:<?php echo esc_attr($cs['color']); ?>"><?php echo esc_html($cs['sector']); ?></div>
                            <h3 class="hs-case__title"><?php echo esc_html($cs['title']); ?></h3>
                            <p class="hs-case__desc"><?php echo esc_html($cs['desc']); ?></p>
                            <div class="hs-case__tags-label"><?php echo esc_html($is_rtl ? 'الوحدات التي تم تسليمها:' : 'Delivered modules:'); ?></div>
                            <div class="hs-case__tags">
                                <?php foreach ($cs['tags'] as $tag) : ?>
                                    <span class="hs-case__tag"><?php echo esc_html($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <a href="<?php echo esc_url(home_url('/case-studies/')); ?>" class="hs-case__btn">
                                <?php echo esc_html($is_rtl ? 'استعراض تفاصيل المشروع' : 'View project details'); ?>
                                <span class="material-symbols-outlined">arrow_back</span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         4. MOBILE APP CONTRIBUTIONS
    ═══════════════════════════════ -->
    <section class="hs-section hs-section--white">
        <div class="container">
            <div class="hs-header hs-header--center">
                <h2 class="hs-title"><?php echo esc_html($is_rtl ? 'مشاركات في تطبيقات الجوال' : 'Mobile App Contributions'); ?></h2>
                <p class="hs-subtitle"><?php echo esc_html($is_rtl ? 'نفخر بمشاركتنا الهندسية في بناء وتطوير تطبيقات ناجحة في قطاعات حيوية.' : 'We are proud of our engineering contributions to successful apps in vital sectors.'); ?></p>
            </div>
            <div class="hs-grid hs-grid--3">
                <?php foreach ($mobile_apps as [$icon, $title, $desc, $badge_text, $badge_cls]) : ?>
                    <div class="hs-app-card">
                        <div class="hs-app-card__top">
                            <div class="hs-app-card__icon-wrap">
                                <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                            </div>
                            <span class="hs-app-card__badge <?php echo esc_attr($badge_cls); ?>"><?php echo esc_html($badge_text); ?></span>
                        </div>
                        <h4 class="hs-app-card__title"><?php echo esc_html($title); ?></h4>
                        <div class="hs-app-card__role"><?php echo esc_html($is_rtl ? 'تطوير تطبيق الجوال' : 'Mobile App Development'); ?></div>
                        <p class="hs-app-card__desc"><?php echo esc_html($desc); ?></p>
                        <div class="hs-app-card__footer">
                            <span class="material-symbols-outlined">check_circle</span>
                            <?php echo esc_html($is_rtl ? 'تم التسليم بنجاح' : 'Successfully delivered'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         5. INDUSTRIES
    ═══════════════════════════════ -->
    <section class="hs-section hs-section--muted">
        <div class="container">
            <div class="hs-header">
                <h2 class="hs-title"><?php echo esc_html($is_rtl ? 'قطاعات نتخصص في حلولها' : 'Industries we specialize in'); ?></h2>
                <p class="hs-subtitle"><?php echo esc_html($is_rtl ? 'خبرة عميقة في قطاعات تتطلب دقة هندسية عالية وفهماً عميقاً لسير العمل.' : 'Deep expertise in sectors requiring high engineering precision.'); ?></p>
            </div>
            <div class="hs-grid hs-grid--4">
                <?php foreach ($industries as [$icon, $title, $desc]) : ?>
                    <div class="hs-industry-card">
                        <div class="hs-industry-card__icon-wrap">
                            <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                        </div>
                        <h4 class="hs-industry-card__title"><?php echo esc_html($title); ?></h4>
                        <p class="hs-industry-card__desc"><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         6. WHY SPINESTECH
    ═══════════════════════════════ -->
    <section class="hs-section hs-section--white">
        <div class="container">
            <div class="hs-header hs-header--center">
                <h2 class="hs-title"><?php echo esc_html($is_rtl ? 'لماذا تختار SpinesTech كشريك تقني؟' : 'Why choose SpinesTech as your tech partner?'); ?></h2>
            </div>
            <div class="hs-why-grid">
                <?php foreach ($why_us as [$icon, $title, $desc, $wide]) : ?>
                    <div class="hs-why-card<?php echo $wide ? ' hs-why-card--wide' : ''; ?>">
                        <span class="material-symbols-outlined hs-why-card__icon"><?php echo esc_html($icon); ?></span>
                        <h5 class="hs-why-card__title"><?php echo esc_html($title); ?></h5>
                        <p class="hs-why-card__desc"><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         7. ENGINEERING DEPTH
    ═══════════════════════════════ -->
    <section class="hs-section hs-section--dark">
        <div class="container">
            <div class="hs-header hs-header--center">
                <h2 class="hs-title hs-title--light"><?php echo esc_html($is_rtl ? 'عمق هندسي خلف كل منتج' : 'Engineering depth behind every product'); ?></h2>
                <p class="hs-subtitle hs-subtitle--light"><?php echo esc_html($is_rtl ? 'الجودة الحقيقية تكمن في البنية التحتية الصلبة التي لا يراها المستخدم.' : 'True quality lies in the solid infrastructure users never see.'); ?></p>
            </div>
            <div class="hs-grid hs-grid--3">
                <?php foreach ($engineering as [$num, $title, $desc]) : ?>
                    <div class="hs-eng-card">
                        <div class="hs-eng-card__num"><?php echo esc_html($num); ?>. <?php echo esc_html($title); ?></div>
                        <p class="hs-eng-card__desc"><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="hs-section--dark__glow"></div>
    </section>

    <!-- ═══════════════════════════════
         8. PROCESS
    ═══════════════════════════════ -->
    <section class="hs-section hs-section--light">
        <div class="container">
            <div class="hs-header hs-header--center">
                <h2 class="hs-title"><?php echo esc_html($is_rtl ? 'من الفكرة إلى الإطلاق' : 'From idea to launch'); ?></h2>
                <p class="hs-subtitle"><?php echo esc_html($is_rtl ? 'رحلتنا المنهجية لبناء منتجك الرقمي بمعايير عالمية.' : 'Our systematic journey to build your digital product to world standards.'); ?></p>
            </div>
            <div class="hs-process">
                <?php foreach ($process_steps as [$num, $title, $desc]) : ?>
                    <div class="hs-process__step">
                        <div class="hs-process__num"><?php echo esc_html($num); ?></div>
                        <h6 class="hs-process__title"><?php echo esc_html($title); ?></h6>
                        <p class="hs-process__desc"><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         9. PARTNERSHIP MODELS
    ═══════════════════════════════ -->
    <section class="hs-section hs-section--muted">
        <div class="container">
            <div class="hs-header hs-header--center">
                <h2 class="hs-title"><?php echo esc_html($is_rtl ? 'نماذج شراكة مرنة وموثوقة' : 'Flexible and reliable partnership models'); ?></h2>
            </div>
            <div class="hs-partners">
                <?php foreach ($partnerships as [$icon, $label]) : ?>
                    <div class="hs-partner-card">
                        <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                        <div class="hs-partner-card__label"><?php echo esc_html($label); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         DISCLAIMER
    ═══════════════════════════════ -->
    <div class="hs-disclaimer">
        <div class="container">
            <p><?php echo esc_html($is_rtl
                ? 'بعض المشاريع تم تنفيذها مباشرة من خلال SpinesTech، بينما تعكس مشاريع أخرى مساهمات فريقنا في تطوير تطبيقات جوال ضمن مشاريع قادها شركاء تقنيون. يتم توضيح دورنا ونطاق عملنا داخل كل مشروع.'
                : 'Some projects were executed directly by SpinesTech; others reflect our team\'s contributions within projects led by technology partners. Our role and scope are clarified inside each project.'); ?>
            </p>
        </div>
    </div>

    <!-- ═══════════════════════════════
         10. FINAL CTA
    ═══════════════════════════════ -->
    <section class="hs-cta">
        <div class="hs-cta__glow hs-cta__glow--1"></div>
        <div class="hs-cta__glow hs-cta__glow--2"></div>
        <div class="container hs-cta__inner">
            <h2 class="hs-cta__title"><?php echo esc_html($is_rtl ? 'هل فكرتك القادمة تحتاج إلى أكثر من مجرد كود؟' : 'Does your next idea need more than just code?'); ?></h2>
            <p class="hs-cta__desc"><?php echo esc_html($is_rtl
                ? 'نحن هنا لنحول رؤيتك إلى واقع هندسي قابل للتوسع. سواء كنت تبني منصة لوجستية، سوقاً رقمياً، أو نظام تشغيل لعملك، SpinesTech هي شريكك الأمثل.'
                : 'We are here to turn your vision into scalable engineering reality. Whether logistics, marketplace or operations system, SpinesTech is your ideal partner.'); ?>
            </p>
            <div class="hs-cta__actions">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hs-cta__btn hs-cta__btn--primary">
                    <?php echo esc_html($is_rtl ? 'تواصل معنا لبدء مشروعك' : 'Contact us to start your project'); ?>
                    <span class="material-symbols-outlined">send</span>
                </a>
                <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="hs-cta__btn hs-cta__btn--ghost">
                    <?php echo esc_html($is_rtl ? 'تحدث مع مستشار تقني' : 'Talk to a tech advisor'); ?>
                </a>
            </div>
            <div class="hs-cta__proof">
                <p class="hs-cta__proof-title"><?php echo esc_html($is_rtl ? 'التزامنا تجاه كل شريك: شفافية، احترافية، وملكية كاملة' : 'Our commitment: transparency, professionalism and full ownership'); ?></p>
                <div class="hs-cta__proof-grid">
                    <?php
                    $proofs = $is_rtl
                        ? ['كود مصدر كامل (Source)', 'توثيق تقني شامل', 'نقل الملكية القانوني', 'دعم فني بعد الإطلاق', 'تدريب فريق العمل', 'ضمان استقرار النظام']
                        : ['Full Source Code', 'Technical Documentation', 'Legal IP Transfer', 'Post-Launch Support', 'Team Training', 'System Stability Guarantee'];
                    foreach ($proofs as $p) : ?>
                        <div class="hs-cta__proof-item"><?php echo esc_html($p); ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>