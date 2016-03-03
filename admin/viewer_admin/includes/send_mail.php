<?php
	function sendemail($vemail, $origpassword)
	{
		$to 		= $vemail;
		$subject 	= "Forget Password notification- WML Guide";
		$from 		= "info@wmlmusicguide.com";
		$headers 	= "From: " . $from;

		$message = " Dear User,\r\n \r\n Your login credentials are as follows:\r\n\r\n Email: ".$vemail." \r\n Password:".$origpassword." \r\n";
		mail($to,$subject,$message,$headers);
	}

	function password_changed($vemail, $origpassword)
	{
		$to 		= $vemail;
		$subject 	= "Password Updated notification- WML Guide";
		$from 		= "info@wmlmusicguide.com";
		$headers 	= "From: " . $from;

		$message = " Dear User,\r\n \r\n Your password have been just changed. Your login credentials are as follows:\r\n\r\n Email: ".$vemail." \r\n Password:".$origpassword." \r\n";
		mail($to,$subject,$message,$headers);
	}

?>