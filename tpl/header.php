<?php
	if (!class_exists('User')) {
		include 'includes/classes/class.user.php';    
	    $user = new User();    
	}
	else{
	    $user = new User();		
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo isset($data['page_title']) ? $data['page_title'] : 'Page Title'; ?></title>

		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Inconsolata:italic|Droid+Sans">
		<link rel="stylesheet" href="style.css" type="text/css" />
		<link rel="stylesheet" href="tabs.css" type="text/css" />
		<link rel="stylesheet" href="main.css" type="text/css" />
		<link rel="stylesheet" href="public/css/themes/blue/style.css" type="text/css" />
		<link rel="stylesheet" href="public/css/custom.css" type="text/css" />
		<link rel="stylesheet" href="public/css/jquery.nailthumb.1.1.min.css" type="text/css" />

		<script type="text/javascript" src="public/js/jquery.min.js"></script>
		<script type="text/javascript" src="public/js/jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="public/js/jquery.nailthumb.1.1.min.js"></script>
    	<!-- <script type="text/javascript" src="public/js/custom.js"></script> -->

	</head>
	<body>
	<!-- Start: page-top-outer -->
	<div id="page-top-outer">    
		<!-- Start: page-top -->
		<div id="page-top">
    		<a href="index.php"><img src="public/images/logo13.png" width="120" height="30" alt="" /></a>
			<!--  start top-search -->
			<div id="top-search">
				<div class="search-box">
                	<div class="search-box form-wrapper">
                		<div id="search-box-1">
                			<form action="search.php" id="search-form-1" method="get" target="_top">
                				<input id="search-text-1" name="q" placeholder="type here" type="text" />
								<button id="search-button-1" type="submit" class="search">Search</button>
							</form>
						</div>
                  		<!-- <form>
                   			<span class="search-box__pre-text" style="color: white;">Search </span>
                    		<input tabindex="1" id="search-box__input-box" class="top-search-inp" alt="search box" type="text" placeholder="Search">
                   			<button type='submit' value='Contact Info' onclick='search();' class='btn'>Search</button>
                    		<div class="search-box__submit-btn-icon"></div>
                  		</form> -->
                	</div>
              	</div>
			</div>
 			<!--  end top-search -->
 			<div class="clear"></div>
		</div>
		<!-- End: page-top -->
	</div>
	<!-- End: page-top-outer -->
	
	<div class="clear">&nbsp;</div>

	<!--  start nav-outer-........ START -->
	<div class="nav-outer-repeat">
		<!--  start nav-outer -->
		<div class="nav-outer">
			<!-- start nav-right -->
			<div id="nav-right">		
				<div class="nav-divider">&nbsp;</div>
				<?php if ($user->isLoggedIn() && !$user->isPayment()) : ?>
					<div class="showhide-account">
						<a href="pay.php">Purchase Directory</a>
						<!-- <img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /> -->
					</div> 
				<?php endif; ?>
				<div class="nav-divider">&nbsp;</div>
				<?php if ($user->isLoggedIn()) : ?>
				<a href="logout.php" id="logout">
					<img src="admin/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" />
				</a>
				<?php else: ?>
					<a href="wml_login.php" id="logout" class="signin">Log in/</a>
					<a href="wml_signup.php" id="logout" class="signin">Register</a>
				<?php endif; ?>
				<div class="clear">&nbsp;</div>		
			</div>
			<!-- end nav-right -->
			<!--  start nav -->
			<?php
				$arrayNav = array('directory_page.php', 'about_wml.php', 'wml_directory.php');
			?>
			<div class="nav">
				<div class="table">		
        			<ul <?php echo !in_array(curPageName(), $arrayNav) ? 'class="current"' : 'class="select"' ?>><li><a href="index.php"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]-->
					<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		<?php
			$special_header = array('profile', 'single_profile');
			if(isset($data['special_head'])):
		?>
		<ul <?php echo curPageName() == 'wml_directory.php' ? 'class="current"' : 'class="select"' ?>><li><a href="wml_directory.php"><b>World Music Listing</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>		
		<div class="nav-divider">&nbsp;</div>
		<ul <?php echo curPageName() == 'about_wml.php' ? 'class="current"' : 'class="select"' ?>><li><a href="about_wml.php"><b>About WML</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>		
		<div class="nav-divider">&nbsp;</div>
		<ul <?php echo curPageName() == 'directory_page.php' ? 'class="current"' : 'class="select"' ?>><li><a href="directory_page.php"><b>Directory</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>		
		<div class="nav-divider">&nbsp;</div>
		<ul class="select" ><li><a href="m"><b>Mobile</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>		
		<div class="nav-divider">&nbsp;</div>
		<ul class="select" ><li><a href="contact.php"><b>Contact</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>		
		<div class="nav-divider">&nbsp;</div>
		


		<?php
			else:
		?>
        
        <ul class="select" ><li><a href="#nogo"><b>Browse</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
        
		<ul class="select" ><li><a href="#nogo"><b>Register Users</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li ><a href="adduser.php">Add Users</a></li>
				
				<li class="sub_show"><a href="viewuser.php">View All Users</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
        
<ul class="select" ><li><a href="#nogo"><b>Create</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li ><a href="adduser.php">Add Users</a></li>
				
				<li class="sub_show"><a href="viewuser.php">View All Users</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
        		                    
		<ul class="select" ><li><a href="#nogo"><b>Events</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="vieweventreq.php">View Event Requests</a></li>
				<li ><a href="addevent.php">Add Event</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
        
        <ul class="select" ><li><a href="#nogo"><b>Manage</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li ><a href="adduser.php">Account</a></li>
				
				<li class="sub_show"><a href="viewuser.php">Profile</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
        <ul class="select"><li><a href="#nogo"><b>Music</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="addpicture.php">Add Music</a></li>
				<li><a href="deletepicture.php">Delete Music</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
        
		<ul class="select"><li><a href="#nogo"><b>Gallery</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="addpicture.php">Add Pictures</a></li>
				<li><a href="deletepicture.php">Delete Pictures</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Video</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="addpicture.php">Add Videos</a></li>
				<li><a href="deletepicture.php">Delete Videos</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
<ul class="select"><li><a href="#nogo"><b>Admin</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="addpicture.php">Add Pictures</a></li>
				<li><a href="deletepicture.php">Delete Pictures</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>		
		
		<?php endif; ?>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>

		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat............... END -->

		<div class="wrap">
  			<div class="main">