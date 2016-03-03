<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc.php');
	include("includes/classes/class.artist.php");
	include("includes/classes/class.music_properties.php");
	$artist 		= new Artist();
	$properties 	= new Music_Properties();
	$data['rows'] 	= $artist->get_all_rows();
	$data['categoryListing'] = $properties->get_all_rows('category');
	$data['artistListing'] = $artist->getArtistProfileListing();
	layout('profile', $data);
?>