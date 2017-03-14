<?php
/**
 * Template Name: Page Full Width
 *
 * @package Gem
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
	<?php do_action('gem_before_content'); ?>

	<div id="content" class="site-content">
		<div class="container">

		<div id="primary" class="content-area sixteen columns">

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

<?php get_footer(); ?>
