<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
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
			<header class="page-header clr">
				<h1 class="page-header-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'wpex-gopress' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'wpex-gopress' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'wpex-gopress' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'wpex-gopress' ), get_the_date( _x( 'Y', 'yearly archives date format', 'wpex-gopress' ) ) );
					else :
						echo single_term_title();
					endif;
				?></h1>
				<?php if ( term_description() ) { ?>
					<div id="archive-description" class="clr">
						<?php echo term_description(); ?>
					</div><!-- #archive-description -->
				<?php } ?>
			</header><!-- .page-header -->
			<?php if ( have_posts() ) { ?>
				<div id="blog-wrap" class="clr">   
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
				</div><!-- #blog-wrap -->
				<?php wpex_pagination(); ?>
			<?php } else { ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php } ?>
		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>