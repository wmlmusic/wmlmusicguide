<?php
//echo "hello"; exit;
include('includes/inc.php');
include("includes/classes/class.gallery.php");
$gallery = new Gallery();
$arr = NULL;
$data = NULL;

if(isset($_GET['act']) && isset($_GET['id'])){
	
	$data = $gallery->get_gallery($_GET['id'],$_SESSION['user_id']);
	$data['gallery_path'] = 'http://wmlmusicguide.com/site/admin/images/gallery/'.$_SESSION['user_id'].'/'.$_GET['id'].'/';
	//print_r($data);
	//exit;
	//
}
//print_r($_POST); exit;
if(isset($_POST['AddGallery'])){

	$arr['customer_id'] 	=	$_SESSION['user_id'];
	$arr['customer_gallery_name'] = $_POST['customer_gallery_name'];
	
	if(isset($_POST['gallery_id']) && $_POST['gallery_id'] != ''){
		$temp_dir_name = $_POST['gallery_id'];
	}
	else{
		$temp_dir_name = "temp";
	}	
	
	//echo $temp_dir_name; exit;
	
	$new_path = $album_path.'/'.$temp_dir_name; 
	//echo $new_path;
	if(!is_dir($new_path)){
		mkdir($new_path,0777);
		chmod($new_path,0777);
	}
	if($_FILES['customer_gallery_cover_image']['name']){
		if($_FILES['customer_gallery_cover_image']['name'] != $_POST['customer_gallery_cover_image_old']['name']){
			$arr['customer_gallery_cover_image'] = $_FILES['customer_gallery_cover_image']['name'];
			$target_path = $new_path.'/' . basename( $_FILES["customer_gallery_cover_image"]["name"]);
			@move_uploaded_file($_FILES['customer_gallery_cover_image']['tmp_name'], $target_path);
		}
		else{
			$arr['customer_gallery_cover_image'] = $_POST['customer_gallery_cover_image_old'];
		}
	}
	else{

	$arr['customer_gallery_cover_image'] = $_POST['customer_gallery_cover_image_old'];
		}

	if($_FILES['customer_gallery_image1']['name']){
		if($_FILES['customer_gallery_image1']['name'] != $_POST['customer_gallery_image1_old']['name']){
			$arr['customer_gallery_image1'] = $_FILES['customer_gallery_image1']['name'];
			$target_path = $new_path.'/' . basename( $_FILES["customer_gallery_image1"]["name"]);
			@move_uploaded_file($_FILES['customer_gallery_image1']['tmp_name'], $target_path);
		}
		else{
			$arr['customer_gallery_image1'] = $_POST['customer_gallery_image1_old'];
		}
	}
	else{
			$arr['customer_gallery_image1'] = $_POST['customer_gallery_image1_old'];
		}
	
	if($_FILES['customer_gallery_image2']['name']){
		if( $_FILES['customer_gallery_image2']['name'] != $_POST['customer_gallery_image2_old']['name']){
			$arr['customer_gallery_image2'] = $_FILES['customer_gallery_image2']['name'];
			$target_path = $new_path.'/' . basename( $_FILES["customer_gallery_image2"]["name"]);
			@move_uploaded_file($_FILES['customer_gallery_image2']['tmp_name'], $target_path);
		}
		else{
			$arr['customer_gallery_image2'] = $_POST['customer_gallery_image2_old'];
		}
	}
	else{
			$arr['customer_gallery_image2'] = $_POST['customer_gallery_image2_old'];
		}
	
	if($_FILES['customer_gallery_image3']['name']){
		if($_FILES['customer_gallery_image3']['name'] != $_POST['customer_gallery_image3_old']['name']){
			$arr['customer_gallery_image3'] = $_FILES['customer_gallery_image3']['name'];
			$target_path = $new_path.'/' . basename( $_FILES["customer_gallery_image3"]["name"]);
			@move_uploaded_file($_FILES['customer_gallery_image3']['tmp_name'], $target_path);
		}
		else{
			$arr['customer_gallery_image3'] = $_POST['customer_gallery_image3_old'];
		}
	}
	else{
			$arr['customer_gallery_image3'] = $_POST['customer_gallery_image3_old'];
		}
	
	if($_FILES['customer_gallery_image4']['name']){
		if($_FILES['customer_gallery_image4']['name'] != $_POST['customer_gallery_image4_old']['name']){
			$arr['customer_gallery_image4'] = $_FILES['customer_gallery_image4']['name'];
			$target_path = $new_path.'/' . basename( $_FILES["customer_gallery_image4"]["name"]);
			@move_uploaded_file($_FILES['customer_gallery_image4']['tmp_name'], $target_path);
		}
		else{
			$arr['customer_gallery_image4'] = $_POST['customer_gallery_image4_old'];
		}
	}
	else{
			$arr['customer_gallery_image4'] = $_POST['customer_gallery_image4_old'];
		}
	
	//print_r($arr); exit;
	if(isset($_POST['gallery_id']) && $_POST['gallery_id'] != ''){
		$arr['id'] = $_POST['gallery_id'];
		//print_r($arr); exit;
		if($gallery->update_gallery($arr)){
			header('Location: http://wmlmusicguide.com/site/admin/viewer_admin/managegallery.php?act=updated');
			exit;
		}else{
			header('Location: http://wmlmusicguide.com/site/admin/viewer_admin/managegallery.php?success=fail');
			exit;
		}
	}
	else{
		//print_r($arr); exit;
		$var = $gallery->add_gallery($arr);
		//print_r($arr);
		//print_r($var); exit;
		if($var != '0'){
			$renameResult = rename($new_path, $album_path.'/'.$var);
			header('Location: http://wmlmusicguide.com/site/admin/viewer_admin/managegallery.php?act=added');
			exit;
		}else{
			header('Location: http://wmlmusicguide.com/site/admin/viewer_admin/managegallery.php?success=fail');
			exit;
		}
	}

}

//exit; 
layout('newgallery',$data);
?>