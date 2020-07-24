<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_education_lite_first_color = get_theme_mod('vw_education_lite_first_color');

	$vw_education_lite_custom_css = '';

	if($vw_education_lite_first_color != false){
		$vw_education_lite_custom_css .=' #slider .carousel-control-prev-icon i, #slider .carousel-control-next-icon i, .more-btn a, .scrollup i, .copyright-wrapper, .header, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .sidebar h3, .read-btn a, #comments input[type="submit"].submit, .pagination span, .pagination a, .pagination .current, #footer .tagcloud a:hover, a.button, nav.woocommerce-MyAccount-navigation ul li, .woocommerce span.onsale, .tagcloud a:hover, input[type="submit"], .sidebar .tagcloud a:hover, .page-content .read-moresec a.button, .header-fixed, #comments a.comment-reply-link, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer-widgets .widget_price_filter .ui-slider .ui-slider-range, .footer-widgets .widget_price_filter .ui-slider .ui-slider-handle, .footer-widgets .woocommerce-product-search button, .sidebar a.custom_read_more, .footer-widgets a.custom_read_more, .sidebar input[type="submit"]{';
			$vw_education_lite_custom_css .='background-color: '.esc_html($vw_education_lite_first_color).';';
		$vw_education_lite_custom_css .='}';
	}
	if($vw_education_lite_first_color != false){
		$vw_education_lite_custom_css .='.search-submit{';
			$vw_education_lite_custom_css .='background-color: '.esc_html($vw_education_lite_first_color).'!important;';
		$vw_education_lite_custom_css .='}';
	}
	if($vw_education_lite_first_color != false){
		$vw_education_lite_custom_css .='.footer-widgets h3, .metabox, a, .more-btn a:hover, .read-btn a:hover, .pagination a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .woocommerce-message::before, .textwidget p a , .main-navigation ul.sub-menu a:hover, .footer-widgets li a:hover, .sidebar li a:hover, .post-navigation span.meta-nav:hover, #comments input[type="submit"].submit:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .page-content .read-moresec a.button:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .footer-widgets .woocommerce-product-search button:hover, .sidebar a.custom_read_more:hover{';
			$vw_education_lite_custom_css .='color: '.esc_html($vw_education_lite_first_color).';';
		$vw_education_lite_custom_css .='}';
	}
	if($vw_education_lite_first_color != false){
		$vw_education_lite_custom_css .='.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{';
			$vw_education_lite_custom_css .='color: '.esc_html($vw_education_lite_first_color).'!important;';
		$vw_education_lite_custom_css .='}';
	}
	if($vw_education_lite_first_color != false){
		$vw_education_lite_custom_css .='.sidebar aside, .search-submit, .sidebar .social_widget, .sidebar table, .woocommerce-message, input[type="submit"]{';
			$vw_education_lite_custom_css .='border-color: '.esc_html($vw_education_lite_first_color).'!important;';
		$vw_education_lite_custom_css .='}';
	}
	if($vw_education_lite_first_color != false){
		$vw_education_lite_custom_css .='.box-content h4, .services-box, .main-navigation ul ul{';
			$vw_education_lite_custom_css .='border-top-color: '.esc_html($vw_education_lite_first_color).';';
		$vw_education_lite_custom_css .='}';
	}
	if($vw_education_lite_first_color != false){
		$vw_education_lite_custom_css .='.main-navigation ul ul, .footer-widgets h3:after{';
			$vw_education_lite_custom_css .='border-bottom-color: '.esc_html($vw_education_lite_first_color).';';
		$vw_education_lite_custom_css .='}';
	}

	$vw_education_lite_custom_css .='@media screen and (max-width:1000px) {';
	if($vw_education_lite_first_color != false){
		$vw_education_lite_custom_css .='.page-template-custom-homepage .header{
		background-color:'.esc_html($vw_education_lite_first_color).';
		}';
	}
	$vw_education_lite_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$vw_education_lite_theme_lay = get_theme_mod( 'vw_education_lite_width_option','Full Width');
    if($vw_education_lite_theme_lay == 'Boxed'){
		$vw_education_lite_custom_css .='body{';
			$vw_education_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.page-template-custom-homepage .header .nav{';
			$vw_education_lite_custom_css .='margin: 27px 11.6em 0 0;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.nav ul li a{';
			$vw_education_lite_custom_css .='padding: 8px 12px;';
		$vw_education_lite_custom_css .='}';
	}else if($vw_education_lite_theme_lay == 'Wide Width'){
		$vw_education_lite_custom_css .='body{';
			$vw_education_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.page-template-custom-homepage .header .nav{';
			$vw_education_lite_custom_css .='margin: 27px 2em 0 0;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.nav ul li a{';
			$vw_education_lite_custom_css .='padding: 12px 15px;';
		$vw_education_lite_custom_css .='}';
	}else if($vw_education_lite_theme_lay == 'Full Width'){
		$vw_education_lite_custom_css .='body{';
			$vw_education_lite_custom_css .='max-width: 100%;';
		$vw_education_lite_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_education_lite_theme_lay = get_theme_mod( 'vw_education_lite_slider_opacity_color','0.5');
	if($vw_education_lite_theme_lay == '0'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.1'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.1';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.2'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.2';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.3'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.3';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.4'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.4';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.5'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.5';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.6'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.6';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.7'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.7';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.8'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.8';
		$vw_education_lite_custom_css .='}';
		}else if($vw_education_lite_theme_lay == '0.9'){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='opacity:0.9';
		$vw_education_lite_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_education_lite_theme_lay = get_theme_mod( 'vw_education_lite_slider_content_option','Center');
    if($vw_education_lite_theme_lay == 'Left'){
		$vw_education_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_education_lite_custom_css .='text-align:left; left:15%; right:45%';
		$vw_education_lite_custom_css .='}';
	}else if($vw_education_lite_theme_lay == 'Center'){
		$vw_education_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_education_lite_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_education_lite_custom_css .='}';
	}else if($vw_education_lite_theme_lay == 'Right'){
		$vw_education_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_education_lite_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_education_lite_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_education_lite_slider_height = get_theme_mod('vw_education_lite_slider_height');
	if($vw_education_lite_slider_height != false){
		$vw_education_lite_custom_css .='#slider img{';
			$vw_education_lite_custom_css .='height: '.esc_html($vw_education_lite_slider_height).';';
		$vw_education_lite_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_education_lite_slider = get_theme_mod('vw_education_lite_slider_hide_show');
	if($vw_education_lite_slider == false){
		$vw_education_lite_custom_css .='.page-template-custom-homepage .header, .page-template-custom-homepage .logo_box{';
			$vw_education_lite_custom_css .='position:static; background:#99ce34;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.page-template-custom-homepage .header .nav{';
			$vw_education_lite_custom_css .='margin:0; background:#99ce34;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.page-template-custom-homepage .logo{';
			$vw_education_lite_custom_css .='margin-top:10px;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.page-template-custom-homepage .menu-bar-left{';
			$vw_education_lite_custom_css .='background:none;';
		$vw_education_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_education_lite_theme_lay = get_theme_mod( 'vw_education_lite_blog_layout_option','Default');
    if($vw_education_lite_theme_lay == 'Default'){
		$vw_education_lite_custom_css .='.services-box{';
			$vw_education_lite_custom_css .='';
		$vw_education_lite_custom_css .='}';
	}else if($vw_education_lite_theme_lay == 'Center'){
		$vw_education_lite_custom_css .='.services-box, .services-box h2, .services-box p, .services-box .read-btn, .services-box .post-info{';
			$vw_education_lite_custom_css .='text-align:center;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.post-info{';
			$vw_education_lite_custom_css .='margin-top: 10px;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.services-box .read-btn{';
			$vw_education_lite_custom_css .='padding-top: 10px;';
		$vw_education_lite_custom_css .='}';
	}else if($vw_education_lite_theme_lay == 'Left'){
		$vw_education_lite_custom_css .='.services-box, .services-box h2, .services-box p{';
			$vw_education_lite_custom_css .='text-align:Left;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.post-info{';
			$vw_education_lite_custom_css .='margin-top: 10px;';
		$vw_education_lite_custom_css .='}';
		$vw_education_lite_custom_css .='.services-box .read-btn{';
			$vw_education_lite_custom_css .='padding-top: 10px;';
		$vw_education_lite_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_education_lite_resp_topbar = get_theme_mod( 'vw_education_lite_resp_topbar_hide_show',false);
    if($vw_education_lite_resp_topbar == true){
    	$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.top-bar{';
			$vw_education_lite_custom_css .='display:block;';
		$vw_education_lite_custom_css .='} }';
	}else if($vw_education_lite_resp_topbar == false){
		$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.top-bar{';
			$vw_education_lite_custom_css .='display:none;';
		$vw_education_lite_custom_css .='} }';
	}

	$vw_education_lite_resp_stickyheader = get_theme_mod( 'vw_education_lite_stickyheader_hide_show',false);
    if($vw_education_lite_resp_stickyheader == true){
    	$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.header-fixed{';
			$vw_education_lite_custom_css .='display:block;';
		$vw_education_lite_custom_css .='} }';
	}else if($vw_education_lite_resp_stickyheader == false){
		$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.header-fixed{';
			$vw_education_lite_custom_css .='display:none;';
		$vw_education_lite_custom_css .='} }';
	}

	$vw_education_lite_resp_slider = get_theme_mod( 'vw_education_lite_resp_slider_hide_show',false);
    if($vw_education_lite_resp_slider == true){
    	$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='#slider{';
			$vw_education_lite_custom_css .='display:block;';
		$vw_education_lite_custom_css .='} }';
	}else if($vw_education_lite_resp_slider == false){
		$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='#slider{';
			$vw_education_lite_custom_css .='display:none;';
		$vw_education_lite_custom_css .='} }';
	}

	$vw_education_lite_resp_metabox = get_theme_mod( 'vw_education_lite_metabox_hide_show',true);
    if($vw_education_lite_resp_metabox == true){
    	$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.post-info{';
			$vw_education_lite_custom_css .='display:block;';
		$vw_education_lite_custom_css .='} }';
	}else if($vw_education_lite_resp_metabox == false){
		$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.post-info{';
			$vw_education_lite_custom_css .='display:none;';
		$vw_education_lite_custom_css .='} }';
	}

	$vw_education_lite_resp_sidebar = get_theme_mod( 'vw_education_lite_sidebar_hide_show',true);
    if($vw_education_lite_resp_sidebar == true){
    	$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.sidebar{';
			$vw_education_lite_custom_css .='display:block;';
		$vw_education_lite_custom_css .='} }';
	}else if($vw_education_lite_resp_sidebar == false){
		$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.sidebar{';
			$vw_education_lite_custom_css .='display:none;';
		$vw_education_lite_custom_css .='} }';
	}

	$vw_education_lite_resp_scroll_top = get_theme_mod( 'vw_education_lite_resp_scroll_top_hide_show',true);
    if($vw_education_lite_resp_scroll_top == true){
    	$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.scrollup i{';
			$vw_education_lite_custom_css .='display:block;';
		$vw_education_lite_custom_css .='} }';
	}else if($vw_education_lite_resp_scroll_top == false){
		$vw_education_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_education_lite_custom_css .='.scrollup i{';
			$vw_education_lite_custom_css .='display:none !important;';
		$vw_education_lite_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_education_lite_topbar_padding_top_bottom = get_theme_mod('vw_education_lite_topbar_padding_top_bottom');
	if($vw_education_lite_topbar_padding_top_bottom != false){
		$vw_education_lite_custom_css .='.top-bar{';
			$vw_education_lite_custom_css .='padding-top: '.esc_html($vw_education_lite_topbar_padding_top_bottom).'; padding-bottom: '.esc_html($vw_education_lite_topbar_padding_top_bottom).';';
		$vw_education_lite_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_education_lite_sticky_header_padding = get_theme_mod('vw_education_lite_sticky_header_padding');
	if($vw_education_lite_sticky_header_padding != false){
		$vw_education_lite_custom_css .='.header-fixed{';
			$vw_education_lite_custom_css .='padding: '.esc_html($vw_education_lite_sticky_header_padding).';';
		$vw_education_lite_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_education_lite_button_padding_top_bottom = get_theme_mod('vw_education_lite_button_padding_top_bottom');
	$vw_education_lite_button_padding_left_right = get_theme_mod('vw_education_lite_button_padding_left_right');
	if($vw_education_lite_button_padding_top_bottom != false || $vw_education_lite_button_padding_left_right != false){
		$vw_education_lite_custom_css .='.services-box .read-btn a{';
			$vw_education_lite_custom_css .='padding-top: '.esc_html($vw_education_lite_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_education_lite_button_padding_top_bottom).';padding-left: '.esc_html($vw_education_lite_button_padding_left_right).';padding-right: '.esc_html($vw_education_lite_button_padding_left_right).';';
		$vw_education_lite_custom_css .='}';
	}

	$vw_education_lite_button_border_radius = get_theme_mod('vw_education_lite_button_border_radius');
	if($vw_education_lite_button_border_radius != false){
		$vw_education_lite_custom_css .='.services-box .read-btn a{';
			$vw_education_lite_custom_css .='border-radius: '.esc_html($vw_education_lite_button_border_radius).'px;';
		$vw_education_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_education_lite_copyright_alingment = get_theme_mod('vw_education_lite_copyright_alingment');
	if($vw_education_lite_copyright_alingment != false){
		$vw_education_lite_custom_css .='.copyright p{';
			$vw_education_lite_custom_css .='text-align: '.esc_html($vw_education_lite_copyright_alingment).';';
		$vw_education_lite_custom_css .='}';
	}

	$vw_education_lite_copyright_padding_top_bottom = get_theme_mod('vw_education_lite_copyright_padding_top_bottom');
	if($vw_education_lite_copyright_padding_top_bottom != false){
		$vw_education_lite_custom_css .='.copyright-wrapper{';
			$vw_education_lite_custom_css .='padding-top: '.esc_html($vw_education_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_education_lite_copyright_padding_top_bottom).';';
		$vw_education_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_education_lite_scroll_to_top_font_size = get_theme_mod('vw_education_lite_scroll_to_top_font_size');
	if($vw_education_lite_scroll_to_top_font_size != false){
		$vw_education_lite_custom_css .='.scrollup i{';
			$vw_education_lite_custom_css .='font-size: '.esc_html($vw_education_lite_scroll_to_top_font_size).';';
		$vw_education_lite_custom_css .='}';
	}

	$vw_education_lite_scroll_to_top_padding_top_bottom = get_theme_mod('vw_education_lite_scroll_to_top_padding_top_bottom');
	if($vw_education_lite_scroll_to_top_padding_top_bottom != false ){
		$vw_education_lite_custom_css .='.scrollup i{';
			$vw_education_lite_custom_css .='padding-top: '.esc_html($vw_education_lite_scroll_to_top_padding_top_bottom).'; padding-bottom: '.esc_html($vw_education_lite_scroll_to_top_padding_top_bottom).';';
		$vw_education_lite_custom_css .='}';
	}

	$vw_education_lite_scroll_to_top_width = get_theme_mod('vw_education_lite_scroll_to_top_width');
	if($vw_education_lite_scroll_to_top_width != false){
		$vw_education_lite_custom_css .='.scrollup i{';
			$vw_education_lite_custom_css .='width: '.esc_html($vw_education_lite_scroll_to_top_width).';';
		$vw_education_lite_custom_css .='}';
	}

	$vw_education_lite_scroll_to_top_height = get_theme_mod('vw_education_lite_scroll_to_top_height');
	if($vw_education_lite_scroll_to_top_height != false){
		$vw_education_lite_custom_css .='.scrollup i{';
			$vw_education_lite_custom_css .='height: '.esc_html($vw_education_lite_scroll_to_top_height).';';
		$vw_education_lite_custom_css .='}';
	}

	$vw_education_lite_scroll_to_top_border_radius = get_theme_mod('vw_education_lite_scroll_to_top_border_radius');
	if($vw_education_lite_scroll_to_top_border_radius != false){
		$vw_education_lite_custom_css .='.scrollup i{';
			$vw_education_lite_custom_css .='border-radius: '.esc_html($vw_education_lite_scroll_to_top_border_radius).'px;';
		$vw_education_lite_custom_css .='}';
	}
