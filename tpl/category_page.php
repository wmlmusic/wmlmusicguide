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
		<h1><?php echo(ucwords($data['cat_row']['mp_name'])) ?></h1>
		<hr />
	</div>
    
  	<div id="tab1" class="tab active">
  		<?php 
  			if($data['catListing']):
  		?>
		<ul class="products">
		<?php
			foreach ($data['catListing'] as $key => $value) :
				$cat_id 	= $value['mp_id'];
				$cat_name 	= $value['mp_name'];
				$isExistImg	= checkImagexists('uploads/', 'category_' . $cat_id);
				// print_r($value);
				$imgurl		= $isExistImg ? 'uploads/category_' . $cat_id . '.jpg' : './directorypage/music.png';
		?>
    		<li>
    			<a href="company_directory.php?id=<?php echo($cat_id)?>">
		            <div class="image" style="background-image:url(<?php echo $imgurl ?>);"></div>
		            <h1><?php echo ucwords($cat_name);?></h1>
		            <!-- <div class="informations">
		                <p>any aditional information you want here bla bla bla bla lorem ipsum bacon yeah</p>
		            </div> -->
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