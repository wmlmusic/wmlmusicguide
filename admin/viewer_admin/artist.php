<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('../master_admin/includes/inc.php');
	include("../master_admin/includes/classes/class.artist.php");
	$artist 	= new Artist();

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$del_id  = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
		$checkRow = $artist->get_row($del_id);
		if(is_array($checkRow)){

			$data['cover'] 	= checkImagexists('../../uploads/', 'artistcover_' . $checkRow['id']);
			$data['pic'] 	= checkImagexists('../../uploads/', 'artistpic_' . $checkRow['id']);
			$data['pic1'] 	= checkImagexists('../../uploads/', 'artistpic1_' . $checkRow['id']);
			$data['pic2'] 	= checkImagexists('../../uploads/', 'artistpic2_' . $checkRow['id']);

			$deleteRow = $artist->delete_row($del_id);
			//delete from properties
			$artist->delete_rows_properties($del_id);
			//delete from social
			$artist->delete_rows_social($del_id);


			if($data['cover']){
				unlink('../../uploads/artistcover_' . $checkRow['id'] . '.jpg');
			}
			if($data['pic']){
				unlink('../../uploads/artistpic_' . $checkRow['id'] . '.jpg');
			}
			if($data['pic1']){
				unlink('../../uploads/artistpic1_' . $checkRow['id'] . '.jpg');
			}
			if($data['pic2']){
				unlink('../../uploads/artistpic2_' . $checkRow['id'] . '.jpg');
			}
			header('Location: artist.php');
			exit;
		}
	}
	
	$data['rows'] 	= $artist->get_all_rows_company($_SESSION['company_id']);
	// print_r($data['rows']); exit;
	layout('artist', $data);
?>