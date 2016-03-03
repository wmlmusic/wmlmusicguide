<?php 
// register_shutdown_function('shutdownFunction');
session_start();
$action = NULL;
$error = false;
$your_email = NULL;
// print_r($_POST); exit;
// $username = $_POST['username'];
if(isset($_GET['act'])){
	$sha = $_GET['act'];
	if($sha =='logout'){
		unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_type']);
		header("location: index.php");
		exit;
	}
}
$pass = $_POST['password'];

if(isset($_REQUEST['submit'])){
	$action = $_REQUEST['submit'];
	if($action =='submit'){
		include('includes/classes/class.customer.php');
		$arr_agents = array();
		$arr_email = array();
		
		$customer = new Customer();
		
		if(!empty($_POST['email'])){
			$user_info = $customer->admin_login($_POST['email']);
			if($user_info['user_type'] == 'administrator'){
				if($user_info){
					//print_r($user_info);
					if(base64_encode($_POST['password']) == $user_info['password']){
						//$pg = new Pages;
						$_SESSION['user_id'] = $user_info['id'];
						$_SESSION['username'] = $user_info['username'];
						$_SESSION['user_type'] = $user_info['user_type'];
						//print_r($_SESSION); exit;
						header('location: home.php');
						exit;
					}else{
						$error = true;
						header('location: index.php?act=wrong_details');
						exit;
					}				
				}else{
					$error = true;
					header('location: index.php?act=wrong_details');
					exit;
				}
			}
			else{
					$error = true;
					header('location: index.php?act=wrong_details');
					exit;
				}
		}else{
			$error = true;
			header('location: index.php?act=wrong_details');
			exit;
		}
	}
	else if($action == 'logout'){
		unset($_SESSION['user_id'],$_SESSION['user_name']);
		header("location: index.php?sha=". base64_encode('logout'));
		exit;
	}
}
?>