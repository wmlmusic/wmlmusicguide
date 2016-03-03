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
                            <h2><?php echo(ucwords($data['cat_row']['mp_name'])) ?></h2>
                            <div class="clr"></div>
                            <div class="sep"></div>
                            <div class="clr"></div>
                          <?php
                            if($data['catListing']):
                              
                              foreach ($data['catListing'] as $key => $value) :
                                $cat_id   = $value['mp_id'];
                                $cat_name   = $value['mp_name'];
                                $isExistImg = checkImagexists('../uploads/', 'category_' . $cat_id);
                                // print_r($value);
                                $imgurl   = $isExistImg ? '../uploads/category_' . $cat_id . '.jpg' : '../directorypage/music.png';
                          ?>
                              <div class="cols1">
                                <div class="four columns alpha ">
                                  <div class="col1">
                                    <div class="pic">
                                      <a  href="company_directory.php?id=<?php echo($cat_id)?>" style="color: rgb(255, 134, 4);">
                                        <img src="<?php echo $imgurl ?>" style="visibility: visible; opacity: 1;" />
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="seven columns omega">
                                  <div class="col1 last">
                                    <h3><a href="company_directory.php?id=<?php echo($cat_id)?>" style="color: rgb(28, 28, 28); font-size: 14px;"><?php echo ucwords($cat_name);?></a></h3>
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
