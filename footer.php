<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fashify
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php $enable_staff_picks = get_theme_mod( 'fashify_staff_picks', '' ) ;

		if ( $enable_staff_picks == true ) {
			get_template_part( 'template-parts/content', 'staff' );
		}

		?>

		<div class="footer-widgets">
			<div class="container">
				<div class="footer-inner">
					<?php
						if ( is_active_sidebar( 'footer' ) ) {
							dynamic_sidebar( 'footer' );
						}
					?>
				</div>
			</div>
		</div>

		<div class="site-info">
			<div class="container">

				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ) ?>

				<?php
			   /**
				* hooked onepress_footer_site_info
				* @see onepress_footer_site_info
				*/
			   do_action('fashify_footer_site_info');
			   ?>

			</div>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
