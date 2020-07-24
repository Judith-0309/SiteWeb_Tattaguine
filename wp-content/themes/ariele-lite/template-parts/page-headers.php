<?php
/**
 * Template file for blog headers
 * @package Ariele_Lite
 */

	
 		$ariele_lite_default_blog_title = get_theme_mod( 'ariele_lite_default_blog_title', __( 'My Blog', 'ariele-lite' ) );
		$ariele_lite_default_blog_intro = get_theme_mod( 'ariele_lite_default_blog_intro', __( 'Welcome to my blog where you can customize this intro or disable it to hide.', 'ariele-lite' ) );
		
		$archive_title = '';
		$archive_subtitle = ariele_lite_get_the_archive_description( '<div>', '</div>' ); 
		$show_home_header = false == esc_attr(get_theme_mod( 'ariele_lite_hide_blog_heading', false ) );
	
         if ( is_home() && is_front_page() && $show_home_header && $ariele_lite_default_blog_title ){ 
           echo '<header id="page-header" class="col-lg-12"><h1 id="page-title">' . wp_kses_post( $ariele_lite_default_blog_title ) . '</h1>';
		   echo '<div id="blog-description">' . wp_kses_post( wpautop( $ariele_lite_default_blog_intro ) ) . '</div></header>';
        }
		
		elseif ( ( ! is_archive() && ! is_front_page() && is_home() && $show_home_header ) && ( $archive_title || $archive_subtitle ) ) {
			echo ' <header id="page-header" class="col-lg-12">';
				if ( $archive_title ) {
					echo '<h1 id="page-title">' . wp_kses_post( $archive_title ) . '</h1>';
				} else {
					echo '<h1 id="page-title">';
						single_post_title();
					echo '</h1>';
				}

				if ( ! is_front_page() && $archive_subtitle ) {
					echo '<div id="blog-description">' . wp_kses_post( wpautop( $archive_subtitle ) ) . '</div>';
				}
			echo '</header>';
		}

        if( is_archive() ){
		echo ' <header id="page-header" class="col-lg-12">';
            the_archive_title( '<h1 id="page-title">', '</h1>' );
            the_archive_description( '<div id="category-description">', '</div>' );
		echo '</header>';	
        }
    
        if( is_search() ){ 
            global $wp_query;
			echo ' <header id="page-header" class="col-lg-12">';
            echo '<h1 id="page-title">' . esc_html__( 'Search', 'ariele-lite' ) . '</h1>';
            get_search_form();
            echo '<span class="result-count">' . sprintf( esc_html__( 'Showing %1$s Result(s)%2$s', 'ariele-lite' ), '<strong>' . $wp_query->found_posts, '</strong>' ) . '</span>';
			echo '</header>';
        }
    
        if( is_page() ){ 
		echo ' <header id="page-header" class="col-lg-12">';
            the_title( '<h1 id="page-title">', '</h1>' ); 
		echo '</header>';	
        }
        
        if( is_404() ) echo '<header id="page-header" class="col-lg-12"><h1 id="page-title">' . esc_html__( '404', 'ariele-lite' ) . '</h1></header>'; //For 404
 ?>