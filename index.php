<?php
/*
Plugin Name: Shortcode Creator
Plugin URI: https://github.com/satsabbir11/shortcode-creator-plugin
Description: A wordpress shortcode creator plugin
Version: 1.0
Author: satsabbir11
Author URI: https://github.com/satsabbir11
License: GPLv2 or later
Text Domain: shortcode-creator
Domain Path: /languages/
*/

/* LOAD PLUGIN */
function scc_load_textdomain(){
    load_plugin_textdomain('shortcode-creator',false,dirname(__FILE__)."/languages");
}
add_action("plugins_loaded","scc_load_textdomain");

/* LOAD ASSETS */
function scc_assets(){
    wp_enqueue_style('scc-css',plugin_dir_url(__FILE__)."/assets/css/style.css");
}
add_action('wp_enqueue_scripts','scc_assets');

/* LOAD SEARCHBAR SHORTCODE */
function scc_searchbar_shortcode($arguments){
    $defaults   = array(
        'caption'  => 'Search Korona'
    );
    $attributes = shortcode_atts( $defaults, $arguments );


    $form = '
    
    <form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
     <label for="search-form-2">
       <input type="search" class="search-field" placeholder="" value="' . get_search_query() . '" name="s" id="search-form-2" />
     </label>
           <input type="submit" style="color: #ffffff;" class="search-submit" id="searchsubmit" value="'. esc_attr__("{$attributes['caption']}") .'" />
    </form>
    
    ';

    return $form;
}
add_shortcode('scc','scc_searchbar_shortcode');




