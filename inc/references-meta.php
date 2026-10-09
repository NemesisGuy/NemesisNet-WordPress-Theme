<?php
/**
 * References Meta Box
 */

// Register Meta Box
function nemesisnet_add_references_meta_box() {
    add_meta_box(
        'nemesisnet_references_meta',
        __( 'Sources & References', 'nemesisnet' ),
        'nemesisnet_render_references_meta_box',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'nemesisnet_add_references_meta_box' );

// Render Meta Box
function nemesisnet_render_references_meta_box( $post ) {
    $value = get_post_meta( $post->ID, '_nemesis_references', true );
    wp_nonce_field( 'nemesisnet_save_references', 'nemesisnet_references_nonce' );
    ?>
    <p class="description">
        <?php esc_html_e( 'Enter references, one per line. Format: Title | URL', 'nemesisnet' ); ?>
    </p>
    <textarea name="nemesisnet_references" id="nemesisnet_references" rows="5" style="width:100%;"><?php echo esc_textarea( $value ); ?></textarea>
    <p class="description">
        <?php esc_html_e( 'Example: Wikipedia | https://wikipedia.org', 'nemesisnet' ); ?>
    </p>
    <?php
}

// Save Meta Box Data
function nemesisnet_save_references_meta( $post_id ) {
    if ( ! isset( $_POST['nemesisnet_references_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['nemesisnet_references_nonce'], 'nemesisnet_save_references' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['nemesisnet_references'] ) ) {
        update_post_meta( $post_id, '_nemesis_references', sanitize_textarea_field( $_POST['nemesisnet_references'] ) );
    }
}
add_action( 'save_post', 'nemesisnet_save_references_meta' );
