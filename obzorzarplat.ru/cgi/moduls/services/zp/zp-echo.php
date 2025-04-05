<?
echo('





<div id="zp_1" style=" display:block">
<br>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="190" style="border-top:2px solid #cc0000">&nbsp;</td>
    <td width="190">&nbsp;</td>
    <td width="190">&nbsp;</td>
  </tr>
</table>

<strong>Должностной оклад</strong>
<table width="347" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="115" height="30" align="right" valign="middle">25%</td>
    <td width="130" height="30" align="center" valign="middle">среднее</td>
    <td width="102" height="30" align="left" valign="middle">75%</td>
  </tr>
  <tr>
    <td height="178" colspan="3" align="center" valign="middle"><img src="/_img/graf_01_1.GIF" width="347" height="178"></td>
  </tr>
  <tr>
    <td width="115" height="30" align="right" valign="middle"><b>'.number_format($proc_25_salary,0).' р.</b></td>
    <td width="130" height="30" align="center" valign="middle"><font color="red"><b>'.number_format($sred_salary,0).' р.</b></font></td>
    <td width="102" height="30" align="left" valign="middle"><b>'.number_format($proc_75_salary,0).' р.</b></td>
   </tr>
</table>
<br>
<p>*Последние обновление базы данных: <font style="color:#900;">декабрь 2008 г.</font></p>
**Значения базы данных на <font style="color:#900;">май 2009 г.</font> года можно получить <a href="/servis/otchet/">здесь>>></strong></a>
<br><br>
==============================================
<br>
<br>На картинке представлены: <strong>25</strong> и <strong>75</strong> процентили должностного оклада.
<ul>
<li><strong>25 процентиль</strong> – такое значение должностного оклада по выбранной должности, ниже которого лежат 25% значений окладов.<br><br>
<li><strong>75 процентиль</strong> – такое значение должностного оклада по выбранной должности, ниже которого лежат 75% значений окладов.
<li><br>Все данные отображаются в российских рублях и показывают доход сотрудника после налогообложения (на руки).
</ul>
<br><br>Copyright ©  1996-2009 Ant-Management
</div>




<div id="zp_2" style=" display:none">
<br>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="190">&nbsp;</td>
    <td width="190" style="border-top:2px solid #cc0000">&nbsp;</td>
    <td width="190">&nbsp;</td>
  </tr>
</table>
<strong>Заработная плата включает в себя оклад, надбавки, доплаты, премии и бонусы.</strong>
<table width="347" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="115" height="30" align="right" valign="middle">25%</td>
    <td width="130" height="30" align="center" valign="middle">среднее</td>
    <td width="102" height="30" align="left" valign="middle">75%</td>
  </tr>
  <tr>
    <td height="178" colspan="3" align="center" valign="middle"><img src="/_img/graf_01_1.GIF" width="347" height="178"></td>
  </tr>
  <tr>
    <td width="115" height="30" align="right" valign="middle"><b>'.number_format($proc_25_salary_bonus,0).' р.</b></td>
    <td width="130" height="30" align="center" valign="middle"><font color="red"><b>'.number_format($sred_salary_bonus,0).' р.</b></font></td>
    <td width="102" height="30" align="left" valign="middle"><b>'.number_format($proc_75_salary_bonus,0).' р.</b></td>
  </tr>
</table>
<br>
<p>*Последние обновление базы данных: <font style="color:#900;">май 2009 г.</font></p>
**Значения базы данных на <font style="color:#900;">февраль 2009 г.</font> года можно получить <a href="/servis/otchet/">здесь>>></strong></a>
<br><br>
==============================================
<br>
<br>На картинке представлены: <strong>25</strong> и <strong>75</strong> процентили заработной платы. 
<br>
<ul>
<li><strong>25 процентиль</strong> – такое значение заработной платы по выбранной должности, ниже которого лежат 25% значений окладов с учетом бонусов.<br><br>
<li><strong>75 процентиль</strong> – такое значение заработной платы по выбранной должности, ниже которого лежат 75% значений окладов с учетом бонусов.
<li><br>Все данные отображаются в российских рублях и показывают доход сотрудника после налогообложения (на руки).
</ul>
<br><br>Copyright ©  1996-2009 Ant-Management
</div>




<div id="zp_3" style=" display:none">
<br>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="190">&nbsp;</td>
    <td width="190">&nbsp;</td>
    <td width="190" style="border-top:2px solid #cc0000">&nbsp;</td>
  </tr>
</table>
<strong>Описание должности</strong>

<center><h1 class="title">'.$jobs.'</h1></center>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Другие названия должности:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_other_name.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчиняется:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_conform.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчинённые:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_subordinate.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Цель:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_purpose.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Задачи:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_mission.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Функции:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_func.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top"><em><strong>Требования к опыту и квалификации:</strong></em></td>
    <td valign="top">&nbsp;'.$jobs_experience.'</td>
  </tr>
</table>
</ul>
<br><strong>Хотите узнать больше? - тогда Вам нужен <a href="/servis/otchet/" class="link_4">персональный отчет</a>!</strong>
<br>
<br>Персональный отчет поможет при переговорах с Вашим работодателем или при смене работы. Заказав пероснальный отчет, Вы получаете инструмент:
<ul>
      <li><em>для принятия решения о смене работы,</em></li>
      <li><em>ведения переговоров со своим работодателем,</em></li>
      <li><em>выступить советчиком своему другу.</em></li>
    </ul>   
<br><a href="/servis/otchet/" class="link_4"><strong>ПОЛУЧИТЬ ОТЧЕТ>>></strong></a>
<br><br>Copyright ©  1996-2009 Ant-Management




</div>




');
?>