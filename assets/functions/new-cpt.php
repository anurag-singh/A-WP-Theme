<?php 
function create_new_custom_post_type() {
	 $cptArr = array('Testimonial', 'Slider');

	foreach ($cptArr as $cpt_name) {
		//$cpt_name = 'Testimonial';
		$textdomain = 'new_cpt';
		$cap_type = 'post';
		$single = ucfirst($cpt_name);
		$plural = $single.'s';

		$opts['can_export'] = TRUE;
		$opts['capability_type'] = $cap_type;
		$opts['description'] = '';
		$opts['exclude_from_search'] = FALSE;
		$opts['has_archive'] = FALSE;
		$opts['hierarchical'] = FALSE;
		$opts['map_meta_cap'] = TRUE;
		$opts['menu_icon'] = 'dashicons-admin-post';
		$opts['menu_position'] = 25;
		$opts['public'] = TRUE;
		$opts['publicly_querable'] = TRUE;
		$opts['query_var'] = TRUE;
		$opts['register_meta_box_cb'] = '';
		$opts['rewrite'] = FALSE;
		$opts['show_in_admin_bar'] = TRUE; // Define For 'Top Menu' bar
		$opts['show_in_menu'] = TRUE;
		$opts['show_in_nav_menu'] = TRUE;
		$opts['show_ui'] = TRUE;
		$opts['supports'] = array( 'title', 'editor', 'thumbnail' );
		$opts['taxonomies'] = array();

		$opts['capabilities']['delete_others_posts'] = "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post'] = "delete_{$cap_type}";
		$opts['capabilities']['delete_posts'] = "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts'] = "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts'] = "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts'] = "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post'] = "edit_{$cap_type}";
		$opts['capabilities']['edit_posts'] = "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts'] = "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts'] = "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts'] = "publish_{$cap_type}s";
		$opts['capabilities']['read_post'] = "read_{$cap_type}";
		$opts['capabilities']['read_private_posts'] = "read_private_{$cap_type}s";

		$opts['labels']['add_new'] = __( "Add New {$single}", $textdomain );
		$opts['labels']['add_new_item'] = __( "Add New {$single}", $textdomain );
		$opts['labels']['all_items'] = __( $plural, $textdomain );
		$opts['labels']['edit_item'] = __( "Edit {$single}" , $textdomain);
		$opts['labels']['menu_name'] = __( $plural, $textdomain );
		$opts['labels']['name'] = __( $plural, $textdomain );
		$opts['labels']['name_admin_bar'] = __( $single, $textdomain );
		$opts['labels']['new_item'] = __( "New {$single}", $textdomain );
		$opts['labels']['not_found'] = __( "No {$plural} Found", $textdomain );
		$opts['labels']['not_found_in_trash'] = __( "No {$plural} Found in Trash", $textdomain );
		$opts['labels']['parent_item_colon'] = __( "Parent {$plural} :", $textdomain );
		$opts['labels']['search_items'] = __( "Search {$plural}", $textdomain );
		$opts['labels']['singular_name'] = __( $single, $textdomain );
		$opts['labels']['view_item'] = __( "View {$single}", $textdomain );

		$opts['rewrite']['ep_mask'] = EP_PERMALINK;
		$opts['rewrite']['feeds'] = FALSE;
		$opts['rewrite']['pages'] = TRUE;
		$opts['rewrite']['slug'] = __( strtolower( $plural ), $textdomain );
		$opts['rewrite']['with_front'] = FALSE;

		register_post_type( strtolower( $cpt_name ), $opts );
	}
} 
 

add_action('init', 'create_new_custom_post_type');


 ?>