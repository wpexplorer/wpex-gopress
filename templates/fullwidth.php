<?php
/**
 * Template Name: Fullwidth
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
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="clr">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="page-thumbnail">
							<?php the_post_thumbnail( 'wpex_page_full', array(
								'alt' => wpex_get_esc_title(),
							) ); ?>
						</div><!-- .page-thumbnail -->
					<?php } ?>
					<?php if ( !is_front_page() ) { ?>
						<header class="page-header clr">
							<h1 class="page-header-title"><?php the_title(); ?></h1>
						</header><!-- #page-header -->
					<?php } ?>
					<div class="entry clr">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit Page', 'wpex-gopress' ), '<span class="edit-link clr">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post -->
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>