<?php
/**
 * Displays related posts (category based)
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */


if ( ! function_exists( 'wpex_related_posts' ) ) {

	function wpex_related_posts() {

		// Return if disabled
		if ( ! get_theme_mod( 'blog_related', true ) ) {
			return;
		}
		
		// Get Post Data
		global $post; // Needed so the related query doesn't break.
		$post_id = get_the_ID();

		// Return if not standard post type
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Theme Settings
		$disable_related_items = get_post_meta( $post_id, 'wpex_disable_related_items', true );
		$posts_per_page        = get_theme_mod( 'blog_related_count', '3' );
	
		// Create an array of current category ID's
		$cats = wp_get_post_terms( $post_id, 'category' );
		$cats_ids = array();
		foreach( $cats as $wpex_related_cat ) {
			$cats_ids[] = $wpex_related_cat->term_id;
		}
		
		// Related query arguments
		$args = array(
			'posts_per_page'		=> $posts_per_page,
			'orderby' 				=> 'rand',
			'category__in'			=> $cats_ids,
			'post__not_in'			=> array( $post_id ),
			'no_found_rows'			=> true,
			'tax_query'				=> array(
			'relation'	=> 'AND',
				array(
					'taxonomy'		=> 'post_format',
					'field' 		=> 'slug',
					'terms' 		=> array( 'post-format-quote', 'post-format-link' ),
					'operator'		=> 'NOT IN',
				),
			),
		);
		$args = apply_filters( 'wpex_related_posts_args', $args );
		$wpex_query = new wp_query( $args );
		if ( $wpex_query->have_posts() ) { ?>
			 <section class="related-posts clr">
				<div class="related-posts-title heading"><span><?php _e( 'Related Posts', 'wpex-gopress' ); ?></span></div>
				<div class="related-posts-row clr">
					<?php
					// Loop through related posts
					$count=0;
					foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
					$count++; ?>
						<article class="related-post-entry clr">
							<?php
							// Display related post thumbnail
							if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>" class="related-post-entry-thumbnail">
									<?php the_post_thumbnail( 'wpex_post_related', array(
										'alt' => wpex_get_esc_title(),
									) ); ?>
									<?php if ( 'video' == get_post_format() ) { ?>
										<div class="related-post-entry-video-overlay"><span class="fa fa-play-circle-o"></span></div>
									<?php } ?>
								</a>
							<?php } ?>
							<div class="related-post-entry-content clr">
								<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>" class="related-post-entry-title"><?php the_title(); ?></a>
								<div class="related-post-entry-excerpt clr">
									<?php wpex_excerpt( '15', false ); ?>
								</div><!-- related-post-entry-excerpt -->
							</div><!-- .related-post-entry-content -->
						</article><!-- .related-post-entry -->
					<?php endforeach; ?>
				</div><!-- .related-posts-row -->
			 </section>
		<?php } // End related items
		
		// Reset query
		wp_reset_postdata();

	} // End function

} // End if