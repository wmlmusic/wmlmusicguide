	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=714415891941777";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <link type="text/css" rel="stylesheet" href="../public/css/jquery.raty.css"/>
    <script src='../public/js/jquery.raty.js' type="text/javascript"></script> 
    <script type="text/javascript">
        jQuery(function(){     
            jQuery('#camera_wrap_1').camera({
                thumbnails: true,
                height: '400px',
                loader: 'pie', // bar,pie
                pieDiameter: 38,
                piePosition: "rightTop",               
                time: 1500, // ms (1500 = 1.5 seconds)
                pagination: true               
            });
        });
    </script>
    <div class="sidebar_widgets comp"> 
		<?php include 'tpl/sidebar.php'; ?>     
    </div>
    <!--sidebar-widget comp-->
    <div class="clr"></div>
    </div>
    </div>
    <div class="twelve columns">
        <div class="centercol last"> 
            <?php include 'tpl/social.php'; ?> 
			<!-- now_page -->
			<div class="now_page">
				<?php if($data['wmlBanners']){ ?>
				<div id="now_slider" style="height: 400px;"> 
				<!-- DC Camera Slider Start -->
					<div style="margin:0 auto; "> <!-- define slider container width (strict enforce) -->
						<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
						<?php 
						foreach($data['wmlBanners'] as $key=>$value){ 
							$id   = $value['id'];
							$name   = $value['name'];
							$details  = (strlen($value['details']) > 100) ? substr($value['details'], 0, 100).'...' : $value['details'];
							$isExistImg = checkImagexists('../uploads/', 'banner_' . $id);
							$imgurl   = $isExistImg ? '../uploads/banner_' . $id . '.jpg' : '../uploads/logo.png';   
						?> 
					<div data-thumb="<?php echo $imgurl ?>" data-src="<?php echo $imgurl ?>">
						<div class="camera_caption fadeFromBottom"> <?php echo $name ?> <em><?php echo $details ?></em> </div>
					</div>
					<?php } ?>            
				</div>
				<!-- /camera_wrap --> 
			</div>
			<!-- DC Camera Slider End --> 
        </div>
        <!--Slider-->
        <?php } ?>
        <div class="clr"></div>
    </div>
    <!-- /now_page -->
    <div class="content">
        <div id="gallery" class="content_resize"> 
                
            <!-- dCodes Hosted Examples: Start --> 
            <!-- For reference, visit: http://www.dcodes.net/2/docs/ --> 
                
            <!-- DC Columns CSS -->
            <link href="http://cdn.dcodes.net/2/columns/css/dc_columns.css" rel="stylesheet" type="text/css">
                
            <!-- DC Social Icons CSS -->
            <link href="http://cdn.dcodes.net/2/social_icons/dc_social_icons.css" type="text/css" rel="stylesheet">
                
            <!-- DC Flat Buttons CSS -->
            <link href="http://cdn.dcodes.net/2/flat_buttons/css/dc_flat_buttons.css" rel="stylesheet" type="text/css">
            <h1 class="gap90" style="font-family: &quot;Oxygen&quot;; font-size: 33px; color: rgb(28, 28, 28);">World Music Listing</h1>
                
            <?php 
                if($data['musicListing']) :
                    foreach ($data['musicListing'] as $key => $value) :
						$date     = $value['created_date'];
						$today    = date('Y-m-d H:i:s', time());
						$olddays  = dateDiff($date, $today);

						$art_id     = $value['id'];
						$art_name   = $value['aname'];
						$art_add    = $value['address'] != '' ? $value['address'] . ', ' : '';
						$art_city   = $value['city'] != '' ? $value['city'] . ', ' : '';
						$art_state  = $value['state'] != '' ? $value['state'] . ', ' : '';
						$art_nation = $value['country'] != '' ? $value['country']  : '';
						$isExistImg = checkImagexists('../uploads/', 'artistcover_' . $art_id);
						$imgurl     = $isExistImg ? '../uploads/artistcover_' . $art_id . '.jpg' : '../uploads/logo.png';

						if(isset($value['properties'])){
							$properties = $value['properties'];

							$genre = isset($properties['genre']) ? $properties['genre'] : '';
							$field = isset($properties['field']) ? $properties['field'] : '';
							$genre = is_array($genre) ? implode(', ', $genre) : '';
							$field = is_array($field) ? implode(', ', $field) : '';
						}
						?>
						<!-- DC [2 Columns] Start -->
						<div class="one_half_pad"> 
							<a class="#" style="color: rgb(255, 134, 4);">
							<img src="<?php echo $imgurl ?>" style="visibility: visible; opacity: 1;" />
							<span class="red">HOT</span>
							<?php if($olddays < 30) : ?>
							<span class="yellow">NEW</span>
							<?php endif; ?>
							</a>
							<br>
							<h3><a href="single_profile.php?id=<?php echo $art_id; ?>"><?php echo ucwords($art_name);?></a></h3>
							<p>
							<?php echo isset($genre) ? '<b>Genre: </b>' . $genre : '' ?>
							<?php echo isset($field) ? '<br /><b>Field: </b>' . $field : '' ?>
							</p>
							<br>
						</div>
						<!-- END one_half_pad -->

					<?php 
					endforeach;
				endif; 
				?>
            </div>
            <div class="clr"></div>
        </div>
		<div class="clr"></div>
        <div class="sidebar_widgets mob">
            <?php include 'tpl/sidebar_m.php'; ?>  
        </div>
		<!--sidebar-widget mob--> 
