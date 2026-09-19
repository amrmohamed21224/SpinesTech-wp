# SpinesTech Search Intent Map

| Keyword / intent (AR/EN) | Target page | Notes |
|---|---|---|
| تطوير تطبيقات جوال / mobile app development Saudi | `/services/mobile-app-development/` | Primary non-branded service landing |
| تطوير منصات ويب / web platform development | `/services/web-platform-development/` | B2B platform intent |
| برمجيات مخصصة / custom software development | `/services/custom-software-development/` | ERP vs custom comparisons link here |
| لوحات تحكم / admin dashboard development | `/services/admin-dashboard-development/` | Ops + reporting intent |
| marketplace development / منصة متعددة البائعين | `/services/marketplace-development/` | Link Merchant case study |
| booking platform / نظام حجوزات | `/services/booking-platform-development/` | Link Lahza case study |
| ERP systems / أنظمة ERP | `/services/erp-business-systems/` | Legacy slug `erp-systems` → 301 |
| GRC compliance systems | `/services/grc-compliance-systems/` | Regulated industries |
| white label software | `/services/white-label-software-development/` | Agency partner intent |
| كم تكلفة تطوير تطبيق في السعودية | `/articles/mobile-app-development-cost-saudi-arabia/` | MVP buyer-intent article |
| Flutter أم Native | `/articles/flutter-vs-native/` | Tech decision article |
| ERP أم Custom Software | `/articles/erp-vs-custom-software/` | Buyer comparison article |
| كم يستغرق تطوير تطبيق | `/articles/mobile-app-development-timeline/` | Timeline intent |
| كيف تختار شركة تطوير | `/articles/how-to-choose-software-company/` | Vendor selection |
| متى تحتاج Dashboard | `/articles/when-you-need-admin-dashboard/` | Ops dashboard intent |
| تحويل العمليات اليدوية لنظام | `/articles/manual-process-to-digital-system/` | Digital transformation |
| متطلبات إطلاق تطبيق السعودية | `/articles/saudi-app-launch-requirements/` | PDPL / payments / stores |
| ما هو GRC | `/articles/what-is-grc/` | GRC service support |
| Backway logistics case study | `/case-studies/backway/` | Trip-based marketplace proof |
| Merchant marketplace | `/case-studies/merchant/` | Multi-vendor e-commerce |
| PropCare property platform | `/case-studies/propcare/` | Property ops proof |
| Lahza event booking | `/case-studies/lahza/` | Booking platform proof |
| Supply chain ERP | `/case-studies/supply-chain-erp/` | ERP / operations proof |
| SpinesTech / شركة برمجيات السعودية | `/` + `/about/` | Branded navigational |
| دراسات حالة / case studies | `/case-studies/` | Proof + industry relevance |
| تواصل / contact software company | `/contact/` | Conversion endpoint |

## Manual ops (Search Console)

1. Submit sitemap: `/wp-sitemap.xml`
2. Inspect 9 service URLs + home + contact after deploy
3. Monitor coverage for duplicate meta (should be single description via `inc/seo.php`)
4. Track impressions for service slugs (4–8 week baseline)

## Performance baseline (run after deploy)

| Page | Tool | Target |
|---|---|---|
| Home | Lighthouse mobile | LCP < 2.5s |
| Services hub | Lighthouse mobile | CLS < 0.1 |
| One service landing | Lighthouse mobile | INP reasonable |
| One article | Lighthouse mobile | TBT watchlist |
| Contact | Lighthouse mobile | Form usable on 375px |
