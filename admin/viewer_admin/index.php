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
	//print_r($data); exit;
	if(!empty($data['id'])){
		sendemail($data['email'], base64_decode($data['password']));
		header('Location: ' . $url . '?act=sendmail');
		exit;
	}
	else{
		header('Location: ' . $url . '?act=invalidemail');
		exit;
	}
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

<!-- jQuery UI styles -->
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/dark-hive/jquery-ui.css" id="theme">

<style>
/* Adjust the jQuery UI widget font-size: */
.ui-widget {
    font-size: 0.95em;
}
</style>
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="../viewer_admin/plugins/jQuery-File-Upload-master/css/jquery.fileupload.css">
<link rel="stylesheet" href="../viewer_admin/plugins/jQuery-File-Upload-master/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="../viewer_admin/plugins/jQuery-File-Upload-master/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="../viewer_admin/plugins/jQuery-File-Upload-master/css/jquery.fileupload-ui-noscript.css"></noscript>

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
		echo "<strong>You have entered a wrong email id or password.</strong><br /><br />";
	}
	if(isset($_GET['act']) && $_GET['act'] == 'sendmail'){
		echo "<strong>Please check your email account for your login details.</strong><br /><br />";
	}
	if(isset($_GET['act']) && $_GET['act'] == 'deactivate'){
		echo "<strong>You are not able to login. Your account is currently inactive.</strong><br /><br />";
	}
	if(isset($_GET['act']) && $_GET['act'] == 'invalidemail'){
		echo "<strong>Sorry, Provided email does not exist.</strong><br /><br />";
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
			<td><input type="password" name="password" onfocus="this.value=''" class="login-inp" autocomplete="off" /></td>
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
			<td><input type="text" value="" name="email_id"  class="login-inp" autocomplete="off" /></td>
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