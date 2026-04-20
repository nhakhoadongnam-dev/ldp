---
name: html-to-wp-template
description: >
  Convert or update WordPress PHP page templates from static HTML landing pages.
  Handles two operations (update existing / create new) and two output modes
  (standalone / theme). Use when syncing HTML changes into PHP templates.
argument-hint: [update|create] [html source path] [php target path]
---

# HTML to WP Template

## When to use

- After editing a static landing HTML and needing to sync changes into the
  corresponding PHP template(s).
- When creating a new PHP template from a new landing page HTML.

## Two operations

### Update (primary)

Sync changes from a static HTML file into an **existing, working** PHP template.
The PHP file already has correct WordPress constructs — do not regenerate them.
Only update the HTML content sections that changed.

### Create

Generate a new PHP template from scratch when no PHP file exists yet. Apply all
WordPress transformations (PHP header, asset paths, wp_head/wp_footer, etc.).

---

## Two output modes

### Mode A — Standalone (`page-*-landing.php`)

Self-contained page: renders full `<!DOCTYPE>` through `</html>`. Includes its
own `<head>`, topbar, nav, footer. Calls `wp_head()` and `wp_footer()` directly.
Does not use `get_header()` / `get_footer()`.

### Mode B — Theme (`page-*-theme.php`)

Content-only page: calls `get_header()` / `get_footer()` from Flatsome. Only
renders the content between hero and final CTA + form section. Enqueues CSS/JS
via `wp_enqueue_scripts` hook at priority 99.

**Sections Mode B DROPS** (Flatsome provides these):
- `<!DOCTYPE>`, `<html>`, `<head>`, `</head>`, `<body>`
- Google Analytics / GTM scripts
- SEO meta tags, Open Graph, Twitter Card, Schema.org JSON-LD
- Font preconnect links, favicon
- GTM noscript iframe
- Topbar
- Nav (desktop + mobile overlay)
- Footer
- Company info bar
- Floating CTA buttons
- `</body>`, `</html>`

**Sections Mode B KEEPS:**
- `.ndn-lp` wrapper (with `<a class="skip-link">` inside)
- `<main id="ndn-main">` and everything inside it
- Form section (`#form-section`)
- Elementor hidden div with `the_content()` loop

---

## Architecture (Hybrid)

```
[1. Identify]        What operation? Update or Create?
       │              What mode? Standalone (A) or Theme (B)?
       │              Which HTML sections changed?
       ▼
[2. Transform]        Agent applies changes using transform rules
       │              Preserves all PHP constructs (see frozen zones)
       ▼
[3. Validate]         Agent runs validation checklist
                      Reports any issues before writing
```

---

## Update workflow (step by step)

This is the primary use case. The existing PHP files work — preserve them.

### Step 1 — Identify the delta

1. Read the HTML source (e.g., `page/trang-chu/index.html`).
2. Read the existing PHP template (e.g., `page-trang-chu.php`).
3. Compare the HTML content sections — ignore PHP constructs when comparing.
4. List which sections changed (added / modified / removed).

Use landmark comments (`<!-- ═══ SECTION ═══ -->`) to align sections between
HTML and PHP. The sections are:

| Landmark | Block name |
|---|---|
| `<!-- ═══ TOPBAR ═══ -->` | topbar |
| `<!-- ═══ NAV ═══ -->` | nav |
| `<!-- Mobile Nav Overlay -->` | mobile-nav |
| `<!-- ═══ HERO ═══ -->` | hero (start of `<main>`) |
| `<!-- ═══ USP ═══ -->` | usp |
| `<!-- ═══ TIMELINE ═══ -->` | timeline |
| `<!-- ═══ STATS HIGHLIGHT ═══ -->` | stats |
| `<!-- ═══ COMMITMENT CERTIFICATE ═══ -->` | commit |
| `<!-- ═══ SERVICES ═══ -->` | services |
| `<!-- ═══ DOCTORS ═══ -->` | doctors |
| `<!-- ═══ RESULTS ═══ -->` | results |
| `<!-- ═══ TESTIMONIALS ═══ -->` | testimonials |
| `<!-- ═══ LOCATIONS ═══ -->` | locations |
| `<!-- ═══ FINAL CTA ═══ -->` | final-cta (end of `<main>`) |
| `<!-- ═══ REGISTRATION FORM ═══ -->` | form-section |
| `<!-- ═══ FOOTER ═══ -->` | footer |
| `<!-- Company Info Bar -->` | company-bar |
| `<!-- ═══ FLOATING CTA ═══ -->` | float-cta |

### Step 2 — Apply changes to PHP

For each changed section:

1. Locate the same section in the PHP file (by landmark comment).
2. Replace the HTML content **between** landmarks with the updated HTML from
   the source.
3. **Do not touch** any PHP code (`<?php ... ?>`) surrounding or adjacent to
   the section.
4. If the changed section contains asset paths (`href="style.css"`,
   `src="script.js"`), ensure they keep the PHP `esc_url($lp_base)` pattern
   that already exists in the PHP file.

For Mode B updates:
- Only update sections that Mode B includes (hero through form-section).
- Skip topbar, nav, mobile-nav, footer, company-bar, float-cta.

### Step 3 — Validate

