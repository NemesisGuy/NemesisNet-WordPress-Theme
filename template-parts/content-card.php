<?php
/**
 * Template part for displaying posts in a card format.
 * Used for archive, search, or custom loops needing a card layout.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post glass-card'); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'nemesis-card' ); ?>
            </a>
        </div>
    <?php endif; ?>

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

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'nemesisnet' ); ?></a>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
