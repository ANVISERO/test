   /*for report_navigation*/
   $(document).ready(function(){
	$(".report_navigation span").hover(function() {
		$(this).next("em").animate({opacity: "show", top: "-90"}, "slow");
	}, function() {
		$(this).next("em").animate({opacity: "hide", top: "-90"}, "fast");
	});

});


