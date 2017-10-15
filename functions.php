<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );





function divichild_enqueue_styles() {
  $parent_style = 'parent-style';
   wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
 wp_enqueue_style( 'child-style',
 get_stylesheet_directory_uri() . '/style.css',
 array( $parent_style ),
 wp_get_theme()->get('Version')
 );
}
add_action( 'wp_enqueue_scripts', 'divichild_enqueue_styles' );






// Replace default stylesheet
function divi_leopard_default_stylesheet() {
	return get_template_directory_uri() . '/style.css';
}
add_filter( 'stylesheet_uri', 'divi_leopard_default_stylesheet', 10, 2 );

function divi_leopard_enqueues() {
	wp_enqueue_style( 'divi-leopard', get_stylesheet_directory_uri() . '/css/divi-leopard.css' );
}
add_action( 'wp_enqueue_scripts', 'divi_leopard_enqueues', 20 );

// Add 404 widget position
function divi_leopard_widgets_init() {
	register_sidebar( array(
		'name' => '404',
		'id' => 'divi-leopard-404',
		'before_widget' => '<div id="%1$s" class="et_404_widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	) );
}
add_action( 'widgets_init', 'divi_leopard_widgets_init', 999 );
