<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Panel</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
 
<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
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
			<a href="login.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
		
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		
		<div class="nav">
		<div class="table">
		
        <ul class="current" ><li><a href="#nogo"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
        
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
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Add Contact</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="addcontact_info.php">Contact Info</a></div>
			
			<div class="step-no">2</div>
			<div class="step-dark-left"><a href="addsocial_links.php">Social Links</a></div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		 	<form method="post" enctype="multipart/form-data" class="signin" action="newpiccontroller.php">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		<th>Company:</th>
		<td>
					<input type="text" name="company_name" />
		</td>
		</tr>
		<tr>
		<th>Management:</th>
		<td>
					<input type="text" name="mgt_name" />
		</td>
		</tr>
        <tr>
		<th>Label:</th>
		<td>
					<input type="text" name="label" />
		</td>
		</tr>
		<tr>
		<th>Name:</th>
		<td>
					<input type="text" name="contact_name" />
		</td>
		</tr>
		<tr>
		<th>Category:</th>
		<td>
                    <select id="select_category" name="select_category">
                      <option value="Select"> Select
  						</option> <option value="Music">Music</option>
                        <option value="Entertainment">Entertainment</option>
							</option>
                    </select>
		</td>
		</tr>       
		<tr>
		<th>Genre:</th>
		<td>
                    <select id="genre" name="genre">
                      <option value="Select"> Select
  						</option> <option value="Country">Country</option>
                        <option value="Dancehall">Dancehall</option>
							</option>
                    </select>
		</td>
		</tr>
		<tr>
		<th>Field:</th>
		<td>
                    <select id="select_field" name="select_field">
                      <option value="Select"> Select
  						</option> <option value="Artist">Artist</option>
                        <option value="Disc Jock/Radio Personnel">Disc Jock/Radio Personnel</option>
							</option>
                    </select>
		</td>
		</tr>
		<tr>
		<th>President:</th>
		<td>
					<input type="text" name="contact_pres" />
		</td>
		</tr>
		<tr>
		<th>Vice President:</th>
		<td>
					<input type="text" name="contact_vp" />
		</td>
		</tr>
		<tr>
		<th>Manager:</th>
		<td>
					<input type="text" name="contact_manager" />
		</td>
		</tr>
		<tr>
		<th>CEO:</th>
		<td>
					<input type="text" name="contact_ceo" />
		</td>
		</tr>
		<tr>
		<th>A&R:</th>
		<td>
					<input type="text" name="contact_ar" />
		</td>
		</tr>
		<tr>
		<th>General Manager:</th>
		<td>
					<input type="text" name="gen_manager" />
		</td>
		</tr>
		<tr>
		<th>Road Manager:</th>
		<td>
					<input type="text" name="rd_manager" />
		</td>
		</tr>
		<tr>
		<th>Director:</th>
		<td>
					<input type="text" name="contact_dir" />
		</td>
		</tr>
		<tr>
		<th>Administration:</th>
		<td>
					<input type="text" name="contact_adminstration" />
		</td>
		</tr>
        <tr>
		<th>Business Affairs:</th>
		<td>
					<input type="text" name="bus_affair" />
		</td>
		</tr>
        <tr>
		<th>Licensing:</th>
		<td>
					<input type="text" name="contact_licensing" />
		</td>
		</tr>
		<tr>
		<th>Address:</th>
		<td>
					<input type="text" name="address" />
		</td>
		</tr>
		<tr>
		<th>Suite #:</th>
		<td>
					<input type="text" name="suite_num" />
		</td>
		</tr>
		<tr>
		<th>P.O. Box:</th>
		<td>
					<input type="text" name="po_box" />
		</td>
		</tr>
		<tr>
		<th>City:</th>
		<td>
					<input type="text" name="contact_city" />
		</td>
		</tr>
		<tr>
		<th>State:</th>
		<td>
					<input type="text" name="contact_state" />
		</td>
		</tr>
		<tr>
		<th>Country:</th>
		<td>
					<input type="text" name="contact_country" />
		</td>
		</tr>
		<tr>
		<th>Zip Code:</th>
		<td>
					<input type="text" name="zip_code" />
		</td>
		</tr>
		<tr>
		<th>Phone #:</th>
		<td>
					<input type="text" name="contact_phone" />
		</td>
		</tr>
		<tr>
		<th>Phone #1:</th>
		<td>
					<input type="text" name="phone_num" />
		</td>
		</tr>
		<tr>
		<th>Phone #2:</th>
		<td>
					<input type="text" name="phone_num1" />
		</td>
		</tr>
		<tr>
		<th>Phone #3:</th>
		<td>
					<input type="text" name="phone_num2" />
		</td>
		</tr>
		<tr>
		<th>Cell Phone #:</th>
		<td>
					<input type="text" name="contact_cell" />
		</td>
		</tr>
		<tr>
		<th>Fax #:</th>
		<td>
					<input type="text" name="fax_num" />
		</td>
		</tr>
		<tr>
		<th>Email:</th>
		<td>
					<input type="text" name="contact_email" />
		</td>
		</tr>
		<tr>
		<th>Email 1:</th>
		<td>
					<input type="text" name="email_1" />
		</td>
		</tr>
		<tr>
		<th>Email 2:</th>
		<td>
					<input type="text" name="email_2" />
		</td>
		</tr>
		<tr>
		<th>Email 3:</th>
		<td>
					<input type="text" name="email_3" />
		</td>
		</tr>
		<tr>
		<th>Details:</th>
		<td>
					<input type="text" name="contact_details" />
		</td>
		</tr>
		<tr>
		<th>Profile:</th>
		<td>
					<input type="text" name="contact_pro" value="http://www.wmlmusicguide.com/"/>
		</td>
		</tr>
		
			<tr>
	<th>Cover Image :</th>
	<td><input type="file" name="file1" id="file1" class="file_1" /></td>
	
	</tr>
	<tr>
	<th>Image 1:</th>
	<td><input type="file" name="file2" id="file2" class="file_1" /></td>
	
	</tr>
	<tr>
	<th>Image 2:</th>
	<td><input type="file" name="file3" id="file3" class="file_1" /></td>
	
	</tr>
	<tr>
	<th>Image 3:</th>
	<td><input type="file" name="file4" id="file4" class="file_1" /></td>
	
	</tr>
	<tr>
	<th>Image 4:</th>
	<td><input type="file" name="file5" id="file5" class="file_1" /></td>
	
	</tr>
	
	
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
			<input type="reset" value="" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	</table>
	</form>
	<!-- end id-form  -->

	</td>
	<td>

	<!--  start related-activities -->

	<!-- end related-activities -->

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>