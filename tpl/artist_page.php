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
				<div id="list4">
				   	<ul>
				   	<?php if($data['cat_row']['president']){?>
				      	<li>President<strong><?php echo $data['cat_row']['president'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['vice_president']){
				    ?>
				    	<li>Vice President<strong><?php echo $data['cat_row']['vice_president'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['ceo']){
				    ?>
				    <li>CEO<strong><?php echo $data['cat_row']['ceo'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['vice_ceo']){
				    ?>
				    <li>Vice CEO<strong><?php echo $data['cat_row']['vice_ceo'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['director']){
				    ?>
				    <li>Director<strong><?php echo $data['cat_row']['director'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['manager']){
				    ?>
				    <li>Manager<strong><?php echo $data['cat_row']['manager'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['aandr']){
				    ?>
				    <li>A&R<strong><?php echo $data['cat_row']['aandr'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['general_manager']){
				    ?>
				    <li>General Manager<strong><?php echo $data['cat_row']['general_manager'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['road_manager']){
				    ?>
				    <li>Road Manager<strong><?php echo $data['cat_row']['road_manager'] ?></strong></li>
				    <?php
				    	}
				    	if($data['cat_row']['administration']){
				    ?>
				    <li>Administration<strong><?php echo $data['cat_row']['administration'] ?></strong></li>
				    <?php
				    	}
				    ?>
				   </ul>
				</div>
	    </div>        
        <div class="tab-content">
        <div id="page-heading">
		<h1><?php echo(ucwords($data['cat_row']['cname'])) ?></h1>
		<hr />
	</div>
    
  	<div id="tab1" class="tab active">
  		<?php 
  			if($data['artListing']):
  		?>
		<ul class="products">
		<?php
			foreach ($data['artListing'] as $key => $value) :
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
		?>
    		<li>
				<a href="single_profile.php?id=<?php echo($art_id)?>">
		        <div class="image" style="background-image:url(<?php echo $imgurl ?>);"></div>
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