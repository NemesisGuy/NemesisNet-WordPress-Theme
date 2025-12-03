    <?php get_template_part('components/footer'); ?>
    <button id="back-to-top" class="back-to-top" aria-label="Back to Top">
        <i class="fas fa-arrow-up"></i>
    </button>
</div><!-- #page -->

<div class="mobile-nav-overlay" id="mobile-nav-overlay">
    <div class="mobile-nav-content">
        <div class="mobile-nav-header">
            <div class="site-branding">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-logo-link" rel="home"><img src="' . get_template_directory_uri() . '/assets/nemesis-logo.svg" class="custom-logo" alt="NemesisNet" style="width:44px;height:44px;border-radius:50%;"></a>';
                }
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                ?>
            </div><!-- .site-branding -->
            <button class="mobile-nav-close" id="mobile-nav-close"><i class="fas fa-times"></i></button>
        </div>
        <nav class="mobile-nav-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'mobile-primary-menu',
                'container'      => false,
            ) );
            ?>
        </nav>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
