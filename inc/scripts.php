<?php
/**
 * This file loads custom css and js for our theme
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

function wpex_load_scripts() {
	$dir_uri = get_template_directory_uri();

	/** CSS **/
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'wpex-responsive', wpex_asset_url( 'css/responsive.css' ) );
	wp_enqueue_style( 'wpex-google-font-lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' );
	
	if ( function_exists( 'wpcf7_enqueue_styles') ) {
		wp_dequeue_style( 'contact-form-7' );
	}

	/** jQuery **/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'wpex-plugins', wpex_asset_url( 'js/plugins.js' ), array( 'jquery' ), '1.7.5', true );
	wp_enqueue_script( 'wpex-global', wpex_asset_url( 'js/global.js' ), array( 'jquery', 'wpex-plugins' ), '1.7.5', true );
	
}
add_action( 'wp_enqueue_scripts','wpex_load_scripts' );