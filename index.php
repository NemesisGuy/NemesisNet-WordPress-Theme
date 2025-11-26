<?php
/**
 * The main template file
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container site-content">

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
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;

                        if ( 'post' === get_post_type() ) :
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
                        <?php endif; ?>
                    </header><!-- .entry-header -->

                    <?php if ( has_post_thumbnail() && ! is_singular() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        if ( is_singular() ) {
                            the_content();
                        } else {
                            the_excerpt();
                        }
                        ?>
                    </div><!-- .entry-content -->

                    <?php if ( ! is_singular() ) : ?>
                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </footer><!-- .entry-footer -->
                    <?php endif; ?>
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
			endwhile;

			the_posts_navigation();

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
	</main><!-- #primary -->

<?php
get_footer();
