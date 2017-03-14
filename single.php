<?php
/**
 * The template for displaying all single posts.
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

<?php do_action('gem_single_flexslider_featured_image'); ?>

		<div id="content" class="site-content">
		<div class="container">	

	<?php do_action('gem_two_sidebar_left'); ?>	

    <div id="primary" class="content-area <?php gem_layout_class();?> columns">

		<main id="main" class="site-main blog-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php do_action('gem_after_single_content'); ?>

				<?php if( get_theme_mod ('author_bio_box')): ?>
				<section class="author-bio clearfix">
					<div class="author-info">
						<div class="avatar">
							<?php echo get_avatar( get_the_author_meta( 'email' ), '72' ); ?>
						</div>
						<div class="description">
							<h5><?php echo __( 'About Author:', 'gem' ); ?> <?php the_author_posts_link(); ?></h5>
							<?php the_author_meta('description');?>
						</div>
					</div>
				</section>
				<?php endif; ?>

				<?php if( get_theme_mod('related_posts') && function_exists( 'gem_related_posts' ) ) : ?>
					<section class="related-posts clearfix">
						<?php gem_related_posts(); ?>
					</section>
				<?php endif;  ?>				

			<?php
				if( get_theme_mod ('comments',true) ) :
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php do_action('gem_two_sidebar_right'); 
	
get_footer(); ?>
