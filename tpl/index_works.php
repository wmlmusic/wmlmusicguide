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
	      	<?php
				if (!class_exists('User')) {
					include 'includes/classes/class.user.php';    
				    $user = new User();    
				}
				else{
				    $user = new User();		
				}
			?>
	      		<ul>
	        		<li><a href="index.php">World Music Listing</a></li>
	        		<li><a href="#">Bio</a></li>
	        		<li><a href="directory_page.php">Directory</a></li>
	        		<?php if ($user->isLoggedIn() && !$user->isPayment()) : ?>
	        		<li><a href="pay.php">Purchase</a></li>
	        		<?php endif; ?>
	        		<li><a href="contact.php">Contact</a></li>
				</ul>
	      	</div>
	      	<div style="border:0px solid red; margin:5px 0;">
  				<div>
  					<p>Rating (<?php echo $data['total'] ?>)</p>
  					<span id="star"></span>
  				</div>
  				<div class="clear"></div>
  			</div>
	      	<div class="home_wml">
	      	<?php if(count($data['wmlMusicListing']) > 0): ?>
	      		<h1>WML Directory</h1>
			  	<ol>
			  	<?php foreach($data['wmlMusicListing'] as $key => $value) : ?>
				    <li><span><?php echo $key + 1 ?>.</span><a href="company_directory.php?id=<?php echo $value['mp_id'] ?>"><?php echo $value['mp_name'] ?></a></li>
				<?php endforeach; ?>
			  	</ol> 
			<?php endif; ?>
			</div>
	    </div>        
        <div class="tab-content">
        <div id="page-heading">
		</div>
    
  	<div id="tab1" class="tab active">  		
  		<div class="class_left">
  			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="650" height="600" id="tech" align="middle" quality="high"allowFullScreen="true" wmode="transparent" allowScriptAccess="always" >
			  <param name="movie" value="public/swf/WMLGlobe.swf?xml_path=public/swf/slides.xml" />
			  <param name="quality" value="high" />
			  <param name="allowFullScreen" value="true" />
			  <param name="wmode" value="transparent" />
			  <param name="allowScriptAccess" value="always" />
			  <param name="_flashcreator" value="http://www.photo-flash-maker.com" />
			  <param name="_flashhost" value="http://www.go2album.com" />
			  <embed src="public/swf/WMLGlobe.swf?xml_path=public/swf/slides.xml" width="650" height="600" quality="high" allowFullScreen="true" wmode="transparent" allowScriptAccess="always" name="tech" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>
	  		<?php if($data['wmlBanners']){ ?>
	  		<ul id="newsslider">
	  		<?php 
	  			foreach($data['wmlBanners'] as $key=>$value){ 
	  				$id 	= $value['id'];
	  				$name 	= $value['name'];
	  				$details 	= (strlen($value['details']) > 100) ? substr($value['details'], 0, 100).'...' : $value['details'];
	  				$isExistImg	= checkImagexists('uploads/', 'banner_' . $id);
					$imgurl		= $isExistImg ? 'uploads/banner_' . $id . '.jpg' : './directorypage/music.png';		
	  		?>
				<li>
					<!-- <a href="#"> --><img src="<?php echo $imgurl ?>" width="82" height="30" alt="" /><!-- </a> -->
					<h3><?php echo $name ?></h3>
					<p><?php echo $details ?><!-- <a href="#"> &raquo; read more</a> --></p>
				</li>
			<?php 
					} 
			?>		
			</ul>
			<?php } ?>

			<div class="inner_tab gap">
				<ul class="tabswml">
					<li class="tab-link current" data-tab="allwml">All WML</li>
					<li class="tab-link" data-tab="music">Music</li>
					<li class="tab-link" data-tab="video">Video</li>
				</ul>
	
			</div>
			<div class="tab_content">
				<ul id="allwml" class="tabwml-content current">
				<?php
					if($data['wmlAllWML']){
						foreach ($data['wmlAllWML'] as $key=>$value){
							$id = $value['id'];
							$isExistImg	= checkImagexists('uploads/', 'post_' . $id);
							// print_r($value);
							$imgurl		= $isExistImg ? 'uploads/post_' . $id . '.jpg' : './directorypage/music.png';
				?>
				    <li>
				      <img src="<?php echo $imgurl ?>">
				      <h3><a href="post.php?id=<?php echo $id ?>"><?php echo $value['name'] ?></a></h3>
				      <p><?php echo substr(stripcslashes($value['details']), 0, 130) . '...'; ?></p>
				    </li>
				<?php
						}
					}
				?>
				</ul>
				<ul id="music" class="tabwml-content">
				<?php
					if($data['wmlWMLMusic']){
						foreach ($data['wmlWMLMusic'] as $key=>$value){
							$id = $value['id'];
							$isExistImg	= checkImagexists('uploads/', 'post_' . $id);
							// print_r($value);
							$imgurl		= $isExistImg ? 'uploads/post_' . $id . '.jpg' : './directorypage/music.png';
				?>
				    <li>
				      <img src="<?php echo $imgurl ?>">
				      <h3><a href="post.php?id=<?php echo $id ?>"><?php echo $value['name'] ?></a></h3>
				      <p><?php echo substr(stripcslashes($value['details']), 0, 130) . '...'; ?></p>
				    </li>
				<?php
						}
					}
				?>
				</ul>
				<ul id="video" class="tabwml-content">
				<?php
					if($data['wmlWMLVideo']){
						foreach ($data['wmlWMLVideo'] as $key=>$value){
							$id = $value['id'];
							$isExistImg	= checkImagexists('uploads/', 'post_' . $id);
							// print_r($value);
							$imgurl		= $isExistImg ? 'uploads/post_' . $id . '.jpg' : './directorypage/music.png';
				?>
				    <li>
				      <img src="<?php echo $imgurl ?>">
				      <h3><a href="post.php?id=<?php echo $id ?>"><?php echo $value['name'] ?></a></h3>
				      <p><?php echo substr(stripcslashes($value['details']), 0, 130) . '...'; ?></p>
				    </li>
				<?php
						}
					}
				?>
				</ul>

			</div>
			<div class="clear"></div>
			<hr />
			<br />
			</div>
		</div>
		<div class="class_right">
		<?php
			$instaUrl = "https://api.instagram.com/v1/users/1181790550/media/recent/?access_token=1181790550.5b9e1e6.241cfbd9499840d0ae20eebf2b8ece4c&count=6";
			$insta_res = fetchData($instaUrl);
			// print_r($insta_res);
			$insta_res = json_decode($insta_res);
		?>
			<div class="side-youtube">
		 		<h2>Instagram:</h2>
		<?php 
			foreach ($insta_res->data as $post) { 
				if(!empty($post->caption->text)) {
					echo '<div class="img"><a class="instagram-unit" target="_blank" href="'.$post->link.'">
        <img src="'.$post->images->low_resolution->url.'" alt="'.$post->caption->text.'" width="100%" height="auto" /></a></div>';
       	?>
       			
       	<?php
		 		} 
		 	}
		?>
				<div class="clear"></div>
		 	</div>
            <a class="twitter-timeline"  href="https://twitter.com/WorldMusicList" data-widget-id="580765842201145344">Tweets by @WorldMusicList</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
		 	<br /><br />
		 	<div class="fb-page" data-href="https://www.facebook.com/worldmusiclisting" data-width="411" data-height="350" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
		 	
		 	<!-- <div class="side-youtube"> -->
		 		<!-- <h2>Featured Videos:</h2> -->
		 	<?php
				/*$feedURL = 'http://gdata.youtube.com/feeds/api/users/UCG6KChWileUeq0QqPajnkPQ/uploads?max-results=4';
				$sxml = simplexml_load_file($feedURL);
				$i=0;
				foreach ($sxml->entry as $entry) {
			      	$media = $entry->children('media', true);
			      	$watch = (string)$media->group->player->attributes()->url;
			      	$thumbnail = (string)$media->group->thumbnail[0]->attributes()->url;*/
			?>	
		 		<!-- <div class="img">
				  	<a target="_blank" href="<?php echo $watch; ?>">
				    	<img src="<?php echo $thumbnail;?>" alt="<?php echo $media->group->title; ?>"/>
				  	</a>				  	
				  	<div class="desc">
				  		<a href="<?php echo $watch; ?>"><?php echo $media->group->title; ?></a>
				  	</div>
				</div> -->
			<?php 
					/*$i++; 
				}*/
			?>
				<!-- <div class="clear"></div>
		 	</div> -->
		 	<div class="side-youtube">
		 		<?php
		 		//Get the SoundCloud URL
				$url="https://soundcloud.com/worldmusiclisting";
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

		</div>
    	<div class="clear"></div>
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
			$.fn.raty.defaults.path = 'public/images';
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