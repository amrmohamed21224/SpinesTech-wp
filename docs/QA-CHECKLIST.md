# QA Checklist

Use this checklist before uploading to Hostinger and again after deployment.

## Global

- Header renders correctly on desktop, tablet, and mobile.
- Mobile menu opens, closes, and scroll lock works.
- Navbar consultation button opens only the consultation modal.
- Language switch works with Polylang for Arabic and English.
- RTL layout is correct on Arabic pages.
- LTR layout is correct on English pages.
- Footer links point to real pages.
- Back-to-top button appears after scroll and works.
- No horizontal scroll on 375px mobile.
- No missing images or broken icons.
- Google fonts and Material Symbols load.
- LiteSpeed Cache does not defer or combine JS in a way that breaks forms/modal.

## Pages

| Page | Desktop | Mobile | Data | CTA | Notes |
|---|---|---|---|---|---|
| `/` | [ ] | [ ] | [ ] | [ ] | Home sections, pricing, FAQ |
| `/about` | [ ] | [ ] | [ ] | [ ] | Vision, values, team if enabled |
| `/services` | [ ] | [ ] | [ ] | [ ] | Cards link to singles |
| `/services/{slug}` | [ ] | [ ] | [ ] | [ ] | Features and quote CTA |
| `/products` | [ ] | [ ] | [ ] | [ ] | Demo/quote links |
| `/products/{slug}` | [ ] | [ ] | [ ] | [ ] | Hero, counters, modules tabs |
| `/sectors` | [ ] | [ ] | [ ] | [ ] | Layout variants |
| `/sectors/{slug}` | [ ] | [ ] | [ ] | [ ] | Sector services and CTA |
| `/case-studies` | [ ] | [ ] | [ ] | [ ] | Filters/cards |
| `/case-studies/{slug}` | [ ] | [ ] | [ ] | [ ] | Challenge/solution/results |
| `/pricing` | [ ] | [ ] | [ ] | [ ] | Plans and FAQ |
| `/quote` | [ ] | [ ] | [ ] | [ ] | Query params do not break form |
| `/consultation` | [ ] | [ ] | [ ] | [ ] | Goal selection and form |
| `/contact` | [ ] | [ ] | [ ] | [ ] | Contact form |
| `/careers` | [ ] | [ ] | [ ] | [ ] | Career landing |
| `/careers/jobs` | [ ] | [ ] | [ ] | [ ] | Jobs listing |
| `/careers/{slug}` | [ ] | [ ] | [ ] | [ ] | Career application upload |
| `/careers/work-environment` | [ ] | [ ] | [ ] | [ ] | Static career content |

## Forms

- Contact form validates required fields.
- Consultation modal form submits and stores `st_submission`.
- Consultation page form submits and stores `st_submission`.
- Quote form submits selected project type and budget.
- Career form accepts only PDF/DOC/DOCX and stores attachment.
- Honeypot fields block bot submissions silently.
- Rate limit returns a controlled error after repeated submissions.
- WP Mail SMTP sends notification emails.
- Success and error states are visible and readable on mobile.

## Hostinger

- PHP version is 8.0 or newer.
- Permalinks are set to `Post name` and saved after theme/plugin activation.
- ACF PRO, Polylang, WP Mail SMTP, SpinesTech Core are active.
- Polylang has Arabic as default and English as secondary.
- All custom post types are enabled in Polylang settings.
- SSL is active.
- LiteSpeed Cache is enabled only after QA.

