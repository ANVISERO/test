$(document).ready(function() {

	$("#demoTable").bindTableToForm($("#rowEditForm"),"personId");
	
	$("a.edit").click(function() {

		$("#addBtn").hide();
		$("#updateBtn").show();
		
		$(this).populateForm();
		
		var row = $(this).parent().parent();
		row.find('td').css('background-color','#faa');
		$('#editableRow').insertAfter(row).fadeIn('slow');
		
		// ������ �������� �� ���������
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
					alert('������ ���������� ������');
				
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
		
		// ������� �����
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
					alert('������ ���������� ������');
				else
					$("#rowEditForm").addRow(response);
				
				$('#editableRow').fadeOut('slow');
			}
		});
	});
	
	//Whenever a hyperlink with the deleteRecord class is clicked, the current row will be deleted.
	$("a.delete").click(function() {
		// ID ������
                
                if(confirm(" ?")){
		var id = $(this).parent().parent().attr('id');
		
		var that = $(this);
                /*
		$.post('/work/archive/delete/',
			{reportId : id},
			function(data){
				if (data == 1)
					that.deleteRow();
				else
					alert('    =(');
			});
                        */
                 $.ajax({
                            url: "/archive/delete/",
                            data: {reportId:id},
                            dataType: "html",
                            success:function(){
                                that.deleteRow();},
                            error: function(){alert("    =(")}
                            });
                }
		return false;
	});
	
	$("#cancelBtn").click(function(){
		$("#editableRow").fadeOut("slow");
		$(".tablesCorp td").css('background-color','#F5F5F5');
	});
	
});
