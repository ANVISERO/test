<?php
$folder="../../../";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "���! ������ ����������� � ���� :(";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$job_id=intval($_GET['job']);

$query=mysqli_query($link,"select * from base_jobs where id='$job_id'");
while($row=mysqli_fetch_array($query)){
    $name=$row["name"];
    $other_name=$row["other_name"];
    $conform=$row["conform"];
    $subordinate=$row["subordinate"];
    $purpose=$row["purpose"];
    $mission=$row["mission"];
    $func=$row["func"];
    $experience=$row["experience"];
}

$q_job=mysqli_query($link,"select * from base_company_jobs where job_id='$job_id'");
if(mysqli_num_rows($q_job)==0){
    echo('<div class="ui-state-error" style="width:380px; padding:10px; margin-top:10px;">
    <p align="center">������ �� ��������� ��������� � ��������� ����� ��������� �� ������ ��������� � ���������� � ���� ������.</p></div>');
}
?>

<!--<a href="/servis/job_description/view/?id=<?php echo($job_id);?>&lang=0" class="lk1" target="jobDescript" onClick="window.open(this.href, this.target, config='height=400,width=800,toolbar=0, scrollbars=1')">�������� ��������� &raquo;</a>-->

<?php
$filefolder=$_SERVER['DOCUMENT_ROOT'].'/_admin/elements/job_description/';
if(file_exists($filefolder.$job_id.'_ekts.txt')){
    $job_description_ekts=implode("", file($filefolder.$job_id.'_ekts.txt'));
    if($job_description_ekts!=""){
    ?>
<h2>�������� ��������� �� ����</h2>
<?php
    echo($job_description_ekts);
    }
}
?>

<?php if($func!=""){ ?>
<!--<a href="#" class="lk1" id="ozp_job_description">�������� ��������� �� ������ ������� obzorzarplat.ru</a>-->
<h2>�������� ��������� �� ������ ������� obzorzarplat.ru</h2>
<div id="job_description">
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
</div>
<?php } ?>

<?php if($func=="" AND !file_exists($filefolder.$job_id.'_ekts.txt')){ ?>

<p align="center">�������� ��������� � ��������� ����� ��������� �� ������ ��������� � ���������� � ���� ������.</p>

<?php } ?>