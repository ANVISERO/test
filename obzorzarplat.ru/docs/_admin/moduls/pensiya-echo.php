<style type="text/css">
<!--
.style1 {
	color: #cc0000;
	font-weight: bold;
}
-->
</style>

<?
//Сбор данных
$year_today=date("Y"); //Текущий год

//Год рождения
if(isset($_POST['birthday'])){
  $birthday=$_POST['birthday'];
}else{
  $birthday=0; 
  }

//сумма страховых накоплений
if(isset($_POST['sum_pens'])){
  $sum_pens=$_POST['sum_pens'];
}else{
  $sum_pens=0;
}

//Зарплата
if(isset($_POST['sal'])){
  $sal=$_POST['sal'];
}else{
  $sal=0;
}

//Страховой стаж
if(isset($_POST['seniority'])){
  $seniority_now=$_POST['seniority'];
  if($seniority_now>($year_today-$birthday-18)){$seniority_now=$year_today-$birthday-18;}
}else{
  $seniority_now=0;
}
 
//Пол
if(isset($_POST['sex'])){
  $male=$_POST['sex'];
}else{
  $male=1;
}
 
if($male==1){$male_name="Мужской";}else{$male_name="Женский";}

//Процент накопительной части
if(isset($_POST['percent_capital'])){
  $percent_capital = $_POST['percent_capital']/100; 
  if($percent_capital>1){$percent_capital=1;}
}else{
  $percent_capital=0;
}



//РАСЧЕТЫ
$eho=1;

$pension=0;
$pens_base=1950; //базовая часть пенсии с 1 марта 2009

if($male==1)
{
$seniority_min=25;
$age_max=60;
}
else{
$seniority_min=20;
$age_max=55;
}
$seniority_max=$age_max-18;

$pension_year=$birthday+$age_max;

if ($pension_year<=$year_today)
{$eho=0;}

switch($pension_year)
     {
          case 2008: $t=180; break;
          case 2009: $t=186; break;
          case 2010: $t=192; break;
          case 2011: $t=204; break;
          case 2012: $t=216; break;
          default: $t=228;
     }
     
     $years=$pension_year-$year_today; //осталось до пенсии
     
     $seniority=$seniority_now+$years; //страховой стаж (стаж на данный момент + кол-во лет до пенсии)

/********************************************************************************
Расчет страховой части
********************************************************************************/

     if ($birthday>=1967) {$percent=0.08;} else {$percent=0.14;}
     
     $i=1;
     $investment=1.1;
     $capital_year_insur=$sal*$percent*12; //ежегодные отчисления в ПФР
     $capital_insur=$capital_year_insur;
    

     while($i<=($years)) {
    	$capital_insur=$capital_insur*$investment+$capital_year_insur;
     	$i++;}
     
     $pens_insurance=$capital_insur/$t;

/********************************************************************************
Расчет накопительной части
********************************************************************************/

     if ($birthday>=1967) 
     {
     $percent=0.06;
     $investment=1+$percent_capital;
     $i=1;
     $capital_year_invest=$sal*$percent*12;
     $capital_invest=$capital_year_invest;

          while($i<=($years)) {
          	$capital_invest=$capital_invest*$investment+$capital_year_invest;
          	$i++;}

     $pens_investment=$capital_invest/$t;
     } 
else
{
     $pens_investment=0;
}

$pension =$pens_base + $pens_insurance + $pens_investment; 


$pension_capital=( $sum_pens + $pens_insurance + $pens_investment)*$t;

//Вывод
?>


<a name="0"></a>
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
<tr>
<td width="50%" align="right">Год рождения</td>
<td><b><?=$birthday;?></b></td>
</tr>
<tr>
<td width="50%" align="right">Сумма пенсионных накоплений</td>
<td><b><?=number_format($sum_pens);?> руб</b></td>
</tr>
<tr>
<td width="50%" align="right">Зарплата</td>
<td><b><?=number_format($sal);?> руб/месяц</b></td>
</tr>
<tr>
  <td width="50%" align="right">Страховой стаж на текущий момент (годы)</td>
  <td><b><?=$seniority_now;?> </b></td>
</tr>
<tr>
  <td width="50%" align="right">Пол</td>
  <td><b><?=$male_name;?></b></td>
</tr>
<tr>
  <td width="50%" align="right">Инвестиционный доход</td>
  <td><b><?=($percent_capital*100);?> % в год</b></td>
</tr>
<tr>
  <td width="50%" align="right">Ваша будущая пенсия приблизительно составит</td>
  <td><font style="color:#cc0000; font-size:14px"><b><?=number_format($pension);?> руб</b></font></td>
</tr>
</table>
<br>
<div align="right"><input type="button" value="Рассчитать свою пенсию >>" class="but_pension" onClick="self.location.href='/servis/pensiya/';"></div>
<br><br>

<noindex>
<a name="1"></a><center><h1 class="title">Приблизительный расчет трудовой пенсии по старости.</h1></center>
<br><br>

