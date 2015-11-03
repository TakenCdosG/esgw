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

// Hooking up function to create the Jobs post type
add_action( 'init', 'create_jobs_posttype' );

// Shortcode generator for the Job Posting page
add_shortcode( 'jobs-posts', 'build_jobs_posts' );
// Shortcode generator for the News media page
add_shortcode( 'news-media', 'build_news_media' );

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

function create_jobs_posttype() {

	register_post_type( 'jobs',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Jobs' ),
				'singular_name' => __( 'Job' )
			),
			'supports' => array( 'title', 'editor', 'author', 'revisions', 'custom-fields', ),
			'public' => true,
			'show_in_admin_bar' => true,
			'has_archive' => true,
			'capability_type' => 'page',
			'rewrite' => array('slug' => 'jobs'),
		)
	);
}

// Shortcode: [jobs-posts]
function build_jobs_posts($attr) {
	$structure = '<div id="jobs-posts-wrapper"><div class="jobs-posts">';
	
	// The Query
	$args = array(
		'post_type' => 'jobs',
		'order' => 'DESC',
		'orderby' => 'date'
	);
	$the_query = new WP_Query( $args );
	
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$structure .= '<div class="job-post">';
			$structure .= '<h3 class="job-title">' . get_the_title() . '</h3>';
			$structure .= '<div class="job-content">' . get_the_excerpt() . '</div>';
			$structure .= '<div class="read-more"><a href="' . get_permalink() . '">READ MORE></a></div>';
			$structure .= '</div>';
		}
	}
	$structure .= '</div></div>';
	/* This part of the code comes from: http://www.wpexplorer.com/pagination-wordpress-theme/ */
	$total = $the_query->max_num_pages;
	$big = 999999999; // need an unlikely integer
	if( $total > 1 )  {
		 if( !$current_page = get_query_var('paged') )
			 $current_page = 1;
		 if( get_option('permalink_structure') ) {
			 $format = 'page/%#%/';
		 } else {
			 $format = '&paged=%#%';
		 }
		$structure = paginate_links(array(
			'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'		=> $format,
			'current'		=> max( 1, get_query_var('paged') ),
			'total' 		=> $total,
			'mid_size'		=> 3,
			'type' 			=> 'list',
		 ) );
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	
	return $structure;
}

// Shortcode: [news-media]
function build_news_media($attr) {
	$structure = '<div id="news-media-wrapper"><div class="news-media">';
	
	// The Query
	$args = array(
		'order' => 'DESC',
		'orderby' => 'date'
	);
	$the_query = new WP_Query( $args );
	
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$structure .= '<div class="news">';
			$structure .= '<h3 class="news-title">' . get_the_title() . '</h3>';
			$structure .= '<div class="read-more"><a href="' . get_permalink() . '">READ MORE></a></div>';
			$structure .= '</div>';
		}
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	$structure .= '</div></div>';
	
	return $structure;
}
