// <![CDATA[
$(function() {

/*$('.sidebar_bg,.testom').css({"-webkit-box-shadow": "1px 1px 3px #d3d3d3", "-moz-box-shadow":"1px 1px 3px #d3d3d3", "box-shadow":"1px 1px 3px #d3d3d3"});/**/

/*$('.pic img,.btn a').css({"-webkit-box-shadow": "1px 2px 4px #a8a8a8", "-moz-box-shadow":"1px 2px 4px #a8a8a8", "box-shadow":"1px 2px 4px #a8a8a8"});/**/

$('.btn a').css({"border-radius":"5px", "-moz-border-radius":"5px", "-webkit-border-radius":"5px"});/**/
/*$('#now_slider').css({"border-radius":"10px", "-moz-border-radius":"10px", "-webkit-border-radius":"10px"});/**/
/*$('#contactform_main input,#contactform_main textarea').css({"border-radius":"4px", "-moz-border-radius":"4px", "-webkit-border-radius":"4px"});/**/

});
	
$(function () {
	var arr_links = location.href.split('/');
	var length = arr_links.length;
	$('.menu li').each(function () {
		if ($(this).children('a').attr('href') == arr_links[(length-1)]) {
			$(this).addClass('active');
			$(this).children('a').addClass('active');
			$(this).parents('li').addClass('active');
			$(this).parents('li').children('a').addClass('active');
		}
	})
	$(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
			social_tools: false,
		});
	});
});

$(function(){
	$('#contactform_main').submit(function(){				  
		var action = $(this).attr('action');
		$.post(action, { 
			name: $('#name').val(),
			email: $('#email').val(),
			company: $('#url').val(),
			subject: $('#subject').val(),
			message: $('#message').val()
		},
			function(data){
				$('#contactform_main #submit').attr('disabled','');
				$('.response').remove();
				$('#contactform_main').before('<p class="response">'+data+'</p>');
				$('.response').slideDown();
				if(data=='Message sent!') $('#contactform_main').slideUp();
			}
		); 
		return false;
	});
	
	$().UItoTop();
	
	$("#gallery, #gallery-imgs").preloader({not_preloader:'img.h, img.r_plus, img.r_plus_overlay, .showcase-slide img, .flickr img, .sidebar_flickr img, #now_slider img'});

    $("#ticker").tweet({
        username: "twitter", // define your twitter username
        page: 1,
        avatar_size: 16, // avatar size in px
        count: 20, // how many tweets to show
        loading_text: "loading ..."
    }).bind("loaded", function () {
        var ul = $(this).find(".tweet_list");
        var ticker = function () {
                setTimeout(function () {
                    ul.find('li:first').animate({
                        marginTop: '-4em'
                    }, 500, function () {
                        $(this).detach().appendTo(ul).removeAttr('style');
                    });
                    ticker();
                }, 8000); // duration before next tick (4000 = 4 secs)
            };
        ticker();
    });


    $("#ticker1").tweet({
        username: "twitter", // define your twitter username
        page: 1,
        avatar_size: 16, // avatar size in px
        count: 2, // how many tweets to show
        loading_text: "loading ..."
    }).bind("loaded", function () {
        var ul = $(this).find(".tweet_list");
        var ticker1 = function () {
                setTimeout(function () {
                    ul.find('li:first').animate({
                        marginTop: '-4em'
                    }, 500, function () {
                        $(this).detach().appendTo(ul).removeAttr('style');
                    });
                    ticker1();
                }, 8000); // duration before next tick (4000 = 4 secs)
            };
        ticker1();
    });



});
// ]]>
