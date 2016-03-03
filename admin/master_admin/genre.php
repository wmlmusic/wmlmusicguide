<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.music_properties.php");
	$properties 	= new Music_Properties();

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$del_id  = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
		$id  = isset($_GET['id']) ? $_GET['id'] : 0;

		$currentId = $del_id > 0 ? $del_id : $id;

		$checkRow = $properties->get_row($currentId);
		if(is_array($checkRow)){
			$data['row'] 	= $checkRow;
			$data['image'] 	= checkImagexists('../../uploads/', $checkRow['mp_type'] . '_' . $checkRow['mp_id']);

			//delete command
			if($del_id){
				$deleteRow = $properties->delete_row($del_id, $checkRow['mp_type']);
				//delete from artist properties
				$properties->delete_rows_properties($del_id);
				if($data['image']){
					unlink('../../uploads/' . $checkRow['mp_type'] . '_' . $checkRow['mp_id'] . '.jpg');
				}
				header('Location: ' . $checkRow['mp_type'] . '.php');
			}
		}
	}

	$data['rows'] 	= $properties->get_all_rows('genre');
	$data['categories'] 	= $properties->get_all_rows('category');
	layout('genre', $data);
?>