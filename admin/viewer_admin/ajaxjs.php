<?php
//print_r($_POST); exit;
$connection = mysql_connect("localhost", "service_mybill", "BWwRmWbO7B^G"); // Establishing Connection with Server..
$db = mysql_select_db("service_billdev", $connection); // Selecting Database

function check_biller($user_id,$biller_name){
	$query = mysql_query("SELECT id FROM `user_biller` where user_id = '".$user_id."' and biller_name = '".$biller_name."'");
	$result = mysql_fetch_assoc($query);
	return $result['id'];
}
function check_biller_indb($b_name = NULL){
	$result = mysql_query("SELECT post_id, meta_value FROM 'wp_postmeta' WHERE meta_key = LIKE '".strtoupper($b_name)."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['name']);	
	}
	return $data;
}


if(isset($_POST['delete_biller']) && $_POST['delete_biller'] == 'delete' && $_POST['member_id'] != ''){
	$id = $_POST['b_id'];
	$member_id = $_POST['member_id'];
	//$sql ="DELETE FROM `user_biller` WHERE `user_id` ='".$member_id."' and `biller_id`= '".$biller_id."'";
	$query = mysql_query("DELETE FROM `user_biller` WHERE `user_id` ='".$member_id."' and  `id`= '".$id."'");
	//echo $sql;
	echo "Biller Removed from your account Successfully";
}
if(isset($_POST['update_biller']) && $_POST['update_biller'] == 'update' && $_POST['member_id'] != ''){
	$id = $_POST['b_id'];
	$future_date = $_POST['future_date'];
	$member_id = $_POST['member_id'];
	$query = mysql_query("UPDATE `user_biller` SET future_mail_date='".$future_date."' WHERE `user_id` ='".$member_id."' and  `id`= '".$id."'");
	echo "Biller Updated Successfully";
}
if(isset($_POST['added_biller']) && $_POST['added_biller'] == 'add_biller' ) {
	// Fetching Values From URL
	$biller_id 		= $_POST['b_id'];
	$biller_name		= $_POST['b_name'];
	$user_id		= $_POST['member_id'];
	$user_name		= $_POST['member_name']; 
	if(check_biller($user_id,$biller_id) == ''){
		if(check_biller_indb($biller_name)){
			//print_r($biller_name); exit;
			$query = mysql_query("INSERT INTO `user_biller`(user_id, user_name, biller_id, biller_name) values ('".$user_id."', '".$user_name."','".$biller_id."','".$biller_name."')");
			echo "Biller Added Successfully";
		} else{
			header('location:http://mybillcom.com/dev/member-area/?action=fail&region=notfound');
			exit;
		}
	}
	else{
		echo "Biller Already Added";
	}


}
if($_GET['type'] == 'biller'){
	$result = mysql_query("SELECT post_id, meta_value FROM 'wp_postmeta' WHERE meta_key = LIKE '".strtoupper($_GET['name_startsWith'])."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['name']);	
	}	
	echo json_encode($data);
}


if(isset($_POST['biller_detail']) && $_POST['biller_detail'] == 'added_biller'){
	$user_name = $_POST['user_name'];
	$user_id = $_POST['user_id'];
	$biller_name = $_POST['biller_address'];
	if(check_biller($user_id,$biller_name) == ''){
		$query = mysql_query("INSERT INTO `user_biller`(user_id, user_name, biller_name) values ('".$user_id."', '".$user_name."','".$biller_name."')");
		header('location:http://mybillcom.com/dev/member-area/?action=added');
		exit;
		//echo "Biller Added Successfully";
	}
	else{
		header('location:http://mybillcom.com/dev/member-area/?action=fail');
		exit;
		//echo "Biller Already Added";
	}

}

mysql_close($connection);
?>
