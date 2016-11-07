<?php
/**
 * Outputs the footer copyright info
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */


if ( ! function_exists( 'wpex_copyright' ) ) {
	function wpex_copyright() {
		$copy = get_theme_mod( 'wpex_copyright' );
		$copy = $copy ? $copy : 'Powered by <a href=\"http://www.wordpress.org\" title="WordPress" target="_blank">WordPress</a> and <a href=\"http://themeforest.net/user/WPExplorer?ref=WPExplorer" target="_blank" title="WPExplorer" rel="nofollow">WPExplorer Themes</a>';
		echo wp_kses_post( $copy );
	}
}