<?php
/**
 * Template part for displaying posts split into multiple pages
 * @package Ariele_Lite
*/

wp_link_pages( array(
	'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'ariele-lite' ),
	'after'       => '</div>',
	'link_before' => '<span class="page-number">',
	'link_after'  => '</span>',
) );
							
?>