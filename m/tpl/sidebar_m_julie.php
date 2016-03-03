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
                <div class="sidebar_flickr">
                    <h2><em class="second_color">Instagram</em></h2>
                    <div class="sidebar_padding">
						<div class="flickr">
							<iframe src="http://widget.websta.me/in/<?php echo $instagram_name[1] ?>/?r=1&w=3&h=3&b=1&p=1" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:60px; height: 60px" >
							</iframe> 							
						</div>
						<div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="clr"></div>
                <?php endif; ?>
                
                <div class="sidebar_text">
					<!-- <h2><em class="second_color">Latest Tweets</em></h2> -->
					<div class="sidebar_padding"> 
						<a class="twitter-timeline" href="https://twitter.com/<?php echo $twitter_name[1] ?>" data-widget-id="580765842201145344">Tweets by @<?php echo $twitter_name[1] ?></a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>          
					</div>
					<div class="clr"></div>
                </div>
                <div class="clr"></div>
                <div class="sidebar_rec">
                    <h2><em class="second_color">Featured Videos</em></h2>
                    <div class="sidebar_padding">
                    <div class="flickr">
                    <?php						
                        $feedURL = 'http://gdata.youtube.com/feeds/api/users/'.$youtube_name[1].'/uploads?max-results=2';
                        $sxml = simplexml_load_file($feedURL);
                        $i=0;
                        foreach ($sxml->entry as $entry) {
                            $media = $entry->children('media', true);
                            $watch = (string)$media->group->player->attributes()->url;
                            $thumbnail = (string)$media->group->thumbnail[0]->attributes()->url;
                            echo '<a class="instagram-unit" target="_blank" href="'.$watch.'" title="'.$media->group->title.'">
							<img src="'.$thumbnail.'" alt="'.$media->group->title.'" width="60" height="60" /></a>'; 
                    ?>
                    <?php 
                        $i++; 
                    }
                    ?>
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
		</div>
        <div class="clr"></div>