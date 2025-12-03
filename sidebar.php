<?php
/**
 * The sidebar containing the main widget area
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area glass-section">
    <?php
    $sidebar_title = get_option('nemesisnet_sidebar_title', '');
    if ( ! empty( $sidebar_title ) ) {
        echo '<h2 class="sidebar-main-title">' . esc_html( $sidebar_title ) . '</h2>';
    }
    ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
