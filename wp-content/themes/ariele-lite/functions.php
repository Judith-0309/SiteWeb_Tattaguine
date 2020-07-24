<?php
/**
 * Ariele functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Ariele_Lite
 */
 
 /*	-----------------------------------------------------------------------------------------------
	WordPress COMPATIBILITY
	This theme only works in WordPress 5 or later.
--------------------------------------------------------------------------------------------------- */
if ( version_compare( $GLOBALS['wp_version'], '5', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
 
/*	-----------------------------------------------------------------------------------------------
	GLOBAL CONTENT WIDTH
	Set the default content width.
--------------------------------------------------------------------------------------------------- */
$GLOBALS['content_width'] = 1094;
if ( ! function_exists( 'ariele_lite_setup' ) ) :
	
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ariele_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ariele, use a find and replace to change 'ariele-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ariele-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add excerpt support to pages
		add_post_type_support( 'page', 'excerpt' );
		
		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// create featured images for the classic blog style
		if( esc_attr(get_theme_mod( 'ariele_lite_classic_thumbnails', false ) ) ) :
			add_image_size( 'ariele-lite-classic', 700, 450, true );
		endif;	
		
		// create featured images for the wide blog style
		if( esc_attr(get_theme_mod( 'ariele_lite_wide_thumbnails', false ) ) ) :
			add_image_size( 'ariele-lite-wide', 960, 600, true );
		endif;			
		
		// create recent posts thumbnails
		add_image_size( 'ariele-lite-recent-thumbnail', 60, 60, true );		
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'ariele-lite' ),
			'footer' => esc_html__( 'Footer', 'ariele-lite' ),
			'social' => esc_html__( 'Social', 'ariele-lite' ),
		) );	
		
		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ariele_lite_custom_background_args', array(
			'default-color' => '2d2d2d',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// This theme styles the visual editor to resemble the theme style, specifically font, colors, and column width.
		add_editor_style( array( 'css/editor.css', ariele_lite_fonts_url() ) );
		
		/**
		 * Add support for core custom logo.
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		// Add support for full and wide align images.
		if ( false == esc_attr(get_theme_mod( 'ariele_lite_block_css', false ) ) && ! is_page_template( 'templates/template-left.php' ) || ! is_page_template('templates/template-right.php') ) {
		add_theme_support( 'align-wide' );
		}		
		
	}
endif;
add_action( 'after_setup_theme', 'ariele_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function ariele_lite_content_width() {
	$content_width = $GLOBALS['content_width'];
	// Check if is single post and there is no sidebar.
	if ( is_active_sidebar( 'left-sidebar'  ) || is_active_sidebar( 'right-sidebar' ) || is_active_sidebar( 'blog-sidebar' ) ) {
		$content_width = 700;
	}	
  $GLOBALS['content_width'] = apply_filters( 'ariele_lite_content_width', $content_width );
}
add_action( 'template_redirect', 'ariele_lite_content_width', 0 );


/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function ariele_lite_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'ariele_lite_javascript_detection', 0 );

/**
 * Register Google Fonts.
 */
if ( ! function_exists( 'ariele_lite_fonts_url' ) ) :

function ariele_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	// Translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language.
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'ariele-lite' ) ) {
		$fonts[] = 'Poppins:300,400,500,800';
	}		

	// Translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'ariele-lite' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function ariele_lite_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'ariele-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'ariele_lite_resource_hints', 10, 2 );


 /*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLES & SCRIPTS
	load our theme stylesheets and script files
--------------------------------------------------------------------------------------------------- */
function ariele_lite_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );
	$css_dependencies = array();

	// Use minified libraries if SCRIPT_DEBUG is false
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	$theme_version = wp_get_theme()->get( 'Version' );
	
	// FontAwesome
	if( esc_attr(get_theme_mod( 'ariele_lite_enable_fontawesome', true ) ) ) {
		wp_enqueue_style( 'font-awesome-4', get_template_directory_uri() . '/css/fontawesome4.css', '', null );	
	}

	// Google fonts
	wp_enqueue_style( 'ariele-fonts', ariele_lite_fonts_url(), array(), null );

	// Block styles
	wp_enqueue_style( 'ariele-block-css', get_template_directory_uri() . '/css/block-styles.css', array(), null );

	// Stylesheets
	wp_enqueue_style( 'ariele-style', get_stylesheet_uri() );

	// Skip to link
	wp_enqueue_script( 'empt-skip-link-focus-fix', get_template_directory_uri() . '/js' . $build . '/skip-link-focus-fix' . $suffix . '.js', array(), null, true );
	
	// Main navigation
	wp_enqueue_script( 'ariele-menu', get_template_directory_uri() . '/js' . $build . '/menu' . $suffix . '.js', array( 'jquery' ), null, true );		
	
	// Theme scripts
	wp_enqueue_script( 'ariele-theme-scripts', get_template_directory_uri() . '/js' . $build . '/theme-scripts' . $suffix . '.js', array( 'jquery' ), null, true );

	// Theme functions and navigation
	wp_localize_script( 'ariele-menu', 'arielescreenReaderText', array(
	'expand'   => __( 'expand child menu', 'ariele-lite' ),
	'collapse' => __( 'collapse child menu', 'ariele-lite' ),
	) );

	// Comments 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ariele_lite_scripts' );

/* ---------------------------------------------------------------------------------------------
   REGISTER THEME WIDGETS
   --------------------------------------------------------------------------------------------- */
require( get_template_directory() . '/inc/widgets/recent-posts.php' );	
	
