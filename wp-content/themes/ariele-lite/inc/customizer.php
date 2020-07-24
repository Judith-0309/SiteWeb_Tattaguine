<?php
/**
 * Theme Customizer
 * @package Ariele_Lite
 */

// Add postMessage support for site title and description for the Theme Customizer.
function ariele_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_control('background_color')->label = esc_html__( 'Page Body Background', 'ariele-lite' );
	
// Separator Control
	if ( ! class_exists( 'Ariele_Lite_Separator_Control' ) ) {
		class Ariele_Lite_Separator_Control extends WP_Customize_Control {
		
			// Render the hr.
			public function render_content() {
				echo '<hr/>';
			}
		}
	}

	// Note Control
	if ( ! class_exists( 'Ariele_Lite_Note_Control' ) ) {

		class Ariele_Lite_Note_Control extends WP_Customize_Control {
			public function render_content() {
				?>

<label class="customizer-note">
    <span class="customizer-control-heading"><?php echo wp_kses_post( $this->label ); ?></span>
</label>
<span class="customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>

<?php
			}
		}
	}
	
	// Displays the upgrade teasers in thhe Pro Version / More Features section.
	class Ariele_Lite_Customize_Static_Text_Control extends WP_Customize_Control {
		// Render Control
		public function render_content() {
	?>

    <div class="upgrade-pro-version">		
		
    <h1><?php esc_html_e('Ariele - Premium', 'ariele-lite') ?></h1>
    <p class="rp-discount"><?php esc_html_e('Save $10 (Limited Time Offer!) if you purchase the Pro version with this discount code on checkout:', 'ariele-lite') ?>
        <span class="rp-discount-code"><?php esc_html_e('ARIELE10', 'ariele-lite') ?></span></p>
    <p class="rp-pro-title"><?php esc_html_e('Pro Features:', 'ariele-lite') ?></p>
    <ul class="rp-pro-list">
        <li><?php esc_html_e('&bull; 8 Blog Styles', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; 20 Dynamic Sidebar Positions', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; 3 Full Post Layouts', 'ariele-lite')?></li>
		<li><?php esc_html_e('&bull; Option to Disable Gutenberg Styles', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Additional Page Templates', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Additional Thumbnail Crop Options', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Related Posts w/thumbnails', 'ariele-lite')?></li>
		<li><?php esc_html_e('&bull; Widget - Custom Comments with Avatar', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Widget - About Me', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Widget - Image Box with Headings & Buttons', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Customizable Text Labels', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Remove Archive Title Prefix Labels', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Custom Styled and Organized Customizer', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Show or Hide Various Elements', 'ariele-lite')?></li>
        <li><?php esc_html_e('&bull; Priority Support', 'ariele-lite')?></li>
		<li><?php esc_html_e('&bull; Plus much more...', 'ariele-lite')?></li>
    </ul>

    <p><a class="rp-get-pro button" href="<?php echo esc_url('https://www.roughpixels.com/gutenberg-themes/ariele/'); ?>" target="_blank"><?php esc_html_e( 'Save $10 Now', 'ariele-lite' ); ?></a></p>			

    </div>

    <?php
		}
	}
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '#site-title a',
			'render_callback' => 'ariele_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '#site-description',
			'render_callback' => 'ariele_lite_customize_partial_blogdescription',
		) );
	}
	
 // This loads categories for our slider dropdown select
function ariele_lite_cats() {
	$cats = array();
	$cats[0] = 'All';

	foreach ( get_categories() as $categories => $category ) {
		$cats[ $category->term_id ] = $category->name;
	}
	return $cats;
}
		
// Begin theme settings

		// SECTION - UPGRADE
		$wp_customize->add_section( 'ariele_lite_upgrade', array(
			'title'       => esc_html__( 'Upgrade to Pro', 'ariele-lite' ),
			'priority'    => 1
		) );
		
// UPGRADE	
		$wp_customize->add_setting( 'ariele_lite_upgrade', array(
			'default' => '',
			'sanitize_callback' => '__return_false'
		) );
		
		$wp_customize->add_control( new Ariele_Lite_Customize_Static_Text_Control( $wp_customize, 'ariele_lite_upgrade', array(
			'label'	=> esc_html__('Get The Pro Version:','ariele-lite'),
			'section'	=> 'ariele_lite_upgrade',
			'description' => array('')
		) ) );
		
// ADD TO SITE IDENTITY	

	// Show site title
	$wp_customize->add_setting( 'ariele_lite_hide_site_title',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_site_title', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Site Title', 'ariele-lite' ),
		'section'  => 'title_tagline',
	) );		
		
	// Show site description
	$wp_customize->add_setting( 'ariele_lite_hide_site_desc',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_site_desc', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Site Description tagline', 'ariele-lite' ),
		'section'  => 'title_tagline',
	) );		
	
