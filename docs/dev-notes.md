# Developer Notes & Issue Tracker

## Open Issues / Requests
- [ ] **Rounded Corners**: User asked "where did the rounded corners go?". Need to verify if border-radius settings are applied correctly in `style.css` and `theme.json`.
- [ ] **Nav Glass Effect**: User reported "navs glass effect, its too transparent with no frost". Need to check `backdrop-filter` on `.site-header` or `.main-navigation`.
- [ ] **Comments User Images**: User reported "user images styles are broken". Need to verify `.avatar` styling in `style.css`.

## Lessons Learned
- **Rickroll Embed**: The YouTube embed was causing issues, solved by using `youtube-nocookie.com` (or just keeping it as a Rickroll for the demo).
- **Sticky Header Offset**: Fixed using `scroll-margin-top` on section headings.

## Change Log
- **2025-11-30**:
    - Implemented `page-styleguide.php` template.
    - Created `inc/theme-options.php`.
    - Added `template-parts/content.php`, `content-single.php`, `content-page.php`.
    - Extracted theme JS to `assets/js/theme.js`.
    - Added Comments component to Styleguide.
