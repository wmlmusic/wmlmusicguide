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
                            if($data['comListing']):
                              $mp_id   = $data['cat_row']['mp_id'];
                              $mp_type = $data['cat_row']['mp_type'];
                              foreach ($data['comListing'] as $key => $value) :
                                $com_id   = $value['com_id'];
                                $com_name   = $value['cname'];
                                $com_phone1 = $value['phone1'] != '' ? ', ' . $value['phone1'] : '';
                                $com_phone2 = $value['phone2'] != '' ? ', ' . $value['phone2'] : '';;
                                $com_add  = $value['address'] != '' ? $value['address'] . ', ' : '';
                                $com_city   = $value['city'] != '' ? $value['city'] . ', ' : '';
                                $com_state  = $value['state'] != '' ? $value['state'] . ', ' : '';
                                $com_nation = $value['country'] != '' ? $value['country'] : '';
                                $com_phone  = $value['phone'] != '' ? '<br/>Phone: ' . $value['phone'] . $com_phone1 . $com_phone2 : '';
                                $com_fax  = $value['fax_no'] != '' ? '<br/>Fax No: ' . $value['fax_no'] : '';
                                $com_url  = $value['website'] != '' ? '<br/>Website: ' . $value['website'] : '';

                                $isExistImg = checkImagexists('../uploads/', 'companylogo_' . $com_id);
                                // print_r($value);
                                $imgurl   = $isExistImg ? '../uploads/companylogo_' . $com_id . '.jpg' : '../directorypage/music.png';
                          ?>
                              <div class="cols1">
                                <div class="four columns alpha ">
                                  <div class="col1">
                                    <div class="pic">
                                      <a  href="artist_directory.php?id=<?php echo($com_id)?>&type_id=<?php echo($mp_id) ?>" style="color: rgb(255, 134, 4);">
                                        <img src="<?php echo $imgurl ?>" style="visibility: visible; opacity: 1;" />
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="seven columns omega">
                                  <div class="col1 last">
                                    <h3><a href="artist_directory.php?id=<?php echo($com_id)?>&type_id=<?php echo($mp_id) ?>" style="color: rgb(28, 28, 28); font-size: 14px;"><?php echo ucwords($com_name);?></a><span><?php echo $com_add . $com_city . $com_state . $com_nation . $com_phone . $com_fax . $com_url?></span></h3>
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
