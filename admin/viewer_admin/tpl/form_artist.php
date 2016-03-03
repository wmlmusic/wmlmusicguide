<style type="text/css">.error{color:red;}</style>
<!--start content-outer ........START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo ucwords($data['formStatus']) ?> Client</h1>
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
		
			<!--  start table-content  -->
			<div id="table-content" style="border:0px solid red">		
				<?php
					// echo "<pre>"; print_r($data);
				?>				
				<form id="artistForm" action="artistcontroller.php" method="post" enctype="multipart/form-data">
					<!-- start id-form -->
					<table border="0" width="100%" cellpadding="0" cellspacing="0"  id="id-form">
					<tr>
						<th valign="top">Client Name:</th>
						<td><input type="text" class="inp-form required" name="artist_name" value="<?php if(isset($data['row']['aname'])) echo $data['row']['aname']; ?>" /></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th valign="top">Address:</th>
						<td><input type="text" class="inp-form" name="artist_address" value="<?php if(isset($data['row']['address'])) echo $data['row']['address']; ?>" /></td>
						<th>City:</th>
						<td><input type="text" class="inp-form" name="artist_city" value="<?php if(isset($data['row']['city'])) echo $data['row']['city']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">State:</th>
						<td><input type="text" class="inp-form" name="artist_state" value="<?php if(isset($data['row']['state'])) echo $data['row']['state']; ?>" /></td>
						<th>Zip Code:</th>
						<td><input type="text" class="inp-form" name="artist_zip" value="<?php if(isset($data['row']['zipcode'])) echo $data['row']['zipcode']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Country:</th>
						<td><input type="text" class="inp-form" name="artist_country" value="<?php if(isset($data['row']['country'])) echo $data['row']['country']; ?>" /></td>
						<th>Phone:</th>
						<td><input type="text" class="inp-form" name="artist_phone" value="<?php if(isset($data['row']['phone'])) echo $data['row']['phone']; ?>" /></td>
					</tr>					
					<tr>
						<th valign="top">Email:</th>
						<td><input type="email" class="inp-form" name="artist_email" value="<?php if(isset($data['row']['email'])) echo $data['row']['email']; ?>" /></td>
						<th>Website:</th>
						<td><input type="url" class="inp-form" name="artist_url" value="<?php if(isset($data['row']['website'])) echo $data['row']['website']; ?>" /></td>
					</tr>
					<!-- <tr>
						<th valign="top">Company:</th>
						<td>
							<select name="artist_company" class="">
								<option value="">Select Company</option>
								<?php echo $data['companies']; ?>
							</select>
						</td>
						<th>&nbsp;</th>
						<td>&nbsp;</td>
					</tr> -->
					<tr>
						<th valign="top">Category:</th>
						<td>
							<select name="artist_cat[]" class="chosen-select required" data-placeholder="Choose a Category..." style="width:350px;" multiple>
								<?php echo $data['categories']; ?>
							</select>
						</td>
						<th>Artist Type</th>
						<td>
							<select name="artist_type" class="">
								<option value="">Select</option>
								<option value="solo" <?php if($data['atype'] == 'Solo') echo "selected";?>>Solo</option>
								<option value="group" <?php if($data['atype'] == 'Group') echo "selected";?>>Group</option>
							</select>
						</td>
					</tr>
					<tr>
						<th valign="top">Genre:</th>
						<td>
							<select name="artist_genre[]" class="chosen-select" data-placeholder="Choose a Genre..." style="width:350px;" multiple>
								<?php echo $data['genre']; ?>
							</select>
						</td>
						<th>Field</th>
						<td>
							<select name="artist_field[]"	class="chosen-select required" data-placeholder="Choose a Field..." style="width:350px;" multiple>
								<?php echo $data['field']; ?>
							</select>
						</td>
					</tr>
					
					<tr>
						<th colspan="4">Management</th>
					</tr>
					<tr>
						<th>Manager:</th>
						<td><input type="text" class="inp-form" name="artist_manager" value="<?php if(isset($data['row']['manager'])) echo $data['row']['manager']; ?>" /></td>
						<th>Administration:</th>
						<td><input type="text" class="inp-form" name="artist_administration" value="<?php if(isset($data['row']['administration'])) echo $data['row']['administration']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Licensing:</th>
						<td><input type="text" class="inp-form" name="artist_licensing" value="<?php if(isset($data['row']['licensing'])) echo $data['row']['licensing']; ?>" /></td>
						<th>&nbsp;</th>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th valign="top">Cover:</th>
						<td><input type="file" name="artist_cover" /></td>
						<th>Picture:</th>
						<td><input type="file" name="artist_picture" /></td>
					</tr>
					<tr>
						<th valign="top">&nbsp;</th>
						<td>&nbsp;</td>
						<th>Picture 1:</th>
						<td><input type="file" name="artist_picture1" accept="image/*" /></td>
					</tr>
					<tr>
						<th valign="top">&nbsp;</th>
						<td>&nbsp;</td>
						<th>Picture 2:</th>
						<td><input type="file" name="artist_picture2" accept="image/*" /></td>
					</tr>
					
					<tr>
						<th valign="top">Status:</th>
						<td>
							<select name="artist_status">
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
					</tr>
					<?php if(isset($data['row'])){?>
					<tr>
						<th>Logo:</th>
						<td><?php if($data['cover']) echo "<img src = '../../uploads/artistcover_{$data['row']['id']}.jpg' width='125' />"; ?></td>
						<th>Picture:</th>
						<td>
							<?php if($data['pic'] || $data['pic1'] || $data['pic2']) { ?>
							<table width="100%">
								<tr>
									<?php if($data['pic']) echo "<td><img src = '../../uploads/artistpic_{$data['row']['id']}.jpg' width='125' /></td>";  ?>
									<?php if($data['pic1']) echo "<td><img src = '../../uploads/artistpic1_{$data['row']['id']}.jpg' width='125' /></td>";  ?>
									<?php if($data['pic2']) echo "<td><img src = '../../uploads/artistpic2_{$data['row']['id']}.jpg' width='125' /></td>";  ?>
								</tr>
								<tr>
									<?php if($data['pic']) echo "<td>Picture</td>";  ?>
									<?php if($data['pic1']) echo "<td>Picture 1</td>";  ?>
									<?php if($data['pic2']) echo "<td>Picture 2</td>";  ?>
								</tr>

							</table>
						<?php } ?>
							<?php // if($data['pic']) echo "<img src = '../../uploads/artistpic_{$data['row']['id']}.jpg' width='125' />"; ?>
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
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="" class="form-submit" />
							<input id="restform" class="form-reset">
							<a href="artist.php" class="form-cancel">Cancel</a>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					</table>
					<input type="hidden" name="form" value="<?php echo $data['formStatus'] ?>" />
					<input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>" />
					<input type="hidden" name="com_id" value="<?php echo $_SESSION['company_id'] ?>" />
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
	var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
	$(document).ready(function () {
		$.validator.setDefaults({ ignore: ":hidden:not(select)" })
		$('#artistForm').validate({
			errorElement: "div",
			rules: {
			    artist_email: {
			      	email: true,
			      	// remote: "ajax.php"
			      	/*remote: { 
	                    url:"ajax.php", 
	                    data: {'id': $('#id').val()},
	                    async:false 
	                }*/
			    }
		  	},
		  	messages: {
		    	artist_email: {
			      remote: "Email address already in use. Please use other email."
		    	}
		  	}
		});
		$('#restform').click(function(){
            $('#artistForm')[0].reset();
 		});
	});
</script>