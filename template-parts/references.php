<?php
/**
 * Template part for displaying References
 */

$references_content = get_post_meta( get_the_ID(), '_nemesis_references', true );

if ( empty( $references_content ) ) {
    return;
}

$references = explode( "\n", $references_content );
?>

<div class="references-section glass-card">
    <h3 class="references-title"><i class="fas fa-link"></i> <?php esc_html_e( 'Sources & References', 'nemesisnet' ); ?></h3>
    <ul class="references-list">
        <?php
        foreach ( $references as $reference ) {
            $parts = explode( '|', $reference );
            if ( count( $parts ) >= 2 ) {
                $title = trim( $parts[0] );
                $url   = trim( $parts[1] );
                ?>
                <li class="reference-item">
                    <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
                        <span class="ref-title"><?php echo esc_html( $title ); ?></span>
                        <span class="ref-url"><i class="fas fa-external-link-alt"></i> <?php echo esc_html( $url ); ?></span>
                    </a>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</div>
