<?php
/*
$check=false;
$isadmin=1;
$check=valid($username,$pass,$isadmin);

if($check==true)
{

$_SESSION['username']=$username;

  header( "Location: http://str8swagg.com/site/admin/text.php" ) ;
}
else
{
$_SESSION['username']=null;

header( "Location: http://str8swagg.com/site/admin/login.php" ) ;
}

function valid($email,$password,$isadmin){
$con = mysql_connect("50.63.106.63","erockoden","Str8swagg");
    $valid=false;
    
    if (!$con)
        die('Could not connect: ' . mysql_error());
    
      mysql_select_db("erockoden", $con);
    $result = mysql_query("SELECT * FROM login where username='".$email."'"."and password='".$password."'"."and isadmin='".$isadmin."'");
    $row = mysql_fetch_array($result);
 
    if($row){
        $valid=true;
    }
    else{
        $valid=false;
    }
    
    mysql_close($con);
    return $valid;
} */
?>

<?php 
session_start();
$action = NULL;
$error = false;
$your_email = NULL;
//print_r($_POST); exit;
$username=$_POST['username'];
$pass=$_POST['password'];
if(isset($_GET['act'])){
	$sha = $_GET['act'];
	if($sha =='logout'){
		unset($_SESSION['user_id'],$_SESSION['user_name']);
		header("location: login.php");
		exit;
	}
}

if(isset($_REQUEST['submit'])){
	$action = $_REQUEST['submit'];
	if($action =='submit'){
		include('includes/classes/class.customer.php');
		//include('../includes/classes/class.pages.php');
		$arr_agents = array();
		$arr_email = array();
		
		$customer = new Customer();
	
		if(!empty($_POST['email'])){
			$user_info = $customer->admin_login($_POST['email']);
			//echo '<pre>';
			//print_r($user_info);
			//exit;
			if($user_info){
				if($_POST['password'] == $user_info['password']){
					//$pg = new Pages;
					$_SESSION['user_id'] = $user_info['id'];
					$_SESSION['username'] = $user_info['username'];
					header('location: home.php');
					exit;
				}else{
					$error = true;
					header('location: login.php?act=wrong_details');
					exit;
				}				
			}else{
				$error = true;
				header('location: login.php?act=wrong_details');
				exit;
			}
		}else{
			$error = true;
			header('location: login.php?act=wrong_details');
			exit;
		}
	}
	else if($action == 'logout'){
		unset($_SESSION['user_id'],$_SESSION['user_name']);
		header("location: index.php?sha=". base64_encode('logout'));
		exit;
	}
}
?>
<?php //include('tpl/index.php');?>