/*	-----------------------------------------------------------------------------------------------
	SECTION - THEME OPTIONS
	Theme basic options and settings
--------------------------------------------------------------------------------------------------- */
	$wp_customize->add_section( 'ariele_lite_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'ariele-lite' ),
		'priority' => 20, 
	) );	


	 // Boxed layout
	  $wp_customize->add_setting( 'ariele_lite_boxed',  array(
		  'default' => false,
		  'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'ariele_lite_boxed', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Boxed Layout', 'ariele-lite' ),
		'description' => esc_html__( 'Enable your website to use a boxed layout which helps to show your page background if you set this up.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	  ) );
	  
	  
	  
	// Setting group for blog layout
	$wp_customize->add_setting( 'ariele_lite_blog_layout', array(
		'default' => 'classic',
		'sanitize_callback' => 'ariele_lite_sanitize_select',
	) );  
	$wp_customize->add_control( 'ariele_lite_blog_layout', array(
		  'type' => 'select',
		  'label' => esc_html__( 'Blog Layout', 'ariele-lite' ),
		  'section' => 'ariele_lite_theme_options',		
			'choices' => array(
				'classic'        => esc_html__( 'Classic Right Sidebar', 'ariele-lite' ),
				'classic-left'        => esc_html__( 'Classic Left Sidebar', 'ariele-lite' ),
				'wide'        => esc_html__( 'Wide', 'ariele-lite' ),
			)		
		) );	

	// Setting group for full post (single) layout  
	$wp_customize->add_setting( 'ariele_lite_single_layout', array(
		'default' => 'right',
		'sanitize_callback' => 'ariele_lite_sanitize_select',
	) );  
	$wp_customize->add_control( 'ariele_lite_single_layout', array(
		  'type' => 'select',
		  'label' => esc_html__( 'Full Post Style', 'ariele-lite' ),
		  'section' => 'ariele_lite_theme_options',
		  'choices' => array(	
				'right' => esc_html__( 'Single With Right Sidebar', 'ariele-lite' ),	 
				'left' => esc_html__( 'Single With Left Sidebar', 'ariele-lite' ), 
				'wide' => esc_html__( 'Single With No Sidebars', 'ariele-lite' ),
		) ) );	
	
	
	 // Use excerpts for blog posts
	  $wp_customize->add_setting( 'ariele_lite_use_excerpt',  array(
		  'default' => false,
		  'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'ariele_lite_use_excerpt', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use Excerpts', 'ariele-lite' ),
		'description' => esc_html__( 'Use excerpts for your blog post summaries or uncheck the box to use the standard Read More tag. NOTE: Some blog styles only use excerpts.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	  ) );

    // Excerpt size
    $wp_customize->add_setting( 'ariele_lite_excerpt_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '35',
        ) );
    $wp_customize->add_control( 'ariele_lite_excerpt_size', array(
        'type'        => 'number',
        'section'     => 'ariele_lite_theme_options',
        'label'       => esc_html__('Excerpt Size', 'ariele-lite'),
		'description' => esc_html__('You can change the size of your blog summary excerpts with increments of 5 words.', 'ariele-lite'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 1,
        ),
    ) );	  


	// Use FontAwesome 
	$wp_customize->add_setting( 'ariele_lite_enable_fontawesome',	array(
		'default' => true,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'ariele_lite_enable_fontawesome', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use FontAwesome Icons', 'ariele-lite' ),
		'description' => esc_html__( 'You can disable Font Awesome icons from the theme if you are using a plugin instead.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );
	
	// Hide summary featured label
	$wp_customize->add_setting( 'ariele_lite_hide_blog_featured_label',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		 'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_blog_featured_label', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Featured Post Label', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the featured post label.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );
		
	// Hide summary featured image caption
	$wp_customize->add_setting( 'ariele_lite_hide_featured_image_caption',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		 'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_featured_image_caption', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Featured Image Caption', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you hide the featured image caption for your blog posts.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );		
		
	// Hide summary post meta
	$wp_customize->add_setting( 'ariele_lite_hide_post_meta',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		 'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_post_meta', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Post Summary Meta', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you hide blog summary post meta info like post date, author, etc.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );		
		
	// Hide summary author
	$wp_customize->add_setting( 'ariele_lite_hide_summary_author',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_summary_author', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Post Summary Author', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you hide the post summary author.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );			
		
	// Hide summary post date
	$wp_customize->add_setting( 'ariele_lite_hide_summary_date',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_summary_date', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Post Summary Date', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you hide the post summary date in the meta info group.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );			

	// Hide summary post format
	$wp_customize->add_setting( 'ariele_lite_hide_post_format',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_post_format', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Post Summary Format Label', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you hide the post format label from the summary meta info group.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );
	
	// Hide summary comments
	$wp_customize->add_setting( 'ariele_lite_hide_summary_comments',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_summary_comments', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Post Summary Comment Link', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you hide the post summary comment link in the meta info group.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );			
		
	// Hide summary read more from excerpts
	$wp_customize->add_setting( 'ariele_lite_hide_excerpt_more_link',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_excerpt_more_link', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Excerpt More Link', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you hide the more link (read more) from post summary excerpts.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );				

	// Separator 
	$wp_customize->add_setting(	'ariele_lite_separator1',	array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_control( new Ariele_Lite_Separator_Control( $wp_customize, 'ariele_lite_separator1',	array(
				'section' => 'ariele_lite_theme_options',
	)));
	
	// Hide Single post categories
	$wp_customize->add_setting( 'ariele_lite_hide_post_categories',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_post_categories', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Full Post Categories', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the post categories on the full post view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );
	
	// Hide Single featured image
	$wp_customize->add_setting( 'ariele_lite_hide_single_featured',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_single_featured', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Full Post Featured Image', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the featured image on the full post view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );		

	// Hide Single meta author
	$wp_customize->add_setting( 'ariele_lite_hide_single_author',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_single_author', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Full Post Posted By Author', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the posted by author on the full post view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );

	// Hide Single meta date
	$wp_customize->add_setting( 'ariele_lite_hide_single_post_date',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_single_post_date', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Full Post Date', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the post date on the full post view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );

	// Hide Single meta format
	$wp_customize->add_setting( 'ariele_lite_hide_single_post_format',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_single_post_format', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Full Post Format', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the post format on the full post view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );

	// Hide Single meta comments link
	$wp_customize->add_setting( 'ariele_lite_hide_single_comment_link',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_single_comment_link', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Full Post Comment Link', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the post comment link on the full post view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );

	// Hide post tags
	$wp_customize->add_setting( 'ariele_lite_hide_post_tags',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_post_tags', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Post Tags', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the post tags section in the full article view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );
	
	// Hide author bio
	$wp_customize->add_setting( 'ariele_lite_hide_author_bio',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_author_bio', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Author Bio Section', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show the author biography section in the full article view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );

	// Show full post nav
	$wp_customize->add_setting( 'ariele_lite_hide_post_nav',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_post_nav', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Post Navigation', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the Next and Previous post navigation on the full post view.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );	

	// Separator 
	$wp_customize->add_setting(	'ariele_lite_separator2',	array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_control( new Ariele_Lite_Separator_Control( $wp_customize, 'ariele_lite_separator2',	array(
				'section' => 'ariele_lite_theme_options',
	)));
	
	// Hide edit link
	$wp_customize->add_setting( 'ariele_lite_hide_edit_link',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
		'transport' => 'postMessage'
	) );  
	$wp_customize->add_control( 'ariele_lite_hide_edit_link', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Hide the Edit Link', 'ariele-lite' ),
		'description' => esc_html__( 'This lets you show or hide the front-end edit link on posts and pages.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );

	// Separator 
	$wp_customize->add_setting(	'ariele_lite_separator3',	array(
			'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_control( new Ariele_Lite_Separator_Control( $wp_customize, 'ariele_lite_separator3',	array(
				'section' => 'ariele_lite_theme_options',
	)));
	
	// Enable attachment comments
	$wp_customize->add_setting( 'ariele_lite_show_attachment_comments',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'ariele_lite_show_attachment_comments', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Image Attachment Page Comments', 'ariele-lite' ),
		'description' => esc_html__( 'If you are using a WP gallery shortcode and want to showcase your images on the custom attachment page, you can enable or disable comments for images.', 'ariele-lite' ),
		'section'  => 'ariele_lite_theme_options',
	) );	

/*	-----------------------------------------------------------------------------------------------
	SECTION - TOP BAR
	Theme top bar settings
--------------------------------------------------------------------------------------------------- */	
	$wp_customize->add_section('ariele_lite_top_bar',array(
		'title'     => esc_html__('Top Bar Options', 'ariele-lite'),
		'priority' => 21,
	));

	// setting to show top bar
	$wp_customize->add_setting('ariele_lite_show_topbar',array(
		'default'     => true,
		'sanitize_callback'	=> 'ariele_lite_sanitize_checkbox'
	));
	$wp_customize->add_control( 'ariele_lite_show_topbar', array(
		'section'	=> 'ariele_lite_top_bar',
	    'label' => esc_html__('Show Top Bar','ariele-lite'),
		'type'	 => 'checkbox'
	) );

	$wp_customize->add_setting('ariele_lite_show_topbar_left',array(
		'default'     => false,
		'sanitize_callback'	=> 'ariele_lite_sanitize_checkbox'
	));
	$wp_customize->add_control( 'ariele_lite_show_topbar_left', array(
		'section'	=> 'ariele_lite_top_bar',
	    'label' => esc_html__('Show Top Bar Left','ariele-lite'),
		'type'	 => 'checkbox'
	) );
	
	// setting to show top bar social
	$wp_customize->add_setting('ariele_lite_show_topbar_right',array(
		'default'     => false,
		'sanitize_callback'	=> 'ariele_lite_sanitize_checkbox'
	));
	$wp_customize->add_control( 'ariele_lite_show_topbar_right', array(
		'section'	=> 'ariele_lite_top_bar',
	    'label' => esc_html__('Show Top Bar Search','ariele-lite'),
		'type'	 => 'checkbox'
	) );	
	
// top bar background
 	$wp_customize->add_setting( 'ariele_lite_topbar_bg', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_topbar_bg', array(
		'label'   => esc_html__( 'Top Bar Background', 'ariele-lite' ),
		'section' => 'ariele_lite_top_bar',
		'settings'   => 'ariele_lite_topbar_bg',
	) ) );	
	
/*	-----------------------------------------------------------------------------------------------
	SECTION - THUMBNAILS
	Theme thumbnail settings
--------------------------------------------------------------------------------------------------- */
	$wp_customize->add_section( 'ariele_lite_thumbnail_options' , array(
		'title'      => esc_html__( 'Thumbnail Options', 'ariele-lite' ),
		'priority' => 32,
	) );
	
	// Enable default thumbnails
	$wp_customize->add_setting( 'ariele_lite_classic_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'ariele_lite_classic_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Classic Style Blog Thumbnails', 'ariele-lite' ),
		'description' => esc_html__( 'This will create featured images for the Classic blog styles. Size = 700x450 pixels.', 'ariele-lite' ),
		'section'  => 'ariele_lite_thumbnail_options',
	) );	

	// Enable Wide thumbnails
	$wp_customize->add_setting( 'ariele_lite_wide_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'ariele_lite_wide_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Wide Style Blog Thumbnails', 'ariele-lite' ),
		'description' => esc_html__( 'This will create featured images for the wide blog style. Size 960x600 pixels. Best for really large photo uploads.', 'ariele-lite' ),
		'section'  => 'ariele_lite_thumbnail_options',
	) );	


/*	-----------------------------------------------------------------------------------------------
	SECTION - COLOURS
	Theme colour settings
--------------------------------------------------------------------------------------------------- */
	
// Site Title Colour
 	$wp_customize->add_setting( 'ariele_lite_colour_sitetitle', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_colour_sitetitle', array(
		'label'   => esc_html__( 'Site Title Colour', 'ariele-lite' ),
		'section' => 'colors',
		'settings'   => 'ariele_lite_colour_sitetitle',
	) ) );
	
// Site Title tagline
 	$wp_customize->add_setting( 'ariele_lite_colour_tagline', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_colour_tagline', array(
		'label'   => esc_html__( 'Site Tagline Colour', 'ariele-lite' ),
		'section' => 'colors',
		'settings'   => 'ariele_lite_colour_tagline',
	) ) );	
	
// page  background
 	$wp_customize->add_setting( 'ariele_lite_page_bg', array(
		'default'        => '#f5f2ed',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_page_bg', array(
		'label'   => esc_html__( 'Page Background', 'ariele-lite' ),	
		'description' => esc_html__( 'This is the page container background colour. Default colour is a light tan.', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_page_bg',
		'section' => 'colors',
	) ) );
	
// content  background
 	$wp_customize->add_setting( 'ariele_lite_content_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_content_bg', array(
		'label'   => esc_html__( 'Content Backgrounds', 'ariele-lite' ),	
		'description' => esc_html__( 'This is the background colour for the content containers. Default is white.', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_content_bg',
		'section' => 'colors',
	) ) );	
	
// content  border
 	$wp_customize->add_setting( 'ariele_lite_content_border', array(
		'default'        => '#e8e8e8',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_content_border', array(
		'label'   => esc_html__( 'Content Container Borders', 'ariele-lite' ),	
		'description' => esc_html__( 'This is the content container border.', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_content_border',
		'section' => 'colors',
	) ) );		
	
// page content body text
 	$wp_customize->add_setting( 'ariele_lite_body_text', array(
		'default'        => '#686868',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_body_text', array(
		'label'   => esc_html__( 'Page Content Body Text', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_body_text',
		'section' => 'colors',
	) ) );
	
// breadcrumbs text
 	$wp_customize->add_setting( 'ariele_lite_breadcrumbs_text', array(
		'default'        => '#8e8e8e',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_breadcrumbs_text', array(
		'label'   => esc_html__( 'Breadcrumbs Text', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_breadcrumbs_text',
		'section' => 'colors',
	) ) );

// archive prefix title
 	$wp_customize->add_setting( 'ariele_lite_archive_prefix', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_archive_prefix', array(
		'label'   => esc_html__( 'Archive Title Prefix Label Colour', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_archive_prefix',
		'section' => 'colors',
	) ) );
	
// headings
 	$wp_customize->add_setting( 'ariele_lite_headings', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_headings', array(
		'label'   => esc_html__( 'Headings Colour', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_headings',
		'section' => 'colors',
	) ) );	

