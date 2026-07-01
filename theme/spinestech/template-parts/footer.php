<?php
$dir    = st_dir();
$locale = st_locale();
$is_rtl = $dir === 'rtl';

$settings = [];
if ( class_exists( 'SpinesTech_Headless_Mappers' ) ) {
    $settings = SpinesTech_Headless_Mappers::settings();
}
$email   = $settings['contactEmail']  ?? 'contact@spinestech.com';
$phone   = $settings['contactPhone']  ?? '+966 000 000 000';
$address = $settings['officeAddress'] ?? ( $is_rtl ? 'الرياض، المملكة العربية السعودية' : 'Riyadh, Saudi Arabia' );
?>
<footer class="footer" role="contentinfo" dir="<?php echo esc_attr( $dir ); ?>">
  <div class="container">

    <!-- ═══ CTA Strip ═══ -->
    <div class="footer__cta">
      <div class="footer__cta-text-wrap">
        <h3 class="footer__cta-title">
          <?php echo $is_rtl ? 'جاهز لبدء رحلة التحول الرقمي؟' : 'Ready to Start Your Digital Journey?'; ?>
        </h3>
        <p class="footer__cta-sub">
          <?php echo $is_rtl
            ? 'تواصل معنا اليوم واكتشف كيف يمكن لحلولنا التقنية أن تنقل أعمالك إلى المستوى التالي بذكاء وابتكار.'
            : 'Contact us today and discover how our tech solutions can take your business to the next level.'; ?>
        </p>
      </div>
      <a href="<?php echo esc_url( st_url( '/contact/' ) ); ?>" class="footer__cta-link">
        <span class="material-symbols-outlined">arrow_<?php echo $is_rtl ? 'back' : 'forward'; ?></span>
        <?php echo $is_rtl ? 'تواصل معنا الآن' : 'Contact Us Now'; ?>
      </a>
    </div>

    <!-- ═══ Main Footer Grid ═══ -->
    <div class="footer__body">

      <!-- Brand -->
      <div class="footer__brand">
        <a href="<?php echo esc_url( st_url( '/' ) ); ?>" class="footer__logo-wrap">
          <img src="<?php echo esc_url( st_asset( 'images/brand/icon.png' ) ); ?>"
               alt="SpinesTech"
               class="footer__logo-img">
        </a>
        <p class="footer__tagline">
          <?php echo $is_rtl
            ? 'شريكك الاستراتيجي في التحول الرقمي. نصمم المستقبل بأيدٍ سعودية وعالميين.'
            : 'Your strategic partner in digital transformation. Building the future with Saudi and global excellence.'; ?>
        </p>
        <div class="footer__socials">
          <a href="<?php echo esc_url( st_url( '/' ) ); ?>" class="footer__social" aria-label="Website">
            <span class="material-symbols-outlined">language</span>
          </a>
          <a href="mailto:<?php echo esc_attr( $email ); ?>" class="footer__social" aria-label="Email">
            <span class="material-symbols-outlined">alternate_email</span>
          </a>
          <a href="#" class="footer__social" aria-label="Share">
            <span class="material-symbols-outlined">share</span>
          </a>
        </div>
      </div>

      <!-- Nav Links — mirrors navbar -->
      <div class="footer__col">
        <h4 class="footer__heading">
          <span class="footer__heading-bar"></span>
          <?php echo $is_rtl ? 'روابط سريعة' : 'Quick Links'; ?>
        </h4>
        <ul class="footer__links">
          <li>
            <a href="<?php echo esc_url( st_url( '/' ) ); ?>" class="footer__link">
              <?php echo $is_rtl ? 'الرئيسية' : 'Home'; ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( st_url( '/about/' ) ); ?>" class="footer__link">
              <?php echo $is_rtl ? 'من نحن' : 'About Us'; ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( st_url( '/services/' ) ); ?>" class="footer__link">
              <?php echo $is_rtl ? 'الخدمات' : 'Services'; ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( st_url( '/case-studies/' ) ); ?>" class="footer__link">
              <?php echo $is_rtl ? 'دراسات الحالة' : 'Case Studies'; ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( st_url( '/contact/' ) ); ?>" class="footer__link">
              <?php echo $is_rtl ? 'تواصل معنا' : 'Contact Us'; ?>
            </a>
          </li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="footer__col">
        <h4 class="footer__heading">
          <span class="footer__heading-bar"></span>
          <?php echo $is_rtl ? 'تواصل معنا' : 'Contact Us'; ?>
        </h4>
        <ul class="footer__contact-list">
          <li class="footer__contact-row">
            <span class="footer__contact-ico">
              <span class="material-symbols-outlined">location_on</span>
            </span>
            <span class="footer__contact-val"><?php echo esc_html( $address ); ?></span>
          </li>
          <li class="footer__contact-row">
            <span class="footer__contact-ico">
              <span class="material-symbols-outlined">mail</span>
            </span>
            <a href="mailto:<?php echo esc_attr( $email ); ?>"
               class="footer__contact-val footer__contact-val--link"
               dir="ltr"><?php echo esc_html( $email ); ?></a>
          </li>
          <li class="footer__contact-row">
            <span class="footer__contact-ico">
              <span class="material-symbols-outlined">call</span>
            </span>
            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"
               class="footer__contact-val footer__contact-val--link"
               dir="ltr"><?php echo esc_html( $phone ); ?></a>
          </li>
        </ul>
      </div>

    </div><!-- /.footer__body -->

    <!-- ═══ Bottom Bar ═══ -->
    <div class="footer__bar">
      <p class="footer__copy">
        © <?php echo date( 'Y' ); ?> SpinesTech.
        <?php echo $is_rtl ? 'جميع الحقوق محفوظة.' : 'All Rights Reserved.'; ?>
      </p>
      <div class="footer__bar-links">
        <a href="<?php echo esc_url( st_url( '/privacy/' ) ); ?>" class="footer__bar-link">
          <?php echo $is_rtl ? 'سياسة الخصوصية' : 'Privacy Policy'; ?>
        </a>
        <span aria-hidden="true">•</span>
        <a href="<?php echo esc_url( st_url( '/terms/' ) ); ?>" class="footer__bar-link">
          <?php echo $is_rtl ? 'شروط الاستخدام' : 'Terms of Use'; ?>
        </a>
      </div>
    </div>

  </div><!-- /.container -->
</footer>