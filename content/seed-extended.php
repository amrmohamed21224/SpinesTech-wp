<?php
/**
 * WP-CLI: wp eval-file content/seed-extended.php
 * Adds the remaining Arabic demo content after running content/seed.php.
 */
if (!defined('ABSPATH')) {
    exit("Run via WP-CLI inside WordPress.\n");
}

if (!class_exists('SpinesTech_Headless_Post_Types')) {
    exit("Activate spinestech-core first.\n");
}

function st_seed_insert_once(string $post_type, string $slug, array $post_args, array $meta = []): void
{
    if (get_page_by_path($slug, OBJECT, $post_type)) {
        return;
    }

    $id = wp_insert_post(array_merge([
        'post_type' => $post_type,
        'post_status' => 'publish',
        'post_name' => $slug,
    ], $post_args));

    if (!$id || is_wp_error($id)) {
        return;
    }

    foreach ($meta as $key => $value) {
        update_post_meta((int) $id, $key, $value);
    }
}

$sectors = [
    ['retail-ecommerce', 'التجزئة والتجارة الإلكترونية', 'حلول نقاط البيع، المتاجر الإلكترونية، وإدارة المخزون للعلامات التي تريد نموًا سريعًا.', 'shopping_bag', 'featured', "POS\nE-commerce\nInventory"],
    ['real-estate', 'العقارات والإنشاءات', 'منصات لإدارة العملاء، الوحدات، العقود، ومتابعة المشاريع العقارية.', 'location_city', 'accent', "CRM\nContracts\nProjects"],
    ['healthcare', 'الرعاية الصحية', 'أنظمة لإدارة العيادات والمستشفيات وتجارب المرضى مع مراعاة الأمان والخصوصية.', 'health_and_safety', 'default', "HIS\nPatient journey\nSecurity"],
    ['education', 'التعليم والتدريب', 'منصات تعلم إلكتروني وأنظمة إدارة تدريب للمؤسسات التعليمية والشركات.', 'school', 'default', "LMS\nTraining\nHybrid learning"],
    ['logistics', 'الخدمات اللوجستية', 'تتبع الشحنات، إدارة المستودعات، وتحسين سلاسل الإمداد بالبيانات اللحظية.', 'local_shipping', 'tall', "Tracking\nWarehouses\nSupply chain"],
    ['manufacturing', 'الصناعة والتصنيع', 'أتمتة خطوط الإنتاج، الصيانة التنبؤية، وربط المصانع بأنظمة تشغيل ذكية.', 'factory', 'tall', "IIoT\nMaintenance\nAutomation"],
];

foreach ($sectors as [$slug, $title, $excerpt, $icon, $layout, $tags]) {
    st_seed_insert_once('st_sector', $slug, [
        'post_title' => $title,
        'post_excerpt' => $excerpt,
    ], [
        'st_icon' => $icon,
        'st_layout' => $layout,
        'st_tags' => $tags,
    ]);
}

$case_studies = [
    [
        'slug' => 'supply-chain-erp',
        'title' => 'نظام ERP متكامل لسلسلة توريد كبرى',
        'client' => 'مجموعة التوريد الوطنية',
        'sector' => 'تجارة التجزئة',
        'challenge' => 'تشتت البيانات وفقدان جزء من المخزون بسبب غياب المزامنة اللحظية بين الفروع والمركز الرئيسي.',
        'solution' => 'تطوير محرك مركزي للمخزون مع تكامل API لجميع نقاط البيع وإدارة النقل المؤتمتة.',
        'result' => 'دقة مخزون وصلت إلى 99.8% وخفض التكاليف التشغيلية خلال السنة الأولى.',
        'stats' => [['label' => 'دقة المخزون', 'value' => '99.8%'], ['label' => 'خفض التكاليف', 'value' => '22%']],
    ],
    [
        'slug' => 'real-estate-crm',
        'title' => 'منصة CRM لمطور عقاري',
        'client' => 'دار الإعمار العقارية',
        'sector' => 'العقارات',
        'challenge' => 'صعوبة متابعة دورة حياة العميل من الاهتمام الأولي وحتى توقيع العقود.',
        'solution' => 'منصة مبيعات ذكية مع تنبيهات تلقائية وتحليل سلوك العملاء وتكامل واتساب.',
        'result' => 'زيادة معدلات التحويل وتحسين وضوح خط المبيعات لفريق العمل.',
        'stats' => [['label' => 'زيادة التحويلات', 'value' => '40%'], ['label' => 'رضا الفريق', 'value' => '95%']],
    ],
    [
        'slug' => 'customer-service-ai-agent',
        'title' => 'عميل ذكي لخدمة العملاء',
        'client' => 'الخدمة الذكية للاتصالات',
        'sector' => 'الذكاء الاصطناعي',
        'challenge' => 'ضغط كبير على مركز الاتصال وتأخر معالجة الاستفسارات المتكررة.',
        'solution' => 'تدريب وكيل ذكاء اصطناعي يفهم اللهجات ويعالج الطلبات المتكررة بسرعة.',
        'result' => 'حل 70% من الاستفسارات دون تدخل بشري وتقليل زمن الاستجابة.',
        'stats' => [['label' => 'حل تلقائي', 'value' => '70%'], ['label' => 'زمن الاستجابة', 'value' => '< 3 ثوان']],
    ],
];

