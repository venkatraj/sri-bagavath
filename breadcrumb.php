<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package Gem
 */
	$breadcrumb = get_theme_mod( 'breadcrumb' );
		if( $breadcrumb ) : ?>
			<div class="six columns breadcrumb">
				<?php gem_breadcrumbs(); ?>
		    </div>
        <?php endif; ?>