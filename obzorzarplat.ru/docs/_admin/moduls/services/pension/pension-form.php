<!--content -->
<style type="text/css">
<!--
.style4 {font-size:16px; font-weight:bold; text-align:center; color:#fff; text-decoration:none;}
-->
</style>

<style type="text/css">
<!--
.style1 {
	color: #999999;
	font-style: italic;
}
.style2 {font-size: 10px}
.style3 {font-size: 14px}
.style9 {color: #000000}
.style14 {color: #CCCCCC}
.style15 {color: #595959;}
.style16 {
	font-size: 12px;
	color: #595959;
	font-style: italic;
}
.style17 {color: #666666}
.style18 {font-size: 10px; color: #595959; }
-->
</style>

<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid silver;">
  <tr>
    <td align="right" width="40%">Выберите год рождения</td>
    <td width="60%"><select class="text" name="birthday">
      <option value="">--- выбрать ---</option>
      <?php
     $year_today=date("Y"); //Текущий год
     $year_begin=1950;
      for($i=$year_begin;$i<=$year_today-18;$i++){
        echo('<option value="'.$i.'">'.$i.'</option>');
      }
      ?>
      </select>
      </tr>
  <tr>
    <td align="right">Введите сумму <a href="#" id="pk_link" class="lk_info">пенсионных накоплений</a>:</td>
    <td><input type="text" class="text" name="sum_pens" title="0"> руб</td>
    </tr>
 <tr>
    <td align="right">Введите зарплату:</td>
    <td><input type="text" class="text" name="sal" title="20000"/> руб/месяц</td>
    </tr>
    <tr>
    <td align="right">Ваш пол</td>
    <td>
<label><input type="radio" name="sex" value="1" checked="checked"> М</label>
<label><input type="radio" name="sex" value="0"> Ж</label></td>
    </tr>
    <tr>
    <td align="right">Введите Ваш страховой стаж на текущий момент:</td>
    <td><input name="seniority" type="text" class="text" title="0" size="3" maxlength="3"> лет</td>
    </tr>
      <tr>
    <td align="right">Введите ваш <a href="#" id="percent_capital_link" class="lk_info">инвестиционный доход от накопительной части пенсии</a></td>
    <td><input type="text" class="text" name="percent_capital" title="10"/> % в год</td>
    </tr>
  <tr>
    <td align="right">Участие в <a href="#" id="gos_finance_link" class="lk_info">программе государственного софинансирования пенсии</a></td>
    <td><input type="checkbox" name="gos_finance" value="1"></td>
    </tr>
  <tr>
    <td></td>
    <td align="left"><input name="submit" type="submit" class="but_form" value="Расcчитать!"></td>
    </tr>

</table>
</form>
<div class="ui-dialog-content info hide" title="Пенсионный капитал" id="pk_info">
<h3>Пенсионный капитал (ПК)</h3>
<p>Сумму пенсионного капитала, накопленного на вашем персональном счете, Вы можете посмотреть в ежегодно присылаемой Вам ведомости из ПФР.</p>
<p align="center"><font color="#cc0000"><strong>ПК</strong><strong> =  ПК<sub>1
</sub>+ СВ + ПК<sub>2</sub></strong></font>, где</p>
<p align="justify"><font color="#cc0000"><strong>ПК<sub>1</sub></strong></font> – расчетный пенсионный капитал, исчисленный при
оценке пенсионных прав застрахованного лица по состоянию на 01.01.2002;<strong><br>
<font color="#cc0000">СВ</font></strong> – сумма валоризации;<strong><br>
<font color="#cc0000">ПК<sub>2</sub></font></strong><font color="#cc0000"><sub> </sub></font>– сумма
страховых взносов и иных поступлений в Пенсионный фонд Российской Федерации за
застрахованное лицо начиная с 01.01.2002 (уплачиваются работодателем в общей сумме 14% от ЗП работника);</p>
<p align="center"><font color="#cc0000"><strong>ПК</strong><sub>1</sub><strong>= (РП-БЧ) х Т</strong></font></p>
<p align="justify"><font color="#cc0000"><strong>РП</strong></font> – расчетный размер трудовой пенсии,
определяемый с учетом стажа и заработка конкретного лица по формуле:<strong> </strong></p>
<p align="center"><font color="#cc0000"><strong>РП = СК х ЗР
/ ЗП х СЗП</strong></font></p>
<p align="justify"><strong><font color="#cc0000">СК</font> </strong>– стажевый коэффициент, который
составляет 0,55 за общий стаж 20 лет у женщин, 25 лет у мужчин и повышается на
0,01 за каждый год общего трудового стажа сверх 20 и 25 лет соответственно, но
не более чем на 0,20.</p>
<div align="justify"></div>
<p align="justify">Периоды, включаемые
в общий трудовой стаж (в календарном порядке):</p>
<div align="justify">
<ol>
<li> Периоды работы и иной
общественно-полезной деятельности, периоды творческой деятельности</li>
<li>Служба в Вооруженных Силах и
приравненная к ней служба</li>
<li>Периоды временной
нетрудоспособности, начавшейся в период работы, и период пребывания на
инвалидности  I и II группы, полученной вследствие увечья, связанного с
производством, или профессионального заболевания</li>
<li>Период пребывания в местах
заключения сверх срока, назначенного при пересмотре дела
период получения пособия по безработице, участия в оплачиваемых общественных
работах, переезда по направлению государственной службы занятости в другую
местность для трудоустройства</li></ol></div>
<p align="justify"><font color="#cc0000"><strong>ЗР/ЗП</strong></font> – отношение заработка
застрахованного лица (ЗР) за 2000-2001 г. по данным индивидуального
(персонифицированного) учета либо за любые 60 месяцев подряд из всей трудовой
деятельности до 01.01.2002 г. к среднемесячной зарплате в стране (ЗП) за тот же
период. Данное отношение учитывается в размере не свыше 1,2 за исключением
“северян”, для которых эта величина может быть от 1,4 до 1,9.<strong><br>
<font color="#cc0000">СЗП</font></strong> – средняя зарплата в Российской
Федерации за III квартал 2001 г. равна 1671 рубль</p>
<p>Источник: <a href="http://www.pfrf.ru/labor_old_age_pension/" class="lk2" target="_blank">http://www.pfrf.ru/</a></p>
</div>
<div class="ui-dialog-content info hide" title="Инвестиционный доход от накопительной части пенсии" id="percent_capital_info">
<h3>Инвестиционный доход от накопительной части пенсии</h3>
<p>Граждане, на которых распространяется обязательное пенсионное страхование  (имеющие свидетельство  - «зеленую карточку»)  могут 
    самостоятельно выбрать, кому доверить управление  накопительной частью своей будущей пенсии. Граждане вправе формировать 
    накопительную часть своей будущей пенсии:</p>
<ul>
    <li>
        <p>через Пенсионный фонд Российской Федерации (ПФР), выбрав: </p>
        <p><a href="http://www.pfrf.ru/userdata/invest/uk/perech_uk.xls" class="lk2" target="_blank">управляющую компанию, отобранную по результатам конкурса (УК)</a>. У таких управляющих компаний более широкий перечень активов,
            в которые могут быть размещены Ваши пенсионные накопления, чем у государственной управляющей компании; </p>
        <p><em>государственную управляющую компанию (ГУК) - Внешэкономбанк</em>. ГУК инвестирует средства пенсионных накоплений только
            в государственные ценные бумаги, что является менее доходным, но и менее рискованным видом управления пенсионными накоплениями.</p>
    </li>
    <li>
        <p><a href="http://www.pfrf.ru/userdata/invest/npf/npf.xls" class="lk2" target="_blank">через негосударственные пенсионные фонды (НПФ)</a>,
        одним из видов деятельности которых является пенсионное обеспечение застрахованных лиц, принявших решение формировать накопительную часть
        трудовой пенсии через соответствующий фонд, а также инвестирование средств пенсионных накоплений, предназначенных для выплаты пенсий.</p>
    </li>
</ul>
<p>Источник: <a href="http://www.pfrf.ru/investing/" class="lk2" target="_blank">http://www.pfrf.ru/investing/</a></p>
</div>
<div class="ui-dialog-content info hide" title="Программа государственного софинансирования пенсии" id="gos_finance_info">
<h3>Программа государственного софинансирования пенсии</h3>
<p>Начиная с 1 января 2009 года, россияне могут увеличить свою будущую трудовую пенсию с участием государства. В Российской Федерации
    действует Программа государственного софинансирования пенсии: часть взносов в накопительную часть пенсии платит сам гражданин,
    другую часть – государство.</p>
<p>Программа действует в соответствии с <a href="http://www.pfrf.ru/sofinansirovanie/" class="lk2" target="_blank">Федеральным законом от 30 апреля 2008 г. № 56-ФЗ «О дополнительных страховых взносах на накопительную часть трудовой пенсии и государственной поддержке формирования пенсионных накоплений»</a>.</p>
<p>Вступить в Программу можно до 1 октября 2013 года. Государство будет ежегодно софинансировать Ваши дополнительные пенсионные накопления 
    в пределах от <b>2 000</b> до <b>12 000</b> рублей включительно в течение 10 лет с момента уплаты Вами первых взносов в рамках Программы.
    Вы вправе сами определять и менять размер своих взносов, а также прекратить или возобновить выплаты в любое удобное для Вас время.</p>
<p>Если Вы перечисляете на накопительную часть своей пенсии 2 000 и более рублей в год, государство <b>удваивает</b> эти деньги: 
    на Ваш индивидуальный пенсионный счет будет перечислена такая же сумма в пределах 12 000 рублей в год.</p>
<p>Если Вы перечисляете на накопительную часть своей пенсии <b>менее</b> 2 000 рублей в год, софинансирование пенсии государством <b>не осуществляется</b>.</p>
<p>Источник: <a href="http://www.pfrf.ru/financed_public_pension/" class="lk2" target="_blank">http://www.pfrf.ru/financed_public_pension/</a></p>
</div>

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
	<!--end content -->