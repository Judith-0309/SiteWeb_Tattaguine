<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Ariele_Lite
 */

get_header(); 
?>

<div class="row">

    <?php // single layout	
	$ariele_lite_single_layout = get_theme_mod( 'ariele_lite_single_layout', 'right' );	
	switch ( esc_attr($ariele_lite_single_layout ) ) {
	
	case "wide":
		// wide single
		echo '<div id="primary" class="content-area col-lg-12"><main id="main" class="site-main">';
			get_template_part( 'template-parts/post/content', 'single' );
		echo '</main></div>';	
	break;
	
	case "left":
		// left single
		echo '<div id="primary" class="content-area col-lg-8 order-lg-2"><main id="main" class="site-main">';
			get_template_part( 'template-parts/post/content', 'single' );
		echo '</main></div><aside id="blog-sidebar" class="col-lg-4 order-3 order-lg-1">';
			get_sidebar(); 
		echo '</aside>';		
	break;
	
	default:
		// right single
		echo '<div id="primary" class="content-area col-lg-8"><main id="main" class="site-main">';
			get_template_part( 'template-parts/post/content', 'single' );
		echo '</main></div><aside id="blog-sidebar" class="col-lg-4">';
			get_sidebar(); 
		echo '</aside>';
	}
	?>

</div>

<?php
get_footer();
