<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<aside id="secondary" class="sidebar-container" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area"><?php dynamic_sidebar( 'sidebar' ); ?></div>
		</div>
	</aside><!-- #secondary -->
<?php endif; ?>