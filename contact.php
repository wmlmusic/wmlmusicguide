<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc-public.php');
	include("includes/classes/class.music_dir.php");
	include 'includes/classes/class.user.php';

	$directory 	= new Music_Directory();
	$user = new User();

	$data['payment'] = $user->isPayment();

	$data['page_title'] = 'World Music Listing: Contact';

	$data['musicListing'] = $directory->getMusicDirectoryListing();
	$data['special_head'] = true;
	layout('contact', $data);