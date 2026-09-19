<?php
declare(strict_types=1);

/**
 * Article landing page content and helpers.
 * Canonical copy for buyer-intent articles (ar/en).
 */

if (!defined('ABSPATH')) {
    exit;
}

function st_article_slugs(): array
{
    return [
        'mobile-app-development-cost-saudi-arabia',
        'flutter-vs-native',
        'erp-vs-custom-software',
        'mobile-app-development-timeline',
        'how-to-choose-software-company',
        'when-you-need-admin-dashboard',
        'manual-process-to-digital-system',
        'saudi-app-launch-requirements',
        'what-is-grc',
    ];
}

function st_article_landing_config(): array
{
    return [
        'mobile-app-development-cost-saudi-arabia' => [
            'title' => [
                'ar' => 'كم تكلفة تطوير تطبيق في السعودية؟',
                'en' => 'How much does mobile app development cost in Saudi Arabia?',
            ],
            'excerpt' => [
                'ar' => 'تتراوح تكلفة تطوير تطبيق أعمال في السعودية عادة بين نطاق MVP محدود ومشروع متكامل متعدد الأدوار — يعتمد السعر على النطاق، التكاملات، والمنصات.',
                'en' => 'Business app development in Saudi Arabia typically ranges from a focused MVP to a multi-role platform — pricing depends on scope, integrations, and platforms.',
            ],
            'meta_description' => [
                'ar' => 'دليل تكلفة تطوير تطبيقات الجوال في السعودية: نطاقات MVP، العوامل المؤثرة على السعر، وكيفية الحصول على تقدير واقعي لمشروعك.',
                'en' => 'Mobile app development cost guide for Saudi Arabia: MVP ranges, pricing factors, and how to get a realistic estimate for your project.',
            ],
            'content' => [
                'ar' => '<p>تتراوح تكلفة تطوير تطبيق أعمال في السعودية عادة بين 80,000 و350,000 ريال للمشاريع متوسطة النطاق، مع اختلاف السعر حسب عدد الأدوار، التكاملات، والمنصات (iOS/Android/Web).</p>
<h2>ما الذي يحدد سعر التطبيق؟</h2>
<p>السعر لا يُحسب بـ «عدد الشاشات» فقط. العوامل الحاسمة: مسارات المستخدم (عميل، مزوّد، إدارة)، التكاملات (دفع، خرائط، ERP)، متطلبات الأمان والامتثال، ودعم اللغة العربية وRTL. كل عنصر يضيف وقت هندسة واختبار.</p>
<h2>نطاق MVP مقابل منتج تشغيلي كامل</h2>
<p>إذا كان هدفك MVP سريع للتحقق من السوق، ركّز على مسار واحد للمستخدم، لوحة تحكم أساسية، وتكاملات قليلة — غالبًا في نطاق أقل. أما المنتجات التشغيلية الكاملة فتحتاج هندسة أعمق للصلاحيات، التقارير، والأتمتة.</p>
<h2>مصادر مرجعية</h2>
<p>للمتطلبات التنظيمية المرتبطة بالتطبيقات والبيانات في المملكة، راجع <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">هيئة الحكومة الرقمية (SDAIA)</a> و<a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">هيئة الاتصالات والفضاء والتقنية (CST)</a>. لمتطلبات نشر التطبيقات، راجع <a href="https://developer.apple.com/app-store/review/guidelines/" rel="noopener noreferrer" target="_blank">إرشادات App Store</a>.</p>
<p>للحصول على تقدير دقيق لمشروعك، <a href="/contact/">ناقش متطلباتك معنا</a> مع وصف واضح للنطاق والجدول الزمني.</p>',
                'en' => '<p>Mobile app development in Saudi Arabia often falls between SAR 80,000 and SAR 350,000 for mid-scope business products, depending on user roles, integrations, and platforms (iOS/Android/Web).</p>
<h2>What drives app pricing?</h2>
<p>Price is not calculated by “screen count” alone. Critical factors include user journeys (customer, provider, admin), integrations (payments, maps, ERP), security and compliance requirements, and Arabic/RTL support. Each adds engineering and testing time.</p>
<h2>MVP scope vs full operational product</h2>
<p>If your goal is a fast market-validation MVP, focus on one primary user journey, a lean admin panel, and minimal integrations — typically a lower range. Full operational products require deeper work on permissions, reporting, and automation.</p>
<h2>Official references</h2>
<p>For regulatory context on apps and data in the Kingdom, see <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> and <a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a>. For store submission requirements, see <a href="https://developer.apple.com/app-store/review/guidelines/" rel="noopener noreferrer" target="_blank">App Store Review Guidelines</a>.</p>
<p>For a precise estimate, <a href="/contact/">discuss your project with us</a> with a clear scope and timeline.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل السعر يشمل رفع التطبيق على المتاجر؟', 'a' => 'عادة نضمّن دعم الإعداد والرفع ضمن نطاق التنفيذ؛ رسوم المتاجر (Apple/Google) على العميل. نحدد ذلك في العرض.'],
                    ['q' => 'ما أرخص نطاق لتطبيق MVP؟', 'a' => 'تطبيق MVP بمسار واحد ولوحة أساسية قد يبدأ من نطاق أقل — لكن الجودة والاختبار يجب أن يبقيا جزءًا من النطاق وليس اختصارًا يضر المنتج.'],
                    ['q' => 'كيف نقلل التكلفة دون إضعاف المنتج؟', 'a' => 'نحدد نطاق MVP واضح، نؤجل ميزات غير حرجة، ونختار تقنية مناسبة (مثل Flutter عند الحاجة لمنصتين).'],
                ],
                'en' => [
                    ['q' => 'Does pricing include store submission?', 'a' => 'We typically include submission support in scope; Apple/Google fees are on the client. We clarify this in the proposal.'],
                    ['q' => 'What is the lowest MVP range?', 'a' => 'A single-journey MVP with a basic admin panel may start lower — but quality and testing must remain in scope, not cut in ways that harm the product.'],
                    ['q' => 'How can we reduce cost without weakening the product?', 'a' => 'Define a clear MVP scope, defer non-critical features, and choose the right stack (e.g. Flutter when two platforms are needed).'],
                ],
            ],
            'related_services' => ['mobile-app-development', 'custom-software-development'],
            'related_cases' => ['lahza', 'merchant', 'backway'],
            'related_articles' => ['flutter-vs-native', 'mobile-app-development-timeline', 'how-to-choose-software-company'],
        ],

        'flutter-vs-native' => [
            'title' => [
                'ar' => 'Flutter أم Native؟',
                'en' => 'Flutter or Native?',
            ],
            'excerpt' => [
                'ar' => 'Flutter مناسب لتسريع الإطلاق على iOS وAndroid مع كود مشترك، بينما Native أفضل عندما تكون الأداء العالي أو ميزات النظام المتقدمة هي الأولوية.',
                'en' => 'Flutter is strong for faster iOS/Android delivery with shared code, while Native is better when peak performance or advanced platform features are the priority.',
            ],
            'meta_description' => [
                'ar' => 'مقارنة Flutter و Native (Swift/Kotlin) لتطوير تطبيقات الجوال: متى تختار كل خيار وفق أهداف المنتج والجدول الزمني.',
                'en' => 'Flutter vs Native (Swift/Kotlin) for mobile apps: when to choose each option based on product goals and timeline.',
            ],
            'content' => [
                'ar' => '<p>اختيار Flutter أو Native يعتمد على أولويات المنتج: السرعة، الأداء، وتعقيد الميزات — وليس على شعبية التقنية فقط.</p>
<h2>متى يكون Flutter مناسبًا؟</h2>
<p>Flutter خيار عملي للمنتجات التي تحتاج إطلاقًا أسرع على iOS وAndroid مع واجهة موحدة وكود مشترك. مناسب لتطبيقات الخدمات، الحجز، والمتاجر عندما الأداء «جيدًا بما يكفي» وليس متطلبًا حرجًا للرسوم ثلاثية الأبعاد أو معالجة ثقيلة.</p>
<h2>متى يكون Native أفضل؟</h2>
<p>Native (Swift/Kotlin) يبقى الأفضل للتطبيقات التي تعتمد على أداء عالٍ، تكاملات عميقة مع النظام (Bluetooth، AR، Wallet)، أو تجارب معقدة جداً تتطلب تحكمًا كاملًا في المنصة.</p>
<h2>كيف نختار في SpinesTech؟</h2>
<p>نبدأ بتحليل مسار المستخدم والتكاملات قبل اختيار التقنية — وليس العكس. للمتطلبات التقنية العامة في المملكة، راجع <a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a> و<a href="https://developer.apple.com/documentation/" rel="noopener noreferrer" target="_blank">Apple Developer Documentation</a>.</p>
<p><a href="/contact/">تواصل معنا</a> لمناقشة تقنية مناسبة لمشروعك، أو <a href="/services/mobile-app-development/">اطلع على خدمة تطوير التطبيقات</a>.</p>',
                'en' => '<p>The Flutter vs Native decision depends on product priorities: speed, performance, and feature complexity — not technology hype alone.</p>
<h2>When is Flutter a good fit?</h2>
<p>Flutter is practical when you need faster delivery on iOS and Android with a unified UI and shared codebase. It fits service, booking, and commerce apps when performance is “good enough” and not critical for 3D graphics or heavy processing.</p>
<h2>When is Native better?</h2>
<p>Native (Swift/Kotlin) remains best for apps that depend on peak performance, deep OS integrations (Bluetooth, AR, Wallet), or highly specialized experiences requiring full platform control.</p>
<h2>How we choose at SpinesTech</h2>
<p>We analyze user journeys and integrations before choosing the stack — not the other way around. For technical context in the Kingdom, see <a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a> and <a href="https://developer.apple.com/documentation/" rel="noopener noreferrer" target="_blank">Apple Developer Documentation</a>.</p>
<p><a href="/contact/">Contact us</a> to discuss the right stack for your project, or <a href="/services/mobile-app-development/">explore our mobile app service</a>.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل Flutter يدعم RTL والعربية؟', 'a' => 'نعم. Flutter يدعم RTL بشكل جيد، ونطبّقه في كل مشروع عربي مع اختبار على أجهزة حقيقية.'],
                    ['q' => 'هل يمكن التحويل من Flutter إلى Native لاحقًا؟', 'a' => 'ممكن لكن مكلف. الأفضل اختيار التقنية مبكرًا وفق خطة المنتج لـ 18–24 شهرًا.'],
                    ['q' => 'ما مدى أداء Flutter مقارنة بـ Native؟', 'a' => 'لمعظم تطبيقات الأعمال الأداء مقارب. Native يتفوق في حالات محددة: رسوم معقدة، تكاملات نظام عميقة، أو متطلبات أداء حرجة.'],
                ],
                'en' => [
                    ['q' => 'Does Flutter support RTL and Arabic?', 'a' => 'Yes. Flutter supports RTL well; we implement and test it on real devices in every Arabic project.'],
                    ['q' => 'Can we migrate from Flutter to Native later?', 'a' => 'Possible but costly. Better to choose early based on an 18–24 month product plan.'],
                    ['q' => 'How does Flutter performance compare to Native?', 'a' => 'For most business apps performance is comparable. Native wins in specific cases: complex graphics, deep OS integrations, or critical performance requirements.'],
                ],
            ],
            'related_services' => ['mobile-app-development'],
            'related_cases' => ['lahza', 'merchant'],
            'related_articles' => ['mobile-app-development-cost-saudi-arabia', 'mobile-app-development-timeline'],
        ],

        'erp-vs-custom-software' => [
            'title' => [
                'ar' => 'ERP أم Custom Software؟',
                'en' => 'ERP or Custom Software?',
            ],
            'excerpt' => [
                'ar' => 'ERP الجاهز يناسب العمليات القياسية، بينما البرمجيات المخصصة أفضل عندما تكون عملياتك أو نموذج عملك مختلفاً عن القوالب الجاهزة.',
                'en' => 'Off-the-shelf ERP fits standard operations; custom software is better when your workflows or business model do not match packaged templates.',
            ],
            'meta_description' => [
                'ar' => 'ERP جاهز أم برمجيات مخصصة؟ دليل لاختيار المسار المناسب وفق عملياتك، التكاملات، والتوسع في السعودية والخليج.',
                'en' => 'Off-the-shelf ERP or custom software? A guide to choosing the right path based on your operations, integrations, and growth in Saudi Arabia and the GCC.',
            ],
            'content' => [
                'ar' => '<p>إذا كانت عملياتك قريبة من قوالب ERP القياسية، قد يكون الحل الجاهز أسرع للتشغيل. أما إذا كانت لديك أدوار متعددة، قواعد تشغيل خاصة، أو تكاملات فريدة، فالبرمجيات المخصصة غالباً تعطي عائداً أفضل على المدى المتوسط.</p>
<h2>متى يفوز ERP الجاهز؟</h2>
<p>عندما العمليات مالية ومخزنية قياسية، والتخصيص المطلوب محدود، والمورد يدعم الفوترة الإلكترونية وفق <a href="https://zatca.gov.sa" rel="noopener noreferrer" target="_blank">ZATCA</a>. التكلفة الأولية قد تكون أقل لكن رسوم التخصيص والتجديد تتراكم.</p>
<h2>متى تختار برمجيات مخصصة؟</h2>
<p>عندما نموذج عملك فريد (marketplace، حجز، لوجستيات)، أو تحتاج تكاملات محلية لا يدعمها ERP الجاهز بمرونة. النظام المخصص يُبنى حول عملياتك وليس العكس.</p>
<h2>الخطوة الأولى: خريطة العمليات</h2>
<p>القرار الصحيح يبدأ بخريطة العمليات: من يفعل ماذا؟ ما البيانات المطلوبة؟ وأين نقاط الاختناق الحالية؟</p>
<p>راجع أيضًا <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> لمتطلبات البيانات. <a href="/contact/">ناقش مشروعك معنا</a> أو اطلع على <a href="/services/custom-software-development/">البرمجيات المخصصة</a> و<a href="/services/erp-business-systems/">أنظمة ERP</a>.</p>',
                'en' => '<p>If your operations closely match standard ERP templates, packaged software may be faster to run. If you have multi-role workflows, custom business rules, or unique integrations, bespoke software often delivers better medium-term ROI.</p>
<h2>When off-the-shelf ERP wins</h2>
<p>When finance and inventory processes are standard, customization needs are limited, and the vendor supports e-invoicing per <a href="https://zatca.gov.sa" rel="noopener noreferrer" target="_blank">ZATCA</a>. Initial cost may be lower but customization and renewal fees accumulate.</p>
<h2>When to choose custom software</h2>
<p>When your business model is unique (marketplace, booking, logistics), or you need local integrations that off-the-shelf ERP cannot support flexibly. Custom systems are built around your operations, not the reverse.</p>
<h2>First step: operations map</h2>
<p>The right decision starts with an operations map: who does what, which data is required, and where current bottlenecks exist.</p>
<p>Also see <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> for data requirements. <a href="/contact/">Discuss your project with us</a> or explore <a href="/services/custom-software-development/">custom software</a> and <a href="/services/erp-business-systems/">ERP systems</a>.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل يمكن الجمع بين ERP جاهز ومخصص؟', 'a' => 'نعم. كثير من الشركات تستخدم ERP للمالية والمخزون ونظام مخصص للعمليات الخاصة — مع تكامل API بينهما.'],
                    ['q' => 'ما تكلفة ERP-lite مخصص؟', 'a' => 'تختلف حسب الوحدات. عادة 14–24 أسبوعًا للإصدار الأول مع وحدات أساسية — نحدد النطاق في مرحلة الاكتشاف.'],
                    ['q' => 'من يملك الكود في الحل المخصص؟', 'a' => 'أنت. نسلّم الكود المصدري والتوثيق وفق اتفاق التنفيذ.'],
                ],
                'en' => [
                    ['q' => 'Can we combine off-the-shelf ERP with custom software?', 'a' => 'Yes. Many companies use ERP for finance/inventory and custom software for unique operations — integrated via APIs.'],
                    ['q' => 'What does custom ERP-lite cost?', 'a' => 'Varies by modules. Typically 14–24 weeks for a first release with core modules — scope is defined in discovery.'],
                    ['q' => 'Who owns the code in a custom solution?', 'a' => 'You do. We deliver source code and documentation per the execution agreement.'],
                ],
            ],
            'related_services' => ['erp-business-systems', 'custom-software-development'],
            'related_cases' => ['supply-chain-erp', 'backway'],
            'related_articles' => ['manual-process-to-digital-system', 'what-is-grc'],
        ],

        'mobile-app-development-timeline' => [
            'title' => [
                'ar' => 'كم يستغرق تطوير تطبيق؟',
                'en' => 'How long does mobile app development take?',
            ],
            'excerpt' => [
                'ar' => 'تطوير تطبيق MVP يستغرق عادة 8–14 أسبوعًا، والمنتج التشغيلي الكامل 4–8 أشهر — يعتمد الجدول على النطاق، التكاملات، وعدد المنصات.',
                'en' => 'An MVP app typically takes 8–14 weeks; a full operational product 4–8 months — timeline depends on scope, integrations, and platform count.',
            ],
            'meta_description' => [
                'ar' => 'جدول زمني واقعي لتطوير تطبيق جوال في السعودية: مراحل MVP، العوامل التي تطيل أو تقصر المشروع، ونصائح لتسريع الإطلاق.',
                'en' => 'Realistic mobile app development timeline in Saudi Arabia: MVP phases, factors that extend or shorten the project, and tips to accelerate launch.',
            ],
            'content' => [
                'ar' => '<p>تطوير تطبيق MVP للأعمال يستغرق عادة بين 8 و14 أسبوعًا؛ المنتج التشغيلي الكامل متعدد الأدوار قد يحتاج 4–8 أشهر حسب النطاق والتكاملات.</p>
<h2>مراحل الجدول الزمني النموذجي</h2>
<p><strong>الاكتشاف (1–2 أسبوع):</strong> تحليل المتطلبات، User Flows، ونطاق MVP.<br><strong>التصميم (2–3 أسابيع):</strong> UI/UX ونماذج تفاعلية.<br><strong>التطوير (4–8 أسابيع):</strong> الميزات، API، والتكاملات.<br><strong>الاختبار والإطلاق (2–3 أسابيع):</strong> QA، أجهزة حقيقية، ورفع المتاجر.</p>
<h2>ما الذي يطيل المشروع؟</h2>
<p>تغيير النطاق المتكرر، تكاملات غير محددة مبكرًا (دفع، ERP)، متطلبات امتثال معقدة، وعدم توفر API جاهز من النظام الخلفي.</p>
<h2>مصادر مرجعية</h2>
<p>لجدول مراجعة المتاجر، راجع <a href="https://developer.apple.com/app-store/review/" rel="noopener noreferrer" target="_blank">App Store Review</a> و<a href="https://support.google.com/googleplay/android-developer/answer/9859751" rel="noopener noreferrer" target="_blank">Google Play launch checklist</a>. للمتطلبات المحلية: <a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a>.</p>
<p><a href="/contact/">ناقش جدولك الزمني معنا</a> مع وصف واضح للنطاق.</p>',
                'en' => '<p>A business MVP app typically takes 8–14 weeks; a full multi-role operational product may need 4–8 months depending on scope and integrations.</p>
<h2>Typical timeline phases</h2>
<p><strong>Discovery (1–2 weeks):</strong> requirements, user flows, MVP scope.<br><strong>Design (2–3 weeks):</strong> UI/UX and interactive prototypes.<br><strong>Development (4–8 weeks):</strong> features, APIs, integrations.<br><strong>Test & launch (2–3 weeks):</strong> QA, real devices, store submission.</p>
<h2>What extends the project?</h2>
<p>Repeated scope changes, integrations not defined early (payments, ERP), complex compliance requirements, and missing backend APIs.</p>
<h2>Official references</h2>
<p>For store review timelines, see <a href="https://developer.apple.com/app-store/review/" rel="noopener noreferrer" target="_blank">App Store Review</a> and <a href="https://support.google.com/googleplay/android-developer/answer/9859751" rel="noopener noreferrer" target="_blank">Google Play launch checklist</a>. For local requirements: <a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a>.</p>
<p><a href="/contact/">Discuss your timeline with us</a> with a clear scope description.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل يمكن إطلاق MVP في 6 أسابيع؟', 'a' => 'ممكن لنطاق محدود جداً (مسار واحد، بدون تكاملات معقدة) — لكن الجودة والاختبار يجب أن يبقيا في النطاق.'],
                    ['q' => 'كم يستغرق مراجعة App Store؟', 'a' => 'عادة 24–48 ساعة لمراجعة أولية؛ قد تطول إذا رُفض التطبيق وتحتاج تعديلات. نحضّر المتطلبات مسبقًا لتقليل الرفض.'],
                    ['q' => 'هل التصميم يضاعف الوقت؟', 'a' => 'التصميم الجيد يقلل إعادة العمل لاحقًا. ندمج تصميم MVP مع التطوير — لا نبني كل شاشة قبل البرمجة.'],
                ],
                'en' => [
                    ['q' => 'Can we launch an MVP in 6 weeks?', 'a' => 'Possible for a very narrow scope (one journey, no complex integrations) — but quality and testing must stay in scope.'],
                    ['q' => 'How long does App Store review take?', 'a' => 'Usually 24–48 hours for initial review; longer if rejected and fixes are needed. We prepare requirements upfront to reduce rejection.'],
                    ['q' => 'Does design double the time?', 'a' => 'Good design reduces rework later. We integrate MVP design with development — not every screen before coding.'],
                ],
            ],
            'related_services' => ['mobile-app-development'],
            'related_cases' => ['lahza', 'backway'],
            'related_articles' => ['mobile-app-development-cost-saudi-arabia', 'flutter-vs-native'],
        ],

        'how-to-choose-software-company' => [
            'title' => [
                'ar' => 'كيف تختار شركة تطوير؟',
                'en' => 'How to choose a software development company?',
            ],
            'excerpt' => [
                'ar' => 'اختيار شريك تطوير ناجح يعتمد على أعمال مماثلة، وضوح النطاق، عملية تكرارية، وشفافية في التكلفة والجدول — وليس السعر الأقل فقط.',
                'en' => 'Choosing a successful development partner depends on similar work, clear scope, iterative process, and transparent cost and timeline — not lowest price alone.',
            ],
            'meta_description' => [
                'ar' => 'دليل اختيار شركة تطوير برمجيات في السعودية: معايير التقييم، أسئلة يجب طرحها، وعلامات تحذيرية قبل التوقيع.',
                'en' => 'Guide to choosing a software development company in Saudi Arabia: evaluation criteria, questions to ask, and warning signs before signing.',
            ],
            'content' => [
                'ar' => '<p>الشريك المناسب ليس من يقدم أقل سعرًا، بل من يفهم عملياتك، يعرض أعمال مماثلة، ويقدم نطاقًا واضحًا مع عملية تكرارية وشفافية في التكلفة والجدول.</p>
<h2>معايير التقييم الأساسية</h2>
<p><strong>أعمال مماثلة:</strong> تطبيقات، منصات، أو أنظمة في قطاعك أو نموذج عمل مشابه.<br><strong>عملية واضحة:</strong> اكتشاف، Sprints، عروض دورية، وتوثيق — وليس «نسلّم بعد 6 أشهر».<br><strong>فريق محلي أو متاح:</strong> تواصل سريع، دعم عربي، وفهم السوق الخليجي.</p>
<h2>أسئلة يجب طرحها</h2>
<p>من يملك الكود؟ كيف تُدار التغييرات في النطاق؟ ما فترة الضمان والدعم بعد الإطلاق؟ هل لديكم تجربة مع بوابات دفع محلية وZATCA؟</p>
<h2>علامات تحذيرية</h2>
<p>عرض بدون أسئلة عن عملياتك، وعد بجدول غير واقعي، عدم وجود case studies، أو رفض تقديم مراجع.</p>
<p>راجع <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> لمتطلبات البيانات عند اختيار شريك يتعامل مع بيانات حساسة. <a href="/contact/">تواصل معنا</a> لمناقشة مشروعك.</p>',
                'en' => '<p>The right partner is not the cheapest quote, but one who understands your operations, shows similar work, and offers clear scope with an iterative process and transparent cost and timeline.</p>
<h2>Core evaluation criteria</h2>
<p><strong>Similar work:</strong> apps, platforms, or systems in your sector or a comparable business model.<br><strong>Clear process:</strong> discovery, sprints, regular demos, documentation — not “we deliver in 6 months.”<br><strong>Accessible team:</strong> fast communication, Arabic support, GCC market understanding.</p>
<h2>Questions to ask</h2>
<p>Who owns the code? How are scope changes managed? What is the warranty and post-launch support? Do you have experience with local payment gateways and ZATCA?</p>
<h2>Warning signs</h2>
<p>Proposal without questions about your operations, unrealistic timeline promises, no case studies, or refusal to provide references.</p>
<p>See <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> for data requirements when choosing a partner handling sensitive data. <a href="/contact/">Contact us</a> to discuss your project.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل الشركة المحلية أفضل من الشركة الأجنبية؟', 'a' => 'ليس دائمًا. المهم: فهم السوق، التواصل، وأعمال مماثلة. بعض الشركات الأجنبية لديها فرق محلية قوية.'],
                    ['q' => 'كيف نقارن العروض؟', 'a' => 'قارن النطاق (الميزات المدرجة)، العملية، والمراجع — وليس السعر الإجمالي فقط. عرض أرخص قد يستثني اختبار أو دعم.'],
                    ['q' => 'هل نحتاج RFP طويل؟', 'a' => 'للمشاريع الكبيرة مفيد. للـ MVP، جلسة اكتشاف وعرض مفصل غالبًا كافيان.'],
                ],
                'en' => [
                    ['q' => 'Is a local company better than a foreign one?', 'a' => 'Not always. What matters: market understanding, communication, and similar work. Some foreign firms have strong local teams.'],
                    ['q' => 'How do we compare proposals?', 'a' => 'Compare scope (included features), process, and references — not total price alone. A cheaper quote may exclude testing or support.'],
                    ['q' => 'Do we need a long RFP?', 'a' => 'Useful for large projects. For MVP, a discovery session and detailed proposal are often enough.'],
                ],
            ],
            'related_services' => ['custom-software-development', 'mobile-app-development'],
            'related_cases' => ['propcare', 'merchant'],
            'related_articles' => ['mobile-app-development-cost-saudi-arabia', 'erp-vs-custom-software'],
        ],

        'when-you-need-admin-dashboard' => [
            'title' => [
                'ar' => 'متى تحتاج Dashboard؟',
                'en' => 'When do you need an admin dashboard?',
            ],
            'excerpt' => [
                'ar' => 'تحتاج لوحة تحكم عندما تتفرق البيانات بين أنظمة متعددة، أو عندما الإدارة تعتمد على تقارير يدوية بطيئة — وليس مجرد «عرض أرقام».',
                'en' => 'You need an admin dashboard when data is scattered across systems, or when management relies on slow manual reports — not just to “display numbers.”',
            ],
            'meta_description' => [
                'ar' => 'متى تحتاج لوحة تحكم إدارية؟ علامات واضحة، الفرق بين Dashboard وERP، ومتى تبدأ بلوحة بسيطة قبل نظام كامل.',
                'en' => 'When do you need an admin dashboard? Clear signals, dashboard vs ERP, and when to start with a simple panel before a full system.',
            ],
            'content' => [
                'ar' => '<p>تحتاج لوحة تحكم إدارية عندما لا تجد البيانات التي تحتاجها في مكان واحد، أو عندما القرارات تتأخر لأن التقارير يدوية أو غير محدثة.</p>
<h2>علامات أنك تحتاج Dashboard</h2>
<p>الفرق يبحث في 3+ أنظمة للحصول على رقم واحد. الإدارة تطلب «تقرير Excel» أسبوعيًا. لا رؤية فورية للطلبات، المخزون، أو أداء الفريق. العملاء أو الموردين يتصلون للاستفسار عن حالة يجب أن تكون مرئية في النظام.</p>
<h2>Dashboard مقابل ERP كامل</h2>
<p>لوحة تحكم تركز على <strong>الرؤية والإجراء</strong> — KPIs، فلترة، تصدير. ERP يغطي العمليات الكاملة (مالية، مخزون، HR). كثير من الشركات تبدأ بلوحة مرتبطة بأنظمتها الحالية قبل بناء ERP.</p>
<h2>متى تبدأ بلوحة بسيطة؟</h2>
<p>عندما لديك APIs أو بيانات في قاعدة واحدة وتحتاج رؤية فقط — لوحة MVP في 6–10 أسابيع قد تكفي قبل توسيع النظام.</p>
<p><a href="/contact/">ناقش احتياجك معنا</a> أو <a href="/services/admin-dashboard-development/">اطلع على خدمة لوحات التحكم</a>.</p>',
                'en' => '<p>You need an admin dashboard when you cannot find the data you need in one place, or when decisions delay because reports are manual or outdated.</p>
<h2>Signs you need a dashboard</h2>
<p>Teams search 3+ systems for one number. Management requests a weekly “Excel report.” No live view of orders, inventory, or team performance. Customers or vendors call to ask about status that should be visible in the system.</p>
<h2>Dashboard vs full ERP</h2>
<p>A dashboard focuses on <strong>visibility and action</strong> — KPIs, filtering, export. ERP covers full operations (finance, inventory, HR). Many companies start with a dashboard connected to existing systems before building ERP.</p>
<h2>When to start with a simple panel</h2>
<p>When you have APIs or data in one database and need visibility only — an MVP dashboard in 6–10 weeks may suffice before expanding the system.</p>
<p><a href="/contact/">Discuss your needs with us</a> or <a href="/services/admin-dashboard-development/">explore our dashboard service</a>.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل Dashboard يحل محل Excel؟', 'a' => 'جزئيًا. يقلل الاعتماد على Excel للتقارير المتكررة، لكن قد يبقى Excel للتحليلات ad-hoc.'],
                    ['q' => 'هل البيانات محدثة فورًا؟', 'a' => 'نعم عند الحاجة. نستخدم تحديث مباشر أو جدولة وفق متطلباتك وبنية مصادر البيانات.'],
                    ['q' => 'كم تستغرق لوحة MVP؟', 'a' => 'عادة 6–10 أسابيع للوحة أساسية مع أهم المؤشرات والتقارير.'],
                ],
                'en' => [
                    ['q' => 'Does a dashboard replace Excel?', 'a' => 'Partially. It reduces reliance on Excel for recurring reports, but Excel may remain for ad-hoc analysis.'],
                    ['q' => 'Is data updated in real time?', 'a' => 'Yes when needed. We use live updates or scheduled sync per your requirements and data sources.'],
                    ['q' => 'How long does a dashboard MVP take?', 'a' => 'Typically 6–10 weeks for a core dashboard with key metrics and reports.'],
                ],
            ],
            'related_services' => ['admin-dashboard-development', 'web-platform-development'],
            'related_cases' => ['propcare', 'merchant'],
            'related_articles' => ['manual-process-to-digital-system', 'erp-vs-custom-software'],
        ],

        'manual-process-to-digital-system' => [
            'title' => [
                'ar' => 'تحويل العمليات اليدوية لنظام',
                'en' => 'From manual processes to a digital system',
            ],
            'excerpt' => [
                'ar' => 'تحويل العمليات اليدوية (Excel، WhatsApp، ورق) إلى نظام رقمي يبدأ بخريطة العمليات ونقاط الاختناق — وليس بشراء ERP جاهز دون تحليل.',
                'en' => 'Turning manual processes (Excel, WhatsApp, paper) into a digital system starts with an operations map and bottlenecks — not buying off-the-shelf ERP without analysis.',
            ],
            'meta_description' => [
                'ar' => 'كيف تحوّل العمليات اليدوية إلى نظام رقمي: خطوات التحول، اختيار البناء أو الشراء، وتجنب فشل التحول الرقمي.',
                'en' => 'How to turn manual processes into a digital system: transformation steps, build vs buy, and avoiding digital transformation failure.',
            ],
            'content' => [
                'ar' => '<p>التحول من عمليات يدوية إلى نظام رقمي ينجح عندما تبدأ بفهم «كيف يعمل العمل اليوم» — وليس بشراء برنامج وتأمل أن يتكيف الفريق معه.</p>
<h2>الخطوة الأولى: خريطة العمليات</h2>
<p>ارسم: من يفعل ماذا؟ أين البيانات؟ ما الذي يُنسخ يدويًا بين الأنظمة؟ أين الأخطاء المتكررة؟ هذه الخريطة تحدد ما يجب أتمتته أولًا.</p>
<h2>البناء مقابل الشراء</h2>
<p>إذا العمليات قياسية → ERP أو SaaS جاهز قد يكفي. إذا قواعد عملك فريدة أو تكاملات محلية معقدة → نظام مخصص أو ERP-lite مخصص يعطي عائدًا أفضل. راجع <a href="https://zatca.gov.sa" rel="noopener noreferrer" target="_blank">ZATCA</a> إذا الفوترة جزءًا من العملية.</p>
<h2>تجنب فشل التحول</h2>
<p>لا تحوّل كل شيء دفعة واحدة. ابدأ بوحدة واحدة (مثلاً الطلبات أو المخزون)، أطلق، تعلّم، ثم وسّع. تدريب الفريق جزءًا من المشروع — وليس «بعد الإطلاق».</p>
<p>لحماية البيانات في التحول، راجع <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a>. <a href="/contact/">ناقش تحولك معنا</a> أو <a href="/services/custom-software-development/">خدمة البرمجيات المخصصة</a>.</p>',
                'en' => '<p>Moving from manual processes to a digital system succeeds when you start by understanding “how work happens today” — not by buying software and hoping the team adapts.</p>
<h2>First step: operations map</h2>
<p>Map: who does what? Where is data? What is copied manually between systems? Where do errors repeat? This map defines what to automate first.</p>
<h2>Build vs buy</h2>
<p>If processes are standard → off-the-shelf ERP or SaaS may suffice. If your business rules are unique or local integrations are complex → custom or tailored ERP-lite often delivers better ROI. See <a href="https://zatca.gov.sa" rel="noopener noreferrer" target="_blank">ZATCA</a> if invoicing is part of the flow.</p>
<h2>Avoid transformation failure</h2>
<p>Do not digitize everything at once. Start with one module (e.g. orders or inventory), launch, learn, then expand. Team training is part of the project — not “after launch.”</p>
<p>For data protection during transformation, see <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a>. <a href="/contact/">Discuss your transformation with us</a> or <a href="/services/custom-software-development/">custom software service</a>.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'كم يستغرق التحول من Excel إلى نظام؟', 'a' => 'الوحدة الأولى عادة 10–16 أسبوعًا. التحول الكامل قد يمتد 6–12 شهرًا حسب عدد الوحدات.'],
                    ['q' => 'هل نستبدل Excel بالكامل؟', 'a' => 'غالبًا نبدأ بأتمتة العمليات المتكررة. Excel قد يبقى للتحليلات حتى يكتمل النظام.'],
                    ['q' => 'كيف نضمن تبني الفريق للنظام؟', 'a' => 'تدريب، واجهات بسيطة، وإشراك الفريق في التصميم — وليس إطلاق نظام معقد دون تدريب.'],
                ],
                'en' => [
                    ['q' => 'How long does Excel-to-system transformation take?', 'a' => 'First module typically 10–16 weeks. Full transformation may span 6–12 months depending on modules.'],
                    ['q' => 'Do we replace Excel completely?', 'a' => 'We usually start by automating repetitive processes. Excel may remain for analysis until the system is complete.'],
                    ['q' => 'How do we ensure team adoption?', 'a' => 'Training, simple interfaces, and involving the team in design — not launching a complex system without training.'],
                ],
            ],
            'related_services' => ['custom-software-development', 'erp-business-systems'],
            'related_cases' => ['supply-chain-erp', 'backway'],
            'related_articles' => ['erp-vs-custom-software', 'when-you-need-admin-dashboard'],
        ],

        'saudi-app-launch-requirements' => [
            'title' => [
                'ar' => 'متطلبات إطلاق تطبيق في السعودية',
                'en' => 'Saudi app launch requirements',
            ],
            'excerpt' => [
                'ar' => 'إطلاق تطبيق في السعودية يتطلب الامتثال لنظام حماية البيانات (PDPL)، بوابات دفع محلية، ومتطلبات المتاجر — بالإضافة إلى الجوانب التقنية للإطلاق.',
                'en' => 'Launching an app in Saudi Arabia requires PDPL compliance, local payment gateways, and store requirements — plus technical launch readiness.',
            ],
            'meta_description' => [
                'ar' => 'دليل متطلبات إطلاق تطبيق في السعودية: PDPL، الدفع المحلي، متاجر Apple وGoogle، والخطوات التقنية قبل الإطلاق.',
                'en' => 'Saudi app launch requirements guide: PDPL, local payments, Apple and Google stores, and technical steps before launch.',
            ],
            'content' => [
                'ar' => '<p>إطلاق تطبيق تجاري في السعودية يتطلب أكثر من رفع الملف على المتجر: الامتثال لنظام حماية البيانات الشخصية (PDPL)، بوابات دفع محلية عند الحاجة، ومتطلبات Apple وGoogle.</p>
<h2>نظام حماية البيانات (PDPL)</h2>
<p>تطبيقات تجمع بيانات مستخدمين (حسابات، موقع، دفع) يجب أن تلتزم بـ PDPL. راجع <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> للوائح والإرشادات. يتضمن ذلك: إشعار موافقة، حقوق المستخدم، وإجراءات عند خرق البيانات.</p>
<h2>الدفع المحلي</h2>
<p>للتطبيقات التي تقبل الدفع في المملكة، التكامل مع بوابات محلية (Mada، HyperPay، Moyasar، Tap) غالبًا مطلوبًا لتجربة مستخدم سلسة. راجع <a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a> للسياق التنظيمي للخدمات الرقمية.</p>
<h2>متاجر التطبيقات</h2>
<p>Apple وGoogle لها متطلبات محتوى، خصوصية، ودفع. راجع <a href="https://developer.apple.com/app-store/review/guidelines/" rel="noopener noreferrer" target="_blank">App Store Guidelines</a> و<a href="https://support.google.com/googleplay/android-developer/answer/9859751" rel="noopener noreferrer" target="_blank">Google Play policies</a>. التحضير المسبق يقلل الرفض والتأخير.</p>
<p><a href="/contact/">ناقش إطلاق تطبيقك معنا</a> — نساعدك على التحضير التقني والامتثالي.</p>',
                'en' => '<p>Launching a commercial app in Saudi Arabia requires more than uploading a build to the store: PDPL compliance, local payment gateways when needed, and Apple/Google requirements.</p>
<h2>Personal Data Protection Law (PDPL)</h2>
<p>Apps that collect user data (accounts, location, payments) must comply with PDPL. See <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> for regulations and guidance. This includes consent notices, user rights, and breach procedures.</p>
<h2>Local payments</h2>
<p>For apps accepting payment in the Kingdom, integration with local gateways (Mada, HyperPay, Moyasar, Tap) is often required for a smooth user experience. See <a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a> for regulatory context on digital services.</p>
<h2>App stores</h2>
<p>Apple and Google have content, privacy, and payment requirements. See <a href="https://developer.apple.com/app-store/review/guidelines/" rel="noopener noreferrer" target="_blank">App Store Guidelines</a> and <a href="https://support.google.com/googleplay/android-developer/answer/9859751" rel="noopener noreferrer" target="_blank">Google Play policies</a>. Upfront preparation reduces rejection and delay.</p>
<p><a href="/contact/">Discuss your app launch with us</a> — we help with technical and compliance readiness.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل PDPL يطبق على كل التطبيقات؟', 'a' => 'يطبق على التطبيقات التي تجمع أو تعالج بيانات شخصية. تطبيقات بدون حسابات أو بيانات حساسة قد يكون نطاقها أقل — راجع SDAIA.'],
                    ['q' => 'هل يجب دعم Mada؟', 'a' => 'للتطبيقات التجارية في السعودية، دعم Mada/بوابات محلية يحسّن التحويل. ليس قانونًا إلزاميًا لكل تطبيق لكنه ممارسة شائعة.'],
                    ['q' => 'كم يستغرق مراجعة المتجر؟', 'a' => 'عادة 24–48 ساعة للمراجعة الأولى. الرفض والتعديل يطيلان الإطلاق — نحضّر المتطلبات مسبقًا.'],
                ],
                'en' => [
                    ['q' => 'Does PDPL apply to all apps?', 'a' => 'It applies to apps that collect or process personal data. Apps without accounts or sensitive data may have a narrower scope — see SDAIA.'],
                    ['q' => 'Must we support Mada?', 'a' => 'For commercial apps in Saudi Arabia, Mada/local gateways improve conversion. Not legally mandatory for every app but common practice.'],
                    ['q' => 'How long does store review take?', 'a' => 'Usually 24–48 hours for initial review. Rejection and fixes extend launch — we prepare requirements upfront.'],
                ],
            ],
            'related_services' => ['mobile-app-development', 'grc-compliance-systems'],
            'related_cases' => ['lahza', 'merchant'],
            'related_articles' => ['mobile-app-development-timeline', 'what-is-grc'],
        ],

        'what-is-grc' => [
            'title' => [
                'ar' => 'ما هو GRC؟',
                'en' => 'What is GRC?',
            ],
            'excerpt' => [
                'ar' => 'GRC (الحوكمة، المخاطر، والامتثال) هو إطار لإدارة الالتزام التنظيمي والمخاطر والتدقيق — وليس مجرد «ملفات Excel للامتثال».',
                'en' => 'GRC (Governance, Risk, and Compliance) is a framework for regulatory compliance, risk, and audit management — not just “Excel files for compliance.”',
            ],
            'meta_description' => [
                'ar' => 'ما هو GRC؟ شرح الحوكمة والمخاطر والامتثال، لماذا تحتاجه الشركات في السعودية، وكيف يساعد نظام GRC على التدقيق والامتثال.',
                'en' => 'What is GRC? Explanation of governance, risk, and compliance, why Saudi companies need it, and how a GRC system supports audit and compliance.',
            ],
            'content' => [
                'ar' => '<p>GRC يعني الحوكمة (Governance)، المخاطر (Risk)، والامتثال (Compliance) — إطار لإدارة كيف تلتزم المؤسسة باللوائح، تتعامل مع المخاطر، وتُثبت ذلك عند التدقيق.</p>
<h2>لماذا تحتاج الشركات GRC؟</h2>
<p>في قطاعات منظّمة أو عند التعامل مع بيانات حساسة، الامتثال ليس اختياريًا. PDPL، متطلبات قطاعية، وتدقيق داخلي/خارجي يتطلب سجلات واضحة ومسارات موافقة — وليس مجرد ملفات ورسائل.</p>
<h2>ما الذي يوفره نظام GRC؟</h2>
<p>سجل مخاطر، تقييمات، مسارات موافقة واستثناءات، إدارة سياسات، خطط تدقيق، تقارير امتثال، وسجل تدقيق كامل للنشاط. يربط الامتثال مع العمليات اليومية.</p>
<h2>GRC والبيانات في السعودية</h2>
<p>راجع <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> لنظام حماية البيانات و<a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a> للسياق التنظيمي للخدمات الرقمية.</p>
<p><a href="/contact/">ناقش احتياجك من GRC معنا</a> أو <a href="/services/grc-compliance-systems/">اطلع على خدمة أنظمة GRC</a>.</p>',
                'en' => '<p>GRC stands for Governance, Risk, and Compliance — a framework for how an organization meets regulations, manages risk, and proves it during audit.</p>
<h2>Why do companies need GRC?</h2>
<p>In regulated sectors or when handling sensitive data, compliance is not optional. PDPL, sector requirements, and internal/external audit require clear records and approval workflows — not just files and email.</p>
<h2>What does a GRC system provide?</h2>
<p>Risk register, assessments, approval and exception workflows, policy management, audit plans, compliance reports, and a full activity audit trail. It links compliance to daily operations.</p>
<h2>GRC and data in Saudi Arabia</h2>
<p>See <a href="https://sdaia.gov.sa" rel="noopener noreferrer" target="_blank">SDAIA</a> for data protection and <a href="https://cst.gov.sa" rel="noopener noreferrer" target="_blank">CST</a> for digital services regulatory context.</p>
<p><a href="/contact/">Discuss your GRC needs with us</a> or <a href="/services/grc-compliance-systems/">explore our GRC systems service</a>.</p>',
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل GRC مناسب لشركتنا الصغيرة؟', 'a' => 'يعتمد على القطاع والبيانات. شركات تتعامل مع بيانات حساسة أو قطاع منظّم تستفيد حتى بـ GRC-lite مخصص.'],
                    ['q' => 'ما الفرق بين GRC وERP؟', 'a' => 'ERP يدير العمليات (مالية، مخزون). GRC يدير الامتثال والمخاطر والتدقيق — وغالبًا يتكامل مع ERP.'],
                    ['q' => 'كم يستغرق نظام GRC MVP؟', 'a' => 'عادة 12–18 أسبوعًا حسب عدد الوحدات والتكاملات مع أنظمتك الحالية.'],
                ],
                'en' => [
                    ['q' => 'Is GRC suitable for our small company?', 'a' => 'Depends on sector and data. Companies handling sensitive data or in regulated sectors benefit even from tailored GRC-lite.'],
                    ['q' => 'What is the difference between GRC and ERP?', 'a' => 'ERP manages operations (finance, inventory). GRC manages compliance, risk, and audit — often integrated with ERP.'],
                    ['q' => 'How long does a GRC MVP take?', 'a' => 'Typically 12–18 weeks depending on modules and integrations with your existing systems.'],
                ],
            ],
            'related_services' => ['grc-compliance-systems', 'erp-business-systems'],
            'related_cases' => ['supply-chain-erp'],
            'related_articles' => ['saudi-app-launch-requirements', 'erp-vs-custom-software'],
        ],
    ];
}

