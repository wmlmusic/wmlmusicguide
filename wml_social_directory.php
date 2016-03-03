<!DOCTYPE html>
<!-- saved from url= -->
<html >
<head ><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="og:site_name" content="World Music Listing">
  <title>World Music Listing: Diverse Music Guide</title>

  <link type="text/css" rel="stylesheet" href="./wmldirectory/css_FoEG9fYlOVmH8OoGGS0sEadw-x6-laPx8oCUzE8TsZw.css" media="all">
<link type="text/css" rel="stylesheet" href="./wmldirectory/css_i_vygs0cfGLlBuJTpT89HDCRO8SXyvSByEvlypQSu_I.css" media="all">
<link type="text/css" rel="stylesheet" href="./wmldirectory/css_MCNa45V2W79V79ehhp8G1QOIujqPFSAS_oJTe4zAMis.css" media="all">
<link type="text/css" rel="stylesheet" href="./wmldirectory/css_q5yIMfE7YHUaLyAuo8UJIc3kddnBCNjE4a3cDfnV_dQ.css" media="all">
<link type="text/css" rel="stylesheet" href="./wmldirectory/css_xTc1dUKf5DVa4uQZIoDhaacgumEmTFn-DOGIV1PVlvU_bootstrap_base.css.css" media="all">
<link type="text/css" rel="stylesheet" href="./wmldirectory/css_oYQGcWjz6VwxB6fGflPF2KasF0sOHvI7bEyFk3KsOag_screen.css.css" media="all">
<link type="text/css" rel="stylesheet" href="./wmldirectory/css_T-TZfTydUwB664EEKJHDcuk7jy4tISCzGTq3m7vhy9Q.css" media="all">
<link type="text/css" rel="stylesheet" href="./wmldirectory/css_q3e9Na7Ha9_4yK_699HMY32aWRvKwOv_czvP3ZUcy-c.css" media="print">

<link type="text/css" rel="stylesheet" href="./wmldirectory/etowah_radix-eb9d7806.css" media="all">
<style type="text/css" media="all">
<!--/*--><![CDATA[/*><!--*/
.page{background-image:url(./wmlmusicdirectory/site_bkgd_0.png)}

/*]]>*/-->


    td {
   max-width:400px;
   white-space:nowrap;
   overflow:hidden;
   text-overflow:ellipsis;
   }






</style>

      <link type="text/css" rel="stylesheet" href="./wmldirectory/style_sitewide_overrides.css" media="all">
  
  <script type="text/javascript" src="./wmldirectory/js_0gj6QcpfRH2jzTbCQqf7kEkm4MXY0UA_sRhwPc8jC1o.js"></script>
