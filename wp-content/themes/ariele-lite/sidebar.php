<?php
/**
* The main sidebar template file
* @package Ariele_Lite
*/
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
	
	// Check if Sidebar has widgets.
	if (   ! is_active_sidebar( 'left-sidebar'  )
	&& ! is_active_sidebar( 'right-sidebar' ) 
	&& ! is_active_sidebar( 'blog-sidebar' )
	)
	return;
	
	// Use the sidebar that relates to the page type being viewed
	if ( is_page_template( array( 'templates/template-left.php' ) ) ) { 
		
		dynamic_sidebar( 'left-sidebar' );		
		
	} elseif ( is_page_template( array( 'templates/template-right.php' ) ) ) {
		
		dynamic_sidebar( 'right-sidebar' );
		
		// Skip to the blog sidebar for blog and archives if we are not on a page template
		} else {
		
		dynamic_sidebar( 'blog-sidebar' );		
		
	} 
	
?>
