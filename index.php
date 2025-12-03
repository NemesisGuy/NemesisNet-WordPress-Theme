<?php
/**
 * The main template file
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container site-content">
            <?php
            // Check for global sidebar position
            $sidebar_position = get_option( 'nemesisnet_sidebar_position', 'right' );
            $wrapper_class = 'content-area-wrapper';
            if ( 'left' === $sidebar_position ) {
                $wrapper_class .= ' sidebar-left';
            }
            ?>
            <div class="<?php echo esc_attr( $wrapper_class ); ?>">
                <div class="primary-content">
                    <?php
                    if ( have_posts() ) :

                        if ( is_home() && ! is_front_page() ) :
                            ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                            <?php
                        endif;

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /* Get the post type once and include the template part */
                            $post_type = get_post_type();
                            if ( ! empty( $post_type ) ) {
                                get_template_part( 'template-parts/content', $post_type );
                            }

                        endwhile;

                        get_template_part('template-parts/pagination');

                    else :

                        ?>
                        <section class="no-results not-found">
                            <header class="page-header">
                                <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'nemesisnet' ); ?></h1>
                            </header><!-- .page-header -->

                            <div class="page-content">
                                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nemesisnet' ); ?></p>
                                <?php get_search_form(); ?>
                            </div><!-- .page-content -->
                        </section><!-- .no-results -->
                        <?php

                    endif;
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
	</main><!-- #primary -->

<?php
get_footer();
