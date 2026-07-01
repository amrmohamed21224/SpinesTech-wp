# SpinesTech WordPress

PHP WordPress theme + plugin for the Hostinger version of SpinesTech.

## Structure

- `plugin/spinestech-core/` - CPTs, ACF fields, forms, Polylang, settings.
- `theme/spinestech/` - custom WordPress theme and templates.
- `content/` - WP-CLI scripts for required pages and demo content.
- `docs/` - setup, migration, seed, and QA notes.

## Build CSS

```bash
npm install
npm run build:css
```

## Upload

Upload only these runtime folders:

```text
plugin/spinestech-core  -> wp-content/plugins/spinestech-core
theme/spinestech        -> wp-content/themes/spinestech
content                 -> WordPress root temporarily, or keep paths adjusted
```

Do not upload `node_modules`, `.git`, or the whole `SpinesTech-wp` folder.

## First Hostinger Setup

After upload and activation:

1. Activate `SpinesTech Core`.
2. Activate the `SpinesTech` theme.
3. Activate ACF PRO, Polylang, and WP Mail SMTP.
4. Set `Settings -> Permalinks -> Post name`, then Save.
5. Run the setup scripts from the WordPress root:

```bash
wp eval-file content/create-pages.php
wp eval-file content/seed.php
wp eval-file content/seed-extended.php
```

If `seed.php` and `seed-extended.php` were uploaded directly to the WordPress root, run:

```bash
wp eval-file create-pages.php
wp eval-file seed.php
wp eval-file seed-extended.php
```

See `docs/SETUP-HOSTINGER.md`, `docs/SEED-COMMANDS.md`, and `docs/QA-CHECKLIST.md`.
