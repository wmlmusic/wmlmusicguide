<style type="text/css">.error{color:red;}</style>
<!--start content-outer ........START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo ucwords($data['formStatus']) ?> Post</h1>
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
				<form id="postForm" action="postcontroller.php" method="post" enctype="multipart/form-data">
					<!-- start id-form -->
					<table border="0" width="100%" cellpadding="0" cellspacing="0"  id="id-form">
					<tr>
						<th valign="top">Post Title:</th>
						<td><input type="text" class="inp-form required" name="name" value="<?php if(isset($data['row']['name'])) echo $data['row']['name']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Description:</th>
						<td><textarea class="form-textarea" cols="" rows="" name="details"><?php if(isset($data['row']['details'])) echo $data['row']['details']; ?></textarea></td>
						<td></td>
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
						<th valign="top">Picture:</th>
						<td><?php if($data['post']) echo "<img src = '../../uploads/post_{$data['row']['id']}.jpg' width='125' />"; ?></td>
					</tr>
					<?php } ?>
					<tr>
						<th valign="top">Category:</th>
						<td>
							<select name="category">
								<option value="">Select option</option>
								<option value="image" <?php if(isset($data['row']['category']) && $data['row']['category'] == 'image') echo "selected";  ?>>ImageMusic</option>
								<option value="music" <?php if(isset($data['row']['category']) && $data['row']['category'] == 'music') echo "selected";  ?>>Music</option>
								<option value="video" <?php if(isset($data['row']['category']) && $data['row']['category'] == 'video') echo "selected";  ?>>Video</option>
							</select>
						</td>
					</tr>
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
							<a href="post.php" class="form-cancel">Cancel</a>
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
		$('#postForm').validate({
			errorElement: "div",
			rules: {
			    name: { required: true },
			    details: { required: true },
			    category: { required: true }
		  	}
		});
		$('#restform').click(function(){
            $('#postForm')[0].reset();
 		});
	});
</script>