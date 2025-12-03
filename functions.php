<?php
/**
 * NemesisNet Theme functions and definitions
 */

if ( ! function_exists( 'nemesisnet_setup' ) ) :
    function nemesisnet_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Add custom image size for cards.
        add_image_size( 'nemesis-card', 600, 350, true );

        // Register navigation menu.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'nemesisnet' ),
        ) );

        // Add theme support for custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 44,
            'width'       => 44,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );
        add_editor_style( 'assets/css/editor-style.css' );

        // Register sidebar.
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'nemesisnet' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'nemesisnet' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s glass-card">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'nemesisnet_setup' );

/**
 * Enqueue scripts and styles.
 */
function nemesisnet_scripts() {
    // Theme stylesheet.
    wp_enqueue_style( 'nemesisnet-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

    // Google Fonts (Inter).
    wp_enqueue_style( 'nemesisnet-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null );

    // Font Awesome.
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    // Prism.js CSS.
    wp_enqueue_style( 'prismjs-style', 'https://cdn.jsdelivr.net/npm/prismjs/themes/prism.min.css', array(), '1.29.0' );

    // Theme JavaScript.
    wp_enqueue_script( 'nemesisnet-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), wp_get_theme()->get( 'Version' ), true );

    // Prism.js core.
    wp_enqueue_script( 'prismjs-core', 'https://cdn.jsdelivr.net/npm/prismjs/prism.min.js', array(), '1.29.0', true );

    // Prism.js autoloader.
    wp_enqueue_script( 'prismjs-autoloader', 'https://cdn.jsdelivr.net/npm/prismjs/plugins/autoloader/prism-autoloader.min.js', array( 'prismjs-core' ), '1.29.0', true );
}
add_action( 'wp_enqueue_scripts', 'nemesisnet_scripts' );

/**
 * Add Umami Analytics Settings Page.
 */
function nemesisnet_analytics_menu() {
    add_theme_page(
        'Umami Analytics Settings',
        'Analytics',
        'manage_options',
        'nemesisnet-analytics',
        'nemesisnet_analytics_page'
    );
}
add_action( 'admin_menu', 'nemesisnet_analytics_menu' );

/**
 * Render Analytics Settings Page.
 */
function nemesisnet_analytics_page() {
    if ( isset( $_POST['nemesisnet_save_analytics'] ) ) {
        check_admin_referer( 'nemesisnet_analytics_settings' );
        // Allow script tags with specific attributes.
        $allowed_tags = array(
            'script' => array(
                'async'          => true,
                'defer'          => true,
                'src'            => true,
                'data-website-id'=> true,
            ),
        );
        $umami_code = '';
        if ( isset( $_POST['nemesisnet_umami_code'] ) ) {
            $umami_code = wp_kses( $_POST['nemesisnet_umami_code'], $allowed_tags );
        }
        update_option( 'nemesisnet_umami_code', $umami_code );
        echo '<div class="notice notice-success"><p>Analytics settings saved!</p></div>';
    }
    $umami_code = get_option( 'nemesisnet_umami_code', '' );
    ?>
    <div class="wrap">
        <h1>Umami Analytics Settings</h1>
        <p>Paste your complete Umami analytics script tag below (the entire <code>&lt;script&gt;</code> tag from your Umami dashboard).</p>
        <form method="post" action="">
            <?php wp_nonce_field( 'nemesisnet_analytics_settings' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="nemesisnet_umami_code">Umami Tracking Code</label></th>
                    <td>
                        <textarea name="nemesisnet_umami_code" id="nemesisnet_umami_code" rows="5" class="large-text code" placeholder='<script async defer data-website-id="your-id" src="https://analytics.yourdomain.com/script.js"></script>'><?php echo esc_textarea( $umami_code ); ?></textarea>
                        <p class="description">Paste the complete script tag from your Umami dashboard. Example:<br><code>&lt;script async defer data-website-id="12345678-1234-1234-1234-123456789012" src="https://analytics.yourdomain.com/script.js&quot;&gt;&lt;/script&gt;</code></p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Save Analytics Settings', 'primary', 'nemesisnet_save_analytics' ); ?>
        </form>
    </div>
    <?php
}

/**
 * Output Umami Analytics Code.
 */
function nemesisnet_output_analytics() {
    $umami_code = get_option( 'nemesisnet_umami_code', '' );
    if ( ! empty( $umami_code ) ) {
        echo $umami_code . "\n";
    }
}
add_action( 'wp_head', 'nemesisnet_output_analytics' );

/**
 * Customizer settings.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Output Theme Options as CSS variables and set initial theme mode.
 */
function nemesisnet_output_theme_options_css() {
    // Use get_theme_mod for Customizer settings, falling back to get_option for migration/defaults
    $accent_color = get_theme_mod( 'nemesisnet_accent_color', get_option( 'nemesisnet_accent_color', '#1E88E5' ) );
    $glass_blur   = get_theme_mod( 'nemesisnet_glass_blur', get_option( 'nemesisnet_glass_blur', 12 ) );
    $border_radius= get_theme_mod( 'nemesisnet_border_radius', get_option( 'nemesisnet_border_radius', 12 ) );
    
    echo '<style type="text/css">';
    echo ':root {';
    echo '--theme-accent-color: ' . esc_attr( $accent_color ) . ';';
    echo '--theme-glass-blur: ' . absint( $glass_blur ) . 'px;';
    echo '--theme-border-radius: ' . absint( $border_radius ) . 'px;';
    echo '}';
    // Apply border radius to various elements.
    echo '.custom-logo-link, .mobile-menu-toggle, .mobile-nav-close, .theme-toggle, .btn-primary, .btn-ghost, .btn-aurora, .read-more, input[type="text"], input[type="email"], input[type="password"], input[type="search"], input[type="url"], input[type="tel"], input[type="number"], textarea, select, .alert, .post, .project-card, .glass-card, .color-card, .author-bio, .related-post-card, .feature-item, .feature-list-item, .feature-list-icon, .stat-item, table, .wp-block-embed iframe, .wp-block-embed video, .wp-block-embed audio, .wp-block-cover, .wp-block-image img, .carousel, .carousel-slide { border-radius: var(--theme-border-radius); }';
    // Glass blur for backdrop-filter.
    echo '.site-header, .glass-section, .glass-card, .post, .project-card, .author-bio, .related-post-card, .feature-item, .feature-list-item, .stat-item, .wp-block-cover.has-background-dim::before, .mobile-nav-overlay { backdrop-filter: blur(var(--theme-glass-blur)); -webkit-backdrop-filter: blur(var(--theme-glass-blur)); }';
    
    // Sticky Header Logic
    if ( get_theme_mod( 'nemesisnet_sticky_header', false ) ) {
        echo '.site-header { position: sticky; top: 0; z-index: 1000; }';
    }
    
    echo '</style>';
}
add_action( 'wp_head', 'nemesisnet_output_theme_options_css' );

/**
 * Set initial data-theme attribute on <html> based on default theme mode option.
 */
function nemesisnet_set_initial_data_theme( $output ) {
    $default_theme_mode = get_theme_mod( 'nemesisnet_default_theme_mode', get_option( 'nemesisnet_default_theme_mode', 'system' ) );
    if ( $default_theme_mode === 'light' ) {
        $output .= ' data-theme="light"';
    }
    return $output;
}
add_filter( 'language_attributes', 'nemesisnet_set_initial_data_theme' );

/**
 * Custom comment walker for styled comment list.
 */
if ( ! class_exists( 'NemesisNet_Comment_Walker' ) ) :
    class NemesisNet_Comment_Walker extends Walker_Comment {
        protected function html5_comment( $comment, $depth, $args ) {
            $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
            ?>
            <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?> >
                <article id="div-comment-<?php comment_ID(); ?>" class="comment-body glass-card">
                    <footer class="comment-meta">
                        <div class="comment-author vcard">
                            <?php
                            if ( 0 != $args['avatar_size'] ) {
                                echo get_avatar( $comment, $args['avatar_size'] );
                            }
                            $comment_author = get_comment_author_link( $comment );
                            echo sprintf( esc_html__( '%s', 'nemesisnet' ), $comment_author );
                            ?>
                        </div>
                        <div class="comment-metadata">
                            <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                                <time datetime="<?php comment_time( 'c' ); ?>">
                                    <?php printf( esc_html__( '%1$s at %2$s', 'nemesisnet' ), get_comment_date( '', $comment ), get_comment_time() ); ?>
                                </time>
                            </a>
                            <?php edit_comment_link( esc_html__( 'Edit', 'nemesisnet' ), '<span class="edit-link">', '</span>' ); ?>
                        </div>
                    </footer>
                    <div class="comment-content">
                        <?php comment_text(); ?>
                    </div>
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'nemesisnet' ); ?></p>
                    <?php endif; ?>
                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<div class="reply">',
                        'after'     => '</div>',
                    ) ) );
                    ?>
                </article>
            </<?php echo $tag; ?>>
            <?php
        }
    }
endif;


/**
 * Add sidebar position class to body.
 */
function nemesisnet_sidebar_body_class( $classes ) {
    $sidebar_position = get_theme_mod( 'nemesisnet_sidebar_position', get_option( 'nemesisnet_sidebar_position', 'right' ) );
    
    // Only apply global sidebar position to the main blog feed/archive/search
    // since individual pages/posts now default to full-width or use explicit templates.
    if ( is_home() || is_archive() || is_search() ) {
        if ( 'left' === $sidebar_position ) {
            $classes[] = 'has-sidebar-left';
        }
    }
    
    return $classes;
}
add_filter( 'body_class', 'nemesisnet_sidebar_body_class' );

/**
 * Calculate Reading Time
 */
function nemesisnet_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 ); // Average reading speed: 200 words/min
    
    if ( $reading_time < 1 ) {
        return '1 min read';
    } else {
        return $reading_time . ' min read';
    }
}
