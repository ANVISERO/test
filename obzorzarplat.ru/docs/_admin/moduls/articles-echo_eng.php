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
$col_elem=mysqli_num_rows(mysqli_query($link,"select * from for_articles where status='1' and lang='1'"));
$col_page=ceil($col_elem/$col_topage);
$start_lim=($page-1)*$col_topage;


echo('
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="right">
<font style="size:10px">page.:</font>');
for($ii=1;$ii<=$col_page; $ii++)
{
if($page==$ii){$cla=1;}
if($page<>$ii){$cla=2;}
echo('&nbsp;<input type="button" value="'.$ii.'" class=but_'.$cla.' onClick="self.location.href='.$kov.'?page='.$ii.$kov.'">');
}	
echo('</td></tr></table><hr>');

$filter="select * from for_articles where status='1' and lang='1' order by date desc limit $start_lim,$col_topage";
$kov="'";


$query="$filter";
$result=mysqli_query($link,$query);
$marker=-1;
while($row=mysqli_fetch_array($result))
{
if($marker>0){$color="EEE";}
if($marker<=0){$color="ffffff";}
$filefolder=$folder.'_admin/elements/articles/';
$anons=implode("", file($filefolder.$row["id"].'_an.txt'));

if(file_exists($filefolder.$row["id"].'_autor.txt'))
{
$autor='<br><br><b>Autors:</b><br>';
$autor.=implode("", file($filefolder.$row["id"].'_autor.txt'));
}
if(!file_exists($filefolder.$row["id"].'_autor.txt'))
{$autor='';}

echo('
<table width="100%" border="0" cellspacing="0" cellpadding="4" style="background-color:#'.$color.'">
<tr>
  <td valign="top"><font style="font-size:10px"><b>'.$row["date"].'</b></font></td>
  <td valign="top" style="border-bottom:1px dotted #cccccc"><a href="/eng/stats/view/?id='.$row["id"].'" style="font-size:11px; font-weight:bold; font-style:normal; text-decoration:none; color:#cc0000">'.$row["zag"].'</a></td>
</tr>
<tr>
<td width="80" valign="top">');
if(file_exists($filefolder.$row["id"].'.jpg'))
{
echo('
<a href="/eng/stats/view/?id='.$row["id"].'"><img style="border:1px solid #2b2b2b; cursor:hand" width="80" height="80" src="'.$filefolder.$row["id"].'.jpg" alt="Detail. '.$row["zag"].'"></a>');
}
echo('</td>
<td valign="top">
'.$anons.$autor.'<br><br>
<input type="button" value="Detail..." class="but" onClick="self.location.href='.$kov.'/eng/stats/view/?id='.$row["id"].$kov.'"></td>
</tr>
</table>
');
$marker=-$marker;
}

echo('
<hr>
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="right">
<font style="size:10px">page.:</font>');
for($ii=1;$ii<=$col_page; $ii++)
{
if($page==$ii){$cla=1;}
if($page<>$ii){$cla=2;}
echo('&nbsp;<input type="button" value="'.$ii.'" class=but_'.$cla.' onClick="self.location.href='.$kov.'?page='.$ii.$kov.'">');
}	
echo('</td></tr></table>');
?>

