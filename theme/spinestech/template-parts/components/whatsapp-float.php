<?php
if (!defined('ABSPATH') || !function_exists('st_whatsapp_url')) {
    return;
}
$is_rtl = function_exists('st_locale') && st_locale() === 'ar';
$label = $is_rtl ? 'تواصل عبر واتساب' : 'Chat on WhatsApp';
$msg = $is_rtl
    ? 'مرحباً SpinesTech، أود مناقشة مشروع تقني.'
    : 'Hello SpinesTech, I would like to discuss a software project.';
?>
<a
    href="<?php echo esc_url(st_whatsapp_url($msg)); ?>"
    class="st-whatsapp-float"
    data-st-track="whatsapp"
    data-st-location="floating"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="<?php echo esc_attr($label); ?>"
>
    <span class="material-symbols-outlined" aria-hidden="true">chat</span>
</a>
