/**
 * File customizer.js.
 * Theme Customizer enhancements for a better user experience.
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

$head = $('head');

	// Hide the element
	function hideElement( element ) {
		$( element ).css({
			clip: 'rect(1px, 1px, 1px, 1px)',
			position: 'absolute',
			width: '1px',
			height: '1px',
			overflow: 'hidden'
		});
	}
	// Show when you need a relative position
	function showElement( element ) {
		$( element ).css({
			clip: 'auto',
			position: 'relative',
			width: 'auto',
			height: 'auto',
			overflow: 'visible'
		});
	}
	// Show when you need an absolute position
	function showElementabs( element ) {
		$( element ).css({
			clip: 'auto',
			position: 'absolute',
			width: 'auto',
			height: 'auto',
			overflow: 'visible'
		});
	}
	
/* =======================
 Text based previews
======================= */
	
	// Site title.	
	wp.customize( 'blogname', function( value ) {
	  value.bind( function( newval ) {
		$( '#site-title' ).html( newval );
	  } );
	} );
	
	// Site description.	
	wp.customize( 'blogdescription', function( value ) {
	  value.bind( function( newval ) {
		$( '#site-description' ).html( newval );
	  } );
	} );


	// Default blog title text
	wp.customize( 'ariele_lite_default_blog_title', function( value ) {
	  value.bind( function( newval ) {
		$( '.blog #page-title' ).html( newval );
	  } );
	} );

	// Default blog intro text
	wp.customize( 'ariele_lite_default_blog_intro', function( value ) {
	  value.bind( function( newval ) {
		$( '.blog #blog-description' ).html( newval );
	  } );
	} );

	// More link text
	wp.customize( 'ariele_lite_more_link_text', function( value ) {
	  value.bind( function( newval ) {
		$( '.more-link' ).html( newval );
	  } );
	} );	
	
	// Featured label
	wp.customize( 'ariele_lite_featured_label', function( value ) {
	  value.bind( function( newval ) {
		$( '.featured-label' ).html( newval );
	  } );
	} );
	
	// Related post title
	wp.customize( 'ariele_lite_related_posts_title', function( value ) {
	  value.bind( function( newval ) {
		$( '#related-posts-header' ).html( newval );
	  } );
	} );

	
	// Copyright
	wp.customize( 'ariele_lite_copyright', function( value ) {
	  value.bind( function( newval ) {
		$( '#copyright-name' ).html( newval );
	  } );
	} );
	
