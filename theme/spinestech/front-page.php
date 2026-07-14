<?php get_header(); ?>
<?php
$is_rtl = st_locale() === 'ar';
$arrow  = $is_rtl ? 'arrow_back' : 'arrow_forward';
?>
<main class="home" dir="<?php echo esc_attr(st_dir()); ?>">

    <!-- ═══════════════════════════════
         1. HERO
    ═══════════════════════════════ -->
    <section class="home-hero">
        <div class="home-hero__bg">
            <div class="home-hero__grid"></div>
            <div class="home-hero__glow home-hero__glow--1"></div>
            <div class="home-hero__glow home-hero__glow--2"></div>
        </div>
        <div class="home-hero__overlay"></div>

        <div class="container home-hero__inner">
            <div class="home-hero__badge">
                <span class="material-symbols-outlined">verified</span>
                <?php echo esc_html($is_rtl ? 'شريك تقني لبناء منتجات رقمية جاهزة للتشغيل' : 'Trusted technology partner'); ?>
            </div>

            <h1 class="home-hero__title">
                <?php echo esc_html($is_rtl
                    ? 'نطوّر منصات رقمية وتطبيقات أعمال جاهزة للتشغيل والنمو'
                    : 'We build digital platforms and business apps ready to run and grow'); ?>
            </h1>

            <p class="home-hero__subtitle">
                <?php echo esc_html($is_rtl
                    ? 'SpinesTech شريك تقني يساعد الشركات وروّاد الأعمال والجهات التقنية على بناء تطبيقات جوال، منصات ويب، لوحات تحكم، أنظمة حجوزات، أسواق رقمية، وحلول تشغيلية مبنية على سير عمل واضح وقابل للتوسع.'
                    : 'SpinesTech is a technology partner helping companies and entrepreneurs build scalable digital products.'); ?>
            </p>

            <p class="home-hero__quote">
                <?php echo esc_html($is_rtl
                    ? 'نمزج بين التفكير المنتج، العمق الهندسي، وفهم العمليات التجارية لبناء حلول تخدم المستخدمين، الفرق التشغيلية، ونمو الأعمال.'
                    : 'We blend product thinking, engineering depth, and business process understanding.'); ?>
            </p>

            <div class="home-hero__actions">
                <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="home-hero__btn home-hero__btn--primary">
                    <?php echo esc_html($is_rtl ? 'ابدأ مشروعك معنا' : 'Start your project'); ?>
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <a href="<?php echo esc_url(home_url('/case-studies/')); ?>" class="home-hero__btn home-hero__btn--ghost">
                    <?php echo esc_html($is_rtl ? 'استعرض دراسات الحالة' : 'View case studies'); ?>
                </a>
            </div>

            <div class="home-hero__chips">
                <div class="home-hero__chip">
                    <span class="material-symbols-outlined">smartphone</span>
                    <?php echo esc_html($is_rtl ? 'تطبيقات جوال' : 'Mobile apps'); ?>
                </div>
                <div class="home-hero__chip">
                    <span class="material-symbols-outlined">dashboard</span>
                    <?php echo esc_html($is_rtl ? 'لوحات تحكم' : 'Dashboards'); ?>
                </div>
                <div class="home-hero__chip">
                    <span class="material-symbols-outlined">settings_suggest</span>
                    <?php echo esc_html($is_rtl ? 'منصات تشغيلية' : 'Operational platforms'); ?>
                </div>
                <div class="home-hero__chip">
                    <span class="material-symbols-outlined">handshake</span>
                    <?php echo esc_html($is_rtl ? 'شراكات تنفيذ تقنية' : 'Tech execution partnerships'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/home/sections'); ?>

</main>
<?php get_footer(); ?>