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
  
  $data['page_title'] = 'World Music Listing: Diverse Music Guide';

  $data['musicListing'] = $directory->getMusicDirectoryListing();
  $filterId = array();
  if(isset($_GET['com_id'])){
    $filterId['com_id'] = $_GET['com_id'];
  }
  if(isset($_GET['cat_id'])){
    $filterId['cat_id'] = $_GET['cat_id'];
  }
  if(isset($_GET['genre_id'])){
    $filterId['genre_id'] = $_GET['genre_id'];
  }
  if(isset($_GET['field_id'])){
    $filterId['field_id'] = $_GET['field_id'];
  }

  $data['selectedId'] = $filterId;
  $data['artListing'] = $directory->getArtistDirectoryListing($filterId);
  $data['catSelectListing'] = $directory->getSelectDirectoryListing($filterId, 'category');
  $data['genSelectListing'] = $directory->getSelectDirectoryListing($filterId, 'genre');
  $data['fieldSelectListing'] = $directory->getSelectDirectoryListing($filterId, 'field');

  $data['socialListing'] = $directory->getSocialTitleListing();
  $data['socialsListing'] = $directory->getArtistSocialListing($filterId);
  $data['special_head'] = true;
// echo "<pre>"; print_r($data['selectedId']); exit;
  layout('wml_directory', $data);
?>