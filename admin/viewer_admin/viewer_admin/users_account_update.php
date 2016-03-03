<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

	if (!$id) { // === 0 || === null
	  header('HTTP/1.1 404 Not Found');
	  exit('404, page not found');
	}
	include('includes/inc.php');
	include("includes/classes/class.user.php");
	$user = new User();

	$data['user_row'] = $user->get_user($id);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$_POST['id'] = $_POST['user_id'];
		unset($_POST['user_id']);
		$user->update_user($_POST);
		$_SESSION['message'] = 'User updated Successfully.';
		header("location: users_account.php");
		exit;
	}
	/*echo "<pre>";
	print_r($data['user_row']);exit;*/

	if (!$data['user_row']) {
	  header('HTTP/1.1 404 Not Found');
	  exit('404, Invalid ID');
	}

	layout('users_account_update', $data);
?>