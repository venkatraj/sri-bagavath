<?php 

/**
 * Enqueue scripts and styles.
 */
function gem_scripts() {
	wp_enqueue_style( 'Roboto', gem_theme_font_url('Roboto:400,300,700'), array(), 20141212 );
	wp_enqueue_style( 'open sans', gem_theme_font_url('open sans:400,800,700'), array(), 20141212 );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.3.0', 'all' );
	wp_enqueue_style( 'gem', get_stylesheet_uri() );

	wp_enqueue_script( 'gem-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'gem-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if( get_theme_mod('sticky_header',false) ){
		wp_enqueue_script( 'gem-custom-sticky', get_template_directory_uri() . '/js/custom-sticky.js', array('jquery'), '1.0.0', true );
	}
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.4.0', true );
	wp_enqueue_script('masonry');
	wp_enqueue_script( 'gem', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'gem_scripts' );

/**
 * Register Google fonts.
 *
 * @return string
 */
function gem_theme_font_url($font) {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Font, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Font: on or off', 'gem' ) ) {
		$font_url = esc_url( add_query_arg( 'family', urlencode($font), "//fonts.googleapis.com/css" ) );
	}

	return $font_url;
}

function gem_admin_enqueue_scripts( $hook ) {
	if( strpos( $hook, 'gem_upgrade') ) {
		wp_enqueue_style( 
			'font-awesome',
			get_template_directory_uri() . '/css/font-awesome.min.css', 
			array(), 
			'4.3.0', 
			'all' 
		);
		wp_enqueue_style( 
			'gem-admin-css', 
			get_template_directory_uri() . '/admin/css/admin.css', 
			array(), 
			'1.0.0', 
			'all' 
		);

	}
}
add_action( 'admin_enqueue_scripts', 'gem_admin_enqueue_scripts' );
