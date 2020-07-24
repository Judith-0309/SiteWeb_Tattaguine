<?php 
/**
 * Template part for displaying portfolios.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business Corner
 */
	$portfolio_display = get_theme_mod( 'business_corner_display_portfolio_setting', 0);
	$portfolio_cat = get_theme_mod( 'business_corner_category_portfolio');
	//query posts
	$portfolio_args =	array(
		'offset'           => 0,
		'category_name'    => $portfolio_cat,
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

	$portfolios = new WP_Query( $portfolio_args );
	if($portfolio_display == 1 && $portfolio_cat!=''){ 
	if($portfolios->have_posts()) :
	$portfolio_count= 0; ?> 
<!-- Portfolio start -->
<div class="container-fluid bs-margin bs-portfolio">
	<div class="container">
		<div class="row bs-heading-section">
			<?php if(get_theme_mod( 'business_corner_heading_portfolio')!=''){ ?>
			<h1 class="bs-heading-title"><span class="bs-title"><?php echo esc_attr(get_theme_mod( 'business_corner_heading_portfolio')); ?></span></h1>
			<?php if(get_theme_mod( 'business_corner_desc_portfolio')!=''){ ?>
			<p class="bs-heading-desc"><?php echo esc_attr(get_theme_mod( 'business_corner_desc_portfolio')); ?></p>
		<?php } } ?>
		</div>
		<div class="row bs-home-ports">
		<?php while($portfolios->have_posts()) : 
			$portfolios->the_post();
			if ( has_post_thumbnail() ) {
			$portfolio_count++; ?>
			<div class="col-md-4 col-sm-6 bs-port">
				<div class="ports">
					<div class="img-thumbnail">
						<?php the_post_thumbnail( 'business_corner_general', array( 'class' => 'img-responsive' ) ); ?>
					</div>
					<h3 class="port-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>
			</div>
			<?php if($portfolio_count%3==0){ echo '<div class="col-md-12"></div>'; }
			}
			endwhile; ?>
		</div>
	</div>
</div>
<!-- Portfolio End -->
<?php endif;
wp_reset_postdata();
	} ?>