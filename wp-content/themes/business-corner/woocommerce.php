<?php get_header(); 
get_template_part('breadcrumps'); ?>
<!-- Blog Start -->
<div class="container-fluid ep-margin sc-store">
	<div class="container">
		<div class="row shop-page">
			<div class="col-md-8 left-side">
					<div class="row ep-shop-page">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content clearfix" id="content-903">
								<?php woocommerce_content(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php get_sidebar(); ?>
			
		</div>
	</div>
</div>
<!-- Blog End -->
<?php get_footer(); ?>