// linked headings
 	$wp_customize->add_setting( 'ariele_lite_headings_hover', array(
		'default'        => '#847264',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_headings_hover', array(
		'label'   => esc_html__( 'Post Heading Hover Colour', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_headings_hover',
		'section' => 'colors',
	) ) );	

// page intros
 	$wp_customize->add_setting( 'ariele_lite_page_intros', array(
		'default'        => '#989898',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_page_intros', array(
		'label'   => esc_html__( 'Page Intros & Category Descriptions', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_page_intros',
		'section' => 'colors',
	) ) );	

// meta info hover
 	$wp_customize->add_setting( 'ariele_lite_meta_hover', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_meta_hover', array(
		'label'   => esc_html__( 'Post Meta Info Hover Links', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_meta_hover',
		'section' => 'colors',
	) ) );	
	
// links
 	$wp_customize->add_setting( 'ariele_lite_links', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_links', array(
		'label'   => esc_html__( 'Link Colour', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_links',
		'section' => 'colors',
	) ) );	

// links focus active hover
 	$wp_customize->add_setting( 'ariele_lite_hover_links', array(
		'default'        => '#b06545',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_hover_links', array(
		'label'   => esc_html__( 'Link Active &amp; Hover Colour', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_hover_links',
		'section' => 'colors',
	) ) );	

