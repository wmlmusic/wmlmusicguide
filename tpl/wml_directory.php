		<div class="tabs standard">
      <div class="tabs">
      	<div class="tab-wrapper">
	      	<div id="menuwrapper">
	      		<ul>
	        		<li><a href="wml_directory.php">World Music Listing</a>
	        		<?php echo $data['musicListing'] ?>
				    <li><a href="profile.php">Profile</a></li>
				</ul>
	      	</div>
	    </div>        
        <div class="tab-content">
        <div id="page-heading">
		<h1 style="text-align:left;float:left;">World Music Listing: Diverse Music Guide</h1>
		<div style="text-align:right;float:right;">
			Filter
			<select id="#dynamix_select" style="padding: 5px;" size="5" multiple="multiple">
				<option value="wml_directory.php">Select Filter</option>
				<optgroup label="Category">
				<?php
					$selected = '';
					if(isset($data['selectedId']['cat_id']))
						$selectedid = $data['selectedId']['cat_id'];

					if(count($data['catSelectListing'])>0):

					foreach ($data['catSelectListing'] as $key => $value) :
						if(isset($selectedid)){
							$selected = $value['mp_id'] == $selectedid ? 'selected' : '';
						}
				?>
					<option value="wml_directory.php?cat_id=<?php echo $value['mp_id'] ?>" <?php echo $selected ?>>&nbsp;<?php echo $value['mp_name'] ?></option>
				<?php
						endforeach;
					endif;
				?>
				</optgroup>
				<optgroup label="Genre">
				<?php
					$selected = '';
					if(isset($data['selectedId']['genre_id']))
						$selectedid = $data['selectedId']['genre_id'];

					if(count($data['genSelectListing'])>0):

					foreach ($data['genSelectListing'] as $key => $value) :
						if(isset($selectedid)){
							$selected = $value['mp_id'] == $selectedid ? 'selected' : '';
						}
				?>
					<option value="wml_directory.php?genre_id=<?php echo $value['mp_id'] ?>" <?php echo $selected ?>>&nbsp;<?php echo $value['mp_name'] ?></option>
				<?php
						endforeach;
					endif;
				?>	
				</optgroup>
				<optgroup label="Field">
				<?php
					$selected = '';
					if(isset($data['selectedId']['field_id']))
						$selectedid = $data['selectedId']['field_id'];

					if(count($data['fieldSelectListing'])>0):

					foreach ($data['fieldSelectListing'] as $key => $value) :
						if(isset($selectedid)){
							$selected = $value['mp_id'] == $selectedid ? 'selected' : '';
						}
				?>
					<option value="wml_directory.php?field_id=<?php echo $value['mp_id'] ?>" <?php echo $selected ?>>&nbsp;<?php echo $value['mp_name'] ?></option>
				<?php
						endforeach;
					endif;
				?>
				</optgroup>
			</select>
		</div>
		<hr class="clear" />
		<!-- <div class="btnarea">
		    <ul id="nav-horizontal">
		    <li><a href="#" class="active">Contact</a></li>
		    <li><a href="#">Social</a></li>
		  </ul>
		  <div class="clear"></div>
  		</div> -->
	</div>
    
  	<div id="tab1" class="tab active">
  		<div class="nested-container">
			<ul class="nested-tabs">
				<li class="tab-link current" data-tab="tab-1">Contact</li>
				<li class="tab-link" data-tab="tab-2">Social</li>
			</ul>			
			<div id="tab-1" class="nested-tab-content current">
			<?php if($data['artListing']) :?>
				<table id="contact" class="tablesorter">
				<thead>
					<tr>
					  	<th>Name</th>
					  	<th>Category</th>
					  	<th>Genre</th>
					  	<th>Field</th>
					  	<th>Address</th>
					  	<th>Phone#</th>
					  	<th>Email</th>
					  	<th>Picture</th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach ($data['artListing'] as $key => $value) :
						// echo "<pre>"; print_r($value);
						$art_id 	= $value['id'];
						$com_id 	= $value['com_id'];
						$art_name 	= $value['aname'];
						$com_name 	= $value['cname'];
						$art_add 	= $value['address'] != '' ? $value['address'] . ',<br /> ' : '';
						$art_city 	= $value['city'] != '' ? $value['city'] . ',<br /> ' : '';
						$art_state 	= $value['state'] != '' ? $value['state'] . ',<br /> ' : '';
						$art_nation	= $value['country'] != '' ? $value['country']	 : '';
						$isExistImg	= checkImagexists('uploads/', 'artistcover_' . $art_id);
						$imgurl		= $isExistImg ? 'uploads/artistcover_' . $art_id . '.jpg' : './directorypage/music.png';
						$genre = '-';
						$field = '-';
						$category = '-';
						if(isset($value['properties'])){
							$properties = $value['properties'];

							$genre = isset($properties['genre']) ? $properties['genre'] : '';
							$field = isset($properties['field']) ? $properties['field'] : '';
							$category = isset($properties['category']) ? $properties['category'] : '';
							if(is_array($genre)){
								$genop = array();
								foreach ($genre as $id=>$name) {
								    $genop[] = sprintf('<a href="wml_directory.php?genre_id=%s">%s</a>', $id, htmlentities($name));
								}
							}
							if(is_array($field)){
								$fldop = array();
								foreach ($field as $id=>$name) {
								    $fldop[] = sprintf('<a href="wml_directory.php?field_id=%s">%s</a>', $id, htmlentities($name));
								}
							}
							if(is_array($category)){
								$catop = array();
								foreach ($category as $id=>$name) {
								    $catop[] = sprintf('<a href="wml_directory.php?cat_id=%s">%s</a>', $id, htmlentities($name));
								}
							}
							$genre = is_array($genre) ? implode(', ', $genop) : '-';
							$field = is_array($field) ? implode(', ', $fldop) : '-';
							$category = is_array($category) ? implode(', ', $catop) : '-';
						}
						$phone 	= $value['phone'] != '' ? $value['phone'] : '-';
						$email 	= $value['email'] != '' ? $value['email'] : '-';
				?>

				<tr>
				  	<td>
				  		<strong><?php echo ucwords($art_name);?></strong><br />
				  		<a href="wml_directory.php?com_id=<?php echo $com_id; ?>"><?php echo ucwords($com_name);?></a>
				  	</td>
				  	<td><?php echo $category ?></td>
				  	<td><?php echo str_replace(",", ", <br/>", $genre); ?></td>
				  	<td><?php echo str_replace(",", ", <br/>", $field) ?></td>
				  	<td><?php echo $art_add . $art_city . $art_state . $art_nation?></td>
				  	<td><?php echo $phone ?></td>
				  	<td><?php echo $email ?></td>
				  	<td><div class="tbl_image"><a href="single_profile.php?id=<?php echo $art_id; ?>"><img src="<?php echo $imgurl ?>" /></a></div></td>
				</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			<?php else: ?>
				There are no/0 records.
			<?php endif; ?>
			</div>
			<div id="tab-2" class="nested-tab-content">
			<?php if($data['artListing']) :?>
				<table id="social" class="tablesorter">
					<thead>
						<tr>
					  		<th>Name</th>
					  		<th>Website</th>
					  	<?php 
					  		if($data['socialListing']){
					  			foreach ($data['socialListing'] as $key => $value) {
					  	?>
					  		<th><?php echo $value['mp_name'] ?></th>
					  	<?php
					  			}
					  		}
					  	?>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($data['socialsListing'] as $key => $value) :
							// echo "<pre>"; print_r($value);
							$art_id 	= $value['id'];
							$com_id 	= $value['com_id'];
							$art_name 	= $value['aname'];
							$com_name 	= $value['cname'];
							$website 	= $value['website'];
							// $website 	= '';
							if($website != ''){
								$parse = parse_url($website);
								$website = sprintf('<a href="%s" target="_blank">%s</a>', $website, $parse['host']);
							}
					?>
						<tr>
							<td>
						  		<strong><?php echo ucwords($art_name);?></strong><br />
						  		<a href="wml_directory.php?com_id=<?php echo $com_id; ?>"><?php echo ucwords($com_name);?></a>
						  	</td>
						  	<td><?php echo ucwords($website);?></td>
						  	<?php 
					  			if($data['socialListing']){
					  				foreach ($data['socialListing'] as $skey => $svalue) {
					  					$site = '-';
						  				if(isset($value['properties'])){
						  					// echo $skey;
											$properties = $value['properties'];

						  					// echo "<pre>"; print_r($properties);
											$social = isset($properties['social']) ? $properties['social'] : '';
						  					// echo "<pre>"; print_r($social[$svalue['mp_id']]);
						  					// echo $svalue['mp_id'];
											if (array_key_exists($svalue['mp_id'], $social)) {
						  						// echo "<pre>"; print_r($social[$svalue['mp_id']]);
												$url = $social[$svalue['mp_id']];
												$parse = parse_url($url);
												$site = '<a href="'. $social[$svalue['mp_id']] .'" target="_blank">' . $parse['host'] . '</a>';
											}
										}
						  	?>
						  		<td><?php echo $site ?></td>
						  	<?php
						  			}
						  		}
						  	?>
						</tr>
					<?php
						endforeach;
					?>
					</tbody>
				</table>
				<?php else: ?>
				There are no/0 records.
				<?php endif; ?>
			</div>
		</div><!-- container -->
				
    	<div class="clear"></div>
    </div>
	
    <script type="text/javascript">
	
    <!-- Apply dropdown check list to the selected items  -->
    <script type="text/javascript">
        $(document).ready(function() {
		//	$("#dynamix_select'").dropdownchecklist();

	    	$("#contact").tablesorter();
	    	$("#social").tablesorter();
	    	$('ul.nested-tabs li').click(function(){
				var tab_id = $(this).attr('data-tab');

				$('ul.nested-tabs li').removeClass('current');
				$('.nested-tab-content').removeClass('current');

				$(this).addClass('current');
				$("#"+tab_id).addClass('current');
			});
			jQuery('.tbl_image').nailthumb({width:80,height:70});

			$('#dynamix_select').bind('change', function () {
	          	var url = $(this).val(); // get selected value
	          	if (url) { // require a URL
	              	window.location = url; // redirect
	          	}
	          	return false;
	      	});
	  	});
  	</script>