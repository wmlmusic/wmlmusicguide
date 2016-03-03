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
global $wpdb,$post;
if(!isset($wpdb))
{
	$dir = dirname(__FILE__);
	$root_path = explode("wp-content", $dir);
	$root_path = $root_path[0];
    require_once(''.$root_path.'/wp-config.php');
    require_once(''.$root_path.'/wp-includes/wp-db.php');
}
$get_settings = get_option("kc_wpars_settings");
$template_no_rate = $get_settings['template_no_rate'];
$template_rate = $get_settings['template_rate'];
$template_rated = $get_settings['template_rated'];
$template_rate_disable = $get_settings['template_rate_disable'];
$template_rate_not_allow = $get_settings['template_rate_not_allow'];
$template_rate_only_text = $get_settings['template_rate_only_text'];
$template_widget_rate_average = $get_settings['template_widget_rate_average'];
$template_widget_total_raters = $get_settings['template_widget_total_raters'];
$template_widget_total_scores = $get_settings['template_widget_total_scores'];
$template_widget_normal = $get_settings['template_widget_normal'];
$auto_display_rating = $get_settings['auto_display_rating'];
$rating_position = $get_settings['rating_position']; 
$max_rates = $get_settings['max_rates']; 
$size_default = $get_settings['size_default'];
$shape_default = $get_settings['shape_default'];
$color_default = $get_settings['color_default'];
$logged_method = $get_settings['logged_method'];
$allow_rate_method = $get_settings['allow_rate_method'];
$img_path =  WPARS_URL ."images/".$shape_default."/".$color_default;	
		

######### Auto add rating to single post #########
if ($auto_display_rating == "yes" ) {
	add_action('the_content', 'wpars_rating_to_content');
}
function wpars_rating_to_content($content) {
	global $rating_position;
	$output = '';
	if (!is_feed()) {
		if($rating_position == "bellow" ) {
			$output .= $content;
			$output .= wpars_rating();
		} else {
			$output .= wpars_rating();
			$output .= $content;
		}
	}
	return $output;
}

######### Add Rating Custom Fields #########
add_action('publish_post', 'wpars_add_ratings_fields');
add_action('publish_page', 'wpars_add_ratings_fields');
function wpars_add_ratings_fields($post_ID) {
	global $wpdb;
	if(!wp_is_post_revision($post_ID)) {
		add_post_meta($post_ID, 'wpars_raters', 0, true);
		add_post_meta($post_ID, 'wpars_scores', 0, true);
		add_post_meta($post_ID, 'wpars_average', 0, true);
	}
}

######### Delete Rating Custom Fields #########
add_action('delete_post', 'wpars_delete_ratings_fields');
function wpars_delete_ratings_fields($post_ID) {
	global $wpdb;
	if(!wp_is_post_revision($post_ID)) { 
		delete_post_meta($post_ID, 'wpars_raters');
		delete_post_meta($post_ID, 'wpars_scores');
		delete_post_meta($post_ID, 'wpars_average');	
	}
}

######### Get thumbnail #########
function wpars_get_thumbnail($post_id) {
	global $wpdb, $post;
	$output = '';
	if (function_exists('the_post_thumbnail') && current_theme_supports("post-thumbnails") && has_post_thumbnail($post_id)) {
		$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full');
		$output = $thumbnail_url[0]; // 0 return URL
	} else { // Auto get first image for thumb
		ob_start();
		ob_end_clean();
		$content = apply_filters('the_content', get_post_field('post_content', $post_id));
		if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches)) {
			$output = $matches[1][0]; // Imgage first
		} else {
			$output = '';
		}
	}
	return $output; //URL or ''
}

######### Extract ARRAY array(1,2,3,4) ==> string '1','2','3','4' #########
function wpars_extract_array_2_string($arr) {
	$out_put = '';
	for ($i = 0; $i < count($arr); $i++ ) {
		if ($i == (count($arr) - 1)) {
		$out_put .= "'".$arr[$i]."'";
		} else {
		$out_put .= "'".$arr[$i]."',";
		}
	}
	return $out_put;
}

######### Trim string #########
function trim_string($string, $length = 25) {
	if (strlen($string) > $length) {
		return substr($string,0,$length).'...';
	} else {
		return $string;
	}	
}

