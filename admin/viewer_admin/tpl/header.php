<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Panel</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="../master_admin/public/css/chosen.css" type="text/css" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
 
<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script src="js/jquery/jquery.validate.js" type="text/javascript"></script>
<script src="../master_admin/public/js/chosen.jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  


<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>


<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 250
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="images/shared/logo13.png" width="190" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	
 	<!--  end top-search -->
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
			
			<div class="nav-divider">&nbsp;</div>
			<a href="logincontroller.php?act=logout" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
		
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		
		<div class="nav">
		<div class="table">
		
		<ul <?php if(curPageName()=='home.php') {?> class="current" <?php }else { ?>  class="select" <?php } ?>><li><a href="home.php"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		<ul <?php if(curPageName()=='adduser.php' || curPageName()=='viewusers.php') {?> class="current" <?php }else { ?>  class="select" <?php } ?>><li><a href="#nogo"><b>Users</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li <?php if(curPageName()=='adduser.php'){ ?> class="sub_show" <?php } ?>><a href="adduser.php">Add World Music Listing</a></li>
				
				<li <?php if(curPageName()=='viewusers.php'){ ?> class="sub_show" <?php } ?>><a href="viewusers.php">View World Music Directory</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul <?php if(curPageName()=='users_account.php') {?> class="current" <?php }else { ?>  class="select" <?php } ?> ><li><a href="#nogo"><b>Account Details</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li <?php if(curPageName()=='users_account.php'){ ?> class="sub_show" <?php } ?>><a href="users_account.php">View Account</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		                    
		
		<ul <?php if(curPageName()=='newgallery.php' || curPageName()=='managegallery.php') {?> class="current" <?php }else { ?>  class="select" <?php } ?>><li><a href="#nogo"><b>Gallery</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li <?php if(curPageName()=='newgallery.php'){ ?> class="sub_show" <?php } ?>><a href="newgallery.php">New Gallery</a></li>
				<li <?php if(curPageName()=='managegallery.php'){ ?> class="sub_show" <?php } ?>><a href="managegallery.php">Manage Gallery</a></li>
				
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if(curPageName()=='manage_login_detail.php' || curPageName()=='addcontact_info.php' || curPageName()=='addsocial_links.php' || curPageName()=='company_info.php' || curPageName()=='social_form.php' || curPageName()=='artist_form.php' || curPageName()=='artist.php')  {?> class="current" <?php }else { ?>  class="select" <?php } ?>><li><a href="#nogo"><b>Manage</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li <?php if(curPageName()=='manage_login_detail.php'){ ?> class="sub_show" <?php } ?>><a href="manage_login_detail.php">Change Password</a></li>
				<li <?php if(curPageName()=='company_info.php'){ ?> class="sub_show" <?php } ?>><a href="company_info.php">Update Company Info</a></li>
				<?php if($_SESSION['company_id'] > 0){ ?>
				<li <?php if(curPageName()=='social_form.php'){ ?> class="sub_show" <?php } ?>><a href="social_form.php?type=company&id=<?php echo $_SESSION['company_id'] ?>">Social Media</a></li>
				<li <?php if(curPageName()=='artist_form.php'){ ?> class="sub_show" <?php } ?>><a href="artist_form.php">New Client</a></li>
				<li <?php if(curPageName()=='artist.php'){ ?> class="sub_show" <?php } ?>><a href="artist.php">Clients</a></li>

				<?php } ?>
				<!-- <li <?php if(curPageName()=='manage_login_detail.php'){ ?> class="sub_show" <?php } ?>><a href="manage_login_detail.php">Change Password</a></li>
				<li <?php if(curPageName()=='addcontact_info.php'){ ?> class="sub_show" <?php } ?>><a href="addcontact_info.php">Add/Update Contact Info</a></li>
				<li <?php if(curPageName()=='addsocial_links.php'){ ?> class="sub_show" <?php } ?>><a href="addsocial_links.php">Add/Update Social Links</a></li> -->
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if(curPageName()=='post.php' || curPageName()=='post_form.php') {?> class="current" <?php }else { ?>  class="select" <?php } ?>><li><a href="#nogo"><b>Post</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li <?php if(curPageName()=='post_form.php'){ ?> class="sub_show" <?php } ?>><a href="post_form.php">New Post</a></li>
				<li <?php if(curPageName()=='post.php'){ ?> class="sub_show" <?php } ?>><a href="post.php">Manage Post</a></li>
				
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
