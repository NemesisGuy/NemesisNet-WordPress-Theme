# NemesisNet Theme Changelog

## 2.1.0 — 2026-10-09

First release from the `v2.1` branch (unpublished dev builds 2.1.1–2.1.6
folded in). Upgrades cleanly from prod 2.0.3.

### Fixed (P0 — correctness)
- **F1** `pre` code blocks legible in light mode: explicit dark text on
  `#f4f6fb`, explicit light text `#e8ecf4` on dark.
- **F2** Table header/striping/hover rules were invalid `rgba(var())` and
  silently dropped. Replaced with RGB-triplet `rgba()` + `color-mix()` with
  flat fallbacks.
- **F3** Glass defaults adopted from proven per-post values: dark `0.08`,
  light `0.6` (was `0.03` / `0.25`).
- **F4** TL;DR/callout tints now per-mode (blue `0.14` dark / `0.08` light;
  CTA green `0.12` dark / `0.10` light; lesson amber `0.10` / `0.08`).
- **F5** Removed ghost `--accent-color: var(--theme-accent-color)` override
  that emptied the Customizer accent picker in light mode. Picker now wins
  both modes.
- **F6** New native image lightbox (`assets/js/lightbox.js`): click any
  post/page image to open full-size in a `<dialog>` (Esc/backdrop closes,
  captioned from `alt`). Delegation covers `.post-content`,
  `.entry-content`, and `.page-content` — the first build only matched
  `.entry-content`, which single posts don't use. No content changes needed.
- **Read More alignment**: `margin-top: 15px` scoped to
  `.entry-footer .read-more` so the button sits level in flex button rows.
- **Prose-vs-component specificity**: `.post-content h2/h3/h4` overrode
  component titles (e.g. 48px margin injected into learn-grid cards).
  Prose rhythm now applies to classless headings only (`:not([class])`).
- **Duplicate legacy Features block** deleted — it silently overrode the
  documented component by source order (280px grid, 32px padding).
- **Card heading margins**: titles/descriptions now reset `margin-top: 0`
  (browser defaults added ~21px above every card title).
- **Bare tables on mobile**: plain `<table>` scrolls horizontally under
  768px with tighter cells. Table headers distinct per mode (navy 0.35
  dark; deep-blue text on 0.12 tint in light).

### Added (P1 — post kit)
- **Stable public classes**: `post-section`, `post-cta`,
  `post-cta__buttons`, `related-reading`, `context-line`, `tldr-box`,
  `lesson-card`, `code-explain`, `p.lead`, `card-title`, `card-content`,
  `table-compare`, `table-plain` (uniform rows), `tech-stack`,
  `tech-pill`, `features-grid--compact`,
  `feature-icon--blue/--amber/--green/--purple`. Legacy `glass-section` /
  `glass-card` / `my-section` / `my-cta` aliases keep working.
- **Gutenberg patterns** (`nemesisnet` category): `post-funnel`,
  `tldr-box`, `learn-grid`, `learn-grid-centered`, `context-line`,
  `lesson-card`, `code-explain`, `tech-stack` (plus existing `image-card`,
  `hero-gradient`, `project-card`).
- **Editor parity**: `editor-style.css` previews the post kit, buttons,
  tables, pills, grids, and `pre`.
- **Prism.js dropped**: removed 3 unused CDN assets. Plain `<pre><code>`
  styled by the theme; pages are faster.
- **Customizer**: new Glass Intensity slider (Subtle / Standard / Strong);
  Accent Color picker fixed in light mode.
- **theme.json**: `appearanceTools: true`, `contentSize 1080px`.
- **Modern markup**: `html5` support (search form, comments, gallery,
  captions) + `responsive-embeds`.
- **Docs**: `docs/post-kit.md` authoring guide (humans + agents),
  cheatsheet cross-link, GPL `LICENSE` file.

### Merged pre-existing work (repaired)
- Header nav search + `searchform.php`, breadcrumbs + toggles, guarded
  numbered pagination, archive/search refactor with `content-none.php`,
  reading time / category / tag meta, references + author-bio parts,
  `sidebar-left` classes, theme.js hardening.
- Repairs: **footer.php was truncated** (restored `#page` close, mobile
  overlay, `wp_footer()`); sidebar position now `get_theme_mod`;
  DEBUG comments removed.
- Housekeeping: deleted `style-cludebroke.css`, `style-corrupted.css`,
  `style.css.corrupted`, `fix-style.ps1`, superseded `components.html`.

### Migration
- Inline per-post `<style>` overrides keep working — strip progressively,
  zero-risk. `my-section` → `post-section`, `my-cta` → `post-cta` at your
  pace. Full conversion example in `docs/post-kit.md` migration checklist.
