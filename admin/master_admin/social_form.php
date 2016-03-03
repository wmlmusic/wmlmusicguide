<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	$type 	= isset($_GET['type']) ? $_GET['type'] : 0;
	$id 	= isset($_GET['id']) ? (int)$_GET['id'] : 0;
	include('includes/inc.php');
	include("includes/classes/class.music_properties.php");
	include("includes/classes/class.socialmedia.php");
	$properties = new Music_Properties();
	$social 	= new Social_Media();

	$validType 	= array('company', 'artist');

	if(!in_array($type, $validType) || $id == 0){
		header("Location: home.php");
	}
	$data['type'] = $type;
	$data['id'] = $id;
	$data['rows'] = $properties->get_all_rows('social');
	$data['exsocial'] = $social->get_all_rows($type, $id);
// echo "<pre>"; print_r($data);exit;

	layout('form_social', $data);
?>