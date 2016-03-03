<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.post.php");
	$post = new Post();

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$del_id  = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
		$checkRow = $post->get_row($del_id);
		if(is_array($checkRow)){

			$data['post'] 	= checkImagexists('../../uploads/', 'post_' . $checkRow['id']);

			$deleteRow = $post->delete_row($del_id);

			// if($data['cover']){
			@unlink('../../uploads/post_' . $checkRow['id'] . '.jpg');
			// }
			header('Location: post.php');
			exit;
		}
	}
	
	$data['rows'] 	= $post->get_all_rows();
	layout('post', $data);
?>