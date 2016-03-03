<?php
	/**
	 * Modification by Jay Gaha
	 * http://jaygaha.com.np
	 */
	if(session_id() == '') {
    	session_start();
	}

	if(empty($_SESSION['user_id'])){
		header('location: index.php');
		exit;
	}

	include_once('functions.php');
	$data = array();

?>