// read more bg
 	$wp_customize->add_setting( 'ariele_lite_more_link_bg', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_more_link_bg', array(
		'label'   => esc_html__( 'More Link Button Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_more_link_bg',
		'section' => 'colors',
	) ) );	

// read more text
 	$wp_customize->add_setting( 'ariele_lite_more_link_text_colour', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_more_link_text_colour', array(
		'label'   => esc_html__( 'More Link Button Text Colour', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_more_link_text_colour',
		'section' => 'colors',
	) ) );	

// read more hover bg
 	$wp_customize->add_setting( 'ariele_lite_more_link_hover_bg', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_more_link_hover_bg', array(
		'label'   => esc_html__( 'More Link Button Hover Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_more_link_hover_bg',
		'section' => 'colors',
	) ) );	

// read more hover text
 	$wp_customize->add_setting( 'ariele_lite_more_link_hover_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_more_link_hover_text', array(
		'label'   => esc_html__( 'More Link Button Hover Text', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_more_link_hover_text',
		'section' => 'colors',
	) ) );	

// post categories background
 	$wp_customize->add_setting( 'ariele_lite_post_categories_bg', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_post_categories_bg', array(
		'label'   => esc_html__( 'Post Category Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_post_categories_bg',
		'section' => 'colors',
	) ) );	
	
