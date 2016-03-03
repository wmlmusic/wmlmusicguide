<?php
//echo "hello"; exit;
include('includes/inc.php');
include("includes/classes/class.gallery.php");
$gallery = new Gallery();

//print_r($_SESSION);
$customer_id = $_SESSION['user_id'];

if(isset($_GET['act'])){
	if($_GET['act'] == 'delete'){
		if(isset($_GET['id']) && $_GET['id'] != ''){
			$id = $_GET['id'];
			if($gallery->check_user_customer($_SESSION['user_id'],$id)){
				$directory = $album_path.'/'.$_GET['id'];
				//echo $directory; exit;
				function recursiveRemoveDirectory($directory)
					{
						foreach(glob("{$directory}/*") as $file)
						{
							if(is_dir($file)) { 
								recursiveRemoveDirectory($file);
							} else {
								unlink($file);
							}
						}
						rmdir($directory);
					}
				if($gallery->delete_gallery($id)){
					header("location: managegallery.php?act=deleted");
					exit;
				}
			}
		}
	}
	if($_GET['act'] == 'status'){
		if(isset($_GET['id']) && $_GET['id'] != ''){
			$id = $_GET['id'];
			if($gallery->check_user_customer($_SESSION['user_id'],$id)){
				$gallery->update_user_gallery_status($id);
				header("location: managegallery.php?act=updated");
				die;
			}
		}
	}
}


$data = $gallery->all_customer_gallery($customer_id);
layout('managegallery',$data);
?>