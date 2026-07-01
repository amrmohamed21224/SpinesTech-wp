<?php
/**
 * Archive: st_service
 */
get_header();

$services = st_query_cpt( 'st_service' );
$is_rtl   = st_dir() === 'rtl';
$arrow    = $is_rtl ? 'arrow_back' : 'arrow_forward';

$featured = ! empty( $services ) ? array_shift( $services ) : null;
$rest     = $services;
?>

<main class="services-page" dir="<?php echo esc_attr( st_dir() ); ?>">

    <!-- ════════ HERO ════════ -->
    <section class="sv-hero">
        <div class="sv-hero__inner container">
            <div class="sv-hero__badge">
                <span class="material-symbols-outlined">bolt</span>
                <?php echo esc_html( st_t( 'خدماتنا', 'spinestech' ) ); ?>
            </div>
            <h1 class="sv-hero__title">
                <?php echo esc_html( st_t( 'نحوّل التحديات الرقمية إلى', 'spinestech' ) ); ?>
                <span class="sv-hero__accent"><?php echo esc_html( st_t( 'فرص استراتيجية نمو.', 'spinestech' ) ); ?></span>
            </h1>
            <p class="sv-hero__sub">
                <?php echo esc_html( st_t( 'نقدم في SpinesTech منظومة متكاملة من الخدمات التقنية المصممة خصيصاً لتلبية متطلبات القطاع الحكومي والخاص في المملكة.', 'spinestech' ) ); ?>
            </p>
        </div>
    </section>

    <!-- ════════ FEATURED CARD — split layout ════════ -->
    <?php if ( $featured ) : ?>
    <section class="sv-featured">
        <div class="container">
            <a href="<?php echo esc_url( st_cpt_link( 'services', $featured['slug'] ) ); ?>" class="sv-featured__card">

                <!-- Text Side -->
                <div class="sv-featured__body">
                    <span class="sv-featured__tag">
                        <span class="material-symbols-outlined"><?php echo esc_html( $featured['icon'] ?? 'code' ); ?></span>
                        <?php echo esc_html( st_t( 'الأكثر طلباً', 'spinestech' ) ); ?>
                    </span>
                    <h2 class="sv-featured__title"><?php echo esc_html( $featured['title'] ); ?></h2>
                    <p class="sv-featured__desc"><?php echo esc_html( $featured['description'] ); ?></p>
                    <span class="sv-featured__btn">
                        <span class="material-symbols-outlined"><?php echo esc_html( $arrow ); ?></span>
                        <?php echo esc_html( st_t( 'اعرف المزيد', 'spinestech' ) ); ?>
                    </span>
                </div>

                <!-- Image Side -->
                <div class="sv-featured__media">
                    <?php
                    // 1) صورة مخصصة من الـ CPT (لو موجودة)
                    // 2) صورة ثابتة من assets/images/services/ باسم slug الخدمة
                    // 3) fallback أيقونة خضرا
                    $cpt_image   = $featured['image'] ?? '';
                    $slug_image  = get_template_directory_uri() . '/assets/images/services/og-image.png';
                    $use_img_src = ! empty( $cpt_image ) ? $cpt_image : $slug_image;
                    ?>
                    <img
                        src="<?php echo esc_url( $use_img_src ); ?>"
                        alt="<?php echo esc_attr( $featured['title'] ); ?>"
                        class="sv-featured__img"
                        loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    />
                    <!-- Fallback لو الصورة مش موجودة -->
                    <div class="sv-featured__img-fallback" style="display:none;">
                        <span class="material-symbols-outlined sv-featured__img-icon">
                            <?php echo esc_html( $featured['icon'] ?? 'developer_mode' ); ?>
                        </span>
                    </div>
                    <!-- decorative overlay -->
                    <div class="sv-featured__media-overlay"></div>
                </div>

            </a>
        </div>
    </section>
    <?php endif; ?>

    <!-- ════════ SERVICES GRID ════════ -->
    <?php if ( ! empty( $rest ) ) : ?>
    <section class="sv-grid-wrap">
        <div class="container">
            <div class="sv-grid">
                <?php foreach ( $rest as $s ) : ?>
                    <a href="<?php echo esc_url( st_cpt_link( 'services', $s['slug'] ) ); ?>" class="sv-card">
                        <div class="sv-card__icon-box">
                            <span class="material-symbols-outlined"><?php echo esc_html( $s['icon'] ?? 'code' ); ?></span>
                        </div>
                        <h2 class="sv-card__title"><?php echo esc_html( $s['title'] ); ?></h2>
                        <p class="sv-card__desc"><?php echo esc_html( $s['description'] ); ?></p>
                        <span class="sv-card__more">
                            <?php echo esc_html( st_t( 'اعرف المزيد', 'spinestech' ) ); ?>
                            <span class="material-symbols-outlined"><?php echo esc_html( $arrow ); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ════════ CTA ════════ -->
    <section class="sv-cta">
        <div class="container sv-cta__inner">
            <div>
                <h2 class="sv-cta__title"><?php echo esc_html( st_t( 'هل أنت جاهز للتحول الرقمي؟', 'spinestech' ) ); ?></h2>
                <p class="sv-cta__sub"><?php echo esc_html( st_t( 'تحدث إلى فريقنا اليوم لنرسم معاً طريقة تناسب احتياجاتك الفعلية.', 'spinestech' ) ); ?></p>
            </div>
            <div class="sv-cta__btns">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="sv-cta__btn sv-cta__btn--primary">
                    <?php echo esc_html( st_t( 'تواصل معنا الآن', 'spinestech' ) ); ?>
                    <span class="material-symbols-outlined"><?php echo esc_html( $arrow ); ?></span>
                </a>
                <a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" class="sv-cta__btn sv-cta__btn--ghost">
                    <?php echo esc_html( st_t( 'استكشف أعمالنا', 'spinestech' ) ); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>