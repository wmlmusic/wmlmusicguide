// <![CDATA[

/*setup for get_img function*/
//for url
var get_img_url_start = 'http://cdn.pimg.co/',  //ex. 'http://cdn.pimg.co/'     
	get_img_url_end = '/pic.jpg';        	//ex. '/pic.jpg'

var	get_img_random_num = false, 			//true/false - allow start random pictures (numbers)
	get_img_random_max_num = 50, 			//1...n - quant of random pictures in category (numbers)
	get_img_random_mask_num = 9999, 		//99999 - index of img when start random mode in this category
	get_img_show_only_category = 'all'; 	//'all' or '' - show all categories / 'a'/'an'/../'sx'/'tr' - id of categoy ONLY allow
	

var use_img = new Array(),
	is_random_img = false;

//script generating imgs
function get_img(width,height,index,category,img_allign,object) {
	//var big_width=width*2,	big_height=height*2;
	//if (big_width>800) {big_width=800;}
	//if (big_height>600) {big_height=600;}
	var big_width=800,	big_height=600;
	
	// setting data
	object.setAttribute("onload", " ");
	object.width = width;
	object.height = height;
	
	if (kind == 'HTML') {
		is_random_img = false;
		if (get_img_show_only_category != '' && get_img_show_only_category != 'all') {
			category = get_img_show_only_category;
		}
		if (get_img_random_num==true || index == get_img_random_mask_num) {	
			index = get_random_num();
			is_random_img = true;	
		}
		
		if(use_img.length==get_img_random_max_num) {use_img = new Array();}
		index = check_on_already_use_img(index,category);
	
		//http://pimg.co/s/b/15/1000/800/c
		//http://pimg.co/s/category/index/wieghtxheight/allign
		if (img_allign == '') {img_allign='c';}
		object.src = get_img_url_start+"s/"+category+"/"+index+"/"+width+"x"+height+"/"+img_allign+get_img_url_end;
		if (object.parentNode.className=='prettyPhoto' || object.parentNode.className=='prettyPhoto preloader') {
			object.parentNode.href = get_img_url_start+"s/"+category+"/"+index+"/"+big_width+"x"+big_height+"/"+img_allign+get_img_url_end; 
		}
		var alt_rnd = '';
		if (is_random_img == true) {alt_rnd='rnd - ';}
		if (object.alt == '') {object.alt = 'Simple Image - '+alt_rnd+category+index;}
		use_img[use_img.length] = category+'.'+index;
		//alert(category+'-'+index+' are '+use_img[category][index]);
	} else {
		var color = '/'+index+index+index;
		var	get_img_random_color = true; 		//true/false - allow start random colors for html-default version
		if (get_img_random_color==true) {	color = '/'+Math.floor((Math.random()*999999)+1);			}
		object.src  = get_img_url_start+'p/'+width+'x'+height+color+'/fff'+get_img_url_end;
		if (object.parentNode.className=='prettyPhoto' || object.parentNode.className=='prettyPhoto preloader') {
			object.parentNode.href = get_img_url_start+'p/'+big_width+'x'+big_height+color+'/fff'+get_img_url_end;
		}
		if (object.alt == '') {object.alt = 'Image BgColor - '+color;}
	} 
}

function get_random_num() {
	return Math.floor((Math.random()*get_img_random_max_num)+1);
}

function is_array(arr) {
	var is_arr = false;
	if (typeof(arr) == 'object' && arr instanceof Array) {
		is_arr = true;
	}
	return is_arr;
}

function in_array(arr,val) {
	var in_arr = false;
    for(var i=0; i<arr.length; i++) {
        if(val == arr[i]) {
			in_arr = true;
			break;
		}    
	}
    return in_arr;
}

function check_on_already_use_img(index,category) {
	if (in_array(use_img,category+'.'+index)) {
		index = get_random_num();
		is_random_img = true;
		index = check_on_already_use_img(index,category);
	}
	return index;
}

// ]]>

