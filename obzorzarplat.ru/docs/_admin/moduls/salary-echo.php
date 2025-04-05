<!-- Pagination DIV -->
<div id="galleryalt" class="paginationstyle" style="width: 100%; text-align: center">
<a href="#" rel="previous"><</a> <span class="flatview"></span> <a href="#" rel="next">></a>
</div>

<?
echo('

<div style="width: 100%;">
<div class="virtualpage hidepiece">
<br>
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
');

$month=(date('m')-1);
if($month == "1" ){$month_ru="Январь";}
elseif($month == "2" ){$month_ru="Февраль";}
elseif($month == "3" ){$month_ru="Март";}
elseif($month == "4" ){$month_ru="Апрель";}
elseif($month == "5" ){$month_ru="Май";}
elseif($month == "6" ){$month_ru="Июнь";}
elseif($month == "7" ){$month_ru="Июль";}
elseif($month == "8" ){$month_ru="Август";}
elseif($month == "9" ){$month_ru="Сентябрь";}
elseif($month == "10"){$month_ru="Октябрь";}
elseif($month == "11"){$month_ru="Ноябрь";}
elseif($month == "12"){$month_ru="Декабрь";}

echo('<p>*Последние обновление базы данных: <font style="color:#900;">'.$month_ru.' '.date('Y').'г.</font></p>');

echo('
**Подробный отчет о заработной плате можно получить <a href="/servis/otchet/" class="link_4">здесь &raquo;</strong></a>
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


<div class="virtualpage hidepiece">
<br>

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
');

$month=(date('m')-1);
if($month == "1" ){$month_ru="Январь";}
elseif($month == "2" ){$month_ru="Февраль";}
elseif($month == "3" ){$month_ru="Март";}
elseif($month == "4" ){$month_ru="Апрель";}
elseif($month == "5" ){$month_ru="Май";}
elseif($month == "6" ){$month_ru="Июнь";}
elseif($month == "7" ){$month_ru="Июль";}
elseif($month == "8" ){$month_ru="Август";}
elseif($month == "9" ){$month_ru="Сентябрь";}
elseif($month == "10"){$month_ru="Октябрь";}
elseif($month == "11"){$month_ru="Ноябрь";}
elseif($month == "12"){$month_ru="Декабрь";}

echo('<p>*Последние обновление базы данных: <font style="color:#900;">'.$month_ru.' '.date('Y').'г.</font></p>');

echo('
**Значения заработной платы на <font style="color:#900;">февраль 2009 г.</font> года можно получить <a href="/servis/otchet/" class="link_4">здесь>>></strong></a>
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




<div class="virtualpage hidepiece">
<center><h2 class="title">Должностная инструкция '.$jobs.'</h2></center>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="6" title="Должностная инструкция '.$jobs.'">
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

<!-- Initialize-->
<script type="text/javascript">

var gallery=new virtualpaginate({
	piececlass: "virtualpage", //class of container for each piece of content
	piececontainer: 'div', //container element type (ie: "div", "p" etc)
	pieces_per_page: 1, //Pieces of content to show per page (1=1 piece, 2=2 pieces etc)
	defaultpage: 0, //Default page selected (0=1st page, 1=2nd page etc). Persistence if enabled overrides this setting.
	persist: false //Remember last viewed page and recall it when user returns within a browser session?
})

gallery.buildpagination(["galleryalt"], ["Заработная плата", "Должностной оклад", "Должностная инструкция"])

</script>