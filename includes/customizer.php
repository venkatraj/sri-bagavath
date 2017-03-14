<?php
/**
 * gem Theme Customizer
 *
 * @package Gem
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gem_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'gem_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gem_customize_preview_js() {
	wp_enqueue_script( 'gem_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'gem_customize_preview_js' );


if( get_theme_mod('enable_primary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_primary_custom_css' );

		function wbls_customizer_primary_custom_css() {
			$primary_color = get_theme_mod( 'primary_color','#E5493A'); ?>

			<style type="text/css">
				.site-footer .scroll-to-top:hover,.portfolioeffects .portfolio_overlay {
					opacity: 0.6;
				}

			</style>
<?php
	}
}



