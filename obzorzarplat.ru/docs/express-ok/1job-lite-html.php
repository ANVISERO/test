<?php
$page='';
$page.='
<link href="/express_ok/1job_lite_print.css" rel="stylesheet" type="text/css">
<div class="lite_single">

<h1>������������� ����� ���������� ����� '.$name_partitive.' '.$region_name_partitive.'</h1>

<table class="data">
<tr>
<td width="50%" class="title">��������� ������� ��� ������������ ������:</th>
<td class="title_none"></td>
</tr>
<tr>
<th>����������� ������</th>
<td>'.$jtype_name.'</td>
</tr>
<tr>
<th>���������</th>
<td>'.$name.'</td>
</tr>
<tr>
<th>�����</th>
<td>'.$region_name.'</td>
</tr>
</table>

<h3>1.	����������� �����, ���������� ����� '.$name_partitive.'</h3>
<p align="right"><em>������� 1.</em></p>
<table>
<tr>
  <th></th>
  <th>10%</th>
  <th>25%</th>
  <th>50% (�������)</th>
  <th>75%</th>
  <th>90%</th>
  <th>�������</th>
</tr>
<tr>
  <td class="X1_left">����������� �����</td>
  <td>'.number_format($proc_10_salary,0,',',' ').'</td>
  <td>'.number_format($proc_25_salary,0,',',' ').'</td>
  <td>'.number_format($proc_50_salary,0,',',' ').'</td>
  <td>'.number_format($proc_75_salary,0,',',' ').'</td>
  <td>'.number_format($proc_90_salary,0,',',' ').'</td>
  <td>'.number_format($official_salary_sre,0,',',' ').'</td>
</tr>
<tr>
  <td class="X1_left">���������� �����</td>
  <td>'.number_format($proc_10_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($proc_25_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($proc_50_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($proc_75_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($proc_90_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($salary_bonus_sre,0,',',' ').'</td>
</tr>
</table>
<p>��� ������ ������������ � ���������� ������ <b>�� ������� ������� (gross)</b></p>

<h3>2.	��������� ���������������� ������ '.$name_partitive.'</h3>
<p align="right"><em>������� 2.</em></p>
<table border="0" width="100%" class="structure">
    <tr>
        <th colspan="2">������������� �����</th>
        <th colspan="2">���������� �����</th>
        <th rowspan="2">�����������</th>
    </tr>
    <tr>
        <th>�����</th>
        <th>������� � ��������</th>
        <th>������</th>
        <th>������</th>
    </tr>
    <tr>
        <td>'.number_format($official_salary_part,1,',',' ').' %</td>
        <td>'.number_format($add_payment_part,1,',',' ').' %</td>
        <td>'.number_format($bonus_part,1,',',' ').' %</td>
        <td>'.number_format($premium_part,1,',',' ').' %</td>
        <td>'.number_format($compensation_part,1,',',' ').' %</td>
    </tr>
</table>

<h3>3. ����������� ���������� '.$name_partitive.'</h3>';

$filefolder=$folder.'application/elements/job_description/';
if(file_exists($filefolder.$job_id.'_ekts.txt')){
    $page.='<h2>�������� ��������� �� ����</h2>';

    $job_description_ekts=implode("", file($filefolder.$job_id.'_ekts.txt'));
    $page.=$job_description_ekts;
}

if($func!=""){

$page.='<h2>�������� ��������� �� ������ ������� obzorzarplat.ru</h2>
<table class="job_description">';
if($name!=""){ $page.='<tr><td>�������� ���������: </td><td>'.$name.'</td></tr>';}
if($other_name!=""){ $page.='<tr><td>������ �������� ���������: </td><td>'.$other_name.'</td></tr>';}
if($conform!=""){ $page.='<tr><td>�����������: </td><td>'.$conform.'</td></tr>'; }
if($subordinate!=""){ $page.='<tr><td>����������: </td><td>'.$subordinate.'</td></tr>';}
if($purpose!=""){ $page.='<tr><td>����: </td><td>'.$purpose.'</td></tr>'; }
if($mission!=""){ $page.='<tr><td>������: </td><td>'.$mission.'</td></tr>'; }
if($func!=""){ $page.='<tr><td>�������: </td><td>'.$func.'</td></tr>'; }
if($experience!=""){ $page.='<tr><td>���������� � ����� � ������������: </td><td>'.$experience.'</td></tr>'; }
$page.='</table>';
 }

 if($func=="" AND !file_exists($filefolder.$job_id.'_ekts.txt')){
    $page.='<p align="center">�������� ��������� � ��������� ����� ��������� �� ������ ��������� � ���������� � ���� ������.</p></div>';
 }


//������ � ����
$fullpath=$filedir.$filename_html;
$file = fopen ("$fullpath","w+");
fputs ( $file, $page);
fclose ($file);

?>