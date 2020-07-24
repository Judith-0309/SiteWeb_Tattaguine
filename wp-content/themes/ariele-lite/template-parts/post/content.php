<?php
/**
 * Template file for the default blog content
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Ariele_Lite
 */
?>

<?php if ( have_posts() ) :
	
/* Start the Loop */
while ( have_posts() ) : the_post(); 			
	
$ariele_lite_blog_layout = get_theme_mod( 'ariele_lite_blog_layout', 'classic' );	 

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		
	<?php		
	if ( has_post_thumbnail() ) : 				
		ariele_lite_post_thumbnail();
	endif; ?>	

		<div class="entry-summary">		
			<header class="entry-header">	
						
					<?php // get the post meta information - each one can be disabled.
						if ( 'post' === get_post_type() ) {
							echo '<ul class="entry-meta">';						

							if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_summary_author', false ) ) ) {
								ariele_lite_avatar_posted_by();
							}
							
							if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_summary_date', false ) ) ) {
								ariele_lite_posted_on();
							}
							
							if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_summary_comments', false ) ) ) {
								ariele_lite_comments_count();
							}
							echo '</ul>';
						} 							
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );	
						
					?>
																	
				</header>

				<?php		
						if ( true == esc_attr(get_theme_mod( 'ariele_lite_use_excerpt', false ) ) ) {
							the_excerpt();				
						} else {				
							the_content( ariele_lite_move_more_link() );
						}	
																		
						get_template_part( 'template-parts/navigation/nav', 'paged' );
				?>
			</div>

		</article>	

	<?php 
	
	endwhile;
		
	else :
		get_template_part( 'template-parts/post/content', 'none' );
	endif; ?>
