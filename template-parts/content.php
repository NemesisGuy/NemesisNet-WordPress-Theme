<?php
/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post glass-card'); ?>>
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
                <span class="posted-on">
                    <i class="fas fa-calendar"></i> <?php echo get_the_date(); ?>
                </span>
                <span class="byline">
                    <i class="fas fa-user"></i> <?php the_author(); ?>
                </span>
                <span class="reading-time">
                    <i class="fas fa-clock"></i> <?php echo nemesisnet_reading_time(); ?>
                </span>
                <?php
                // Categories (Limit 3)
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<span class="cat-links">';
                    $count = 0;
                    foreach ( $categories as $category ) {
                        $count++;
                        if ( $count > 3 ) break;
                        echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" rel="category tag">' . esc_html( $category->name ) . '</a>';
                    }
                    echo '</span>';
                }
                ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() && ! is_singular() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'nemesis-card' ); ?>
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
            <?php
            $tags_list = get_the_tag_list( '', ' ' );
            if ( $tags_list ) {
                echo '<div class="tags-links">' . $tags_list . '</div>';
            }
            ?>
            <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'nemesisnet' ); ?></a>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