<?
	switch($eho)
	{
		case 0: 
		
		echo('<center><font style="color:#cc0000; font-size:14px"><b>Вы уже на пенсии.<br>Поздравляем с заслуженным отдыхом!</b></font></center>');  
		break;
		
		case 1: 

echo('Работодатель перечисляет за вас страховой взнос в Пенсионный Фонд России (ПФР) в размере 14% от заработка, разбивая его, как правило, на две части. Этот взнос может делиться на страховую часть и накопительную.
<br><br>');
		
		if ($seniority<5) {
$pension=0;
echo('Основным условием для назначения пенсии является наличие <b>страхового стажа не менее 5 лет.</b> На текущий момент ваша пенсия равна <b>0 руб.</b>/месяц<br><br>');
};

if ($birthday<=1966) {
echo('Взнос в ПФР, перечисляемый работодателем, на ваш индивидуальный лицевой счет будет полностью состоять из страховой части и составит <b>'.($sal*0.14*12).' руб.</b> за <b>'.$year_today.'</b> год.<br><br>');
} 
else 
{
echo('
<br>За <b>'.$year_today.'</b> год ваши взносы в ПФР составят:<br>
Накопительная часть вашего взноса - <b>'.($sal*0.06*12).' руб.</b> за год,<br>
страховая часть - <b>'.($sal*0.08*12).' руб.</b> за год.<br><br>');
}

echo('Вы достигнете пенсионного возраста в <b>'.$pension_year.'</b> году. К этому году ваш пенсионный капитал приблизительно составит <b>'.number_format($pension_capital).'</b> руб.<br><br>
');
echo('Итак, ваша будущая пенсия в <b>'.$pension_year.'</b> году по приблизительным расчетам может составить<b>'.number_format($pension).' руб./месяц.</b><br><br>');
	break;
	}

?>
<!--ОБЩАЯ ТЕОРИЯ -->

Трудовая пенсия по старости может состоять из трех частей:
<ol>
<li><strong>Базовой</strong>
<li><strong>Страховой</strong>
<li><strong>Накопительной</strong>
</ol>

<hr>
<font style="font-size:14px"><em><strong>Базовая часть.</strong></em></font>
<br><br>
Первая часть пенсии – базовая часть (БЧ) – в настоящее время гарантируется государством каждому человеку, имеющему трудовой стаж более пяти лет. Она установлена законом в размере <strong>1950 рублей </strong>(с 1 марта 2009 года).
<br><br>

<hr>
<font style="font-size:14px"><em><strong>Страховая часть.</strong></em></font>
<br><br>
Размер страховой части (СЧ) трудовой пенсии определяется по формуле:
<center><strong>СЧ=ПК/Т,</strong></center>
где:<br>
<strong>СЧ </strong>– страховая часть трудовой пенсии по старости;<br>
<strong>ПК</strong> – сумма расчетного пенсионного капитала, который исчисляется исходя из страховой части взноса;<br>
<strong>Т</strong> – количество месяцев ожидаемого периода выплаты трудовой пенсии по старости, применяемой для расчета страховой части трудовой пенсии.
<br><br>
Коэффициент <strong>Т</strong> составляет от 12 лет (144 мес.) до 19 лет (228 мес.). Эта величина не означает, что пенсионеру будет выплачиваться пенсия только в течение 12 или 19 лет, она применяется исключительно для расчета.
<br><br>

<hr>
<font style="font-size:14px"><em><strong>Накопительная часть.</strong></em></font>
<br><br>
Размер накопительной части трудовой пенсии по старости определяется по формуле:
<center><strong>НЧ = ПН/Т;</strong></center>
где:<br>
<strong>НЧ</strong> – размер накопительной части трудовой пенсии;<br>
<strong>ПН</strong> – сумма пенсионных накоплений застрахованного лица, учтенных в специальной части его индивидуального лицевого счета по состоянию на день, с которого ему назначается накопительная часть трудовой пенсии по старости;<br>
<strong>Т</strong> – количество месяцев ожидаемого периода выплаты трудовой пенсии по старости, применяемой для расчета накопительной части трудовой пенсии.
<br><br>
В соответствии с пенсионным законодательством накопительная часть страхового взноса в ПФР должна быть инвестирована. Другими словами, эти деньги должны работать и приносить доход застрахованному лицу. Этот доход плюс сумма перечисленных работодателем за вас страховых взносов на формирование накопительной части пенсии и составят сумму  пенсионных накоплений.
<br><br>
Исчисление третьей части пенсии можно сделать весьма приблизительно, так как рассчитать сумму инвестиционного дохода на несколько лет вперед практически невозможно. 
<br><br>
Предполагается, что ваш инвестиционный доход будет составлять 10% годовых.</noindex>
<br><br>
<input type="button" value="<< Назад" class="but" onClick="self.location.href='/servis/pensiya/';">
<input type="button" value="Вверх" class="but" onClick="self.location.href='#0';">