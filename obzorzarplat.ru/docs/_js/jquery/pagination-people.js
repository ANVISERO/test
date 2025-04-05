/*
$(document).ready(function(){

	var peoples_table = $('#peoples').dataTable();
    var linkId=2;
    
	$('#more_people').live('click',function(){
         $.ajax({
            type:'get',
            url:'/_admin/pages/peoples-perpage-show.php',
            data:{'p':linkId},
            dataType:'json',
            success:function(data){
                    peoples_table.fnAddData(data.aaData);
            },
            error:function(){
                alert('Oooops!');
            }
        });
        linkId++;

        return false;
    });
}) */

$(document).ready(function() {
    $('#peoples').dataTable( {
		"oLanguage": {
            "sUrl": "/_js/ru_RU.txt"
        },
		"bFilter": false,
        "bSort": false,
		"sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
		"iDisplayLength": 25,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/_admin/pages/peoples-perpage-show.php"
    } );
} );