<?php
declare(strict_types=1);

/**
 * Config-driven case study content (ar/en).
 */

if (!defined('ABSPATH')) {
    exit;
}

function st_case_study_slugs(): array
{
    return [
        'backway',
        'merchant',
        'propcare',
        'lahza',
        'supply-chain-erp',
    ];
}

function st_case_study_section_labels(): array
{
    return [
        'business_context' => [
            'ar' => 'سياق العمل',
            'en' => 'Business Context',
        ],
        'problem' => [
            'ar' => 'المشكلة',
            'en' => 'The Problem',
        ],
        'users' => [
            'ar' => 'المستخدمون',
            'en' => 'Users & Stakeholders',
        ],
        'solution' => [
            'ar' => 'الحل',
            'en' => 'The Solution',
        ],
        'architecture' => [
            'ar' => 'البنية التقنية',
            'en' => 'Architecture',
        ],
        'features' => [
            'ar' => 'أبرز الميزات',
            'en' => 'Key Features',
        ],
        'process' => [
            'ar' => 'منهجية التنفيذ',
            'en' => 'Delivery Process',
        ],
        'outcomes' => [
            'ar' => 'النتائج',
            'en' => 'Outcomes',
        ],
        'lessons' => [
            'ar' => 'دروس مستفادة',
            'en' => 'Lessons Learned',
        ],
        'internal_links_note' => [
            'ar' => 'روابط ذات صلة',
            'en' => 'Related Resources',
        ],
        'cta' => [
            'ar' => 'ابدأ مشروعك',
            'en' => 'Start Your Project',
        ],
    ];
}

/**
 * @return string|array
 */
function st_case_study_text(array $field, string $locale = ''): string|array
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

