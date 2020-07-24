<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * @package Ariele_Lite
 */

/**
 * Adds custom classes to the array of body classes.
 * @param array $classes Classes for the body element.
 * @return array
 */
function ariele_lite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( true == esc_attr(get_theme_mod( 'ariele_lite_boxed', false ) ) ) {
		$classes[] = 'boxed';
	}

	// Blog layout
	$ariele_lite_blog_layout = esc_attr(get_theme_mod( 'ariele_lite_blog_layout', 'classic' ) );	
	if( $ariele_lite_blog_layout !== 'default' && ! is_singular() ) {
		$classes[] = 'blog-' . $ariele_lite_blog_layout;
	}		
	
	// Single layout
	$ariele_lite_single_layout = esc_attr(get_theme_mod( 'ariele_lite_single_layout', 'right' ) );	
	if( $ariele_lite_single_layout !== 'default' && is_single() ) {
		$classes[] = 'single-' . $ariele_lite_single_layout;
	}

		// Check whether the current page is the sitemap
		if ( is_page_template( array( 'templates/template-archives.php' ) ) ) {
			$classes[] = 'sitemap-page';
		}	
		
		if(basename(get_page_template()) === 'page.php'){
		$classes[] = 'default-page';
		}
		
		// Check whether the current page is the left column template
		if ( is_page_template( array( 'templates/template-left.php' ) ) ) {
			$classes[] = 'template-left';
		}

		// Check whether the current page is the right column template
		if ( is_page_template( array( 'templates/template-right.php' ) ) ) {
			$classes[] = 'template-right';
		}

		// Check whether the current page is the full width short template
		if ( is_page_template( array( 'templates/template-short.php' ) ) ) {
			$classes[] = 'template-short';
		}
		
		// Check whether the current page is the about me template
		if (is_page_template( array( 'templates/template-about.php' ) ) ) {
			$classes[] = 'template-about';
		}

		// Check whether the current page is the about me template
		if (is_page_template( array( 'templates/template-half.php' ) ) ) {
			$classes[] = 'template-half';
		}

	return $classes;
}
add_filter( 'body_class', 'ariele_lite_body_classes' );


/**
 * Add CSS class to image navigation links.
 *
 * @wp-hook previous_image_link
 * @wp-hook next_image_link
 * @param   string $link Complete markup
 * @return  string
 */
add_filter( 'previous_image_link', 'ariele_lite_img_link_class' );
add_filter( 'next_image_link',     'ariele_lite_img_link_class' );

function ariele_lite_img_link_class( $link )
{
    $class = 'next_image_link' === current_filter() ? 'button' : 'button';
    return str_replace( '<a ', "<a class='$class'", esc_url($link) );
}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ariele_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ariele_lite_pingback_header' );

	
// Replaces the excerpt "Read More" text by a link
function ariele_lite_excerpt_more($more) {
	global $post;
		if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_excerpt_more_link', false ) ) ) {  
			if ( is_admin() ) :
				return $more;
			else :
				return '&hellip;<p class="excerpt-more-link-wrapper"><a class="excerpt-more-link" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__( 'Read More', 'ariele-lite' ) . '</a></p>';
		endif;
	}
}
add_filter('excerpt_more', 'ariele_lite_excerpt_more');
	
	
// Custom excerpt size
function ariele_lite_custom_excerpt_length( $length ) { 
	$ariele_lite_excerpt_size = esc_attr(get_theme_mod( 'ariele_lite_excerpt_size', '35' ));
	if ( is_admin() ) :
		return 55;		
	else: 	
		return esc_attr($ariele_lite_excerpt_size);
	endif;
	}
add_filter( 'excerpt_length', 'ariele_lite_custom_excerpt_length', 999 );

