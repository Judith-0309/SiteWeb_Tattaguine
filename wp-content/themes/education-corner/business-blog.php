<?php 
/**
 * Template part for displaying blog.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business Corner
 */
	$blog_display = get_theme_mod( 'business_corner_display_blog_setting', 1);
	//query posts
	$blog_args =	array(
		'offset'           => 0,
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

	$blog_posts = new WP_Query( $blog_args );
	if($blog_display == 1){ 
	if($blog_posts->have_posts()) :
	$blog_count= 0; ?> 
<!-- Blog Start -->
<div class="container-fluid bs-margin bs-blogs">
	<div class="container">
		<div class="row bs-heading-section">
			<?php if(get_theme_mod( 'business_corner_heading_blog')!=''){ ?>
			<h1 class="bs-heading-title"><span class="bs-title"><?php echo esc_attr(get_theme_mod( 'business_corner_heading_blog')); ?></span></h1>
			<?php if(get_theme_mod( 'business_corner_desc_blog')!=''){ ?>
			<p class="bs-heading-desc"><?php echo esc_attr(get_theme_mod( 'business_corner_desc_blog')); ?></p>
		<?php } } ?>
		</div>
		<div class="row bs-home-blog">
            <div id="bc-masonry">
                <div class="swiper-container home-blog">
        			<div class="swiper-wrapper">
            		    <?php while($blog_posts->have_posts()) : 
            			$blog_posts->the_post();
            			$blog_count++; ?>
            			<div class="swiper-slide">
                            <div class="row bs-blog">
                				<div class="blog-detail">
                				<?php if ( has_post_thumbnail() ) { ?>
                					<div class="img-thumbnail">
                						<?php the_post_thumbnail( 'business_corner_general', array( 'class' => 'img-responsive' ) ); ?>
                					</div>
                				<?php } ?>
                					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                					<?php the_excerpt(); ?>
                					<ul class="bs-author-detail">
                						<li class="bs-author">
                							<i class="fa fa-user"></i>
                							<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a>
                						</li>
                						<li class="bs-date">
                							<a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'))); ?>"><i class="fa fa-calendar"></i><?php the_time( get_option( 'date_format' ) ); ?></a>
                						</li>
                					</ul>
                				</div>
                			</div>
            			</div>
                    <?php 
        			endwhile; ?>
        			</div>
        		</div>
            </div>
		</div>
	</div>
</div>
<!-- Blog End -->
<?php endif;
wp_reset_postdata();
	} ?>