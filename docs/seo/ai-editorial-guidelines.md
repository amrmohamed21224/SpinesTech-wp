# AI & Editorial Guidelines — SpinesTech

## Entity sentence (use consistently)

**AR:** SpinesTech شركة تطوير برمجيات تبني تطبيقات جوال ومنصات ويب ولوحات تحكم وأنظمة أعمال مخصصة للشركات في الخليج.

**EN:** SpinesTech is a software development company that builds custom mobile apps, web platforms, dashboards, and business systems for companies in the GCC.

Use in: About, footer, LinkedIn, Clutch, schema `description`, article author bios.

## What we do

- Answer buyer questions directly in the first paragraph.
- Cite 2–3 official sources (SDAIA, CST, Apple/Google developer docs) where relevant.
- Link internally: Article → Service → Case Study → Contact.
- Show FAQ in HTML when FAQ schema is present.
- Use ar/en config in PHP (`article-landings.php`, `service-landings.php`) — not machine-translated bulk posts.

## What we do NOT do

- No AI spam: 20+ thin articles with duplicate structure.
- No unverified metrics (“آلاف العملاء”, “أعلى المعايير”) without case study evidence.
- No FAQ schema without visible FAQ on the page.
- No keyword stuffing in titles or meta.
- No fake reviews or fabricated case study numbers.

## Article quality bar (9 strategic posts)

Each article must have:
1. Clear H1 matching search intent
2. Direct answer in paragraph 1
3. 2–3 H2 sections with actionable detail
4. 2–3 official reference links
5. CTA to `/contact/`
6. Author + reviewer line (SpinesTech Engineering)
7. 2–3 FAQ items (visible + optional schema later)

## sameAs profiles

Confirm and keep aligned (see `inc/site-config.php`):

- LinkedIn: `https://www.linkedin.com/company/spinestech`
- GitHub: `https://github.com/spinestech`
- Clutch: `https://clutch.co/profile/spinestech`

Use the entity sentence as the profile description on each platform.

## Review cadence

- Quarterly: refresh pricing ranges in cost article with client approval.
- After each deploy: spot-check 3 URLs in Rich Results Test.
- When adding content: peer review for claims and compliance wording (PDPL, payments).
