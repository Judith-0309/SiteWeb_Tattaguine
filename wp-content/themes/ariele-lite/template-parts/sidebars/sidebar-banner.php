<?php
/**
 * For displaying banner
 * @package Ariele_Lite
*/

if ( ! is_active_sidebar( 'banner' ) ) {
	return;
}
 
?>
	
<?php if ( is_active_sidebar( 'banner' ) ) : ?>
<div id="banner-sidebar" class="container">
	<div id="banner" class="widget-area row">
		<div class="col-lg-12">
				<?php dynamic_sidebar( 'banner' ); ?>
		</div>
	</div>
</div>

<?php endif; ?>