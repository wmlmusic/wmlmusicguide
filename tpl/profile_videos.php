	<link type="text/css" rel="stylesheet" href="public/css/jquery.raty.css"/>
	<script src='public/js/jquery.raty.js' type="text/javascript"></script>
<div class="tabs standard">
      <div class="tabs">
      	<div class="tab-wrapper">
	      	<div id="menuwrapper">
	      		<ul>
	        		<li><a href="directory_page.php">World Music Listing</a>
	        		<?php echo $data['payment'] ? $data['musicListing'] : null ?>
				</ul>
	      	</div>
	    </div>        
        <div class="tab-content">
        <div id="page-heading">
        	<h1><?php echo $data['artist_row']['aname'] . ' Videos'; ?></h1>
			<hr />
		</div>
    
  	<div id="tab1" class="tab active">
                <div class="class_left">
					<div style="border:0px solid red; margin:0 0 5px 0;">
						<div class="class_left" style="text-align:right;">Rating (<?php echo $data['total'] ?>):</div>
							<div class="class_right">
								<span id="star"></span>
								<!-- | <a href="#reviews">Reviews (10)</a> -->
							</div>
						<div class="clear"></div>
					</div>
  		<?php 
			$youtube_username = $data['artist_row']['youtube_channel'];
			$art_id = $data['artist_row']['id'];
  			if($youtube_username != ''):
  		?>
  		
		<ul class="products" id="portfolio">
		<?php 
				// set feed URL
				$feedURL = 'https://gdata.youtube.com/feeds/api/users/' . $youtube_username . '/uploads';
				// read feed into SimpleXML object
    			$sxml = simplexml_load_file($feedURL);

				// iterate over entries in feed
    			foreach ($sxml->entry as $entry) :
					// get nodes in media: namespace for media information
				    $media = $entry->children('http://search.yahoo.com/mrss/');
				     
			    	// get video player URL
				    $attrs = $media->group->player->attributes();
				    $watch = $attrs['url'];
				    $query_string = array();

					parse_str(parse_url($watch, PHP_URL_QUERY), $query_string);

					$youtube_id = $query_string["v"];
				     
				    // get video thumbnail
				    $attrs = $media->group->thumbnail[0]->attributes();
				    $thumbnail = $attrs['url'];
				           
				    // get <yt:duration> node for video length
				    $yt = $media->children('http://gdata.youtube.com/schemas/2007');
				    $attrs = $yt->duration->attributes();
				    $length = $attrs['seconds'];
				     
				    // get <yt:stats> node for viewer statistics
				    $yt = $entry->children('http://gdata.youtube.com/schemas/2007');
				    $attrs = $yt->statistics->attributes();
				    $viewCount = $attrs['viewCount'];
				     
				    // get <gd:rating> node for video ratings
				    $gd = $entry->children('http://schemas.google.com/g/2005');
				    if ($gd->rating) {
				        $attrs = $gd->rating->attributes();
				        $rating = $attrs['average'];
			      	} else {
			        	$rating = 0;
			      	}
		?>		
    		<li>
    			<a href="profile_video.php?id=<?php echo($art_id)?>&amp;url=<?php echo $youtube_id ?>&amp;media=video">
		            <div class="image" style="background-image:url(<?php echo $thumbnail ?>);"></div>
		            <h1><?php echo $media->group->title; ?></h1>
		            <div class="informations">
		                <p>
		                	<span class="attr">By:</span> <?php echo $entry->author->name; ?> <br/>
          					<span class="attr">Duration:</span> <?php printf('%0.2f', $length/60); ?><br/>
		                	<span class="attr">Views:</span> <?php echo $viewCount; ?> <br/>
          					<span class="attr">Rating:</span> <?php echo $rating; ?>
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
id = <?php echo $data['id'];?>;
		$.fn.raty.defaults.path = 'public/images';
		$.fn.raty.defaults.readOnly = "<?php echo check_cookie($data['id']);?>";
		$('#star').raty({score:"<?php echo $data['rate'];?>",
 			click: function(score, evt) {
 				$.post('single_profile.php',{'rate':score,'pid':id, 'rate_type' : '<?php echo $data["rate_type"] ?>'},function(data)
				{
     				$('#star').raty({score:score, readOnly:true});
				}
			)
		}
		});
		$(document).ready(function() {
			$('#newsslider').accessNews({
				title : "",
				subtitle:"",
				// speed : "slow",
				// slideBy : 4,
				// slideShowInterval: 100000,
				// slideShowDelay: 100000
			});
			$(".review_form").click(function() {
				$(".review_panel").slideToggle("slow");
			});
			$('#form_submit').prop( "disabled", false );
			$('form#review_form').submit(function(){
				alert('submitted');
				return false;
				var form = $('form#review_form').serialize();
				$.ajax({
		            url: "ajax_smscontroller.php",
		            type: "POST",             
		            data: form,
		            contentType: false,
		            cache: false,
		            processData:false,
		            beforeSend: function (){
		              	$('#response_server').removeClass('alert-success alert-danger').html('');
		              	$('#form_submit').prop( "disabled", true ).val('Submitting...');
		            },
		            success: function(data)   // A function to be called if request succeeds
		            {
		              	if(data.status == 1){ //success
		                	// $('#response_server').addClass("alert-success").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.message);
		              	}
		              	else{
		                	// $('#response_server').addClass("alert-danger").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.message);
		              	}
		              	$('#form_submit').prop( "disabled", false ).val('Submit');
		            }
		        });
				return false;
			});
			
		});
    </script>	