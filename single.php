<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div id="primary" class="content-area clr">
	<div id="content" class="site-content left-content clr" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="single-post-article boxed clr">
				<?php
				if ( ! post_password_required() ) {
					get_template_part( 'content', get_post_format() );
				} ?>
				<header class="page-header clr">
					<h1 class="page-header-title"><?php the_title(); ?></h1>
					<?php
					// Display post meta
					// See functions/commons.php
					wpex_post_meta(); ?>
				</header><!-- .page-header -->
				<div class="entry clr">
					<?php the_content(); ?>
				</div><!-- .entry -->
				<footer class="entry-footer">
					<?php edit_post_link( esc_html__( 'Edit Post', 'wpex-gopress' ), '<span class="edit-link clr">', '</span>' ); ?>
				</footer><!-- .entry-footer -->
			</article>
			<?php
			// Display author bio
			// See functions/commons.php
			wpex_post_author(); ?>
			<?php
			// Related Posts
			// See functions/related-posts.php
			wpex_related_posts(); ?>
			<?php comments_template(); ?>
			<?php wp_link_pages( array(
				'before'      => '<div class="page-links clr">',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) ); ?>
		<?php endwhile; ?>
	</div><!-- #content -->
	<?php get_sidebar(); ?>
</div><!-- #primary -->

<?php wpex_next_prev(); ?>

<?php get_footer(); ?>