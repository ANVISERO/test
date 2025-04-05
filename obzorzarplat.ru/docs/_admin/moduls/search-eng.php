<?
if(isset($_POST['search'])){$search=$_POST['search'];}
if(!isset($_POST['search'])){$search='';}

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

?>
<form name="search" style="margin:0px; padding:0px;" method="post" action="/eng/search/">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="150" align="right">Keyword:</td>
    <td><input type="text" class="text" value="<?=$search;?>" style="width:300px" name="search"> <input type="submit" value="Search" class="but" style="width:80px"></td>
  </tr>
</table>
</form><hr>
<?

if(isset($_POST['search']))
{
$len_search=strlen($search);
if($len_search<=2)
{
echo('<font style="color:#cc0000"><b>You may want to shorten terms entered.</b></font>');
}
else
{
echo('Search "<b>'.$search.'</b>":<br><br>');
$col_find=0;

//Шерстим страницы

$result=mysqli_query($link,"select * from for_pages");
while($row=mysqli_fetch_array($result))	
{
$page=$row["url"];
	$scanpage=implode("", file($folder.$page.'_vars/content.txt'));
	$scanpage_name=implode("", file($folder.$page.'_vars/zag.txt'));
	if((eregi($search, $scanpage)==TRUE) or (eregi($search, $scanpage_name)==TRUE))
	{
	echo('&nbsp;&nbsp;<img src="/_img/arr_02.gif">&nbsp;&nbsp;страница: <a href="/'.$page.'" target="_blank" class="link_3">'.$scanpage_name.'</a><br>'); 
	$col_find++;}
}
//Шерстим новости
$result=mysqli_query($link,"select * from for_news where status='1'");
while($row=mysqli_fetch_array($result))	
{
$scannewsname=$row["zag"];
$scannewsanons=implode("", file($folder.'_admin/elements/news/'.$row["id"].'_an.txt'));
$scannewsopis=implode("", file($folder.'_admin/elements/news/'.$row["id"].'_op.txt'));
if((eregi($search, $scannewsname)==TRUE) or (eregi($search, $scannewsanons)==TRUE) or (eregi($search, $scannewsopis)==TRUE))
{
echo('&nbsp;&nbsp;<img src="/_img/arr_02.gif">&nbsp;&nbsp;новость: <a href="/news/view/?id='.$row["id"].'" target="_blank" class="link_3">'.$scannewsname.' ('.$row["date"].')</a><br>');
$col_find++;
}
}	
//Шерстим статьи
$result=mysqli_query($link,"select * from for_articles where status='1'");
while($row=mysqli_fetch_array($result))	
{
$scannewsname=$row["zag"];
$scannewsanons=implode("", file($folder.'_admin/elements/articles/'.$row["id"].'_an.txt'));
$scannewsopis=implode("", file($folder.'_admin/elements/articles/'.$row["id"].'_op.txt'));
if((eregi($search, $scannewsname)==TRUE) or (eregi($search, $scannewsanons)==TRUE) or (eregi($search, $scannewsopis)==TRUE))
{
echo('&nbsp;&nbsp;<img src="/_img/arr_02.gif">&nbsp;&nbsp;статья: <a href="/stats/view/?id='.$row["id"].'" target="_blank" class="link_3">'.$scannewsname.' ('.$row["date"].')</a><br>');
$col_find++;
}
}
if($col_find==0){echo('Sorry, no results.<br>');}
}
}
?>
