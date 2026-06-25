# SpinesTech WordPress

PHP theme + plugin for [spinestech.com](https://spinestech.com) (Hostinger).

**Repo:** https://github.com/amrmohamed21224/SpinesTech-wp.git

## Structure

- `theme/spinestech/` — custom theme
- `plugin/spinestech-core/` — CPTs, ACF, forms, Polylang

## Build CSS

```bash
npm install
npm run build:css
```

## Deploy

1. Upload `plugin/spinestech-core` → `wp-content/plugins/`
2. Upload `theme/spinestech` → `wp-content/themes/`
3. Activate theme + plugin, Polylang, ACF PRO

See `docs/SETUP-HOSTINGER.md`
