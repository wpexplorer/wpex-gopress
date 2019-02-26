<?php
/**
 * The default template for displaying search results
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	// Display post thumbnail
	if ( has_post_thumbnail() && get_theme_mod( 'wpex_blog_entry_thumb', '1' ) == '1' ) { ?>
		<div class="loop-entry-left search-entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
				<?php the_post_thumbnail( 'wpex_search_entry', array(
					'alt' => wpex_get_esc_title(),
				) ); ?>
			</a>
		</div><!-- .loop-entry-left -->
	<?php } ?>
	<div class="loop-entry-right clr">
		<header>
			<h2 class="search-entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="search-entry-content entry clr">
			<?php wpex_excerpt( 50 ); ?>
		</div><!-- .search-entry-content -->
	</div><!-- .loop-entry-right -->
</article><!-- .search-entry -->