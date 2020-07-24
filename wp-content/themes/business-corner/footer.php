<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Business Corner
*/

?>
<!-- Footer Start -->
<footer class="footer">
	<div class="container-fluid bs-footer">
		<div class="container">
			<div class="row bs-margin footer-detail">
			<?php if ( is_active_sidebar( 'business-corner-footer-widget' ) ){
					dynamic_sidebar( 'business-corner-footer-widget' );
					} ?>
			</div>
		</div>
	</div>
	<div class="container-fluid bs-copyright">
		<div class="container">
			<div class="row copyright">
			<?php $credit_text= get_theme_mod( 'business_corner_footer_credit');
			$credit_name= get_theme_mod( 'business_corner_footer_company');
			$credit_link= get_theme_mod( 'business_corner_footer_link');
			if($credit_text!=''){ ?>
				<p><?php echo esc_attr($credit_text); 
				if($credit_name!='' && $credit_link!=''){?> 
				<a href="<?php echo esc_url($credit_link); ?>"><?php echo esc_attr($credit_name); ?></a>
				<?php } ?></p>
			<?php } ?>
			</div>
		</div>
	</div>
</footer>
<!-- Footer End -->
<a href="#" class="scroll-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Wrapper End -->
<?php wp_footer(); ?>
</body>
</html>