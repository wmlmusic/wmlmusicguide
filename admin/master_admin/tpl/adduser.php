
<?php 
//print_r($data);
?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Viewer Admin Privileges</h1></div>


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
	
		
			<?php if(isset($_GET['success']) && $_GET['success'] == 'fail'){ ?>
			<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again. May be this user name and email id already exist.</a></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
			<?php } ?>
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Viewer Admin Privileges details</a></div>
			
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
	 	<form  name="adduser" id="adduser" method="post" class="signin" action="">
		<input type="hidden" name="id" value="<?php echo @$data['id']; ?>" />
		<input type="hidden" name="old_password" value="<?php echo @$data['password']; ?>" />

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Username:</th>
			<td><input type="text" name="username" value="<?php echo @$data['username']; ?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">User Type:</th>
			<td>
				<select class="inp-form" name="user_type">
					<option></option>
					<option value="Free Viewers" <?php if($data['user_type'] == 'Free Viewers'){ ?> selected <?php } ?>>Free Viewers</option>
					<option value="Paid Customers" <?php if($data['user_type'] == 'Paid Customers'){ ?> selected <?php } ?>>Paid Customers</option>
				</select>
			</td>
		</tr>
		<tr>
			<th valign="top">Password:</th>
			<td><input type="password" name="password" value="<?php echo @base64_decode($data['password']); ?>" class="inp-form" /></td>
			<td>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Email Address:</th>
			<td><input type="text" name="emailaddress" class="inp-form" value="<?php echo @$data['email']; ?>" /></td>
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
	<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#adduser").validate({
			submitHandler:function(form) {
				form.submit();
			},
			rules: {
				'emailaddress': {
					required: true,
					email: true
				}				
			},
			messages: {
               'email': {
					required: 'Please enter your E-Mail-Adress',
					email: 'Please enter valid E-Mail-Adress'
				}			
			}
		});   

});
</script> 

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
