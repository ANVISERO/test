<h1 class="title"><img src="/_img/arr_01" width="8" height="7">&nbsp;&nbsp;Купить отчет</h1>

<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$result=mysqli_query($link,"select * from base_otchet_type where status='1' order by pos");
while($row=mysqli_fetch_array($result))
{
$demo_file=$row['demo'];
echo('
<hr>
<table width="100%" border="0" cellpadding="4" cellspacing="0">
<tr>
<td valign="top">
<h2 style="font-size:13px; color:#cc0000; font-weight:bold">'.$row["name"].'</h2>'.$row["opis"].'
<h2 style="font-size:13px; color:#cc0000; font-weight:bold">'.$row["price"].' руб.</h2>
<center>
<input type="button" class="but" value="Купить >>">');

if(($demo_file<>'') and (file_exists($folder.'_files/'.$demo_file)))
{echo("<input type=\"button\" class=\"but\" value=\"Смотреть демо\" onclick=\"self.location.href='/_files/$demo_file'\">");}

echo('</center>
</td>
</tr>
</table>
');
}
?>