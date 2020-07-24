<?php
/**
 * Template part for the blog navigation - previous and next
 * @package Ariele_Lite
*/

the_posts_pagination( array(
	'mid_size'  => 2,
	'prev_text' => '<span class="prev screen-reader-text">' . esc_html__( ' Previous page', 'ariele-lite' ) . '</span><i class="fa fa-arrow-left" aria-hidden="true"></i>',
	'next_text' => '<span class="next screen-reader-text">' . esc_html__( 'Next page', 'ariele-lite' ) . '</span><i class="fa fa-arrow-right" aria-hidden="true"></i>',
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'ariele-lite' ) . ' </span>',
) );


		
?>