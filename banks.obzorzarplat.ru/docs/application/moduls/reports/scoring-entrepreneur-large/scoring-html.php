<?php
/*
$page='
<h1>����� � ������'.$job_name_partitive.' '.$region_name_partitive.'</h1>
*/
$page='
<h1>����� � ������ '.$region_name_partitive.'</h1>

<table class="standart">
    <tr>
        <th class="th_left" width="30%">���� ������</th>
        <td width="70%">"'.date('d').'" '.months(date('m')).' '.date('Y').'�., '.date('H:i').'</td>
    </tr>
    <tr>
        <th class="th_left">����������� ������</th>
        <td>'.$jtype_name.'</td>
    </tr>
    <tr>
        <th class="th_left">��� ������:</th>
        <td>'.$job_name.'</td>
    </tr>
    <tr>
        <th class="th_left">�����:</th>
        <td>'.$region_name.'</td>
    </tr>
</table>

<h2>���������� ������������ �������</h2>
'.$scoring_results;

//$page1=$page.'<p>������� ���������� ���� ����������: '.number_format($proc_10_salary,0,',',' ').'�. - '.number_format($proc_90_salary,0,',',' ').'�.</p>';
$page1='<p>������� ������ ����������: '.number_format($proc_10_salary,0,',',' ').'�. - '.number_format($proc_90_salary,0,',',' ').'�.</p>';

$page2='
<hr/>
<p>����� ���������� ������������: <b>'.$user_name.'</b></p>
<p>� ��������� '.stripslashes($company_name).'</p>
';
$page1.=$page2;
$page.=$page1;

//������ � ����
$fullpath=$filedir.$filename_html;
$file = fopen ("$fullpath","w+");
fputs ( $file, $page1);
fclose ($file);

?>