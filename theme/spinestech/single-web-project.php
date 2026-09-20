<?php
/**
 * single-web-project.php
 *
 * Cinematic page template for a single web project.
 * Rendered by the virtual router in inc/web-projects-router.php.
 *
 * Data is sourced entirely from inc/web-projects-config.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ── Resolve the project slug ─────────────────────────────────────── */
$_wp_slug = $GLOBALS['st_current_web_project_slug']
    ?? st_web_project_slug_from_request()
    ?? '';

$_wp_cfg = function_exists( 'st_web_project_config' ) ? st_web_project_config( $_wp_slug ) : null;

if ( ! $_wp_cfg ) {
    // Unknown slug → hard 404.
    status_header( 404 );
    include get_template_directory() . '/404.php';
    exit;
}

/* ── Helpers & locals ─────────────────────────────────────────────── */
$locale   = function_exists( 'st_locale' ) ? st_locale() : 'ar';
$is_rtl   = $locale === 'ar';
$dir      = $is_rtl ? 'rtl' : 'ltr';
$arrow    = $is_rtl ? 'arrow_back' : 'arrow_forward';

$wp_name        = (string) st_wp_text( (array) $_wp_cfg['name'] );
$wp_tagline     = (string) st_wp_text( (array) $_wp_cfg['tagline'] );
$wp_desc        = (string) st_wp_text( (array) $_wp_cfg['description'] );
$wp_type        = (string) st_wp_text( (array) $_wp_cfg['type'] );
$wp_sector      = (string) st_wp_text( (array) $_wp_cfg['sector'] );
$wp_highlights  = (array)  st_wp_text( (array) $_wp_cfg['highlights'] );
$wp_tech        = (array)  ( $_wp_cfg['tech'] ?? [] );
$wp_color       = (string) ( $_wp_cfg['color'] ?? '#036d36' );
$wp_color_soft  = (string) ( $_wp_cfg['color_soft'] ?? 'rgba(3,109,54,0.12)' );
$wp_color_glow  = (string) ( $_wp_cfg['color_glow'] ?? 'rgba(3,109,54,0.25)' );
$wp_live_url    = (string) ( $_wp_cfg['live_url'] ?? '#' );
$wp_year        = (string) ( $_wp_cfg['year'] ?? '' );

$img_preview  = function_exists( 'st_wp_img' ) ? st_wp_img( (string) ( $_wp_cfg['images']['preview'] ?? '' ) ) : '';
$img_hero     = function_exists( 'st_wp_img' ) ? st_wp_img( (string) ( $_wp_cfg['images']['hero'] ?? '' ) ) : '';
$img_screens  = [];
foreach ( (array) ( $_wp_cfg['images']['screens'] ?? [] ) as $_s ) {
    $img_screens[] = function_exists( 'st_wp_img' ) ? st_wp_img( (string) $_s ) : '';
}

$back_url  = function_exists( 'st_url' ) ? st_url( '/case-studies/' ) : home_url( '/case-studies/' );
$start_url = function_exists( 'st_url' ) ? st_url( '/contact/' )      : home_url( '/contact/' );

/* ── SEO ──────────────────────────────────────────────────────────── */
add_filter( 'pre_get_document_title', static function () use ( $wp_name, $locale ): string {
    return $wp_name . ' | SpinesTech';
}, 999 );

add_action( 'wp_head', static function () use ( $wp_tagline ): void {
    if ( function_exists( 'st_seo_set_description' ) ) {
        st_seo_set_description( $wp_tagline );
    }
}, 3 );

/* ── Render ───────────────────────────────────────────────────────── */
get_header();
?>
<style>
:root {
    --wp-accent:      <?php echo esc_attr( $wp_color ); ?>;
    --wp-accent-soft: <?php echo esc_attr( $wp_color_soft ); ?>;
    --wp-accent-glow: <?php echo esc_attr( $wp_color_glow ); ?>;
}
</style>

