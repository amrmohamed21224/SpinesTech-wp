<?php
/**
 * Single Case Study Template
 * Template: single-st_case_study.php
 *
 * Dynamic sections are driven by post meta (JSON strings), following the
 * same pattern already used for `st_stats`. Any section whose meta is
 * empty is skipped automatically — nothing renders as "static demo text".
 *
 * META KEYS USED IN THIS TEMPLATE
 * ────────────────────────────────────────────────────────────────
 * st_client              string
 * st_sector              string
 * st_secondary_image     string (image URL) — optional 2nd hero mockup
 *
 * st_snapshot            JSON  [{ "label": "...", "value": "...", "highlight": true|false }, ...]
 *
 * st_opportunity_title   string
 * st_opportunity_text    string
 * st_opportunity_steps   JSON  [{ "icon": "route", "label": "Driver Route" }, ...]  (max ~5)
 *
 * st_perspectives        JSON  [{ "style": "light|dark", "icon": "person", "title": "...", "items": ["...","..."] }, ...]
 *
 * st_process_title       string
 * st_process_subtitle    string
 * st_process_steps       JSON  [{ "num": "01", "title": "...", "text": "..." }, ...]
 * st_process_image       string (image URL)
 * st_process_caption_title string
 * st_process_caption_sub   string
 *
 * st_pillars             JSON  [{ "image": "url", "title": "...", "items": ["...","..."] }, ...]
 *
 * st_depth_cards         JSON  [{ "icon": "ads_click", "title": "...", "text": "..." }, ...]
 *
 * st_trust_title         string
 * st_trust_text          string
 * st_trust_items         JSON  [{ "icon": "verified_user", "title": "...", "text": "..." }, ...]
 *
 * st_live_title          string
 * st_live_text           string
 * st_live_url            string (URL)
 * st_live_apps           JSON  [{ "icon": "smartphone", "label": "App Store" }, ...]
 *
 * st_tech_stack          JSON  [{ "icon": "api", "label": "Backend" }, ...]
 *
 * st_cta_title           string (falls back to default line)
 * st_cta_text            string (falls back to default line)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'st_cs_json' ) ) {
    function st_cs_json( $raw ) {
        if ( empty( $raw ) ) return array();
        $decoded = json_decode( $raw, true );
        return is_array( $decoded ) ? $decoded : array();
    }
}

get_header();

while ( have_posts() ) :
    the_post();

    $post_id        = get_the_ID();
    $title          = get_the_title();
    $client         = get_post_meta( $post_id, 'st_client',    true );
    $sector         = get_post_meta( $post_id, 'st_sector',    true );
    $featured_img   = get_the_post_thumbnail_url( $post_id, 'full' );
    $secondary_img  = get_post_meta( $post_id, 'st_secondary_image', true );

    // Subtitle: use excerpt if available, otherwise fall back to client name
    $subtitle = has_excerpt( $post_id ) ? get_the_excerpt( $post_id ) : $client;

    // Snapshot — fall back to client / sector / status if no explicit JSON set
    $snapshot = st_cs_json( get_post_meta( $post_id, 'st_snapshot', true ) );
    if ( empty( $snapshot ) ) {
        if ( ! empty( $client ) ) $snapshot[] = array( 'label' => st_t( 'CLIENT' ),   'value' => $client );
        if ( ! empty( $sector ) ) $snapshot[] = array( 'label' => st_t( 'INDUSTRY' ), 'value' => $sector );
        $snapshot[] = array( 'label' => st_t( 'STATUS' ), 'value' => st_t( 'Delivered' ), 'highlight' => true );
    }

    $opp_title  = get_post_meta( $post_id, 'st_opportunity_title', true );
    $opp_text   = get_post_meta( $post_id, 'st_opportunity_text',  true );
    $opp_steps  = st_cs_json( get_post_meta( $post_id, 'st_opportunity_steps', true ) );

    $perspectives = st_cs_json( get_post_meta( $post_id, 'st_perspectives', true ) );

    $proc_title    = get_post_meta( $post_id, 'st_process_title', true );
    $proc_sub      = get_post_meta( $post_id, 'st_process_subtitle', true );
    $proc_steps    = st_cs_json( get_post_meta( $post_id, 'st_process_steps', true ) );
    $proc_image    = get_post_meta( $post_id, 'st_process_image', true );
    $proc_cap_t    = get_post_meta( $post_id, 'st_process_caption_title', true );
    $proc_cap_s    = get_post_meta( $post_id, 'st_process_caption_sub', true );

    $pillars = st_cs_json( get_post_meta( $post_id, 'st_pillars', true ) );

    $depth_cards = st_cs_json( get_post_meta( $post_id, 'st_depth_cards', true ) );

    $trust_title = get_post_meta( $post_id, 'st_trust_title', true );
    $trust_text  = get_post_meta( $post_id, 'st_trust_text',  true );
    $trust_items = st_cs_json( get_post_meta( $post_id, 'st_trust_items', true ) );

    $live_title = get_post_meta( $post_id, 'st_live_title', true );
    $live_text  = get_post_meta( $post_id, 'st_live_text',  true );
    $live_url   = get_post_meta( $post_id, 'st_live_url',   true );
    $live_apps  = st_cs_json( get_post_meta( $post_id, 'st_live_apps', true ) );

    $tech_stack = st_cs_json( get_post_meta( $post_id, 'st_tech_stack', true ) );

    $cta_title = get_post_meta( $post_id, 'st_cta_title', true );
    $cta_text  = get_post_meta( $post_id, 'st_cta_text',  true );
    if ( empty( $cta_title ) ) $cta_title = st_t( 'Building a Logistics Platform or Marketplace?' );
    if ( empty( $cta_text ) )  $cta_text  = st_t( 'Leverage our experience in creating high-stakes operational dashboards and multi-role marketplaces.' );

    // Detect RTL
    $dir = function_exists( 'st_dir' ) ? st_dir() : ( is_rtl() ? 'rtl' : 'ltr' );
?>

<div class="single-case-study" dir="<?php echo esc_attr( $dir ); ?>">

    <!-- ═══════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════ -->
    <section class="single-case-study__hero">
        <div class="single-case-study__hero-grid-bg" aria-hidden="true"></div>

        <div class="container single-case-study__hero-inner">

            <div class="single-case-study__hero-content">

                <?php if ( ! empty( $sector ) ) : ?>
                <div class="single-case-study__badge">
                    <span class="material-symbols-outlined single-case-study__badge-icon" aria-hidden="true">verified</span>
                    <?php echo esc_html( st_t( 'Case Study' ) . ': ' . $sector ); ?>
                </div>
                <?php endif; ?>

                <h1 class="single-case-study__title">
                    <?php echo esc_html( $title ); ?>
                </h1>

                <?php if ( ! empty( $subtitle ) ) : ?>
                <p class="single-case-study__subtitle">
                    <?php echo esc_html( $subtitle ); ?>
                </p>
                <?php endif; ?>

                <?php
                $tags = get_the_terms( $post_id, 'st_case_study_tag' );
                $tags_list = ( empty( $tags ) || is_wp_error( $tags ) )
                    ? array_filter( array( $sector ) )
                    : wp_list_pluck( $tags, 'name' );
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
                    <?php if ( ! empty( $opp_steps ) ) : ?>
                    <a href="#cs-flow" class="single-case-study__btn single-case-study__btn--outline">
                        <?php echo esc_html( st_t( 'View Platform Flow' ) ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="single-case-study__hero-visual">
                <?php if ( ! empty( $featured_img ) ) : ?>
                    <div class="single-case-study__mockup-stack">
                        <?php if ( ! empty( $secondary_img ) ) : ?>
                            <img class="single-case-study__mockup-back" src="<?php echo esc_url( $secondary_img ); ?>" alt="" loading="lazy" />
                        <?php else : ?>
                            <div class="single-case-study__mockup-backdrop" aria-hidden="true"></div>
                        <?php endif; ?>
                        <img
                            class="single-case-study__mockup-top"
                            src="<?php echo esc_url( $featured_img ); ?>"
                            alt="<?php echo esc_attr( $title ); ?>"
                            loading="eager"
                        />
                        <div class="single-case-study__mockup-dot single-case-study__mockup-dot--a" aria-hidden="true"></div>
                        <div class="single-case-study__mockup-dot single-case-study__mockup-dot--b" aria-hidden="true"></div>
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
                        <p class="single-case-study__visual-fallback-label"><?php echo esc_html( $title ); ?></p>
                    </div>
                <?php endif; ?>
                <div class="single-case-study__hero-glow" aria-hidden="true"></div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         PROJECT SNAPSHOT
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $snapshot ) ) : ?>
    <section class="single-case-study__snapshot cs-reveal" id="cs-details">
        <div class="container">
            <h2 class="single-case-study__section-title single-case-study__section-title--center">
                <?php echo esc_html( st_t( 'Project Snapshot' ) ); ?>
            </h2>
            <div class="single-case-study__snapshot-grid">
                <?php foreach ( $snapshot as $snap ) :
                    $label = $snap['label'] ?? '';
                    $value = $snap['value'] ?? '';
                    if ( $label === '' && $value === '' ) continue;
                    $highlight = ! empty( $snap['highlight'] );
                ?>
                <div class="single-case-study__snapshot-card<?php echo $highlight ? ' single-case-study__snapshot-card--highlight' : ''; ?>">
                    <span class="single-case-study__snapshot-label"><?php echo esc_html( $label ); ?></span>
                    <p class="single-case-study__snapshot-value"><?php echo esc_html( $value ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         OPPORTUNITY (dark, connected icon steps)
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $opp_title ) || ! empty( $opp_steps ) ) : ?>
    <section class="single-case-study__opportunity cs-reveal" id="cs-flow">
        <div class="container">
            <div class="single-case-study__opportunity-head">
                <?php if ( ! empty( $opp_title ) ) : ?>
                    <h2 class="single-case-study__opportunity-title"><?php echo esc_html( $opp_title ); ?></h2>
                <?php endif; ?>
                <?php if ( ! empty( $opp_text ) ) : ?>
                    <p class="single-case-study__opportunity-text"><?php echo esc_html( $opp_text ); ?></p>
                <?php endif; ?>
            </div>

            <?php if ( ! empty( $opp_steps ) ) : ?>
            <div class="single-case-study__opportunity-steps">
                <div class="single-case-study__opportunity-line" aria-hidden="true"></div>
                <?php foreach ( $opp_steps as $step ) :
                    $icon  = $step['icon']  ?? 'circle';
                    $label = $step['label'] ?? '';
                ?>
                <div class="single-case-study__opportunity-step">
                    <div class="single-case-study__opportunity-icon">
                        <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                    </div>
                    <p><?php echo esc_html( $label ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         PERSPECTIVES (Product Idea — light / dark cards)
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $perspectives ) ) : ?>
    <section class="single-case-study__perspectives cs-reveal">
        <div class="container single-case-study__perspectives-grid">
            <?php foreach ( $perspectives as $p ) :
                $style = ( ( $p['style'] ?? 'light' ) === 'dark' ) ? 'dark' : 'light';
                $icon  = $p['icon']  ?? 'person';
                $ptitle = $p['title'] ?? '';
                $items  = $p['items'] ?? array();
            ?>
            <div class="single-case-study__perspective-card single-case-study__perspective-card--<?php echo esc_attr( $style ); ?>">
                <div class="single-case-study__perspective-head">
                    <span class="single-case-study__perspective-icon">
                        <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                    </span>
                    <h3><?php echo esc_html( $ptitle ); ?></h3>
                </div>
                <?php if ( ! empty( $items ) ) : ?>
                <ul class="single-case-study__perspective-list">
                    <?php foreach ( $items as $item ) : ?>
                    <li>
                        <span class="material-symbols-outlined">check_circle</span>
                        <span><?php echo esc_html( $item ); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         PROCESS (Trip Comes First — steps + big visual)
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $proc_title ) || ! empty( $proc_steps ) ) : ?>
    <section class="single-case-study__process cs-reveal">
        <div class="container">
            <div class="single-case-study__section-header-center">
                <?php if ( ! empty( $proc_title ) ) : ?>
                    <h2 class="single-case-study__section-title single-case-study__section-title--center"><?php echo esc_html( $proc_title ); ?></h2>
                <?php endif; ?>
                <?php if ( ! empty( $proc_sub ) ) : ?>
                    <p class="single-case-study__section-subtitle"><?php echo esc_html( $proc_sub ); ?></p>
                <?php endif; ?>
            </div>

            <?php if ( ! empty( $proc_steps ) ) : ?>
            <div class="single-case-study__process-steps">
                <?php foreach ( $proc_steps as $step ) :
                    $num   = $step['num']   ?? '';
                    $stitle = $step['title'] ?? '';
                    $stext  = $step['text']  ?? '';
                ?>
                <div class="single-case-study__process-step">
                    <span class="single-case-study__process-num"><?php echo esc_html( $num ); ?></span>
                    <h4><?php echo esc_html( $stitle ); ?></h4>
                    <p><?php echo esc_html( $stext ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if ( ! empty( $proc_image ) ) : ?>
            <div class="single-case-study__process-visual">
                <img src="<?php echo esc_url( $proc_image ); ?>" alt="<?php echo esc_attr( $proc_cap_t ); ?>" loading="lazy" />
                <?php if ( ! empty( $proc_cap_t ) || ! empty( $proc_cap_s ) ) : ?>
                <div class="single-case-study__process-overlay">
                    <?php if ( ! empty( $proc_cap_t ) ) : ?><p class="single-case-study__process-overlay-title"><?php echo esc_html( $proc_cap_t ); ?></p><?php endif; ?>
                    <?php if ( ! empty( $proc_cap_s ) ) : ?><p class="single-case-study__process-overlay-sub"><?php echo esc_html( $proc_cap_s ); ?></p><?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         PILLARS (Platform Ecosystem — image cards)
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $pillars ) ) : ?>
    <section class="single-case-study__pillars cs-reveal">
        <div class="container">
            <h2 class="single-case-study__section-title single-case-study__section-title--center">
                <?php echo esc_html( st_t( 'Three Pillars of the Ecosystem' ) ); ?>
            </h2>
            <div class="single-case-study__pillars-grid">
                <?php foreach ( $pillars as $pillar ) :
                    $image = $pillar['image'] ?? '';
                    $ptitle = $pillar['title'] ?? '';
                    $items = $pillar['items'] ?? array();
                ?>
                <div class="single-case-study__pillar-card">
                    <?php if ( ! empty( $image ) ) : ?>
                    <div class="single-case-study__pillar-media">
                        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $ptitle ); ?>" loading="lazy" />
                    </div>
                    <?php endif; ?>
                    <div class="single-case-study__pillar-body">
                        <h4><?php echo esc_html( $ptitle ); ?></h4>
                        <?php if ( ! empty( $items ) ) : ?>
                        <ul>
                            <?php foreach ( $items as $item ) : ?>
                            <li><span class="material-symbols-outlined">check</span><?php echo esc_html( $item ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         OPERATIONAL DEPTH (4 icon cards)
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $depth_cards ) ) : ?>
    <section class="single-case-study__depth cs-reveal">
        <div class="container">
            <h2 class="single-case-study__section-title single-case-study__section-title--center">
                <?php echo esc_html( st_t( 'Operational Depth' ) ); ?>
            </h2>
            <div class="single-case-study__depth-grid">
                <?php foreach ( $depth_cards as $card ) :
                    $icon  = $card['icon']  ?? 'bolt';
                    $ctitle = $card['title'] ?? '';
                    $ctext  = $card['text']  ?? '';
                ?>
                <div class="single-case-study__depth-card">
                    <span class="material-symbols-outlined single-case-study__depth-icon"><?php echo esc_html( $icon ); ?></span>
                    <h5><?php echo esc_html( $ctitle ); ?></h5>
                    <p><?php echo esc_html( $ctext ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         BUILT FOR TRUST (dark, text + ring visual)
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $trust_title ) || ! empty( $trust_items ) ) : ?>
    <section class="single-case-study__trust cs-reveal">
        <div class="container single-case-study__trust-grid">
            <div class="single-case-study__trust-content">
                <?php if ( ! empty( $trust_title ) ) : ?><h2><?php echo esc_html( $trust_title ); ?></h2><?php endif; ?>
                <?php if ( ! empty( $trust_text ) ) : ?><p class="single-case-study__trust-lead"><?php echo esc_html( $trust_text ); ?></p><?php endif; ?>

                <?php if ( ! empty( $trust_items ) ) : ?>
                <div class="single-case-study__trust-items">
                    <?php foreach ( $trust_items as $item ) :
                        $icon = $item['icon'] ?? 'check_circle';
                        $ititle = $item['title'] ?? '';
                        $itext = $item['text'] ?? '';
                    ?>
                    <div class="single-case-study__trust-item">
                        <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                        <div>
                            <h6><?php echo esc_html( $ititle ); ?></h6>
                            <p><?php echo esc_html( $itext ); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="single-case-study__trust-visual" aria-hidden="true">
                <div class="single-case-study__trust-ring">
                    <span class="material-symbols-outlined">shield_lock</span>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         LIVE CTA (Experience X Live)
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $live_title ) ) : ?>
    <section class="single-case-study__live cs-reveal">
        <div class="container single-case-study__live-inner">
            <h2><?php echo esc_html( $live_title ); ?></h2>
            <?php if ( ! empty( $live_text ) ) : ?><p><?php echo esc_html( $live_text ); ?></p><?php endif; ?>
            <div class="single-case-study__live-actions">
                <?php if ( ! empty( $live_url ) ) : ?>
                <a href="<?php echo esc_url( $live_url ); ?>" class="single-case-study__btn single-case-study__btn--primary" target="_blank" rel="noopener">
                    <span class="material-symbols-outlined">language</span>
                    <?php echo esc_html( st_t( 'Visit Website' ) ); ?>
                </a>
                <?php endif; ?>
                <?php foreach ( $live_apps as $app ) :
                    $icon = $app['icon'] ?? 'smartphone';
                    $label = $app['label'] ?? '';
                    $url = $app['url'] ?? '#';
                ?>
                <a href="<?php echo esc_url( $url ); ?>" class="single-case-study__live-app" target="_blank" rel="noopener">
                    <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                    <?php echo esc_html( $label ); ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         TECH STACK
    ═══════════════════════════════════════════ -->
    <?php if ( ! empty( $tech_stack ) ) : ?>
    <section class="single-case-study__techstack cs-reveal">
        <div class="container">
            <h2 class="single-case-study__section-title single-case-study__section-title--center">
                <?php echo esc_html( st_t( 'Technology Stack' ) ); ?>
            </h2>
            <div class="single-case-study__techstack-grid">
                <?php foreach ( $tech_stack as $tech ) :
                    $icon = $tech['icon'] ?? 'code';
                    $label = $tech['label'] ?? '';
                ?>
                <div class="single-case-study__techstack-item">
                    <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
                    <p><?php echo esc_html( $label ); ?></p>
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
    <section class="single-case-study__content-section cs-reveal">
        <div class="container single-case-study__content-wrap">
            <?php the_content(); ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- ═══════════════════════════════════════════
         CTA FOOTER STRIP
    ═══════════════════════════════════════════ -->
    <section class="single-case-study__cta-strip cs-reveal">
        <div class="single-case-study__cta-strip-glow" aria-hidden="true"></div>
        <div class="container single-case-study__cta-strip-inner">
            <div class="single-case-study__cta-text">
                <h2 class="single-case-study__cta-heading"><?php echo esc_html( $cta_title ); ?></h2>
                <p class="single-case-study__cta-sub"><?php echo esc_html( $cta_text ); ?></p>
                <?php
                $contact_url = function_exists( 'st_url' ) ? st_url( 'contact' ) : home_url( '/contact/' );
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

<script>
(function () {
    if ( ! ( 'IntersectionObserver' in window ) ) return;
    var items = document.querySelectorAll( '.cs-reveal' );
    var io = new IntersectionObserver( function ( entries ) {
        entries.forEach( function ( entry ) {
            if ( entry.isIntersecting ) {
                entry.target.classList.add( 'is-visible' );
                io.unobserve( entry.target );
            }
        } );
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' } );
    items.forEach( function ( el ) { io.observe( el ); } );
})();
</script>

<?php
endwhile;

get_footer();
?>