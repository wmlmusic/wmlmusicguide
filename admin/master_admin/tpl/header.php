<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>World Music Listing: Master Admin</title>
<link rel="stylesheet" href="public/css/screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="public/css/chosen.css">
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="public/js/jquery/jquery.min.js" type="text/javascript"></script>
<script src="public/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="public/js/chosen.jquery.min.js" type="text/javascript"></script>

</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="home.php"><img src="images/shared/logo13.png" width="100" height="40" alt="" /></a>
	</div>
	<!-- end logo -->	
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<a href="logincontroller.php?act=logout" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
			<div class="table">		
				<ul<?php if(curPageName()=='home.php') {?> class="current" <?php }else { ?>  class="select" <?php } ?>>
					<li><a href="home.php"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
						<!--[if lte IE 6]><table><tr><td><![endif]-->
						<!--[if lte IE 6]></td></tr></table></a><![endif]-->
					</li>
				</ul>
				<div class="nav-divider">&nbsp;</div>
				<?php
					$wmlPages 	= array('category.php', 'field.php', 'genre.php', 'social.php','social_form.php', 'company_form.php', 'company.php', 'artist_form.php', 'artist.php', 'profile.php');
					$bannerPages = array('banner.php', 'banner_form.php');
					$postPages = array('post.php', 'post_form.php');
					$curretPage = basename($_SERVER['PHP_SELF']);
				?>
				<ul<?php if(in_array($curretPage, $wmlPages)) {?> class="current" <?php }else { ?>  class="select" <?php } ?>>
					<li><a href="#nogo"><b>World Music Listing</b><!--[if IE 7]><!--></a><!--<![endif]-->
						<!--[if lte IE 6]><table><tr><td><![endif]-->
						<div class="select_sub show">
							<ul class="sub">
								<li <?php if($curretPage == 'category.php') {?> class="sub_show" <?php } ?>><a href="category.php">Category</a></li>
								<li <?php if($curretPage == 'genre.php') {?> class="sub_show" <?php } ?>><a href="genre.php">Genre</a></li>										
								<li <?php if($curretPage == 'field.php') {?> class="sub_show" <?php } ?>><a href="field.php">Field</a></li>				
								<li <?php if($curretPage == 'social.php') {?> class="sub_show" <?php } ?>><a href="social.php">Social Media</a></li>				
								<li <?php if($curretPage == 'company_form.php') {?> class="sub_show" <?php } ?>><a href="company_form.php">New Company</a></li>
								<li <?php if($curretPage == 'company.php') {?> class="sub_show" <?php } ?>><a href="company.php">Company</a></li>
								<li <?php if($curretPage == 'artist_form.php') {?> class="sub_show" <?php } ?>><a href="artist_form.php">New Client</a></li>
								<li <?php if($curretPage == 'artist.php') {?> class="sub_show" <?php } ?>><a href="artist.php">Clients</a></li>
								<li <?php if($curretPage == 'profile.php') {?> class="sub_show" <?php } ?>><a href="profile.php">Profile</a></li>

							</ul>
						</div>
						<!--[if lte IE 6]></td></tr></table></a><![endif]-->
					</li>
				</ul>
				<div class="nav-divider">&nbsp;</div>
				<ul<?php if(in_array($curretPage, $bannerPages)) {?> class="current" <?php }else { ?>  class="select" <?php } ?>>
					<li><a href="#nogo"><b>Banners</b><!--[if IE 7]><!--></a><!--<![endif]-->
						<!--[if lte IE 6]><table><tr><td><![endif]-->
						<div class="select_sub show">
							<ul class="sub">								
								<li <?php if($curretPage == 'banner_form.php') {?> class="sub_show" <?php } ?>><a href="banner_form.php">New Banner</a></li>
								<li <?php if($curretPage == 'banner.php') {?> class="sub_show" <?php } ?>><a href="banner.php">Banners</a></li>
							</ul>
						</div>
						<!--[if lte IE 6]></td></tr></table></a><![endif]-->
					</li>
				</ul>
				<div class="nav-divider">&nbsp;</div>
				<ul<?php if(in_array($curretPage, $postPages)) {?> class="current" <?php }else { ?>  class="select" <?php } ?>>
					<li><a href="#nogo"><b>Posts</b><!--[if IE 7]><!--></a><!--<![endif]-->
						<!--[if lte IE 6]><table><tr><td><![endif]-->
						<div class="select_sub show">
							<ul class="sub">								
								<li <?php if($curretPage == 'post_form.php') {?> class="sub_show" <?php } ?>><a href="post_form.php">New post</a></li>
								<li <?php if($curretPage == 'post.php') {?> class="sub_show" <?php } ?>><a href="post.php">Posts</a></li>
							</ul>
						</div>
						<!--[if lte IE 6]></td></tr></table></a><![endif]-->
					</li>
				</ul>
				<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>