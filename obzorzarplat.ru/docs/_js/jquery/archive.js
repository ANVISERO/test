$(document).ready(function() {

	$("#demoTable").bindTableToForm($("#rowEditForm"),"personId");
	
	$("a.edit").click(function() {

		$("#addBtn").hide();
		$("#updateBtn").show();
		
		$(this).populateForm();
		
		var row = $(this).parent().parent();
		row.find('td').css('background-color','#faa');
		$('#editableRow').insertAfter(row).fadeIn('slow');
		
		// отмена действия по умолчанию
		return false;
	});
	
	//Rewrite the form data back to the row's metadata using the plugin's updateRow function
	$("#updateBtn").click(function() {
		$('#rowEditForm').ajaxForm({
			beforeSubmit : function(){
				$('#loading').show();
			},
			success : function(response){
				$('#loading').hide();
				if (response == 1)
					$("#rowEditForm").updateRow();
				else
					alert('Ошибка сохранения данных');
				
				var rowId = $("input[name='personId']").val();
				var row = $('tr#'+rowId).find('td').css('background-color','#F5F5F5');
				$('#editableRow').fadeOut('slow');
			}
		});
	});
	
	//Create a new row/record using the plugin's addRow function
	$("a.add").click(function() {

		$("#addBtn").show();
		$("#updateBtn").hide();
		
		// очищаем форму
		$("#rowEditForm").clearForm();
		$("input[name='personId']").val(0);
		
		$('#demoTable tbody').append($('#editableRow'));
		$('#editableRow').fadeIn('slow');
		
		return false;
	});
	
	
	/* Whenever a hyperlink with the addRecord class is clicked, clear the current form values to
	 * prepare for a new record. */
	$("#addBtn").click(function() {
		$('#rowEditForm').ajaxForm({
			beforeSubmit : function(){
				$('#loading').show();
			},
			success : function(response){
				$('#loading').hide();
				if (response == 0)
					alert('Ошибка добавления данных');
				else
					$("#rowEditForm").addRow(response);
				
				$('#editableRow').fadeOut('slow');
			}
		});
	});
	
	//Whenever a hyperlink with the deleteRecord class is clicked, the current row will be deleted.
	$("a.delete").click(function() {
		// ID записи
                
                if(confirm("�� �������?")){
		var id = $(this).parent().parent().attr('id');
		
		var that = $(this);
		$.post('/_admin/moduls/tables/delete_archive.php',
			{reportId : id},
			function(data){
				if (data == 1)
					that.deleteRow();
				else
					alert('�������� ��������� ��� �������� =(');
			});
                }
		return false;
	});
	
	$("#cancelBtn").click(function(){
		$("#editableRow").fadeOut("slow");
		$(".tablesCorp td").css('background-color','#F5F5F5');
	});
	
});
