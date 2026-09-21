<?php
/**
 * Template Name: Privacy Policy
 *
 * Official Privacy Policy page for SpinesTech (AR/EN).
 * Self-contained design matching the SpinesTech Dossier & Ink-Emerald system.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
$locale = $is_rtl ? 'ar' : 'en';

// ── SEO ──────────────────────────────────────────────────────────────────────
add_filter( 'pre_get_document_title', function () use ( $is_rtl ) {
    return $is_rtl
        ? 'سياسة الخصوصية | SpinesTech | تطوير تطبيقات الجوال'
        : 'Privacy Policy | SpinesTech | Custom Software & Mobile Apps';
}, 999 );

add_action( 'wp_head', function () use ( $is_rtl ) {
    if ( function_exists( 'st_seo_set_description' ) ) {
        st_seo_set_description( $is_rtl
            ? 'سياسة الخصوصية الخاصة بشركة SpinesTech: التزامنا بحماية وسرية بيانات العملاء والمستخدمين وفق أعلى المعايير التقنية والتنظيمية.'
            : 'SpinesTech Privacy Policy: Our commitment to protecting and securing client and user data under industry-leading technical and legal standards.' );
    }
}, 3 );
// ─────────────────────────────────────────────────────────────────────────────

get_header();
?>

<!-- Self-contained high-priority styles ensuring 100% immediate rendering -->
<style id="sp-privacy-styles">
/* ── Theme variables fallback ── */
:root {
  --pp-ink: #070d09;
  --pp-ink-card: #0d1811;
  --pp-emerald: #036d36;
  --pp-emerald-bright: #1fae62;
  --pp-emerald-glow: rgba(3, 109, 54, 0.25);
  --pp-text: #eef1ea;
  --pp-text-soft: rgba(238, 241, 234, 0.7);
  --pp-text-muted: rgba(238, 241, 234, 0.45);
  --pp-border: rgba(255, 255, 255, 0.08);
  --pp-border-hover: rgba(62, 207, 116, 0.28);
}

.privacy-page {
  background-color: var(--pp-ink) !important;
  color: var(--pp-text) !important;
  min-height: 100vh;
  position: relative;
  overflow-x: hidden;
  font-family: 'IBM Plex Sans Arabic', ui-sans-serif, system-ui, sans-serif;
  padding-bottom: 5rem;
}

/* ── Hero Section ── */
.pp-hero {
  position: relative;
  padding-top: clamp(6.5rem, 12vw, 9rem);
  padding-bottom: clamp(3rem, 6vw, 4.5rem);
  text-align: center;
  overflow: hidden;
  isolation: isolate;
  border-bottom: 1px solid var(--pp-border);
}

/* Glowing tech atmosphere */
.pp-hero__glow {
  position: absolute;
  border-radius: 50%;
  filter: blur(100px);
  pointer-events: none;
  z-index: 0;
}
.pp-hero__glow--1 {
  width: 500px;
  height: 500px;
  background: radial-gradient(circle, rgba(3, 109, 54, 0.28) 0%, transparent 70%);
  top: -120px;
  left: 50%;
  transform: translateX(-50%);
}
.pp-hero__glow--2 {
  width: 320px;
  height: 320px;
  background: radial-gradient(circle, rgba(31, 174, 98, 0.15) 0%, transparent 70%);
  bottom: 0;
  right: 15%;
}

.pp-hero__grid {
  position: absolute;
  inset: 0;
  z-index: 0;
  background-image:
    linear-gradient(rgba(3, 109, 54, 0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(3, 109, 54, 0.05) 1px, transparent 1px);
  background-size: 40px 40px;
  mask-image: radial-gradient(ellipse 75% 65% at 50% 20%, black 10%, transparent 100%);
  -webkit-mask-image: radial-gradient(ellipse 75% 65% at 50% 20%, black 10%, transparent 100%);
}

.pp-hero__container {
  position: relative;
  z-index: 1;
  max-width: 820px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

/* Badge */
.pp-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.4rem 1.1rem;
  border-radius: 9999px;
  background: rgba(3, 109, 54, 0.16);
  border: 1px solid rgba(62, 207, 116, 0.3);
  color: #3ecf74;
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  margin-bottom: 1.5rem;
}
.pp-badge__dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #3ecf74;
  box-shadow: 0 0 10px #3ecf74;
  animation: ppPulse 2s ease-in-out infinite;
}
@keyframes ppPulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50%       { opacity: 0.35; transform: scale(0.75); }
}

