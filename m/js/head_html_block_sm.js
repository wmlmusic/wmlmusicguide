// <![CDATA[

function get_img(width,height,index,cat_index,text_allign,object) {
	object.width = width;
	object.height = height;
	object.alt = ' http://cdn.pimg.co/p/'+width+'x'+height+'/'+index+index+index+'';
	object.src = 'http://cdn.pimg.co/p/'+width+'x'+height+'/7b7b7b/7b7b7b';
	if (object.parentNode.className=='prettyPhoto' || object.parentNode.className=='prettyPhoto preloader') {object.parentNode.href='http://cdn.pimg.co/p/'+800+'x'+600+'/'+index+index+index+'';}
	object.setAttribute("onload", " ");
}

// ]]>