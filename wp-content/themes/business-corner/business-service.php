<?php 
/**
 * Template part for displaying services.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business Corner
 */
	$service_display = get_theme_mod( 'business_corner_display_service_setting', 0);
	$service_cat = get_theme_mod( 'business_corner_category_service');
	//query posts
	$service_args =	array(
		'offset'           => 0,
		'category_name'    => $service_cat,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);

	$services = new WP_Query( $service_args );
	if($service_display == 1 && $service_cat!=''){ 
	if($services->have_posts()) :
	$service_count= 0; ?> 
<!-- Service start -->
<div class="container-fluid bs-margin bs-service">
	<div class="container">
		<div class="row bs-heading-section">
		<?php if(get_theme_mod( 'business_corner_heading_service')!=''){ ?>
			<h1 class="bs-heading-title"><span class="bs-title"><?php echo esc_attr(get_theme_mod( 'business_corner_heading_service')); ?></span></h1>
			<?php if(get_theme_mod( 'business_corner_desc_service')!=''){ ?>
			<p class="bs-heading-desc"><?php echo esc_attr(get_theme_mod( 'business_corner_desc_service')); ?></p>
		<?php } } ?>
		</div>
		<div class="row bs-services">
		<?php while ($services->have_posts()) : 
			$services->the_post();
			$service_count++; ?>
			<div class="col-md-4 col-sm-6 bs-ser">
				<div class="bs-servs">
				<?php if ( has_post_thumbnail() ) { ?>
					<span class="bs-ser-icon">
						<?php the_post_thumbnail( 'business_corner_general', array( 'class' => 'img-responsive' ) ); ?>
					</span>
				<?php } ?>
					<h2 class="ser-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					<a class="btn ser-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','business-corner'); ?></a>
				</div>
			</div>
			<?php if($service_count%3==0){ echo '<div class="col-md-12"></div>'; }
			endwhile; ?>
		</div>
	</div>
</div>
<!-- Service End -->
<?php endif;
wp_reset_postdata();
	} ?>