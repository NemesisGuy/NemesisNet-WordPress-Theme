<?php
/**
 * Template part for displaying breadcrumbs.
 */

if ( ! get_theme_mod( 'nemesisnet_show_breadcrumbs', true ) ) {
    return;
}

// Don't show on front page
// if ( is_front_page() ) {
//    return;
// }
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb">
    <div class="breadcrumb-item">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'nemesisnet' ); ?></a>
    </div>

    <span class="breadcrumb-separator">/</span>

    <?php if ( is_archive() ) : ?>
        <div class="breadcrumb-item active">
            <?php the_archive_title(); ?>
        </div>
    <?php elseif ( is_search() ) : ?>
        <div class="breadcrumb-item active">
            <?php printf( esc_html__( 'Search Results for: %s', 'nemesisnet' ), '<span>' . get_search_query() . '</span>' ); ?>
        </div>
    <?php elseif ( is_single() ) : ?>
        <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $category = $categories[0];
            ?>
            <div class="breadcrumb-item">
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
            </div>
            <span class="breadcrumb-separator">/</span>
            <?php
        }
        ?>
        <div class="breadcrumb-item active">
            <?php the_title(); ?>
        </div>
    <?php elseif ( is_page() ) : ?>
        <?php
        global $post;
        if ( $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ( $parent_id ) {
                $page = get_post( $parent_id );
                $breadcrumbs[] = '<div class="breadcrumb-item"><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a></div><span class="breadcrumb-separator">/</span>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            foreach ( $breadcrumbs as $crumb ) {
                echo $crumb;
            }
        }
        ?>
        <div class="breadcrumb-item active">
            <?php the_title(); ?>
        </div>
    <?php elseif ( is_404() ) : ?>
        <div class="breadcrumb-item active">
            <?php esc_html_e( '404 Not Found', 'nemesisnet' ); ?>
        </div>
    <?php endif; ?>
</nav>
