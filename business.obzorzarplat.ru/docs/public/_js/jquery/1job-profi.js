    $(document).ready(function(){
$("#jtype_select").change(function(){
        $("#jobdiv").empty().html("<img src=/_img/loader.gif> ��������...");
        $.ajax({
            url: "/work/1job-lite/findJobs/",
            data: {jtype_id:this.value},
            dataType: "html",
            success:function(data){
            $("#jobdiv").html(data)},
            error: function(){alert("error")}
        });
    });

    $("#first-form select").live('change',function(){
        $("#companies-characteristics").html("<p>��� ������ �������� ���������� �������� ���������� ������� ������� ��������� ��� ������� � ������ �� ������ <b>������� ������� &raquo;</b></p>");
    });

      $('#select_companies_characteristics').click(function(){
        $('#companies-characteristics').empty().html('<img src="/_img/loader.gif"> ��������...');
        $.ajax({
                url:"/work/1job-profi/findCompaniesCharacteristics/",
                type:"post",
                datatype:"html",
                data:{city_id:$("#city").val(),
                      job_id:$("#job").val()
                },
                success:function(data){
                    $('#companies-characteristics').html(data);
                },
                error:function(){
                    alert('error =( ');
                    return false;
                }
            })
      });

    $("#ozp_job_description").live('click',function()
    {
        $("#job_description").slideToggle("slow");
        return false;
    });

    $("#second-form #sphere").live('change',function(){
        $("#staffdiv").empty().html("<img src=/_img/loader.gif> ��������...");
        $.ajax({
            url: "/work/1job-profi/findStaff/",
            type:"post",
            data: {city_id:$("#city").val(),
                      job_id:$("#job").val(),
                      sphere_id:$("#sphere").val()
                },
            dataType: "html",
            success:function(data){
            $("#staffdiv").html(data)},
            error: function(){alert("error")}
        });
    });

    $("#second-form #staff").live('change',function(){
        $("#turnoverdiv").empty().html("<img src=/_img/loader.gif> ��������...");
        $.ajax({
            url: "/work/1job-profi/findTurnover/",
            type:"post",
            data: {city_id:$("#city").val(),
                      job_id:$("#job").val(),
                      sphere_id:$("#sphere").val(),
                      staff_id:$("#staff").val()
                },
            dataType: "html",
            success:function(data){
            $("#turnoverdiv").html(data)},
            error: function(){alert("error")}
        });
    });

    $('p a.link-h3:not(:first)').parent('p').next('div').hide();
    $('p a.link-h3').click(function(){
        $(this).parent('p').next('div').slideToggle(400);
        return false;
    });
    $('p a.close-block').click(function(){
        $(this).parent().parent('div').slideUp(400);
        return false;
    });
});

function testform(){
text="";
if(document.step1.job.value==""){text=text+'���������;\n';}
if(document.step1.city.value==""){text=text+'�����;\n';}
if(text!=""){window.alert('�� �� �������:\n'+text);return false;}
else{
    document.step1.submit();
}}