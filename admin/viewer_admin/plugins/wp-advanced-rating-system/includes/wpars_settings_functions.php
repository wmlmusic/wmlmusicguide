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

######### Add default plugin settings options #########
add_action( 'init', 'kc_wpars_settings_value' );
function kc_wpars_settings_value() {
	$settings = get_option( "kc_wpars_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'template_no_rate' => '(No Ratings Yet)',
			'template_rate' => '(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>)',
			'template_rated' => '(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, You rated)',
			'template_rate_disable' => '(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, Rating disable)',
			'template_rate_not_allow' => '(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, Please register for rating)',
			'template_rate_only_text' => '(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, <strong>{rate_percent}</strong>%)',
			'template_widget_rate_average' => '<a href="{post_url}" title="{post_title}">{post_title_trim}</a> {rating_img} ({rate_average} out of {max_rates})',
			'template_widget_total_raters' => '<a href="{post_url}"  title="{post_title}">{post_title_trim}</a> {rating_img} ({total_raters} ratings)',
			'template_widget_total_scores' => '<a href="{post_url}"  title="{post_title}">{post_title_trim}</a> {rating_img} ({total_scores} scores)',
			'template_widget_normal' 		=> '<a href="{post_url}" title="{post_title}">{post_title_trim}</a> {rating_img}',
			'auto_display_rating' => 'no',
			'rating_position' => 'bellow', // above , bellow
			'max_rates' => '5', 
			'size_default' => '15',
			'shape_default' => 'star', 
			'color_default' => 'orange', 
			'logged_method' => 'cookie', 
			'allow_rate_method' => 'all',
			'installed_version' => '1.0'
		);
		add_option( "kc_wpars_settings", $settings, '', 'yes' );
	}	
}

######### Function Select box #########
function wpars_select_box($list_option, $selected, $id, $func) {
	$out = '';
	if ( $func == "" ) {
	$out .= "<select name=\"$id\" id=\"$id\" class=\"select_rating\">";
	} else {
	$out .= "<select name=\"$id\" onchange=\"$func(this.value)\" id=\"$id\">";
	}
	foreach ($list_option as $type => $display_text) {
		if ( $type == $selected ) {
			$out .=  "<option value=" . $type . " selected>" . $display_text. "</option>";
			} else {
			$out .=  "<option value=" . $type . ">" . $display_text. "</option>";
			}
	}
	$out .=  "</select>";
	return $out;
}
######### Function radio img switch #########
function wpars_radio_images($list_option, $name, $checked, $folder_img) {
	$out = '';
	$out .= '<div id="'.$name.'">';
	foreach ($list_option as $id => $value) {
		if ( $value == $checked ) {
			$out .=  ' <input type="radio" name="'.$name.'" id="'.$id.'" value="'.$value.'" checked><label for="'.$id.'" class="wpars_selected"><img src="'.WPARS_URL.'img/'.$folder_img.'/'.$value.'.png" alt="'.$value.'"></label>';
		} else {
			$out .=  ' <input type="radio" name="'.$name.'" id="'.$id.'" value="'.$value.'"><label for="'.$id.'"><img src="'.WPARS_URL.'img/'.$folder_img.'/'.$value.'.png" alt="'.$value.'"></label>';
		}
	}
	$out .= '</div>';
	return $out;
}

######### Register value setting radio box #########
$wpars_radio_shapes = array ('square'	=> 'square', 'circle'	=> 'circle', 'circle2'	=> 'circle2', 'star' => 'star', 'heart' => 'heart', 'butterfly'	=> 'butterfly', 'music' => 'music', 'smile' => 'smile'	);
$wpars_radio_colors = array ( 'red' => 'red', 'yellow' => 'yellow', 'orange' => 'orange', 'magenta' => 'magenta', 'pink' => 'pink', 'purple' => 'purple', 'green' => 'green', 'olive'	=> 'olive', 'brown' => 'brown', 'blue' => 'blue');

######### Register value setting select box #########
$wpars_select_max_rates = array ('5' => '5 Scores', '10' => '10 Scores' );
$wpars_select_rating_size = array();
	for ($size=5; $size <= 50; $size++) {
		$wpars_select_rating_size[$size] = $size;
	}