// post categories label
 	$wp_customize->add_setting( 'ariele_lite_post_categories_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_post_categories_label', array(
		'label'   => esc_html__( 'Post Category Label', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_post_categories_label',
		'section' => 'colors',
	) ) );	
	
// post categories hover background
 	$wp_customize->add_setting( 'ariele_lite_post_categories_hover_bg', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_post_categories_hover_bg', array(
		'label'   => esc_html__( 'Post Category Hover Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_post_categories_hover_bg',
		'section' => 'colors',
	) ) );		

// post categories hover label
 	$wp_customize->add_setting( 'ariele_lite_post_categories_hover_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_post_categories_hover_label', array(
		'label'   => esc_html__( 'Post Category Hover Label', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_post_categories_hover_label',
		'section' => 'colors',
	) ) );	

// post tags background
 	$wp_customize->add_setting( 'ariele_lite_post_tags_bg', array(
		'default'        => '#c9beaf',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_post_tags_bg', array(
		'label'   => esc_html__( 'Post Tags Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_post_tags_bg',
		'section' => 'colors',
	) ) );	
	
// post tags label
 	$wp_customize->add_setting( 'ariele_lite_post_tags_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_post_tags_label', array(
		'label'   => esc_html__( 'Post Tags Label', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_post_tags_label',
		'section' => 'colors',
	) ) );	
	
// post tags hover background
 	$wp_customize->add_setting( 'ariele_lite_post_tags_hover_bg', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_post_tags_hover_bg', array(
		'label'   => esc_html__( 'Post Tags Hover Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_post_tags_hover_bg',
		'section' => 'colors',
	) ) );		

// post tags hover label
 	$wp_customize->add_setting( 'ariele_lite_post_tags_hover_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_post_tags_hover_label', array(
		'label'   => esc_html__( 'Post Tags Hover Label', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_post_tags_hover_label',
		'section' => 'colors',
	) ) );	

// featured background
 	$wp_customize->add_setting( 'ariele_lite_featured_bg', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_featured_bg', array(
		'label'   => esc_html__( 'Featured Label Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_featured_bg',
		'section' => 'colors',
	) ) );	
	
// featured text
 	$wp_customize->add_setting( 'ariele_lite_featured_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_featured_text', array(
		'label'   => esc_html__( 'Featured Label', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_featured_text',
		'section' => 'colors',
	) ) );		

// tag cloud border
 	$wp_customize->add_setting( 'ariele_lite_tagcloud_border', array(
		'default'        => '#afafaf',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_tagcloud_border', array(
		'label'   => esc_html__( 'Tag Cloud Border', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_tagcloud_border',
		'section' => 'colors',
	) ) );
	
// tag cloud hover background
 	$wp_customize->add_setting( 'ariele_lite_tagcloud_hover_bg', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_tagcloud_hover_bg', array(
		'label'   => esc_html__( 'Tag Cloud Hover Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_tagcloud_hover_bg',
		'section' => 'colors',
	) ) );		
	
// tag cloud hover text
 	$wp_customize->add_setting( 'ariele_lite_tagcloud_hover_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_tagcloud_hover_text', array(
		'label'   => esc_html__( 'Tag Cloud Hover Text', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_tagcloud_hover_text',
		'section' => 'colors',
	) ) );		

// widget list line
 	$wp_customize->add_setting( 'ariele_lite_widget_list_line', array(
		'default'        => '#c9beaf',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_widget_list_line', array(
		'label'   => esc_html__( 'Widget List Lines', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_widget_list_line',
		'section' => 'colors',
	) ) );	
	
	
