<?php
/**
 * The header for our theme
 * @package Ariele_Lite
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

    <div id="page" class="hfeed site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ariele-lite' ); ?></a>

        <header id="masthead" class="site-header">
            <div id="site-branding">

                <?php if ( has_custom_logo() ) : 
						the_custom_logo();  				
					endif; ?>

                <?php if (is_front_page() && false == esc_attr(get_theme_mod( 'ariele_lite_hide_site_title', false ) ) ) : ?>
					<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
					<?php if (  false == esc_attr(get_theme_mod( 'ariele_lite_hide_site_title', false ) ) ) : ?>
					<p id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php	endif;  ?>
                <?php endif; ?>

                <?php	if (  false == esc_attr(get_theme_mod( 'ariele_lite_hide_site_desc', false ) ) ) :
						$ariele_lite_description = get_bloginfo( 'description', 'display' );
							if ( $ariele_lite_description || is_customize_preview() ) : ?>
						<p id="site-description"><?php echo $ariele_lite_description; ?></p>
                <?php 
						endif;
					endif; 
				?>

            </div>

            <div id="nav-wrapper">
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <button id="menu-toggle" class="menu-toggle"><?php esc_html_e( 'Menu', 'ariele-lite' ); ?></button>
                <div id="site-header-menu" class="site-header-menu">
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'ariele-lite' ); ?>">
                        <?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
                    </nav><!-- .main-navigation -->
                    <?php endif; ?>

                </div><!-- .site-header-menu -->
                <?php endif; ?>
            </div>

        </header>


        <?php if( esc_attr(get_theme_mod( 'ariele_lite_show_topbar', true ) ) ) :
	echo '<div id="topbar">';
		get_template_part('template-parts/top-bar'); 
	echo '</div>';
	endif; ?>
        <?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>
        <?php get_template_part( 'template-parts/sidebars/sidebar', 'banner' ); ?>

        <?php	// Whenever a page has a featured image
	if ( '' !== get_the_post_thumbnail() && is_page() && ! is_page_template( array( 'templates/template-about.php' ) ) ) :  
	echo '<div id="featured-image-shadow"><div id="featured-image">';		
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => ''));		
	echo '</div></div>';			
	endif; 
	?>

        <div id="content" class="site-content container">
