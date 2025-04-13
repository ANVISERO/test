    $(document).ready(function(){
      $('input[name="factor"]').click(function(){
          $('#block').empty().html('<img src="/_img/loader.gif"> Загрузка...');
          $.ajax({
              url:"/work/summary/selectFactor/",
              data:{factor_id:this.id},
              dataType:"html",
              success:function(data){
                  $('#block').html(data);
              },
              error:function(){
                  alert("error occured");
                  return false;
              }
          });
          $('#jobs_div').html("<p>Для получения списка должностей необходимо выбрать фактор для анализа и нажать на кнопку <b>Выбрать должности &raquo;</b></p>");
      });

      $('#select_jobs').click(function(){
        $('#jobs_div').empty().html('<img src="/_img/loader.gif"> Загрузка...');
        $.ajax({
                url:"/work/summary/findJobs/",
                type:"post",
                datatype:"html",
                data:{city_id:$("#city_id").val(),
                      factor:$(".selectFactor").attr("id"),
                      factor_id:$(".selectFactor").val(),
                      lists:$("#lists").attr('checked')},
                success:function(data){
                    $('#jobs_div').html(data);
                },
                error:function(){
                    alert('error =( ');
                    return false;
                }
            })
      });


      $("select").live('change',function(){
        $("#jobs_div").html("<p>Для получения списка должностей необходимо выбрать фактор для анализа и нажать на кнопку <b>Выбрать должности &raquo;</b></p>");
      });

      $("#jtypes a").live('click',function(){
            var that=this;
            $(this).parent('p').next('div').html('<img src="/_img/loader.gif"> Загрузка...');
            $.ajax({
                url:"/work/summary/findJobsInGroups/",
                type:"post",
                datatype:"html",
                data:{jtype_id:$(that).parent().parent().attr("id"),
                      city_id:$("#city_id").val(),
                      factor:$(".selectFactor").attr("id"),
                      factor_id:$(".selectFactor").val()},
                success:function(data){
                    //alert(data);
                    $(that).parent().parent().html(data);
                },
                error:function(){
                    alert('error =( ');
                    return false;
                }
            })
        });

        $('.checkAllAuto').live('click',function()
        {
            $(this).parent('p').next(".shift_right").find(" input[type='checkbox']").attr('checked',$(this).attr('checked'));

        });

        $("#summary-result td div:not('.link1')").hide();
            $("#summary-result tr:even").addClass("even");

            $("#summary-result ul#links li a").click(function(){
               class_show=$(this).attr('class');
               $("#summary-result td div."+class_show).animate({opacity: "show", top: "-85"}, "slow");
               $("#summary-result td div:not(."+class_show+")").hide();
            $("#summary-result ul#links li a").removeClass("active");
            $(this).toggleClass("active");

               return false;
            });

});