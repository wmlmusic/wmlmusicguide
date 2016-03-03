<?php
//print_r($data); exit;
 ?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>View All Users</h1>
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
				<!--  end message-blue -->
			
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				
				<?php if(isset($_GET['act']) && $_GET['act'] == 'deleted') { ?>
				<tr>
					<td class="green-left">User removed sucessfully. <a href="http://wmlmusicguide.com/site/admin/master_admin/adduser.php">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				<?php } ?>
				<?php if(isset($_GET['act']) && $_GET['act'] == 'updated') { ?>
				<tr>
					<td class="green-left">User updated sucessfully. <a href="http://wmlmusicguide.com/site/admin/master_admin/adduser.php">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				<?php } ?>
				<?php if(isset($_GET['act']) && $_GET['act'] == 'added') { ?>
				<tr>
					<td class="green-left">User added sucessfully. <a href="http://wmlmusicguide.com/site/admin/master_admin/adduser.php">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				<?php } ?>
				</table>
				</div>
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					
					<th class="table-header-repeat line-left minwidth-1"><a href="">Username</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">User Type</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Created By</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Password</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-repeat line-left"><a href="">User's Status</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				<?php 
				if(!empty($data)){
			   foreach($data as $users_details) { //print_r($users_details);?>
				<tr>
					<td><?php echo $users_details['username']; ?></td>
					<td><?php echo $users_details['user_type']; ?></td>
					<td><?php echo $users_details['created_by']; ?></td>
					<td><?php echo base64_decode($users_details['password']); ?></td>
					<td><?php echo $users_details['email']; ?></td>
					<td><?php if($users_details['status'] == '1') { ?> 
								<a href="http://wmlmusicguide.com/site/admin/master_admin/viewusers.php?act=status&id=<?php echo $users_details['id']; ?>"><img src="images/table/icon_close_green.gif"   alt="" /></a>
							<?php	}else{ ?>
								<a href="http://wmlmusicguide.com/site/admin/master_admin/viewusers.php?act=status&id=<?php echo $users_details['id']; ?>"><img src="images/table/icon_close_red.gif"   alt="" /></a>
						<?php		}?>
					</td>
					<td><?php if($users_details['delete_by_user'] == '0') { ?> 
								<img src="images/table/icon_close_red.gif"   alt="" />
						<?php	} ?>
					</td>
					<td class="options-width">
						<a onclick="return confirm('Do you really want to delete?');" href="http://wmlmusicguide.com/site/admin/master_admin/viewusers.php?act=delete&id=<?php echo $users_details['id']; ?>" title="Delete" class="icon-2 info-tooltip"></a>
						<a href="http://wmlmusicguide.com/site/admin/master_admin/adduser.php?act=edit&id=<?php echo $users_details['id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>
					</td>
				</tr>
				<?php }	
				}	?>
				
				
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