<main class="wp-project" dir="<?php echo esc_attr( $dir ); ?>">

    <!-- ══════════════════════════════════════════════════
         1. HERO
    ══════════════════════════════════════════════════ -->
    <section class="wp-hero">
        <div class="wp-hero__bg" aria-hidden="true">
            <div class="wp-hero__glow"></div>
            <div class="wp-hero__grid"></div>
        </div>
        <div class="container wp-hero__inner">

            <!-- Back link -->
            <a href="<?php echo esc_url( $back_url ); ?>" class="wp-hero__back">
                <span class="material-symbols-outlined" aria-hidden="true">
                    <?php echo $is_rtl ? 'arrow_forward' : 'arrow_back'; ?>
                </span>
                <?php echo esc_html( $is_rtl ? 'العودة لدراسات الحالة' : 'Back to Case Studies' ); ?>
            </a>

            <!-- Eyebrow -->
            <p class="wp-hero__eyebrow">
                <span class="wp-hero__dot" aria-hidden="true"></span>
                <?php echo esc_html( $is_rtl ? 'مشروع ويب' : 'Web Project' ); ?>
                &nbsp;·&nbsp;
                <?php echo esc_html( $wp_type ); ?>
            </p>

            <!-- Title -->
            <h1 class="wp-hero__title"><?php echo esc_html( $wp_name ); ?></h1>

            <!-- Tagline -->
            <p class="wp-hero__tagline"><?php echo esc_html( $wp_tagline ); ?></p>

            <!-- Meta pills -->
            <div class="wp-hero__meta">
                <span class="wp-hero__pill">
                    <span class="material-symbols-outlined" aria-hidden="true">category</span>
                    <?php echo esc_html( $wp_sector ); ?>
                </span>
                <?php if ( $wp_year ) : ?>
                <span class="wp-hero__pill">
                    <span class="material-symbols-outlined" aria-hidden="true">calendar_today</span>
                    <?php echo esc_html( $wp_year ); ?>
                </span>
                <?php endif; ?>
            </div>

            <!-- CTAs -->
            <div class="wp-hero__actions">
                <a href="<?php echo esc_url( $wp_live_url ); ?>"
                   target="_blank" rel="noopener noreferrer"
                   class="wp-hero__btn wp-hero__btn--primary">
                    <?php echo esc_html( $is_rtl ? 'زيارة الموقع' : 'Visit Website' ); ?>
                    <span class="material-symbols-outlined" aria-hidden="true">open_in_new</span>
                </a>
                <a href="<?php echo esc_url( $start_url ); ?>" class="wp-hero__btn wp-hero__btn--ghost">
                    <?php echo esc_html( $is_rtl ? 'ابدأ مشروعك' : 'Start a Project' ); ?>
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $arrow ); ?></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════
         2. BROWSER MOCKUP — hero screenshot
    ══════════════════════════════════════════════════ -->
    <?php if ( $img_hero ) : ?>
    <section class="wp-mockup">
        <div class="container wp-mockup__inner">
            <div class="wp-browser-frame">
                <div class="wp-browser-bar" aria-hidden="true">
                    <span class="wp-browser-dot wp-browser-dot--red"></span>
                    <span class="wp-browser-dot wp-browser-dot--yellow"></span>
                    <span class="wp-browser-dot wp-browser-dot--green"></span>
                    <span class="wp-browser-url"><?php echo esc_html( parse_url( $wp_live_url, PHP_URL_HOST ) ?: $wp_live_url ); ?></span>
                </div>
                <div class="wp-browser-screen">
                    <img src="<?php echo esc_url( $img_hero ); ?>"
                         alt="<?php echo esc_attr( $wp_name ); ?>"
                         class="wp-browser-img"
                         width="1920"
                         height="1080"
                         loading="lazy"
                         decoding="async">
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ══════════════════════════════════════════════════
         3. OVERVIEW — description + highlights + tech
    ══════════════════════════════════════════════════ -->
    <section class="wp-overview">
        <div class="container wp-overview__inner">

            <div class="wp-overview__copy">
                <span class="wp-eyebrow">
                    <?php echo esc_html( $is_rtl ? 'نظرة عامة' : 'Overview' ); ?>
                </span>
                <h2 class="wp-overview__title">
                    <?php echo esc_html( $is_rtl ? 'عن المشروع' : 'About the Project' ); ?>
                </h2>
                <p class="wp-overview__desc"><?php echo esc_html( $wp_desc ); ?></p>

                <?php if ( ! empty( $wp_tech ) ) : ?>
                <div class="wp-tech-stack">
                    <p class="wp-tech-label">
                        <?php echo esc_html( $is_rtl ? 'التقنيات المستخدمة' : 'Tech Stack' ); ?>
                    </p>
                    <div class="wp-tech-pills">
                        <?php foreach ( $wp_tech as $t ) : ?>
                        <span class="wp-tech-pill"><?php echo esc_html( $t ); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <?php if ( ! empty( $wp_highlights ) ) : ?>
            <ul class="wp-highlights">
                <?php foreach ( $wp_highlights as $h ) : ?>
                <li class="wp-highlights__item">
                    <span class="material-symbols-outlined wp-highlights__icon" aria-hidden="true">check_circle</span>
                    <span><?php echo esc_html( $h ); ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

        </div>
    </section>

    <!-- ══════════════════════════════════════════════════
         4. EXTRA SCREENSHOTS
    ══════════════════════════════════════════════════ -->
    <?php
    $valid_screens = array_filter( $img_screens );
    if ( ! empty( $valid_screens ) ) :
    ?>
    <section class="wp-screens">
        <div class="container wp-screens__inner">
            <span class="wp-eyebrow wp-eyebrow--center">
                <?php echo esc_html( $is_rtl ? 'لقطات من الموقع' : 'Website Screenshots' ); ?>
            </span>
            <div class="wp-screens__grid" style="--cols:<?php echo count( $valid_screens ); ?>">
                <?php foreach ( $valid_screens as $i => $src ) : ?>
                <div class="wp-screens__item">
                    <div class="wp-browser-frame wp-browser-frame--sm">
                        <div class="wp-browser-bar" aria-hidden="true">
                            <span class="wp-browser-dot wp-browser-dot--red"></span>
                            <span class="wp-browser-dot wp-browser-dot--yellow"></span>
                            <span class="wp-browser-dot wp-browser-dot--green"></span>
                        </div>
                        <div class="wp-browser-screen">
                            <img src="<?php echo esc_url( $src ); ?>"
                                 alt="<?php echo esc_attr( $wp_name . ' — ' . ( $i + 1 ) ); ?>"
                                 class="wp-browser-img"
                                 width="1280"
                                 height="720"
                                 loading="lazy"
                                 decoding="async">
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ══════════════════════════════════════════════════
         5. CTA
    ══════════════════════════════════════════════════ -->
    <section class="wp-cta">
        <div class="container wp-cta__inner">
            <h2 class="wp-cta__title">
                <?php echo esc_html( $is_rtl
                    ? 'هل لديك مشروع مماثل؟'
                    : 'Have a Similar Project in Mind?' ); ?>
            </h2>
            <p class="wp-cta__desc">
                <?php echo esc_html( $is_rtl
                    ? 'نبني مواقع ومنصات ويب احترافية مخصصة لعلامتك التجارية — من الفكرة حتى الإطلاق.'
                    : 'We build professional, custom websites and web platforms for your brand — from concept to launch.' ); ?>
            </p>
            <div class="wp-cta__actions">
                <a href="<?php echo esc_url( $start_url ); ?>" class="wp-cta__btn wp-cta__btn--primary">
                    <?php echo esc_html( $is_rtl ? 'ابدأ مشروعك' : 'Start Your Project' ); ?>
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $arrow ); ?></span>
                </a>
                <a href="<?php echo esc_url( $back_url ); ?>" class="wp-cta__btn wp-cta__btn--ghost">
                    <?php echo esc_html( $is_rtl ? 'استعرض المزيد من مشاريعنا' : 'Browse More Projects' ); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
