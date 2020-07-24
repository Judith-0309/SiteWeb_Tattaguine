<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_anesc_html_error_404_Page
 *
 * @package Business Corner
 */

get_header(); 
get_template_part('breadcrumps'); ?>
	
<!-- 404 Start -->
<div class="container-fluid bs-margin bs-404">
	<div class="container">
                <div class="col-md-8">
		      <div class="row ep-error">
			  <h1 class="error-title"><?php esc_html_e('404','business-corner'); ?> <span> <?php esc_html_e('Error','business-corner'); ?> </span></h1>
			  <h3><?php esc_html_e('Content Not Found','business-corner'); ?></h3>
			  <p><i class="fa fa-info-circle"></i> <?php esc_html_e('Oops! The page you requested was not found.','business-corner'); ?> </p>
			  <a class="error-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home"></i> <?php esc_html_e('Go To Home Page','business-corner'); ?></a>
		      </div>
		</div>
              <?php get_sidebar();?>
	</div>
</div>
<!-- 404 End -->
<?php
get_footer();
