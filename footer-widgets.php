<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Gem
 */

?>


		<div class="four columns">
			<?php 
			if ( is_active_sidebar( 'footer' ) ) :
				dynamic_sidebar('footer');
			else: ?>
				<aside id="meta" class="widget">
					<h4 class="widget-title"><?php _e( 'Meta', 'gem' ); ?></h4>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
		       </aside>

		    <?php endif; ?>
		</div>

		<div class="four columns">
			<?php 
			if ( is_active_sidebar( 'footer-2' ) ) :
				dynamic_sidebar('footer-2');
			else: ?>
			<aside id="archives" class="widget">
				<h4 class="widget-title"><?php _e( 'Archives', 'gem' ); ?></h4>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

		    <?php endif; ?>
		</div>

		<div class="four columns">
			<?php 
			if ( is_active_sidebar( 'footer-3' ) ) :
				dynamic_sidebar('footer-3');
			else: ?>
			<aside id="search" class="widget widget_search">
			<h4 class="widget-title"><?php _e( 'Search', 'gem' ); ?></h4>
				<?php get_search_form(); ?>
			</aside>

		    <?php endif; ?>
		</div>

		<div class="four columns omega">
			<?php 
			if ( is_active_sidebar( 'footer-4' ) ) :
				dynamic_sidebar('footer-4');
			else: ?>
				<aside id="meta" class="widget">
					<h4 class="widget-title"><?php _e( 'Meta', 'gem' ); ?></h4>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
		       </aside>

		    <?php endif; ?>
		</div>
