<?php
$host=implode("", file('../../../settings/mysql_host'));
$db=implode("", file('../../../settings/mysql_db'));
$user=implode("", file('../../../settings/mysql_user'));
$pass=implode("", file('../../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

header("Content-Type: text/html; charset=windows-1251");

$Id=mysqli_real_escape_string($link,$_GET['Id']);

switch($Id){
case "sp":
  $function="onChange='getSphere(this.value)'";
  $factor_name="����� ������������ ��������";
  $factor_prefix="sphere";
  break;

case "s":
  $function="onChange='getStaff(this.value)'";
  $factor_name="���� ��������";
  $factor_prefix="staff";
  break;

case "t":
  $function="onChange='getTurnover(this.value)'";
  $factor_name="������ ��������";
  $factor_prefix="turnover";
  break;

case "n":
  $function="";
  $factor_name="";
  $factor_prefix="";
  break;
}

?>

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid silver">

<!--����� -->
<tr>
<td>�����</td>
<td height="30" colspan="2">
<select id='city' name='city' class="text_1" <?=$function;?>>
<option value="">--- ������� ---</option>
<option value="0">��� ������</option>
<option value="1">�����-���������</option>
<option value="">-------------------------</option>
<?php
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
<!--��������� ������ -->

<?php
if($Id!=="n")
{
echo('
  <tr>
    <td>'.$factor_name.'</td>
    <td>
    <div id="'.$factor_prefix.'div">
      <select name="'.$factor_prefix.'" class="text_1">
        <option value="">--- ������� ---</option>
        </select>
    </div>
<div id="loading" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;��������...
</div>
</td>
</tr>
');
}
?>
</table>
    
 <input type="hidden" name="factor_prefix" value="<?=$factor_prefix;?>">

<script type="text/javascript">
function testform()
{
text="";
if(document.step1.city.value==""){text=text+'�����;\n';}
<?
if($Id!=="n"){
echo('if(document.step1.'.$factor_prefix.'.value==""){text=text+\''.$factor_name.';\n\';}');
}
?>
if(text!=""){window.alert('�� �� �������:\n'+text);return false;}
else{
document.step1.action="?step=2";
document.step1.submit();
}
}
</script>