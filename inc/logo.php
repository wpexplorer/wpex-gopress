<?php
/**
 * Outputs the site logo 
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

if ( ! function_exists( 'wpex_logo' ) ) {
	
	function wpex_logo() {

		// Vars
		$logo_img  = get_theme_mod('wpex_logo');
		$blog_name = get_bloginfo( 'name' );
		$home_url  = home_url( '/' ); ?>

		<div id="logo" class="clr">
			<?php if ( $logo_img ) { ?>
				<a href="<?php echo esc_url( $home_url ); ?>" title="<?php echo esc_attr( $blog_name ); ?>" rel="home"><img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( $blog_name ); ?>" /></a>
			<?php } else { ?>
				<div class="site-text-logo clr">
					<a href="<?php echo esc_url( $home_url ); ?>" title="<?php echo esc_attr( $blog_name ); ?>" rel="home"><?php echo esc_html( $blog_name ); ?></a>
				</div>
			<?php } ?>
			<?php if ( get_theme_mod( 'wpex_header_description', true ) && $blog_description = get_bloginfo( 'description' ) ) { ?>
				<div class="blog-description"><?php echo wp_kses_post( $blog_description ); ?></div>
			<?php } ?>
		</div><!-- #logo -->

		<?php
	} // end wpex_copyright

} // end function_exists 