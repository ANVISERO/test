$(function(){
    $('.hide').hide();

$('.text').example(function(){
    return $(this).attr('title');
}, {className: 'example'});

    // Страховая часть
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

     // Пенсионный капитал
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

      // Накопительная часть
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

      // инвестиционный доход от накопительной части пенсии
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

      // программа государственного софинансирования пенсии
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