// widget title line
 	$wp_customize->add_setting( 'ariele_lite_widget_title_line', array(
		'default'        => '#c9beaf',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_widget_title_line', array(
		'label'   => esc_html__( 'Widget Title Line', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_widget_title_line',
		'section' => 'colors',
	) ) );	

// widget footer title line
 	$wp_customize->add_setting( 'ariele_lite_widget_footer_title_line', array(
		'default'        => '#bf846b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_widget_footer_title_line', array(
		'label'   => esc_html__( 'Widget Footer Title Line', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_widget_footer_title_line',
		'section' => 'colors',
	) ) );	


// footer sidebar background
 	$wp_customize->add_setting( 'ariele_lite_footer_sidebar_bg', array(
		'default'        => '#b06545',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_footer_sidebar_bg', array(
		'label'   => esc_html__( 'Footer Sidebar Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_footer_sidebar_bg',
		'section' => 'colors',
	) ) );	

// footer sidebar text and links
 	$wp_customize->add_setting( 'ariele_lite_footer_sidebar_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_footer_sidebar_text', array(
		'label'   => esc_html__( 'Footer Sidebar Text &amp; Links', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_footer_sidebar_text',
		'section' => 'colors',
	) ) );	
	
// footer background
 	$wp_customize->add_setting( 'ariele_lite_footer_bg', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_footer_bg', array(
		'label'   => esc_html__( 'Footer Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_footer_bg',
		'section' => 'colors',
	) ) );	
	
// footer text and links
 	$wp_customize->add_setting( 'ariele_lite_footer_text', array(
		'default'        => '#dac6bd',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_footer_text', array(
		'label'   => esc_html__( 'Footer Text &amp; Links', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_footer_text',
		'section' => 'colors',
	) ) );	

// featured caption background
 	$wp_customize->add_setting( 'ariele_lite_featured_caption_bg', array(
		'default'        => '#262626',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_featured_caption_bg', array(
		'label'   => esc_html__( 'Featured Image Caption Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_featured_caption_bg',
		'section' => 'colors',
	) ) );	

// featured caption text
 	$wp_customize->add_setting( 'ariele_lite_featured_caption_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_featured_caption_text', array(
		'label'   => esc_html__( 'Featured Image Caption Text', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_featured_caption_text',
		'section' => 'colors',
	) ) );	

// caption text
 	$wp_customize->add_setting( 'ariele_lite_caption_text', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_caption_text', array(
		'label'   => esc_html__( 'Image Caption Text', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_caption_text',
		'section' => 'colors',
	) ) );

// topbar social icon
 	$wp_customize->add_setting( 'ariele_lite_topbar_social_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_topbar_social_icon', array(
		'label'   => esc_html__( 'Top Social Icon', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_topbar_social_icon',
		'section' => 'colors',
	) ) );	

// mobile menu toggle button
 	$wp_customize->add_setting( 'ariele_lite_mobile_toggle_button', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_mobile_toggle_button', array(
		'label'   => esc_html__( 'Mobile Toggle Button', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_mobile_toggle_button',
		'section' => 'colors',
	) ) );			

// mobile menu toggle label
 	$wp_customize->add_setting( 'ariele_lite_mobile_toggle_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_mobile_toggle_label', array(
		'label'   => esc_html__( 'Mobile Toggle Label', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_mobile_toggle_label',
		'section' => 'colors',
	) ) );	
	
	// mobile menu toggle hover button
 	$wp_customize->add_setting( 'ariele_lite_mobile_toggle_hover_button', array(
		'default'        => '#f5f2ed',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_mobile_toggle_hover_button', array(
		'label'   => esc_html__( 'Mobile Toggle Hover Button', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_mobile_toggle_hover_button',
		'section' => 'colors',
	) ) );
	
	

// mobile menu toggle hover label
 	$wp_customize->add_setting( 'ariele_lite_mobile_toggle_hover_label', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_mobile_toggle_hover_label', array(
		'label'   => esc_html__( 'Mobile Toggle Hover Label', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_mobile_toggle_hover_label',
		'section' => 'colors',
	) ) );		
	
// mobile menu lines
 	$wp_customize->add_setting( 'ariele_lite_mobile_menu_lines', array(
		'default'        => '#404040',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_mobile_menu_lines', array(
		'label'   => esc_html__( 'Mobile Menu Lines', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_mobile_menu_lines',
		'section' => 'colors',
	) ) );		

// submenu toggle arrow hover
 	$wp_customize->add_setting( 'ariele_lite_submenu_dropdown_arrow_hover', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_submenu_dropdown_arrow_hover', array(
		'label'   => esc_html__( 'Mobile Submenu Toggle Arrow Hover Colour', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_submenu_dropdown_arrow_hover',
		'section' => 'colors',
	) ) );	

// menu links
 	$wp_customize->add_setting( 'ariele_lite_menu_links', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_menu_links', array(
		'label'   => esc_html__( 'Main Menu Links', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_menu_links',
		'section' => 'colors',
	) ) );		
	
