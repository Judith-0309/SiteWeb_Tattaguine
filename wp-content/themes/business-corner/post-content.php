<div class="row bs-blog wow zoomIn">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog-detail">
			<?php if(has_post_thumbnail()): ?>
				<div class="img-thumbnail">
					<?php $data= array('class' =>'img-responsive post_image'); 
					the_post_thumbnail('business_corner_thumb', $data); ?>
				</div>
			<?php endif; ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<ul class="bs-category-detail">
			<?php if(get_the_category_list() != '') { ?>
				<li class="bs-category"><i class="fa fa-folder-open"></i> <?php the_category(','); ?> </li>
			<?php }if(get_the_tag_list()) { 
				echo get_the_tag_list('<li class="bs-tags"><i class="fa fa-tags"></i>',', ','</li>');
			} ?>
			</ul>
			<?php the_excerpt();
			if(get_post_type( get_the_ID()) !=='page'){ ?>
			<ul class="bs-author-detail">
				<li class="bs-author">
					<i class="fa fa-user"></i>
					<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a>
				</li>
				<li class="bs-date">
					<a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'))); ?>"><i class="fa fa-calendar"></i><?php the_time( get_option( 'date_format' ) ); ?></a>
				</li>
			</ul>
			<?php } ?>
		</div>
	</div>
</div>
