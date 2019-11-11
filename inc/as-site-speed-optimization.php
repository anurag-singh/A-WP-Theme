<?php
// Disable support for comments and trackbacks in post types
function as_remove_comments_support_for_all_cpt()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'as_remove_comments_support_for_all_cpt');

// Close comments on the front-end
function as_remove_comments_status()
{
    return false;
}
add_filter('comments_open', 'as_remove_comments_status', 20, 2);
add_filter('pings_open', 'as_remove_comments_status', 20, 2);

// Hide existing comments
function as_hide_existing_comments($comments)
{
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'as_hide_existing_comments', 10, 2);

// Remove comments page from admin menu
function as_remove_comments_from_admin_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'as_remove_comments_from_admin_menu');


// Redirect any user trying to access comments page
function as_admin_menu_redirect_for_comments()
{
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'as_admin_menu_redirect_for_comments');


// Remove recent comments box from WP admin dashboard
function as_remove_comments_from_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'as_remove_comments_from_dashboard');


// Remove comments links from admin bar menu
function as_remove_comments_from_admin_bar()
{
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'as_remove_comments_from_admin_bar');

// remove_recent comments style property from front-end
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');


/**
 * Disable the emoji's
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}
add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

// async in scripts
// Async load
// add async and defer attributes to enqueued scripts
function shapeSpace_script_loader_tag($tag, $handle) {
	
	// if ($handle === 'my-plugin-javascript-handle') {
		
	if (!is_admin()) {

		if (false === stripos($tag, 'async')) {
			
			$tag = str_replace(' src', ' async="async" src', $tag);
			
		}
		
		if (false === stripos($tag, 'defer')) {
			
			$tag = str_replace('<script ', '<script defer ', $tag);
			
		}
		
	}
	
	return $tag;
	
}
add_filter('script_loader_tag', 'shapeSpace_script_loader_tag', 10, 2);

// Limit Post Revision to 3
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 3);

// Set autosave to 2.5 mins (150 sec)
if (!defined('AUTOSAVE_INTERVAL')) define('AUTOSAVE_INTERVAL', 150);





