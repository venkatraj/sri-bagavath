<?php 
/**
 * The front page template file.
 *
 *
 * @package Gem
 */
	if( 'posts' == get_option('show_on_front') ) {
		include get_home_template();
	} else {	
get_header();
		if ( get_theme_mod('page-builder',false) ) { 
			if( get_theme_mod('flexslider') ) {   
				echo do_shortcode( get_theme_mod('flexslider'));
			} ?>

			<div id="content" class="site-content container">
			<?php  if( get_theme_mod('home_sidebar',false ) ) { ?>
				<div id="primary" class="content-area eleven columns">
			<?php }else { ?>
			    <div id="primary" class="content-area sixteen columns">
			<?php } ?>
					<main id="main" class="site-main" role="main">
						<?php
							while ( have_posts() ) : the_post();
								the_content();    
							endwhile;
						?>
						
				     </main><!-- #main -->
			     </div><!-- #primary -->
		
<?php	}else{
				$gem_slider_cat = get_theme_mod( 'slider_cat', '' );
				$gem_slider_count = get_theme_mod( 'slider_count', 5 );
				$gem_slider_posts = array(
					'cat' => absint($gem_slider_cat),
					'posts_per_page' => absint($gem_slider_count)
				);
		if( get_theme_mod('enable_slider',true) ) {
				if ($gem_slider_cat) {

				$gem_query = new WP_Query($gem_slider_posts);
				if( $gem_query->have_posts()) : ?>
					<div class="flexslider">
						<ul class="slides">
				<?php while($gem_query->have_posts()) :
						$gem_query->the_post();
						if( has_post_thumbnail() ) : ?>
						    <li>
						    	<div class="flex-image">
						    		<?php the_post_thumbnail('full'); ?>
						    	</div>
						    	<div class="flex-caption">
						    		<?php the_content(); ?>
						    	</div>
						    </li>
						<?php endif; ?>
				<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>
			<?php  
				$gem_query = null;
				wp_reset_postdata();
				}else{	?>	
		 <div class="flexslider">  
				<ul class="slides">	          
					<li>   	
						<div class="flex-image">
							<?php echo '<img src="' . get_template_directory_uri() . '/images/slider.jpg" alt="" >';?>	
						</div>
						<?php	$slide_description = sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ) ). Go to Customizer and click Gem Options => Home and select Slider Post Category and No.of Sliders.</p><p><a href="%1$s"target="_blank"> Read More </a></p>', 'gem'),  admin_url('customize.php') );?>
						<div class="flex-caption"> <?php echo $slide_description;?></div>
					</li>
				</ul>
			</div><!-- flex-slider end -->	
<?php		
	}
}
	?>
	<div id="content" class="site-content free-home">
		<div class="container">	
		   <?php  if( get_theme_mod('home_sidebar',false ) ) { ?>
				<div id="primary" class="content-area eleven columns">
			<?php }else { ?>
			    <div id="primary" class="content-area sixteen columns">
			<?php } ?>	
				<main id="main" class="site-main" role="main">
				<?php do_action('gem_service_content_before'); ?>
			<?php if(get_theme_mod('enable_service',true) ) { ?>
			   	<div class="post-wrapper-head">
					<h2><?php echo apply_filters('gem_service_title', __('Our Services','gem') ); ?></h2>
				</div>
				<?php
				    $service = get_theme_mod('service_count',3 );
				    $service_pages = array();
				    for ( $i = 1 ; $i <= $service ; $i++ ) {
						$service_page = absint(get_theme_mod('service_'.$i));
						if( $service_page ){
                            $service_pages[] = $service_page;
						}
				    }

					if( $service_pages && !empty( $service_pages ) ) {
						$args = array(
							'post_type' => 'page',
							'post__in' => $service_pages,
							'posts_per_page' => -1 ,
							'orderby' => 'post__in'
						);
					
					    $gem_query = new WP_Query($args);
						if( $gem_query->have_posts()) : ?>
							<div class="services-wrapper clearfix">
								<?php while($gem_query->have_posts()) :
								     $gem_query->the_post(); ?>
								    <div class="one-third column clearfix">
								    	<div class="service-top">
									    	<div class="service-featured">
										    	<?php if( has_post_thumbnail() ) : ?>
										    		<a href="<?php echo esc_url( get_permalink() ); ?>"><div class="overlay2"></div></a>
										    		<?php the_post_thumbnail('gem_service-img'); ?>
										    	<?php endif; ?>
									    	</div>
									    	<div class="service-content">
									    		 <?php the_title( sprintf( '<h5><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
									    		<?php the_content(); ?>
									    	</div>
									    </div>
								    </div>
								<?php endwhile; ?>
							</div>
					    <?php endif; ?>
					    <?php  
							$gem_query = null;
							wp_reset_postdata();
				    }
					else { ?>
					<div class="services-wrapper clearfix">
					   
					    <div class="one-third column">
					    	<div class="service-top">
							   	<div class="service-featured">
							   		<div class="overlay2"></div>
									<img src="<?php echo get_template_directory_uri(); ?>/images/page.png" />
							   	</div>							      	
							   	<div class="service-content">
							   		<h5>Responsive Layout</h5>
									<p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Gem Options => Home => Service Section #4 and select page from  dropdown page list.','gem'), admin_url('customize.php') ) ;?></p>
							   	</div>							      	
		   				    </div> 
		   			    </div>
		   			
						<div class="one-third column">
                           <div class="service-top ">
						   	<div class="service-featured">
						   		<div class="overlay2"></div>
								<img src="<?php echo get_template_directory_uri(); ?>/images/page.png" />
						  	</div>							      	
						   	<div class="service-content">
						   		<h5>Awesome Layout</h5>
								<p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Gem Options => Home => Service Section #5 and select page from  dropdown page list.','gem'), admin_url('customize.php') ) ;?></p>
						   	</div>								   	
			   			</div> 
			   		</div>
			   			<div class="one-third column">
			   				<div class="service-top ">
						   	<div class="service-featured">
						   		<div class="overlay2"></div>
								<img src="<?php echo get_template_directory_uri(); ?>/images/page.png" />
						   	</div>							      	
						   	<div class="service-content">
						   		<h5>Fully Customizable</h5>
								<p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Gem Options => Home => Service Section #6 and select page from  dropdown page list.','gem'), admin_url('customize.php') ) ;?></p>
						   	</div>					   					
			   			</div>
			   		</div>
				     </div> <!-- .services-wrapper -->
									
			<?php	}
		}
		 do_action('gem_service_content_after');
if(get_theme_mod('enable_recent_post_service',true) && get_theme_mod('enable_service',true) && ! get_theme_mod('home_sidebar',false) ) { ?>
	<div class="hr-divider"></div>
<?php } 
   do_action('gem_recent_post_before'); ?>
	<?php gem_recent_posts(); 
   do_action('gem_recent_post_after');
	 if( get_theme_mod('enable_home_default_content',false ) ) {  ?>
			<div class="container default-home-page">
			<?php
				while ( have_posts() ) : the_post();       
					the_content();
				endwhile;
			?>
	         </div>    
        <?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
}
if( get_theme_mod('home_sidebar',false ) ) { 
   get_sidebar();
}
get_footer();  
}
?>