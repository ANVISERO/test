$(document).ready(function(){
var companies_table=$('#companies').dataTable();
    var linkId=2;
    $('#more').live('click',function(){
         $.ajax({
            type:'get',
            url:'/_admin/pages/companies-perpage-show.php',
            data:{'p':linkId},
            dataType:'json',
            success:function(data){
                    companies_table.fnAddData(data.aaData);
            },
            error:function(){
                alert('Oooops!');
            }
        });
        linkId++;

        return false;
    });

})