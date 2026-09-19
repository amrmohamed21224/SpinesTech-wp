<?php
/**
 * Template Part: SpinesTech AI-style FAQ Chatbot
 * -------------------------------------------------
 * Ø¶Ø¹Ù‡ ÙÙŠ: template-parts/chatbot.php
 * Ø§Ø³ØªØ¯Ø¹ÙÙ‡ ÙÙŠ footer.php Ù‚Ø¨Ù„ Ø¥ØºÙ„Ø§Ù‚ </body> Ù…Ø¨Ø§Ø´Ø±Ø©:
 *      get_template_part( 'template-parts/chatbot' );
 *
 * ØªØ£ÙƒØ¯ Ø£Ù† Ù‡Ø°Ù‡ Ø§Ù„Ø£Ø³Ø·Ø± Ù…ÙˆØ¬ÙˆØ¯Ø© ÙÙŠ inc/enqueue.php:
 *      wp_enqueue_style( 'st-chatbot', get_theme_file_uri( 'assets/css/components/chatbot.css' ), array(), '1.0.0' );
 *      wp_enqueue_script( 'st-chatbot', get_theme_file_uri( 'assets/js/chatbot.js' ), array(), '1.0.0', true );
 *
 * Ø§Ù„Ù…Ù„Ù ÙŠØ¹ØªÙ…Ø¯ Ø¹Ù„Ù‰ st_locale() Ùˆ st_dir() Ø§Ù„Ù…ÙˆØ¬ÙˆØ¯ØªÙŠÙ† ÙÙŠ inc/i18n.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$st_locale = function_exists( 'st_locale' ) ? st_locale() : 'ar';
$st_dir    = function_exists( 'st_dir' ) ? st_dir() : ( 'ar' === $st_locale ? 'rtl' : 'ltr' );

/**
 * Ù‚Ø§Ø¹Ø¯Ø© Ø¨ÙŠØ§Ù†Ø§Øª Ø§Ù„Ø£Ø³Ø¦Ù„Ø© ÙˆØ§Ù„Ø£Ø¬ÙˆØ¨Ø© Ø§Ù„ÙƒØ§Ù…Ù„Ø© Ø¨Ø§Ù„Ø¹Ø±Ø¨ÙŠ ÙˆØ§Ù„Ø¥Ù†Ø¬Ù„ÙŠØ²ÙŠ.
 * ÙƒÙ„ ÙØ¦Ø© (category) Ù„Ù‡Ø§: Ù…ÙØªØ§Ø­ØŒ ØªØ³Ù…ÙŠØ©ØŒ Ø£ÙŠÙ‚ÙˆÙ†Ø© (Ù…ÙØªØ§Ø­ Ø£ÙŠÙ‚ÙˆÙ†Ø© ÙŠÙÙ‚Ø±Ø£ Ù…Ù† JS)
 * ÙƒÙ„ Ø³Ø¤Ø§Ù„ Ù„Ù‡: idØŒ ÙØ¦Ø©ØŒ Ø³Ø¤Ø§Ù„ØŒ Ø¬ÙˆØ§Ø¨ (ÙŠØ¯Ø¹Ù… Ø£Ø³Ø·Ø± Ø¬Ø¯ÙŠØ¯Ø© \n)ØŒ ÙƒÙ„Ù…Ø§Øª Ù…ÙØªØ§Ø­ÙŠØ© Ù„Ù„Ø¨Ø­Ø« Ø§Ù„Ø­Ø±.
 */
