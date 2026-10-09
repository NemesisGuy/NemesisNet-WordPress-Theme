# NemesisNet Theme Changelog

## 2.1.4 — 2026-10-09

### Fixed
- **Learn-grid icon gap**: compact icon→title margin 8px → 6px, card
  padding 16px → 14px vertical. (If the gap still looks ~20px+ on dev, the
  post HTML is still on plain `features-grid` without `--compact` — the
  full converted post code ships with the compact class applied.)

### Versioning note
- Main repo (`master`) is at 2.0.0 with no tags/releases — there is no
  published 2.1.x artifact to patch-bump from. The 2.1.x line lives on
  `feat/v2.1-theme-improvements` + dev (2.1.3). Bumping "Y from published"
  would mean 2.0.1, which WordPress would read as a *downgrade* of the
  installed 2.1.3 and refuse/hide the update. So: patch bump on our line.

## 2.1.3 — 2026-10-09

### Fixed
- **Learn-grid whitespace**: compact cards had 20px icon gaps and full-size
  padding. Icon gap 8px, card padding 16px, tighter title/description rhythm.

### Added
- **Icon color options**: `feature-icon--blue/--amber/--green/--purple`
  tinted tiles (the per-post colors, nativised) with light-mode-safe text.
  Default tile unchanged. Editor preview included.
- **Post Kit guide** (`docs/post-kit.md`): the full authoring reference for
  humans and agents — every class, pattern, snippet, and the old-post
  migration checklist. Linked from README.

### Housekeeping
- Removed dead weight: `style-cludebroke.css`, `style-corrupted.css`,
  `style.css.corrupted`, `fix-style.ps1`, and the superseded static
  `components.html` (the WP-native `page-demo.php` + styleguide are the
  reference now). Old build zips were never tracked (gitignored).

## 2.1.2 — 2026-10-09

### Fixed
- **Bare tables on mobile**: plain `<table>` (no `.wp-block-table` wrapper)
  overflowed the viewport with no scroll. Tables now become horizontally
  scrollable under 768px with tighter cell padding. Everything stays
  responsive — scroll, don't squeeze.
- **Table header distinction**: dark header deepened to 0.35 deep-blue tint;
  light mode gets its own rule (0.12 tint, `#0f4c81` text) instead of the
  near-invisible shared 0.1.

### Added
- **Uniform-row table variant**: `table.table-plain` disables striping (all
  rows the same, header still distinct). Default stays striped. Usage:
  `<table class="table-plain">`.
- **Compact learn grid**: `.features-grid--compact` (200px min columns,
  48px icons, tighter padding) fits 4 cards across at post widths instead of
  3+1 orphan. The `nemesisnet/learn-grid-centered` pattern now emits the
  compact class; base `.features-grid` unchanged for the styleguide page.

## 2.1.1 — 2026-10-09

### Fixed
- **Lightbox never fired on single posts**: the click delegation only matched
  `.entry-content img`, but single posts render content in `.post-content`
  (pages/excerpts use `.entry-content`). Now matches
  `.entry-content, .post-content, .page-content`. This was the entire reason
  "click image does nothing" survived 2.1.0 — the script was enqueued and the
  dialog existed, the selector just never matched.
- **Read More vertical alignment** (2.1.0.x): `margin-top: 15px` scoped to
  `.entry-footer .read-more` so the button sits level in flex button rows.

### Added
- **Tech stack pills**: native `.tech-stack` + `.tech-pill` (per-mode green,
  light mode uses deep `#008B6A` for contrast) and the
  `nemesisnet/tech-stack` pattern. Replaces the hand-rolled span stacks.
- **Centered learn grid**: the `features-grid` / `feature-item` /
  `feature-icon` / `feature-title` / `feature-description` set (icon on top,
  centered — the theme-demo "Features" look) is confirmed as the documented
  choice for What You'll Learn, with new pattern
  `nemesisnet/learn-grid-centered`. The icon-left `features-list` variant and
  its pattern stay for in-flow lists.

## 2.1.0 — 2026-10-09 (includes merged pre-existing work, repaired)

### Merged from pre-existing uncommitted work (all valid, kept)
- Header nav search toggle wired to Customizer setting + new `searchform.php`.
- Breadcrumbs component (`template-parts/breadcrumbs.php`) rendered on
  index/single/page/archive/search, with Customizer toggle.
