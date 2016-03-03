<!--start content-outer ........................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Profile</h1>
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
				<div id="filter">
					<span class="current"><a href="#">World Music Listing</a></span>
				<?php 
					foreach ($data['categoryListing'] as $key => $value) :
				?>
					<span><a href="#"><?php echo $value['mp_name'] ?></a></span>
				<?php
					endforeach;
				?>
				</div>	
				<?php 
		  			if($data['artistListing']):
		  		?>
		  		
				<ul class="products" id="portfolio">
				<?php 
						foreach ($data['artistListing'] as $key => $value) :
							$art_id 	= $value['id'];
							$art_name 	= $value['aname'];
							$art_add 	= $value['address'] != '' ? $value['address'] . ', ' : '';
							$art_city 	= $value['city'] != '' ? $value['city'] . ', ' : '';
							$art_state 	= $value['state'] != '' ? $value['state'] . ', ' : '';
							$art_nation	= $value['country'] != '' ? $value['country']	 : '';
							$isExistImg	= checkImagexists('../../uploads/', 'artistcover_' . $art_id);
							$imgurl		= $isExistImg ? '../../uploads/artistcover_' . $art_id . '.jpg' : '../../directorypage/music.png';
							if(isset($value['properties'])){
								$properties = $value['properties'];

								$genre = isset($properties['genre']) ? $properties['genre'] : '';
								$field = isset($properties['field']) ? $properties['field'] : '';
								$genre = is_array($genre) ? implode(', ', $genre) : '';
								$field = is_array($field) ? implode(', ', $field) : '';
							}
							$categories = strtolower($value['categories']);
							$pattern = '/\s*,\s*/';
							$replace = ' ';
							$str = preg_replace($pattern, $replace, $categories);
				?>		
		    		<li class="<?php echo $str ?>">
		    			<a href="/single_profile.php?id=<?php echo($art_id)?>">
				            <div class="image" style="background-image:url(<?php echo $imgurl ?>)"></div>
				            <h1><?php echo ucwords($art_name);?></h1>
				            <div class="informations">
				                <p>
				                	<?php echo $art_add . $art_city . $art_state . $art_nation?>
				                	<?php echo isset($genre) ? '<br /><b>Genre: </b>' . $genre : '' ?>
				                	<?php echo isset($field) ? '<br /><b>Field: </b>' . $field : '' ?>
				                </p>
				            </div>
				        </a>
		    		</li>
		    	<?php
		    			endforeach;
		    		else:
		    			echo "There are no/0 records.";
		    		endif;
		    	?>
		    		<div class="clear"></div>
		    	</ul>
		    	<div class="clear"></div>
		    </div>			
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
	$(document).ready(function() {
		$('div#filter a').click(function() {
			$(this).css('outline','none');
			$('div#filter .current').removeClass('current');
			$(this).parent().addClass('current');
			
			// var filterVal = $(this).text().toLowerCase().replace(' ','-');
			var filterVal = $(this).text();
			filterVal	= filterVal.toLowerCase();
	        filterVal	= filterVal.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");
	        filterVal	= filterVal.replace(/\s+/g, "-");
			if(filterVal == 'world-music-listing') {
				$('ul#portfolio li.hidden').fadeIn('slow').removeClass('hidden');
			} else {					
				$('ul#portfolio li').each(function() {
					if(!$(this).hasClass(filterVal)) {
						$(this).fadeOut('normal').addClass('hidden');
					} else {
						$(this).fadeIn('slow').removeClass('hidden');
					}
				});
			}				
			return false;
		});
	});
</script>