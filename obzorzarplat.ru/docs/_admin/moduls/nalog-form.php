<?
$year_today=date("Y");
?>
<center><b>Налоги с вашей зарплаты и соответствующие льготы</b></center>
<br>
Социальные и имущественные налоговые вычеты дают возможность налогоплательщику (т.е. вам) возместить некоторую часть своих затрат, например, на постройку квартиры, на лечение и обучение путем возврата уплаченного налога на доходы физических лиц (НДФЛ).<br>
<br>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td width="357" align="right"><strong>Введите вашу зарплату </strong></td>
    <td width="364" valign="top"><input type="text" class="text" name="sal" value="20000" onFocus="if(this.value=='20000'){this.value='';}" onBlur="if(this.value==''){this.value='20000';}">
руб/месяц</td>
    <td width="469" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left">
	Введите ваши возможные расходы в <b><?=$year_today;?></b> году:</td>
    </tr>
<tr>
<td colspan="3" align="center" bgcolor="#dddddd"><strong><em>Социальные налоговые вычеты.</em></strong></td>
</tr>

<tr>
  <td align="right">&nbsp;</td>
  <td valign="top">&nbsp;</td>
  <td rowspan="6" valign="middle"><img src="/_img/nalog.jpg" width="460" height="258"></td>
</tr>
<tr>
<td width="357" align="right"><strong>Расходы на свое обучение</strong><br>
	<em>(максимальная сумма 50 000 руб.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="education" value="0">
руб.</td>
    </tr> 
    <tr>
    <td width="357" align="right"><strong>Расходы на обучение своего ребенка, которому не исполнилось еще 24 лет</strong><br>
	<em>(максимальная сумма 50 000 руб.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="education_baby" value="0">
руб.</td>
    </tr>
    
<tr>
<td width="357" align="right"><strong>Расходы на свое лечение и лечение своих родственников</strong><br>
<em>(максимальная сумма 50 000 руб.)</em></td>
<td valign="top"><input type="text" class="text" name="treatment" value="0">
руб.</td>
</tr>
  
<tr>
<td width="357" align="right"><strong>Расходы на дорогостоящее лечение</strong></td>
<td valign="top"><input type="text" class="text" name="treatment_dear" value="0">
руб.</td>
</tr> 

<tr>
<td width="357" align="right"><strong>Сумма доходов, перечисленная вами на благотворительные цели</strong><br>
<em>(максимальная сумма 25% годовой зарплаты.)</em>
</td>
<td valign="top"><input type="text" class="text" name="welfair" value="0">
руб.</td>
</tr>

<tr>
<td colspan="3" align="center" bgcolor="#dddddd"><strong><em>Имущественные налоговые вычеты.</em></strong></td>
</tr> 
  <tr>
    <td colspan="3" align="left">Если вы строите или приобретаете на территории Российской Федерации жилой дом или квартиру, то вы имеете право на имущественный вычет в сумме расходов на приобретение или строительство жилья.</td>
    </tr> 
	
	
<tr>
<td width="357" align="right"><strong>Расходы на строительство или приобретение жилья</strong><br>
	<em>((максимальная сумма 1 000 000 руб.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="house" value="0">
руб.</td>
    <td valign="top">&nbsp;</td>
  </tr>	
 <tr>
<td width="357" align="right"><strong>Доходы от продажи имущества</strong></td>
    <td valign="top"><input type="text" class="text" name="house_sale" value="0">
руб.</td>
    <td valign="top">&nbsp;</td>
  </tr>	 
<tr>
<td colspan="3" align="center" bgcolor="#dddddd"><strong><em>Стандартные налоговые вычеты.</em></strong></td>
</tr> 
  <tr>
    <td colspan="3" align="left">Стандартный налоговый вычет предоставляется по письменному заявлению различным категориям налогоплательщиков и представляет собой ежемесячное уменьшение налоговой по НДФЛ.</td>
    </tr>
	
<tr>
<td colspan="3" align="center" bgcolor="#dddddd"><strong><em>Профессиональные налоговые вычеты.</em></strong></td>
</tr> 
  <tr>
    <td colspan="3" align="left">Право на получение профессиональных налоговых вычетов имеют предприниматели, нотариусы, занимающиеся частной практикой, адвокаты, учредившие адвокатские кабинеты, и иные лица, занимающиеся частной практикой.
<br><br>	
Профессиональные налоговые вычеты предоставляются в сумме фактически произведенных и документально подтвержденных расходов, непосредственно связанных с извлечением доходов.</td>
    </tr>	   
	
           <tr>
    <td colspan="3" align="center"><input type="submit" class="but" value="Рассчитать!"></td>
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