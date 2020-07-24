<?php
/**
 * Template part for displaying page content in page.php
 * @package Ariele_Lite
*/

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div id="short-inner">
	
	<header id="page-header">
		<?php the_title( '<h1 id="page-title">', '</h1>' ); ?>
		<?php if ( has_excerpt() && !is_archive() && !is_search() && !is_404()  ) : ?>
        <div id="page-intro">
            <?php  the_excerpt();  ?>
        </div>
        <?php endif;?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php
		the_content();
		get_template_part( 'template-parts/navigation/nav', 'paged' );	
		?>
	</div><!-- .entry-content -->

	<?php if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_edit_link', false ) ) ) : ?>
		<ul class="entry-footer">
			<?php ariele_lite_edit_link(); ?>
		</ul><!-- .entry-footer -->
	<?php endif; ?>
	
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->