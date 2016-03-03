<?php
  /**
   * Developed by Julie K. Frey
   * February 2, 2016
  */
  $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: ' . $url .'contactsubmitted.php');
    exit;
  }
	include('includes/inc-public.php');
	include("includes/classes/class.user.php");
	$user = new User();	
	$contact_email = $user->contact($_POST);

	if($contact_email){
		$_SESSION['message'] = 'Your message has been submitted. Please allow 48 hours for a response.';
		header('Location: ' . $url .'contactsubmitted.php');
		exit;
 }
	else{
		$_SESSION['message'] = 'Email address not found. Please re-enter your email address.';  
		header('Location: ' . $url .'contactsubmitted.php');
		exit;
 }