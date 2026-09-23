<?php
/**
 * Template Part: Case Study — Outcome Block
 * File: template-parts/cs-outcome-block.php
 *
 * Usage: get_template_part( 'template-parts/cs-outcome-block' );
 * Expects: $post (global) to be the Case Study post.
 *
 * Renders a verifiable "Measured Outcomes" block at the bottom of the
 * Case Study. The block is COMPLETELY HIDDEN if:
 *   - measurable_outcomes field is empty, OR
 *   - evidence_note is empty (guardian set in st_cs_get_proof_meta())
 *
 * This prevents unsubstantiated metric claims from being published.
 */

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! function_exists( 'st_cs_get_proof_meta' ) ) return;

$is_rtl  = function_exists( 'st_dir' ) ? ( st_dir() === 'rtl' ) : is_rtl();
$post_id = get_the_ID();
$meta    = st_cs_get_proof_meta( $post_id );

// The helper already suppresses outcomes when evidence is missing.
if ( empty( $meta['measurable_outcomes'] ) ) return;
?>

<section class="cs-outcome-block" aria-labelledby="cs-outcome-heading-<?php echo esc_attr( $post_id ); ?>">

    <div class="cs-outcome-block__inner">

        <div class="cs-outcome-block__header">
            <span class="material-symbols-outlined" aria-hidden="true">trending_up</span>
            <h2 id="cs-outcome-heading-<?php echo esc_attr( $post_id ); ?>">
                <?php echo esc_html( $is_rtl ? "\u{0646}\u{062A}\u{0627}\u{0626}\u{062C}\u{0020}\u{0642}\u{0627}\u{0628}\u{0644}\u{0629}\u{0020}\u{0644}\u{0644}\u{0642}\u{064A}\u{0627}\u{0633}" : 'Measured Outcomes' ); ?>
            </h2>
        </div>

        <div class="cs-outcome-block__content">
            <?php echo nl2br( esc_html( $meta['measurable_outcomes'] ) ); ?>
        </div>

        <p class="cs-outcome-block__evidence">
            <span class="material-symbols-outlined" aria-hidden="true">verified</span>
            <strong><?php echo esc_html( $is_rtl ? "\u{0645}\u{0635}\u{062F}\u{0631}\u{0020}\u{0627}\u{0644}\u{0642}\u{064A}\u{0627}\u{0633}\u{003A}" : 'Measurement Source:' ); ?></strong>
            <?php echo esc_html( $meta['evidence_note'] ); ?>
        </p>

    </div>

</section>
