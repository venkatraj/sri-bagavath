<?php
/**
 * @package Gem
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		$featured_image = get_theme_mod( 'featured_image',true );
	    $featured_image_size = get_theme_mod ('featured_image_size','1');
	if( $featured_image ) : ?>
		<div class="post-thumb blog-thumb">
		  <?php if ( has_post_thumbnail() && ! post_password_required() ) :
		                if( $featured_image_size == '1' ) : 			
						    the_post_thumbnail('gem-blog-full-width');	 
		                elseif( $featured_image_size == '2' ) :                          
					        the_post_thumbnail('gem-small-featured-image-width');
					    elseif( $featured_image_size == '3' ) :                          
					        the_post_thumbnail('full');	
					    elseif( $featured_image_size == '4' ) :                          
					        the_post_thumbnail('medium');
					    elseif( $featured_image_size == '5' ) :                          
					        the_post_thumbnail('large');	
					    endif;					
	            endif;  ?>
	    </div>
	<?php endif; ?> 

	<?php do_action('gem_before_entry_header'); ?>

		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

				<?php if ( get_theme_mod('enable_single_post_top_meta', true ) ): ?>
					<footer class="entry-meta">
						<?php if(function_exists('gem_entry_top_meta') ) {
						    gem_entry_top_meta(); 
						} ?> 
					</footer><!-- .entry-footer -->
				<?php endif;?>  
		</header><!-- .entry-header -->

	<?php do_action('gem_after_entry_header'); ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content();
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gem' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

<?php do_action('gem_before_entry_footer'); ?>
	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
		<footer class="entry-footer">
			<?php if(function_exists('gem_entry_bottom_meta') ) {
			     gem_entry_bottom_meta();
			} ?>
		</footer><!-- .entry-footer -->
	<?php endif;?>
<?php do_action('gem_after_entry_footer'); ?>

</article><!-- #post-## -->