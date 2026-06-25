<?php
$locale = st_locale();
$arrow = $locale === 'ar' ? 'arrow_back' : 'arrow_forward';
$services = st_query_cpt('st_service', 3);
$plans = st_query_cpt('st_pricing', 3);
$faqs = st_query_cpt('st_faq', 3);
$steps = [
    ['home.step1Title', 'home.step1Desc', '01'],
    ['home.step2Title', 'home.step2Desc', '02'],
    ['home.step3Title', 'home.step3Desc', '03'],
    ['home.step4Title', 'home.step4Desc', '04'],
];
?>
<section class="py-24 px-margin-mobile md:px-margin-desktop bg-surface-container-low text-start">
    <div class="max-w-container-max mx-auto">
        <div class="text-center mb-16">
            <span class="text-secondary font-bold text-label-md tracking-widest uppercase mb-4 block"><?php echo esc_html(st_t('home.aboutBadge')); ?></span>
            <h2 class="text-headline-xl mb-4 text-primary font-bold"><?php echo esc_html(st_t('home.aboutTitle')); ?></h2>
            <div class="w-24 h-1 bg-secondary mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 p-10 bg-white rounded-2xl border border-outline-variant/20">
                <h3 class="text-headline-lg mb-4 text-primary-container font-bold"><?php echo esc_html(st_t('home.visionTitle')); ?></h3>
                <p class="text-body-lg text-on-surface-variant leading-relaxed"><?php echo esc_html(st_t('home.visionText')); ?></p>
                <div class="mt-8 flex gap-4">
                    <div class="bg-surface-container-high p-4 rounded-lg text-center flex-1"><div class="text-headline-lg font-bold text-secondary">+150</div><div class="text-caption"><?php echo esc_html(st_t('home.projects')); ?></div></div>
                    <div class="bg-surface-container-high p-4 rounded-lg text-center flex-1"><div class="text-headline-lg font-bold text-secondary">50+</div><div class="text-caption"><?php echo esc_html(st_t('home.experts')); ?></div></div>
                </div>
            </div>
            <div class="p-10 bg-primary-container text-on-primary rounded-2xl text-center relative overflow-hidden">
                <div class="islamic-pattern absolute inset-0"></div>
                <span class="material-symbols-outlined text-6xl mb-6 text-secondary-fixed relative z-10">shield_person</span>
                <h3 class="text-headline-sm mb-4 font-bold relative z-10"><?php echo esc_html(st_t('home.sovereigntyTitle')); ?></h3>
                <p class="text-body-md opacity-80 relative z-10"><?php echo esc_html(st_t('home.sovereigntyText')); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <h2 class="text-headline-xl mb-4 text-primary font-bold"><?php echo esc_html(st_t('home.servicesTitle')); ?></h2>
                <p class="text-body-lg text-on-surface-variant"><?php echo esc_html(st_t('home.servicesSubtitle')); ?></p>
            </div>
            <a href="<?php echo esc_url(st_url('/services/')); ?>" class="text-secondary font-bold inline-flex items-center gap-2"><?php echo esc_html(st_t('home.viewAllServices')); ?><span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span></a>
        </div>
        <?php if ($services) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <?php foreach ($services as $s) : ?>
                    <a href="<?php echo esc_url(st_cpt_link('services', $s['slug'])); ?>" class="group p-8 bg-white border border-outline-variant/30 rounded-2xl hover:border-secondary hover:shadow-xl transition-all">
                        <div class="bg-secondary/10 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:bg-secondary group-hover:text-white transition-colors"><span class="material-symbols-outlined text-3xl"><?php echo esc_html($s['icon'] ?? 'code'); ?></span></div>
                        <h3 class="text-headline-sm mb-4 text-primary font-bold"><?php echo esc_html($s['title']); ?></h3>
                        <p class="text-on-surface-variant mb-6"><?php echo esc_html($s['description']); ?></p>
                        <span class="inline-flex items-center gap-2 font-bold text-secondary"><?php echo esc_html(st_t('common.learnMore')); ?><span class="material-symbols-outlined text-[18px]"><?php echo esc_html($arrow); ?></span></span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="py-24 px-margin-mobile md:px-margin-desktop bg-primary-container text-on-primary text-start">
    <div class="max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div>
            <h2 class="text-headline-xl mb-6 font-bold"><?php echo esc_html(st_t('home.sectorsTitle')); ?></h2>
            <p class="text-body-lg opacity-80 mb-10"><?php echo esc_html(st_t('home.sectorsSubtitle')); ?></p>
            <div class="grid grid-cols-2 gap-6">
                <?php foreach ([['business_center','home.sectorGov','home.sectorGovDesc'],['local_hospital','home.sectorHealth','home.sectorHealthDesc'],['shopping_cart','home.sectorEcom','home.sectorEcomDesc'],['factory','home.sectorIndustrial','home.sectorIndustrialDesc']] as [$icon,$t1,$t2]) : ?>
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-white/5 transition-colors">
                        <span class="material-symbols-outlined text-secondary-fixed"><?php echo esc_html($icon); ?></span>
                        <div><h4 class="text-sm font-bold"><?php echo esc_html(st_t($t1)); ?></h4><p class="text-caption opacity-60"><?php echo esc_html(st_t($t2)); ?></p></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="bg-surface-container-highest/10 p-2 rounded-2xl border border-white/10 shadow-2xl">
            <div class="h-[400px] rounded-xl bg-primary relative overflow-hidden flex items-center justify-center">
                <div class="islamic-pattern absolute inset-0 opacity-10"></div>
                <div class="absolute w-3/4 h-3/4 border border-secondary/20 rounded-full animate-pulse"></div>
                <span class="material-symbols-outlined text-8xl text-secondary-fixed relative z-10" style="font-variation-settings:'FILL' 1">hub</span>
            </div>
        </div>
    </div>
