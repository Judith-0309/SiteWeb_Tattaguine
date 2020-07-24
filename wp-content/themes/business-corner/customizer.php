<?php
/**
 * Business Corner Theme Customizer.
 *
 * @package Business Corner
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_corner_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
	//general settings
	
	$wp_customize->add_section( 'business_corner_general_section' , array(
		'title'       => __( 'General Options', 'business-corner' ),
		'priority'    => 20,
		'description' => __( 'Theme\'s general settings ', 'business-corner' ),
	) );
	
	$wp_customize->add_setting( 'business_corner_theme_color_setting', array (
		'default'     => '#349cd2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_corner_theme_color', array(
		'label'    => __( 'Theme Color', 'business-corner' ),
		'section'  => 'business_corner_general_section',
		'settings' => 'business_corner_theme_color_setting',
	) ) );
	
	$wp_customize->add_setting('business_corner_home_layout', array(
		'default' => 'right',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_home_layout', array(
		'settings' => 'business_corner_home_layout',
		'type' => 'select',
		'label' => __('Select Blog Page Layout:','business-corner'),
		'section' => 'business_corner_general_section',
		'choices' => array(
			'left'=>__('Left Sidebar','business-corner'),
			'right'=>__('Right Sidebar','business-corner'),
			'full'=>__('Full Width','business-corner'),			
			),
		'priority'	=> 25
	));
	
	$wp_customize->add_setting('business_corner_post_layout', array(
		'default' => 'right',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_post_layout', array(
		'settings' => 'business_corner_post_layout',
		'type' => 'select',
		'label' => __('Select Post Page Layout:','business-corner'),
		'section' => 'business_corner_general_section',
		'choices' => array(
			'left'=>__('Left Sidebar','business-corner'),
			'right'=>__('Right Sidebar','business-corner'),
			'full'=>__('Full Width','business-corner'),				
			),
		'priority'	=> 25
	));
	
	//header settings
	$wp_customize->add_panel( 'business_corner_header_panel', array(
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
		'title'          => __('Header Settings', 'business-corner' ),
		'description'    => __('Manage Header options here', 'business-corner' ),
	) );
	
	//topbar
	
	$wp_customize->add_section( 'business_corner_topbar_section' , array(
		'title'       => __( 'Topbar', 'business-corner' ),
		'priority'    => 20,
		'description' => __( 'Topbar settings ', 'business-corner' ),
		'panel'  => 'business_corner_header_panel',
	) );
	
	$wp_customize->add_setting('business_corner_display_topbar_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('business_corner_display_topbar_setting', array(
		'settings' => 'business_corner_display_topbar_setting',
		'label'    => __('Display Header Sections', 'business-corner'),
		'section'  => 'business_corner_topbar_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('business_corner_topbar_text', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_topbar_text', array(
		'settings' => 'business_corner_topbar_text',
		'label' => __('Topbar Text ','business-corner'),
		'description' => __( 'Please add topbar text', 'business-corner' ),
		'section' => 'business_corner_topbar_section',
		'active_callback' =>'business_corner_topbar_active_callback',
		'priority'	=> 30
	));
	
	for($i=1; $i<=5; $i++){
	$wp_customize->add_setting('business_corner_social_icon_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_social_icon_'.$i, array(
		'settings' => 'business_corner_social_icon_'.$i,
		'label' => __('Social Icon ','business-corner').$i,
		'description' => __( 'Please add <strong>FontAwesome</strong> Class of respective social. Like  <strong>fa fa-facebook</strong>', 'business-corner' ),
		'section' => 'business_corner_topbar_section',
		'active_callback' =>'business_corner_topbar_active_callback',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_social_link_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('business_corner_social_link_'.$i, array(
		'settings' => 'business_corner_social_link_'.$i,
		'label' => __('Social Link ','business-corner').$i,
		'description' => __( 'Please add social link', 'business-corner' ),
		'section' => 'business_corner_topbar_section',
		'active_callback' =>'business_corner_topbar_active_callback',
		'priority'	=> 30
	));
	}
	
	//header elements
	$wp_customize->add_section( 'business_corner_header_section' , array(
		'title'       => __( 'Header Elements', 'business-corner' ),
		'priority'    => 20,
		'description' => __( 'Header elements settings ', 'business-corner' ),
		'panel'  => 'business_corner_header_panel',
	) );
	
	$wp_customize->add_setting('business_corner_display_element_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('business_corner_display_element_setting', array(
		'settings' => 'business_corner_display_element_setting',
		'label'    => __('Display Header Sections', 'business-corner'),
		'section'  => 'business_corner_header_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	for($i=1; $i<=3; $i++){
	$wp_customize->add_setting('business_corner_header_icon_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_header_icon_'.$i, array(
		'settings' => 'business_corner_header_icon_'.$i,
		'label' => __('Header Element Icon ','business-corner').$i,
		'description' => __( 'Please add <strong>FontAwesome</strong> Class of respective social. Like  <strong>fa fa-facebook</strong>', 'business-corner' ),
		'section' => 'business_corner_header_section',
		'active_callback' =>'business_corner_element_active_callback',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_header_heading_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_header_heading_'.$i, array(
		'settings' => 'business_corner_header_heading_'.$i,
		'label' => __('Header Element Heading ','business-corner').$i,
		'description' => __( 'Please add element\'s heading', 'business-corner' ),
		'section' => 'business_corner_header_section',
		'active_callback' =>'business_corner_element_active_callback',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_header_desc_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_header_desc_'.$i, array(
		'settings' => 'business_corner_header_desc_'.$i,
		'label' => __('Header Element Description ','business-corner').$i,
		'description' => __( 'Please add element\'s description', 'business-corner' ),
		'section' => 'business_corner_header_section',
		'active_callback' =>'business_corner_element_active_callback',
		'priority'	=> 30
	));
	}
	
	//Main Panel
	$wp_customize->add_panel( 'business_corner_home_featured_panel', array(
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
		'title'          => __('Front Page Features', 'business-corner' ),
		'description'    => __('Section that will show on Front page', 'business-corner' ),
	) );
	
	//slider
	$wp_customize->add_section( 'business_corner_slider_section' , array(
		'title'       => __( 'Slider', 'business-corner' ),
		'priority'    => 20,
		'description' => __( 'Slider Option', 'business-corner' ),
		'panel'  => 'business_corner_home_featured_panel',
	) );

	$wp_customize->add_setting('business_corner_display_slider_setting', array(
		'default'        => 1,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('business_corner_display_slider_control', array(
		'settings' => 'business_corner_display_slider_setting',
		'label'    => __('Display Slider', 'business-corner'),
		'section'  => 'business_corner_slider_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('business_corner_default_slider_setting', array(
		'default'        => 1,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('business_corner_default_slider_control', array(
		'settings' => 'business_corner_default_slider_setting',
		'label'    => __('Display Recent Posts Slider', 'business-corner'),
		'description'    => __('Check this checkbox to show recents posts in Slider. If you want show slides from specific category, then uncheck it and select category in below setting.', 'business-corner'),
		'section'  => 'business_corner_slider_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	//  =============================
	//  Select Box               
	//  =============================
	$wp_customize->add_setting('business_corner_category_slider', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_category',
	));

	$wp_customize->add_control('business_corner_slider_control', array(
		'settings' => 'business_corner_category_slider',
		'type' => 'select',
		'label' => __('Select Category:','business-corner'),
		'section' => 'business_corner_slider_section',
		'active_callback' =>'business_corner_slider_active_callback',
		'choices' => $cats,
		'priority'	=> 25
	));
	
	//service
	$wp_customize->add_section( 'business_corner_service_section' , array(
		'title'       => __( 'Service', 'business-corner' ),
		'priority'    => 25,
		'description' => __( 'Service Option', 'business-corner' ),
		'panel'  => 'business_corner_home_featured_panel',
	) );

	$wp_customize->add_setting('business_corner_display_service_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('business_corner_display_service_control', array(
		'settings' => 'business_corner_display_service_setting',
		'label'    => __('Display Service', 'business-corner'),
		'section'  => 'business_corner_service_section',
		'type'     => 'checkbox',
		'priority'	=> 25
	));
	
	$wp_customize->add_setting('business_corner_heading_service', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_heading_service', array(
		'settings' => 'business_corner_heading_service',
		'label' => __('Service Heading:','business-corner'),
		'section' => 'business_corner_service_section',
		'active_callback' =>'business_corner_service_active_callback',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_desc_service', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_desc_service', array(
		'settings' => 'business_corner_desc_service',
		'type' => 'textarea',
		'label' => __('Service Description:','business-corner'),
		'section' => 'business_corner_service_section',
		'active_callback' =>'business_corner_service_active_callback',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_category_service', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_category',
	));

	$wp_customize->add_control('business_corner_service_control', array(
		'settings' => 'business_corner_category_service',
		'type' => 'select',
		'label' => __('Select Category:','business-corner'),
		'section' => 'business_corner_service_section',
		'active_callback' =>'business_corner_service_active_callback',
		'choices' => $cats,
		'priority'	=> 30
	));
	
	//portfolio
	$wp_customize->add_section( 'business_corner_portfolio_section' , array(
		'title'       => __( 'Portfolio', 'business-corner' ),
		'priority'    => 25,
		'description' => __( 'Portfolio Option', 'business-corner' ),
		'panel'  => 'business_corner_home_featured_panel',
	) );

	$wp_customize->add_setting('business_corner_display_portfolio_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('business_corner_display_portfolio_control', array(
		'settings' => 'business_corner_display_portfolio_setting',
		'label'    => __('Display Portfolio', 'business-corner'),
		'section'  => 'business_corner_portfolio_section',
		'type'     => 'checkbox',
		'priority'	=> 25
	));
	$wp_customize->add_setting('business_corner_heading_portfolio', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_heading_portfolio', array(
		'settings' => 'business_corner_heading_portfolio',
		'label' => __('Portfolio Heading:','business-corner'),
		'section' => 'business_corner_portfolio_section',
		'active_callback' =>'business_corner_portfolio_active_callback',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_desc_portfolio', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_desc_portfolio', array(
		'settings' => 'business_corner_desc_portfolio',
		'type' => 'textarea',
		'label' => __('Portfolio Description:','business-corner'),
		'section' => 'business_corner_portfolio_section',
		'active_callback' =>'business_corner_portfolio_active_callback',
		'priority'	=> 30
	));
	$wp_customize->add_setting('business_corner_category_portfolio', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_category',
	));

	$wp_customize->add_control('business_corner_portfolio_control', array(
		'settings' => 'business_corner_category_portfolio',
		'type' => 'select',
		'label' => __('Select Category:','business-corner'),
		'section' => 'business_corner_portfolio_section',
		'active_callback' =>'business_corner_portfolio_active_callback',
		'choices' => $cats,
		'priority'	=> 30
	));
	//portfolio
	$wp_customize->add_section( 'business_corner_blog_section' , array(
		'title'       => __( 'Blog', 'business-corner' ),
		'priority'    => 25,
		'description' => __( 'Blog Option', 'business-corner' ),
		'panel'  => 'business_corner_home_featured_panel',
	) );

	$wp_customize->add_setting('business_corner_display_blog_setting', array(
		'default'        => 1,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('business_corner_display_blog_setting', array(
		'settings' => 'business_corner_display_blog_setting',
		'label'    => __('Display Blog', 'business-corner'),
		'section'  => 'business_corner_blog_section',
		'type'     => 'checkbox',
		'priority'	=> 25
	));
	$wp_customize->add_setting('business_corner_heading_blog', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_heading_blog', array(
		'settings' => 'business_corner_heading_blog',
		'label' => __('Portfolio Heading:','business-corner'),
		'section' => 'business_corner_blog_section',
		'active_callback' =>'business_corner_blog_active_callback',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_desc_blog', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_desc_blog', array(
		'settings' => 'business_corner_desc_blog',
		'type' => 'textarea',
		'label' => __('Portfolio Description:','business-corner'),
		'section' => 'business_corner_blog_section',
		'active_callback' =>'business_corner_blog_active_callback',
		'priority'	=> 30
	));
	
	//footer
	$wp_customize->add_section( 'business_corner_footer_section' , array(
		'title'       => __( 'Footer', 'business-corner' ),
		'priority'    => 25,
		'description' => __( 'Footer Option', 'business-corner' ),
	) );

	$wp_customize->add_setting('business_corner_footer_credit', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_footer_credit', array(
		'settings' => 'business_corner_footer_credit',
		'label' => __('Footer Credit Text:','business-corner'),
		'section' => 'business_corner_footer_section',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_footer_company', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('business_corner_footer_company', array(
		'settings' => 'business_corner_footer_company',
		'label' => __('Footer Company Name:','business-corner'),
		'section' => 'business_corner_footer_section',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('business_corner_footer_link', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('business_corner_footer_link', array(
		'settings' => 'business_corner_footer_link',
		'label' => __('Footer Company Link:','business-corner'),
		'section' => 'business_corner_footer_section',
		'priority'	=> 30
	));
}
add_action( 'customize_register', 'business_corner_customize_register' );
	
function business_corner_slider_active_callback() {
	if ( get_theme_mod( 'business_corner_display_slider_setting', 0 ) ) {
		return true;
	}
	return false;
}
function business_corner_service_active_callback() {
	if ( get_theme_mod( 'business_corner_display_service_setting', 0 ) ) {
		return true;
	}
	return false;
}
function business_corner_portfolio_active_callback() {
	if ( get_theme_mod( 'business_corner_display_portfolio_setting', 0 ) ) {
		return true;
	}
	return false;
}
function business_corner_blog_active_callback() {
	if ( get_theme_mod( 'business_corner_display_blog_setting', 0 ) ) {
		return true;
	}
	return false;
}

function business_corner_element_active_callback() {
	if ( get_theme_mod( 'business_corner_display_element_setting', 0 ) ) {
		return true;
	}
	return false;
}
function business_corner_topbar_active_callback() {
	if ( get_theme_mod( 'business_corner_display_topbar_setting', 0 ) ) {
		return true;
	}
	return false;
}


/**
 * Sanitize checkbox
 */

if (!function_exists( 'business_corner_sanitize_checkbox' ) ) :
	function business_corner_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

/**
 * Sanitize integer input
 */

if ( ! function_exists( 'business_corner_sanitize_category' ) ){
	function business_corner_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';

		}
	}
}

function business_corner_sanitize_text_field( $str ) {

	return sanitize_text_field( $str );

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_corner_customize_preview_js() {
	wp_enqueue_script( 'business_corner_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_corner_customize_preview_js' );
