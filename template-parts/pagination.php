<?php
/**
 * Template part for displaying post pagination.
 */

// If there are no posts, don't display pagination.
if ( ! have_posts() ) {
    return;
}

// Display posts navigation.
the_posts_navigation(
    array(
        'prev_text' => '<span class="nav-label"><i class="fas fa-arrow-left"></i> ' . esc_html__( 'Previous', 'nemesisnet' ) . '</span> <span class="nav-title">%title</span>',
        'next_text' => '<span class="nav-label">' . esc_html__( 'Next', 'nemesisnet' ) . ' <i class="fas fa-arrow-right"></i></span> <span class="nav-title">%title</span>',
    )
);
