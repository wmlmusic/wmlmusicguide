$(document).ready(function () {
	$("#myTable").tablesorter();
	$("ul#nav-horizontal>li").on("click", "a", function (event) {
        debugger;
        event.preventDefault();
        $(".btnarea .active").removeClass("active");
        $(this).addClass("active");
    });
});