<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container site-content">
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nemesisnet' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'nemesisnet' ); ?></p>
                    <?php get_search_form(); ?>
                    <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary"><?php esc_html_e( 'Return to Home', 'nemesisnet' ); ?></a></p>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        </div>
	</main><!-- #primary -->

<?php
get_footer();
