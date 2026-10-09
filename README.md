# NemesisNet WordPress Theme

A custom WordPress theme based on the NemesisNet Brand Guide, featuring a modern dark design with glassmorphic elements and responsive layouts.

## Features

- ✨ **Modern Design**: Glassmorphic UI with dark/light theme toggle
- 🎨 **Brand Colors**: Nemesis Blue and Aurora Green color schemes
- 📱 **Fully Responsive**: Mobile-first design that works on all devices
- 🖼️ **Responsive Images**: All images automatically scale properly
- 🏷️ **Taxonomy Pills**: Beautiful category (blue) and tag (green) displays
- 🎯 **Custom Logo Support**: Upload your own logo via WordPress Customizer
- ⚡ **Performance Optimized**: Lightweight and fast-loading
- 🌓 **Theme Toggle**: Switch between dark and light modes
- 🧩 **Reusable Components**: Includes cards, buttons, hero links, and more
- 📑 **References Component**: Styled list for sources and citations
- 🔍 **Nav Search**: Integrated header search toggle with glass styling
- 🍞 **Breadcrumbs**: Navigation trail for better UX
- 📄 **Demo Page Template**: Full component showcase page template (`page-demo.php`)

## Glass Layout Rule-of-Thumb

- Use `glass-section` for prose blocks (paragraphs, quotes, headings) and feel free to keep multiple related paragraphs inside one section for flow.
- When the next block is a list/table/grid, close the `glass-section`, add a sibling `glass-card` for that structured content, then open a new section for the following prose if needed.
- Never wrap a `glass-card` inside a `glass-section`; instead stack them sequentially (section → card → section, etc.).

## Installation

### From Zip File

1. Download `NemesisNet-Theme.zip`
2. Go to WordPress Admin → Appearance → Themes
3. Click "Add New" → "Upload Theme"
4. Choose the zip file and click "Install Now"
5. Click "Activate" to enable the theme

### From GitHub

```bash
cd wp-content/themes/
git clone https://github.com/NemesisGuy/NemesisNet-WordPress-Theme.git nemesisnet
```

Then activate the theme from WordPress Admin.

## 🐛 Recently Fixed (v2.0.8)

- **Nav Search**: header search toggle now opens/closes the search form (Esc closes).
- **Breadcrumbs**: now render on posts, pages, archives, and search (toggle in Customizer → Layout).
- **Pagination**: numbered pagination renders on the blog feed when more than one page exists (toggle in Customizer → Layout).

## Configuration

### Customizer
Go to **Appearance > Customize > NemesisNet Settings** to configure all theme settings:
- **General**: Accent Color, Default Theme Mode.
- **Layout**: 
    - Global Sidebar Position & Title
    - Sticky Header
    - **Show Breadcrumbs** (New)
    - **Show Pagination** (New)
    - **Show Search in Nav** (New)
    - Author Bio Toggle
- **UI Aesthetics**: Glass Blur, Border Radius.
- **Miscellaneous**: Rickroll URL.

### Templates
This theme includes several templates for Pages and Posts:
- **Default**: Full Width (No Sidebar).
- **Sidebar Left**: Displays the sidebar on the left.
- **Sidebar Right**: Displays the sidebar on the right.

### Features
- **Back to Top**: Automatically appears when scrolling down.
- **Reading Time**: Displayed on single posts.
- **References**: Add sources via the "Sources & References" meta box on posts.
- **Editor Styles**: Gutenberg editor matches the frontend design.

### Analytics
Go to **Analytics** in the admin menu to add your Umami tracking code.

## Customization

### Theme Options

- **Logo**: Upload via Appearance → Customize → Site Identity
- **Theme Toggle**: Automatic dark/light mode switcher in header
- **Colors**: Based on NemesisNet brand guide (customizable via CSS variables)

### CSS Variables

The theme uses CSS custom properties for easy customization:

```css
--nemesis-blue: #1E88E5;
--nemesis-blue-bright: #2979FF;
--aurora-base: #00C2A8;
--aurora-flare: #33D6B7;
```

## Components

### Included Components

- **Glassmorphic Cards**: Stylish cards with gradient backgrounds and soft shadows.
- **Buttons**: Primary, ghost, and Aurora-themed buttons.
- **Hero Links**: Styled navigation links for CTAs.
- **Pills & Tags**: Rounded elements for categories and highlights.
- **Breadcrumbs & Pagination**: Consistent across posts, pages, archives, and search.
- **Carousel**: Interactive image/content slider.
- **Stats Grid**: Animated statistic counters.
- **Feature Blocks**: Icon-based feature highlights.
- **Related Posts**: Grid layout for suggested content.
- **Author Bio**: Stylish author information box.
- **References List**: Styled component for external links.
- **Comments**: Custom-styled comment list and form.
- **Navigation**: Breadcrumbs, Pagination, and Post Navigation.
- **Footer**: Dynamic footer with year and attribution.

### Templates & Structure

- **Page Templates**:
    - **Default**: Standard page layout (`page.php`).
    - **Demo Page**: Full component showcase (`page-demo.php`).
    - **Style Guide**: Documentation and style reference (`page-styleguide.php`).
- **Post Templates**:
    - **Standard**: Single post layout with sidebar (`single.php`).
- **Sidebar**:
    - **Main Sidebar**: Widget-ready area (`sidebar-1`) that appears on blog posts and archives. Supports standard WordPress widgets.

### Demo File

Check `components-demo.php` for a static HTML reference, or use the **"Demo Page"** template in WordPress to create a live demo page.

## Version History

- **2.0.8** - Header search toggle, breadcrumbs/pagination QA, new Gutenberg patterns (Hero, Project Card), mobile nav JS hardening
- **2.0.1** - Added References component, Breadcrumbs, Nav Search, Pagination toggles, and fixed archive/search layouts.
- **2.0.0** - Major update: Customizer support, new templates (Sidebar Left/Right), Gutenberg editor styles, reading time, back-to-top button, and sticky header.
- **1.9.1** - Fixed sidebar layout issues and added global position setting.
- **1.9.0** - Added Demo Page template, improved post navigation, and refined responsive layouts
- **1.8.0** - Added reusable components and demo file
- **1.7.0** - Added category/tag pills and responsive image support
- **1.6.0** - Enhanced responsive image handling
- **1.5.0** - Initial release with core features

## Documentation

- **[Post Kit Guide](docs/post-kit.md)**: How to write posts with native classes and patterns — no custom CSS. Start here.
- **[LLM Cheatsheet](docs/llm-cheatsheet.md)**: A quick reference for LLMs to generate theme-compliant HTML.
- **[Development Notes](docs/dev-notes.md)**: Technical details and development logs.
- **[Project Plan](docs/plan.md)**: Roadmap and task tracking.

## Support

For issues or questions, please visit the [GitHub repository](https://github.com/NemesisGuy/NemesisNet-WordPress-Theme).

## License

Proprietary - NemesisNet Brand