<script type="text/javascript" src="./wmldirectory/javascriptGlobalSettings.js.html"></script>
<script type="text/javascript" src="./wmldirectory/js_IVj0DJCZWpxON6H3LXd3NCtv54dI61REA6UL5eEn6ug.js"></script>
<script type="text/javascript" src="./wmldirectory/js_hw-7nvlZSacpVsxs6ARWUfT8fHVlAKIq0K09KOS1z6k.js"></script>
<script type="text/javascript" src="./wmldirectory/js_0FirsaagC-rBqw-SnFbCHnpLuPllrQOi1ICtZmarsFE.js"></script>
<script type="text/javascript" src="./wmldirectory/js_ilNXnLKbigOVnP84OaYAIacyFpDouycnvgiqrLnn8tk.js"></script>
<script type="text/javascript" src="./wmldirectory/bootstrap.min.js"></script>
<script type="text/javascript" src="./wmldirectory/js_Qz_rdsotViVaoFmmPpqCCwlwXDIKASCycjBS89_k91c.js"></script>
<script type="text/javascript" src="./wmldirectory/js_gQ00FVr5tCIPp_lfi0NHYl4LhxF2rcvlNw_84rYjgBc.js"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
//--><!]]>
</script>
  <!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
  <![endif]-->
      <script type="text/javascript" src="./wmldirectory/header_sitewide_overrides.js"></script><script type="text/javascript" src="./wmldirectory/wml.js"></script><link rel="stylesheet" type="text/css" href="./wmldirectory/wmlv1.css">

  <script src="./wmldirectory/akamaihtml5-min.js"></script><script src="./wmldirectory/beacon.js"></script><script async="" type="text/javascript" src="./wmldirectory/pubads_impl_45.js"></script><script type="text/javascript" src="./wmldirectory/osd.js"></script>


  <script>
  function gettabulardata(type,sorttype)
  {


        //alert(type);
      var li_list= document.getElementById("nav-tabs").getElementsByTagName("li");
       document.getElementById("selectedcategory").value=type;
                              //alert(type);
                    for(i=0;i<li_list.length;i++)
                    {

                     if(li_list[i].id==type)
                     {

                     document.getElementById(li_list[i].id).className ="leaf active";

                     }
                     else

                     document.getElementById(li_list[i].id).className ="leaf";



                    }
                        //alert(type);
      var Name;
      var Category;
      var Genre;
      var Field;
      var Address;
      var City;
      var State;
      var Zip;
      var Phone;
      var Phone1;
      var Email;
      var Email1;
      var Photo;
      var Profile;
      var Fax;
       var html="";

 var parameters="type="+type+"&function=contact_info&sorttype="+sorttype;
                    //alert(type);

  if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      var arr=Array();
     arr=JSON.parse(xmlhttp.responseText);


        //alert(arr);

     for(i=0;i<arr.length;i++)
     {

       Name=arr[i][6];
       Category=arr[i][1];
       Genre=arr[i][2];
       Field=arr[i][3];
       Address=arr[i][16];
       City=arr[i][19];
       State=arr[i][20];
       Zip=arr[i][22];
       Phone=arr[i][23];
       Phone1=arr[i][24];
       Email=arr[i][29];
       Email1=arr[i][30];
       Photo=arr[i][37];
       Profile=arr[i][43];
       Fax=arr[i][28];


     html+="<tbody><tr no_striping='1'><td class='player_name'title='"+Name+"'><div class='player-name__inner-wrapper'><a href='ctk_directory.html'><img src="+"'"+Photo+"'"+"width='60px' alt="+"'"+Name+"'"+"></a><span class='playerInfo'><span class='playerName'><a target='_blank' href="+"'"+Profile+"'"+">"+Name+"</a></span><span class='playerNumber'>"+Category+"</span>•<span class='playerPosition'title='"+Field+"'>"+Field+"</span></span></div></td>";


     html+="<td style='width:100%' class='gp' title='"+Category+"' >"+Category+"</td><td style='width:100%' class='fgm' title='"+Genre+"'>"+Genre+"</td><td style='width:100%' class='fg_pct' title='"+Field+"'>"+Field+"</td><td style='width:100%'title='"+Address+"'>"+Address+"</td><td class='ft_pct' title='"+City+"'>"+City+"</td><td class='ore'title='"+State+"'>"+State+"</td><td class='dreb'title='"+Zip+"'>"+Zip+"</td><td class='reb'title='"+Phone+"'>"+Phone+"</td><td class='ast'title='"+Phone1+"'>"+Phone1+"</td><td class='stl'title='"+Fax+"'>"+Fax+"</td><td class='tov'title='"+Email+"'><a href='mailto:''"+Email+"'>"+Email+"</a></td><td class='pf' title='"+Email1+"'>"+Email1+"</td><td class='pts'title='"+Photo+"'>"+Photo+"</td>";


     html+="</tr></tbody>";

     }

       getsocial_links(type,html);





    //document.getElementById("secquestion").innerHTML=xmlhttp.responseText;


  }

  }
    //alert(type);