.pp-hero__title {
  font-size: clamp(2.3rem, 5.5vw, 3.8rem);
  font-weight: 800;
  color: #ffffff;
  margin: 0 0 1.25rem;
  line-height: 1.2;
  letter-spacing: -0.02em;
}

.pp-hero__subtitle {
  color: var(--pp-text-soft);
  font-size: clamp(1rem, 1.8vw, 1.15rem);
  line-height: 1.8;
  margin: 0 auto 1.5rem;
  max-width: 660px;
}

.pp-hero__meta {
  display: inline-flex;
  align-items: center;
  gap: 0.45rem;
  font-size: 0.82rem;
  color: var(--pp-text-muted);
}
.pp-hero__meta svg {
  stroke: var(--pp-emerald-bright);
}

/* ── Main Layout ── */
.pp-layout {
  max-width: 1200px;
  margin: 3.5rem auto 0;
  padding: 0 1.5rem;
  display: grid;
  grid-template-columns: 1fr;
  gap: 2.5rem;
}

@media (min-width: 1024px) {
  .pp-layout {
    grid-template-columns: 280px 1fr;
    gap: 3.5rem;
    align-items: start;
  }
}

/* ── Sticky Table of Contents (TOC) ── */
.pp-toc {
  display: none;
}
@media (min-width: 1024px) {
  .pp-toc {
    display: block;
    position: sticky;
    top: 7rem;
    background: var(--pp-ink-card);
    border: 1px solid var(--pp-border);
    border-radius: 16px;
    padding: 1.5rem;
    backdrop-filter: blur(12px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  }
}

.pp-toc__title {
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #3ecf74;
  margin: 0 0 1.1rem;
  display: flex;
  align-items: center;
  gap: 0.4rem;
}

.pp-toc__list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}

.pp-toc__link {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.65rem 0.85rem;
  border-radius: 10px;
  color: var(--pp-text-soft);
  font-size: 0.875rem;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.25s ease;
  line-height: 1.4;
  border: 1px solid transparent;
}
.pp-toc__link:hover {
  color: #ffffff;
  background: rgba(3, 109, 54, 0.12);
  border-color: rgba(62, 207, 116, 0.2);
}
.pp-toc__link.is-active {
  color: #3ecf74;
  background: rgba(3, 109, 54, 0.18);
  border-color: rgba(62, 207, 116, 0.35);
  font-weight: 600;
}

/* ── Content Sections ── */
.pp-content {
  display: flex;
  flex-direction: column;
  gap: 1.75rem;
}

.pp-card {
  background: var(--pp-ink-card);
  border: 1px solid var(--pp-border);
  border-radius: 20px;
  padding: 2.25rem 2rem;
  transition: all 0.3s ease;
  scroll-margin-top: 6.5rem;
  position: relative;
  overflow: hidden;
}
.pp-card::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  height: 2px;
  background: linear-gradient(90deg, transparent, rgba(62, 207, 116, 0.4), transparent);
  opacity: 0;
  transition: opacity 0.3s ease;
}
.pp-card:hover {
  border-color: var(--pp-border-hover);
  box-shadow: 0 16px 40px -10px rgba(0, 0, 0, 0.5), 0 0 24px -6px var(--pp-emerald-glow);
  transform: translateY(-2px);
}
.pp-card:hover::before {
  opacity: 1;
}

.pp-card__header {
  display: flex;
  align-items: center;
  gap: 1.1rem;
  margin-bottom: 1.35rem;
}

.pp-card__icon-box {
  width: 3rem;
  height: 3rem;
  border-radius: 12px;
  background: rgba(3, 109, 54, 0.14);
  border: 1px solid rgba(62, 207, 116, 0.25);
  color: #3ecf74;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: transform 0.25s ease;
}
.pp-card:hover .pp-card__icon-box {
  transform: scale(1.08);
  background: rgba(3, 109, 54, 0.22);
}