function st_case_study_landing_config(): array
{
    return [
        'backway' => [
            'title' => [
                'ar' => 'Backway — منصة شحن قائمة على الرحلات',
                'en' => 'Backway — Trip-Based Shipment Marketplace',
            ],
            'related_services' => [
                'mobile-app-development',
                'web-platform-development',
                'erp-business-systems',
            ],
            'related_articles' => [
                'software-project-cost-time-estimation',
                'technology-partner-contract-sla-handover',
                'مشروعك-البرمجي-متعثر؟-متى-تصلحه-ومتى-ت',
            ],
            'sections' => [
                'business_context' => [
                    'body' => [
                        'ar' => 'Backway منصة لوجستية تربط الشاحنين والسائقين في سوق شحن يعتمد على الرحلة كوحدة تشغيلية أساسية. يعمل المنتج في بيئة متعددة الأطراف حيث يجب أن تتزامن حالة الشحنة والتفاوض والتسوية بين أطراف مختلفة في الوقت الفعلي. كان الهدف بناء منتج رقمي قابل للتوسع يخدم السوق الكندي مع بنية تسمح بإضافة أدوار وتدفقات جديدة دون إعادة بناء المنصة.',
                        'en' => 'Backway is a logistics marketplace that connects shippers and drivers around the trip as the core operational unit. The product operates in a multi-party environment where shipment status, negotiation, and settlement must stay synchronized across roles in near real time. The goal was to build a scalable digital product for the Canadian market with an architecture that supports new roles and flows without rebuilding the platform.',
                    ],
                ],
                'problem' => [
                    'body' => [
                        'ar' => 'قبل المنصة، كانت عمليات التنسيق بين الشاحن والسائق تعتمد على قنوات متفرقة ولا توفر رؤية موحدة لحالة الرحلة. غياب مسار رقمي واضح للتفاوض والقبول والتتبع أدى إلى تأخير في اتخاذ القرار وصعوبة في إدارة الاستثناءات التشغيلية. كما أن أي حل جديد كان يحتاج أن يدعم أدواراً متعددة دون تعقيد تجربة أي طرف منها.',
                        'en' => 'Before the platform, coordination between shippers and drivers relied on fragmented channels with no unified view of trip status. The lack of a clear digital path for negotiation, acceptance, and tracking slowed decision-making and made exception handling difficult. Any new solution also had to support multiple roles without overcomplicating the experience for any single party.',
                    ],
                ],
                'users' => [
                    'body' => [
                        'ar' => 'الشاحن يحتاج إلى إنشاء طلبات شحن ومتابعة الرحلة والتفاوض على الشروط بشكل شفاف. السائق يحتاج إلى استلام الفرص المناسبة وإدارة الرحلات النشطة والتسويات المالية. فريق الإدارة يحتاج لوحة تحكم لمراقبة العمليات وحل النزاعات وضبط سياسات المنصة. كل دور له أولويات مختلفة لكنه يشارك نفس مصدر الحقيقة للبيانات.',
                        'en' => 'Shippers need to create shipment requests, follow trips, and negotiate terms transparently. Drivers need to receive relevant opportunities, manage active trips, and handle settlements. The operations team needs an admin panel to monitor activity, resolve disputes, and govern platform policies. Each role has different priorities but shares the same source of truth for trip data.',
                    ],
                ],
                'solution' => [
                    'body' => [
                        'ar' => 'صممنا منصة متعددة التطبيقات تتمحور حول الرحلة: تطبيق للشاحن، تطبيق للسائق، ولوحة إدارة مركزية. يبدأ التدفق بإنشاء طلب شحن، ثم التفاوض والقبول، ثم التنفيذ والتتبع حتى الإغلاق والتسوية. ركزنا على وضوح الحالة في كل خطوة بحيث يفهم كل مستخدم ماذا يحدث الآن وما المطلوب منه تالياً.',
                        'en' => 'We designed a multi-app platform centered on the trip: a shipper app, a driver app, and a central admin panel. The flow starts with a shipment request, moves through negotiation and acceptance, then execution and tracking through closure and settlement. We focused on state clarity at every step so each user understands what is happening now and what action is required next.',
                    ],
                ],
                'architecture' => [
                    'body' => [
                        'ar' => 'اعتمدنا بنية خدمات خلفية موحدة تخدم تطبيقات الجوال ولوحة الويب من خلال واجهات API واضحة. فصلنا منطق الرحلة والتفاوض والتسوية في طبقات مستقلة لتسهيل التطوير المتوازي والاختبار. صممنا نموذج صلاحيات يعكس أدوار المنصة ويمنع تسرب البيانات بين الأطراف مع الحفاظ على أداء مقبول في التحديثات اللحظية.',
                        'en' => 'We used a unified backend serving mobile apps and the web admin through well-defined APIs. Trip, negotiation, and settlement logic were separated into distinct layers to support parallel development and testing. A role-based permissions model reflects platform actors and prevents data leakage across parties while keeping real-time updates responsive.',
                    ],
                ],
                'features' => [
                    'body' => [
                        'ar' => 'تشمل المنصة إنشاء طلبات الشحن، التفاوض على الرحلة، قبول الرحلات، التتبع المباشر، سجل الرحلات، وإدارة التسويات. توفر لوحة الإدارة رؤية تشغيلية للطلبات النشطة والحالات الاستثنائية. صممت واجهات الجوال لتقليل الخطوات في المهام المتكررة مثل قبول رحلة أو تحديث حالة التسليم.',
                        'en' => 'The platform includes shipment request creation, trip negotiation, trip acceptance, live tracking, trip history, and settlement management. The admin panel provides operational visibility into active requests and exception states. Mobile interfaces were designed to minimize steps for recurring tasks such as accepting a trip or updating delivery status.',
                    ],
                ],
                'process' => [
                    'body' => [
                        'ar' => 'بدأنا بتحليل رحلة المستخدم لكل دور وتحديد نقاط الاحتكاك التشغيلية قبل كتابة أي كود. نفذنا المنتج على مراحل: نواة الرحلة أولاً، ثم التفاوض والتتبع، ثم التسويات ولوحة الإدارة. أشركنا أصحاب المصلحة في مراجعات منتظمة للنماذج الأولية لضبط التدفقات قبل التوسع في الميزات الثانوية.',
                        'en' => 'We started by mapping each role’s journey and identifying operational friction points before writing code. Delivery was phased: trip core first, then negotiation and tracking, then settlements and the admin panel. Stakeholders reviewed prototypes regularly so flows were validated before expanding into secondary features.',
                    ],
                ],
                'outcomes' => [
                    'body' => [
                        'ar' => 'أصبحت الرحلة وحدة تشغيلية واضحة يرى فيها كل طرف حالته دون الاعتماد على قنوات خارجية. تحسنت قدرة الفريق على إدارة الاستثناءات لأن بيانات الرحلة أصبحت مركزية وقابلة للتدقيق. وفرت المنصة أساساً تقنياً يمكن البناء عليه لإضافة أدوار وتدفقات جديدة دون إعادة هيكلة جذرية.',
                        'en' => 'The trip became a clear operational unit where each party could see status without relying on external channels. The team’s ability to handle exceptions improved because trip data became centralized and auditable. The platform provided a technical foundation for adding new roles and flows without a major rebuild.',
                    ],
                ],
                'lessons' => [
                    'body' => [
                        'ar' => 'في الأسواق متعددة الأطراف، تعريف حالات الرحلة بدقة مبكراً يوفر وقتاً كبيراً لاحقاً في التطوير والدعم. فصل واجهة التفاوض عن واجهة التنفيذ ساعد المستخدمين على فهم أين هم في العملية. الاستثمار في لوحة إدارة قوية من البداية ضروري لأن التشغيل اليومي يعتمد عليها بقدر اعتماد المستخدمين على التطبيقات.',
                        'en' => 'In multi-party marketplaces, defining trip states precisely early saves significant time later in development and support. Separating negotiation UI from execution UI helped users understand where they were in the process. Investing in a strong admin panel from the start is essential because daily operations depend on it as much as end users depend on the apps.',
                    ],
                ],
                'internal_links_note' => [
                    'body' => [
                        'ar' => 'لمشاريع التطبيقات والمنصات التشغيلية المشابهة، راجع خدمات تطوير التطبيقات والبرمجيات المخصصة، ومقال تقدير تكلفة ومدة المشروع، ودليل إدارة الشريك التقني.',
                        'en' => 'For similar mobile and operations platforms, see our mobile app and custom software services, the cost/timeline estimation guide, and the technology partner management article.',
                    ],
                ],
                'cta' => [
                    'body' => [
                        'ar' => 'هل تبني منصة لوجستية أو سوقاً تشغيلياً متعدد الأطراف؟ نساعدك على تحويل التدفقات المعقدة إلى منتج رقمي واضح وقابل للتوسع.',
                        'en' => 'Building a logistics platform or multi-party operations marketplace? We help turn complex workflows into a clear, scalable digital product.',
                    ],
                ],
            ],
        ],
        'merchant' => [
            'title' => [
                'ar' => 'Merchant — سوق أزياء إلكتروني متعدد البائعين',
                'en' => 'Merchant — Multi-Vendor Fashion Marketplace',
            ],
            'related_services' => [
                'marketplace-development',
                'mobile-app-development',
                'admin-dashboard-development',
            ],
            'related_articles' => [
                'software-project-cost-time-estimation',
                'technology-investment-roi',
                'technology-partner-contract-sla-handover',
            ],
            'sections' => [
                'business_context' => [
                    'body' => [
                        'ar' => 'Merchant منتج جاهز للتشغيل يستهدف سوق الأزياء الإلكتروني متعدد البائعين. يجمع بين تجربة تسوق للعملاء، أدوات إدارة للتجار، وتحكم مركزي لمالك المنصة. كان المطلوب تقليل وقت الإطلاق دون التضحية بجودة تجربة الشراء أو قدرة التشغيل على إدارة بائعين متعددين.',
                        'en' => 'Merchant is a ready-to-launch product aimed at the multi-vendor fashion e-commerce market. It combines a shopper experience, vendor management tools, and centralized platform control. The requirement was to reduce time-to-market without sacrificing purchase experience quality or operational ability to manage multiple sellers.',
                    ],
                ],
                'problem' => [
                    'body' => [
                        'ar' => 'بناء سوق إلكتروني من الصفر يتطلب تنسيقاً بين واجهة العميل، كتالوج المنتجات، الطلبات، المدفوعات، ولوحة البائع. الحلول الجاهزة غالباً لا تلبي متطلبات العلامة أو نموذج العمولة المطلوب. كما أن تجربة الجوال والويب يجب أن تبقى متسقة رغم اختلاف أدوار المستخدمين.',
                        'en' => 'Building a marketplace from scratch requires coordinating the customer storefront, product catalog, orders, payments, and vendor panel. Off-the-shelf solutions often fail brand requirements or the desired commission model. Mobile and web experiences must also stay consistent despite different user roles.',
                    ],
                ],
                'users' => [
                    'body' => [
                        'ar' => 'العميل يتصفح المنتجات ويتابع الطلبات ويدير حسابه. التاجر يرفع المنتجات ويتابع المبيعات ويتواصل مع العمليات. مدير المنصة يوافق على التجار ويراقب الأداء ويضبط السياسات والعمولات. كل دور يحتاج واجهة مخصصة لكنها تعتمد على نفس بيانات الطلب والمخزون.',
                        'en' => 'Customers browse products, track orders, and manage accounts. Vendors upload products, monitor sales, and coordinate with operations. Platform admins approve vendors, monitor performance, and govern policies and commissions. Each role needs a tailored interface backed by the same order and inventory data.',
                    ],
                ],
                'solution' => [
                    'body' => [
                        'ar' => 'قدمنا منصة متكاملة تشمل تطبيق عملاء للجوال، لوحة تحكم للتجار، ولوحة إدارة مركزية للويب. صممنا تدفقات الشراء والدفع والتسليم بحيث تبقى واضحة للعميل بينما تمنح التاجر رؤية لطلباته ومستحقاته. ركزنا على قابلية الإطلاق السريع مع إبقاء البنية قابلة للتخصيص حسب العلامة.',
                        'en' => 'We delivered an integrated platform with a mobile customer app, vendor dashboard, and centralized web admin. Purchase, payment, and fulfillment flows stay clear for shoppers while giving vendors visibility into orders and earnings. The focus was fast launch readiness with an architecture that remains customizable to the brand.',
                    ],
                ],
                'architecture' => [
                    'body' => [
                        'ar' => 'البنية تعتمد على API موحد يخدم تطبيق Flutter للعملاء ولوحات الويب للتجار والإدارة. فصلنا إدارة الكتالوج والطلبات والمدفوعات في وحدات مستقلة لتسهيل الصيانة. نموذج الصلاحيات يعكس ثلاثة مستويات: عميل، تاجر، ومدير منصة مع حدود واضحة لكل مستوى.',
                        'en' => 'The architecture uses a unified API serving a Flutter customer app and web dashboards for vendors and admins. Catalog, order, and payment management are separated into modules for easier maintenance. Permissions reflect three tiers—customer, vendor, and platform admin—with clear boundaries at each level.',
                    ],
                ],
                'features' => [
                    'body' => [
                        'ar' => 'تشمل المنصة تصفح المنتجات والسلة والدفع، إدارة المتاجر والمنتجات للتجار، موافقات التسجيل، تقارير المبيعات، وإدارة العمولات. يدعم تطبيق العملاء الإشعارات وتتبع الطلبات. توفر لوحة الإدارة أدوات لضبط المحتوى والسياسات دون تدخل تقني في كل تغيير تشغيلي.',
                        'en' => 'The platform includes product browsing, cart, and checkout, vendor store and product management, onboarding approvals, sales reports, and commission management. The customer app supports notifications and order tracking. The admin panel provides tools to adjust content and policies without developer involvement for every operational change.',
                    ],
                ],
                'process' => [
                    'body' => [
                        'ar' => 'اعتمدنا نهجاً قائماً على منتج جاهز مع تخصيص محدود للعلامة والتدفقات الحرجة. بدأنا بتحديد مسار الشراء الأساسي ثم توسعنا إلى أدوات التاجر والإدارة. راجعنا النماذج مع أصحاب المصلحة في كل مرحلة لضمان أن التجربة تخدم السوق المستهدف وليس قالباً عاماً فقط.',
                        'en' => 'We used a productized approach with focused customization for brand and critical flows. The core purchase journey was defined first, then vendor and admin tooling was expanded. Stakeholders reviewed prototypes at each stage to ensure the experience served the target market rather than a generic template alone.',
                    ],
                ],
                'outcomes' => [
                    'body' => [
                        'ar' => 'أصبح لدى الفريق منصة جاهزة للإطلاق تجمع أدوار العميل والتاجر والإدارة في منتج واحد. تحسنت وضوح عمليات الموافقة على التجار ومتابعة الطلبات. وفرت البنية أساساً يمكن توسيعه بفئات جديدة أو سياسات عمولة مختلفة دون إعادة بناء كاملة.',
                        'en' => 'The team gained a launch-ready platform unifying customer, vendor, and admin roles in one product. Vendor approval and order monitoring workflows became clearer. The architecture provides a base that can expand into new categories or commission policies without a full rebuild.',
                    ],
                ],
                'lessons' => [
                    'body' => [
                        'ar' => 'في أسواق متعددة البائعين، تعريف سياسات العمولة والموافقات مبكراً يمنع إعادة العمل لاحقاً في لوحة الإدارة. تجربة الجوال للعميل يجب أن تبقى بسيطة حتى مع تعقيد العمليات خلف الكواليس. الفصل بين واجهة التاجر وواجهة الإدارة يساعد كل فريق على التركيز على مهامه دون تشتيت.',
                        'en' => 'In multi-vendor marketplaces, defining commission and approval policies early prevents rework in the admin panel later. The customer mobile experience must stay simple even when backend operations are complex. Separating vendor and admin interfaces helps each team focus on its responsibilities without distraction.',
                    ],
                ],
                'internal_links_note' => [
                    'body' => [
                        'ar' => 'للمهتمين ببناء أسواق إلكترونية، راجع خدمة تطوير الأسواق الرقمية، ومقال تقدير تكلفة ومدة المشروع، ودليل حساب العائد على الاستثمار التقني قبل طلب الميزانية.',
                        'en' => 'Building a marketplace? See our marketplace development service, the software cost/timeline estimation guide, and the technology ROI business-case article.',
                    ],
                ],
                'cta' => [
                    'body' => [
                        'ar' => 'تخطط لإطلاق سوق إلكتروني أو منصة متعددة البائعين؟ نساعدك على الوصول إلى منتج قابل للتشغيل بسرعة مع بنية تدعم النمو.',
                        'en' => 'Planning to launch a marketplace or multi-vendor platform? We help you reach an operable product quickly with an architecture built for growth.',
                    ],
                ],
            ],
        ],
        'propcare' => [
            'title' => [
                'ar' => 'PropCare — منصة إدارة أملاك وصيانة',
                'en' => 'PropCare — Property Management Platform',
            ],
            'related_services' => [
                'admin-dashboard-development',
                'web-platform-development',
                'mobile-app-development',
            ],
            'related_articles' => [
                'technology-investment-roi',
                'software-project-cost-time-estimation',
                'technology-partner-contract-sla-handover',
            ],
            'sections' => [
                'business_context' => [
                    'body' => [
                        'ar' => 'PropCare منصة رقمية لشركات خدمات الأملاك والصيانة التي تدير عقوداً سنوية وزيارات دورية وطلبات عاجلة. يعمل العمل في بيئة تتطلب تنسيقاً بين العملاء والفرق الميدانية والإدارة مع الحفاظ على شفافية حالة كل طلب. كان الهدف أتمتة العمليات المعقدة دون فقدان اللمسة البشرية في تجربة العميل.',
                        'en' => 'PropCare is a digital platform for property service and maintenance companies managing annual contracts, recurring visits, and urgent requests. Operations require coordination between customers, field teams, and management while keeping every request status transparent. The goal was to automate complex workflows without losing the human touch in the customer experience.',
                    ],
                ],
                'problem' => [
                    'body' => [
                        'ar' => 'كانت الطلبات تصل عبر قنوات متعددة دون سجل مركزي، مما يصعب تتبع حالة الزيارة أو الرد على العميل في الوقت المناسب. إدارة العقود السنوية وجدولة الفنيين كانت تعتمد على جداول يدوية عرضة للخطأ. غياب لوحة تحكم موحدة حد من قدرة الإدارة على رؤية الأداء التشغيلي.',
                        'en' => 'Requests arrived through multiple channels with no central record, making it hard to track visit status or respond to customers promptly. Annual contract management and technician scheduling relied on manual spreadsheets prone to error. Without a unified dashboard, management lacked operational performance visibility.',
                    ],
                ],
                'users' => [
                    'body' => [
                        'ar' => 'العميل يحتاج إلى رفع طلبات الصيانة ومتابعة الزيارات وإدارة اشتراكاته. فريق العمليات يوزع المهام ويتابع التنفيذ ويتعامل مع الاستثناءات. الإدارة تحتاج تقارير عن العقود والطلبات والأداء. كل طرف يرى فقط ما يحتاجه لكن يشارك نفس سجل الطلبات.',
                        'en' => 'Customers need to submit maintenance requests, follow visits, and manage subscriptions. Operations teams assign tasks, monitor execution, and handle exceptions. Management needs reports on contracts, requests, and performance. Each party sees only what they need but shares the same request ledger.',
                    ],
                ],
                'solution' => [
                    'body' => [
                        'ar' => 'بنينا تطبيقاً للعملاء ولوحة إدارة ويب تغطي دورة حياة الطلب من الإنشاء حتى الإغلاق. دمجنا إدارة العقود السنوية مع جدولة الزيارات وطلبات الصيانة العاجلة في منصة واحدة. صممنا تجربة عميل تركز على الوضوح: حالة الطلب، الموعد المتوقع، والتواصل مع الدعم.',
                        'en' => 'We built a customer app and web admin panel covering the request lifecycle from creation to closure. Annual contracts, visit scheduling, and urgent maintenance requests were unified in one platform. The customer experience focuses on clarity: request status, expected timing, and support communication.',
                    ],
                ],
                'architecture' => [
                    'body' => [
                        'ar' => 'المنصة تعتمد على خدمات خلفية موحدة مع واجهات API لتطبيق الجوال ولوحة الويب. فصلنا إدارة العقود والطلبات والإشعارات في وحدات مستقلة. صممنا نموذج بيانات يعكس العقار والعقد والطلب والزيارة لضمان تتبع دقيق دون تكرار المعلومات.',
                        'en' => 'The platform uses a unified backend with APIs for the mobile app and web dashboard. Contract, request, and notification management are separate modules. The data model reflects property, contract, request, and visit entities to ensure accurate tracking without duplicated information.',
                    ],
                ],
                'features' => [
                    'body' => [
                        'ar' => 'تشمل المنصة طلبات الصيانة والاشتراكات السنوية وعروض الأسعار للمشاريع الجديدة والترميم، الدردشة مع الدعم، ولوحة إدارة للتقارير والعقود. يتلقى العميل تحديثات عن حالة طلبه بينما تدير الإدارة الفرق والجداول من مكان واحد.',
                        'en' => 'The platform includes maintenance requests, annual subscriptions, quotes for new build and renovation projects, support chat, and an admin panel for reports and contracts. Customers receive status updates while management oversees teams and schedules from a single place.',
                    ],
                ],
                'process' => [
                    'body' => [
                        'ar' => 'بدأنا بتحليل رحلة العميل من أول اتصال حتى إغلاق الزيارة وحددنا نقاط الاحتكاك في كل مرحلة. نفذنا المنتج على مراحل: الطلبات والإشعارات أولاً، ثم العقود والتقارير. اختبرنا التدفقات مع فرق التشغيل قبل الإطلاق لضمان أن المنصة تعكس العمل الفعلي وليس نظرياً فقط.',
                        'en' => 'We mapped the customer journey from first contact through visit closure and identified friction at each stage. Delivery was phased: requests and notifications first, then contracts and reporting. Operations teams tested flows before launch to ensure the platform reflected real work, not theory alone.',
                    ],
                ],
                'outcomes' => [
                    'body' => [
                        'ar' => 'أصبحت الطلبات مسجلة في مكان واحد يمكن للعميل والإدارة الرجوع إليه. تحسنت شفافية حالة الزيارات مما قلل الحاجة للمتابعة اليدوية المتكررة. وفرت المنصة قاعدة لتوسيع تطبيق الفنيين الميدانيين في مرحلة لاحقة دون تغيير جوهر النظام.',
                        'en' => 'Requests became recorded in one place accessible to customers and management. Visit status transparency improved, reducing repetitive manual follow-up. The platform provides a foundation for a future field technician app without changing the system’s core design.',
                    ],
                ],
                'lessons' => [
                    'body' => [
                        'ar' => 'في خدمات الأملاك، ربط العقد بالطلب والزيارة منذ البداية يمنع الفوضى لاحقاً في التقارير. الإشعارات في الوقت المناسب أهم من كثرة الميزات في تطبيق العميل. لوحة الإدارة يجب أن تخدم فرق التشغيل اليومية وليس التقارير فقط.',
                        'en' => 'In property services, linking contract, request, and visit from the start prevents reporting chaos later. Timely notifications matter more than feature volume in the customer app. The admin panel must serve daily operations teams, not reporting alone.',
                    ],
                ],
                'internal_links_note' => [
                    'body' => [
                        'ar' => 'لمنصات التشغيل ولوحات الإدارة المشابهة، راجع خدمات تطوير لوحات التحكم والمنصات الويب، ومقال حساب العائد على الاستثمار التقني.',
                        'en' => 'For similar operations platforms and admin dashboards, see our admin dashboard and web platform services, plus the technology ROI guide.',
                    ],
                ],
                'cta' => [
                    'body' => [
                        'ar' => 'هل تدير خدمات أملاك أو صيانة وتريد أتمتة العمليات؟ نساعدك على بناء منصة تربط العملاء والفرق والإدارة في تجربة واحدة.',
                        'en' => 'Managing property or maintenance services and need to automate operations? We help you build a platform connecting customers, teams, and management in one experience.',
                    ],
                ],
            ],
        ],
        'lahza' => [
            'title' => [
                'ar' => 'Lahza — منصة حجز فعاليات في السعودية',
                'en' => 'Lahza — Event Booking Platform in Saudi Arabia',
            ],
            'related_services' => [
                'booking-platform-development',
                'mobile-app-development',
                'web-platform-development',
            ],
            'related_articles' => [
                'software-project-cost-time-estimation',
                'technology-investment-roi',
                'technology-partner-contract-sla-handover',
            ],
            'sections' => [
                'business_context' => [
                    'body' => [
                        'ar' => 'Lahza منصة حجز فعاليات وتذاكر تستهدف السوق السعودي حيث يتزايد الطلب على تجارب حجز رقمية واضحة للمستخدمين والمنظمين. يتطلب المنتج دعم أنواع فعاليات متعددة مع إدارة المقاعد أو التذاكر والدفع. كان الهدف تقديم تجربة موثوقة للحضور مع أدوات تشغيلية للمنظمين.',
                        'en' => 'Lahza is an event booking and ticketing platform for the Saudi market, where demand for clear digital booking experiences is growing for both attendees and organizers. The product must support multiple event types with seat or ticket management and payments. The goal was a reliable attendee experience with operational tools for organizers.',
                    ],
                ],
                'problem' => [
                    'body' => [
                        'ar' => 'الحجز اليدوي أو عبر قنوات متفرقة يصعب على المنظمين إدارة السعة والحضور بدقة. العملاء يحتاجون تأكيداً فورياً ووضوحاً في تفاصيل الفعالية والموقع. غياب منصة موحدة يزيد من أخطاء الحجز المزدوج ويضعف ثقة المستخدم في عملية الشراء.',
                        'en' => 'Manual booking or fragmented channels make it hard for organizers to manage capacity and attendance accurately. Customers need instant confirmation and clarity on event details and location. Without a unified platform, double-booking errors increase and user trust in the purchase flow weakens.',
                    ],
                ],
                'users' => [
                    'body' => [
                        'ar' => 'الحضور يبحثون عن الفعاليات ويحجزون ويتلقون التذاكر إلكترونياً. المنظمون ينشئون الفعاليات ويديرون التذاكر ويتابعون المبيعات. فريق المنصة يراجع المحتوى ويدعم التشغيل عند الحاجة. لكل دور مسار مختلف لكن البيانات المرجعية للفعالية واحدة.',
                        'en' => 'Attendees discover events, book, and receive e-tickets. Organizers create events, manage tickets, and monitor sales. The platform team reviews content and supports operations when needed. Each role has a different journey but shares one canonical event record.',
                    ],
                ],
                'solution' => [
                    'body' => [
                        'ar' => 'صممنا منصة حجز تشمل واجهة للجمهور لاستكشاف الفعاليات وإتمام الحجز، ولوحة للمنظمين لإدارة الفعاليات والتذاكر. ركزنا على تدفق حجز قصير مع تأكيد واضح وتذكرة رقمية. دعمنا حالات متعددة مثل الفعاليات المجانية والمدفوعة والمحدودة بالسعة.',
                        'en' => 'We designed a booking platform with a public interface to discover events and complete reservations, plus an organizer panel to manage events and tickets. The focus was a short booking flow with clear confirmation and a digital ticket. We supported free, paid, and capacity-limited event scenarios.',
                    ],
                ],
                'architecture' => [
                    'body' => [
                        'ar' => 'البنية تعتمد على API مركزي يخدم واجهة الويب وتطبيقات الجوال إن وُجدت. فصلنا إدارة الفعاليات والمخزون (المقاعد/التذاكر) والمدفوعات لتقليل تعارض الحجز. طبقة التحقق تمنع تجاوز السعة وتضمن أن كل تذكرة مرتبطة بحجز مؤكد.',
                        'en' => 'The architecture uses a central API serving web and mobile clients where applicable. Event, inventory (seats/tickets), and payment management are separated to reduce booking conflicts. A validation layer prevents overselling and ensures every ticket maps to a confirmed reservation.',
                    ],
                ],
                'features' => [
                    'body' => [
                        'ar' => 'تشمل المنصة استكشاف الفعاليات، الحجز والدفع، التذاكر الإلكترونية، إدارة الفعاليات للمنظمين، وتقارير المبيعات الأساسية. يتلقى الحضور تأكيداً فورياً مع تفاصيل الوصول. يمكن للمنظمين تحديث معلومات الفعالية ضمن ضوابط تحافظ على سلامة الحجوزات القائمة.',
                        'en' => 'The platform includes event discovery, booking and payment, e-tickets, organizer event management, and basic sales reports. Attendees receive instant confirmation with access details. Organizers can update event information within guardrails that protect existing reservations.',
                    ],
                ],
                'process' => [
                    'body' => [
                        'ar' => 'بدأنا بتحديد مسار الحجز الأقصر من الاكتشاف حتى التذكرة واختبرناه مع مستخدمين حقيقيين. بنينا أدوات المنظمين بالتوازي مع واجهة الجمهور لضمان جاهزية التشغيل عند الإطلاق. راجعنا متطلبات السوق السعودي في الدفع والمحتوى قبل تثبيت التصميم النهائي.',
                        'en' => 'We defined the shortest path from discovery to ticket and tested it with real users. Organizer tools were built in parallel with the public interface so operations were ready at launch. Saudi market requirements for payments and content were reviewed before finalizing the design.',
                    ],
                ],
                'outcomes' => [
                    'body' => [
                        'ar' => 'أصبح الحجز الرقمي مساراً واحداً واضحاً للحضور والمنظمين. تحسنت قدرة المنظمين على متابعة السعة والمبيعات دون أدوات خارجية. وفرت المنصة أساساً يمكن توسيعه لأنواع فعاليات وقنوات توزيع إضافية.',
                        'en' => 'Digital booking became a single clear path for attendees and organizers. Organizers gained better capacity and sales visibility without external tools. The platform provides a base that can expand into additional event types and distribution channels.',
                    ],
                ],
                'lessons' => [
                    'body' => [
                        'ar' => 'في منصات الحجز، معالجة السعة والدفع مبكراً أهم من تحسين الواجهة وحدها. تأكيد الحجز يجب أن يكون فورياً وواضحاً لبناء الثقة. أدوات المنظمين لا تقل أهمية عن تجربة الحضور لأن جودة البيانات تبدأ من جهة الإدخال.',
                        'en' => 'In booking platforms, handling capacity and payments early matters more than UI polish alone. Booking confirmation must be instant and clear to build trust. Organizer tools are as important as the attendee experience because data quality starts at input.',
                    ],
                ],
                'internal_links_note' => [
                    'body' => [
                        'ar' => 'لمنصات الحجز والمواعيد، راجع خدمة تطوير منصات الحجز، ومقال تقدير التكلفة والمدة، ودليل إدارة الشريك التقني.',
                        'en' => 'For booking platforms, see our booking development service, the cost/timeline estimation guide, and the technology partner management article.',
                    ],
                ],
                'cta' => [
                    'body' => [
                        'ar' => 'تبني منصة حجز فعاليات أو تذاكر في السعودية؟ نساعدك على تصميم تدفق حجز موثوق مع أدوات تشغيل للمنظمين.',
                        'en' => 'Building an event or ticketing platform in Saudi Arabia? We help you design a reliable booking flow with organizer operations tooling.',
                    ],
                ],
            ],
        ],
        'supply-chain-erp' => [
            'title' => [
                'ar' => 'نظام ERP وسلسلة إمداد تشغيلي',
                'en' => 'Supply Chain ERP Operations System',
            ],
            'related_services' => [
                'erp-business-systems',
                'web-platform-development',
                'admin-dashboard-development',
            ],
            'related_articles' => [
                'technology-investment-roi',
                'مشروعك-البرمجي-متعثر؟-متى-تصلحه-ومتى-ت',
                'software-project-cost-time-estimation',
            ],
            'sections' => [
                'business_context' => [
                    'body' => [
                        'ar' => 'المشروع نظام تشغيلي موحد لإدارة سلسلة الإمداد يشمل المخزون والمشتريات والتوزيع والتقارير. يعمل العميل في بيئة تتطلب تنسيقاً بين مستودعات متعددة وفرق مبيعات وموردين مع الحاجة إلى رؤية لحظية للحركة. كان الهدف استبدال الجداول والأنظمة المتفرقة بمنصة واحدة تعكس العمليات الفعلية.',
                        'en' => 'The project is a unified supply chain operations system covering inventory, procurement, distribution, and reporting. The client operates across multiple warehouses, sales teams, and suppliers with a need for near real-time movement visibility. The goal was to replace spreadsheets and fragmented tools with one platform that reflects actual workflows.',
                    ],
                ],
                'problem' => [
                    'body' => [
                        'ar' => 'البيانات كانت موزعة بين جداول وأنظمة قديمة لا تتكامل، مما يصعب إعداد تقارير دقيقة أو تتبع حركة الصنف. قرارات الشراء والتوزيع كانت تتأخر لغياب رؤية موحدة للمخزون. كل قسم يعمل بأدواته مما يزيد من أخطاء الإدخال وتكرار الجهد.',
                        'en' => 'Data lived across spreadsheets and legacy systems that did not integrate, making accurate reporting and item traceability difficult. Procurement and distribution decisions were delayed by the lack of unified inventory visibility. Each department used its own tools, increasing entry errors and duplicated effort.',
                    ],
                ],
                'users' => [
                    'body' => [
                        'ar' => 'مدير المستودع يتابع الاستلام والصرف والجرد. فريق المشتريات يدير أوامر الشراء والموردين. المبيعات يحتاج توفر المخزون وحالة الطلبات. الإدارة تحتاج تقارير تشغيلية ومالية دون انتظار تجميع يدوي. الصلاحيات تختلف لكن سجل الحركة واحد.',
                        'en' => 'Warehouse managers track receipts, issues, and stock counts. Procurement manages purchase orders and suppliers. Sales needs stock availability and order status. Leadership needs operational and financial reports without manual consolidation. Permissions differ but the movement ledger is shared.',
                    ],
                ],
                'solution' => [
                    'body' => [
                        'ar' => 'بنينا نظام ERP مخصصاً يربط المخزون والمشتريات والتوزيع في قاعدة بيانات مركزية مع لوحة تحكم ويب. صممنا تدفقات تعكس العمل الفعلي: من طلب الشراء حتى الاستلام والتخزين والصرف. ركزنا على وضوح الحالة في كل مرحلة لتقليل الاعتماد على المتابعة اليدوية.',
                        'en' => 'We built a custom ERP linking inventory, procurement, and distribution in a central database with a web admin panel. Flows mirror real work: from purchase request through receipt, storage, and issue. We focused on state clarity at each stage to reduce reliance on manual follow-up.',
                    ],
                ],
                'architecture' => [
                    'body' => [
                        'ar' => 'النظام يعتمد على خدمات خلفية مع واجهة API ولوحة ويب للمستخدمين الداخليين. فصلنا وحدات المخزون والمشتريات والتقارير مع تكامل عبر أحداث داخلية. نموذج الصلاحيات يعكس الأدوار التشغيلية مع سجل تدقيق للحركات الحساسة.',
                        'en' => 'The system uses backend services with an API and web panel for internal users. Inventory, procurement, and reporting modules are separated but integrated through internal events. Role-based permissions reflect operational roles with an audit trail for sensitive movements.',
                    ],
                ],
                'features' => [
                    'body' => [
                        'ar' => 'تشمل المنصة إدارة الأصناف والمستودعات، أوامر الشراء، حركات الاستلام والصرف، تتبع التوزيع، وتقارير المخزون والأداء. تدعم لوحة التحكم تصفية البيانات حسب الفرع أو المستودع. التنبيهات تساعد الفرق على معالجة النقص أو التأخير قبل تأثيره على العمليات.',
                        'en' => 'The platform includes item and warehouse management, purchase orders, receipt and issue movements, distribution tracking, and inventory and performance reports. The dashboard supports filtering by branch or warehouse. Alerts help teams address shortages or delays before they disrupt operations.',
                    ],
                ],
                'process' => [
                    'body' => [
                        'ar' => 'بدأنا بورش عمل لرسم العمليات الحالية وتحديد الفجوات بينها وبين الأنظمة القائمة. نفذنا النظام على مراحل: المخزون أولاً، ثم المشتريات، ثم التقارير والتكاملات. اختبرنا كل مرحلة مع المستخدمين الفعليين قبل الانتقال للتالية لضمان التبني وليس مجرد تسليم تقني.',
                        'en' => 'We started with workshops to map current processes and gaps versus existing systems. Delivery was phased: inventory first, then procurement, then reporting and integrations. Each phase was tested with actual users before moving on to ensure adoption, not just technical delivery.',
                    ],
                ],
                'outcomes' => [
                    'body' => [
                        'ar' => 'أصبحت حركة المخزون مسجلة في نظام واحد يمكن الرجوع إليه من الأقسام المختلفة. تحسنت سرعة إعداد التقارير التشغيلية لأن البيانات لم تعد تُجمع يدوياً من مصادر متعددة. وفرت المنصة أساساً لتوسيع التكاملات مع أنظمة خارجية دون إعادة بناء جوهر النظام.',
                        'en' => 'Inventory movements became recorded in one system accessible across departments. Operational reporting speed improved because data was no longer manually consolidated from multiple sources. The platform provides a foundation for external system integrations without rebuilding the core.',
                    ],
                ],
                'lessons' => [
                    'body' => [
                        'ar' => 'في مشاريع ERP، مواءمة النظام مع العملية الفعلية أهم من نسخ قوالب جاهزة. البدء بوحدة المخزون غالباً يبني الثقة قبل التوسع في المشتريات والتقارير. سجل التدقيق والصلاحيات يجب تصميمهما مبكراً وليس كإضافة لاحقة.',
                        'en' => 'In ERP projects, aligning the system with actual processes matters more than copying generic templates. Starting with inventory often builds trust before expanding into procurement and reporting. Audit trails and permissions should be designed early, not added later.',
                    ],
                ],
                'internal_links_note' => [
                    'body' => [
                        'ar' => 'لأنظمة ERP والبرمجيات التشغيلية، راجع خدمات أنظمة ERP والبرمجيات المخصصة، ومقال حساب العائد على الاستثمار، ودليل إنقاذ المشاريع المتعثرة.',
                        'en' => 'For ERP and operations software, see our ERP and custom software services, the technology ROI guide, and the stuck-project rescue article.',
                    ],
                ],
                'cta' => [
                    'body' => [
                        'ar' => 'هل تحتاج نظاماً تشغيلياً موحداً لسلسلة الإمداد أو ERP مخصصاً؟ نساعدك على تحويل عملياتك إلى منصة واحدة قابلة للتوسع.',
                        'en' => 'Need a unified supply chain operations system or custom ERP? We help turn your workflows into one scalable platform.',
                    ],
                ],
            ],
        ],
    ];
}

function st_case_study_config(string $slug): ?array
{
    $config = st_case_study_landing_config();

    return $config[$slug] ?? null;
}
