<?php
/**
 * The template for displaying posts within the loop.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php mhalsa_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
    	<div class="article-holder">
		<?php
		/**
		 * mhalsa_before_content hook.
		 *
		 *
		 * @hooked mhalsa_featured_page_header_inside_single - 10
		 */
		do_action( 'mhalsa_before_content' );
		?>

		<header class="entry-header">
			<?php
			/**
			 * mhalsa_before_entry_title hook.
			 *
			 */
			do_action( 'mhalsa_before_entry_title' );

			the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

			/**
			 * mhalsa_after_entry_title hook.
			 *
			 *
			 * @hooked mhalsa_post_meta - 10
			 */
			do_action( 'mhalsa_after_entry_title' );
			?>
		</header><!-- .entry-header -->

		<?php
		/**
		 * mhalsa_after_entry_header hook.
		 *
		 *
		 * @hooked mhalsa_post_image - 10
		 */
		do_action( 'mhalsa_after_entry_header' );

		if ( mhalsa_show_excerpt() ) : ?>

			<div class="entry-summary" itemprop="text">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		<?php else : ?>

			<div class="entry-content" itemprop="text">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'mhalsa' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

		<?php endif;

		/**
		 * mhalsa_after_entry_content hook.
		 *
		 *
		 * @hooked mhalsa_footer_meta - 10
		 */
		do_action( 'mhalsa_after_entry_content' );

		/**
		 * mhalsa_after_content hook.
		 *
		 */
		do_action( 'mhalsa_after_content' );
		?>
        </div>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
