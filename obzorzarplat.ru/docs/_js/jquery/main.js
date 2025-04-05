$(document).ready(
function(){

    //fading pics in tariffs
    
   /* $("#tariffs a img, #service a img").fadeIn(200); // This sets the opacity of the thumbs to fade down to 60% when the page loads*/
/*
	$("#tariffs a img, #service a img").hover(function(){
		$(this).css({ 'opacity' : 0.5}); // This should set the opacity to 100% on hover
                $(this).css({'opacity' : spotlight.opacity}) ;
	});
*/
$(".btn-slide").click(function(){
		$("#site_map").slideToggle("slow");
		$(this).toggleClass("active");
                return false;
});

    $('#error').dialog({
		autoOpen: false,
                modal:true,
		width: 640,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});
/*
$('#job').change(function(){
		$('#error').dialog('open');
		return false;
                });
*/
     function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

$('#mycarousel').jcarousel({
        visible: 4,
        wrap: 'last'
    });

$('.anythingSlider').anythingSlider({
            easing: "easeInOutExpo",        // Anything other than "linear" or "swing" requires the easing plugin
            autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
            delay: 5000,                    // How long between slide transitions in AutoPlay mode
            startStopped: false,            // If autoPlay is on, this can force it to start stopped
            animationTime: 600,             // How long the slide transition takes
            hashTags: false,                 // Should links change the hashtag in the URL?
            buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
            pauseOnHover: true//,             // If true, and autoPlay is enabled, the show will pause on hover
            });

          $("#slide-jump").click(function(){
              $('.anythingSlider').anythingSlider(6);
          });

$('#news1').innerfade({
				animationtype: 'slide',
				speed: 'low',
				timeout: 3000,
				containerheight: '2em',
                                runningclass:'all_news1'
});

})