$wpars_select_shapes = array ( 'star' => 'Star', 'heart' => 'Heart', 'circle'	=> 'Circle', 'circle2'	=> 'Circle2', 'square'	=> 'Square', 'butterfly'	=> 'Butterfly', 'coffee'	=> 'Coffee', 'music' => 'Music', 'android'	=> 'Android', 'smile' => 'Smile');
$wpars_select_colors = array ( 'blue'	=> 'Blue', 'brown'	=> 'Brown', 'green'	=> 'Green', 'orange' => 'Orange', 'pink'	=> 'Pink', 'purple' => 'Purple', 'red' 	=> 'Red', 'yellow' 	=> 'Yellow', 'magenta'	=> 'Magenta', 'olive' => 'Olive' );
$wpars_select_logged_method = array ( 'none' 	=> 'None', 'cookie' => 'Cookie');
$wpars_select_allow_rate = array ('all' => 'Guest and members', 'onlyuser' 	=> 'Only members');


######### Check newest version #########  
function wpars_check_newest_version() {
	$check_latest_version_url = "http://blog.kuncode.com/p/wpars.html";
	$curl = wpars_curl($check_latest_version_url);
	//echo htmlentities($curl); //For debug
	if($curl) {
	if (preg_match("/<span id=\"wpars_wp-advanced-rating-system_newest_version\">(.*?)<\/span>/is", $curl,$result)) {
			$wpars_latest_version = $result[1];
		} else { 
			$wpars_latest_version = 0;
		}
	} else { //if don't curl
		$wpars_latest_version = -1;
	}
	return $wpars_latest_version;
}

######### notice for update #########
//add_action('admin_init', 'wpars_update_note'); //For auto check update
function wpars_update_note(){
	global $newest_version;
	$wpars_installed_version = WPARS_VERSION;
	//$wpars_installed_version = 0; //for debug
	$newest_version = wpars_check_newest_version();
	$out_put = "";
	if($newest_version == -1) {
		$out_put .= "(";
		$out_put .= '<font color="red"><strong>Error: </strong></font> <font color="green"><strong>Can not check update at this time.</strong></font> Please recheck again or check update later. Click <a href="http://www.kuncode.com" target="_blank">kuncode.com</a> see more information.';
		$out_put .= ")";
	} else {
		if( ($wpars_installed_version < $newest_version) ) {
			//add_action('admin_notices', 'wpars_admin_notice'); //For auto check update
			$out_put .= "(";
			$out_put .= '<font color="red"><strong>Note: </strong></font>A new version (<font color="green"><strong>version '.$newest_version.'</strong></font>) is available. Click <a href="http://www.kuncode.com" target="_blank">kuncode.com</a> see more details and update plugin.';
			$out_put .= ")";
		} else {
			$out_put .= "(";
			$out_put .= '<font color="red"><strong>Good: </strong></font><font color="green"><strong>You use newest version</strong></font>';
			$out_put .= ")";
		}
	}
	return $out_put;
}

######### Admin notice functions #########
function wpars_admin_notice() {
    global $newest_version;
    if ( (current_user_can( 'install_plugins' )) ){
        echo '<div class="update-nag">A new version (<strong>version '.$newest_version.'</strong>) of <font color="green"><strong>'.WPARS_NAME.'</strong></font> is available. Click <a href="http://www.kuncode.com" target="_blank">here</a> see more details and update plugin. </div>';
      
    } 
}

######### CURL functions #########
function wpars_curl($url, $referer = 'http://kuncode.com', $timeout = 60, $header = false){ 
    if(!isset($timeout))
        $timeout=60; 
    $curl = curl_init(); 
    if(strstr($referer,"://")){
        curl_setopt ($curl, CURLOPT_REFERER, $referer); 
    }
    curl_setopt ($curl, CURLOPT_URL, $url); 
    curl_setopt ($curl, CURLOPT_TIMEOUT, $timeout); 
    curl_setopt ($curl, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));
    curl_setopt ($curl, CURLOPT_HEADER, (int)$header); 
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $html = curl_exec ($curl); 
    curl_close ($curl); 
    return $html;
}

?>