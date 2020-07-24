<?php
$display_client = get_theme_mod( 'education_corner_display_client_setting', 0);
$education_corner_heading_client = get_theme_mod( 'education_corner_heading_client');
$education_corner_desc_client = get_theme_mod( 'education_corner_desc_client');
$education_corner_client_bg = get_theme_mod( 'education_corner_client_bg');
$client_page = get_theme_mod( 'client_page');
 if($display_client ==1){ ?>
<div class="container-fluid bs-margin bs-client">
	<div class="container">
		<div class="row bs-heading-section">
			<?php if($education_corner_heading_client!=''){ ?>
                <h1 class="bs-heading-title"><span class="bs-title"><?php echo esc_attr($education_corner_heading_client); ?></span></h1>
                <?php if($education_corner_desc_client!=''){ ?>
                <p class="bs-heading-desc"><?php echo esc_attr($education_corner_desc_client); ?></p>
            <?php } } ?>
		</div>
        <?php if(isset($client_page) && is_array($client_page)){ ?>
		<div class="row bs-home-client">
		    <div class="swiper-container home-client">
    			<div class="swiper-wrapper ">
                    <?php foreach ($client_page as $client) { ?>
    			    <div class="swiper-slide">
                        <?php if ( has_post_thumbnail($client) ) { ?>
                            <div class="img-thumbnail">
                                <?php echo get_the_post_thumbnail( $client, 'education-client', array( 'class' => 'img-responsive team_thumb wp-post-image' ) ); ?>    
                            </div>
                        <?php } ?>
    			    </div>
                <?php } ?>
    			</div>
    	     </div>
    	 </div>
        <?php } ?>
    </div>
 </div>
 <?php } ?>