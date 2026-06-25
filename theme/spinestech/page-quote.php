<?php get_header(); $services = st_query_cpt('st_service'); $plans = st_query_cpt('st_pricing'); $locale = st_locale(); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-24 px-margin-mobile md:px-margin-desktop text-start" data-st-quote-page>
    <div class="max-w-container-max mx-auto mb-12 text-center">
        <span class="text-secondary font-bold text-label-md uppercase tracking-widest mb-4 block"><?php echo esc_html(st_t('quote.title')); ?></span>
        <h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold mb-4"><?php echo esc_html(st_t('quote.title')); ?></h1>
        <p class="text-body-lg text-on-surface-variant max-w-2xl mx-auto"><?php echo esc_html(st_t('quote.subtitle')); ?></p>
    </div>
    <div class="max-w-container-max mx-auto grid lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <section class="p-8 bg-white border border-outline-variant/30 rounded-2xl">
                <h2 class="text-headline-sm font-bold text-primary mb-4"><?php echo $locale === 'ar' ? '1. اختر الخدمة' : '1. Choose service'; ?></h2>
                <div class="grid sm:grid-cols-2 gap-3" data-st-quote-services>
                    <?php foreach ($services as $s) : ?>
                        <button type="button" data-value="<?php echo esc_attr($s['slug']); ?>" class="st-quote-chip p-4 rounded-xl border border-outline-variant/30 text-start hover:border-secondary transition-all"><?php echo esc_html($s['title']); ?></button>
                    <?php endforeach; ?>
                </div>
            </section>
            <section class="p-8 bg-white border border-outline-variant/30 rounded-2xl">
                <h2 class="text-headline-sm font-bold text-primary mb-4"><?php echo $locale === 'ar' ? '2. نطاق الميزانية' : '2. Budget range'; ?></h2>
                <div class="flex flex-wrap gap-3" data-st-quote-budget>
                    <?php foreach (['under-50k', '50k-150k', '150k-500k', '500k+'] as $b) : ?>
                        <button type="button" data-value="<?php echo esc_attr($b); ?>" class="st-quote-chip px-4 py-2 rounded-full border border-outline-variant/30 text-sm hover:border-secondary"><?php echo esc_html($b); ?></button>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
        <aside class="p-8 bg-surface-container-low rounded-2xl border border-outline-variant/20 h-fit sticky top-28">
            <div id="st-quote-alert" class="hidden mb-4 p-3 rounded-xl text-sm"></div>
            <form data-st-quote-form class="space-y-4">
                <h2 class="text-headline-sm font-bold text-primary"><?php echo $locale === 'ar' ? '3. بياناتك' : '3. Your details'; ?></h2>
                <input type="text" name="website" class="hidden" tabindex="-1">
                <input type="hidden" name="projectType" value="">
                <input type="hidden" name="budget" value="">
                <input required name="name" placeholder="<?php echo esc_attr(st_t('contact.fullName')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none">
                <input required name="email" type="email" placeholder="<?php echo esc_attr(st_t('contact.emailLabel')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none">
                <input name="phone" placeholder="<?php echo esc_attr(st_t('contact.phoneLabel')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none">
                <input name="company" placeholder="<?php echo esc_attr(st_t('contact.company')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none">
                <textarea required name="details" rows="4" placeholder="<?php echo $locale === 'ar' ? 'صف مشروعك' : 'Describe your project'; ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none resize-y"></textarea>
                <button type="submit" class="w-full bg-primary text-on-primary py-4 rounded-xl font-bold"><?php echo esc_html(st_t('quote.submit')); ?></button>
            </form>
        </aside>
    </div>
</main>
<?php get_footer(); ?>
