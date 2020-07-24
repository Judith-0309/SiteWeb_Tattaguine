<?php
/**
 * Custom template tags for this theme
 * Eventually, some of the functionality here could be replaced by core features.
 * @package Ariele_Lite
 */
 
if ( ! function_exists( 'ariele_lite_post_format' ) ) :
	function ariele_lite_post_format() {
		
	$bloglayout = esc_attr(get_theme_mod( 'ariele_lite_blog_layout', 'blog1' ));
 	if( esc_attr(get_theme_mod( 'ariele_lite_show_post_format', true ) ) && $bloglayout !== 'blog14' ) :
		// Show the post format label
		$format = get_post_format();
		if ( current_theme_supports( 'post-formats', $format ) ) {
			printf( '<li class="entry-format"><a href="%1$s">%2$s</a></li>',
				esc_url( get_post_format_link( $format ) ),
				esc_html( get_post_format_string( $format ) )
			);
		}
	endif;
	}
endif;
	
// Prints HTML with meta information for the current post-date/time.
if ( ! function_exists( 'ariele_lite_posted_on' ) ) :
	function ariele_lite_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			/* translators: %s: post date. */
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		echo '<li class="posted-on">' . $posted_on . '</li>'; // WPCS: XSS OK.
	}
endif;



if ( ! function_exists( 'ariele_lite_avatar_posted_by' ) ) :
	function ariele_lite_avatar_posted_by() {
	global $post;
		if ( 'post' === get_post_type() ) {
		
		$author_id     = $post->post_author;
		$author_avatar = get_avatar( $author_id, 36 );
		
		$byline = '<a class="url fn n" href="'. esc_attr(get_author_posts_url( $post->post_author)).'">'. esc_html(get_the_author_meta( 'display_name',$post->post_author) ) .'</a>';
		
		printf( 
		'<li class="post-author-avatar">%1$s</li><li class="post-author byline">' . __( 'by', 'ariele-lite' ) . ' %2$s</li>', $author_avatar, $byline );
		}		
	}
endif;


if ( ! function_exists( 'ariele_lite_comments_count' ) ) :
	function ariele_lite_comments_count() {
		// Add the comments link to the post meta info
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ariele-lite' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</li>';
		}
}

endif;


// Add categories to the post meta info
if ( ! function_exists( 'ariele_lite_categories' ) ) :
function ariele_lite_categories() {
		
	echo get_the_category_list(); // WPCS: XSS OK.
	}
endif;


if ( ! function_exists( 'ariele_lite_entry_footer' ) ) :

	//Prints HTML with meta information for the tags
	function ariele_lite_entry_footer() {
		
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {			
			// Get tag list
			if(get_the_tag_list()) {
				echo wp_kses_post(get_the_tag_list('<ul class="tag-list"><li>','</li><li>','</li></ul>'));
			}
		}	
	}
endif;


// Customize the sticky featured label
if ( ! function_exists( 'ariele_lite_sticky_label' ) ) {
function ariele_lite_sticky_label() {
		$ariele_lite_featured_label = get_theme_mod( 'ariele_lite_featured_label', __('Featured', 'ariele-lite' ) );
		if ( is_sticky() && ! is_paged() &&  false == esc_attr(get_theme_mod( 'ariele_lite_hide_blog_featured_label', false ) ) ) { 
    echo '<span class="featured-label">' . wp_kses_post( $ariele_lite_featured_label ) . '</span>';
		}
	}
}

// Displays the featured image caption on the image
if ( ! function_exists( 'ariele_lite_featured_image_caption' ) ) :
function ariele_lite_featured_image_caption() {
	
				$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
				  if(!empty($get_description)  ) {
					  // If caption exists - show it
					 echo '<div class="media-caption-container"><p class="media-caption">' . esc_html($get_description) . '</p></div>';
				  }
	}
endif;

/**
 * Displays an optional post thumbnail.
 * Wraps the post thumbnail in an anchor element on index views, or a div element when on single views.
 */
if ( ! function_exists( 'ariele_lite_post_thumbnail' ) ) :

	function ariele_lite_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

<div class="featured-image">
    <?php
				the_post_thumbnail( 'featured-image', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
				if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_featured_image_caption', false ) ) && is_single() ) {
					ariele_lite_featured_image_caption();
				}
			 ?>

</div><!-- .post-thumbnail -->

<?php else : ?>

<div class="featured-media">


    <?php if ( is_sticky() ) : 						
						ariele_lite_sticky_label();						
						 endif; ?>

    <a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php	
						// Set the featured image based on the blog layout and thumbnail creation setting
						$ariele_lite_blog_layout = get_theme_mod( 'ariele_lite_blog_layout', 'classic' );	
						switch ( esc_attr($ariele_lite_blog_layout ) ) {	
										
							case "wide":
								// wide blog
								the_post_thumbnail( 'ariele-lite-wide', array(
									'alt' => the_title_attribute(
										array( 'echo' => false )
									),
								) );	
							break;			
							
							case "classic-left":		
							default:
							// classic left or right default blog
								the_post_thumbnail( 'ariele-lite-classic', array(
								'alt' => the_title_attribute(
									array( 'echo' => false )
									),
								) );				
							}
							
						if ( false == esc_attr(get_theme_mod( 'ariele_lite_hide_featured_image_caption', false ) ) ) {
							ariele_lite_featured_image_caption();
						}
						 ?>
    </a>