xmlhttp.open("POST","tabularcontroller.php",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
xmlhttp.send(parameters);
               //alert(type);


  }


  function mySortdata(sorttype)
  {

  if(sorttype=="Name")
  {

  document.getElementById("namesortli").className="season-2013-14 first active";
  document.getElementById("categorysortli").className="season-2013-14 active";
document.getElementById("genresortli").className="season-2013-14 active";
document.getElementById("selectedsortval").innerHTML="Name";


  }
  else
   if(sorttype=="Category")
  {

  document.getElementById("categorysortli").className="season-2013-14 first active";
  document.getElementById("namesortli").className="season-2013-14 active";
document.getElementById("genresortli").className="season-2013-14 active";
    document.getElementById("selectedsortval").innerHTML="Category";

  }
  else
  {

  document.getElementById("genresortli").className="season-2013-14 first active";
  document.getElementById("categorysortli").className="season-2013-14 active";
document.getElementById("namesortli").className="season-2013-14 active";
document.getElementById("selectedsortval").innerHTML="Genre";


  }

  var type=document.getElementById("selectedcategory").value;

   gettabulardata(type,sorttype);

  }

  function getsocial_links(type,prev_html)
  {

      var Name;
      var Category;
      var Genre;
      var Field;
      var Address;
      var City;
      var State;
      var Zip;
      var Phone;
      var Phone1;
      var Email;
      var Email1;
      var Photo;
      var Profile;
      var Fax;
       var html="";

var parameters="type="+type+"&function=social_links&sorttype=Name";


  if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      var arr=Array();
     arr=JSON.parse(xmlhttp.responseText);



     for(i=0;i<arr.length;i++)
     {

       Name=arr[i][0];
       Category=arr[i][1];
       Genre=arr[i][2];
       Field=arr[i][3];
       Facebook=arr[i][20];
       Facebook1=arr[i][21];
       Twitter=arr[i][24];
       Twitter1=arr[i][25];
       Instagram=arr[i][22];
       Instagram1=arr[i][23];
       Profile=arr[i][26];
       Amazon=arr[i][16];
       Itunes=arr[i][17];
       SoundCloud=arr[i][11];
       Youtube=arr[i][18];
       Website=arr[i][27];
       Website1=arr[i][28];
       Photo=arr[i][30];


html+="<tbody><tr no_striping='1'><td class='player_name'title='"+Name+"'><div class='player-name__inner-wrapper'><a href='ctk_directory.html'><img src="+"'"+Photo+"'"+"width='60px' alt="+"'"+Name+"'"+"></a><span class='playerInfo'><span class='playerName'><a target='_blank' href="+"'"+Profile+"'"+">"+Name+"</a></span><span class='playerNumber'>"+Category+"</span>•<span class='playerPosition'title='"+Field+"'>"+Field+"</span></span></div></td>";


html+="<td class='gp'title='"+Facebook+"'><a href='"+Facebook+"' title='"+Name+" Facebook' target='_blank'>"+Name+"</a></td> ";


html+="<td class='fgm'title='"+Facebook1+"'>"+Facebook1+"</td><td class='fg_pct'title='"+Instagram+"'>"+Instagram+"</td><td title='"+Instagram1+"'>"+Instagram1+"</td>";


html+="<td class='ft_pct'title='"+Twitter+"'><a href='"+Twitter+"' title="+Name+" Twitter target='_blank'>"+Name+"</a></td><td class='oreb'title='"+Twitter1+"'>"+Twitter1+"</td>";

html+="<td class='dreb'title='"+Profile+"'><a href='"+Profile+"' title='"+Name+" Profile' target='_blank'>"+Name+"</a></td>" ;

html+="<td class=''title='"+Amazon+"'>"+Amazon+"</td>";

html+="<td class='ast'title='"+Itunes+"'><a href='"+Itunes+"' title='"+Name+" Itunes' target='_blank'>"+Name+"</a></td> <td class='stl'title='"+SoundCloud+"'>"+SoundCloud+"</td>" ;

html+="<td class='tov'title='"+Youtube+"'><a href='"+Youtube+"' title='"+Name+" Youtube' target='_blank'>"+Name+"</a></td>";

html+="<td class='pf'title='"+Website+"'><a href='"+Website+"' title='"+Name+" Website' target='_blank'>"+Name+"</a></td>";

html+="<td class='pts'title='"+Website1+"'><a href='"+Website1+"' title='"+Name+" Website1' target='_blank'>"+Name+"</a></td> </tr></tbody>";




     }







    document.getElementById("tabulardata").innerHTML=prev_html;
    document.getElementById("tabulardata1").innerHTML=html;


  }

  }
xmlhttp.open("POST","tabularcontroller.php",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
xmlhttp.send(parameters);



  }


  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
  function bodyloadfunction()
  {

   var category= getParameterByName("category");

   if(category!="")
   {

   gettabulardata(category,"Name");


   }
   else
    gettabulardata("wms","Name");

  }

  </script>

  </head>



<body  class="html not-front not-logged-in no-sidebars page-stats region-content" style="width: auto; position: relative; top: auto; right: 0px;">
  <div id="skip-link">
    <a tabindex="1" href="" class="element-invisible element-focusable"></a>
  </div>
    <header class="header" role="header">
  <nav class="global-nav-wrapper">
    <div class="container">
    <!--Top of the page navigation and WML logo -->
      <div class="row">
        <div class="col-xs-12">
          <div class="utility-logo">
        </div>
      </div>
    </div>
  </nav>
</header>

<main id="main" class="main">
  <div id="page" class="page">
    <header>
      <nav class="main-nav-wrapper">
        <div class="main-nav-wrapper-inner">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Site Logo -->
              <div class="navbar-brand-wrapper">
                <a tabindex="1" href="../index.html" id="logo" class="navbar-brand" title="Home" rel="home">
                                      <img src="../WML_Logo.png" alt="WML Logo" width="190" height="190" title="World Music Listing Logo">                                    <span class="element-invisible">World Music Listing</span>                </a>              </div>
              <!-- Presented by Advertisement -->
              <div class="presented-by presented-by--header">
                  <div class="region region-promo-region">
    <div id="block-bean-presented-by-promo" class="block block-bean">

    <h2>Promo Title</h2>
  
  <div class="content">
     
  </div>
