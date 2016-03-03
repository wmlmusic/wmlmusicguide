<?php
    /**
     * Developed by Jay Gaha
     * http://jaygaha.com.np
    */
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('Location: ' . $url .'/company_login.php');
        exit;
    }
    include('includes/inc-public.php');
    include 'includes/classes/class.user.php';
    
    $user = new User();
    // echo $user->logOut();
    // $valid = $user->logIn($_POST['su_email'], $_POST['su_password']);
    $posted = $user->logInCompany($_POST['com_email'], $_POST['com_password']);
    if($valid) {
        // header('Location: ' . $url);
        exit();
    }
    /*$_SESSION['error'] = 'Invalid login credentials. Please try again.';
    header('Location: ' . $url .'/company_login.php');*/
    exit();