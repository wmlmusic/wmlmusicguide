<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Update Super Admin Social Contact Information</h1></div>


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
		<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				
				<?php if(isset($_GET['status']) && $_GET['status'] == 'updated') { ?>
				<tr>
					<td class="green-left">Links updated sucessfully.</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				<?php } ?>
				<?php if(isset($_GET['status']) && $_GET['status'] == 'added') { ?>
				<tr>
					<td class="green-left">Links added sucessfully.</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				<?php } ?>
				</table>
				</div>
		<!-- start id-form -->
		<form method="post" enctype="multipart/form-data" class="signin" action="">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
				<tr>
		<th>Amazon:</th>
		<td>
					<input type="text" name="Amazon" value="<?php echo @$data['Amazon']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Facebook:</th>
		<td>
					<input type="text" name="Facebook" value="<?php echo @$data['Facebook']; ?>" class="inp-form" />
		</td>
		</tr>
        <tr>
		<th>Facebook 1:</th>
		<td>
					<input type="text" name="Facebook1" value="<?php echo @$data['Facebook1']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Google+:</th>
		<td>
					<input type="text" name="Google_Plus" value="<?php echo @$data['Google_Plus']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>iHeartRadio:</th>
		<td>
					<input type="text" name="iHeartRadio" value="<?php echo @$data['iHeartRadio']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>IMDb:</th>
		<td>
					<input type="text" name="IMDb" value="<?php echo @$data['IMDb']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Instagram:</th>
		<td>
					<input type="text" name="Instagram" value="<?php echo @$data['Instagram']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Instagram 1:</th>
		<td>
					<input type="text" name="Instagram1" value="<?php echo @$data['Instagram1']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Itunes:</th>
		<td>
					<input type="text" name="Itunes" value="<?php echo @$data['Itunes']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>LinkedIn:</th>
		<td>
					<input type="text" name="LinkedIn" value="<?php echo @$data['LinkedIn']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>ModelMayhem:</th>
		<td>
					<input type="text" name="ModelMayhem" value="<?php echo @$data['ModelMayhem']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Myspace:</th>
		<td>
					<input type="text" name="Myspace" value="<?php echo @$data['Myspace']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Pandora:</th>
		<td>
					<input type="text" name="Pandora" value="<?php echo @$data['Pandora']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Pinterest:</th>
		<td>
					<input type="text" name="Pinterest" value="<?php echo @$data['Pinterest']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Reverbnation:</th>
		<td>
					<input type="text" name="Reverbnation" value="<?php echo @$data['Reverbnation']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Rhapsody:</th>
		<td>
					<input type="text" name="Rhapsody" value="<?php echo @$data['Rhapsody']; ?>" class="inp-form" />
		</td>
		</tr>
        <tr>
		<th>Spotify:</th>
		<td>
					<input type="text" name="Spotify" value="<?php echo @$data['Spotify']; ?>" class="inp-form" />
		</td>
		</tr>
        <tr>
		<th>Tumblr:</th>
		<td>
					<input type="text" name="Tumblr" value="<?php echo @$data['Tumblr']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Twitter:</th>
		<td>
					<input type="text" name="Twitter" value="<?php echo @$data['Twitter']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Twitter 1:</th>
		<td>
					<input type="text" name="Twitter1" value="<?php echo @$data['Twitter1']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Vevo:</th>
		<td>
					<input type="text" name="Vevo" value="<?php echo @$data['Vevo']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Vine:</th>
		<td>
					<input type="text" name="Vine" value="<?php echo @$data['Vine']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>WhatsApp:</th>
		<td>
					<input type="text" name="WhatsApp"  value="<?php echo @$data['WhatsApp']; ?>" class="inp-form"  />
		</td>
		</tr>
		<tr>
		<th>Youtube:</th>
		<td>
					<input type="text" name="Youtube" value="<?php echo @$data['Youtube']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Blog:</th>
		<td>
					<input type="text" name="Blog" value="<?php echo @$data['Blog']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Profile:</th>
		<td>
					<input type="text" name="Profile" value="<?php echo @$data['Profile']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Website:</th>
		<td>
					<input type="text" name="Website" value="<?php echo @$data['Website']; ?>" class="inp-form" />
		</td>
		</tr>
		<tr>
		<th>Website 1:</th>
		<td>
					<input type="text" name="Website1" value="<?php echo @$data['Website1']; ?>" class="inp-form" />
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