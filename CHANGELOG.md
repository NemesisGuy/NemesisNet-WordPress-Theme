# NemesisNet Theme Changelog

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
