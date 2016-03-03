
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
		 	<form method="post" enctype="multipart/form-data" class="signin" action="piccontroller.php">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		<th>Select Gallery:</th>
		<td>
					<select id="d" name="gname" style="width:170px;" onchange="update(this.value)">
					<option></option>
					<?php /*
						require_once('../dbLayer/connection.php');
						$mysql="select * from album";
						$connect=new connection();
						$connect->Make_connection();
						$result=$connect->executeQuery($mysql);
						while($row= mysql_fetch_array($result))
						{
						?>
							<option value="<?php echo $row['album_title'];?>"><?php echo $row['album_title'];?></option>
						<?php
						 } */?>
					</select>
				</td>
		</tr>
		
		<tr>
		<th>Select Event:</th>
		<td>
					<select id="e" name="dname" style="width:170px;">
					<option></option>
				</select>
				</td>
		</tr>
		
			<tr>
	<th>Image 1:</th>
	<td><input type="file" name="file1" class="file_1" /></td>
	
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
