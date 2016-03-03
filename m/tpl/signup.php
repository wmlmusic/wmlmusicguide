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
                            <h2>World Music Listing Registration</h2>
                            <div class="clr"></div>
                            <div class="sep"></div>
                            <div class="clr"></div>
                            <form id="register" method="POST" action="signupcontroller.php">
                            <?php if(isset($_GET['msg'])){ ?>
                              <div class="alert"><?php echo $_GET['msg']; ?></div>
                            <?php } ?>
                            <ul class="form-style-1">
                              <li class="bottom"><label>Account Details</label></li>
                              <li>
                                  <label>Email <span class="required">*</span></label>
                                  <input type="email" name="su_email" class="field-long" placeholder="enter your email address" size="50" required />
                              </li>
                              <li>
                                <label>Password <span class="required">*</span></label>
                              <input type="password" name="su_password" class="field-long" placeholder="enter password" size="50" required id="password" />
                            </li>
                            <li>
                                <label>Confirm Password <span class="required">*</span></label>
                              <input type="password" name="su_conpassword" class="field-long" placeholder="enter confirm password" size="50" required />
                            </li>
                            <li class="bottom"><label>Personal Details</label></li>
                            <li>
                                <label>Full Name <span class="required">*</span></label>
                              <input type="text" name="su_name" class="field-long" placeholder="enter your full name" size="50" required />
                            </li>
                            <li>
                                <label>Phone <span class="required">*</span></label>
                              <input type="text" name="su_phone" class="field-long" placeholder="enter your phone number" size="50" required />
                            </li>
                            <li>
                                <label>Street Address</label>
                              <input type="text" name="su_address" class="field-long" placeholder="enter your Street Address" size="50" />
                            </li>
                            <li>
                                <label>City <span class="required">*</span></label>
                              <input type="text" name="su_city" class="field-long" placeholder="enter your city name" size="50" required />
                            </li>
                            <li>
                                <label>Country <span class="required">*</span></label>                  
                                <select name="su_country" class="field-divided" required>
                                  <option value="">Select One</option>
                                  <?php
                                    $country_list = country();
                                    foreach ($country_list as $key => $value) {
                                      if(!empty($value))
                                        echo "<option>" . $value . "</option>";
                                    }
                                  ?>
                                </select>
                            </li>
                            <li>
                                <label>Website</label>
                              <input type="url" name="su_url" class="field-long" placeholder="enter website url" size="50" />
                            </li>
                            <li>
                                <label>Gender <span class="required">*</span></label>
                              <select name="su_gender" class="field-divided" required>
                                  <option value="">Select One</option>
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
                            </li>
                            <li class="bottom"><label>Security</label></li>
                            <li>
                                <label>Security Question <span class="required">*</span></label>
                              <select name="su_quest" class="field-long" required>
                                  <option value="">Select One</option>
                                  <option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
                                            <option value="What is your preferred musical genre?">What is your preferred musical genre?</option>
                                            <option value="What is the street number of the house you grew up in">What is the street number of the house you grew up in?</option>
                                            <option value="What time of the day were you born?">What time of the day were you born?</option>
                                            <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
                                            <option value="What is the name of the company of your first job?">What is the name of the company of your first job?</option>
                                            <option value="What is the middle name of your oldest sibling?">What is the middle name of your oldest sibling?</option>
                                            <option value="What is the middle name of your oldest child?">What is the middle name of your oldest child?</option>
                                            <option value="What was the last name of your third grade teacher?">What was the last name of your third grade teacher?</option>
                                            <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                            <option value="What is your spouse’s mother’s maiden name?">What is your spouse’s mother’s maiden name?</option>
                                            <option value="What is your mother’s maiden name?">What is your mother’s maiden name?</option>
                                            <option value="What was your high school mascot?">What was your high school mascot?</option>
                                          </select>
                            </li>
                            <li>
                                <label>Answer</label>
                              <input type="text" name="su_ans" class="field-long" placeholder="enter your answer" size="50" required />
                            </li>
                            <li class="bottom"><label>Terms and Mailing</label></li>
                            <li>
                              <label class="term"><input type="checkbox" name="su_terms" value="1" required class="condition"> <span class="required">*</span> I accept the <span id="terms">Terms and Conditions</span></label>
                              <label><input type="checkbox" name="su_offer" value="1"> I want to receive personalized offers by your site</label>
                              <label><input type="checkbox" name="su_offer_partner" value="1"> Allow partners to send me personalized offers and related services</label>

                            </li>
                            <li>
                              <label>&nbsp;</label>
                              <input type="submit" value="Register" id="form_submit" />
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
