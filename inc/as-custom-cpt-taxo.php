<?php

/**
 * Creates a new taxonomy for a custom post type
 *
 */
function register_new_CPT_Taxo()
{
	$cpt_name = 'Event';
	$sanitized_cpt = sanitize_title($cpt_name);

	$all_taxonomy = array('Service', 'Client', 'Location');
	foreach ($all_taxonomy as $single) {

		$single = ucwords(strtolower(preg_replace('/\s+/', ' ', $single)));

		$last_character = substr($single, -1);

		if ($last_character === 'y') {
			$plural = substr_replace($single, 'ies', -1);
		} else {
			$plural = $single . 's'; // add 's' to convert singular name to plural
		}

		$tax_slug = strtolower(str_replace(" ", "_", $single)); // Sanitize slug

		if ('Location' === $single) :
			$opts['hierarchical'] = False;
		else :
			$opts['hierarchical'] = True;
		endif;
		//$opts['meta_box_cb'] = '';
		$opts['public'] = TRUE;
		$opts['query_var'] = $tax_slug;
		$opts['show_admin_column'] = TRUE;
		$opts['show_in_nav_menus'] = TRUE;
		$opts['show_tag_cloud'] = TRUE;
		$opts['show_ui'] = TRUE;
		$opts['sort'] = '';
		//$opts['update_count_callback'] = '';

		$opts['capabilities']['assign_terms'] = 'edit_posts';
		$opts['capabilities']['delete_terms'] = 'manage_categories';
		$opts['capabilities']['edit_terms'] = 'manage_categories';
		$opts['capabilities']['manage_terms'] = 'manage_categories';

		$opts['labels']['add_new_item'] = __("Add New {$single}", 'website');
		$opts['labels']['add_or_remove_items'] = __("Add or remove {$plural}", 'website');
		$opts['labels']['all_items'] = __($plural, 'website');
		$opts['labels']['choose_from_most_used'] = __("Choose from most used {$plural}", 'website');
		$opts['labels']['edit_item'] = __("Edit {$single}", 'website');
		$opts['labels']['menu_name'] = __($plural, 'website');
		$opts['labels']['name'] = __($plural, 'website');
		$opts['labels']['new_item_name'] = __("New {$single} Name", 'website');
		$opts['labels']['not_found'] = __("No {$plural} Found", 'website');
		$opts['labels']['parent_item'] = __("Parent {$single}", 'website');
		$opts['labels']['parent_item_colon'] = __("Parent {$single}:", 'website');
		$opts['labels']['popular_items'] = __("Popular {$plural}", 'website');
		$opts['labels']['search_items'] = __("Search {$plural}", 'website');
		$opts['labels']['separate_items_with_commas'] = __("Separate {$plural} with commas", 'website');
		$opts['labels']['singular_name'] = __($single, 'website');
		$opts['labels']['update_item'] = __("Update {$single}", 'website');
		$opts['labels']['view_item'] = __("View {$single}", 'website');

		$opts['rewrite']['ep_mask'] = EP_NONE;
		$opts['rewrite']['hierarchical'] = FALSE;
		$opts['rewrite']['slug'] = __($tax_slug, 'website');
		$opts['rewrite']['with_front'] = FALSE;

		register_taxonomy($tax_slug, $sanitized_cpt, $opts);
	}


	/**
	 * Create new custom post type
	 */

	$cap_type = 'post';
	$single = ucfirst($cpt_name);
	$plural = $single . 's';

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
	$opts['supports'] = array('title');
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
	$opts['labels']['add_new'] = __("Add New {$single}", 'website');
	$opts['labels']['add_new_item'] = __("Add New {$single}", 'website');
	$opts['labels']['all_items'] = __($plural, 'website');
	$opts['labels']['edit_item'] = __("Edit {$single}", 'website');
	$opts['labels']['menu_name'] = __($plural, 'website');
	$opts['labels']['name'] = __($plural, 'website');
	$opts['labels']['name_admin_bar'] = __($single, 'website');
	$opts['labels']['new_item'] = __("New {$single}", 'website');
	$opts['labels']['not_found'] = __("No {$plural} Found", 'website');
	$opts['labels']['not_found_in_trash'] = __("No {$plural} Found in Trash", 'website');
	$opts['labels']['parent_item_colon'] = __("Parent {$plural} :", 'website');
	$opts['labels']['search_items'] = __("Search {$plural}", 'website');
	$opts['labels']['singular_name'] = __($single, 'website');
	$opts['labels']['view_item'] = __("View {$single}", 'website');
	$opts['rewrite']['ep_mask'] = EP_PERMALINK;
	$opts['rewrite']['feeds'] = FALSE;
	$opts['rewrite']['pages'] = TRUE;
	$opts['rewrite']['slug'] = __(strtolower($plural), 'website');
	$opts['rewrite']['with_front'] = FALSE;

	register_post_type(strtolower($cpt_name), $opts);
}

