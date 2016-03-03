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
		<h1>Search Results</h1>
		<hr />
	</div>    
  	<div id="tab1" class="tab active">
		<div class="search">
		<?php
			if(preg_match("/[A-Z  | a-z]+/", $_GET['q'])) :
				if($data['searchListing']) :
		?>
		  	<ul>
		<?php
					foreach ($data['searchListing'] as $key => $value) :
						$art_id 	= $value['id'];
						$isExistImg	= checkImagexists('uploads/', 'artistcover_' . $art_id);
						$imgurl		= $isExistImg ? 'uploads/artistcover_' . $art_id . '.jpg' : './directorypage/music.png';
						$art_name 	= $value['aname'];
						// $com_name 	= $value['cname'];
						$com_id 	= $value['com_id'];
						$art_add 	= $value['address'] != '' ? $value['address'] . ', ' : '';
						$art_city 	= $value['city'] != '' ? $value['city'] . ', ' : '';
						$art_state 	= $value['state'] != '' ? $value['state'] . ', ' : '';
						$art_nation	= $value['country'] != '' ? $value['country']	 : '';

						$phone 	= $value['phone'] != '' ? $value['phone'] : '';
						$email 	= $value['email'] != '' ? ', ' . $value['email'] : '';

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
		?>
		    	<li>
		      		<div class="tbl_image"><a href="single_profile.php?id=<?php echo $art_id  ?>"><img src="<?php echo $imgurl ?>" /></a></div>
		      		<h3><a href="single_profile.php?id=<?php echo $art_id  ?>"><?php echo ucwords($art_name);?></a><!-- <a href="wml_directory.php?com_id=<?php echo $com_id; ?>"><?php echo ucwords($com_name);?></a> --></h3>
		      		<p>
		      			 <!-- <?php //echo $art_add . $art_city . $art_state . $art_nation?><br /> -->
		      			 <!-- <?php //echo $phone . $email ?><br /> -->
		      			 <?php echo $category ?> / <?php echo $genre ?> / <?php echo $field ?>
		      		</p>
		    	</li>
		<?php
					endforeach;
		?>
		  	</ul>
		<?php
				else:
					echo  "<p>Sorry, but we can not find an entry to match your query</p>";
				endif;
			else:
				echo  "<p>Please enter a search query</p>";
			endif;
		?>
		</div>
    	<div class="clear"></div>
    </div>
    <script type="text/javascript">
	    $(document).ready(function(){
	    	$('.tbl_image').nailthumb({width:100,height:100});
	    });
	</script>