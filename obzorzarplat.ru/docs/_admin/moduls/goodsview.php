<script>
function large(id)
{
newwin=window.open('/_admin/moduls/large_photo.php?id='+id+'&temp=<? echo($temp);?>', '', 'width=520, height=500, directories=no, location=no, menubar=no, resizeble=no, scrollbars=no, status=no, toolbar=no, left=200, top=200');
}
</script>

<?
$filefolder=$folder.'_admin/elements/goods/';
if(isset($_GET["id"]))
{
$id=$_GET["id"];


//Определение параметров товара

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query2="select * from for_goods where id='$id'";
$result2=mysqli_query($link,$query2);
$col=mysqli_result($result2,0,6);
$status=mysqli_result($result2,0,8);
$name=mysqli_result($result2,0,2);
$price=mysqli_result($result2,0,3);
$pricesale=mysqli_result($result2,0,4);

if($pricesale>0){$pr=number_format($pricesale);}
if($pricesale==0){$pr=number_format($price);}

$opis=implode("", file($filefolder.$id.'/opis.txt'));
$smallphoto=$filefolder.$id.'/small-photo-1.jpg';
if(file_exists($filefolder.$id.'/instr.txt')){$instr=implode("", file($filefolder.$id.'/instr.txt'));}
if(!file_exists($filefolder.$id.'/instr.txt')){$instr='';}

$view="self.location.href='view/?id=".$id."'";

//Вывод товара
echo('<h3 class=tovarname style="color:#cc0000">'.$name.'</h3>');

$ab="self.location.href='/shop/basket/addbasket/?id=".$id."'";
$largephoto="large('".$id."')";
echo('
<table width="670" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <td width="130" height="130" rowspan="2" align="left" valign="top" style="border-top:1px solid #585858">');
	
if(file_exists($smallphoto))
{
echo('	
	<img src="'.$smallphoto.'" alt="'.$name.'" width="130" height="130">');}
	
	
	echo('
	</td>
    <td width="540" height="115" align="left" valign="top"  style="border-top:1px solid #585858">
'.$opis.'	
</td>
  </tr>
  <tr>
    <td width="540" height="15" valign="bottom">
	
	<font style="color:#aaa">');
if($col>0){echo('<img src="'.$folder.'/_admin/sql/ico_yes.gif" width="20" height="20" align="absmiddle" style="border:0"> <b>Есть в наличии</b>');}	
if($col==0){echo('<img src="'.$folder.'/_admin/sql/ico_no.gif" width="20" height="20" align="absmiddle" style="border:0"> <b>Нет в наличии</b>');}	
echo('</font>');

if($instr<>'')
{
echo('<br><br>Скачать инструкцию: ');
$fil_id=$instr; include($folder.'_admin/moduls/download-echo.php');
}

echo('</td>
  </tr>
  <tr>
    <td width="130" height="20" align="left" valign="bottom"><input type="button" value="Увеличить фото" class="button2" onClick="'.$largephoto.'" style="width:140px"></td>
    <td height="20" align="left" valign="bottom">');
	
	if((($price>0) or ($pricesale>0)) and ($col)>0)
	{
	echo('
	<input type="button" value="Положить в корзину" class="button2" onClick="'.$ab.'">');}
	
	echo('&nbsp;&nbsp; Розничная цена: <font class=price>'.$pr.'</font> руб. </td>
  </tr>
</table>
');

}


if(!isset($_GET["id"])){echo('Товар не выбран');}
?>

