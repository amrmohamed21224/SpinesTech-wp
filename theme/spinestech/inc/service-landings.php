<?php
declare(strict_types=1);

/**
 * Service landing page content and helpers.
 * Canonical copy for all st_service singular landings (ar/en).
 */

if (!defined('ABSPATH')) {
    exit;
}

function st_service_slugs(): array
{
    return [
        'mobile-app-development',
        'web-platform-development',
        'custom-software-development',
        'admin-dashboard-development',
        'marketplace-development',
        'booking-platform-development',
        'erp-business-systems',
        'grc-compliance-systems',
        'white-label-software-development',
    ];
}

function st_service_landing_config(): array
{
    return [
        'mobile-app-development' => [
            'title' => [
                'ar' => 'تطوير تطبيقات الجوال',
                'en' => 'Mobile App Development',
            ],
            'meta_title' => [
                'ar' => 'تطوير تطبيقات الجوال للشركات | SpinesTech',
                'en' => 'Mobile App Development for Businesses | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نطوّر تطبيقات iOS و Android أصلية ومتعددة المنصات للشركات في الخليج — من MVP إلى إطلاق المتاجر مع أداء عالٍ وتجربة مستخدم مصقولة.',
                'en' => 'We build native and cross-platform iOS and Android apps for GCC companies — from MVP to store launch with high performance and polished UX.',
            ],
            'intro' => [
                'ar' => 'نصمّم ونطوّر تطبيقات جوال تربط عملاءك بخدماتك في أي وقت — بتجربة سلسة، أداء موثوق، وتكامل مع أنظمتك الحالية.',
                'en' => 'We design and build mobile apps that connect your customers to your services anytime — with smooth UX, reliable performance, and integration with your existing systems.',
            ],
            'problem' => [
                'ar' => 'كثير من الشركات تعتمد على مواقع أو عمليات يدوية لا تلبي توقعات المستخدم في الخليج: بطء، تجربة غير متسقة، وصعوبة التوسع. بدون تطبيق جوال مصمّم للسوق المحلي، تفقد فرص الاحتفاظ بالعملاء والنمو الرقمي.',
                'en' => 'Many companies still rely on websites or manual workflows that fail GCC user expectations: slow experiences, inconsistent journeys, and poor scalability. Without a market-ready mobile app, you lose retention and digital growth opportunities.',
            ],
            'audience' => [
                'ar' => [
                    'شركات ناشئة تبحث عن MVP سريع للاختبار في السوق',
                    'مؤسسات لديها API جاهز وتحتاج تطبيق جوال احترافي',
                    'شركات خدمات ولوجستيات وتجارة إلكترونية في الخليج',
                    'فرق تقنية تحتاج شريك تنفيذ لتسريع الإطلاق',
                ],
                'en' => [
                    'Startups seeking a fast MVP to validate the market',
                    'Enterprises with a ready API needing a polished mobile client',
                    'Service, logistics, and e-commerce companies in the GCC',
                    'Tech teams needing an execution partner to accelerate launch',
                ],
            ],
            'scope' => [
                'ar' => [
                    'تحليل المتطلبات ورسم User Flows',
                    'تصميم UI/UX متوافق مع iOS و Android',
                    'تطوير Native (Swift/Kotlin) أو Cross-platform (Flutter)',
                    'تكامل API، إشعارات Push، والخرائط',
                    'اختبار الجودة والأمان قبل الإطلاق',
                    'رفع التطبيق على App Store و Google Play',
                ],
                'en' => [
                    'Requirements analysis and user flow mapping',
                    'UI/UX design aligned with iOS and Android patterns',
                    'Native (Swift/Kotlin) or cross-platform (Flutter) development',
                    'API integration, push notifications, and maps',
                    'Quality and security testing before launch',
                    'App Store and Google Play submission support',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'تسجيل دخول آمن وإدارة الحسابات',
                    'إشعارات فورية وتتبع مباشر',
                    'دفع إلكتروني ومحافظ رقمية',
                    'دعم RTL واللغة العربية',
                    'تحليلات الاستخدام ولوحات الأداء',
                ],
                'en' => [
                    'Secure authentication and account management',
                    'Real-time notifications and live tracking',
                    'Digital payments and wallet integration',
                    'RTL and Arabic language support',
                    'Usage analytics and performance dashboards',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'اكتشاف المنتج', 'desc' => 'نحدد أهداف التطبيق، الجمهور، والميزات الأساسية للإصدار الأول.'],
                    ['title' => 'التصميم والنماذج', 'desc' => 'نبني واجهات تفاعلية ونماذج أولية للتحقق قبل البرمجة.'],
                    ['title' => 'التطوير والتكامل', 'desc' => 'ننفّذ الميزات ونربط الأنظمة الخلفية والخدمات الخارجية.'],
                    ['title' => 'الاختبار والإطلاق', 'desc' => 'نختبر على أجهزة حقيقية ونطلق على المتاجر مع دعم ما بعد الإطلاق.'],
                ],
                'en' => [
                    ['title' => 'Product discovery', 'desc' => 'We define app goals, audience, and core features for the first release.'],
                    ['title' => 'Design & prototypes', 'desc' => 'We build interactive UI and prototypes to validate before coding.'],
                    ['title' => 'Development & integration', 'desc' => 'We implement features and connect backends and third-party services.'],
                    ['title' => 'Testing & launch', 'desc' => 'We test on real devices and publish to stores with post-launch support.'],
                ],
            ],
            'stack' => [
                'ar' => ['Flutter', 'Swift', 'Kotlin', 'React Native', 'Firebase', 'REST APIs'],
                'en' => ['Flutter', 'Swift', 'Kotlin', 'React Native', 'Firebase', 'REST APIs'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'كم يستغرق تطوير تطبيق MVP؟', 'a' => 'عادة بين 8 و14 أسبوعًا حسب عدد الميزات والتكاملات. نحدد نطاقًا واضحًا في مرحلة الاكتشاف لتسريع الإطلاق.'],
                    ['q' => 'Flutter أم Native؟', 'a' => 'Native مثالي لأقصى أداء وتجربة منصة كاملة. Flutter خيار قوي لتطبيق واحد على iOS و Android بتكلفة ووقت أقل — نختار وفق متطلباتك.'],
                    ['q' => 'هل تدعمون التطبيق بعد الإطلاق؟', 'a' => 'نعم. نقدم فترة ضمان، صيانة، وتحديثات وفق عقد دعم تشغيلي بعد الإطلاق.'],
                    ['q' => 'هل يمكن ربط التطبيق مع نظامنا الحالي؟', 'a' => 'نعم. نربط التطبيق مع APIs، ERP، بوابات دفع، وأنظمة CRM الموجودة لديك.'],
                ],
                'en' => [
                    ['q' => 'How long does an MVP app take?', 'a' => 'Typically 8–14 weeks depending on features and integrations. We define a clear scope during discovery to accelerate launch.'],
                    ['q' => 'Flutter or native?', 'a' => 'Native is ideal for maximum performance and platform UX. Flutter is strong for one codebase on iOS and Android with lower cost — we choose based on your requirements.'],
                    ['q' => 'Do you support the app after launch?', 'a' => 'Yes. We provide a warranty period, maintenance, and updates under an operational support agreement.'],
                    ['q' => 'Can you connect to our existing system?', 'a' => 'Yes. We integrate with your APIs, ERP, payment gateways, and CRM systems.'],
                ],
            ],
            'icon' => 'smartphone',
            'hub_anchor' => 'mobile-apps',
        ],

        'web-platform-development' => [
            'title' => [
                'ar' => 'تطوير منصات الويب',
                'en' => 'Web Platform Development',
            ],
            'meta_title' => [
                'ar' => 'تطوير منصات ويب للشركات | SpinesTech',
                'en' => 'Web Platform Development for Businesses | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نبني منصات ويب تفاعلية وقابلة للتوسع للشركات في الخليج — SaaS، بوابات عملاء، ومنصات B2B بأداء عالٍ وهندسة نظيفة.',
                'en' => 'We build interactive, scalable web platforms for GCC companies — SaaS, client portals, and B2B platforms with high performance and clean architecture.',
            ],
            'intro' => [
                'ar' => 'نطوّر منصات ويب حديثة تخدم مستخدمين متعددين — بواجهات سريعة، بنية قابلة للتوسع، وتجربة متسقة على جميع الأجهزة.',
                'en' => 'We build modern web platforms that serve thousands of users — fast interfaces, scalable architecture, and consistent experiences across devices.',
            ],
            'problem' => [
                'ar' => 'المواقع التقليدية أو الأنظمة القديمة لا تدعم نماذج عمل معقدة: اشتراكات، صلاحيات متعددة، أو تدفقات تشغيلية متزامنة. النتيجة: بطء، أخطاء تشغيلية، وصعوبة إضافة ميزات جديدة.',
                'en' => 'Traditional websites or legacy systems cannot support complex business models: subscriptions, multi-role access, or real-time operational flows. The result is slowness, operational errors, and painful feature delivery.',
            ],
            'audience' => [
                'ar' => [
                    'شركات B2B و SaaS في الخليج',
                    'مؤسسات تحتاج بوابات عملاء أو شركاء',
                    'فرق منتج تبحث عن منصة قابلة للتوسع',
                    'شركات تستبدل أنظمة legacy بمنصة حديثة',
                ],
                'en' => [
                    'B2B and SaaS companies in the GCC',
                    'Organizations needing client or partner portals',
                    'Product teams seeking a scalable platform foundation',
                    'Companies replacing legacy systems with a modern stack',
                ],
            ],
            'scope' => [
                'ar' => [
                    'هندسة المنصة واختيار التقنيات',
                    'تصميم وتطوير الواجهات الأمامية',
                    'بناء APIs وخدمات خلفية',
                    'إدارة المستخدمين والصلاحيات',
                    'تكامل بوابات الدفع والخدمات الخارجية',
                    'نشر سحابي ومراقبة الأداء',
                ],
                'en' => [
                    'Platform architecture and technology selection',
                    'Frontend design and development',
                    'API and backend service development',
                    'User management and role-based access',
                    'Payment gateway and third-party integrations',
                    'Cloud deployment and performance monitoring',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'لوحات تحكم متعددة الأدوار',
                    'اشتراكات وفوترة إلكترونية',
                    'بحث وفلترة متقدمة',
                    'تقارير وتحليلات مباشرة',
                    'دعم متعدد اللغات و RTL',
                ],
                'en' => [
                    'Multi-role admin dashboards',
                    'Subscriptions and e-invoicing',
                    'Advanced search and filtering',
                    'Live reports and analytics',
                    'Multilingual and RTL support',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'تحليل النطاق', 'desc' => 'نحدد نموذج العمل، المستخدمين، والتدفقات الحرجة للمنصة.'],
                    ['title' => 'الهندسة والتصميم', 'desc' => 'نصمّم البنية التقنية والواجهات قبل البناء.'],
                    ['title' => 'التطوير التكراري', 'desc' => 'ننفّذ بنظام Sprints مع عروض أسبوعية ومراجعات مستمرة.'],
                    ['title' => 'الإطلاق والتوسع', 'desc' => 'ننشر على بيئة إنتاج آمنة ونجهّز المنصة للنمو.'],
                ],
                'en' => [
                    ['title' => 'Scope analysis', 'desc' => 'We define the business model, users, and critical platform flows.'],
                    ['title' => 'Architecture & design', 'desc' => 'We design technical architecture and interfaces before build.'],
                    ['title' => 'Iterative development', 'desc' => 'We deliver in sprints with weekly demos and continuous review.'],
                    ['title' => 'Launch & scale', 'desc' => 'We deploy to a secure production environment and prepare for growth.'],
                ],
            ],
            'stack' => [
                'ar' => ['Next.js', 'React', 'TypeScript', 'Node.js', 'PostgreSQL', 'AWS'],
                'en' => ['Next.js', 'React', 'TypeScript', 'Node.js', 'PostgreSQL', 'AWS'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'ما الفرق بين موقع ويب ومنصة؟', 'a' => 'المنصة تدعم تسجيل مستخدمين، صلاحيات، عمليات متزامنة، وتكاملات — وليس مجرد صفحات ثابتة أو كتالوج.'],
                    ['q' => 'هل المنصة قابلة للتوسع؟', 'a' => 'نعم. نبني ببنية سحابية قابلة للتوسع مع فصل الواجهة عن الخدمات الخلفية.'],
                    ['q' => 'كم تستغرق منصة MVP؟', 'a' => 'عادة 10–16 أسبوعًا للإصدار الأول حسب التعقيد. نحدد نطاق MVP واضح لتقليل المخاطر.'],
                    ['q' => 'هل تدعمون SEO للمنصة؟', 'a' => 'نعم. نطبّق أفضل ممارسات SEO التقني للصفحات العامة والمحتوى القابل للفهرسة.'],
                ],
                'en' => [
                    ['q' => 'What is the difference between a website and a platform?', 'a' => 'A platform supports user accounts, permissions, concurrent operations, and integrations — not just static pages or a catalog.'],
                    ['q' => 'Is the platform scalable?', 'a' => 'Yes. We build with cloud-native architecture separating frontend from backend services.'],
                    ['q' => 'How long does a platform MVP take?', 'a' => 'Typically 10–16 weeks for a first release depending on complexity. We define a clear MVP scope to reduce risk.'],
                    ['q' => 'Do you support platform SEO?', 'a' => 'Yes. We apply technical SEO best practices for public pages and indexable content.'],
                ],
            ],
            'icon' => 'language',
            'hub_anchor' => 'web-platforms',
        ],

        'custom-software-development' => [
            'title' => [
                'ar' => 'تطوير برمجيات مخصصة',
                'en' => 'Custom Software Development',
            ],
            'meta_title' => [
                'ar' => 'تطوير برمجيات مخصصة للشركات | SpinesTech',
                'en' => 'Custom Software Development for Businesses | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نبني برمجيات مخصصة تلائم عملياتك الفعلية — أتمتة، تكامل، ومنصات داخلية للشركات في السعودية والخليج.',
                'en' => 'We build custom software aligned with your real operations — automation, integrations, and internal platforms for companies in Saudi Arabia and the GCC.',
            ],
            'intro' => [
                'ar' => 'عندما لا تناسبك الحلول الجاهزة، نصمّم برمجيات مخصصة تعكس قواعد عملك، تقلل العمل اليدوي، وتوحّد بياناتك في نظام واحد.',
                'en' => 'When off-the-shelf tools fall short, we design custom software that reflects your business rules, reduces manual work, and unifies your data in one system.',
            ],
            'problem' => [
                'ar' => 'الاعتماد على Excel، رسائل WhatsApp، وأنظمة متفرقة يبطئ العمليات ويزيد الأخطاء. البرمجيات الجاهزة غالبًا لا تدعم قواعد عملك أو التكامل مع أنظمة الخليج المحلية.',
                'en' => 'Relying on Excel, WhatsApp, and fragmented tools slows operations and increases errors. Off-the-shelf software often fails to support your business rules or local GCC integrations.',
            ],
            'audience' => [
                'ar' => [
                    'شركات متوسطة وكبيرة بعمليات فريدة',
                    'مؤسسات تحتاج أتمتة داخلية',
                    'فرق تشغيل تبحث عن تقليل العمل اليدوي',
                    'شركات تخطط لاستبدال legacy بحل مخصص',
                ],
                'en' => [
                    'Mid-size and enterprise companies with unique workflows',
                    'Organizations needing internal automation',
                    'Operations teams seeking to reduce manual work',
                    'Companies planning to replace legacy with a tailored solution',
                ],
            ],
            'scope' => [
                'ar' => [
                    'تحليل العمليات ونمذجة المتطلبات',
                    'تصميم النظام والبيانات',
                    'تطوير الواجهات والخدمات الخلفية',
                    'تكامل APIs وأنظمة خارجية',
                    'اختبار ونشر وتوثيق',
                    'تدريب المستخدمين ودعم التشغيل',
                ],
                'en' => [
                    'Process analysis and requirements modeling',
                    'System and data design',
                    'Frontend and backend development',
                    'API and external system integration',
                    'Testing, deployment, and documentation',
                    'User training and operational support',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'أتمتة سير العمل والموافقات',
                    'تكامل ERP و CRM وبوابات دفع',
                    'تقارير تشغيلية مخصصة',
                    'صلاحيات ومسارات عمل مرنة',
                    'سجل تدقيق ونشاط المستخدمين',
                ],
                'en' => [
                    'Workflow and approval automation',
                    'ERP, CRM, and payment gateway integration',
                    'Custom operational reports',
                    'Flexible permissions and workflows',
                    'Audit logs and user activity tracking',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'فهم العمليات', 'desc' => 'نرسم تدفقات العمل الحالية ونحدد نقاط التحسين.'],
                    ['title' => 'تصميم الحل', 'desc' => 'نصمّم النظام والبيانات بما يتوافق مع قواعد عملك.'],
                    ['title' => 'البناء والتكامل', 'desc' => 'نطوّر الميزات ونربط الأنظمة الموجودة.'],
                    ['title' => 'الإطلاق والتحسين', 'desc' => 'ننشر النظام وندعم التحسين المستمر بعد الإطلاق.'],
                ],
                'en' => [
                    ['title' => 'Process understanding', 'desc' => 'We map current workflows and identify improvement points.'],
                    ['title' => 'Solution design', 'desc' => 'We design the system and data model around your business rules.'],
                    ['title' => 'Build & integrate', 'desc' => 'We develop features and connect existing systems.'],
                    ['title' => 'Launch & improve', 'desc' => 'We deploy and support continuous improvement after launch.'],
                ],
            ],
            'stack' => [
                'ar' => ['PHP', 'Laravel', 'Node.js', 'PostgreSQL', 'Redis', 'Docker'],
                'en' => ['PHP', 'Laravel', 'Node.js', 'PostgreSQL', 'Redis', 'Docker'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'متى أختار برمجيات مخصصة بدل ERP جاهز؟', 'a' => 'عندما قواعد عملك فريدة أو تحتاج تكاملات محلية لا يدعمها ERP الجاهز بمرونة كافية.'],
                    ['q' => 'هل يمكن البناء على نظامنا الحالي؟', 'a' => 'نعم. نمكن توسيع أو ربط أنظمتك الحالية بدل الاستبدال الكامل عندما يكون ذلك مناسبًا.'],
                    ['q' => 'كيف نضمن نجاح المشروع؟', 'a' => 'نطاق واضح، عروض تكرارية، وتوثيق — مع مراجعة مستمرة مع فريقك.'],
                    ['q' => 'من يملك الكود؟', 'a' => 'أنت. نسلّم الكود المصدري والتوثيق وفق اتفاق التنفيذ.'],
                ],
                'en' => [
                    ['q' => 'When should I choose custom software over ready ERP?', 'a' => 'When your business rules are unique or you need local integrations that off-the-shelf ERP cannot support flexibly.'],
                    ['q' => 'Can you build on our current system?', 'a' => 'Yes. We can extend or integrate your existing systems instead of full replacement when appropriate.'],
                    ['q' => 'How do we ensure project success?', 'a' => 'Clear scope, iterative demos, and documentation — with continuous review with your team.'],
                    ['q' => 'Who owns the code?', 'a' => 'You do. We deliver source code and documentation per the execution agreement.'],
                ],
            ],
            'icon' => 'code',
            'hub_anchor' => 'operational-systems',
        ],

        'admin-dashboard-development' => [
            'title' => [
                'ar' => 'تطوير لوحات التحكم الإدارية',
                'en' => 'Admin Dashboard Development',
            ],
            'meta_title' => [
                'ar' => 'تطوير لوحات تحكم إدارية | SpinesTech',
                'en' => 'Admin Dashboard Development | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نبني لوحات تحكم إدارية ذكية للشركات في الخليج — رؤية كاملة للبيانات، إدارة العمليات، وتقارير BI مخصصة.',
                'en' => 'We build smart admin dashboards for GCC companies — full data visibility, operations management, and custom BI reports.',
            ],
            'intro' => [
                'ar' => 'نحوّل بياناتك المتفرقة إلى لوحة تحكم واحدة تمنحك رؤية فورية وإدارة فعّالة لعملياتك اليومية.',
                'en' => 'We turn scattered data into a single dashboard that gives you instant visibility and efficient control of daily operations.',
            ],
            'problem' => [
                'ar' => 'بدون لوحة تحكم موحّدة، تضيع الفرق في البحث عن البيانات بين أنظمة متعددة. القرارات تتأخر والإدارة تعتمد على تقارير يدوية غير محدثة.',
                'en' => 'Without a unified dashboard, teams waste time hunting data across systems. Decisions delay and management relies on outdated manual reports.',
            ],
            'audience' => [
                'ar' => [
                    'مديرو العمليات والتشغيل',
                    'شركات SaaS ومنصات رقمية',
                    'فرق دعم العملاء والمبيعات',
                    'مؤسسات تحتاج رؤية BI مخصصة',
                ],
                'en' => [
                    'Operations and ops managers',
                    'SaaS and digital platform companies',
                    'Customer support and sales teams',
                    'Organizations needing custom BI visibility',
                ],
            ],
            'scope' => [
                'ar' => [
                    'تصميم لوحات وتجربة مستخدم للإدارة',
                    'ربط مصادر البيانات وال APIs',
                    'مؤشرات أداء KPIs وتقارير مباشرة',
                    'إدارة المستخدمين والصلاحيات',
                    'تصدير البيانات والتنبيهات',
                    'نشر آمن ومراقبة الاستخدام',
                ],
                'en' => [
                    'Dashboard UX design for admin users',
                    'Data source and API connectivity',
                    'KPIs and live reporting',
                    'User and permission management',
                    'Data export and alerts',
                    'Secure deployment and usage monitoring',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'رسوم بيانية وتقارير تفاعلية',
                    'فلترة وبحث متقدم',
                    'سجل النشاط والتدقيق',
                    'تنبيهات عند تجاوز الحدود',
                    'دعم أدوار متعددة (Admin, Ops, Finance)',
                ],
                'en' => [
                    'Interactive charts and reports',
                    'Advanced filtering and search',
                    'Activity and audit logs',
                    'Threshold-based alerts',
                    'Multi-role support (Admin, Ops, Finance)',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'تحديد المؤشرات', 'desc' => 'نحدد ما يحتاج الإدارة لرؤيته وإجراءاته يوميًا.'],
                    ['title' => 'تصميم اللوحة', 'desc' => 'نصمّم تخطيطات واضحة وسهلة الاستخدام.'],
                    ['title' => 'ربط البيانات', 'desc' => 'نوصّل مصادر البيانات ونضمن دقة التحديث.'],
                    ['title' => 'الإطلاق والتدريب', 'desc' => 'ننشر اللوحة وندرب الفريق على الاستخدام.'],
                ],
                'en' => [
                    ['title' => 'Define metrics', 'desc' => 'We identify what management needs to see and act on daily.'],
                    ['title' => 'Dashboard design', 'desc' => 'We design clear, usable layouts for admin users.'],
                    ['title' => 'Data connection', 'desc' => 'We connect data sources and ensure accurate updates.'],
                    ['title' => 'Launch & training', 'desc' => 'We deploy the dashboard and train your team.'],
                ],
            ],
            'stack' => [
                'ar' => ['React', 'Next.js', 'Chart.js', 'PostgreSQL', 'REST APIs', 'Redis'],
                'en' => ['React', 'Next.js', 'Chart.js', 'PostgreSQL', 'REST APIs', 'Redis'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل يمكن ربط اللوحة مع أنظمتنا الحالية؟', 'a' => 'نعم. نربط ERP، CRM، بوابات دفع، وأي API متاح لديك.'],
                    ['q' => 'هل البيانات محدثة في الوقت الفعلي؟', 'a' => 'نعم عند الحاجة. نستخدم تحديث مباشر أو جدولة وفق متطلباتك.'],
                    ['q' => 'كم تستغرق لوحة تحكم MVP؟', 'a' => 'عادة 6–10 أسابيع للوحة أساسية مع أهم المؤشرات والتقارير.'],
                    ['q' => 'هل تدعمون الصلاحيات المعقدة؟', 'a' => 'نعم. نبني أدوار وصلاحيات مرنة لكل فريق أو مستوى إداري.'],
                ],
                'en' => [
                    ['q' => 'Can the dashboard connect to our systems?', 'a' => 'Yes. We connect ERP, CRM, payment gateways, and any available APIs.'],
                    ['q' => 'Is data updated in real time?', 'a' => 'Yes when needed. We use live updates or scheduled sync per your requirements.'],
                    ['q' => 'How long does a dashboard MVP take?', 'a' => 'Typically 6–10 weeks for a core dashboard with key metrics and reports.'],
                    ['q' => 'Do you support complex permissions?', 'a' => 'Yes. We build flexible roles and permissions per team or management level.'],
                ],
            ],
            'icon' => 'dashboard_customize',
            'hub_anchor' => 'admin-dashboards',
        ],

        'marketplace-development' => [
            'title' => [
                'ar' => 'تطوير الأسواق الرقمية',
                'en' => 'Marketplace Development',
            ],
            'meta_title' => [
                'ar' => 'تطوير منصات Marketplace متعددة البائعين | SpinesTech',
                'en' => 'Multi-Vendor Marketplace Development | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نبني منصات marketplace متعددة البائعين للخليج — محافظ رقمية، عمولات، إدارة موردين، وتجربة شراء متكاملة.',
                'en' => 'We build multi-vendor marketplace platforms for the GCC — digital wallets, commissions, vendor management, and end-to-end buying experiences.',
            ],
            'intro' => [
                'ar' => 'نصمّم ونطوّر منصات marketplace تربط البائعين والعملاء — مع إدارة الطلبات، الدفع، والعمولات في نظام واحد.',
                'en' => 'We design and build marketplaces that connect vendors and customers — with orders, payments, and commissions in one system.',
            ],
            'problem' => [
                'ar' => 'بناء marketplace يتطلب أكثر من متجر إلكتروني: تسجيل موردين، عمولات، محافظ، نزاعات، وتتبع تشغيلي. الحلول الجاهزة غالبًا لا تلائم نموذج عملك أو متطلبات الخليج.',
                'en' => 'Building a marketplace requires more than e-commerce: vendor onboarding, commissions, wallets, disputes, and ops tracking. Off-the-shelf tools rarely fit your model or GCC requirements.',
            ],
            'audience' => [
                'ar' => [
                    'شركات تخطط لمنصة multi-vendor',
                    'مؤسسات في التجارة والخدمات واللوجستيات',
                    'شركات توسّع من متجر واحد إلى marketplace',
                    'مستثمرون تبحث عن MVP marketplace',
                ],
                'en' => [
                    'Companies planning a multi-vendor platform',
                    'Organizations in commerce, services, and logistics',
                    'Businesses scaling from a single store to a marketplace',
                    'Investors seeking a marketplace MVP',
                ],
            ],
            'scope' => [
                'ar' => [
                    'تسجيل وإدارة البائعين والموردين',
                    'كتالوج منتجات/خدمات وبحث',
                    'سلة طلبات ودفع متعدد',
                    'محافظ رقمية وتقسيم العمولات',
                    'لوحة تحكم للبائع والإدارة',
                    'تكامل شحن وبوابات دفع محلية',
                ],
                'en' => [
                    'Vendor and supplier onboarding and management',
                    'Product/service catalog and search',
                    'Cart, checkout, and multi-payment flows',
                    'Digital wallets and commission splitting',
                    'Vendor and admin dashboards',
                    'Shipping and local payment gateway integration',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'عمولات وقواعد تسعير مرنة',
                    'مراجعات وتقييمات',
                    'إشعارات وتتبع الطلبات',
                    'فوترة إلكترونية وفق ZATCA',
                    'تقارير مالية وتشغيلية',
                ],
                'en' => [
                    'Flexible commissions and pricing rules',
                    'Reviews and ratings',
                    'Notifications and order tracking',
                    'E-invoicing aligned with ZATCA',
                    'Financial and operational reports',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'نموذج العمل', 'desc' => 'نحدد أطراف المنصة، العمولات، وقواعد التشغيل.'],
                    ['title' => 'تصميم التدفقات', 'desc' => 'نرسم رحلة البائع والعميل والإدارة.'],
                    ['title' => 'التطوير والتكامل', 'desc' => 'نبني المنصة ونربط الدفع والشحن.'],
                    ['title' => 'الإطلاق والتوسع', 'desc' => 'نطلق MVP ونجهّز المنصة لإضافة بائعين وميزات.'],
                ],
                'en' => [
                    ['title' => 'Business model', 'desc' => 'We define platform parties, commissions, and operating rules.'],
                    ['title' => 'Flow design', 'desc' => 'We map vendor, customer, and admin journeys.'],
                    ['title' => 'Build & integrate', 'desc' => 'We build the platform and connect payments and shipping.'],
                    ['title' => 'Launch & grow', 'desc' => 'We launch the MVP and prepare for vendors and new features.'],
                ],
            ],
            'stack' => [
                'ar' => ['Next.js', 'Node.js', 'PostgreSQL', 'Stripe / HyperPay', 'Redis', 'AWS'],
                'en' => ['Next.js', 'Node.js', 'PostgreSQL', 'Stripe / HyperPay', 'Redis', 'AWS'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'ما الفرق بين متجر و marketplace؟', 'a' => 'Marketplace يدعم بائعين متعددين، عمولات، محافظ، وإدارة موردين — وليس بائع واحد فقط.'],
                    ['q' => 'هل تدعمون بوابات دفع في الخليج؟', 'a' => 'نعم. نتكامل مع HyperPay، Moyasar، Tap، وبوابات أخرى حسب السوق.'],
                    ['q' => 'كم يستغرق MVP marketplace؟', 'a' => 'عادة 12–20 أسبوعًا حسب عدد الأطراف والتكاملات.'],
                    ['q' => 'هل يمكن البدء ببائع واحد ثم التوسع؟', 'a' => 'نعم. نصمّم المنصة لتبدأ بـ MVP وتتوسع لـ multi-vendor لاحقًا.'],
                ],
                'en' => [
                    ['q' => 'What is the difference between a store and a marketplace?', 'a' => 'A marketplace supports multiple vendors, commissions, wallets, and vendor management — not a single seller only.'],
                    ['q' => 'Do you support GCC payment gateways?', 'a' => 'Yes. We integrate HyperPay, Moyasar, Tap, and others per market.'],
                    ['q' => 'How long does a marketplace MVP take?', 'a' => 'Typically 12–20 weeks depending on parties and integrations.'],
                    ['q' => 'Can we start with one vendor and scale?', 'a' => 'Yes. We design the platform to launch as MVP and grow to multi-vendor later.'],
                ],
            ],
            'icon' => 'storefront',
            'hub_anchor' => 'marketplaces',
        ],

        'booking-platform-development' => [
            'title' => [
                'ar' => 'تطوير منصات الحجز',
                'en' => 'Booking Platform Development',
            ],
            'meta_title' => [
                'ar' => 'تطوير منصات حجز ومواعيد | SpinesTech',
                'en' => 'Booking & Scheduling Platform Development | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نبني منصات حجز ومواعيد للخدمات والفعاليات في الخليج — جداول، موارد، دفع، وإشعارات في نظام واحد.',
                'en' => 'We build booking and scheduling platforms for services and events in the GCC — calendars, resources, payments, and notifications in one system.',
            ],
            'intro' => [
                'ar' => 'نطوّر منصات حجز تلائم قطاعات الخدمات والفعاليات — مع إدارة المواعيد، الموارد، والدفع بسلاسة.',
                'en' => 'We build booking platforms for services and events — managing appointments, resources, and payments seamlessly.',
            ],
            'problem' => [
                'ar' => 'الحجز عبر الهاتف أو WhatsApp يسبب ازدواجية، أخطاء في الجداول، وغياب رؤية تشغيلية. بدون منصة حجز، يصعب التوسع أو تقديم تجربة موحّدة للعملاء.',
                'en' => 'Phone or WhatsApp booking causes double bookings, schedule errors, and no operational visibility. Without a booking platform, scaling and a consistent customer experience are hard.',
            ],
            'audience' => [
                'ar' => [
                    'شركات خدمات (صحة، تجميل، صيانة)',
                    'منظمي فعاليات ومؤتمرات',
                    'قطاعات سياحة وضيافة',
                    'منصات تربط مقدمي خدمة مع عملاء',
                ],
                'en' => [
                    'Service companies (health, beauty, maintenance)',
                    'Event and conference organizers',
                    'Tourism and hospitality sectors',
                    'Platforms connecting service providers with customers',
                ],
            ],
            'scope' => [
                'ar' => [
                    'تقويم وجدولة الموارد',
                    'حجز وإلغاء وتعديل المواعيد',
                    'دفع عند الحجز أو لاحقًا',
                    'إشعارات SMS و Push',
                    'لوحة تحكم للمشغّل والعميل',
                    'تكامل مع أنظمة خارجية',
                ],
                'en' => [
                    'Calendar and resource scheduling',
                    'Book, cancel, and reschedule appointments',
                    'Pay at booking or later',
                    'SMS and push notifications',
                    'Operator and customer dashboards',
                    'External system integration',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'إدارة فروع وموارد متعددة',
                    'قواعد توفر وأسعار ديناميكية',
                    'تذاكر وQR للفعاليات',
                    'تقارير الحجوزات والإشغال',
                    'دعم عربي و RTL',
                ],
                'en' => [
                    'Multi-branch and multi-resource management',
                    'Dynamic availability and pricing rules',
                    'Event tickets and QR codes',
                    'Booking and occupancy reports',
                    'Arabic and RTL support',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'تحليل التدفق', 'desc' => 'نحدد أنواع الحجز، الموارد، وقواعد التوفر.'],
                    ['title' => 'تصميم التجربة', 'desc' => 'نصمّم رحلة العميل والمشغّل.'],
                    ['title' => 'بناء المنصة', 'desc' => 'نطوّر الجدولة، الدفع، والإشعارات.'],
                    ['title' => 'الإطلاق والتشغيل', 'desc' => 'ننشر المنصة وندعم التشغيل اليومي.'],
                ],
                'en' => [
                    ['title' => 'Flow analysis', 'desc' => 'We define booking types, resources, and availability rules.'],
                    ['title' => 'Experience design', 'desc' => 'We design customer and operator journeys.'],
                    ['title' => 'Platform build', 'desc' => 'We develop scheduling, payments, and notifications.'],
                    ['title' => 'Launch & operate', 'desc' => 'We deploy and support day-to-day operations.'],
                ],
            ],
            'stack' => [
                'ar' => ['Next.js', 'Node.js', 'PostgreSQL', 'Redis', 'Twilio / Unifonic', 'AWS'],
                'en' => ['Next.js', 'Node.js', 'PostgreSQL', 'Redis', 'Twilio / Unifonic', 'AWS'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل تدعمون حجز الفعاليات والخدمات؟', 'a' => 'نعم. نبني منصات لحجز المواعيد، الفعاليات، والموارد حسب نموذج عملك.'],
                    ['q' => 'هل يمكن ربط المنصة مع تطبيق جوال؟', 'a' => 'نعم. نوفّر API ويمكننا بناء تطبيق جوال متكامل.'],
                    ['q' => 'كيف نتجنب الحجز المزدوج؟', 'a' => 'نطبّق قواعد توفر صارمة، قفل موارد، وتحديث فوري للجداول.'],
                    ['q' => 'كم يستغرق MVP منصة حجز؟', 'a' => 'عادة 10–14 أسبوعًا للإصدار الأول مع الجدولة والدفع الأساسي.'],
                ],
                'en' => [
                    ['q' => 'Do you support events and service booking?', 'a' => 'Yes. We build platforms for appointments, events, and resources per your business model.'],
                    ['q' => 'Can the platform connect to a mobile app?', 'a' => 'Yes. We provide APIs and can build an integrated mobile app.'],
                    ['q' => 'How do we avoid double booking?', 'a' => 'We apply strict availability rules, resource locking, and real-time calendar updates.'],
                    ['q' => 'How long does a booking MVP take?', 'a' => 'Typically 10–14 weeks for a first release with core scheduling and payments.'],
                ],
            ],
            'icon' => 'calendar_month',
            'hub_anchor' => 'booking-systems',
        ],

        'erp-business-systems' => [
            'title' => [
                'ar' => 'أنظمة ERP وأنظمة الأعمال',
                'en' => 'ERP & Business Systems',
            ],
            'meta_title' => [
                'ar' => 'تطوير أنظمة ERP للشركات | SpinesTech',
                'en' => 'ERP & Business Systems Development | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نبني أنظمة ERP مخصصة وERP-lite للشركات في الخليج — مالية، مخزون، موارد بشرية، وتكامل مع أنظمتك الحالية.',
                'en' => 'We build custom ERP and ERP-lite systems for GCC companies — finance, inventory, HR, and integration with your existing stack.',
            ],
            'intro' => [
                'ar' => 'نصمّم أنظمة أعمال موحّدة تربط المالية، المخزون، العمليات، والموارد البشرية — بما يلائم احتياجاتك وليس قالبًا جاهزًا صارمًا.',
                'en' => 'We design unified business systems connecting finance, inventory, operations, and HR — tailored to your needs, not a rigid off-the-shelf template.',
            ],
            'problem' => [
                'ar' => 'ERP الجاهز غالبًا مكلف، بطيء في التخصيص، ولا يدعم قواعد عمل محلية في الخليج. الأنظمة المتفرقة تسبب تكرار بيانات وأخطاء مالية وتشغيلية.',
                'en' => 'Off-the-shelf ERP is often costly, slow to customize, and weak on local GCC business rules. Fragmented systems cause duplicate data and financial and operational errors.',
            ],
            'audience' => [
                'ar' => [
                    'شركات متوسطة تبحث عن ERP-lite مخصص',
                    'مؤسسات تستبدل Excel وأنظمة legacy',
                    'شركات تحتاج تكامل مالي وتشغيلي',
                    'فرق تخطط لتوسع متعدد الفروع',
                ],
                'en' => [
                    'Mid-size companies seeking tailored ERP-lite',
                    'Organizations replacing Excel and legacy systems',
                    'Companies needing financial and ops integration',
                    'Teams planning multi-branch expansion',
                ],
            ],
            'scope' => [
                'ar' => [
                    'تحليل العمليات والمتطلبات',
                    'وحدات مالية ومخزون وموارد بشرية',
                    'صلاحيات ومسارات موافقة',
                    'تقارير مالية وتشغيلية',
                    'تكامل مع بوابات دفع وفوترة',
                    'نشر وتدريب ودعم',
                ],
                'en' => [
                    'Process and requirements analysis',
                    'Finance, inventory, and HR modules',
                    'Permissions and approval workflows',
                    'Financial and operational reports',
                    'Payment and invoicing integration',
                    'Deployment, training, and support',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'فوترة إلكترونية ومتوافقة مع ZATCA',
                    'تتبع مخزون وحركات',
                    'إدارة الموردين والمشتريات',
                    'لوحات KPI للإدارة',
                    'تكامل API مع أنظمة خارجية',
                ],
                'en' => [
                    'E-invoicing aligned with ZATCA',
                    'Inventory and stock movement tracking',
                    'Supplier and procurement management',
                    'Management KPI dashboards',
                    'API integration with external systems',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'تحليل العمليات', 'desc' => 'نرسم العمليات الحالية ونحدد الوحدات المطلوبة.'],
                    ['title' => 'تصميم النظام', 'desc' => 'نصمّم البيانات والوحدات بما يتوافق مع عملك.'],
                    ['title' => 'التطوير المرحلي', 'desc' => 'ننفّذ وحدة تلو الأخرى مع عروض دورية.'],
                    ['title' => 'الإطلاق والدعم', 'desc' => 'ننشر النظام وندعم التشغيل والتحسين.'],
                ],
                'en' => [
                    ['title' => 'Process analysis', 'desc' => 'We map current processes and define required modules.'],
                    ['title' => 'System design', 'desc' => 'We design data and modules aligned with your business.'],
                    ['title' => 'Phased development', 'desc' => 'We deliver module by module with regular demos.'],
                    ['title' => 'Launch & support', 'desc' => 'We deploy and support operations and improvement.'],
                ],
            ],
            'stack' => [
                'ar' => ['Laravel', 'PostgreSQL', 'Redis', 'React', 'Docker', 'AWS'],
                'en' => ['Laravel', 'PostgreSQL', 'Redis', 'React', 'Docker', 'AWS'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'ERP مخصص أم ERP جاهز؟', 'a' => 'نبني ERP-lite مخصص عندما قواعد عملك فريدة. ننصح بجاهز فقط عندما يطابق متطلباتك دون تخصيص كبير.'],
                    ['q' => 'هل يدعم النظام الفوترة الإلكترونية؟', 'a' => 'نعم. نتكامل مع متطلبات ZATCA والفوترة الإلكترونية في السعودية.'],
                    ['q' => 'كم يستغرق ERP-lite MVP؟', 'a' => 'عادة 14–24 أسبوعًا حسب عدد الوحدات والتكاملات.'],
                    ['q' => 'هل يمكن التوسع لاحقًا؟', 'a' => 'نعم. نصمّم بنية قابلة لإضافة وحدات وفروع جديدة.'],
                ],
                'en' => [
                    ['q' => 'Custom ERP or off-the-shelf?', 'a' => 'We build tailored ERP-lite when your rules are unique. We recommend ready ERP only when it matches without heavy customization.'],
                    ['q' => 'Does the system support e-invoicing?', 'a' => 'Yes. We integrate ZATCA and e-invoicing requirements in Saudi Arabia.'],
                    ['q' => 'How long does ERP-lite MVP take?', 'a' => 'Typically 14–24 weeks depending on modules and integrations.'],
                    ['q' => 'Can we scale later?', 'a' => 'Yes. We design architecture to add modules and branches over time.'],
                ],
            ],
            'icon' => 'settings_applications',
            'hub_anchor' => 'operational-systems',
        ],

        'grc-compliance-systems' => [
            'title' => [
                'ar' => 'أنظمة GRC والامتثال',
                'en' => 'GRC & Compliance Systems',
            ],
            'meta_title' => [
                'ar' => 'تطوير أنظمة GRC والامتثال | SpinesTech',
                'en' => 'GRC & Compliance Systems Development | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نبني أنظمة GRC لإدارة المخاطر والامتثال والتدقيق — للشركات في الخليج التي تحتاج رؤية تنظيمية ومسارات موافقة واضحة.',
                'en' => 'We build GRC systems for risk, compliance, and audit management — for GCC companies needing regulatory visibility and clear approval workflows.',
            ],
            'intro' => [
                'ar' => 'نساعد المؤسسات على إدارة الامتثال والمخاطر والتدقيق في منصة واحدة — مع سجلات واضحة ومسارات موافقة قابلة للتتبع.',
                'en' => 'We help organizations manage compliance, risk, and audit in one platform — with clear records and traceable approval workflows.',
            ],
            'problem' => [
                'ar' => 'إدارة الامتثال عبر ملفات ورسائل يصعّب التدقيق ويزيد مخاطر الغرامات. بدون نظام GRC، يصعب إثبات الالتزام أو تتبع المخاطر والإجراءات التصحيحية.',
                'en' => 'Managing compliance via files and email makes audits hard and increases penalty risk. Without a GRC system, proving compliance and tracking risks and corrective actions is difficult.',
            ],
            'audience' => [
                'ar' => [
                    'شركات منظّمة في قطاعات منظّمة',
                    'فرق compliance و risk management',
                    'مؤسسات تحتاج تدقيق داخلي وخارجي',
                    'شركات تستعد لمتطلبات تنظيمية جديدة',
                ],
                'en' => [
                    'Regulated-sector organizations',
                    'Compliance and risk management teams',
                    'Organizations needing internal and external audit trails',
                    'Companies preparing for new regulatory requirements',
                ],
            ],
            'scope' => [
                'ar' => [
                    'سجل المخاطر والتقييمات',
                    'مسارات الموافقة والاستثناءات',
                    'إدارة السياسات والوثائق',
                    'خطط التدقيق والمتابعة',
                    'تقارير امتثال ولوحات رقابة',
                    'سجل تدقيق كامل للنشاط',
                ],
                'en' => [
                    'Risk register and assessments',
                    'Approval and exception workflows',
                    'Policy and document management',
                    'Audit plans and follow-up',
                    'Compliance reports and oversight dashboards',
                    'Full activity audit trail',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'تصنيف مخاطر وتنبيهات',
                    'ربط الامتثال مع العمليات',
                    'صلاحيات حسب الدور والقسم',
                    'تصدير تقارير للجهات الرقابية',
                    'إشعارات عند تجاوز الحدود',
                ],
                'en' => [
                    'Risk classification and alerts',
                    'Link compliance to operations',
                    'Role and department-based permissions',
                    'Export reports for regulators',
                    'Alerts on threshold breaches',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'تقييم المتطلبات', 'desc' => 'نحدد اللوائح والعمليات ذات الصلة.'],
                    ['title' => 'تصميم النظام', 'desc' => 'نصمّم السجلات والمسارات والتقارير.'],
                    ['title' => 'التطوير والتكامل', 'desc' => 'نبني المنصة ونربطها مع أنظمتك.'],
                    ['title' => 'الإطلاق والتدقيق', 'desc' => 'ننشر النظام وندعم أول دورة تدقيق.'],
                ],
                'en' => [
                    ['title' => 'Requirements assessment', 'desc' => 'We identify relevant regulations and processes.'],
                    ['title' => 'System design', 'desc' => 'We design registers, workflows, and reports.'],
                    ['title' => 'Build & integrate', 'desc' => 'We build the platform and connect your systems.'],
                    ['title' => 'Launch & audit', 'desc' => 'We deploy and support your first audit cycle.'],
                ],
            ],
            'stack' => [
                'ar' => ['Laravel', 'PostgreSQL', 'React', 'Redis', 'Docker', 'AWS'],
                'en' => ['Laravel', 'PostgreSQL', 'React', 'Redis', 'Docker', 'AWS'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'هل النظام يلائم قطاعنا المنظّم؟', 'a' => 'نخصّص النظام وفق لوائحكم وعملياتكم — وليس قالبًا عامًا فقط.'],
                    ['q' => 'هل يدعم التدقيق الخارجي؟', 'a' => 'نعم. نوفّر سجلات تدقيق وتقارير قابلة للتصدير للمدققين.'],
                    ['q' => 'كم يستغرق نظام GRC MVP؟', 'a' => 'عادة 12–18 أسبوعًا حسب عدد الوحدات والتكاملات.'],
                    ['q' => 'هل يمكن ربطه مع ERP؟', 'a' => 'نعم. نتكامل مع ERP وأنظمة العمليات لربط الامتثال مع التشغيل.'],
                ],
                'en' => [
                    ['q' => 'Is the system suitable for our regulated sector?', 'a' => 'We tailor the system to your regulations and processes — not a generic template only.'],
                    ['q' => 'Does it support external audit?', 'a' => 'Yes. We provide audit trails and exportable reports for auditors.'],
                    ['q' => 'How long does a GRC MVP take?', 'a' => 'Typically 12–18 weeks depending on modules and integrations.'],
                    ['q' => 'Can it connect to ERP?', 'a' => 'Yes. We integrate with ERP and ops systems to link compliance with operations.'],
                ],
            ],
            'icon' => 'verified_user',
            'hub_anchor' => 'operational-systems',
        ],

        'white-label-software-development' => [
            'title' => [
                'ar' => 'تطوير برمجيات White-label',
                'en' => 'White-Label Software Development',
            ],
            'meta_title' => [
                'ar' => 'تطوير حلول White-label للشركات | SpinesTech',
                'en' => 'White-Label Software Development | SpinesTech',
            ],
            'meta_description' => [
                'ar' => 'نخصّص حلولنا الجاهزة أو نبني منصات white-label تحت علامتك التجارية — للوكالات والشركات في الخليج.',
                'en' => 'We customize our ready solutions or build white-label platforms under your brand — for agencies and companies in the GCC.',
            ],
            'intro' => [
                'ar' => 'نمكّنك من طرح منتج رقمي تحت علامتك — بتخصيص واجهات، نطاقات، وهوية بصرية دون البناء من الصفر في كل مرة.',
                'en' => 'We enable you to launch a digital product under your brand — customizing UI, domains, and identity without rebuilding from scratch each time.',
            ],
            'problem' => [
                'ar' => 'الوكالات والشركات التقنية تحتاج إطلاق حلول لعملائها بسرعة دون تكلفة تطوير كاملة لكل مشروع. البناء من الصفر لكل عميل يبطئ النمو ويستهلك الموارد.',
                'en' => 'Agencies and tech companies need to launch client solutions quickly without full development cost per project. Building from scratch for each client slows growth and drains resources.',
            ],
            'audience' => [
                'ar' => [
                    'وكالات تقنية وشركات برمجيات',
                    'شركات تقدم حلول SaaS لعملائها',
                    'مستثمرون تبحث عن إطلاق سريع',
                    'فرق تريد توسيع عرض منتجاتها',
                ],
                'en' => [
                    'Tech agencies and software companies',
                    'Businesses offering SaaS to their clients',
                    'Investors seeking fast market entry',
                    'Teams expanding their product portfolio',
                ],
            ],
            'scope' => [
                'ar' => [
                    'تخصيص الهوية البصرية والواجهات',
                    'نطاقات مخصصة و multi-tenant',
                    'تكوين الميزات حسب العميل',
                    'لوحة إدارة للوكالة',
                    'نشر وإعداد بيئات العملاء',
                    'دعم تشغيلي وتحديثات',
                ],
                'en' => [
                    'Brand and UI customization',
                    'Custom domains and multi-tenant setup',
                    'Per-client feature configuration',
                    'Agency admin panel',
                    'Client environment deployment',
                    'Operational support and updates',
                ],
            ],
            'capabilities' => [
                'ar' => [
                    'علامة تجارية كاملة للعميل',
                    'فصل بيانات كل عميل',
                    'تفعيل/تعطيل ميزات مرن',
                    'تقارير وإدارة اشتراكات',
                    'API للتوسع والتكامل',
                ],
                'en' => [
                    'Full client branding',
                    'Per-client data isolation',
                    'Flexible feature enable/disable',
                    'Subscription and billing management',
                    'APIs for extension and integration',
                ],
            ],
            'process' => [
                'ar' => [
                    ['title' => 'تحديد القالب', 'desc' => 'نختار الحل الأساسي أو نبني نواة white-label.'],
                    ['title' => 'التخصيص', 'desc' => 'نطبّق الهوية والميزات المطلوبة.'],
                    ['title' => 'النشر', 'desc' => 'نجهّز بيئة العميل والنطاق.'],
                    ['title' => 'التسليم والدعم', 'desc' => 'نسلّم المنصة وندعم التشغيل والتحديثات.'],
                ],
                'en' => [
                    ['title' => 'Base selection', 'desc' => 'We choose the core solution or build a white-label foundation.'],
                    ['title' => 'Customization', 'desc' => 'We apply branding and required features.'],
                    ['title' => 'Deployment', 'desc' => 'We prepare client environment and domain.'],
                    ['title' => 'Handover & support', 'desc' => 'We deliver the platform and support operations and updates.'],
                ],
            ],
            'stack' => [
                'ar' => ['Next.js', 'Laravel', 'PostgreSQL', 'Docker', 'AWS', 'CI/CD'],
                'en' => ['Next.js', 'Laravel', 'PostgreSQL', 'Docker', 'AWS', 'CI/CD'],
            ],
            'faq' => [
                'ar' => [
                    ['q' => 'ما الفرق بين white-label والتطوير المخصص؟', 'a' => 'White-label يبدأ من حل جاهز مخصّص تحت علامتك — أسرع وأقل تكلفة من البناء الكامل من الصفر.'],
                    ['q' => 'هل العميل يرى SpinesTech؟', 'a' => 'لا في النموذج white-label. المنصة تظهر تحت علامة العميل أو الوكالة.'],
                    ['q' => 'كم يستغرق إطلاق white-label؟', 'a' => 'عادة 4–8 أسابيع للتخصيص والنشر حسب الحل الأساسي.'],
                    ['q' => 'هل يمكن إضافة ميزات لاحقًا؟', 'a' => 'نعم. نصمّم النواة للتوسع بميزات وتكاملات جديدة.'],
                ],
                'en' => [
                    ['q' => 'What is the difference between white-label and custom development?', 'a' => 'White-label starts from a ready solution branded for you — faster and lower cost than full build from scratch.'],
                    ['q' => 'Will the client see SpinesTech?', 'a' => 'No in white-label mode. The platform appears under the client or agency brand.'],
                    ['q' => 'How long does white-label launch take?', 'a' => 'Typically 4–8 weeks for customization and deployment depending on the base solution.'],
                    ['q' => 'Can we add features later?', 'a' => 'Yes. We design the core for extension with new features and integrations.'],
                ],
            ],
            'icon' => 'badge',
            'hub_anchor' => 'operational-systems',
        ],
    ];
}

