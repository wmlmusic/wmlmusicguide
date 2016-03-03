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
        <div class="sidebar_widgets comp">
			<?php include 'tpl/sidebar_sp.php'; ?>  
        </div>
        <!--sidebar-widget comp-->
        <div class="clr"></div>
        </div>
        </div>

        <div class="twelve columns">
			<div class="centercol last"> 
            <?php include 'tpl/social.php'; ?>                  
            <div class="content">
                <div id="gallery" class="content_resize"> 
                <!-- content start -->                  
                    <div class="content_full_size">
                        <h2><?php echo $data['artist_row']['aname'] ?></h2>
                <div class="pic"><a rel="prettyPhoto[id]" class="prettyPhoto" href="http://cdn.pimg.co/p/800x600/5d8b74/fff/img.png" style="color: rgb(255, 134, 4);"><img alt="Image" src="http://cdn.pimg.co/p/714x217/5d8b74/fff/img.png" style="visibility: visible; opacity: 1;"> </a>
				</div>
                <p>
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo ullamco laboris
				</p>
                <p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat. <br>
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.				  
				</p>
                                <?php
				$username="admin_wml";$password="Rub1k292!";$database="wmldatabase";
				mysql_connect(localhost,$username,$password);
				@mysql_select_db($database) or die( "Unable to select database");
			
				$query= "SELECT id, details FROM `tbl_posts` WHERE user_id = '.$data[artist_row][id].'LIMIT 0, 30 ";
				$result=mysql_query($query);
				$row = mysql_fetch_array($result);
				$row2 = mysql_fetch_assoc($result);
				#row3 = mysql_fetch_assoc($result);
				$num=mysql_numrows($result);
				mysql_close();
				?>
                                        <!-- prefooter -->
		                <div class="prefooter_bg">
			                 <div class="prefooter">
				                <div class="prefooter_resize">
					<div class="four columns">
						<div class="fcol first">
							<h2><em class="footer_h2_font">All <?php echo $data['artist_row']['aname'] ?></em></h2>
							<?php
							if($data['posts']){
								foreach ($data['posts'] as $key=>$value){
									$imageId = $value['id'];
							$isExistImg	= checkImagexists('uploads/', 'post_' . $imageId);
						 // print_r($value);
						 // print_r($data);
							$imgurl		= $isExistImg ? 'uploads/post_' . $imageId . '.jpg' : './uploads/logo.png';
									?>
									<li>
                                                                          <img src="<?php echo $imgurl ?>"  width="100" height="80">
										<h3><a href="post.php?id=<?php echo $imageId ?>"><?php echo $value['name'] ?></a></h3>
										<p><?php echo substr(stripcslashes($value['details']), 0, 130) . '...'; ?></p>
										<p><?php echo $value['category'] ?></p>
									</li>				
									<?php
									}
							}
							?>
						</div>
					</div>
					<div class="four columns">
						<div class="fcol">
							<h2><em class="footer_h2_font">Photo</em></h2>
							<?php
							if($data['wmlWMLMusic']){
								foreach ($data['wmlWMLMusic'] as $key=>$value){
									$id = $value['id'];
									$isExistImg = checkImagexists('../uploads/', 'post_' . $id);
									// print_r($value);
                                                                        // print_r($data);
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
                <div class="clr"></div>
                <div class="sep_clr"></div>
                <div class="cols2">
                <?php if(is_array($data['social'])){?>
					<div class="six columns alpha">
						<div class="col2">
							<div class="list_li">
								<h3>Connect with <?php echo $data['artist_row']['aname'] ?></h3>
									<ul>
										<?php foreach ($data['social'] as $key => $value) { 
										if ($value['social_id'] == '102')
										{
											$twitter_link = $value['social_link'];
											$twitter_name = split(".com/", $twitter_link);
										}
										else if ($value['social_id'] == '45')
										{
											$facebook_link = $value['social_link'];
										}
										else if ($value['social_id'] == '99')
										{
											$soundcloud_link = $value['social_link'];
										}
										else if ($value['social_id'] == '108')
										{
											$youtube_link = $value['social_link'];
											$youtube_name = split("http:\/\/www.youtube.com\/", $youtube_link);
										}
										else if ($value['social_id'] == '89')
										{
											$instagram_link = $value['social_link'];
											$instagram_name = split("https:\/\/www.instagram.com\/", $instagram_link);						 
										}
										?>
										<li>
										<a href="<?php echo $value['social_link'] ?>" target="_blank" style="color: rgb(255, 134, 4);"><?php echo $value['mp_name'] ?></a>
										</li>
										<?php } ?>
									</ul>
							</div>
						</div>
					</div>
                <?php } ?>
                <!-- <div class="six columns alpha">
                <div class="col2 last">
                    <div class="list_li">
						<ul>
							<li><a href="#" style="color: rgb(255, 134, 4);">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></li>
							<li><a href="#" style="color: rgb(255, 134, 4);">Sed fringilla, velit eget sollicitudin tempus, tellus arcu</a></li>
							<li><a href="#" style="color: rgb(255, 134, 4);">Sed ornare tempor euismod. Duis gravida, odio sit amet laoreet </a></li>
							<li><a href="#" style="color: rgb(255, 134, 4);">Dignissim, enim magna mattis augue, sit amet placerat</a></li>
							<li><a href="#" style="color: rgb(255, 134, 4);">Etiam eu nisl scelerisque nisi elementum fringilla</a></li>
						</ul>
                    </div>
                </div>
                </div> -->
                <div class="clr"></div>
                </div>
                <div class="clr"></div>
                <div class="sep_clr"></div>
                
                <!-- content end -->
                <div class="clr"></div>
                            
            </div>
                  
            <!-- content end -->
            <div class="clr"></div>
            </div>
            <div id="gallery" class="content_resize">                                 
            </div>
            <div class="clr"></div>
        </div>
                  
        <div class="clr"></div>
			<div class="sidebar_widgets mob">
                <?php include 'tpl/sidebar_sp_m.php'; ?>  
            </div>
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
			<!--sidebar-widget mob-->
