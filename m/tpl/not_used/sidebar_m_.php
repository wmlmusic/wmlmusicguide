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
                  $instaUrl = "https://api.instagram.com/v1/users/1181790550/media/recent/?access_token=1181790550.5b9e1e6.4bd4ad852fe841f494ce9444d656384f&count=6";
                  $insta_res = fetchData($instaUrl);
                  $insta_res = json_decode($insta_res);
                  if($insta_res->data):
                ?>
                  <div class="sidebar_flickr">
                    <h2><em class="second_color">Instagrams</em></h2>
                    <div class="sidebar_padding">
                      <div class="flickr">
                      <?php 
                        foreach ($insta_res->data as $post) { 
                          if(!empty($post->caption->text)) {
                            echo '<a class="instagram-unit" target="_blank" href="'.$post->link.'">
        <img src="'.$post->images->low_resolution->url.'" alt="'.$post->caption->text.'" width="60" height="60" /></a>'; 
                          } 
                        }
                      ?>
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
                    <a class="twitter-timeline"  href="https://twitter.com/WorldMusicList" data-widget-id="580765842201145344">Tweets by @WorldMusicList</a>
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
                          $feedURL = 'http://gdata.youtube.com/feeds/api/users/UIMRECORDS/uploads?max-results=6';
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