<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Gem
 */
?>
		</div> <!-- .container -->
	</div><!-- #content -->

	<?php do_action('gem_before_footer'); ?>

	<footer id="colophon" class="site-footer site-info footer-image" role="contentinfo">
	 <?php if ( get_theme_mod ('footer_overlay',false ) ) { 
				   echo '<div class="overlay overlay-footer"></div>';     
				} 
		$footer_widgets = get_theme_mod( 'footer_widgets',true );
		if( $footer_widgets ) : ?>
		<div class="footer-widgets">
			<div class="container">
				<?php get_template_part('footer','widgets'); ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="footer-bottom">
		<div class="container">
			<div class="copyright eight columns">
				<?php if( get_theme_mod('copyright') ) : ?>
					<p><?php echo get_theme_mod('copyright'); ?></p>
				<?php else : 
					do_action('gem_credits'); 
				endif;  ?>
			</div>
			<div class="eight columns footer-nav">
				<?php dynamic_sidebar( 'footer-nav' ); ?>
			</div>
		</div>
	</div>
	<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
	</footer><!-- #colophon -->

	<?php do_action('gem_after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
