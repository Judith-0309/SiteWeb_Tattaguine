<?php
/**
 * Business Corner functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Business Corner
 */

if ( ! function_exists( 'business_corner_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function business_corner_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Business Corner, use a find and replace
	 * to change 'business-corner' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'business-corner', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
        add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-width' => false,
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'business-corner' ),
	) );
	
	add_image_size( 'business_corner_slide', 1980, 800, true );
	add_image_size( 'business_corner_general', 600, 400, true );
	add_image_size( 'business_corner_thumb', 600, 400, true );
}
endif;
add_action( 'after_setup_theme', 'business_corner_setup' );


//including customizer
require( get_template_directory().'/customizer.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_corner_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_corner_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_corner_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_corner_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'business-corner' ),
		'id'            => 'business-corner-sidebar',
		'description'   => __( 'Main Sidebar', 'business-corner' ),
		'before_widget' => '<div id="%1$s" class="row sidebar-widget %2$s"><div class="widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Footer Widget', 'business-corner' ),
		'id' => 'business-corner-footer-widget',
		'description'   => __( 'Footer widget area', 'business-corner' ),
		'before_widget' => '<div class="col-md-3 col-sm-6 bs-widget"><div class="widget">',
		'after_widget' => "</div></div>",
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'business_corner_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function business_corner_scripts() {
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css' );
	wp_enqueue_style( 'business-corner-google-font', 'https://fonts.googleapis.com/css?family=Cinzel+Decorative|Bree+Serif' );
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/css/animate.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() .'/css/swiper.min.css' );
	wp_enqueue_style('business-corner-stylesheet', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('business-corner-media-css', get_template_directory_uri() . '/css/media-screen.css' );
	
}
add_action( 'wp_enqueue_scripts', 'business_corner_scripts' );

function business_corner_footer_scripts() {
	
	wp_enqueue_script( 'business-corner-script', get_template_directory_uri() . '/js/script.js');
	
}
add_action( 'wp_footer', 'business_corner_footer_scripts' );

