
<?php 
//print_r($data);
?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Update Password</h1></div>


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
	
			<?php if(isset($_GET['act']) && $_GET['act'] == 'success') { ?>
			<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				
				
				<tr>
					<td class="green-left">Password Updated  successfully.</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<?php } ?>
			<?php if(isset($_GET['act']) && $_GET['act'] == 'fail'){ ?>
			<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<?php if($_GET['region'] == 'notmatch'){?>
						<td class="red-left">Error. New Password and confirm password does not match.</td>
					<?php }
					else if($_GET['region'] == 'oldpassword'){ ?>
						<td class="red-left">Error. Old Password is incorrect.</td>
					<?php } ?>
					
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
			<?php } ?>
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Update Password</a></div>
			
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
	 	<form method="post" class="signin" action="">
		<input type="hidden" name="id" value="<?php echo @$data['id']; ?>" />
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Email Id:</th>
			<td><input type="text" name="email" class="inp-form" /></td>
			<td>
			
			</td>
		</tr>
		
		<tr>
			<th valign="top">Old Password:</th>
			<td><input type="password" name="old_password" class="inp-form" /></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">New Password:</th>
			<td><input type="password" name="new_password" class="inp-form" /></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Confirm Password:</th>
			<td><input type="password" name="confirm_password" class="inp-form" /></td>
			<td>
			
			</td>
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
