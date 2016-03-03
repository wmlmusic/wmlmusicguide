<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');

	$data['special_head'] = true;
	$data['message']	= $_GET['msg'];
	layout('message', $data);