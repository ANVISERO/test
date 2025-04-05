$(document).ready(function(){
    $('#jtype').change(function(){
        $('#jobdiv').empty().html('<img src="/_img/loader.gif" width="16" height="16" align="absmiddle" alt="��������">');
        $.ajax({
            method:'get',
            dataType: 'html',
            url: '/services/zp/findJob/',
            data:{jtype:$(this).val()},
            success:function(data){
                $('#jobdiv').html(data);
            },
            error:function(){
                alert('oops!');
            }
        });
    });

    $('#job').live('change',function(){
        var job_descript_val=$('#job_descript').text();
        $('#job_descript').val("").html('<a href="/servis/job_description/view/?id='+$(this).val()+'&lang=0" target="jobDescript" onClick="window.open(this.href, this.target, config=\'height=400,width=800,toolbar=0, scrollbars=1\')">'+job_descript_val+'</a>');

        $('#citydiv').empty().html('<img src="/_img/loader.gif" width="16" height="16" align="absmiddle" alt="��������">');
        $.ajax({
            method:'get',
            dataType: 'html',
            url: '/services/zp/findCity/',
            data:{job:$(this).val()},
            success:function(data){
                $('#citydiv').html(data);
            },
            error:function(){
                alert('oops!');
            }
        });

    });

    // ������� ������
    var options_social = {
        target: "#zpResult",
        url: "/services/zp/result/",
        success: function() {
            //alert("OK");
            $('#zpResult').dialog('open');
        },
        error:function(){
            alert('oops!');
        }
    };

    // �������� ����� �  ajaxSubmit
    $("#zp").ajaxForm(options_social);

    $('#zpResult').dialog({
        autoOpen: false,
        modal:true,
        width: 700,
        buttons: {
            "Закрыть": function() {
                $(this).dialog("close");
            }
        }
    });

    // ������� ������
    var options_social_yandex = {
        target: "#zpResult",
        url: "/services/zp/result/yandex.php",
        success: function() {
            //alert("OK");
            $('#zpResult').dialog('open');
        },
        error:function(){
            alert('oops!');
        }
    };

    // �������� ����� �  ajaxSubmit
    $("#zp-yandex").ajaxForm(options_social_yandex);

    $('#zpResult').dialog({
        autoOpen: false,
        modal:true,
        width: 700,
        buttons: {
            "Закрыть": function() {
                $(this).dialog("close");
            }
        }
    });

});