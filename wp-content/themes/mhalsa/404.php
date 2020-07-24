<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php mhalsa_content_class(); ?>>
		<main id="main" <?php mhalsa_main_class(); ?>>
			<?php
			/**
			 * mhalsa_before_main_content hook.
			 *
			 */
			do_action( 'mhalsa_before_main_content' );
			?>

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
					<h1 class="entry-title" itemprop="headline"><?php echo esc_html( apply_filters( 'mhalsa_404_title', __( 'Oops! That page can&rsquo;t be found.', 'mhalsa' ) ) ); // WPCS: XSS OK. ?></h1>
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

				<div class="entry-content" itemprop="text">
					<?php
					echo '<p>' . esc_html( apply_filters( 'mhalsa_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'mhalsa' ) ) ) . '</p>'; // WPCS: XSS OK.

					get_search_form();
					?>
				</div><!-- .entry-content -->

				<?php
				/**
				 * mhalsa_after_content hook.
				 *
				 */
				do_action( 'mhalsa_after_content' );
				?>

			</div><!-- .inside-article -->

			<?php
			/**
			 * mhalsa_after_main_content hook.
			 *
			 */
			do_action( 'mhalsa_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * mhalsa_after_primary_content_area hook.
	 *
	 */
	 do_action( 'mhalsa_after_primary_content_area' );

	 mhalsa_construct_sidebars();

get_footer();