foreach ($case_studies as $item) {
    st_seed_insert_once('st_case_study', $item['slug'], [
        'post_title' => $item['title'],
        'post_excerpt' => $item['result'],
    ], [
        'st_client' => $item['client'],
        'st_sector' => $item['sector'],
        'st_challenge' => $item['challenge'],
        'st_solution' => $item['solution'],
        'st_result' => $item['result'],
        'st_stats' => wp_json_encode($item['stats']),
    ]);
}

$jobs = [
    ['senior-web-developer', 'مطور ويب أول', 'تطوير البرمجيات', 'الرياض أو عن بعد', 'Full-time', '5+ سنوات', 'بناء واجهات وتطبيقات ويب عالية الجودة مع التركيز على الأداء وتجربة المستخدم.', "خبرة قوية في React/Next أو PHP/WordPress\nفهم جيد للأداء وCore Web Vitals\nقدرة على كتابة كود نظيف وقابل للصيانة", "راتب تنافسي\nبيئة عمل مرنة\nفرص تعلم مستمرة"],
    ['ai-engineer', 'مهندس ذكاء اصطناعي', 'الذكاء الاصطناعي', 'الرياض - هجين', 'Full-time', '3+ سنوات', 'تطوير حلول أتمتة ووكلاء ذكاء اصطناعي وتحليل بيانات للمؤسسات.', "خبرة في Python ونماذج اللغة\nفهم لتكاملات API\nقدرة على تحويل الاحتياج التجاري إلى حل عملي", "مشاريع مؤثرة\nميزانية تعلم\nمرونة في العمل"],
    ['ui-ux-designer', 'مصمم تجربة مستخدم UI/UX', 'التصميم الرقمي', 'الرياض - هجين', 'Full-time', '3+ سنوات', 'تصميم رحلات مستخدم وواجهات عربية/إنجليزية مناسبة للسوق الخليجي.', "إتقان Figma\nPortfolio قوي\nفهم RTL وتجربة المستخدم العربية", "بيئة إبداعية\nأدوات حديثة\nمسار تطور مهني"],
];

foreach ($jobs as [$slug, $title, $department, $location, $type, $experience, $description, $requirements, $benefits]) {
    st_seed_insert_once('st_job', $slug, [
        'post_title' => $title,
        'post_excerpt' => $description,
    ], [
        'st_department' => $department,
        'st_location' => $location,
        'st_type' => $type,
        'st_experience' => $experience,
        'st_requirements' => $requirements,
        'st_benefits' => $benefits,
    ]);
}

$faqs = [
    ['zatca-erp', 'هل تدعم أنظمة ERP الفاتورة الإلكترونية السعودية؟', 'نعم، يتم تصميم حلول ERP لتتوافق مع متطلبات هيئة الزكاة والضريبة والجمارك حسب نطاق المشروع.'],
    ['custom-system-timeline', 'كم تستغرق عملية تطوير نظام مخصص؟', 'تعتمد المدة على حجم المشروع، لكن المشاريع المتوسطة غالبًا تبدأ من 8 إلى 16 أسبوعًا بعد مرحلة التحليل.'],
    ['post-launch-support', 'هل تقدمون صيانة ودعم بعد الإطلاق؟', 'نعم، نوفر خطط دعم وتشغيل شهرية لضمان الاستقرار والتحسين المستمر.'],
    ['pricing-model', 'كيف يتم احتساب تكلفة الأنظمة المخصصة؟', 'يتم التسعير بناءً على نطاق العمل، التكاملات، عدد المستخدمين، مستوى الأمان، وخطة الدعم المطلوبة.'],
];

foreach ($faqs as [$slug, $question, $answer]) {
    st_seed_insert_once('st_faq', $slug, [
        'post_title' => $question,
        'post_content' => $answer,
    ]);
}

$testimonials = [
    ['ahmed-alshammari', 'م. أحمد الشمري', 'المدير التقني', 'الخدمة السحابية الوطنية', 'حققت لنا SpinesTech تحولًا حقيقيًا في العمليات من خلال نظام مخصص فاق توقعاتنا.', 5],
    ['sarah-alqahtani', 'سارة القحطاني', 'مديرة العمليات', 'براند العقارية الكبرى', 'الالتزام بالمواعيد والوضوح في التنفيذ جعل SpinesTech شريكنا التقني الدائم.', 5],
];

foreach ($testimonials as [$slug, $name, $role, $company, $quote, $rating]) {
    st_seed_insert_once('st_testimonial', $slug, [
        'post_title' => $name,
        'post_content' => $quote,
    ], [
        'st_name' => $name,
        'st_role' => $role,
        'st_company' => $company,
        'st_quote' => $quote,
        'st_rating' => $rating,
    ]);
}

echo "Extended seed complete.\n";
