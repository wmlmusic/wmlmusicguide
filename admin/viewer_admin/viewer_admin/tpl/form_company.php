<style type="text/css">.error{color:red;}</style>
<!--start content-outer ........START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo ucwords($data['formStatus']) ?> Company</h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...... START -->
		<div id="content-table-inner">
			<?php if(isset($_GET['act']) && $_GET['act'] == 'updated') { ?>
			<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Company info updated successfully.</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<?php } ?>
		
			<!--  start table-content  -->
			<div id="table-content" style="border:0px solid red">		
				<?php
					// echo "<pre>"; print_r($data);
				?>				
				<form id="companyForm" action="cmpycontroller.php" method="post" enctype="multipart/form-data">
					<!-- start id-form -->
					<table border="0" width="100%" cellpadding="0" cellspacing="0"  id="id-form">
					<tr>
						<th valign="top">Company Name:</th>
						<td><input type="text" class="inp-form required" name="company_name" value="<?php if(isset($data['row']['cname'])) echo $data['row']['cname']; ?>" /></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th valign="top">Suite #:</th>
						<td><input type="text" class="inp-form" name="company_suiteno" value="<?php if(isset($data['row']['suite_no'])) echo $data['row']['suite_no']; ?>" /></td>
						<th>PO Box #:</th>
						<td><input type="text" class="inp-form" name="company_poboxno" value="<?php if(isset($data['row']['po_boxno'])) echo $data['row']['po_boxno']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Address:</th>
						<td><input type="text" class="inp-form" name="company_address" value="<?php if(isset($data['row']['address'])) echo $data['row']['address']; ?>" /></td>
						<th>City:</th>
						<td><input type="text" class="inp-form" name="company_city" value="<?php if(isset($data['row']['city'])) echo $data['row']['city']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">State:</th>
						<td><input type="text" class="inp-form" name="company_state" value="<?php if(isset($data['row']['state'])) echo $data['row']['state']; ?>" /></td>
						<th>Zip Code:</th>
						<td><input type="text" class="inp-form" name="company_zip" value="<?php if(isset($data['row']['zipcode'])) echo $data['row']['zipcode']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Country:</th>
						<td><input type="text" class="inp-form" name="company_country" value="<?php if(isset($data['row']['country'])) echo $data['row']['country']; ?>" /></td>
						<th>&nbsp;</th>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th>Phone:</th>
						<td><input type="text" class="inp-form" name="company_phone" value="<?php if(isset($data['row']['phone'])) echo $data['row']['phone']; ?>" /></td>
						<th>Phone 1:</th>
						<td><input type="text" class="inp-form" name="company_phone1" value="<?php if(isset($data['row']['phone1'])) echo $data['row']['phone1']; ?>" /></td>
					</tr>
					<tr>
						<th>Phone 2:</th>
						<td><input type="text" class="inp-form" name="company_phone2" value="<?php if(isset($data['row']['phone2'])) echo $data['row']['phone2']; ?>" /></td>
						<th>Fax No:</th>
						<td><input type="text" class="inp-form" name="company_faxno" value="<?php if(isset($data['row']['fax_no'])) echo $data['row']['fax_no']; ?>" /></td>
					</tr>

					<tr>
						<th valign="top">Email:</th>
						<td><input type="email" class="inp-form" name="company_email" value="<?php if(isset($data['row']['email'])) echo $data['row']['email']; ?>" /></td>
						<th valign="top">Email 1:</th>
						<td><input type="email" class="inp-form" name="company_email1" value="<?php if(isset($data['row']['email1'])) echo $data['row']['email1']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Email 2:</th>
						<td><input type="email" class="inp-form" name="company_email2" value="<?php if(isset($data['row']['email2'])) echo $data['row']['email2']; ?>" /></td>
						<th>&nbsp;</th>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th>Website:</th>
						<td><input type="url" class="inp-form" name="company_url" value="<?php if(isset($data['row']['website'])) echo $data['row']['website']; ?>" /></td>
						<th valign="top">Profile Link URL:</th>
						<td><input type="url" class="inp-form" name="company_profilelink" value="<?php if(isset($data['row']['profile_link'])) echo $data['row']['profile_link']; ?>" /></td>
						
					</tr>
					<tr>
						<th colspan="4">Management</th>
					</tr>
					<tr>
						<th valign="top">President:</th>
						<td><input type="text" class="inp-form" name="company_president" value="<?php if(isset($data['row']['president'])) echo $data['row']['president']; ?>" /></td>
						<th>Vice President:</th>
						<td><input type="text" class="inp-form" name="company_vpresident" value="<?php if(isset($data['row']['vice_president'])) echo $data['row']['vice_president']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">CEO:</th>
						<td><input type="text" class="inp-form" name="company_ceo" value="<?php if(isset($data['row']['ceo'])) echo $data['row']['ceo']; ?>" /></td>
						<th>Co-CEO:</th>
						<td><input type="text" class="inp-form" name="company_vceo" value="<?php if(isset($data['row']['vice_ceo'])) echo $data['row']['vice_ceo']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Director:</th>
						<td><input type="text" class="inp-form" name="company_director" value="<?php if(isset($data['row']['director'])) echo $data['row']['director']; ?>" /></td>
						<th>Manager:</th>
						<td><input type="text" class="inp-form" name="company_manager" value="<?php if(isset($data['row']['manager'])) echo $data['row']['manager']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">A&R:</th>
						<td><input type="text" class="inp-form" name="company_ar" value="<?php if(isset($data['row']['aandr'])) echo $data['row']['aandr']; ?>" /></td>
						<th>General Manager:</th>
						<td><input type="text" class="inp-form" name="company_gmanager" value="<?php if(isset($data['row']['general_manager'])) echo $data['row']['general_manager']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Road Manager:</th>
						<td><input type="text" class="inp-form" name="company_rmanager" value="<?php if(isset($data['row']['road_manager'])) echo $data['row']['road_manager']; ?>" /></td>
						<th>Administration:</th>
						<td><input type="text" class="inp-form" name="company_administration" value="<?php if(isset($data['row']['administration'])) echo $data['row']['administration']; ?>" /></td>
					</tr>					
					<tr>
						<th valign="top">Logo:</th>
						<td><input type="file" name="company_logo" /></td>
						<th>Picture:</th>
						<td><input type="file" name="company_picture" /></td>
					</tr>
					<tr>
						<th valign="top">&nbsp;</th>
						<td>&nbsp;</td>
						<th>Picture 1:</th>
						<td><input type="file" name="company_picture1" /></td>
					</tr>
					<tr>
						<th valign="top">&nbsp;</th>
						<td>&nbsp;</td>
						<th>Picture 2:</th>
						<td><input type="file" name="company_picture2" /></td>
					</tr>
					
					<!-- <tr>
						<th valign="top">Status:</th>
						<td>
							<select name="company_status">
								<option value="1" <?php if(isset($data['row']['status']) && $data['row']['status'] == '1') echo "selected";  ?>>Active</option>
								<option value="0" <?php if(isset($data['row']['status']) && $data['row']['status'] == '0') echo "selected";  ?>>Inactive</option>
							</select>
						</td>
						<th>Enable Profile</th>
						<td>
						<select name="enable_profile">
								<option value="0" <?php if(isset($data['row']['enable_profile']) && $data['row']['enable_profile'] == '0') echo "selected";  ?>>No</option>
								<option value="1" <?php if(isset($data['row']['enable_profile']) && $data['row']['enable_profile'] == '1') echo "selected";  ?>>Yes</option>
							</select>
						</td>
					</tr> -->
					<?php if(isset($data['row'])){?>
					<tr>
						<th>Logo:</th>
						<td><?php if($data['logo']) echo "<img src = '../../uploads/companylogo_{$data['row']['id']}.jpg' width='125' />"; ?></td>
						<th>Picture:</th>
						<td>
						<?php if($data['pic'] || $data['pic1'] || $data['pic2']) { ?>
							<table width="100%">
								<tr>
									<?php if($data['pic']) echo "<td><img src = '../../uploads/companypic_{$data['row']['id']}.jpg' width='125' /></td>";  ?>
									<?php if($data['pic1']) echo "<td><img src = '../../uploads/companypic1_{$data['row']['id']}.jpg' width='125' /></td>";  ?>
									<?php if($data['pic2']) echo "<td><img src = '../../uploads/companypic2_{$data['row']['id']}.jpg' width='125' /></td>";  ?>
								</tr>
								<tr>
									<?php if($data['pic']) echo "<td>Picture</td>";  ?>
									<?php if($data['pic1']) echo "<td>Picture 1</td>";  ?>
									<?php if($data['pic2']) echo "<td>Picture 2</td>";  ?>
								</tr>

							</table>
						<?php } ?>
							
						</td>
					</tr>
					<?php } ?>
					<tr>
						<th colspan="2">Video</th>
						<th colspan="2">Audio</th>
					</tr>
					<tr>
						<th valign="top">Youtube Username:</th>
						<td>
							<input type="text" class="inp-form" name="youtube_channel" value="<?php if(isset($data['row']['youtube_channel'])) echo $data['row']['youtube_channel']; ?>" />
						</td>
						<th valign="top">Soundcloud Username:</th>
						<td>
							<input type="text" class="inp-form" name="soundcloud_username" value="<?php if(isset($data['row']['soundcloud_username'])) echo $data['row']['soundcloud_username']; ?>" />
						</td>
					</tr>
					<tr>
						<th valign="top">Itunes UserID:</th>
						<td>
							<input type="number" class="inp-form" name="itunes_id" value="<?php if(isset($data['row']['itunes_id'])) echo $data['row']['itunes_id']; ?>" />
						</td>
						<th valign="top">&nbsp;</th>
						<td>&nbsp;
							
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="" class="form-submit" />
							<input id="restform" class="form-reset">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					</table>
					<input type="hidden" name="form" value="<?php echo $data['formStatus'] ?>" />
					<input type="hidden" name="id" id="com_id" value="<?php echo $data['id'] ?>" />
				</form>
			</div>
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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
<!--  end content-outer......END -->
<script type="text/javascript">
	$(document).ready(function () {
		$('#companyForm').validate({
			errorElement: "div",
			rules: {
			    company_email: {
			    	required: true,
			      	email: true,
					remote: 'ajax_company.php'      		
			      	}
			    }
		  	},
		  	messages: {
		    	company_email: {
			      remote: "Email not found."
		    	}
		  	}
		});
		$('#restform').click(function(){
            $('#companyForm')[0].reset();
 		});
	});
</script>