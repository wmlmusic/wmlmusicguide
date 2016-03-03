<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.company.php");
	$company 	= new Company();

	$email = $_SESSION['email'];

	$checkRow = $company->getCompanyByEmail($email);

	if (!$checkRow) {
	  header('HTTP/1.1 404 Not Found');
	  exit('404, Invalid ID');
	}

	$data['formStatus'] = 'edit';
	$data['row'] = $checkRow;
	/*echo "<pre>";
	print_r($data['row']);*/
	$data['id'] = $checkRow['id'];
	$data['logo'] 	= checkImagexists('../../uploads/', 'companylogo_' . $checkRow['id']);
	$data['pic'] 	= checkImagexists('../../uploads/', 'companypic_' . $checkRow['id']);
	$data['pic1'] 	= checkImagexists('../../uploads/', 'companypic1_' . $checkRow['id']);
	$data['pic2'] 	= checkImagexists('../../uploads/', 'companypic2_' . $checkRow['id']);

	layout('form_company', $data);
?>