function st_service_config(string $slug): ?array
{
    $config = st_service_landing_config();
    return $config[$slug] ?? null;
}

function st_service_faq_for_slug(string $slug): array
{
    $config = st_service_config($slug);
    if ($config === null || !isset($config['faq'])) {
        return [];
    }

    $faq = st_service_text($config['faq']);
    return is_array($faq) ? $faq : [];
}

/**
 * @return string|array
 */
function st_service_text(array $field, string $locale = ''): string|array
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

/** Hub anchor id => service landing slug */
function st_hub_anchor_slugs(): array
{
    return [
        'mobile-apps'         => 'mobile-app-development',
        'web-platforms'       => 'web-platform-development',
        'admin-dashboards'    => 'admin-dashboard-development',
        'marketplaces'        => 'marketplace-development',
        'booking-systems'     => 'booking-platform-development',
        'operational-systems' => 'erp-business-systems',
    ];
}

/**
 * Labels for services hub cards (archive-st_service.php #anchors).
 *
 * @return array<string, array{ar:string,en:string}>
 */
function st_hub_anchor_labels(): array
{
    return [
        'mobile-apps' => [
            'ar' => 'تطبيقات الجوال',
            'en' => 'Mobile Apps',
        ],
        'web-platforms' => [
            'ar' => 'منصات الويب',
            'en' => 'Web Platforms',
        ],
        'admin-dashboards' => [
            'ar' => 'لوحات التحكم الإدارية',
            'en' => 'Admin Dashboards',
        ],
        'marketplaces' => [
            'ar' => 'الأسواق الرقمية',
            'en' => 'Digital Marketplaces',
        ],
        'booking-systems' => [
            'ar' => 'أنظمة الحجوزات',
            'en' => 'Booking Systems',
        ],
        'operational-systems' => [
            'ar' => 'الأنظمة التشغيلية',
            'en' => 'Operational Systems',
        ],
    ];
}

