<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gem
 */

get_header(); ?>
	<div class="breadcrumb-wrap">
		<div class="container">
			<div class="ten columns">
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->
			</div>
		<?php  get_template_part('breadcrumb'); ?>		
		</div>
	</div>
	
	<div id="content" class="site-content">
		<div class="container">
	
			<?php do_action('gem_two_sidebar_left'); ?>	

			<div id="primary" class="content-area <?php gem_layout_class(); ?> columns">
				<main id="main" class="site-main blog-content" role="main">

				<?php if ( have_posts() ) : ?>


					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php 
						if(  get_theme_mod ('numeric_pagination',true) ) :
							   the_posts_pagination(
									array(   
										'prev_text' => __( '&laquo;', 'gem' ),
		                                'next_text' => __( '&raquo;', 'gem' ),
	                                )
                                );
							else :
								gem_post_nav();     
							endif; 
					?>			

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

	        <?php do_action('gem_two_sidebar_right'); ?>	

<?php get_footer(); ?>
