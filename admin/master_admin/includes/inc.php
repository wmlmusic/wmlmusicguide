<?php 
	// session_start();
	if(session_id() == '') {
    	session_start();
	}
	if(empty($_SESSION['user_id'])){
		header('location: index.php');
		exit;
	}
	include_once('functions.php');
	include_once('send_mail.php');
	define('WWW_ROOT', $_SERVER['DOCUMENT_ROOT']);
	define('GALLERY_PATH', '/site/admin/images/gallery/');
	$folder_name = $_SESSION['user_id'];
	@$album_path = WWW_ROOT.GALLERY_PATH.$folder_name;
//	echo $album_path; exit;
	if(!is_dir($album_path)){
		@mkdir($album_path,0777);
		@chmod($album_path,0777);
	}
	$data = array();
 ?>
