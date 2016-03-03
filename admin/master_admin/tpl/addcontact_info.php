 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Update Super Admin Contact Information</h1></div>


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
			<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				
				<?php if(isset($_GET['status']) && $_GET['status'] == 'updated') { ?>
				<tr>
					<td class="green-left">Links updated sucessfully.</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				<?php } ?>
				<?php if(isset($_GET['status']) && $_GET['status'] == 'added') { ?>
				<tr>
					<td class="green-left">Links added sucessfully.</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				<?php } ?>
				</table>
				</div>

	
	
		<!-- start id-form -->
		<form method="post" enctype="multipart/form-data" class="signin" action="">
		<input type="hidden" name="id" value="<?php echo @$data['id']; ?>" />
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		<th>Name:</th>
		<td>
			<input type="text" name="name" class="inp-form" value="<?php echo @$data['name']; ?>" />
		</td>
		</tr>
		<tr>
		<th>Phone:</th>
		<td>
			<input type="text" name="phone"  class="inp-form" value="<?php echo  @$data['phone']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Username:</th>
		<td>
			<input type="text" name="username"  class="inp-form"  value="<?php echo  $data['username']; ?>" readonly/>
		</td>
		</tr>

		<tr>
		<th>City:</th>
		<td>
			<input type="text" name="country" class="inp-form"  value="<?php echo @$data['country']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Country:</th>
		<td>
			<input type="text" name="country"  class="inp-form" value="<?php echo @$data['country']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Usertype:</th>
		<td>
			<input type="text" name="user_type" class="inp-form" value="<?php echo @$data['user_type']; ?>" <?php if(@$data['user_type']=='administrator'){ echo "readonly"; }?> />
		</td>
		</tr>
		<tr>
		<th>Email:</th>
		<td>
			<input type="text" name="email" class="inp-form"  value="<?php echo @$data['email']; ?>"  <?php if(@$data['user_type']=='administrator'){ echo "readonly"; }?>  />
		</td>
		</tr>
		<tr>
		<th>Website:</th>
		<td>
			<input type="text" name="gender" class="inp-form" value="<?php echo @$data['gender']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Gender:</th>
		<td>
			<select name="gender">
				<option value="male" <?php if($data['gender']=='male'){?> selected <?php } ?>>male</option>
				<option value="female"<?php if($data['gender']=='female'){?> selected <?php } ?>>Female</option>
			</select>
		</td>
		</tr>
		<tr>
		<th>Date of Birth:</th>
		<td>
			<input type="text" name="birthdate"  class="inp-form" value="<?php echo @$data['birthdate']; ?>"  />
		</td>
		</tr>
        <?php if(@$data['user_type'] !='administrator'){?>
		<tr>
		<th>Security Question:</th>
		<td>
			<input type="text" name="security_question" class="inp-form"  value="<?php echo @$data['security_question']; ?>"  />
		</td>
		</tr>
        	<tr>
		<th>Status:</th>
		<td>
			<input type="text" name="status" class="inp-form"  value="<?php echo @$data['status']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>User's Status:</th>
		<td>
			<input type="text" name="delete_by_user"  class="inp-form" value="<?php echo @$data['delete_by_user']; ?>"  />
		</td>
		</tr>
	<?php } ?>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
<!--			<input type="reset" value="" class="form-reset"  /> -->
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
