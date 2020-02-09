<?php

// Disable support for comments and trackbacks in post types
add_action('admin_init', 'as_remove_comments_support_for_all_cpt');
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

// Close comments on the front-end
add_filter('comments_open', 'as_remove_comments_status', 20, 2);
add_filter('pings_open', 'as_remove_comments_status', 20, 2);
function as_remove_comments_status()
{
    return false;
}


// Hide existing comments
add_filter('comments_array', 'as_hide_existing_comments', 10, 2);
function as_hide_existing_comments($comments)
{
    $comments = array();
    return $comments;
}


// Remove comments page from admin menu
add_action('admin_menu', 'as_remove_comments_from_admin_menu');
function as_remove_comments_from_admin_menu()
{
    remove_menu_page('edit-comments.php');
}

// Redirect any user trying to access comments page
add_action('admin_init', 'as_admin_menu_redirect_for_comments');
function as_admin_menu_redirect_for_comments()
{
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}


// Remove recent comments box from WP admin dashboard
add_action('admin_init', 'as_remove_comments_from_dashboard');
function as_remove_comments_from_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}

// Remove comments links from admin bar menu
add_action('init', 'as_remove_comments_from_admin_bar');
function as_remove_comments_from_admin_bar()
{
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}


// remove_recent comments style property from front-end
add_action('widgets_init', 'remove_recent_comments_style');
function remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}


/**
 * Disable the emoji's
 */
add_action('init', 'disable_emojis');
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


/**
 * Print all registered styles and scripts
 */
add_action('wp_print_scripts', 'print_all_registered_scripts');
function print_all_registered_scripts()
{
    // Print all loaded Scripts
    global $wp_scripts;
    echo  '------- </br> ';
    echo  'Scripts </br> ------- </br> ';
    foreach ($wp_scripts->queue as $script) :
        echo $script . '</br>';
    endforeach;

    // Print all loaded Styles (CSS)
    global $wp_styles;
    echo  '</br> ------- </br> ';
    echo  'Styles </br> ------- </br> ';
    foreach ($wp_styles->queue as $style) :
        echo $style . '</br>';
    endforeach;

    echo  '</br> ------- </br> ';
}


/**
 * Add 'defer' in given script tag
 */
add_filter('script_loader_tag', 'add_defer_attribute_in_scripts', 10, 2);
function add_defer_attribute_in_scripts($tag, $handle)
{
    if ($handle != 'jquery' && !is_admin()) {               // exclude jquery and wp admin pages
        // add script handles to the array below
        $scripts_to_defer = array(
            'first-handle',
            'another-handle'
        );

        foreach ($scripts_to_defer as $defer_script) {
            if ($defer_script === $handle) {
                return str_replace(' src', ' defer="defer" src', $tag);
            }
        }
    }
    return $tag;
}

/**
 * Add 'async' in given script tag
 */
add_filter('script_loader_tag', 'add_async_attribute_in_scripts', 10, 2);
function add_async_attribute_in_scripts($tag, $handle)
{
    if ($handle != 'jquery' && !is_admin()) {               // exclude jquery and wp admin pages
        // add script handles to the array below
        $scripts_to_async = array(
            'first-handle',
            'another-handle'
        );

        foreach ($scripts_to_async as $async_script) {
            if ($async_script === $handle) {
                return str_replace(' src', ' async="async" src', $tag);
            }
        }
    }
    return $tag;
}

// Limit Post Revision to 3
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 3);

// Set autosave to 2.5 mins (150 sec)
if (!defined('AUTOSAVE_INTERVAL')) define('AUTOSAVE_INTERVAL', 150);
