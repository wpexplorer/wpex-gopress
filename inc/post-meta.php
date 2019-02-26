<?php
/**
 * Used to output post meta info
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */


if ( ! function_exists( 'wpex_post_meta' ) ) {

	function wpex_post_meta() {
		
		// Post Data
		$post_id = get_the_ID();

		// Do not display if password protected
		if ( post_password_required( $post_id ) ) {
			return;
		} ?>
		
		<ul class="post-meta clr">
			<li class="meta-date">
				<span class="fa fa-clock-o"></span><span class="meta-date-text"><?php echo get_the_date(); ?></span>
			</li>
			<?php if ( 'post' == get_post_type( $post_id ) ) : ?>
				<li class="meta-category">
					<span class="fa fa-folder-o"></span><?php the_category( ', ' ); ?>
				</li>
			<?php endif; ?>
			<?php if ( comments_open( $post_id ) ) { ?>
				<li class="meta-comments comment-scroll">
					<span class="fa fa-comments-o"></span><?php comments_popup_link( __( '0 Comments', 'wpex-gopress' ), __( '1 Comment',  'wpex-gopress' ), __( '% Comments', 'wpex-gopress' ), 'comments-link' ); ?>
				</li>
			<?php } ?>
		</ul><!-- .post-meta -->
		
		<?php
		
	} // End function
	
} // End if