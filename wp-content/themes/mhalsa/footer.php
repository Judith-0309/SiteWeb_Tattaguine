<?php
/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * mhalsa_before_footer hook.
 *
 */
do_action( 'mhalsa_before_footer' );
?>

<div <?php mhalsa_footer_class(); ?>>
	<?php
	/**
	 * mhalsa_before_footer_content hook.
	 *
	 */
	do_action( 'mhalsa_before_footer_content' );

	/**
	 * mhalsa_footer hook.
	 *
	 *
	 * @hooked mhalsa_construct_footer_widgets - 5
	 * @hooked mhalsa_construct_footer - 10
	 */
	do_action( 'mhalsa_footer' );

	/**
	 * mhalsa_after_footer_content hook.
	 *
	 */
	do_action( 'mhalsa_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * mhalsa_after_footer hook.
 *
 */
do_action( 'mhalsa_after_footer' );

wp_footer();
?>

</body>
</html>
