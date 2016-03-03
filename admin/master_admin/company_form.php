<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.company.php");
	$company 	= new Company();

	//new	
	$data['formStatus'] = 'new';
	$data['id'] = 0;

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$id  = isset($_GET['id']) ? $_GET['id'] : 0;

		$checkRow = $company->get_row($id);
		if(is_array($checkRow)){
			$data['formStatus'] = 'edit';
			$data['row'] = $checkRow;
			$data['id'] = $checkRow['id'];
			$data['logo'] 	= checkImagexists('../../uploads/', 'companylogo_' . $checkRow['id']);
			$data['pic'] 	= checkImagexists('../../uploads/', 'companypic_' . $checkRow['id']);
			$data['pic1'] 	= checkImagexists('../../uploads/', 'companypic1_' . $checkRow['id']);
			$data['pic2'] 	= checkImagexists('../../uploads/', 'companypic2_' . $checkRow['id']);
		}
	}

	layout('form_company', $data);
?>