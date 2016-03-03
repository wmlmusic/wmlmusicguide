<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
	include('includes/inc-public.php');
	include("includes/classes/class.music_dir.php");
	include 'includes/classes/class.user.php';
	$directory 	= new Music_Directory();
	$user = new User();

	$data['payment'] = $user->isPayment();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$arrData 	= array();

		$arrData['rate'] = $_POST['rate'];
		$arrData['parent_id'] = $_POST['pid'];
		$arrData['type'] = $_POST['rate_type'];

		$insert = false;

		if(!check_cookie($arrData['parent_id']) && $arrData['rate'])
    	{
			$insert = $directory->add_rating($arrData);
    	}
    	if($insert)
    	{
        	$one_day = 86400 + time(); 
 			setcookie('star_' . $arrData['parent_id'], true, $one_day); //set cookie for one day
    	}

    	return false;
		
	}

	if (!$id) { // === 0 || === null
	  header('HTTP/1.1 404 Not Found');
	  exit('404, page not found');
	}

        $rate = $directory->rate($id);

	$data['artist_row'] = $directory->get_artist($id);
	if (!$data['artist_row']) {
	  header('HTTP/1.1 404 Not Found');
	  exit('404, Invalid ID');
	}
// echo "<pre>"; print_r($data);exit;
	$data['rate'] = $directory->rate($id);
	$data['page_title'] = 'World Music Listing: ' . $data['artist_row']['aname'] . ' Videos';
        $data['rate'] = $rate['rate'];
  	$data['total'] = $rate['total'];
	$data['id'] = $id;        
	$data['rate_type'] = 'artist_videos';

	$data['musicListing'] = $directory->getMusicDirectoryListing();
	$data['special_head'] = true;

        // echo "<pre>"; print_r($data); exit;

	layout('profile_videos', $data);