<?php
  /**
   * Developed by Jay Gaha
   * http://jaygaha.com.np
   */
  
  $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
  include('includes/inc-public.php');

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
  
  if ($id<0) { // === 0 || === null
    header('HTTP/1.1 404 Not Found');
    exit('404, page not found');
  }
  
  include('includes/inc-public.php');
  include("includes/classes/class.music_dir.php");
  $directory  = new Music_Directory();

  $data['post_row'] = $directory->getPostById($id);
  if (!$data['post_row']) {
    header('HTTP/1.1 404 Not Found');
    exit('404, Invalid ID');
  }

  $rate = $directory->rate($id);
  
  $data['rate'] = $rate['rate'];
  $data['total'] = $rate['total'];
  $data['page_title'] = 'World Music Listing: ' . $data['post_row']['name'];
  $data['id'] = $id;
  $data['rate_type'] = 'd_post';

  $data['musicListing'] = $directory->getMusicDirectoryListing();
  $data['special_head'] = true;
  
  // echo "<pre>"; print_r($rate); exit;
  $data['rate'] = $rate['rate'];
  $data['total'] = $rate['total'];
  layout('post', $data);