<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_education_lite_above_slider' ); ?>

  <?php if( get_theme_mod('vw_education_lite_slider_hide_show') != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $vw_education_lite_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_education_lite_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_education_lite_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_education_lite_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_education_lite_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_education_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_education_lite_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_education_lite_slider_button_text','Know More') != ''){ ?>
                    <div class="more-btn">              
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_education_lite_slider_button_text',__('Know More','vw-education-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_education_lite_slider_button_text',__('Know More','vw-education-lite')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-education-lite' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-education-lite' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action( 'vw_education_lite_below_slider' ); ?>

  <?php if( get_theme_mod( 'vw_education_lite_sec1_title') != '' || get_theme_mod( 'vw_education_lite_courses_settings' )!= ''){ ?>
    <section id="our-courses">    
      <div class="container">
        <div class="text-center">
          <?php if( get_theme_mod('vw_education_lite_sec1_title') != ''){ ?>     
            <h2><?php echo esc_html(get_theme_mod('vw_education_lite_sec1_title','')); ?></h2>
            <img src="<?php echo esc_url(get_theme_mod('vw_education_lite_sec_border',get_template_directory_uri().'/images/title-border.png')); ?>" role="img" alt="Border Image">
          <?php }?>
        </div>
        <div class="row">
          <?php $vw_education_lite_course_page = array();
          for ( $count = 0; $count <= 2; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_education_lite_courses_settings' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_education_lite_course_page[] = $mod;
            }
          }
          if( !empty($vw_education_lite_course_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_education_lite_course_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $count = 0;
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="course-content">
                  <div class="box-image text-center">
                    <?php the_post_thumbnail(); ?>                 
                  </div>
                  <div class="box-content">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                  </div>
                  </div>
                </div>
              <?php $count++; endwhile; 
              wp_reset_postdata();?>
            <?php else : ?>
                <div class="no-postfound"></div>
            <?php endif;
          endif;?>
        </div>
        <div class="clearfix"></div>
      </div> 
    </section>
  <?php }?>

  <?php do_action( 'vw_education_lite_below_course_section' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>