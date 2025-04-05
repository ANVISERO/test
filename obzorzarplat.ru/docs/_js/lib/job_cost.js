$(document).ready(function() {

       $("#demoTable").bindTableToForm($("#rowEditForm"),"jobId");

       $("a.edit").click(function() {

       $("#addBtn").hide();
       $("#updateBtn").show();

       $(this).populateForm();

       var row = $(this).parent().parent();
       row.find('td').css('background-color','#faa','color','#fff');
       $('#editableRow').insertAfter(row).fadeIn('slow');

       // отмена действия по умолчанию
       return false;
});

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

                       var rowId = $("input[name='jobId']").val();
                       var row = $('tr#'+rowId).find('td').css('background-color','#F5F5F5');
                       $('#editableRow').fadeOut('slow');
               }
       });
});

$("#cancelBtn").click(function(){
       $("#editableRow").fadeOut("slow");
       $(".tablesCorp td").css('background-color','#F5F5F5');
});

});
