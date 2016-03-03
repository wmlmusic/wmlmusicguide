<?php
include('includes/inc.php');
include('includes/classes/class.customer.php');
$data = NULL;
$arr  = NULL;
$customer = new Customer();
//print_r($_SESSION);
if(isset($_POST['Amazon'])){
	$arr = $_POST;
	$arr['user_id'] = $_SESSION['user_id'];
	//print_r($arr); 
	$var = $customer->get_social_links($_SESSION['user_id']);
	//echo $var;
	//exit;
	if($var){
		$customer->update_social_links($arr);
		header('location : http://wmlmusicguide.com/site/admin/viewer_admin/addsocial_links.php?status=updated');
		exit;
	}else{
		if($customer->add_social_links($arr)){
			header('location : http://wmlmusicguide.com/site/admin/viewer_admin/addsocial_links.php?status=added');
			exit;
		}else{
			header('location : http://wmlmusicguide.com/site/admin/viewer_admin/addsocial_links.php?status=addedfail');
			exit;
		}
		
	}

}
//print_r($_POST); exit;
//print_r($arr);
//exit;

$data = $customer->get_social_links($_SESSION['user_id']);
layout('addsocial_links',$data);
?>