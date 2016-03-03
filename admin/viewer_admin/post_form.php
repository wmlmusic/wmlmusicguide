<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('../master_admin/includes/inc.php');
	include("../master_admin/includes/classes/class.post.php");
        include("../master_admin/includes/classes/class.artist.php");
	$post 	= new Post();

	//new	
	$data['formStatus'] = 'new';
	$data['id'] = 0;

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$id  = isset($_GET['id']) ? $_GET['id'] : 0;

		$checkRow = $post->get_row($id);
		if(is_array($checkRow)){
			$data['formStatus'] = 'edit';
			$data['row'] = $checkRow;
			$data['id'] = $checkRow['id'];
			$data['post'] 	= checkImagexists('../../uploads/', 'post_' . $checkRow['id']);
		}
	}

	layout('post_form', $data);
?>