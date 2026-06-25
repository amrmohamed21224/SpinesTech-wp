<?php
/**
 * Template Name: Contact
 */
get_header();
?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-24 px-margin-mobile md:px-margin-desktop text-start relative">
    <div class="max-w-container-max mx-auto relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center gap-2 py-1.5 px-4 bg-secondary/10 text-secondary text-label-md rounded-full mb-6 border border-secondary/20"><span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span><?php echo esc_html(st_t('contact.badge')); ?></span>
            <h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold mb-6"><?php echo esc_html(st_t('contact.heroTitle')); ?></h1>
            <p class="text-body-lg text-on-surface-variant"><?php echo esc_html(st_t('contact.heroSubtitle')); ?></p>
        </div>
        <div class="max-w-xl mx-auto">
            <div id="st-form-alert" class="hidden mb-6 p-4 rounded-xl text-sm font-medium"></div>
            <form data-st-contact-form class="space-y-5 p-8 bg-white border border-outline-variant/30 rounded-2xl shadow-lg">
                <h2 class="text-headline-sm font-bold text-primary mb-2"><?php echo esc_html(st_t('contact.formTitle')); ?></h2>
                <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">
                <div><label class="block text-label-md font-semibold mb-2"><?php echo esc_html(st_t('contact.fullName')); ?> *</label><input required name="name" type="text" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-surface-container-lowest focus:ring-2 focus:ring-secondary/30 outline-none"></div>
                <div><label class="block text-label-md font-semibold mb-2"><?php echo esc_html(st_t('contact.emailLabel')); ?> *</label><input required name="email" type="email" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-surface-container-lowest focus:ring-2 focus:ring-secondary/30 outline-none"></div>
                <div><label class="block text-label-md font-semibold mb-2"><?php echo esc_html(st_t('contact.phoneLabel')); ?></label><input name="phone" type="tel" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-surface-container-lowest outline-none"></div>
                <div><label class="block text-label-md font-semibold mb-2"><?php echo esc_html(st_t('contact.company')); ?></label><input name="company" type="text" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-surface-container-lowest outline-none"></div>
                <div><label class="block text-label-md font-semibold mb-2"><?php echo esc_html(st_t('contact.message')); ?> *</label><textarea required name="message" rows="5" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-surface-container-lowest outline-none resize-y"></textarea></div>
                <button type="submit" class="w-full bg-primary text-on-primary py-4 rounded-xl font-bold hover:bg-primary/90 transition-all"><?php echo esc_html(st_t('contact.submit')); ?></button>
            </form>
        </div>
    </div>
</main>
<?php get_footer(); ?>
