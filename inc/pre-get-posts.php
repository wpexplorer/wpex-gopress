<?php
/**
 * Alters main queries
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

add_action( 'pre_get_posts', 'wpex_pre_get_posts' );

if ( ! function_exists( 'wpex_pre_get_posts' ) ) {

	function wpex_pre_get_posts( $query ) {

	// Exclude featured cat on the homepage
	$featured_category = get_theme_mod( 'wpex_homepage_slider_cat' );
	if ( $featured_category && $featured_category !== '-1' ) {
		$featured_category = -1 * $featured_category;
		if ( $query->is_home() && $query->is_main_query() ) {
			$query->set( 'cat', $featured_category );
		}
	}

	} // End function

} // End if