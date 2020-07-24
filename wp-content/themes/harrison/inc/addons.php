<?php
/**
 * Add Support for Theme Addons
 *
 * @package Harrison
 */

/**
 * Register support for Jetpack and theme addons
 */
function harrison_theme_addons_setup() {

	// Add theme support for Harrison Pro plugin.
	add_theme_support( 'harrison-pro' );

	// Add theme support for ThemeZee Breadcrumbs plugin.
	add_theme_support( 'themezee-breadcrumbs' );

	// Add theme support for ThemeZee Widget Bundle plugin.
	add_theme_support( 'themezee-widget-bundle', array(
		'thumbnail_size' => array( 150, 150 ),
		'svg_icons'      => true,
	) );

	// Add theme support for ThemeZee Related Posts plugin.
	add_theme_support( 'themezee-related-posts', array(
		'thumbnail_size' => array( 720, 360 ),
	) );

	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'post-wrapper',
		'footer_widgets' => 'footer',
		'wrapper'        => false,
		'render'         => 'harrison_infinite_scroll_render',
	) );

	// Add theme support for wooCommerce.
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'harrison_theme_addons_setup' );


/**
 * Custom render function for Infinite Scroll.
 */
function harrison_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/blog/content', esc_html( harrison_get_option( 'blog_layout' ) ) );
	}
}


/**
 * Set wrapper start for wooCommerce
 */
function harrison_wrapper_start() {
	echo '<main id="main" class="site-main" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'harrison_wrapper_start', 10 );


/**
 * Set wrapper end for wooCommerce
 */
function harrison_wrapper_end() {
	echo '</main><!-- #main -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'harrison_wrapper_end', 10 );


/* Remove sidebar from wooCommerce templates */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
