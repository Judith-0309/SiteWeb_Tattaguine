<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. E.g., it puts together the home page when no home.php file exists.
 * @package Ariele_Lite
 */
 
get_header();
?>

<div class="row">

    <?php 
	
// Blog layouts
if ( have_posts() ) :
		
	$ariele_lite_blog_layout = get_theme_mod( 'ariele_lite_blog_layout', 'classic' );	
	switch ( esc_attr($ariele_lite_blog_layout ) ) {
	
	case "wide":
		// wide blog
		echo '<div id="primary" class="content-area col-lg-12"><main id="main" class="site-main">';
		get_template_part( 'template-parts/page-headers' );
			get_template_part( 'template-parts/post/content', get_post_format() );
			get_template_part( 'template-parts/navigation/nav', 'blog' );
		echo '</main></div>';
	break;	
	
	case "classic-left":
		// classic left blog
		echo '<div id="primary" class="content-area col-lg-8 order-lg-2"><main id="main" class="site-main">';
		get_template_part( 'template-parts/page-headers' );
			get_template_part( 'template-parts/post/content', get_post_format() );
			get_template_part( 'template-parts/navigation/nav', 'blog' );
		echo '</main></div><aside id="blog-sidebar" class="col-lg-4 order-3 order-lg-1">';
			get_sidebar(); 
		echo '</aside>';		
	break;
	
	default:
		// classic blog
		echo '<div id="primary" class="content-area col-lg-8"><main id="main" class="site-main">';
		get_template_part( 'template-parts/page-headers' );
			get_template_part( 'template-parts/post/content', get_post_format() );
			get_template_part( 'template-parts/navigation/nav', 'blog' );
		echo '</main></div><aside id="blog-sidebar" class="widget-area col-lg-4">';
			get_sidebar(); 
		echo '</aside>';
	}	
	
else :
	get_template_part( 'template-parts/post/content', 'none' );
endif; 

?>

</div>

<?php
get_footer();
