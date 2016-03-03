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
			                  		<h2>Search Results</h2>
			                  		<div class="clr"></div>
			                  		<div class="sep"></div>
			                  		<div class="clr"></div>
                  				<?php
									if(preg_match("/[A-Z  | a-z]+/", $_GET['q'])) :
										if($data['searchListing']) :
											foreach ($data['searchListing'] as $key => $value) :
												$art_id 	= $value['id'];
												$isExistImg	= checkImagexists('../uploads/', 'artistcover_' . $art_id);
												$imgurl		= $isExistImg ? '../uploads/artistcover_' . $art_id . '.jpg' : '../directorypage/music.png';
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
						                  <div class="cols1">
						                    <div class="four columns alpha ">
						                      <div class="col1">
						                        <div class="pic">
						                        	<a href="single_profile.php?id=<?php echo $art_id  ?>" style="color: rgb(255, 134, 4);">
						                        		<img src="<?php echo $imgurl ?>" style="visibility: visible; opacity: 1;" />
						                        	</a>
						                        </div>
						                      </div>
						                    </div>
						                    <div class="seven columns omega">
						                      <div class="col1 last">
						                        <h3><a href="single_profile.php?id=<?php echo $art_id  ?>" style="color: rgb(28, 28, 28); font-size: 14px;"><?php echo ucwords($art_name);?></a><span><?php echo $category ?> / <?php echo $genre ?> / <?php echo $field ?></span></h3>
						                      </div>
						                    </div>
						                    <div class="clr"></div>
						                  </div>
						                  <div class="clr"></div>
						                  <div class="sep_clr"></div>
						        <?php 		endforeach; ?>
						                  <div class="clr"></div>
						                  <div class="sep"></div>
						        <?php
										else:
											echo  "<p>Sorry, but we can not find an entry to match your query</p>";
										endif;
									else:
										echo  "<p>Please enter a search query</p>";
									endif;
								?>
                				</div>
                  
                  			<!-- content end -->
                  			<div class="clr"></div>
                		</div>
                		<div class="clr"></div>
              		</div>
      				<div class="clr"></div>
              		<div class="sidebar_widgets mob">
                		<?php include 'tpl/sidebar_m.php'; ?>  
              		</div>
      				<!--sidebar-widget mob-->
