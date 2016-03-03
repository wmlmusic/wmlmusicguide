	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=427912703971390&version=v2.3";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<link type="text/css" rel="stylesheet" href="public/css/themes/yahoo/theme.css"/>
	<link type="text/css" rel="stylesheet" href="public/css/jquery.raty.css"/>
	<script type="text/javascript" src="public/js/jquery.accessible-news-slider.js"></script>
	<script src='public/js/jquery.raty.js' type="text/javascript"></script> 
	<div class="tabs standard">
      <div class="tabs">
      	<div class="tab-wrapper">
	      	<div id="menuwrapper">
	      		<ul>
	        		<li><a href="index.php">World Music Listing</a></li>
				    <li><a href="#">Bio</a></li>
				    <li><a href="#">Print</a></li>
				    <li><a href="#">Contact</a></li>
				</ul>
	      	</div>
	    </div>        
        <div class="tab-content">
        <div id="page-heading">
		<h1><?php echo $data['artist_row']['aname'] ?></h1>
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
  			
<!--Begin newsslider-->  
		
	  		<ul id="newsslider">
	  		<?php for($i = 0; $i < 19; $i++){ ?>
				<li>
					<a href="#"><img src="http://dummyimage.com/600x300/914b<?php echo rand(10,99) ?>/00ffe1.jpg" width="82" height="30" alt="" /></a>
					<h3><a href="#">Artists interview</a></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<a href="#"> &raquo; read more</a></p>
				</li>
			<?php } ?>		
			</ul>

<!--End newsslider-->
<?php
		$username="admin_wml";$password="Rub1k292!";$database="wmldatabase";
		mysql_connect(localhost,$username,$password);
		@mysql_select_db($database) or die( "Unable to select database");
		
		$sql = "SELECT image FROM image WHERE imageid=:id";
		$query = $db_conn->prepare($sql);
		$query->execute(array(':id' => $image_id));

		$query->bindColumn(1, $image, PDO::PARAM_LOB);
		$query->fetch(PDO::FETCH_BOUND);
		header("Content-Type: image");
		echo $image;
		
		$query= "SELECT * FROM `tbl_posts` LIMIT 0, 30 ";
		$result=mysql_query($query);
		$row = mysql_fetch_array($result);
		$row2 = mysql_fetch_assoc($result);
		#row3 = mysql_fetch_assoc($result);
		$num=mysql_numrows($result);
		mysql_close();
?>
			<div class="inner_tab gap" >
				<ul>
				  	<li><a href="#">All <?php echo $data['artist_row']['aname'] ?></a></li>
				  	<li><a href="#">Print Photo</a></li>
				  	<li><a href="#">Video</a></li>
				</ul>

			</div>
			<div class="tab_content">
				<ul>
				    <li>
				     <!-- <img src="public_html/admin/images/gallery/77/31/<?php echo $row[0] ?>" width="175" height="200" />-->

				     <?php 
				     		header("Content-Type: image");
							echo $image;
						?>
						
				      <h3><?php echo $row[title]?></h3>
				      <p>Lorem ipsum dolor sit amet...</p>
				    </li>
				       
				    <li>
				      <img src="http://lorempixum.com/100/100/nature/2">
				      <h3>Headline</h3>
				      <p>Lorem ipsum dolor sit amet...</p>
				    </li>
				</ul>
			</div>
			<div class="clear"></div>
			<?php if(is_array($data['social'])){?>
			<div id="list4">
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
						 $youtube_name = split("/user/", $youtube_link);
					   }
					?>
					<li><a href="<?php echo $value['social_link'] ?>" target="_blank"><?php echo $value['mp_name'] ?></a></li>
				<?php } ?>
				</ul>
			</div>
			<?php } ?>
			<hr />
			<br />
			<div id="disqus_thread"></div>
			<!-- <div id="reviews" class="gap">
				<h4>Reviews</h4>
				<div class="tab_content">
				<ul>
				    <li>
				      <h5>This is good</h5>
				      <h6>By: Review Name on March 27, 2015</h6>
				      <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
				    </li>
				       
				    <li>
				      <h5>This is title</h5>
				      <h6>By: Review Name on March 20, 2015</h6>
				      <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
				    </li>
				</ul>
				<a class="review_form">Add Review</a>
				<div class="review_panel">
					<form class="form-style-1" id="review_form">
						<label>Full Name</label>
						<input type="text" name="review_name" class="field-divided" placeholder="enter your full name" size="50" required />

						<label>Email</label>
						<input type="email" name="review_email" class="field-divided" placeholder="enter your email address" size="50" required />

						<label>Title</label>
						<input type="text" name="review_title" class="field-divided" placeholder="enter your review title" size="50" required />

						<label>Reviews</label>
						<textarea name="review_text" placeholder="enter your review here" class="field-divided" required></textarea>

						<label>&nbsp;</label>
						<input type="submit" value="Submit" id="form_submit" />
						<input type="hidden" name="parent_id" value="<?php echo $data['id'] ?>">
						<input type="hidden" name="type" value="artist">
					</form>
				</div>
			</div>
			</div>
			
