<?php
/**
 * Used to display your latest posts
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
			<?php if ( ! is_front_page() ) { ?>
				<header class="page-header clr">
					<h1 class="page-header-title"><?php echo get_the_title( get_option( 'page_for_posts', true ) ); ?></h1>
				</header><!-- .page-header -->
			<?php } ?>
			<?php if ( have_posts() ) : ?>
				<?php get_template_part('content-featured','slider'); ?>
				<div id="blog-wrap" class="clr">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
				</div><!-- #post -->
				<?php wpex_pagination(); ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
			</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>