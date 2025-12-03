<?php
/**
 * Template Name: Demo Page
 */

get_header();
?>

<div class="site-content container">
    <div class="docs-grid">
        <aside class="docs-sidebar">
            <nav class="docs-nav">
                <ul>
                    <li><a href="#typography" class="active">Typography</a></li>
                    <li><a href="#colors">Colors</a></li>
                    <li><a href="#sizing">Sizing</a></li>
                    <li><a href="#post-card">Post Card</a></li>
                    <li><a href="#buttons">Buttons</a></li>
                    <li><a href="#forms">Forms</a></li>
                    <li><a href="#tables">Tables</a></li>
                    <li><a href="#blockquotes">Blockquotes</a></li>
                    <li><a href="#alignment">Alignment</a></li>
                    <li><a href="#galleries">Galleries</a></li>
                    <li><a href="#media">Media</a></li>
                    <li><a href="#mobile-nav">Mobile Nav</a></li>
                    <li><a href="#breadcrumbs">Breadcrumbs</a></li>
                    <li><a href="#pagination">Pagination</a></li>
                    <li><a href="#post-nav">Post Nav</a></li>
                    <li><a href="#alerts">Alerts</a></li>
                    <li><a href="#comments">Comments</a></li>
                    <li><a href="#carousel">Carousel</a></li>
                    <li><a href="#stats">Stats</a></li>
                    <li><a href="#author">Author Bio</a></li>
                    <li><a href="#related">Related Posts</a></li>
                    <li><a href="#features">Features</a></li>
                </ul>
            </nav>
        </aside>
        <main class="docs-content">

            <!-- Typography -->
            <section>
                <h2 id="typography">Typography</h2>
                <div class="glass-section">
                    <h1>Heading Level 1</h1>
                    <h2>Heading Level 2</h2>
                    <h3>Heading Level 3</h3>
                    <h4>Heading Level 4</h4>
                    <p>This is a standard paragraph. The NemesisNet brand uses <strong>Inter</strong> for all
                        typography. It
                        provides a clean, modern, and highly readable typeface for UI and content.</p>
                    <p><a href="#">This is a text link</a> inside a paragraph.</p>
                    <p class="entry-meta">Meta text style (Date, Author, etc.)</p>
                </div>
            </section>

            <!-- Colors -->
            <section>
                <h2 id="colors">Brand Colors</h2>
                <div class="color-grid">
                    <div class="color-card">
                        <div class="color-swatch" style="background: var(--nemesis-blue);"></div>
                        <code>--nemesis-blue</code>
                    </div>
                    <div class="color-card">
                        <div class="color-swatch" style="background: var(--nemesis-blue-bright);"></div>
                        <code>--nemesis-blue-bright</code>
                    </div>
                    <div class="color-card">
                        <div class="color-swatch" style="background: var(--aurora-base);"></div>
                        <code>--aurora-base</code>
                    </div>
                    <div class="color-card">
                        <div class="color-swatch" style="background: var(--aurora-flare);"></div>
                        <code>--aurora-flare</code>
                    </div>
                    <div class="color-card">
                        <div class="color-swatch" style="background: var(--nemesis-black);"></div>
                        <code>--nemesis-black</code>
                    </div>
                </div>
            </section>

            <!-- Post Card -->
            <section>
                <h2 id="post-card">Post Card</h2>
                <article class="post">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="#">Post Title</a></h2>
                        <div class="entry-meta">
                            November 28, 2025 by Admin
                        </div>
                    </header>
                    <div class="post-thumbnail">
                        <a href="#">
                            <img src="https://picsum.photos/seed/nemesis/600/250" alt="Placeholder image">
                        </a>
                    </div>
                    <div class="entry-content">
                        <p>This is a sample post excerpt to demonstrate the card component styling and layout.
                        </p>
                    </div>
                    <footer class="entry-footer">
                        <a href="#" class="read-more">Read More</a>
                    </footer>
                </article>
            </section>

            <!-- Code Block -->
            <section>
                <h2 id="code">Code Block</h2>
                <pre><code>&lt;?php
/**
 * Example Code Block
 */
