<?php

/**
 * Website functions and definitions
 */
/**
 * This theme only works in WordPress 4.7 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.7', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if (!function_exists('website_setup')) :
	function website_setup()
	{
		load_theme_textdomain('website', get_template_directory() . '/languages');

		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);

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

		/**
		 * Add support for core custom logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);
	}
endif;
add_action('after_setup_theme', 'website_setup');

/**
 * Enqueue scripts and styles.
 */
function website_scripts()
{
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//code.jquery.com/jquery-3.4.1.min.js', true);
		wp_enqueue_script('jquery');
	}

	// Stylesheets
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', false, null);
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', false, null);

	// javascripts
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', false, null, true);
	wp_enqueue_script('bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js", array('jquery'), null, true);

	if (isset($_REQUEST['dev'])  && $_REQUEST['dev'] == 1) {
		wp_enqueue_style('style', get_stylesheet_uri(), false, filemtime(get_stylesheet_directory() . '/style.css'));
		wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', false, filemtime(get_stylesheet_directory() . '/assets/js/script.js'), true);
	} else {
		wp_enqueue_style('style', get_stylesheet_uri(), false, null);
		wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
	}
}
add_action('wp_enqueue_scripts', 'website_scripts');

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
// require get_template_directory() . '/inc/as-site-speed-optimization.php';

/**
 * Admin customization.
 */
require get_template_directory() . '/inc/as-admin-customizer.php';

/**
 * Debugging functions.
 */
require get_template_directory() . '/inc/as-debugging-functions.php';

/**
 * Bootstrap Navwalker.
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// require_once get_template_directory() . '/lib/modal-contact-form/modal-contact-form.php';

// require_once get_template_directory() . '/lib/contact-form-jquery-validation-recaptcha/contact-form-jquery-validation-recaptcha.php';

require_once get_template_directory() . '/lib/frontend-crud-oprations-with-jwt-ajax/frontend-crud-oprations-with-jwt-ajax.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Sidebar
// require get_template_directory() . '/inc/custom-widget.php';
// require get_template_directory() . '/inc/custom-widget-google-map.php';

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