</section>

<section class="py-24 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto text-center mb-16">
        <h2 class="text-headline-xl mb-4 text-primary font-bold"><?php echo esc_html(st_t('home.processTitle')); ?></h2>
        <p class="text-body-lg text-on-surface-variant"><?php echo esc_html(st_t('home.processSubtitle')); ?></p>
    </div>
    <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 relative text-center">
        <div class="hidden md:block absolute top-1/4 inset-x-0 h-0.5 bg-outline-variant/30 -z-10"></div>
        <?php foreach ($steps as [$title, $desc, $num]) : ?>
            <div class="group">
                <div class="w-16 h-16 bg-white border-4 border-background rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-secondary group-hover:text-white transition-all shadow-md"><span class="font-bold"><?php echo esc_html($num); ?></span></div>
                <h3 class="text-headline-sm mb-2 text-primary font-bold"><?php echo esc_html(st_t($title)); ?></h3>
                <p class="text-caption text-on-surface-variant px-4"><?php echo esc_html(st_t($desc)); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="py-24 px-margin-mobile md:px-margin-desktop bg-surface-container text-start">
    <div class="max-w-container-max mx-auto text-center">
        <h2 class="text-headline-xl mb-12 text-primary font-bold"><?php echo esc_html(st_t('home.pricingTitle')); ?></h2>
        <?php if ($plans) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($plans as $plan) :
                    $rec = !empty($plan['recommended']); ?>
                    <div class="p-8 rounded-2xl flex flex-col items-start text-start relative <?php echo $rec ? 'bg-primary-container border-2 border-secondary scale-105 shadow-2xl z-10 text-on-primary' : 'bg-white border border-outline-variant/30'; ?>">
                        <?php if ($rec) : ?><div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-secondary text-white px-6 py-1 rounded-full text-caption font-bold"><?php echo esc_html(st_t('common.mostPopular')); ?></div><?php endif; ?>
                        <span class="px-4 py-1 rounded-full text-caption font-bold mb-4 <?php echo $rec ? 'bg-white/10' : 'bg-surface-container-high'; ?>"><?php echo esc_html($plan['tier'] ?? ''); ?></span>
                        <h3 class="text-headline-lg mb-4 font-bold"><?php echo esc_html($plan['name']); ?></h3>
                        <p class="text-body-md mb-8 <?php echo $rec ? 'opacity-80' : 'text-on-surface-variant'; ?>"><?php echo esc_html($plan['description']); ?></p>
                        <?php if (!empty($plan['features'])) : ?>
                            <ul class="space-y-4 mb-10 w-full">
                                <?php foreach (array_slice($plan['features'], 0, 3) as $feat) : ?>
                                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm text-secondary">check</span><?php echo esc_html($feat); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(st_url('/quote/?plan=' . urlencode($plan['id']))); ?>" class="w-full text-center py-3 rounded-lg font-bold <?php echo $rec ? 'bg-secondary text-white hover:bg-secondary/90' : 'border-2 border-primary text-primary hover:bg-primary hover:text-white'; ?> transition-all"><?php echo esc_html($plan['ctaText'] ?? st_t('home.requestQuote')); ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="py-24 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-headline-xl text-center mb-12 text-primary font-bold"><?php echo esc_html(st_t('home.faqTitle')); ?></h2>
        <?php if ($faqs) : ?>
            <div class="space-y-4" data-st-accordion>
                <?php foreach ($faqs as $i => $faq) : ?>
                    <div class="bg-white border border-outline-variant/30 rounded-xl overflow-hidden shadow-sm">
                        <button type="button" class="st-accordion-trigger w-full p-6 flex justify-between items-center cursor-pointer font-bold text-primary text-start" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                            <?php echo esc_html($faq['question']); ?>
                            <span class="material-symbols-outlined transition-transform duration-300 <?php echo $i === 0 ? 'rotate-180' : ''; ?>">expand_more</span>
                        </button>
                        <div class="st-accordion-panel overflow-hidden transition-all duration-300 <?php echo $i === 0 ? 'max-h-96 opacity-100 p-6 pt-0' : 'max-h-0 opacity-0'; ?> text-on-surface-variant"><?php echo esc_html($faq['answer']); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
