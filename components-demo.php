<?php
/**
 * Components Reference File
 *
 * This file contains all reusable components in one place, with inline examples and usage instructions.
 * Use this as a single source of truth for understanding and using the theme's components.
 */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Components</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <h1>NemesisNet Theme: All Components</h1>

    <!-- Glassmorphic Card -->
    <section>
        <h2>Glassmorphic Card</h2>
        <div class="glass-card">
            <h3 class="card-title">Card Title</h3>
            <p class="card-content">This is a sample card content. Replace this with dynamic content as needed.</p>
        </div>
    </section>

    <!-- Primary CTA Button -->
    <section>
        <h2>Primary CTA Button</h2>
        <button class="btn-primary">Click Me</button>
    </section>

    <!-- Ghost Button -->
    <section>
        <h2>Ghost Button</h2>
        <button class="btn-ghost">Click Me</button>
    </section>
    
    <!-- Aurora Button -->
    <section>
        <h2>Aurora Button</h2>
        <?php include 'components/button-aurora.php'; ?>
    </section>

    <!-- Hero Links -->
    <section>
        <h2>Hero Links</h2>
        <div class="hero-links">
            <a href="#" class="hero-link">Our Work</a>
            <a href="#" class="hero-link">About Us</a>
            <a href="mailto:hello@nemesisnet.co.za" class="hero-link">Contact</a>
        </div>
    </section>

    <!-- Pills & Tags -->
    <section>
        <h2>Pills & Tags</h2>
        <div class="pills">
            <span class="pill">AI Systems</span>
            <span class="pill">Docker</span>
            <span class="pill">DevOps</span>
        </div>
    </section>

    <!-- Avatar -->
    <section>
        <h2>Avatar / Mark</h2>
        <?php include 'components/avatar.php'; ?>
    </section>

    <!-- Theme Toggle -->
    <section>
        <h2>Theme Toggle</h2>
        <button class="theme-toggle" id="theme-toggle-demo" aria-label="Toggle Dark Mode">
            <i class="fa-solid fa-moon" id="theme-toggle-icon-demo"></i>
        </button>
    </section>

    <!-- Mobile Menu Toggle -->
    <section>
        <h2>Mobile Menu Toggle</h2>
        <button class="mobile-menu-toggle" id="menu-toggle-demo" aria-label="Toggle Menu" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
    </section>

    <!-- Post Card -->
    <section>
        <h2>Post Card</h2>
        <article class="post">
            <header class="entry-header">
                <h2 class="entry-title"><a href="#">Post Title</a></h2>
                <div class="entry-meta">
                    November 28, 2025 by Admin
                </div>

            </header>
            <div class="post-thumbnail">
                <a href="#">
                    <img src="https://picsum.photos/seed/nemesis-demo/600/250" alt="Placeholder image">
                </a>
            </div>
            <div class="entry-content">
                <p>This is a sample post excerpt to demonstrate the card component styling and layout.</p>
            </div>
            <footer class="entry-footer">
                <a href="#" class="read-more">Read More</a>
            </footer>
        </article>
    </section>

    <!-- Code Block -->
    <section>
        <h2>Code Block</h2>
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

    <!-- Breadcrumbs -->
    <section>
        <h2>Breadcrumbs</h2>
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
    </section>

    <!-- Pagination -->
    <section>
        <h2>Pagination</h2>
        <nav class="pagination">
            <a href="#" class="page-numbers"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="page-numbers">1</a>
            <span class="page-numbers current">2</span>
            <a href="#" class="page-numbers">3</a>
            <span class="page-numbers dots">...</span>
            <a href="#" class="page-numbers">10</a>
            <a href="#" class="page-numbers"><i class="fas fa-chevron-right"></i></a>
        </nav>
    </section>

    <!-- Post Navigation -->
    <section>
        <h2>Post Navigation</h2>
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
    </section>

    <!-- Single Post Layout -->
    <section>
        <h2>Single Post Layout</h2>
        <div class="glass-section">
            <header class="post-header">
                <h1 class="post-title">Building a Modern WordPress Theme</h1>
                <div class="post-meta">
                    <span class="post-meta-item"><i class="fas fa-calendar"></i> November 28, 2025</span>
                    <span class="post-meta-item"><i class="fas fa-user"></i> Reign</span>
                </div>
            </header>
            <div class="featured-image">
                <img src="https://picsum.photos/seed/nemesis-net-demo/1080/400" alt="Featured Image">
            </div>
            <div class="post-content">
                <p>This is an example of a single post layout.</p>
            </div>
        </div>
    </section>

    <!-- Cards -->
    <section>
        <h2>Cards</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <article class="post">
                <header class="entry-header">
                    <h2 class="entry-title"><a href="#">Standard Post Card</a></h2>
                    <div class="entry-meta">November 28, 2025 by Reign</div>
                </header>
                <div class="entry-content">
                    <p>This is a standard blog post card.</p>
                </div>
                <footer class="entry-footer">
                    <a href="#" class="read-more">Read Article</a>
                </footer>
            </article>
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

    <!-- Footer -->
    <section>
        <h2>Footer</h2>
        <?php include 'components/footer.php'; ?>
    </section>
</body>
</html>