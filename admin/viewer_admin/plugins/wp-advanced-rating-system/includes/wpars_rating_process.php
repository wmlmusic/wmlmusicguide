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
header("Cache-Control: no-cache");
header("Pragma: nocache");
require_once dirname( __FILE__ ) . '/wpars_functions.php';

global $wpdb,$post;
if(!isset($wpdb))
{
	$dir = dirname(__FILE__);
	$root_path = explode("wp-content", $dir);
	$root_path = $root_path[0];
    require_once(''.$root_path.'/wp-config.php');
    require_once(''.$root_path.'/wp-includes/wp-db.php');
}
$get_settings = get_option( "kc_wpars_settings" );
$logged_method = $get_settings['logged_method'];
// Cookie settings
if (isset($_POST['wpars_rating']) && $_POST['wpars_rating']) {
	$id = (int)$_POST['id'];
	$scores = (int)$_POST['scores'];
	$custom = $_POST['custom'];
	$expire = time() + 99999999;
	$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
	if ($logged_method == "cookie" ) {
		setcookie('wpars_rated_'.$id,$id,$expire,'/',$domain,false);
	}
	$wpars_raters = get_post_meta($id,'wpars_raters',true);
	$wpars_scores = get_post_meta($id,'wpars_scores',true);
	$wpars_average = get_post_meta($id,'wpars_average',true);
	if (!$wpars_raters || $wpars_raters == '' || !is_numeric($wpars_raters)) {
		update_post_meta($id, 'wpars_raters', 1);
		update_post_meta($id, 'wpars_scores', $scores);
		update_post_meta($id, 'wpars_average', $scores);
	} else {
		if (!$wpars_scores || $wpars_scores == '' || !is_numeric($wpars_scores)) {
			update_post_meta($id, 'wpars_raters', 1);
			update_post_meta($id, 'wpars_scores', $scores);
			update_post_meta($id, 'wpars_average', $scores);
		} else {
			if (!$wpars_average || $wpars_average == '' || !is_numeric($wpars_average)) {
				update_post_meta($id, 'wpars_raters', 1);
				update_post_meta($id, 'wpars_scores', $scores);
				update_post_meta($id, 'wpars_average', $scores);
			} else {
				update_post_meta($id, 'wpars_raters', ($wpars_raters + 1));
				update_post_meta($id, 'wpars_scores', ($wpars_scores + $scores));
				$new_average = round((($wpars_scores + $scores)/($wpars_raters + 1)),3);
				update_post_meta($id, 'wpars_average', $new_average);
			}
		}
	}
	
	$get_value_option = explode("-", $custom);
	$shapes = $get_value_option[0];
	$colors = $get_value_option[1];
	$size = $get_value_option[2];
	$show_text = $get_value_option[3];
	$out_put = wpars_rating_custom($shapes, $colors, $size, $show_text, 2, $id);	
	echo $out_put;
	
}

?>