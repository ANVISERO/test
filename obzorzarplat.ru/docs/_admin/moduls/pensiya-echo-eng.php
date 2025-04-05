<center><b>Ваша пенсия</b></center>
<br>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
 
  <tr>
    <td width="200" align="right"><strong>Выберите год рождения</strong></td>
    <td><select class="text" name="birthday" style="width:120px">
	<option value="">--- выбрать ---</option>
	<?
	
	$yaer_today=date("Y");
	$yaer_first=$yaer_today-59;
	for($ii=$yaer_first; $ii<=($yaer_today-18); $ii++)
	{
	echo('<option value="'.$ii.'">'.$ii.'</option>');
	}
	?>
	</select></td>
  </tr>
 <tr>
    <td width="200" align="right"><strong>Введите зарплату</strong></td>
    <td><input type="text" class="text" name="sal" value="20000" style="width:120px"> руб/месяц</td>
  </tr>
    <tr>
    <td width="200" align="right"><strong>Ваш пол</strong></td>
    <td>
<label><input type="radio" name="sex" value="1" checked="checked">М</label>
<label><input type="radio" name="sex" value="0">Ж</label></td>
  </tr>
    <tr>
    <td width="200" align="right"><strong>Введите ваш страховой стаж на текущий момент</strong></td>
    <td><input name="seniority" type="text" class="text" value="0" size="3" maxlength="3" style="width:120px"> 
      лет</td>
  </tr>
  <tr>
    <td width="200" align="right">&nbsp;</td>
    <td>
	
<em><strong>* В страховой стаж включаются: </strong>
<ul>
<li>работа по трудовому договору; 
<li>государственная гражданская или муниципальная служба; 
<li>иная деятельность, в течение которой вы подлежали обязательному социальному страхованию на случай временной нетрудоспособности и в связи с материнством.
</ul></em>	</td>
  </tr> 
  
      <tr>
    <td width="200" align="right"><strong>Введите ваш инвестиционный доход от накопительной части пенсии **</strong></td>
    <td><input name="percent_capital" type="text" class="text" size="5" maxlength="5" value="10" style="width:120px"> % в год</td>
  </tr>
    <tr>
    <td width="200" align="right">&nbsp;</td>
    <td>
	
<em>** В соответствии с пенсионным законодательством накопительная часть страхового взноса в ПФР должна быть инвестирована</em>	</td>
  </tr>

           <tr>
    <td colspan="2" align="center"><input type="submit" class="but" value="Расcчитать!"></td>
    </tr>  
</table>
</form>
<script>
function testform()
{
var reg = new RegExp("^\\d+$");
if (!(reg.test(document.zp.sal.value))) {window.alert('Вводите только цифры');return false;}

if (document.zp.birthday.value==""){window.alert('Вы не выбрали год рождения');return false;}
if (document.zp.sal.value==""){window.alert('Вы не указали зарплату');return false;}
if (document.zp.capital.value==""){window.alert('Вы не указали пенсионный капитал');return false;}
}
</script>