if ( ! function_exists( 'ariele_lite_register_widgets' ) ) :
	function ariele_lite_register_widgets() {
		register_widget( 'Ariele_Recent_Posts' );
	}
	add_action( 'widgets_init', 'ariele_lite_register_widgets' );
endif;

/*	-----------------------------------------------------------------------------------------------
	EDITOR STYLES FOR THE BLOCK EDITOR
	Assign theme block styles to the block editor
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'ariele_lite_block_editor_styles' ) ) :
	function ariele_lite_block_editor_styles() {

		$css_dependencies = array();

		// Retrieve and enqueue the URL for Google Fonts
		$google_fonts_url = ariele_lite_fonts_url();

		if ( $google_fonts_url ) {
			wp_register_style( 'ariele_lite_google_fonts', $google_fonts_url, false, 1.0, 'all' );
			$css_dependencies[] = 'ariele_lite_google_fonts';
		}

		// Enqueue the editor styles
			wp_enqueue_style( 'ariele_lite_block_editor_styles', get_theme_file_uri( '/css/block-editor.css' ), $css_dependencies, wp_get_theme()->get( 'Version' ), 'all' );
	}
	add_action( 'enqueue_block_editor_assets', 'ariele_lite_block_editor_styles', 1, 1 );
endif;


/* ---------------------------------------------------------------------------------------------
   EDITOR STYLES FOR THE CLASSIC EDITOR
   Assign theme styles to the classic editor - no block styles
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'ariele_lite_classic_editor_styles' ) ) :
	function ariele_lite_classic_editor_styles() {

		$classic_editor_styles = array(
			'/css/classic-editor.css',
		);

		// Retrieve the Google Fonts URL and add it as a dependency
		$google_fonts_url = ariele_lite_fonts_url();

		if ( $google_fonts_url ) {
			$classic_editor_styles[] = $google_fonts_url;
		}

		add_editor_style( $classic_editor_styles );

	}
	add_action( 'init', 'ariele_lite_classic_editor_styles' );
endif;

/* ---------------------------------------------------------------------------------------------
   BLOCK EDITOR SETTINGS
   Add custom colors and font sizes to the block editor
------------------------------------------------------------------------------------------------ */	
	if ( ! function_exists( 'ariele_lite_block_editor_settings' ) ) :
		function ariele_lite_block_editor_settings() {

			// Add support for custom color scheme.
			add_theme_support( 'editor-color-palette', array(
				array(
				'name'  => esc_html__( 'Red', 'ariele-lite' ),
				'slug'  => 'red',
				'color' => '#ef562f',
				),			
				array(
				'name'  => esc_html__( 'Brown', 'ariele-lite' ),
				'slug'  => 'brown',
				'color' => '#b06545',
				),								
				array(
				'name'  => esc_html__( 'Taupe', 'ariele-lite' ),
				'slug'  => 'taupe',
				'color' => '#c9beaf',
				),	
				array(
				'name'  => esc_html__( 'Black', 'ariele-lite' ),
				'slug'  => 'black',
				'color' => '#1b1b1b',
				),					
				array(
				'name'  => esc_html__( 'Grey', 'ariele-lite' ),
				'slug'  => 'grey',
				'color' => '#9a9a9a',
				),			
				array(
				'name'  => esc_html__( 'Beige', 'ariele-lite' ),
				'slug'  => 'beige',
				'color' => '#f5f2ed',
				),
				array(
				'name'  => esc_html__( 'White', 'ariele-lite' ),
				'slug'  => 'white',
				'color' => '#fff',
				),
			) );

			// Gutenberg Font Sizes
			add_theme_support( 'editor-font-sizes', array(
				array(
					'name' 		=> _x( 'Small', 'Name of the small font size in Gutenberg', 'ariele-lite' ),
					'shortName' => _x( 'S', 'Short name of the small font size in the Gutenberg editor.', 'ariele-lite' ),
					'size' 		=> 14,
					'slug' 		=> 'small',
				),
				array(
					'name' 		=> _x( 'Regular', 'Name of the regular font size in Gutenberg', 'ariele-lite' ),
					'shortName' => _x( 'R', 'Short name of the regular font size in the Gutenberg editor.', 'ariele-lite' ),
					'size' 		=> 16,
					'slug' 		=> 'regular',
				),
				array(
					'name' 		=> _x( 'Medium', 'Name of the medium font size in Gutenberg', 'ariele-lite' ),
					'shortName' => _x( 'M', 'Short name of the medium font size in the Gutenberg editor.', 'ariele-lite' ),
					'size' 		=> 32,
					'slug' 		=> 'medium',
				),				
				array(
					'name' 		=> _x( 'Large', 'Name of the large font size in Gutenberg', 'ariele-lite' ),
					'shortName' => _x( 'L', 'Short name of the large font size in the Gutenberg editor.', 'ariele-lite' ),
					'size' 		=> 40,
					'slug' 		=> 'large',
				),
				array(
					'name' 		=> _x( 'Larger', 'Name of the larger font size in Gutenberg', 'ariele-lite' ),
					'shortName' => _x( 'XL', 'Short name of the larger font size in the Gutenberg editor.', 'ariele-lite' ),
					'size' 		=> 48,
					'slug' 		=> 'larger',
				),
			) );

		}
		add_action( 'after_setup_theme', 'ariele_lite_block_editor_settings' );
	endif;


// Include better comments file
require get_template_directory() .'/inc/comment-style.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/sidebars.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load CSS overrides
require get_template_directory() . '/inc/inline-styles.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
