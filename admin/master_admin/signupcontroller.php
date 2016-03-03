<?php
include("classes/class.user.php");
$user = new User();
//print_r($_POST); exit;

$user_detail['username'] = $_POST['username'];
$user_detail['password'] = $_POST['password'];
$user_detail['email'] = $_POST['emailaddress'];

if(isset($_POST['user_id']) && !empty($_POST['user_id'])){
	$user_detail['id'] = $_POST['user_id'];
	$user->update_user($user_detail);
	header("Location: http://wmlmusicguide.com/site/admin/master_admin/viewuser.php?act=updated");
	exit;
}
else{
	//print_r($user_detail); exit;
	//$check=$user->add_user($user_dateil);
	if($user->add_user($user_detail))
	{
	  header( 'Location: http://wmlmusicguide.com/site/admin/master_admin/viewuser.php?act=added' ) ;
	}
	else
	{
	header( 'Location: http://wmlmusicguide.com/site/admin/master_admin/adduser.php?success=fail' ) ;
	}
}

?>