<script type="text/javascript">
id = <?php echo $data['id'];?>;
		$.fn.raty.defaults.path = '../public/images';
		$.fn.raty.defaults.readOnly = "<?php echo check_cookie($data['id']);?>";
		$('#star').raty({score:"<?php echo $data['rate'];?>",
 			click: function(score, evt) {
 				$.post('m/post.php',{'rate':score,'pid':id, 'rate_type' : '<?php echo $data["rate_type"] ?>'},function(data)
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
		<!-- prefooter -->
		<div class="prefooter_bg">
			<div class="prefooter">
				<div class="prefooter_resize">
					<div class="four columns">
						<div class="fcol first">
							<h2><em class="footer_h2_font">All WML</em></h2>
							<?php
							if($data['wmlAllWML']){
								foreach ($data['wmlAllWML'] as $key=>$value){
								$id = $value['id'];
								$isExistImg = checkImagexists('../uploads/', 'post_' . $id);
								// print_r($value);
								$imgurl   = $isExistImg ? '../uploads/post_' . $id . '.jpg' : '../uploads/logo.png';
								?>
                                                                <img src="<?php echo $imgurl ?>" width="100" height="80">
								<p><a href="post.php?id=<?php echo $id ?>"><?php echo $value['name'] ?></a><br />
								<?php echo substr(stripcslashes($value['details']), 0, 130) . '...'; ?></p>
								<?php
								}
							}
							?>
						</div>
					</div>
					<div class="four columns">
						<div class="fcol">
							<h2><em class="footer_h2_font">Music</em></h2>
							<?php
							if($data['wmlWMLMusic']){
								foreach ($data['wmlWMLMusic'] as $key=>$value){
									$id = $value['id'];
									$isExistImg = checkImagexists('../uploads/', 'post_' . $id);
									// print_r($value);
									$imgurl   = $isExistImg ? '../uploads/post_' . $id . '.jpg' : '../uploads/logo.png';
									?>
                                                                        <img src="<?php echo $imgurl ?>" width="100" height="80">
									<p><a href="post.php?id=<?php echo $id ?>"><?php echo $value['name'] ?></a><br />
									<?php echo substr(stripcslashes($value['details']), 0, 130) . '...'; ?></p>
									<?php
								}
							}
							?>
						</div>
					</div>
					<div class="three columns">
                    <div class="fcol last">
						<h2><em class="footer_h2_font">Video</em></h2>
						<?php
                        if($data['wmlWMLVideo']){
							foreach ($data['wmlWMLVideo'] as $key=>$value){
								$id = $value['id'];
								$isExistImg = checkImagexists('../uploads/', 'post_' . $id);
								// print_r($value);
								$imgurl   = $isExistImg ? '../uploads/post_' . $id . '.jpg' : '../uploads/logo.png';
								?>
                                                                <img src="<?php echo $imgurl ?>" width="100" height="80">
								<p><a href="post.php?id=<?php echo $id ?>"><?php echo $value['name'] ?></a><br />
								<?php echo substr(stripcslashes($value['details']), 0, 130) . '...'; ?></p>
								<?php
								}
							}
						?>
                    </div>
                      
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
              <!-- /prefooter --> 
              