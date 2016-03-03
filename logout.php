<?php
	/**
     * Developed by Jay Gaha
     * http://jaygaha.com.np
    */
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

    include('includes/inc-public.php');
    include 'includes/classes/class.user.php';
    
    $user = new User();
    $user->logOut();
	header("Location: " . $url);