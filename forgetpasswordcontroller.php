<?php
    if(!$_POST){
        exit('No Direct access.');
    }
    include_once('datalogin.php');

    $vemail=$_POST['vemail'];

    $flag=$_POST['flag'];
    $setmessage = '';

$output="-1";


$output=getsecurity($vemail,$flag);

if($flag==0)
{

echo $output;

}
else
if($flag==1)
{

if($output==$_POST['vsecans'])
{

echo "1";

}
else
echo "0";
}
else
if($flag==2)
{

    $password=$_POST['vpassword'];
    $origpassword=$_POST['origpassword'];
     $valid = setupdatedpassword($vemail,$password);

     if($valid==true)
     {
        $setmessage = "Password has been changed successfully.";
        sendemail($vemail,$origpassword);
     }
     else
        $setmessage =  "Password could not changed.";
}

function sendemail($vemail,$origpassword)
{


$to = $vemail;
$subject = "Password reset notification - WML Guide";
$from = "worldmusiclisting@wmlmusicguide.com";
$headers = "From: " . $from;

$message=" Dear User,\r\n \r\n Your password has been successfully changed.\r\n Your new credentials are as follows:\r\n\r\n Email: ".$vemail." \r\n Password:".$origpassword." \r\n";
mail($to,$subject,$message,$headers);


}


function getsecurity($email,$flag){
    $result = mysql_query("SELECT * FROM wmldir_users where vuname='".$email."'");

    $output="-1";
    while($row= mysql_fetch_array($result))
    {

       if($flag==0)
    $output=$row['vsecques'];
       else
       $output=$row['vsecans'];
    }

    return $output;
}

function setupdatedpassword($email,$password)
{
    $result = mysql_query("UPDATE wmldir_users SET vpassword='".$password."' WHERE vuname='".$email."'");
	 if ($result){
        $valid=true;
    }
    else{
        $valid=false;
    }

    return $valid;
}
if($flag == 2) {
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
      <meta charset="UTF-8" /> 
      <title>World Music Listing: <?php echo($setmessage) ?></title>
      <link rel="stylesheet" type="text/css" href="css/login_style.css" />
      <style type="text/css">
        #content {
            margin: 0 auto;
            padding: 15px;
            font-size: 15px;
        }
      </style>
  </head>
  <body>
    <div id="content">
        <?php echo($setmessage) ?>
    </div>
  </body>
</html>
<?php } ?>