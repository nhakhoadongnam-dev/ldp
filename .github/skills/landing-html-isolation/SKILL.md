---
name: landing-html-isolation
description: >
  Enforce HTML class/id naming and CSS scoping rules for this Nha Khoa Dong Nam
  landing page project. Prevents selector collisions when static landing HTML
  renders inside WordPress/Flatsome via custom page templates.
argument-hint: [target file or section] [what you want to add or rename]
---

# Landing HTML Isolation

## When to use

Any work on landing page HTML, CSS, or JS under `page/trang-chu/`, `page/bang-gia/`,
`page/bang-gia-implant/`, `page/implant/`, or `page/chuong-trinh-30-04/`.

## Architecture context

Each landing page is a static HTML/CSS/JS folder. On production, a custom
WordPress page template (`wp-theme/page-trang-chu.php` etc.) outputs the static
HTML inside a WP shell — `wp_head()` and `wp_footer()` load Flatsome theme CSS,
Elementor, Contact Form 7, Popup Maker, and Customizer overrides. Any class or
id that matches theme/plugin vocabulary will collide.

Static preview parity ≠ WordPress parity: a selector that looks fine in
`/page/trang-chu/index.html` can break in the WP-rendered page.

## Legacy status

Not all pages comply with these rules yet:

| Page | `.ndn-lp` wrapper | CSS scoped | Violations |
|---|---|---|---|
| `page/trang-chu/` | Yes | ~98% | 37 (IDs + generic classes) |
| `page/bang-gia-implant/` | Yes | ~92% | 0 |
| `page/bang-gia/` | **No** | **0%** | 21 |
| `page/implant/` | **No** | **0%** | 33 |
| `page/chuong-trinh-30-04/` | **No** | **0%** | 34 |

When editing legacy pages, fix violations in the area you touch — do not
mass-rename across a file unless the user requests it.

---

## Rules

### 1. Wrapper requirement

Every landing page `<body>` must have a single wrapper `<div class="ndn-lp">`.
All landing CSS rules must be scoped under `.ndn-lp` — including inside
`@media` blocks.

### 2. Class naming

| Category | Rule | Example |
|---|---|---|
| **Shared primitives** (intentionally reused across pages) | Use `ndn-` prefix | `ndn-container`, `ndn-title`, `ndn-main` |
| **Page-specific components** (unique to one landing) | Use `ndn-` or `lp-` + page slug | `ndn-home-hero`, `lp-implant-price-table`, `lp-304-form-panel` |
| **State classes** | Only use as compound selectors, never standalone | `.doc-card.active` ✓ / `.active` ✗ |

Never introduce bare generic classes. See the [blacklist](./selector-blacklist.md).

### 3. ID naming — three categories

IDs in landing pages fall into three categories with different rules:

**a) Anchor IDs** (used in `href="#..."` links, shared externally, indexed by search):

These may omit the `ndn-` prefix if they serve as URL fragments that users or
other pages already link to. Renaming them breaks bookmarks and cross-page links.

```html
<!-- Acceptable: anchor IDs used in shared URLs -->
<section id="cta">          <!-- href="#cta" from nav, footer, ads -->
<section id="implant">      <!-- /bang-gia/#implant from service cards -->
<section id="rang-su">      <!-- /bang-gia/#rang-su from external links -->
```

When creating *new* anchor IDs, prefer prefixed names: `id="ndn-offers"`.

**b) JS-hook IDs** (used by `getElementById`, `querySelector` in scripts):

Must use `ndn-` or `lp-` prefix, or camelCase with a project prefix.

```html
<!-- Bad -->
<div id="lightbox">
<div id="carouselTrack">
<div id="docDetailName">

<!-- Good -->
<div id="ndn-lightbox">
<div id="ndn-carousel-track">
<div id="ndn-doc-detail-name">
```

When renaming a JS-hook ID, update **all three** in the same commit: HTML `id`,
CSS `#selector`, and JS `getElementById` / `querySelector`.

