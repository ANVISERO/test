$(function(){
    $('.hide').hide();

// Зарплата
$('.text').example(function(){
    return $(this).attr('title');
}, {className: 'example'});

$('.text_tbl').example(function(){
    return $(this).attr('title');
}, {className: 'example'});


    // Обучение
	$('#education_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#education_link').click(function(){
		$('#education_info').dialog('open');
		return false;
	});

// Обучение детей
	$('#education_baby_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#education_baby_link').click(function(){
		$('#education_baby_info').dialog('open');
		return false;
	});

 // Лечение
	$('#treatment_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#treatment_link').click(function(){
		$('#treatment_info').dialog('open');
		return false;
	});

 // Дорогостоящее лечение
	$('#treatment_dear_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#treatment_dear_link').click(function(){
		$('#treatment_dear_info').dialog('open');
		return false;
	});

 // Благотворительность
	$('#welfair_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#welfair_link').click(function(){
		$('#welfair_info').dialog('open');
		return false;
	});

 // Пенсионные взносы
	$('#pension_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#pension_link').click(function(){
		$('#pension_info').dialog('open');
		return false;
	});

 // Страховые взносы
	$('#insurance_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#insurance_link').click(function(){
		$('#insurance_info').dialog('open');
		return false;
	});

//Имущественные вычеты
// Приобретение имущества
	$('#house_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#house_link').click(function(){
		$('#house_info').dialog('open');
		return false;
	});

// Продажа имущества
	$('#house_sale_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#house_sale_link').click(function(){
		$('#house_sale_info').dialog('open');
		return false;
	});

// Вычеты - итог
        $('#ndfl_info').dialog({
		autoOpen: false,
                modal:true,
		width: 650,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

 })