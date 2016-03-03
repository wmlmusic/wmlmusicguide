<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include('includes/inc-public.php');
	include("includes/classes/class.music_dir.php");
	$directory 	= new Music_Directory();
	
	$data['page_title'] = 'World Music Listing: Search Result';

	$data['musicListing'] = $directory->getMusicDirectoryListing();
	if(preg_match("/[A-Z  | a-z]+/", $_GET['q'])){ 
		$terms = addslashes($_GET['q']);
		$terms = strip_tags($terms); 
		$terms = trim ($terms);
		$list1 = $directory->getSearchListing($terms);

		$list2 	= $directory->getSearchListingByProp($terms);
		$list1 	= is_array($list1) ? $list1 : array();
		$list2 	= is_array($list2) ? $list2 : array();
		$list 	= array_merge($list1, $list2);
		// $array4 = $list + $list1;

		/*echo '<pre>';
		var_dump($array3);
		var_dump($array4);
		echo '</pre>';
		exit;*/
		$data['searchListing'] = $list;
	}
	$data['special_head'] = true;
// echo "<pre>"; print_r($data['searchListing']);exit;
	layout('search', $data);
?>