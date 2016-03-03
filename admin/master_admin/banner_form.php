<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.banner.php");
	$banner 	= new Banner();

	//new	
	$data['formStatus'] = 'new';
	$data['id'] = 0;

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$id  = isset($_GET['id']) ? $_GET['id'] : 0;

		$checkRow = $banner->get_row($id);
		if(is_array($checkRow)){
			$data['formStatus'] = 'edit';
			$data['row'] = $checkRow;
			$data['id'] = $checkRow['id'];
			$data['banner'] 	= checkImagexists('../../uploads/', 'banner_' . $checkRow['id']);
		}
	}

	layout('banner_form', $data);
?>