<?php
    /**
     * Developed by Jay Gaha
     * http://jaygaha.com.np
     */
    include('../includes/inc-public.php');
    include("../includes/classes/class.music_dir.php");
    $directory  = new Music_Directory();

    include '../includes/classes/class.user.php';
    
    $user = new User();

    $data['user'] = $user;
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $data['page_title'] = 'World Music Listing: Forgot Your Password?';
    $data['wmlMusicListing'] = $directory->getMusicPropListingByField('field');

    $data['musicListing'] = $directory->getMusicDirectoryListing();
    $data['special_head'] = true;

    $step = isset($_GET['step']) ? 0 + $_GET['step'] : 0;

    if($step > 0){
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            header('Location: ' . $url .'/wml_password.php');
            exit;
        }
    }

    switch ($step) {
        case '1':
                $email = $_POST['su_email'];
                $isvalid = $user->get_email($email);
                if(!$isvalid){
                    $_SESSION['error'] = 'Email not found in our system. Please try again.';
                    header('Location: ' . $url .'/wml_password.php?msg=' . $_SESSION['error']);
                    exit;
                }
                $data['question']   = $isvalid['vsecques'];
                $data['forgtid']    = $isvalid['iuserid'];
            break;

        case '2':
                $frget_id = isset($_POST['forgtid']) ? $_POST['forgtid'] : null;
                $answer = isset($_POST['su_answer']) ? $_POST['su_answer'] : null;
                
                $is_valid = $user->get_dataById($frget_id);
                if($is_valid){
                    if($is_valid['vsecans'] == trim($answer)){
                        $data['forgtid']    = $frget_id;
                        $data['show_new_input'] = true;
                    }
                    else{
                        $_SESSION['error'] = 'Invalid Answer. Please try again.';
                        header('Location: ' . $url .'/wml_password.php?msg=' . $_SESSION['error']);
                        exit;
                    }
                }
                else{
                    $_SESSION['error'] = 'Answer is required. Please try again.';
                    header('Location: ' . $url .'/wml_password.php?msg=' . $_SESSION['error']);
                    exit;
                }
            break;

        case '3':
                $frget_id = isset($_POST['forgtid']) ? $_POST['forgtid'] : null;
                $password = isset($_POST['su_password']) ? $_POST['su_password'] : null;
                if($frget_id > 0 && strlen($password) > 5){
                    $is_changed = $user->reset_password($frget_id, $password);
                    $user->sendPasswordEmail($frget_id, $password);
                    $_SESSION['message'] = 'Your password is changed successfully. Now you can login.';
                    header('Location: ' . $url .'/wml_login.php?msg=' . $_SESSION['message']);
                    exit;
                }

            break;

        default:
            break;
    }
    $data['step'] = $step;

// echo "<pre>"; print_r($data);exit;
    layout('password', $data);
?>