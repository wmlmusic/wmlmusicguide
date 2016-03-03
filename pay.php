<?php
  /**
   * Developed by Jay Gaha
   * http://jaygaha.com.np
   */
  
  include('includes/inc-public.php');
  include("includes/classes/class.music_dir.php");
  $directory  = new Music_Directory();

  $data['page_title'] = 'World Music Listing: Payment';

  $data['musicListing'] = $directory->getMusicDirectoryListing();
  $data['special_head'] = true;
  layout('payment', $data);

