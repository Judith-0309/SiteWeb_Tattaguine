<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business Corner
 */

get_header(); 
get_template_part('breadcrumps'); ?>
<!-- Blog Start -->
	<div class="container-fluid bs-margin bs-blogs">
		<div class="container">
			<div class="row bs-blog-page">
				<div class="col-md-8 right-side">
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
								<div class="entry-content clearfix" id="content-<?php the_ID(); ?>">
								<?php the_content();
								business_corner_link_pages(); ?>
								</div>
							</div>
							<?php if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif; ?>
						</div>
					</div>
					<?php endwhile;
					endif; ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!-- Blog End -->
<?php
get_footer();
?>