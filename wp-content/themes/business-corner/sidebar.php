<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business Corner
 */
?>

<div class="col-md-4 left-side">
<?php if ( is_active_sidebar( 'business-corner-sidebar' ) ){
	dynamic_sidebar( 'business-corner-sidebar' );
	} ?>
</div>
