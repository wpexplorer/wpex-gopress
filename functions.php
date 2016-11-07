<?php
/**
 * Theme functions and definitions.
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
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Main theme class
class WPEX_GoPress_Theme {

	/**
	 * Main Theme Class Constructor
	 *
	 * @since  2.0
	 * @access public
	 */
	public function __construct() {

		// Theme Specific Constants
		define( 'WPEX_THEME_NAME', 'GoPress' );
		define( 'WPEX_THEME_VERSION', '2.0.0' );
		define( 'WPEX_FRAMEWORK_DIR', get_template_directory() .'/inc/framework' );
		define( 'WPEX_FRAMEWORK_DIR_URI', get_template_directory_uri() .'/inc/framework' );
		define( 'WPEX_INC_DIR', get_template_directory() .'/inc' );
		define( 'WPEX_INC_DIR_URI', get_template_directory_uri() .'/inc' );
		define( 'WPEX_THEME_MAIN_STYLE_HANDLE', 'wpex-main' );
		define( 'WPEX_THEME_MAIN_JS_HANDLE', 'wpex-main' );

		// Updates
		if ( is_admin() ) {
			require_once( WPEX_INC_DIR .'/updates.php' );
		}

		// Include files (functions & classes )
		self::includes();

	}

	/**
	 * Load required theme functions
	 *
	 * @since  2.0
	 * @access public
	 */
	public static function includes() {
		require_once( WPEX_INC_DIR . '/helpers.php' );
		require_once( WPEX_INC_DIR . '/theme-setup.php' );
		require_once( WPEX_INC_DIR . '/theme-customizer/general.php' );
		require_once( WPEX_INC_DIR . '/widget-areas.php' );
		require_once( WPEX_INC_DIR . '/deprecated.php' );
		require_once( WPEX_INC_DIR . '/image-sizes.php' );

		// Admin only functions
		if ( is_admin() ) {

			require_once( WPEX_INC_DIR . '/meta-posts.php' );
			require_once( WPEX_INC_DIR . '/mce.php' );

		// Non admin functions
		} else {

			// Framework functions/classes
			require_once( WPEX_FRAMEWORK_DIR .'/font-awesome/font-awesome.php' );

			// Theme specific
			require_once( WPEX_INC_DIR . '/pre-get-posts.php' );
			require_once( WPEX_INC_DIR . '/logo.php' );
			require_once( WPEX_INC_DIR . '/scripts.php' );
			require_once( WPEX_INC_DIR . '/comments-callback.php' );
			require_once( WPEX_INC_DIR . '/pagination.php' );
			require_once( WPEX_INC_DIR . '/excerpts.php' );
			require_once( WPEX_INC_DIR . '/posts-per-page.php' );
			require_once( WPEX_INC_DIR . '/copyright.php' );
			require_once( WPEX_INC_DIR . '/related-posts.php' );
			require_once( WPEX_INC_DIR . '/post-meta.php' );
			require_once( WPEX_INC_DIR . '/next-prev.php' );
			require_once( WPEX_INC_DIR . '/post-video.php' );
			require_once( WPEX_INC_DIR . '/post-author.php' );
			require_once( WPEX_INC_DIR . '/post-classes.php' );
			require_once( WPEX_INC_DIR . '/mobile-search.php' );

		}

		// Dashboard feed
		if ( ! defined( 'WPEX_DISABLE_THEME_DASHBOARD_FEEDS' ) ) {
			require_once( WPEX_INC_DIR .'/dashboard-feed.php' );
		}
		
		// About page
		if ( ! defined( 'WPEX_DISABLE_THEME_ABOUT_PAGE' ) ) {
			require_once( WPEX_INC_DIR .'/about.php' );
		}

	}

}
new WPEX_GoPress_Theme;

// Theme info
function wpex_get_theme_info() {
	return array(
		'name'      => WPEX_THEME_NAME,
		'dir'       => get_template_directory_uri() .'/inc/',
		'url'       => 'http://www.wpexplorer.com/gopress-wordpress-theme/',
		'changelog' => 'https://wpexplorer-updates.com/changelog/gopress/ ',
	);
}