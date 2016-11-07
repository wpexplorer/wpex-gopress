<?php
/**
 * Outputs the post video
 * Based on the wpex_post_video custom field
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */


if ( ! function_exists( 'wpex_post_video' ) ) {

	function wpex_post_video() {

		global $post;
		$post_id = $post->ID;
		$video_url = get_post_meta( $post_id, 'wpex_post_video', true );
		if ( $video_url == '' ) return;
		$embed_code = wp_oembed_get( $video_url );
		if ( $video_url !== '' && !is_wp_error($embed_code) ) {
			echo '<div class="post-video wpex-video-embed clr">'. $embed_code .'</div>';
		}

	}

}