- Pagination switched to guarded numbered `the_posts_pagination` with
  Customizer toggle.
- Archive/search layouts refactored onto shared `template-parts/content*.php`
  with sidebar support; no-results case uses new `content-none.php`.
- content.php: reading time, limited category links, tag links.
- content-single.php: references section + author-bio (new template parts,
  meta box in `inc/references-meta.php`), gated by Author Bio toggle.
- Sidebar title now reads `get_theme_mod`; inline `row-reverse` styles
  replaced with `sidebar-left` class; `glass-section` dropped from
  article/aside wrappers.
- theme.js: DOMContentLoaded hardening, ARIA-correct theme toggle,
  search/menu toggles, scrollspy, copy-to-clipboard buttons.
- README version history + component docs.

### Repairs applied while merging (were broken in the uncommitted work)
- **footer.php was truncated** (unclosed button, missing `#page` close,
  mobile nav overlay, `wp_footer()`): restored. Without this no footer
  scripts would print at all.
- **Missing `template-parts/content-none.php`** (archive/search referenced
  it; fallback would have rendered a broken article): created.
- **archive.php/search.php read sidebar position via `get_option()`**,
  which is never set (Customizer stores a theme_mod): switched to
  `get_theme_mod()`, matching index.php.
- Removed `// DEBUG:` comments from breadcrumbs/pagination templates.
- README: stale "Known Issues (v2.0.3)" rewritten as fixed; removed dead
  `docs/dev-notes.md` link.

## 2.1.0 — 2026-10-09

### Fixed (P0)
- **F1** `pre` code blocks legible in light mode: explicit dark text on `#f4f6fb`,
  explicit light text `#e8ecf4` on dark.
- **F2** Table header/striping/hover rules were invalid `rgba(var())` and silently
  dropped. Replaced with RGB-triplet `rgba()` + `color-mix()` with flat fallbacks.
- **F3** Glass defaults adopted from proven per-post values:
  dark `0.08`, light `0.6` (was `0.03` / `0.25`).
- **F4** TL;DR/callout tints now per-mode (blue `0.14` dark / `0.08` light;
  CTA green `0.12` dark / `0.10` light; lesson amber `0.10` / `0.08`).
- **F5** Removed ghost `--accent-color: var(--theme-accent-color)` override that
  emptied the Customizer accent picker in light mode. Picker now wins both modes.
- **F6** New native image lightbox (`assets/js/lightbox.js`): click any
  `.entry-content img` to open full-size in a `<dialog>` (Esc/backdrop closes,
  captioned from `alt`). No content changes needed.

### Added (P1)
- **T1** Stable public post-kit classes: `post-section`, `post-cta`,
  `post-cta__buttons`, `related-reading`, `context-line`, `tldr-box`,
  `lesson-card`, `code-explain`, `p.lead`, `card-title`, `card-content`,
  `table-compare`. Legacy `glass-section` / `glass-card` / `my-section` /
  `my-cta` aliases keep working. Buttons, feature lists, entry-meta,
  taxonomy pills, and alerts unchanged (already native).
- **T2** Six Gutenberg patterns in the `nemesisnet` category: `post-funnel`,
  `tldr-box`, `learn-grid`, `context-line`, `lesson-card`, `code-explain`.
- **T3** Editor parity: `editor-style.css` now previews the post kit, buttons,
  tables, and `pre`.
- **T4** Prism.js decision: **dropped** — removed 3 unused CDN assets (default
  light CSS + core + autoloader). Posts emit plain `<pre><code>` styled by the
  theme; pages are faster.
- **T7** New Customizer *Glass Intensity* slider (Subtle / Standard / Strong)
  mapping to the F3 alpha pairs, alongside the existing Accent Color,
  Glass Blur, and Border Radius controls.
- **T8** `theme.json`: `appearanceTools: true`, `layout.contentSize: 1080px`,
  `wideSize: 1280px`. No block-theme conversion.

### Migration
- Inline per-post `<style>` overrides keep working — strip them progressively,
  zero-risk. After upgrading, replace `my-section` → `post-section` and
  `my-cta` → `post-cta` at your pace (aliases cover old posts).

### Internal vs public API
- **Stable public:** the T1 class list above + the six block patterns.
- **Internal:** `--nemesis-blue-deep-rgb`, `--theme-glass-blur`,
  `.nemesis-lightbox*` internals.