function hello_world() {
    echo "Hello, World!";
}
hello_world();
</code></pre>
            </section>

            <!-- Buttons -->
            <section>
                <h2 id="buttons">Buttons</h2>
                <div class="glass-section">
                    <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                        <button class="btn-primary">Primary Button</button>
                        <button class="btn-ghost">Ghost Button</button>
                        <button class="btn-aurora">Aurora Button</button>
                        <a href="#" class="read-more">Read More Link</a>
                    </div>
                </div>
            </section>

            <!-- Hero Links -->
            <section>
                <h2 id="hero">Hero Links</h2>
                <p>Consistent sizing and spacing for hero actions.</p>
                <div class="glass-section">
                    <div class="hero-links">
                        <a href="#" class="btn-primary">Our Work</a>
                        <a href="#" class="btn-ghost">About Us</a>
                        <a href="#" class="btn-ghost">Contact</a>
                    </div>
                </div>
            </section>

            <!-- Taxonomy Pills -->
            <section>
                <h2 id="pills">Taxonomy Pills</h2>
                <div class="glass-section">
                    <div class="entry-taxonomies">
                        <div class="taxonomy-group">
                            <a href="#" class="taxonomy-pill category-pill">
                                <i class="fas fa-folder"></i> Technology
                            </a>
                            <a href="#" class="taxonomy-pill category-pill">
                                <i class="fas fa-folder"></i> Web Development
                            </a>
                        </div>
                        <div class="taxonomy-group">
                            <a href="#" class="taxonomy-pill tag-pill">
                                <i class="fas fa-tag"></i> WordPress
                            </a>
                            <a href="#" class="taxonomy-pill tag-pill">
                                <i class="fas fa-tag"></i> PHP
                            </a>
                            <a href="#" class="taxonomy-pill tag-pill">
                                <i class="fas fa-tag"></i> CSS
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Form Elements -->
            <section>
                <h2 id="forms">Form Elements</h2>
                <div class="glass-section">
                    <div class="form-group">
                        <label for="text-input">Text Input</label>
                        <input type="text" id="text-input" placeholder="Enter text here...">
                    </div>

                    <div class="form-group">
                        <label for="email-input">Email Input</label>
                        <input type="email" id="email-input" placeholder="you@example.com">
                    </div>

                    <div class="form-group">
                        <label for="password-input">Password Input</label>
                        <input type="password" id="password-input" placeholder="Enter password">
                    </div>

                    <div class="form-group">
                        <label for="textarea">Textarea</label>
                        <textarea id="textarea" placeholder="Enter your message..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="select">Select Dropdown</label>
                        <select id="select">
                            <option value="">Choose an option...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Checkboxes</label>
                        <div class="checkbox-group">
                            <input type="checkbox" id="check1">
                            <label for="check1">Option 1</label>
                        </div>
                        <div class="checkbox-group">
                            <input type="checkbox" id="check2" checked>
                            <label for="check2">Option 2 (Pre-checked)</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Radio Buttons</label>
                        <div class="radio-group">
                            <input type="radio" id="radio1" name="radio-group" checked>
                            <label for="radio1">Option A (Selected)</label>
                        </div>
                        <div class="radio-group">
                            <input type="radio" id="radio2" name="radio-group">
                            <label for="radio2">Option B</label>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <button class="btn-primary">Submit Form</button>
                    </div>
                </div>
            </section>

            <!-- Core UI Elements -->
            <section>
                <h2 id="core-ui">Core UI Elements</h2>

                <!-- Tables -->
                <h3 id="tables">Tables</h3>
                <div class="glass-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Reign</td>
                                <td>Administrator</td>
                                <td>Active</td>
                            </tr>
                            <tr>
                                <td>Nemesis</td>
                                <td>System</td>
                                <td>Online</td>
                            </tr>
                            <tr>
                                <td>Guest</td>
                                <td>Visitor</td>
                                <td>Inactive</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Blockquotes -->
                <h3 id="blockquotes">Blockquotes</h3>
                <div class="glass-section">
                    <blockquote>
                        <p>Design is not just what it looks like and feels like. Design is how it works.</p>
                        <cite>Steve Jobs</cite>
                    </blockquote>

                    <figure class="wp-block-pullquote">
                        <blockquote>
                            <p>This is a pullquote that stands out from the content.</p>
                            <cite>NemesisNet Guide</cite>
                        </blockquote>
                    </figure>
                </div>

                <!-- Image Alignment -->
                <h3 id="alignment">Image Alignment</h3>
                <div class="glass-section">
                    <div style="overflow: hidden; margin-bottom: 20px;">
                        <img src="https://picsum.photos/seed/alignleft/300/200" alt="Left Aligned"
                            class="alignleft">
                        <p><strong>Left Aligned:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                            veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div style="overflow: hidden; margin-bottom: 20px;">
                        <img src="https://picsum.photos/seed/alignright/300/200" alt="Right Aligned"
                            class="alignright">
                        <p><strong>Right Aligned:</strong> Duis aute irure dolor in reprehenderit in voluptate
                            velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident,
                            sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <img src="https://picsum.photos/seed/aligncenter/600/300" alt="Center Aligned"
                            class="aligncenter">
                        <p style="text-align: center;"><strong>Center Aligned</strong></p>
                    </div>
                </div>

                <!-- Galleries -->
                <h3 id="galleries">Galleries</h3>
                <div class="glass-section">
                    <figure class="wp-block-gallery">
                        <figure class="blocks-gallery-item">
                            <img src="https://picsum.photos/seed/gal1/400/300" alt="Gallery Image 1">
                        </figure>
                        <figure class="blocks-gallery-item">
                            <img src="https://picsum.photos/seed/gal2/400/300" alt="Gallery Image 2">
                        </figure>
                        <figure class="blocks-gallery-item">
                            <img src="https://picsum.photos/seed/gal3/400/300" alt="Gallery Image 3">
                        </figure>
                    </figure>
                </div>

                <!-- Embedded Media -->
                <h3 id="media">Embedded Media</h3>
                <div class="glass-section">
                    <figure
                        class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
                        <div class="wp-block-embed__wrapper">
                            <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/dQw4w9WgXcQ"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </figure>
                </div>
            </section>

            <!-- Mobile Navigation Example -->
            <section>
                <h2 id="mobile-nav">Mobile Navigation</h2>
                <p>Mobile menu appears on screens smaller than 768px. Click the hamburger icon in the header to
                    test.
                </p>
            </section>

            <!-- Breadcrumbs -->
            <section>
                <h2 id="breadcrumbs">Breadcrumbs</h2>
                <div class="glass-section">
                    <nav class="breadcrumbs">
                        <div class="breadcrumb-item">
                            <a href="#"><i class="fas fa-home"></i> Home</a>
                        </div>
                        <span class="breadcrumb-separator">/</span>
                        <div class="breadcrumb-item">
                            <a href="#">Blog</a>
                        </div>
                        <span class="breadcrumb-separator">/</span>
                        <div class="breadcrumb-item active">
                            Current Page
                        </div>
                    </nav>
                </div>
            </section>

            <!-- Pagination -->
            <section>
                <h2 id="pagination">Pagination</h2>
                <div class="glass-section">
                    <nav class="pagination">
                        <a href="#" class="page-numbers"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="page-numbers">1</a>
                        <span class="page-numbers current">2</span>
                        <a href="#" class="page-numbers">3</a>
                        <span class="page-numbers dots">...</span>
                        <a href="#" class="page-numbers">10</a>
                        <a href="#" class="page-numbers"><i class="fas fa-chevron-right"></i></a>
                    </nav>
                </div>
            </section>

            <!-- Post Navigation -->
            <section>
                <h2 id="post-nav">Post Navigation</h2>
                <div class="glass-section">
                    <nav class="post-navigation">
                        <a href="#" class="nav-previous">
                            <span class="nav-label"><i class="fas fa-arrow-left"></i> Previous</span>
                            <span class="nav-title">Getting Started with WordPress</span>
                        </a>
                        <a href="#" class="nav-next">
                            <span class="nav-label">Next <i class="fas fa-arrow-right"></i></span>
                            <span class="nav-title">Advanced Theme Development</span>
                        </a>
                    </nav>
                </div>
            </section>

            <!-- Single Post Layout -->
            <section>
                <h2 id="single">Single Post Layout</h2>
                <div class="glass-section">
                    <header class="post-header">
                        <h1 class="post-title">Building a Modern WordPress Theme</h1>
                        <div class="post-meta">
                            <span class="post-meta-item"><i class="fas fa-calendar"></i> November 28,
                                2025</span>
                            <span class="post-meta-item"><i class="fas fa-user"></i> Reign</span>
                        </div>
                    </header>
                    <div class="featured-image">
                        <img src="https://picsum.photos/seed/nemesis-net/1080/400" alt="Featured Image">
                    </div>
                    <div class="post-content">
                        <p>This is an example of a single post layout. The content area uses larger font sizes
                            and
                            increased line height for better readability.</p>
                    </div>
                </div>
            </section>

            <!-- Cards -->
            <section>
                <h2 id="cards">Cards</h2>
                <div
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                    <article class="post">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="#">Standard Post Card</a></h2>
                            <div class="entry-meta">November 28, 2025 by Reign</div>
                        </header>
                        <div class="entry-content">
                            <p>This is a standard blog post card. It uses the default glassmorphic style defined
                                in the
                                theme.</p>
                        </div>
                        <footer class="entry-footer">
                            <a href="#" class="read-more">Read Article</a>
                        </footer>
                    </article>
                </div>
            </section>

            <!-- Alerts & Notices -->
            <section>
                <h2 id="alerts">Alerts & Notices</h2>
                <div class="glass-section">
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> Success: Your settings have been saved.
                    </div>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i> Error: Something went wrong.
                    </div>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i> Warning: Please check your input.
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Info: This is a helpful tip.
                    </div>
                </div>
            </section>

            <!-- Search Form -->
            <section>
                <h2 id="search">Search Form</h2>
                <div class="glass-section">
                    <form role="search" method="get" class="search-form" action="#">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                        </label>
                        <button type="submit" class="search-submit"><i class="fas fa-search"></i>
                            Search</button>
                    </form>
                </div>
            </section>

            <!-- Sidebar Widgets -->
            <section>
                <h2 id="widgets">Sidebar Widgets</h2>
                <div
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                    <!-- Recent Posts Widget -->
                    <div class="glass-card widget widget_recent_entries">
                        <h3 class="widget-title"
                            style="margin-top: 0; margin-bottom: 15px; font-size: 1.2rem; color: var(--accent-color);">
                            Recent Posts</h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li
                                style="margin-bottom: 10px; border-bottom: 1px solid var(--glass-border); padding-bottom: 10px;">
                                <a href="#">Building a Modern WordPress Theme</a>
                            </li>
                            <li
                                style="margin-bottom: 10px; border-bottom: 1px solid var(--glass-border); padding-bottom: 10px;">
                                <a href="#">Understanding CSS Grid</a>
                            </li>
                            <li style="margin-bottom: 0;">
                                <a href="#">The Future of Web Design</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Categories Widget -->
                    <div class="glass-card widget widget_categories">
                        <h3 class="widget-title"
                            style="margin-top: 0; margin-bottom: 15px; font-size: 1.2rem; color: var(--accent-color);">
                            Categories</h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li class="cat-item" style="margin-bottom: 8px;"><a href="#">Design</a> (5)</li>
                            <li class="cat-item" style="margin-bottom: 8px;"><a href="#">Development</a> (12)
                            </li>
                            <li class="cat-item"><a href="#">WordPress</a> (8)</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- 404 Page -->
            <section>
                <h2 id="404">404 Page Content</h2>
                <div class="glass-section" style="text-align: center; padding: 60px 20px;">
                    <h1 class="page-title" style="font-size: 4rem; margin-bottom: 20px;">404</h1>
                    <h2 style="margin-bottom: 20px;">Page Not Found</h2>
                    <p style="margin-bottom: 30px; font-size: 1.2rem; color: var(--text-muted);">It looks like
                        nothing
                        was found at this location. Maybe try a search?</p>

                    <div style="max-width: 500px; margin: 0 auto;">
                        <form role="search" method="get" class="search-form" action="#">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search …" value=""
                                    name="s">
                            </label>
                            <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <div style="margin-top: 40px;">
                        <a href="#" class="btn-primary">Return Home</a>
                    </div>
                </div>
            </section>

            <!-- Comments -->
            <section>
                <h2 id="comments">Comments</h2>
                <div class="glass-section">
                    <div class="comments-area">
                        <h3 class="comments-title">3 Comments</h3>
                        <ol class="comment-list">
                            <li class="comment">
                                <article class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="https://picsum.photos/seed/user1/64/64" alt="User Avatar"
                                                class="avatar">
                                            <b class="fn"><a href="#" rel="external nofollow"
                                                    class="url">NemesisUser</a></b>
                                            <span class="says">says:</span>
                                        </div>
                                        <div class="comment-metadata">
                                            <a href="#"><time datetime="2025-11-29T10:00:00+00:00">November 29,
                                                    2025 at 10:00 am</time></a>
                                        </div>
                                    </footer>
                                    <div class="comment-content">
                                        <p>This theme is looking absolutely fire! 🔥 The glassmorphism effect is
                                            spot on.</p>
                                    </div>
                                    <div class="reply">
                                        <a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
                                    </div>
                                </article>
                                <ol class="children">
                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/nemesis-logo.svg" alt="Admin Avatar"
                                                        class="avatar"
                                                        style="background: rgba(255,255,255,0.1);">
                                                    <b class="fn"><a href="#" rel="external nofollow"
                                                            class="url">Reign</a></b>
                                                    <span class="says">says:</span>
                                                </div>
                                                <div class="comment-metadata">
                                                    <a href="#"><time
                                                            datetime="2025-11-29T10:30:00+00:00">November 29,
                                                            2025 at 10:30 am</time></a>
                                                </div>
                                            </footer>
                                            <div class="comment-content">
                                                <p>Thanks! We're working hard to make it the best design system
                                                    for WordPress.</p>
                                            </div>
                                            <div class="reply">
                                                <a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
                                            </div>
                                        </article>
                                    </li>
                                </ol>
                            </li>
                            <li class="comment">
                                <article class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="https://picsum.photos/seed/user2/64/64" alt="User Avatar"
                                                class="avatar">
                                            <b class="fn"><a href="#" rel="external nofollow"
                                                    class="url">DevGuy</a></b>
                                            <span class="says">says:</span>
                                        </div>
                                        <div class="comment-metadata">
                                            <a href="#"><time datetime="2025-11-29T11:15:00+00:00">November 29,
                                                    2025 at 11:15 am</time></a>
                                        </div>
                                    </footer>
                                    <div class="comment-content">
                                        <p>Can't wait for the full release. Will it support WooCommerce?</p>
                                    </div>
                                    <div class="reply">
                                        <a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
                                    </div>
                                </article>
                            </li>
                        </ol>

                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a Reply</h3>
                            <form action="#" method="post" class="comment-form">
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea id="comment" name="comment" cols="45" rows="8"
                                        required="required"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="author">Name <span class="required">*</span></label>
                                    <input id="author" name="author" type="text" value="" size="30"
                                        required="required">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input id="email" name="email" type="email" value="" size="30"
                                        required="required">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-primary">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Carousel -->
            <section>
                <h2 id="carousel">Carousel</h2>
                <div class="glass-section">
                    <div class="carousel" id="demo-carousel">
                        <div class="carousel-track-container">
                            <ul class="carousel-track">
                                <li class="carousel-slide current-slide">
                                    <img src="https://picsum.photos/seed/slide1/800/400" alt="Slide 1">
                                    <div class="carousel-caption">
                                        <h3>First Slide</h3>
                                        <p>This is the first slide description.</p>
                                    </div>
                                </li>
                                <li class="carousel-slide">
                                    <img src="https://picsum.photos/seed/slide2/800/400" alt="Slide 2">
                                    <div class="carousel-caption">
                                        <h3>Second Slide</h3>
                                        <p>This is the second slide description.</p>
                                    </div>
                                </li>
                                <li class="carousel-slide">
                                    <img src="https://picsum.photos/seed/slide3/800/400" alt="Slide 3">
                                    <div class="carousel-caption">
                                        <h3>Third Slide</h3>
                                        <p>This is the third slide description.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <button class="carousel-button carousel-button--left is-hidden">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-button carousel-button--right">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <div class="carousel-nav">
                            <button class="carousel-indicator current-slide"></button>
                            <button class="carousel-indicator"></button>
                            <button class="carousel-indicator"></button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Component -->
            <section>
                <h2 id="stats">Stats</h2>
                <div class="glass-section">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <span class="stat-number">100+</span>
                            <span class="stat-label">Components</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">5k</span>
                            <span class="stat-label">Downloads</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">99%</span>
                            <span class="stat-label">Satisfaction</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Support</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Themes</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">10k+</span>
                            <span class="stat-label">Users</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Author Bio -->
            <section>
                <h2 id="author">Author Bio</h2>
                <div class="author-bio">
                    <div class="author-bio-avatar">
                        <img src="https://picsum.photos/seed/nemesis/200" alt="Nemesis">
                    </div>
                    <div class="author-bio-content">
                        <h3>About Nemesis</h3>
                        <p>Senior Full-Stack Engineer and Systems Architect. Specializing in high-performance
                            web applications, secure infrastructure, and AI integration. Building the future of
                            the web, one pixel at a time.</p>
                        <div class="author-links">
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Related Posts -->
            <section>
                <h2 id="related">Related Posts</h2>
                <div class="glass-section">
                    <div class="related-posts">
                        <h3 class="related-posts-title">You Might Also Like</h3>
                        <div class="related-posts-grid">
                            <div class="related-card">
                                <img src="https://picsum.photos/seed/rel1/400/250" alt="Related 1"
                                    class="related-card-img">
                                <div class="related-card-content">
                                    <h4 class="related-card-title"><a href="#">Advanced CSS Grid Layouts</a>
                                    </h4>
                                    <span class="related-card-date">Nov 25, 2025</span>
                                </div>
                            </div>
                            <div class="related-card">
                                <img src="https://picsum.photos/seed/rel2/400/250" alt="Related 2"
                                    class="related-card-img">
                                <div class="related-card-content">
                                    <h4 class="related-card-title"><a href="#">Mastering Dark Mode</a></h4>
                                    <span class="related-card-date">Nov 20, 2025</span>
                                </div>
                            </div>
                            <div class="related-card">
                                <img src="https://picsum.photos/seed/rel3/400/250" alt="Related 3"
                                    class="related-card-img">
                                <div class="related-card-content">
                                    <h4 class="related-card-title"><a href="#">WordPress Performance Tips</a>
                                    </h4>
                                    <span class="related-card-date">Nov 15, 2025</span>
                                </div>
                            </div>
                            <div class="related-card">
                                <img src="https://picsum.photos/seed/rel4/400/250" alt="Related 4"
                                    class="related-card-img">
                                <div class="related-card-content">
                                    <h4 class="related-card-title"><a href="#">Building Accessible Themes</a>
                                    </h4>
                                    <span class="related-card-date">Nov 10, 2025</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Component -->
            <section>
                <h2 id="features">Features</h2>
                <div class="glass-section">
                    <div class="features-grid">
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                            <h3 class="feature-title">Lightning Fast</h3>
                            <p class="feature-desc">Optimized for speed with minimal bloat and efficient code
                                structure.</p>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                            <h3 class="feature-title">Secure by Default</h3>
                            <p class="feature-desc">Built with security best practices to keep your data safe.
                            </p>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-mobile-alt"></i></div>
                            <h3 class="feature-title">Fully Responsive</h3>
                            <p class="feature-desc">Looks amazing on all devices, from mobile phones to 4K
                                desktops.</p>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-code"></i></div>
                            <h3 class="feature-title">Developer Friendly</h3>
                            <p class="feature-desc">Clean code, extensive documentation, and modern development workflows.</p>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<?php get_footer(); ?>
