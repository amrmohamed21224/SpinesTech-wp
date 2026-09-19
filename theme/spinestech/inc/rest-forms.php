<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * REST API endpoints for SpinesTech forms (contact, quote, career).
 * Namespace matches the one enqueue.php gives to the frontend JS:
 *   spinestech/v1/submissions/contact
 *   spinestech/v1/submissions/quote
 *   spinestech/v1/submissions/career
 */

// The address that receives ALL form submissions.
if (!defined('ST_FORMS_RECIPIENT')) {
    define('ST_FORMS_RECIPIENT', 'social@spinestech.com');
}

function st_register_form_routes(): void
{
    register_rest_route('spinestech/v1', '/submissions/contact', [
        'methods'             => 'POST',
        'callback'            => 'st_handle_contact_submission',
        'permission_callback' => '__return_true',
    ]);

    register_rest_route('spinestech/v1', '/submissions/quote', [
        'methods'             => 'POST',
        'callback'            => 'st_handle_quote_submission',
        'permission_callback' => '__return_true',
    ]);

    register_rest_route('spinestech/v1', '/submissions/career', [
        'methods'             => 'POST',
        'callback'            => 'st_handle_career_submission',
        'permission_callback' => '__return_true',
    ]);
}
add_action('rest_api_init', 'st_register_form_routes');

/**
 * Shared helper: sanitize the common fields, send the email, return a
 * localized success/error message the frontend JS already knows how to
 * display via the `data.message` field.
 */
function st_send_form_email(string $subject, string $body, string $reply_to_email, string $reply_to_name, string $locale): bool
{
    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    if ($reply_to_email && is_email($reply_to_email)) {
        $headers[] = sprintf('Reply-To: %s <%s>', $reply_to_name ?: $reply_to_email, $reply_to_email);
    }

    return wp_mail(ST_FORMS_RECIPIENT, $subject, $body, $headers);
}

function st_locale_from_request(WP_REST_Request $request): string
{
    $locale = sanitize_text_field((string) $request->get_param('locale'));
    return $locale === 'en' ? 'en' : 'ar';
}

function st_success_message(string $locale): string
{
    return $locale === 'ar'
        ? 'ØªÙ… Ø¥Ø±Ø³Ø§Ù„ Ø·Ù„Ø¨Ùƒ Ø¨Ù†Ø¬Ø§Ø­ØŒ Ø³ÙŠØªÙˆØ§ØµÙ„ Ù…Ø¹Ùƒ ÙØ±ÙŠÙ‚Ù†Ø§ Ù‚Ø±ÙŠØ¨Ù‹Ø§.'
        : 'Your request has been sent successfully, our team will reach out soon.';
}

function st_error_message(string $locale): string
{
    return $locale === 'ar'
        ? 'Ø­Ø¯Ø« Ø®Ø·Ø£ Ø£Ø«Ù†Ø§Ø¡ Ø¥Ø±Ø³Ø§Ù„ Ø§Ù„Ø·Ù„Ø¨ØŒ Ø¨Ø±Ø¬Ø§Ø¡ Ø§Ù„Ù…Ø­Ø§ÙˆÙ„Ø© Ù…Ø±Ø© Ø£Ø®Ø±Ù‰.'
        : 'Something went wrong while sending your request, please try again.';
}

/* ---------------------------------------------------------------------- */
/* Contact / Consultation form                                            */
/* ---------------------------------------------------------------------- */
function st_handle_contact_submission(WP_REST_Request $request)
{
    $locale  = st_locale_from_request($request);
    $name    = sanitize_text_field((string) $request->get_param('name'));
    $email   = sanitize_email((string) $request->get_param('email'));
    $phone   = sanitize_text_field((string) $request->get_param('phone'));
    $company = sanitize_text_field((string) $request->get_param('company'));
    $message = sanitize_textarea_field((string) $request->get_param('message'));
    $source  = sanitize_text_field((string) $request->get_param('source'));

    if ($name === '' || $email === '' || !is_email($email)) {
        return new WP_REST_Response(['message' => st_error_message($locale)], 400);
    }

    $subject = sprintf('[%s] New contact submission from %s', $source ?: 'contact', $name);

    $body_lines = [
        "Name: {$name}",
        "Email: {$email}",
        "Phone: {$phone}",
        "Company: {$company}",
        "Source: {$source}",
        '',
        'Message:',
        $message,
    ];

    $sent = st_send_form_email($subject, implode("\n", $body_lines), $email, $name, $locale);

    if (!$sent) {
        return new WP_REST_Response(['message' => st_error_message($locale)], 500);
    }

    return new WP_REST_Response(['message' => st_success_message($locale)], 200);
}

