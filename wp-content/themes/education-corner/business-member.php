<?php
$display_team = get_theme_mod( 'education_corner_display_team_setting', 0);
$education_corner_heading_team = get_theme_mod( 'education_corner_heading_team');
$education_corner_desc_team = get_theme_mod( 'education_corner_desc_team');
$education_corner_team_bg = get_theme_mod( 'education_corner_team_bg');
$team_page = get_theme_mod( 'team_page');
 if($display_team ==1){ ?>
<div class="bs-member-back" <?php if($education_corner_team_bg!=''){ echo 'style="background-image:url('.esc_url($education_corner_team_bg).')"'; } ?>>
    <div class="container-fluid bs-margin bs-member">
    	<div class="container">
    		<div class="row bs-heading-section">
                <?php if($education_corner_heading_team!=''){ ?>
    			<h1 class="bs-heading-title"><span class="bs-title"><?php echo esc_attr($education_corner_heading_team); ?></span></h1>
                <?php if($education_corner_desc_team!=''){ ?>
    			<p class="bs-heading-desc"><?php echo esc_attr($education_corner_desc_team); ?></p>
            <?php } } ?>
    		</div>
            <?php if(isset($team_page) && is_array($team_page)){ ?>
    		<div class="row bs-home-member">
    		    <div class="swiper-container home-member">
        			<div class="swiper-wrapper">
                        <?php foreach ($team_page as $member) { ?>
        			    <div class="swiper-slide">
            				<div class="row ep-member-detail">
                                <?php if ( has_post_thumbnail($member) ) { ?>
            					<div class="img-thumbnail">
                                    <?php echo get_the_post_thumbnail( $member, 'education-member', array( 'class' => 'img-responsive img-circle education-about wp-post-image' ) ); ?>	
            					</div>
                            <?php } ?>
            					<h3 class="team-title"><a href="<?php echo esc_url(get_permalink($member)); ?>"><?php echo esc_attr(get_the_title($member)); ?></a></h3>
            					<p><?php echo esc_attr(get_the_excerpt($member)); ?></p>
            				</div>
                		</div>
                    <?php } ?>
            		</div>
                </div>
    		</div>
        <?php } ?>
    	</div>
    </div>
</div>
<?php } ?>