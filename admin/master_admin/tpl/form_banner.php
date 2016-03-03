<style type="text/css">.error{color:red;}</style>
<!--start content-outer ........START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo ucwords($data['formStatus']) ?> Banner</h1>
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
				<form id="bannerForm" action="bannercontroller.php" method="post" enctype="multipart/form-data">
					<!-- start id-form -->
					<table border="0" width="100%" cellpadding="0" cellspacing="0"  id="id-form">
					<tr>
						<th valign="top">Banner Name:</th>
						<td><input type="text" class="inp-form required" name="name" value="<?php if(isset($data['row']['name'])) echo $data['row']['name']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Description:</th>
						<td><textarea class="form-textarea" cols="" rows="" name="details"><?php if(isset($data['row']['details'])) echo $data['row']['details']; ?></textarea></td>
						<td></td>
					</tr>
                                        <tr>
						<th valign="top">URL Link:</th>
						<td><input type="url" class="inp-form" name="banner_link" value="<?php if(isset($data['row']['banner_link'])) echo $data['row']['banner_link']; ?>" /></td>
					</tr>
					<tr>
						<th>Image:</th>
						<td width="250">
							<input type="file" name="image" />
						</td>
						<td>
							<div class="bubble-left"></div>
							<div class="bubble-inner">600x400px</div>
							<div class="bubble-right"></div>
						</td>
					</tr>
					<?php if(isset($data['row'])){?>
					<tr>
						<th valign="top">Banner:</th>
						<td><?php if($data['banner']) echo "<img src = '../../uploads/banner_{$data['row']['id']}.jpg' width='125' />"; ?></td>
					</tr>
					<?php } ?>
					<tr>
						<th valign="top">Status:</th>
						<td>
							<select name="status">
								<option value="1" <?php if(isset($data['row']['status']) && $data['row']['status'] == '1') echo "selected";  ?>>Active</option>
								<option value="0" <?php if(isset($data['row']['status']) && $data['row']['status'] == '0') echo "selected";  ?>>Inactive</option>
							</select>
						</td>
					</tr>

					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="" class="form-submit" />
							<input id="restform" class="form-reset">
							<a href="banner.php" class="form-cancel">Cancel</a>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					</table>
					<input type="hidden" name="form" value="<?php echo $data['formStatus'] ?>" />
					<input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>" />
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
		$('#bannerForm').validate({
			errorElement: "div",
			rules: {
			    name: { required: true },
			    details: { required: true },
			    <?php if(!isset($data['banner'])) echo 'image: { required: true }' ?>
		  	}
		});
		$('#restform').click(function(){
            $('#bannerForm')[0].reset();
 		});
	});
</script>