/** Map any service landing slug → hub card anchor id. */
function st_service_hub_anchor(string $slug): ?string
{
    $slug = sanitize_title($slug);
    foreach (st_hub_anchor_slugs() as $anchor => $landing) {
        if ($landing === $slug) {
            return $anchor;
        }
    }

    // Services without a dedicated hub card → closest section.
    $fallback = [
        'custom-software-development'      => 'web-platforms',
        'grc-compliance-systems'           => 'operational-systems',
        'white-label-software-development' => 'web-platforms',
    ];

    return $fallback[$slug] ?? null;
}

function st_services_archive_url(): string
{
    if (function_exists('st_url')) {
        return trailingslashit(st_url('/services/'));
    }

    $archive = get_post_type_archive_link('st_service');
    if (is_string($archive) && $archive !== '') {
        return trailingslashit($archive);
    }

    return home_url('/services/');
}

/** Prefer deep-link to services hub section; fall back to service single URL. */
function st_service_related_url(string $slug): string
{
    $anchor = st_service_hub_anchor($slug);
    if ($anchor !== null) {
        return st_services_archive_url() . '#' . $anchor;
    }

    return st_service_permalink($slug);
}

/** Display name matching the hub section (not the long landing title). */
function st_service_related_label(string $slug, string $locale = ''): string
{
    $locale = $locale !== '' ? $locale : (function_exists('st_locale') ? st_locale() : 'ar');
    $anchor = st_service_hub_anchor($slug);
    $labels = st_hub_anchor_labels();

    if ($anchor !== null && isset($labels[$anchor])) {
        return (string) st_service_text($labels[$anchor], $locale);
    }

    $cfg = st_service_config($slug);
    if ($cfg && isset($cfg['title'])) {
        return (string) st_service_text($cfg['title'], $locale);
    }

    return $slug;
}

