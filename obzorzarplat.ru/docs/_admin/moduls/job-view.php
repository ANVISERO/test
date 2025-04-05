<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Job View</title>
</head>
<body>


<?
$job_id=$_GET['id'];

$host=implode("", file('../settings/mysql_host'));
$db=implode("", file('../settings/mysql_db'));
$user=implode("", file('../settings/mysql_user'));
$pass=implode("", file('../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);
$jtype_id=mysqli_result(mysqli_query($link,"select jtype_id from base_jobs where id='$job_id'"),0,0);
$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);
$job_other_name=mysqli_result(mysqli_query($link,"select other_name from base_jobs where id='$job_id'"),0,0);
$job_conform=mysqli_result(mysqli_query($link,"select conform from base_jobs where id='$job_id'"),0,0);
$job_subordinate=mysqli_result(mysqli_query($link,"select subordinate from base_jobs where id='$job_id'"),0,0);
$job_purpose=mysqli_result(mysqli_query($link,"select purpose from base_jobs where id='$job_id'"),0,0);
$job_mission=mysqli_result(mysqli_query($link,"select mission from base_jobs where id='$job_id'"),0,0);
$job_func=mysqli_result(mysqli_query($link,"select func from base_jobs where id='$job_id'"),0,0);
$job_experience=mysqli_result(mysqli_query($link,"select experience from base_jobs where id='$job_id'"),0,0);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
<tr>
  <td colspan="2">
 <input type="button" value="Закрыть окно" onclick="window.close();" style="font-size:11px;"> 
 <center> <h2><?=$job_name;?></h2> (группа: <em><?=$jtype_name;?></em>)</center><br>

<table width="100%" border="0" cellspacing="0" cellpadding="4" style="font-size:12px; color:#333333; background-color:#eee">

 
<? 
if($job_other_name<>""){echo('
<tr><td width="120" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Другие названия должности:</strong></em></td>
<td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_other_name.'</td></tr>
 ');}
 
if($job_conform<>""){echo('
  <tr>
    <td width="120" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчиняется:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_conform.'</td>
  </tr>
');}
  
if($job_subordinate<>""){echo('
  <tr>
    <td width="120" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчинённые:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_subordinate.'</td>
  </tr>
');}  

if($job_purpose<>""){echo('
  <tr>
    <td width="120" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Цель:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_purpose.'</td>
  </tr>
');}

if($job_mission<>""){echo('
  <tr>
    <td width="120" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Задачи:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_mission.'</td>
  </tr>
');}

if($job_func<>""){echo('
  <tr>
    <td width="120" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Функции:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_func.'</td>
  </tr>
');}

if($job_experience<>""){echo('
  <tr>
    <td width="120" align="right" valign="top"><em><strong>Требования к опыту и квалификации:</strong></em></td>
    <td valign="top">'.$job_experience.'</td>
  </tr>
');}
?>

</table>
 <input type="button" value="Закрыть окно" onclick="window.close();" style="font-size:11px;">
 </td></tr></table>
</body>
</html>
