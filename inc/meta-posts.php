<?php
/**
 * Add metabox to posts
 *
 * @package   GoPress WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.stplorer.com
 * @since     1.0.0
 */

// Only needed for the admin side
if ( ! is_admin() ) {
	return;
}

/** 
 * The Class.
 */
class WPEX_Post_Meta_Settings {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes_post', array( 'WPEX_Post_Meta_Settings', 'add_meta_box' ), 11 );
		add_action( 'save_post', array( 'WPEX_Post_Meta_Settings', 'save' ) );
		add_action( 'admin_enqueue_scripts', array( 'WPEX_Post_Meta_Settings', 'load_css' ) );
	}

	/**
	 * Adds the meta box container.
	 */
	public static function add_meta_box() {
		add_meta_box(
			'wpex_post_settings_metabox',
			esc_html__( 'Post Settings', 'wpex-gopress' ),
			array( 'WPEX_Post_Meta_Settings', 'render_meta_box_content' ),
			'post',
			'advanced',
			'high'
		);
	}

	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public static function render_meta_box_content( $post ) {

		// Get meta prefix
		$prefix = 'wpex_';
	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'wpex_post_meta_settings_action', 'wpex_post_meta_settings_nonce' );

		// Open metabox
		echo '<table class="form-table wpex-metabox-table"><tbody>';

			/**** POST Video ****/
			$value = htmlspecialchars_decode( stripslashes( get_post_meta( $post->ID, $prefix .'post_video', true ) ) );
			echo '<tr>';
				echo '<th><p><label for="'. $prefix .'post_video">'. esc_html__( 'Video', 'wpex-gopress' ) .'</label></p></th>';
				echo '<td><input type="text" id="'. $prefix .'post_video" name="'. $prefix .'post_video" value="'. esc_url( $value ) .'" />';
				echo '<br /><small>'. esc_html__( 'Enter your oEmbed compatible video URL here.', 'wpex-gopress' ) .'</small>';
				echo '</td>';
			echo '</tr>';

		// Close metabox
		echo '</tbody></table>';

	}

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public static function save( $post_id ) {
	
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */
		
		// Get type
		if ( ! isset( $_POST['post_type'] ) ) {
			return;
		}

		// Check type
		if ( 'post' != $_POST['post_type'] ) {
			return;
		}

		// Check if our nonce is set.
		if ( ! isset( $_POST['wpex_post_meta_settings_nonce'] ) ) {
			return $post_id;
		}

		$nonce = $_POST['wpex_post_meta_settings_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'wpex_post_meta_settings_action' ) ) {
			return $post_id;
		}

		// If this is an autosave, our form has not been submitted,
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Check the user's permissions.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		/* OK, its safe for us to save the data now. */

			// Get meta prefix
			$prefix = 'wpex_';

			// Save Post Video
			$val = isset( $_POST[$prefix .'post_video'] ) ? htmlspecialchars_decode( stripslashes( $_POST[$prefix .'post_video'] ) ) : '';
			if ( $val ) {
				update_post_meta( $post_id, $prefix .'post_video', $val );
			} else {
				delete_post_meta( $post_id, $prefix .'post_video' );
			}

	}

	/**
	 * Adds metabox CSS
	 */
	public static function load_css( $hook ) {
		if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
			wp_enqueue_style( 'wpex-metaboxes', wpex_asset_url( 'css/metaboxes.css' ) );
		}
	}

}
new WPEX_Post_Meta_Settings();