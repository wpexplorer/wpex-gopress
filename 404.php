<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content clr" role="main">
			<div id="error-page" class="clr boxed">
				<h1 id="error-page-title">404</h1>
				<p id="error-page-text">
				<?php _e( 'Unfortunately, the page you tried accessing could not be retrieved.', 'wpex-gopress' ); ?>
				</p>
			</div><!-- #error-page -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>