</div>
  </div>
              </div>
              <!-- Main Navigation for Users -->
              <div class="mobile-menu-hamburger" style="display: none;"><a href="javascript:;"></a></div>

              <ul id="main-menu" class="main-nav left stickyScrollEnabled" style="position: relative; right: auto; top: auto; width: auto; height: auto;"><li class="visible-xs mobile-menu-top em-smi em-ti" style="display: inline-block; width: auto;">Menu</li><li class="leaf main-nav__menu-item em-smi em-ti" style="display: inline-block; width: auto;"><a href="index.html" title="World Music Listing" tabindex="0">Home</a></li><li class="leaf main-nav__menu-item em-smi em-ti" style="display: inline-block; width: auto;"><a href="https://wmlmusicguide.com/wml_directory/browse.html" title="Browse World Music Listing" tabindex="0">Browse</a></li><li class="expanded main-nav__menu-item has-dropdown em-smi em-ti" title="" style="display: inline-block; width: auto;"><a href="https://wmlmusicguide.com/wml_directory/register.html" title="Register World Music Listing" tabindex="0">Register</a><div class="button-primary__arrow button-primary__arrow--down button-primary__arrow--mobile-nav"></div><ul class="dropdown cols-1 blocks-0 em-smu" style="display: none; position: absolute; left: -81px;"><li class="dropdown-row em-smi" style="display: inline-block; width: auto;"><ul class="em-ssmu" style="display: block; position: relative;"><li class="first last leaf em-smi" target="_blank" title="" style="display: inline-block; width: auto;"><a href="" target="_blank" title="" tabindex="0"></a></li></ul></li></ul></li><li class="first expanded main-nav__menu-item has-dropdown em-smi em-ti" title="" style="display: inline-block; width: auto;"><a href="https://wmlmusicguide.com/wml_directory/create.html" title="Create World Music Listing" tabindex="0">Create</a><div class="button-primary__arrow button-primary__arrow--down button-primary__arrow--mobile-nav"></div><ul class="dropdown cols-3 blocks-0 em-smu" style="display: none; position: absolute;"><li class="dropdown-row em-smi" style="display: inline-block; width: auto;"><ul class="em-ssmu" style="display: block; position: relative;"><li class="first leaf em-smi" style="display: inline-block; width: auto;"><a href="" title="" tabindex="0"></a></li></ul></li></ul></li><li class="expanded main-nav__menu-item has-dropdown em-smi em-ti" style="display: inline-block; width: auto;"><a href="https://wmlmusicguide.com/wml_directory/manage.html" title="Manage World Music Listing" tabindex="0">Manage</a><div class="button-primary__arrow button-primary__arrow--down button-primary__arrow--mobile-nav"></div><ul class="dropdown cols-2 blocks-0 em-smu" style="display: none; position: absolute; left: -292px;"><li class="dropdown-row em-smi" style="display: inline-block; width: auto;"><ul class="em-ssmu" style="display: block; position: relative;"><li class="first leaf em-smi" title="Fundraising" style="display: inline-block; width: auto;"><a href="" title=""></a></li></ul></li></ul></li><li class="last expanded main-nav__menu-item has-dropdown em-smi em-ti" title="" style="display: inline-block; width: auto;"><a href="https://wmlmusicguide.com/wml_directory/admin.html" title="World Music Listing Admin" tabindex="0">Admin</a><div class="button-primary__arrow button-primary__arrow--down button-primary__arrow--mobile-nav"></div><ul class="dropdown cols-4 blocks-1 em-smu" style="display: none; position: absolute; left: -760px;"><li class="dropdown-row em-smi" style="display: inline-block; width: auto;"><ul class="em-ssmu" style="display: block; position: relative;"><li class="first leaf em-smi" title="" style="display: inline-block; width: auto;"><a href="" title="" tabindex="0"></a></li></ul></li></ul></li></ul>                            <div class="search-box">
                <p><span class="search-box__pre-text">Search</span> <a tabindex="-1" class="search-box__icon" href="#"><span tabindex="-1" class="element-invisible">Toggle Search Input</span></a>
                </p>
                <div class="search-box__form-wrapper">
                  <form>
                    <label for="search-box__input-box" class="element-invisible">Search Box</label>
                    <input tabindex="1" id="search-box__input-box" class="search-box__input-box" alt="search box" type="text" placeholder="Search">
                    <input tabindex="1" type="submit" class="submit search-box__submit-btn" value="Search">
                    <div class="search-box__submit-btn-icon"></div>
                  </form>
                </div>
              </div>
              <!-- Social Bar -->
              <div class="social-bar-wrapper">
                  <div class="region region-header-social">
    <div id="block-etowah-marketing-social-links-header" class="block block-etowah-marketing">

    
  <div class="content">
</div>
  </div>
              </div>
            </div><!-- End .col-lg-12 -->
          </div><!-- End .row -->
        </div><!-- End .container -->
      </div><!-- End .main-nav-wrapper-inner -->
      </nav><!-- End .main-nav-wrapper -->
    </header>

    <div class="container">
      
    </div>

  <div class="page-header-ad">
    <div class="container">
        <div class="region region-header">
    <div id="block-panels-mini-mini-panel-top-banner-ad" class="block block-panels-mini">

    
  <div class="content">
    <div class="panel-display panel-1col clearfix" id="mini-panel-mini_panel_top_banner_ad">
  <div class="panel-panel panel-col">
    <div><div class="panel-pane pane-fieldable-panels-pane pane-uuid-846c1293-c062-11e3-8a33-0800200c9a66 pane-bundle-etowah-promo">
  

  <div class="fieldable-panels-pane">
            <div id="div-gpt-ad-846c1293-c062-11e3-8a33-0800200c9a66" class="gpt_container banner-ad" data-section="player_stats" data-pos-one="top_left" data-pos-two="" data-breakpoint="desktop_1024px" data-enabled="true" style="width: 728px; height: 90px;"><div id="" style="border: 0pt none;"><iframe id="" name="" width="728" height="90" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:"<html><body style='background:transparent'></body></html>"" style="border: 0px; vertical-align: bottom;"></iframe></div><iframe id="" name="" width="0" height="0" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:"<html><body style='background:transparent'></body></html>"" style="border: 0px; vertical-align: bottom; visibility: hidden; display: none;"></iframe></div>
      </div>

  
