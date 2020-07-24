<?php 
/*
 * Header top bar
 * @package Ariele_Lite
 */
?>


<div class="container-fluid">
	<div class="row align-items-center">
			<div class="col-md-6">
			<?php if( esc_attr(get_theme_mod( 'ariele_lite_show_topbar_left', false ) ) ) : 
				echo '<div id="topbar-left">';			
					  get_template_part( 'template-parts/navigation/nav', 'social' ); 
				echo '</div>';	
				endif; ?>			
				
			</div>
			<div class="col-md-6">
			<?php if( esc_attr(get_theme_mod( 'ariele_lite_show_topbar_right', false ) ) ) : ?>
				<div id="topbar-right">				
					<a class="searchOpen" href="#" title="search"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'Search label', 'ariele-lite' ); ?></span></a>
				</div>
			<?php endif; ?>
			</div>			
	</div>
</div>