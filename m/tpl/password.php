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
                            <h2>World Music Listing Password Reset</h2>
                            <div class="clr"></div>
                            <div class="sep"></div>
                            <div class="clr"></div>
                            <form id="passwordfrm" method="POST" action="wml_password.php?step=<?php echo $data['step'] + 1; ?>">
                            <?php if(isset($_GET['msg'])){ ?>
                              <div class="alert"><?php echo $_GET['msg']; ?></div>
                            <?php } ?>
                            <ul class="form-style-1">
                              <?php if($data['step'] == 0): ?>
                              <li>
                                  <label>Email <span class="required">*</span></label>
                                  <input type="email" name="su_email" class="field-long" placeholder="enter your email address" size="50" required />
                              </li>
                            
                            <li>
                              <label>&nbsp;</label>
                              <input type="submit" value="Continue" id="form_submit" /> &nbsp<a href="wml_login.php">Log in</a>
                            </li>

                          <?php elseif ($data['step'] == 1) : ?>
                            <li>
                                  <label>Security Question</label>
                                  <?php echo $data['question'] ?>
                              </li>
                            <li>
                                  <label>Answer <span class="required">*</span></label>
                                  <input type="text" name="su_answer" class="field-long" placeholder="enter your answer" size="50" required />
                              </li>
                            
                            <li>
                              <label>&nbsp;</label>
                              <input type="hidden" name="forgtid" id="answer_id" value="<?php echo $data['forgtid'] ?>" />
                              <input type="submit" value="Continue" id="form_submit" />
                            </li>
                          <?php elseif ($data['step'] == 2) : ?>
                            <li>
                                  <label>Password <span class="required">*</span></label>
                                  <input type="password" name="su_password" class="field-long" placeholder="enter your password" size="50" id="password" required />
                              </li>
                            <li>
                                  <label>Confirm Password <span class="required">*</span></label>
                                  <input type="password" name="su_conpassword" class="field-long" placeholder="enter your confirm password" size="50" required />
                              </li>
                            
                            <li>
                              <label>&nbsp;</label>
                              <input type="hidden" name="forgtid" value="<?php echo $data['forgtid'] ?>" />
                              <input type="submit" value="Change Password" id="form_submit" />
                            </li>
                          <?php endif; ?>
                            </ul>
                            </form>  
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
