<?php
/**
 * Template Name: Right Column
 * @package Ariele_Lite
*/

get_header(); ?>
		
<div class="row">		

<div id="primary" class="content-area col-lg-8">
		<main id="main" class="site-main ">					
			<?php while ( have_posts() ) : the_post(); 
			get_template_part( 'template-parts/page/content', 'page' ); 
			if ( comments_open() || get_comments_number() ) :
			comments_template();
			endif;
			endwhile; ?>		
		</main>
</div>

<aside id="right-sidebar" class="col-lg-4">        
<?php get_sidebar(); ?>    
</aside>

</div>
<?php 
	get_footer();