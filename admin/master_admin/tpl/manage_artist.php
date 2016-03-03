<!--start content-outer ...................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Artists/Client</h1>
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
					if(isset($_GET['act']) &&  $_GET['act'] == 'added'):
				?>
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Social media is added.</td>
					<td class="green-right"><br /><br /></td>
				</tr>
				</table>
				</div>
				<!--  start message-red -->

				<?php
					endif;
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
				?>
				<!--  end message-green -->
		
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
					<th class="table-header-repeat line-left minwidth-1"><a href="" class="nobg">Client Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="" class="nobg">Email</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="" class="nobg">Active</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="" class="nobg">Added Date</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				<?php
						foreach ($data['rows'] as $key => $value) {
				?>
				<tr <?php echo ($i%2 == 0) ? 'class="alternate-row"' : '' ?>>
					<td><?php echo $i ?></td>
					<td><?php echo $value['aname'] ?></td>
					<td><?php echo $value['email'] ?></td>
					<td><?php echo $value['status'] == '1' ? 'Yes' : 'No' ?></td>
					<td><?php echo $value['created_date'] ?></td>
					<td class="options-width">
						<a href="artist_form.php?id=<?php echo $value['id'] ?>" title="Edit" class="icon-1 info-tooltip"></a>
						<a href="social_form.php?type=artist&amp;id=<?php echo $value['id'] ?>" title="Social Media" class="icon-3 info-tooltip"></a>
						<a href="artist.php?del_id=<?php echo $value['id'] ?>" title="Edit" class="icon-2 info-tooltip"></a>
						<!-- <a href="" title="Edit" class="icon-4 info-tooltip"></a>
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
		$(".icon-2").click(function(){
		    if (!confirm("Are sure you want to delete?")){
		      return false;
		    }
		});
	});
</script>
