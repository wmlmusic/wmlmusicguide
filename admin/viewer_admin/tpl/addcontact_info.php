 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Update Contact</h1></div>


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
			<div class="step-dark-left"><a href="addcontact_info.php">Contact Info</a></div>
			
			<div class="step-no">2</div>
			<div class="step-dark-left"><a href="addsocial_links.php">Social Links</a></div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<form method="post" enctype="multipart/form-data" class="signin" action="">
		<input type="hidden" name="id" value="<?php echo @$data['id']; ?>" />
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		<th>Company:</th>
		<td>
					<input type="text" name="Company" class="inp-form" value="<?php echo @$data['Company']; ?>" />
		</td>
		</tr>
		<tr>
		<th>Management:</th>
		<td>
					<input type="text" name="Management"  class="inp-form" value="<?php echo  @$data['Management']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Name:</th>
		<td>
					<input type="text" name="username"  class="inp-form"  value="<?php echo  $_SESSION['username']; ?>" readonly/>
		</td>
		</tr>
		<tr>
		<th>Category:</th>
		<td>
                    <select id="Category" name="Category"  class="inp-form" >
                      <option value=""> Select </option> 
					  <option value="Music" <?php if($data['Category'] == 'Music'){?> selected <?php } ?>>Music</option>
                      <option value="Entertainment" <?php if($data['Category'] == 'Entertainment'){?> selected <?php } ?>>Entertainment</option>
                    </select>
		</td>
		</tr>       
		<tr>
		<th>Genre:</th>
		<td>
                    <select id="Genre" name="Genre" class="inp-form" >
							<option value=""> Select</option> 
							<option value="Country" <?php if($data['Genre'] == 'Country'){?> selected <?php } ?>>Country</option>
							<option value="Dancehall" <?php if($data['Genre'] == 'Dancehall'){?> selected <?php } ?>>Dancehall</option>
							<option value="Gospel" <?php if($data['Genre'] == 'Gospel'){?> selected <?php } ?>>Gospel</option>
							<option value="Pop" <?php if($data['Genre'] == 'Pop'){?> selected <?php } ?>>Pop</option>
							<option value="Rap/Hip-Hop" <?php if($data['Genre'] == 'Rap/Hip-Hop'){?> selected <?php } ?>>Rap/Hip-Hop</option>
							<option value="Reggae" <?php if($data['Genre'] == 'Reggae'){?> selected <?php } ?>>Reggae</option>
							<option value="Rock" <?php if($data['Genre'] == 'Rock'){?> selected <?php } ?>>Rock</option>
							<option value="Soca" <?php if($data['Genre'] == 'Soca'){?> selected <?php } ?>>Soca</option>
                    </select>
		</td>
		</tr>
		<tr>
		<th>Field:</th>
		<td>
                    <select id="Field" name="Field" class="inp-form" >
						<option value=""> Select</option> 
                        <option value="Disc Jock/Radio Personnel"<?php if($data['Field'] == 'Disc Jock/Radio Personnel'){?> selected <?php } ?>>Disc Jock/Radio Personnel</option>
						<option value="Magazines"<?php if($data['Field'] == 'Magazines'){?> selected <?php } ?>>Magazines</option>
						<option value="Marketing, Promotions & PR"<?php if($data['Field'] == 'Marketing, Promotions & PR'){?> selected <?php } ?>>Marketing, Promotions & PR</option>
						<option value="Photographers/Video Directors"<?php if($data['Field'] == 'Photographers/Video Directors'){?> selected <?php } ?>>Photographers/Video Directors</option>
						<option value="Print/Video Models"<?php if($data['Field'] == 'Print/Video Models'){?> selected <?php } ?>>Print/Video Models</option>
						<option value="Producers, Musicians & Engineers"<?php if($data['Field'] == 'Producers, Musicians & Engineers'){?> selected <?php } ?>>Producers, Musicians & Engineers</option>
					</select>
		</td>
		</tr>
		<tr>
		<th>President:</th>
		<td>
					<input type="text" name="President" class="inp-form"  value="<?php echo @$data['President']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Vice President:</th>
		<td>
					<input type="text" name="VicePresident" class="inp-form"   value="<?php echo @$data['VicePresident']; ?>" />
		</td>
		</tr>
		<tr>
		<th>Manager:</th>
		<td>
					<input type="text" name="Manager"  class="inp-form" value="<?php echo @$data['Manager']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>CEO:</th>
		<td>
					<input type="text" name="CEO" class="inp-form" value="<?php echo @$data['CEO']; ?>"   />
		</td>
		</tr>
		<tr>
		<th>A&R:</th>
		<td>
					<input type="text" name="AnR"  class="inp-form"  value="<?php echo @$data['AnR']; ?>" />
		</td>
		</tr>
		<tr>
		<th>General Manager:</th>
		<td>
					<input type="text" name="General_Manager" class="inp-form"  value="<?php echo @$data['General_Manager']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Road Manager:</th>
		<td>
					<input type="text" name="Road_Manager" class="inp-form" value="<?php echo @$data['Road_Manager']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Director:</th>
		<td>
					<input type="text" name="Director"  class="inp-form" value="<?php echo @$data['Director']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Administration:</th>
		<td>
					<input type="text" name="Administration"  class="inp-form" value="<?php echo @$data['Administration']; ?>"  />
		</td>
		</tr>
        <tr>
		<th>Business Affairs:</th>
		<td>
					<input type="text" name="Business_Affairs" class="inp-form"  value="<?php echo @$data['Business_Affairs']; ?>"  />
		</td>
		</tr>
        <tr>
		<th>Licensing:</th>
		<td>
					<input type="text" name="Licensing" class="inp-form"  value="<?php echo @$data['Licensing']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Address:</th>
		<td>
					<input type="text" name="Address"  class="inp-form" value="<?php echo @$data['Address']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Suite #:</th>
		<td>
					<input type="text" name="Suite"  class="inp-form" value="<?php echo @$data['Suite']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>P.O. Box:</th>
		<td>
					<input type="text" name="P_O_Box"  class="inp-form" value="<?php echo @$data['P_O_Box']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>City:</th>
		<td>
					<input type="text" name="City" class="inp-form"  value="<?php echo @$data['City']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>State:</th>
		<td>
					<input type="text" name="State" class="inp-form" value="<?php echo @$data['State']; ?>"   />
		</td>
		</tr>
		<tr>
		<th>Country:</th>
		<td>
					<input type="text" name="Country" class="inp-form"  value="<?php echo @$data['Country']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Zip Code:</th>
		<td>
					<input type="text" name="ZipCode"  class="inp-form"  value="<?php echo @$data['ZipCode']; ?>" />
		</td>
		</tr>
		<tr>
		<th>Phone #:</th>
		<td>
					<input type="text" name="Phone" class="inp-form"  value="<?php echo @$data['Phone']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Phone #1:</th>
		<td>
					<input type="text" name="Phone1"  class="inp-form" value="<?php echo @$data['Phone1']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Phone #2:</th>
		<td>
					<input type="text" name="Phone2"  class="inp-form" value="<?php echo @$data['Phone2']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Phone #3:</th>
		<td>
					<input type="text" name="Phone3"  class="inp-form"  value="<?php echo @$data['Phone3']; ?>" />
		</td>
		</tr>
		<tr>
		<th>Cell Phone #:</th>
		<td>
					<input type="text" name="Cellphone"  class="inp-form" value="<?php echo @$data['Cellphone']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Fax #:</th>
		<td>
					<input type="text" name="Fax" class="inp-form"  value="<?php echo @$data['Fax']; ?>" />
		</td>
		</tr>
		<tr>
		<th>Email:</th>
		<td>
					<input type="text" name="Email"  class="inp-form" value="<?php echo  $_SESSION['email']; ?>" readonly/>
		</td>
		</tr>
		<tr>
		<th>Email 1:</th>
		<td>
					<input type="text" name="Email1" class="inp-form" value="<?php echo @$data['Email1']; ?>"   />
		</td>
		</tr>
		<tr>
		<th>Email 2:</th>
		<td>
					<input type="text" name="Email2" class="inp-form" value="<?php echo @$data['Email2']; ?>"   />
		</td>
		</tr>
		<tr>
		<th>Email 3:</th>
		<td>
					<input type="text" name="Email3" class="inp-form"  value="<?php echo @$data['Email3']; ?>"  />
		</td>
		</tr>
		<tr>
		<th>Details:</th>
		<td>
					<input type="text" name="Details"  class="inp-form"  value="<?php echo @$data['Details']; ?>" />
		</td>
		</tr>
		<tr>
		<th>Profile:</th>
		<td>
					<input type="text" name="Profile"  class="inp-form" value="<?php echo @$data['Profile']; ?>"  />
		</td>
		</tr>
		
			<tr>
	<th>Cover Image :</th>
	<td><input type="file" name="Cover_Image" id="file1" class="file_1" class="inp-form" /></td>
	
	</tr>
	<tr>
	<th>Image 1:</th>
	<td><input type="file" name="Image1" id="file2" class="file_1" class="inp-form"  /></td>
	
	</tr>
	<tr>
	<th>Image 2:</th>
	<td><input type="file" name="Image2" id="file3" class="file_1" class="inp-form" /></td>
	
	</tr>
	<tr>
	<th>Image 3:</th>
	<td><input type="file" name="Image3" id="file4" class="file_1" class="inp-form" /></td>
	
	</tr>
	<tr>
	<th>Image 4:</th>
	<td><input type="file" name="Image4" id="file5" class="file_1"  class="inp-form" /></td>
	
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
