<?php

$user=$_POST['username'];
$pass=$_POST['password'];
$email=$_POST['emailaddress'];

$check=insert($user,$pass,$email);
if($check==true)
{

  header( 'Location: http://str8swagg.com/site/admin/viewuser.php' ) ;
}
else
{

header( 'Location: http://str8swagg.com/site/admin/adduser.php' ) ;
}
function insert($name,$password,$email){
    $con = mysql_connect("50.63.106.63","erockoden","Str8swagg");
    $insert=false;

    
    if (!$con)
        die('Can not connect: ' . mysql_error());

    
      mysql_select_db("erockoden", $con);
    $result = mysql_query("INSERT INTO login (username,password,email) VALUES('".$name."','".$password."','".$email."')");
    
    if ($result){
        $insert=true;
    }
    
    mysql_close($con);
    return $insert;
}


?>