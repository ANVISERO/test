$(document).ready(function(){
    
        $('#people-upd').ajaxForm({
            type: 'post',
            url: '/_admin/pages/peoples-save/',
            success:function(){
                alert("������ ���������")},
            error:function(){alert("��������� ������ ��� ���������� ������ =(")}
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