function st_service_permalink(string $slug): string
{
    $post = get_page_by_path($slug, OBJECT, 'st_service');
    if ($post instanceof WP_Post) {
        return (string) get_permalink($post);
    }

    // No CPT post yet → point to hub section instead of a dead /services/{slug}/ URL.
    $anchor = st_service_hub_anchor($slug);
    if ($anchor !== null) {
        return st_services_archive_url() . '#' . $anchor;
    }

    return st_services_archive_url();
}

/** @return array<int, array{slug:string,icon:string,title:string,desc:string,tags:array<int,string>}> */
function st_home_service_preview_cards(string $locale = ''): array
{
    $locale = $locale !== '' ? $locale : (function_exists('st_locale') ? st_locale() : 'ar');
    $slugs = [
        'mobile-app-development',
        'web-platform-development',
        'custom-software-development',
        'admin-dashboard-development',
        'marketplace-development',
        'booking-platform-development',
        'grc-compliance-systems',
    ];
    $cards = [];
    foreach ($slugs as $slug) {
        $cfg = st_service_config($slug);
        if (!$cfg) {
            continue;
        }
        $cards[] = [
            'slug'  => $slug,
            'icon'  => (string) ($cfg['icon'] ?? 'code'),
            'title' => (string) st_service_text($cfg['title'], $locale),
            'desc'  => (string) st_service_text($cfg['intro'], $locale),
            'url'   => st_service_permalink($slug),
        ];
    }
    return $cards;
}
