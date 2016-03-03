<?php
	if(isset($_POST['forgot_password']) && $_POST['forgot_password'] == 'forgot'){
		$data = NULL;
		//print_r($_POST); exit;
		$email_id = $_POST['email_id'];
		include('includes/send_mail.php');
		include('includes/classes/class.user.php');
		$url = "http://" . $_SERVER['HTTP_HOST'] . preg_replace("#/[^/]*\.php$#simU", "/", $_SERVER["PHP_SELF"]);
		$user = new User();
		$data = $user->login_details($email_id);
		//print_r($data['id']); exit;
		if(!empty($data['id'])){
			if($email_id == 'worldmusiclisting@wmlmusicguide.com'){	
				sendemail_forgot_password($data['email'], base64_decode($data['password']));
				header('Location: ' . $url . '?act=sendmail');
				exit;				
			}
			else{
				header('Location: ' . $url . '?act=invalidemail');
				exit;
			}			
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
		if(isset($_GET['act']) && $_GET['act'] == 'invalidemail'){
			echo "<strong>The account you are trying to retrieve your password for is not authorized to be checked here. Please use the appropriate administration panel to receive your password notification.</strong><br /><br />";
		}
		if(isset($_GET['act']) && $_GET['act'] == 'wrong_details'){
			echo "<strong>You are attempting to access the World Music Listing Admin unauthorized.</strong><br /><br />";
		}
		if(isset($_GET['act']) && $_GET['act'] == 'sendmail'){
			echo "<strong>Success, Please check your email account for your login details.</strong><br /><br />";
		}
	?>
	<form method="post" class="signin" action="logincontroller.php">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<!-- <th>Username</th> -->
			<th>Email Id</th>
			<td>
				<input type="text" name="email" class="login-inp" autocomplete="off" />
			</td>
		</tr>
		<tr>
			<th>Password</th>
			<td>
				<input type="password" name="password"  autocomplete="off" onfocus="this.value=''" class="login-inp" />
			</td>
		</tr>
		<tr>
			<th></th>
			
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="submit" class="submit-login"  />
			</td>
		</tr>
		</table>
		</form>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ..............................................................................-->
	<div id="forgotbox">		
		<div id="forgotbox-text">Please enter your email id.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<form name="forgot_password" method="post" action="">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td>
				<input type="text" value="" name="email_id" class="login-inp" />
			</td>
		</tr>
		<tr>
			<th> </th>
			<td>
				<input type="submit" name="forgot_password" value="forgot" class="submit-login" />
			</td>
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
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress"></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="start" disabled>Start</button>
            {% } %}
            {% if (!i) { %}
                <button class="cancel">Cancel</button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
                <div><span class="error">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button>
            <input type="checkbox" name="delete" value="1" class="toggle">
        </td>
    </tr>
{% } %}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="js/jquery.fileupload-ui.js"></script>
<!-- The File Upload jQuery UI plugin -->
<script src="js/jquery.fileupload-jquery-ui.js"></script>
<!-- The main application script -->
<script src="js/main.js"></script>
<script>
// Initialize the jQuery UI theme switcher:
$('#theme-switcher').change(function () {
    var theme = $('#theme');
    theme.prop(
        'href',
        theme.prop('href').replace(
            /[\w\-]+\/jquery-ui.css/,
            $(this).val() + '/jquery-ui.css'
        )
    );
});
</script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
</body>
</html>