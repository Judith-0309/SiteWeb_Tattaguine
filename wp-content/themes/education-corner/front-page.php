<?php if ( 'posts' == get_option( 'show_on_front' ) ) {
get_header();
get_template_part('business','slider'); 
get_template_part('business','service'); 
get_template_part('business','portfolio'); 
get_template_part('business','blog'); 
get_template_part('business','member'); 
get_template_part('business','about'); 
get_template_part('business','course'); 
get_template_part('business','client'); 
get_footer();
} else {
    include( get_page_template() );
}
?>