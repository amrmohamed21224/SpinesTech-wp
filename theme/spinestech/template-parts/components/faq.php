<?php
/**
 * Reusable FAQ accordion — visible HTML for FAQPage schema pairing.
 *
 * @var array<int, array{q:string,a:string}> $faq_items
 * @var string $faq_id
 */
if (!defined('ABSPATH') || empty($faq_items)) {
    return;
}
$faq_id = $faq_id ?? 'st-faq';
$is_rtl = function_exists('st_locale') && st_locale() === 'ar';
?>
<section class="st-faq" aria-labelledby="<?php echo esc_attr($faq_id); ?>-title">
    <h2 id="<?php echo esc_attr($faq_id); ?>-title" class="st-faq__title">
        <?php echo esc_html($is_rtl ? 'أسئلة شائعة' : 'Frequently Asked Questions'); ?>
    </h2>
    <div class="st-faq__list">
        <?php foreach ($faq_items as $i => $item) : ?>
            <details class="st-faq__item"<?php echo $i === 0 ? ' open' : ''; ?>>
                <summary class="st-faq__q"><?php echo esc_html($item['q']); ?></summary>
                <div class="st-faq__a"><p><?php echo esc_html($item['a']); ?></p></div>
            </details>
        <?php endforeach; ?>
    </div>
</section>
