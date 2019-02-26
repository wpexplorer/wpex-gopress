<?php
/**
 * Register theme image sizes
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 2.0.0
*/

if ( ! function_exists( 'wpex_register_image_sizes' ) ) {
	function wpex_register_image_sizes() {
		add_image_size( 'wpex_page', 9999, 9999 );
		add_image_size( 'wpex_page_full', 9999, 9999 );
		add_image_size( 'wpex_post', 800, 9999 );
		add_image_size( 'wpex_home_slider', 800, 360, true );
		add_image_size( 'wpex_entry', 400, 300, true );
		add_image_size( 'wpex_search_entry', 400, 300, true );
		add_image_size( 'wpex_post_related', 400, 300, true );
	}
}
add_action( 'after_setup_theme', 'wpex_register_image_sizes' );