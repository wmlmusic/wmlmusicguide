<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
	$type_id = isset($_GET['type_id']) ? (int) $_GET['type_id'] : null;

	if (!$id || !$type_id) { // === 0 || === null
	  header('HTTP/1.1 404 Not Found');
	  exit('404, page not found');
	}
	include('includes/inc-public.php');
	include("includes/classes/class.music_dir.php");
	$directory 	= new Music_Directory();

	$data['cat_row'] = $directory->get_row_company($id);
	if (!$data['cat_row']) {
	  header('HTTP/1.1 404 Not Found');
	  exit('404, Invalid ID');
	}

	$data['page_title'] = 'World Music Listing: ' . ucwords($data['cat_row']['cname']);

	$data['musicListing'] = $directory->getMusicDirectoryListing();
	$data['artListing'] = $directory->getDirectoryListingForArtists($id, $type_id);
	$data['special_head'] = true;
// echo "<pre>"; print_r($data);exit;
	layout('artist', $data);