Run through the [validation checklist](#validation-checklist) below.

---

## Create workflow

Only use when generating a new PHP template file from scratch.

### Step 1 — Determine mode

Ask the user: Standalone (A) or Theme (B)?

### Step 2 — Apply all transforms

See [transform-rules.md](./transform-rules.md) for the complete transformation
table. Summary:

**PHP header block** (top of file):
```php
<?php
/**
 * Template Name: {name}
 * {description}
 */
defined('ABSPATH') || exit;
$lp_base = home_url('/page/{lp-slug}');
?>
```

**Mode A additional transforms:**
- `<html lang="vi">` → `<html <?php language_attributes(); ?>>`
- `<meta charset="UTF-8">` → `<meta charset="<?php bloginfo('charset'); ?>">`
- Insert `<?php wp_head(); ?>` after favicon, before fonts/CSS
- `href="style.css"` → `href="<?php echo esc_url($lp_base); ?>/style.css"`
- `src="script.js"` → `src="<?php echo esc_url($lp_base); ?>/script.js"`
- Insert `<?php wp_footer(); ?>` after landing JS, before `</body>`
- Insert Elementor hidden div after `<body>` / after `.ndn-lp` opens

**Mode B additional transforms:**
- Remove everything from `<!DOCTYPE>` through `</head><body>` — replace with
  `get_header();`
- Remove topbar, nav, mobile-nav, footer, company-bar, float-cta
- Remove `</body></html>` — replace with `<?php get_footer(); ?>`
- Add `wp_enqueue_scripts` action block before `get_header()`
- Insert Elementor hidden div after `get_header()`

### Step 3 — Validate

Run through the [validation checklist](#validation-checklist).

---

## Frozen zones

These PHP constructs must NEVER be modified during an update. If you encounter
them while editing adjacent HTML, leave them exactly as-is:

**Mode A:**
```
<?php language_attributes(); ?>
<?php bloginfo('charset'); ?>
<?php wp_head(); ?>
<?php echo esc_url($lp_base); ?>
<?php // Elementor ... ?>
<?php if (have_posts()) : while ... the_content(); ... endif; ?>
<?php wp_footer(); ?>
```

**Mode B:**
```
defined('ABSPATH') || exit;
$lp_base = home_url('/page/trang-chu');
add_action('wp_enqueue_scripts', function () use ($lp_base) { ... }, 99);
get_header();
<?php // Elementor ... ?>
<?php if (have_posts()) : while ... the_content(); ... endif; ?>
<?php get_footer(); ?>
```

---

## Known file mappings

| HTML source | Mode A PHP | Mode B PHP |
|---|---|---|
| `page/trang-chu/index.html` | `wp-theme/page-trang-chu.php` | `wp-theme/page-trang-chu-theme.php` |
| `page/bang-gia/index.html` | `wp-theme/page-bang-gia.php` | `wp-theme/page-bang-gia-theme.php` |

When new pages need PHP templates, add them to this table.

---

## Validation checklist

After any update or create operation, verify:

### Structure
- [ ] PHP header has `Template Name:` comment
- [ ] `defined('ABSPATH') || exit;` is present
- [ ] `$lp_base = home_url(...)` is present
- [ ] Mode A: `wp_head()` exists, placed after favicon / before CSS
- [ ] Mode A: `wp_footer()` exists, placed after JS / before `</body>`
- [ ] Mode B: `get_header()` is called
- [ ] Mode B: `get_footer()` is called
- [ ] Mode B: `wp_enqueue_scripts` action is present with priority 99
- [ ] Elementor hidden div with `the_content()` loop exists

### Content integrity
- [ ] All landmark comments from HTML are present in PHP (Mode A: all; Mode B: hero through form-section)
- [ ] No HTML was accidentally deleted between sections
- [ ] Section order matches HTML source

### Asset paths
- [ ] All `href="style.css"` / `src="script.js"` use `esc_url($lp_base)`
- [ ] No hardcoded relative paths (`./style.css`, `./script.js`)
- [ ] Google Fonts URL is current (check HTML source for latest)
- [ ] Mode B: fonts URL in `wp_enqueue_style` matches HTML source

### Encoding & escaping
- [ ] File is saved as UTF-8 (Vietnamese characters preserved)
- [ ] `$` characters inside JSON-LD `"priceRange": "$$"` are not broken
- [ ] No stray PHP tags inside HTML content blocks

### Sync check
- [ ] Updated section content matches HTML source exactly (minus PHP transforms)
- [ ] Mode B: topbar/nav/footer sections are NOT present
- [ ] Mode B: float-cta is NOT present

---

## Edge cases

| Case | How to handle |
|---|---|
| HTML adds a new section | Insert in same position in PHP, between existing landmarks |
| HTML removes a section | Remove from PHP too — but confirm with user first |
| HTML renames a landmark comment | Update in PHP to match |
| JSON-LD contains `$` | Use exact match replacement, not regex — `$$` must stay as-is |
| New Google Fonts URL | Update in Mode A `<link>` and Mode B `wp_enqueue_style` |
| `page-trang-chu-theme.php` has stale font URL | Compare with HTML source and update enqueue call |
| HTML changes anchor IDs (`#cta`, `#timeline`) | Update in PHP — check both Mode A and Mode B |

---

## Deployment reminder

After updating PHP templates:
1. Commit and push (Plesk Git sync deploys to `/httpdocs/`).
2. Deployment script copies `wp-theme/` into `flatsome-child/`.
3. Purge WP Rocket cache on production.
4. Verify the WP-rendered page, not just static preview.

---

## Reference

- Transform rules: [transform-rules.md](./transform-rules.md)
- CSS isolation skill: [../landing-html-isolation/SKILL.md](../landing-html-isolation/SKILL.md)
- Implementation plan: `.local/Implementation-Plan/html-to-wp-template.md`
- Task list: `.local/Task-List/html-to-wp-template-tasks.md`
