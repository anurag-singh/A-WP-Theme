<?php

/**
 * Website functions and definitions
 */

if (!function_exists('website_setup')) :
	function website_setup()
	{
		load_theme_textdomain('website', get_template_directory() . '/languages');

		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			// 'comment-form',
			// 'comment-list',
			// 'gallery',
			'caption',
		));
	}
endif;
add_action('after_setup_theme', 'website_setup');



/**
 * Theme's styles and scripts.
 */
require get_template_directory() . '/inc/as-website-scripts.php';

/**
 * Theme's Menu.
 */
require get_template_directory() . '/inc/as-custom-menus.php';

/**
 * Theme's widget.
 */
require get_template_directory() . '/inc/as-custom-widgets.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom post types & taxonomies.
 */
require get_template_directory() . '/inc/as-custom-cpt-taxos.php';

/**
 * Site speed optimization.
 */
require get_template_directory() . '/inc/as-site-speed-optimization.php';

/**
 * Admin customization.
 */
require get_template_directory() . '/inc/as-admin-customizer.php';

/**
 * Admin customization.
 */
require get_template_directory() . '/inc/as-google-tag-manager-scripts.php';

/**
 * Debugging functions.
 */
if (isset($_COOKIE['dev'])  && $_COOKIE['dev'] == 1) {
	require get_template_directory() . '/inc/as-debugging-functions.php';
}

/**
 * Bootstrap Navwalker.
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/lib/modal-contact-form.php';


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Sidebar
// require get_template_directory() . '/inc/custom-widget.php';
// require get_template_directory() . '/inc/custom-widget-google-map.php';

add_filter('use_block_editor_for_post', '__return_false', 10); // remove Gutenberg editor support


function post_type_support_init()
{
	remove_post_type_support('post', 'custom-fields');
	remove_post_type_support('page', 'custom-fields');
}
add_action('init', 'post_type_support_init');


// add_image_size( '310x310', 310, 310 );
// add_image_size( '100x100', 100, 100 );
// add_image_size( '150x150', 150, 150 );
// add_image_size( '600x600', 600, 600 );
