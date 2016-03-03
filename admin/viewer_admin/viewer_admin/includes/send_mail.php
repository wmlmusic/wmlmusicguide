<?php

function sendemail($vemail,$origpassword)
{


$to = $vemail;
$subject = "Forget Password notification- WML Guide";
$from = "sarwarazhar55@gmail.com";
$headers = "From: " . $from;

$message=" Dear User,\r\n \r\n Your login credentials are as follows:\r\n\r\n Email: ".$vemail." \r\n Password:".$origpassword." \r\n";
mail($to,$subject,$message,$headers);

}
?>