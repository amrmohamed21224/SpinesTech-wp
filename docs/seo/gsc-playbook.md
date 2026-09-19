# Google Search Console Playbook — SpinesTech

## 1. Property setup

1. Add `https://spinestech.com` (and `www` if used) as URL-prefix or domain property.
2. Verify via DNS (recommended) or HTML file.
3. Submit sitemap: `https://spinestech.com/wp-sitemap.xml`
4. Confirm `/ar/` and `/en/` URLs appear in Coverage after crawl (locale via theme cookies/paths).

## 2. Priority URLs to inspect (week 1)

| URL | Why |
|---|---|
| `/` | Branded + non-branded home |
| `/services/mobile-app-development/` | Top service intent |
| `/services/erp-business-systems/` | Systems intent |
| `/case-studies/backway/` | Proof page |
| `/articles/mobile-app-development-cost-saudi-arabia/` | Buyer-intent article |
| `/contact/` | Conversion |

Use **URL Inspection → Request indexing** after each major deploy.

## 3. Queries to monitor (non-branded)

Track in Performance → Search results (4–8 week baseline):

**Arabic**
- تطوير تطبيقات السعودية
- شركة تطوير تطبيقات
- تطوير منصة ويب
- نظام ERP مخصص
- لوحة تحكم مخصصة
- كم تكلفة تطوير تطبيق

**English**
- mobile app development saudi arabia
- custom software development gcc
- erp development company
- admin dashboard development

## 4. KPIs

| KPI | Baseline | Target (90 days) |
|---|---|---|
| Indexed service landings | 9/9 | 9/9 |
| Indexed articles | 9/9 | 9/9 |
| Non-branded impressions | Record week 1 | +30% |
| Avg position (top 5 queries) | Record week 1 | Improve 3+ positions |
| CTR contact page | Record week 1 | +0.5% |

## 5. Common issues

| Issue | Fix |
|---|---|
| Duplicate meta description | Ensure templates use `st_seo_set_description()` only |
| Canonical to wrong hub | Check `st_seo_current_url()` on service singles |
| FAQ rich result error | FAQ HTML must match FAQ schema on service pages |
| Soft 404 on articles | Run `?st_bootstrap_articles=1` on staging |

## 6. Monthly routine

1. Export top 50 queries + landing pages.
2. Update `search-intent-map.md` if new clusters emerge.
3. Add 0–1 strong article per quarter (not thin content).
4. Re-run Lighthouse on 5 URLs from `qa-checklist.md`.
