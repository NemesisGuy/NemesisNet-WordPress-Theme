# NemesisNet Theme Changelog

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
