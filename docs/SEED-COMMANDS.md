# Seed Commands

Run these commands from the WordPress root after uploading the `content/` folder and activating `spinestech-core`.

```bash
wp eval-file content/create-pages.php
wp eval-file content/seed.php
wp eval-file content/seed-extended.php
```

`create-pages.php` creates the required WordPress pages:

- about
- contact
- pricing
- quote
- consultation
- solutions
- careers
- careers/jobs
- careers/work-environment

`seed.php` creates the base demo content:

- Services
- Pricing plans
- ERP product

`seed-extended.php` creates the remaining launch content:

- Sectors
- Case studies
- Jobs
- FAQs
- Testimonials

All files skip existing pages/posts by slug/path, so they are safe to run more than once.
