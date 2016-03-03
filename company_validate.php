<?php
  /**
   * Developed by Jay Gaha
   * http://jaygaha.com.np
  */
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    if(!isset($_GET['identifier'])){
        header('Location: ' . $url);
        exit;
    }

    include("includes/classes/class.user.php");
    $user  = new User();
    $validate = $user->validateEmail($_GET['identifier']);
     /*$new_member = $user->register_company($_POST);
    if($new_member){
        $_SESSION['message'] = 'Please confirm your email address to complete your registrataion.';
        header('Location: ' . $url .'/company_login.php');
        exit;
    }
    else{
        $_SESSION['error'] = 'Something went wrong. Please try again.';
        header('Location: ' . $url .'/company_signup.php');
        exit;
    }*/

