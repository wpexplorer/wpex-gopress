<?php
/**
 * Main theme support functions
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

if ( ! function_exists( 'wpex_theme_setup' ) ) {
	function wpex_theme_setup() {

		// Content Width
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 920;
		}
	
		// Register navigation menus
		register_nav_menus( array(
			'main_menu'	=> esc_html__( 'Main', 'wpex-gopress' ),
		) );
		
		// Localization support
		load_theme_textdomain( 'wpex-gopress', get_template_directory() .'/languages' );
		
		// Enable some useful post formats for the blog
		add_theme_support( 'post-formats', array( 'video' ) );
			
		// Add theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );

		// Set default thumbnail size
		set_post_thumbnail_size( 150, 150 );
	
	}
}
add_action( 'after_setup_theme', 'wpex_theme_setup' );
