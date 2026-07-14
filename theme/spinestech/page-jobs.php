<?php
/**
 * Used for page slug "jobs" (child of careers → /careers/jobs/)
 */
get_header();
$jobs = st_query_cpt('st_job');
$locale = st_locale();
?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-24 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto">
        <a href="<?php echo esc_url(st_url('/careers/')); ?>" class="inline-flex items-center gap-2 text-secondary font-bold mb-8"><span class="material-symbols-outlined">arrow_back</span><?php echo $locale === 'ar' ? 'العودة للتوظيف' : 'Back to careers'; ?></a>
        <h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold mb-6"><?php echo esc_html(st_t('careers.jobsTitle')); ?></h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter mb-20">
            <?php foreach ($jobs as $job) : ?>
                <a href="<?php echo esc_url(st_cpt_link('careers', $job['slug'])); ?>" class="p-8 bg-white border border-outline-variant/30 rounded-2xl hover:border-secondary hover:shadow-xl transition-all">
                    <span class="text-caption text-secondary font-bold"><?php echo esc_html($job['department'] ?? ''); ?></span>
                    <h2 class="text-headline-sm font-bold text-primary mt-2 mb-3"><?php echo esc_html($job['title']); ?></h2>
                    <p class="text-on-surface-variant text-sm mb-4"><?php echo esc_html($job['description']); ?></p>
                    <div class="flex flex-wrap gap-3 text-caption text-on-surface-variant">
                        <?php if (!empty($job['location'])) : ?><span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">location_on</span><?php echo esc_html($job['location']); ?></span><?php endif; ?>
                        <?php if (!empty($job['type'])) : ?><span><?php echo esc_html($job['type']); ?></span><?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div id="st-career-alert" class="hidden mb-6 p-4 rounded-xl text-sm"></div>
        <form id="career-form" data-st-career-form enctype="multipart/form-data" class="max-w-2xl p-8 bg-surface-container-low rounded-2xl border border-outline-variant/20 space-y-4">
            <h2 class="text-headline-sm font-bold text-primary"><?php echo esc_html(st_t('careers.applyTitle')); ?></h2>
            <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">
            <div class="grid md:grid-cols-2 gap-4">
                <input required name="name" placeholder="<?php echo esc_attr(st_t('contact.fullName')); ?>" class="px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none">
                <input required name="email" type="email" placeholder="<?php echo esc_attr(st_t('contact.emailLabel')); ?>" class="px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none">
            </div>
            <input name="phone" placeholder="<?php echo esc_attr(st_t('contact.phoneLabel')); ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none">
            <select name="position" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none">
                <option value=""><?php echo $locale === 'ar' ? 'اختر الوظيفة' : 'Select position'; ?></option>
                <?php foreach ($jobs as $job) : ?><option value="<?php echo esc_attr($job['title']); ?>"><?php echo esc_html($job['title']); ?></option><?php endforeach; ?>
            </select>
            <input required name="resume" type="file" accept=".pdf,.doc,.docx" class="w-full text-sm">
            <textarea name="coverLetter" rows="4" placeholder="<?php echo $locale === 'ar' ? 'رسالة تعريفية' : 'Cover letter'; ?>" class="w-full px-4 py-3 rounded-xl border border-outline-variant/40 bg-white outline-none resize-y"></textarea>
            <button type="submit" class="bg-primary text-on-primary px-8 py-4 rounded-xl font-bold"><?php echo esc_html(st_t('contact.submit')); ?></button>
        </form>
    </div>
</main>
<?php get_footer(); ?>
