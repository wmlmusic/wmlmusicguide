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
  			// echo "<pre>"; print_r($data); 
  			if($data['comListing']):
  				$mp_id 	 = $data['cat_row']['mp_id'];
  				$mp_type = $data['cat_row']['mp_type'];
  		?>
		<ul class="products">
		<?php
			foreach ($data['comListing'] as $key => $value) :
				$com_id 	= $value['com_id'];
				$com_name 	= $value['cname'];
				$com_phone1 = $value['phone1'] != '' ? ', ' . $value['phone1'] : '';
				$com_phone2 = $value['phone2'] != '' ? ', ' . $value['phone2'] : '';;
				$com_add 	= $value['address'] != '' ? $value['address'] . ', ' : '';
				$com_city 	= $value['city'] != '' ? $value['city'] . ', ' : '';
				$com_state 	= $value['state'] != '' ? $value['state'] . ', ' : '';
				$com_nation	= $value['country'] != '' ? $value['country'] : '';
				$com_phone	= $value['phone'] != '' ? '<br/>Phone: ' . $value['phone'] . $com_phone1 . $com_phone2 : '';
				$com_fax	= $value['fax_no'] != '' ? '<br/>Fax No: ' . $value['fax_no'] : '';
				$com_url	= $value['website'] != '' ? '<br/>Website: ' . $value['website'] : '';

				$isExistImg	= checkImagexists('uploads/', 'companylogo_' . $com_id);
				// print_r($value);
				$imgurl		= $isExistImg ? 'uploads/companylogo_' . $com_id . '.jpg' : './directorypage/music.png';
		?>
    		<li>
    			<a href="artist_directory.php?id=<?php echo($com_id)?>&type_id=<?php echo($mp_id) ?>">
		            <div class="image" style="background-image:url(<?php echo $imgurl ?>);"></div>
		            <h1><?php echo ucwords($com_name);?></h1>
		            <div class="informations">
		                <p><?php echo $com_add . $com_city . $com_state . $com_nation . $com_phone . $com_fax . $com_url?></p>
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