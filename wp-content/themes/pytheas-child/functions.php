<?php
/**
 * Pytheas functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */

add_filter('getarchives_where', 'filter_by_category');
add_filter('getarchives_join', 'join_for_filter_by_category');
add_filter('excerpt_length', 'custom_excerpt_length');

add_filter('upload_mimes', 'pixert_upload_swf');

wp_enqueue_script('mobile-script', get_stylesheet_directory_uri() .'/js/mobile-script.js', array('jquery'), '1.0');

function join_for_filter_by_category($cat) {
	global $wpdb;
	return $cat . " INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)";
}

function filter_by_category($cat) {
    global $wpdb;
    $includes= '7'; // category for News/Events
    return $cat . " AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.term_id = '$includes'";

}

function custom_excerpt_length( $length ) {
	return 30;
}

/* allow upload flash */
function pixert_upload_swf($existing_mimes) {
	$existing_mimes['swf'] = 'text/swf'; //allow swf files
	return $existing_mimes;
}
/* allow upload flash */