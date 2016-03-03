<?php 
/* 
Plugin Name: Wordpress Advanced Rating System
Plugin URI: http://kuncode.com
Description: This plugin will add rating system to wordpress with custom rating size, custom colors, custom shapes and widget rating statistics. Plugin support for all custom post type.
Version: 1.0 
Author: Mr. Kun
Author URI: http://veerkun.com 
License: GPL  
*/ 
?>
<?php
/*---------------------------------------------*\
|   Project: Wordpress Advanced Rating System   |
|     This code were developed by: Mr. Kun 		|
|         Homepage: http://kuncode.com		    |
|      _ +-----------------------------+ _	    |
|     /o)|        Coder: Mr. Kun       |(o\	    |
|    / / |   Web: http://kuncode.com   | \ \	|
|   ( (_ |   Blog: http://veerkun.com  | _) )   |
|  ((\ \)+-/o)---------------------(o\-+(/ /))  |
|  (\\\ \_/ /                       \ \_/ ///)  |
|   \      /                         \      /   |
|    \____/                           \____/    |
\*---------------------------------------------*/
?>
<?php

//(WPARS) Wordpress Advanced Rating System 
define ("WPARS_NAME", "Wordpress Advanced Rating System");
define ("WPARS_VERSION", "1.0");
define ("WPARS_FOLDER","wp-advanced-rating-system");
define ("WPARS_URL", "".plugins_url()."/". WPARS_FOLDER ."/");  
require_once dirname( __FILE__ ) . '/includes/wpars_functions.php';
require_once dirname( __FILE__ ) . '/includes/wpars_settings.php';
require_once dirname( __FILE__ ) . '/includes/wpars_settings_functions.php';
require_once dirname( __FILE__ ) . '/includes/wpars_widgets.php';

### Create Text Domain For Translations
add_action('init', 'wpars_textdomain');
function wpars_textdomain() {
	load_plugin_textdomain('wpars', false, dirname( plugin_basename( __FILE__ ) ));
	//load_plugin_textdomain('wpars', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
}

### Add JS and CSS
add_action( 'wp_enqueue_scripts', 'kc_wpars_enqueuer' );
function kc_wpars_enqueuer() {
	global $shape_default, $color_default;
   wp_register_script( 'wpars-script', WPARS_URL.'js/rating.js', array(),'1.0' );
   wp_register_style( 'wpars-style', WPARS_URL.'css/rating.css', array(),'1.0' );   
   wp_localize_script( 'wpars-script', 'wpars', array( 
   'url' => WPARS_URL ,
   'default_shape' => $shape_default ,
   'default_color' => $color_default ,
   ));
   wp_enqueue_script( 'wpars-script' );
   wp_enqueue_style( 'wpars-style' );  
}

### Add New Setting Menu
add_action('admin_menu', 'f_kc_wpars_admin_menu');
	function f_kc_wpars_admin_menu() {
		$settings_page = add_menu_page('Wordpress Advanced Rating System', 'WP Advanced Rating Settings', 'edit_pages', 'kc-wpars-settings', 'kc_wpars_settings',plugins_url('wp-advanced-rating-system/img/wpars_icon.png'));
		add_action( "load-{$settings_page}", 'kc_wpars_load_settings_page' );
	}
	
### Add admin Header
add_action('admin_head', 'kc_wpars_admin_header');
function kc_wpars_admin_header() {
	wp_register_script( 'wpars-admin-script', WPARS_URL.'js/rating_admin.js', array(),'1.0' );
    wp_register_style( 'wpars-admin-style', WPARS_URL.'css/rating_admin.css', array(),'1.0' ); 
	wp_enqueue_script( 'wpars-admin-script' );
	wp_enqueue_style( 'wpars-admin-style' );  
	//wp_localize_script( 'wpars-admin-script', 'wpars_admin', array( 'url' => WPARS_URL ));
	//echo "<script type=\"text/javascript\" src=\"". WPARS_URL. "js/rating_admin.js\"></script>\n";
	//echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"". WPARS_URL. "css/rating_admin.css\" />\n";
}

?>