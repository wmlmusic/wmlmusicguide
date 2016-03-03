<?php
	/**
	 * Developed by Julie K. Frey
	 * http://www.speedyhunter.com/
	*/
	// The back-end then will determine if the username is available or not,
	// and finally returns a JSON { "valid": true } or { "valid": false }
	// The code bellow demonstrates a simple back-end written in PHP

	// Include user database classes and functions
  	include('includes/inc-public.php');
  	include('includes/classes/class.user.php');
	
	$email = $_GET["company_email"];
	
	if(get_company_email($email)) {
        echo 'true';
      } else {
        echo 'false';
    } 
?>