<?php
/**
 * The default template for displaying post content.
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Single Post
if ( is_singular() && is_main_query() ) { ?>

	<?php if ( has_post_thumbnail() && get_theme_mod( 'wpex_blog_post_thumb', '1' ) == '1' ) { ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'wpex_post', array(
				'alt' => wpex_get_esc_title(),
			) ); ?>
		</div><!-- .post-thumbnail -->
	<?php } ?>

<?php }

// Entries
else { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		// Display post thumbnail
		if ( has_post_thumbnail() && get_theme_mod( 'wpex_blog_entry_thumb', true ) ) { ?>
			<div class="loop-entry-left loop-entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
					<?php the_post_thumbnail( 'wpex_entry', array(
						'alt' => wpex_get_esc_title(),
					) ); ?>
				</a>
			</div><!-- .post-entry-left -->
		<?php } ?>
		<div class="loop-entry-right clr">
			<header>
				<h2 class="loop-entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<?php
				// Display post meta details
				wpex_post_meta() ;?>
			</header>
			<div class="loop-entry-content entry clr">
				<?php if ( get_theme_mod( 'wpex_entry_content_excerpt', 'excerpt' ) == 'content' ) {
					the_content();
				} else {
					wpex_excerpt( 30, get_theme_mod( 'wpex_blog_readmore' ) );
				} ?>
			</div><!-- .loop-entry-content -->
		</div><!-- .loop-entry-right -->
	</article><!-- .loop-entry -->

<?php } ?>