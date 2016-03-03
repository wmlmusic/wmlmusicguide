<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Update User Account</h1></div>


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
		<!-- start id-form -->
	 	<form method="post" class="signin" action="" id="adduser">
		<input type="hidden" name="user_id" value="<?php echo $data['user_row']['id']; ?>" />
		<table border="1" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" name="name" value="<?php echo $data['user_row']['name']; ?>" class="inp-form" autocomplete="false" /></td>
			<th valign="top">&nbsp;</th>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th valign="top">City:</th>
			<td><input type="text" name="city" value="<?php echo $data['user_row']['city']; ?>" class="inp-form" /></td>
			<th valign="top">Country:</th>
			<td><input type="text" name="country" value="<?php echo $data['user_row']['country']; ?>" class="inp-form" /></td>
		</tr>
		<tr>
			<th valign="top">Phone:</th>
			<td><input type="text" name="phone" value="<?php echo $data['user_row']['phone']; ?>" class="inp-form" /></td>
			<th valign="top">Gender:</th>
			<td>
				<select name="gender">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</td>
		</tr>
		<tr>
			<th valign="top">Website:</th>
			<td><input type="text" name="website" value="<?php echo $data['user_row']['website']; ?>" class="inp-form" /></td>
			<th valign="top">Birthday:</th>
			<td><input type="text" name="birthdate" value="<?php echo $data['user_row']['birthdate']; ?>" placeholder="YYY-mm-dd" class="inp-form" /></td>
		</tr>
		<tr>
			<th valign="top">Security Question:</th>
			<td><input type="text" name="security_question" value="<?php echo $data['user_row']['security_question']; ?>" class="inp-form" /></td>
			<th valign="top">Status:</th>
			<td><select name="status" id="inp-form">
					<option value="1">Active</option>
					<option value="0">Deactive</option>
				</select></td>
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