//color css 
function business_corner_color_css(){
	$color= get_theme_mod( 'business_corner_theme_color_setting', '#349cd2'); ?>
<style>
.bs-header{
	border-top:3px solid <?php echo esc_html( $color ); ?>;
}
.error-link{
	color: <?php echo esc_html( $color ); ?>;
	border-bottom:2px solid <?php echo esc_html( $color ); ?>;
}
.comments-text a{
	color: <?php echo esc_html( $color ); ?>;
} 
.bs-comment-form .comment-link {
   background-color: <?php echo esc_html( $color ); ?>;
}
.pager .previous a, .pager .next a {
    border: 2px solid <?php echo esc_html( $color ); ?>;
    color: <?php echo esc_html( $color ); ?>;
}
.wp-caption-text {
    background-color: <?php echo esc_html( $color ); ?>;
}
.bs-category-detail li a:hover {
    background-color: <?php echo esc_html( $color ); ?>;
}
.bs-category-detail li i{
	color:<?php echo esc_html( $color ); ?>;
}
.bs-category-detail li i{
	color:<?php echo esc_html( $color ); ?>;
}
.tagcloud a{
	border: 2px solid <?php echo esc_html( $color ); ?>;
	color:<?php echo esc_html( $color ); ?>;
	background-image: linear-gradient(to bottom, transparent 50%, <?php echo esc_html( $color ); ?> 50%);
}
.tagcloud a:hover{
	background-color:<?php echo esc_html( $color ); ?>;
}
#wp-calendar caption {
    background-color: <?php echo esc_html( $color ); ?>;
}
#wp-calendar tfoot {
    border-top: 2px solid <?php echo esc_html( $color ); ?>;
}
#wp-calendar caption {
    border: 2px solid <?php echo esc_html( $color ); ?>;
}
.bs-menu {
    background-color: <?php echo esc_html( $color ); ?>;
}
.bs-menu .navbar-nav .open .dropdown-menu{
	background-color:<?php echo esc_html( $color ); ?>;
}
.slider-link{
	color:<?php echo esc_html( $color ); ?>;
	border:2px solid <?php echo esc_html( $color ); ?>;
	background-image: linear-gradient(to bottom, transparent 50%, <?php echo esc_html( $color ); ?> 50%);
}
.slider-link:hover,
.slider-link:focus{
	background-color:<?php echo esc_html( $color ); ?>;
}
.bs-ser-icon i {
    border: 2px solid <?php echo esc_html( $color ); ?>;
    color: <?php echo esc_html( $color ); ?>;
}
.bs-ser-icon i:hover {
	background-color: <?php echo esc_html( $color ); ?>;
}
.ser-title{
	color:<?php echo esc_html( $color ); ?>;
}
.ser-title a{
	color:<?php echo esc_html( $color ); ?>;
}
.bs-servs .ser-link{
	color:<?php echo esc_html( $color ); ?>;
}
.ports  .port-title{
background-color:<?php echo esc_html( $color ); ?>;
}
.blog-detail .entry-title,
.blog-detail .entry-title a{
	color:<?php echo esc_html( $color ); ?>;
}
.bs-author a:hover{
	color:<?php echo esc_html( $color ); ?>;
}
.bs-author i,
.bs-date i{
	color:<?php echo esc_html( $color ); ?>;
}
.copyright a{
	color:<?php echo esc_html( $color ); ?>;
}
.footer {
    border-top: 3px solid <?php echo esc_html( $color ); ?>;
}
.bs-date a:hover{
	color:<?php echo esc_html( $color ); ?>;
}
.btn-search {
   background-color:<?php echo esc_html( $color ); ?>;
}
.logged-in-as a{
	color:<?php echo esc_html( $color ); ?>;
}
.widget ul li a:hover{
	color:<?php echo esc_html( $color ); ?>;
}
.site-title a{
	color:<?php echo esc_html( $color ); ?>;
}
.bs-breadc a{
	color:<?php echo esc_html( $color ); ?>;
}
.calendar_wrap td a{
	color:<?php echo esc_html( $color ); ?>;
}
.bs-menu-head .navbar-nav li:hover .dropdown-menu,.bs-menu-head .page_item:hover .dropdown-menu {
	background-color:<?php echo esc_html( $color ); ?>;
}
.bs-blog a {
   color:<?php echo esc_html( $color ); ?>;
}
.widget_archive .widget ul li:before {
    color:<?php echo esc_html( $color ); ?>;
}
.ep-member-detail .img-thumbnail:after {
    border: 5px solid <?php echo esc_html( $color ); ?>;
}
.team-title a {
    color: <?php echo esc_html( $color ); ?>;
}
.bs-home-about .about-title a{
    color: <?php echo esc_html( $color ); ?>;
}
.bs-home-about .about-link{
     border: 3px solid <?php echo esc_html( $color ); ?>;
}
.course-title a {
    color: <?php echo esc_html( $color ); ?>;
}
</style>
<?php }

add_action( 'wp_head', 'business_corner_color_css',999);

// menu setup	
function business_corner_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'business_corner_page_menu_args' );

 
function business_corner_fallback_page_menu( $args = array() ) {

	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home','business-corner');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item"';
		$menu .= '<li ' . $class . '><a href="' .   esc_url( home_url('/')) . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$list_args['walker'] = new business_corner_walker_page_menu;
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

	if ( $menu )
		$menu = '<ul class="'. esc_attr($args['menu_class']) .'">' . $menu . '</ul>';

	$menu = '<div class="' . esc_attr($args['container_class']) . '">' . $menu . "</div>\n";
	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	if ( $args['echo'] )
		 echo wp_kses_post( $menu );
	else
		return $menu;
}
class business_corner_walker_page_menu extends Walker_Page{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='dropdown-menu'>\n";
	}
	function start_el( &$output, $page, $depth=0, $args = array(), $current_page = 0 ) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		else
			$indent = '';

		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);
		if ( !empty($current_page) ) {
			$_current_page = get_post( $current_page );
			if ( in_array( $page->ID, $_current_page->ancestors ) )
				$css_class[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$css_class[] = 'current_page_item';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$css_class[] = 'current_page_parent';
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}
	}
}

