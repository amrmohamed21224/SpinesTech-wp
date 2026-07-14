<?php
/**
 * Page Template: Contact ("تواصل معنا")
 * File: page-contact.php
 *
 * 100% static Arabic content — no ACF, no custom fields.
 * Form posts to: POST /wp-json/spinestech/v1/submissions/contact
 * (handled generically by the theme's existing js/forms.js via the
 * data-st-form attribute + honeypot field "website" + #st-form-alert,
 * matching the same convention used by the consultation modal.)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<div class="ct-page" dir="rtl">
<main>

<!-- ══════════════════════════════════════════
     HERO
══════════════════════════════════════════ -->
<section class="ct-hero">
    <canvas id="ct-hero-canvas" class="ct-hero__canvas"></canvas>

    <div class="ct-hero__labels" aria-hidden="true">
        <span class="ct-float-pill ct-float-pill--1">مشروع جديد</span>
        <span class="ct-float-pill ct-float-pill--2">تطبيق جوال</span>
        <span class="ct-float-pill ct-float-pill--3">لوحة تحكم</span>
        <span class="ct-float-pill ct-float-pill--4">شراكة تقنية</span>
        <span class="ct-float-pill ct-float-pill--5">تحت هوية الشريك</span>
        <span class="ct-float-pill ct-float-pill--6">تطوير منتج قائم</span>
    </div>

    <div class="container ct-hero__inner">
        <span class="ct-reveal ct-badge" style="--ct-delay:0.05s">تواصل معنا</span>
        <h1 class="ct-reveal ct-hero__title" style="--ct-delay:0.15s">
            لنحوّل فكرتك إلى منتج رقمي قابل للتشغيل والنمو
        </h1>
        <p class="ct-reveal ct-hero__subtitle" style="--ct-delay:0.25s">
            نحن شريكك التقني الموثوق في منطقة الخليج، نقدم حلولاً برمجية متكاملة تبدأ من الفكرة وتصل إلى الاستقرار التقني والتوسع البرمجي.
        </p>
        <div class="ct-reveal ct-hero__trust" style="--ct-delay:0.35s">
            <span><span class="material-symbols-outlined">check_circle</span> دعم فني مستمر</span>
            <span><span class="material-symbols-outlined">check_circle</span> شراكة استراتيجية</span>
            <span><span class="material-symbols-outlined">check_circle</span> تنفيذ بمعايير عالمية</span>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     FORM + INFO
══════════════════════════════════════════ -->
<section class="ct-section ct-section--white" id="ct-form-section">
    <div class="container ct-form-grid">

        <!-- Form -->
        <div class="ct-reveal ct-form-col" style="--ct-delay:0.05s">
            <div class="ct-form-card">
                <h3 class="ct-form-card__title">ابدأ المحادثة اليوم</h3>

                <div id="st-form-alert" class="alert alert--hidden" role="alert"></div>

                <form id="st-contact-form" class="ct-form" data-st-form="contact" novalidate>
                    <!-- honeypot -->
                    <input type="text" name="website" class="visually-hidden" tabindex="-1" autocomplete="off" />

                    <div class="ct-form-row">
                        <div class="form-group">
                            <label for="ct-name">الاسم الكامل</label>
                            <input class="form-control" type="text" id="ct-name" name="name" placeholder="مثال: عبد الله بن محمد" required />
                        </div>
                        <div class="form-group">
                            <label for="ct-email">البريد الإلكتروني</label>
                            <input class="form-control" type="email" id="ct-email" name="email" placeholder="example@domain.com" required />
                        </div>
                    </div>

                    <div class="ct-form-row">
                        <div class="form-group">
                            <label for="ct-phone">رقم واتساب</label>
                            <input class="form-control" type="tel" id="ct-phone" name="phone" placeholder="+966 000 000 000" />
                        </div>
                        <div class="form-group">
                            <label for="ct-country">الدولة</label>
                            <select class="form-control" id="ct-country" name="country">
                                <option>السعودية</option>
                                <option>الإمارات</option>
                                <option>الكويت</option>
                                <option>قطر</option>
                                <option>البحرين</option>
                                <option>عمان</option>
                                <option>مصر</option>
                                <option>أخرى</option>
                            </select>
                        </div>
                    </div>

                    <div class="ct-form-row">
                        <div class="form-group">
                            <label for="ct-request-type">نوع الطلب</label>
                            <select class="form-control" id="ct-request-type" name="request_type">
                                <option>مشروع جديد</option>
                                <option>تطوير منتج قائم</option>
                                <option>تطبيق جوال فقط</option>
                                <option>لوحة تحكم / منصة ويب</option>
                                <option>شراكة تنفيذ تقنية</option>
                                <option>تنفيذ تحت هوية الشريك</option>
                                <option>استشارة مبدئية</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ct-stage">مرحلة المشروع</label>
                            <select class="form-control" id="ct-stage" name="stage">
                                <option>فكرة فقط</option>
                                <option>لدي تصميم</option>
                                <option>لدي Backend أو API</option>
                                <option>لدي منتج قائم</option>
                                <option>أحتاج بناء كامل</option>
                                <option>غير محدد بعد</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ct-budget">الميزانية المتوقعة (اختياري)</label>
                        <input class="form-control" type="text" id="ct-budget" name="budget" placeholder="نطاق الميزانية التقريبي" />
                    </div>

                    <div class="form-group">
                        <label for="ct-message">وصف مختصر للمشروع</label>
                        <textarea class="form-control" id="ct-message" name="message" rows="4" placeholder="أخبرنا المزيد عن رؤيتك..."></textarea>
                    </div>

                    <button type="submit" class="ct-submit-btn">
                        <span>إرسال الطلب</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Info sidebar -->
        <div class="ct-reveal ct-info-col" style="--ct-delay:0.15s">

            <div class="ct-contact-panel">
                <div class="ct-contact-panel__glow ct-contact-panel__glow--1" aria-hidden="true"></div>
                <div class="ct-contact-panel__glow ct-contact-panel__glow--2" aria-hidden="true"></div>
                <h3 class="ct-contact-panel__title">تواصل مباشر</h3>

                <div class="ct-contact-item">
                    <span class="material-symbols-outlined">chat</span>
                    <div>
                        <p class="ct-contact-item__label">واتساب</p>
                        <p class="ct-contact-item__value" dir="ltr">+20 1099293903</p>
                    </div>
                </div>
                <div class="ct-contact-item">
                    <span class="material-symbols-outlined">mail</span>
                    <div>
                        <p class="ct-contact-item__label">البريد الإلكتروني</p>
                        <p class="ct-contact-item__value">contact@spinestech.com</p>
                    </div>
                </div>
                <div class="ct-contact-item">
                    <span class="material-symbols-outlined">public</span>
                    <div>
                        <p class="ct-contact-item__label">المنطقة</p>
                        <p class="ct-contact-item__value">المملكة العربية السعودية &amp; الخليج العربي</p>
                    </div>
                </div>
            </div>

            <?php
            $perks = array(
                array( 'verified',     'رد واضح',                       'نلتزم بالرد على جميع الاستفسارات خلال أقل من 24 ساعة عمل.' ),
                array( 'architecture', 'نطاق أوضح قبل التنفيذ',         'نقوم بتحليل المتطلبات تقنياً لنعطيك صورة دقيقة عن رحلة التطوير.' ),
                array( 'groups',       'مناسب للشركات والشركاء',       'نماذج تعاون مرنة تناسب الشركات الناشئة والوكالات البرمجية.' ),
            );
            foreach ( $perks as $perk ) :
                list( $icon, $ptitle, $ptext ) = $perk;
            ?>
            <div class="ct-perk-card">
                <div class="ct-perk-card__icon">
                    <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                </div>
                <div>
                    <h4 class="ct-perk-card__title"><?php echo esc_html( $ptitle ); ?></h4>
                    <p class="ct-perk-card__text"><?php echo esc_html( $ptext ); ?></p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     REQUEST TYPE CARDS
══════════════════════════════════════════ -->
<section class="ct-section ct-section--gray">
    <div class="container">
        <div class="ct-reveal ct-section__header ct-section__header--center">
            <h2 class="ct-h2">ما الذي تحتاجه اليوم؟</h2>
            <p class="ct-lead">حلول تقنية مصممة لتلبية احتياجاتك الخاصة</p>
        </div>

        <div class="ct-cards-grid">
            <?php
            $request_cards = array(
                array( 'rocket_launch', 'مشروع جديد',              'بناء المنتج من الصفر، من الفكرة إلى الإطلاق في المتاجر.' ),
                array( 'upgrade',       'تطوير منتج قائم',         'تحسين الأداء، إضافة ميزات جديدة، أو إعادة هيكلة الكود.' ),
                array( 'smartphone',    'تطبيق جوال فقط',          'تطبيقات native أو cross-platform بتجربة مستخدم استثنائية.' ),
                array( 'dashboard',     'منصة ويب / لوحة تحكم',    'أنظمة إدارة بيانات معقدة ومنصات SaaS احترافية.' ),
                array( 'handshake',     'شراكة تنفيذ تقنية',       'نعمل كفريق تقني داخلي لشركتك بمرونة تامة.' ),
                array( 'visibility_off','تنفيذ تحت هوية الشريك',   'تنفيذ المشاريع لصالح الوكالات كفريق غير معلن (White Label).' ),
            );
            foreach ( $request_cards as $i => $card ) :
                list( $icon, $ctitle, $ctext ) = $card;
            ?>
            <div class="ct-reveal ct-req-card" style="--ct-delay:<?php echo esc_attr( $i * 0.07 ); ?>s">
                <div class="ct-req-card__icon">
                    <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                </div>
                <h4 class="ct-req-card__title"><?php echo esc_html( $ctitle ); ?></h4>
                <p class="ct-req-card__text"><?php echo esc_html( $ctext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     WHAT HAPPENS NEXT — timeline
══════════════════════════════════════════ -->
<section class="ct-section ct-section--white">
    <div class="container">
        <div class="ct-reveal ct-section__header ct-section__header--center">
            <h2 class="ct-h2">ماذا يحدث بعد إرسال الطلب؟</h2>
        </div>

        <div class="ct-timeline">
            <div class="ct-timeline__line" aria-hidden="true"></div>
            <?php
            $timeline = array(
                array( '١', 'مراجعة التفاصيل', 'فريقنا يحلل طلبك بدقة لفهم الرؤية والأهداف التقنية.' ),
                array( '٢', 'تحديد المسار المناسب', 'نقترح أفضل التقنيات والمنهجيات المناسبة لميزانيتك وجدولك.' ),
                array( '٣', 'مناقشة النطاق', 'جلسة عمل لضبط المواصفات النهائية وضمان توافق الرؤى.' ),
                array( '٤', 'خطوة تنفيذ واضحة', 'الانتقال الفعلي للتعاقد والبدء في بناء منتجك الرقمي.' ),
            );
            foreach ( $timeline as $i => $step ) :
                list( $num, $stitle, $stext ) = $step;
            ?>
            <div class="ct-reveal ct-timeline__step" style="--ct-delay:<?php echo esc_attr( $i * 0.08 ); ?>s">
                <div class="ct-timeline__num"><?php echo esc_html( $num ); ?></div>
                <h4 class="ct-timeline__title"><?php echo esc_html( $stitle ); ?></h4>
                <p class="ct-timeline__text"><?php echo esc_html( $stext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     B2B PARTNERSHIP
══════════════════════════════════════════ -->
<section class="ct-section ct-section--dark">
    <div class="ct-b2b__glow" aria-hidden="true"></div>
    <div class="container ct-b2b">

        <div class="ct-reveal ct-b2b__content" style="--ct-delay:0.05s">
            <span class="ct-badge ct-badge--light">شراكات B2B</span>
            <h2 class="ct-b2b__title">ندعم الوكالات والشركات التقنية كذراع تنفيذ موثوق</h2>
            <p class="ct-b2b__text">إذا كنت وكالة تسويق، شركة استشارات، أو شركة برمجيات تحتاج لتوسيع قدرات فريقك التقني، فنحن نوفر لك نماذج تعاون احترافية تحت هويتك أو كشريك استراتيجي.</p>

            <div class="ct-b2b__box">
                <p class="ct-b2b__box-title">نماذجنا مثالية لـ:</p>
                <ul class="ct-b2b__list">
                    <li><span class="material-symbols-outlined">check_circle</span> وكالات التسويق التي تريد تقديم حلول تقنية متكاملة لعملائها.</li>
                    <li><span class="material-symbols-outlined">check_circle</span> الشركات التقنية التي تحتاج فريق دعم سريع لمشاريع مفاجئة.</li>
                    <li><span class="material-symbols-outlined">check_circle</span> رواد الأعمال الذين يحتاجون شريكاً تقنياً مؤسساً (CTO as a Service).</li>
                </ul>
            </div>
        </div>

        <div class="ct-b2b__grid">
            <?php
            $b2b_cards = array(
                array( 'partner_exchange', 'تنفيذ لصالح شريك تقني',        'نعمل معك كفريق متكامل لإتمام مشاريع عملائك بأعلى جودة.' ),
                array( 'shield_person',    'تنفيذ تحت هوية الشريك',        'White-Label: نحن نعمل خلف الكواليس، وأنت الواجهة أمام عميلك.' ),
                array( 'group_add',        'دعم فرق التطوير',              'زيادة سعة فريقك الحالي بمطورين متخصصين في مجالات محددة.' ),
                array( 'extension',        'تطوير وحدات داخل منتج قائم',   'بناء ميزات أو Microservices مستقلة لدمجها في أنظمتك.' ),
            );
            foreach ( $b2b_cards as $i => $card ) :
                list( $icon, $ctitle, $ctext ) = $card;
            ?>
            <div class="ct-reveal ct-b2b-card" style="--ct-delay:<?php echo esc_attr( 0.1 + $i * 0.07 ); ?>s">
                <span class="material-symbols-outlined ct-b2b-card__icon"><?php echo esc_html( $icon ); ?></span>
                <h4 class="ct-b2b-card__title"><?php echo esc_html( $ctitle ); ?></h4>
                <p class="ct-b2b-card__text"><?php echo esc_html( $ctext ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ══════════════════════════════════════════
     FAQ
══════════════════════════════════════════ -->
<section class="ct-section ct-section--white">
    <div class="container ct-faq-container">
        <div class="ct-reveal ct-section__header ct-section__header--center">
            <h2 class="ct-h2">الأسئلة الشائعة</h2>
        </div>

        <div class="ct-faq">
            <?php
            $faqs = array(
                array( 'كم تستغرق عملية البدء في المشروع؟', 'بعد استلام الطلب ومناقشة التفاصيل، عادة ما نبدأ في مرحلة التخطيط والنمذجة خلال 3-5 أيام عمل من توقيع الاتفاقية.', true ),
                array( 'هل تقدمون خدمات الدعم الفني بعد الإطلاق؟', 'نعم، جميع مشاريعنا تشمل فترة ضمان ودعم فني مجانية، مع إمكانية التعاقد على صيانة سنوية لضمان استقرار المنتج وتحديثه.', false ),
                array( 'هل يمكنكم العمل مع فريق تقني داخلي لدينا؟', 'بالتأكيد، لدينا خبرة واسعة في الاندماج مع الفرق القائمة، سواء في كتابة الكود أو مراجعة المعمارية التقنية أو تطوير وحدات مستقلة.', false ),
                array( 'هل تحفظون حقوق الملكية الفكرية للكود؟', 'بمجرد تسليم المشروع ودفع المستحقات، تنتقل ملكية الكود المصدري والحقوق الفكرية بالكامل إلى العميل وفقاً للاتفاق المبرم.', false ),
            );
            foreach ( $faqs as $i => $faq ) :
                list( $q, $a, $open ) = $faq;
            ?>
            <details class="ct-faq__item"<?php echo $open ? ' open' : ''; ?>>
                <summary class="ct-faq__trigger">
                    <?php echo esc_html( $q ); ?>
                    <span class="material-symbols-outlined ct-faq__chevron">expand_more</span>
                </summary>
                <div class="ct-faq__panel"><?php echo esc_html( $a ); ?></div>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════ -->
<section class="ct-section-wrap-cta">
    <div class="container">
        <div class="ct-cta">
            <svg class="ct-cta__waves" preserveAspectRatio="none" viewBox="0 0 100 100" aria-hidden="true">
                <path d="M0,50 Q25,25 50,50 T100,50" fill="none" stroke="white" stroke-width="0.15"></path>
                <path d="M0,30 Q25,55 50,30 T100,30" fill="none" stroke="white" stroke-width="0.15"></path>
                <path d="M0,70 Q25,45 50,70 T100,70" fill="none" stroke="white" stroke-width="0.15"></path>
            </svg>
            <div class="ct-cta__inner">
                <h2 class="ct-reveal ct-cta__title">مستعد لبناء شيء استثنائي؟</h2>
                <p class="ct-reveal ct-cta__text">فريق SpinesTech التقني جاهز للاستماع لتحديك القادم وتحويله إلى واقع رقمي ملموس.</p>
                <div class="ct-reveal ct-cta__actions">
                    <a href="#ct-form-section" class="ct-btn ct-btn--primary">ابدأ مشروعك الآن</a>
                    <a href="https://wa.me/201099293903" class="ct-btn ct-btn--ghost" target="_blank" rel="noopener">تحدث معنا عبر واتساب</a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
</div><!-- /.ct-page -->

<?php get_footer(); ?>