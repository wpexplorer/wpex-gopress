<?php
/**
 * Enqueues font awesome script
 *
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

function wpex_load_font_awesome() {
	wp_enqueue_style( 'font-awesome', WPEX_FRAMEWORK_DIR_URI .'/font-awesome/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'wpex_load_font_awesome' );