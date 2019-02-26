<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="page-content content-none boxed clr">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wpex-gopress' ), admin_url( 'post-new.php' ) ); ?></p>
	<?php } elseif ( is_search() ) { ?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'wpex-gopress' ); ?></p>
	<?php } elseif ( is_category() ) { ?>
		<p><?php _e( 'There aren\'t any posts currently published in this category.', 'wpex-gopress' ); ?></p>
	<?php } elseif ( is_tax() ) { ?>
		<p><?php _e( 'There aren\'t any posts currently published under this taxonomy.', 'wpex-gopress' ); ?></p>
	<?php } elseif ( is_tag() ) { ?>
		<p><?php _e( 'There aren\'t any posts currently published under this tag.', 'wpex-gopress' ); ?></p>
	<?php } else { ?>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'wpex-gopress' ); ?></p>
	<?php } ?>
</div><!-- .page-content -->