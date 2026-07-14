<?php
/**
 * Template Name: About
 */
get_header();
$is_rtl = st_locale() === 'ar';
?>
<main class="about-page" dir="<?php echo esc_attr(st_dir()); ?>">

    <!-- ═══════════════════════════════
         1. HERO
    ═══════════════════════════════ -->
    <section class="ab-hero">
        <div class="ab-hero__grid"></div>
        <div class="ab-hero__glow ab-hero__glow--1"></div>
        <div class="ab-hero__glow ab-hero__glow--2"></div>
        <div class="ab-hero__overlay"></div>

        <div class="container ab-hero__inner">
            <div class="ab-hero__badge reveal">
                <span class="ab-hero__badge-dot"></span>
                <span>التميّز المؤسسي</span>
            </div>

            <h1 class="ab-hero__title reveal" style="--delay:100ms">
                لا نبني تطبيقات فحسب… نبني <span class="ab-hero__title-accent">أنظمة أعمال قابلة للتشغيل والنمو</span>
            </h1>

            <p class="ab-hero__subtitle reveal" style="--delay:200ms">
                SpinesTech استوديو هندسة منتجات يساعد الشركات والشركات الناشئة والشركاء التقنيين على تحويل الأفكار المعقدة إلى أنظمة رقمية متكاملة.
            </p>

            <p class="ab-hero__desc reveal" style="--delay:300ms">
                نبدأ بفهم نموذج العمل، الأدوار، الصلاحيات، سير العمليات، وقواعد النظام — ثم نحوّل ذلك إلى منتج رقمي جاهز للتوسع.
            </p>

            <div class="ab-hero__actions reveal" style="--delay:400ms">
                <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="ab-btn ab-btn--primary">ابدأ مشروعك</a>
                <a href="<?php echo esc_url(home_url('/case-studies/')); ?>" class="ab-btn ab-btn--ghost">
                    استعرض أعمالنا
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         2. ENGINEERING PARTNER
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--white">
        <div class="container">
            <div class="ab-split-header reveal">
                <div class="ab-split-header__main">
                    <div class="ab-eyebrow">
                        <span class="ab-eyebrow__dot"></span>
                        التميّز التشغيلي
                    </div>
                    <h2 class="ab-title">شريك هندسي لمنتجات<br>رقمية تشغيلية</h2>
                </div>
                <div class="ab-split-header__side">
                    <p>نتعامل مع كل مشروع كنظام أعمال متكامل، لا مجرد شاشات منفصلة. بنيتنا التقنية مصممة لتتحمل واقع التوسع الحقيقي.</p>
                </div>
            </div>

            <div class="ab-bento">
                <div class="ab-bento__col ab-bento__col--main">
                    <div class="ab-card ab-card--light reveal">
                        <span class="ab-card__tag">قابل للتوسع 100%</span>
                        <div class="ab-card__icon-circle">
                            <span class="material-symbols-outlined">lightbulb</span>
                        </div>
                        <div class="ab-card__body">
                            <h3>نفهم الأعمال أولاً</h3>
                            <p>نحلل احتياجاتك التشغيلية قبل كتابة أي سطر كود لضمان جدوى المنتج واستمراريته على المدى الطويل.</p>
                        </div>
                    </div>

                    <div class="ab-card ab-card--dark reveal" style="--delay:150ms">
                        <div class="ab-card__grid-bg"></div>
                        <span class="ab-card__tag ab-card__tag--dark">مستوى مؤسسي</span>
                        <div class="ab-card__icon-circle ab-card__icon-circle--glass">
                            <span class="material-symbols-outlined">hub</span>
                        </div>
                        <div class="ab-card__body">
                            <h3>نبني أنظمة، لا شاشات</h3>
                            <p>نربط التطبيق بلوحات الإدارة، المحاسبة، والمخازن في نظام واحد متناغم يعمل لصالحك.</p>
                        </div>
                    </div>
                </div>

                <div class="ab-bento__col ab-bento__col--side">
                    <div class="ab-mini-card reveal" style="--delay:100ms">
                        <div class="ab-mini-card__icon">
                            <span class="material-symbols-outlined">trending_up</span>
                        </div>
                        <div>
                            <h3>تصميم للتوسع</h3>
                            <p>بنية مرنة تدعم نمو المستخدمين والعمليات دون أي عثرات تقنية.</p>
                        </div>
                    </div>
                    <div class="ab-mini-card reveal" style="--delay:250ms">
                        <div class="ab-mini-card__icon">
                            <span class="material-symbols-outlined">verified</span>
                        </div>
                        <div>
                            <h3>تسليم واضح</h3>
                            <p>تقارير دورية، كود نظيف، وتوثيق تقني شامل يضمن لك الملكية الكاملة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         3. DIFFERENTIATORS TIMELINE
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--muted ab-timeline-section">
        <div class="ab-timeline-glow ab-timeline-glow--1"></div>
        <div class="ab-timeline-glow ab-timeline-glow--2"></div>
        <div class="container">
            <div class="ab-header reveal">
                <div class="ab-eyebrow ab-eyebrow--center">
                    <span class="ab-eyebrow__dot"></span>
                    الميزة الاستراتيجية
                </div>
                <h2 class="ab-title">ما الذي يميز<br>SpinesTech؟</h2>
                <p class="ab-subtitle">نتجاوز وكالات التطوير التقليدية. نهجنا متجذر في هندسة المنتجات والاستراتيجية التجارية، مصمم للتميز المؤسسي.</p>
            </div>

            <div class="ab-timeline">
                <div class="ab-timeline__spine"><div class="ab-timeline__spine-fill"></div></div>

                <?php
                $steps = [
                    ['01', 'التفكير من منطق الأعمال أولاً', 'نناقش الربحية والمنطق قبل التصميم لضمان عائد استثمار حقيقي لكل ميزة. نوائم التنفيذ التقني مع أهدافك التجارية.', 'left', 'dark'],
                    ['02', 'خبرة المنصات متعددة الأدوار', 'أنظمة للعملاء والموظفين والإدارة مع صلاحيات دقيقة قائمة على الأدوار وسير عمل محسّن.', 'right', 'light'],
                    ['03', 'من الجوال إلى لوحة التحكم', 'حلول متكاملة تضمن تجربة مستخدم سلسة عبر كل المنصات، من تطبيقات المستهلكين إلى الأنظمة الخلفية المعقدة.', 'left', 'light'],
                    ['04', 'الأمن والوعي بالمخاطر', 'تطبيق معايير حماية البيانات والخصوصية من الطبقات الأساسية للبنية لحماية أصول أعمالك.', 'right', 'light'],
                    ['05', 'تسليم واضح وقابل للتتبع', 'إدارة مشاريع احترافية تبقيك على اطلاع بكل خطوة في المسار بشفافية كاملة.', 'left', 'primary'],
                    ['06', 'تعاون مرن', 'نعمل كشريك تقني أو كذراع تنفيذي حسب احتياجاتك الخاصة وقدراتك الداخلية.', 'right', 'light'],
                ];
                foreach ($steps as $i => [$num, $title, $desc, $side, $variant]) : ?>
                    <div class="ab-timeline__step ab-timeline__step--<?php echo esc_attr($side); ?> reveal" style="--delay:<?php echo esc_attr($i * 80); ?>ms">
                        <div class="ab-timeline__text">
                            <h4><?php echo esc_html($title); ?></h4>
                            <p><?php echo esc_html($desc); ?></p>
                        </div>
                        <div class="ab-timeline__dot ab-timeline__dot--<?php echo esc_attr($variant); ?>">
                            <span><?php echo esc_html($num); ?></span>
                        </div>
                        <div class="ab-timeline__spacer"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         4. ENGINEERING EXPERTISE
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--dark">
        <div class="ab-section--dark__grid"></div>
        <div class="container">
            <div class="ab-header ab-header--center reveal">
                <h2 class="ab-title ab-title--light">خبرة هندسية خلف كل عملية</h2>
                <p class="ab-subtitle ab-subtitle--light">مبنية على خبرة عملية في تنفيذ منتجات رقمية حساسة عبر قطاعات معقدة.</p>
            </div>

            <div class="ab-grid ab-grid--3">
                <?php
                $expertise = [
                    ['precision_manufacturing', 'خبرة تشغيلية', 'بناء أنظمة تعالج آلاف العمليات يومياً بكفاءة حرجة للمهام.'],
                    ['stack', 'إتقان الـ Stack التقني', 'إتقان تقني شامل يغطي الواجهات الحديثة والأنظمة الخلفية الموزعة المعقدة.'],
                    ['encrypted', 'تركيز على الأمن', 'تشفير البيانات وحماية الثغرات وفق أعلى المعايير العالمية للصناعة.'],
                    ['cloud_upload', 'نشر سلس', 'التعامل مع متطلبات الرفع الصارمة ومعايير القبول في متاجر التطبيقات العالمية.'],
                    ['handshake', 'تنفيذ بقيادة الشريك', 'العمل بانسجام مع فرق خارجية لضمان وحدة كاملة في الرؤية والتماسك التقني.'],
                    ['sync_alt', 'سير عمل حديث', 'اعتماد منهجيات Agile محسّنة وخطوط CI/CD لضمان السرعة وجودة الكود.'],
                ];
                foreach ($expertise as $i => [$icon, $title, $desc]) : ?>
                    <div class="ab-glass-card reveal" style="--delay:<?php echo esc_attr($i * 90); ?>ms">
                        <div class="ab-glass-card__icon">
                            <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                        </div>
                        <h5><?php echo esc_html($title); ?></h5>
                        <p><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         5. PRODUCT PHILOSOPHY
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--white">
        <div class="container">
            <div class="ab-header ab-header--center reveal">
                <h2 class="ab-title">فلسفتنا في المنتجات</h2>
                <div class="ab-divider"></div>
            </div>

            <div class="ab-philosophy">
                <?php
                $philosophy = [
                    ['01', 'لا نبدأ بالكود', 'نبدأ برسم منطق العمل ورحلة المستخدم الكاملة قبل كتابة أول سطر كود. فهم "لماذا" هو شرطنا الأساسي لفهم "كيف".'],
                    ['02', 'لا نبني واجهات فحسب', 'الجمال مهم، لكن الوظيفة والكفاءة والأمان أسس لا نساوم عليها أبداً. الشاشة الجميلة عديمة الفائدة إذا فشل النظام خلفها.'],
                    ['03', 'لا نبالغ في الوعود', 'نتحدث بشفافية عمّا يمكن تحقيقه تقنياً والجداول الزمنية الواقعية دون مبالغة. النزاهة هي جوهر ثقافتنا الهندسية.'],
                    ['04', 'نبني للتوسع', 'نتوقع نجاحك، ونصمم النظام لاستيعاب نمو ضخم في الحجم منذ اليوم الأول. بنيتنا تنمو مع نمو أعمالك.'],
                ];
                foreach ($philosophy as $i => [$num, $title, $desc]) : ?>
                    <div class="ab-phil-item reveal" style="--delay:<?php echo esc_attr($i * 100); ?>ms">
                        <div class="ab-phil-item__num"><?php echo esc_html($num); ?></div>
                        <div class="ab-phil-item__body">
                            <h4><?php echo esc_html($title); ?></h4>
                            <p><?php echo esc_html($desc); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         6. SECTOR EXPERIENCE
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--muted-soft">
        <div class="container">
            <div class="ab-split-header reveal">
                <div class="ab-split-header__main">
                    <h2 class="ab-title">تجربة عبر مختلف القطاعات</h2>
                    <p class="ab-subtitle">حلول تقنية متخصصة وفهم عميق للتحديات الفريدة في صناعات سريعة النمو.</p>
                </div>
            </div>

            <div class="ab-sector-grid">
                <?php
                $sectors = ['اللوجستيات والتوصيل', 'حفلات الأعراس والفعاليات', 'الخدمات العقارية والصيانة', 'الأسواق الرقمية', 'التجارة الإلكترونية', 'التعليم والتدريب', 'منصات الخدمات', 'العمليات التجارية'];
                foreach ($sectors as $i => $sector) : ?>
                    <div class="ab-sector-pill reveal" style="--delay:<?php echo esc_attr($i * 60); ?>ms"><?php echo esc_html($sector); ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         7. TECHNICAL PARTNERSHIPS
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--dark">
        <div class="ab-section--dark__grid"></div>
        <div class="ab-timeline-glow ab-timeline-glow--1"></div>
        <div class="ab-timeline-glow ab-timeline-glow--2"></div>
        <div class="container">
            <div class="ab-header ab-header--center reveal">
                <div class="ab-eyebrow ab-eyebrow--center ab-eyebrow--outline">تحالفات استراتيجية</div>
                <h2 class="ab-title ab-title--light">شراكات وتعاونات تقنية</h2>
                <p class="ab-subtitle ab-subtitle--light">نوفر نماذج تعاون احترافية لوكالات التصميم وشركات البرمجيات لإتمام مشاريعها بأعلى جودة هندسية.</p>
            </div>

            <div class="ab-grid ab-grid--3">
                <?php
                $partnerships = [
                    ['smartphone', 'تنفيذ تطبيقات الجوال', 'التعامل مع الجانب التقني لشركات التقنية مع الالتزام الصارم بهوية العلامة والمتطلبات.'],
                    ['extension', 'تطوير وحدات المنتج', 'بناء ميزات جديدة أو تحسين وحدات تقنية متخصصة داخل أنظمتك الحالية.'],
                    ['branding_watermark', 'تطبيق White-label', 'منصات مخصصة تُسلّم لك لتكون جزءاً من خدماتك تحت علامتك التجارية.'],
                    ['handshake', 'تنفيذ مشترك', 'العمل كفريق موحد على مشاريع ضخمة تتطلب توزيع الجهود وخبرة عميقة.'],
                    ['support_agent', 'دعم فريق التطوير', 'توفير مهندسين متخصصين لسد فجوات المهارات في فريقك لفترات أو مراحل محددة.'],
                    ['history_edu', 'تحسين المنتجات الحالية', 'مراجعة الكود الحالي، إصلاح الأخطاء، وزيادة كفاءة الأنظمة القديمة المتعثرة.'],
                ];
                foreach ($partnerships as $i => [$icon, $title, $desc]) : ?>
                    <div class="ab-glass-card reveal" style="--delay:<?php echo esc_attr($i * 90); ?>ms">
                        <div class="ab-glass-card__icon">
                            <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                        </div>
                        <h5><?php echo esc_html($title); ?></h5>
                        <p><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="ab-center-btn reveal">
                <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="ab-btn ab-btn--primary ab-btn--lg">ناقش شراكة</a>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         8. STRATEGIC PARTNERSHIPS (LOGOS)
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--white ab-logos-section">
        <div class="container">
            <h2 class="ab-logos__label reveal">شراكات استراتيجية</h2>

            <div class="ab-logos__grid reveal" style="--delay:100ms">
                <?php
                $companies = [
                    ['Microsoft', 'https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg'],
                    ['Google',    'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg'],
                    ['Amazon',    'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'],
                    ['AWS',       'https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg'],
                    ['Azure',     'https://upload.wikimedia.org/wikipedia/commons/f/fa/Microsoft_Azure.svg'],
                    ['Apple',     'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg'],
                    ['Samsung',   'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg'],
                    ['Oracle',    'https://upload.wikimedia.org/wikipedia/commons/5/50/Oracle_logo.svg'],
                ];
                foreach ($companies as $i => [$name, $src]) : ?>
                    <div class="ab-logos__item" style="--delay:<?php echo esc_attr($i * 60); ?>ms">
                        <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($name); ?>" loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>

            <p class="ab-logos__disclaimer reveal" style="--delay:200ms">
                تختلف طبيعة التعاون؛ فقد عملنا كشريك تقني بعلامة بيضاء (White-label) لوكالات، أو كمطورين لوحدات متخصصة، أو كمستشارين هندسيين لفرق نامية.
            </p>
        </div>
    </section>

    <!-- ═══════════════════════════════
         9. TRANSPARENCY
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--white">
        <div class="container">
            <div class="ab-transparency-card reveal">
                <div class="ab-transparency-card__icon">
                    <span class="material-symbols-outlined">verified_user</span>
                </div>
                <div class="ab-transparency-card__body">
                    <h2>الشفافية في العمل والأدوار</h2>
                    <p>في SpinesTech، نؤمن بالوضوح المهني. بعض الأعمال التي نفذناها كانت كشريك تقني خفي (White-label) لوكالات أخرى، بينما مشاريع أخرى كانت مباشرة لعملائنا. نلتزم دائماً باتفاقيات عدم الإفصاح (NDA) ونفخر بدورنا في نجاح كل مشروع بغض النظر عن ظهور واجهتنا.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         9. GULF MARKET FIT
    ═══════════════════════════════ -->
    <section class="ab-section ab-section--muted-soft">
        <div class="container">
            <h2 class="ab-title ab-title--center reveal">مصمم لفهم احتياجات سوق الخليج</h2>

            <div class="ab-grid ab-grid--5">
                <?php
                $gulf = [
                    ['language', 'عربي أولاً / جاهز لـ RTL', 'دعم كامل لتجارب المستخدم العربية و RTL من مستوى الكود.'],
                    ['account_tree', 'التركيز على سير العمل', 'تصميم أنظمة تناسب سير العمل التجاري الإقليمي والتوقعات الثقافية.'],
                    ['admin_panel_settings', 'تحكم إداري', 'لوحات تحكم قوية تمنحك سيطرة كاملة على العمليات المحلية المعقدة.'],
                    ['rocket_launch', 'تسليم قابل للتوسع', 'مواكبة الطفرة الرقمية والنمو السريع في منطقة الخليج.'],
                    ['handshake', 'صديق للشركاء', 'بناء علاقات إقليمية طويلة الأمد قائمة على الثقة والاحترافية.'],
                ];
                foreach ($gulf as $i => [$icon, $title, $desc]) : ?>
                    <div class="ab-gulf-card reveal" style="--delay:<?php echo esc_attr($i * 90); ?>ms">
                        <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                        <h6><?php echo esc_html($title); ?></h6>
                        <p><?php echo esc_html($desc); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════
         10. FINAL CTA
    ═══════════════════════════════ -->
    <section class="ab-cta">
        <div class="ab-cta__grid"></div>
        <div class="ab-cta__glow"></div>
        <div class="container ab-cta__inner reveal">
            <h2>تبحث عن شريك يبني المنتجات<br>كأنظمة أعمال قابلة للتوسع؟</h2>
            <p>دعنا نناقش كيف يمكننا تحويل رؤيتك إلى منتج رقمي متين وقابل للتوسع يتصدّر السوق.</p>
            <div class="ab-cta__actions">
                <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="ab-btn ab-btn--primary ab-btn--lg">ابدأ مشروعك</a>
                <a href="<?php echo esc_url(home_url('/case-studies/')); ?>" class="ab-btn ab-btn--outline-light ab-btn--lg">تصفح دراسات الحالة</a>
            </div>
        </div>
    </section>

</main>

<script>
(function () {
    var els = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window)) {
        els.forEach(function (el) { el.classList.add('reveal--visible'); });
        return;
    }
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal--visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
    els.forEach(function (el) { observer.observe(el); });
})();
</script>

<?php get_footer(); ?>