class business_corner_nav_walker extends Walker_Nav_Menu {	
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		if ($args->has_children && $depth > 0) {
			$classes[] = 'dropdown dropdown-submenu';
		} else if($args->has_children && $depth === 0) {
			$classes[] = 'dropdown';
		}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';	
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($args->has_children) ? '<i class="fa fa-angle-down"></i></a>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'end_el'), $cb_args);
	}
}
function business_corner_nav_menu_css_class( $classes ) {
	if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
		$classes[]	=	'active';

	return $classes;
}
add_filter( 'nav_menu_css_class', 'business_corner_nav_menu_css_class' );

/****--- Navigation ---***/
	function business_corner_navigation() { 
?>
	<div class="row navi">
		<ul class="pager">
			<li class="next"><?php next_posts_link(__('Old entries','business-corner')); ?></li>
			<li class="previous"><?php previous_posts_link(__('New entries','business-corner')); ?></li>
		</ul>
	</div>
<?php }

// post/page navigation
function business_corner_link_pages(){
	$defaults = array(
		'before'           => '<p class="link-content">' . __( 'Pages:','business-corner' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page','business-corner'),
		'previouspagelink' => __( 'Previous page','business-corner'),
		'pagelink'         => '%',
		'echo'             => 1
	);
				wp_link_pages( $defaults );
}

function business_corner_post_link(){ 
	global $post; 
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
		<div class="row bs-pager">
		<ul class="pager">
			<li class="previous"><?php next_post_link( '%link', _x( '<i class="fa fa-angle-double-left"></i> New Post', 'Next post link', 'business-corner' ) ); ?></li>
			<li class="next"><?php previous_post_link( '%link', _x( 'Old Post <i class="fa fa-angle-double-right"></i>', 'Previous post link', 'business-corner' ) ); ?></li>
		</ul>
	</div>
	<?php }
	
//breadcrums
function business_corner_breadcrumbs() {
	// The 3 variables $delimiter, $before, $after are used throughout this
	// function - they are hard-coded strings and do not need escaping.
	
    $delimiter = '<li>/</li>';
    $home = __('Home', 'business-corner' ); // text for the 'Home' link
    $before = '<li>'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb
    echo '<ul class="bs-breadc">';
    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>' . $delimiter . ' ';
	if (is_404()) {
        echo $before . esc_html_e("Error 404","business-corner") . $after;
    }elseif (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo esc_html(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . esc_html_e("Archive by category: ","business-corner") . esc_html(single_cat_title('', false)) . $after;
    } elseif (is_day()) {
        echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a></li> ' . $delimiter . ' ';
        echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a></li> ' . $delimiter . ' ';
        echo $before . esc_html(get_the_time('d')) . $after;
    } elseif (is_month()) {
        echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a></li> ' . $delimiter . ' ';
        echo $before . esc_html(get_the_time('F')) . $after;
    } elseif (is_year()) {
        echo $before . esc_html(get_the_time('Y')) . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li><a href="' . esc_url($homeLink) . '/' . esc_html($slug['slug']) . '/">' . esc_html($post_type->labels->singular_name) . '</a></li> ' . $delimiter . ' ';
            echo $before . esc_html(get_the_title()) . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . esc_html(get_the_title()) . $after;
        }
    }elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo esc_html(get_category_parents($cat, TRUE, ' ' . $delimiter . ' '));
        echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . esc_html($parent->post_title) . '</a></li> ' . $delimiter . ' ';
        echo $before . esc_html(get_the_title()) . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . esc_html(get_the_title()) . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . esc_html(get_the_title()) . $after;
    } elseif (is_search()) {
        echo $before . esc_html_e('Search results for: ','business-corner')  . esc_html(get_search_query()) . '' . $after;
    } elseif (is_tag()) {        
		echo $before . esc_html_e('Tag: ','business-corner') . esc_html(single_tag_title('', false)) . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . esc_html_e("Articles posted by: ","business-corner") . esc_html($userdata->display_name) . $after;
    }elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . esc_html($post_type->labels->singular_name) . $after;
    } 
    
    echo '</ul>';
	}
if ( ! function_exists( 'business_corner_comment' ) ){
require( get_template_directory() . '/comment-function.php' );
}