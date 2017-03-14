<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package gem
 */


 $sidebar_position = get_theme_mod( 'sidebar_position', 'right' );  ?>
 
 <?php if ( is_page_template('page-twosidebar.php') || 'two-sidebar' == $sidebar_position || is_page_template('page-twosidebarleft.php') || is_page_template('page-twosidebarright.php') || 'two-sidebar-left' == $sidebar_position || 'two-sidebar-right' == $sidebar_position ) { ?>
      <div id="secondary" class="widget-area four columns" role="complementary">
 <?php	}else { ?>
        <div id="secondary" class="widget-area five columns" role="complementary">
	<?php } ?>

    <div class="left-sidebar">
		<?php if (  is_active_sidebar( 'sidebar-left' ) ) {

			    if ( is_page_template('page-twosidebar.php') || 'two-sidebar' == $sidebar_position || is_page_template('page-twosidebarleft.php') || is_page_template('page-twosidebarright.php') || 'two-sidebar-left' == $sidebar_position || 'two-sidebar-right' == $sidebar_position ) { 
				      dynamic_sidebar( 'sidebar-left' );
				 } else { ?>
				<?php if( is_page() ) :
				if(function_exists('generated_dynamic_sidebar') ) {
					generated_dynamic_sidebar();
				}
				else {
					dynamic_sidebar( 'sidebar-left' );
				}
				else:
					dynamic_sidebar('sidebar-left');
				endif;
				}
		}else { ?>
            <aside id="search" class="widget widget_search">
			   <h4 class="widget-title"><?php _e( 'Search', 'gem' ); ?></h4>
				<?php get_search_form(); ?>
			</aside>
<?php   } ?>
	</div>

</div><!-- #secondary -->
