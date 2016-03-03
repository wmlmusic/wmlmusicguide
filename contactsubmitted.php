<?php
    /**
     * Developed by Julie K. Frey
     * February 2, 2016
	 * Loads after contact form completed and submitted.
     */
    include('includes/inc-public.php');
    include("includes/classes/class.music_dir.php");
    $directory  = new Music_Directory();
    
    $data['page_title'] = 'World Music Listing: Contact Submitted';

    $data['musicListing'] = $directory->getMusicDirectoryListing();
    $data['special_head'] = true;
	layout('contact_submitted', $data);
?>