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
	include('../includes/inc-public.php');
	include("../includes/classes/class.music_dir.php");
	include '../includes/classes/class.user.php';
	$directory 	= new Music_Directory();
	$user = new User();

	$data['user'] = $user;

    if (!$user->isPayment()) :
    	header('Location: pay.php');
    endif;


	$data['cat_row'] = $directory->get_row($id);
	if (!$data['cat_row'] || !in_array($data['cat_row']['mp_type'], array('genre', 'field' ))) {
	  header('HTTP/1.1 404 Not Found');
	  exit('404, Invalid ID');
	}

	$data['page_title'] = 'World Music Listing: ' . ucwords($data['cat_row']['mp_name']);

	$data['musicListing'] = $directory->getMusicDirectoryListing();
	$data['comListing'] = $directory->getDirectoryListingByCompany($id);
	$data['wmlMusicListing'] = $directory->getMusicPropListingByField('field');
// echo "<pre>"; print_r($data);
	layout('company', $data);