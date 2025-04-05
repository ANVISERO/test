<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$factor=$_POST['factor'];

//if(isset($_POST['factor'])){$factor=$_POST['factor'];}

switch($factor){
case "sp":
  $function="onChange='getSphere(this.value)'";
  $factor_name="Сфера деятельности компании";
  $factor_prefix="sphere";
  break;

case "s":
  $function="onChange='getStaff(this.value)'";
  $factor_name="Штат компании";
  $factor_prefix="staff";
  break;

case "t":
  $function="onChange='getTurnover(this.value)'";
  $factor_name="Оборот компании";
  $factor_prefix="turnover";
  break;

case "n":
  $function="";
  $factor_name="Оборот компании";
  $factor_prefix="turnover";
  break;
}
?>

<script type="text/javascript" src="/_js/lists_4summary_report.js"></script>

<p align="right"><a href="?step=0" class="link_3">Выбрать другую форму отчета</a></p>

<center><p><em>Пожалуйста, заполните все поля, помеченные звездочкой <b class="star">*</b>.</em></p></center>
<form method='post' action="" name="step1" onSubmit="return testform();">
<input type="hidden" name="factor" value="<?=$factor;?>">
<input type="hidden" name="factor_prefix" value="<?=$factor_prefix;?>">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">


<!--Город -->

<tr>
  <td height="40" colspan="2" align="left" valign="top"><font style="background-color:#000000; color:#FFFFFF; padding:3px"><em>Выбор факторов</em></font></td>
  </tr>
<tr>
<td width="35%" align="right">Город</td>
<td height="30" colspan="2">
<select id='city' name='city' class="text" <?=$function;?>  style="width:340px; height:20px;">
<option value="">--- Выбрать ---</option>
<option value="0">Все города</option>
<option value="1">Санкт-Петербург</option>
<option value="">-------------------------</option>
<?
$q_city=mysqli_query($link,"SELECT * FROM base_regions order by name");

$ch="";
while($out_city = mysqli_fetch_array($q_city))
{
if(($city_id<>'') and ($city_id==$out_city["id"])){$ch="selected";}
echo('<option value="'.$out_city["id"].'" '.$ch.'>'.$out_city["name"].'</option>');
$ch="";
}
?>
</select></td>
</tr>


<!--Выбранный фактор -->

<?
if($factor!="n"){
echo('
  <tr>
    <td align="right">'.$factor_name.'</td>
    <td>
    <div id="'.$factor_prefix.'div">
      <select name="'.$factor_prefix.'" class="text" style="width:340px; height:20px;">
        <option value="">--- Выбрать ---</option>
        </select>
    </div>
<div id="loading" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...  
</div>
</td>
</tr>
');
}
?>

</table>

</form>

<table width="100%" border="0">
<tr>
    <td>&nbsp;</td>
    <td align="right"><input type="button" value="дальше >>" class="but1" onClick="return testform();"></td>
  </tr>
</table>

<script>
function testform()
{
text="";
if(document.step3.city.value==""){text=text+'Город;\n';}
<?
if($factor!="n"){
echo('if(document.step3.'.$factor_prefix.'.value==""){text=text+\''.$factor_name.';\n\';}');
}
?>
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
document.step1.action="?step=2";
document.step1.submit();
}
}
</script>