# Hostinger Setup — spinestech.com

1. **WordPress** fresh install (done)
2. **Permalinks** → Post name → Save
3. **Plugins:** ACF PRO, Polylang, WP Mail SMTP, SpinesTech Core
4. **Theme:** SpinesTech
5. **Polylang:** ar (default), en — enable all `st_*` post types
6. **Upload:** zip `plugin/spinestech-core` and `theme/spinestech` (run `npm run build:css` first)
7. **SSL:** Hostinger Auto SSL
8. **Settings → SpinesTech:** form email = contact@spinestech.com

## Pages to create in WP Admin

| Slug | Parent | Notes |
|------|--------|-------|
| about | — | auto `page-about.php` |
| contact | — | auto `page-contact.php` |
| pricing | — | `page-pricing.php` |
| quote | — | `page-quote.php` |
| consultation | — | `page-consultation.php` |
| solutions | — | `page-solutions.php` |
| careers | — | `page-careers.php` |
| jobs | careers | `/careers/jobs/` → `page-jobs.php` |
| work-environment | careers | `/careers/work-environment/` |

**Seed demo content:** `wp eval-file content/seed.php` (from WP root, copy seed.php there or adjust path)

Settings → Reading → homepage can stay default (`front-page.php` works).
