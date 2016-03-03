<?php
    /**
     * Developed by Jay Gaha
     * http://jaygaha.com.np
     */
    include('includes/inc-public.php');
    include("includes/classes/class.music_dir.php");
    $directory  = new Music_Directory();
    
    $data['page_title'] = 'World Music Listing: Sign Up';

    $data['musicListing'] = $directory->getMusicDirectoryListing();
    $data['artistListing'] = $directory->getArtistProfileListing();
    $data['categoryListing'] = $directory->getCategoryDirectoryListing();
    $data['special_head'] = true;
// echo "<pre>"; print_r($data);exit;
    layout('signup_company', $data);
?>