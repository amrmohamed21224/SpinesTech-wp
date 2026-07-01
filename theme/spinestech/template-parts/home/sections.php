<?php
$locale = st_locale();
$is_rtl = $locale === 'ar';
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
<!-- About Section -->
<section class="home-section home-section--gray">
    <div class="container">
        <div class="home-section__header">
            <span class="home-pill home-pill--center">
                <span class="material-symbols-outlined">auto_awesome</span>
                <?php echo esc_html(st_t('home.aboutBadge')); ?>
            </span>
            <h2 class="home-section__title"><?php echo esc_html(st_t('home.aboutTitle')); ?></h2>
        </div>
        
        <div class="home-about">
            <div class="home-about__side">
                <span class="material-symbols-outlined home-about__side-icon">hub</span>
                <h3 class="home-about__side-title"><?php echo esc_html(st_t('home.sovereigntyTitle')); ?></h3>
                <p class="home-about__side-text"><?php echo esc_html(st_t('home.sovereigntyText')); ?></p>
            </div>

            <div class="home-about__main">
                <span class="home-about__eyebrow"><?php echo esc_html($is_rtl ? 'قابل للتوسع' : 'Scalable by design'); ?></span>
                <h3 class="home-about__title"><?php echo esc_html(st_t('home.visionTitle')); ?></h3>
                <p class="home-about__text"><?php echo esc_html(st_t('home.visionText')); ?></p>
                <div class="home-about__stats">
                    <div class="home-about__stat">
                        <div class="home-about__stat-value">+150</div>
                        <div class="home-about__stat-label"><?php echo esc_html(st_t('home.projects')); ?></div>
                    </div>
                    <div class="home-about__stat">
                        <div class="home-about__stat-value">50+</div>
                        <div class="home-about__stat-label"><?php echo esc_html(st_t('home.experts')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="home-section">
    <div class="container">
        <div class="home-section__split-header">
            <div class="home-section__split-text">
                <span class="home-pill">
                    <span class="material-symbols-outlined">design_services</span>
                    <?php echo esc_html($is_rtl ? 'ما نقدم' : 'What we deliver'); ?>
                </span>
                <h2 class="home-section__title"><?php echo esc_html(st_t('home.servicesTitle')); ?></h2>
                <p class="home-section__subtitle"><?php echo esc_html(st_t('home.servicesSubtitle')); ?></p>
            </div>
            <a href="<?php echo esc_url(st_url('/services/')); ?>" class="home-services__link">
                <?php echo esc_html(st_t('home.viewAllServices')); ?>
                <span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span>
            </a>
        </div>
        
        <?php if ($services) : ?>
            <div class="home-services">
                <?php foreach ($services as $s) : ?>
                    <a href="<?php echo esc_url(st_cpt_link('services', $s['slug'])); ?>" class="home-service-card">
                        <div class="home-service-card__icon">
                            <span class="material-symbols-outlined" style="font-size: 2rem;"><?php echo esc_html($s['icon'] ?? 'code'); ?></span>
                        </div>
                        <h3 class="home-service-card__title"><?php echo esc_html($s['title']); ?></h3>
                        <p class="home-service-card__desc"><?php echo esc_html($s['description']); ?></p>
                        <span class="home-service-card__link">
                            <?php echo esc_html(st_t('common.learnMore')); ?>
                            <span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Sectors Section -->
<section class="home-section home-section--dark">
    <div class="container home-sectors">
        <div class="home-sectors__visual">
            <div class="home-sectors__visual-inner">
                <div class="home-sectors__pulse"></div>
                <div class="home-sectors__pulse home-sectors__pulse--two"></div>
                <span class="material-symbols-outlined home-sectors__visual-icon" style="font-variation-settings:'FILL' 1">hub</span>
                <strong><?php echo esc_html($is_rtl ? 'حلول حسب القطاع' : 'Sector-ready systems'); ?></strong>
            </div>
        </div>
        <div>
            <span class="home-pill home-pill--dark">
                <span class="material-symbols-outlined">business_center</span>
                <?php echo esc_html($is_rtl ? 'قطاعات رئيسية' : 'Key industries'); ?>
            </span>
            <h2 class="home-section__title" style="text-align: start;"><?php echo esc_html(st_t('home.sectorsTitle')); ?></h2>
            <p class="home-section__subtitle" style="text-align: start; margin-inline: 0; margin-block-end: 2.5rem;">
                <?php echo esc_html(st_t('home.sectorsSubtitle')); ?>
            </p>
            <div class="home-sectors__grid">
                <?php foreach ([['business_center','home.sectorGov','home.sectorGovDesc'],['local_hospital','home.sectorHealth','home.sectorHealthDesc'],['shopping_cart','home.sectorEcom','home.sectorEcomDesc'],['factory','home.sectorIndustrial','home.sectorIndustrialDesc']] as [$icon,$t1,$t2]) : ?>
                    <div class="home-sectors__item">
                        <span class="material-symbols-outlined home-sectors__item-icon"><?php echo esc_html($icon); ?></span>
                        <div>
                            <h4 class="home-sectors__item-title"><?php echo esc_html(st_t($t1)); ?></h4>
                            <p class="home-sectors__item-desc"><?php echo esc_html(st_t($t2)); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="home-sectors__actions">
                <a class="button button--secondary" href="<?php echo esc_url(st_url('/solutions/')); ?>">
                    <?php echo esc_html($is_rtl ? 'استكشف الحلول' : 'Explore solutions'); ?>
                    <span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span>
                </a>
                <a class="button button--outline-light" href="<?php echo esc_url(st_url('/sectors/')); ?>">
                    <?php echo esc_html($is_rtl ? 'كل القطاعات' : 'All sectors'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="home-section">
    <div class="container">
        <div class="home-section__header">
            <span class="home-pill home-pill--center">
                <span class="material-symbols-outlined">timeline</span>
                <?php echo esc_html($is_rtl ? 'من الفكرة للتشغيل' : 'From idea to launch'); ?>
            </span>
            <h2 class="home-section__title"><?php echo esc_html(st_t('home.processTitle')); ?></h2>
            <p class="home-section__subtitle"><?php echo esc_html(st_t('home.processSubtitle')); ?></p>
        </div>
        
        <div class="home-process">
            <div class="home-process__line"></div>
            <?php foreach ($steps as [$title, $desc, $num]) : ?>
                <div class="home-process__step">
                    <div class="home-process__num"><?php echo esc_html($num); ?></div>
                    <h3 class="home-process__title"><?php echo esc_html(st_t($title)); ?></h3>
                    <p class="home-process__desc"><?php echo esc_html(st_t($desc)); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="home-section home-section--gray">
    <div class="container">
        <div class="home-section__header">
            <span class="home-pill home-pill--center">
                <span class="material-symbols-outlined">sell</span>
                <?php echo esc_html($is_rtl ? 'باقات مرنة' : 'Flexible packages'); ?>
            </span>
            <h2 class="home-section__title"><?php echo esc_html(st_t('home.pricingTitle')); ?></h2>
        </div>
        
        <?php if ($plans) : ?>
            <div class="home-pricing">
                <?php foreach ($plans as $plan) :
                    $rec = !empty($plan['recommended']); 
                    $cardCls = $rec ? 'home-pricing__card--featured' : '';
                    $ctaCls = $rec ? 'home-pricing__cta--primary' : 'home-pricing__cta--outline';
                ?>
                    <div class="home-pricing__card <?php echo $cardCls; ?>">
                        <?php if ($rec) : ?>
                            <div class="home-pricing__badge"><?php echo esc_html(st_t('common.mostPopular')); ?></div>
                        <?php endif; ?>
                        
                        <div>
                            <span class="home-pricing__tier"><?php echo esc_html($plan['tier'] ?? ''); ?></span>
                            <h3 class="home-pricing__title"><?php echo esc_html($plan['name']); ?></h3>
                            <p class="home-pricing__desc"><?php echo esc_html($plan['description']); ?></p>
                        </div>
                        
                        <?php if (!empty($plan['features'])) : ?>
                            <ul class="home-pricing__features">
                                <?php foreach (array_slice($plan['features'], 0, 3) as $feat) : ?>
                                    <li class="home-pricing__feature">
                                        <span class="material-symbols-outlined">check</span>
                                        <?php echo esc_html($feat); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        
                        <a href="<?php echo esc_url(st_url('/quote/?plan=' . urlencode($plan['id']))); ?>" class="home-pricing__cta <?php echo $ctaCls; ?>">
                            <?php echo esc_html($plan['ctaText'] ?? st_t('home.requestQuote')); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- FAQ Section -->
<section class="home-section">
    <div class="container">
        <div class="home-section__header">
            <span class="home-pill home-pill--center">
                <span class="material-symbols-outlined">help</span>
                <?php echo esc_html($is_rtl ? 'إجابات سريعة' : 'Quick answers'); ?>
            </span>
            <h2 class="home-section__title"><?php echo esc_html(st_t('home.faqTitle')); ?></h2>
        </div>
        
        <?php if ($faqs) : ?>
            <div class="home-faq" data-st-accordion>
                <?php foreach ($faqs as $i => $faq) : ?>
                    <div class="home-faq__item">
                        <button type="button" class="home-faq__trigger st-accordion-trigger" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                            <?php echo esc_html($faq['question']); ?>
                            <span class="material-symbols-outlined">expand_more</span>
                        </button>
                        <div class="home-faq__panel st-accordion-panel" style="<?php echo $i === 0 ? '' : 'display:none;'; ?>">
                            <?php echo esc_html($faq['answer']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="home-final-cta">
    <div class="container home-final-cta__box">
        <span class="home-pill home-pill--dark home-pill--center">
            <span class="material-symbols-outlined">support_agent</span>
            <?php echo esc_html($is_rtl ? 'جاهز للخطوة التالية؟' : 'Ready for the next step?'); ?>
        </span>
        <h2><?php echo esc_html($is_rtl ? 'خلينا نختار أفضل مسار تقني لمشروعك' : 'Let us choose the right technical path for your project'); ?></h2>
        <p><?php echo esc_html($is_rtl ? 'احجز استشارة مجانية أو اطلب عرض سعر، وسنرتب لك خطة واضحة قابلة للتنفيذ.' : 'Book a free consultation or request a quote and we will map a clear execution plan.'); ?></p>
        <div class="home-final-cta__actions">
            <a class="button button--secondary" href="<?php echo esc_url(st_url('/quote/')); ?>"><?php echo esc_html(st_t('home.requestQuote')); ?></a>
            <a class="button button--outline-light" href="<?php echo esc_url(st_url('/consultation/')); ?>"><?php echo esc_html(st_t('home.bookConsultation')); ?></a>
        </div>
    </div>
</section>
