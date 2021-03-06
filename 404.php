<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Gem
 */

get_header(); ?>
<div class="breadcrumb-wrap">
	<div class="container">
		<div class="ten columns">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'gem' ); ?></h1>
			</header><!-- .page-header -->
		</div>
	<?php  get_template_part('breadcrumb'); ?>	
	</div>
</div>

<div id="content" class="site-content">
<div class="container">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gem' ); ?></p>

					<?php get_search_form(); ?>
					<div class="eight columns">
						<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
						<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					</div>

					<div class="eight columns">
					<?php if ( gem_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php _e( 'Most Used Categories', 'gem' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>


					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'gem' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>
					</div>
					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
