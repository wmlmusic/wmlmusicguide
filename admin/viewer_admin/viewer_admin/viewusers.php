<?php
//echo "hello"; exit;
include('includes/inc.php');
include("includes/classes/class.user.php");
$user = new User();
$arr = NULL;
//print_r($_GET); exit;
if(isset($_GET['act'])){
	if($_GET['act'] == 'delete'){
		if(isset($_GET['id']) && $_GET['id'] != ''){
			$id = $_GET['id'];
			if($user->check_user_customer($_SESSION['user_id'],$id)){
				if($user->delete_user($id)){
					header("location: http://wmlmusicguide.com/site/admin/viewer_admin/viewusers.php?act=deleted");
					exit;
				}
			}
		}
	}
	if($_GET['act'] == 'status'){
		if(isset($_GET['id']) && $_GET['id'] != ''){
			$id = $_GET['id'];
			if($user->check_user_customer($_SESSION['user_id'],$id)){
				$user->update_user_customer_status($id);
				header("location: http://wmlmusicguide.com/site/admin/viewer_admin/viewusers.php?act=updated");
				die;
			}
		}
	}
}
$data = $user->get_all_users($_SESSION['user_id']);
//print_r($arr); exit;
layout('viewusers',$data);
?>