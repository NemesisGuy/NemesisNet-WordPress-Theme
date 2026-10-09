<?php
/**
 * Template part for displaying post pagination.
 */

global $wp_query;

// Only render pagination when there is more than one page of results.
if ( isset( $wp_query->max_num_pages ) && $wp_query->max_num_pages > 1 ) {
    the_posts_pagination(
        array(
            'mid_size'  => 2,
            'prev_text' => '<i class="fas fa-arrow-left"></i> <span class="screen-reader-text">' . __( 'Previous', 'nemesisnet' ) . '</span>',
            'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'nemesisnet' ) . '</span> <i class="fas fa-arrow-right"></i>',
        )
    );
}
