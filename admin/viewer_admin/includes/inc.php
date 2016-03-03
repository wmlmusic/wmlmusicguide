<?php 
session_start();
if(empty($_SESSION['user_id'])){
	header('location: index.php');
	exit;
}
	//print_r($_SERVER); exit;
	include('functions.php');
	//define('WWW_ROOT', $_SERVER['DOCUMENT_ROOT'].'/wmlmusicguide/');
	
	define('WWW_ROOT', $_SERVER['DOCUMENT_ROOT']);
	define('GALLERY_PATH', '../../admin/images/gallery/');
	$folder_name = $_SESSION['user_id'];
	@$album_path = GALLERY_PATH.$folder_name;
	//echo $album_path; exit; 
	if(!is_dir($album_path)){
		@mkdir($album_path, 0777);
		@chmod($album_path, 0777);
	}

 ?>