/* ---------------------------------------------------------------------- */
/* Quote form                                                              */
/* ---------------------------------------------------------------------- */
function st_handle_quote_submission(WP_REST_Request $request)
{
    $locale      = st_locale_from_request($request);
    $name        = sanitize_text_field((string) $request->get_param('name'));
    $email       = sanitize_email((string) $request->get_param('email'));
    $phone       = sanitize_text_field((string) $request->get_param('phone'));
    $company     = sanitize_text_field((string) $request->get_param('company'));
    $projectType = sanitize_text_field((string) $request->get_param('projectType'));
    $budget      = sanitize_text_field((string) $request->get_param('budget'));
    $details     = sanitize_textarea_field((string) $request->get_param('details'));

    if ($name === '' || $email === '' || !is_email($email)) {
        return new WP_REST_Response(['message' => st_error_message($locale)], 400);
    }

    $subject = sprintf('[quote] New quote request from %s', $name);

    $body_lines = [
        "Name: {$name}",
        "Email: {$email}",
        "Phone: {$phone}",
        "Company: {$company}",
        "Project type: {$projectType}",
        "Budget: {$budget}",
        '',
        'Details:',
        $details,
    ];

    $sent = st_send_form_email($subject, implode("\n", $body_lines), $email, $name, $locale);

    if (!$sent) {
        return new WP_REST_Response(['message' => st_error_message($locale)], 500);
    }

    return new WP_REST_Response(['message' => st_success_message($locale)], 200);
}

/* ---------------------------------------------------------------------- */
/* Career form (multipart, may include a CV file)                         */
/* ---------------------------------------------------------------------- */
function st_handle_career_submission(WP_REST_Request $request)
{
    $locale  = st_locale_from_request($request);
    $name    = sanitize_text_field((string) $request->get_param('name'));
    $email   = sanitize_email((string) $request->get_param('email'));
    $phone   = sanitize_text_field((string) $request->get_param('phone'));
    $message = sanitize_textarea_field((string) $request->get_param('message'));

    if ($name === '' || $email === '' || !is_email($email)) {
        return new WP_REST_Response(['message' => st_error_message($locale)], 400);
    }

    $subject = sprintf('[career] New application from %s', $name);

    $body_lines = [
        "Name: {$name}",
        "Email: {$email}",
        "Phone: {$phone}",
        '',
        'Message:',
        $message,
    ];

    $attachments = [];
    $files = $request->get_file_params();

    if (!empty($files['cv']) && $files['cv']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if (in_array($files['cv']['type'], $allowed_types, true) && $files['cv']['size'] <= 5 * 1024 * 1024) {
            $upload = wp_handle_upload($files['cv'], ['test_form' => false]);
            if (!empty($upload['file'])) {
                $attachments[] = $upload['file'];
            }
        }
    }

    $sent = st_send_form_email($subject, implode("\n", $body_lines), $email, $name, $locale);

    if ($sent && !empty($attachments)) {
        // Resend with attachment (wp_mail's $attachments param needs the
        // headers rebuilt, simplest is a second call including files).
        $headers = ['Content-Type: text/plain; charset=UTF-8'];
        wp_mail(ST_FORMS_RECIPIENT, $subject . ' (CV attached)', implode("\n", $body_lines), $headers, $attachments);
    }

    if (!$sent) {
        return new WP_REST_Response(['message' => st_error_message($locale)], 500);
    }

    return new WP_REST_Response(['message' => st_success_message($locale)], 200);
}