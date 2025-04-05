<style type="text/css">
<!--
input.but_1{border:0; font-family:Verdana; font-size:11px; border:2px solid #171717; background-color:#cccccc; color:#000; cursor:hand;  height:20px; font-weight:bold}
input.but_2{border:0; font-family:Verdana; font-size:11px; border:2px solid #cccccc; background-color:#cccccc; color:#000; cursor:hand;  height:20px; font-weight:bold}
-->
</style>


<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$kov="'";
$col_topage=10;
if(!isset($_GET['page'])){$page=1;}
if(isset($_GET['page'])){$page=$_GET['page'];}
$col_elem=mysqli_num_rows(mysqli_query($link,"select * from for_salary where status='1' and lang='0'"));
$col_page=ceil($col_elem/$col_topage);
$start_lim=($page-1)*$col_topage;


echo('
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="right">
<font style="size:10px">стр.:</font>');
for($ii=1;$ii<=$col_page; $ii++)
{
if($page==$ii){$cla=1;}
if($page<>$ii){$cla=2;}
echo('&nbsp;<input type="button" value="'.$ii.'" class=but_'.$cla.' onClick="self.location.href='.$kov.'?page='.$ii.$kov.'">');
}	
echo('</td></tr></table><hr>');



$filter="select * from for_salary where status='1' and lang='0' order by date desc limit $start_lim,$col_topage";
$kov="'";

$query="$filter";
$result=mysqli_query($link,$query);
$marker=-1;
while($row=mysqli_fetch_array($result))
{
if($marker>0){$color="EEE";}
if($marker<=0){$color="ffffff";}
$filefolder=$folder.'_admin/elements/salary/';

$anons=implode("", file($filefolder.$row["id"].'_anons.txt'));

$salary_image='';
if(file_exists($filefolder.$row["id"].'.jpg'))
{$salary_image='<a href="/servis/medium_wage/view/?id='.$row["id"].'"><img style="border:1px solid #2b2b2b; cursor:pointer" width="80" height="80" src="'.$filefolder.$row["id"].'.jpg" alt="Подробнее. '.$row["job_name"].'"></a>';}


echo('
<table width="100%" border="0" cellspacing="0" cellpadding="4" style="background-color:#'.$color.'">
<tr>
  <td valign="top"><font style="font-size:10px"><b>'.substr($row["date"],8).'.'.substr($row["date"],5,2).'.'.substr($row["date"],0,4).'</b></font></td>
  <td valign="top" style="border-bottom:1px dotted #cccccc"><a href="/servis/medium_wage/view/?id='.$row["id"].'" style="font-size:11px; font-weight:bold; font-style:normal; text-decoration:none; color:#cc0000">'.$row["job_name"].'</a></td>
</tr>
<tr>
<td width="80" valign="top">'.$salary_image.'</td>
<td valign="top">
<p>Средняя заработная плата по России сотавляет <b>'.$row["salary"].' руб.</b></p>
<p>'.$anons.'</p>');

echo('<p align="right"><input type="button" value="Подробнее..." class="but" onClick="self.location.href='.$kov.'/servis/medium_wage/view/?id='.$row["id"].$kov.'"></p></td>
</tr>
</table>
');
$marker=-$marker;
}

echo('
<hr>
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="right">
<font style="size:10px">стр.:</font>');
for($ii=1;$ii<=$col_page; $ii++)
{
if($page==$ii){$cla=1;}
if($page<>$ii){$cla=2;}
echo('&nbsp;<input type="button" value="'.$ii.'" class=but_'.$cla.' onClick="self.location.href='.$kov.'?page='.$ii.$kov.'">');
}	
echo('</td></tr></table>');
?>

