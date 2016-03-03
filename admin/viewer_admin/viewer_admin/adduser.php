<?php
//echo "hello"; exit;
include('includes/inc.php');
include("includes/classes/class.user.php");
$user = new User();
$arr = NULL;
$data = NULL;

if(isset($_GET['act']) && $_GET['act'] == 'edit'){
	if(isset($_GET['id']) && $_GET['id'] != ''){
		$data = $user->get_user($_GET['id']);
	}
}
$arr['parent_id'] 	=	$_SESSION['user_id'];
$arr['username']	=	isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
$arr['password']	=	isset($_REQUEST['password']) ? base64_encode($_REQUEST['password']) : null;
$arr['email']		=	isset($_REQUEST['emailaddress']) ? $_REQUEST['emailaddress'] : null;
if($arr['parent_id'] != '' && $arr['email'] && $arr['password'] && $arr['username']){
	if(isset($_REQUEST['id'])){
		$arr['id'] = $_REQUEST['id'];
		//print_r($arr); exit;
		if($user->update_user($arr)){
			header( 'Location: http://wmlmusicguide.com/site/admin/viewer_admin/viewusers.php?act=updated' ) ;
		}else{
			header( 'Location: http://wmlmusicguide.com/site/admin/viewer_admin/adduser.php?success=fail' ) ;
		}
	}
	else{
		if($user->add_user($arr)){
			header( 'Location: http://wmlmusicguide.com/site/admin/viewer_admin/viewusers.php?act=added' ) ;
		}else{
			header( 'Location: http://wmlmusicguide.com/site/admin/viewer_admin/adduser.php?success=fail' ) ;
		}
	}
} 
//print_r($arr); exit;
layout('adduser',$data);
?>