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
                            <h2>World Music Listing Log in</h2>
                            <div class="clr"></div>
                            <div class="sep"></div>
                            <div class="clr"></div>
                            <form id="signin" method="POST" action="logincontroller.php">
                            <?php if(isset($_GET['msg'])){ ?>
                              <div class="alert"><?php echo $_GET['msg']; ?></div>
                            <?php } ?>
                            <ul class="form-style-1">
                              <li>
                                <label>Email <span class="required">*</span></label>
                                <input type="email" name="su_email" class="field-long" placeholder="enter your email address" size="50" required />
                              </li>
                              <li>
                                <label>Password <span class="required">*</span></label>
                                <input type="password" name="su_password" class="field-long" placeholder="enter password" size="50" required id="password" />
                              </li>
                            
                              <li>
                                <label>&nbsp;</label>
                                <input type="submit" value="Log in" id="form_submit" /> &nbsp<a href="wml_password.php">Forgot Password?</a>
                              </li>                                
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
