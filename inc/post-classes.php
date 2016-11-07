<?php
/**
 * Adds classes to entries
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */


add_filter('post_class', 'wpex_post_entry_classes');

if ( ! function_exists( 'wpex_post_entry_classes' ) ) {

	function wpex_post_entry_classes( $classes ) {
		
		// Post Data
		global $post;
		$post_id = $post->ID;
		$post_type = get_post_type($post_id);
		$has_thumb = get_the_post_thumbnail($post_id);

		// Search results
		if ( is_search() ) {
			$classes[] = 'search-entry clr';
			return $classes;
		}

		// No thumbnail
		if ( '' == $has_thumb ) {
			$classes[] = 'no-featured-image';
		}

		// Custom class for non standard post types
		if ( $post_type !== 'post' && !is_singular() ) {
			$classes[] = $post_type .'-entry';
		}

		// All other posts
		if ( !is_singular() ) {
			$classes[] = 'loop-entry clr';
		}

		// Return classes
		return $classes;
		
	} // End function
	
} // End if