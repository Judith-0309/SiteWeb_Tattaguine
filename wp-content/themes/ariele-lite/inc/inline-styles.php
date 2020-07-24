<?php
/**
 * Add inline styles to the head area
 * @package Ariele_Lite
*/
 
 // Dynamic styles
function ariele_lite_inline_styles($custom) {
	
// BEGIN CUSTOM CSS	
	
// content
	$ariele_lite_topbar_bg = get_theme_mod( 'ariele_lite_topbar_bg', '#ef562f' );
	$ariele_lite_colour_sitetitle = get_theme_mod('ariele_lite_colour_sitetitle', '#fff' );
	$ariele_lite_colour_tagline = get_theme_mod('ariele_lite_colour_tagline', '#fff' );
	$ariele_lite_page_bg = get_theme_mod('ariele_lite_page_bg', '#f5f2ed' );
	$ariele_lite_content_bg = get_theme_mod('ariele_lite_content_bg', '#fff' );
	$ariele_lite_content_border = get_theme_mod('ariele_lite_content_border', '#e8e8e8' );	
	$ariele_lite_body_text = get_theme_mod('ariele_lite_body_text', '#686868' );
	$ariele_lite_breadcrumbs_text = get_theme_mod('ariele_lite_breadcrumbs_text', '#8e8e8e' );
	$ariele_lite_archive_prefix = get_theme_mod( 'ariele_lite_archive_prefix', '#ef562f' );	
	$ariele_lite_headings = get_theme_mod('ariele_lite_headings', '#1b1b1b' );
	$ariele_lite_headings_hover = get_theme_mod('ariele_lite_headings_hover', '#847264' );	
	$ariele_lite_meta_hover = get_theme_mod('ariele_lite_meta_hover', '#ef562f' );
	$ariele_lite_links = get_theme_mod('ariele_lite_links', '#ef562f' );
	$ariele_lite_hover_links = get_theme_mod('ariele_lite_hover_links', '#b06545' );	
	$ariele_lite_post_categories_bg = get_theme_mod('ariele_lite_post_categories_bg', '#1b1b1b' );
	$ariele_lite_post_categories_label = get_theme_mod('ariele_lite_post_categories_label', '#fff' );	
	$ariele_lite_post_categories_hover_bg = get_theme_mod('ariele_lite_post_categories_hover_bg', '#ef562f' );
	$ariele_lite_post_categories_hover_label = get_theme_mod('ariele_lite_post_categories_hover_label', '#fff' );
	$ariele_lite_post_tags_bg = get_theme_mod('ariele_lite_post_tags_bg', '#c9beaf' );
	$ariele_lite_post_tags_label = get_theme_mod('ariele_lite_post_tags_label', '#fff' );	
	$ariele_lite_post_tags_hover_bg = get_theme_mod('ariele_lite_post_tags_hover_bg', '#ef562f' );
	$ariele_lite_post_tags_hover_label = get_theme_mod('ariele_lite_post_tags_hover_label', '#fff' );		
	$ariele_lite_featured_bg = get_theme_mod('ariele_lite_featured_bg', '#ef562f' );
	$ariele_lite_featured_text = get_theme_mod('ariele_lite_featured_text', '#fff' );	
	$ariele_lite_widget_list_line = get_theme_mod('ariele_lite_widget_list_line', '#c9beaf' );	
	$ariele_lite_widget_title_line = get_theme_mod('ariele_lite_widget_title_line', '#c9beaf' );
	$ariele_lite_widget_footer_title_line = get_theme_mod('ariele_lite_widget_footer_title_line', '#bf846b' );	
	$ariele_lite_page_intros = get_theme_mod('ariele_lite_page_intros', '#989898' );
	$ariele_lite_more_link_bg = get_theme_mod('ariele_lite_more_link_bg', '#ef562f' );
	$ariele_lite_more_link_text_colour = get_theme_mod('ariele_lite_more_link_text_colour', '#fff' );
	$ariele_lite_more_link_hover_bg = get_theme_mod('ariele_lite_more_link_hover_bg', '#1b1b1b' );
	$ariele_lite_more_link_hover_text = get_theme_mod('ariele_lite_more_link_hover_text', '#fff' );
	$ariele_lite_tagcloud_border = get_theme_mod('ariele_lite_tagcloud_border', '#afafaf' );	
	$ariele_lite_tagcloud_hover_bg = get_theme_mod('ariele_lite_tagcloud_hover_bg', '#ef562f' );
	$ariele_lite_tagcloud_hover_text = get_theme_mod('ariele_lite_tagcloud_hover_text', '#fff' );
	$ariele_lite_about_social_icon = get_theme_mod('ariele_lite_about_social_icon', '#848484' );
	$ariele_lite_about_social_hover_icon = get_theme_mod('ariele_lite_about_social_hover_icon', '#ef562f' );
	$ariele_lite_footer_sidebar_bg = get_theme_mod('ariele_lite_footer_sidebar_bg', '#b06545' );
	$ariele_lite_footer_sidebar_text = get_theme_mod('ariele_lite_footer_sidebar_text', '#fff' );
	$ariele_lite_featured_caption_bg = get_theme_mod('ariele_lite_featured_caption_bg', '#262626' );
	$ariele_lite_featured_caption_text = get_theme_mod('ariele_lite_featured_caption_text', '#fff' );
	$ariele_lite_caption_text = get_theme_mod('ariele_lite_caption_text', '#1b1b1b' );
	$ariele_lite_footer_bg = get_theme_mod('ariele_lite_footer_bg', '#1b1b1b' );
	$ariele_lite_footer_text = get_theme_mod('ariele_lite_footer_text','#dac6bd' );
	$ariele_lite_selection = get_theme_mod('ariele_lite_selection','#ef562f' );
	$ariele_lite_selection_text = get_theme_mod('ariele_lite_selection_text','#fff' );
	$ariele_lite_error = get_theme_mod('ariele_lite_error','#ef562f' );
	$custom .= "body {color: " . esc_attr($ariele_lite_body_text) . "; }
	#topbar {background:" . esc_attr($ariele_lite_topbar_bg) . "}	
	#page {background:" . esc_attr($ariele_lite_page_bg) . "}
	#masthead { border-color: " . esc_attr($ariele_lite_topbar_bg) . "; }	
	#site-title a, #site-title a:visited { color: " . esc_attr($ariele_lite_colour_sitetitle) . "; }
	#site-description { color: " . esc_attr($ariele_lite_colour_tagline) . "; }
	.hentry { background: " . esc_attr($ariele_lite_content_bg) . "; }
	.hentry, #related-posts, #comments, #inset-top-sidebar, #inset-bottom-sidebar { border-color: " . esc_attr($ariele_lite_content_border) . "; }	
	#breadcrumbs-sidebar, #breadcrumbs-sidebar a, #breadcrumbs-sidebar a:visited {color: " . esc_attr($ariele_lite_breadcrumbs_text) . ";}
	.archive-prefix {color: " . esc_attr($ariele_lite_archive_prefix) . ";}
	h1, h2, h3, h4, h5, h6, .entry-title a, .entry-title a:visited {color: " . esc_attr($ariele_lite_headings) . ";}
	.entry-title a:focus, .entry-title a:hover {color: " . esc_attr($ariele_lite_headings_hover) . ";}	
	.entry-meta a:focus, .entry-meta a:hover {color: " . esc_attr($ariele_lite_meta_hover) . ";}
	a, a:visited {color: " . esc_attr($ariele_lite_links) . ";}
	a:hover, a:focus, a:active {color: " . esc_attr($ariele_lite_hover_links) . ";}
	.more-link, .more-link:visited, .excerpt-more-link, .excerpt-more-link:visited {background: " . esc_attr($ariele_lite_more_link_bg) . "; color: " . esc_attr($ariele_lite_more_link_text_colour) . ";}	
	.more-link:focus, .more-link:hover, .excerpt-more-link:focus, .excerpt-more-link:hover {background: " . esc_attr($ariele_lite_more_link_hover_bg) . "; color: " . esc_attr($ariele_lite_more_link_hover_text) . ";}		
	.post-categories a,.post-categories a:visited {background: " . esc_attr($ariele_lite_post_categories_bg) . "; color: " . esc_attr($ariele_lite_post_categories_label) . ";}
	.post-categories a:hover, .post-categories a:focus {background: " . esc_attr($ariele_lite_post_categories_hover_bg) . "; color: " . esc_attr($ariele_lite_post_categories_hover_label) . ";}		
	#blog-description, #category-description, #page-intro {color: " . esc_attr($ariele_lite_page_intros) . ";}	
	.widget_meta li, .widget_recent_entries li, .widget_recent_comments li, .widget_pages li, .widget_archive li, .widget_categories li, .widget_pages .children {border-color: " . esc_attr($ariele_lite_widget_list_line) . ";}	
	.tag-list a, .tag-list a:visited {background: " . esc_attr($ariele_lite_post_tags_bg) . "; color: " . esc_attr($ariele_lite_post_tags_label) . ";}	
	.tag-list a:hover, .tag-list a:focus {background: " . esc_attr($ariele_lite_post_tags_hover_bg) . "; color: " . esc_attr($ariele_lite_post_tags_hover_label) . ";}	
	.ribbon-featured {background: " . esc_attr($ariele_lite_featured_bg) . "; color: " . esc_attr($ariele_lite_featured_text) . ";}	
	.tag-cloud-link {border-color: " . esc_attr($ariele_lite_tagcloud_border) . "; }
	.tag-cloud-link:hover {background: " . esc_attr($ariele_lite_tagcloud_hover_bg) . "; border-color: " . esc_attr($ariele_lite_tagcloud_hover_bg) . "; color: " . esc_attr($ariele_lite_tagcloud_hover_text) . ";}
	#footer-sidebars {background: " . esc_attr($ariele_lite_footer_sidebar_bg) . "; color: " . esc_attr($ariele_lite_footer_sidebar_text) . ";}
	#footer-sidebars a, #footer-sidebars a:visited, #footer-sidebars .widget-title {color: " . esc_attr($ariele_lite_footer_sidebar_text) . ";}
	#site-footer {background: " . esc_attr($ariele_lite_footer_bg) . ";}	
	.site-info, .site-info a, .site-info a:visited, #site-footer .widget-title  {color:" . esc_attr($ariele_lite_footer_text) . ";}
	.media-caption {background: " . esc_attr($ariele_lite_featured_caption_bg) . "; color: " . esc_attr($ariele_lite_featured_caption_text) . ";}
	.wp-caption-text, .gallery-icon {color: " . esc_attr($ariele_lite_caption_text) . ";}
	#error-type  {color:" . esc_attr($ariele_lite_error) . ";}
	#bottom-sidebars .widget-title:after,#top-sidebars .widget-title:after,#blog-sidebar .widget-title:after, #left-sidebar .widget-title:after, #right-sidebar .widget-title:after  {background:" . esc_attr($ariele_lite_widget_title_line) . ";}
	#footer-sidebars .widget-title:after  {background:" . esc_attr($ariele_lite_widget_footer_title_line) . ";}	
	::selection {background: " . esc_attr($ariele_lite_selection) . "; color: " . esc_attr($ariele_lite_selection_text) . ";}
	"."\n";
	
// navigation
	$ariele_lite_mobile_toggle_button = get_theme_mod( 'ariele_lite_mobile_toggle_button', '#ef562f' );	
	$ariele_lite_mobile_toggle_hover_button = get_theme_mod( 'ariele_lite_mobile_toggle_hover_button', '#f5f2ed' );	
	$ariele_lite_mobile_toggle_label = get_theme_mod( 'ariele_lite_mobile_toggle_label', '#fff' );
	$ariele_lite_mobile_toggle_hover_label = get_theme_mod( 'ariele_lite_mobile_toggle_hover_label', '#1b1b1b' );
	$ariele_lite_mobile_menu_lines = get_theme_mod( 'ariele_lite_mobile_menu_lines', '#404040' );	
	$ariele_lite_menu_links = get_theme_mod( 'ariele_lite_menu_links', '#fff' );
	$ariele_lite_menu_hover_links = get_theme_mod( 'ariele_lite_menu_hover_links', '#ef562f' );
	$ariele_lite_menu_active_link_border = get_theme_mod( 'ariele_lite_menu_active_link_border', '#ef562f' );
	$ariele_lite_submenu_dropdown_arrow_hover = get_theme_mod( 'ariele_lite_submenu_dropdown_arrow_hover', '#ef562f' );	
	$ariele_lite_submenu_dropdown_bg = get_theme_mod( 'ariele_lite_submenu_dropdown_bg', '#1b1b1b' );	
	$ariele_lite_submenu_link_hover = get_theme_mod( 'ariele_lite_submenu_link_hover', '#fff' );	
	$ariele_lite_single_nav_bg = get_theme_mod( 'ariele_lite_single_nav_bg', '#fff' );
	$ariele_lite_single_nav_text = get_theme_mod( 'ariele_lite_single_nav_text', '#1b1b1b' );			
	$ariele_lite_blog_nav_bg = get_theme_mod( 'ariele_lite_blog_nav_bg', '#fff' );
	$ariele_lite_blog_nav_numbers = get_theme_mod( 'ariele_lite_blog_nav_numbers', '#1b1b1b' );
	$ariele_lite_blog_nav_hover_bg = get_theme_mod( 'ariele_lite_blog_nav_hover_bg', '#ef562f' );
	$ariele_lite_blog_nav_hover_numbers = get_theme_mod( 'ariele_lite_blog_nav_hover_numbers', '#fff' );
	$ariele_lite_topbar_social_icon = get_theme_mod( 'ariele_lite_topbar_social_icon', '#fff' );
	$ariele_lite_more_link_label = get_theme_mod( 'ariele_lite_more_link_label', '#fff' );
	$ariele_lite_more_link_button = get_theme_mod( 'ariele_lite_more_link_button', '#ef562f' );
	$ariele_lite_more_link_hbutton = get_theme_mod( 'ariele_lite_more_link_hbutton', '#1b1b1b' );	
	$ariele_lite_scroll_button_bg = get_theme_mod( 'ariele_lite_scroll_button_bg', '#ef562f' );
	$ariele_lite_scroll_button_icon = get_theme_mod( 'ariele_lite_scroll_button_icon', '#fff' );
	$ariele_lite_scroll_button_hover_bg = get_theme_mod( 'ariele_lite_scroll_button_hover_bg', '#c2a68c' );
	$ariele_lite_scroll_button_hover_icon = get_theme_mod( 'ariele_lite_scroll_button_hover_icon', '#fff' );	
	$custom .= ".menu-toggle {background:" . esc_attr($ariele_lite_mobile_toggle_button) . "; border-color:" . esc_attr($ariele_lite_mobile_toggle_button) . "; color:" . esc_attr($ariele_lite_mobile_toggle_label) . ";}	
	.menu-toggle:hover, .menu-toggle:focus, .menu-toggle.toggled-on, .menu-toggle.toggled-on:hover, .menu-toggle.toggled-on:focus { background:" . esc_attr($ariele_lite_mobile_toggle_hover_button) . "; border-color:" . esc_attr($ariele_lite_mobile_toggle_hover_button) . "; color:" . esc_attr($ariele_lite_mobile_toggle_hover_label) . "; }

	.toggled-on .main-navigation li, .dropdown-toggle:after {border-color:" . esc_attr($ariele_lite_mobile_menu_lines) . ";}	
	.main-navigation a, .dropdown-toggle, .main-navigation li.home a {color:" . esc_attr($ariele_lite_menu_links) . ";}
	.main-navigation li:hover > a,	.main-navigation li.focus > a {color:" . esc_attr($ariele_lite_menu_hover_links) . ";}
	.main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a,.widget_nav_menu .current-menu-item a, .widget_pages .current-menu-item a {border-color:" . esc_attr($ariele_lite_menu_active_link_border) . ";}	
	.dropdown-toggle:hover,.dropdown-toggle:focus {color:" . esc_attr($ariele_lite_submenu_dropdown_arrow_hover) . ";}		
	@media (min-width: 768px){
	.main-navigation ul ul { background:" . esc_attr($ariele_lite_submenu_dropdown_bg) . ";}	
	.main-navigation ul ul a:hover {color:" . esc_attr($ariele_lite_submenu_link_hover) . ";} 
	}
	.single .nav-links {background:" . esc_attr($ariele_lite_single_nav_bg) . "; }
	.single .nav-links a,.single .nav-links a:visited {color:" . esc_attr($ariele_lite_single_nav_text) . ";}
	#topbar .social-menu a, #topbar .social-menu a:visited, #topbar-right .fa-search:before {color:" . esc_attr($ariele_lite_topbar_social_icon) . ";}
	
	.prev.page-numbers, .next.page-numbers, a.page-numbers, a.page-numbers:visited { background:" . esc_attr($ariele_lite_blog_nav_bg) . ";color:" . esc_attr($ariele_lite_blog_nav_numbers) . ";}
	.page-numbers.current, .page-numbers:hover, .page-numbers:visited:hover { background:" . esc_attr($ariele_lite_blog_nav_hover_bg) . ";color:" . esc_attr($ariele_lite_blog_nav_hover_numbers) . ";}
	
	#scroll-to-top  {background:" . esc_attr($ariele_lite_scroll_button_bg) . ";}
	#scroll-to-top-arrow, #scroll-to-top-arrow:visited, #scroll-to-top-arrow:hover  {color:" . esc_attr($ariele_lite_scroll_button_icon) . ";}
	#scroll-to-top:hover  {background:" . esc_attr($ariele_lite_scroll_button_hover_bg) . ";}
	#scroll-to-top-arrow:focus, #scroll-to-top-arrow:hover  {color:" . esc_attr($ariele_lite_scroll_button_hover_icon) . ";}
	"."\n";	

// forms
	$ariele_lite_button = get_theme_mod( 'ariele_lite_button', '#1b1b1b' );	
	$ariele_lite_button_label = get_theme_mod( 'ariele_lite_button_label', '#fff' );
	$ariele_lite_button_hover = get_theme_mod( 'ariele_lite_button_hover', '#ef562f' );	
	$ariele_lite_button_label_hover = get_theme_mod( 'ariele_lite_button_label_hover', '#fff' );	
	$custom .= "button, .button:visited,button[disabled]:hover, button[disabled]:focus, input[type=button], input[type=button][disabled]:hover, input[type=button][disabled]:focus, input[type=reset], input[type=reset][disabled]:hover, input[type=reset][disabled]:focus, input[type=submit], input[type=submit][disabled]:hover, input[type=submit][disabled]:focus, .widget button.search-submit:focus, .widget button.search-submit:hover  {background: " . esc_attr($ariele_lite_button) . "; color: " . esc_attr($ariele_lite_button_label) . ";}	
	.button:hover,button:hover, button:focus, input[type=button]:hover, input[type=button]:focus, input[type=reset]:hover, input[type=reset]:focus, input[type=submit]:hover, input[type=submit]:focus, .widget button.search-submit  {background: " . esc_attr($ariele_lite_button_hover) . "; color: " . esc_attr($ariele_lite_button_label_hover) . ";}	
	"."\n";
 
// END CUSTOM CSS
//Output all the styles
	wp_add_inline_style( 'ariele-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'ariele_lite_inline_styles' );	
