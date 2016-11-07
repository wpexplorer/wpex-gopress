<?php
/**
 * Helper functions
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

/**
 * Return correct assets url for loading scripts
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'wpex_asset_url' ) ) {
	function wpex_asset_url( $part = '' ) {
		return get_template_directory_uri() .'/assets/'. $part;
	}
}

/**
 * Returns escaped post title
 *
 * @since 2.0.0
 */
function wpex_get_esc_title() {
	return esc_attr( the_title_attribute( 'echo=0' ) );
}

/**
 * Outputs escaped post title
 *
 * @since 2.0.0
 */
function wpex_esc_title() {
	echo wpex_get_esc_title();
}