**c) ARIA IDs** (used in `aria-controls`, `aria-labelledby`):

Same prefix rules as JS-hook IDs. Always update the matching `aria-*` attribute
when renaming.

```html
<button aria-controls="ndn-panel-implant" id="ndn-tab-implant">
<div role="tabpanel" id="ndn-panel-implant" aria-labelledby="ndn-tab-implant">
```

### 4. CSS scoping

Every CSS rule must nest under `.ndn-lp`:

```css
/* Good */
.ndn-lp .hero { ... }
.ndn-lp .hero-content { ... }

/* Bad — bare selector, will collide with theme */
.hero { ... }
```

This includes `@media` blocks — do not drop the `.ndn-lp` scope inside
responsive queries:

```css
/* Bad — scoping lost in media query */
@media (max-width: 768px) {
  .container { padding: 0 16px; }
}

/* Good */
@media (max-width: 768px) {
  .ndn-lp .ndn-container { padding: 0 16px; }
}
```

Acceptable unscoped rules: `:root` variables, `html { scroll-behavior }`,
`@keyframes`, `@font-face`.

### 5. Synchronized updates

When renaming any selector:

1. Update the HTML attribute (`class` or `id`).
2. Update all CSS rules referencing it.
3. Update all JS selectors (`getElementById`, `querySelector`, `classList`).
4. Update `aria-controls`, `aria-labelledby`, `href="#..."` if affected.
5. Search the entire file for the old name to catch any missed references.

### 6. Deployment reminder

After CSS changes that affect production, remind the user:
- WP Rocket cache must be purged.
- Check the WP-rendered page, not just the static preview.

---

## Workflow

When editing or generating landing page markup:

1. Check which page you are editing and its compliance level (see Legacy status).
2. Scan new selectors against the [blacklist](./selector-blacklist.md).
3. For new classes: use `ndn-` or `lp-` prefix. For page-specific components,
   add a page slug (`ndn-home-*`, `lp-implant-*`, `lp-304-*`).
4. For new IDs: determine if it is an anchor, JS-hook, or ARIA ID and apply
   the matching rule from section 3 above.
5. Verify CSS rules are scoped under `.ndn-lp` (including media queries).
6. If you rename anything, synchronize HTML + CSS + JS + ARIA in one change.

---

## Review checklist

When asked to review or create landing markup:

- [ ] No new bare generic classes (see blacklist)
- [ ] No standalone `.active` — only compound like `.result-tab.active`
- [ ] All JS-hook IDs prefixed with `ndn-` or `lp-`
- [ ] Anchor IDs: new ones prefixed; existing shared ones left intact
- [ ] All CSS rules scoped under `.ndn-lp` (check media queries too)
- [ ] Renamed selectors updated in HTML + CSS + JS + ARIA
- [ ] `href="#..."` fragment links still match their target IDs
- [ ] No selector on the [blacklist](./selector-blacklist.md)

---

## Examples

### New section (good)

```html
<section class="ndn-home-services" id="ndn-services">
  <div class="ndn-container">
    <h2 class="ndn-title">Dịch vụ trọn gói</h2>
    <div class="ndn-home-svc-grid">...</div>
  </div>
</section>
```

### State class (good vs bad)

```html
<!-- Bad: standalone .active collides with Flatsome -->
<button class="active">

<!-- Good: compound selector, safe -->
<button class="result-tab active">
```

```css
/* CSS must also be compound */
.ndn-lp .result-tab.active { ... }
```

### JS-hook ID rename (complete)

```html
<!-- HTML -->
<div id="ndn-lightbox">

<!-- CSS -->
#ndn-lightbox { ... }

<!-- JS -->
document.getElementById('ndn-lightbox');
```

---

## Reference

- Blacklist: [selector-blacklist.md](./selector-blacklist.md)
- Project history: `.local/docs/OVERVIEW.md`, `.local/docs/OVERVIEW-2.md`
