<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.category.php");
	$category 	= new Category();

	//new
	
	$data['formStatus'] = 'new';

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$id  = isset($_GET['id']) ? $_GET['id'] : 0;

		/*$checkRow = $properties->get_row($id);
		if(is_array($checkRow)){
			$data['row'] = $checkRow;
		}*/
	}

	layout('form_category', $data);
?>