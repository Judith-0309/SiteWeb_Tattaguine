<?php
/**
 * The template part for displaying grid layout
 *
 * @package VW Education Lite
 * @subpackage vw-education-lite
 * @since VW Education Lite 1.0
 */
?>
<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>	
		<div class="services-box">
	    	<div class="service-image">
	          	<?php 
	            	if(has_post_thumbnail()) { 
	              		the_post_thumbnail(); 
	            	}
	            ?>
	      	</div>
	    	<div class="service-text">
	        	 <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
				 <div class="entry-content">
				 	<p>
			            <?php $excerpt = get_the_excerpt(); echo esc_html( vw_education_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_education_lite_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_education_lite_excerpt_suffix','') ); ?>
			        </p>
				 </div>
				 <?php if( get_theme_mod('vw_education_lite_button_text','Read More') != ''){ ?>
		        	<div class="read-btn">
			            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('vw_education_lite_button_text',__('Read More','vw-education-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_education_lite_button_text',__('Read More','vw-education-lite')));?></span></a>  
			        </div>  
				<?php } ?>  
	      	</div>
	    </div>
    </article>    
</div>