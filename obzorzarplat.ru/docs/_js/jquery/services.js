$(document).ready(function(){
     $("#jobs-description div:not('.tabs-1')").hide();
            $("#jobs-description ul#links li a").click(function(){
                class_show=$(this).attr('class');
               $("#jobs-description div."+class_show).animate({opacity: "show", top: "-85"}, "slow");
               $("#jobs-description div:not(."+class_show+")").hide();
            $("#jobs-description ul#links li a").removeClass("active");
            $(this).toggleClass("active");

               return false;
            });

            // ������
                $('.hide').hide();

$('.text').example(function(){
    return $(this).attr('title');
}, {className: 'example'});

    // ��������� �����
	$('#strah_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

        	$('#strah_link').click(function(){
		$('#strah_info').dialog('open');
		return false;
	});

     // ���������� �������
	$('#pk_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

        	$('#pk_link').click(function(){
		$('#pk_info').dialog('open');
		return false;
	});

      // ������������� �����
	$('#nakop_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

        	$('#nakop_link').click(function(){
		$('#nakop_info').dialog('open');
		return false;
	});

      // �������������� ����� �� ������������� ����� ������
	$('#percent_capital_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

        	$('#percent_capital_link').click(function(){
		$('#percent_capital_info').dialog('open');
		return false;
	});

      // ��������� ���������������� ���������������� ������
	$('#gos_finance_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

        	$('#gos_finance_link').click(function(){
		$('#gos_finance_info').dialog('open');
		return false;
	});
     })