<?php 
function layout($filename, $arr = NULL){
		//load header
	echo get_include_contents('tpl/header.php');

		//load body
	switch ($filename) {
		case 'directory':
		echo get_include_contents('tpl/directory_page.php');
		break;
		case 'category':
		echo get_include_contents('tpl/category_page.php');
		break;
		case 'company':
		echo get_include_contents('tpl/company_page.php');
		break;
		case 'artist':
		echo get_include_contents('tpl/artist_page.php');
		break;
		case 'wml_directory':
		echo get_include_contents('tpl/wml_directory.php');
		break;
		case 'search':
		echo get_include_contents('tpl/search.php');
		break;
		case 'profile':
		echo get_include_contents('tpl/profile.php');
		break;
		case 'single_profile':
		echo get_include_contents('tpl/single_profile.php');
		break;
		case 'profile_video':
		echo get_include_contents('tpl/profile_media.php');
		break;
		case 'profile_videos':
		echo get_include_contents('tpl/profile_videos.php');
		break;
		case 'index':
		echo get_include_contents('tpl/index.php');
		break;
		case 'signup':
		echo get_include_contents('tpl/signup.php');
		break;
		case 'signin':
		echo get_include_contents('tpl/signin.php');
		break;
		case 'password':
		echo get_include_contents('tpl/password.php');
		break;
		case 'signup_company':
		echo get_include_contents('tpl/signup_company.php');
		break;
		case 'signin_company':
		echo get_include_contents('tpl/signin_company.php');
		break;
		case 'payment':
		echo get_include_contents('tpl/payment.php');
		break;
		case 'about_wml':
		echo get_include_contents('tpl/about_wml.php');
		break;
		case 'terms':
		echo get_include_contents('tpl/terms.php');
		break;


		default:
		echo get_include_contents('tpl/home.php');
		break;
	}

		//load footer
	echo get_include_contents('tpl/footer.php');
}

function layout_json($filename,$arr=null){

	header("Pragma: no-cache");
	header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
	#header('Content-Type: text/x-json; charset=utf-8');
		#header('Content-Type: text/x-json');
	#header('Content-Type: text/html; charset=iso-8859-1');
	return get_include_contents('tpl/json/'.$filename.'.php',$arr);
}

function curPageURL() {
	$pageURL = 'http';
	if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function curPageName() {
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function get_include_contents($filename,$arr=null) {

	global $data;

	if(!empty($arr)){
		$data = $arr;
	}
	if (is_file($filename)) {
		ob_start();
		include $filename;
		$contents = ob_get_contents();
		ob_end_clean();
		return utf8_decode($contents);
	}
	return false;
}


if (get_magic_quotes_runtime())
	set_magic_quotes_runtime(0);

if (get_magic_quotes_gpc()) {
	function stripslashes_gpc(&$value)
	{
		$value = stripslashes($value);
	}
	array_walk_recursive($_GET, 'stripslashes_gpc');
	array_walk_recursive($_POST, 'stripslashes_gpc');
	array_walk_recursive($_COOKIE, 'stripslashes_gpc');
	array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}



function isValidEmail($email){
	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";

	if (eregi($pattern, $email)){
		return true;
	}
	else {
		return false;
	}   
}


function e($str){
	print_r($str);

}
function ed($str){
	print($str);
	exit;
}
function pr($arr){
	echo '<pre>';
	print_r($arr);
}
function prd($arr){
	echo '<pre>';
	print_r($arr);
	exit;
}

function __redirect($page,$params = null){
	$url = $page.'.php';
	if($params)
		$url .='?sha="'.base64_encode($params).'"';
	header('Location: '.$url); 
	exit;
}

	//BELOW FUNCTIONS ARE DEVELOPED BY JAY
function checkImagexists($dir, $img){
	$file = $dir . $img . '.jpg'; // 'images/'.$file (physical path)

	if (file_exists($file)) {
		return true;
	} else {
		return false;
	}
}

//check cookie for star
function check_cookie($p)
{
	if(isset($_COOKIE['star_'.$p])) 
	{ 
		return true;
	}
	else
	{
		return false;
	}   
}

function fetchData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$result = curl_exec($ch);
	curl_close($ch); 
	return $result;
}

function country(){
	return array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
}

function getURLOnly(){
	$full_url_path = "http://" . $_SERVER['HTTP_HOST'] . preg_replace("#/[^/]*\.php$#simU", "/", $_SERVER["PHP_SELF"]);
	return $full_url_path;
}

?>