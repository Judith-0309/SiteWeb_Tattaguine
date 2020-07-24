<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business Corner
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()){ ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php }
wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Wrapper Start -->
<div class="wrapper">
<header class="header1 bs-header">
	<div class="container-fluid bs-topbar">
		<div class="container">
		<?php $bc_topbar= get_theme_mod( 'business_corner_display_topbar_setting', 0);
		if($bc_topbar==1){	?>
			<div class="row bs-topbar-detail">
				<div class="col-md-7 col-sm-7 bs-top-text">
					<p><?php echo esc_attr(get_theme_mod( 'business_corner_topbar_text')); ?></p>
				</div>
				<div class="col-md-5 col-sm-5 bs-social-info">
					<ul class="bs-social">
					<?php for($i=1; $i<=5; $i++){
						$social_icon = get_theme_mod( 'business_corner_social_icon_'.$i);
						$social_link = get_theme_mod( 'business_corner_social_link_'.$i);
						if($social_icon!='' && $social_link!=''){ ?>
						<li class="social">
							<a href="<?php echo esc_url($social_link); ?>" target="_blank"><i class="<?php echo esc_attr($social_icon); ?>"></i></a>
						</li>
						<?php } } ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<div class="container-fluid bs-logo-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 bs-logo">
				<?php $business_corner_logo_id = get_theme_mod( 'custom_logo' );
			$business_corner_logo_data = wp_get_attachment_image_src( $business_corner_logo_id , 'full' );
			$business_corner_logo = $business_corner_logo_data[0];	?>
			 <h1 class="site-title"><a class="logo-wrapper" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php if(isset($business_corner_logo)){ ?>
			<img src="<?php echo esc_url($business_corner_logo); ?>" alt="Logo" >
			<?php }else { ?>
               <?php bloginfo( 'name' ); ?>
				<?php } ?></a></h1>
                <p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
				<div class="col-md-8 col-sm-6 bs-add-info">
				<?php $bc_element= get_theme_mod( 'business_corner_display_element_setting', 0);
				if($bc_element==1){
				for($i=1; $i<=3; $i++){
				if(get_theme_mod( 'business_corner_header_icon_'.$i)!='' && get_theme_mod( 'business_corner_header_heading_'.$i)!='' && get_theme_mod( 'business_corner_header_desc_'.$i)!=''){?>
					<div class="bs-mail">
						<div class="bs-mail-icon">
							<i class="<?php echo esc_attr(get_theme_mod( 'business_corner_header_icon_'.$i)); ?>"></i>
						</div>
						<div class="bs-mail-info">
							<span class="bs-top-title"><?php echo esc_attr(get_theme_mod( 'business_corner_header_heading_'.$i)); ?></span>
							<span class="bs-top-desc"><?php echo esc_attr(get_theme_mod( 'business_corner_header_desc_'.$i)); ?></span>
						</div>
					</div>
				<?php } } } ?>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default bs-menu">
		<div class="container-fluid">
			<div class="container">
				<div class="row bs-menu-head">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
					  <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>"></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class' => 'nav navbar-nav navbar-right',
							'fallback_cb' => 'business_corner_fallback_page_menu',
							'walker' => new business_corner_nav_walker(),
							)
						);	?>					
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>