</div><!-- .featured-media -->

<?php
		endif; // End is_singular().
	}
endif;

// Edit link function
if ( ! function_exists( 'ariele_lite_edit_link' ) ) :
	function ariele_lite_edit_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ariele-lite' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<li class="edit-link">',
			'</li>'
		);
	}
endif;

/*	-----------------------------------------------------------------------------------------------
	STANDALONE MORE LINK
	Display a standalone link for special excerpts
--------------------------------------------------------------------------------------------------- */
if ( ! function_exists( 'ariele_lite_read_more_link' ) ) :
	function ariele_lite_read_more_link() {
	$ariele_lite_more_link_text = esc_html( get_theme_mod( 'ariele_lite_more_link_text', __('Read More', 'ariele-lite') ) );
		echo '<p class="more-link-wrapper"><a class="more-link" href="'. esc_url(get_permalink()) . '">' . wp_kses_post( $ariele_lite_more_link_text ) . '</a></p>';
	}
endif;

/*	-----------------------------------------------------------------------------------------------
	MOVE READ MORE LINK OUTSIDE OF PARAGRAPHS
	This moves the more-link outside of the inline paragraph of blog summaries
	-------------------------------------------------------------------------------------------------- */
if ( ! function_exists( 'ariele_lite_move_more_link' ) ) :
	function ariele_lite_move_more_link() {
		$ariele_lite_more_link_text = esc_html( get_theme_mod( 'ariele_lite_more_link_text', __('Read More', 'ariele-lite') ) );	
			return '<p class="more-link-wrapper"><a class="more-link" href="'. esc_url(get_permalink()) . '">' . wp_kses_post( $ariele_lite_more_link_text ) . '</a></p>';
	}
add_filter( 'the_content_more_link', 'ariele_lite_move_more_link' );
endif;


 /*	-----------------------------------------------------------------------------------------------
	ARCHIVE TITLE PREFIX
	Filters the archive title and styles the word before the first colon.
--------------------------------------------------------------------------------------------------- */
function ariele_lite_prefix_archive_title( $title ) {

	$regex = apply_filters(
		'ariele_lite_prefix_the_archive_title_regex',
		array(
			'pattern'     => '/(\A[^\:]+\:)/',
			'replacement' => '<span class="archive-prefix color-accent">$1</span>',
		)
	);

	if ( empty( $regex ) ) {

		return $title;

	}

	return preg_replace( $regex['pattern'], $regex['replacement'], $title );

}

add_filter( 'get_the_archive_title', 'ariele_lite_prefix_archive_title' );


/*	-----------------------------------------------------------------------------------------------
	FILTER ARCHIVE TITLE
	Manage the archive titles
--------------------------------------------------------------------------------------------------- */

if( ! function_exists( 'ariele_lite_get_the_archive_title' ) ) :
function ariele_lite_get_the_archive_title( $title ) {
    
    $ed_prefix = get_theme_mod( 'ariele_lite_prefix_archive', false );
    
    // Use the blog page title on home
		$blog_page_id = get_option( 'page_for_posts' );
		if ( ! is_front_page() && is_home() && $blog_page_id && get_the_title( $blog_page_id ) ) {
			$title = get_the_title( $blog_page_id );
			
    } elseif( $ed_prefix ){
        if( is_category() ){
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ){
            $title = single_tag_title( '', false );
       
		} elseif( is_author() ){
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        } elseif ( is_year() ) {
            $title = get_the_date( __( 'Y', 'ariele-lite' ) );
			}elseif ( is_month() ) {
            $title = get_the_date( __( 'F Y', 'ariele-lite' ) );
        } elseif ( is_day() ) {
            $title = get_the_date( __( 'F j, Y', 'ariele-lite' ) );
        } elseif ( is_post_type_archive() && ! is_post_type_archive( 'product' ) ) {
            $title = post_type_archive_title( '', false );       		
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( 
			/* translators: %s: Name of title  */
			esc_html__( '%1$s: %2$s', 'ariele-lite' ), $tax->labels->singular_name, single_term_title( '', false ) );		
		
		}  
	}
    return $title;
}
endif;
add_filter( 'get_the_archive_title', 'ariele_lite_get_the_archive_title' );


/*	-----------------------------------------------------------------------------------------------
	FILTER ARCHIVE DESCRIPTION
	The initial description
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'ariele_lite_get_the_archive_description' ) ) :
	function ariele_lite_get_the_archive_description( $description ) {

		// Use the blog page manual excerpt on home
		$blog_page_id = get_option( 'page_for_posts' );
		if ( is_home() && $blog_page_id && has_excerpt( $blog_page_id ) ) {
			$description = get_the_excerpt( $blog_page_id );
		}

		return $description;
		
	}
	add_filter( 'get_the_archive_description', 'ariele_lite_get_the_archive_description' );
endif;
