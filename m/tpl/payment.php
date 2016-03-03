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
                            <h2>World Music Listing Payment</h2>
                            <div class="clr"></div>
                            <div class="sep"></div>
                            <div class="clr"></div>
                            <form class="form-style-1" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="worldmusiclisting@wmlmusicguide.com">
                            <input type="hidden" name="lc" value="US">
                            <input type="hidden" name="item_name" value="World Music Listing">
                            <input type="hidden" name="item_number" value="0423">
                            <input type="hidden" name="amount" value="24.99">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="button_subtype" value="services">
                            <input type="hidden" name="no_note" value="0">
                            <input type="hidden" name="tax_rate" value="21.875">
                            <input type="hidden" name="rm" value="2">
                              <input type="hidden" name="return" value="<?php echo getURLOnly() ?>m/return.php?msg=Transaction+Complete">
                              <input type="hidden" name="cancel_return" value="<?php echo getURLOnly() ?>m/return.php?msg=Transaction+Canceled">
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
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
