<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @package Ariele_Lite
 */

?>

<div id="bottom-sidebars">
    <?php get_template_part( 'template-parts/sidebars/sidebar', 'bottom' ); ?>
</div>

</div><!-- #content -->

<div id="footer-sidebars">
    <?php get_template_part( 'template-parts/sidebars/sidebar', 'footer' ); ?>
</div>

<footer id="site-footer">
    <div class="container site-info">
        <div class="row no-gutters align-items-center">
            <div class="col-lg-6 copyright">


                <?php get_template_part( 'template-parts/navigation/nav', 'footer' ); ?>

                <?php esc_html_e('Copyright &copy;', 'ariele-lite'); ?>
                <?php echo date_i18n( __( 'Y', 'ariele-lite' ) ); // WPCS: XSS OK ?>
                <span id="copyright-name"><?php echo esc_html(get_theme_mod( 'ariele_lite_copyright') ); ?></span>. <?php esc_html_e('All rights reserved.', 'ariele-lite'); ?>
            </div>

            <div class="col-lg-6 footer-social">
                <?php get_template_part( 'template-parts/navigation/nav', 'social' ); ?>
            </div>

        </div>
    </div>
</footer>

<div id="scroll-to-top">
    <a title="Scroll to top" id="scroll-to-top-arrow" href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
</div>

<div id="curtain" class="tranz">
    <?php get_search_form(); ?>
    <a class="curtainclose" href="#"><i class="fa fa-times" aria-hidden="true"></i> <?php esc_html_e('Close', 'ariele-lite'); ?></a>
</div>

</div>

<?php wp_footer(); ?>

</body>

</html>
