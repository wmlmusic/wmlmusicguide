<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	session_start();
	include('../master_admin/includes/inc.php');
	include("../master_admin/includes/classes/class.post.php");
	$post = new Post();
	$user_id = $_SESSION['user_id'];
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$del_id  = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
		$checkRow = $post->get_row($del_id, $user_id);
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
	
	$data['rows'] 	= $post->get_all_rows($user_id);
	layout('post', $data);
?>