<?php
/**
 * Template Name: Case Study â€” Ù„Ø­Ø¸Ø© (Lahza)
 * Template Post Type: st_case_study
 *
 * Fully static, hardcoded one-off case study page for "\u{0644}\u{062D}\u{0638}\u{0629}" (Lahza) â€”
 * an events & venue booking platform (client app + provider dashboard +
 * admin dashboard). Bilingual AR/EN via st_locale().
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$is_rtl = function_exists( 'st_locale' ) ? st_locale() === 'ar' : true;
$dir    = $is_rtl ? 'rtl' : 'ltr';

$lh_img = static function ( $file ) {
	return esc_url( st_asset( 'images/case-studies/lahza/' . ltrim( $file, '/' ) ) );
};

get_header();
?>

<main class="lh" dir="<?php echo esc_attr( $dir ); ?>" lang="<?php echo esc_attr( $is_rtl ? 'ar' : 'en' ); ?>">

	<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
	     01 Â· HERO
	â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
	<section class="lh__hero" id="hero" aria-labelledby="lh-hero-title">
		<div class="lh__hero-pattern" aria-hidden="true"></div>
		<div class="lh__container lh__hero-inner">

			<div class="lh__hero-content" data-lh-reveal>
				<h1 class="lh__hero-title" id="lh-hero-title"><?php echo esc_html( $is_rtl ? "\u{0644}\u{062D}\u{0638}\u{0629}" : 'Lahza' ); ?></h1>
				<p class="lh__hero-tagline"><?php echo esc_html( $is_rtl ? "\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0629}\u{0020}\u{0644}\u{062D}\u{062C}\u{0632}\u{0020}\u{0648}\u{062A}\u{0646}\u{0638}\u{064A}\u{0645}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0627}\u{062A}" : 'An integrated platform for event booking & management' ); ?></p>
				<p class="lh__hero-copy">
					<?php echo esc_html( $is_rtl
						? "\u{062D}\u{0644}\u{0020}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0645}\u{062A}\u{0637}\u{0648}\u{0631}\u{0020}\u{064A}\u{062C}\u{0645}\u{0639}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0627}\u{0644}\u{0641}\u{062E}\u{0627}\u{0645}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0633}\u{0647}\u{0648}\u{0644}\u{0629}\u{060C}\u{0020}\u{0635}\u{064F}\u{0645}\u{0645}\u{0020}\u{0644}\u{0631}\u{0628}\u{0637}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{0627}\u{0621}\u{0020}\u{0628}\u{0623}\u{0641}\u{0636}\u{0644}\u{0020}\u{0645}\u{0632}\u{0648}\u{062F}\u{064A}\u{0020}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0627}\u{062A}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0645}\u{0644}\u{0643}\u{0629}\u{060C}\u{0020}\u{0645}\u{0639}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0643}\u{0627}\u{0645}\u{0644}\u{0629}\u{0020}\u{0644}\u{0643}\u{0644}\u{0020}\u{062A}\u{0641}\u{0627}\u{0635}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}\u{0020}\u{0648}\u{0627}\u{0644}\u{062F}\u{0641}\u{0639}\u{002E}"
						: 'A sophisticated digital solution combining elegance and simplicity, designed to connect customers with the best event service providers in Saudi Arabia, with complete booking and payment management.' ); ?>
				</p>
				<div class="lh__hero-pills">
					<span class="lh__pill"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0639}\u{0645}\u{064A}\u{0644}" : 'Client App' ); ?></span>
					<span class="lh__pill"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0645}\u{0642}\u{062F}\u{0645}\u{0020}\u{062E}\u{062F}\u{0645}\u{0629}" : 'Provider Dashboard' ); ?></span>
					<span class="lh__pill"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{064A}\u{0629}" : 'Admin Dashboard' ); ?></span>
					<span class="lh__pill"><?php echo esc_html( $is_rtl ? "\u{062D}\u{062C}\u{0648}\u{0632}\u{0627}\u{062A}\u{0020}\u{0648}\u{0645}\u{062F}\u{0641}\u{0648}\u{0639}\u{0627}\u{062A}" : 'Bookings & Payments' ); ?></span>
				</div>
				<div class="lh__hero-ctas">
					<button type="button" class="lh__btn lh__btn--primary"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0633}\u{062A}\u{0639}\u{0631}\u{0636}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0631}\u{0628}\u{0629}" : 'Explore the Experience' ); ?></button>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="lh__btn lh__btn--outline"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0648}\u{0627}\u{0635}\u{0644}\u{0020}\u{0645}\u{0639}\u{0646}\u{0627}" : 'Contact Us' ); ?></a>
				</div>
			</div>

			<div class="lh__hero-visual" data-lh-reveal data-lh-delay="150">
				<div class="lh__phone-stack" data-lh-tilt>
					<div class="lh__phone-stack-item lh__phone-stack-item--3">
						<img
							src="<?php echo $lh_img( 'app-hall-details.webp' ); ?>"
							alt="<?php echo esc_attr( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0644}\u{062D}\u{0638}\u{0629}\u{0020}\u{2014}\u{0020}\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{062A}\u{0641}\u{0627}\u{0635}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0639}\u{0629}" : 'Lahza app â€” hall details screen' ); ?>"
							width="240" height="519" loading="eager" decoding="async"
						/>
					</div>
					<div class="lh__phone-stack-item lh__phone-stack-item--2">
						<img
							src="<?php echo $lh_img( 'app-home.webp' ); ?>"
							alt="<?php echo esc_attr( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0644}\u{062D}\u{0638}\u{0629}\u{0020}\u{2014}\u{0020}\u{0627}\u{0644}\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{0631}\u{0626}\u{064A}\u{0633}\u{064A}\u{0629}" : 'Lahza app â€” home screen' ); ?>"
							width="240" height="519" loading="eager" decoding="async"
						/>
					</div>
					<div class="lh__phone-stack-item lh__phone-stack-item--1">
						<img
							src="<?php echo $lh_img( 'hero-splash.webp' ); ?>"
							alt="<?php echo esc_attr( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0644}\u{062D}\u{0638}\u{0629}\u{0020}\u{2014}\u{0020}\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{062F}\u{0627}\u{064A}\u{0629}" : 'Lahza app â€” splash screen' ); ?>"
							width="240" height="519" loading="eager" fetchpriority="high" decoding="async"
						/>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- 02 <?php echo "\u{00B7}\u{0020}\u{0646}\u{0638}\u{0631}\u{0629}\u{0020}\u{0639}\u{0627}\u{0645}\u{0629}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}"; ?> / Project Overview -->
	<section class="lh__overview" id="overview" aria-labelledby="lh-overview-title">
		<div class="lh__container lh__overview-inner">

			<div class="lh__overview-intro" data-lh-reveal>
				<h3 class="lh__h2" id="lh-overview-title"><?php echo esc_html( $is_rtl ? "\u{0646}\u{0638}\u{0631}\u{0629}\u{0020}\u{0639}\u{0627}\u{0645}\u{0629}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}" : 'Project Overview' ); ?></h3>
				<p class="lh__p">
					<?php echo esc_html( $is_rtl
						? "\u{00D9}\u{0160}\u{00D9}\u{2021}\u{00D8}\u{00AF}\u{00D9}\u{0081}\u{0020}\u{00D9}\u{2026}\u{00D8}\u{00B4}\u{00D8}\u{00B1}\u{00D9}\u{02C6}\u{00D8}\u{00B9}\u{0020}\u{0022}\u{0644}\u{062D}\u{0638}\u{0629}\u{0022}\u{0020}\u{00D8}\u{00A5}\u{00D9}\u{201E}\u{00D9}\u{2030}\u{0020}\u{00D8}\u{00AA}\u{00D8}\u{00AD}\u{00D9}\u{02C6}\u{00D9}\u{0160}\u{00D9}\u{201E}\u{0020}\u{00D9}\u{201A}\u{00D8}\u{00B7}\u{00D8}\u{00A7}\u{00D8}\u{00B9}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{00D8}\u{00A7}\u{00D8}\u{00B3}\u{00D8}\u{00A8}\u{00D8}\u{00A7}\u{00D8}\u{00AA}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00AA}\u{00D9}\u{201A}\u{00D9}\u{201E}\u{00D9}\u{0160}\u{00D8}\u{00AF}\u{00D9}\u{0160}\u{0020}\u{00D8}\u{00A5}\u{00D9}\u{201E}\u{00D9}\u{2030}\u{0020}\u{00D8}\u{00AA}\u{00D8}\u{00AC}\u{00D8}\u{00B1}\u{00D8}\u{00A8}\u{00D8}\u{00A9}\u{0020}\u{00D8}\u{00B1}\u{00D9}\u{201A}\u{00D9}\u{2026}\u{00D9}\u{0160}\u{00D8}\u{00A9}\u{0020}\u{00D8}\u{00B3}\u{00D9}\u{201E}\u{00D8}\u{00B3}\u{00D8}\u{00A9}\u{002E}\u{0020}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{0020}\u{00D8}\u{00AE}\u{00D9}\u{201E}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{0020}\u{00D8}\u{00AA}\u{00D9}\u{02C6}\u{00D9}\u{0081}\u{00D9}\u{0160}\u{00D8}\u{00B1}\u{0020}\u{00D8}\u{00AB}\u{00D9}\u{201E}\u{00D8}\u{00A7}\u{00D8}\u{00AB}\u{00D8}\u{00A9}\u{0020}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{00D8}\u{00A7}\u{00D9}\u{0081}\u{00D8}\u{00B0}\u{0020}\u{00D8}\u{00AA}\u{00D9}\u{201A}\u{00D9}\u{2020}\u{00D9}\u{0160}\u{00D8}\u{00A9}\u{0020}\u{00D9}\u{2026}\u{00D8}\u{00AA}\u{00D9}\u{0192}\u{00D8}\u{00A7}\u{00D9}\u{2026}\u{00D9}\u{201E}\u{00D8}\u{00A9}\u{00D8}\u{0152}\u{0020}\u{00D9}\u{0160}\u{00D8}\u{00B6}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D9}\u{2020}\u{00D8}\u{00B8}\u{00D8}\u{00A7}\u{00D9}\u{2026}\u{0020}\u{00D8}\u{00AA}\u{00D8}\u{00AF}\u{00D9}\u{0081}\u{00D9}\u{201A}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00B9}\u{00D9}\u{2026}\u{00D9}\u{201E}\u{0020}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{0020}\u{00D9}\u{201E}\u{00D8}\u{00AD}\u{00D8}\u{00B8}\u{00D8}\u{00A9}\u{0020}\u{00D8}\u{00A8}\u{00D8}\u{00AD}\u{00D8}\u{00AB}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00B9}\u{00D9}\u{2026}\u{00D9}\u{0160}\u{00D9}\u{201E}\u{0020}\u{00D8}\u{00B9}\u{00D9}\u{2020}\u{0020}\u{00D9}\u{201A}\u{00D8}\u{00A7}\u{00D8}\u{00B9}\u{00D8}\u{00A9}\u{0020}\u{00D9}\u{02C6}\u{00D8}\u{00AD}\u{00D8}\u{00AA}\u{00D9}\u{2030}\u{0020}\u{00D8}\u{00B5}\u{00D8}\u{00AF}\u{00D9}\u{02C6}\u{00D8}\u{00B1}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00AA}\u{00D9}\u{201A}\u{00D8}\u{00B1}\u{00D9}\u{0160}\u{00D8}\u{00B1}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D9}\u{2026}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D9}\u{0160}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D9}\u{2020}\u{00D9}\u{2021}\u{00D8}\u{00A7}\u{00D8}\u{00A6}\u{00D9}\u{0160}\u{0020}\u{00D9}\u{201E}\u{00D9}\u{2026}\u{00D8}\u{00B2}\u{00D9}\u{02C6}\u{00D8}\u{00AF}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00AE}\u{00D8}\u{00AF}\u{00D9}\u{2026}\u{00D8}\u{00A9}\u{002E}"
						: 'The Lahza project aims to transform the traditional events sector into a seamless digital experience. By providing three integrated technical portals, the system ensures workflow from the moment a client searches for a venue to the final financial report for the service provider.' ); ?>
				</p>
			</div>

			<div class="lh__overview-cards" data-lh-reveal-group>
				<article class="lh__glass-card" data-lh-reveal>
					<span class="material-symbols-outlined lh__glass-card-icon" aria-hidden="true">smartphone</span>
					<h3 class="lh__h3"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" : 'Client App' ); ?></h3>
					<p class="lh__p-sm"><?php echo esc_html( $is_rtl ? "\u{0648}\u{0627}\u{062C}\u{0647}\u{0629}\u{0020}\u{0639}\u{0635}\u{0631}\u{064A}\u{0629}\u{0020}\u{0644}\u{0627}\u{0643}\u{062A}\u{0634}\u{0627}\u{0641}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0639}\u{0627}\u{062A}\u{060C}\u{0020}\u{0645}\u{0642}\u{0627}\u{0631}\u{0646}\u{0629}\u{0020}\u{0627}\u{0644}\u{0623}\u{0633}\u{0639}\u{0627}\u{0631}\u{060C}\u{0020}\u{0648}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}\u{0020}\u{0627}\u{0644}\u{0641}\u{0648}\u{0631}\u{064A}\u{002E}" : 'A modern interface for discovering venues, comparing prices, and instant booking.' ); ?></p>
				</article>
				<article class="lh__glass-card" data-lh-reveal data-lh-delay="100">
					<span class="material-symbols-outlined lh__glass-card-icon" aria-hidden="true">dashboard</span>
					<h3 class="lh__h3"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0645}\u{0642}\u{062F}\u{0645}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0629}" : 'Provider Dashboard' ); ?></h3>
					<p class="lh__p-sm"><?php echo esc_html( $is_rtl ? "\u{0623}\u{062F}\u{0648}\u{0627}\u{062A}\u{0020}\u{0627}\u{062D}\u{062A}\u{0631}\u{0627}\u{0641}\u{064A}\u{0629}\u{0020}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0639}\u{0627}\u{062A}\u{060C}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0642}\u{0627}\u{062A}\u{060C}\u{0020}\u{0648}\u{062A}\u{062A}\u{0628}\u{0639}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0648}\u{0632}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{064A}\u{0648}\u{0645}\u{064A}\u{0629}\u{002E}" : 'Professional tools for managing venues, packages, and tracking daily bookings.' ); ?></p>
				</article>
				<article class="lh__glass-card" data-lh-reveal data-lh-delay="200">
					<span class="material-symbols-outlined lh__glass-card-icon" aria-hidden="true">admin_panel_settings</span>
					<h3 class="lh__h3"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" : 'Admin Panel' ); ?></h3>
					<p class="lh__p-sm"><?php echo esc_html( $is_rtl ? "\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0634}\u{0627}\u{0645}\u{0644}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{062E}\u{062F}\u{0645}\u{064A}\u{0646}\u{060C}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{0631}\u{062F}\u{064A}\u{0646}\u{060C}\u{0020}\u{0648}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{064A}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0627}\u{0644}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0636}\u{062E}\u{0645}\u{0629}\u{002E}" : 'Full control over users, vendors, and large-scale financial operations.' ); ?></p>
				</article>
			</div>

		</div>
	</section>

	<!-- 03 <?php echo "\u{00B7}\u{0020}\u{0627}\u{0644}\u{062A}\u{062D}\u{062F}\u{064A}\u{0020}\u{0648}\u{0627}\u{0644}\u{062D}\u{0644}"; ?> / Challenge & Solution -->
	<section class="lh__challenge" id="challenge" aria-label="<?php echo esc_attr( $is_rtl ? "\u{0627}\u{0644}\u{062A}\u{062D}\u{062F}\u{064A}\u{0020}\u{0648}\u{0627}\u{0644}\u{062D}\u{0644}" : 'Challenge and Solution' ); ?>">
		<div class="lh__container lh__challenge-grid" data-lh-reveal-group>

			<article class="lh__challenge-card" data-lh-reveal>
				<div class="lh__challenge-head lh__challenge-head--error">
					<span class="material-symbols-outlined" aria-hidden="true">report_problem</span>
					<h3 class="lh__h3"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{062A}\u{062D}\u{062F}\u{064A}" : 'The Challenge' ); ?></h3>
				</div>
				<p class="lh__p">
					<?php echo esc_html( $is_rtl
						? "\u{0643}\u{0627}\u{0646}\u{062A}\u{0020}\u{0627}\u{0644}\u{0633}\u{0648}\u{0642}\u{0020}\u{062A}\u{0639}\u{0627}\u{0646}\u{064A}\u{0020}\u{0645}\u{0646}\u{0020}\u{062A}\u{0634}\u{062A}\u{062A}\u{0020}\u{0645}\u{0632}\u{0648}\u{062F}\u{064A}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}\u{0020}\u{0648}\u{0635}\u{0639}\u{0648}\u{0628}\u{0629}\u{0020}\u{0648}\u{0635}\u{0648}\u{0644}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0644}\u{0627}\u{0621}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0623}\u{0633}\u{0639}\u{0627}\u{0631}\u{0020}\u{0634}\u{0641}\u{0627}\u{0641}\u{0629}\u{0020}\u{0648}\u{062A}\u{0648}\u{0627}\u{0641}\u{0631}\u{0020}\u{062F}\u{0642}\u{064A}\u{0642}\u{0020}\u{0644}\u{0644}\u{0645}\u{0648}\u{0627}\u{0639}\u{064A}\u{062F}\u{002E}\u{0020}\u{0627}\u{0644}\u{0641}\u{062C}\u{0648}\u{0629}\u{0020}\u{0627}\u{0644}\u{0643}\u{0628}\u{064A}\u{0631}\u{0629}\u{0020}\u{0628}\u{064A}\u{0646}\u{0020}\u{0623}\u{0633}\u{0627}\u{0644}\u{064A}\u{0628}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}\u{0020}\u{0627}\u{0644}\u{062A}\u{0642}\u{0644}\u{064A}\u{062F}\u{064A}\u{0629}\u{0020}\u{0028}\u{0627}\u{062A}\u{0635}\u{0627}\u{0644}\u{0627}\u{062A}\u{0020}\u{0647}\u{0627}\u{062A}\u{0641}\u{064A}\u{0629}\u{0029}\u{0020}\u{0648}\u{0627}\u{0644}\u{0637}\u{0644}\u{0628}\u{0020}\u{0627}\u{0644}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0632}\u{0627}\u{064A}\u{062F}\u{0020}\u{0643}\u{0627}\u{0646}\u{062A}\u{0020}\u{0627}\u{0644}\u{0639}\u{0627}\u{0626}\u{0642}\u{0020}\u{0627}\u{0644}\u{0623}\u{0643}\u{0628}\u{0631}\u{0020}\u{0623}\u{0645}\u{0627}\u{0645}\u{0020}\u{0646}\u{0645}\u{0648}\u{0020}\u{0627}\u{0644}\u{0642}\u{0637}\u{0627}\u{0639}\u{002E}"
						: 'The market suffered from fragmented service providers and difficulty for customers in accessing transparent pricing and accurate availability. The large gap between traditional booking methods (phone calls) and growing digital demand was the biggest barrier to sector growth.' ); ?>
				</p>
				<ul class="lh__dot-list">
					<li><span class="lh__dot" aria-hidden="true"></span> <?php echo esc_html( $is_rtl ? "\u{063A}\u{064A}\u{0627}\u{0628}\u{0020}\u{0627}\u{0644}\u{0645}\u{0631}\u{0643}\u{0632}\u{064A}\u{0629}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{0628}\u{064A}\u{0627}\u{0646}\u{0627}\u{062A}" : 'Lack of centralized data' ); ?></li>
					<li><span class="lh__dot" aria-hidden="true"></span> <?php echo esc_html( $is_rtl ? "\u{0635}\u{0639}\u{0648}\u{0628}\u{0629}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0641}\u{0648}\u{0639}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{0639}\u{0631}\u{0627}\u{0628}\u{064A}\u{0646}" : 'Difficulty managing payments and deposits' ); ?></li>
					<li><span class="lh__dot" aria-hidden="true"></span> <?php echo esc_html( $is_rtl ? "\u{0627}\u{0646}\u{0639}\u{062F}\u{0627}\u{0645}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{062B}\u{0648}\u{0642}\u{064A}\u{0629}\u{0020}\u{0641}\u{064A}\u{0020}\u{062A}\u{0642}\u{064A}\u{064A}\u{0645}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}" : 'Lack of reliability in service evaluation' ); ?></li>
				</ul>
			</article>

			<article class="lh__challenge-card lh__challenge-card--solution" data-lh-reveal data-lh-delay="120">
				<span class="material-symbols-outlined lh__challenge-watermark" aria-hidden="true">verified</span>
				<div class="lh__challenge-head lh__challenge-head--gold">
					<span class="material-symbols-outlined" aria-hidden="true">verified</span>
					<h3 class="lh__h3"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{062D}\u{0644}" : 'The Solution' ); ?></h3>
				</div>
				<p class="lh__p lh__p--on-dark">
					<?php echo esc_html( $is_rtl
						? "\u{00D8}\u{00A7}\u{00D8}\u{00A8}\u{00D8}\u{00AA}\u{00D9}\u{0192}\u{00D8}\u{00B1}\u{00D9}\u{2020}\u{00D8}\u{00A7}\u{0020}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{00D8}\u{00B8}\u{00D9}\u{02C6}\u{00D9}\u{2026}\u{00D8}\u{00A9}\u{0020}\u{0022}\u{0644}\u{062D}\u{0638}\u{0629}\u{0022}\u{0020}\u{00D9}\u{201E}\u{00D8}\u{00AA}\u{00D8}\u{00B9}\u{00D9}\u{2026}\u{00D9}\u{201E}\u{0020}\u{00D9}\u{0192}\u{00D8}\u{00AC}\u{00D8}\u{00B3}\u{00D8}\u{00B1}\u{0020}\u{00D8}\u{00AA}\u{00D9}\u{201A}\u{00D9}\u{2020}\u{00D9}\u{0160}\u{0020}\u{00D8}\u{00B0}\u{00D9}\u{0192}\u{00D9}\u{0160}\u{002E}\u{0020}\u{00D9}\u{201A}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{00D8}\u{00A7}\u{0020}\u{00D8}\u{00A8}\u{00D8}\u{00A3}\u{00D8}\u{00AA}\u{00D9}\u{2026}\u{00D8}\u{00AA}\u{00D8}\u{00A9}\u{0020}\u{00D8}\u{00AF}\u{00D9}\u{02C6}\u{00D8}\u{00B1}\u{00D8}\u{00A9}\u{0020}\u{00D8}\u{00AD}\u{00D9}\u{0160}\u{00D8}\u{00A7}\u{00D8}\u{00A9}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00AD}\u{00D8}\u{00AC}\u{00D8}\u{00B2}\u{0020}\u{00D8}\u{00A8}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D9}\u{0192}\u{00D8}\u{00A7}\u{00D9}\u{2026}\u{00D9}\u{201E}\u{00D8}\u{0152}\u{0020}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00A7}\u{00D8}\u{00B3}\u{00D8}\u{00AA}\u{00D9}\u{0192}\u{00D8}\u{00B4}\u{00D8}\u{00A7}\u{00D9}\u{0081}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D9}\u{2026}\u{00D8}\u{00B1}\u{00D8}\u{00A6}\u{00D9}\u{0160}\u{0020}\u{00D9}\u{201E}\u{00D9}\u{201E}\u{00D9}\u{201A}\u{00D8}\u{00A7}\u{00D8}\u{00B9}\u{00D8}\u{00A7}\u{00D8}\u{00AA}\u{0020}\u{00D9}\u{02C6}\u{00D8}\u{00AD}\u{00D8}\u{00AA}\u{00D9}\u{2030}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00AA}\u{00D8}\u{00A3}\u{00D9}\u{0192}\u{00D9}\u{0160}\u{00D8}\u{00AF}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D9}\u{2020}\u{00D9}\u{2021}\u{00D8}\u{00A7}\u{00D8}\u{00A6}\u{00D9}\u{0160}\u{00D8}\u{0152}\u{0020}\u{00D9}\u{2026}\u{00D8}\u{00B9}\u{0020}\u{00D8}\u{00AF}\u{00D9}\u{2026}\u{00D8}\u{00AC}\u{0020}\u{00D8}\u{00A8}\u{00D9}\u{02C6}\u{00D8}\u{00A7}\u{00D8}\u{00A8}\u{00D8}\u{00A7}\u{00D8}\u{00AA}\u{0020}\u{00D8}\u{00AF}\u{00D9}\u{0081}\u{00D8}\u{00B9}\u{0020}\u{00D8}\u{00A2}\u{00D9}\u{2026}\u{00D9}\u{2020}\u{00D8}\u{00A9}\u{0020}\u{00D9}\u{02C6}\u{00D9}\u{2020}\u{00D8}\u{00B8}\u{00D8}\u{00A7}\u{00D9}\u{2026}\u{0020}\u{00D8}\u{00A5}\u{00D8}\u{00B4}\u{00D8}\u{00B9}\u{00D8}\u{00A7}\u{00D8}\u{00B1}\u{00D8}\u{00A7}\u{00D8}\u{00AA}\u{0020}\u{00D9}\u{201E}\u{00D8}\u{00AD}\u{00D8}\u{00B8}\u{00D9}\u{0160}\u{0020}\u{00D9}\u{0160}\u{00D8}\u{00A8}\u{00D9}\u{201A}\u{00D9}\u{0160}\u{0020}\u{00D8}\u{00AC}\u{00D9}\u{2026}\u{00D9}\u{0160}\u{00D8}\u{00B9}\u{0020}\u{00D8}\u{00A7}\u{00D9}\u{201E}\u{00D8}\u{00A3}\u{00D8}\u{00B7}\u{00D8}\u{00B1}\u{00D8}\u{00A7}\u{00D9}\u{0081}\u{0020}\u{00D8}\u{00B9}\u{00D9}\u{201E}\u{00D9}\u{2030}\u{0020}\u{00D8}\u{00A7}\u{00D8}\u{00B7}\u{00D9}\u{201E}\u{00D8}\u{00A7}\u{00D8}\u{00B9}\u{002E}"
						: 'We designed the Lahza ecosystem to operate as an intelligent tech bridge. We automated the entire booking lifecycle, from visual venue discovery to final confirmation, integrating secure payment gateways and a real-time notification system keeping all parties informed.' ); ?>
				</p>
				<div class="lh__stat-grid">
					<div class="lh__stat-box">
						<span class="lh__stat-num" data-lh-count="90" data-lh-suffix="%">0%</span>
						<span class="lh__stat-label"><?php echo esc_html( $is_rtl ? "\u{0623}\u{062A}\u{0645}\u{062A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0648}\u{0632}\u{0627}\u{062A}" : 'Booking Automation' ); ?></span>
					</div>
					<div class="lh__stat-box">
						<span class="lh__stat-num" data-lh-count="100" data-lh-suffix="%">0%</span>
						<span class="lh__stat-label"><?php echo esc_html( $is_rtl ? "\u{0623}\u{0645}\u{0627}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0641}\u{0648}\u{0639}\u{0627}\u{062A}" : 'Payment Security' ); ?></span>
					</div>
				</div>
			</article>

		</div>
	</section>

	<!-- 04 <?php echo "\u{00B7}\u{0020}\u{0645}\u{0645}\u{064A}\u{0632}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}"; ?> / Platform Features -->
	<section class="lh__features" id="features" aria-labelledby="lh-features-title">
		<div class="lh__container">

			<div class="lh__features-head" data-lh-reveal>
				<h3 class="lh__h2 lh__h2--center" id="lh-features-title"><?php echo esc_html( $is_rtl ? "\u{0645}\u{0645}\u{064A}\u{0632}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{0627}\u{0644}\u{0623}\u{0633}\u{0627}\u{0633}\u{064A}\u{0629}" : 'Core Platform Features' ); ?></h3>
				<p class="lh__features-sub"><?php echo esc_html( $is_rtl ? "\u{0635}\u{064F}\u{0645}\u{0645}\u{062A}\u{0020}\u{0643}\u{0644}\u{0020}\u{0645}\u{064A}\u{0632}\u{0629}\u{0020}\u{0628}\u{0639}\u{0646}\u{0627}\u{064A}\u{0629}\u{0020}\u{0644}\u{062A}\u{0644}\u{0628}\u{064A}\u{0629}\u{0020}\u{0645}\u{062A}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0633}\u{0648}\u{0642}\u{0020}\u{0627}\u{0644}\u{0633}\u{0639}\u{0648}\u{062F}\u{064A}\u{0020}\u{0641}\u{064A}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0643}\u{0628}\u{0631}\u{0649}" : 'Every feature carefully designed to meet Saudi market requirements for managing large-scale events' ); ?></p>
			</div>

			<div class="lh__features-grid" data-lh-reveal-group>
				<?php
				$lh_features = [
					[ 'search',               $is_rtl ? "\u{0627}\u{0643}\u{062A}\u{0634}\u{0627}\u{0641}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}"        : 'Service Discovery',    $is_rtl ? "\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{0628}\u{062D}\u{062B}\u{0020}\u{0645}\u{062A}\u{0637}\u{0648}\u{0631}\u{0020}\u{0645}\u{0639}\u{0020}\u{0641}\u{0644}\u{0627}\u{062A}\u{0631}\u{0020}\u{0630}\u{0643}\u{064A}\u{0629}\u{0020}\u{0644}\u{0644}\u{0645}\u{0646}\u{0627}\u{0637}\u{0642}\u{060C}\u{0020}\u{0627}\u{0644}\u{0633}\u{0639}\u{0629}\u{060C}\u{0020}\u{0648}\u{0646}\u{0648}\u{0639}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0629}\u{002E}"                           : 'Advanced search with smart filters for regions, capacity, and event type.' ],
					[ 'event_available',       $is_rtl ? "\u{062A}\u{062C}\u{0631}\u{0628}\u{0629}\u{0020}\u{062D}\u{062C}\u{0632}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}\u{0629}"     : 'Integrated Booking',   $is_rtl ? "\u{062A}\u{0642}\u{0648}\u{064A}\u{0645}\u{0020}\u{062A}\u{0641}\u{0627}\u{0639}\u{0644}\u{064A}\u{0020}\u{064A}\u{0639}\u{0631}\u{0636}\u{0020}\u{0627}\u{0644}\u{062A}\u{0648}\u{0627}\u{0641}\u{0631}\u{0020}\u{0627}\u{0644}\u{0644}\u{062D}\u{0638}\u{064A}\u{0020}\u{0644}\u{0644}\u{0642}\u{0627}\u{0639}\u{0627}\u{062A}\u{0020}\u{0645}\u{0639}\u{0020}\u{0625}\u{0645}\u{0643}\u{0627}\u{0646}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}\u{0020}\u{0641}\u{064A}\u{0020}\u{062B}\u{0648}\u{0627}\u{0646}\u{064D}\u{002E}"              : 'Interactive calendar showing real-time venue availability with seconds-fast booking.' ],
					[ 'featured_play_list',   $is_rtl ? "\u{0627}\u{0644}\u{0628}\u{0627}\u{0642}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{0625}\u{0636}\u{0627}\u{0641}\u{0627}\u{062A}"     : 'Packages & Add-ons',   $is_rtl ? "\u{062A}\u{062E}\u{0635}\u{064A}\u{0635}\u{0020}\u{0643}\u{0627}\u{0645}\u{0644}\u{0020}\u{0644}\u{0644}\u{062D}\u{062C}\u{0632}\u{0020}\u{0645}\u{0646}\u{0020}\u{062E}\u{0644}\u{0627}\u{0644}\u{0020}\u{0627}\u{062E}\u{062A}\u{064A}\u{0627}\u{0631}\u{0020}\u{0628}\u{0627}\u{0642}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0639}\u{0634}\u{0627}\u{0621}\u{060C}\u{0020}\u{0627}\u{0644}\u{062A}\u{0635}\u{0648}\u{064A}\u{0631}\u{060C}\u{0020}\u{0623}\u{0648}\u{0020}\u{0627}\u{0644}\u{062A}\u{0646}\u{0633}\u{064A}\u{0642}\u{002E}"                 : 'Full booking customization by selecting dinner, photography, or dÃ©cor packages.' ],
					[ 'payments',             $is_rtl ? "\u{0627}\u{0644}\u{0639}\u{0631}\u{0628}\u{0648}\u{0646}\u{0020}\u{0648}\u{0627}\u{0644}\u{0645}\u{062F}\u{0641}\u{0648}\u{0639}\u{0627}\u{062A}"     : 'Deposits & Payments',  $is_rtl ? "\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{062F}\u{0641}\u{0639}\u{0020}\u{0645}\u{0631}\u{0646}\u{0020}\u{064A}\u{062F}\u{0639}\u{0645}\u{0020}\u{062F}\u{0641}\u{0639}\u{0020}\u{0627}\u{0644}\u{0639}\u{0631}\u{0628}\u{0648}\u{0646}\u{0020}\u{0625}\u{0644}\u{0643}\u{062A}\u{0631}\u{0648}\u{0646}\u{064A}\u{0627}\u{064B}\u{0020}\u{0648}\u{062C}\u{062F}\u{0648}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{062F}\u{0641}\u{0639}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0628}\u{0642}\u{064A}\u{0629}\u{002E}"                   : 'Flexible payment system supporting electronic deposit and scheduled remaining payments.' ],
					[ 'notifications_active', $is_rtl ? "\u{0627}\u{0644}\u{0625}\u{064A}\u{0635}\u{0627}\u{0644}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{062A}\u{0646}\u{0628}\u{064A}\u{0647}\u{0627}\u{062A}"  : 'Receipts & Alerts',    $is_rtl ? "\u{062A}\u{0646}\u{0628}\u{064A}\u{0647}\u{0627}\u{062A}\u{0020}\u{0641}\u{0648}\u{0631}\u{064A}\u{0629}\u{0020}\u{0639}\u{0628}\u{0631}\u{0020}\u{0627}\u{0644}\u{0631}\u{0633}\u{0627}\u{0626}\u{0644}\u{0020}\u{0627}\u{0644}\u{0642}\u{0635}\u{064A}\u{0631}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0628}\u{0631}\u{064A}\u{062F}\u{0020}\u{0644}\u{0643}\u{0644}\u{0020}\u{062A}\u{062D}\u{062F}\u{064A}\u{062B}\u{0020}\u{0641}\u{064A}\u{0020}\u{062D}\u{0627}\u{0644}\u{0629}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}\u{002E}"                : 'Instant alerts via SMS and email for every booking status update.' ],
					[ 'verified_user',        $is_rtl ? "\u{0645}\u{0642}\u{062F}\u{0645}\u{0648}\u{0020}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}\u{0020}\u{0645}\u{0648}\u{062B}\u{0648}\u{0642}\u{0648}\u{0646}"   : 'Verified Providers',   $is_rtl ? "\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{062A}\u{0648}\u{062B}\u{064A}\u{0642}\u{0020}\u{0635}\u{0627}\u{0631}\u{0645}\u{0020}\u{0644}\u{0645}\u{0632}\u{0648}\u{062F}\u{064A}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0629}\u{0020}\u{0644}\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{062C}\u{0648}\u{062F}\u{0629}\u{0020}\u{0648}\u{0645}\u{0635}\u{062F}\u{0627}\u{0642}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0639}\u{0631}\u{0648}\u{0636}\u{002E}"                          : 'Strict verification system for service providers to guarantee quality and credibility.' ],
				];
				foreach ( $lh_features as $i => [ $icon, $title, $copy ] ) : ?>
					<article class="lh__feature-card" data-lh-reveal data-lh-delay="<?php echo esc_attr( $i * 80 ); ?>">
						<div class="lh__feature-icon">
							<span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $icon ); ?></span>
						</div>
						<h3 class="lh__h3"><?php echo esc_html( $title ); ?></h3>
						<p class="lh__p-sm"><?php echo esc_html( $copy ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>

		</div>
	</section>

	<!-- 05 <?php echo "\u{00B7}\u{0020}\u{0627}\u{0644}\u{0645}\u{0639}\u{0631}\u{0636}"; ?> / Gallery -->
	<section class="lh__gallery" id="gallery" aria-label="<?php echo esc_attr( $is_rtl ? "\u{0645}\u{0639}\u{0631}\u{0636}\u{0020}\u{0627}\u{0644}\u{0635}\u{0648}\u{0631}" : 'Gallery' ); ?>">
		<div class="lh__container">

			<!-- Client App -->
			<div class="lh__gallery-block" data-lh-reveal>
				<div class="lh__section-kicker">
					<span class="lh__kicker-bar" aria-hidden="true"></span>
					<h3 class="lh__h2"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" : 'Client App' ); ?></h3>
				</div>
				<div class="lh__gallery-scroll">
					<div class="lh__gallery-track">
						<div class="lh__phone-card">
							<img src="<?php echo $lh_img( 'hero-splash.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0644}\u{062D}\u{0638}\u{0629}\u{0020}\u{2014}\u{0020}\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{0628}\u{062F}\u{0627}\u{064A}\u{0629}\u{0020}\u{0628}\u{062A}\u{0635}\u{0645}\u{064A}\u{0645}\u{0020}\u{0623}\u{0646}\u{064A}\u{0642}" : 'Lahza â€” elegant splash screen' ); ?>" width="280" height="606" loading="lazy" decoding="async" />
						</div>
						<div class="lh__phone-card">
							<img src="<?php echo $lh_img( 'app-login.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0644}\u{062D}\u{0638}\u{0629}\u{0020}\u{2014}\u{0020}\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{062A}\u{0633}\u{062C}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{062F}\u{062E}\u{0648}\u{0644}" : 'Lahza â€” login screen' ); ?>" width="280" height="606" loading="lazy" decoding="async" />
						</div>
						<div class="lh__phone-card">
							<img src="<?php echo $lh_img( 'app-home.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0644}\u{062D}\u{0638}\u{0629}\u{0020}\u{2014}\u{0020}\u{0627}\u{0644}\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0627}\u{0644}\u{0631}\u{0626}\u{064A}\u{0633}\u{064A}\u{0629}\u{0020}\u{0648}\u{062A}\u{0635}\u{0646}\u{064A}\u{0641}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0627}\u{062A}" : 'Lahza â€” home screen and event categories' ); ?>" width="280" height="606" loading="lazy" decoding="async" />
						</div>
						<div class="lh__phone-card">
							<img src="<?php echo $lh_img( 'app-services.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0644}\u{062D}\u{0638}\u{0629}\u{0020}\u{2014}\u{0020}\u{0634}\u{0627}\u{0634}\u{0629}\u{0020}\u{0627}\u{062E}\u{062A}\u{064A}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}" : 'Lahza â€” service selection screen' ); ?>" width="280" height="606" loading="lazy" decoding="async" />
						</div>
					</div>
				</div>
			</div>

			<!-- Dashboards -->
			<div class="lh__gallery-block" data-lh-reveal>
				<div class="lh__section-kicker">
					<span class="lh__kicker-bar" aria-hidden="true"></span>
					<h3 class="lh__h2"><?php echo esc_html( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0648}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" : 'Control & Admin Dashboards' ); ?></h3>
				</div>
				<div class="lh__dash-grid">
					<figure class="lh__dash-card lh__dash-card--main">
						<img src="<?php echo $lh_img( 'dashboard-admin.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0627}\u{062D}\u{062A}\u{0631}\u{0627}\u{0641}\u{064A}\u{0629}\u{0020}\u{2014}\u{0020}\u{062A}\u{062D}\u{0644}\u{064A}\u{0644}\u{0627}\u{062A}\u{0020}\u{0648}\u{0631}\u{0633}\u{0648}\u{0645}\u{0020}\u{0628}\u{064A}\u{0627}\u{0646}\u{064A}\u{0629}" : 'Professional admin dashboard â€” analytics and charts' ); ?>" width="900" height="620" loading="lazy" decoding="async" />
					</figure>
					<div class="lh__dash-stack">
						<figure class="lh__dash-card">
							<img src="<?php echo $lh_img( 'dashboard-provider.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0645}\u{0642}\u{062F}\u{0645}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0629}\u{0020}\u{2014}\u{0020}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0648}\u{0632}\u{0627}\u{062A}\u{0020}\u{0648}\u{0625}\u{0639}\u{062F}\u{0627}\u{062F}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0646}" : 'Provider dashboard â€” booking management and city settings' ); ?>" width="600" height="420" loading="lazy" decoding="async" />
						</figure>
						<figure class="lh__dash-card">
							<img src="<?php echo $lh_img( 'dashboard-stats.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{0627}\u{0644}\u{0625}\u{062D}\u{0635}\u{0627}\u{0626}\u{064A}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{0646}\u{0638}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{0627}\u{0644}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0639}\u{0627}\u{0645}\u{0629}" : 'Statistics dashboard and financial overview' ); ?>" width="600" height="420" loading="lazy" decoding="async" />
						</figure>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- 06 <?php echo "\u{00B7}\u{0020}\u{0627}\u{0644}\u{0645}\u{0646}\u{0638}\u{0648}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0635}\u{0644}\u{0629}"; ?> / Connected Ecosystem -->
	<section class="lh__ecosystem" id="ecosystem" aria-labelledby="lh-ecosystem-title">
		<div class="lh__container">
			<div class="lh__ecosystem-head" data-lh-reveal>
				<h3 class="lh__h2 lh__h2--center" id="lh-ecosystem-title"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0646}\u{0638}\u{0648}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{062A}\u{0635}\u{0644}\u{0629}" : 'Connected Ecosystem' ); ?></h3>
				<p class="lh__features-sub"><?php echo esc_html( $is_rtl ? "\u{062B}\u{0644}\u{0627}\u{062B}\u{0020}\u{0648}\u{0627}\u{062C}\u{0647}\u{0627}\u{062A}\u{060C}\u{0020}\u{0647}\u{062F}\u{0641}\u{0020}\u{0648}\u{0627}\u{062D}\u{062F}\u{003A}\u{0020}\u{0645}\u{0646}\u{0627}\u{0633}\u{0628}\u{0629}\u{0020}\u{0644}\u{0627}\u{0020}\u{062A}\u{064F}\u{0646}\u{0633}\u{0649}" : 'Three interfaces, one goal: an unforgettable event' ); ?></p>
			</div>

			<div class="lh__ecosystem-grid" data-lh-reveal-group>
				<span class="lh__ecosystem-line" aria-hidden="true"></span>

				<article class="lh__ecosystem-card lh__ecosystem-card--primary" data-lh-reveal>
					<h3 class="lh__h3"><span class="material-symbols-outlined" aria-hidden="true">person</span> <?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0639}\u{0645}\u{064A}\u{0644}" : 'Client' ); ?></h3>
					<ul class="lh__check-list">
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{0635}\u{0641}\u{062D}\u{0020}\u{0648}\u{062D}\u{062C}\u{0632}\u{0020}\u{0627}\u{0644}\u{0642}\u{0627}\u{0639}\u{0627}\u{062A}" : 'Browse and book venues' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0628}\u{0627}\u{0642}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0627}\u{062A}" : 'Manage service packages' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{062F}\u{0641}\u{0639}\u{0020}\u{0627}\u{0644}\u{0639}\u{0631}\u{0628}\u{0648}\u{0646}\u{0020}\u{0648}\u{062A}\u{0623}\u{0643}\u{064A}\u{062F}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}" : 'Pay deposit and confirm booking' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{0642}\u{064A}\u{064A}\u{0645}\u{0020}\u{0627}\u{0644}\u{062A}\u{062C}\u{0631}\u{0628}\u{0629}\u{0020}\u{0648}\u{0627}\u{0644}\u{0645}\u{0632}\u{0648}\u{062F}" : 'Rate the experience and provider' ); ?></li>
					</ul>
				</article>

				<article class="lh__ecosystem-card lh__ecosystem-card--gold" data-lh-reveal data-lh-delay="120">
					<h3 class="lh__h3"><span class="material-symbols-outlined" aria-hidden="true">storefront</span> <?php echo esc_html( $is_rtl ? "\u{0645}\u{0642}\u{062F}\u{0645}\u{0020}\u{0627}\u{0644}\u{062E}\u{062F}\u{0645}\u{0629}" : 'Service Provider' ); ?></h3>
					<ul class="lh__check-list">
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{062A}\u{0648}\u{0641}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{0627}\u{0639}\u{064A}\u{062F}" : 'Manage availability' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0627}\u{0633}\u{062A}\u{0642}\u{0628}\u{0627}\u{0644}\u{0020}\u{0637}\u{0644}\u{0628}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}" : 'Receive booking requests' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{062D}\u{062F}\u{064A}\u{062B}\u{0020}\u{0623}\u{0633}\u{0639}\u{0627}\u{0631}\u{0020}\u{0627}\u{0644}\u{0628}\u{0627}\u{0642}\u{0627}\u{062A}" : 'Update package prices' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{0642}\u{0627}\u{0631}\u{064A}\u{0631}\u{0020}\u{0627}\u{0644}\u{0645}\u{0628}\u{064A}\u{0639}\u{0627}\u{062A}\u{0020}\u{0648}\u{0627}\u{0644}\u{0623}\u{062F}\u{0627}\u{0621}" : 'Sales and performance reports' ); ?></li>
					</ul>
				</article>

				<article class="lh__ecosystem-card lh__ecosystem-card--secondary" data-lh-reveal data-lh-delay="240">
					<h3 class="lh__h3"><span class="material-symbols-outlined" aria-hidden="true">settings</span> <?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}" : 'Admin' ); ?></h3>
					<ul class="lh__check-list">
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{0645}\u{0648}\u{0627}\u{0641}\u{0642}\u{0629}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0632}\u{0648}\u{062F}\u{064A}\u{0646}" : 'Approve providers' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{062A}\u{0633}\u{0648}\u{064A}\u{0629}\u{0020}\u{0627}\u{0644}\u{0639}\u{0645}\u{0648}\u{0644}\u{0627}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0627}\u{0644}\u{064A}\u{0629}" : 'Settle financial commissions' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0625}\u{062F}\u{0627}\u{0631}\u{0629}\u{0020}\u{0627}\u{0644}\u{0645}\u{062D}\u{062A}\u{0648}\u{0649}\u{0020}\u{0648}\u{0627}\u{0644}\u{0645}\u{062F}\u{0646}" : 'Manage content and cities' ); ?></li>
						<li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span> <?php echo esc_html( $is_rtl ? "\u{0627}\u{0644}\u{062F}\u{0639}\u{0645}\u{0020}\u{0627}\u{0644}\u{0641}\u{0646}\u{064A}\u{0020}\u{0648}\u{062D}\u{0644}\u{0020}\u{0627}\u{0644}\u{0646}\u{0632}\u{0627}\u{0639}\u{0627}\u{062A}" : 'Technical support and dispute resolution' ); ?></li>
					</ul>
				</article>
			</div>
		</div>
	</section>

	<!-- 07 <?php echo "\u{00B7}\u{0020}\u{0627}\u{0644}\u{0646}\u{062A}\u{0627}\u{0626}\u{062C}"; ?> / Results + CTA -->
	<section class="lh__results" id="results" aria-label="<?php echo esc_attr( $is_rtl ? "\u{0627}\u{0644}\u{0646}\u{062A}\u{0627}\u{0626}\u{062C}\u{0020}\u{0648}\u{0627}\u{0644}\u{062F}\u{0639}\u{0648}\u{0629}\u{0020}\u{0644}\u{0627}\u{062A}\u{062E}\u{0627}\u{0630}\u{0020}\u{0625}\u{062C}\u{0631}\u{0627}\u{0621}" : 'Results and Call to Action' ); ?>">
		<div class="lh__container">

			<div class="lh__results-grid">
				<div class="lh__results-text" data-lh-reveal>
					<h3 class="lh__h2"><?php echo esc_html( $is_rtl ? "\u{0642}\u{064A}\u{0645}\u{0629}\u{0020}\u{0631}\u{0642}\u{0645}\u{064A}\u{0629}\u{0020}\u{062A}\u{062A}\u{062C}\u{0627}\u{0648}\u{0632}\u{0020}\u{0645}\u{062C}\u{0631}\u{062F}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}" : 'Digital Value Beyond Just Booking' ); ?></h3>
					<p class="lh__p"><?php echo esc_html( $is_rtl
						? "\u{0646}\u{062C}\u{062D}\u{0646}\u{0627}\u{0020}\u{0641}\u{064A}\u{0020}\u{0628}\u{0646}\u{0627}\u{0621}\u{0020}\u{0645}\u{0646}\u{0635}\u{0629}\u{0020}\u{0644}\u{0627}\u{0020}\u{062A}\u{0648}\u{0641}\u{0631}\u{0020}\u{0641}\u{0642}\u{0637}\u{0020}\u{062E}\u{062F}\u{0645}\u{0629}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}\u{060C}\u{0020}\u{0628}\u{0644}\u{0020}\u{062A}\u{0628}\u{0646}\u{064A}\u{0020}\u{0645}\u{062C}\u{062A}\u{0645}\u{0639}\u{0627}\u{064B}\u{0020}\u{0645}\u{0648}\u{062B}\u{0648}\u{0642}\u{0627}\u{064B}\u{0020}\u{0641}\u{064A}\u{0020}\u{0642}\u{0637}\u{0627}\u{0639}\u{0020}\u{0627}\u{0644}\u{0641}\u{0639}\u{0627}\u{0644}\u{064A}\u{0627}\u{062A}\u{0020}\u{0628}\u{0627}\u{0644}\u{0645}\u{0645}\u{0644}\u{0643}\u{0629}\u{060C}\u{0020}\u{0645}\u{0645}\u{0627}\u{0020}\u{0623}\u{062F}\u{0649}\u{0020}\u{0625}\u{0644}\u{0649}\u{003A}"
						: 'We succeeded in building a platform that not only provides a booking service, but builds a trusted community in the Saudi events sector, leading to:' ); ?></p>
					<ul class="lh__result-list">
						<li>
							<span class="lh__result-icon"><span class="material-symbols-outlined" aria-hidden="true">trending_up</span></span>
							<div>
								<h4 class="lh__h4"><?php echo esc_html( $is_rtl ? "\u{0632}\u{064A}\u{0627}\u{062F}\u{0629}\u{0020}\u{0643}\u{0641}\u{0627}\u{0621}\u{0629}\u{0020}\u{0627}\u{0644}\u{062A}\u{0634}\u{063A}\u{064A}\u{0644}" : 'Increased Operational Efficiency' ); ?></h4>
								<p class="lh__p-sm"><?php echo esc_html( $is_rtl ? "\u{062A}\u{0642}\u{0644}\u{064A}\u{0644}\u{0020}\u{0627}\u{0644}\u{0648}\u{0642}\u{062A}\u{0020}\u{0627}\u{0644}\u{0645}\u{0633}\u{062A}\u{063A}\u{0631}\u{0642}\u{0020}\u{0641}\u{064A}\u{0020}\u{0627}\u{0644}\u{062D}\u{062C}\u{0632}\u{0020}\u{0627}\u{0644}\u{064A}\u{062F}\u{0648}\u{064A}\u{0020}\u{0628}\u{0646}\u{0633}\u{0628}\u{0629}\u{0020}\u{0037}\u{0030}\u{0025}\u{002E}" : 'Reducing time spent on manual booking by 70%.' ); ?></p>
							</div>
						</li>
						<li>
							<span class="lh__result-icon"><span class="material-symbols-outlined" aria-hidden="true">security</span></span>
							<div>
								<h4 class="lh__h4"><?php echo esc_html( $is_rtl ? "\u{0623}\u{0645}\u{0627}\u{0646}\u{0020}\u{0645}\u{0627}\u{0644}\u{064A}\u{0020}\u{0641}\u{0627}\u{0626}\u{0642}" : 'Superior Financial Security' ); ?></h4>
								<p class="lh__p-sm"><?php echo esc_html( $is_rtl ? "\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{062D}\u{0642}\u{0648}\u{0642}\u{0020}\u{062C}\u{0645}\u{064A}\u{0639}\u{0020}\u{0627}\u{0644}\u{0623}\u{0637}\u{0631}\u{0627}\u{0641}\u{0020}\u{0645}\u{0646}\u{0020}\u{062E}\u{0644}\u{0627}\u{0644}\u{0020}\u{0646}\u{0638}\u{0627}\u{0645}\u{0020}\u{0627}\u{0644}\u{0636}\u{0645}\u{0627}\u{0646}\u{0020}\u{0627}\u{0644}\u{0645}\u{0627}\u{0644}\u{064A}\u{0020}\u{0627}\u{0644}\u{0645}\u{062F}\u{0645}\u{062C}\u{002E}" : 'Protecting all parties\' rights through the integrated financial guarantee system.' ); ?></p>
							</div>
						</li>
					</ul>
				</div>

				<div class="lh__results-visual" data-lh-reveal data-lh-delay="150">
					<div class="lh__results-glow" aria-hidden="true"></div>
					<div class="lh__results-collage">
						<div class="lh__results-phone">
							<img src="<?php echo $lh_img( 'app-home.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{062A}\u{0637}\u{0628}\u{064A}\u{0642}\u{0020}\u{0644}\u{062D}\u{0638}\u{0629}\u{0020}\u{0639}\u{0644}\u{0649}\u{0020}\u{0627}\u{0644}\u{0645}\u{0648}\u{0628}\u{0627}\u{064A}\u{0644}" : 'Lahza mobile app' ); ?>" width="200" height="433" loading="lazy" decoding="async" />
						</div>
						<div class="lh__results-dashboard">
							<img src="<?php echo $lh_img( 'dashboard-admin.webp' ); ?>" alt="<?php echo esc_attr( $is_rtl ? "\u{0625}\u{062D}\u{0635}\u{0627}\u{0626}\u{064A}\u{0627}\u{062A}\u{0020}\u{0644}\u{0648}\u{062D}\u{0629}\u{0020}\u{062A}\u{062D}\u{0643}\u{0645}\u{0020}\u{0644}\u{062D}\u{0638}\u{0629}" : 'Lahza admin dashboard statistics' ); ?>" width="400" height="280" loading="lazy" decoding="async" />
						</div>
					</div>
				</div>
			</div>

			<div class="lh__cta" data-lh-reveal>
				<div class="lh__cta-pattern" aria-hidden="true"></div>
				<div class="lh__cta-inner">
					<span class="lh__cta-brand">SpinesTech</span>
					<h3 class="lh__cta-heading"><?php echo esc_html( $is_rtl ? "\u{0646}\u{062D}\u{0648}\u{0651}\u{0644}\u{0020}\u{0641}\u{0643}\u{0631}\u{062A}\u{0643}\u{0020}\u{0625}\u{0644}\u{0649}\u{0020}\u{0645}\u{0646}\u{062A}\u{062C}\u{0020}\u{0631}\u{0642}\u{0645}\u{064A}\u{0020}\u{0645}\u{062A}\u{0643}\u{0627}\u{0645}\u{0644}" : 'We Turn Your Idea Into a Complete Digital Product' ); ?></h3>
					<p class="lh__cta-copy"><?php echo esc_html( $is_rtl ? "\u{0647}\u{0644}\u{0020}\u{0644}\u{062F}\u{064A}\u{0643}\u{0020}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0020}\u{0642}\u{0627}\u{062F}\u{0645}\u{061F}\u{0020}\u{062F}\u{0639}\u{0646}\u{0627}\u{0020}\u{0646}\u{0635}\u{0646}\u{0639}\u{0020}\u{0642}\u{0635}\u{0629}\u{0020}\u{0646}\u{062C}\u{0627}\u{062D}\u{0020}\u{062C}\u{062F}\u{064A}\u{062F}\u{0629}\u{0020}\u{0645}\u{0639}\u{0627}\u{064B}\u{002E}" : 'Do you have an upcoming project? Let us create a new success story together.' ); ?></p>
					<div class="lh__cta-ctas">
						<a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( '/contact/' ) : home_url( '/contact/' ) ); ?>" class="lh__btn lh__btn--gold"><?php echo esc_html( $is_rtl ? "\u{0627}\u{0628}\u{062F}\u{0623}\u{0020}\u{0645}\u{0634}\u{0631}\u{0648}\u{0639}\u{0643}\u{0020}\u{0627}\u{0644}\u{0622}\u{0646}" : 'Start Your Project Now' ); ?></a>
						<a href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( '/case-studies/' ) : home_url( '/case-studies/' ) ); ?>" class="lh__btn lh__btn--outline-light"><?php echo esc_html( $is_rtl ? "\u{0645}\u{0634}\u{0627}\u{0647}\u{062F}\u{0629}\u{0020}\u{062C}\u{0645}\u{064A}\u{0639}\u{0020}\u{0627}\u{0644}\u{0623}\u{0639}\u{0645}\u{0627}\u{0644}" : 'View All Work' ); ?></a>
					</div>
				</div>
			</div>

		</div>
	</section>

</main><!-- /.lh -->

<?php
get_template_part('template-parts/case-study/related-links', null, ['slug' => 'lahza']);
get_footer();
?>
