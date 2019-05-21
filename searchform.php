<?php
/**
 * The template for displaying search form
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package ThemeWPUGPH
 */
?>
    <form class="uk-search uk-search-navbar uk-width-1-1" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input class="uk-search-input" name="s" id="s"  type="search" placeholder="<?php _e( 'Search...', 'themewpugph' ); ?>" autofocus>
    </form>