/* =======================
 Show or hide previews
======================= */	
	
	// Show hide site title
	wp.customize( 'ariele_lite_hide_site_title', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '#site-title' );
			} else {
				hideElement( '#site-title' );
			}
		} );
	} );
	
	// Show hide site tagline
	wp.customize( 'ariele_lite_hide_site_desc', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '#site-description' );
			} else {
				hideElement( '#site-description' );
			}
		} );
	} );	
	
	// Show hide blog heading group
	wp.customize( 'ariele_lite_hide_blog_heading', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.blog #page-header' );
			} else {
				hideElement( '.blog #page-header' );
			}
		} );
	} );	
	
	// Show hide blog featured label
	wp.customize( 'ariele_lite_hide_blog_featured_label', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElementabs( '.featured-label' );
			} else {
				hideElement( '.featured-label' );
			}
		} );
	} );	
	
	// Show hide featured image caption
	wp.customize( 'ariele_lite_hide_featured_image_caption', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElementabs( '.media-caption-container' );
			} else {
				hideElement( '.media-caption-container' );
			}
		} );
	} );	
	
	// Show hide summary post meta
	wp.customize( 'ariele_lite_hide_post_meta', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.entry-meta' );
			} else {
				hideElement( '.entry-meta' );
			}
		} );
	} );	
	
	// Show hide summary author
	wp.customize( 'ariele_lite_hide_summary_author', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.post-author-avatar' );
				showElement( '.byline' );
			} else {
				hideElement( '.post-author-avatar' );
				hideElement( '.byline' );
			}
		} );
	} );	
	
	// Show hide summary date
	wp.customize( 'ariele_lite_hide_summary_date', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.posted-on' );
			} else {
				hideElement( '.posted-on' );
			}
		} );
	} );	
	
	// Show hide summary comments
	wp.customize( 'ariele_lite_hide_summary_comments', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.comments-link' );
			} else {
				hideElement( '.comments-link' );
			}
		} );
	} );	
	
	// Show hide summary comments
	wp.customize( 'ariele_lite_hide_post_format', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.entry-format' );
			} else {
				hideElement( '.entry-format' );
			}
		} );
	} );	
	
	// Show hide excerpt more link
	wp.customize( 'ariele_lite_hide_excerpt_more_link', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.excerpt-more-link-wrapper' );
			} else {
				hideElement( '.excerpt-more-link-wrapper' );
			}
		} );
	} );	

	// Show hide blog edit link
	wp.customize( 'ariele_lite_hide_edit_link', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.edit-link' );
			} else {
				hideElement( '.edit-link' );
			}
		} );
	} );	

	// Show hide post categories
	wp.customize( 'ariele_lite_hide_post_categories', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.post-categories' );
			} else {
				hideElement( '.post-categories' );
			}
		} );
	} );
	
	// Show hide post featured image
	wp.customize( 'ariele_lite_hide_single_featured', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.single .featured-image' );
			} else {
			hideElement( '.single .featured-image' );
			}
		} );
	} );	

	// Show hide single posted by author
	wp.customize( 'ariele_lite_hide_single_author', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.single .post-author-avatar' );
				showElement( '.single .byline' );
			} else {
				hideElement( '.single .post-author-avatar ' );
				hideElement( '.single .byline ' );
			}
		} );
	} );	

	// Show hide single post date
	wp.customize( 'ariele_lite_hide_single_post_date', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.single .posted-on' );
			} else {
				hideElement( '.single .posted-on' );
			}
		} );
	} );	

	// Show hide single post format
	wp.customize( 'ariele_lite_hide_single_post_format', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.single .entry-format' );
			} else {
				hideElement( '.single .entry-format' );
			}
		} );
	} );

	// Show hide single comment link
	wp.customize( 'ariele_lite_hide_single_comment_link', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.single .comments-link' );
			} else {
				hideElement( '.single .comments-link' );
			}
		} );
	} );

	// Show hide post tags
	wp.customize( 'ariele_lite_hide_post_tags', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.tag-list' );
			} else {
				hideElement( '.tag-list' );
			}
		} );
	} );

	// Show hide post nav
	wp.customize( 'ariele_lite_hide_post_nav', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.single .post-navigation' );
			} else {
				hideElement( '.single .post-navigation' );
			}
		} );
	} );	
	
	// Show hide author bio
	wp.customize( 'ariele_lite_hide_author_bio', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '#author-info' );
			} else {
				hideElement( '#author-info' );
			}
		} );
	} );	
	
	// Show hide post related
	wp.customize( 'ariele_lite_hide_related_posts', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '#related-posts' );
			} else {
				hideElement( '#related-posts' );
			}
		} );
	} );	
	
