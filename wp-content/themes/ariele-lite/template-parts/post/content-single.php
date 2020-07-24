<?php
/**
 * The default template for displaying the full post with title above featured image
 * @package Ariele_Lite
*/
?>

<?php
while ( have_posts() ) : the_post(); ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="single-inner">
	<header class="entry-header post-width">		
		<?php	
		if( false == esc_attr(get_theme_mod( 'ariele_lite_hide_post_categories', false ) ) ) {
			ariele_lite_categories();
		}
		
		the_title( '<h1 class="entry-title">', '</h1>' );									
			if ( 'post' === get_post_type()) {
				echo '<ul class="entry-meta">';
				
				if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_single_author', false ) ) ) {
					ariele_lite_avatar_posted_by();		
				}
				if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_single_post_date', false ) ) ) {
					ariele_lite_posted_on();
				}
				if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_single_post_format', false ) ) ) {
					ariele_lite_post_format();
				}
				if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_single_comment_link', false ) ) ) {
					ariele_lite_comments_count();	
				}
				if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_edit_link', false ) ) ) {
					ariele_lite_edit_link();
				}
			echo '</ul>';
		};
		?>												
	</header>	
	<?php	if ( '' !== get_the_post_thumbnail() && false == esc_attr(get_theme_mod( 'ariele_lite_hide_single_featured', false ) ) ) {  
		ariele_lite_post_thumbnail();			
	} 
	?>	
	<div class="entry-content post-width">
		<?php	the_content();
			get_template_part( 'template-parts/navigation/nav', 'paged' );
			?>			
	</div>
	<div id="entry-footer" class="post-width">
	<?php if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_post_tags', false ) ) ) {
		ariele_lite_entry_footer();
	}
	?>
	</div>
	
	
	
	<?php if ( get_the_author_meta( 'description' ) && false == esc_attr(get_theme_mod( 'ariele_lite_show_author_bio', false ) ) ) : ?>		
		
			<?php get_template_part( 'author-bio' ); ?>
		
	<?php endif; ?>
</div>
</article>

<?php 
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>

<?php 	// single post navigation
	if ( esc_attr(get_theme_mod( 'ariele_lite_show_post_nav', true )) ) :
		get_template_part( 'template-parts/navigation/nav', 'post' );
	endif;
?>	
