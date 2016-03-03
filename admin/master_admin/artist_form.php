<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.artist.php");
	$artist 	= new Artist();

	//new	
	$data['formStatus'] = 'new';
	$data['id'] = 0;
	$data['cid'] = 0;
	$data['caid'] = 0;
	$data['gid'] = 0;
	$data['fid'] = 0;
	$data['atype'] = '';

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$id  = isset($_GET['id']) ? $_GET['id'] : 0;

		$checkRow = $artist->get_row($id);
		if(is_array($checkRow)){
			$data['formStatus'] = 'edit';
			$data['row'] = $checkRow;
			$data['id'] = $checkRow['id'];
			$data['cid'] = $checkRow['com_id'];
			$data['atype'] = $checkRow['atype'];
			$data['cover'] 	= checkImagexists('../../uploads/', 'artistcover_' . $checkRow['id']);
			$data['pic'] 	= checkImagexists('../../uploads/', 'artistpic_' . $checkRow['id']);
			$data['pic1'] 	= checkImagexists('../../uploads/', 'artistpic1_' . $checkRow['id']);
			$data['pic2'] 	= checkImagexists('../../uploads/', 'artistpic2_' . $checkRow['id']);
		}
	}

	$data['companies'] 	= $artist->getCompaniesForSelect($data['cid']);
	$data['categories'] = $artist->getCategoriesForSelect('category', $data['id']);
	$data['genre'] 		= $artist->getCategoriesForSelect('genre', $data['id']);
	$data['field'] 		= $artist->getCategoriesForSelect('field', $data['id']);

	layout('form_artist', $data);
?>