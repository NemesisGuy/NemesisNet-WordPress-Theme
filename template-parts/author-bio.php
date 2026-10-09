<?php
/**
 * The template for displaying Author Bio
 */

if ( ! get_the_author_meta( 'description' ) ) {
    return;
}
?>

<div class="author-bio">
    <div class="author-avatar">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
    </div>
    <div class="author-info">
        <h3 class="author-name">
            <?php printf( esc_html__( 'About %s', 'nemesisnet' ), get_the_author() ); ?>
        </h3>
        <div class="author-description">
            <?php the_author_meta( 'description' ); ?>
        </div>
        <div class="author-social">
            <?php if ( get_the_author_meta( 'user_url' ) ) : ?>
                <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>" target="_blank" rel="noopener noreferrer" title="<?php esc_attr_e( 'Website', 'nemesisnet' ); ?>">
                    <i class="fas fa-globe"></i>
                </a>
            <?php endif; ?>
            <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
                <a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank" rel="noopener noreferrer" title="<?php esc_attr_e( 'LinkedIn', 'nemesisnet' ); ?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            <?php endif; ?>
            <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
                <a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank" rel="noopener noreferrer" title="<?php esc_attr_e( 'Twitter / X', 'nemesisnet' ); ?>">
                    <i class="fab fa-x-twitter"></i>
                </a>
            <?php endif; ?>
            <?php if ( get_the_author_meta( 'github' ) ) : ?>
                <a href="<?php echo esc_url( get_the_author_meta( 'github' ) ); ?>" target="_blank" rel="noopener noreferrer" title="<?php esc_attr_e( 'GitHub', 'nemesisnet' ); ?>">
                    <i class="fab fa-github"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
