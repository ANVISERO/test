<?
echo('
<table width="100%" border="0" cellspacing="0">

<tr valign="top" >
<td width="100%" align="right">
<a href="?step=0" class="link_3">Выбрать другую форму отчета</a>
</td>
</tr>

<tr valign="top" >
<td width="100%">
<p>Город: '.$city_name.'</p>
<p>'.$factor_name.' '.substr($period,5).', '.substr($period,0,4).' год</p>


<h3 class="lite">1.	Рыночная тенденция по значениям компенсации труда и заработной платы (руб. в месяц)</h3>
<table width="100%" border="0" class="X1_lite">
<tr class="X1_lite_0">
  <th></th>
  <th colspan="2">Заработная плата</th>
  <th colspan="2">Компенсация труда</th>
</tr>
<tr class="X1_lite_1">
  <th>Должность</th>
  <th>'.substr($period,5).', '.substr($period,0,4).' год</th>
  <th>'.substr($period_now,5).', '.substr($period_now,0,4).' год</th>
  <th>'.substr($period,5).', '.substr($period,0,4).' год</th>
  <th>'.substr($period_now,5).', '.substr($period_now,0,4).' год</th>
</tr>
');

foreach($job as $job_id){
echo($out[$job_id]);
}

echo('
</table><br>

</td>
</tr>
</table>

<table width="100%" border="0">
<tr valign="top">
<td align="left">
	<form name="back" action="?step=2" method="post">
	<input type="hidden" name="period" value="'.$period.'">
	<input type="hidden" name="city" value="'.$city_id.'">
	<input type="submit" value="<< назад" class="but3_lite">
	</form>
</td>
</tr>
</table>
');

?>