</div>
<div class="panel-pane pane-fieldable-panels-pane pane-uuid-846c1293-c062-11e3-8a33-0800200c9a66 pane-bundle-etowah-promo">

      
  <div class="fieldable-panels-pane">
            <div id="div-gpt-ad-846c1293-c062-11e3-8a33-0800200c9a66" class="gpt_container" data-section="" data-pos-one="" data-pos-two=""></div>
      </div>

  
</div>
</div>
  </div>
</div>
  </div>
</div>
  </div>
    </div>
  </div>

   <div tabindex="0" id="content" class="">

    <div id="page-header">
                      </div>
           <div class="region region-content">
    <div id="block-system-main" class="block block-system">


  <div class="content">
    
<div class="panel-display boxton clearfix radix-boxton">

  <div class="container">
      <div class="row">
      <div class="col-xs-12 content panel-panel">
        <div class="panel-panel-inner">
          <div class="panel-pane pane-fieldable-panels-pane pane-uuid-9233b2b7-8d69-4662-8520-6e9eb1cd9050 pane-bundle-etowah-text">
  
      
  <div class="fieldable-panels-pane">
    <div class="field field-name-field-etowah-text-body field-type-text field-label-hidden">
	</div>
</div>

  
</div>
<div class="panel-pane pane-etowah-stats-pane-nav">


  
  <div class="pane-content">

  <input type="hidden" id="selectedcategory" name="selectedcategory" value="" />
    <div class="menu-block-ctools-main-menu-1"><ul class="nav nav-tabs" id="nav-tabs">


    <li class="leaf active" id='wms' ><a href="#" onClick="gettabulardata('wms','Name');return false;" class="active" title="World Music Listing" tabindex="0">World Music Listing</a></li>


    <li class="leaf" id='Music' ><a href="#" onClick="gettabulardata('Music','Name');return false;" title="Link to WML Music" tabindex="0">Music</a></li>
    <li class="leaf" id='Country'><a href="#" onClick="gettabulardata('Country','Name');return false;" title="Link to Country Music" tabindex="0">Country</a></li>
    <li class="leaf" id='Dancehall'><a href="#" onClick="gettabulardata('Dancehall','Name');return false;" title="Link to Dancehall Music" tabindex="0">Dancehall</a></li>
    <li class="leaf" id='Gospel'><a href="#" onClick="gettabulardata('Gospel','Name');return false;" title="Link to Gospel Music" tabindex="0">Gospel</a></li>
    <li class="leaf" id='Pop'><a href="#" onClick="gettabulardata('Pop','Name');return false;" title="Link to Pop Music" tabindex="0">Pop</a></li>
    <li class="leaf" id='R&B'><a href="#" onClick="gettabulardata('R&B','Name');return false;" title="Link to R&B Music" tabindex="0">R&#38;B</a></li>
    <li class="leaf" id='Rap/Hip-Hop'><a href="#" onClick="gettabulardata('Rap/Hip-Hop','Name');return false;" title="Link to Rap/Hip-Hop Music" tabindex="0">Rap/Hip-Hop</a></li>
    <li class="leaf" id='Reggae'><a href="#" onClick="gettabulardata('Reggae','Name');return false;" title="Link to Reggae Music" tabindex="0">Reggae</a></li>
    <li class="leaf" id='Rock'><a href="#" onClick="gettabulardata('Rock','Name');return false;" title="Link to Rock Music" tabindex="0">Rock</a></li>
    <li class="leaf" id='Soca'><a href="#" onClick="gettabulardata('Soca','Name');return false;" title="Link to Soca Music" tabindex="0">Soca</a></li>
    <li class="leaf" id='Disc Jocks/Radio Personnel'><a href="#" onClick="gettabulardata('Disc Jocks/Radio Personnel');return false;" title="Link to Disc Jocks/Radio Personnel" tabindex="0">Disc Jocks/Radio Personnel</a></li>
    <li class="leaf" id='Labels'><a href="#" onClick="gettabulardata('Labels','Name');return false;" title="Link to Record Labels" tabindex="0">Labels</a></li>
    <li class="leaf" id='Producers, Musicians, & Engineers'><a href="#" onClick="gettabulardata('Producers, Musicians, & Engineers','Name');return false;" title="Link to Producers, Musicians & Engineers" tabindex="0">Producers, Musicians, &#38; Engineers</a></li>

    <li class="leaf" id='Radio Stations'><a href="#" onClick="gettabulardata('Radio Stations','Name');return false;" title="Link to Radio Stations" tabindex="0">Radio Stations</a></li>
    <li class="leaf" id='Entertainment'><a href="#" onClick="gettabulardata('Entertainment','Name');return false;" title="Link to WML Entertainment" tabindex="0">Entertainment</a></li>

    <li class="leaf" id='Magazines'><a href="#" onClick="gettabulardata('Magazines','Name');return false;" title="Link to Magazines" tabindex="0">Magazines</a></li>
    <li class="leaf" id='Marketing/Promotions & PR'><a href="#" onClick="gettabulardata('Marketing/Promotions & PR','Name');return false;" title="Link to Marketing/Promotinos & PR Companies" tabindex="0">Marketing/Promotions & PR</a></li>
    <li class="leaf" id='Photographers/Video Directors'><a href="#" onClick="gettabulardata('Photographers/Video Directors','Name');return false;" title="Link to Photographers/Video Directors" tabindex="0">Photographers/Video Directors</a></li>
    <li class="leaf" id='Print/Video Models'><a href="#" onClick="gettabulardata('Print/Video Models','Name');return false;" title="Link to Print/Video Models" tabindex="0">Print/Video Models</a></li>
    <li class="leaf" id='Profile'><a href="#" onClick="gettabulardata('Profile','Name');return false;" title="World Music Listing Profile" tabindex="0">Profile</a></li>
    </ul></div>


    </div>


  </div>
  <div class="stats-header-controls clearfix"><div class="pull-right col-xs-12 col-tiny-6 col-sm-5 season-menu-container"><label class="label-full-btn">Filter By: </label><div class="btn-group btn-group-season">
  <button class="btn btn-season btn-default dropdown-toggle" data-toggle="dropdown" id="selectedsortval">Name <i class="icon-dropdown-arrows"></i></button>
