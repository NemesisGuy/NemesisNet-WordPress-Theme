# NemesisNet Post Kit — Authoring Guide (v2.1.3)

Post with content only. No `<style>` blocks, no inline CSS. Every recurring
post element below is a native theme class or a Gutenberg pattern. This doc is
written for humans **and** coding agents generating post HTML.

> Requires theme **2.1.3+**. Related Gutenberg patterns live in the
> `NemesisNet` category in the block inserter (`inc/blocks.php`).

## The rule

- Layout classes carry **no layout margins** — spacing comes from the parent
  (card padding, grid gap). Never add `margin-top` to a button, pill, or card
  to "fix" alignment; if something looks off, the class is wrong, not your CSS.
- Legacy aliases `my-section` → `post-section` and `my-cta` → `post-cta` still
  work, but write the new names.

## Sections

```html
<div class="post-section">
  <h2>Section heading</h2>
  <p>Prose. Multiple paragraphs per section are fine.</p>
</div>
```

Pattern: none needed — any Group block with Additional CSS class `post-section`.

## Lead paragraph + cross-link line

```html
<p class="lead">Standfirst / opening hook, slightly larger and muted.</p>
<p class="context-line"><em>Part of our playbook — pairs well with
<a href="…">Some Other Post</a>.</em></p>
```

Patterns: `nemesisnet/context-line`.

## TL;DR callout

```html
<div class="tldr-box">
  <h3>⚡ TL;DR</h3>
  <ul>
    <li><strong>Takeaway one.</strong> One line of detail.</li>
  </ul>
</div>
```

Blue tint is per-mode (readable in dark **and** light). Pattern: `nemesisnet/tldr-box`.

## Tech stack pills

```html
<div class="tech-stack">
  <span class="tech-pill">Spring Boot 3</span>
  <span class="tech-pill">PostgreSQL</span>
</div>
```

Green pills, per-mode text color (deep green in light mode for contrast).
Pattern: `nemesisnet/tech-stack` — then just rename the pills.

## What You'll Learn (centered cards)

Use the **grid** set (icon on top, centered). Do **not** use `features-list`
for this — that is the icon-left in-flow variant.

```html
<h3>What You'll Learn</h3>
<div class="features-grid features-grid--compact">
  <div class="feature-item">
    <div class="feature-icon feature-icon--blue"><i class="fas fa-database"></i></div>
    <h4 class="feature-title">Isolation Models</h4>
    <p class="feature-description">One-line explanation.</p>
  </div>
</div>
```

- Always add `features-grid--compact` inside posts (tighter cards, 4-across;
  plain `features-grid` is sized for the full-width styleguide page).
- Icon colors: default tile is the blue→aurora gradient. Optional tinted
  tiles: `feature-icon--blue`, `feature-icon--amber`, `feature-icon--green`,
  `feature-icon--purple`. Text colors auto-darken in light mode.
- Patterns: `nemesisnet/learn-grid-centered` (grid) or `nemesisnet/learn-grid`
  (icon-left list, for mid-article use).

## Lesson / war-story callout

```html
<div class="lesson-card">
  <h3>💡 Lesson: The Guarantee Must Not Depend on Application Code</h3>
  <p>Two or three sentences.</p>
</div>
```

Amber tint, per-mode. Pattern: `nemesisnet/lesson-card`.

## Code + explainer

Plain `<pre><code>` blocks are styled per-mode by the theme — no classes.
For a prose explainer box next to code:

```html
<div class="code-explain">Line-by-line: what the snippet above does…</div>
```

Pattern: `nemesisnet/code-explain`. (Prism.js was removed in 2.1.0 — no
`language-*` classes needed.)

## Tables

Bare `<table>` is fully styled: tinted header, striped rows, hover, and
horizontal swipe-scroll under 768px. No wrapper div needed.

```html
<table>
  <thead><tr><th>Approach</th><th>Cost</th></tr></thead>
  <tbody><tr><td>…</td><td>…</td></tr></tbody>
</table>
```

- Uniform rows instead of stripes: `<table class="table-plain">`
- Headers are distinct in both modes (navy tint dark, deep-blue text light).

## CTA funnel + Related Reading

```html
<div class="post-cta">
  <h3>Need Help Building Yours?</h3>
  <p>One-sentence pitch.</p>
  <div class="post-cta__buttons">
    <a href="…" class="btn-aurora">Contact Us</a>
    <a href="…" class="btn-ghost">Services</a>
  </div>
</div>
<div class="post-section related-reading">
  <h2>Related Reading</h2>
  <ul>
    <li><a href="…">Post title</a> — one-line teaser</li>
  </ul>
</div>
```

Pattern: `nemesisnet/post-funnel` (both at once). Buttons `btn-aurora` /
`btn-ghost` / `btn-primary` and `read-more` are native; `read-more` aligns in
flex rows (its top margin only applies inside `footer.entry-footer`).

## Images

Core Image blocks and plain `<img>` inside post content open in a native
lightbox `<dialog>` on click (caption = `alt` text, Esc/backdrop closes).
Linked images (thumbnails) are skipped. No markup needed.

## Colors without code

- Customizer → NemesisNet Settings → **Accent Color** (works in both modes),
  **Glass Intensity** (Subtle / Standard / Strong), Glass Blur, Border Radius.
- Editor palette: brand colors only, custom colors locked off by design.

## Migrating an old post (checklist)

1. Delete the `<style>` block.
2. `my-section` → `post-section`, `my-cta` → `post-cta`.
3. Blue TL;DR card → `tldr-box`; amber lessons → `lesson-card`.
4. Tech-stack span stacks → `tech-stack` / `tech-pill`.
5. `features-list` learn grids → `features-grid features-grid--compact`
   (+ optional `feature-icon--*` colors).
6. Inline button-row divs → `post-cta__buttons`; cross-link paragraph →
   `context-line`; Related Reading list → `post-section related-reading`.
7. Tables: strip wrappers, add `table-plain` only if you want uniform rows.
