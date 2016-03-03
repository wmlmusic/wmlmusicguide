<?php
	if(isset($_POST['forgot_password']) && $_POST['forgot_password'] == 'forgot'){
		$data = NULL;
		// print_r($_POST); exit;
		$email_id = $_POST['email_id'];
		include('includes/send_mail.php');
		include('includes/classes/class.user.php');
		$url = "http://" . $_SERVER['HTTP_HOST'] . preg_replace("#/[^/]*\.php$#simU", "/", $_SERVER["PHP_SELF"]);
		$user = new User();
		$data = $user->login_details($email_id);
		// print_r($data); exit;
		if(!empty($data['id'])){
			sendemail_forgot_password($data['email'], base64_decode($data['password']));
			header('Location: ' . $url . '?act=sendmail');
			exit;
		}
		else{
			header('Location: ' . $url . '?act=invalidemail');
			exit;
		}
	}
	if(isset($_SESSION['user_id'])){
		header('location: home.php');
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin panel</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="images/shared/logo13.png" width="220" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
	<?php
		if(isset($_GET['act']) && $_GET['act'] == 'wrong_details'){
			echo "<strong>You are attempting to access the World Music Listing Admin unauthorized.</strong><br /><br />";
		}
		if(isset($_GET['act']) && $_GET['act'] == 'sendmail'){
			echo "<strong>Success, Please check your email account for your login details.</strong><br /><br />";
		}
		if(isset($_GET['act']) && $_GET['act'] == 'invalidemail'){
			echo "<strong>The account you are trying to retrieve your password for is not authorized to be checked here. Please use the appropriate administration panel to receive your password notification.</strong><br /><br />";
		}
	?>
	<form method="post" class="signin" action="logincontroller.php">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<!-- <th>Username</th> -->
			<th>Email Id</th>
			<td><input type="text" name="email"  class="login-inp" autocomplete="off" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="password"  autocomplete="off" onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="submit" value="submit" class="submit-login"  /></td>
		</tr>
		</table>
		 </form>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		
<!--		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div> -->
		<div id="forgotbox-text">Please enter your email id.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<form name="forgot_password" method="post" action="">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value="" name="email_id"  class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="submit" name="forgot_password" value="forgot" class="submit-login"  /></td>
		</tr>
		</table>
		</form>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>