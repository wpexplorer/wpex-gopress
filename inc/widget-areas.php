<?php
/**
 * Define sidebars for use in this theme
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

function wpex_register_widget_areas() {

	// Sidebar
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar', 'wpex-gopress' ),
		'id'			=> 'sidebar',
		'description'	=> esc_html__( 'Widgets in this area are used in the sidebar region.', 'wpex-gopress' ),
		'before_widget'	=> '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="widget-title">',
		'after_title'	=> '</div>',
 	) );

	// Footer 1
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer 1', 'wpex-gopress' ),
		'id'			=> 'footer-one',
		'description'	=> esc_html__( 'Widgets in this area are used in the first footer region.', 'wpex-gopress' ),
		'before_widget'	=> '<div id="%1$s" class="footer-widget %2$s clr">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="widget-title">',
		'after_title'	=> '</div>',
 	) );

	// Footer 2
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer 2', 'wpex-gopress' ),
		'id'			=> 'footer-two',
		'description'	=> esc_html__( 'Widgets in this area are used in the second footer region.', 'wpex-gopress' ),
		'before_widget'	=> '<div id="%1$s" class="footer-widget %2$s clr">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="widget-title">',
		'after_title'	=> '</div>',
 	) );

	// Footer 3
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer 3', 'wpex-gopress' ),
		'id'			=> 'footer-three',
		'description'	=> esc_html__( 'Widgets in this area are used in the third footer region.', 'wpex-gopress' ),
		'before_widget'	=> '<div id="%1$s" class="footer-widget %2$s clr">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="widget-title">',
		'after_title'	=> '</div>',
 	) );

}
add_action( 'widgets_init', 'wpex_register_widget_areas' );