######### Get random value from array #########
function wpars_random_array($array){
	$key = rand(0, (count($array) - 1));
	$output = $array[$key];
	return $output;
}

######### Check post status #########
function wpars_check_post($post_id){
	global $wpdb, $post;
	$out_put = '';
	$post_status = get_post_status($post_id);
	if (!$post_status){
		$out_put = "Post id = ".$post_id." does not exist.";
	} else {
		if ($post_status == "publish"){
			$out_put = "publish";
		} else {
			$out_put = "Post id = ".$post_id." don't Publish.";
		}
	} 
	return $out_put;
}

######### Get rating info from post ID #########
function wpars_get_rating_info($post_id = null) {
	if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
	global $wpdb,$post,$max_rates;
	$wpars_raters = get_post_meta($post_id,'wpars_raters',true);
	$wpars_scores = get_post_meta($post_id,'wpars_scores',true);
	$wpars_average = get_post_meta($post_id,'wpars_average',true);
	$out_put = array();
	if (!$wpars_scores || $wpars_scores == '' || !is_numeric($wpars_scores) || !$wpars_raters || $wpars_raters == '' || $wpars_raters == 0 || !is_numeric($wpars_raters) || !$wpars_average || $wpars_average == '' || !is_numeric($wpars_average) ) {
		$out_put['raters'] = 0;
		$out_put['scores'] = 0;
		$out_put['average'] = 0;
		$out_put['percent'] = 0;
	} else {
		$out_put['raters'] = $wpars_raters;
		$out_put['scores'] = $wpars_scores;
		$out_put['average'] = number_format_i18n(round($wpars_average, 2),2);
		if($max_rates == 5){
			$rating_per = ($out_put['scores'] / $out_put['raters']) * 20;
		} else if($max_rates == 10){
			$rating_per = ($out_put['scores'] / $out_put['raters']) * 10;
		} 
		$out_put['percent'] = round($rating_per, 2);
	}
	$out_put['max_rates'] = $max_rates;
	return($out_put);
}

######### Save image array star by average from post id #########
function wpars_save_array_stars($post_id = null) {
	if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
	$get_rating_info = wpars_get_rating_info($post_id);
	$average = number_format_i18n(round($get_rating_info['average'], 1),1);
	$num = explode(".", $average);
	$array_stars = array();
	for ( $i=1; $i <= $num[0]; $i++) {
		$array_stars[$i] = "full";
	}
	if(!$num[1]){ $num[1] = "none"; } 
	$array_stars[$num[0] + 1] = $num[1];
	for ( $i= $num[0] + 2; $i <= 10; $i++) {
		$array_stars[$i] = "none";
	}
	return($array_stars);
}

