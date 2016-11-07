<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content left-content clr" role="main">
			<header class="page-header boxed clr">
				<h1 class="page-header-title"><?php printf( __( 'Search Results for: %s', 'wpex-gopress' ), get_search_query() ); ?></h1>
			</header>
			<?php if ( have_posts() ) { ?>
				<div id="blog-wrap" class="clr">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'search' ); ?>
					<?php endwhile; ?>
				</div><!-- #clr -->
				<?php wpex_pagination(); ?>
			<?php } else { ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php } ?>
		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>