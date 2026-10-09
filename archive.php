<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container site-content">
            <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
            <?php
            // Check for global sidebar position
            $sidebar_position = get_theme_mod( 'nemesisnet_sidebar_position', 'right' );
            $wrapper_class = 'content-area-wrapper';
            if ( 'left' === $sidebar_position ) {
                $wrapper_class .= ' sidebar-left';
            }
            ?>
            <div class="<?php echo esc_attr( $wrapper_class ); ?>">
                <div class="primary-content">
                    <?php if ( have_posts() ) : ?>

                        <header class="page-header glass-card" style="margin-bottom: var(--space-xl);">
                            <?php
                            the_archive_title( '<h1 class="page-title" style="margin-top:0;">', '</h1>' );
                            the_archive_description( '<div class="archive-description">', '</div>' );
                            ?>
                        </header><!-- .page-header -->

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /* Get the post type once and include the template part */
                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile;

                        if ( get_theme_mod( 'nemesisnet_show_pagination', true ) ) :
                            get_template_part('template-parts/pagination');
                        endif;

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
	</main><!-- #primary -->

<?php
get_footer();