######### Replace rating template tag by value #########
function wpars_rating_text_replace($post_id, $rate_text){
	global $template_no_rate;
	$out_put = '';
	$get_rating_info = wpars_get_rating_info($post_id);
	//$rate_text = stripslashes($rate_text);
	if ($get_rating_info['raters'] == 0 ){
		$out_put .= $template_no_rate;
	} else {
		$rate_text = str_replace("{total_raters}", $get_rating_info['raters'], $rate_text);
		$rate_text = str_replace("{rate_average}", $get_rating_info['average'], $rate_text);
		$rate_text = str_replace("{max_rates}", $get_rating_info['max_rates'], $rate_text);
		$rate_text = str_replace("{rate_percent}", $get_rating_info['percent'], $rate_text);
		$rate_text = str_replace("{total_scores}", $get_rating_info['scores'], $rate_text);
		$out_put .= $rate_text;
	}
	return $out_put;
}
######### Rating text out #########
function wpars_rating_text_out($post_id = null, $template = null){
	global $wpdb,$post;
	global $template_no_rate, $template_rate, $template_rated, $template_rate_disable, $template_rate_not_allow, $template_rate_only_text;
	global $max_rates;
	$rate_text = ''; $out_put = '';
		switch($template) {
			case "no_rate":
				$rate_text = $template_no_rate;
				break;
			case "rate":
				$rate_text = $template_rate;
				break;
			case "rated":
				$rate_text = $template_rated;
				break;
			case "rate_disable":
				$rate_text = $template_rate_disable;
				break;
			case "rate_not_allow":
				$rate_text = $template_rate_not_allow;
			break;
			case "rate_only_text":
				$rate_text = $template_rate_only_text;
			break;
			default:
				$rate_text = $template_rate_only_text;
		}
	if(is_null($post_id) || $post_id == 0) {
		$post_id = get_the_ID();
	} 
	$post_status = get_post_status($post_id);
	if($post_status){
		if($post_status == "publish") {
			//$out_put .= '<span id="rate_text_'.$post_id.'" class="wpars_rating_text">'.wpars_rating_text_replace($post_id, $rate_text).'</span>';
			$out_put .= wpars_rating_text_replace($post_id, $rate_text);
		} else {
			$out_put .= "Post id = ".$post_id." don't Publish";
		} // end if publish
	} else {
		$out_put .= "Post id = ".$post_id." don't exist";
	} // end $post_status
	return $out_put;
}
####### Google rich snippets search result support #########
function wpars_google_rich_snippets($post_id) {
	global $wpdb, $post;
	$out_put = '';
	$rating_info = wpars_get_rating_info($post_id);
		if($rating_info['average'] > 0) {
			$post_info = get_post( $post_id );
			$excerpt = $post_info->post_excerpt;
			$content = $post_info->post_content;
			//if(!isset($excerpt) {
			if(empty($excerpt)) {
				$post_description = trim_string(strip_tags($content), 160);
			} else {
				$post_description = $excerpt;
			}
			//}
			$out_put .= '<div style="display: none;" itemscope itemtype="http://schema.org/Product">
			<meta itemprop="name" content="'.get_the_title($post_id).'">
			<meta itemprop="description" content="'.$post_description.'">
			<meta itemprop="url" content="'.get_permalink($post_id).'">
			<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
			<meta itemprop="bestRating" content="5"><meta itemprop="ratingValue" content="'.$rating_info['average'].'">
			<meta itemprop="ratingCount" content="'.$rating_info['raters'].'">
			</div>
			</div>';
		}
	return $out_put;
}

