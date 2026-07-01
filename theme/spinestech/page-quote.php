<?php get_header(); $services = st_query_cpt('st_service'); $plans = st_query_cpt('st_pricing'); $locale = st_locale(); ?>
<main class="page-quote" data-st-quote-page>
    <div class="container">
        <header class="page-quote__header">
            <span class="page-quote__eyebrow"><?php echo esc_html(st_t('quote.title')); ?></span>
            <h1 class="page-quote__title"><?php echo esc_html(st_t('quote.title')); ?></h1>
            <p class="page-quote__subtitle"><?php echo esc_html(st_t('quote.subtitle')); ?></p>
        </header>

        <div class="page-quote__grid">
            <div class="page-quote__main">
                <section class="page-quote__section">
                    <h2 class="page-quote__section-title"><?php echo $locale === 'ar' ? '1. اختر الخدمة' : '1. Choose service'; ?></h2>
                    <div class="page-quote__chip-grid" data-st-quote-services>
                        <?php foreach ($services as $s) : ?>
                            <button type="button" data-value="<?php echo esc_attr($s['slug']); ?>" class="quote-chip">
                                <?php echo esc_html($s['title']); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="page-quote__section">
                    <h2 class="page-quote__section-title"><?php echo $locale === 'ar' ? '2. نطاق الميزانية' : '2. Budget range'; ?></h2>
                    <div class="page-quote__chip-row" data-st-quote-budget>
                        <?php foreach (['under-50k', '50k-150k', '150k-500k', '500k+'] as $b) : ?>
                            <button type="button" data-value="<?php echo esc_attr($b); ?>" class="quote-chip quote-chip--small">
                                <?php echo esc_html($b); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>

            <aside class="page-quote__sidebar">
                <div id="st-quote-alert" class="alert alert--hidden"></div>
                <form data-st-quote-form class="page-quote__form">
                    <h2 class="page-quote__form-title"><?php echo $locale === 'ar' ? '3. بياناتك' : '3. Your details'; ?></h2>
                    <input type="text" name="website" class="is-hidden" tabindex="-1">
                    <input type="hidden" name="projectType" value="">
                    <input type="hidden" name="budget" value="">
                    
                    <div class="form-group">
                        <input required name="name" placeholder="<?php echo esc_attr(st_t('contact.fullName')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input required name="email" type="email" placeholder="<?php echo esc_attr(st_t('contact.emailLabel')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="phone" placeholder="<?php echo esc_attr(st_t('contact.phoneLabel')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="company" placeholder="<?php echo esc_attr(st_t('contact.company')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea required name="details" rows="4" placeholder="<?php echo $locale === 'ar' ? 'صف مشروعك' : 'Describe your project'; ?>" class="form-control"></textarea>
                    </div>
                    
                    <button type="submit" class="button button--primary page-quote__submit">
                        <?php echo esc_html(st_t('quote.submit')); ?>
                    </button>
                </form>
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>