<ul class="dropdown-menu dropdown-menu-season pull-right" role="menu" >

<li class="season-2013-14 first active" id="namesortli"><a href="javascript:mySortdata('Name');"  class="active" title="Name" tabindex="0">Name</a></li>


<li class="season-2012-13 active" id="categorysortli"><a href="javascript:mySortdata('Category');"  class="active" title="Category" tabindex="0">Category</a></li>
<li class="season-2011-12 active" id="genresortli"><a href="javascript:mySortdata('Genre');" class="active" title="Genre" tabindex="0">Genre</a></li>

</ul></div>
</div><div class="control btn-group team-stats__toggle-button-group col-xs-12 col-tiny-6 col-sm-5" data-toggle="buttons">
<button class="btn btn-default btn-totals" onClick="statsShowTotals()" data-toggle="button"><a href="http://wmlmusicguide.com/site/wml_directory.php#tab_contact">Contact</button>
<button class="btn btn-default btn-averages active" onClick="statsShowAverages()" data-toggle="button">Social Links</button>
</div>
</div><div class="panel-pane pane-etowah-stats-pane-player">

        <h4 class="pane-title">World Music Listing: Diverse Music Guide</h4>


  <div class="pane-content">
    <table class="sticky-header" style="position: fixed; top: 0px; left: 221.5px; visibility: hidden;"><thead style=""><tr><th class="player_name">Name</th><th class="gp">Category</th><th class="fgm">Genre</th><th class="fg_pct">Field</th><th class="fg3_pct">Address</th><th class="ft_pct">City</th><th class="oreb">State</th><th class="dreb">ZipCode</th><th class="reb">Phone#</th><th class="ast">Phone#1</th><th class="stl">Fax#</th><th class="tov">Email</th><th class="pf">Email 1</th><th class="pts">Photo</th> </tr></thead></table><table class="stats-table player-stats season-totals table table-striped table-bordered sticky-enabled tableheader-processed sticky-table tablesorter tablesorter-default">
 <thead><tr class="tablesorter-headerRow"><th class="player_name tablesorter-header tablesorter-headerAsc" data-column="0" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Name</div></th><th class="gp tablesorter-header" data-column="1" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Category</div></th><th class="fgm tablesorter-header" data-column="2" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Genre</div></th><th class="fg_pct tablesorter-header" data-column="3" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Field</div></th><th class="fg3_pct tablesorter-header" data-column="4" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Address</div></th><th class="ft_pct tablesorter-header" data-column="5" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">City</div></th><th class="oreb tablesorter-header" data-column="6" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">State</div></th><th class="dreb tablesorter-header" data-column="7" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">ZipCode</div></th><th class="reb tablesorter-header" data-column="8" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Phone#</div></th><th class="ast tablesorter-header" data-column="9" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Phone#1</div></th><th class="stl tablesorter-header" data-column="10" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Fax#</div></th><th class="tov tablesorter-header" data-column="11" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Email</div></th><th class="pf tablesorter-header" data-column="12" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Email 1</div></th><th class="pts tablesorter-header" data-column="13" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Photo</div></th> </tr></thead>
