<?php $education_corner_display_feature_setting = get_theme_mod( 'education_corner_display_feature_setting', 0);
$feature_post = get_theme_mod( 'feature_post');
if($education_corner_display_feature_setting==1 && $feature_post!=''){ ?>
<div class="container-fluid bs-about">
	<div class="container">
	    <div class="row bs-home-about">
			<div class="col-md-6 col-sm-6 ep-about-pics wow zoomInUp">
				<?php if ( has_post_thumbnail($feature_post) ) { ?>
	                <div class="img-thumbnail">
	                    <?php echo get_the_post_thumbnail( $feature_post, 'education-about', array( 'class' => 'img-responsive team_thumb wp-post-image' ) ); ?>    
	                </div>
	            <?php } ?>
			</div>
			<div class="col-md-6 col-sm-6 ep-about-desc wow zoomInUp">		
				<h2 class="about-title"><a href="<?php echo esc_url(get_permalink($feature_post)); ?>"><?php echo esc_attr(get_the_title($feature_post)); ?></a></h2>
				<p><?php echo esc_attr(get_the_excerpt($feature_post)); ?></p>
				<a class="btn about-link" href="<?php echo esc_url(get_permalink($feature_post)); ?>"><?php esc_html_e('Learn More','education-corner'); ?> <i class="fa fa-long-arrow-right"></i> </a>
			</div>	
		</div>
	</div>
</div>
<?php } ?>