<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package gem
 */



 $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
 if ( is_page_template('page-twosidebar.php') || 'two-sidebar' == $sidebar_position || is_page_template('page-twosidebarleft.php') || is_page_template('page-twosidebarright.php') || 'two-sidebar-left' == $sidebar_position || 'two-sidebar-right' == $sidebar_position ) { ?>
      <div id="secondary" class="widget-area four columns" role="complementary">
 <?php	}else { ?>
        <div id="secondary" class="widget-area five columns" role="complementary">
	<?php } ?>

	<div class="left-sidebar">
<?php	if (  is_active_sidebar( 'sidebar-1' ) ) {
			 if( is_page() ) :
				if( function_exists('generated_dynamic_sidebar') ) {
					generated_dynamic_sidebar();
				}
				else {
					dynamic_sidebar( 'sidebar-1' );
				}
			else:
				dynamic_sidebar('sidebar-1');
			endif;
		} else { ?>
			<aside id="meta" class="widget">
				<h4 class="widget-title"><?php _e( 'Meta', 'gem' ); ?></h4>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
	       </aside>

<?php }  ?>
	</div>

</div><!-- #secondary -->