// menu hover links
 	$wp_customize->add_setting( 'ariele_lite_menu_hover_links', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_menu_hover_links', array(
		'label'   => esc_html__( 'Main Menu Hover Links', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_menu_hover_links',
		'section' => 'colors',
	) ) );			
	
// submenu background
 	$wp_customize->add_setting( 'ariele_lite_submenu_dropdown_bg', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_submenu_dropdown_bg', array(
		'label'   => esc_html__( 'Submenu Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_submenu_dropdown_bg',
		'section' => 'colors',
	) ) );	
	
// submenu hover link
 	$wp_customize->add_setting( 'ariele_lite_submenu_link_hover', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_submenu_link_hover', array(
		'label'   => esc_html__( 'Submenu Link Hover', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_submenu_link_hover',
		'section' => 'colors',
	) ) );	
	
	
// full post nav background
 	$wp_customize->add_setting( 'ariele_lite_single_nav_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_single_nav_bg', array(
		'label'   => esc_html__( 'Full Post Navigation Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_single_nav_bg',
		'section' => 'colors',
	) ) );	

// full post nav text
 	$wp_customize->add_setting( 'ariele_lite_single_nav_text', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_single_nav_text', array(
		'label'   => esc_html__( 'Full Post Navigation Text', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_single_nav_text',
		'section' => 'colors',
	) ) );	

// blog nav bg
 	$wp_customize->add_setting( 'ariele_lite_blog_nav_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_blog_nav_bg', array(
		'label'   => esc_html__( 'Blog Navigation Buttons', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_blog_nav_bg',
		'section' => 'colors',
	) ) );	

// blog nav numbers
 	$wp_customize->add_setting( 'ariele_lite_blog_nav_numbers', array(
		'default'        => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_blog_nav_numbers', array(
		'label'   => esc_html__( 'Blog Navigation Numbers', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_blog_nav_numbers',
		'section' => 'colors',
	) ) );	
	
// blog nav hover bg
 	$wp_customize->add_setting( 'ariele_lite_blog_nav_hover_bg', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_blog_nav_hover_bg', array(
		'label'   => esc_html__( 'Blog Navigation Hover Buttons', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_blog_nav_hover_bg',
		'section' => 'colors',
	) ) );	
	
// blog nav hover numbers
 	$wp_customize->add_setting( 'ariele_lite_blog_nav_hover_numbers', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_blog_nav_hover_numbers', array(
		'label'   => esc_html__( 'Blog Navigation Hover Numbers', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_blog_nav_hover_numbers',
		'section' => 'colors',
	) ) );		
	
// button
 	$wp_customize->add_setting( 'ariele_lite_button', array(
		'default'        => '#222',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_button', array(
		'label'   => esc_html__( 'Buttons', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_button',
		'section' => 'colors',
	) ) );		
	
// button label
 	$wp_customize->add_setting( 'ariele_lite_button_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_button_label', array(
		'label'   => esc_html__( 'Button Label', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_button_label',
		'section' => 'colors',
	) ) );		
	
// button hover
 	$wp_customize->add_setting( 'ariele_lite_button_hover', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_button_hover', array(
		'label'   => esc_html__( 'Button Hover', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_button_hover',
		'section' => 'colors',
	) ) );		
	
// button label hover
 	$wp_customize->add_setting( 'ariele_lite_button_label_hover', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_button_label_hover', array(
		'label'   => esc_html__( 'Button Label Hover', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_button_label_hover',
		'section' => 'colors',
	) ) );		

// scroll to top button bg
 	$wp_customize->add_setting( 'ariele_lite_scroll_button_bg', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_scroll_button_bg', array(
		'label'   => esc_html__( 'Scroll to Top Button', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_scroll_button_bg',
		'section' => 'colors',
	) ) );

// scroll to top icon
 	$wp_customize->add_setting( 'ariele_lite_scroll_button_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_scroll_button_icon', array(
		'label'   => esc_html__( 'Scroll to Top Icon', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_scroll_button_icon',
		'section' => 'colors',
	) ) );
	
// scroll to top button hover bg
 	$wp_customize->add_setting( 'ariele_lite_scroll_button_hover_bg', array(
		'default'        => '#c2a68c',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_scroll_button_hover_bg', array(
		'label'   => esc_html__( 'Scroll to Top Button Hover', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_scroll_button_hover_bg',
		'section' => 'colors',
	) ) );	
	
// scroll to top button hover icon
 	$wp_customize->add_setting( 'ariele_lite_scroll_button_hover_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_scroll_button_hover_icon', array(
		'label'   => esc_html__( 'Scroll to Top Icon Hover', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_scroll_button_hover_icon',
		'section' => 'colors',
	) ) );		

// selection bg
 	$wp_customize->add_setting( 'ariele_lite_selection', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_selection', array(
		'label'   => esc_html__( 'Selection Text Background', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_selection',
		'section' => 'colors',
	) ) );

// selection text
 	$wp_customize->add_setting( 'ariele_lite_selection_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_selection_text', array(
		'label'   => esc_html__( 'Selection Text Colour', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_selection_text',
		'section' => 'colors',
	) ) );
	
