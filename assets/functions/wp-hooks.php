<?php
/* Disable Wordpress Notification */
remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');

add_action('admin_menu','wphidenag');
function wphidenag() {
remove_action( 'admin_notices', 'update_nag', 3 );
}

function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');
/* Disable Wordpress Notification */

// Add Favicon.
function blog_favicon() { ?>
<link rel="shortcut icon"  href="<?php echo bloginfo('stylesheet_directory') ?>/images/favicon.ico" />
<?php }
add_action('wp_head', 'blog_favicon');
add_action( 'admin_head', 'blog_favicon' ); //admin end
add_action('login_head', 'blog_favicon');



/// Add title attribue in site logo
add_filter( 'get_custom_logo', 'as_add_title_attr_in_logo' );
function as_add_title_attr_in_logo() {
$siteName = get_bloginfo('name');
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="site-logo" rel="home" title="'.$siteName.'" itemprop="url">%2$s</a>',
            home_url( '/' ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;
}

// Remove 'page' from search results
add_action( 'init', 'update_my_custom_type', 99 );
function update_my_custom_type() {
global $wp_post_types;

if ( post_type_exists( 'page' ) ) {
// exclude from search results
  $wp_post_types['page']->exclude_from_search = true;
  }
}

// Remove Height and Width parameters from the_post_thumbnail function
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


// Hide Admin bar from freand end.
add_filter('show_admin_bar', '__return_false');

// disable the wpautop filter
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
