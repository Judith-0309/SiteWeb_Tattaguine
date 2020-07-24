<?php
/**
 * Template for displaying search forms
 * @package Ariele_Lite
 */
?>

<form role="search" method="get" class="search-form" autocomplete="off" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'ariele-lite' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search and Hit Enter', 'placeholder', 'ariele-lite' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit"><?php echo _x( 'Search', 'submit button', 'ariele-lite' ); ?><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
