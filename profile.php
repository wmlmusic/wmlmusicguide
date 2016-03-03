<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc-public.php');
	include("includes/classes/class.music_dir.php");
	include 'includes/classes/class.user.php';
  	$directory  = new Music_Directory();
  	$user = new User();
  	if (!$user->isPayment()) :
    	header('Location: pay.php');
    endif;
	$data['payment'] = $user->isPayment();

	$data['page_title'] = 'World Music Listing: Profile';

	$data['musicListing'] = $directory->getMusicDirectoryListing();
	$data['artistListing'] = $directory->getArtistProfileListing();
	$data['categoryListing'] = $directory->getCategoryDirectoryListing();
	$data['special_head'] = true;
// echo "<pre>"; print_r($data);exit;
	layout('profile', $data);
?>