$st_chatbot_i18n = array(

	'ar' => array(
		'brand_name'   => 'SpinesTech',
		'window_title' => 'Ù…Ø³Ø§Ø¹Ø¯ SpinesTech',
		'window_subtitle' => 'Ù…ØªØµÙ„ Ø§Ù„Ø¢Ù† â€¢ Ø¹Ø§Ø¯Ø©Ù‹ ÙŠØ±Ø¯ Ø®Ù„Ø§Ù„ Ø¯Ù‚Ø§Ø¦Ù‚',
		'launcher_label' => 'ØªØ­Ø¯Ø« Ù…Ø¹Ù†Ø§',
		'teaser_text'  => 'Ø£Ù‡Ù„Ø§Ù‹ ðŸ‘‹ Ø¹Ù†Ø¯Ùƒ Ø³Ø¤Ø§Ù„ Ø¹Ù† Ù…Ø´Ø±ÙˆØ¹ÙƒØŸ Ø§Ø³Ø£Ù„Ù†ÙŠ!',
		'welcome_message' => "Ø£Ù‡Ù„Ø§Ù‹ Ø¨ÙŠÙƒ ÙÙŠ SpinesTech! ðŸŒ±\nØ£Ù†Ø§ Ù‡Ù†Ø§ Ø¹Ù„Ø´Ø§Ù† Ø£Ø³Ø§Ø¹Ø¯Ùƒ ØªØ¹Ø±Ù ÙƒÙ„ Ø­Ø§Ø¬Ø© Ø¹Ù† Ø®Ø¯Ù…Ø§ØªÙ†Ø§ØŒ Ø£Ø³Ø¹Ø§Ø±Ù†Ø§ØŒ ÙˆÙˆÙ‚ØªÙ†Ø§ ÙÙŠ ØªÙ†ÙÙŠØ° Ø§Ù„Ù…Ø´Ø§Ø±ÙŠØ¹.\nØ§Ø®ØªØ§Ø± ÙØ¦Ø© Ù…Ù† ØªØ­Øª Ø£Ùˆ Ø§ÙƒØªØ¨ Ø³Ø¤Ø§Ù„Ùƒ Ù…Ø¨Ø§Ø´Ø±Ø©.",
		'categories_prompt' => 'Ø§Ø®ØªØ§Ø± Ø§Ù„Ù…ÙˆØ¶ÙˆØ¹ Ø§Ù„Ù„ÙŠ ÙŠÙ‡Ù…Ùƒ:',
		'back_to_categories' => 'Ø±Ø¬ÙˆØ¹ Ù„Ù„ÙØ¦Ø§Øª',
		'more_in_category' => 'Ø£Ø³Ø¦Ù„Ø© ØªØ§Ù†ÙŠØ© ÙÙŠ Ù†ÙØ³ Ø§Ù„Ù…ÙˆØ¶ÙˆØ¹:',
		'input_placeholder' => 'Ø§ÙƒØªØ¨ Ø³Ø¤Ø§Ù„Ùƒ Ù‡Ù†Ø§...',
		'send_label' => 'Ø¥Ø±Ø³Ø§Ù„',
		'typing_label' => 'Ø§Ù„Ù…Ø³Ø§Ø¹Ø¯ Ø¨ÙŠÙƒØªØ¨...',
		'no_match_message' => "Ù…Ø¹Ù†Ø¯ÙŠØ´ Ø¥Ø¬Ø§Ø¨Ø© Ø¬Ø§Ù‡Ø²Ø© Ù„Ø³Ø¤Ø§Ù„Ùƒ Ø¯Ù‡ Ø¨Ø§Ù„Ø¸Ø¨Ø· ðŸ¤”\nÙ…Ù…ÙƒÙ† ØªØ¬Ø±Ø¨ ØªÙˆØµÙ Ø³Ø¤Ø§Ù„Ùƒ Ø¨Ø´ÙƒÙ„ ØªØ§Ù†ÙŠØŒ Ø£Ùˆ Ø§Ø®ØªØ§Ø± Ù…Ù† Ø§Ù„ÙØ¦Ø§Øª Ø¯ÙŠØŒ Ø£Ùˆ ØªÙˆØ§ØµÙ„ Ù…Ø¨Ø§Ø´Ø±Ø© Ù…Ø¹ ÙØ±ÙŠÙ‚Ù†Ø§.",
		'contact_cta_label' => 'ØªÙˆØ§ØµÙ„ Ù…Ø¹ ÙØ±ÙŠÙ‚Ù†Ø§',
		'restart_label' => 'Ø§Ø¨Ø¯Ø£ Ù…Ø­Ø§Ø¯Ø«Ø© Ø¬Ø¯ÙŠØ¯Ø©',
		'close_label' => 'Ø¥ØºÙ„Ø§Ù‚ Ø§Ù„Ø´Ø§Øª',
		'end_note' => 'Ù…ÙŠÙ† Ø§Ù„Ù„ÙŠ Ø¨ÙŠØ±Ø¯ Ø¹Ù„ÙŠÙƒØŸ Ù…Ø³Ø§Ø¹Ø¯ Ø¢Ù„ÙŠ Ø¨ÙŠØ¹Ø±Ø¶ Ù…Ø¹Ù„ÙˆÙ…Ø§Øª Ø¬Ø§Ù‡Ø²Ø© Ø¹Ù† SpinesTechØŒ Ù…Ø´ Ø´Ø§Øª Ù…Ø¨Ø§Ø´Ø± Ù…Ø¹ ÙØ±ÙŠÙ‚ Ø§Ù„Ø¯Ø¹Ù….',

		'categories' => array(
			array( 'id' => 'about',    'label' => 'Ø¹Ù† Ø§Ù„Ø´Ø±ÙƒØ©',        'icon' => 'building' ),
			array( 'id' => 'services', 'label' => 'Ø§Ù„Ø®Ø¯Ù…Ø§Øª',          'icon' => 'wrench' ),
			array( 'id' => 'pricing',  'label' => 'Ø§Ù„Ø³Ø¹Ø± ÙˆØ§Ù„ØªÙ†ÙÙŠØ°',   'icon' => 'money' ),
			array( 'id' => 'projects', 'label' => 'Ø¯Ø±Ø§Ø³Ø§Øª Ø§Ù„Ø­Ø§Ù„Ø©',    'icon' => 'folder' ),
			array( 'id' => 'careers',  'label' => 'Ø§Ù„ÙˆØ¸Ø§Ø¦Ù',          'icon' => 'briefcase' ),
			array( 'id' => 'contact',  'label' => 'Ø§Ù„ØªÙˆØ§ØµÙ„ ÙˆØ§Ù„Ø¯Ø¹Ù…',   'icon' => 'phone' ),
		),

		'questions' => array(
			array(
				'id' => 'ar-about-1', 'category' => 'about',
				'q' => 'Ø¥ÙŠÙ‡ Ù‡ÙŠ SpinesTech Ø¨Ø§Ù„Ø¸Ø¨Ø·ØŸ',
				'a' => "SpinesTech Ø§Ø³ØªÙˆØ¯ÙŠÙˆ Ù‡Ù†Ø¯Ø³Ø© Ù…Ù†ØªØ¬Ø§ØªØŒ Ø¨Ù†Ø³Ø§Ø¹Ø¯ Ø§Ù„Ø´Ø±ÙƒØ§Øª ÙˆØ§Ù„Ø³ØªØ§Ø±Øª Ø£Ø¨ ÙˆØ§Ù„Ø´Ø±ÙƒØ§Ø¡ Ø§Ù„ØªÙ‚Ù†ÙŠÙŠÙ† ÙŠØ­ÙˆÙ‘Ù„ÙˆØ§ Ø§Ù„Ø£ÙÙƒØ§Ø± Ø§Ù„Ù…Ø¹Ù‚Ø¯Ø© Ù„Ø£Ù†Ø¸Ù…Ø© Ø±Ù‚Ù…ÙŠØ© Ù…ØªÙƒØ§Ù…Ù„Ø© Ù‚Ø§Ø¨Ù„Ø© Ù„Ù„ØªØ´ØºÙŠÙ„ ÙˆØ§Ù„Ù†Ù…Ùˆ.\nÙ…Ø´ Ø¨Ø³ Ø¨Ù†Ø¨Ù†ÙŠ ØªØ·Ø¨ÙŠÙ‚Ø§ØªØŒ Ø¥Ø­Ù†Ø§ Ø¨Ù†ØµÙ…Ù… Ø£Ù†Ø¸Ù…Ø© Ø£Ø¹Ù…Ø§Ù„ ÙƒØ§Ù…Ù„Ø©: Ø§Ù„Ø£Ø¯ÙˆØ§Ø±ØŒ Ø§Ù„ØµÙ„Ø§Ø­ÙŠØ§ØªØŒ Ø³ÙŠØ± Ø§Ù„Ø¹Ù…Ù„ÙŠØ§ØªØŒ ÙˆÙ‚ÙˆØ§Ø¹Ø¯ Ø§Ù„Ù†Ø¸Ø§Ù….",
				'keywords' => array( 'spinestech', 'Ø§Ù„Ø´Ø±ÙƒØ©', 'Ù…ÙŠÙ†', 'ØªØ¹Ø±ÙŠÙ', 'Ù…Ù† Ù†Ø­Ù†' ),
			),
			array(
				'id' => 'ar-about-2', 'category' => 'about',
				'q' => 'Ù„ÙŠÙ‡ Ø£Ø®ØªØ§Ø± SpinesTech Ø¨Ø¯Ù„ Ø´Ø±ÙƒØ© ØªØ§Ù†ÙŠØ©ØŸ',
				'a' => "Ù„Ø£Ù†Ù†Ø§ Ù…Ø´ Ø¨Ù†Ø¨ÙŠØ¹ ÙƒÙˆØ¯ Ø¨Ø³ØŒ Ø¨Ù†Ø¨ÙŠØ¹ Ù†Ø¸Ø§Ù… ÙÙƒØ±ÙŠ ÙƒØ§Ù…Ù„ Ù„Ù…Ø´Ø±ÙˆØ¹Ùƒ:\n1. Ø¨Ù†ÙÙ‡Ù… Ù…ÙˆØ¯ÙŠÙ„ Ø§Ù„Ø¹Ù…Ù„ ÙˆØ§Ù„Ø£Ø¯ÙˆØ§Ø± Ø§Ù„Ø£ÙˆÙ„.\n2. Ø¨Ø¹Ø¯ÙŠÙ† Ù†ØµÙ…Ù… Ù‚ÙˆØ§Ø¹Ø¯ Ø§Ù„Ù†Ø¸Ø§Ù… ÙˆØ³ÙŠØ± Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª.\n3. ÙˆØ£Ø®ÙŠØ±Ø§Ù‹ Ù†Ø­ÙˆÙ‘Ù„ Ø¯Ù‡ Ù„Ù…Ù†ØªØ¬ Ø±Ù‚Ù…ÙŠ Ø¬Ø§Ù‡Ø² Ù„Ù„ØªÙˆØ³Ø¹.\nØ¯Ù‡ Ø§Ù„Ù„ÙŠ Ø¨ÙŠØ®Ù„ÙŠ Ø§Ù„Ù…Ù†ØªØ¬ ÙŠØ¹ÙŠØ´ ÙˆÙŠÙƒØ¨Ø± Ù…Ø¹ Ø´Ø±ÙƒØªÙƒØŒ Ù…Ø´ ÙŠØªÙƒØ³Ø± Ø£ÙˆÙ„ Ù…Ø§ ØªÙƒØ¨Ø±.",
				'keywords' => array( 'Ù…Ù…ÙŠØ²Ø§Øª', 'Ù„ÙŠÙ‡', 'ÙØ±Ù‚', 'Ù…ÙŠØ²Ø© ØªÙ†Ø§ÙØ³ÙŠØ©' ),
			),
			array(
				'id' => 'ar-about-3', 'category' => 'about',
				'q' => 'Ø¥ÙŠÙ‡ Ø§Ù„Ù‚Ø·Ø§Ø¹Ø§Øª Ø§Ù„Ù„ÙŠ Ø§Ø´ØªØºÙ„ØªÙˆØ§ Ù…Ø¹Ø§Ù‡Ø§ØŸ',
				'a' => "Ø§Ø´ØªØºÙ„Ù†Ø§ ÙÙŠ Ù‚Ø·Ø§Ø¹Ø§Øª Ù…ØªÙ†ÙˆØ¹Ø© Ø²ÙŠ: Ø§Ù„ØªØ¬Ø§Ø±Ø© Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ© ÙˆØ§Ù„Ù…ØªØ§Ø¬Ø±ØŒ Ø§Ù„Ø¹Ù‚Ø§Ø±Ø§Øª ÙˆØ¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ù…ØªÙ„ÙƒØ§Øª (PropCare)ØŒ Ø§Ù„Ù…Ø¯ÙÙˆØ¹Ø§Øª ÙˆØ§Ù„Ø­Ù„ÙˆÙ„ Ø§Ù„Ù…Ø§Ù„ÙŠØ© (Lahza)ØŒ Ø¨Ø§Ù„Ø¥Ø¶Ø§ÙØ© Ù„Ù…Ø´Ø§Ø±ÙŠØ¹ Backway ÙˆÙ‚Ø·Ø§Ø¹Ø§Øª ØªØ§Ù†ÙŠØ© Ù‡ØªÙ„Ø§Ù‚ÙŠÙ‡Ø§ ÙÙŠ ØµÙØ­Ø© Ø§Ù„Ù‚Ø·Ø§Ø¹Ø§Øª Ø¹Ù†Ø¯Ù†Ø§.",
				'keywords' => array( 'Ù‚Ø·Ø§Ø¹Ø§Øª', 'ØµÙ†Ø§Ø¹Ø§Øª', 'Ù…Ø¬Ø§Ù„Ø§Øª', 'sectors' ),
			),
			array(
				'id' => 'ar-about-4', 'category' => 'about',
				'q' => 'ÙÙŠÙ‡ ÙØ±Ù‚ Ø¨ØªØ§Ø¹ÙƒÙˆØ§ Ø¯Ø§Ø®Ù„ Ù…ØµØ± Ø¨Ø³ ÙˆÙ„Ø§ Ø¨Ø±Ø§ ÙƒÙ…Ø§Ù†ØŸ',
				'a' => "Ø¨Ù†Ø´ØªØºÙ„ Ù…Ø¹ Ø¹Ù…Ù„Ø§Ø¡ Ù…Ø­Ù„ÙŠÙŠÙ† ÙˆØ¹Ù…Ù„Ø§Ø¡ ÙÙŠ Ø§Ù„Ø³ÙˆÙ‚ Ø§Ù„Ø¥Ù‚Ù„ÙŠÙ…ÙŠ ÙˆØ§Ù„Ø¯ÙˆÙ„ÙŠØŒ ÙˆØ§Ù„ÙØ±ÙŠÙ‚ Ø´ØºØ§Ù„ Ø¨Ø´ÙƒÙ„ Ù‡Ø¬ÙŠÙ† (Hybrid) Ø¹Ø´Ø§Ù† Ù†Ù‚Ø¯Ø± Ù†Ù„Ø¨ÙŠ Ø§Ø­ØªÙŠØ§Ø¬Ø§Øª Ø§Ù„Ø¹Ù…Ù„Ø§Ø¡ Ø§Ù„Ù…Ø®ØªÙ„ÙØ© ÙÙŠ Ø£ÙŠ Ù…ÙƒØ§Ù†.",
				'keywords' => array( 'Ø¯ÙˆÙ„', 'Ù…ÙƒØ§Ù†', 'ÙØ±ÙˆØ¹', 'international' ),
			),

			array(
				'id' => 'ar-services-1', 'category' => 'services',
				'q' => 'Ø¥ÙŠÙ‡ Ø§Ù„Ø®Ø¯Ù…Ø§Øª Ø§Ù„Ù„ÙŠ Ø¨ØªÙ‚Ø¯Ù…ÙˆÙ‡Ø§ØŸ',
				'a' => "Ø¨Ù†Ù‚Ø¯Ù… Ù…Ø¬Ù…ÙˆØ¹Ø© Ø®Ø¯Ù…Ø§Øª Ù…ØªÙƒØ§Ù…Ù„Ø©:\nâ€¢ ØªØµÙ…ÙŠÙ… ÙˆØªØ·ÙˆÙŠØ± Ù…ÙˆØ§Ù‚Ø¹ ÙˆÙ…Ù†ØµØ§Øª ÙˆÙˆØ±Ø¯Ø¨Ø±ÙŠØ³ Ù…Ø®ØµØµØ©\nâ€¢ ØªØ·Ø¨ÙŠÙ‚Ø§Øª ÙˆÙŠØ¨ ÙˆØ£Ù†Ø¸Ù…Ø© Ø¥Ø¯Ø§Ø±Ø© Ø£Ø¹Ù…Ø§Ù„ (SaaS/Internal Systems)\nâ€¢ ØªØµÙ…ÙŠÙ… UX/UI Ø§Ø­ØªØ±Ø§ÙÙŠ\nâ€¢ Ø§Ø³ØªØ´Ø§Ø±Ø§Øª ØªÙ‚Ù†ÙŠØ© ÙˆÙ‡ÙŠÙƒÙ„Ø© Ø£Ù†Ø¸Ù…Ø© (System Architecture)\nâ€¢ Ø§Ù„ØµÙŠØ§Ù†Ø© ÙˆØ§Ù„Ø¯Ø¹Ù… Ø§Ù„ÙÙ†ÙŠ Ø¨Ø¹Ø¯ Ø§Ù„Ø¥Ø·Ù„Ø§Ù‚",
				'keywords' => array( 'Ø®Ø¯Ù…Ø§Øª', 'services', 'Ø¨ØªØ¹Ù…Ù„ÙˆØ§ Ø§ÙŠÙ‡' ),
			),
			array(
				'id' => 'ar-services-2', 'category' => 'services',
				'q' => 'Ø¨ØªØ¨Ù†ÙˆØ§ ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ù…ÙˆØ¨Ø§ÙŠÙ„ØŸ',
				'a' => "Ø£ÙŠÙˆÙ‡ØŒ Ø¨Ù†Ø¨Ù†ÙŠ ØªØ·Ø¨ÙŠÙ‚Ø§Øª Ù…ÙˆØ¨Ø§ÙŠÙ„ (iOS Ùˆ Android) Ù„Ù…Ø§ ÙŠÙƒÙˆÙ†ÙˆØ§ Ø¬Ø²Ø¡ Ù…Ù† Ù…Ù†Ø¸ÙˆÙ…Ø© Ø§Ù„Ù†Ø¸Ø§Ù… Ø§Ù„Ù„ÙŠ Ø¨Ù†ØµÙ…Ù…Ù‡ØŒ Ø®ØµÙˆØµØ§Ù‹ Ù„Ùˆ Ù…Ø­ØªØ§Ø¬ Ø±Ø¨Ø· Ù…Ø¨Ø§Ø´Ø± Ù…Ø¹ Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… Ø£Ùˆ API Ø®Ù„ÙÙŠ Ø¨Ù†ÙŠÙ†Ù‡ Ø¥Ø­Ù†Ø§.",
				'keywords' => array( 'Ù…ÙˆØ¨Ø§ÙŠÙ„', 'ØªØ·Ø¨ÙŠÙ‚', 'ios', 'android', 'mobile app' ),
			),
			array(
				'id' => 'ar-services-3', 'category' => 'services',
				'q' => 'Ø¥Ø²Ø§ÙŠ Ø¨ØªØ¨Ø¯Ø£ÙˆØ§ ÙÙŠ Ø£ÙŠ Ù…Ø´Ø±ÙˆØ¹ Ø¬Ø¯ÙŠØ¯ØŸ',
				'a' => "Ø¨Ù†Ø¨Ø¯Ø£ Ø¯Ø§ÙŠÙ…Ø§Ù‹ Ø¨Ù…Ø±Ø­Ù„Ø© Ø§ÙƒØªØ´Ø§Ù (Discovery):\n1. ÙÙ‡Ù… Ù…ÙˆØ¯ÙŠÙ„ Ø§Ù„Ø¹Ù…Ù„ØŒ Ø§Ù„Ø£Ø¯ÙˆØ§Ø±ØŒ ÙˆØ§Ù„ØµÙ„Ø§Ø­ÙŠØ§Øª.\n2. ØªØ­Ø¯ÙŠØ¯ Ø³ÙŠØ± Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª (Workflows) ÙˆÙ‚ÙˆØ§Ø¹Ø¯ Ø§Ù„Ù†Ø¸Ø§Ù….\n3. ØªØµÙ…ÙŠÙ… Ø§Ù„Ø­Ù„ Ø§Ù„ØªÙ‚Ù†ÙŠ ÙˆØ§Ù„ÙˆØ§Ø¬Ù‡Ø§Øª.\n4. Ø§Ù„ØªÙ†ÙÙŠØ° Ø¹Ù„Ù‰ Ù…Ø±Ø§Ø­Ù„ (Sprints) Ù…Ø¹ Ù…Ø±Ø§Ø¬Ø¹Ø§Øª Ø¯ÙˆØ±ÙŠØ© Ù…Ø¹Ø§Ùƒ.\n5. Ø§Ù„Ø¥Ø·Ù„Ø§Ù‚ + Ø¯Ø¹Ù… Ù…Ø§ Ø¨Ø¹Ø¯ Ø§Ù„Ø¥Ø·Ù„Ø§Ù‚.",
				'keywords' => array( 'Ø®Ø·ÙˆØ§Øª', 'Ù…Ù†Ù‡Ø¬ÙŠØ©', 'process', 'ÙƒÙŠÙ ØªØ¹Ù…Ù„ÙˆØ§' ),
			),
			array(
				'id' => 'ar-services-4', 'category' => 'services',
				'q' => 'Ù…Ù…ÙƒÙ† ØªØ·ÙˆØ±ÙˆØ§ Ù…ÙˆÙ‚Ø¹ Ù…ÙˆØ¬ÙˆØ¯ Ø¹Ù†Ø¯ÙŠ Ø¨Ø§Ù„ÙØ¹Ù„ØŸ',
				'a' => "Ø£ÙƒÙŠØ¯ØŒ Ø¨Ù†Ù‚Ø¯Ø± Ù†Ø±Ø§Ø¬Ø¹ Ø§Ù„ÙƒÙˆØ¯ Ø§Ù„Ø­Ø§Ù„ÙŠØŒ Ù†Ø­Ø¯Ø¯ Ù†Ù‚Ø§Ø· Ø§Ù„Ø¶Ø¹Ù ÙˆØ§Ù„ÙØ±ØµØŒ ÙˆØ¨Ø¹Ø¯ÙŠÙ† Ù†Ø·ÙˆØ± Ø§Ù„Ù…ÙˆÙ‚Ø¹ Ø£Ùˆ Ù†Ø¹ÙŠØ¯ Ù‡ÙŠÙƒÙ„ØªÙ‡ Ù…Ù† ØºÙŠØ± Ù…Ø§ Ù†ÙˆÙ‚Ù Ø´ØºÙ„Ùƒ Ø§Ù„Ø­Ø§Ù„ÙŠ.",
				'keywords' => array( 'ØªØ·ÙˆÙŠØ±', 'Ù…ÙˆÙ‚Ø¹ Ù…ÙˆØ¬ÙˆØ¯', 'ØªØ­Ø¯ÙŠØ«', 'redesign' ),
			),
			array(
				'id' => 'ar-services-5', 'category' => 'services',
				'q' => 'Ø¨ØªÙ‚Ø¯Ù…ÙˆØ§ Ø®Ø¯Ù…Ø© Ø§Ø³ØªØ´Ø§Ø±Ø© Ù‚Ø¨Ù„ Ø§Ù„ØªÙ†ÙÙŠØ°ØŸ',
				'a' => "Ø£ÙŠÙˆÙ‡ØŒ Ø¹Ù†Ø¯Ù†Ø§ ØµÙØ­Ø© Ø§Ø³ØªØ´Ø§Ø±Ø© Ù…Ø®ØµØµØ© ØªÙ‚Ø¯Ø± ØªØ­Ø¬Ø² Ù…Ù†Ù‡Ø§ Ø¬Ù„Ø³Ø© Ù…Ø¹ ÙØ±ÙŠÙ‚Ù†Ø§ Ø§Ù„ØªÙ‚Ù†ÙŠ Ù‚Ø¨Ù„ Ù…Ø§ ØªØ§Ø®Ø¯ Ø£ÙŠ Ù‚Ø±Ø§Ø± ÙÙŠ Ù…Ø´Ø±ÙˆØ¹ÙƒØŒ ÙˆÙ†Ø³Ø§Ø¹Ø¯Ùƒ ØªØ­Ø¯Ø¯ Ø§Ù„Ù†Ø·Ø§Ù‚ ÙˆØ§Ù„ØªÙƒÙ„ÙØ© Ø§Ù„ØªÙ‚Ø±ÙŠØ¨ÙŠØ©.",
				'keywords' => array( 'Ø§Ø³ØªØ´Ø§Ø±Ø©', 'consultation', 'Ø¬Ù„Ø³Ø©' ),
			),

			array(
				'id' => 'ar-pricing-1', 'category' => 'pricing',
				'q' => 'Ø§Ù„ØªØ³Ø¹ÙŠØ± Ø¨ÙŠØªØ­Ø¯Ø¯ Ø¥Ø²Ø§ÙŠØŸ',
				'a' => "Ø§Ù„Ø³Ø¹Ø± Ø¨ÙŠØªØ­Ø¯Ø¯ Ø¨Ø­Ø³Ø¨ Ø­Ø¬Ù… ÙˆØªØ¹Ù‚ÙŠØ¯ Ø§Ù„Ù…Ø´Ø±ÙˆØ¹ ÙˆØ§Ø­ØªÙŠØ§Ø¬Ø§ØªÙƒ. Ø¨Ù†Ù‚Ø¯Ù‘Ù… ØªÙ‚Ø¯ÙŠØ± Ù…Ø¨Ø¯Ø¦ÙŠ Ø¨Ø¹Ø¯ Ø¬Ù„Ø³Ø© Ø§ÙƒØªØ´Ø§Ù Ù‚ØµÙŠØ±Ø©.",
				'keywords' => array( 'Ø³Ø¹Ø±', 'ØªÙƒÙ„ÙØ©', 'ÙÙ„ÙˆØ³', 'Ø§Ø³Ø¹Ø§Ø±', 'price', 'cost' ),
			),
			array(
				'id' => 'ar-pricing-2', 'category' => 'pricing',
				'q' => 'Ø¥Ø²Ø§ÙŠ Ø£Ø·Ù„Ø¨ Ø¹Ø±Ø¶ Ø³Ø¹Ø± (Quote)ØŸ',
				'a' => 'Ù„Ù„Ø·Ù„Ø¨ØŒ Ø§Ø¶ØºØ· Ø¹Ù„Ù‰ Ø²Ø± "Ø§Ø·Ù„Ø¨ Ø¹Ø±Ø¶ Ø³Ø¹Ø±" ÙˆØ§Ù…Ù„Ø§ Ø§Ù„Ù†Ù…ÙˆØ°Ø¬ Ø¨Ø§Ù„Ù…Ø¹Ù„ÙˆÙ…Ø§Øª Ø§Ù„Ø£Ø³Ø§Ø³ÙŠØ© Ø¹Ù† Ù…Ø´Ø±ÙˆØ¹Ùƒ. ÙØ±ÙŠÙ‚Ù†Ø§ Ù‡ÙŠØªÙˆØ§ØµÙ„ Ù…Ø¹Ø§Ùƒ Ø®Ù„Ø§Ù„ ÙŠÙˆÙ… Ø£Ùˆ ÙŠÙˆÙ…ÙŠÙ† Ù„ØªØ­Ø¯ÙŠØ¯ Ø§Ù„Ø®Ø·ÙˆØ§Øª Ø§Ù„Ø¬Ø§ÙŠØ©.',
				'keywords' => array( 'Ø¹Ø±Ø¶ Ø³Ø¹Ø±', 'quote', 'Ø§Ø·Ù„Ø¨ Ø¹Ø±Ø¶' ),
			),
			array(
				'id' => 'ar-pricing-3', 'category' => 'pricing',
				'q' => 'Ù…Ø¯Ø© ØªÙ†ÙÙŠØ° Ø§Ù„Ù…Ø´Ø±ÙˆØ¹ Ø¨ØªØ§Ø®Ø¯ Ù‚Ø¯ Ø¥ÙŠÙ‡ØŸ',
				'a' => "Ù…Ø¯Ø© Ø§Ù„ØªÙ†ÙÙŠØ° Ø¨ØªØ¹ØªÙ…Ø¯ Ø¹Ù„Ù‰ Ø­Ø¬Ù… Ø§Ù„Ù…Ø´Ø±ÙˆØ¹:\nâ€¢ Ù…ÙˆÙ‚Ø¹ Ø¨Ø³ÙŠØ·: Ù…Ù† 3 Ø¥Ù„Ù‰ 5 Ø£ÙŠØ§Ù…\nâ€¢ Ù…ÙˆÙ‚Ø¹ Ù…ØªÙˆØ³Ø·: Ù…Ù† 5 Ø¥Ù„Ù‰ 10 Ø£ÙŠØ§Ù…\nâ€¢ Ù†Ø¸Ø§Ù… Ù…ØªÙƒØ§Ù…Ù„: Ù…Ù† Ø£Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø¥Ù„Ù‰ Ø´Ù‡Ø±\nØ¨Ù†Ø­Ø¯Ø¯ Ø¬Ø¯ÙˆÙ„ Ø²Ù…Ù†ÙŠ ÙˆØ§Ø¶Ø­ Ù…Ø¹Ùƒ Ø¨Ø¹Ø¯ Ø¬Ù„Ø³Ø© Ø§Ù„Ø§ÙƒØªØ´Ø§Ù.",
				'keywords' => array( 'Ù…Ø¯Ø©', 'ÙˆÙ‚Øª', 'timeline', 'ÙƒØ§Ù… ÙŠÙˆÙ…' ),
			),
			array(
				'id' => 'ar-pricing-4', 'category' => 'pricing',
				'q' => 'ÙÙŠÙ‡ Ø¯ÙØ¹Ø© Ù…Ù‚Ø¯Ù…Ø© ÙˆØ§Ù„Ø¨Ø§Ù‚ÙŠ Ø¨Ø¹Ø¯ Ø§Ù„ØªØ³Ù„ÙŠÙ…ØŸ',
				'a' => "Ù†Ø´ØªØºÙ„ Ø¨Ù†Ø¸Ø§Ù… Ø¯ÙØ¹Ø§Øª Ø¹Ù„Ù‰ Ù…Ø±Ø§Ø­Ù„ Ø§Ù„ØªÙ†ÙÙŠØ°ØŒ Ø¨Ø­ÙŠØ« ØªØ¯ÙØ¹ Ù…Ù‚Ø§Ø¨Ù„ ÙƒÙ„ Ù…Ø±Ø­Ù„Ø© ÙŠØªÙ… ØªØ³Ù„ÙŠÙ…Ù‡Ø§ ÙØ¹Ù„ÙŠØ§Ù‹. Ø§Ù„ØªÙØ§ØµÙŠÙ„ Ø¨Ù†ÙˆØ¶Ø­Ù‡Ø§ Ù…Ø¹Ø§Ùƒ ÙÙŠ Ø¹Ø±Ø¶ Ø§Ù„Ù…Ø´Ø±ÙˆØ¹.",
				'keywords' => array( 'Ø¯ÙØ¹', 'Ø¯ÙØ¹Ø§Øª', 'payment', 'Ù…Ù‚Ø¯Ù…' ),
			),

			array(
				'id' => 'ar-projects-1', 'category' => 'projects',
				'q' => 'Ù…Ù…ÙƒÙ† Ø£Ø´ÙˆÙ Ø£Ù…Ø«Ù„Ø© Ù„Ù…Ø´Ø§Ø±ÙŠØ¹ Ø³Ø§Ø¨Ù‚Ø©ØŸ',
				'a' => "Ø£ÙƒÙŠØ¯! Ø¹Ù†Ø¯Ù†Ø§ ØµÙØ­Ø© Ø¯Ø±Ø§Ø³Ø§Øª Ø­Ø§Ù„Ø© (Case Studies) ÙÙŠÙ‡Ø§ ØªÙØ§ØµÙŠÙ„ Ù…Ø´Ø§Ø±ÙŠØ¹ Ø²ÙŠ Merchant ÙˆPropCare ÙˆLahzaØŒ ØªÙ‚Ø¯Ø± ØªØ´ÙˆÙ ÙÙŠÙ‡Ø§ Ø§Ù„Ù…Ø´ÙƒÙ„Ø©ØŒ Ø§Ù„Ø­Ù„ØŒ ÙˆØ§Ù„Ù†ØªÙŠØ¬Ø© Ù„ÙƒÙ„ Ù…Ø´Ø±ÙˆØ¹.",
				'keywords' => array( 'Ø§Ø¹Ù…Ø§Ù„ Ø³Ø§Ø¨Ù‚Ø©', 'Ø¨ÙˆØ±ØªÙÙˆÙ„ÙŠÙˆ', 'portfolio', 'case study', 'Ø§Ù…Ø«Ù„Ø©' ),
			),
			array(
				'id' => 'ar-projects-2', 'category' => 'projects',
				'q' => 'Ø¥ÙŠÙ‡ Ù…Ø´Ø±ÙˆØ¹ PropCareØŸ',
				'a' => "PropCare Ù†Ø¸Ø§Ù… Ù„Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ù…ØªÙ„ÙƒØ§Øª Ø§Ù„Ø¹Ù‚Ø§Ø±ÙŠØ©ØŒ Ø¨Ù†ÙŠÙ†Ø§ Ù„ÙŠÙ‡ Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… Ù…ØªÙƒØ§Ù…Ù„Ø© Ù„Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„ÙˆØ­Ø¯Ø§ØªØŒ Ø§Ù„Ù…Ø³ØªØ£Ø¬Ø±ÙŠÙ†ØŒ ÙˆØ§Ù„ØµÙŠØ§Ù†Ø© Ø¨Ø´ÙƒÙ„ Ù…Ø±ÙƒØ²ÙŠ ÙˆØ³Ù‡Ù„.",
				'keywords' => array( 'propcare', 'Ø¹Ù‚Ø§Ø±Ø§Øª' ),
			),
			array(
				'id' => 'ar-projects-3', 'category' => 'projects',
				'q' => 'Ø¥ÙŠÙ‡ Ù…Ø´Ø±ÙˆØ¹ LahzaØŸ',
				'a' => "Lahza Ù…Ø´Ø±ÙˆØ¹ ÙÙŠ Ù…Ø¬Ø§Ù„ Ø§Ù„Ù…Ø¯ÙÙˆØ¹Ø§Øª ÙˆØ§Ù„Ø­Ù„ÙˆÙ„ Ø§Ù„Ù…Ø§Ù„ÙŠØ©ØŒ Ø±ÙƒØ²Ù†Ø§ ÙÙŠÙ‡ Ø¹Ù„Ù‰ Ø¨Ù†Ø§Ø¡ ØªØ¬Ø±Ø¨Ø© Ø¯ÙØ¹ Ø³Ø±ÙŠØ¹Ø© ÙˆØ¢Ù…Ù†Ø© Ù…Ø¹ Ù„ÙˆØ­Ø© ØªØ­ÙƒÙ… ÙˆØ§Ø¶Ø­Ø© Ù„Ù…ØªØ§Ø¨Ø¹Ø© Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª.",
				'keywords' => array( 'lahza', 'Ù…Ø¯ÙÙˆØ¹Ø§Øª', 'payments' ),
			),
			array(
				'id' => 'ar-projects-4', 'category' => 'projects',
				'q' => 'Ø¥ÙŠÙ‡ Ù…Ø´Ø±ÙˆØ¹ MerchantØŸ',
				'a' => "Merchant Ù…Ù†ØµØ© ØªØ¬Ø§Ø±ÙŠØ© Ø¨Ù†ÙŠÙ†Ø§ Ù„ÙŠÙ‡Ø§ Ù†Ø¸Ø§Ù… ØªØ´ØºÙŠÙ„ÙŠ Ù…ØªÙƒØ§Ù…Ù„ ÙŠØ±Ø¨Ø· Ø¨ÙŠÙ† Ø§Ù„ØªØ¬Ø§Ø± ÙˆØ§Ù„Ø¹Ù…Ù„Ø§Ø¡ Ø¨Ø³ÙŠØ± Ø¹Ù…Ù„ÙŠØ§Øª Ù…Ø¨Ø³Ø· ÙˆÙ‚Ø§Ø¨Ù„ Ù„Ù„ØªÙˆØ³Ø¹.",
				'keywords' => array( 'merchant', 'ØªØ¬Ø§Ø±Ø©' ),
			),

			array(
				'id' => 'ar-careers-1', 'category' => 'careers',
				'q' => 'ÙÙŠÙ‡ ÙˆØ¸Ø§Ø¦Ù Ø´Ø§ØºØ±Ø© Ø¯Ù„ÙˆÙ‚ØªÙŠØŸ',
				'a' => "ØªÙ‚Ø¯Ø± ØªØ´ÙˆÙ ÙƒÙ„ Ø§Ù„ÙˆØ¸Ø§Ø¦Ù Ø§Ù„Ø´Ø§ØºØ±Ø© Ø­Ø§Ù„ÙŠØ§Ù‹ ÙÙŠ ØµÙØ­Ø© \"Ø§Ù„ÙˆØ¸Ø§Ø¦Ù\" ÙÙŠ Ø§Ù„Ù…ÙˆÙ‚Ø¹ØŒ ÙˆØ¨Ù†Ø­Ø¯Ù‘Ø«Ù‡Ø§ Ø£ÙˆÙ„ Ø¨Ø£ÙˆÙ„ Ø£ÙŠ Ù…Ø§ ØªÙØªØ­ ÙØ±ØµØ© Ø¬Ø¯ÙŠØ¯Ø©.",
				'keywords' => array( 'ÙˆØ¸Ø§Ø¦Ù', 'Ø´ØºÙ„', 'jobs', 'careers', 'ØªÙˆØ¸ÙŠÙ' ),
			),
			array(
				'id' => 'ar-careers-2', 'category' => 'careers',
				'q' => 'Ø¥Ø²Ø§ÙŠ Ø£Ù‚Ø¯Ù… Ø¹Ù„Ù‰ ÙˆØ¸ÙŠÙØ© Ø¹Ù†Ø¯ÙƒÙˆØ§ØŸ',
				'a' => "ØªÙ‚Ø¯Ø± ØªÙØªØ­ Ø§Ù„ÙˆØ¸ÙŠÙØ© Ø§Ù„Ù„ÙŠ ØªÙ‡Ù…Ùƒ Ù…Ù† ØµÙØ­Ø© Ø§Ù„ÙˆØ¸Ø§Ø¦ÙØŒ ÙˆØªÙ„Ø§Ù‚ÙŠ ÙÙŠÙ‡Ø§ ØªÙØ§ØµÙŠÙ„ Ø§Ù„Ø¯ÙˆØ± ÙˆØ§Ù„Ù…ØªØ·Ù„Ø¨Ø§ØªØŒ ÙˆØ²Ø±Ø§Ø± Ù…Ø¨Ø§Ø´Ø± Ù„Ù„ØªÙ‚Ø¯ÙŠÙ….",
				'keywords' => array( 'ØªÙ‚Ø¯ÙŠÙ…', 'Ø§Ø¨Ø¹Øª Ø³ÙŠØ±Ø© Ø°Ø§ØªÙŠØ©', 'cv', 'apply' ),
			),
			array(
				'id' => 'ar-careers-3', 'category' => 'careers',
				'q' => 'Ø¨ØªÙ‚Ø¨Ù„ÙˆØ§ Ø§Ù„Ø¹Ù…Ù„ Ø¹Ù† Ø¨Ø¹Ø¯ (Remote)ØŸ',
				'a' => "ÙØ±ÙŠÙ‚Ù†Ø§ Ø´ØºØ§Ù„ Ø¨Ù†Ø¸Ø§Ù… Ù‡Ø¬ÙŠÙ† (Hybrid)ØŒ ÙˆØ¨Ø¹Ø¶ Ø§Ù„Ø£Ø¯ÙˆØ§Ø± Ù…ØªØ§Ø­Ø© Remote Ø¨Ø§Ù„ÙƒØ§Ù…Ù„ Ø­Ø³Ø¨ Ø·Ø¨ÙŠØ¹Ø© Ø§Ù„ÙˆØ¸ÙŠÙØ©ØŒ Ù‡ØªÙ„Ø§Ù‚ÙŠ Ø§Ù„ØªÙØ§ØµÙŠÙ„ Ù…ÙƒØªÙˆØ¨Ø© ÙÙŠ ÙƒÙ„ Ø¥Ø¹Ù„Ø§Ù† ÙˆØ¸ÙŠÙØ©.",
				'keywords' => array( 'Ø±ÙŠÙ…ÙˆØª', 'remote', 'Ø¹Ù† Ø¨Ø¹Ø¯', 'Ø§ÙˆØ±Ùƒ Ù…Ù† Ø§Ù„Ø¨ÙŠØª' ),
			),

			array(
				'id' => 'ar-contact-1', 'category' => 'contact',
				'q' => 'Ø¥Ø²Ø§ÙŠ Ø£ØªÙˆØ§ØµÙ„ Ù…Ø¹Ø§ÙƒÙˆØ§ØŸ',
				'a' => "Ø£Ø³Ù‡Ù„ Ø·Ø±ÙŠÙ‚Ø© Ø¥Ù†Ùƒ ØªØ¯ÙˆØ³ Ø¹Ù„Ù‰ \"ØªÙˆØ§ØµÙ„ Ù…Ø¹Ù†Ø§\" ÙÙŠ Ø§Ù„Ù‚Ø§Ø¦Ù…Ø© Ø§Ù„Ø±Ø¦ÙŠØ³ÙŠØ© ÙˆØªÙ…Ù„Ù‰ Ø§Ù„ÙÙˆØ±Ù…ØŒ ÙˆÙØ±ÙŠÙ‚Ù†Ø§ Ù‡ÙŠØ±Ø¯ Ø¹Ù„ÙŠÙƒ ÙÙŠ Ø£Ù‚Ø±Ø¨ ÙˆÙ‚Øª. Ø£Ùˆ Ù…Ù…ÙƒÙ† ØªÙƒÙ…Ù„ Ù…Ø¹Ø§ÙŠØ§ Ù‡Ù†Ø§ ÙˆØ£ÙˆØ¬Ù‡Ùƒ Ù„Ø£Ù‚Ø±Ø¨ Ø®Ø·ÙˆØ©.",
				'keywords' => array( 'ØªÙˆØ§ØµÙ„', 'contact', 'Ø§Ø²Ø§ÙŠ Ø§ÙƒÙ„Ù…ÙƒÙ…' ),
			),
			array(
				'id' => 'ar-contact-2', 'category' => 'contact',
				'q' => 'Ø¨ØªØ±Ø¯ÙˆØ§ Ø®Ù„Ø§Ù„ Ù‚Ø¯ Ø¥ÙŠÙ‡ØŸ',
				'a' => "Ø¨Ù†Ø­Ø§ÙˆÙ„ Ù†Ø±Ø¯ Ø¹Ù„Ù‰ Ø£ÙŠ Ø§Ø³ØªÙØ³Ø§Ø± Ø®Ù„Ø§Ù„ ÙŠÙˆÙ… Ø¹Ù…Ù„ ÙˆØ§Ø­Ø¯ ÙƒØ­Ø¯ Ø£Ù‚ØµÙ‰ØŒ ÙˆØ§Ù„Ø§Ø³ØªØ´Ø§Ø±Ø§Øª Ø§Ù„Ù…Ø­Ø¬ÙˆØ²Ø© Ø¨ÙŠÙƒÙˆÙ† Ù„ÙŠÙ‡Ø§ Ù…ÙŠØ¹Ø§Ø¯ Ù…Ø­Ø¯Ø¯ Ù…Ø³Ø¨Ù‚Ø§Ù‹.",
				'keywords' => array( 'ÙˆÙ‚Øª Ø§Ù„Ø±Ø¯', 'Ø§Ø³ØªØ¬Ø§Ø¨Ø©', 'response time' ),
			),
			array(
				'id' => 'ar-contact-3', 'category' => 'contact',
				'q' => 'Ø¨ØªÙ‚Ø¯Ù…ÙˆØ§ Ø¯Ø¹Ù… ÙÙ†ÙŠ Ø¨Ø¹Ø¯ Ø¥Ø·Ù„Ø§Ù‚ Ø§Ù„Ù…Ø´Ø±ÙˆØ¹ØŸ',
				'a' => "Ø£ÙŠÙˆÙ‡ØŒ Ø¨Ù†Ù‚Ø¯Ù… Ø¨Ø§Ù‚Ø§Øª ØµÙŠØ§Ù†Ø© ÙˆØ¯Ø¹Ù… ÙÙ†ÙŠ Ø¨Ø¹Ø¯ Ø§Ù„Ø¥Ø·Ù„Ø§Ù‚ ØªØºØ·ÙŠ Ø§Ù„ØªØ­Ø¯ÙŠØ«Ø§ØªØŒ Ø¥ØµÙ„Ø§Ø­ Ø§Ù„Ø£Ø¹Ø·Ø§Ù„ØŒ ÙˆØ§Ù„Ù…Ø±Ø§Ù‚Ø¨Ø© Ø§Ù„Ø¯ÙˆØ±ÙŠØ© Ù„Ù„Ù†Ø¸Ø§Ù… Ø­Ø³Ø¨ Ø§ØªÙØ§Ù‚ Ù…Ø³Ø¨Ù‚.",
				'keywords' => array( 'ØµÙŠØ§Ù†Ø©', 'Ø¯Ø¹Ù… ÙÙ†ÙŠ', 'support', 'maintenance' ),
			),
			array(
				'id' => 'ar-contact-4', 'category' => 'contact',
				'q' => 'Ø§Ù„Ù…ÙˆÙ‚Ø¹ Ø¨ÙŠØ¯Ø¹Ù… Ù„ØºØ§Øª ØªØ§Ù†ÙŠØ© ØºÙŠØ± Ø§Ù„Ø¹Ø±Ø¨ÙŠØŸ',
				'a' => "Ø£ÙŠÙˆÙ‡ØŒ Ø§Ù„Ù…ÙˆÙ‚Ø¹ Ù…ØªØ§Ø­ Ø¨Ø§Ù„Ø¹Ø±Ø¨ÙŠ ÙˆØ§Ù„Ø¥Ù†Ø¬Ù„ÙŠØ²ÙŠØŒ ØªÙ‚Ø¯Ø± ØªØ¨Ø¯Ù‘Ù„ Ø§Ù„Ù„ØºØ© Ù…Ù† Ø§Ù„Ø²Ø±Ø§Ø± Ø§Ù„Ù…ÙˆØ¬ÙˆØ¯ ÙÙŠ Ø§Ù„Ù‡ÙŠØ¯Ø± ÙÙŠ Ø£ÙŠ ÙˆÙ‚Øª.",
				'keywords' => array( 'Ù„ØºØ©', 'Ø§Ù†Ø¬Ù„ÙŠØ²ÙŠ', 'language', 'english' ),
			),
		),
	),

	'en' => array(
		'brand_name'   => 'SpinesTech',
		'window_title' => 'SpinesTech Assistant',
		'window_subtitle' => 'Online now â€¢ Usually replies in minutes',
		'launcher_label' => 'Chat with us',
		'teaser_text'  => 'Hey there ðŸ‘‹ Got a question about your project? Ask away!',
		'welcome_message' => "Welcome to SpinesTech! ðŸŒ±\nI'm here to help you learn about our services, pricing, and project timelines.\nPick a topic below or type your question directly.",
		'categories_prompt' => 'Pick a topic you\'re curious about:',
		'back_to_categories' => 'Back to topics',
		'more_in_category' => 'More questions on this topic:',
		'input_placeholder' => 'Type your question...',
		'send_label' => 'Send',
		'typing_label' => 'Assistant is typing...',
		'no_match_message' => "I don't have a ready answer for that exact question ðŸ¤”\nTry rephrasing it, pick a topic below, or reach out to our team directly.",
		'contact_cta_label' => 'Contact our team',
		'restart_label' => 'Start a new chat',
		'close_label' => 'Close chat',
		'end_note' => "This is an automated assistant sharing ready-made info about SpinesTech, not a live chat with our support team.",

		'categories' => array(
			array( 'id' => 'about',    'label' => 'About us',        'icon' => 'building' ),
			array( 'id' => 'services', 'label' => 'Services',        'icon' => 'wrench' ),
			array( 'id' => 'pricing',  'label' => 'Pricing & Timeline', 'icon' => 'money' ),
			array( 'id' => 'projects', 'label' => 'Case Studies',    'icon' => 'folder' ),
			array( 'id' => 'careers',  'label' => 'Careers',         'icon' => 'briefcase' ),
			array( 'id' => 'contact',  'label' => 'Contact & Support', 'icon' => 'phone' ),
		),

		'questions' => array(
			array(
				'id' => 'en-about-1', 'category' => 'about',
				'q' => 'What exactly is SpinesTech?',
				'a' => "SpinesTech is a product engineering studio. We help companies, startups, and partners turn complex ideas into scalable, working digital systems.\nWe don't just build apps â€” we design complete business systems: roles, permissions, workflows, and system rules.",
				'keywords' => array( 'spinestech', 'about', 'who are you', 'company' ),
			),
			array(
				'id' => 'en-about-2', 'category' => 'about',
				'q' => 'Why choose SpinesTech over another agency?',
				'a' => "Because we don't just sell code, we sell a complete system of thinking for your product:\n1. We understand your business model and roles first.\n2. Then we design system rules and workflows.\n3. Finally we turn that into a ready-to-scale digital product.\nThat's what lets your product grow with your company instead of breaking under it.",
				'keywords' => array( 'why', 'difference', 'advantage', 'unique' ),
			),
			array(
				'id' => 'en-about-3', 'category' => 'about',
				'q' => 'What industries have you worked with?',
				'a' => "We've worked across several sectors: e-commerce and retail, real estate and property management (PropCare), payments and fintech (Lahza), plus Backway and other sectors listed on our sectors page.",
				'keywords' => array( 'industries', 'sectors', 'fields' ),
			),
			array(
				'id' => 'en-about-4', 'category' => 'about',
				'q' => 'Do you only work with local clients?',
				'a' => "We work with local clients as well as regional and international ones. Our team operates in a hybrid setup so we can serve clients wherever they are.",
				'keywords' => array( 'location', 'countries', 'international', 'offices' ),
			),

			array(
				'id' => 'en-services-1', 'category' => 'services',
				'q' => 'What services do you offer?',
				'a' => "We offer a full range of services:\nâ€¢ Custom WordPress websites and platforms\nâ€¢ Web apps and internal/SaaS business systems\nâ€¢ Professional UX/UI design\nâ€¢ Technical consulting and system architecture\nâ€¢ Post-launch maintenance and support",
				'keywords' => array( 'services', 'what do you do' ),
			),
			array(
				'id' => 'en-services-2', 'category' => 'services',
				'q' => 'Do you build mobile apps?',
				'a' => "Yes, we build iOS and Android apps when they're part of the broader system we're designing, especially when tight integration with a dashboard or a custom backend API is needed.",
				'keywords' => array( 'mobile', 'app', 'ios', 'android' ),
			),
			array(
				'id' => 'en-services-3', 'category' => 'services',
				'q' => 'How do you start a new project?',
				'a' => "We always start with a discovery phase:\n1. Understand the business model, roles, and permissions.\n2. Define workflows and system rules.\n3. Design the technical solution and interfaces.\n4. Build in sprints with regular reviews with you.\n5. Launch + post-launch support.",
				'keywords' => array( 'process', 'methodology', 'how do you work' ),
			),
			array(
				'id' => 'en-services-4', 'category' => 'services',
				'q' => 'Can you improve a website I already have?',
				'a' => "Absolutely â€” we review your existing codebase, identify weak points and opportunities, then improve or restructure the site without disrupting your current operations.",
				'keywords' => array( 'redesign', 'existing site', 'improve', 'revamp' ),
			),
			array(
				'id' => 'en-services-5', 'category' => 'services',
				'q' => 'Do you offer consultations before starting?',
				'a' => "Yes, we have a dedicated consultation page where you can book a session with our technical team before making any decisions, and we'll help you scope the project and estimate the cost.",
				'keywords' => array( 'consultation', 'session', 'book a call' ),
			),

			array(
				'id' => 'en-pricing-1', 'category' => 'pricing',
				'q' => 'How is pricing determined?',
				'a' => "Pricing depends on project size, number of roles and permissions, workflow complexity, and required integrations. There's no fixed price since every system is different, but we can give you an accurate estimate after a short session.",
				'keywords' => array( 'price', 'cost', 'pricing', 'budget' ),
			),
			array(
				'id' => 'en-pricing-2', 'category' => 'pricing',
				'q' => 'How do I request a quote?',
				'a' => "The easiest way is to click the \"Get a Quote\" button on the site and fill in your project details. Our team will get back to you with an initial estimate within a day or two.",
				'keywords' => array( 'quote', 'get a quote', 'request' ),
			),
			array(
				'id' => 'en-pricing-3', 'category' => 'pricing',
				'q' => 'How long does a project take?',
				'a' => "It depends on scope:\nâ€¢ Simple marketing site: 2-4 weeks\nâ€¢ Medium-complexity platform: 6-10 weeks\nâ€¢ Full business system: 3+ months\nWe give you a clear timeline right after the discovery session.",
				'keywords' => array( 'timeline', 'duration', 'how long' ),
			),
			array(
				'id' => 'en-pricing-4', 'category' => 'pricing',
				'q' => 'Is there an upfront payment and the rest on delivery?',
				'a' => "We typically work with milestone-based payments, so you pay for each phase as it's actually delivered â€” this keeps things fully transparent on both sides.",
				'keywords' => array( 'payment', 'installments', 'deposit' ),
			),

			array(
				'id' => 'en-projects-1', 'category' => 'projects',
				'q' => 'Can I see examples of past projects?',
				'a' => "Sure! We have a case studies page with details on projects like Merchant, PropCare, and Lahza â€” you can see the problem, the solution, and the results for each.",
				'keywords' => array( 'portfolio', 'past work', 'case study', 'examples' ),
			),
			array(
				'id' => 'en-projects-2', 'category' => 'projects',
				'q' => 'What is the PropCare project?',
				'a' => "PropCare is a property management system â€” we built a full dashboard for managing units, tenants, and maintenance requests from one central place.",
				'keywords' => array( 'propcare', 'real estate' ),
			),
			array(
				'id' => 'en-projects-3', 'category' => 'projects',
				'q' => 'What is the Lahza project?',
				'a' => "Lahza is a payments and fintech project where we focused on building a fast, secure payment experience with a clear dashboard for tracking transactions.",
				'keywords' => array( 'lahza', 'payments', 'fintech' ),
			),
			array(
				'id' => 'en-projects-4', 'category' => 'projects',
				'q' => 'What is the Merchant project?',
				'a' => "Merchant is a commerce platform we built with a complete operational system connecting merchants and customers through a simplified, scalable workflow.",
				'keywords' => array( 'merchant', 'commerce' ),
			),

			array(
				'id' => 'en-careers-1', 'category' => 'careers',
				'q' => 'Do you have any open positions right now?',
				'a' => "You can check all current openings on our \"Careers\" page â€” we update it as soon as a new opportunity opens up.",
				'keywords' => array( 'jobs', 'careers', 'openings', 'hiring' ),
			),
			array(
				'id' => 'en-careers-2', 'category' => 'careers',
				'q' => 'How do I apply for a job?',
				'a' => "Open the role you're interested in on the careers page, review the details and requirements, and use the direct apply button.",
				'keywords' => array( 'apply', 'cv', 'resume' ),
			),
			array(
				'id' => 'en-careers-3', 'category' => 'careers',
				'q' => 'Do you offer remote work?',
				'a' => "Our team works in a hybrid setup, and some roles are fully remote depending on the position â€” details are listed on each job posting.",
				'keywords' => array( 'remote', 'work from home', 'hybrid' ),
			),

			array(
				'id' => 'en-contact-1', 'category' => 'contact',
				'q' => 'How can I contact you?',
				'a' => "The easiest way is to click \"Contact Us\" in the main menu and fill in the form â€” our team will get back to you shortly. Or just keep chatting with me here.",
				'keywords' => array( 'contact', 'reach you', 'get in touch' ),
			),
			array(
				'id' => 'en-contact-2', 'category' => 'contact',
				'q' => 'How fast do you respond?',
				'a' => "We aim to respond to any inquiry within one business day at most, and booked consultations have a pre-scheduled time slot.",
				'keywords' => array( 'response time', 'how fast' ),
			),
			array(
				'id' => 'en-contact-3', 'category' => 'contact',
				'q' => 'Do you offer support after launch?',
				'a' => "Yes, we offer post-launch maintenance and support packages covering updates, bug fixes, and regular system monitoring based on a prior agreement.",
				'keywords' => array( 'support', 'maintenance', 'after launch' ),
			),
			array(
				'id' => 'en-contact-4', 'category' => 'contact',
				'q' => 'Does the site support other languages?',
				'a' => "Yes, the site is available in Arabic and English â€” you can switch languages any time using the button in the header.",
				'keywords' => array( 'language', 'arabic', 'switch language' ),
			),
		),
	),
);

