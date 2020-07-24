<?php
/* 
* Template Name: About
* Template Post Type: post, page
* @package Ariele_Lite
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="primary" class="content-area">
	<div class="row">		

		<main id="main" class="site-main col-lg-6">		
			
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	
	<header id="page-header">
		<?php the_title( '<h1 id="page-title">', '</h1>' ); ?>
		<?php if ( has_excerpt() && !is_archive() && !is_search() && !is_404()  ) : ?>
        <div id="page-intro">
            <?php  the_excerpt();  ?>
        </div>
        <?php endif;?>
	</header>
	
	<div class="entry-content">
		<?php	the_content(); ?>
	</div>

	<?php if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_edit_link', false ) ) ) : ?>
		<ul class="entry-footer">
			<?php ariele_lite_edit_link(); ?>
		</ul><!-- .entry-footer -->
	<?php endif; ?>
	
</article>
<?php endwhile; ?>	

		</main>    
		
		<div class="col-lg-6">
		<div id="featured-image">
        <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => '')); ?>
		</div>
    </div>
	
</div>
</div>
<?php 
get_footer();	