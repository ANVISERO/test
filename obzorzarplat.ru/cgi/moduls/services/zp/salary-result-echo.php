<!--<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />-->
	<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/development-bundle/ui/ui.core.js"></script>

	<script type="text/javascript">
	$(function() {
        $('#salary_accordion div:not(:first)').hide();

        $('#salary_accordion p a.h3-click').click(function(){
            $(this).parent('p').next('div').slideToggle(400).siblings('div:visible').slideUp(400);
            return false;
        });

        //$('#salary_accordion #id1 *').tooltip();
$("#id1 a[title]").tooltip({ position: 'top center'});

	});
	</script>



<div id="salary_result_view">
        <h2>���������� ����� <?php echo($jobs.' '.$region);?></h2>
        <div id="salary_accordion">
            <p><a class="h3-click" href="">���������� �����</a></p>
    <div>
        <p>�������������� ����� � ���������� ����� ����� �������� <a href="/servis/otchet/">����� &raquo;</a></p>
        <p><b>���������� �����</b> �������� � ���� �����, ��������, �������, ������ � ������.</p>
        <p align="center"><img src="http://chart.apis.google.com/chart?chxt=x,y,y
&chof=gif
&cht=bvs
&chbh=40,30
&chco=800080|6B8E23|00A5C6
&chd=t:25,50,25
&chxl=0:|<?php echo(number_format($proc_25_salary_bonus,0,'.',' ')) ?>%20%D1%80.|
<?php echo(number_format($salary_bonus_sre,0,'.',' ')); ?>%20%D1%80.|
<?php echo(number_format($proc_75_salary_bonus,0,'.',' '));  ?>%20%D1%80.|
2:|%D0%9A%D0%BE%D0%BB%D0%B8%D1%87%D0%B5%D1%81%D1%82%D0%B2%D0%BE%20%D1%81%D0%BE%D1%82%D1%80%D1%83%D0%B4%D0%BD%D0%B8%D0%BA%D0%BE%D0%B2,%20%
&chxp=2,50
&chs=600x150
&chts=000000,11.5
&chxs=0,000000
&chdl=25%20%D0%BF%D1%80%D0%BE%D1%86%D0%B5%D0%BD%D1%82%D0%B8%D0%BB%D1%8C|
%D1%81%D1%80%D0%B5%D0%B4%D0%BD%D0%B5%D0%B5+%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B5|
75%20%D0%BF%D1%80%D0%BE%D1%86%D0%B5%D0%BD%D1%82%D0%B8%D0%BB%D1%8C" alt="���������� �����" width="600" height="150" /></p>
<p align="center">������� 1. ���������� ����� <?php echo $jobs; ?>, ���./���.</p>
<p id="id1">�� �������� ������������:
    <a href="/isl/glossary/?str=0-9" target="_blank" title="��������, ���� �������� ����������� 25% ����������� ����������">25 ����������</a>,
    <a href="/isl/glossary/?str=%D1" target="_blank" title="<ol>
            <li>
                ��������� ����� ���������� ����� � ��������������� ����������� � �����
                �� ����������� � ���������� ����������. ������������ ��� �������������
                � ������������ ���������� �����������. ����� ����������� ��� ��������������
                ��� ������������� � ����������� �� ������� ��������������.
            </li>
            <li>
                ��������� ���������� ����������� ��������� ���������� �����
                (� ������� ���������� ��� �������, ��������������� �������� ������ �����,
                ����������� � ����������� ���������� �� ���������� ���� ������)
                � ���������� ������������� �� ������� �� 12 �������, ��������������� ������� �������.
                ������������ ������� 139 ��������� ������� ��.
                </li></ol>">������� ��������</a>,
    <a href="/isl/glossary/?str=0-9" target="_blank" title="��������, ���� �������� ����������� 25% ����������� ����������.">75 ����������</a>.
</p>

<?php
$month=(date('m')-1);
if($month == "1" ){$month_ru="������";}
elseif($month == "2" ){$month_ru="�������";}
elseif($month == "3" ){$month_ru="����";}
elseif($month == "4" ){$month_ru="������";}
elseif($month == "5" ){$month_ru="���";}
elseif($month == "6" ){$month_ru="����";}
elseif($month == "7" ){$month_ru="����";}
elseif($month == "8" ){$month_ru="������";}
elseif($month == "9" ){$month_ru="��������";}
elseif($month == "10"){$month_ru="�������";}
elseif($month == "11"){$month_ru="������";}
elseif($month == "12"){$month_ru="�������";}
?>
<p>��� ������ ������������ � ���������� ������ � ���������� ����� ����������
    ����� ��������������� (�� ����).</p>
<p>* ��������� ���������� ������: <i><?php echo($month_ru.' '.date('Y')); ?>�.</i></p>

</div>
            <p><a class="h3-click" href="">����������� ���������� <?php echo($jobs);?></a></p>
    <div>
<table width="100%" title="����������� ���������� '.$jobs.'">
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em>������ �������� ���������:</em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_other_name);?></td>
  </tr>
  <tr>
    <td><em>�����������:</em></td>
    <td><?php echo($jobs_conform);?></td>
  </tr>
  <tr>
    <td><em>����������:</em></td>
    <td><?php echo($jobs_subordinate);?></td>
  </tr>
  <tr>
    <td><em>����:</em></td>
    <td><?php echo($jobs_purpose);?></td>
  </tr>
  <tr>
    <td><em>������:</em></td>
    <td><?php echo($jobs_mission);?></td>
  </tr>
  <tr>
    <td><em>�������:</em></td>
    <td><?php echo($jobs_func);?></td>
  </tr>
  <tr>
    <td><em>���������� � ����� � ������������:</em></td>
    <td><?php echo($jobs_experience);?></td>
  </tr>
</table>
    </div>
</div><!--end salary_accordion-->
</div><!--end salary_result_view-->