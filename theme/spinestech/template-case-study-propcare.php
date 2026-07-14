<?php
/**
 * Template Name: Case Study — PropCare 360
 * Template Post Type: st_case_study
 *
 * theme/spinestech/template-case-study-propcare.php
 *
 * Fully static, hardcoded one-off case study page for "PropCare 360".
 * Assign this template to the specific st_case_study post from
 * Page Attributes → Template in the WP editor.
 *
 * RTL Arabic content (matches the approved design, which is Arabic).
 * No dynamic postmeta, no ACF — everything is literal content.
 * Uses the theme's real header/footer (get_header/get_footer).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<div class="pc" dir="rtl">

    <!-- ═══════════════════════════════════════════
         01 · HERO
    ═══════════════════════════════════════════ -->
    <section class="pc__hero" id="hero">
        <div class="pc__hero-glow pc__hero-glow--1" aria-hidden="true"></div>
        <div class="pc__hero-glow pc__hero-glow--2" aria-hidden="true"></div>

        <div class="pc__container pc__hero-inner">

            <div class="pc__hero-content" data-pc-reveal>
                <span class="pc__badge">دراسة حالة من SpinesTech</span>
                <h1 class="pc__hero-title">منصة رقمية متكاملة لإدارة خدمات الأملاك والصيانة</h1>
                <p class="pc__hero-copy">
                    PropCare 360 تساعد شركات خدمات الأملاك على أتمتة العمليات، إدارة العقود، ورفع كفاءة فرق الصيانة عبر تجربة مستخدم عالمية.
                </p>
            </div>

            <div class="pc__hero-visual" data-pc-reveal data-pc-delay="150">

                <div class="pc__float pc__float--1">
                    <span class="material-symbols-outlined pc__float-icon pc__float-icon--secondary">verified_user</span>
                    <span>عقود نشطة</span>
                </div>
                <div class="pc__float pc__float--2">
                    <span class="material-symbols-outlined pc__float-icon pc__float-icon--error">pending_actions</span>
                    <span>طلبات معلقة</span>
                </div>
                <div class="pc__float pc__float--3">
                    <span class="material-symbols-outlined pc__float-icon pc__float-icon--tertiary">check_circle</span>
                    <span>زيارات مكتملة</span>
                </div>

                <div class="pc__hero-frame">
                    <div class="pc__browser">
                        <div class="pc__browser-chrome">
                            <span class="pc__browser-dot pc__browser-dot--red"></span>
                            <span class="pc__browser-dot pc__browser-dot--gold"></span>
                            <span class="pc__browser-dot pc__browser-dot--green"></span>
                        </div>
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmEcMblEGonXBUcWDLYRGAdH3fRDWBbRqMrYq0WU4CtvOiLQ-UXuai4E7h-FrIOL-uF5Hk3gn6ot5LBTeu7eartskzk8CNPBJqm4fobBNAf8dF62xun638hLDwHaGfUnHafkAdwUX_wW3wEkp81kP3jmrNeGNYk4EuDbdKcq1cVKdJ726e-eXyR9ZlfunPFsspTo1JJgb54Y-eWv4ZglmfBuBpz6dA2PsjY9LmVeWxeP4UnZIdcJUd-qMcf9qjrVE1mOBMzjocFEbf" alt="لوحة تحكم PropCare 360" loading="eager" />
                    </div>
                    <div class="pc__hero-phone">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5JX0FAdTsmPMc4FQFjmoCswN8LVnhogg8YSO0qVbWY1zUh4y2G7CoiO0a6DQHVVo3jzvMJPZEApLJxTWSIRBdV5CetKWM6a5ISL1p8j417Lg_Rc_UFZBQwfzrmuLswN4W-hLAo4yq53OBVBusJa5NIKTXjZ3uDilURWttILdu4ysEtTnUYKGGQDqV6Z6snKSGTFNmSMEG4DrMMxRTwoPtdTTVWnuhvrVOh2Q_-rut6p-FuUv2uc1nmoiOVUMix02nn403uRYVM8D6" alt="تطبيق PropCare 360" loading="eager" />
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         02 · التحديات (Before / After)
    ═══════════════════════════════════════════ -->
    <section class="pc__challenge" id="challenge">
        <div class="pc__container">

            <div class="pc__challenge-head" data-pc-reveal>
                <h2 class="pc__h2 pc__h2--light pc__h2--center">التحديات وحلول التحول الرقمي</h2>
                <span class="pc__underline" aria-hidden="true"></span>
            </div>

            <div class="pc__challenge-grid" data-pc-reveal-group>

                <div class="pc__before" data-pc-reveal>
                    <h3 class="pc__before-title">
                        <span class="material-symbols-outlined">history</span> قبل التحول
                    </h3>
                    <ul class="pc__numbered-list">
                        <li>
                            <span class="pc__num pc__num--error">01</span>
                            <p>تواصل يدوي مبعثر عبر المكالمات والرسائل مما يؤدي لضياع طلبات العملاء.</p>
                        </li>
                        <li>
                            <span class="pc__num pc__num--error">02</span>
                            <p>غياب تام للشفافية؛ العميل لا يعرف حالة زيارته، والإدارة لا تملك بيانات دقيقة.</p>
                        </li>
                        <li>
                            <span class="pc__num pc__num--error">03</span>
                            <p>صعوبة هائلة في تتبع تجديد العقود السنوية وجدولة الفنيين ميدانياً.</p>
                        </li>
                    </ul>
                </div>

                <div class="pc__after" data-pc-reveal data-pc-delay="120">
                    <h3 class="pc__after-title">
                        <span class="material-symbols-outlined">rocket_launch</span> بعد PropCare 360
                    </h3>
                    <ul class="pc__numbered-list">
                        <li>
                            <span class="pc__num pc__num--secondary">01</span>
                            <p>منصة موحدة لاستلام ومعالجة الطلبات تضمن عدم فقدان أي عميل.</p>
                        </li>
                        <li>
                            <span class="pc__num pc__num--secondary">02</span>
                            <p>تحديثات فورية للعميل ولوحات تحكم تفاعلية للإدارة في الوقت الفعلي.</p>
                        </li>
                        <li>
                            <span class="pc__num pc__num--secondary">03</span>
                            <p>أتمتة ذكية للعقود وجدولة تلقائية توفر 60% من الوقت الإداري.</p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         03 · لوحة تحكم الإدارة (Dashboard Showcase)
    ═══════════════════════════════════════════ -->
    <section class="pc__dashboard" id="dashboard">
        <div class="pc__container">

            <div class="pc__dashboard-head" data-pc-reveal>
                <h2 class="pc__h2 pc__h2--center">القوة المركزية: لوحة تحكم الإدارة</h2>
                <p class="pc__dashboard-sub">مركز عمليات شامل يمنح صناع القرار رؤية 360 درجة لكل ما يحدث في المنشأة.</p>
            </div>

            <!-- Full width 1 -->
            <div class="pc__showcase-block" data-pc-reveal>
                <div class="pc__browser pc__browser--wide">
                    <div class="pc__browser-chrome">
                        <span class="pc__browser-dot pc__browser-dot--red"></span>
                        <span class="pc__browser-dot pc__browser-dot--gold"></span>
                        <span class="pc__browser-dot pc__browser-dot--green"></span>
                    </div>
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTO57Mrh-m4BqWwiLFtQD8dmIPYhPLD3THY0V8pvRNTbORjImyTptc4F6LkJnVKWjpGzpoOtexybRDlvWb_u4zYHqmfd7OlHmzJ04udUHb9VN6t_KLWdLw8K7AgvufxUV3tpzQ0qbSEyL1Z7EXgvcHkvVr8HQx6XpuI-ll6OU15vxpKHF__0iC5fdxZfvXi4Qajf1y1Kc7O33fIUOzv--b6CQx14PfFskrsWRUnYWH-lDAaXcKM52BbvCoy5LIIdJ6ELjBkfa2UTnN" alt="تحليلات العمليات" loading="lazy" />
                </div>
                <div class="pc__showcase-caption pc__showcase-caption--center">
                    <h4>تحليلات ذكية وعروض الأسعار</h4>
                    <p>تحليلات واضحة لعروض الأسعار وحالة الصيانة، مصنفة حسب نوع الخدمة والمبنى.</p>
                </div>
            </div>

            <!-- 2-column grid -->
            <div class="pc__showcase-2col" data-pc-reveal-group>
                <div class="pc__showcase-block" data-pc-reveal>
                    <div class="pc__browser">
                        <div class="pc__browser-chrome">
                            <span class="pc__browser-dot pc__browser-dot--red"></span>
                            <span class="pc__browser-dot pc__browser-dot--gold"></span>
                            <span class="pc__browser-dot pc__browser-dot--green"></span>
                        </div>
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKHrXJSCCkL8eG2qvY6cpyxsCow3Q5gc7LDAm6o2pm0RgLS7HMegDzs9Vm-Jvbi0e7R2fjNMldC6lnyhZxfJYanIh7XYNq1ApbwVMKLX-wONoZaroJrxzvYyzqvxlGizjR5ai74uHhfXWwFTu4nSzD-tjl1EWoq0uhTgS9tETFKmuuDd8TPNBRZhGLA6ft7S8C64fPO_-WkimWX9w35o0B4GHcOZZBPS8jj2qDXlh3J8PiqdqMnhlbkl1_qNdaMY2Q66t4u_v5LdzZ" alt="اتجاهات الصيانة" loading="lazy" />
                    </div>
                    <div class="pc__showcase-caption">
                        <h4>تقارير تشغيلية</h4>
                        <p>تقارير تشغيلية تساعد الإدارة على متابعة الأداء ومؤشرات الإنجاز اليومية.</p>
                    </div>
                </div>
                <div class="pc__showcase-block" data-pc-reveal data-pc-delay="120">
                    <div class="pc__browser">
                        <div class="pc__browser-chrome">
                            <span class="pc__browser-dot pc__browser-dot--red"></span>
                            <span class="pc__browser-dot pc__browser-dot--gold"></span>
                            <span class="pc__browser-dot pc__browser-dot--green"></span>
                        </div>
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjm3GM3UEPEdJlbo4PY0KIzJPMWzYnUCD-ETtb2jtVaLj8I8JyokcQKcdShsjj00I69lmwPp385UOpJr7GYnHo41fuwXyy-c7758CRqnkTUMUHG2nz2dt4gmBRGsg_YolpnEGtkuq1Zmzc7ak4DfemYqvW2dd0o2CHPcfuFreWwHTax-zPzw3xZpZ4e2NwtFAPMl6JVhmJBZ7abOmc9_nd2Smd0NHi2VhxQqnsPDpbwTXSn8lVrm2GkOzEdzFZdJv4yuKm4dnSozlW" alt="توزيع العقود" loading="lazy" />
                    </div>
                    <div class="pc__showcase-caption">
                        <h4>إدارة العقود والزيارات</h4>
                        <p>لوحة تحكم تعرض مؤشرات العقود والزيارات والطلبات بدقة متناهية.</p>
                    </div>
                </div>
            </div>

            <!-- Full width 2 -->
            <div class="pc__showcase-block" data-pc-reveal>
                <div class="pc__browser pc__browser--wide">
                    <div class="pc__browser-chrome">
                        <span class="pc__browser-dot pc__browser-dot--red"></span>
                        <span class="pc__browser-dot pc__browser-dot--gold"></span>
                        <span class="pc__browser-dot pc__browser-dot--green"></span>
                    </div>
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBy2ibTTQzG6IHH_B4s62admjONVXhAJZ5i2GG3IGJtgO3ne60kaRBjo6_bzlUH8dWnnmABHM7qYygHzZSuGDiKbu--1KQLloI-pAtoirM0Xbep-V7hUkJmw5Kmsy7n7SLC-pxtnSuIAyHzTGvyyxJn9GXU5be1DRaME3XC71oEZ7NDOUvKq6kngRjh3G1PfUAAwIW6F1SXZ8BcNPqVvqahc-xKTYWzohpJIchqPGZXeO1ImyycDAxaWZLdvMGCUK3z9UBFMxGPMNpC" alt="إعدادات النظام" loading="lazy" />
                </div>
                <div class="pc__showcase-caption pc__showcase-caption--center">
                    <h4>إدارة الخدمات والمحتوى</h4>
                    <p>إدارة الخدمات والمحتوى من مكان واحد، بما في ذلك إعدادات الموقع، البانرات، والأسئلة الشائعة.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         04 · Feature Spotlights (3 alternating rows)
    ═══════════════════════════════════════════ -->
    <section class="pc__spotlights">
        <div class="pc__container pc__spotlights-inner">

            <div class="pc__spotlight" data-pc-reveal>
                <div class="pc__spotlight-text">
                    <span class="pc__pill pc__pill--secondary">إدارة العقود والزيارات</span>
                    <h3 class="pc__h2">تحكم كامل في العقود السنوية</h3>
                    <p class="pc__p">أتمتة عملية تجديد العقود مع إرسال تنبيهات ذكية للعملاء قبل انتهاء الاشتراك، مما يضمن استمرارية الإيرادات والخدمة.</p>
                    <ul class="pc__checklist">
                        <li><span class="material-symbols-outlined">check_circle</span> تنبيهات آلية للتجديد</li>
                        <li><span class="material-symbols-outlined">check_circle</span> أرشفة رقمية لكافة بنود العقد</li>
                        <li><span class="material-symbols-outlined">check_circle</span> جدولة الزيارات الدورية تلقائياً</li>
                    </ul>
                </div>
                <div class="pc__spotlight-visual pc__spotlight-visual--secondary">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuADI_HfRcF7XAvDVXOb-fq9ja1z0jUzQTH5ENN13QLfVA0v_-zONBqb046bzigjAlFz9jMR8XY38DWKPp_ZvBR-YtIxg4rBpO6ic-lH_rwFhCZ6KZc9Rl-Rws-zf7vFoiK5Uz5dCtw-RuxUafEe1B5Bs3ufGRjZztobxVYIsa3ZzqlSRbJxXfzB_6uRbfHzrC-pNYYJ9iybM-DudEYX2kMcTPOu4RXAdxOmlB_-WOjGY9_-yREMFuPHBKCiZ6kWW1V8u-KqeuTCiQCO" alt="ميزة إدارة العقود" loading="lazy" />
                </div>
            </div>

            <div class="pc__spotlight pc__spotlight--reverse" data-pc-reveal>
                <div class="pc__spotlight-text">
                    <span class="pc__pill pc__pill--primary">طلبات الصيانة</span>
                    <h3 class="pc__h2">رفع الطلبات ومتابعة الحالة</h3>
                    <p class="pc__p">واجهة بديهية تسمح للعملاء بوصف المشكلة، إرفاق الصور، وتحديد الموقع الجغرافي بدقة في ثوانٍ معدودة.</p>
                    <ul class="pc__checklist">
                        <li><span class="material-symbols-outlined">check_circle</span> إرفاق صور وفيديوهات للمشكلة</li>
                        <li><span class="material-symbols-outlined">check_circle</span> تتبع حي لمراحل الطلب</li>
                        <li><span class="material-symbols-outlined">check_circle</span> دردشة مباشرة مع الدعم الفني</li>
                    </ul>
                </div>
                <div class="pc__spotlight-visual pc__spotlight-visual--primary">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlSEa1xhd_he4PLWjcMvJTFxPOihgd8_3GZ481DSIgwWt3K7vhrR3pIjbb3uub7wJ7iCPM_miCjiFeL0w3LLbuHbc8H0Ho9dTXLyQXuibBjC9bBpYRsMVAawME9wQzdvfS-S5nprWxVxLPPq-GSNCwx_deryPDeYPXSzoH4Z1GXWCrir931ANDgdicuOrYjVsNo0zGicUX0TwAVAkxjiaNVTtqiFxfXr1RdkSnbCnUdFYC3RC1itlkqop13_YazWxxuIbMJFfMREXz" alt="ميزة طلبات الصيانة" loading="lazy" />
                </div>
            </div>

            <div class="pc__spotlight" data-pc-reveal>
                <div class="pc__spotlight-text">
                    <span class="pc__pill pc__pill--tertiary">عروض الأسعار</span>
                    <h3 class="pc__h2">مشاريع New و Reno</h3>
                    <p class="pc__p">سواء كان العميل يرغب في تأسيس جديد (New) أو ترميم مبنى قائم (Reno)، المنصة توفر تدفق عمل مخصص لكل حالة.</p>
                    <ul class="pc__checklist">
                        <li><span class="material-symbols-outlined">check_circle</span> تقديم عرض سعر إلكتروني مفصل</li>
                        <li><span class="material-symbols-outlined">check_circle</span> الموافقة والدفع الرقمي الفوري</li>
                        <li><span class="material-symbols-outlined">check_circle</span> إدارة المشاريع عبر مراحل زمنية</li>
                    </ul>
                </div>
                <div class="pc__spotlight-visual pc__spotlight-visual--tertiary">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdl_x_n1BiwKS9GnZmV5TT03gONSub7LHVMdVDCMjq1dyU0C-eJdROWKV0s6QSE2QBo55IW5H0V8BR2lDvd2vtCcpECh3WNDPx8ExLwB4SKVZYHbcSad_e_e0Eht2JjqX95eTJjhhG7shbusm6luQP39HxPMORSqBdhP1ykMxJvlnXJG-u0Rr8GyiTYUE00qizEDwh-chcw8v2zRsT7MyulvxrxXMgrqmHEOkyGO6kMbvwJOZJ5mWFOIENyVKtC96_scGBbePh77wC" alt="ميزة عروض الأسعار" loading="lazy" />
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         05 · رحلة العميل الرقمية (Mobile App Journey)
    ═══════════════════════════════════════════ -->
    <section class="pc__journey" id="app">
        <div class="pc__container">
            <div class="pc__journey-head" data-pc-reveal>
                <h2 class="pc__h2 pc__h2--center">رحلة العميل الرقمية</h2>
                <p class="pc__journey-sub">تدفقات مستخدم مدروسة بعناية لضمان أعلى معدلات التحويل والرضا.</p>
            </div>

            <div class="pc__journey-grid" data-pc-reveal-group>

                <div class="pc__journey-item" data-pc-reveal>
                    <div class="pc__mini-frame">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCm7TU8K-MqlmPVykISAkBT4V2YWBH2KAtL6vcI9lCm1dZiwNj4kLkpbuhXngfKeZ9IaoOh9FahprlsCuO8MfEeBLWsz3GRB2Oc8aHjc1AgGi8P7zcGpUZcIUD4BuMTBMQ50UqnelvmJDlyBgyYmmr2TRYvw1598fNAeGU1Y-95nzvSEPNmpUHpz2dUOPamozWOfbLIjRfr_yeKkNgEo9wIVnc6KavgEYel8UddugyjPQqkEDjGc0yUXVEYmq1iZdj8pCeiNsz80skD" alt="الرئيسية" loading="lazy" />
                    </div>
                    <h5>الرئيسية ولوحة التحكم</h5>
                    <p>نظرة شاملة على الخدمات والعروض</p>
                </div>

                <div class="pc__journey-item pc__journey-item--offset" data-pc-reveal data-pc-delay="80">
                    <div class="pc__mini-frame">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBqqAqNEPFMxoOz1tvx-z5bnNdzfdcReSdcZWBt2hBO4d4McEI740hfz0kNGtReu0ZUz34w_yC-QrUQNMX8-7Czv7FjihaSrHMN9gX9CGgnNR-CPud-0L-B5ibbNYrTQ2I-Yh8DnUN7xt8NvOHznRsfESenvaUDErH1VC1huvwVSk3y-eeO-dETbJQkZk-XUl3RETNIvoq_hVy4z5Ee829N5N3jFDhCnSxCWxNdqCZKm8XJPVyOBohDmh42RSiTJWgDwpCLDi7yf6dl" alt="الملف الشخصي" loading="lazy" />
                    </div>
                    <h5>بيانات العميل</h5>
                    <p>إدارة المعلومات الشخصية والعقارات</p>
                </div>

                <div class="pc__journey-item" data-pc-reveal data-pc-delay="160">
                    <div class="pc__mini-frame">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTJUNVYylKpVFN_6WXsvLFe-Zymz7873NvReYxXYjJ2YTU5mp-cH9cReBCJ4s-lGrumMAxwYo1MVe29mZR0VqdlrDXyDSeDK_W2vZZkDbCrX446xgYqfEmhqEQWvPvndi6-nWKgO7uaiqICnSkk7xenDsKv-jIw5Qs2LMnMM7MefG5fA6g7j2lbRB5iajZqUjfUci8PjSEQUpco_pvx5yhPEk22BYRKUlLI3MuvCVPqAN8HIFScSs7Rcu1j7cUH-deHpFhoT2u6cYj" alt="القائمة" loading="lazy" />
                    </div>
                    <h5>القائمة الجانبية</h5>
                    <p>سهولة الوصول لكافة أقسام المنصة</p>
                </div>

                <div class="pc__journey-item pc__journey-item--offset" data-pc-reveal data-pc-delay="240">
                    <div class="pc__mini-frame">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDPtc6362UiFIkeVruFPCzIk91CBUGx1NoaCHbZR75TaDu4JCPDxHIaC5BhVjCqy7jRGWBAm4OOQI53hKPM5vnV0_BcOqTBfMj89owTuFTixD_Z1gCYvITP8D0tiRCbWTUWxbJ8zdrUkXZEzkwpHpnywYihIAqU5-WRchntjzGukYO7ofAOae0Vms4JDwas1bBKIuXInUhnkl4PcwLFttLDjQ3tXVqaspLJEx8sE3jS0xHvrkz4cfpSGZsLQe4v29YoPaEhYNpMphtZ" alt="طلب جديد" loading="lazy" />
                    </div>
                    <h5>طلب صيانة جديد</h5>
                    <p>خطوات بسيطة لرفع بلاغ صيانة</p>
                </div>

                <div class="pc__journey-item" data-pc-reveal data-pc-delay="320">
                    <div class="pc__mini-frame">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCk5Yc6UfiUc2b6xRdk_wHlZB4kGqAqvbL2L6LuLNGqrgSZ1TojrVn0lx0TdaES_RhpXx15eGms4GXH5ZTuqAR0XRhjI0FNvqOiM8RZq0IeOkVofxRoj4U3ZB6k4NW2HYQCHHPfr_Cc2ewHWpOJLG4GWqvmpDAi6vJTozIWN5MA5ez6aVbVczyStIyuWVkeb4HUL8PMbG-UNDhPt8xn2gH6eg4l_X9I4XpM8I8vsZIrlQ529ebotkjgKD4AIFpwas9WC-51PF28Ay_k" alt="نوع المبنى" loading="lazy" />
                    </div>
                    <h5>تخصيص الطلب</h5>
                    <p>تحديد نوع الخدمة والمبنى بدقة</p>
                </div>

                <div class="pc__journey-item pc__journey-item--offset" data-pc-reveal data-pc-delay="400">
                    <div class="pc__mini-frame">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCo2RtHMvFbUJZ3W1rohhDGckvx5QJUMzShruoBjnZDKkSxx85pM9_rlSn7ujmfr_FPSnQDCWbzVO4VyaIVIJ1rMG5raaQrSv4xfhBNpN35XCwBiyt0wtNk0h0Bny5rX36XJkJd8-JVZRXoHIrTmECt15g86s8D2fswiSiSQRi4600focgTIwcLrtmzi0kis93OSc0DJC0_v__hny2UqL2kM76Z-05Jb_EGOuDyuK5-YYMZcrgHcpoXgqjgzrtoW-HD5194awKMiRMm" alt="تذكرة دعم" loading="lazy" />
                    </div>
                    <h5>تذاكر الدعم الفني</h5>
                    <p>متابعة حالة المشكلات التقنية</p>
                </div>

                <div class="pc__journey-item pc__journey-item--wide" data-pc-reveal data-pc-delay="480">
                    <div class="pc__mini-frame">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjzGOWjeP1bvaxJ2NpE_iQCyTn7PtQDyyzCrz0Ga-kOUmTR6Cj7BRUBMyDwgx7yb0jFu4fMpjH9kA4FbQF9smF8TbxUUFOG2t4kyL-tqLC__jXY6HHiuDUIKsmep8xi61KqK4bnEB6NJv1HF1w2glj7jUODE9PDCrvF3vsHrt1uXeXI3vVy_36MkmzicIevfDPGTBMxbTDFEHbAzBOxIPbp0kTu_T9F_ahjuzOIUU97xMpIZwEpTbBcrAaXasPoyuV_greL4nIGWqo" alt="محادثة الدعم" loading="lazy" />
                    </div>
                    <h5>الدردشة المباشرة</h5>
                    <p>تواصل فوري مع فريق الدعم</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         06 · تطبيق الفنيين (V2 Technician App)
    ═══════════════════════════════════════════ -->
    <section class="pc__v2">
        <div class="pc__v2-skew" aria-hidden="true"></div>
        <div class="pc__container pc__v2-inner">

            <div class="pc__v2-text" data-pc-reveal>
                <span class="pc__v2-badge">التوسع المستقبلي</span>
                <h2 class="pc__h2 pc__h2--light">تطبيق الفنيين الميداني (المرحلة الثانية)</h2>
                <p class="pc__v2-copy">تم تجهيز المنصة للتوسع مستقبلاً من خلال تطبيق للفنيين يغلق الحلقة التشغيلية بالكامل، مما يسمح بمتابعة دقيقة لكل زيارة ميدانية.</p>
                <ul class="pc__v2-list">
                    <li><span class="material-symbols-outlined">gps_fixed</span> تكامل مع GPS لتحديد مواقع العقارات بدقة.</li>
                    <li><span class="material-symbols-outlined">photo_camera</span> تقارير صور الإنجاز (قبل وبعد) الخدمة مباشرة.</li>
                    <li><span class="material-symbols-outlined">assignment_turned_in</span> توزيع ذكي للمهام حسب الموقع والخبرة.</li>
                </ul>
            </div>

            <div class="pc__v2-visual" data-pc-reveal data-pc-delay="150">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAj9n7Wfd90UWRbHo6nVjqBc0iVKN9Lrsj8CMiI-x6jmyWMviLwQ6qdeTONbxDLMYl6Kpx8ga14CqGWCo3GXxBqEEMUiSq11WDNPdbiBOnxjwfhfs7QwRfQSOj6yW5luMgTKMQNGkjKYqih-xLmcYqLbA1Ps3uHBuGglRemMSmaNMks-czTbybyU3zsJkX2gyR1WUdUbWpeejOV90K6oJDyhOke8Ek_RPK2hYRLolJcVsBMp3JKQ3_c55tXAbgLZathRgQrTXXMNzKn" alt="مفهوم تطبيق الفنيين" loading="lazy" />
                <div class="pc__v2-tag">
                    <span>V2<br>قريباً</span>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         07 · CTA
    ═══════════════════════════════════════════ -->
    <section class="pc__cta">
        <div class="pc__cta-bg" aria-hidden="true"></div>
        <div class="pc__container pc__cta-inner" data-pc-reveal>
            <h2 class="pc__cta-heading">هل تحتاج منصة تشغيلية مشابهة لعملك؟</h2>
            <p class="pc__cta-copy">
                في SpinesTech، نحول العمليات المعقدة إلى منتجات رقمية واضحة، قابلة للتوسع، ومصممة لتخدم فرق التشغيل والعملاء في نفس الوقت.
            </p>
            <span class="pc__cta-eyebrow">MOBILE APPS • DASHBOARDS • OPERATIONS PLATFORMS</span>

            <div class="pc__cta-ctas">
                <a href="/contact/" class="pc__btn pc__btn--secondary">ابدأ مشروعك مع SpinesTech</a>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'st_case_study' ) ?: home_url( '/case-studies/' ) ); ?>" class="pc__btn pc__btn--outline">مشاهدة أعمالنا السابقة</a>
            </div>
        </div>
    </section>

</div><!-- /.pc -->

<?php get_footer(); ?>