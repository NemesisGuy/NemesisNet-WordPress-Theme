<?php
/**
 * NemesisNet llms.txt generator and settings.
 *
 * WordPress has no core llms.txt support, so the theme serves a virtual
 * `/llms.txt` file (Markdown, per the llmstxt.org proposal) generated from
 * site identity + published content. Configure at
 * Appearance → Themes → "LLM / llms.txt" (theme page).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Default settings.
 */
function nemesisnet_llms_defaults() {
    return array(
        'enabled'       => 1,
        'summary'       => '',
        'max_posts'     => 30,
        'include_pages' => 1,
        'extra'         => '',
    );
}

/**
 * Get one setting with default fallback.
 */
function nemesisnet_llms_get( $key ) {
    $options  = get_option( 'nemesisnet_llms', array() );
    $defaults = nemesisnet_llms_defaults();
    return isset( $options[ $key ] ) ? $options[ $key ] : $defaults[ $key ];
}

/**
 * Register the settings page (mirrors the Analytics page pattern).
 */
function nemesisnet_llms_menu() {
    add_theme_page(
        'LLM Settings',
        'LLM / llms.txt',
        'manage_options',
        'nemesisnet-llms',
        'nemesisnet_llms_page'
    );
}
add_action( 'admin_menu', 'nemesisnet_llms_menu' );

/**
 * Render the settings page.
 */
function nemesisnet_llms_page() {
    if ( isset( $_POST['nemesisnet_save_llms'] ) ) {
        check_admin_referer( 'nemesisnet_llms_settings' );
        $options = array(
            'enabled'       => ! empty( $_POST['nemesisnet_llms_enabled'] ) ? 1 : 0,
            'summary'       => isset( $_POST['nemesisnet_llms_summary'] ) ? sanitize_textarea_field( wp_unslash( $_POST['nemesisnet_llms_summary'] ) ) : '',
            'max_posts'     => isset( $_POST['nemesisnet_llms_max_posts'] ) ? absint( $_POST['nemesisnet_llms_max_posts'] ) : 30,
            'include_pages' => ! empty( $_POST['nemesisnet_llms_include_pages'] ) ? 1 : 0,
            'extra'         => isset( $_POST['nemesisnet_llms_extra'] ) ? sanitize_textarea_field( wp_unslash( $_POST['nemesisnet_llms_extra'] ) ) : '',
        );
        update_option( 'nemesisnet_llms', $options );
        delete_transient( 'nemesisnet_llms_txt' );
        flush_rewrite_rules();
        echo '<div class="notice notice-success"><p>LLM settings saved!</p></div>';
    }
    $enabled       = nemesisnet_llms_get( 'enabled' );
    $summary       = nemesisnet_llms_get( 'summary' );
    $max_posts     = nemesisnet_llms_get( 'max_posts' );
    $include_pages = nemesisnet_llms_get( 'include_pages' );
    $extra         = nemesisnet_llms_get( 'extra' );
    $llms_url      = esc_url( home_url( '/llms.txt' ) );
    ?>
    <div class="wrap">
        <h1>LLM / llms.txt Settings</h1>
        <p>The theme serves a virtual <code>llms.txt</code> file (Markdown summary of your site for AI crawlers and agents) at
            <a href="<?php echo $llms_url; ?>" target="_blank" rel="noopener"><?php echo $llms_url; ?></a>.
            WordPress has no built-in llms.txt support, so this replaces the need for a plugin.</p>
        <form method="post" action="">
            <?php wp_nonce_field( 'nemesisnet_llms_settings' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Enable llms.txt</th>
                    <td>
                        <label><input type="checkbox" name="nemesisnet_llms_enabled" value="1" <?php checked( $enabled, 1 ); ?> /> Serve <code>/llms.txt</code> (unticked returns 404)</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="nemesisnet_llms_summary">Site Summary</label></th>
                    <td>
                        <textarea name="nemesisnet_llms_summary" id="nemesisnet_llms_summary" rows="3" class="large-text" placeholder="Left empty, your tagline is used."><?php echo esc_textarea( $summary ); ?></textarea>
                        <p class="description">One or two sentences describing the site. Shown as the blockquote under the title.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="nemesisnet_llms_max_posts">Max Posts Listed</label></th>
                    <td>
                        <input type="number" name="nemesisnet_llms_max_posts" id="nemesisnet_llms_max_posts" value="<?php echo absint( $max_posts ); ?>" min="1" max="200" class="small-text" />
                        <p class="description">Most recent published posts included, newest first.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Pages</th>
                    <td>
                        <label><input type="checkbox" name="nemesisnet_llms_include_pages" value="1" <?php checked( $include_pages, 1 ); ?> /> Include published pages</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="nemesisnet_llms_extra">Extra Markdown</label></th>
                    <td>
                        <textarea name="nemesisnet_llms_extra" id="nemesisnet_llms_extra" rows="6" class="large-text code" placeholder="## Contact&#10;- [Email](mailto:you@example.com)"><?php echo esc_textarea( $extra ); ?></textarea>
                        <p class="description">Appended verbatim under an <code>## Optional</code> heading. Plain Markdown only.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Save LLM Settings', 'primary', 'nemesisnet_save_llms' ); ?>
        </form>
    </div>
    <?php
}

/**
 * Rewrite rule for the virtual file. Flushed on theme switch and on save.
 */
function nemesisnet_llms_rewrites() {
    add_rewrite_rule( '^llms\.txt$', 'index.php?nemesis_llms=1', 'top' );
}
add_action( 'init', 'nemesisnet_llms_rewrites' );

function nemesisnet_llms_query_vars( $vars ) {
    $vars[] = 'nemesis_llms';
    return $vars;
}
add_filter( 'query_vars', 'nemesisnet_llms_query_vars' );

function nemesisnet_llms_flush_on_switch() {
    nemesisnet_llms_rewrites();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'nemesisnet_llms_flush_on_switch' );

/**
 * Serve the file.
 */
function nemesisnet_llms_serve() {
    if ( ! get_query_var( 'nemesis_llms' ) ) {
        return;
    }
    if ( ! nemesisnet_llms_get( 'enabled' ) ) {
        status_header( 404 );
        exit;
    }
    $body = get_transient( 'nemesisnet_llms_txt' );
    if ( false === $body ) {
        $body = nemesisnet_llms_build();
        set_transient( 'nemesisnet_llms_txt', $body, 12 * HOUR_IN_SECONDS );
    }
    header( 'Content-Type: text/markdown; charset=' . get_bloginfo( 'charset' ) );
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- intentionally raw Markdown.
    echo $body;
    exit;
}
add_action( 'template_redirect', 'nemesisnet_llms_serve' );

/**
 * Rebuild cache when content changes.
 */
function nemesisnet_llms_bust_cache() {
    delete_transient( 'nemesisnet_llms_txt' );
}
add_action( 'save_post', 'nemesisnet_llms_bust_cache' );

/**
 * One Markdown link line, with bracket-breaking titles neutralized.
 */
function nemesisnet_llms_md_link( $title, $url, $desc = '' ) {
    $title = trim( preg_replace( '/[\[\]]/', '', wp_strip_all_tags( (string) $title ) ) );
    if ( '' === $title ) {
        $title = '(untitled)';
    }
    $line = '- [' . $title . '](' . esc_url_raw( $url ) . ')';
    $desc = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( (string) $desc ) ) );
    if ( '' !== $desc ) {
        if ( function_exists( 'mb_substr' ) ) {
            $desc = mb_substr( $desc, 0, 180 );
        } else {
            $desc = substr( $desc, 0, 180 );
        }
        $line .= ': ' . $desc;
    }
    return $line;
}

