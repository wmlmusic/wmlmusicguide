<?php
function sendemail_forgot_password($vemail,$origpassword){
	$to 		= $vemail;
	$subject 	= "Forget Password notification- WML Guide";
	$from 		= "info@wmlmusicguide.com";
	$headers 	= "From: " . $from;

	$message=" Dear User,\r\n \r\n Your login credentials are as follows:\r\n\r\n Email: ".$vemail." \r\n Password:".$origpassword." \r\n";
	mail($to,$subject,$message,$headers);
}


function send_update_mail($vemail,$origpassword,$user_type){
	$to = $vemail;
	$subject = "Update Profile notification- WML Guide";
	$from = "info@wmlmusicguide.com";
	$headers = "From: " . $from;

	$message=" Dear User,\r\n \r\n Your updated login credentials are as follows:\r\n\r\n Email: ".$vemail." \r\n Password:".$origpassword." \r\n Account Type:".$user_type." \r\n";
	mail($to,$subject,$message,$headers);
}


function send_create_account_mail($vemail,$origpassword,$user_type){
	$to = $vemail;
	$subject = "Create Profile notification- WML Guide";
	$from = "info@wmlmusicguide.com";
	$headers = "From: " . $from;

	$message=" Dear User,\r\n \r\n Your login credentials are as follows:\r\n\r\n Email: ".$vemail." \r\n Password:".$origpassword." \r\n Account Type:".$user_type." \r\n\r\n Login Link is as : http://wmlmusicguide.com/site/admin/viewer_admin/ \r\n";
	mail($to,$subject,$message,$headers);
}
?>