<div class="tabs standard">
      <div class="tabs">
      	<div class="tab-wrapper">
	      	<div id="menuwrapper">
	      		<ul>
	        		<li><a href="directory_page.php">World Music Listing</a>
	        		<?php echo $data['musicListing'] ?>
				    <li><a href="profile.php">Profile</a></li>
				</ul>
	      	</div>
	    </div>        
        <div class="tab-content">
        <div id="page-heading">
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
		<hr />

	</div>
    
  	<div id="tab1" class="tab active">
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
					$isExistImg	= checkImagexists('uploads/', 'artistcover_' . $art_id);
					$imgurl		= $isExistImg ? 'uploads/artistcover_' . $art_id . '.jpg' : './directorypage/music.png';
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
    			<a href="single_profile.php?id=<?php echo($art_id)?>">
		            <div class="image" style="background-image:url(<?php echo $imgurl ?>);"></div>
		            <h1><?php echo ucwords($art_name);?></h1>
		            <div class="informations">
		                <p>
		                <?php if($data['payment'] == 1): ?>
		                	<?php echo $art_add . $art_city . $art_state . $art_nation?>
		                	<?php echo isset($genre) ? '<br /><b>Genre: </b>' . $genre : '' ?>
		                	<?php echo isset($field) ? '<br /><b>Field: </b>' . $field : '' ?>
		               	<?php else: ?>
		               		Please make a payment to view contact info
		               	<?php endif;?>
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