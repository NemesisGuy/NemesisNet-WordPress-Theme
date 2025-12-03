<?php
/**
 * NemesisNet Theme Customizer
 */

function nemesisnet_customize_register( $wp_customize ) {
    // Add Panel
    $wp_customize->add_panel( 'nemesisnet_options_panel', array(
        'title'       => __( 'NemesisNet Settings', 'nemesisnet' ),
        'priority'    => 10,
        'description' => __( 'Customize the NemesisNet theme settings.', 'nemesisnet' ),
    ) );

    // Section: General Settings
    $wp_customize->add_section( 'nemesisnet_general_section', array(
        'title'    => __( 'General Settings', 'nemesisnet' ),
        'panel'    => 'nemesisnet_options_panel',
        'priority' => 10,
    ) );

    // Setting: Accent Color
    $wp_customize->add_setting( 'nemesisnet_accent_color', array(
        'default'           => '#1E88E5',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nemesisnet_accent_color', array(
        'label'    => __( 'Accent Color', 'nemesisnet' ),
        'section'  => 'nemesisnet_general_section',
        'settings' => 'nemesisnet_accent_color',
    ) ) );

    // Setting: Default Theme Mode
    $wp_customize->add_setting( 'nemesisnet_default_theme_mode', array(
        'default'           => 'system',
        'sanitize_callback' => 'nemesisnet_sanitize_select',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'nemesisnet_default_theme_mode', array(
        'label'    => __( 'Default Theme Mode', 'nemesisnet' ),
        'section'  => 'nemesisnet_general_section',
        'type'     => 'select',
        'choices'  => array(
            'system' => __( 'System Preference', 'nemesisnet' ),
            'light'  => __( 'Light Mode', 'nemesisnet' ),
            'dark'   => __( 'Dark Mode', 'nemesisnet' ),
        ),
    ) );

    // Section: Layout Settings
    $wp_customize->add_section( 'nemesisnet_layout_section', array(
        'title'    => __( 'Layout Settings', 'nemesisnet' ),
        'panel'    => 'nemesisnet_options_panel',
        'priority' => 20,
    ) );

    // Setting: Sidebar Position
    $wp_customize->add_setting( 'nemesisnet_sidebar_position', array(
        'default'           => 'right',
        'sanitize_callback' => 'nemesisnet_sanitize_select',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'nemesisnet_sidebar_position', array(
        'label'    => __( 'Global Sidebar Position', 'nemesisnet' ),
        'description' => __( 'Applies to Blog Feed, Archives, and Search.', 'nemesisnet' ),
        'section'  => 'nemesisnet_layout_section',
        'type'     => 'select',
        'choices'  => array(
            'right' => __( 'Right', 'nemesisnet' ),
            'left'  => __( 'Left', 'nemesisnet' ),
        ),
    ) );

    // Setting: Sidebar Title
    $wp_customize->add_setting( 'nemesisnet_sidebar_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'nemesisnet_sidebar_title', array(
        'label'    => __( 'Sidebar Title', 'nemesisnet' ),
        'section'  => 'nemesisnet_layout_section',
        'type'     => 'text',
    ) );

    // Setting: Sticky Header
    $wp_customize->add_setting( 'nemesisnet_sticky_header', array(
        'default'           => false,
        'sanitize_callback' => 'nemesisnet_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'nemesisnet_sticky_header', array(
        'label'    => __( 'Sticky Header', 'nemesisnet' ),
        'section'  => 'nemesisnet_layout_section',
        'type'     => 'checkbox',
    ) );

    // Section: UI Aesthetics
    $wp_customize->add_section( 'nemesisnet_ui_section', array(
        'title'    => __( 'UI Aesthetics', 'nemesisnet' ),
        'panel'    => 'nemesisnet_options_panel',
        'priority' => 30,
    ) );

    // Setting: Glass Blur
    $wp_customize->add_setting( 'nemesisnet_glass_blur', array(
        'default'           => 12,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage', // We can use JS for live preview later if we want
    ) );
    $wp_customize->add_control( 'nemesisnet_glass_blur', array(
        'label'    => __( 'Glass Blur Amount (px)', 'nemesisnet' ),
        'section'  => 'nemesisnet_ui_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    ) );

    // Setting: Border Radius
    $wp_customize->add_setting( 'nemesisnet_border_radius', array(
        'default'           => 12,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'nemesisnet_border_radius', array(
        'label'    => __( 'Border Radius (px)', 'nemesisnet' ),
        'section'  => 'nemesisnet_ui_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
        ),
    ) );

    // Section: Miscellaneous
    $wp_customize->add_section( 'nemesisnet_misc_section', array(
        'title'    => __( 'Miscellaneous', 'nemesisnet' ),
        'panel'    => 'nemesisnet_options_panel',
        'priority' => 40,
    ) );

    // Setting: Rickroll URL
    $wp_customize->add_setting( 'nemesisnet_rickroll_url', array(
        'default'           => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'nemesisnet_rickroll_url', array(
        'label'    => __( 'Rickroll Embed URL', 'nemesisnet' ),
        'section'  => 'nemesisnet_misc_section',
        'type'     => 'url',
    ) );
}
add_action( 'customize_register', 'nemesisnet_customize_register' );

/**
 * Sanitize Select
 */
function nemesisnet_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize Checkbox
 */
function nemesisnet_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
