<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
?>


	</div><!-- /main-content -->
	</div><!-- /wrap -->
	
	<div id="footer-container" class="container">
		<div id="bottom-socials" class="left">
			<?php wp_nav_menu( array('menu' => 'Bottom socials' )); ?>
		</div>
		<div id="contact-information" class="right">
			<div class="contact-logo left">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-logos.png" alt="Easter Seals Goodwill" title="Easter Seals Goodwill" />
			</div>
			<div class="contact-text right">
				<p>Easter Seals Goodwill Industries</p>
				<p>432 Washington Avenue</p>
				<p>North Haven, CT 06473</p>
				<p>(203) 777-2000 or (888) 909-8188</p>
			</div>
		</div>
		<div id="footer-links">
			<?php wp_nav_menu( array('menu' => 'Main menu', 'depth' => 1)); ?>
			<?php wp_nav_menu( array('menu' => 'Footer menu')); ?>
			<p>Easter Seals Goodwill Industries and its affiliate organizations are 501(c)(3) nonprofit organizations.</p>
		</div>
		<?php if( of_get_option( 'widgetized_footer' ) ) { ?>
			<footer id="footer" class="site-footer">
				<div id="footer-widgets" class="row clr">
					<div class="footer-box span_6 col clr-margin">
						<?php dynamic_sidebar('footer-one'); ?>
					</div><!-- .footer-box -->
					<div class="footer-box span_6 col">
						<?php dynamic_sidebar('footer-two'); ?>
					</div><!-- .footer-box -->
					<div class="footer-box span_6 col">
						<?php dynamic_sidebar('footer-three'); ?>
					</div><!-- .footer-box -->
					<div class="footer-box span_6 col">
						<?php dynamic_sidebar('footer-four'); ?>
					</div><!-- .footer-box -->
				</div><!-- #footer-widgets -->
			</footer><!-- #footer -->
		<?php } ?>
		<div id="footer-bottom" class="row clr">
			<div id="copyright" class="span_12 col clr-margin" role="contentinfo">
				<?php
				// Copyright
				if ( of_get_option( 'custom_copyright' ) ) {
					echo do_shortcode( of_get_option( 'custom_copyright' ) );
				} ?>
			</div><!-- /copyright -->
			<div id="footer-menu" class="span_12 col">
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'footer_menu',
					'sort_column'		=> 'menu_order',
					'fallback_cb'		=> '',
				)); ?>
			</div><!-- /footer-menu -->
		</div><!-- /footer-bottom -->
	</div>

<?php wp_footer(); ?>
</body>
</html>