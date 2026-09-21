<?php get_header(); $locale = st_locale(); ?>
<main class="page-consultation" data-st-consultation-page>
    <div class="container">
        <div class="page-consultation__grid">
            <div class="page-consultation__info">
                <span class="page-consultation__eyebrow">
                    <?php echo $locale === 'ar' ? 'Ø§Ø³ØªØ´Ø§Ø±Ø© Ù…Ø¬Ø§Ù†ÙŠØ© Â· 45 Ø¯Ù‚ÙŠÙ‚Ø©' : 'Free Â· 45 min'; ?>
                </span>
                <h1 class="page-consultation__title"><?php echo esc_html(st_t('consultation.title')); ?></h1>
                <p class="page-consultation__subtitle"><?php echo esc_html(st_t('consultation.subtitle')); ?></p>
                <div class="page-consultation__goals" data-st-consult-goals>
                    <?php foreach ([
                        ['growth', $locale === 'ar' ? 'Ù†Ù…Ùˆ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„' : 'Business growth'],
                        ['automation', $locale === 'ar' ? 'Ø£ØªÙ…ØªØ©' : 'Automation'],
                        ['ai', $locale === 'ar' ? 'Ø°ÙƒØ§Ø¡ Ø§ØµØ·Ù†Ø§Ø¹ÙŠ' : 'AI'],
                        ['rebuild', $locale === 'ar' ? 'Ø¥Ø¹Ø§Ø¯Ø© Ø¨Ù†Ø§Ø¡' : 'Rebuild'],
                    ] as [$id, $label]) : ?>
                        <button type="button" data-goal="<?php echo esc_attr($id); ?>" class="page-consultation__goal-chip">
                            <?php echo esc_html($label); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <?php if ($locale === 'ar'): ?>
                <div class="page-consultation__seo-text" style="margin-top: 2rem; color: var(--st-color-on-surface-variant); font-size: 0.95rem; line-height: 1.8;">
                    <h3 style="color: var(--st-color-primary); font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;">لماذا تحجز استشارة تقنية مع SpinesTech؟</h3>
                    <p style="margin-bottom: 1rem;">سواء كنت تخطط لبناء تطبيق جوال جديد، أو تبحث عن منصة ويب مخصصة، أو تحتاج إلى نظام تشغيلي متكامل (ERP) للارتقاء بأعمالك، فإن التخطيط المسبق هو المفتاح. تساعدك هذه الجلسة الاستشارية المجانية على بلورة أفكارك التقنية وتحويلها إلى متطلبات برمجية قابلة للتنفيذ وتصميم معماري واضح.</p>
                    <h3 style="color: var(--st-color-primary); font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;">ماذا تتوقع خلال الجلسة؟</h3>
                    <p style="margin-bottom: 1rem;">خلال 45 دقيقة، سيقوم خبراؤنا بمناقشة أهداف عملك، تحليل التحديات التقنية التي تواجهها، وتقديم توصيات مخصصة حول لغات البرمجة والتقنيات الأنسب لمشروعك البرمجي. نحن نغطي جوانب هندسة البرمجيات، تصميم واجهة المستخدم، قابلية التوسع، وتأمين البيانات، مما يمنحك رؤية شاملة لمسار تطوير منتجك الرقمي القادم.</p>
                    <h3 style="color: var(--st-color-primary); font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;">التحضير للجلسة والسرية التامة</h3>
                    <p style="margin-bottom: 1rem;">للاستفادة القصوى من وقت الاستشارة، ننصحك بجمع أي وثائق أو أفكار متعلقة برؤية المشروع، وتحديد أهم التحديات التي ترغب في حلها. سواء كنت تملك فكرة مبدئية أو متطلبات فنية مفصلة، فإن مهندسينا مستعدون للبدء من حيث تقف أنت لتسريع عملية التطوير.</p>
                    <p style="margin-bottom: 1rem;">نحن نتفهم تماماً أهمية حماية الأفكار المبتكرة في بيئة الأعمال التنافسية. لذلك، يتم التعامل مع كافة المعلومات التي تشاركها معنا بسرية مطلقة، ونحن على استعداد تام لتوقيع اتفاقية عدم إفصاح (NDA) قبل مناقشة أي تفاصيل حساسة تتعلق بمشروعك.</p>
                    <p>لا تتطلب الجلسة أي التزام مالي. هدفنا هو تزويدك بالقيمة الاستراتيجية ومساعدتك على اتخاذ قرارات تقنية مستنيرة تدعم نمو شركتك في السوق.</p>
                </div>
            <?php else: ?>
                <div class="page-consultation__seo-text" style="margin-top: 2rem; color: var(--st-color-on-surface-variant); font-size: 0.95rem; line-height: 1.8;">
                    <h3 style="color: var(--st-color-primary); font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;">Why book a technical consultation with SpinesTech?</h3>
                    <p style="margin-bottom: 1rem;">Whether you are planning to build a new mobile app, looking for a custom web platform, or need an integrated ERP system to elevate your operations, early planning is key. This free consultation session helps you crystallize your technical ideas and turn them into actionable software requirements and clear architecture.</p>
                    <h3 style="color: var(--st-color-primary); font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;">What to expect during the session?</h3>
                    <p style="margin-bottom: 1rem;">In this 45-minute call, our engineering experts will discuss your business goals, analyze your technical challenges, and provide tailored recommendations on the most suitable technologies and frameworks for your software project. We cover aspects of software engineering, UI/UX design, scalability, and data security, giving you a comprehensive overview of the development roadmap for your next digital product.</p>
                    <h3 style="color: var(--st-color-primary); font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;">Preparation & Confidentiality</h3>
                    <p style="margin-bottom: 1rem;">To get the most out of our time together, we recommend gathering any documents related to your project vision and identifying the core challenges you want to solve. Whether you only have a preliminary idea or a detailed set of technical requirements, our engineers are ready to start right where you are to accelerate development.</p>
                    <p style="margin-bottom: 1rem;">We fully understand the importance of protecting innovative ideas in a competitive business landscape. Therefore, all the information you share with us is treated with the utmost confidentiality. We are fully prepared to sign a Non-Disclosure Agreement (NDA) before discussing any sensitive details regarding your upcoming software project.</p>
                    <p>There is no financial commitment required. Our goal is to provide strategic value and help you make informed technical decisions that support your company's growth in the market.</p>
                </div>
            <?php endif; ?>
        </div>

            <div class="page-consultation__form-wrapper">
                <div id="st-consult-alert" class="alert alert--hidden"></div>
                <form data-st-consult-form class="page-consultation__form">
                    <h2 class="page-consultation__form-title"><?php echo esc_html(st_t('consultation.title')); ?></h2>
                    <input type="text" name="website" class="is-hidden" tabindex="-1">
                    <input type="hidden" name="goal" value="">
                    
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
                        <textarea required name="message" rows="4" placeholder="<?php echo $locale === 'ar' ? 'Ù…Ø§ Ø§Ù„Ø°ÙŠ ØªØ±ÙŠØ¯ Ù…Ù†Ø§Ù‚Ø´ØªÙ‡ØŸ' : 'What to discuss?'; ?>" class="form-control"></textarea>
                    </div>
                    
                    <button type="submit" class="button button--secondary page-consultation__submit">
                        <?php echo esc_html(st_t('consultation.title')); ?>
                    </button>
                </form>
                <p class="page-consultation__form-footer">
                    <a href="<?php echo esc_url(st_url('/quote/')); ?>" class="page-consultation__quote-link">
                        <?php echo esc_html(st_t('home.requestQuote')); ?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
