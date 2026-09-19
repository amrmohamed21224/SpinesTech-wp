# SEO & Release QA Checklist — SpinesTech

Use this matrix before production deploy. Mark each row Pass / Fail / N/A.

## Global

| Check | How | Pass |
|---|---|---|
| Single meta description per page | View Source — one `<meta name="description">` from `inc/seo.php` | |
| Canonical self-references | View Source — `/services/{slug}/` canonical on service singles | |
| hreflang ar/en | View Source on home, service, article | |
| `robots.txt` sitemap line | `curl /robots.txt` → `Sitemap: .../wp-sitemap.xml` | |
| No duplicate title filters | Grep theme for `echo '<meta name="description"'` → 0 hits | |

## Page types

| Page type | URL sample | Title | Meta | Schema (Rich Results) | Internal links |
|---|---|---|---|---|---|
| Home | `/` | AR title per doc 01 | Custom via `front-page.php` | Organization | Services, articles, case studies |
| Services hub | `/services/` | H1 discovery→support | `archive-st_service.php` | — | 9 service cards |
| Service landing | `/services/mobile-app-development/` | From config | From config | FAQ if visible | Case studies + articles |
| Case study archive | `/case-studies/` | — | `st_seo_set_description` | — | Descriptive image ALT |
| Case study single | `/case-studies/backway/` | `st_case_study_seo` | Central SEO | — | Related services/articles |
| Article | `/articles/flutter-vs-native/` | Config title | Config meta | FAQ HTML matches | Service + case + related |
| About | `/about/` | Doc 03 title | Custom | — | Case studies CTA |
| Contact | `/contact/` | — | Custom | ContactPage | Form + WhatsApp |
| Articles hub | `/articles/` | — | `st_seo_set_description` | — | Lists 9 posts |

## Content bootstrap (staging)

| Step | Command / action |
|---|---|
| Services | `?st_bootstrap_services=1` (admin) |
| Articles | `?st_bootstrap_articles=1` (admin) |
| Hard refresh + cache purge | After bootstrap |

## Functional

| Check | Tool |
|---|---|
| Contact form submit | Manual + email receipt |
| `stTrack` events | Browser console / dataLayer |
| ar/en switch | Home, service, article, case study |
| Mobile RTL 375px | Contact form, article body, home marquee |
| Internal link crawl | No 404 on curated links matrix |

## PHP / JS syntax

```bash
# From theme root (when PHP available)
php -l inc/article-landings.php
php -l inc/case-study-config.php

node --check assets/js/analytics-events.js
node --check assets/js/forms.js
```

## Sign-off

| Role | Name | Date |
|---|---|---|
| Engineering | | |
| Content | | |
| SEO ops | | |
