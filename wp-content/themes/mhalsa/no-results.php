<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="no-results not-found">
	<div class="inside-article">
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
			<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'mhalsa' ); // WPCS: XSS OK. ?></h1>
		</header><!-- .entry-header -->

		<?php
		/**
		 * mhalsa_after_entry_header hook.
		 *
		 *
		 * @hooked mhalsa_post_image - 10
		 */
		do_action( 'mhalsa_after_entry_header' );
		?>

		<div class="entry-content">

				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p>
						<?php
						printf( // WPCS: XSS ok.
							/* translators: 1: Admin URL */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mhalsa' ),
							esc_url( admin_url( 'post-new.php' ) )
						);
						?>
					</p>

				<?php elseif ( is_search() ) : ?>

					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mhalsa' ); // WPCS: XSS OK. ?></p>
					<?php get_search_form(); ?>

				<?php else : ?>

					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mhalsa' ); // WPCS: XSS OK. ?></p>
					<?php get_search_form(); ?>

				<?php endif; ?>

		</div><!-- .entry-content -->

		<?php
		/**
		 * mhalsa_after_content hook.
		 *
		 */
		do_action( 'mhalsa_after_content' );
		?>
	</div><!-- .inside-article -->
</div><!-- .no-results -->
