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
$cat=$_GET["id"];
//Определение названия категории
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="select * from for_category where id='$cat'";
$result=mysqli_query($link,$query);
$cat_name=mysqli_result($result,0,3);
echo('<h3 class=tovarname style="color:#cc0000"><font style="color:#ccc; font-size:11px; font-weight:normal">Раздел:</font>&nbsp;&nbsp;'.$cat_name.'</h3>');

//Вывод товаров категории
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$table='for_cat'.$id;
$query="select * from $table order by pos";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result))
{

//Определение параметров товара
$id=$row["id"];
$query2="select * from for_goods where id='$id'";
$result2=mysqli_query($link,$query2);
$col=mysqli_result($result2,0,6);
$status=mysqli_result($result2,0,8);

$name=mysqli_result($result2,0,2);
$price=mysqli_result($result2,0,3);
$pricesale=mysqli_result($result2,0,4);

if($pricesale>0){$pr=number_format($pricesale);}
if($pricesale==0){$pr=number_format($price);}

$anons=implode("", file($filefolder.$id.'/anons.txt'));
$smallphoto=$filefolder.$id.'/small-photo-1.jpg';
$view="self.location.href='view/?id=".$id."'";
$ab="self.location.href='/shop/basket/addbasket/?id=".$id."&cat=".$cat."'";
$largephoto="large('".$id."')";
//Вывод товара
echo('
<table width="670" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <td width="130" height="130" rowspan="2" align="left" valign="top" style="border-top:1px solid #585858">');
	
if(file_exists($smallphoto))
{
echo('
<a href="view/?id='.$id.'"><img src="'.$smallphoto.'" alt="Подробнее. '.$name.'" width="130" height="130"></a>
');
}
	
	echo('</td>
    <td width="540" height="115" align="left" valign="top"  style="border-top:1px solid #585858">
	
<h3 class="tovarname" style="color:#ccc">'.$name.'</h3>
'.$anons.'	
</td>
  </tr>
  <tr>
    <td width="540" height="15" valign="bottom">
	
	<font style="color:#aaa">');
if($col>0)
{
echo('<img src="'.$folder.'/_admin/sql/ico_yes.gif" width="20" height="20" align="absmiddle" style="border:0"> <b>Есть в наличии</b>');
}
if($col==0)
{
echo('<img src="'.$folder.'/_admin/sql/ico_no.gif" width="20" height="20" align="absmiddle" style="border:0"> <b>Нет в наличии</b>');
}
	
echo('</font></td>
  </tr>
  <tr>
    <td width="130" height="20" align="left" valign="bottom"><input type="button" value="Увеличить фото" class="button2" onClick="'.$largephoto.'" style="width:140px"></td>
    <td height="20" align="left" valign="bottom">');

if((($price>0) or ($pricesale>0)) and ($col)>0)
{
echo('	
<input type="button" value="Положить в корзину" class="button2" onClick="'.$ab.'">');
}
	
	echo('&nbsp;&nbsp;<input type="button" value="Подробнее" class="button2" onClick="'.$view.'"> Розничная цена: <font class=price>'.$pr.'</font> руб. </td>
  </tr>
</table>
');

}
}

if(!isset($_GET["id"])){
echo('
<img src="/_img/arr_05.gif" style="border:0">&nbsp;&nbsp;<b>Укажите раздел</b>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;В интернет-магазине Вы можете заказать заинтересовавший Вас продукт, оформив заявку, и в ближайшее время с Вами свяжется наш менеджер. 
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;На все возникшие вопросы Вы можете получить исчерпывающие ответы по доступным каналам поддержки - через Интернет-сайт компании, по e-mail <a href="mailto:vopros@uralaudio.ru">vopros@uralaudio.ru</a>. 
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;Мы так же будем Вам благодарны за ваши комментарии о нашей продукции, которые мы ждем по адресу <a href="mailto:vashe_mnenie@uralaudio.ru">vashe_mnenie@uralaudio.ru</a>.
<hr>
<b>Условия возврата товара:</b>
<br><br>
1.	Потребитель вправе отказаться от товара в любое время до его передачи. А после передачи товара – в течение 7 дней.
<br><br>
2.	Возврат товара надлежащего качества возможен в случае, если сохранены его товарный вид, потребительские свойства, а также документ, подтверждающий факт  и условия покупки указанного товара.
<br><br>
3.	Товар может быть возвращен потребителю, если он не был в эксплуатации.
<br><br>
4.	Товар должен быть в оригинальной упаковке.
<br><br>
5.	Товар поставленный в комплекте возвращается также в комплекте.

');}
?>

