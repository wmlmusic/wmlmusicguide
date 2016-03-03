<?php
include('includes/inc.php');
include('includes/classes/class.customer.php');
$data = NULL;
$arr  = NULL;
$customer = new Customer();
//print_r($_SESSION);
if($_SESSION['user_id'] != '' && !empty($_POST['username'])){

	$arr = $_POST;
	$arr['user_id'] = $_SESSION['user_id'];
	$arr['Cover_Image'] = $_FILES['Cover_Image']['name'];
	$arr['Image1'] = $_FILES['Image1']['name'];
	$arr['Image2'] = $_FILES['Image2']['name'];
	$arr['Image3'] = $_FILES['Image3']['name'];
	$arr['Image4'] = $_FILES['Image4']['name'];
	if($arr['id'] == ''){
		if($customer->add_customer($arr)){
			header('location : http://wmlmusicguide.com/site/admin/viewer_admin/addcontact_info.php?status=added');
			exit;
		}else{
			header('location : http://wmlmusicguide.com/site/admin/viewer_admin/addcontact_info.php?status=addedfail');
			exit;
		}
	}else{
	$customer->update_customer($arr);
		header('location : http://wmlmusicguide.com/site/admin/viewer_admin/addcontact_info.php?status=updated');
		exit;
	}

}
$data = $customer->get_customer($_SESSION['user_id']);
layout('addcontact_info',$data);
?>