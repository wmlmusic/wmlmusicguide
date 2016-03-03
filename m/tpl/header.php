<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo isset($data['page_title']) ? $data['page_title'] : 'Page Title'; ?></title>
  <meta name="description" content="World Music Listing">
  <meta name="keywords" content="wml, music, artist" />
  <meta name="robots" content="index, follow" />
  <!-- Mobile Specific Metas  ================================================== -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/menusm.css" />
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/layout.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/menusm.js"></script>
  <!-- PrettyPhoto Starts -->
  <link rel="stylesheet" type="text/css" href="assets/prettyPhoto/css/prettyPhoto.css" />
  <script type="text/javascript" src="assets/prettyPhoto/js/jquery.prettyPhoto.js"></script>
  <!-- PrettyPhoto Ends -->
  <!-- Preloader Starts -->
  <link href="assets/preloader/css/preloader.css" rel="stylesheet" />
  <script src="assets/preloader/js/jquery.preloader.js" charset="utf-8"></script>
  <!-- Preloader Ends -->

  <!-- Ui To Top Starts -->
  <link href="assets/ui_totop/css/ui.totop.css" rel="stylesheet" />
  <script src="assets/ui_totop/js/jquery.ui.totop.js" charset="utf-8"></script>
  <!-- Ui To Top Ends -->

  <!-- DC Twitter Starts -->
  <link href="assets/twitter_tweet/jquery.tweet.css" rel="stylesheet" />
  <script src="assets/twitter_tweet/jquery.tweet.js" charset="utf-8"></script>
  <!-- DC Twitter End -->

  <script type="text/javascript" src="js/scripts.js"></script>
  <!-- Config User Intarface Box Import START -->
  <script type="text/javascript" src="js/head_html_default_block.js"></script>
  <script type="text/javascript" src="js/head_html_block.js"></script>
  <!-- Config User Intarface Box Import END -->
  <!-- Config Slider : SLIDER START -->
  <!--714x400-->
  <link rel="stylesheet" id="camera-css"  href="assets/sliders/camera/css/camera.css" type="text/css" media="all">
  <script type="text/javascript" src="assets/sliders/camera/js/jquery.mobile.customized.min.js"></script>
  <script type="text/javascript" src="assets/sliders/camera/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="assets/sliders/camera/js/camera.min.js"></script>
  
  <!-- Config Slider : SLIDER END -->
  <script type="text/javascript" src="js/tinynav.min.js"></script>
  <script type="text/javascript">
    $(function () {
      $('#menu-top-menu').tinyNav({
        active: 'selected',
        header: 'Navigation' 
      });
    });
  </script>
</head>
<body>
  <div class="body_pattern">
    <div class="index_page">
      <div class="main">
        <div class="container">
          <div class="columns bg">
            <div class="four columns">
              <div class="sidebar">
                <div class="header">
                  <div class="header_resize"> 
                    <!-- logo -->
                    <div class="logo">
                      <a href="index.php"><img src="../public/images/logo13.png" height="150" alt="logo" /></a>
                      <!-- <div><a href="index.html">angle</a></div>
                      <p>Premium HTML Theme</p> -->
                    </div>
                    <!-- logo -->
                    <div class="clr"></div>
                    <!-- search -->
                    <div class="search">
                      <form id="formsearch" name="formsearch" method="get" action="search.php">
                        <span>
                          <input name="q" class="editbox_search" id="editbox_search" maxlength="80" value="Search..."  onblur="if (this.value=='') this.value='Search...';" onfocus="if (this.value=='Search...') this.value='';" type="text"  />
                        </span>
                        <input name="button_search" src="images/search_btn.png" class="button_search" type="image" />
                      </form>
                    </div>
                    <!-- /search -->
                    <div class="clr"></div>
                  </div>
                  <div class="clr"></div>
                  <div class="header_menu">
                    <div class="header_menu_resize"> 
                      <!-- menu edit in file "js/menu_html_block.js" -->
                      <div class="menu"> 
                      <?php
                        $special_header = array('profile', 'single_profile');
                        if(isset($data['special_head'])):
                      ?>
                        <script type="text/javascript" src="js/menu_html_special.js"></script> 
                      <?php else: ?>
                        <script type="text/javascript" src="js/menu_html_block.js"></script> 
                      <?php endif; ?>
                      </div>

                      <!--start small navigation--> 

                      <!--end small navigation --> 
                      <!-- /menu -->
                      <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                  </div>
                  <div class="clr"></div>
                </div>
                <div class="clr"></div>
                <!-- <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=427912703971390";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script> -->       
