<?php
  /**
   * Developed by Jay Gaha
   * http://jaygaha.com.np
  */
  $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: ' . $url .'/wml_login.php');
    exit;
  }
  include('includes/inc-public.php');
  include("includes/classes/class.user.php");
  $user  = new User();
  $new_member = $user->register($_POST);

  if($new_member){
    $_SESSION['message'] = 'You have Signed up successfully. You can login now.';
    header('Location: ' . $url .'/wml_login.php');
    exit;
  }
  else{
    header('Location: ' . $url .'/wml_signup.php');
    exit;
  }