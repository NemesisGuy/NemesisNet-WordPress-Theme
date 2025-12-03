<?php
/**
 * Template part for displaying single posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post glass-section'); ?>>
	<header class="post-header">
		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

		<div class="post-meta">
            <span class="post-meta-item">
                <i class="fas fa-calendar"></i> <?php echo get_the_date(); ?>
            </span>
            <span class="post-meta-item">
                <i class="fas fa-user"></i> <?php the_author(); ?>
            </span>
            <span class="post-meta-item">
                <i class="fas fa-folder"></i> <?php the_category( ', ' ); ?>
            </span>
            <span class="post-meta-item">
                <i class="fas fa-clock"></i> <?php echo nemesisnet_reading_time(); ?>
            </span>
		</div><!-- .post-meta -->
	</header><!-- .post-header -->

	<div class="post-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nemesisnet' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .post-content -->

	<footer class="entry-footer">
        <div class="entry-taxonomies">
            <?php
            $tags_list = get_the_tag_list( '', ' ' );
            if ( $tags_list ) {
                printf( '<div class="tags-links">%1$s</div>', $tags_list );
            }
            ?>
        </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
