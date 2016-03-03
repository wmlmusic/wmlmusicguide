/*---------------------------------------------*\
|   Project: Wordpress Advanced Rating System   |
|     This code were developed by: Mr. Kun 		|
|         Homepage: http://kuncode.com		    |
|      _ +-----------------------------+ _	    |
|     /o)|        Coder: Mr. Kun       |(o\	    |
|    / / |   Web: http://kuncode.com   | \ \	|
|   ( (_ |   Blog: http://veerkun.com  | _) )   |
|  ((\ \)+-/o)---------------------(o\-+(/ /))  |
|  (\\\ \_/ /                       \ \_/ ///)  |
|   \      /                         \      /   |
|    \____/                           \____/    |
\*---------------------------------------------*/


function reset_default_ratings_templates(template) {
		var default_template;
		switch(template) {
			case "no_rate":
				default_template = "(No Ratings Yet)";
				break;
			case "rate":
				default_template = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>)";
				break;
			case "rated":
				default_template = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, You rated)";
				break;
			case "rate_disable":
				default_template = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, Rating disable)";
				break;
			case "rate_not_allow":
				default_template = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, Please register for rating)";
			break;
			case "rate_only_text":
				default_template = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, <strong>{rate_percent}</strong>%)";
			break;
		}
		document.getElementById('template_' + template).value = default_template;
}
function reset_all_default_ratings_templates() {
	var default_template_value;
	var choose_template = ["no_rate","rate","rated","rate_disable","rate_not_allow","rate_only_text"];
	for (var i = 0; i < choose_template.length;  i++ ) {
		switch(choose_template[i]) {
			case "no_rate":
				default_template_value = "(No Ratings Yet)";
				break;
			case "rate":
				default_template_value = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>)";
				break;
			case "rated":
				default_template_value = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, You rated)";
				break;
			case "rate_disable":
				default_template_value = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, Rating disable)";
				break;
			case "rate_not_allow":
				default_template_value = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, Please register for rating)";
			break;
			case "rate_only_text":
				default_template_value = "(<strong>{total_raters}</strong> raters, <strong>{total_scores}</strong> scores, average: <strong>{rate_average}</strong> out of <strong>{max_rates}</strong>, <strong>{rate_percent}</strong>%)";
			break;
		}
		document.getElementById('template_'+ choose_template[i]).value = default_template_value;
	}
}

function reset_default_ratings_widget_templates(template) {
		var default_template_widget;
		switch(template) {
			case "rate_average":
				default_template_widget = '<a href="{post_url}" title="{post_title}">{post_title_trim}</a> {rating_img} ({rate_average} out of {max_rates})';
				break;
			case "total_raters":
				default_template_widget = '<a href="{post_url}"  title="{post_title}">{post_title_trim}</a> {rating_img} ({total_raters} ratings)';
			break;
			case "total_scores":
				default_template_widget = '<a href="{post_url}"  title="{post_title}">{post_title_trim}</a> {rating_img} ({total_scores} scores)';
			break;
			case "normal":
				default_template_widget = '<a href="{post_url}" title="{post_title}">{post_title_trim}</a> {rating_img}';
			break;
		}
		document.getElementById('template_widget_' + template).value = default_template_widget;
}
function reset_all_default_ratings_widget_templates() {
	var default_template_widget_value;
	var choose_widget_template = ["rate_average","total_raters","total_scores","normal"];
	for (var i = 0; i < choose_widget_template.length;  i++ ) {
		switch(choose_widget_template[i]) {
			case "rate_average":
				default_template_widget_value = '<a href="{post_url}" title="{post_title}">{post_title_trim}</a> {rating_img} ({rate_average} out of {max_rates})';
				break;
			case "total_raters":
				default_template_widget_value = '<a href="{post_url}"  title="{post_title}">{post_title_trim}</a> {rating_img} ({total_raters} ratings)';
				break;
			case "total_scores":
				default_template_widget_value = '<a href="{post_url}"  title="{post_title}">{post_title_trim}</a> {rating_img} ({total_scores} scores)';
				break;
			case "normal":
				default_template_widget_value = '<a href="{post_url}" title="{post_title}">{post_title_trim}</a> {rating_img}';
				break;
		}
		document.getElementById('template_widget_'+ choose_widget_template[i]).value = default_template_widget_value;
	}
}
