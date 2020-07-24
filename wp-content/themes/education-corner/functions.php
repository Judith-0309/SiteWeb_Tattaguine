<?php

add_action( 'after_setup_theme', 'education_corner_theme_setup' );
function education_corner_theme_setup() {
    add_image_size( 'education-about', 800, 600 ); 
    add_image_size( 'education-course', 600, 400 ); 
    add_image_size( 'education-client', 300, 200 ); 
    add_image_size( 'education-member', 200, 200 );
}

add_action( 'wp_enqueue_scripts', 'education_corner_enqueue_styles' );
function education_corner_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

}
add_action('wp_footer','education_corner_script');
function education_corner_script(){
	wp_enqueue_script( 'education-corner-script', get_stylesheet_directory_uri() . '/assets/js/script.js');
}

function education_corner_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//general settings
	
	$wp_customize->add_section( 'education_corner_team_section' , array(
		'title'       => __( 'Team Options', 'education-corner' ),
		'priority'    => 40,
		'panel'  => 'business_corner_home_featured_panel',
		'description' => __( 'Team Section settings ', 'education-corner' ),
	) );
	
	$wp_customize->add_setting('education_corner_display_team_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('education_corner_display_team_setting', array(
		'settings' => 'education_corner_display_team_setting',
		'label'    => __('Display Team Section', 'education-corner'),
		'section'  => 'education_corner_team_section',
		'type'     => 'checkbox',
		'priority'	=> 25
	));
	$wp_customize->add_setting('education_corner_heading_team', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('education_corner_heading_team', array(
		'settings' => 'education_corner_heading_team',
		'label' => __('Team Heading:','education-corner'),
		'section' => 'education_corner_team_section',
		'active_callback' =>'education_corner_team_active_callback',
		'priority'	=> 30
	));

	$wp_customize->add_setting('education_corner_desc_team', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('education_corner_desc_team', array(
		'settings' => 'education_corner_desc_team',
		'label' => __('Team description:','education-corner'),
		'section' => 'education_corner_team_section',
		'active_callback' =>'education_corner_team_active_callback',
		'type' => 'textarea',
		'priority'	=> 30
	));

	$wp_customize->add_setting('team_page', array(
			'sanitize_callback'=>'education_corner_sanitize_page',
		)
	);
	$wp_customize->add_control( 
	new Education_Corner_Page_Control( 
	$wp_customize, 'team_page',
	array(
		'label'    => __('Team Member', 'education-corner'),
		'settings' => 'team_page',
		'section' => 'education_corner_team_section',
		'active_callback' =>'education_corner_team_active_callback',
		'priority'	=> 30,
		'choices' => education_corner_pages(),
	) ) );

	$wp_customize->add_setting('education_corner_team_bg', array(
		'default' => get_stylesheet_directory_uri().'/assets/images/men-1979261_1920.jpg',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'education_corner_team_bg', array(
        'label'             => __('Team Section Background Image', 'education-corner'),
		'section' => 'education_corner_team_section',
		'active_callback' =>'education_corner_team_active_callback',
        'settings'          => 'education_corner_team_bg',
        'priority'	=> 30,   
    )));

    $wp_customize->add_section( 'education_corner_course_section' , array(
		'title'       => __( 'Course Options', 'education-corner' ),
		'priority'    => 40,
		'panel'  => 'business_corner_home_featured_panel',
		'description' => __( 'Course Section settings ', 'education-corner' ),
	) );
	
	$wp_customize->add_setting('education_corner_display_course_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('education_corner_display_course_setting', array(
		'settings' => 'education_corner_display_course_setting',
		'label'    => __('Display course Section', 'education-corner'),
		'section'  => 'education_corner_course_section',
		'type'     => 'checkbox',
		'priority'	=> 25
	));
	$wp_customize->add_setting('education_corner_heading_course', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('education_corner_heading_course', array(
		'settings' => 'education_corner_heading_course',
		'label' => __('Course Heading:','education-corner'),
		'section' => 'education_corner_course_section',
		'active_callback' =>'education_corner_course_active_callback',
		'priority'	=> 30
	));

	$wp_customize->add_setting('education_corner_desc_course', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('education_corner_desc_course', array(
		'settings' => 'education_corner_desc_course',
		'label' => __('Course description:','education-corner'),
		'section' => 'education_corner_course_section',
		'active_callback' =>'education_corner_course_active_callback',
		'type' => 'textarea',
		'priority'	=> 30
	));

	$wp_customize->add_setting('course_page', array(
			'sanitize_callback'=>'education_corner_sanitize_page',
		)
	);
	$wp_customize->add_control( 
	new Education_Corner_Page_Control( 
	$wp_customize, 'course_page',
	array(
		'label'    => __('Course Pages', 'education-corner'),
		'settings' => 'course_page',
		'section' => 'education_corner_course_section',
		'active_callback' =>'education_corner_course_active_callback',
		'priority'	=> 30,
		'choices' => education_corner_pages(),
	) ) );

	$wp_customize->add_section( 'education_corner_client_section' , array(
		'title'       => __( 'Client Options', 'education-corner' ),
		'priority'    => 40,
		'panel'  => 'business_corner_home_featured_panel',
		'description' => __( 'Client Section settings ', 'education-corner' ),
	) );
	
	$wp_customize->add_setting('education_corner_display_client_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('education_corner_display_client_setting', array(
		'settings' => 'education_corner_display_client_setting',
		'label'    => __('Display Client Section', 'education-corner'),
		'section'  => 'education_corner_client_section',
		'type'     => 'checkbox',
		'priority'	=> 25
	));
	$wp_customize->add_setting('education_corner_heading_client', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('education_corner_heading_client', array(
		'settings' => 'education_corner_heading_client',
		'label' => __('Client Heading:','education-corner'),
		'section' => 'education_corner_client_section',
		'active_callback' =>'education_corner_client_active_callback',
		'priority'	=> 30
	));

	$wp_customize->add_setting('education_corner_desc_client', array(
		'default' => '',
		'sanitize_callback' => 'business_corner_sanitize_text_field',
	));

	$wp_customize->add_control('education_corner_desc_client', array(
		'settings' => 'education_corner_desc_client',
		'label' => __('Client description:','education-corner'),
		'section' => 'education_corner_client_section',
		'active_callback' =>'education_corner_client_active_callback',
		'type' => 'textarea',
		'priority'	=> 30
	));

	$wp_customize->add_setting('client_page', array(
			'sanitize_callback'=>'education_corner_sanitize_page',
		)
	);
	$wp_customize->add_control( 
	new Education_Corner_Page_Control( 
	$wp_customize, 'client_page',
	array(
		'label'    => __('Client Pages', 'education-corner'),
		'settings' => 'client_page',
		'section' => 'education_corner_client_section',
		'active_callback' =>'education_corner_client_active_callback',
		'priority'	=> 30,
		'choices' => education_corner_pages(),
	) ) );

	$wp_customize->add_section( 'education_corner_feature_section' , array(
		'title'       => __( 'Featured Post', 'education-corner' ),
		'priority'    => 40,
		'panel'  => 'business_corner_home_featured_panel',
		'description' => __( 'Featured Post Section settings ', 'education-corner' ),
	) );
	
	$wp_customize->add_setting('education_corner_display_feature_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'business_corner_sanitize_checkbox',
	));

	$wp_customize->add_control('education_corner_display_feature_setting', array(
		'settings' => 'education_corner_display_feature_setting',
		'label'    => __('Display Featured Post Section', 'education-corner'),
		'section'  => 'education_corner_feature_section',
		'type'     => 'checkbox',
		'priority'	=> 25
	));

	$wp_customize->add_setting('feature_post', array(
			'sanitize_callback'=>'education_corner_sanitize_integer',
		)
	);

	$wp_customize->add_control( 
	new Education_Corner_Post_Control( 
	$wp_customize, 'feature_post',
	array(
		'label'    => __('Featured Post', 'education-corner'),
		'settings' => 'feature_post',
		'section' => 'education_corner_feature_section',
		'active_callback' =>'education_corner_feature_active_callback',
		'priority'	=> 30,
		'choices' => education_corner_pages(),
	) ) );
	
}
add_action( 'customize_register', 'education_corner_customize_register' );

function education_corner_pages() {
	$pages = array();
	$page_list= get_pages();
	$i = 0;
	foreach($page_list as $page){
		if($i==0){
			$default = $page->ID;
			$i++;
		}
		if ( has_post_thumbnail($page->ID) ) {
		$pages[$page->ID] = $page->post_title;
	}
	}
  return $pages;
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Education_Corner_Page_Control' ) ) :
class Education_Corner_Page_Control extends WP_Customize_Control {

/**
 * The type of customize control being rendered.
 */
public $type = 'multiple-select';

/**
 * Displays the multiple select on the customize screen.
 */
public function render_content() {

if ( empty( $this->choices ) )
    return;
?>
    <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
            <?php
                foreach ( $this->choices as $value => $label ) {
                    $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                    echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . esc_attr($label) . '</option>';
                }
            ?>
        </select>
    </label>
<?php }}
endif;


function education_corner_sanitize_page( $input )
{
    $valid = education_corner_pages();

    foreach ($input as $value) {
        if ( !array_key_exists( $value, $valid ) ) {
            return [];
        }
    }

    return $input;
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Education_Corner_Post_Control' ) ) :
class Education_Corner_Post_Control extends WP_Customize_Control {

public function render_content() {
$posts= get_posts();
?>
    <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <select <?php $this->link(); ?> style="height: 100%;">
            <?php
                foreach ( $posts as $post ) {
                	if($this->value()==$post->ID){
                		$chose= 'selected="selected"';
                	}else{
                		$chose= '';
                	}
                    echo '<option value="' . esc_attr( $post->ID ) . '" ' . esc_attr( $chose ). '>' . esc_attr($post->post_title) . '</option>';
                }
            ?>
        </select>
    </label>
<?php }}
endif;

function education_corner_team_active_callback() {
	if ( get_theme_mod( 'education_corner_display_team_setting', 0 ) ) {
		return true;
	}
	return false;
}

function education_corner_course_active_callback() {
	if ( get_theme_mod( 'education_corner_display_course_setting', 0 ) ) {
		return true;
	}
	return false;
}

function education_corner_client_active_callback() {
	if ( get_theme_mod( 'education_corner_display_client_setting', 0 ) ) {
		return true;
	}
	return false;
}

function education_corner_feature_active_callback() {
	if ( get_theme_mod( 'education_corner_display_feature_setting', 0 ) ) {
		return true;
	}
	return false;
}

function education_corner_sanitize_integer( $input ) {
    return (int)($input);
}