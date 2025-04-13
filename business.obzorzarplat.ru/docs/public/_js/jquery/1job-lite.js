$(document).ready(function(){
    $("#jtype_select").change(function(){
        $("#jobdiv").empty().html("<img src=/_img/loader.gif> Загрузка...");
        $.ajax({
            url: "/work/1job-lite/findJobs/",
            data: {jtype_id:this.value},
            dataType: "html",
            success:function(data){
            $("#jobdiv").html(data)},
            error: function(){alert("error")}
        });
    });

    $("#ozp_job_description").live('click',function()
    {
        $("#job_description").slideToggle("slow");
        return false;
    });
/*
    $('#job').live('change',function(){
        $("#citydiv").empty().html("<img src=/_img/loader.gif> Загрузка...");
                    $.ajax({
                            url: "/work/1job-lite/findCities/",
                            data: {job_id:this.value},
                            dataType: "html",
                            success:function(data){
                                $("#citydiv").html(data)},
                            error: function(){alert("error")}
                            });

                      $("#job_description_div").empty().html("<img src=/_img/loader.gif> Загрузка...");
                      $.ajax({
                          url: "/work/1job-lite/findJobDescription/",
                            data: {job_id:this.value},
                            dataType: "html",
                            success:function(data){
                                $("#job_description_div").html(data)},
                            error: function(){alert("error job description")}
                      })
    });
    */

})

function testform(){
text="";
if(document.step1.job.value==""){text=text+'Должность;\n';}
if(document.step1.city.value==""){text=text+'Город;\n';}
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
    document.step1.submit();
}}