<?php
/**
 * Custom search form
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text" for="search-field"><?php esc_html_e( 'Search for:', 'nemesisnet' ); ?></label>
    <input type="search" id="search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder', 'nemesisnet' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit" aria-label="<?php esc_attr_e( 'Search', 'nemesisnet' ); ?>">
        <i class="fas fa-search"></i>
    </button>
</form>
