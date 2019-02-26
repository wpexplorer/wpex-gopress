<?php
/**
 * Used to display post author info
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */


if ( ! function_exists( 'wpex_post_author' ) ) {

	function wpex_post_author() {

		// Only display for standard posts
		if ( 'post' != get_post_type() ) {
			return;
		}  ?>

		<div class="author-info boxed clr">
			<h4 class="heading"><span><?php printf( __( 'Written by %s', 'wpex-gopress' ), get_the_author() ); ?></span></h4>
			<div class="author-info-inner clr">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 75 ) ); ?>
				</a>
				<div class="author-description">
					<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
				</div><!-- .author-description -->
			</div><!-- .author-info-inner -->
		</div><!-- .author-info -->

	<?php } // End function

} // End if