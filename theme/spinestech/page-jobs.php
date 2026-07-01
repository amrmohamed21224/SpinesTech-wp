<?php
/**
 * Used for page slug "jobs" (child of careers → /careers/jobs/)
 */
get_header();
$jobs = st_query_cpt('st_job');
$locale = st_locale();
?>
<main class="page-jobs">
    <div class="container">
        <a href="<?php echo esc_url(st_url('/careers/')); ?>" class="page-jobs__back-link">
            <span class="material-symbols-outlined">arrow_back</span>
            <?php echo $locale === 'ar' ? 'العودة للتوظيف' : 'Back to careers'; ?>
        </a>
        <h1 class="page-jobs__title"><?php echo esc_html(st_t('careers.jobsTitle')); ?></h1>
        
        <div class="page-jobs__grid">
            <?php foreach ($jobs as $job) : ?>
                <a href="<?php echo esc_url(st_cpt_link('careers', $job['slug'])); ?>" class="job-card">
                    <span class="job-card__department"><?php echo esc_html($job['department'] ?? ''); ?></span>
                    <h2 class="job-card__title"><?php echo esc_html($job['title']); ?></h2>
                    <p class="job-card__description"><?php echo esc_html($job['description']); ?></p>
                    <div class="job-card__meta">
                        <?php if (!empty($job['location'])) : ?>
                            <span class="job-card__meta-item">
                                <span class="material-symbols-outlined job-card__meta-icon">location_on</span>
                                <?php echo esc_html($job['location']); ?>
                            </span>
                        <?php endif; ?>
                        <?php if (!empty($job['type'])) : ?>
                            <span class="job-card__meta-item"><?php echo esc_html($job['type']); ?></span>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div id="st-career-alert" class="alert alert--hidden"></div>
        <form id="career-form" data-st-career-form enctype="multipart/form-data" class="page-jobs__form">
            <h2 class="page-jobs__form-title"><?php echo esc_html(st_t('careers.applyTitle')); ?></h2>
            <input type="text" name="website" class="is-hidden" tabindex="-1" autocomplete="off">
            
            <div class="form-row">
                <div class="form-group">
                    <input required name="name" placeholder="<?php echo esc_attr(st_t('contact.fullName')); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input required name="email" type="email" placeholder="<?php echo esc_attr(st_t('contact.emailLabel')); ?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <input name="phone" placeholder="<?php echo esc_attr(st_t('contact.phoneLabel')); ?>" class="form-control">
            </div>
            
            <div class="form-group">
                <select name="position" class="form-control">
                    <option value=""><?php echo $locale === 'ar' ? 'اختر الوظيفة' : 'Select position'; ?></option>
                    <?php foreach ($jobs as $job) : ?>
                        <option value="<?php echo esc_attr($job['title']); ?>"><?php echo esc_html($job['title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <input required name="resume" type="file" accept=".pdf,.doc,.docx" class="form-control form-control--file">
            </div>
            
            <div class="form-group">
                <textarea name="coverLetter" rows="4" placeholder="<?php echo $locale === 'ar' ? 'رسالة تعريفية' : 'Cover letter'; ?>" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="button button--primary page-jobs__submit">
                <?php echo esc_html(st_t('contact.submit')); ?>
            </button>
        </form>
    </div>
</main>
<?php get_footer(); ?>