######### Custom rating #########
function wpars_rating_custom($shapes = "random", $colors  = "random" , $size = 0, $show_text = 1, $status = 1, $post_id = null){ 
/*********
$status = 0: disable, $status = 1: Enable,  $status = 2: Rated 
$show_text = 1 : show text; $show_text = 0 : don't show text
*********/
	global $wpdb, $post, $user_ID;
	global $max_rates, $size_default, $shape_default, $color_default, $logged_method, $allow_rate_method,$img_path;
	$out_put = '';  $rating_out = ''; $rating_in = '';
	$shapes_list = array("butterfly", "circle", "circle2", "heart", "music", "smile", "square", "star");
	$colors_list = array("blue", "brown", "green", "magenta", "olive", "orange", "pink", "purple", "red", "yellow");
	if ($shapes == "random") {
		$shapes_choose = wpars_random_array($shapes_list);
	} else if ($shapes == "0"){
		$shapes_choose = $shape_default; 
	} else {
		if (in_array ($shapes,$shapes_list)){
			$shapes_choose = $shapes;	
		} else {
			$shapes_choose = $shape_default; // default choose
		}
	}
	if ($colors == "random") {
		$colors_choose = wpars_random_array($colors_list);
	} else if ($colors == "0"){
		$colors_choose = $color_default;
	} else {
		if (in_array ($colors,$colors_list)){
			$colors_choose = $colors;
		} else {
			$colors_choose = $color_default;
		}
	}
	$img_path_custom =  WPARS_URL ."images/".$shapes_choose."/".$colors_choose;
	if ($size == 0 || is_null($size)){ $shape_size = $size_default; } else { $shape_size = $size; }
	if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
	if ($allow_rate_method == "all") { $allow_rate = true ;}
	else if ($allow_rate_method == "onlyuser") { 
		$user_ID = intval($user_ID);
		if($user_ID > 0) { $allow_rate = true; } else { $allow_rate = false ; }
	}
	$check_post = wpars_check_post($post_id);
	if ($check_post == "publish") {
		$array_stars = wpars_save_array_stars($post_id);
		for ( $i=1; $i <= $max_rates; $i++) {
			if($shapes == $shape_default && $colors == $color_default) {
				$rating_out .= '<img id="wpars_shapes_'.$post_id.'_'.$i.'" src="'.$img_path_custom.'/'.$array_stars[$i].'.png" width="'.$shape_size.'px">';	
				$rating_in	.= "<a href=\"javascript:void(0)\" onClick=\"return rating('".$post_id."','".$i."','".$shapes_choose."-".$colors_choose."-".$shape_size."-".$show_text."');\" onMouseOver=\"default_show_star(".$i.",".$post_id.",".$max_rates.");\" onMouseOut=\"default_restore_star(".$i.",".$post_id.",".$max_rates.");\" title=\"".$i." of ".$max_rates."\"><img id=\"wpars_shapes_".$post_id."_".$i."\" src=\"".$img_path_custom."/".$array_stars[$i].".png\" width=\"".$shape_size."px\"></a>";
				//$rating_out .= '<img id="wpars_shapes_'.$post_id.'_'.$i.'" src="'.$img_path_custom.'/'.$array_stars[$i].'.png" width="'.$shape_size.'px" alt="'.WPARS_NAME.' image '.$i.'">';	
				//$rating_in	.= "<a href=\"javascript:void(0)\" onClick=\"return rating('".$post_id."','".$i."','".$shapes_choose."-".$colors_choose."-".$shape_size."-".$show_text."','3');\" onMouseOver=\"default_show_star(".$i.",".$post_id.",".$max_rates.");\" onMouseOut=\"default_restore_star(".$i.",".$post_id.",".$max_rates.");\" title=\"".$i." of ".$max_rates."\"><img id=\"wpars_shapes_".$post_id."_".$i."\" src=\"".$img_path_custom."/".$array_stars[$i].".png\" width=\"".$shape_size."px\" alt=\"".WPARS_NAME." image ".$i."\"></a>";
				
			} else {
			$rating_out .= '<img id="wpars_shapes_'.$post_id.'_'.$i.'" src="'.$img_path_custom.'/'.$array_stars[$i].'.png" width="'.$shape_size.'px">';	
			$rating_in	.= "<a href=\"javascript:void(0)\" onClick=\"return rating('".$post_id."','".$i."','".$shapes_choose."-".$colors_choose."-".$shape_size."-".$show_text."');\" onMouseOver=\"custom_show_star(".$i.",".$post_id.",'".$shapes_choose."','".$colors_choose."',".$max_rates.");\" onMouseOut=\"custom_restore_star(".$i.",".$post_id.",".$max_rates.");\" title=\"".$i." of ".$max_rates."\"><img id=\"wpars_shapes_".$post_id."_".$i."\" src=\"".$img_path_custom."/".$array_stars[$i].".png\" width=\"".$shape_size."px\"></a>";
			}
			/*$rating_out .= '<img id="wpars_shapes_'.$post_id.'_'.$i.'" src="'.$img_path_custom.'/'.$array_stars[$i].'.png" width="'.$shape_size.'px">';	
			$rating_in	.= "<a href=\"javascript:void(0)\" onClick=\"return rating('".$post_id."','".$i."','".$shapes_choose."-".$colors_choose."-".$shape_size."-".$show_text."','3');\" onMouseOver=\"show_star(".$i.",".$post_id.",".$max_rates.");\" onMouseOut=\"restore_star(".$i.",".$post_id.",".$max_rates.");\" title=\"".$i." of ".$max_rates."\"><img id=\"wpars_shapes_".$post_id."_".$i."\" src=\"".$img_path_custom."/".$array_stars[$i].".png\" width=\"".$shape_size."px\"></a>";
			*/
		}
		if ( $status == 2 ) { $out_put .= '';}  // don't show div tag
		else { $out_put .= '<div class="wpars_rating" id="wpars_rating_'.$post_id.'">'; }
		if($status == 2 || isset($_COOKIE['wpars_rated_'.$post_id]) ) { //rated
			$out_put .= '<span id="rated_img_'.$post_id.'" class="wpars_rating_img">';
			$out_put .= $rating_out;
			$out_put .= '</span>';
			if ($show_text == 1 ) {
				$out_put .= '<span id="rate_text_'.$post_id.'" class="wpars_rating_text">'.wpars_rating_text_out($post_id, 'rated').'</span>';
			}
		} else if($status == 0) { //rating disable
			$out_put .= '<span id="rating_disable_img_'.$post_id.'" class="wpars_rating_img">';
			$out_put .= $rating_out;
			$out_put .= '</span>';
			if ($show_text == 1 ) {
				$out_put .= '<span id="rate_text_'.$post_id.'" class="wpars_rating_text">'.wpars_rating_text_out($post_id, 'rate_disable').'</span>';
			}
		} else { 
			if (!$allow_rate){
				$out_put .= '<span id="rating_not_allow_img_'.$post_id.'" class="wpars_rating_img">';
				$out_put .= $rating_out;
				$out_put .= '</span>';
				if ($show_text == 1 ) {
				$out_put .= '<span id="rate_text_'.$post_id.'" class="wpars_rating_text">'.wpars_rating_text_out($post_id, 'rate_not_allow').'</span>';
				}
			} else {
				$out_put .= '<span id="rating_img_'.$post_id.'" class="wpars_rating_img">';
				$out_put .= $rating_in;
				$out_put .= '</span>';
				if ($show_text == 1 ) {
				$out_put .= '<span id="rate_text_'.$post_id.'" class="wpars_rating_text">'.wpars_rating_text_out($post_id, 'rate').'</span>';
				}
			}
		}
		if(is_single() || is_page()) {
			$out_put .= wpars_google_rich_snippets($post_id);	
		}
		if ( $status == 2 ) {
			$out_put .= '';
		} else { 
			$out_put .= '</div>';
		}
	} else { $out_put = $check_post; }
	return $out_put;
}

