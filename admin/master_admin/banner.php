<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.banner.php");
	$banner = new Banner();

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$del_id  = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
		$checkRow = $banner->get_row($del_id);
		if(is_array($checkRow)){

			$data['banner'] 	= checkImagexists('../../uploads/', 'banner_' . $checkRow['id']);

			$deleteRow = $banner->delete_row($del_id);

			if($data['cover']){
				unlink('../../uploads/banner_' . $checkRow['id'] . '.jpg');
			}
			header('Location: banner.php');
			exit;
		}
	}
	
	$data['rows'] 	= $banner->get_all_rows();
	layout('banner', $data);
?>