<?php
//print_r($data); exit;
	$url = "http://" . $_SERVER['HTTP_HOST'] . preg_replace("#/[^/]*\.php$#simU", "/", $_SERVER["PHP_SELF"]);
 ?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>View All User Account Details</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="../images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="../images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
				<!--	<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td> -->
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
	<!--				<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td> -->
				</tr>
				</table>
				</div>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
			<!--		<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td> -->
				</tr>
				</table>
				</div>
				<?php if(isset($_SESSION['message'])) { ?>
				<!--  end message-blue -->
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td> 
				</tr>
				</table>
				</div>
				<!--  end message-green -->
				<?php } ?>
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Name</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Phone#</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">City</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Country</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Username</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Password</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Website</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Gender</a>	</th> 
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Birthdate</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Security Question</a>	</th> 
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				<?php
					if($data){ 
			   		foreach($data as $users_details) { 
			   			//print_r($users_details);
			   	?>
				<tr>
					<td><?php echo $users_details['name']; ?></td>
					<td><?php echo $users_details['phone']; ?></td>
					<td><?php echo $users_details['city']; ?></td>
					<td><?php echo $users_details['country']; ?></td>
					<td><?php echo $users_details['username']; ?></td>
					<td><?php echo base64_decode($users_details['password']); ?></td>
					<td><?php echo $users_details['email']; ?></td>
					<td><?php echo $users_details['website']; ?></td>
					<td><?php echo $users_details['gender']; ?></td>
					<td><?php echo $users_details['birthdate']; ?></td>
					<td><?php echo $users_details['security_question']; ?></td>
					<td class="options-width">
					<a href="<?php echo $url ?>viewusers.php?act=delete&id=<?php echo $users_details['id'];?>" title="Delete" class="icon-2 info-tooltip"></a>
					<a href="<?php echo $url ?>users_account_update.php?id=<?php echo $users_details['id'];?>" title="Edit" class="icon-1 info-tooltip"></a>
					</td>
				</tr>
				<?php } }?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
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
<!--  end content-outer........................................................END -->
