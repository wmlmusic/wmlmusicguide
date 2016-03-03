<?php
//echo "hello"; exit;
include('includes/inc.php');
include("includes/classes/class.user.php");
$user = new User();
$data = NULL;

$data = $user->get_all_users($_SESSION['user_id']);
//print_r($arr); exit;
layout('users_account',$data);
?>