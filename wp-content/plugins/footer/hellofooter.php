<?php
/**
 * @package Hellofooter
 * @version 1.0.0
 */
/*
Plugin Name: Hellofooter
Plugin URI: https://brief10-plugin.com
Description: ma 1er plugin pour une footer
Author: zineb aboumejd
Version: 1.0.0
Author URI:https://brief10-plugin.com
*/

//  
add_action('wp_footer','say_hello');
add_filter('default-content','contenu_par_defaut');

function hello_footer_plugin(){
echo "<h1>hello word ---footer---</h1>";

}


add_shortcode('hello_footer','hello_footer_plugin');
