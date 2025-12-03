<?php
/**
 * Carousel Component
 *
 * This component provides a responsive image/content carousel with navigation.
 * It relies on the existing JavaScript logic in assets/js/theme.js and styles in style.css.
 *
 * To use this component:
 * 1. Include it in your template using get_template_part('components/carousel', null, ['slides' => $your_slides_array]);
 * 2. Pass an array of slide data, where each slide can have 'image_url', 'caption', and 'content'.
 *    If 'image_url' is provided, it will render an image slide. Otherwise, it will render a content slide.
 *
 * Example Usage (in a template file):
 *
 * $carousel_slides = [
 *     [
 *         'image_url' => get_template_directory_uri() . '/assets/img/slide1.jpg',
 *         'caption'   => 'First slide caption',
 *         'content'   => 'Optional content for the first slide.'
 *     ],
 *     [
 *         'content'   => '<h2>Custom Content Slide</h2><p>This slide contains custom HTML content instead of an image.</p><a href="#" class="btn-primary">Learn More</a>',
 *     ],
 *     [
 *         'image_url' => get_template_directory_uri() . '/assets/img/slide2.jpg',
 *         'caption'   => 'Second slide caption',
 *     ],
 * ];
 * get_template_part('components/carousel', null, ['slides' => $carousel_slides]);
 */

$args = wp_parse_args(
    $args,
    array(
        'slides' => array(),
    )
);

$slides = $args['slides'];

if ( empty( $slides ) ) {
    return; // Don't render if no slides are provided.
}
?>

<div class="carousel">
    <div class="carousel-track-container">
        <ul class="carousel-track">
            <?php foreach ( $slides as $index => $slide ) : ?>
                <li class="carousel-slide <?php echo ( 0 === $index ) ? 'current-slide' : ''; ?>">
                    <?php if ( ! empty( $slide['image_url'] ) ) : ?>
                        <img src="<?php echo esc_url( $slide['image_url'] ); ?>" alt="<?php echo esc_attr( $slide['caption'] ?? 'Carousel image' ); ?>">
                        <?php if ( ! empty( $slide['caption'] ) || ! empty( $slide['content'] ) ) : ?>
                            <div class="carousel-caption">
                                <?php if ( ! empty( $slide['caption'] ) ) : ?>
                                    <h3><?php echo esc_html( $slide['caption'] ); ?></h3>
                                <?php endif; ?>
                                <?php if ( ! empty( $slide['content'] ) ) : ?>
                                    <div class="carousel-content">
                                        <?php echo wp_kses_post( $slide['content'] ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php elseif ( ! empty( $slide['content'] ) ) : ?>
                        <div class="carousel-content-slide">
                            <?php echo wp_kses_post( $slide['content'] ); ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <button class="carousel-button carousel-button--left">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="carousel-button carousel-button--right">
        <i class="fas fa-chevron-right"></i>
    </button>

    <div class="carousel-nav">
        <?php foreach ( $slides as $index => $slide ) : ?>
            <button class="carousel-indicator <?php echo ( 0 === $index ) ? 'current-slide' : ''; ?>"></button>
        <?php endforeach; ?>
    </div>
</div>
