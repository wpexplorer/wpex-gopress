<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="wrap" class="clr container">
	
		<div id="header-wrap" class="clr">
			<header id="header" class="site-header clr" role="banner">
				<?php
				// Outputs the site logo
				// See functions/logo.php
				wpex_logo(); ?>
				<?php if ( get_theme_mod( 'header_aside', '1' ) ) { ?>
					<aside id="header-aside" class="clr">
						<?php echo get_theme_mod( 'wpex_header_aside', '<a href="http://www.wpexplorer.com/out/authentic-themes/" target="_blank" rel="nofollow"><img src="'. get_template_directory_uri() .'/images/banner.png" alt="Banner" /></a>'); ?>
					</aside>
				<?php } ?>
			</header><!-- #header -->
		</div><!-- #header-wrap -->

		<div id="site-navigation-wrap">
			<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>
			<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
				<a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span><?php echo __( 'Menu', 'wpex-gopress' ); ?></a>
				<?php
				// Display main menu
				wp_nav_menu( array(
					'theme_location'	=> 'main_menu',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'dropdown-menu sf-menu',
					'fallback_cb'		=> false
				) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- #site-navigation-wrap -->
		
		<div id="main" class="site-main clr">