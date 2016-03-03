<?php
include('includes/inc.php');
include('includes/send_mail.php');
include('includes/classes/class.user.php');
$user = New User();
if(isset($_POST['email']) && $_POST['email'] != ''){
	if($_POST['new_password'] == $_POST['confirm_password'] && $_POST['new_password'] != '' && $_POST['confirm_password'] != ''){
		$data = $user->login_details($_POST['email']);

		if($data['password'] == base64_encode($_POST['old_password'])){
				$new_password = $_POST['new_password'];
				$arr['id'] = $_SESSION['user_id']; 
				$newpassword_encrypt = base64_encode($new_password);
				$arr['password'] = $newpassword_encrypt;
				$user->update_user($arr);
				password_changed($_POST['email'], $_POST['new_password']);
				header('Location: manage_login_detail.php?act=success');
				exit;
			}
		else{
			header('Location: manage_login_detail.php?act=fail&region=oldpassword');
			exit;
		}
		//print_r($data); exit;
		
	}
	else{
		header('Location: manage_login_detail.php?act=fail&region=notmatch');
		exit;
	}
}
//print_r($_POST); exit;
$data = array();
layout('manage_login_details', $data);
?>