<?php 
/**
 * Register theme sidebars
 * @package Ariele_Lite
*/
  
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function ariele_lite_widgets_init() {
	
 	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'ariele-lite' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar for your blog and archives.', 'ariele-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'ariele-lite' ),
		'id' => 'right-sidebar',
		'description' => esc_html__( 'Right sidebar for your pages.', 'ariele-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'ariele-lite' ),
		'id' => 'left-sidebar',
		'description' => esc_html__( 'Left sidebar for your pages.', 'ariele-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	

	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'ariele-lite' ),
		'id' => 'banner',
		'description' => esc_html__( 'Banner sidebar for images and sliders.', 'ariele-lite' ),
		'before_widget' => '<div id="%1$s" class="banner widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'ariele-lite' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'For breadcrumb navigation when using a plugin having a widget or shortcode.', 'ariele-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	) );

 
	register_sidebar( array(
		'name' => esc_html__( 'Half Sidebar', 'ariele-lite' ),
		'id' => 'half-sidebar',
		'description' => esc_html__( 'Special sidebar for the Half &amp; Half Template.', 'ariele-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
    register_sidebar( array(
      'name'          => esc_html__( 'Footer 1', 'ariele-lite' ),
      'id'            => 'footer1',
      'description'   => esc_html__( 'First sidebar of the footer group located above the copyright area.', 'ariele-lite' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
      'name'          => esc_html__( 'Footer 2', 'ariele-lite' ),
      'id'            => 'footer2',
	  'description'   => esc_html__( 'Second sidebar of the footer group located above the copyright area.', 'ariele-lite' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
      'name'          => esc_html__( 'Footer 3', 'ariele-lite' ),
      'id'            => 'footer3',
	  'description'   => esc_html__( 'Third sidebar of the footer group located above the copyright area.', 'ariele-lite' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );
	
    register_sidebar( array(
      'name'          => esc_html__( 'Footer 4', 'ariele-lite' ),
      'id'            => 'footer4',
	  'description'   => esc_html__( 'Fourth sidebar of the footer group located above the copyright area.', 'ariele-lite' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );	
	
}
add_action( 'widgets_init', 'ariele_lite_widgets_init' );


// Count the number of widgets to enable resizable widgets in the footer group.
function ariele_lite_footer_group() {
	$count = 0;
	if ( is_active_sidebar( 'footer1' ) )
		$count++;
	if ( is_active_sidebar( 'footer2' ) )
		$count++;
	if ( is_active_sidebar( 'footer3' ) )
		$count++;		
	if ( is_active_sidebar( 'footer4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-lg-6';
			break;
		case '3':
			$class = 'col-lg-4';
			break;
		case '4':
			$class = 'col-sm-12 col-md-6 col-lg-3';
			break;
	}
	if ( $class )
		echo 'class="' . esc_attr( $class ) . '"';
}