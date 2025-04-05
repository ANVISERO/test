<style type="text/css">
<!--
h2.searchTitle {font-size: 16px; color: #000; padding:5px; border-bottom:1px solid silver;}
a.linkSearch, a.linkSearch:visited{font-size:13px; text-decoration:none; color:#000; font-weight:normal;}
a.linkSearch:hover{font-size:13px; text-decoration:underline; color:#000; padding-left:5px; font-weight:normal; }
p {margin:3px 0 3px 0;}
-->
</style>

<?
if(isset($_POST['search'])){$search=$_POST['search'];}
if(!isset($_POST['search'])){$search='';}

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

?>
<form name="search" style="margin:0px; padding:0px;" method="post" action="/search/">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="150" align="center" colspan="2"><font style="color:#c00; font-size:14px;">Поиск <img src="/_img/arrows/arrowright.gif" border="0" /></font>
    <input type="text" class="text" value="<?=$search;?>" style="width:300px; height:20px; border:1px solid silver;" name="search"> <input type="submit" value="искать" class="but" style="width:80px; height:20px;"></td>
  </tr>
</table>
</form><hr>
<?

if(isset($_POST['search']))
{
$len_search=strlen($search);
if($len_search<=2)
{
echo('<font style="color:#cc0000"><b>Запрос слишком короткий. Строка запроса должна содержать не менее 3 символов.</b></font>');
}
else
{
echo('Поиск по запросу "<b>'.$search.'</b>":<br><br>');
$col_find=0;

//$search=implode(' ',$search);

//Шерстим страницы

echo('<h2 class="searchTitle">В разделах сайта</h2>');

$result=mysqli_query($link,"select * from for_pages");
while($row=mysqli_fetch_array($result))	
{
$page=$row["url"];
	$scanpage=implode("", file($folder.$page.'_vars/content.txt'));
	$scanpage_zag=implode("", file($folder.$page.'_vars/zag.txt'));
  $scanpage_title=strtolower(implode("", file($folder.$page.'_vars/title.txt')));
	if((eregi($search, $scanpage)==TRUE) or (eregi($search, $scanpage_zag)==TRUE) or (eregi($search, $scanpage_title)==TRUE))
	{
	echo('<p><a href="/'.$page.'" target="_blank" class="linkSearch">'.$scanpage_zag.'</a></p>'); 
	$col_find++;
  }
}
if($col_find==0){echo('Ничего не найдено.<br>');}

//Шерстим новости
$col_find=0;
echo('<h2 class="searchTitle">В новостях</h2>');

$result=mysqli_query($link,"select * from for_news where status='1'");
while($row=mysqli_fetch_array($result))	
{
list($year,$month,$day)=implode('[-,/,.]',$row["date"]);
$scannewsname=$row["zag"];
$scannewsanons=implode("", file($folder.'_admin/elements/news/'.$row["id"].'_an.txt'));
$scannewsopis=implode("", file($folder.'_admin/elements/news/'.$row["id"].'_op.txt'));
if((eregi($search, $scannewsname)==TRUE) or (eregi($search, $scannewsanons)==TRUE) or (eregi($search, $scannewsopis)==TRUE))
{
echo('<p>('.$day.'.'.$month.'.'.$year.') <a href="/news/view/?id='.$row["id"].'" target="_blank" class="linkSearch">'.$scannewsname.'</a></p>');
$col_find++;
}
}
if($col_find==0){echo('Ничего не найдено.<br>');}

//Шерстим статьи
$col_find=0;
echo('<h2 class="searchTitle">В статьях</h2>');

$result=mysqli_query($link,"select * from for_articles where status='1'");
while($row=mysqli_fetch_array($result))	
{
list($year,$month,$day)=implode('[-,/,.]',$row["date"]);
$scannewsname=$row["zag"];
$scannewsanons=implode("", file($folder.'_admin/elements/articles/'.$row["id"].'_an.txt'));
$scannewsopis=implode("", file($folder.'_admin/elements/articles/'.$row["id"].'_op.txt'));
if((eregi($search, $scannewsname)==TRUE) or (eregi($search, $scannewsanons)==TRUE) or (eregi($search, $scannewsopis)==TRUE))
{
echo('<p>('.$day.'.'.$month.'.'.$year.') <a href="/stats/view/?id='.$row["id"].'" target="_blank" class="linkSearch">'.$scannewsname.'</a></p>');
$col_find++;
}
}
if($col_find==0){echo('Ничего не найдено.<br>');}
}
}
?>