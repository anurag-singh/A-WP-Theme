<?php
/*
 * Register nav menu locations
 */
add_action( 'after_setup_theme', 'register_website_menus' );
function register_website_menus() {
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'website' ),
        'social'  => esc_html__( 'Social', 'website' ),
        'footer1' => esc_html__( 'Footer-1', 'website' ),
        'footer2' => esc_html__( 'Footer-2', 'website' ),
        'footer3' => esc_html__( 'Footer-3', 'website' ),
        'footer4' => esc_html__( 'Footer-4', 'website' ),
    ) );
}