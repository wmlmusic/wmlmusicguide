<!--start content-outer ........................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Manage Social Media</h1>
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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content" style="border:0px solid red">
				<?php
					if(isset($_SESSION['insert_field'])){
						if($_SESSION['insert_field'] == 'insert' || $_SESSION['insert_field'] == 'update'){
				?>
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Field <?php echo $_SESSION['insert_field']; ?> sucessfully.</td>
					<td class="green-right"><br /><br /></td>
				</tr>
				</table>
				</div>
				<?php 
							unset($_SESSION['insert_field']);
						}
						if($_SESSION['insert_field'] == 'insert_faild' || $_SESSION['insert_field'] == 'update_faild'){
				?>
				<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error</td>
					<td class="red-right"><br /><br /></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->
				<?php
							unset($_SESSION['insert_field']);
						}
					}

					$name = '';
					$id = '';
					if(isset($data['row'])){
						$name 	= $data['row']['mp_name'];
						$id 	= $data['row']['mp_id'];
					}
				?>
				<!--  end message-green -->
				
				<form action="mpcontroller.php" method="post" id="socialForm" autocomplete="off" enctype="multipart/form-data">
		 		<table border="0" align="center" style="margin:0 auto;">
		 			<tr>
		 				<td>
						<table border="0" cellpadding="0" cellspacing="0" id="id-form" align="center" style="margin:0 auto;">
							<tr>
								<th valign="top">Social Media Name:</th>
								<td>
									<input type="text" class="inp-form" name="txtfield" required minlength="2" value="<?php echo $name ?>" />
								</td>
							</tr>							
							<tr>
								<th valign="top">Image:</th>
								<td>
									<input type="file" class="file_1" accept="image/*" name="category_image" />
								</td>
							</tr>
							<tr>
								<th valign="top"></th>
								<td>
									<input type="submit" value="" class="form-submit" />
									<a href="social.php" class="form-reset"></a>
								</td>
							</tr>
						</table>
						</td>
						<td>
						<table>
							<tr>
								<td>
									<?php if(isset($data['image']) && $data['image']) echo '&nbsp;<img src="../../uploads/category_' . $id . '.jpg" height="120" />'; ?>
								</td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
				
				<input type="hidden" name="mp_type" value="social" />
				<input type="hidden" name="id" value="<?php echo $id ?>" />
				</form>
				<?php

				?>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<?php
					if(count($data['rows'][0]) > 0):
						$i = 1;						
				?>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="" class="nobg">Title</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				<?php
						foreach ($data['rows'] as $key => $value) {
				?>
				<tr <?php echo ($i%2 == 0) ? 'class="alternate-row"' : '' ?>>
					<td><?php echo $i?></td>
					<td><?php echo $value['mp_name'] ?></td>
					<td class="options-width">
						<a href="social.php?id=<?php echo $value['mp_id'] ?>" title="Edit" class="icon-1 info-tooltip"></a>
						<a href="social.php?del_id=<?php echo $value['mp_id'] ?>" title="Delete" class="icon-2 info-tooltip"></a>
						<!-- <a href="" title="Edit" class="icon-3 info-tooltip"></a>
						<a href="" title="Edit" class="icon-4 info-tooltip"></a>
						<a href="" title="Edit" class="icon-5 info-tooltip"></a> -->
					</td>
				</tr>
				<?php
							$i++;
						}
				?>
				</table>
				<?php else:	?>
					<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">There are no/0 records, Please add some data to display here.</td>
					<td class="red-right"><br /><br /></td>
				</tr>
				</table>
				</div>
				<?php endif; ?>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
			
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
		$('#SocialForm').validate({
		    rules: {
		        txtfield: {
		            required:true		            
		        },
		        category_image: {
		            uploadFile:true		            
		        }
		    }/*,
		     submitHandler: function(form) {
				alert('asd');
				}*/
		});
		$.validator.addMethod("uploadFile", function (val, element) {
		    var ext = $(element).val().split('.').pop().toLowerCase();
		    if(ext == ''){
		    	return true;
		    }
		    var allow = new Array('gif', 'jpg', 'png');
		    var size = element.files[0].size;
		    // console.log(size);

		    if (jQuery.inArray(ext, allow) == -1 || size > 2097152) {
		        // console.log("returning false");
		        return false;
		    } else {
		        // console.log("returning true");
		        return true;
		    }
		}, "File type error or size exceeds. 2MB Allowed.");
		$(".icon-2").click(function(){
		    if (!confirm("Are sure you want to delete?")){
		      return false;
		    }
		});
	});
</script>