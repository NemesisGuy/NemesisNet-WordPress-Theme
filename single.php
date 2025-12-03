<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container site-content">
        <?php
        // Display the single post content only once
        if ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/content-single' );

            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-label"><i class="fas fa-arrow-left"></i> ' . esc_html__( 'Previous', 'nemesisnet' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-label">' . esc_html__( 'Next', 'nemesisnet' ) . ' <i class="fas fa-arrow-right"></i></span> <span class="nav-title">%title</span>',
                )
            );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        } else {
            echo '<p>' . esc_html__( 'Sorry, no content available.', 'nemesisnet' ) . '</p>';
        }
        ?>
    </div>
</main><!-- #primary -->

<?php
get_footer();
