<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container site-content">
            <?php
            // Check for global sidebar position
            $sidebar_position = get_theme_mod( 'nemesisnet_sidebar_position', 'right' );
            $wrapper_class = 'content-area-wrapper';
            if ( 'left' === $sidebar_position ) {
                $wrapper_class .= ' sidebar-left';
            }
            ?>
            <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
            <div class="<?php echo esc_attr( $wrapper_class ); ?>">
                <div class="primary-content">
                    <?php if ( have_posts() ) : ?>

                        <header class="page-header glass-card" style="margin-bottom: var(--space-xl);">
                            <h1 class="page-title" style="margin-top:0;">
                                <?php
                                printf(
                                    /* translators: %s: Search query. */
                                    esc_html__( 'Search Results for: %s', 'nemesisnet' ),
                                    '<span>' . get_search_query() . '</span>'
                                );
                                ?>
                            </h1>
                        </header><!-- .page-header -->

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );

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
