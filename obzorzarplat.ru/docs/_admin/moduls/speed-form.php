<style>
input.pol_1{ border:0px; text-align:center; font-family:georgia; width:120px}
input.pol_2{ border:0px; text-align:center; font-family:georgia; font-weight:bold; color:#cc0000; width:120px}
select.pol_3{font-family:georgia; font-size:13px}
</style>
<script>
var sumsec=0;
var sumsec2=0;
var tick;
var sal2=54000000;
function sal_mil(targ,selObj)
{ 
sal2=selObj.options[selObj.selectedIndex].value;
}

function stop() {
sumsec=0;
sumsec2=0;
clearTimeout(tick);
}

function usnotime(){
if(document.rclock.sal.value>130000000000){document.rclock.sal.value=130000000000;}

var inhoar=document.rclock.sal.value/166;
var insec=document.rclock.sal.value/597600;

var inhoar2=sal2/166;
var insec2=sal2/597600;

sumsec+=insec;
sumsec2+=insec2;

document.rclock.inhoar.value=(Math.round(inhoar*100))/100 + ' руб.';
document.rclock.insec.value=(Math.round(sumsec*100))/100 + ' руб.';

document.rclock.inhoar2.value=(Math.round(inhoar2*100))/100 + ' руб.';
document.rclock.insec2.value=(Math.round(sumsec2*100))/100 + ' руб.';
tick=setTimeout('usnotime()',1000);
}
</script>


<center><b>С какой скоростью я зарабатываю?</b></center>
<br>
<form name="rclock" style="margin:0px; padding:0px">

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td colspan="2" align="left"><font style="color:#cc0000"><b>ВАШ ЗАРАБОТОК</b></font></td>
    <td width="120" align="center"><strong>В час Вы зарабатываете</strong></td>
    <td width="120" align="center"><strong>Вы уже заработали</strong></td>
  </tr>
  <tr>
    <td width="100" align="right"><strong>Зарплата</strong></td>
    <td><input name="sal" type="text" class="text" value="20000" maxlength="12"> руб/мес</td>
    <td width="120" align="center"><input type="text" name="inhoar" value="0. руб." class="pol_1"></td>
    <td width="120" align="center"><input type="text" name="insec" value="0. руб." class="pol_2"></td>
  </tr>  
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td align="left"><font style="color:#cc0000"><b>ВЫБЕРИТЕ ДЛЯ СРАВНЕНИЯ</b></font></td>
    <td width="120" align="center"><strong>В час зарабатывает</strong></td>
    <td width="120" align="center"><strong>Уже заработал</strong></td>
  </tr>
  <tr>
    <td align="left"><select name="millioner" class="pol_3" onchange="sal_mil('parent',this)">


<option value="2800000">Александр Кержаков, 2.8 млн.руб./мес.</option>
<option value="7600000">Александр Овечкин, 7.6 млн.руб./мес.</option>
<option value="9000000">Алексей Ковалев, 9 млн.руб./мес.</option>
<option value="3400000">Алексей Смертин, 3.4 млн.руб./мес.</option>
<option value="15200000">Алексей Яшин, 15.2 млн.руб./мес.</option>
<option value="7000000">Алла Пугачева, 7 млн.руб./мес.</option>
<option value="5200000">Андрей Аршавин, 5.2 млн.руб./мес.</option>
<option value="24800000">Андрей Кириленко, 24.8 млн.руб./мес.</option>
<option value="4400000">Анна Нетребко, 4.4 млн.руб./мес.</option>
<option value="3400000">Борис Акунин, 3.4 млн.руб./мес.</option>
<option value="7000000">Валерий Гергиев, 7 млн.руб./мес.</option>
<option value="5400000">Валерий Меладзе, 5.4 млн.руб./мес.</option>
<option value="7000000">Валерия, 7 млн.руб./мес.</option>
<option value="10000000">Венус Уильямс, 10 млн.руб./мес.</option>
<option value="5000000">Вячеслав Полунин, 5 млн.руб./мес.</option>
<option value="2800000">Группа "t.A.T.u", 2.8 млн.руб./мес.</option>
<option value="5200000">Группа "Дискотека Авария", 5.2 млн.руб./мес.</option>
<option value="4200000">Группа "Звери", 4.2 млн.руб./мес.</option>
<option value="3200000">Дарья Донцова, 3.2 млн.руб./мес.</option>
<option value="3200000">Денис Мацуев, 3.2 млн.руб./мес.</option>
<option value="32000000">Дженифер Энистон, 32 млн.руб./мес.</option>
<option value="8200000">Дима Билан, 8.2 млн.руб./мес.</option>
<option value="54000000">Дэвид Бекхэм, 54 млн.руб./мес.</option>
<option value="4000000">Евгений Малкин, 4 млн.руб./мес.</option>
<option value="10000000">Евгений Набоков, 10 млн.руб./мес.</option>
<option value="2800000">Евгений Плющенко, 2.8 млн.руб./мес.</option>
<option value="3000000">Егор Титов, 3 млн.руб./мес.</option>
<option value="2600000">Жанна Фриске, 2.6 млн.руб./мес.</option>
<option value="2200000">Земфира, 2.2 млн.руб./мес.</option>
<option value="4000000">Илья Авербух, 4 млн.руб./мес.</option>
<option value="10000000">Илья Ковальчук, 10 млн.руб./мес.</option>
<option value="3200000">Кристина Орбакайте, 3.2 млн.руб./мес.</option>
<option value="2400000">Ксения Собчак, 2.4 млн.руб./мес.</option>
<option value="3000000">МакSим, 3 млн.руб./мес.</option>
<option value="5800000">Максим Галкин, 5.8 млн.руб./мес.</option>
<option value="46000000">Мария Шарапова, 46 млн.руб./мес.</option>
<option value="3000000">Михаил Южный, 3 млн.руб./мес.</option>
<option value="5600000">Наталья Водянова, 5.6 млн.руб./мес.</option>
<option value="2800000">Никита Михалков, 2.8 млн.руб./мес.</option>
<option value="5000000">Николай Басков, 5 млн.руб./мес.</option>
<option value="10400000">Николай Валуев, 10.4 млн.руб./мес.</option>
<option value="5600000">Николай Давыденко, 5.6 млн.руб./мес.</option>
<option value="13600000">Николай Хабибулин, 13.6 млн.руб./мес.</option>
<option value="2600000">Олег Газманов, 2.6 млн.руб./мес.</option>
<option value="6200000">Олег Маскаев, 6.2 млн.руб./мес.</option>
<option value="14000000">Риз Уизерспун, 14 млн.руб./мес.</option>
<option value="3200000">Светлана Кузнецова, 3.2 млн.руб./мес.</option>
<option value="9000000">Сергей Гончар, 9 млн.руб./мес.</option>
<option value="12200000">Сергей Федоров, 12.2 млн.руб./мес.</option>
<option value="2600000">Сергей Шнуров, 2.6 млн.руб./мес.</option>
<option value="16000000">Серена Уильямс, 16 млн.руб./мес.</option>
<option value="76000000">Сестры Олсен, 76 млн.руб./мес.</option>
<option value="28000000">Скарлетт Йоханссон, 28 млн.руб./мес.</option>
<option value="8800000">труппа Comedy Club, 8.8 млн.руб./мес.</option>
<option value="3800000">Федор Бондарчук, 3.8 млн.руб./мес.</option>
<option value="6800000">Филипп Киркоров, 6.8 млн.руб./мес.</option>
<option value="2600000">Юрий (Гоша) Куценко, 2.6 млн.руб./мес.</option>
</select>
</td>
    <td width="120" align="center"><input type="text" name="inhoar2" value="0. руб." class="pol_1"></td>
    <td width="120" align="center"><input type="text" name="insec2" value="0. руб." class="pol_2"></td>
  </tr>  
</table>
<br><br>
<center><input type="button" class="but" value="Пуск!" onClick="usnotime();"> <input type="button" class="but" value="Стоп!" onClick="stop();"></center>
</form>
<hr>
<center><b>Сколько Биг-Маков я уже заработал?</b></center>
&nbsp;&nbsp;&nbsp;&nbsp;Наш сайт облегчает Вам жизнь, переводя зарплату в натуральные предметы. С его помощью Вы легко узнаете, сколько Вы заработали хот-догов, пока читали этот текст! Вы также можете узнать с какой скоростью Вы зарабатываете на свой Rolls-Roys Centenary Phantom.    
<br><br>
<div align="right"><input type="button" class="but" value="Узнать!" onClick="self.location.href='/servis/bigmak/'"></div>
