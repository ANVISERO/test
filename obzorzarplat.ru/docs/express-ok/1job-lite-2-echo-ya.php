<!--
<div id="menu_report">
    <p align="center"><b>���������� ������:</b></p>
    <ul>
        <li><a href="#zp1">����������� �����</a></li>
        <li><a href="#zp2">���������� �����</a></li>
        <li><a href="#zp3">��������</a></li>
        <li><a href="#zp4">����������� ����������</a></li>
    </ul>
</div>
-->
<!--/menu_report-->

<h2>������������� ����� ���������� ����� <?php echo($name_partitive);?> <?php echo($region_name_partitive);?></h2>
<p>��� ������ ������������ � ���������� ������ <b>�� ������� ������� (gross)</b></p>
<!--<p align="right"><img src="/_img/report-excel.png" alt="����� � ������� Excel" title="����� � ������� Excel"><a href="<?php echo($url_xls);?>">����� � ������� Excel</a> |
<a href="/archive/html.php?d=<?=$url;?>" target="_blank">������ ��� ������ &raquo;</a></p>--->

<div id="tabs">
            <ul style="height:33px;">
                <li><a href="#tabs-1">����������� �����</a></li>
                <li><a href="#tabs-2">���������� �����</a></li>
                <li><a href="#tabs-3">��������������� �����</a></li>
                <li><a href="#tabs-4">����������� ����������</a></li>
            </ul>
            <div id="tabs-1">
<h3>����������� �����</h3>

<?php
$chl_salary=number_format($proc_10_salary,0,',',' ').'|'.number_format($proc_25_salary,0,',',' ').'|'.number_format($proc_50_salary,0,',',' ').'|'.number_format($proc_75_salary,0,',',' ').'|'.number_format($proc_90_salary,0,',',' ');
$size='660x250';
$src_salary='http://chart.apis.google.com/chart?chxt=x,x,y,y&chof=gif&cht=bvs&chbh=40,30&chco=800080|6B8E23|00A5C6|FF1493|FF7F50&chd=t:10,25,50,25,10&chxl=0:|'.$chl_salary.'|1:|'.iconv('windows-1251','utf-8','����������� �����, ���./���.').'|3:|'.iconv('windows-1251', 'utf-8', '���������� �����������, %').'&chxp=1,50|3,50&chs='.$size.'&chdl='.iconv('windows-1251', 'utf-8', '10 ����������|25 ����������|50 ����������|75 ����������|90 ����������');
?>

<p align="center"><img src="<?php echo($src_salary); ?>" alt="����������� �����" /></p>
<p class="img_name">������� 1. ����������� ����� <?php echo($name_partitive); ?></p>

<p>������� �������� ������ ����������: <b><?php echo number_format($official_salary_sre,0,',',' ');?> ���./���.</b></p>
</div><!--/tabs-1-->

<div id="tabs-2">
<h3>���������� �����</h3>

<?php
$chl_cash=number_format($proc_10_salary_bonus,0,',',' ').'|'.number_format($proc_25_salary_bonus,0,',',' ').'|'.number_format($proc_50_salary_bonus,0,',',' ').'|'.number_format($proc_75_salary_bonus,0,',',' ').'|'.number_format($proc_90_salary_bonus,0,',',' ');
$size='660x250';
$src_cash='http://chart.apis.google.com/chart?chxt=x,x,y,y&chof=gif&cht=bvs&chbh=40,30&chco=800080|6B8E23|00A5C6|FF1493|FF7F50&chd=t:10,25,50,25,10&chxl=0:|'.$chl_cash.'|1:|'.iconv('windows-1251','utf-8','���������� �����, ���./���.').'|3:|'.iconv('windows-1251', 'utf-8', '���������� �����������, %').'&chxp=1,50|3,50&chs='.$size.'&chdl='.iconv('windows-1251', 'utf-8', '10 ����������|25 ����������|50 ����������|75 ����������|90 ����������');
?>

<p align="center"><img src="<?php echo($src_cash); ?>" alt="���������� �����" /></p>
<p class="img_name">������� 2. ���������� ����� <?php echo($name_partitive); ?></p>

<p>������� �������� ���������� ����� ����������: <b><?php echo number_format($salary_bonus_sre,0,',',' ');?> ���./���.</b></p>
</div><!--/tabs-2-->

<div id="tabs-3">
<h3>��������� ���������������� ������</h3>
<?php
$chd_structure=number_format($official_salary_part,1,'.',' ');
$chdl_structure=iconv('windows-1251', 'utf-8', '�����');
$chl_structure=number_format($official_salary_part,1,',',' ').'%';

if($add_payment_part>0){
    $chd_structure.=','.number_format($add_payment_part,1,'.',' ');
    $chdl_structure.='|'.iconv('windows-1251', 'utf-8', '������� � ��������');
    $chl_structure.='|'.number_format($add_payment_part,1,'.',' ').'%';
}

