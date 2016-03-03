<?php 
//print_r($data);
?>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Add Picture</h1></div>


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
			<div class="step-dark-left"><a href="addpicture.php">Add pics in New Gallery</a></div>
			
			<div class="step-no">2</div>
			<div class="step-dark-left"><a href="addpicture1.php">Add Pics in Old Gallery</a></div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<form method="post" enctype="multipart/form-data" class="signin" action="">
		<input type="hidden" name="gallery_id" value="<?php echo $data['id']; ?>" />
			<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
			<th>Enter Gallery Name:</th>
			<td> </td>
			<td>
					<input type="text" name="customer_gallery_name" value="<?php echo $data['customer_gallery_name']; ?>" />
			</td>
			</tr>
			<!--<tr>
			<th>Enter Date (dd-mm-yyyy):</th>
				<td>
						<input type="text" name="newdate" />
				</td>
			</tr>
			-->
			<tr>
			<th>Cover Image :</th>
			<td><img src="<?php echo $data['gallery_path'].$data['customer_gallery_cover_image']; ?>" alt="<?php echo $data['customer_gallery_cover_image']; ?>" width="50" height="50" /></td>
			<td><input type="file" name="customer_gallery_cover_image" id="file1" class="file_1" />
				<input type="hidden" name="customer_gallery_cover_image_old" value="<?php echo $data['customer_gallery_cover_image']; ?>" />
			</td>
			
			</tr>
			<tr>
			<th>Image 1:</th>
			<td><img src="<?php echo $data['gallery_path'].$data['customer_gallery_image1']; ?>" alt="<?php echo $data['customer_gallery_image1']; ?>" width="50" height="50" /></td>
			<td><input type="file" name="customer_gallery_image1" id="file2" class="file_1" />
			<input type="hidden" name="customer_gallery_image1_old" value="<?php echo $data['customer_gallery_image1']; ?>" />
			
			</td>
			
			</tr>
			<tr>
			<th>Image 2:</th>
			<td><img src="<?php echo $data['gallery_path'].$data['customer_gallery_image2']; ?>" alt="<?php echo $data['customer_gallery_image2']; ?>" width="50" height="50" /></td>
			<td><input type="file" name="customer_gallery_image2" id="file3" class="file_1" />
			<input type="hidden" name="customer_gallery_image2_old" value="<?php echo $data['customer_gallery_image2']; ?>" />
			
			</td>
			
			</tr>
			<tr>
			<th>Image 3:</th>
			<td><img src="<?php echo $data['gallery_path'].$data['customer_gallery_image3']; ?>" alt="<?php echo $data['customer_gallery_image3']; ?>" width="50" height="50" /></td>
			<td><input type="file" name="customer_gallery_image3" id="file4" class="file_1" />
			<input type="hidden" name="customer_gallery_image3_old" value="<?php echo $data['customer_gallery_image3']; ?>" /></td>
			
			
			</tr>
			<tr>
			<th>Image 4:</th>
			<td><img src="<?php echo $data['gallery_path'].$data['customer_gallery_image4']; ?>" alt="<?php echo $data['customer_gallery_image4']; ?>" width="50" height="50" /></td>
			<td><input type="file" name="customer_gallery_image4" id="file5" class="file_1" />
			<input type="hidden" name="customer_gallery_image4_old" value="<?php echo $data['customer_gallery_image4']; ?>" />
			</td>
			
			</tr>
			
			
			<tr>
				<th>&nbsp;</th>
				<td valign="top">
					<input type="submit" name="AddGallery" value="creategallery" class="form-submit" />
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
