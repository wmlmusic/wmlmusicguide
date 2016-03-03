// <![CDATA[

$(function() {    
    $('.kbpanel-bannercontainer').kenburn({
 
        thumbWidth:70, // thumbnail width
        thumbHeight:40, // thumbnail height
         
        thumbAmount:4,  // number of thumbnails to show
        thumbStyle:"both",   // thumb, bullet, none, both
        thumbVideoIcon:"on", // show a video icon for video content: off, on
         
        thumbVertical:"bottom",
        thumbHorizontal:"center",                           
        thumbXOffset:0,
        thumbYOffset:40,
        bulletXOffset:0,
        bulletYOffset:-16,
        hideThumbs:"on",
        touchenabled:'on',  // allow touch swipe (suitable for mobile devices): on, off
        pauseOnRollOverThumbs:'off', // pause slider when mouse over thumbnail
        pauseOnRollOverMain:'on', // pause slider when mouse over slider
        preloadedSlides:2, // number of slides to preload during startup
         
        timer:5, // time before next slide (5 = 5 seconds)
         
        debug:"off",                        
         
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //                                               Google Fonts !!                                             //
        // local GoogleFont JS from your server: http://www.yourdomain.com/kb-plugin/js/jquery.googlefonts.js        //
        // GoogleFonts from Original Source: http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js or https:... // 
        //          PT+Sans+Narrow:400,700                                                                          //
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        googleFonts:'Oswald',
        googleFontJS:'sliders/kbpanel-slider/js/jquery.googlefonts.js'
    });
    $('.tnone').click(function() {
        $('.tbull').removeClass('selected');
        $('.tthumb').removeClass('selected');
        $('.tnone').addClass('selected');
        $('.tauto').removeClass('selected');
        $('.kenburn_thumb_container').css({'visibility':'hidden'});
        $('.thumbbuttons').css({'visibility':'hidden'});        
    });
    $('.tthumb').click(function() {
        $('.tbull').removeClass('selected');
        $('.tauto').removeClass('selected');
        $('.tthumb').addClass('selected');
        $('.tnone').removeClass('selected');
        $('.kenburn_thumb_container').css({'visibility':'visible'});
        $('.thumbbuttons').css({'visibility':'hidden'});
        $('body').addClass('tp_showthumbsalways');
        $('.kenburn_thumb_container').animate({'opacity':1},{duration:300,queue:false});
    });
    $('.tauto').click(function() {
        $('.tauto').addClass('selected');
        $('.tthumb').removeClass('selected');
        $('.tnone').removeClass('selected');
        $('.tbull').removeClass('selected');
        $('body').removeClass('tp_showthumbsalways');
        $('.kenburn_thumb_container').css({'visibility':'visible'});
        $('.thumbbuttons').css({'visibility':'hidden'});
        setTimeout(function() {
            $('.kenburn_thumb_container').animate({'opacity':0},{duration:300,queue:false});
        },100);
    });
    $('.tbull').click(function() {
        $('.tbull').addClass('selected');
        $('.tauto').removeClass('selected');
        $('.tthumb').removeClass('selected');
        $('.tnone').removeClass('selected');
        $('.kenburn_thumb_container').css({'visibility':'hidden'});
        $('.thumbbuttons').css({'visibility':'visible'});        
    });
    $('body').addClass('tp_showthumbsalways');
    $('.tthumb').click();     
});

// ]]>