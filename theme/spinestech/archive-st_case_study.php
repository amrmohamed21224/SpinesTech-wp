<?php
/**
 * Single Case Study Template
 * Template: single-st_case_study.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

while ( have_posts() ) :
    the_post();

    $post_id        = get_the_ID();
    $title          = get_the_title();
    $client         = get_post_meta( $post_id, 'st_client',    true );
    $sector         = get_post_meta( $post_id, 'st_sector',    true );
    $challenge      = get_post_meta( $post_id, 'st_challenge', true );
    $solution       = get_post_meta( $post_id, 'st_solution',  true );
    $result         = get_post_meta( $post_id, 'st_result',    true );
    $stats_raw      = get_post_meta( $post_id, 'st_stats',     true );
    $featured_img   = get_the_post_thumbnail_url( $post_id, 'full' );

    // Decode stats JSON safely
    $stats = array();
    if ( ! empty( $stats_raw ) ) {
        $decoded = json_decode( $stats_raw, true );
        if ( is_array( $decoded ) ) {
            $stats = $decoded;
        }
    }

    // Detect RTL
    $dir = function_exists( 'st_dir' ) ? st_dir() : ( is_rtl() ? 'rtl' : 'ltr' );

    // Helper: resolve asset URL
    $asset_fn = function( $path ) {
        return function_exists( 'st_asset' )
            ? st_asset( $path )
            : get_template_directory_uri() . '/' . ltrim( $path, '/' );
    };
?>

<div class="single-case-study" dir="<?php echo esc_attr( $dir ); ?>">

    <!-- ═══════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════ -->
    <section class="single-case-study__hero">
        <div class="single-case-study__hero-grid-bg" aria-hidden="true"></div>

        <div class="container single-case-study__hero-inner">

            <!-- Left: text content -->
            <div class="single-case-study__hero-content">

                <?php if ( ! empty( $sector ) ) : ?>
                <div class="single-case-study__badge">
                    <span class="single-case-study__badge-icon" aria-hidden="true">✦</span>
                    <?php echo esc_html( st_t( 'Case Study' ) . ': ' . $sector ); ?>
                </div>
                <?php endif; ?>

                <h1 class="single-case-study__title">
                    <?php echo esc_html( $title ); ?>
                </h1>

                <?php if ( ! empty( $client ) ) : ?>
                <p class="single-case-study__subtitle">
                    <?php echo esc_html( $client ); ?>
                </p>
                <?php endif; ?>

                <!-- Tags from taxonomy terms, fallback to meta -->
                <?php
                $tags = get_the_terms( $post_id, 'st_case_study_tag' );
                if ( empty( $tags ) || is_wp_error( $tags ) ) {
                    // Build generic tag list from sector
                    $tags_list = array_filter( array( $sector ) );
                } else {
                    $tags_list = wp_list_pluck( $tags, 'name' );
                }
                if ( ! empty( $tags_list ) ) :
                ?>
                <div class="single-case-study__tags">
                    <?php foreach ( $tags_list as $tag ) : ?>
                    <span class="single-case-study__tag"><?php echo esc_html( $tag ); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="single-case-study__hero-ctas">
                    <a href="#cs-details" class="single-case-study__btn single-case-study__btn--primary">
                        <?php echo esc_html( st_t( 'Explore Case Study' ) ); ?>
                    </a>
                    <?php if ( ! empty( $challenge ) ) : ?>
                    <a href="#cs-challenge" class="single-case-study__btn single-case-study__btn--outline">
                        <?php echo esc_html( st_t( 'View Platform Flow' ) ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: featured image / visual -->
            <div class="single-case-study__hero-visual">
                <?php if ( ! empty( $featured_img ) ) : ?>
                    <div class="single-case-study__mockup-stack">
                        <img
                            class="single-case-study__mockup-top"
                            src="<?php echo esc_url( $featured_img ); ?>"
                            alt="<?php echo esc_attr( $title ); ?>"
                            loading="eager"
                        />
                    </div>
                <?php else : ?>
                    <div class="single-case-study__visual-fallback" aria-hidden="true">
                        <div class="single-case-study__visual-fallback-icon">
                            <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <rect width="80" height="80" rx="20" fill="var(--cs-primary)" fill-opacity="0.12"/>
                                <path d="M20 56V28a4 4 0 0 1 4-4h32a4 4 0 0 1 4 4v28a4 4 0 0 1-4 4H24a4 4 0 0 1-4-4Z" stroke="var(--cs-primary)" stroke-width="2.5"/>
                                <path d="M28 36h24M28 44h16" stroke="var(--cs-primary)" stroke-width="2.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <p class="single-case-study__visual-fallback-label">
                            <?php echo esc_html( $title ); ?>
                        </p>
                    </div>
                <?php endif; ?>
                <div class="single-case-study__hero-glow" aria-hidden="true"></div>
            </div>

        </div><!-- /.hero-inner -->
    </section>

    <!-- ═══════════════════════════════════════════
         PROJECT SNAPSHOT
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $client ) || ! empty( $sector ) ) : ?>
    <section class="single-case-study__snapshot" id="cs-details">
        <div class="container">
            <h2 class="single-case-study__section-title single-case-study__section-title--center">
                <?php echo esc_html( st_t( 'Project Snapshot' ) ); ?>
            </h2>
            <div class="single-case-study__snapshot-grid">
                <?php if ( ! empty( $client ) ) : ?>
                <div class="single-case-study__snapshot-card">
                    <span class="single-case-study__snapshot-label"><?php echo esc_html( st_t( 'CLIENT' ) ); ?></span>
                    <p class="single-case-study__snapshot-value"><?php echo esc_html( $client ); ?></p>
                </div>
                <?php endif; ?>

                <?php if ( ! empty( $sector ) ) : ?>
                <div class="single-case-study__snapshot-card">
                    <span class="single-case-study__snapshot-label"><?php echo esc_html( st_t( 'INDUSTRY' ) ); ?></span>
                    <p class="single-case-study__snapshot-value"><?php echo esc_html( $sector ); ?></p>
                </div>
                <?php endif; ?>

                <?php
                // Additional fixed-context snapshot items from generic content
                $snap_extras = array(
                    array( 'label' => st_t( 'STATUS' ),   'value' => st_t( 'Delivered' ), 'highlight' => true ),
                );
                foreach ( $snap_extras as $snap ) :
                ?>
                <div class="single-case-study__snapshot-card<?php echo $snap['highlight'] ? ' single-case-study__snapshot-card--highlight' : ''; ?>">
                    <span class="single-case-study__snapshot-label"><?php echo esc_html( $snap['label'] ); ?></span>
                    <p class="single-case-study__snapshot-value"><?php echo esc_html( $snap['value'] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         STATS (only if data exists)
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $stats ) ) : ?>
    <section class="single-case-study__stats">
        <div class="container">
            <div class="single-case-study__stats-grid">
                <?php foreach ( $stats as $stat ) :
                    $stat_value = isset( $stat['value'] ) ? $stat['value'] : '';
                    $stat_label = isset( $stat['label'] ) ? $stat['label'] : '';
                    if ( empty( $stat_value ) && empty( $stat_label ) ) continue;
                ?>
                <div class="single-case-study__stat-item">
                    <span class="single-case-study__stat-value"><?php echo esc_html( $stat_value ); ?></span>
                    <span class="single-case-study__stat-label"><?php echo esc_html( $stat_label ); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         CHALLENGE / SOLUTION / RESULT CARDS
    ═══════════════════════════════════════════ -->
    <?php
    $cards = array();
    if ( ! empty( $challenge ) ) {
        $cards[] = array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>',
            'label' => st_t( 'Challenge' ),
            'text'  => $challenge,
            'mod'   => 'light',
            'id'    => 'cs-challenge',
        );
    }
    if ( ! empty( $solution ) ) {
        $cards[] = array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M9 12l2 2 4-4"/><rect x="3" y="3" width="18" height="18" rx="4"/></svg>',
            'label' => st_t( 'Solution' ),
            'text'  => $solution,
            'mod'   => 'dark',
            'id'    => '',
        );
    }
    if ( ! empty( $result ) ) {
        $cards[] = array(
            'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M3 17l4-4 4 4 6-8"/><path d="M21 7h-4v4"/></svg>',
            'label' => st_t( 'Result' ),
            'text'  => $result,
            'mod'   => 'accent',
            'id'    => '',
        );
    }
    ?>

    <?php if ( ! empty( $cards ) ) : ?>
    <section class="single-case-study__cards-section">
        <div class="container">
            <div class="single-case-study__cards-grid single-case-study__cards-grid--<?php echo count( $cards ); ?>">
                <?php foreach ( $cards as $card ) : ?>
                <div
                    class="single-case-study__card single-case-study__card--<?php echo esc_attr( $card['mod'] ); ?>"
                    <?php if ( $card['id'] ) echo 'id="' . esc_attr( $card['id'] ) . '"'; ?>
                >
                    <div class="single-case-study__card-icon">
                        <?php echo $card['icon']; // SVG — safe, no user input ?>
                    </div>
                    <h3 class="single-case-study__card-heading">
                        <?php echo esc_html( $card['label'] ); ?>
                    </h3>
                    <div class="single-case-study__card-body">
                        <?php echo wp_kses_post( $card['text'] ); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         MAIN CONTENT (the_content)
    ═══════════════════════════════════════════ -->
    <?php if ( get_the_content() ) : ?>
    <section class="single-case-study__content-section">
        <div class="container single-case-study__content-wrap">
            <?php the_content(); ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         CTA FOOTER STRIP
    ═══════════════════════════════════════════ -->
    <section class="single-case-study__cta-strip">
        <div class="single-case-study__cta-strip-glow" aria-hidden="true"></div>
        <div class="container single-case-study__cta-strip-inner">
            <div class="single-case-study__cta-text">
                <h2 class="single-case-study__cta-heading">
                    <?php echo esc_html( st_t( 'Building a Logistics Platform or Marketplace?' ) ); ?>
                </h2>
                <p class="single-case-study__cta-sub">
                    <?php echo esc_html( st_t( 'Leverage our experience in creating high-stakes operational dashboards and multi-role marketplaces.' ) ); ?>
                </p>
                <?php
                $contact_url = function_exists( 'st_url' )
                    ? st_url( 'contact' )
                    : home_url( '/contact/' );
                ?>
                <a href="<?php echo esc_url( $contact_url ); ?>" class="single-case-study__btn single-case-study__btn--primary single-case-study__btn--lg">
                    <?php echo esc_html( st_t( 'Start Your Project' ) ); ?>
                </a>
            </div>
            <div class="single-case-study__cta-visual" aria-hidden="true">
                <div class="single-case-study__cta-icon-ring">
                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="60" cy="60" r="58" stroke="var(--cs-primary)" stroke-opacity="0.25" stroke-width="1.5"/>
                        <circle cx="60" cy="60" r="42" stroke="var(--cs-primary)" stroke-opacity="0.15" stroke-width="1.5"/>
                        <circle cx="60" cy="60" r="26" fill="var(--cs-primary)" fill-opacity="0.08"/>
                        <path d="M50 60l7 7 13-14" stroke="var(--cs-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

</div><!-- /.single-case-study -->

<?php
endwhile;

get_footer();
?>