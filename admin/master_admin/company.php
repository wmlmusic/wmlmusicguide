<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.company.php");
	$company 	= new Company();

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$del_id  = isset($_GET['del_id']) ? $_GET['del_id'] : 0;

		$checkRow = $company->get_row($del_id);
		if(is_array($checkRow)){
			$data['row'] 	= $checkRow;
			$data['logo'] 	= checkImagexists('../../uploads/', 'companylogo_' . $checkRow['id']);
			$data['pic'] 	= checkImagexists('../../uploads/', 'companypic_' . $checkRow['id']);
			$data['pic1'] 	= checkImagexists('../../uploads/', 'companypic1_' . $checkRow['id']);
			$data['pic2'] 	= checkImagexists('../../uploads/', 'companypic2_' . $checkRow['id']);

			$deleteRow = $company->delete_row($del_id);
			//delete from social
			$company->delete_rows_social($del_id);


			if($data['logo']){
				unlink('../../uploads/companylogo_' . $checkRow['id'] . '.jpg');
			}
			if($data['pic']){
				unlink('../../uploads/companypic_' . $checkRow['id'] . '.jpg');
			}
			if($data['pic1']){
				unlink('../../uploads/companypic1_' . $checkRow['id'] . '.jpg');
			}
			if($data['pic2']){
				unlink('../../uploads/companypic2_' . $checkRow['id'] . '.jpg');
			}

			header('Location: company.php');

		}

	}
	
	$data['rows'] 	= $company->get_all_rows();
	layout('company', $data);
?>