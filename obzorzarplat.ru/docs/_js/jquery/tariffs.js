$(document).ready(function()
{
    $('#job_types').click(function(){
    $.ajax({
    url: "/_admin/moduls/preds/tariff_calculator/tariffCalculatorFormTypes.php",
    success: function(data){$('#jobs_view_div').html(data)},
    error: function(){alert("error")},
    dataType: "html"
    });
})

$('#job_alphabet').click(function(){
    $('#jobs_view_div').load('/_admin/moduls/preds/tariff_calculator/tariffCalculatorFormAlphabet.php');
})


    $(".body").hide();
    
         $("#business_info li.list ul").hide();
    //toggle message body
    
     $("#business_info li.list").click(function()
    {
        $(this).children("ul").slideToggle(500)
        return false;
    });
    
    //toggle message body
    $(".info").click(function()
    {
        $(this).next(".body").slideToggle(500)
        return false;
    });
    
    // Список всех должностей
	$('#jobs_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#jobs_link').click(function(){
		$('#jobs_info').dialog('open');
		return false;
	});

      // Список всех городов
	$('#cities_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#cities_link').click(function(){
		$('#cities_info').dialog('open');
		return false;
	});

        // Список сфер деятельности
	$('#spheres_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#spheres_link').click(function(){
		$('#spheres_info').dialog('open');
		return false;
	});

        // интервалы оборотов компаний
	$('#turnover_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#turnover_link').click(function(){
		$('#turnover_info').dialog('open');
		return false;
	});

        // интервалы штатов компаний
	$('#personal_info').dialog({
		autoOpen: false,
                modal:true,
		width: 600,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});

	$('#personal_link').click(function(){
		$('#personal_info').dialog('open');
		return false;
	});

});