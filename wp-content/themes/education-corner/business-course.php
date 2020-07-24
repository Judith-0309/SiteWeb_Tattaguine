<?php 
$display_course = get_theme_mod( 'education_corner_display_course_setting', 0);
$education_corner_heading_course = get_theme_mod( 'education_corner_heading_course');
$education_corner_desc_course = get_theme_mod( 'education_corner_desc_course');
$education_corner_course_bg = get_theme_mod( 'education_corner_course_bg');
$course_page = get_theme_mod( 'course_page'); 
if($display_course==1){ ?>
<div class="container-fluid bs-margin bs-course">
    	<div class="container">
    		<div class="row bs-heading-section">
                <?php if($education_corner_heading_course!=''){ ?>
    			<h1 class="bs-heading-title"><span class="bs-title"><?php echo esc_attr($education_corner_heading_course); ?></span></h1>
                <?php if($education_corner_desc_course!=''){ ?>
    			<p class="bs-heading-desc"><?php echo esc_attr($education_corner_desc_course); ?></p>
            <?php } } ?>
    		</div>
            <?php if(isset($course_page) && is_array($course_page)){ ?>
    		<div class="row bs-home-course">
                <?php foreach ($course_page as $course) { ?>
    		    <div class="col-md-4 col-sm-6 ep-course wow zoomInUp">
    				<div class="row ep-course-detail">
    					<?php if ( has_post_thumbnail($course) ) { ?>
                            <div class="img-thumbnail">
                                <?php echo get_the_post_thumbnail( $course, 'education-course', array( 'class' => 'img-responsive team_thumb wp-post-image' )); ?>    
                            </div>
                        <?php } ?>
    					<h3 class="course-title"><a href="<?php echo esc_url(get_permalink($course)); ?>"><?php echo esc_attr(get_the_title($course)); ?></a></h3>
    					<p><?php echo esc_attr(get_the_excerpt($course)); ?></p>
    				</div>
    			</div>
            <?php } ?>
    		</div> 
            <?php } ?>  
    	</div> 
    </div>
    <?php } ?>