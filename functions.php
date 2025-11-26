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

		// This theme uses wp_nav_menu() in one location.
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
	}
endif;
add_action( 'after_setup_theme', 'nemesisnet_setup' );

/**
 * Enqueue scripts and styles.
 */
function nemesisnet_scripts() {
	wp_enqueue_style( 'nemesisnet-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    
    // Enqueue Google Fonts (Inter)
    wp_enqueue_style( 'nemesisnet-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null );

    // Enqueue FontAwesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
}
add_action( 'wp_enqueue_scripts', 'nemesisnet_scripts' );

/**
 * Add Umami Analytics Settings Page
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
add_action('admin_menu', 'nemesisnet_analytics_menu');

/**
 * Render Analytics Settings Page
 */
function nemesisnet_analytics_page() {
    if (isset($_POST['nemesisnet_save_analytics'])) {
        check_admin_referer('nemesisnet_analytics_settings');
        
        // Allow script tags with specific attributes
        $allowed_tags = array(
            'script' => array(
                'async' => array(),
                'defer' => array(),
                'src' => array(),
                'data-website-id' => array(),
            ),
        );
        
        $umami_code = wp_kses($_POST['nemesisnet_umami_code'], $allowed_tags);
        update_option('nemesisnet_umami_code', $umami_code);
        echo '<div class="notice notice-success"><p>Analytics settings saved!</p></div>';
    }
    
    $umami_code = get_option('nemesisnet_umami_code', '');
    ?>
    <div class="wrap">
        <h1>Umami Analytics Settings</h1>
        <p>Paste your complete Umami analytics script tag below (the entire <code>&lt;script&gt;</code> tag from your Umami dashboard).</p>
        
        <form method="post" action="">
            <?php wp_nonce_field('nemesisnet_analytics_settings'); ?>
            
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="nemesisnet_umami_code">Umami Tracking Code</label>
                    </th>
                    <td>
                        <textarea 
                            name="nemesisnet_umami_code" 
                            id="nemesisnet_umami_code" 
                            rows="5" 
                            class="large-text code"
                            placeholder='<script async defer data-website-id="your-id" src="https://analytics.yourdomain.com/script.js"></script>'
                        ><?php echo esc_textarea($umami_code); ?></textarea>
                        <p class="description">
                            Paste the complete script tag from your Umami dashboard. Example:<br>
                            <code>&lt;script async defer data-website-id="12345678-1234-1234-1234-123456789012" src="https://analytics.yourdomain.com/script.js"&gt;&lt;/script&gt;</code>
                        </p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button('Save Analytics Settings', 'primary', 'nemesisnet_save_analytics'); ?>
        </form>
    </div>
    <?php
}

/**
 * Output Umami Analytics Code
 */
function nemesisnet_output_analytics() {
    $umami_code = get_option('nemesisnet_umami_code', '');
    if (!empty($umami_code)) {
        echo $umami_code . "\n";
    }
}
add_action('wp_head', 'nemesisnet_output_analytics');
