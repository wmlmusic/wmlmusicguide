<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('../includes/inc-public.php');
	include("../includes/classes/class.music_dir.php");
	include '../includes/classes/class.user.php';    
	$directory 	= new Music_Directory();
    $user = new User();

    $data['user'] = $user;

    if (!$user->isPayment()) :
    	header('Location: pay.php');
    endif;
	
	$data['page_title'] = 'World Music Listing: Diverse Music Guide';

	$data['musicListing'] = $directory->getMusicDirectoryListing();
	$data['catListing'] = $directory->getCategoryDirectoryListing();
	$data['wmlMusicListing'] = $directory->getMusicPropListingByField('field');
	$data['special_head'] = true;
// echo "<pre>"; print_r($data);
	layout('directory', $data);
?>