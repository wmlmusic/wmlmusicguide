<style type="text/css">.error{color:red;}</style>
<!--start content-outer ........START -->
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
		<!--  start content-table-inner ...... START -->
		<div id="content-table-inner">
			<?php if(isset($_GET['act']) && $_GET['act'] == 'updated') { ?>
			<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				
				
				<tr>
					<td class="green-left">Social media updated successfully.</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<?php } ?>
			<!--  start table-content  -->
			<div id="table-content" style="border:0px solid red">		
				<?php
					// echo "<pre>"; print_r($data['exsocial']);
				?>				
				<form id="socialForm" action="sclcontroller.php" method="post">
					<!-- start id-form -->
					<?php if(count($data['rows'][0]) > 0 ): ?>
					<table border="0" width="100%" cellpadding="0" cellspacing="0"  id="id-form">
					<?php foreach (array_chunk($data['rows'], 2) as $row) { ?>
					    <tr>
					    <?php 
					    	foreach ($row as $value) { 
					    		$selectedKey = $data['exsocial'] ? searchForId($value['mp_id'], $data['exsocial']) : NULL;
					    		if($selectedKey >= 0){
					    			$exvalue = @$data['exsocial'][$selectedKey]['social_link'];
					    		}

					    ?>
					    	<th><?php echo $value['mp_name'] ?>:</th>
					        <td><input type="url" class="inp-form" name="social_media[<?php echo $value['mp_id'] ?>]" value="<?php if($exvalue) echo $exvalue; ?>" /></td>
					    <?php } ?>
					    </tr>
					<?php } ?>
					<tr>
						<td colspan="4">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="" class="form-submit" />
							<input id="restform" class="form-reset">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					</table>
					<input type="hidden" name="type" value="<?php echo $data['type'] ?>" />
					<input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
					<?php else:	?>
						<div id="message-red">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="red-left">There are no social links</td>
						<td class="red-right"><br /><br /></td>
					</tr>
					</table>
					</div>
					<?php endif; ?>
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
		$('#socialForm').validate({errorElement: "div"});
		$('#restform').click(function(){
            $('#socialForm')[0].reset();
 		});
	});
</script>