######### Default rating #########
function wpars_rating($status = 1, $size = null, $post_id = null) {
	global $wpdb, $post;
	global $size_default, $shape_default, $color_default;
	$show_text = 1;
	$out_put = '';
	if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
	if (is_null($size) || $size == 0) { $size_choose = $size_default; } else { $size_choose = $size; }
	$out_put .= wpars_rating_custom($shape_default, $color_default, $size_choose, $show_text, $status, $post_id);
	return $out_put;
}

######### Show only rating image #########
function wpars_rating_img($status = 1, $size = null, $post_id = null) {
	global $wpdb, $post;
	global $size_default, $shape_default, $color_default;
	$out_put = '';
	if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
	if (is_null($size) || $size == 0) { $size_choose = $size_default; } else { $size_choose = $size; }
	$out_put .= wpars_rating_custom($shape_default,$color_default,$size_choose, 0, $status, $post_id);
	return $out_put;
}
######### Show only rating text #########
function wpars_rating_text($post_id = null,$template = null) {
	global $wpdb,$post;
	global $template_rate_only_text;
	$out_put = '';
	if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
	if (is_null($template) || $template == 0) { $template = $template_rate_only_text; }
	$out_put .= '<span id="rate_text_'.$post_id.'" class="wpars_rating_text">';
	$out_put .= wpars_rating_text_out($post_id, $template_rate_only_text );
	$out_put .= '</span>';
	return $out_put;
}

######### WPARS Get Rating Data #########
function wpars_get_rating($data = null, $post_id = null) {
	global $wpdb, $post;
	$out_put = '';
	if(is_null($post_id)) { $post_id = get_the_ID();}
	$data_array = array('average','raters', 'scores','percent','max_rates');
	if( in_array($data,$data_array) ) {
		$rating_info = wpars_get_rating_info($post_id);
		$out_put = $rating_info[$data]; 
	} else { 
		$out_put = "<strong>Error parameters</strong>";
	}
	return $out_put;
}

/*#####################*\
|*** WIDGET FUNCTION ***|
\*#####################*/

#########  Display rating image widget by average from post id ######### 
function wpars_display_rating_img_widget($post_id, $size) {
	global $max_rates, $size_default,$img_path;
	$out_put = '';
	if ($size == 0 || is_null($size)){ $shape_size = $size_default; } else { $shape_size = $size; }
	if (is_null($post_id) || $post_id == 0) { $post_id = get_the_ID(); }
	//$rating_info = wpars_get_rating_info($post_id);
	$array_stars = wpars_save_array_stars($post_id);
	$rating_out = '';
	for ( $i=1; $i <= $max_rates; $i++) {
		$rating_out .= '<img id="wpars_widget_shapes_'.$post_id.'_'.$i.'" src="'.$img_path.'/'.$array_stars[$i].'.png" width="'.$shape_size.'px">';
		//$rating_out .= '<img id="wpars_widget_shapes_'.$post_id.'_'.$i.'" src="'.$img_path.'/'.$array_stars[$i].'.png" width="'.$shape_size.'px" alt="'.WPARS_NAME.'">';	
	}
	$out_put .= $rating_out;
	return $out_put;
}

