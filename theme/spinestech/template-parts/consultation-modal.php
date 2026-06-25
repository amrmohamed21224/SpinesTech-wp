<div id="st-consultation-modal" class="fixed inset-0 z-[80] hidden" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" data-st-close-consultation></div>
    <div class="relative z-10 flex min-h-full items-center justify-center p-4">
        <div class="bg-surface rounded-2xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto p-8" dir="<?php echo esc_attr(st_dir()); ?>">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-headline-lg font-bold text-primary"><?php echo esc_html(st_t('nav.bookConsultation')); ?></h2>
                <button type="button" data-st-close-consultation class="size-10 rounded-xl border border-outline-variant/30 flex items-center justify-center"><span class="material-symbols-outlined">close</span></button>
            </div>
            <div id="st-modal-alert" class="hidden mb-4 p-3 rounded-xl text-sm"></div>
            <form data-st-modal-consult-form class="space-y-4">
                <input type="text" name="website" class="hidden" tabindex="-1">
                <input required name="name" placeholder="<?php echo esc_attr(st_t('contact.fullName')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none">
                <input required name="email" type="email" placeholder="<?php echo esc_attr(st_t('contact.emailLabel')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none">
                <input name="phone" placeholder="<?php echo esc_attr(st_t('contact.phoneLabel')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none">
                <input name="company" placeholder="<?php echo esc_attr(st_t('contact.company')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none">
                <textarea required name="message" rows="4" placeholder="<?php echo esc_attr(st_t('contact.message')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 outline-none resize-y"></textarea>
                <button type="submit" class="w-full bg-primary text-on-primary py-4 rounded-xl font-bold"><?php echo esc_html(st_t('common.send')); ?></button>
            </form>
        </div>
    </div>
</div>
