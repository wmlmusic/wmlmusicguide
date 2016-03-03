<?php
  /**
   * Developed by Jay Gaha
   * http://jaygaha.com.np
   */
  
  include('includes/inc-public.php');
  include("includes/classes/class.music_dir.php");
  $directory  = new Music_Directory();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $arrData  = array();

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
      return true;    
  }

  $data['page_title'] = 'World Music Listing: Welcome';

  $data['musicListing'] = $directory->getMusicDirectoryListing();
  $data['wmlMusicListing'] = $directory->getMusicPropListingByField('field');
  $data['wmlBanners'] = $directory->getBanners();
  $data['wmlAllWML'] = $directory->getPost();
  $data['wmlWMLMusic'] = $directory->getPost('music');
  $data['wmlWMLVideo'] = $directory->getPost('video');
  $rate = $directory->rate(0, 'd_site');
  
  // echo "<pre>"; print_r($rate); exit;
  $data['rate'] = $rate['rate'];
  $data['total'] = $rate['total'];
  $data['special_head'] = true;
  layout('index', $data);