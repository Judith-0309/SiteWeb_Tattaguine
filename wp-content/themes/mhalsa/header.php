<?php
/**
 * The template for displaying the header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php mhalsa_body_schema();?> <?php body_class(); ?>>
	<?php
	/**
	 * new WordPress action since version 5.2
	 */
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
	
	/**
	 * mhalsa_before_header hook.
	 *
	 *
	 * @hooked mhalsa_do_skip_to_content_link - 2
	 * @hooked mhalsa_top_bar - 5
	 * @hooked mhalsa_add_navigation_before_header - 5
	 */
	do_action( 'mhalsa_before_header' );

	/**
	 * mhalsa_header hook.
	 *
	 *
	 * @hooked mhalsa_construct_header - 10
	 */
	do_action( 'mhalsa_header' );

	/**
	 * mhalsa_after_header hook.
	 *
	 *
	 * @hooked mhalsa_featured_page_header - 10
	 */
	do_action( 'mhalsa_after_header' );
	?>

	<div id="page" class="hfeed site grid-container container grid-parent">
		<div id="content" class="site-content">
			<?php
			/**
			 * mhalsa_inside_container hook.
			 *
			 */
			do_action( 'mhalsa_inside_container' );
