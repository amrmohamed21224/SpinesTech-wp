<?php $dir = st_dir(); $locale = st_locale(); ?>
<footer class="relative w-full pt-24 pb-12 px-margin-mobile md:px-margin-desktop flex flex-col items-center bg-primary-container text-white overflow-hidden" role="contentinfo" dir="<?php echo esc_attr($dir); ?>">
    <div class="max-w-container-max w-full bg-white/5 border border-white/10 rounded-3xl p-8 md:p-12 mb-20 relative z-10 backdrop-blur-md flex flex-col md:flex-row items-center justify-between gap-8 shadow-2xl">
        <div class="text-start flex-1">
            <h3 class="text-headline-lg font-bold text-white mb-3"><?php echo $locale === 'ar' ? 'جاهز لبدء رحلة التحول الرقمي؟' : 'Ready to start your digital transformation?'; ?></h3>
            <p class="text-white/70 max-w-lg"><?php echo $locale === 'ar' ? 'تواصل معنا اليوم واكتشف كيف يمكن لحلولنا التقنية أن تنقل أعمالك إلى المستوى التالي.' : 'Contact us today and discover how our tech solutions can take your business to the next level.'; ?></p>
        </div>
        <a href="<?php echo esc_url(st_url('/contact/')); ?>" class="inline-flex items-center gap-3 bg-secondary text-on-secondary px-8 py-4 rounded-xl font-bold hover:bg-secondary/90 hover:-translate-y-1 transition-all shrink-0"><?php echo $locale === 'ar' ? 'تواصل معنا الآن' : 'Contact Us Now'; ?><span class="material-symbols-outlined">arrow_forward</span></a>
    </div>
    <div class="max-w-container-max w-full grid grid-cols-1 md:grid-cols-12 gap-12 mb-16 text-start relative z-10">
        <div class="md:col-span-12 lg:col-span-4">
            <a href="<?php echo esc_url(st_url('/')); ?>" class="inline-flex mb-8"><img src="<?php echo esc_url(st_asset('images/brand/icon.png')); ?>" alt="SpinesTech" class="h-20 w-auto"></a>
            <p class="text-white/70 leading-relaxed mb-8 max-w-sm"><?php echo esc_html(st_t('footer.tagline')); ?></p>
        </div>
        <div class="md:col-span-4 lg:col-span-3">
            <h4 class="text-headline-sm mb-6 font-bold flex items-center gap-2"><span class="w-8 h-1 bg-secondary rounded-full"></span><?php echo esc_html(st_t('footer.services')); ?></h4>
            <ul class="space-y-3 text-white/70">
                <li><a href="<?php echo esc_url(st_url('/services/')); ?>" class="hover:text-white transition-colors"><?php echo $locale === 'ar' ? 'تطوير البرمجيات' : 'Custom Development'; ?></a></li>
                <li><a href="<?php echo esc_url(st_url('/products/')); ?>" class="hover:text-white transition-colors"><?php echo $locale === 'ar' ? 'أنظمة ERP' : 'ERP Systems'; ?></a></li>
            </ul>
        </div>
        <div class="md:col-span-4 lg:col-span-3">
            <h4 class="text-headline-sm mb-6 font-bold flex items-center gap-2"><span class="w-8 h-1 bg-secondary rounded-full"></span><?php echo esc_html(st_t('footer.company')); ?></h4>
            <ul class="space-y-3 text-white/70">
                <li><a href="<?php echo esc_url(st_url('/about/')); ?>" class="hover:text-white"><?php echo esc_html(st_t('nav.about')); ?></a></li>
                <li><a href="<?php echo esc_url(st_url('/careers/')); ?>" class="hover:text-white"><?php echo esc_html(st_t('nav.careers')); ?></a></li>
            </ul>
        </div>
        <div class="md:col-span-4 lg:col-span-2">
            <h4 class="text-headline-sm mb-6 font-bold flex items-center gap-2"><span class="w-8 h-1 bg-secondary rounded-full"></span><?php echo esc_html(st_t('footer.contact')); ?></h4>
            <p class="text-white/70"><a href="mailto:contact@spinestech.com" class="hover:text-white">contact@spinestech.com</a></p>
        </div>
    </div>
    <p class="text-white/50 text-sm relative z-10"><?php echo esc_html(st_t('footer.copyright')); ?></p>
</footer>
