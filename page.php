<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
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
		<div id="content" class="site-content left-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="clr">
					<?php if ( !is_front_page() ) { ?>
						<header class="page-header clr">
							<h1 class="page-header-title"><?php the_title(); ?></h1>
						</header><!-- #page-header -->
					<?php } ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="page-thumbnail">
							<?php the_post_thumbnail( 'wpex_page', array(
								'alt' => wpex_get_esc_title(),
							) ); ?>
						</div><!-- .page-thumbnail -->
					<?php } ?>
					<div class="entry clr">
						<?php the_content(); ?>
						<?php wp_link_pages( array(
							'before'      => '<div class="page-links clr">',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>'
						) ); ?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php edit_post_link( esc_html__( 'Edit Page', 'wpex-gopress' ), '<span class="edit-link clr">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post -->
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>