<tbody>

 <tbody id="tabulardata" class="tabulardata"></tbody>



</tbody>
</table>


<table class="sticky-header"  style="position: fixed; top: 0px; left: 0px; visibility: hidden;"><thead style=""><tr><th class="player_name">Name</th><th class="gp">Facebook</th><th class="fgm">Facebook1</th><th class="fg_pct">Instagram</th><th class="fg3_pct">Instagram1</th><th class="ft_pct">Twitter</th><th class="oreb">Twitter1</th><th class="dreb">Profile</th><th class="reb">Amazon</th><th class="ast">Itunes</th><th class="stl">SoundCloud</th><th class="tov">Youtube</th><th class="pf">Website</th><th class="pts">Website1</th> </tr></thead></table><table class="stats-table player-stats season-averages hidden table table-striped table-bordered sticky-enabled tableheader-processed sticky-table tablesorter tablesorter-default">
 <thead>


 <tr class="tablesorter-headerRow"><th class="player_name tablesorter-header tablesorter-headerAsc" data-column="0" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Name</div></th><th class="gp tablesorter-header" data-column="1" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Facebook</div></th><th class="fgm tablesorter-header" data-column="2" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Facebook1</div></th><th class="fg_pct tablesorter-header" data-column="3" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Instagram</div></th><th class="fg3_pct tablesorter-header" data-column="4" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Instagram1</div></th><th class="ft_pct tablesorter-header" data-column="5" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Twitter</div></th><th class="oreb tablesorter-header" data-column="6" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Twitter1</div></th><th class="dreb tablesorter-header" data-column="7" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Profile</div></th><th class="reb tablesorter-header" data-column="8" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Amazon</div></th><th class="ast tablesorter-header" data-column="9" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Itunes</div></th><th class="stl tablesorter-header" data-column="10" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">SoundCloud</div></th><th class="tov tablesorter-header" data-column="11" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Youtube</div></th><th class="pf tablesorter-header" data-column="12" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Website</div></th><th class="pts tablesorter-header" data-column="13" tabindex="0" unselectable="on"><div class="tablesorter-header-inner">Website1</div></th> </tr></thead>


<tbody id="tabulardata1" class="tabulardata1"></tbody>

</table>


  </div>

  
      <div class="more-link">
        </div>
      </div>
    </div>
  </div>

</div><!-- /.boxton -->
  </div>
</div>
  </div>
    </div>
  <div id="div-gpt-ad-background-243872" class="gpt_container" data-size-mobile_320px="" data-size-tablet_640px="" data-size-tablet_768px="" data-size-desktop_1024px="1900x1600" data-pos-two="" data-pos-one="background" data-section="global" data-enabled="true" style="position: fixed;"><div id="" style="border: 0pt none;"><iframe id="" name="" width="1900" height="1600" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:"<html><body style='background:transparent'></body></html>"" style="border: 0px; vertical-align: bottom;"></iframe></div><iframe id="" name="" width="0" height="0" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:"<html><body style='background:transparent'></body></html>"" style="border: 0px; vertical-align: bottom; visibility: hidden; display: none;"></iframe></div></div><!-- End .page -->

</main>

  <div class="region region-footer">
    <div id="block-panels-mini-mini-panel-footer" class="block block-panels-mini">

    
  <div class="content">
    
<footer id="footer" role="footer" class="footer panel-display etowah-footer clearfix etowah-footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="custom-page-ad_bottom">
          <div class="panel-pane pane-fieldable-panels-pane pane-uuid-e5eb3729-0c19-4adb-8354-5df6a5097e9f pane-bundle-etowah-promo">
  
      
  <div class="fieldable-panels-pane">
            <div id="div-gpt-ad-e5eb3729-0c19-4adb-8354-5df6a5097e9f" class="gpt_container banner-ad" data-section="player_stats" data-pos-one="bottom_left" data-pos-two="" data-breakpoint="desktop_1024px" data-enabled="true" style="width: 728px; height: 90px;"><div id="" style="border: 0pt none;"><iframe id="" name="" width="728" height="90" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:"<html><body style='background:transparent'></body></html>"" style="border: 0px; vertical-align: bottom;"></iframe></div><iframe id="" name="" width="0" height="0" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:"<html><body style='background:transparent'></body></html>"" style="border: 0px; vertical-align: bottom; visibility: hidden; display: none;"></iframe></div>
      </div>

  
</div>
        </div>
      </div>
      <div class="row">
        <ul class="col-xs-12 footer-top-sponsors">
          <li class="footer-top-sponsors__sponsor-item col-md-2 col-sm-3 col-xs-12 item-0" style="height: 419px;">
            <div class="panel-pane pane-custom pane-1">
  
      
  
  <div class="pane-content">
  </div>

  
  </div>
<div class="panel-pane pane-custom pane-2">
  
      
  
  <div class="pane-content">
  </div>

  
  </div>
          </li>
          <li class="footer-top-sponsors__sponsor-item col-md-2 col-sm-3 col-xs-12 item-1" style="height: 419px;">
            <div class="panel-pane pane-menu-tree pane-menu-footer-1st-pane">
  
        <h4 class="pane-title"></h4>
    
  
  <div class="pane-content">
