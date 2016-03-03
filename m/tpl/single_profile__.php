	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=427912703971390&version=v2.3";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
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
              <div class="content">
                    <div id="gallery" class="content_resize"> 
                        <!-- content start -->                  
                          <div class="content_full_size">
                            <h2><?php echo $data['artist_row']['aname'] ?></h2>
                            <div style="border:0px solid red; margin:0 0 5px 0;">
  				<div class="class_left" style="text-align:right;">Rating (<?php echo $data['total'] ?>):</div>
  				<div class="class_right">
  					<span id="star"></span>
  					<!-- | <a href="#reviews">Reviews (10)</a> -->
  				</div>
  				<div class="clear"></div>
  			</div>
                            <div class="pic"><a rel="prettyPhoto[id]" class="prettyPhoto" href="http://cdn.pimg.co/p/800x600/5d8b74/fff/img.png" style="color: rgb(255, 134, 4);"><img alt="Image" src="http://cdn.pimg.co/p/714x217/5d8b74/fff/img.png" style="visibility: visible; opacity: 1;"> </a></div>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo ullamco laboris</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat. <br>
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <div class="clr"></div>
                <div class="sep_clr"></div>
                <div class="cols2">
                <?php if(is_array($data['social'])){?>
                  <div class="six columns alpha">
                    <div class="col2">
                      <div class="list_li">
                        <h3>Connect with <?php echo $data['artist_row']['aname'] ?></h3>
                        <ul>
                          <?php foreach ($data['social'] as $key => $value) { ?>
                            <li><a href="<?php echo $value['social_link'] ?>" target="_blank" style="color: rgb(255, 134, 4);"><?php echo $value['mp_name'] ?></a></li>
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
                    <?php include 'tpl/sidebar_m.php'; ?>  
                  </div>
              <!--sidebar-widget mob-->