/* =======================
 Colours
======================= */

	/* site title */
	wp.customize( 'ariele_lite_colour_sitetitle', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-sitetitle-colour-css');

			style.remove();
			style = $( '<style type="text/css" id="custom-sitetitle-colour-css"> #site-title a, #site-title a:visited { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* site tagline */
	wp.customize( 'ariele_lite_colour_tagline', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-sitetagline-colour-css');

			style.remove();
			style = $( '<style type="text/css" id="custom-sitetagline-colour-css"> #site-description { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );
	
	/* body background */
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-body-bg-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-body-bg-colour-css"> body { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );
	
	/* page background */
	wp.customize( 'ariele_lite_page_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-page-bg-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-page-bg-colour-css"> #page { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* content background */
	wp.customize( 'ariele_lite_content_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-content-bg-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-content-bg-colour-css"> .hentry { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );		
	
	/* content border */
	wp.customize( 'ariele_lite_content_border', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-content-border-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-content-border-colour-css"> .hentry, #related-posts, #comments, #inset-top-sidebar, #inset-bottom-sidebar { border-color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* body text */
	wp.customize( 'ariele_lite_body_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-body-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-body-text-colour-css"> body { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* breadcrumb text */
	wp.customize( 'ariele_lite_breadcrumbs_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-breadcrumb-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-breadcrumb-text-colour-css"> #breadcrumbs-sidebar, #breadcrumbs-sidebar a, #breadcrumbs-sidebar a:visited { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	

	/* archive prefix */
	wp.customize( 'ariele_lite_archive_prefix', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-archive-prefix-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-archive-prefix-colour-css"> .archive-prefix { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* headings */
	wp.customize( 'ariele_lite_headings', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-heading-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-heading-text-colour-css"> h1, h2, h3, h4, h5, h6, .entry-title a, .entry-title a:visited { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* headings hover */
	wp.customize( 'ariele_lite_headings', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-heading-hover-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-heading-hover-colour-css"> .entry-title a:focus, .entry-title a:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* meta info hover */
	wp.customize( 'ariele_lite_meta_hover', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-meta-hover-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-meta-hover-colour-css"> .entry-meta a:focus, .entry-meta a:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );		
	
	/* links */
	wp.customize( 'ariele_lite_links', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-link-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-link-colour-css"> a, a:visited { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );			
	
	/* post categories bg */
	wp.customize( 'ariele_lite_post_categories_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-post-cat-bg-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-post-cat-bg-colour-css"> .post-categories a,.post-categories a:visited { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* post categories text */
	wp.customize( 'ariele_lite_post_categories_label', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-post-cat-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-post-cat-text-colour-css"> .post-categories a,.post-categories a:visited { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* post categories hover bg */
	wp.customize( 'ariele_lite_post_categories_hover_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-post-cat-hover-bg-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-post-cat-hover-bg-colour-css"> .post-categories a:focus,.post-categories a:hover { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* post categories hover text */
	wp.customize( 'ariele_lite_post_categories_hover_label', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-post-cat-hover-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-post-cat-hover-text-colour-css"> .post-categories a:focus,.post-categories a:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* post tags bg */
	wp.customize( 'ariele_lite_post_tags_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-post-tags-bg-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-post-tags-bg-colour-css"> .tag-list a { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* post tags text */
	wp.customize( 'ariele_lite_post_tags_label', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-post-tags-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-post-tags-text-colour-css"> .tag-list a { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* post tags hover bg */
	wp.customize( 'ariele_lite_post_tags_hover_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-post-tags-hover-bg-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-post-tags-hover-bg-colour-css"> .tag-list a:hover { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );		
	
	/* post tags hover text */
	wp.customize( 'ariele_lite_post_tags_hover_label', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-post-tags-hover-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-post-tags-hover-text-colour-css"> .tag-list a:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* featured label bg */
	wp.customize( 'ariele_lite_featured_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-featured-bg-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-featured-bg-colour-css"> .featured-media .featured-label { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* featured label text */
	wp.customize( 'ariele_lite_featured_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-featured-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-featured-text-colour-css"> .featured-media .featured-label { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* tag cloud border */
	wp.customize( 'ariele_lite_tagcloud_border', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-tagcloud-border-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-tagcloud-border-css"> .tag-cloud-link { border-color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* tag cloud hover bg */
	wp.customize( 'ariele_lite_tagcloud_hover_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-tagcloud-hover-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-tagcloud-hover-bg-css"> .tag-cloud-link:hover { background:' + to + '; border-color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* tag cloud hover text */
	wp.customize( 'ariele_lite_tagcloud_hover_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-tagcloud-hover-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-tagcloud-hover-text-css"> .tag-cloud-link:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* widget title line */
	wp.customize( 'ariele_lite_widget_title_line', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-widget-title-line-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-widget-title-line-css"> #blog-sidebar .widget-title:after, #left-sidebar .widget-title:after, #right-sidebar .widget-title:after { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );		
	
	/* widget footer title line */
	wp.customize( 'ariele_lite_widget_footer_title_line', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-widget-footer-title-line-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-widget-footer-title-line-css"> #footer-sidebars .widget-title:after { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* footer sidebars bg */
	wp.customize( 'ariele_lite_footer_sidebar_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-footer-sidebar-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-footer-sidebar-bg-css"> #footer-sidebars { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* footer sidebars text */
	wp.customize( 'ariele_lite_footer_sidebar_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-footer-sidebar-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-footer-sidebar-text-css"> #footer-sidebars a, #footer-sidebars a:visited, #footer-sidebars .widget-title { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* footer bg */
	wp.customize( 'ariele_lite_footer_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-footer-sidebar-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-footer-sidebar-text-css"> #site-footer { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* footer text */
	wp.customize( 'ariele_lite_footer_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-site-footer-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-site-footer-text-css"> .site-info, .site-info a, .site-info a:visited, #site-footer .widget-title { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/*widget list lines */
	wp.customize( 'ariele_lite_widget_list_line', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-widget-list-lines-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-widget-list-lines-css"> .widget_meta li, .widget_recent_entries li, .widget_recent_comments li, .widget_archive li, .widget_categories li { border-color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* page intros */
	wp.customize( 'ariele_lite_page_intros', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-page-intros-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-page-intros-css"> #blog-description, #category-description, #page-intro { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );		
	
	/* more link bg */
	wp.customize( 'ariele_lite_more_link_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-more-link-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-more-link-bg-css"> .more-link, .more-link:visited, .excerpt-more-link, .excerpt-more-link:visited { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* more link text */
	wp.customize( 'ariele_lite_more_link_text_colour', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-more-link-text-colour-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-more-link-text-colour-css"> .more-link, .more-link:visited, .excerpt-more-link, .excerpt-more-link:visited { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );		
	
	/* more link hover bg */
	wp.customize( 'ariele_lite_more_link_hover_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-more-link-hover-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-more-link-hover-bg-css"> .more-link:hover, .excerpt-more-link:hover { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* more link hover text */
	wp.customize( 'ariele_lite_more_link_hover_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-more-link-hover-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-more-link-hover-text-css"> .more-link:hover, .excerpt-more-link:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* top social */
	wp.customize( 'ariele_lite_topbar_social_icon', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-top-social-icon-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-top-social-icon-css"> #topbar .social-menu a, #topbar-right .fa-search:before { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* featured image caption bg */
	wp.customize( 'ariele_lite_featured_caption_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-featured-caption-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-featured-caption-bg-css"> .media-caption { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* featured image caption text */
	wp.customize( 'ariele_lite_featured_caption_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-featured-caption-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-featured-caption-text-css"> .media-caption { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );		
	
	/* image caption bg */
	wp.customize( 'ariele_lite_caption_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-caption-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-caption-bg-css"> .wp-caption-text, .gallery-icon { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* image caption text */
	wp.customize( 'ariele_lite_caption_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-caption-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-caption-text-css"> .wp-caption-text, .gallery-icon { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* mobile toggle button bg */
	wp.customize( 'ariele_lite_mobile_toggle_button', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-toggle-button-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-toggle-button-css"> .menu-toggle { background:' + to + ' ; border-color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* mobile toggle button text */
	wp.customize( 'ariele_lite_mobile_toggle_label', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-toggle-button-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-toggle-button-text-css"> .menu-toggle { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* mobile toggle button hover bg */
	wp.customize( 'ariele_lite_mobile_toggle_hover_button', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-toggle-button-hover-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-toggle-button-hover-bg-css"> .menu-toggle:hover { background:' + to + '; border-color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* mobile toggle button hover text */
	wp.customize( 'ariele_lite_mobile_toggle_hover_label', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-toggle-button-hover-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-toggle-button-hover-text-css"> .menu-toggle:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* mobile menu item lines */
	wp.customize( 'ariele_lite_mobile_menu_lines', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-mobile-menu-lines-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-mobile-menu-lines-css"> .toggled-on .main-navigation li, .dropdown-toggle:after { border-color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	
	
	/* mobile menu dropdown hover arrows */
	wp.customize( 'ariele_lite_submenu_dropdown_arrow_hover', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-mobile-menu-dropdown-arrow-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-mobile-menu-dropdown-arrow-css"> .dropdown-toggle:hover,.dropdown-toggle:focus { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* menu links */
	wp.customize( 'ariele_lite_menu_links', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-menu-links-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-menu-links-css"> .main-navigation a, .dropdown-toggle, .main-navigation li.home a { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* menu hover links */
	wp.customize( 'ariele_lite_menu_hover_links', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-menu-hover-links-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-menu-hover-links-css"> .main-navigation li:hover > a { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* menu hover links */
	wp.customize( 'ariele_lite_submenu_dropdown_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-menu-dropdown-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-menu-dropdown-bg-css"> @media (min-width: 768px) {.main-navigation ul ul { background:' + to + ' }} </style>' ).appendTo( $head );
		} );
	} );

	/* menu submenu hover links */
	wp.customize( 'ariele_lite_submenu_link_hover', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-submenu-hover-links-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-submenu-hover-links-css"> .main-navigation ul ul a:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* full post nav bg */
	wp.customize( 'ariele_lite_single_nav_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-single-nav-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-single-nav-bg-css"> .single .nav-links { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* full post nav bg */
	wp.customize( 'ariele_lite_single_nav_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-single-nav-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-single-nav-text-css"> .single .nav-links a { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* button bg */
	wp.customize( 'ariele_lite_button', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-button-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-button-bg-css"> button, .button, input[type=submit], input[type=reset], .widget button.search-submit:hover { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* button text */
	wp.customize( 'ariele_lite_button_label', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-button-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-button-text-css"> button, .button, input[type=submit], input[type=reset], .widget button.search-submit:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* button hover bg */
	wp.customize( 'ariele_lite_button_hover', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-button-hover-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-button-hover-css"> button:hover, .button:hover, input[type=submit]:hover, input[type=reset]:hover, .widget button.search-submit { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* button hover text */
	wp.customize( 'ariele_lite_button_label_hover', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-button-hover-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-button-hover-text-css"> button, .button, input[type=submit]:hover, input[type=reset]:hover, .widget button.search-submit { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* scroll to top bg */
	wp.customize( 'ariele_lite_scroll_button_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-scroll-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-scroll-bg-css"> #scroll-to-top { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* scroll to top icon */
	wp.customize( 'ariele_lite_scroll_button_icon', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-scroll-icon-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-scroll-icon-css"> #scroll-to-top-arrow { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );
	
	/* scroll to top bg hover */
	wp.customize( 'ariele_lite_scroll_button_hover_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-scroll-hover-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-scroll-hover-bg-css"> #scroll-to-top:hover { background:' + to + ' } </style>' ).appendTo( $head );
			} );
	} );	
	
	/* scroll to top hover icon */
	wp.customize( 'ariele_lite_scroll_button_hover_icon', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-scroll-hover-icon-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-scroll-hover-icon-css"> #scroll-to-top-arrow:hover { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );	

	/* blog nav bg */
	wp.customize( 'ariele_lite_blog_nav_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-blog-nav-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-nav-bg-css"> .prev.page-numbers, .next.page-numbers, a.page-numbers { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* blog nav numbers */
	wp.customize( 'ariele_lite_blog_nav_numbers', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-blog-nav-numbers-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-blog-nav-numbers-css"> .prev.page-numbers, .next.page-numbers, a.page-numbers { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* blog nav hover bg */
	wp.customize( 'ariele_lite_blog_nav_hover_bg', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-blog-nav-hover-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-nav-hover-bg-css"> .page-numbers.current, .page-numbers:hover, .page-numbers:visited:hover { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* blog nav hover numbers */
	wp.customize( 'ariele_lite_blog_nav_hover_numbers', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-blog-nav-hover-numbers-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-nav-hover-numbers-css"> .prev.page-numbers, .next.page-numbers, a.page-numbers { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* selection bg */
	wp.customize( 'ariele_lite_selection', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-selection-bg-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-selection-bg-css"> ::selection { background:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	/* selection text */
	wp.customize( 'ariele_lite_selection_text', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-selection-text-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-selection-text-css"> ::selection { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );
	
	/* error code */
	wp.customize( 'ariele_lite_error', function( value ) {
		value.bind( function( to ) {
			var style = $('#custom-error-code-css');			
			style.remove();
			style = $( '<style type="text/css" id="custom-error-code-css"> #error-type { color:' + to + ' } </style>' ).appendTo( $head );
		} );
	} );

	
} )( jQuery );