// error page title
 	$wp_customize->add_setting( 'ariele_lite_error', array(
		'default'        => '#ef562f',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ariele_lite_error', array(
		'label'   => esc_html__( 'Error Page Title', 'ariele-lite' ),		
		'settings'   => 'ariele_lite_error',
		'section' => 'colors',
	) ) );		
		
		
		
// SECTION - LABELS
	$wp_customize->add_section( 'ariele_lite_label_options', array(
		'title'    => esc_html__( 'Label Options', 'ariele-lite' ),
		'priority' => 27,
	) );

  // Show blog heading group
  $wp_customize->add_setting( 'ariele_lite_hide_blog_heading',  array(
      'default' => false,
	  'transport'         => 'postMessage',
      'sanitize_callback' => 'ariele_lite_sanitize_checkbox',
    )
  );
  
  $wp_customize->add_control( 'ariele_lite_hide_blog_heading', array(
		'type'   => 'checkbox',
		'section'     => 'ariele_lite_label_options',
		'label'	      => esc_html__( 'Hide the Blog Heading Group', 'ariele-lite' ),
		'description' => esc_html__( 'Enable to hide the blog home page heading group.', 'ariele-lite' ),
		) 
  );

	// Default blog title label
  $wp_customize->add_setting( 'ariele_lite_default_blog_title', array(
      'default' => esc_html__( 'My Blog', 'ariele-lite' ),
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage'
    )
  );

  $wp_customize->add_control( 'ariele_lite_default_blog_title', array(
    'type'        => 'text',
    'label'       => esc_html__( 'Blog Title (Front Page)', 'ariele-lite' ),
    'section'     => 'ariele_lite_label_options'
   ) );
   
     /** Default blog intro text */
    $wp_customize->add_setting( 'ariele_lite_default_blog_intro', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control( 'ariele_lite_default_blog_intro', array(
            'label'   => esc_html__( 'Blog Intro (Front Page)', 'ariele-lite' ),
            'section' => 'ariele_lite_label_options',
            'type'    => 'textarea',
        )
    ); 

    /** Read More Text */
    $wp_customize->add_setting( 'ariele_lite_more_link_text', array(
            'default'           => esc_html__( 'Read More', 'ariele-lite' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control( 'ariele_lite_more_link_text', array(
            'type'    => 'text',
            'section' => 'ariele_lite_label_options',
            'label'   => esc_html__( 'Read More Text', 'ariele-lite' ),
        )
    ); 

   // Featured label
  $wp_customize->add_setting( 'ariele_lite_featured_label',   array(
      'default' => esc_html__( 'Featured', 'ariele-lite' ),
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage'
    )
  );
  
  $wp_customize->add_control( 'ariele_lite_featured_label', array(
    'type'        => 'text',
    'label'       => esc_html__( 'Featured Post Label', 'ariele-lite' ),
    'section'     => 'ariele_lite_label_options'
   ) );	
      		
	// Copyright
	$wp_customize->add_setting( 'ariele_lite_copyright', array(
		'sanitize_callback' => 'sanitize_text_field',
		 'transport' => 'postMessage'
	) );
	$wp_customize->add_control( 'ariele_lite_copyright', array(
		'settings' => 'ariele_lite_copyright',
		'label'    => esc_html__( 'Your Copyright Name', 'ariele-lite' ),
		'section'  => 'ariele_lite_label_options',		
		'type'     => 'text',
	) ); 
	  
				
// End theme settings
	
}
add_action( 'customize_register', 'ariele_lite_customize_register' );


/**
 * SANITIZATION
 * Required for cleaning up bad inputs
 */
 
  // Text Area
 function ariele_lite_sanitize_textarea($input){
	return wp_kses_post( $input );
}

// Strip Slashes
	function ariele_lite_sanitize_strip_slashes($input) {
		return wp_kses_stripslashes($input);
	}	
	
// Radio and Select	
	function ariele_lite_sanitize_select( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	 	
// Checkbox
	function ariele_lite_sanitize_checkbox( $input ) {
		// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
// Array of valid image file types
	function ariele_lite_sanitize_image( $image, $setting ) {
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}


// Adds sanitization callback function: Slider Category
function ariele_lite_sanitize_slidecat( $input ) {

	if ( array_key_exists( $input, ariele_lite_cats() ) ) {
		return $input;
	} else {
		return '';
	}
}


// Adds sanitization callback function: Number
function ariele_lite_sanitize_number( $input ) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ariele_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ariele_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
 
	
function ariele_lite_customize_preview_js() {
	
	 // Use minified libraries if SCRIPT_DEBUG is false
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	
	wp_enqueue_script( 'ariele-customizer', get_template_directory_uri() . '/js' . $build . '/customizer' . $suffix . '.js', array( 'customize-preview' ), null, true );
}
add_action( 'customize_preview_init', 'ariele_lite_customize_preview_js' );

// Embed CSS styles Customizer Controls.
function ariele_lite_customizer_styles_css() {
	wp_enqueue_style( 'ariele-customizer-controls', get_template_directory_uri() . '/css/customizer-styles.css', array(), null );
}
add_action( 'customize_controls_print_styles', 'ariele_lite_customizer_styles_css' );
