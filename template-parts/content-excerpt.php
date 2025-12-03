<?php
/**
 * Template part for displaying post excerpts.
 * Useful for compact lists of posts.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<div class="entry-meta">
            <span class="posted-on">
                <i class="fas fa-calendar"></i> <?php echo get_the_date(); ?>
            </span>
            <span class="byline">
                <i class="fas fa-user"></i> <?php the_author(); ?>
            </span>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'nemesisnet' ); ?></a>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
