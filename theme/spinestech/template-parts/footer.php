<?php
/**
 * Footer â€” SpinesTech Cinematic Design
 * theme/spinestech/template-parts/footer.php
 *
 * Fully static markup (no ACF / custom fields) matching the approved
 * "cinematic" footer design: animated grid background, floating glow
 * blobs, giant parallax watermark, live pulse indicator, shimmer logo,
 * three static nav columns, and a bottom bar with a language pill.
 *
 * All UI copy now goes through st_t() â€” see inc/i18n/ar.php + en.php.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$footer_dir  = function_exists( 'st_dir' ) ? st_dir() : ( is_rtl() ? 'rtl' : 'ltr' );
$footer_lang = function_exists( 'st_locale' ) ? st_locale() : 'ar';
$is_rtl      = $footer_lang === 'ar';
$year        = date( 'Y' );
$copyright   = str_replace( '{year}', (string) $year, st_t( 'footer.copyright' ) );
?>

<footer class="footer" dir="<?php echo esc_attr( $footer_dir ); ?>">

    <!-- Ambient / decorative layers (presentational only) -->
    <div class="footer__grid-bg" aria-hidden="true"></div>
    <div class="footer__glow footer__glow--1" aria-hidden="true"></div>
    <div class="footer__glow footer__glow--2" aria-hidden="true"></div>
    <div class="footer__watermark" data-footer-watermark aria-hidden="true">SpinesTech</div>

    <div class="container footer__inner">

        <div class="footer__body" data-footer-reveal-group>

            <!-- â”€â”€ Brand widget â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
            <div class="footer__brand" data-footer-reveal>
                <div class="footer__widget">
                    <span class="footer__pulse" aria-hidden="true">
                        <span class="footer__pulse-dot"></span>
                    </span>

                    <span class="footer__logo footer__logo--shimmer">SpinesTech</span>

                    <p class="footer__tagline">
                        <?php echo esc_html( function_exists('st_entity_description') ? st_entity_description() : st_t( 'footer.tagline' ) ); ?>
                    </p>

                    <div class="footer__contact-list">
                        <a class="footer__contact-row" href="mailto:admin@spinestech.com" data-st-track="email" data-st-location="footer">
                            <span class="footer__contact-ico">
                                <span class="material-symbols-outlined" aria-hidden="true">mail</span>
                            </span>
                            <span class="footer__contact-val footer__contact-val--link">admin@spinestech.com</span>
                        </a>
                        <?php if (function_exists('st_whatsapp_url')) : ?>
                        <a class="footer__contact-row" href="<?php echo esc_url(st_whatsapp_url()); ?>" data-st-track="whatsapp" data-st-location="footer" target="_blank" rel="noopener noreferrer">
                            <span class="footer__contact-ico">
                                <span class="material-symbols-outlined" aria-hidden="true">chat</span>
                            </span>
                            <span class="footer__contact-val footer__contact-val--link"><?php echo esc_html($is_rtl ? 'واتساب' : 'WhatsApp'); ?></span>
                        </a>
                        <?php endif; ?>
                        <div class="footer__contact-row footer__contact-row--muted">
                            <span class="footer__contact-ico">
                                <span class="material-symbols-outlined" aria-hidden="true">rocket_launch</span>
                            </span>
                            <span class="footer__contact-val"><?php echo esc_html( $is_rtl ? 'Ù†Ø¨Ù†ÙŠ Ù…Ù†ØªØ¬Ø§Øª ØªÙ‚ÙˆØ¯ Ø§Ù„Ø³ÙˆÙ‚' : 'Building market-leading products' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- â”€â”€ Nav columns â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
            <div class="footer__columns">

                <div class="footer__col" data-footer-reveal data-footer-reveal-delay="80">
                    <h4 class="footer__heading">
                        <span class="footer__heading-bar" aria-hidden="true"></span>
                        <?php echo esc_html( st_t( 'footer.pagesHeading' ) ); ?>
                    </h4>
                    <ul class="footer__links">
                        <li><a class="footer__link" href="<?php echo esc_url( st_url( '/' ) ); ?>"><?php echo esc_html( st_t( 'nav.home' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo esc_url( st_url( 'about' ) ); ?>"><?php echo esc_html( st_t( 'nav.about' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo esc_url( st_url( 'case-studies' ) ); ?>"><?php echo esc_html( st_t( 'nav.caseStudies' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo esc_url( st_url( 'articles' ) ); ?>"><?php echo esc_html( st_t( 'nav.articles' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo esc_url( st_url( 'contact' ) ); ?>"><?php echo esc_html( st_t( 'nav.contact' ) ); ?></a></li>
                    </ul>
                </div>

                <div class="footer__col" data-footer-reveal data-footer-reveal-delay="160">
                    <h4 class="footer__heading">
                        <span class="footer__heading-bar" aria-hidden="true"></span>
                        <?php echo esc_html( st_t( 'footer.solutionsHeading' ) ); ?>
                    </h4>
                    <ul class="footer__links">
                        <?php
                        $preview = function_exists('st_home_service_preview_cards') ? st_home_service_preview_cards() : [];
                        foreach (array_slice($preview, 0, 6) as $svc) : ?>
                            <li><a class="footer__link" href="<?php echo esc_url($svc['url']); ?>"><?php echo esc_html($svc['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="footer__col" data-footer-reveal data-footer-reveal-delay="240">
                    <h4 class="footer__heading">
                        <span class="footer__heading-bar" aria-hidden="true"></span>
                        <?php echo esc_html( st_t( 'footer.collabHeading' ) ); ?>
                    </h4>
                    <ul class="footer__links">
                        <?php $ct_url = esc_url( st_url( 'contact' ) ); ?>
                        <li><a class="footer__link" href="<?php echo $ct_url; ?>"><?php echo esc_html( st_t( 'footer.collabFullProject' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo $ct_url; ?>"><?php echo esc_html( st_t( 'footer.collabMobileOnly' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo $ct_url; ?>"><?php echo esc_html( st_t( 'footer.collabPartnerExec' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo $ct_url; ?>"><?php echo esc_html( st_t( 'footer.collabWhitelabel' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo $ct_url; ?>"><?php echo esc_html( st_t( 'footer.collabModules' ) ); ?></a></li>
                        <li><a class="footer__link" href="<?php echo $ct_url; ?>"><?php echo esc_html( st_t( 'footer.collabDevSupport' ) ); ?></a></li>
                    </ul>
                </div>

            </div>

        </div><!-- /.footer__body -->

        <!-- â”€â”€ Bottom bar â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
        <div class="footer__bar">
            <div class="footer__bar-left" data-footer-reveal style="display: flex; flex-wrap: wrap; align-items: center; gap: 1.5rem;">
                <span class="footer__copy"><?php echo esc_html( $copyright ); ?></span>
            </div>

            <div class="footer__lang-pill" data-footer-reveal data-footer-reveal-delay="80">
                <a href="<?php echo esc_url( st_localized_url( st_current_canonical_path(), 'ar' ) ); ?>"
                   hreflang="ar"
                   class="footer__lang-btn<?php echo ( 'ar' === $footer_lang ) ? ' is-active' : ''; ?>">
                    <?php echo esc_html( st_t( 'nav.arabic' ) ); ?>
                </a>
                <a href="<?php echo esc_url( st_localized_url( st_current_canonical_path(), 'en' ) ); ?>"
                   hreflang="en"
                   class="footer__lang-btn<?php echo ( 'ar' !== $footer_lang ) ? ' is-active' : ''; ?>">
                    <?php echo esc_html( st_t( 'nav.english' ) ); ?>
                </a>
            </div>
        </div>

    </div><!-- /.footer__inner -->

</footer>
