<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container site-content">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
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
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        ?>
                        <div class="entry-meta">
                            <?php echo get_the_date(); ?> by <?php the_author(); ?>
                        </div><!-- .entry-meta -->
                        <?php
                        // Display categories and tags as pills
                        $categories = get_the_category();
                        $tags = get_the_tags();
                        
                        if ( ! empty( $categories ) || ! empty( $tags ) ) :
                            ?>
                            <div class="entry-taxonomies">
                                <?php if ( ! empty( $categories ) ) : ?>
                                    <div class="taxonomy-group">
                                        <?php foreach ( $categories as $category ) : ?>
                                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="taxonomy-pill category-pill">
                                                <i class="fas fa-folder"></i>
                                                <?php echo esc_html( $category->name ); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ( ! empty( $tags ) ) : ?>
                                    <div class="taxonomy-group">
                                        <?php foreach ( $tags as $tag ) : ?>
                                            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="taxonomy-pill tag-pill">
                                                <i class="fas fa-tag"></i>
                                                <?php echo esc_html( $tag->name ); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div><!-- .entry-taxonomies -->
                            <?php
                        endif;
                        ?>
                    </header><!-- .entry-header -->

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'nemesis-card' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
			endwhile;

			get_template_part('template-parts/pagination');

		else :

            ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'nemesisnet' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nemesisnet' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </section><!-- .no-results -->
            <?php

		endif;
		?>
        </div>
	</main><!-- #primary -->

<?php
get_footer();