.pp-card__title {
  font-size: clamp(1.15rem, 2.2vw, 1.4rem);
  font-weight: 700;
  color: #ffffff;
  margin: 0;
  line-height: 1.35;
}

.pp-card__text {
  color: var(--pp-text-soft);
  font-size: 1rem;
  line-height: 1.85;
  margin: 0 0 1rem;
}
.pp-card__text:last-child {
  margin-bottom: 0;
}

.pp-pill {
  display: inline-block;
  padding: 0.12rem 0.55rem;
  border-radius: 6px;
  background: rgba(3, 109, 54, 0.2);
  border: 1px solid rgba(62, 207, 116, 0.25);
  color: #5ef393;
  font-weight: 600;
  font-size: 0.9em;
}

.pp-link {
  color: #3ecf74;
  text-decoration: underline;
  text-underline-offset: 3px;
  font-weight: 600;
  transition: color 0.2s ease;
}
.pp-link:hover {
  color: #8df7b4;
}

/* ── Bottom CTA ── */
.pp-cta {
  background: linear-gradient(135deg, rgba(3, 109, 54, 0.2) 0%, rgba(7, 13, 9, 0.7) 100%);
  border: 1px solid rgba(62, 207, 116, 0.25);
  border-radius: 20px;
  padding: 2.75rem 2rem;
  text-align: center;
  margin-top: 1rem;
  position: relative;
  overflow: hidden;
}
.pp-cta::before {
  content: '';
  position: absolute;
  width: 250px;
  height: 250px;
  background: radial-gradient(circle, rgba(62, 207, 116, 0.15) 0%, transparent 70%);
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  pointer-events: none;
}
.pp-cta__title {
  font-size: clamp(1.25rem, 2.5vw, 1.6rem);
  font-weight: 700;
  color: #ffffff;
  margin: 0 0 0.75rem;
}
.pp-cta__desc {
  color: var(--pp-text-soft);
  font-size: 0.98rem;
  line-height: 1.75;
  margin: 0 auto 1.75rem;
  max-width: 500px;
}
.pp-cta__btn {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  padding: 0.9rem 2.2rem;
  border-radius: 12px;
  background: #036d36;
  color: #ffffff !important;
  font-size: 0.95rem;
  font-weight: 700;
  text-decoration: none !important;
  border: 1px solid rgba(62, 207, 116, 0.4);
  box-shadow: 0 8px 24px -4px rgba(3, 109, 54, 0.5);
  transition: all 0.25s ease;
}
.pp-cta__btn:hover {
  transform: translateY(-2px);
  background: #0f9a52;
  box-shadow: 0 14px 32px -4px rgba(3, 109, 54, 0.65);
}

/* ── RTL Overrides ── */
[dir="rtl"] .pp-card__header {
  flex-direction: row;
  text-align: right;
}
[dir="rtl"] .pp-toc__link {
  text-align: right;
}
[dir="rtl"] .pp-cta__btn svg {
  transform: rotate(180deg);
}

@media (max-width: 767px) {
  .pp-card {
    padding: 1.6rem 1.25rem;
  }
  .pp-card__header {
    gap: 0.85rem;
  }
  .pp-card__icon-box {
    width: 2.6rem;
    height: 2.6rem;
  }
}
</style>

