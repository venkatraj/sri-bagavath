<?php

function gem_custom_styles($custom) {
$custom = '';	
	$sticky_header_position = get_theme_mod('sticky_header_position') ;
	if( $sticky_header_position == 'bottom') {
		$custom .= ".sticky-header #nav-wrap {  top: auto!important;
			bottom:0; }"."\n";	
		$custom .= ".sticky-header #nav-wrap .nav-menu .sub-menu {  top: auto;
			bottom:100%; }"."\n";	
	}	

	//Output all the styles
	wp_add_inline_style( 'gem', $custom );	
}


add_action( 'wp_enqueue_scripts', 'gem_custom_styles' );  
