<div style="border:0px solid red; margin:0 0 5px 0;">
  				<div class="class_left" style="text-align:right;">Rating (<?php echo $data['total'] ?>):</div>
  				<div class="class_right">
  					<span id="star"></span>
  					<!-- | <a href="#reviews">Reviews (10)</a> -->
  				</div>
  				<div class="clear"></div>
  			</div>
                <?php if(count($data['wmlMusicListing']) > 0): ?>
                  <div class="sidebar_rec">
                    <h2 style="font-family: &quot;Oxygen&quot;; font-size: 24px; color: rgb(28, 28, 28);"><em class="second_color">WML Directory</em></h2>
                    <div class="sidebar_padding">
                    <?php foreach($data['wmlMusicListing'] as $key => $value) : ?>
                      <h3 style="font-family: &quot;Oxygen&quot;; font-size: 14px; color: rgb(28, 28, 28);"><a href="company_directory.php?id=<?php echo $value['mp_id'] ?>" style="color: rgb(28, 28, 28); font-size: 14px;"><em class="second_color"><?php echo $key + 1 ?>. <?php echo $value['mp_name'] ?></em></a></h3>
                      <div class="sep_clr small"></div>
                      <?php endforeach; ?>
                      <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                  </div>
                  <?php endif; ?>
                  <div class="clr"></div>
                <?php
                	$itunes_id = $data['artist_row']['itunes_id'];
					if($itunes_id > 0){
						$res_itunes = file_get_contents('https://itunes.apple.com/lookup?id=' . $itunes_id . '&entity=song&limit=10');
						$obj_itunes = utf8_decode($res_itunes);
						$out_itunes = json_decode($obj_itunes);
					// echo $out_itunes->resultCount;
					if($out_itunes->resultCount > 0){
						// echo "<pre>"; print_r($out_itunes->results);
						$tracks = $out_itunes->results;
						unset($tracks[0]);
				?>
					<div class="side-youtube">
		 				<h2><em class="second_color">Itunes Top Songs:</em></h2>
		 				<ul class="formatedul" id="double">
		 				<?php
		 					foreach($tracks as $key=>$values){
		 				?>
			 				<li><a href="<?php echo $values->collectionViewUrl ?>"><?php echo $key . ' ' . $values->collectionName;  ?></a></li>
			 			<?php } ?>
		 				</ul>
		 			</div>
				<?php } }?>  
                <?php
                  $instaUrl = "https://api.instagram.com/v1/users/1181790550/media/recent/?access_token=1181790550.5b9e1e6.241cfbd9499840d0ae20eebf2b8ece4c&count=6";
                  $insta_res = fetchData($instaUrl);
                  $insta_res = json_decode($insta_res);
                  if($insta_res->data):
                ?>
                  <div class="sidebar_flickr">
                    <h2><em class="second_color">Instagram</em></h2>
                    <div class="sidebar_padding">
                      <div class="flickr">
                      <!--Instagram Plugin-->
					<div class="side-youtube">
					        <iframe src="http://widget.websta.me/in/<?php echo $instagram_name[1] ?>/?r=1&w=3&h=3&b=1&p=1" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:270px; height: 330px" >
						</iframe> 
					<!-- websta - websta.me -->		
					<!--End of Instagram-->
                      </div>
                      <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                  </div>
                  <div class="clr"></div>
                <?php endif; ?>
                
                <div class="sidebar_text">
                  <h2><em class="second_color">Latest Tweets</em></h2>
                  <div class="sidebar_padding"> 
                    
			<!--Twitter Plugin-->

			<div class="side-youtube">
		 	<?php if (isset($twitter_link)) { ?>
		 	<a class="twitter-timeline"  href="<?php echo $twitter_link?>" data-widget-id="580765842201145344" data-screen-name="<?php echo $twitter_name[1]?>">Tweets by @<?php echo $data['artist_row']['aname']?></a>      
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>		 	
			<?php } ?>		 	
		 	</div>
		 	
<!--End of Twitter Plugin-->
                  <div class="clr"></div>
                </div>
                <div class="clr"></div>

                  <div class="sidebar_text">
                    <h2><em class="second_color">Facebook</em></h2>
                    <div class="sidebar_padding">
                      	          

		 	<!--Facebook Side Plugin-->

			<div class="side-youtube">
		 	<div class="fb-page" data-href="<?php echo $facebook_link?>" data-width="411" data-height="350" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
			</div>
		 	
<!--End of Facebook Side Plugin-->
                        <div class="clr"></div></div>
                    <div class="clr"></div>
</div>                        
                  <div class="clr"></div>
                <div class="sidebar_rec">
                      <h2><em class="second_color">Featured Videos</em></h2>
                      <div class="sidebar_padding">
                        <div class="flickr">
                        <!--Youtube Side Plugin-->		 
		 
		 	<div class="side-youtube">
				<iframe src="http://www.youtube.com/embed/?listType=user_uploads&list=<?php echo $youtube_name[1] ?>" width="264" height="320"></iframe>  
				
				<div class="clear"></div>
				
		 		<script src="https://apis.google.com/js/platform.js"></script>
				<div class="g-ytsubscribe" data-channel=<?php echo $youtube_name[1] ?> data-layout="default" data-count="default"></div>
				
				<div class="clear"></div>
		 	</div>

<!--End of Youtube Side Plugin-->
                        <div class="clr"></div>
                      </div>
                      <div class="clr"></div>
                    </div>
        <div class="clr"></div><div class="sidebar_rec">
                      <h2><em class="second_color">SoundCloud</em></h2>
                      <div class="sidebar_padding">
                        <div class="flickr">
		 					<!--Soundcloud Side Plugin-->
		 	<div class="side-youtube">
		 	<?php
		 		//Get the SoundCloud URL
				$url=$soundcloud_link;
				//Get the JSON data of song details with embed code from SoundCloud oEmbed
				$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');
				//Clean the Json to decode
				$decodeiFrame=substr($getValues, 1, -2);
				//json decode to convert it as an array
				$jsonObj = json_decode($decodeiFrame);

				//Change the height of the embed player if you want else uncomment below line
				// echo $jsonObj->html;
				//Print the embed player to the page
				echo str_replace('height="400"', 'height="140"', $jsonObj->html);
		 	?>
			</div>

<!--End of Soundcloud Side Plugin-->                    
                        <div class="clr"></div>
                      </div>
                      <div class="clr"></div>
</div>
    <script type="text/javascript">
    
		$(document).ready(function() {
			$('#newsslider').accessNews({
				title : "",
				subtitle:"",
				// speed : "slow",
				// slideBy : 4,
				// slideShowInterval: 100000,
				// slideShowDelay: 100000
			});

			id = 0;
			$.fn.raty.defaults.path = '../public/images';
			$.fn.raty.defaults.readOnly = "<?php echo check_cookie(0);?>";
			$('#star').raty({score:"<?php echo $data['rate'];?>",
	 			click: function(score, evt) {
	 				$.post('index.php',{'rate':score,'pid':id, 'rate_type' : 'd_site'},function(data)
					{
	     				$('#star').raty({score:score, readOnly:true});
					}
				)
			}
			});

			$('ul.tabswml li').click(function(){
				var tab_id = $(this).attr('data-tab');

				$('ul.tabswml li').removeClass('current');
				$('.tabwml-content').removeClass('current');

				$(this).addClass('current');
				$("#"+tab_id).addClass('current');
			})

		});
</script>