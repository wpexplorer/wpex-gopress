<?php
/**
 * Used to display a featured category slider
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get featured category
$wpex_featured_cat = get_theme_mod( 'wpex_homepage_slider_cat' );

// Show homepage featured slider if theme panel category isn't blank
if ( $wpex_featured_cat !== '' && $wpex_featured_cat !== '-1' ) {
		
	// Get posts based on featured category
	$wpex_query = new WP_Query( array(
		'post_type'			=>'post',
		'posts_per_page'	=> get_theme_mod( 'wpex_homepage_slider_count', '4' ),
		'no_found_rows'		=> true,
		'tax_query'			=> array(
			'relation'		=> 'AND',
			array(
				'taxonomy'	=> 'category',
				'field'		=> 'ID',
				'terms'		=> $wpex_featured_cat
				)
			),
		'meta_query'	=> array(
			array(
				'key'	=> '_thumbnail_id',
			)
		)
	) );
	
	if ( $wpex_query->have_posts() ) {
		
		// Get Scripts
		wp_enqueue_script( 'flexslider', wpex_asset_url( 'js/flexslider.js' ), array( 'jquery' ), '', true );
		wp_enqueue_script( 'wpex-flexslider-home', wpex_asset_url( 'js/flexslider-home.js' ), array( 'flexslider' ), '', true); ?>
		<div id="featured-slider-wrap" class="clr">
			<div id="featured-slider" class="flexslider-container">
				<div class="flexslider">
					<ul class="slides">
						<?php
						// Loop through each post
						while( $wpex_query->have_posts() ) : $wpex_query->the_post(); ?> 
							<li class="featured-slider-slide">
								<div class="featured-slider-img">
									<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
										<?php the_post_thumbnail( 'wpex_home_slider', array(
											'alt' => wpex_get_esc_title(),
										) ); ?>
									</a>
								</div><!-- .featured-slider-img -->
								<article class="featured-slider-caption">
									<h2 class="featured-slider-caption-title"><a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									<div class="featured-slider-caption-excerpt clr">
										<?php echo wpex_excerpt('20'); ?>
									</div><!-- .featured-slider-caption-excerpt -->
								</article><!--.featured-slider-caption -->
							</li><!-- .featured-slider-->
						<?php endwhile; ?>
					</ul><!--.slides -->
				</div><!-- .flexslider -->
				<span class="featured-slider-preloader"><span class="fa fa-spinner fa-spin"></span></span>
			</div><!-- #featured-flexslider -->
		</div><!-- #featured-slider-wrap -->
	<?php } ?>
	<?php wp_reset_postdata(); ?>
<?php } ?>