<?php 
// code for comment
function business_corner_comment( $comment, $args, $depth ) 
{
	//$GLOBALS['comment'] = $comment;
	//get theme data
	global $comment_data;
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	__('Reply','business-corner'); ?>
    <div class="col-xs-12 comment-detail">
			<a class="col-xs-2 comments-pics">
            <?php echo get_avatar($comment,$size = '80'); ?>
            </a>
           <div class="col-xs-10 comments-text">
				<h3><?php comment_author();?>
				<span>
				<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>				
				<?php comment_date('F j, Y');?>
				<?php else : ?>
				<?php comment_date(); ?>
				<?php endif; ?>
				<?php esc_html_e('at','business-corner');?>&nbsp;<?php comment_time('g:i a'); ?></span></h4>
				<?php comment_text(); 
				comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'business-corner' ); ?></em>
				<br/>
				<?php endif; ?>
			</div>
<?php
} ?>