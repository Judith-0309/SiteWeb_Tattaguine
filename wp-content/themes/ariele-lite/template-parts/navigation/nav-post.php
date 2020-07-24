<?php
/**
 * Template part for displaying post navigation - next and previous posts
 * @package Ariele_Lite
*/

the_post_navigation( array(
	'next_text' => '<p class="meta-nav clear" aria-hidden="true">' . esc_html__( 'Next', 'ariele-lite' ) . '<span class="nav-arrow-next"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></p> ' .
		'<p class="screen-reader-text">' . esc_html__( 'Next post:', 'ariele-lite' ) . '</p> ' .
		'<p class="post-title">%title</p>',
	'prev_text' => '<p class="meta-nav clear" aria-hidden="true"><span class="nav-arrow-prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>' . esc_html__( 'Previous', 'ariele-lite' ) . '</p> ' .
		'<p class="screen-reader-text">' . esc_html__( 'Previous post:', 'ariele-lite' ) . '</p> ' .
		'<p class="post-title">%title</p>',
) );	
							
?>