add_action('init', 'register_new_CPT_Taxo');

/**
 * Creates a new custom post type
 *
 */
function create_custom_post_type($post_type_arr)
{
	foreach ($post_type_arr as $single_post_type) :
		$single = ucwords(strtolower(preg_replace('/\s+/', ' ', $single_post_type)));

		$last_character = substr($single_post_type, -1);

		if ($last_character === 'y') {
			$plural = substr_replace($single, 'ies', -1);
		} else {
			$plural = $single . 's'; // add 's' to convert singular name to plural
		}

		$tax_slug = strtolower(str_replace(" ", "_", $single)); // Sanitize slug

		$cpt_name = $single_post_type;
		$sanitized_cpt = sanitize_title($cpt_name);
		$cap_type = 'post';

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
		$opts['supports'] = array('title', 'editor', 'thumbnail');
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
		$opts['labels']['add_new'] = __("Add New {$single}", 'website');
		$opts['labels']['add_new_item'] = __("Add New {$single}", 'website');
		$opts['labels']['all_items'] = __($plural, 'website');
		$opts['labels']['edit_item'] = __("Edit {$single}", 'website');
		$opts['labels']['menu_name'] = __($plural, 'website');
		$opts['labels']['name'] = __($plural, 'website');
		$opts['labels']['name_admin_bar'] = __($single, 'website');
		$opts['labels']['new_item'] = __("New {$single}", 'website');
		$opts['labels']['not_found'] = __("No {$plural} Found", 'website');
		$opts['labels']['not_found_in_trash'] = __("No {$plural} Found in Trash", 'website');
		$opts['labels']['parent_item_colon'] = __("Parent {$plural} :", 'website');
		$opts['labels']['search_items'] = __("Search {$plural}", 'website');
		$opts['labels']['singular_name'] = __($single, 'website');
		$opts['labels']['view_item'] = __("View {$single}", 'website');
		$opts['rewrite']['ep_mask'] = EP_PERMALINK;
		$opts['rewrite']['feeds'] = FALSE;
		$opts['rewrite']['pages'] = TRUE;
		$opts['rewrite']['slug'] = __(strtolower($plural), 'website');
		$opts['rewrite']['with_front'] = FALSE;

		register_post_type(strtolower($cpt_name), $opts);

	endforeach;
}

create_custom_post_type(array("Testimonial"));


function create_custom_post_type_without_content_image($post_type_arr)
{
	foreach ($post_type_arr as $single_post_type) :
		$single = ucwords(strtolower(preg_replace('/\s+/', ' ', $single_post_type)));

		$last_character = substr($single_post_type, -1);

		if ($last_character === 'y') {
			$plural = substr_replace($single, 'ies', -1);
		} else {
			$plural = $single . 's'; // add 's' to convert singular name to plural
		}

		$tax_slug = strtolower(str_replace(" ", "_", $single)); // Sanitize slug

		$cpt_name = $single_post_type;
		$sanitized_cpt = sanitize_title($cpt_name);
		$cap_type = 'post';

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
		$opts['supports'] = array('title',);
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
		$opts['labels']['add_new'] = __("Add New {$single}", 'website');
		$opts['labels']['add_new_item'] = __("Add New {$single}", 'website');
		$opts['labels']['all_items'] = __($plural, 'website');
		$opts['labels']['edit_item'] = __("Edit {$single}", 'website');
		$opts['labels']['menu_name'] = __($plural, 'website');
		$opts['labels']['name'] = __($plural, 'website');
		$opts['labels']['name_admin_bar'] = __($single, 'website');
		$opts['labels']['new_item'] = __("New {$single}", 'website');
		$opts['labels']['not_found'] = __("No {$plural} Found", 'website');
		$opts['labels']['not_found_in_trash'] = __("No {$plural} Found in Trash", 'website');
		$opts['labels']['parent_item_colon'] = __("Parent {$plural} :", 'website');
		$opts['labels']['search_items'] = __("Search {$plural}", 'website');
		$opts['labels']['singular_name'] = __($single, 'website');
		$opts['labels']['view_item'] = __("View {$single}", 'website');
		$opts['rewrite']['ep_mask'] = EP_PERMALINK;
		$opts['rewrite']['feeds'] = FALSE;
		$opts['rewrite']['pages'] = TRUE;
		$opts['rewrite']['slug'] = __(strtolower($plural), 'website');
		$opts['rewrite']['with_front'] = FALSE;

		register_post_type(strtolower($cpt_name), $opts);

	endforeach;
}

create_custom_post_type_without_content_image(array("Slider"));
