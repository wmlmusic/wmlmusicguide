<?php
  /**
   * Developed by Jay Gaha
   * http://jaygaha.com.np
   */
  	include 'includes/classes/class.user.php';    
    $user = new User();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$user->update_payment($_SESSION['userauth_login']);
    }
    $msg = isset($_GET['msg']) ? $_GET['msg'] : 'Unknown Message';
    header('Location: index.php');
    exit;