/**
 * Build the file body.
 */
function nemesisnet_llms_build() {
    $lines   = array( '# ' . get_bloginfo( 'name' ) );
    $summary = trim( (string) nemesisnet_llms_get( 'summary' ) );
    if ( '' === $summary ) {
        $summary = trim( (string) get_bloginfo( 'description' ) );
    }
    if ( '' !== $summary ) {
        $lines[] = '> ' . $summary;
    }
    $lines[] = '';

    $max   = max( 1, absint( nemesisnet_llms_get( 'max_posts' ) ) );
    $posts = get_posts( array(
        'post_type'   => 'post',
        'post_status' => 'publish',
        'numberposts' => $max,
        'orderby'     => 'date',
        'order'       => 'DESC',
    ) );
    if ( ! empty( $posts ) ) {
        $lines[] = '## Posts';
        foreach ( $posts as $post ) {
            $lines[] = nemesisnet_llms_md_link( get_the_title( $post ), get_permalink( $post ), get_the_excerpt( $post ) );
        }
        $lines[] = '';
    }

    if ( nemesisnet_llms_get( 'include_pages' ) ) {
        $pages = get_posts( array(
            'post_type'   => 'page',
            'post_status' => 'publish',
            'numberposts' => 50,
            'orderby'     => 'menu_order title',
            'order'       => 'ASC',
        ) );
        if ( ! empty( $pages ) ) {
            $lines[] = '## Pages';
            foreach ( $pages as $page ) {
                $lines[] = nemesisnet_llms_md_link( get_the_title( $page ), get_permalink( $page ), get_the_excerpt( $page ) );
            }
            $lines[] = '';
        }
    }

    $extra = trim( (string) nemesisnet_llms_get( 'extra' ) );
    if ( '' !== $extra ) {
        $lines[] = '## Optional';
        $lines[] = $extra;
        $lines[] = '';
    }

    return implode( "\n", $lines );
}