function st_article_config(string $slug): ?array
{
    $config = st_article_landing_config();
    $slug = sanitize_title($slug);

    if (isset($config[$slug])) {
        return $config[$slug];
    }

    // Common aliases / older WP slugs → canonical landing keys.
    $aliases = [
        'custom-vs-ready-made' => 'erp-vs-custom-software',
        'custom-or-off-the-shelf' => 'erp-vs-custom-software',
        'build-vs-buy' => 'erp-vs-custom-software',
        'erp-vs-custom' => 'erp-vs-custom-software',
    ];

    if (isset($aliases[$slug]) && isset($config[$aliases[$slug]])) {
        return $config[$aliases[$slug]];
    }

    return null;
}

/**
 * Split article HTML from embedded CSS / JSON-LD so they don't show as visible text.
 * Writers add per-article CSS via Custom HTML (HTML/CSS/JS) blocks; some posts
 * also embed Schema.org JSON-LD that must stay in <script>, not the body.
 *
 * @return array{html:string,css:string,json_ld:list<string>}
 */
function st_prepare_article_content(string $html): array
{
    $css_chunks = [];
    $json_ld = [];

    if ($html === '') {
        return ['html' => '', 'css' => '', 'json_ld' => []];
    }

    // 0) Pull out JSON-LD <script> blocks (SEO schema — not visible content).
    if (preg_match_all('#<script\b[^>]*type=(["\'])application/ld\+json\1[^>]*>(.*?)</script>#is', $html, $matches)) {
        foreach ($matches[2] as $chunk) {
            $chunk = trim(html_entity_decode((string) $chunk, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            if ($chunk !== '') {
                $json_ld[] = $chunk;
            }
        }
        $html = (string) preg_replace('#<script\b[^>]*type=(["\'])application/ld\+json\1[^>]*>.*?</script>#is', '', $html);
    }

    // Drop any other scripts from the article body (never execute writer JS inline here).
    $html = (string) preg_replace('#<script\b[^>]*>.*?</script>#is', '', $html);

    // 1) Pull out real <style>…</style> blocks (keep their CSS).
    if (preg_match_all('#<style\b[^>]*>(.*?)</style>#is', $html, $matches)) {
        foreach ($matches[1] as $chunk) {
            $chunk = trim((string) $chunk);
            if ($chunk !== '') {
                $css_chunks[] = $chunk;
            }
        }
        $html = (string) preg_replace('#<style\b[^>]*>.*?</style>#is', '', $html);
    }

    // 2) Raw CSS dumped as visible text (tags stripped by editor/kses, or CSS tab paste).
    $text_start = ltrim(wp_strip_all_tags($html));
    $looks_like_leading_css = (bool) (
        preg_match('#^@import\b#i', $text_start)
        || preg_match('#^\.[a-z][\w-]*\s*\{#i', $text_start)
        || preg_match('#^/\*[\s\S]*?\*/\s*\.[a-z]#i', $text_start)
    );

    if ($looks_like_leading_css) {
        $html_start = null;
        if (preg_match('#<(?:h[1-6]|p|div|article|section|ul|ol|blockquote|figure|table|img|a)\b#i', $html, $m, PREG_OFFSET_CAPTURE)) {
            $html_start = (int) $m[0][1];
        }

        if ($html_start !== null && $html_start > 0) {
            $raw_css = trim(wp_strip_all_tags(substr($html, 0, $html_start)));
            if ($raw_css !== '') {
                $css_chunks[] = $raw_css;
            }
            $html = substr($html, $html_start);
        } elseif (!preg_match('#<(?:h[1-6]|div|article|section|ul|ol|blockquote|figure|table)\b#i', $html)) {
            $raw_css = trim(wp_strip_all_tags($html));
            if ($raw_css !== '') {
                $css_chunks[] = $raw_css;
            }
            $html = '';
        }
    }

    // 3) Leaked JSON-LD as visible text (script tags stripped, JSON left behind).
    [$html, $leaked] = st_strip_leaked_json_ld($html);
    foreach ($leaked as $block) {
        $json_ld[] = $block;
    }

    return [
        'html'    => trim($html),
        'css'     => trim(implode("\n\n", $css_chunks)),
        'json_ld' => array_values(array_filter($json_ld)),
    ];
}

/**
 * Remove schema.org JSON blobs that leaked into visible article HTML.
 *
 * @return array{0:string,1:list<string>}
 */
function st_strip_leaked_json_ld(string $html): array
{
    $blocks = [];

    if ($html === '' || (!str_contains($html, '@context') && !str_contains($html, 'schema.org'))) {
        return [$html, $blocks];
    }

    // Remove <p>…JSON…</p> wrappers first.
    $html = (string) preg_replace_callback(
        '#<p\b[^>]*>\s*(\{[\s\S]*?"@context"\s*:\s*"https?://schema\.org"[\s\S]*?\})\s*</p>#iu',
        static function (array $m) use (&$blocks): string {
            $plain = trim(html_entity_decode(wp_strip_all_tags($m[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $decoded = json_decode($plain, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $blocks[] = wp_json_encode($decoded, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                return '';
            }
            // Still looks like schema — drop from visible body.
            if (str_contains($plain, 'schema.org')) {
                $blocks[] = $plain;
                return '';
            }
            return $m[0];
        },
        $html
    );

    // Trailing raw JSON after real content (common after kses strips <script>).
    $pos = stripos($html, '"@context"');
    if ($pos === false) {
        $pos = stripos($html, 'schema.org');
    }
    if ($pos !== false) {
        $start = strrpos(substr($html, 0, $pos), '{');
        if ($start !== false) {
            $tail = substr($html, $start);
            $plain = trim(html_entity_decode(wp_strip_all_tags($tail), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            if (str_starts_with($plain, '{') && str_contains($plain, 'schema.org')) {
                $decoded = json_decode($plain, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $blocks[] = wp_json_encode($decoded, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                } else {
                    // Malformed/truncated JSON — still hide from readers.
                    $blocks[] = $plain;
                }
                $html = rtrim(substr($html, 0, $start));
            }
        }
    }

    return [$html, $blocks];
}

/** @deprecated Use st_prepare_article_content(); kept for callers that only need HTML. */
function st_clean_article_html(string $html): string
{
    return st_prepare_article_content($html)['html'];
}

/**
 * Allow safe inline article CSS (writers' per-post stylesheets).
 */
function st_sanitize_article_css(string $css): string
{
    $css = wp_check_invalid_utf8($css);
    // Prevent breaking out of the style element / injecting scripts.
    $css = (string) preg_replace('#</\s*style#i', '', $css);
    $css = (string) preg_replace('#<\s*script#i', '', $css);
    $css = (string) preg_replace('#expression\s*\(#i', '', $css);
    $css = (string) preg_replace('#@import\s+url\s*\(\s*["\']?\s*javascript:#i', '', $css);

    return trim($css);
}

/**
 * True when WP post body is a theme shell (content comes from article-landings.php).
 */
function st_article_post_is_theme_shell(?int $post_id = null): bool
{
    $raw = (string) get_post_field('post_content', $post_id ?: get_the_ID());
    $plain = trim(wp_strip_all_tags($raw));

    if ($plain === '') {
        return true;
    }

    return str_contains($raw, 'Content rendered from article-landings.php');
}

/**
 * @return string|array
 */
function st_article_text(array $field, string $locale = ''): string|array
{
    if ($locale === '') {
        $locale = function_exists('st_locale') ? st_locale() : 'ar';
    }

    if (isset($field[$locale])) {
        return $field[$locale];
    }

    if (isset($field['ar'])) {
        return $field['ar'];
    }

    if (isset($field['en'])) {
        return $field['en'];
    }

    return is_array($field) ? [] : '';
}

function st_article_permalink(string $slug): string
{
    $post = st_find_published_post($slug);
    if ($post instanceof WP_Post) {
        return (string) get_permalink($post);
    }

    $meta = st_published_article_meta($slug);
    if ($meta !== null) {
        if (function_exists('st_localized_url')) {
            return st_localized_url('/' . trim($slug, '/') . '/');
        }
        return home_url('/' . trim($slug, '/') . '/');
    }

    $post = get_page_by_path($slug, OBJECT, 'post');
    if ($post instanceof WP_Post) {
        return (string) get_permalink($post);
    }

    if (function_exists('st_url')) {
        return st_url('/' . $slug . '/');
    }

    return home_url('/' . $slug . '/');
}

/**
 * Real published articles on spinestech.com (used on home + case study related links).
 *
 * @return list<string>
 */
function st_featured_published_article_slugs(): array
{
    return [
        'software-project-cost-time-estimation',
        'technology-investment-roi',
        'technology-partner-contract-sla-handover',
        'مشروعك-البرمجي-متعثر؟-متى-تصلحه-ومتى-ت',
    ];
}

/**
 * @return array{title:array{ar:string,en:string},excerpt:array{ar:string,en:string}}|null
 */
function st_published_article_meta(string $slug): ?array
{
    $catalog = [
        'software-project-cost-time-estimation' => [
            'title' => [
                'ar' => 'كيف تُقدّر تكلفة ومدة المشروع البرمجي قبل طلب عرض السعر؟',
                'en' => 'How to estimate software project cost and timeline before requesting a quote',
            ],
            'excerpt' => [
                'ar' => 'التقدير الجيد ليس رقمًا سريعًا؛ هو نموذج يربط النطاق بالجهد والفريق والاعتماديات والاختبارات والمخاطر والجدول.',
                'en' => 'A solid estimate is not a quick number — it links scope to effort, team capacity, dependencies, QA, risk, and schedule.',
            ],
        ],
        'technology-investment-roi' => [
            'title' => [
                'ar' => 'كيف تحسب العائد على الاستثمار التقني قبل طلب ميزانية المشروع؟',
                'en' => 'How to calculate technology investment ROI before requesting project budget',
            ],
            'excerpt' => [
                'ar' => 'Business Case يبدأ من المشكلة وخط الأساس والتكلفة الكاملة، ثم المنافع القابلة للقياس — وليس من جملة «نحتاج تطبيقًا».',
                'en' => 'A real business case starts from the problem, baseline, and full cost — then measurable benefits — not from “we need an app.”',
            ],
        ],
        'technology-partner-contract-sla-handover' => [
            'title' => [
                'ar' => 'كيف تدير الشريك التقني؟ ما الذي يجب أن تحسمه في العقد وSLA والتسليم؟',
                'en' => 'How to manage a technology partner: contract, SLA, and handover',
            ],
            'excerpt' => [
                'ar' => 'اختيار شركة البرمجة لا ينتهي عند السعر؛ حسم النطاق والقبول والملكية وSLA والتسليم يمنع أغلب الخلافات لاحقًا.',
                'en' => 'Choosing a vendor does not end at price — clarify scope, acceptance, ownership, SLA, and handover to prevent later disputes.',
            ],
        ],
        'مشروعك-البرمجي-متعثر؟-متى-تصلحه-ومتى-ت' => [
            'title' => [
                'ar' => 'مشروعك البرمجي متعثر؟ متى تصلحه ومتى تعيد بناءه من الصفر؟',
                'en' => 'Is your software project stuck? When to fix it and when to rebuild',
            ],
            'excerpt' => [
                'ar' => 'قبل Full Rewrite: شخّص نوع التعثر، افحص الـTechnical Audit، وقارن Fix وRefactor وإعادة البناء الجزئي.',
                'en' => 'Before a full rewrite: diagnose the failure mode, run a technical audit, and compare fix, refactor, and partial rebuild paths.',
            ],
        ],
    ];

    return $catalog[$slug] ?? null;
}

function st_find_published_post(string $slug): ?WP_Post
{
    $candidates = [$slug];

    // WordPress sometimes strips Arabic punctuation from slugs.
    $normalized = str_replace(['؟', '?'], '', $slug);
    if ($normalized !== $slug) {
        $candidates[] = $normalized;
        $candidates[] = str_replace('؟', '', $slug);
    }

    foreach ($candidates as $candidate) {
        $post = get_page_by_path($candidate, OBJECT, 'post');
        if ($post instanceof WP_Post && $post->post_status === 'publish') {
            return $post;
        }
    }

    // Last resort: match by path ending (handles encoded Arabic URLs).
    $q = new WP_Query([
        'post_type'              => 'post',
        'post_status'            => 'publish',
        'name'                   => sanitize_title($slug),
        'posts_per_page'         => 1,
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
    ]);
    if (!empty($q->posts[0]) && $q->posts[0] instanceof WP_Post) {
        return $q->posts[0];
    }

    return null;
}

/** @return array<int, array{slug:string,title:string,excerpt:string,url:string}> */
function st_home_featured_articles(int $limit = 4): array
{
    if ($limit < 1) {
        return [];
    }

    $locale = function_exists('st_locale') ? st_locale() : 'ar';
    $slugs = array_slice(st_featured_published_article_slugs(), 0, $limit);
    $items = [];

    foreach ($slugs as $slug) {
        $post = st_find_published_post($slug);
        $meta = st_published_article_meta($slug);

        $title = '';
        $excerpt = '';
        $url = '';

        if ($post instanceof WP_Post) {
            $title = (string) get_the_title($post);
            $excerpt = trim((string) get_post_field('post_excerpt', $post));
            if ($excerpt === '') {
                $excerpt = wp_trim_words(wp_strip_all_tags((string) get_post_field('post_content', $post)), 28);
            }
            // Prefer curated copy when WP body is polluted with CSS dumps.
            if ($meta !== null && (str_contains($excerpt, '@import') || str_contains($excerpt, '.zt-') || strlen($excerpt) < 20)) {
                $excerpt = (string) st_article_text($meta['excerpt'], $locale);
            }
            if ($meta !== null && $title === '') {
                $title = (string) st_article_text($meta['title'], $locale);
            }
            $url = (string) get_permalink($post);
        } elseif ($meta !== null) {
            $title = (string) st_article_text($meta['title'], $locale);
            $excerpt = (string) st_article_text($meta['excerpt'], $locale);
            $url = st_article_permalink($slug);
        } else {
            continue;
        }

        // Locale-aware curated titles when English UI is active.
        if ($locale === 'en' && $meta !== null) {
            $title = (string) st_article_text($meta['title'], 'en');
            $excerpt = (string) st_article_text($meta['excerpt'], 'en');
        } elseif ($locale === 'ar' && $meta !== null && $post instanceof WP_Post) {
            // Keep live Arabic titles from WP when available; always use curated excerpt if cleaner.
            $curated_excerpt = (string) st_article_text($meta['excerpt'], 'ar');
            if ($curated_excerpt !== '') {
                $excerpt = $curated_excerpt;
            }
        }

        $items[] = [
            'slug'    => $slug,
            'title'   => $title,
            'excerpt' => $excerpt,
            'url'     => $url,
        ];
    }

    return $items;
}

/** @return array{related_services:array<int,string>,related_cases:array<int,string>,related_articles:array<int,string>} */
function st_get_article_related(string $slug): array
{
    $config = st_article_config($slug);
    if ($config === null) {
        return [
            'related_services' => [],
            'related_cases'    => [],
            'related_articles' => [],
        ];
    }

    return [
        'related_services' => $config['related_services'] ?? [],
        'related_cases'    => $config['related_cases'] ?? [],
        'related_articles' => $config['related_articles'] ?? [],
    ];
}
