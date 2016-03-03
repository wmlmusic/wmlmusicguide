 <?php
 //print_r($data); 
 ?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1><?php if(!empty($data['username'])){ echo @$data['username'].'\'s'; }?> Full Contact Detail</h1></div>


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
			<div class="step-dark-left"><a href="user_full_detail.php?id=<?php echo @$data['id'] ?>">Contact Info</a></div>
			
			<div class="step-no">2</div>
			<div class="step-dark-left"><a href="user_full_social_detail.php?id=<?php echo @$data['id'] ?>">Social Links</a></div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		<th>Company:</th>
		<td><label><?php echo @$data['Company']; ?></label></td>
		</tr>
		<tr>
		<th>Management:</th>
		<td><label><?php echo @$data['Management'] ?></label></td>
		</tr>
        <tr>
		<th>Label:</th>
		<td><label><?php echo @$data['Labels'] ?></label></td>
		</tr>
		<tr>
		<th>Name:</th>
		<td><label><?php echo @$data['username'] ?></label></td>
		</tr>
		<tr>
		<th>Category:</th>
		<td><label><?php echo @$data['Category'] ?></label></td>
		</tr>       
		<tr>
		<th>Genre:</th>
		<td><label><?php echo @$data['Genre'] ?></label></td>
		</tr>
		<tr>
		<th>Field:</th>
		<td><label><?php echo @$data['Field'] ?></label></td>
		</tr>
		<tr>
		<th>President:</th>
		<td><label><?php echo @$data['President'] ?></label></tr>
		<tr>
		<th>Vice President:</th>
		<td><label><?php echo @$data['VicePresident'] ?></label></td>
		</tr>
		<tr>
		<th>Manager:</th>
		<td><label><?php echo @$data['Manager'] ?></label></td>
		</tr>
		<tr>
		<th>CEO:</th>
		<td><label><?php echo @$data['CEO'] ?></label></td>
		</tr>
		<tr>
		<th>A&R:</th>
		<td><label><?php echo @$data['AnR'] ?></label></td>
		</tr>
		<tr>
		<th>General Manager:</th>
		<td><label><?php echo @$data['General_Manager'] ?></label></td>
		</tr>
		<tr>
		<th>Road Manager:</th>
		<td><label><?php echo @$data['Road_Manager'] ?></label></td>
		</tr>
		<tr>
		<th>Director:</th>
		<td><label><?php echo @$data['Director'] ?></label></td>
		</tr>
		<tr>
		<th>Administration:</th>
		<td><label><?php echo @$data['Administration'] ?></label></td>
		</tr>
        <tr>
		<th>Business Affairs:</th>
		<td><label><?php echo @$data['Business_Affairs'] ?></label></td>
		</tr>
        <tr>
		<th>Licensing:</th>
		<td><label><?php echo @$data['Licensing'] ?></label></td>
		</tr>
		<tr>
		<th>Address:</th>
		<td><label><?php echo @$data['Address'] ?></label></td>
		</tr>
		<tr>
		<th>Suite #:</th>
		<td><label><?php echo @$data['Suite'] ?></label></td>
		</tr>
		<tr>
		<th>P.O. Box:</th>
		<td><label><?php echo @$data['P_O_Box'] ?></label></td>
		</tr>
		<tr>
		<th>City:</th>
		<td><label><?php echo @$data['City'] ?></label></td>
		</tr>
		<tr>
		<th>State:</th>
		<td><label><?php echo @$data['State'] ?></label></td>
		</tr>
		<tr>
		<th>Country:</th>
		<td><label><?php echo @$data['Country'] ?></label></td>
		</tr>
		<tr>
		<th>Zip Code:</th>
		<td><label><?php echo @$data['ZipCode'] ?></label></td>
		</tr>
		<tr>
		<th>Phone #:</th>
		<td><label><?php echo @$data['Phone'] ?></label></td>
		</tr>
		<tr>
		<th>Phone #1:</th>
		<td><label><?php echo @$data['Phone1'] ?></label></td>
		</tr>
		<tr>
		<th>Phone #2:</th>
		<td><label><?php echo @$data['Phone2'] ?></label></td>
		</tr>
		<tr>
		<th>Phone #3:</th>
		<td><label><?php echo @$data['Phone3'] ?></label></td>
		</tr>
		<tr>
		<th>Cell Phone #:</th>
		<td><label><?php echo @$data['Cellphone'] ?></label></td>
		</tr>
		<tr>
		<th>Fax #:</th>
		<td><label><?php echo @$data['Fax'] ?></label></td>
		</tr>
		<tr>
		<th>Email:</th>
		<td><label><?php echo @$data['Email'] ?></label></td>
		</tr>
		<tr>
		<th>Email 1:</th>
		<td><label><?php echo @$data['Email1'] ?></label></td>
		</tr>
		<tr>
		<th>Email 2:</th>
		<td><label><?php echo @$data['Email2'] ?></label></td>
		</tr>
		<tr>
		<th>Email 3:</th>
		<td><label><?php echo @$data['Email3'] ?></label></td>
		</tr>
		<tr>
		<th>Details:</th>
		<td><label><?php echo @$data['Details'] ?></label></td>
		</tr>
		<tr>
		<th>Profile:</th>
		<td><label><?php echo @$data['Profile'] ?></label></td>
		</tr>
		
		<tr>
		<th>Cover Image :</th>
		<td><label><?php echo @$data['Cover_Image'] ?></label></td>
		</tr>
		<tr>
		<th>Image 1:</th>
		<td><label><?php echo @$data['Image1'] ?></label></td>
		</tr>
		<tr>
		<th>Image 2:</th>
		<td><label><?php echo @$data['Image2'] ?></label></td>
		</tr>
		<tr>
		<th>Image 3:</th>
		<td><label><?php echo @$data['Image3'] ?></label></td>
		</tr>
		<tr>
		<th>Image 4:</th>
		<td><label><?php echo @$data['Image4'] ?></label></td>
		</tr>
		
	</table>
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
