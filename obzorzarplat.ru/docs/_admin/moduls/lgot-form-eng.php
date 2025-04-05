<center><b>Рассчитайте свои льготы и компенсации</b></center>
<br>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td width="200" align="right"><strong>Средняя зарплата</strong></td>
    <td><input type="text" class="text" name="sal" value="20000"> руб/месяц</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>
	
<em>Cредний заработок определяется исходя из фактически начисленной зарплаты и отработанного времени за 12 календарных месяцев, предшествующих периоду, для которого определяется средняя зарплата.</em>	</td>
  </tr>
  <tr>
    <td align="right"><strong>Страховой стаж</strong></td>
    <td><select class="text" name="percent">
	<option value="0.6">до 5 лет</option>
	<option value="0.8">от 5 до 8 лет</option>
	<option value="1">8 и более лет</option>
	</select></td>
  </tr> 
           <tr>
    <td width="200" align="right"></td>
    <td><input type="submit" class="but" value="Расcчитать!"></td>
  </tr>  
</table>
</form>
<script>
function testform()
{
var reg = new RegExp("^\\d+$");
if (!(reg.test(document.zp.sal.value))) {window.alert('Вводите только цифры');return false;}
if (document.zp.sal.value=="")
{window.alert('Вы не указали зарплату');return false;}
}
</script>