#########  Replace rating Widget template tag by value ######### 
function wpars_rating_widget_replace($post_id, $widget_template, $title_chars = 0, $rating_size = 5){
	global $wpdb;
	$out_put = '';
	$get_rating_info = wpars_get_rating_info($post_id);
	$post_title = get_the_title($post_id); 
	if ($title_chars > 0) {
		$post_title_trim = ucfirst(strtolower(trim_string($post_title, $title_chars)));
	} else {
		$post_title_trim = ucfirst(strtolower($post_title));
	}
	$post_url = get_permalink($post_id);
	$rating_img = wpars_display_rating_img_widget($post_id, $rating_size);
	$widget_template = stripslashes($widget_template);
	$widget_template = str_replace("{total_raters}", $get_rating_info['raters'], $widget_template);
	$widget_template = str_replace("{rate_average}", $get_rating_info['average'], $widget_template);
	$widget_template = str_replace("{max_rates}", $get_rating_info['max_rates'], $widget_template);
	$widget_template = str_replace("{rate_percent}", $get_rating_info['percent'], $widget_template);
	$widget_template = str_replace("{total_scores}", $get_rating_info['scores'], $widget_template);
	$widget_template = str_replace("{post_title}", $post_title, $widget_template);
	$widget_template = str_replace("{post_title_trim}", $post_title_trim, $widget_template);
	$widget_template = str_replace("{post_url}", $post_url, $widget_template);
	$widget_template = str_replace("{rating_img}", $rating_img, $widget_template);
	$out_put .= $widget_template;
	return $out_put;
}
#########  WPARS statistics ######### 
function wpars_statistics_widget($args = null) {
	global $wpdb;
	global $template_widget_rate_average, $template_widget_total_raters, $template_widget_total_scores, $template_widget_normal;
	if (is_null($args)){ 
		$args = array (
			'post_type'  => 'post',
			'terms_id'  => null,
			'order_by' => 'wpars_average', // // wpars_scores , wpars_average , wpars_raters ,wpars_post_ID ,wpars_post_title, wpars_post_date, wpars_comment_count, wpars_rand
			'order' => 'DESC',
			'number_posts' => '5',
			'show_num_list' => 'no',
			'title_chars' => 0,
			'rating_min_rate' => 0,
			'rating_img_size' => 10,
			'thumb_show' => 'no',
			'thumb_w' => 50,
			'thumb_h' => 50,
		);
	}
	extract($args); // extract array to $key = value
	if ($order_by == "wpars_rand" ) {
		$order_by_sql = "ORDER BY RAND()";
	} else {
		$order_by_sql = "ORDER BY ".$order_by." ".$order; 
	}
	$limit_sql = "LIMIT " .$number_posts;
	$template_widget = '';
	switch ($order_by) {
		case "wpars_average":
			$template_widget = $template_widget_rate_average;
			break;
		case "wpars_raters":
			$template_widget = $template_widget_total_raters;
			break;
		case "wpars_scores":
			$template_widget = $template_widget_total_scores;
			break;
		default:
			$template_widget = $template_widget_normal;
			
	}
	if($template_widget == '') {$template_widget = '<a href="{post_url}" title="{post_title}">{post_title_trim}</a> {rating_img} ({rate_average} out of {max_rates})'; }
	if(!is_null($terms_id)) {
		if(is_array($terms_id)) {
			//$term_id_join = wpars_extract_array_2_string($terms_id);
			$term_id_implode = implode(", ", $terms_id);
			$term_id_sql = "AND $wpdb->term_taxonomy.term_id IN (".$term_id_implode.")";
		} else {
			$term_id_sql = "AND $wpdb->term_taxonomy.term_id = $terms_id";
		}
	} else {
		$term_id_sql = '';//$term_id_sql = 'AND 1=1';
	}
	$check_p_type = get_post_type_object($post_type);
	if( $check_p_type->capability_type == "post" ) { //Post_type as post, has terms	
	// $order_by, // wpars_scores, wpars_average, wpars_raters, wpars_ID, wpars_post_title, wpars_post_date, wpars_comment_count 
		$query_sql = "SELECT DISTINCT $wpdb->posts.ID, 
					$wpdb->posts.ID AS wpars_post_ID, 
					$wpdb->posts.post_title AS wpars_post_title, 
					$wpdb->posts.post_date AS wpars_post_date, 
					$wpdb->posts.comment_count AS wpars_comment_count,
					(t1.meta_value+0.00) AS wpars_average, 
					(t2.meta_value+0.00) AS wpars_raters, 
					(t3.meta_value+0.00) AS wpars_scores 
					FROM $wpdb->posts
					LEFT JOIN $wpdb->postmeta AS t1 ON t1.post_id = $wpdb->posts.ID 
					LEFT JOIN $wpdb->postmeta AS t2 ON t1.post_id = t2.post_id 
					LEFT JOIN $wpdb->postmeta AS t3 ON t3.post_id = $wpdb->posts.ID 
					INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) 
					INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) 
					WHERE t1.meta_key = 'wpars_average' 
					AND t2.meta_key = 'wpars_raters' 
					AND t3.meta_key = 'wpars_scores' 
					AND $wpdb->posts.post_password = '' 
					AND $wpdb->posts.post_date < '".current_time('mysql')."' 
					AND $wpdb->posts.post_status = 'publish'  
					AND t2.meta_value >= $rating_min_rate 
					AND $wpdb->posts.post_type = '$post_type'
					$term_id_sql
					$order_by_sql
					$limit_sql";
	} else { //Post type as page, no terms
		$query_sql = "SELECT DISTINCT $wpdb->posts.ID, 
					$wpdb->posts.ID AS wpars_post_ID, 
					$wpdb->posts.post_title AS wpars_post_title, 
					$wpdb->posts.post_date AS wpars_post_date, 
					$wpdb->posts.comment_count AS wpars_comment_count,
					(t1.meta_value+0.00) AS wpars_average, 
					(t2.meta_value+0.00) AS wpars_raters, 
					(t3.meta_value+0.00) AS wpars_scores 
					FROM $wpdb->posts
					LEFT JOIN $wpdb->postmeta AS t1 ON t1.post_id = $wpdb->posts.ID 
					LEFT JOIN $wpdb->postmeta As t2 ON t1.post_id = t2.post_id 
					LEFT JOIN $wpdb->postmeta AS t3 ON t3.post_id = $wpdb->posts.ID 
					WHERE t1.meta_key = 'wpars_average' 
					AND t2.meta_key = 'wpars_raters' 
					AND t3.meta_key = 'wpars_scores' 
					AND $wpdb->posts.post_password = '' 
					AND $wpdb->posts.post_date < '".current_time('mysql')."' 
					AND $wpdb->posts.post_status = 'publish'  
					AND t2.meta_value >= $rating_min_rate
					AND $wpdb->posts.post_type = '$post_type'
					$order_by_sql
					$limit_sql";
			
	}
	$out_put_post =  $wpdb->get_results("$query_sql");
	$out_put = '';
	$out_put .= '<ul>';
	if($out_put_post) {
		$num = 1;
		foreach ($out_put_post as $post) {
			$out_put .='<li>';
			$out_put .='<div class="wpars_widget">';
			if ($show_num_list == 'yes') {$out_put .='<span class="wpars_widget_num wpars_num_'.$num.'">' . $num . '</span>'; }
			if ($thumb_show == 'yes' && wpars_get_thumbnail($post->ID) != '') {
			$out_put .='<img class="wpars_widget_thumb" src="'.wpars_get_thumbnail($post->ID).'" alt="Thumbnail for '.get_the_title($post->ID).'" width="'.$thumb_w.'" height="'.$thumb_h.'">'; 
			}
			$out_put .= wpars_rating_widget_replace($post->ID, $template_widget, $title_chars, $rating_img_size);
			$out_put .='</div>';
			$out_put .='</li>';
			$num++;
		}
	} else {
		$out_put .= '<li>No post</li>';
		//$out_put .= '<li>'.$query_sql;'</li>'; //For debug
	}
	$out_put .='</ul>';
	return $out_put;
}

?>