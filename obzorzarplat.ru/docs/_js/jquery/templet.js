$(document).ready(function(){
	$(".btn-slide").click(function(){
		$("#site_map").slideToggle("slow");
		$(this).toggleClass("active");
                return false;
	});

        $("#leftcol #navigation-left li.p1").click(function(){
            $(this).next('div').slideToggle(400);
            return false;
        });

        $("#mainBody div.body:not(:first)").hide();
        $("#mainBody a.h3-click").click(function(){
            $(this).next('div.body').slideToggle(400);
            return false;
        })
        $("#mainBody a.div_body_close").click(function(){
            $(this).parent("div.body").slideToggle(400);
            return false;
        })
});