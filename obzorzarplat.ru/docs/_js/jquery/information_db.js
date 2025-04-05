$(document).ready(function()
{
    $('#jobs_list').click(function(){
        $(this).next('div').empty().html('<img src="/_img/loader.gif"> Загрузка...');
        $(this).parent('div').load('/preds/_vars/findJobs/');
            return false;
      });

    $("#jtypes a.open").live('click',function(){
            var that=this;
            $(this).parent('p').next('div').html('<img src="/_img/loader.gif"> Загрузка...');
            $.ajax({
                url:"/preds/_vars/findJobsInGroups/",
                type:"post",
                datatype:"html",
                data:{jtype_id:$(that).parent().parent().attr("id")},
                success:function(data){
                    //alert(data);
                    $(that).parent().parent().html(data);
                },
                error:function(){
                    alert('error =( '+$(that).parent().parent().attr("id"));
                    return false;
                }
            });
            return false;
        });

    $('#cities_list').click(function(){
        $(this).next('div').empty().html('<img src="/_img/loader.gif"> Загрузка...');
        $(this).parent('div').load('/preds/_vars/findCities/');
            return false;
      });

    $('#spheres_list').click(function(){
        $(this).next('div').empty().html('<img src="/_img/loader.gif"> Загрузка...');
        $(this).parent('div').load('/preds/_vars/findSpheres/');
            return false;
      });

    $('#turnover_list').click(function(){
        $(this).next('div').empty().html('<img src="/_img/loader.gif"> Загрузка...');
        $(this).parent('div').load('/preds/_vars/findTurnover/');
            return false;
      });

    $('#personal_list').click(function(){
        $(this).next('div').empty().html('<img src="/_img/loader.gif"> Загрузка...');
        $(this).parent('div').load('/preds/_vars/findPersonal/');
            return false;
      });

    $('a.close').live('click',function(){
        $(this).next('div').slideToggle(400);
        return false;
    });
});