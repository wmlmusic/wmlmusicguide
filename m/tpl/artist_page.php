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
                    <h2><?php echo(ucwords($data['cat_row']['cname'])) ?></h2>
                    <div class="clr"></div>
                    <div class="sep"></div>
                    <div class="clr"></div>
                    <?php
                    if($data['artListing']):
                        foreach ($data['artListing'] as $key => $value) :
                            $art_id   = $value['id'];
                            $art_name   = $value['aname'];
                            $art_add  = $value['address'] != '' ? $value['address'] . ', ' : '';
                            $art_city   = $value['city'] != '' ? $value['city'] . ', ' : '';
                            $art_state  = $value['state'] != '' ? $value['state'] . ', ' : '';
                            $art_nation = $value['country'] != '' ? $value['country']  : '';
                            $isExistImg = checkImagexists('../uploads/', 'artistcover_' . $art_id);
                            $imgurl   = $isExistImg ? '../uploads/artistcover_' . $art_id . '.jpg' : '../directorypage/music.png';
                            if(isset($value['properties'])){
								$properties = $value['properties'];

                                $genre = isset($properties['genre']) ? $properties['genre'] : '';
                                $field = isset($properties['field']) ? $properties['field'] : '';
                                $genre = is_array($genre) ? implode(', ', $genre) : '';
                                $field = is_array($field) ? implode(', ', $field) : '';
                            }
                    ?>
                    <div class="cols1">
                        <div class="four columns alpha ">
                            <div class="col1">
                                <div class="pic">
                                    <a  href="single_profile.php?id=<?php echo $art_id?>" style="color: rgb(255, 134, 4);">
                                    <img src="<?php echo $imgurl ?>" style="visibility: visible; opacity: 1;" />
                                    </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="seven columns omega">
									<div class="col1 last">
										<h3>
											<a href="single_profile.php?id=<?php echo $art_id?>" style="color: rgb(28, 28, 28); font-size: 14px;"><?php echo ucwords($art_name);?></a><span><?php echo $art_add . $art_city . $art_state . $art_nation?>
											<?php echo isset($genre) ? '<br /><b>Genre: </b>' . $genre : '' ?>
											<?php echo isset($field) ? '<br /><b>Field: </b>' . $field : '' ?></span>
										</h3>
									</div>
                                </div>
								<div class="clr"></div>
							</div>
                            <div class="clr"></div>
                            <div class="sep_clr"></div>
							<?php     endforeach; ?>
                            <div class="clr"></div>
                            <div class="sep"></div>
                    <?php
					else:
						echo "There are no/0 records.";
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
