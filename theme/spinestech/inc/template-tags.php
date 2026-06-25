<?php
/**
 * Shared pricing + FAQ block.
 *
 * @param bool $show_faq Show FAQ section below plans.
 */
function st_render_pricing_section(bool $show_faq = true): void
{
    $plans = st_query_cpt('st_pricing');
    $faqs = $show_faq ? st_query_cpt('st_faq') : [];
    $locale = st_locale();
    ?>
    <section class="py-24 px-margin-mobile md:px-margin-desktop bg-surface-container text-start">
        <div class="max-w-container-max mx-auto text-center">
            <h1 class="text-headline-xl mb-4 text-primary font-bold"><?php echo esc_html(st_t('pricing.title')); ?></h1>
            <p class="text-body-lg text-on-surface-variant mb-12 max-w-2xl mx-auto"><?php echo esc_html(st_t('pricing.subtitle')); ?></p>
            <?php if ($plans) : ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 text-start">
                    <?php foreach ($plans as $plan) :
                        $rec = !empty($plan['recommended']); ?>
                        <article class="p-8 rounded-2xl flex flex-col h-full relative <?php echo $rec ? 'bg-primary-container border-2 border-secondary shadow-2xl text-on-primary md:scale-105 z-10' : 'bg-white border border-outline-variant/30'; ?>">
                            <?php if ($rec) : ?><div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-secondary text-white px-6 py-1 rounded-full text-caption font-bold"><?php echo esc_html(st_t('common.mostPopular')); ?></div><?php endif; ?>
                            <span class="inline-block px-4 py-1 rounded-full text-caption font-bold mb-4 w-fit <?php echo $rec ? 'bg-white/10' : 'bg-surface-container-high'; ?>"><?php echo esc_html($plan['tier'] ?? ''); ?></span>
                            <h2 class="text-headline-lg font-bold mb-4"><?php echo esc_html($plan['name']); ?></h2>
                            <p class="text-body-md mb-8 <?php echo $rec ? 'opacity-80' : 'text-on-surface-variant'; ?>"><?php echo esc_html($plan['description']); ?></p>
                            <?php if (!empty($plan['features'])) : ?>
                                <ul class="space-y-3 mb-10 flex-1">
                                    <?php foreach ($plan['features'] as $feat) : ?>
                                        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm text-secondary">check</span><?php echo esc_html($feat); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <a href="<?php echo esc_url(st_url('/quote/?plan=' . urlencode((string) $plan['id']))); ?>" class="w-full text-center py-3 rounded-lg font-bold transition-all <?php echo $rec ? 'bg-secondary text-white hover:bg-secondary/90' : 'border-2 border-primary text-primary hover:bg-primary hover:text-white'; ?>"><?php echo esc_html($plan['ctaText'] ?? st_t('home.requestQuote')); ?></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($show_faq && $faqs) : ?>
                <h2 class="text-headline-lg font-bold text-primary mb-8"><?php echo esc_html(st_t('home.faqTitle')); ?></h2>
                <div class="max-w-3xl mx-auto space-y-4 text-start" data-st-accordion>
                    <?php foreach ($faqs as $i => $faq) : ?>
                        <div class="bg-white border border-outline-variant/30 rounded-xl overflow-hidden">
                            <button type="button" class="st-accordion-trigger w-full p-6 flex justify-between items-center font-bold text-primary text-start" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"><?php echo esc_html($faq['question']); ?><span class="material-symbols-outlined transition-transform <?php echo $i === 0 ? 'rotate-180' : ''; ?>">expand_more</span></button>
                            <div class="st-accordion-panel overflow-hidden transition-all duration-300 <?php echo $i === 0 ? 'max-h-96 opacity-100 p-6 pt-0' : 'max-h-0 opacity-0'; ?> text-on-surface-variant"><?php echo esc_html($faq['answer']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
