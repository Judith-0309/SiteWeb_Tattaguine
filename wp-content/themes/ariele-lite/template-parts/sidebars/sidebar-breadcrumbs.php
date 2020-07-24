<?php
/**
 * For displaying breadcrumbs
 * @package Ariele_Lite
*/

if ( ! is_active_sidebar( 'breadcrumbs' ) ) {
	return;
}

?>


		<div id="breadcrumbs-sidebar">	

				<div id="breadcrumbs">
					<?php dynamic_sidebar( 'breadcrumbs' ); ?>
				</div>
		
		</div>
