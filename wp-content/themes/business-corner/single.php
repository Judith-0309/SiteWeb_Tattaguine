<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Business Corner
 */

get_header(); 
get_template_part('breadcrumps');
$sidebar_position = get_theme_mod( 'business_corner_post_layout','right'); ?>
<!-- Blog Start -->
	<div class="container-fluid bs-margin bs-blogs">
		<div class="container">
			<div class="row bs-blog-page">
			<?php if($sidebar_position=='left'){
				get_sidebar();
			} ?>
				<div class="<?php if($sidebar_position=='full'){ echo 'col-md-12'; }else{ echo 'col-md-8'; } ?> right-side">
				<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>
					<div class="row bs-blog">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="blog-detail">
								<?php if(has_post_thumbnail()): ?>
									<div class="img-thumbnail">
										<?php $data= array('class' =>'img-responsive post_image'); 
										the_post_thumbnail('business_corner_thumb', $data); ?>
									</div>
								<?php endif; ?>
								<h2 class="entry-title"><?php the_title(); ?></h2>
								<ul class="bs-category-detail">
								<?php if(get_the_category_list() != '') { ?>
									<li class="bs-category"><i class="fa fa-folder-open"></i> <?php the_category(','); ?> </li>
								<?php }if(get_the_tag_list()) { 
									echo get_the_tag_list('<li class="bs-tags"><i class="fa fa-tags"></i>',' ','</li>');
								} ?>
								</ul>
								<ul class="bs-author-detail">
									<li class="bs-author">
										<i class="fa fa-user"></i>
										<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a>
									</li>
									<li class="bs-date">
										<a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'))); ?>"><i class="fa fa-calendar"></i><?php the_time( get_option( 'date_format' ) ); ?></a>
									</li>
								</ul>
								<div class="entry-content clearfix" id="content-<?php the_ID(); ?>">
								<?php the_content();
								business_corner_link_pages(); ?>
								</div>
								<?php business_corner_post_link(); ?>
							</div>
							<?php if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif; ?>
						</div>
					</div>
					<?php endwhile;
					endif; ?>
				</div>
				<?php if($sidebar_position=='right'){
				get_sidebar();
			} ?>
			</div>
		</div>
	</div>
	<!-- Blog End -->
<?php
get_footer();
?>