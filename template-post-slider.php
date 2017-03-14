<?php
/**
 * Template Name: Default Template With Post Slider
 *
 * @package gem
 */

get_header(); ?> 

	<div class="breadcrumb-wrap">
		<div class="container">
			<div class="ten columns">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->			
			</div>
			<?php  get_template_part('breadcrumb'); ?>		
		</div>
	</div>
<?php       $gem_slider_cat = get_theme_mod( 'slider_cat', '' );
			$gem_slider_count = get_theme_mod( 'slider_count', 5 );
			$gem_slider_posts = array(
				'cat' => absint($gem_slider_cat),
				'posts_per_page' => absint($gem_slider_count)
			);

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
				<?php endif;
				} ?>
			<?php  
				$gem_query = null;
				wp_reset_postdata(); ?>
<?php //do_action('gem_single_page_flexslider_featured_image'); ?>

	<div id="content" class="site-content">
	<div class="container">

	<?php do_action('gem_two_sidebar_left'); ?>	

		<div id="primary" class="content-area <?php gem_layout_class();?> columns">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	<?php do_action('gem_two_sidebar_right'); ?>	

<?php get_footer(); ?>
