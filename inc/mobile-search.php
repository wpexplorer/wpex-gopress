<?php
/**
 * Used to add a mobile search to the sidr container
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
*/


add_action( 'wp_footer', 'wpex_mobile_search' );

if ( ! function_exists( 'wpex_mobile_search' ) ) {
	function wpex_mobile_search() { ?>
		<div id="mobile-search">
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" id="mobile-search-form">
				<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr_e( 'To search type and hit enter', 'wpex-gopress' ); ?>" />
			</form>
		</div>
	<?php }
}