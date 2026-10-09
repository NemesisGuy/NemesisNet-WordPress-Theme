<?php
/**
 * Gutenberg block patterns and supports for NemesisNet.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register pattern categories and starter patterns.
 */
function nemesisnet_register_block_patterns() {
    register_block_pattern_category(
        'nemesisnet',
        array( 'label' => __( 'NemesisNet', 'nemesisnet' ) )
    );

    register_block_pattern(
        'nemesisnet/image-card',
        array(
            'title'      => __( 'Image Card (Centered)', 'nemesisnet' ),
            'categories' => array( 'nemesisnet' ),
            'content'    => '<div class="wp-block-group glass-section" style="padding:20px;border-radius:12px"><div class="image-card"><img src="https://placehold.co/800x450" alt="Placeholder" /></div><p class="has-text-align-center" style="margin-top:12px">Add a short caption here.</p></div>',
            'description'=> __( 'A centered image card with glass styling and caption.', 'nemesisnet' ),
        )
    );

    register_block_pattern(
        'nemesisnet/hero-gradient',
        array(
            'title'       => __( 'Hero Gradient', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Hero with headline, subhead, and dual CTAs on a gradient/glass surface.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group" style="padding:48px;border-radius:20px;background:linear-gradient(135deg,var(--nemesis-blue) 0%,var(--aurora-base) 100%);color:#0a0e27"><h1 style="margin-bottom:12px">Build with NemesisNet</h1><p style="margin-bottom:24px;max-width:720px">Ship production-grade experiences with the NemesisNet design system. Fast defaults, glass surfaces, and Aurora accents.</p><div class="wp-block-buttons"><div class="wp-block-button"><a class="wp-block-button__link has-text-color" style="color:#0a0e27;background:#f4f4f4;border-radius:12px;padding:12px 24px">Get Started</a></div><div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:12px;padding:12px 24px;border:1px solid rgba(255,255,255,0.6);color:#0a0e27">View Docs</a></div></div></div>',
        )
    );

    register_block_pattern(
        'nemesisnet/project-card',
        array(
            'title'       => __( 'Project Card', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Glass project card with title, summary, and links.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group glass-card" style="padding:20px;border-radius:12px"><div class="wp-block-group" style="display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:12px"><h3 style="margin:0">Project Name</h3><span class="wp-block-badge" style="background:rgba(255,255,255,0.08);padding:6px 10px;border-radius:999px;font-size:12px">Status</span></div><p style="margin:0 0 16px 0">Concise summary of what this project delivers and why it matters.</p><div class="wp-block-buttons" style="gap:12px"><div class="wp-block-button"><a class="wp-block-button__link" style="border-radius:12px;padding:10px 18px;background:linear-gradient(90deg,var(--nemesis-blue) 0%,var(--aurora-base) 100%);color:#0a0e27">View Details</a></div><div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:12px;padding:10px 18px;border:1px solid var(--glass-border);color:var(--text-color)">Source</a></div></div></div>',
        )
    );

    register_block_pattern(
        'nemesisnet/post-funnel',
        array(
            'title'       => __( 'Post Funnel (CTA + Related Reading)', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Green CTA card with aurora/ghost buttons followed by a Related Reading list.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group post-cta"><h2>Ready to go further?</h2><p>Short pitch for the next step — one sentence on what the reader gets.</p><div class="post-cta__buttons"><div class="wp-block-buttons"><div class="wp-block-button"><a class="wp-block-button__link btn-aurora">Get Started</a></div><div class="wp-block-button is-style-outline"><a class="wp-block-button__link btn-ghost">Learn More</a></div></div></div></div><div class="wp-block-group related-reading"><h2>Related Reading</h2><ul><li><a href="#">First related post</a></li><li><a href="#">Second related post</a></li><li><a href="#">Third related post</a></li></ul></div>',
        )
    );

    register_block_pattern(
        'nemesisnet/tldr-box',
        array(
            'title'       => __( 'TL;DR Box', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Blue callout with bolt heading and bullet list.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group tldr-box"><h3>⚡ TL;DR</h3><ul><li>Key takeaway one.</li><li>Key takeaway two.</li><li>Key takeaway three.</li></ul></div>',
        )
    );

    register_block_pattern(
        'nemesisnet/learn-grid',
        array(
            'title'       => __( 'Learn Grid (What You Will Learn)', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Three-column icon feature grid.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group"><h2>What You Will Learn</h2><div class="wp-block-group features-list"><div class="wp-block-group feature-list-item"><div class="feature-list-icon">📘</div><div class="feature-list-content"><h3 class="feature-list-title">Concept one</h3><p class="feature-list-description">One-line explanation.</p></div></div><div class="wp-block-group feature-list-item"><div class="feature-list-icon">🛠️</div><div class="feature-list-content"><h3 class="feature-list-title">Concept two</h3><p class="feature-list-description">One-line explanation.</p></div></div><div class="wp-block-group feature-list-item"><div class="feature-list-icon">🚀</div><div class="feature-list-content"><h3 class="feature-list-title">Concept three</h3><p class="feature-list-description">One-line explanation.</p></div></div></div></div>',
        )
    );

    register_block_pattern(
        'nemesisnet/context-line',
        array(
            'title'       => __( 'Context Line', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Muted early cross-link paragraph.', 'nemesisnet' ),
            'content'     => '<p class="context-line">New here? Start with <a href="#">the background guide</a> — this post builds on it.</p>',
        )
    );

    register_block_pattern(
        'nemesisnet/lesson-card',
        array(
            'title'       => __( 'Lesson Card', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Icon-headed callout for war stories and lessons inside sections.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group lesson-card"><h3>💡 Lesson learned</h3><p>Write the war story or hard-won insight here — two or three sentences.</p></div>',
        )
    );

    register_block_pattern(
        'nemesisnet/code-explain',
        array(
            'title'       => __( 'Code Explainer Box', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Dark code-adjacent explainer box.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group code-explain">Line-by-line: what the snippet above does and why each part matters.</div>',
        )
    );

    register_block_pattern(
        'nemesisnet/tech-stack',
        array(
            'title'       => __( 'Tech Stack Pills', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Wrapping row of technology pills for the post meta area.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group tech-stack"><span class="tech-pill">Spring Boot 3</span><span class="tech-pill">PostgreSQL</span><span class="tech-pill">Hibernate</span><span class="tech-pill">OAuth2</span><span class="tech-pill">Redis</span></div>',
        )
    );

    register_block_pattern(
        'nemesisnet/learn-grid-centered',
        array(
            'title'       => __( 'Learn Grid (Centered Cards)', 'nemesisnet' ),
            'categories'  => array( 'nemesisnet' ),
            'description' => __( 'Centered icon-on-top cards, matching the theme demo Features section.', 'nemesisnet' ),
            'content'     => '<div class="wp-block-group"><h3>What You Will Learn</h3><div class="wp-block-group features-grid"><div class="wp-block-group feature-item"><div class="feature-icon">📘</div><h4 class="feature-title">Concept one</h4><p class="feature-description">One-line explanation.</p></div><div class="wp-block-group feature-item"><div class="feature-icon">🛠️</div><h4 class="feature-title">Concept two</h4><p class="feature-description">One-line explanation.</p></div><div class="wp-block-group feature-item"><div class="feature-icon">🚀</div><h4 class="feature-title">Concept three</h4><p class="feature-description">One-line explanation.</p></div></div></div>',
        )
    );
}
add_action( 'init', 'nemesisnet_register_block_patterns' );