<main class="privacy-page" dir="<?php echo esc_attr( st_dir() ); ?>">

    <!-- ══════════════════════════════════════════════════
         HERO SECTION
    ══════════════════════════════════════════════════ -->
    <section class="pp-hero">
        <div class="pp-hero__grid" aria-hidden="true"></div>
        <div class="pp-hero__glow pp-hero__glow--1" aria-hidden="true"></div>
        <div class="pp-hero__glow pp-hero__glow--2" aria-hidden="true"></div>

        <div class="pp-hero__container">
            <div class="pp-badge">
                <span class="pp-badge__dot" aria-hidden="true"></span>
                <span><?php echo esc_html( $is_rtl ? 'الأمان والشفافية التقنية' : 'Security & Transparency' ); ?></span>
            </div>

            <h1 class="pp-hero__title">
                <?php echo esc_html( $is_rtl ? 'سياسة الخصوصية' : 'Privacy Policy' ); ?>
            </h1>

            <p class="pp-hero__subtitle">
                <?php echo esc_html( $is_rtl
                    ? 'نلتزم في SpinesTech بحماية خصوصية بيانات عملائنا وزوار موقعنا وفق أعلى معايير الحماية والأمان التقني المعمول بها دولياً.'
                    : 'At SpinesTech, we are dedicated to protecting your data privacy and security with total transparency and engineering rigor.' ); ?>
            </p>

            <div class="pp-hero__meta">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                    <line x1="16" x2="16" y1="2" y2="6"></line>
                    <line x1="8" x2="8" y1="2" y2="6"></line>
                    <line x1="3" x2="21" y1="10" y2="10"></line>
                </svg>
                <span><?php echo esc_html( $is_rtl ? 'آخر تحديث: سبتمبر 2025' : 'Last updated: September 2025' ); ?></span>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════
         CONTENT + TOC
    ══════════════════════════════════════════════════ -->
    <div class="pp-layout">

        <!-- Table of Contents Sidebar -->
        <aside class="pp-toc" aria-label="<?php echo esc_attr( $is_rtl ? 'فهرس سياسة الخصوصية' : 'Privacy Policy Contents' ); ?>">
            <p class="pp-toc__title">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                </svg>
                <?php echo esc_html( $is_rtl ? 'المحتويات' : 'Contents' ); ?>
            </p>
            <ul class="pp-toc__list">
                <li>
                    <a class="pp-toc__link is-active" href="#pp-sec-1">
                        <span>1.</span>
                        <?php echo esc_html( $is_rtl ? 'جمع البيانات واستخدامها' : 'Data Collection' ); ?>
                    </a>
                </li>
                <li>
                    <a class="pp-toc__link" href="#pp-sec-2">
                        <span>2.</span>
                        <?php echo esc_html( $is_rtl ? 'حماية وسرية المعلومات' : 'Data Protection' ); ?>
                    </a>
                </li>
                <li>
                    <a class="pp-toc__link" href="#pp-sec-3">
                        <span>3.</span>
                        <?php echo esc_html( $is_rtl ? 'ملفات تعريف الارتباط' : 'Cookies & Tracking' ); ?>
                    </a>
                </li>
                <li>
                    <a class="pp-toc__link" href="#pp-sec-4">
                        <span>4.</span>
                        <?php echo esc_html( $is_rtl ? 'حقوق المستخدمين' : 'User Rights' ); ?>
                    </a>
                </li>
                <li>
                    <a class="pp-toc__link" href="#pp-sec-5">
                        <span>5.</span>
                        <?php echo esc_html( $is_rtl ? 'التواصل والاستفسارات' : 'Contact Us' ); ?>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Body Cards -->
        <div class="pp-content">

            <?php if ( $is_rtl ) : ?>

                <!-- 1. جمع البيانات -->
                <section id="pp-sec-1" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">1. جمع البيانات واستخدامها</h2>
                    </div>
                    <p class="pp-card__text">
                        نقوم بجمع البيانات التي تقدمها لنا طواعية عبر نماذج التواصل، طلب عروض الأسعار، أو حجز الاستشارات التقنية، وتتضمن:
                        <span class="pp-pill">الاسم الكامل</span>،
                        <span class="pp-pill">البريد الإلكتروني</span>،
                        <span class="pp-pill">رقم الهاتف</span>، ونبذة موجزة حول متطلبات مشروعك البرمجي.
                    </p>
                    <p class="pp-card__text">
                        نستخدم هذه البيانات حصراً للتواصل الفعّال معك، وتقييم نطاق العمل، وتقديم التقديرات الفنية والاستشارات المطلوبة. نلتزم بعدم جمع أي بيانات دون موافقتك الصريحة والمعلنة.
                    </p>
                </section>

                <!-- 2. حماية وسرية المعلومات -->
                <section id="pp-sec-2" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">2. حماية وسرية المعلومات</h2>
                    </div>
                    <p class="pp-card__text">
                        نعتمد أعلى معايير التشفير (SSL/TLS) وبروتوكولات الأمان المؤسسي لحماية كافة البيانات أثناء نقلها وتخزينها. لا نقوم ببيع أو تأجير أو مشاركة أي بيانات شخصية مع أي جهات خارجية لأغراض تسويقية أو تجارية.
                    </p>
                    <p class="pp-card__text">
                        تخضع كافة أفكار ومشاريع العملاء لاتفاقيات عدم الإفصاح والسرية <span class="pp-pill">NDA المعتمدة</span> فور بدء النقاش التقني لحماية ملكيتك الفكرية بالكامل.
                    </p>
                </section>

                <!-- 3. ملفات تعريف الارتباط -->
                <section id="pp-sec-3" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path>
                                <path d="M8.5 8.5v.01"></path>
                                <path d="M7.5 15.5v.01"></path>
                                <path d="M12 12v.01"></path>
                                <path d="M11 17v.01"></path>
                                <path d="M16 14v.01"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">3. ملفات تعريف الارتباط (Cookies)</h2>
                    </div>
                    <p class="pp-card__text">
                        يستخدم موقعنا ملفات تعريف الارتباط الفنية لتحسين استجابة الصفحات، تذكر تفضيلات اللغة المختارة (العربية / الإنجليزية)، وجمع تحليلات مجهولة المصدر تساعدنا على تحسين تجربة التصفح وسرعة الموقع.
                    </p>
                    <p class="pp-card__text">
                        يمكنك دائماً تعديل إعدادات متصفحك لتعطيل ملفات الكوكيز في أي وقت دون أن يؤثر ذلك على قدرتك الأساسية على تصفح خدماتنا والتواصل معنا.
                    </p>
                </section>

                <!-- 4. حقوق المستخدمين -->
                <section id="pp-sec-4" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">4. حقوق المستخدمين</h2>
                    </div>
                    <p class="pp-card__text">
                        يحق لك في أي وقت التقدم بطلب للاطلاع على بياناتك الشخصية المسجلة لدينا، طلب تعديلها أو تصحيحها، أو طلب الحذف النهائي لبياناتك من قواعد بياناتنا.
                    </p>
                    <p class="pp-card__text">
                        نلتزم بمعالجة أي طلب متعلق بالبيانات الشخصية خلال مدة أقصاها <span class="pp-pill">30 يوماً</span> من تاريخ استلام الطلب.
                    </p>
                </section>

                <!-- 5. التواصل والاستفسارات -->
                <section id="pp-sec-5" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">5. التواصل والاستفسارات</h2>
                    </div>
                    <p class="pp-card__text">
                        إذا كانت لديك أية تساؤلات أو استفسارات حول سياسة الخصوصية، أو رغبت في ممارسة حقوقك المتعلقة ببياناتك، يمكنك مراسلتنا مباشرة عبر
                        <a class="pp-link" href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( '/contact/' ) : home_url( '/contact/' ) ); ?>">صفحة التواصل الرسمية</a>
                        أو عبر البريد الإلكتروني: <span class="pp-pill">privacy@spinestech.com</span>.
                    </p>
                </section>

                <!-- Bottom CTA -->
                <div class="pp-cta">
                    <h3 class="pp-cta__title">هل لديك أي سؤال حول أمان بياناتك؟</h3>
                    <p class="pp-cta__desc">فريقنا الهندسي والإداري جاهز للإجابة على كافة استفساراتك وتوفير اتفاقيات السرية المطلوبة.</p>
                    <a class="pp-cta__btn" href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( '/contact/' ) : home_url( '/contact/' ) ); ?>">
                        تواصل معنا الآن
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

            <?php else : ?>

                <!-- 1. Data Collection -->
                <section id="pp-sec-1" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">1. Information Collection &amp; Use</h2>
                    </div>
                    <p class="pp-card__text">
                        We collect information you voluntarily provide via contact forms, quote requests, or technical consultation bookings, including:
                        <span class="pp-pill">Full Name</span>,
                        <span class="pp-pill">Email Address</span>,
                        <span class="pp-pill">Phone Number</span>, and your project scope overview.
                    </p>
                    <p class="pp-card__text">
                        This information is exclusively used to communicate with you, evaluate technical requirements, and deliver requested software engineering proposals. We never collect data without your explicit consent.
                    </p>
                </section>

                <!-- 2. Data Protection -->
                <section id="pp-sec-2" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">2. Data Protection &amp; Confidentiality</h2>
                    </div>
                    <p class="pp-card__text">
                        We implement enterprise-grade encryption (SSL/TLS) and strict access controls to safeguard data in transit and at rest. We never sell, rent, or trade personal data to third parties for commercial or advertising purposes.
                    </p>
                    <p class="pp-card__text">
                        All project intellectual property is protected under binding <span class="pp-pill">Non-Disclosure Agreements (NDA)</span> from the first discussion.
                    </p>
                </section>

                <!-- 3. Cookies -->
                <section id="pp-sec-3" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path>
                                <path d="M8.5 8.5v.01"></path>
                                <path d="M7.5 15.5v.01"></path>
                                <path d="M12 12v.01"></path>
                                <path d="M11 17v.01"></path>
                                <path d="M16 14v.01"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">3. Cookies &amp; Analytics</h2>
                    </div>
                    <p class="pp-card__text">
                        Our website uses technical cookies to enhance browsing performance, remember language preferences (AR / EN), and collect anonymous metrics to optimize load times and user experience.
                    </p>
                    <p class="pp-card__text">
                        You can configure your browser to decline cookies at any time without restricting access to our core website content and contact options.
                    </p>
                </section>

                <!-- 4. User Rights -->
                <section id="pp-sec-4" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">4. Your Rights</h2>
                    </div>
                    <p class="pp-card__text">
                        You hold the right to request access to the personal data we hold about you, request rectification of any inaccurate information, or request the complete deletion of your records.
                    </p>
                    <p class="pp-card__text">
                        We process all verified data requests within <span class="pp-pill">30 days</span> of receipt.
                    </p>
                </section>

                <!-- 5. Contact -->
                <section id="pp-sec-5" class="pp-card">
                    <div class="pp-card__header">
                        <div class="pp-card__icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </div>
                        <h2 class="pp-card__title">5. Contact &amp; Inquiries</h2>
                    </div>
                    <p class="pp-card__text">
                        For any questions regarding this Privacy Policy or to exercise your privacy rights, please reach out via our
                        <a class="pp-link" href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( '/contact/' ) : home_url( '/contact/' ) ); ?>">Contact Page</a>
                        or email us at: <span class="pp-pill">privacy@spinestech.com</span>.
                    </p>
                </section>

                <!-- Bottom CTA -->
                <div class="pp-cta">
                    <h3 class="pp-cta__title">Questions About Data Security?</h3>
                    <p class="pp-cta__desc">Our engineering and management team is available to assist with inquiries and execute required confidentiality agreements.</p>
                    <a class="pp-cta__btn" href="<?php echo esc_url( function_exists( 'st_url' ) ? st_url( '/contact/' ) : home_url( '/contact/' ) ); ?>">
                        Get in Touch
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

            <?php endif; ?>

        </div>
    </div>

</main>

<script>
(function () {
    // Active TOC link highlighting on scroll
    var sections = document.querySelectorAll('.pp-card[id]');
    var tocLinks = document.querySelectorAll('.pp-toc__link');
    if (!sections.length || !tocLinks.length) return;

    function onScroll() {
        var scrollPos = window.scrollY + 140;
        var currentId = '';

        sections.forEach(function (sec) {
            var top = sec.offsetTop;
            var height = sec.offsetHeight;
            if (scrollPos >= top && scrollPos < top + height) {
                currentId = sec.getAttribute('id');
            }
        });

        if (currentId) {
            tocLinks.forEach(function (link) {
                var target = link.getAttribute('href').replace('#', '');
                link.classList.toggle('is-active', target === currentId);
            });
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}());
</script>

<?php
get_footer();
