<?php get_header(); $locale = st_locale(); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-24 px-margin-mobile md:px-margin-desktop text-start" data-st-consultation-page>
    <div class="max-w-container-max mx-auto grid lg:grid-cols-2 gap-12">
        <div>
            <span class="text-secondary font-bold text-label-md mb-4 block"><?php echo $locale === 'ar' ? 'استشارة مجانية · 45 دقيقة' : 'Free · 45 min'; ?></span>
            <h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold mb-6"><?php echo esc_html(st_t('consultation.title')); ?></h1>
            <p class="text-body-lg text-on-surface-variant mb-8"><?php echo esc_html(st_t('consultation.subtitle')); ?></p>
            <div class="grid sm:grid-cols-2 gap-3 mb-8" data-st-consult-goals>
                <?php foreach ([['growth', $locale === 'ar' ? 'نمو الأعمال' : 'Business growth'], ['automation', $locale === 'ar' ? 'أتمتة' : 'Automation'], ['ai', $locale === 'ar' ? 'ذكاء اصطناعي' : 'AI'], ['rebuild', $locale === 'ar' ? 'إعادة بناء' : 'Rebuild']] as [$id, $label]) : ?>
                    <button type="button" data-goal="<?php echo esc_attr($id); ?>" class="st-goal-chip p-4 rounded-xl border border-outline-variant/30 text-start font-bold hover:border-secondary transition-all"><?php echo esc_html($label); ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="p-8 bg-white border border-outline-variant/30 rounded-2xl shadow-lg h-fit">
            <div id="st-consult-alert" class="hidden mb-4 p-3 rounded-xl text-sm"></div>
            <form data-st-consult-form class="space-y-4">
                <h2 class="text-headline-sm font-bold text-primary"><?php echo esc_html(st_t('consultation.title')); ?></h2>
                <input type="text" name="website" class="hidden" tabindex="-1">
                <input type="hidden" name="goal" value="">
                <input required name="name" placeholder="<?php echo esc_attr(st_t('contact.fullName')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none">
                <input required name="email" type="email" placeholder="<?php echo esc_attr(st_t('contact.emailLabel')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none">
                <input name="phone" placeholder="<?php echo esc_attr(st_t('contact.phoneLabel')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none">
                <input name="company" placeholder="<?php echo esc_attr(st_t('contact.company')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none">
                <textarea required name="message" rows="4" placeholder="<?php echo $locale === 'ar' ? 'ما الذي تريد مناقشته؟' : 'What to discuss?'; ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none resize-y"></textarea>
                <button type="submit" class="w-full bg-secondary text-on-secondary py-4 rounded-xl font-bold"><?php echo esc_html(st_t('consultation.title')); ?></button>
            </form>
            <p class="mt-4 text-center text-sm"><a href="<?php echo esc_url(st_url('/quote/')); ?>" class="text-secondary font-bold"><?php echo esc_html(st_t('home.requestQuote')); ?></a></p>
        </div>
    </div>
</main>
<?php get_footer(); ?>
