<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

	</div><!-- #main-content -->

	<footer id="footer-wrap" class="site-footer">
		<div id="footer">
			<div id="footer-widgets" class="clr">
				<div class="footer-box clr">
					<?php dynamic_sidebar( 'footer-one' ); ?>
				</div><!-- .footer-box -->
				<div class="footer-box clr">
					<?php dynamic_sidebar( 'footer-two' ); ?>
				</div><!-- .footer-box -->
				<div class="footer-box clr">
					<?php dynamic_sidebar( 'footer-three' ); ?>
				</div><!-- .footer-box -->
			</div><!-- #footer-widgets -->
		</div><!-- #footer -->
		<div id="copyright" role="contentinfo" class="clr">
			<?php
			// Displays copyright info
			// See functions/copyright.php
			wpex_copyright(); ?>
		</div><!-- #copyright -->
	</footer><!-- #footer-wrap -->

</div><!-- #wrap -->

<?php wp_footer(); ?>
</body>
</html>