<div class="panel-pane pane-custom pane-4">
  
      
  
  <div class="pane-content">
    <div style="0px auto 5px;"><img src="./wmldirectory/footer-placeholder-180x120.png"></div>
  </div>

  
  </div>
          </li>
          <li class="footer-top-sponsors__sponsor-item col-md-2 col-sm-3 col-xs-12 item-5" style="height: 419px;">
            <div class="panel-pane pane-custom pane-5">
  
      
  
  <div class="pane-content">
  </div>

  
  </div>
<div class="panel-pane pane-custom pane-6">
  
      
  
  <div class="pane-content">
  </div>

  
  </div>
          </li>
        </ul>
      </div><!-- End .row -->
    </div><!-- End .container -->
  </div><!-- End .footer-top -->

  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="footer-left col-xs-12 col-md-6">
        </div><!-- End .footer-right .col-md-6 -->
        <div class="footer-right col-xs-12 col-md-6 pull-left">
         <!-- End .footer-left .col-md-6 -->
      </div><!-- End .row -->
      <div class="row">
        <div class="col-md-12">
          <!-- End col-md-6 -->
      </div><!-- End .row -->
    </div><!-- End .container -->
  </div><!-- End .footer-bottom -->
</footer> <!-- End .footer -->
  </div>
</div>
<style>
    #block-panels-mini-mini-panel-footer.eucookie {margin-bottom: 50px;}
    #policy_wrapper {position:fixed; bottom:0px; left:0px; width:100%; height:50px; background:#ccc; border-top:2px solid #0061a6; font-family:arial; font-size:11px; z-index:1000;}
    @media screen and (max-width:650px) and (min-width:481px) {
      #policy_wrapper {height: 75px;}
      #block-panels-mini-mini-panel-footer.eucookie {margin-bottom: 75px;}
    }
    @media screen and (max-width:480px) and (min-width:351px) {
      #policy_wrapper {height: 100px;}
      #block-panels-mini-mini-panel-footer.eucookie {margin-bottom: 100px;}
    }
    @media screen and (max-width:350px) {
      #policy_wrapper {height: 150px;}
      #block-panels-mini-mini-panel-footer.eucookie {margin-bottom: 125px;}
    }
    
    #policy_wrapper #close_button,
    #policy_wrapper .privacy_policy {display:block; width:100px; height:20px; background:#0061a6; border-radius:3px; color:#fff; text-align:center; line-height:20px; margin:5px; float:right; text-decoration:none;}
    #policy_wrapper .privacy_policy {width:100px; padding:5px;}
    #policy_wrapper.close_wrapper {display:none;}
    #policy_wrapper .text {padding:5px;}
 </style>


<div id="policy_wrapper" class="close_wrapper">
	<div class="text">
    </div>
</div>


<script>
function getCookie (name) {
	if(name == "path" || name == "expires" || name == "domain" || name == "version") {
		name = "badCookieName";
	}
	 var arg = name + "=";
	  var alen = arg.length;
	  var clen = document.cookie.length;
	  var i = 0;
	  while (i < clen) {
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg)
		  return getCookieVal (j);
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0) break; 
	
	  }
	  return null;
}

//check for policy cookie
window.onload=function(){
  bodyloadfunction();



  var eucodes = ['AT','BE','BG','CY','CZ','DE','DK','EE','ES','FI','FR','GB','GR','HR','HU','IE','IT','LT','LU','LV','MT','NL','PL','PT','RO','SE','SI','SK'];
  if(jQuery.inArray( _wml.settings.geo.country_code, eucodes ) != -1 ) {
  	if(!getCookie('cookie_policy')){
    	jQuery('#policy_wrapper').removeClass('close_wrapper');
  		jQuery('#block-panels-mini-mini-panel-footer').addClass('eucookie');
  	}
  }
};


function close_policy_wrapper (){
	document.cookie="cookie_policy=accept; expires=Wed, 1 Jan 2020 12:00:00 GMT; path=/";
	jQuery('#policy_wrapper').addClass('close_wrapper');
	jQuery('#block-panels-mini-mini-panel-footer').removeClass('eucookie');
};

</script>

  </div>
  <script type="text/javascript" src="./wmldirectory/pkgAnalytics-min.js"></script>
<script type="text/javascript" src="./wmldirectory/js_aiQf68XsPM6zndplRn7gli6laergl9IvwXahO765-90.js"></script>
<script type="text/javascript" src="./wmldirectory/selectivizr-min.js"></script>
<script type="text/javascript" src="./wmldirectory/js_WxyGON_Ev7pI2pr92VsU2zJ7xumhAx0ot-xtiAhcXBA.js"></script>
      <script type="text/javascript" src="./wmldirectory/footer_sitewide_overrides.js"></script>
