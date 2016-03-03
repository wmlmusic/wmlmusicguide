<?php
    /**
     * Developed by Jay Gaha
     * http://jaygaha.com.np
     */
    include('../includes/inc-public.php');
    include("../includes/classes/class.music_dir.php");
    include '../includes/classes/class.user.php';
    $directory  = new Music_Directory();
    $user = new User();
    $data['user'] = $user;
    
    $data['page_title'] = 'World Music Listing: Sign Up';

    $data['musicListing'] = $directory->getMusicDirectoryListing();
    $data['artistListing'] = $directory->getArtistProfileListing();
    $data['categoryListing'] = $directory->getCategoryDirectoryListing();
    $data['special_head'] = true;
    $data['wmlMusicListing'] = $directory->getMusicPropListingByField('field');
// echo "<pre>"; print_r($data);exit;
    layout('signup', $data);
?>