$st_chatbot_active = isset( $st_chatbot_i18n[ $st_locale ] ) ? $st_chatbot_i18n[ $st_locale ] : $st_chatbot_i18n['ar'];
$st_chatbot_payload = array_merge(
	$st_chatbot_active,
	array(
		'locale' => $st_locale,
		'dir'    => $st_dir,
	)
);
?>
<div class="st-chatbot" data-st-chatbot dir="<?php echo esc_attr( $st_dir ); ?>">

	<!-- Ø²Ø±Ø§Ø± Ø§Ù„Ø´Ø§Øª Ø§Ù„Ø¹Ø§Ø¦Ù… -->
	<button type="button" class="st-chatbot__launcher" data-st-chatbot-launcher aria-expanded="false" aria-controls="st-chatbot-window" aria-label="<?php echo esc_attr( $st_chatbot_active['launcher_label'] ); ?>">
		<span class="st-chatbot__launcher-ring"></span>
		<span class="st-chatbot__launcher-icon st-chatbot__launcher-icon--chat">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path d="M4 12.5C4 7.80558 7.80558 4 12.5 4C17.1944 4 21 7.80558 21 12.5C21 17.1944 17.1944 21 12.5 21C11.0126 21 9.61532 20.6203 8.40045 19.9524L4.5 21L5.61729 17.3287C4.60484 15.9394 4 14.2828 4 12.5Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
				<circle cx="8.5" cy="12.5" r="1" fill="currentColor"/>
				<circle cx="12.5" cy="12.5" r="1" fill="currentColor"/>
				<circle cx="16.5" cy="12.5" r="1" fill="currentColor"/>
			</svg>
		</span>
		<span class="st-chatbot__launcher-icon st-chatbot__launcher-icon--close">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path d="M6 6L18 18M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
			</svg>
		</span>
		<span class="st-chatbot__launcher-badge" data-st-chatbot-badge></span>
	</button>

	<!-- ÙÙ‚Ø§Ø¹Ø© Ø§Ù„ØªØ±Ø­ÙŠØ¨ Ø§Ù„ØªÙ„Ù‚Ø§Ø¦ÙŠØ© -->
	<div class="st-chatbot__teaser" data-st-chatbot-teaser role="status">
		<button type="button" class="st-chatbot__teaser-close" data-st-chatbot-teaser-close aria-label="<?php echo esc_attr( $st_chatbot_active['close_label'] ); ?>">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M6 6L18 18M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
		</button>
		<p class="st-chatbot__teaser-text" data-st-chatbot-teaser-text></p>
	</div>

	<!-- Ù†Ø§ÙØ°Ø© Ø§Ù„Ø´Ø§Øª -->
	<section id="st-chatbot-window" class="st-chatbot__window" data-st-chatbot-window role="dialog" aria-modal="false" aria-label="<?php echo esc_attr( $st_chatbot_active['window_title'] ); ?>">

		<header class="st-chatbot__header">
			<span class="st-chatbot__header-bg" aria-hidden="true"></span>
			<div class="st-chatbot__avatar">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<path d="M12 2L14.5 9H21.5L15.75 13.2L18 20L12 15.9L6 20L8.25 13.2L2.5 9H9.5L12 2Z" fill="currentColor"/>
				</svg>
			</div>
			<div class="st-chatbot__header-info">
				<strong class="st-chatbot__header-title" data-st-chatbot-title></strong>
				<span class="st-chatbot__header-status">
					<span class="st-chatbot__status-dot"></span>
					<span data-st-chatbot-subtitle></span>
				</span>
			</div>
			<div class="st-chatbot__header-actions">
				<button type="button" class="st-chatbot__icon-btn" data-st-chatbot-restart title="<?php echo esc_attr( $st_chatbot_active['restart_label'] ); ?>">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<path d="M4 4V9H9M20 20V15H15M19.4 9C18.6 6.1 15.9 4 12.7 4C9.1 4 6.1 6.4 5.1 9.7M4.6 15C5.4 17.9 8.1 20 11.3 20C14.9 20 17.9 17.6 18.9 14.3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
				<button type="button" class="st-chatbot__icon-btn" data-st-chatbot-close title="<?php echo esc_attr( $st_chatbot_active['close_label'] ); ?>">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<path d="M6 6L18 18M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
					</svg>
				</button>
			</div>
		</header>

		<div class="st-chatbot__body" data-st-chatbot-body>
			<div class="st-chatbot__messages" data-st-chatbot-messages></div>
		</div>

		<footer class="st-chatbot__footer">
			<form class="st-chatbot__form" data-st-chatbot-form>
				<input
					type="text"
					class="st-chatbot__input"
					data-st-chatbot-input
					autocomplete="off"
					placeholder="<?php echo esc_attr( $st_chatbot_active['input_placeholder'] ); ?>"
					aria-label="<?php echo esc_attr( $st_chatbot_active['input_placeholder'] ); ?>"
				/>
				<button type="submit" class="st-chatbot__send" data-st-chatbot-send aria-label="<?php echo esc_attr( $st_chatbot_active['send_label'] ); ?>">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<path d="M4 12L20 4L14 20L11 13L4 12Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"/>
					</svg>
				</button>
			</form>
			<p class="st-chatbot__footnote" data-st-chatbot-footnote></p>
		</footer>
	</section>
</div>

<script>
	window.stChatbotData = <?php echo wp_json_encode( $st_chatbot_payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>;
</script>