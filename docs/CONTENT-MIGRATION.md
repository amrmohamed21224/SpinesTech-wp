# Content Migration

This project uses WordPress as the real CMS. The old React data files are only a reference for initial seeding and QA.

## Source Reference

Use the React project as the visual/content reference only:

- `src/data/services.ts`
- `src/data/products.ts`
- `src/data/sectors.ts`
- `src/data/caseStudies.ts`
- `src/data/pricing.ts`
- `src/data/careers.ts`
- `src/data/testimonials.ts`
- `src/i18n/messages/ar.ts`
- `src/i18n/messages/en.ts`

## WordPress Content Model

| Content | WordPress type | Template |
|---|---|---|
| Services | `st_service` | `archive-st_service.php`, `single-st_service.php` |
| Products | `st_product` | `archive-st_product.php`, `single-st_product.php` |
| Sectors | `st_sector` | `archive-st_sector.php`, `single-st_sector.php` |
| Case studies | `st_case_study` | `archive-st_case_study.php`, `single-st_case_study.php` |
| Pricing | `st_pricing` | `page-pricing.php`, home pricing section |
| FAQ | `st_faq` | home FAQ, pricing FAQ |
| Jobs | `st_job` | `page-jobs.php`, `single-st_job.php` |
| Testimonials | `st_testimonial` | home/about sections |
| Team | `st_team` | about/team sections |
| Forms | `st_submission` | stored by `spinestech-core` |

## Required Pages

Create these pages in WP Admin after activating the theme, or run:

```bash
wp eval-file content/create-pages.php
```

| Slug | Template |
|---|---|
| `about` | `page-about.php` |
| `contact` | `page-contact.php` |
| `pricing` | `page-pricing.php` |
| `quote` | `page-quote.php` |
| `consultation` | `page-consultation.php` |
| `solutions` | `page-solutions.php` |
| `careers` | `page-careers.php` |
| `careers/jobs` | `page-jobs.php` |
| `careers/work-environment` | `page-work-environment.php` |

## Seed Command

From the WordPress root:

```bash
wp eval-file content/create-pages.php
wp eval-file content/seed.php
wp eval-file content/seed-extended.php
```

Run the seed after:

1. Activating `spinestech-core`.
2. Activating the `spinestech` theme.
3. Activating ACF PRO.
4. Activating Polylang.
5. Enabling all `st_*` post types in Polylang settings.

The seed is idempotent by slug. Running it again should skip existing posts.

## Remaining Manual Work

- Add English translations in Polylang for every seeded Arabic post.
- Replace external case-study/testimonial images with uploaded Media Library images.
- Review all excerpts and long descriptions from WP Admin.
- Set form recipient email from `Settings -> SpinesTech`.
- Create/assign navigation menu if the static navbar is replaced with a WP menu later.
