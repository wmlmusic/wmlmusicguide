<?php

function layout($filename, $arr=null){
	#	echo get_include_contents('tpl/left.php')
	echo get_include_contents('tpl/header.php');

	if(curPageName()=='index.php')
	{
		echo get_include_contents('tpl/index.php');
	}
	else	
	{
		if(curPageName()=='home.php')
			echo get_include_contents('tpl/home.php');
		if(curPageName()=='addpicture.php')
			echo get_include_contents('tpl/addpicture.php');
		if(curPageName()=='addpicture1.php')
			echo get_include_contents('tpl/addpicture1.php');
		if(curPageName()=='adduser.php')
			echo get_include_contents('tpl/adduser.php');
		if(curPageName()=='viewusers.php')
			echo get_include_contents('tpl/viewusers.php');
		if(curPageName()=='newgallery.php')
			echo get_include_contents('tpl/newgallery.php');
		if(curPageName()=='managegallery.php')
			echo get_include_contents('tpl/managegallery.php');
		if(curPageName()=='users_account.php')
			echo get_include_contents('tpl/users_account.php');
		if(curPageName()=='manage_login_detail.php')
			echo get_include_contents('tpl/manage_login_detail.php');
		if(curPageName()=='addcontact_info.php')
			echo get_include_contents('tpl/addcontact_info.php');
		if(curPageName()=='addsocial_links.php')
			echo get_include_contents('tpl/addsocial_links.php');
		if(curPageName()=='users_account_update.php')
			echo get_include_contents('tpl/users_account_update.php');
		if(curPageName()=='company_info.php')
			echo get_include_contents('tpl/form_company.php');
		if(curPageName()=='social_form.php')
			echo get_include_contents('tpl/form_social.php');
		if(curPageName()=='artist_form.php')
			echo get_include_contents('tpl/form_artist.php');
		if(curPageName()=='artist.php')
			echo get_include_contents('tpl/manage_artist.php');
		if(curPageName()=='post_form.php')
			echo get_include_contents('tpl/form_post.php');
		if(curPageName()=='post.php')
			echo get_include_contents('tpl/manage_post.php');

	}

	echo get_include_contents('tpl/footer.php');
}

function layout_json($filename,$arr=null){
	header("Pragma: no-cache");
	header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
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

function saveResizeImage($imgArr, $id, $renameimg){
		$name 		= $imgArr['name'];
		$tmpfile 	= $imgArr['tmp_name'];

		$filename = stripslashes($name);
        $extension = getExtension($filename);
  		$extension = strtolower($extension);

  		if($extension=="jpg" || $extension=="jpeg" ){
			$src = imagecreatefromjpeg($tmpfile);
		}
		else if($extension=="png"){
			$src = imagecreatefrompng($tmpfile);
		}
		else {
			$src = imagecreatefromgif($tmpfile);
		}
		 
		list($width,$height) = getimagesize($tmpfile);

		$newwidth 	= $width <= 230 ? $width : 230;
		$newheight  = ($height/$width) * $newwidth;
		$tmp 		= imagecreatetruecolor($newwidth, $newheight);

		imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		$filename = "../../uploads/". $renameimg . '_' . $id . '.jpg'; // . $extension

		imagejpeg($tmp, $filename, 100);

		imagedestroy($src);
		imagedestroy($tmp);
	}

	function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 	}

 	function checkImagexists($dir, $img){
 		$file = $dir . $img . '.jpg'; // 'images/'.$file (physical path)

		if (file_exists($file)) {
		    return true;
		} else {
		    return false;
		}
 	}

 	function searchForId($id, $array) {
	   foreach ($array as $key => $val) {
	       if ($val['social_id'] === $id) {
	           return $key;
	       }
	   }
	   return NULL;
	}

?>