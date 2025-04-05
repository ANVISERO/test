<style>
input.but_1{border:0; font-family:Verdana; font-size:11px; border:2px solid #171717; background-color:#cccccc; color:#000; cursor:hand;  height:20px; font-weight:bold}
input.but_2{border:0; font-family:Verdana; font-size:11px; border:2px solid #cccccc; background-color:#cccccc; color:#000; cursor:hand;  height:20px; font-weight:bold}
</style>
<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$kov="'";
$col_topage=10;
if(!isset($_GET['page'])){$page=1;}
if(isset($_GET['page'])){$page=$_GET['page'];}
$col_elem=mysqli_num_rows(mysqli_query($link,"select * from for_sites where status='1'"));
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

$filter="select * from for_sites where status='1' order by name limit $start_lim,$col_topage";
$kov="'";


$query="$filter";
$result=mysqli_query($link,$query);
$marker=-1;
while($row=mysqli_fetch_array($result))
{
if($marker>0){$color="eee";}
if($marker<=0){$color="ffffff";}
$logo_url=$folder.'_admin/elements/sites/'.$row["id"];
$logo='';
if(file_exists($logo_url.'.jpg')){$logo='<a href="'.$row["link"].'" target="_blank"><img alt="'.$row["name"].'" src="'.$logo_url.'.jpg" border=0></a>';}
if(file_exists($logo_url.'.gif')){$logo='<a href="'.$row["link"].'" target="_blank"><img alt="'.$row["name"].'" src="'.$logo_url.'.gif" border=0></a>';}

echo('
<table width="100%" border="0" cellspacing="0" cellpadding="4" style="background-color:#'.$color.'">
<tr>
<td width="120" valign="top">'.$logo.'</td>
<td valign="top">
<a href="'.$row["link"].'" target="_blank" style="font-size:11px; font-weight:bold; font-style:normal; text-decoration:none; color:#cc0000">'.$row["name"].'</a><br>
'.$row["opis"].'
</td>
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