if($bonus_part>0){
    $chd_structure.=','.number_format($bonus_part,1,'.',' ');
    $chdl_structure.='|'.iconv('windows-1251', 'utf-8', '������');
    $chl_structure.='|'.number_format($bonus_part,1,'.',' ').'%';
}

if($premium_part>0){
    $chd_structure.=','.number_format($premium_part,1,'.',' ');
    $chdl_structure.='|'.iconv('windows-1251', 'utf-8', '������');
    $chl_structure.='|'.number_format($premium_part,1,'.',' ').'%';
}

if($compensation_part>0){
    $chd_structure.=','.number_format($compensation_part,1,'.',' ');
    $chdl_structure.='|'.iconv('windows-1251', 'utf-8', '�����������');
    $chl_structure.='|'.number_format($compensation_part,1,'.',' ').'%';
}

$size='550x250';
$src_structure='http://chart.apis.google.com/chart?chof=gif&cht=p&chd=t:'.$chd_structure.'&chs='.$size.'&chl='.$chl_structure.'&chdl='.$chdl_structure;
?>

<p align="center"><img src="<?php echo($src_structure); ?>" alt="��������� ���������������� ������" /></p>
<p class="img_name">������� 3. ��������� ���������������� ������ <?php echo($name_partitive); ?></p>

<p class="table_name">������� 3. ��������� ���������������� ������ <?php echo($name_partitive); ?></p>
<table class="business">
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
        <td><?php echo number_format($official_salary_part,1,',',' '); ?> %</td>
        <td><?php echo number_format($add_payment_part,1,',',' '); ?> %</td>
        <td><?php echo number_format($bonus_part,1,',',' '); ?> %</td>
        <td><?php echo number_format($premium_part,1,',',' '); ?> %</td>
        <td><?php echo number_format($compensation_part,1,',',' '); ?> %</td>
    </tr>
</table>

</div><!--/tabs-3-->

<div id="tabs-4">
<h3>����������� ���������� <?php echo $name_partitive;?></h3>
<?php
$q_job=mysqli_query($link,"select * from base_company_jobs where job_id='$job_id'");
if(mysqli_num_rows($q_job)==0){
    echo('<div class="ui-state-error" style="width:380px; padding:10px; margin-top:10px;">
    <p align="center">������ �� ��������� ��������� � ��������� ����� ��������� �� ������ ��������� � ���������� � ���� ������.</p></div>');
}
?>

<?php
$filefolder=$folder.'_admin/elements/job_description/';
if(file_exists($filefolder.$job_id.'_ekts.txt')){
    ?>
<h2>�������� ��������� �� ����</h2>
<?php
    $job_description_ekts=implode("", file($filefolder.$job_id.'_ekts.txt'));
    echo($job_description_ekts);
}
?>

<?php if($func!=""){ ?>
<h2>�������� ��������� �� ������ ������� obzorzarplat.ru</h2>
<table>
   <?php if($name!=""){?> <tr><td>�������� ���������: </td><td><?php echo $name; ?></td></tr><?php } ?>
   <?php if($other_name!=""){?> <tr><td>������ �������� ���������: </td><td><?php echo $other_name; ?></td></tr><?php } ?>
   <?php if($conform!=""){?> <tr><td>�����������: </td><td><?php echo $conform; ?></td></tr><?php } ?>
   <?php if($subordinate!=""){?> <tr><td>����������: </td><td><?php echo $subordinate; ?></td></tr><?php } ?>
   <?php if($purpose!=""){?> <tr><td>����: </td><td><?php echo $purpose; ?></td></tr><?php } ?>
   <?php if($mission!=""){?> <tr><td>������: </td><td><?php echo $mission; ?></td></tr><?php } ?>
   <?php if($func!=""){?> <tr><td>�������: </td><td><?php echo $func; ?></td></tr><?php } ?>
   <?php if($experience!=""){?> <tr><td>���������� � ����� � ������������: </td><td><?php echo $experience; ?></td></tr><?php } ?>
</table>
<?php } ?>

<?php if($func=="" AND !file_exists($filefolder.$job_id.'_ekts.txt')){ ?>

<p align="center">�������� ��������� � ��������� ����� ��������� �� ������ ��������� � ���������� � ���� ������.</p>

<?php } ?>

</div><!--/tabs-4-->

</div><!--/tabs-->

<p id="glossary">�� ���������� ������������:
    <a href="/isl/glossary/?str=0-9" target="_blank" title="��������, ���� �������� ����������� 10% ����������� ����������">10 ����������</a>,
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
    <a href="/isl/glossary/?str=0-9" target="_blank" title="��������, ���� �������� ����������� 50% ����������� ����������">50 ���������� (�������)</a>,
    <a href="/isl/glossary/?str=0-9" target="_blank" title="��������, ���� �������� ����������� 25% ����������� ����������.">75 ����������</a>,
    <a href="/isl/glossary/?str=0-9" target="_blank" title="��������, ���� �������� ����������� 10% ����������� ����������.">90 ����������</a>.
</p>