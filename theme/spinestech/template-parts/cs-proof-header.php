<?php
/**
 * Template Part: Case Study — Proof Header Badge
 * File: template-parts/cs-proof-header.php
 *
 * Usage: get_template_part( 'template-parts/cs-proof-header' );
 * Expects: $post (global) to be the Case Study post.
 *
 * Displays a structured "Project Context" strip at the top of every
 * Case Study showing: Engagement Type, Role, Platforms, Timeline, Status.
 * Fields are hidden individually if empty — the entire block is hidden
 * if no field has a value.
 */

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! function_exists( 'st_cs_get_proof_meta' ) ) return;

$is_rtl  = function_exists( 'st_dir' ) ? ( st_dir() === 'rtl' ) : is_rtl();
$post_id = get_the_ID();
$meta    = st_cs_get_proof_meta( $post_id );

// Determine if there is at least one field worth displaying.
$visible_fields = array_filter( [
    $meta['engagement_type'],
    $meta['spines_role'],
    $meta['platforms'],
    $meta['timeline'],
    $meta['status'],
    $meta['disclosure_note'],
] );

if ( empty( $visible_fields ) ) return; // Nothing to show — render nothing.

$engagement_label = $meta['engagement_type']
    ? st_cs_engagement_label( $meta['engagement_type'], $is_rtl )
    : '';

$status_data = $meta['status']
    ? st_cs_status_label( $meta['status'], $is_rtl )
    : null;

$platforms_list = $meta['platforms']
    ? array_map( 'trim', explode( ',', $meta['platforms'] ) )
    : [];
?>

<aside class="cs-proof-header" aria-label="<?php echo esc_attr( $is_rtl ? "\u{0633}\u{064A}\u{0627}\u{0642}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}" : 'Project Context' ); ?>">

    <div class="cs-proof-header__inner">

        <p class="cs-proof-header__kicker">
            <span class="material-symbols-outlined" aria-hidden="true">fact_check</span>
            <?php echo esc_html( $is_rtl ? "\u{0633}\u{064A}\u{0627}\u{0642}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}" : 'Project Context' ); ?>
        </p>

        <dl class="cs-proof-header__grid">

            <?php if ( $engagement_label ) : ?>
            <div class="cs-proof-header__item">
                <dt><?php echo esc_html( $is_rtl ? "\u{0646}\u{0648}\u{0639}\u{0020}\u{0627}\u{0644}\u{062A}\u{0639}\u{0627}\u{0642}\u{062F}" : 'Engagement Type' ); ?></dt>
                <dd>
                    <span class="cs-proof-header__badge cs-proof-header__badge--type">
                        <?php echo esc_html( $engagement_label ); ?>
                    </span>
                </dd>
            </div>
            <?php endif; ?>

            <?php if ( $meta['spines_role'] ) : ?>
            <div class="cs-proof-header__item cs-proof-header__item--wide">
                <dt><?php echo esc_html( $is_rtl ? "\u{062F}\u{0648}\u{0631}\u{0020}\u{0053}\u{0070}\u{0069}\u{006E}\u{0065}\u{0073}\u{0054}\u{0065}\u{0063}\u{0068}" : 'SpinesTech\'s Role' ); ?></dt>
                <dd><?php echo esc_html( $meta['spines_role'] ); ?></dd>
            </div>
            <?php endif; ?>

            <?php if ( ! empty( $platforms_list ) ) : ?>
            <div class="cs-proof-header__item">
                <dt><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0627}\u{062A}" : 'Platforms' ); ?></dt>
                <dd class="cs-proof-header__tags">
                    <?php foreach ( $platforms_list as $platform ) : ?>
                    <span class="cs-proof-header__tag"><?php echo esc_html( $platform ); ?></span>
                    <?php endforeach; ?>
                </dd>
            </div>
            <?php endif; ?>

            <?php if ( $meta['timeline'] ) : ?>
            <div class="cs-proof-header__item">
                <dt><?php echo esc_html( $is_rtl ? "\u{0645}\u{062F}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0646}\u{0641}\u{064A}\u{0630}" : 'Delivery Timeline' ); ?></dt>
                <dd><?php echo esc_html( $meta['timeline'] ); ?></dd>
            </div>
            <?php endif; ?>

            <?php if ( $status_data ) : ?>
            <div class="cs-proof-header__item">
                <dt><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{062D}\u{0627}\u{0644}\u{0629}" : 'Status' ); ?></dt>
                <dd>
                    <span class="cs-proof-header__status-dot" style="background:<?php echo esc_attr( $status_data['color'] ); ?>;" aria-hidden="true"></span>
                    <?php echo esc_html( $status_data['label'] ); ?>
                </dd>
            </div>
            <?php endif; ?>

        </dl>

        <?php if ( $meta['disclosure_note'] ) : ?>
        <p class="cs-proof-header__disclosure">
            <span class="material-symbols-outlined" aria-hidden="true">info</span>
            <?php echo esc_html( $meta['disclosure_note'] ); ?>
        </p>
        <?php endif; ?>

    </div>

</aside>
