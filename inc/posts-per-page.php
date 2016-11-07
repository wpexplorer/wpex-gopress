<?php
/**
 * Function used to alter the ammount of posts per page
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */


// Alter portfolio taxonomy posts per page
if ( !function_exists('wpex_pre_get_posts') ) {

	function wpex_pre_get_posts($query) {

		// Portfolio taxonomy
		if ( is_tax( 'portfolio_category') ) {
			$posts_per_page = get_theme_mod('wpex_portfolio_posts_per_page', '12');
			$query->set( 'posts_per_page', $posts_per_page );
		}

	}

}
add_filter( 'pre_get_posts', 'wpex_pre_get_posts' );