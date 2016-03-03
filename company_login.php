<?php
    /**
     * Developed by Jay Gaha
     * http://jaygaha.com.np
     */
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) . '/admin/viewer_admin';
    header('Location:' . $url);
    
    include('includes/inc-public.php');
    include("includes/classes/class.music_dir.php");
    $directory  = new Music_Directory();
    
    $data['page_title'] = 'World Music Listing: Login';

    $data['musicListing'] = $directory->getMusicDirectoryListing();
    $data['special_head'] = true;
// echo "<pre>"; print_r($data);exit;
    layout('signin_company', $data);
?>