<!--Test Outputs-->
			<p><?php print_r ($data);
						print_r($result);
						print_r($row);
				 		print_r($row2);
				 		print_r($row3);
				?>
<!--End of Test Outputs-->

				 		</p> -->
		</div>
		<div class="class_right">
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
		 		<h2>Itunes Top Songs:</h2>
		 		<ul class="formatedul" id="double">
		 		<?php
		 			foreach($tracks as $key=>$values){
		 		?>
			 		<li><a href="<?php echo $values->collectionViewUrl ?>"><?php echo $key . ' ' . $values->collectionName;  ?></a></li>
			 	<?php } ?>
		 		</ul>
		 	</div>
		<?php } }?>
		
<!--Instagram Plugin-->

		<?php
			/*$instaUrl = "https://api.instagram.com/v1/users/1181790550/media/recent/?access_token=1181790550.5b9e1e6.4bd4ad852fe841f494ce9444d656384f&count=6";
			$insta_res = fetchData($instaUrl);
			// print_r($insta_res);
			$insta_res = json_decode($insta_res);*/
		?>
			<div class="side-youtube">
		 		<h2>Instagram:</h2>
		<?php 
			/*foreach ($insta_res->data as $post) { 
				if(!empty($post->caption->text)) {
					echo '<div class="img"><a class="instagram-unit" target="_blank" href="'.$post->link.'">
        <img src="'.$post->images->low_resolution->url.'" alt="'.$post->caption->text.'" width="100%" height="auto" /></a></div>';*/
       	?>
       			
       	<?php
		 		/*} 
		 	}*/
		?>
		
<!--End of Instagram-->
		
				<!-- <div class="clear"></div>
		 	</div> -->

<!--Twitter Plugin-->

		 	<div class="side-twitter">
		 	<?php if (isset($twitter_link)) { ?>
		 	<a class="twitter-timeline"  href="<?php echo $twitter_link?>" data-widget-id="580765842201145344" data-screen-name="<?php echo $twitter_name[1]?>">Tweets by @<?php echo $data['artist_row']['aname']?></a>      
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>		 	
			<?php } ?>		 	
		 	</div>
		 	
<!--End of Twitter Plugin-->
<!--Facebook Side Plugin-->

		 	<br /><br />
		 	<div class="fb-page" data-href="<?php echo $facebook_link?>" data-width="411" data-height="350" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
		 	
<!--End of Facebook Side Plugin-->		 	
<!--Youtube Side Plugin-->		 
		 
		 	<div class="side-youtube">
		 		<h2>Featured Videos:</h2>
		 		<!--
		 		<script src="https://apis.google.com/js/platform.js"></script>
				<div class="g-ytsubscribe" data-channel=<?php echo $youtube_name[1] ?> data-layout="default" data-count="default"></div>
				-->
				<div class="clear"></div>
		 	</div>

<!--End of Youtube Side Plugin-->
<!--Soundcloud Side Plugin-->

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

<!--End of Soundcloud Side Plugin-->

		</div>
    	<div class="clear"></div>
    	<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
    </div>	
    <script type="text/javascript">
		var disqus_shortname = 'worldmusiclisting';
		var disqus_url = '<?php echo $actual_link ?>';

		(function() {
	        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	    })();

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