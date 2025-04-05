<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$result=mysqli_query($link,"select * from for_pages where status='0' order by url");

while($row=mysqli_fetch_array($result))
{
$pageurl=$row["url"];
$pageier=count(implode("/",$pageurl));
$pagename=implode("", file($folder.$pageurl.'_vars/zag.txt'));
echo('
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>');
$img_page_3='&nbsp;';
for($kk=2; $kk<=$pageier; $kk++)
{	
if($kk==$pageier){$img_page_3='<img src="/_admin/_adminfiles/ico_page_3.gif" style="border:0">';}
echo('<td align="right" width="26" height="25" style=" background-image:url(/_admin/_adminfiles/ico_page_2.gif); background-position:right; background-repeat:repeat-y ">'.$img_page_3.'</td>
');
$img_page_3='&nbsp;';
}
$img_page_4='<img src="/_admin/_adminfiles/ico_page.gif" width="26" height="15" align="absmiddle" style="border:0">';
if($pageurl==''){$img_page_4='<img src="/_admin/_adminfiles/ico_page_4.gif" align="absmiddle" style="border:0">';}
echo('<td height="25">'.$img_page_4.' <a href="/'.$pageurl.'" class="link_3">'.$pagename.'</a></td></tr></table>');
}

?>