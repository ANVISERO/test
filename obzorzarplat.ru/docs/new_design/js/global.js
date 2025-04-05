$(document).ready(function() {

	$('.top').css('height',$(window).height());

	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 30,
		nav: true,
		navText: ['',''],
		dotsEach: true,
		autoplay: true,
		autoplaySpeed: 900,
		autoplayTimeout: 20000,
		slideBy: 3,
		responsive:{
       		0:{
            	items:1
        	},
        	700:{
            	items:2
        	},
        	993:{
            	items:3
        	}
    	}
	});

	if($(document).width() >= 1200) {

		$(document).click(function(event) {
			if($(event.target).closest(".open-submenu").length) {
				return;
			}
			if($(event.target).closest(".toggle_container").length) {
				return;
			}
			$('.submenu').hide();
			$('.toggle_container').hide();
		});

		$('.open-submenu').click(function(e) {
			if($(this).children('.submenu').is(':visible')) {
				$('.submenu').hide();
				return;
			}else{
				e.preventDefault();
			}

			$('.submenu').hide();
			$(this).children('.submenu').slideToggle(100);

		});

	}else{

		$('.mobile-menu').click(function() {
			$('.top-nav').slideToggle(100);
		});

		$('.close-mobile-menu').click(function() {
			$('.top-nav').hide();
		})

	}

	$('.scroll').click(function (e) {
		e.preventDefault();
		var scroll_el = $('.news');
        if($(scroll_el).length != 0) {
	    	$('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500);
        }
	});

	$('#place').keydown(function() {
		$('#jobs_container').hide();
		if($(this).val() != '') {
			$.ajax({
				url: '/new_design/findJobs.php',
				data: 'str='+$(this).val(),
				success: function(data) {
					if(data != '') {
						$('#jobs_container').html(data);
						$('#jobs_container').show();
					}
				}
			});
		}
	});

	$('#city').keydown(function() {
		$('#cities_container').hide();
		if($(this).val() != '') {
			$.ajax({
				url: '/new_design/findCities.php',
				data: 'str='+$(this).val(),
				success: function(data) {
					if(data != '') {
						$('#cities_container').html(data);
						$('#cities_container').show();
					}
				}
			});
		}
	});

	$('.bot-button').click(function () {
		$('html, body').animate({ scrollTop: 0 }, 500);
	});

	$('.dncye').hover(
		function() {
			$(this).attr('src', '/new_design/img/dncye_red.png');
		},
		function() {
			$(this).attr('src', '/new_design/img/dncye.png');
		}
	);

	$('.sbmt-button-grp span').click(function() {
		$('#zp').submit();
	});

    var options_social = {
        target: "#zpResult",
        url: "/services/zp/result/",
        success: function() {
            //alert("OK");
            $('#zpResult').dialog('open');
        },
        error:function(){
            alert('oops!');
        }
    };

    $("#zp").ajaxForm(options_social);

    $('#zpResult').dialog({
        autoOpen: false,
        modal:true,
        width: 700,
        buttons: {
            "Закрыть": function() {
                $(this).dialog("close");
            }
        }
    });

    var options_social_yandex = {
        target: "#zpResult",
        url: "/services/zp/result/yandex.php",
        success: function() {
            //alert("OK");
            $('#zpResult').dialog('open');
        },
        error:function(){
            alert('oops!');
        }
    };

    $("#zp-yandex").ajaxForm(options_social_yandex);

    $('#zpResult').dialog({
        autoOpen: false,
        modal:true,
        width: 700,
        buttons: {
            "Закрыть": function() {
                $(this).dialog("close");
            }
        }
    });

});