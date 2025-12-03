# This script will copy style-cludebroke.css and insert the missing foundational CSS

$sourceFile = "C:\Users\Reign\Projects\NemesisNet-WordPress-Theme\style-cludebroke.css"
$targetFile = "C:\Users\Reign\Projects\NemesisNet-WordPress-Theme\style.css"

# Read the source file
$content = Get-Content $sourceFile -Raw

# The insertion content (everything that's missing after :root closes)
$insertionContent = @"

html[data-theme="light"] .mobile-nav-overlay {
    background: rgba(240, 244, 248, 0.95);
}

html[data-theme="light"] {
    --text-color: var(--nemesis-black);
    --text-muted: rgba(26, 26, 26, 0.75);
    --glass-bg: rgba(255, 255, 255, 0.5);
    --glass-border: rgba(0, 0, 0, 0.08);
    --page-background: linear-gradient(180deg, #f0f4f8 0%, #e2e8f0 100%);
    --page-glow: radial-gradient(circle at 20% 15%, rgba(41, 121, 255, 0.3) 0%, transparent 50%), radial-gradient(circle at 80% 85%, rgba(0, 194, 168, 0.24) 0%, transparent 50%);
    --accent-color: var(--nemesis-blue);
    --accent-hover: var(--nemesis-blue-bright);
}

html[data-theme="light"] .site-header {
    backdrop-filter: blur(18px) saturate(120%);
    -webkit-backdrop-filter: blur(18px) saturate(120%);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

html,
body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    background: var(--page-background);
    background-image: var(--page-glow);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    color: var(--text-color);
    line-height: 1.7;
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
}

#page {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

a {
    color: var(--accent-color);
    text-decoration: none;
    transition: color 0.2s ease;
}

a:hover {
    color: var(--accent-hover);
}

.container {
    max-width: var(--content-width);
    margin: 0 auto;
    padding: 0 var(--space-md);
}

/* Header */
.site-header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: var(--glass-bg);
    border-bottom: 1px solid var(--glass-border);
    box-shadow: 0 16px 42px rgba(5, 9, 24, 0.32);
    backdrop-filter: blur(18px) saturate(120%);
    -webkit-backdrop-filter: blur(18px) saturate(120%);
    height: 70px;
    display: flex;
    align-items: center;
}

.site-header .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
}

.site-branding {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    margin-right: auto;
}

.custom-logo-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(41, 121, 255, 0.1), rgba(0, 194, 168, 0.08));
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.custom-logo {
    width: 32px !important;
    height: 32px !important;
    border-radius: 50%;
    object-fit: contain;
}

.site-title {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 600;
    line-height: 1;
}

.site-title a {
    color: var(--text-color);
}

.header-actions {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

/* Navigation */
.main-navigation ul {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    list-style: none;
    margin: 0;
    padding: 0;
}

.main-navigation a {
    color: var(--text-color);
    font-weight: 500;
    font-size: 0.95rem;
    padding: 8px 12px;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.main-navigation a:hover {
    background: var(--glass-bg);
    color: var(--accent-hover);
}

/* Dropdown Menus */
.main-navigation ul ul {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--ui-radius);
    position: absolute;
    left: -999em;
    z-index: 99999;
    min-width: 200px;
    box-shadow: 0 8px 24px rgba(4, 9, 24, 0.2);
    padding: var(--space-sm) 0;
}

.main-navigation ul ul ul {
    left: -999em;
    top: 0;
}

.main-navigation ul li:hover>ul {
    left: auto;
}

.main-navigation ul ul li {
    position: relative;
    list-style: none;
    margin: 0;
    padding: 0;
}

.main-navigation ul ul a {
    width: 100%;
    padding: 10px var(--space-md);
    display: block;
    white-space: nowrap;
    border-radius: 0;
    font-size: 0.9em;
}

.main-navigation ul ul a:hover {
    background: rgba(41, 121, 255, 0.1);
    color: var(--accent-color);
}

/* Mobile Navigation Dropdowns */
.mobile-nav-menu ul {
    /* For nested sub-menus in mobile */
    padding-left: var(--space-md);
}

.mobile-nav-menu ul a {
    background: transparent;
    border: none;
    padding: var(--space-xs) var(--space-md);
    font-size: 1em;
}

.mobile-nav-menu ul a:hover {
    background: rgba(41, 121, 255, 0.05);
}

/* Navigation Visibility Classes */
.main-navigation .current-menu-item>a,
.main-navigation .current-menu-ancestor>a,
.main-navigation .current_page_item>a,
.main-navigation .current_page_ancestor>a {
    color: var(--accent-color);
    background: var(--glass-bg);
}

.main-navigation .menu-item-has-children>a::after {
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    content: "\f078";
    /* fa-chevron-down */
    margin-left: 8px;
    font-size: 0.7em;
    vertical-align: middle;
}

.main-navigation ul ul .menu-item-has-children>a::after {
    content: "\f054";
    /* fa-chevron-right */
}

/* Mobile Navigation */
.mobile-menu-toggle {
    display: none;
    width: 44px;
    height: 44px;
    background: transparent;
    border: 1px solid var(--glass-border);
    border-radius: var(--ui-radius);
    color: var(--text-color);
    cursor: pointer;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.mobile-menu-toggle:hover {
    background: var(--glass-bg);
    border-color: var(--accent-color);
}

.mobile-menu-toggle i {
    font-size: 1.2rem;
}

.mobile-nav-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(10, 14, 39, 0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    z-index: 9999;
    display: none;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.mobile-nav-overlay.active {
    display: flex;
    opacity: 1;
}
"@

# Find where :root closes and insert after it
$pattern = '(?s)(:root\s*\{[^\}]*\})'
$newContent = $content -replace $pattern, "`$1$insertionContent"

# Save to target file
$newContent | Set-Content $targetFile -NoNewline

Write-Host "Fixed style.css created successfully!" -ForegroundColor Green
