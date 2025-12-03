<?php
/**
 * Template part for displaying the main navigation menu.
 */

// Check if a menu is assigned to the 'menu-1' theme location.
if ( has_nav_menu( 'menu-1' ) ) :
    ?>
    <nav id="site-navigation" class="main-navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'fallback_cb'    => false, // Do not fall back to wp_page_menu()
        ) );
        ?>
    </nav><!-- #site-navigation -->
    <?php
endif;
