<style type="text/css">
<!--
.style1 {
	color: #cc0000;
	font-weight: bold;
}
-->
</style>

<?php
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

//Программа государственного софинансирования пенсии
$gos_finance=intval($_POST["gos_finance"]);


//РАСЧЕТЫ
$eho=1;

$pension=0;
$pens_base=2562; //базовая часть пенсии с 01.01.2010

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
     //при участии в программе гос. софинансирования
     if($gos_finance==1 AND $capital_year_invest>=2000){
        if($capital_year_invest<=12000){
            $capital_year_invest=$capital_year_invest*2;
        }else{
            $capital_year_invest=$capital_year_invest+12000;
        }
     }

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


$pension_capital=($sum_pens + $pens_insurance + $pens_investment)*$t;

//Вывод
?>


<a name="0"></a>

  <p align="center">Ваша будущая пенсия в <b><?php echo($pension_year);?> году</b> приблизительно составит <font style="color:#cc0000; font-size:14px; font-weight:bold;"><?php echo(number_format($pension,0));?> руб</b></font></p>
<div align="right"><input type="button" value="Пересчитать пенсию&raquo;" class="but_pension" onClick="self.location.href='/servis/pensiya/';"></div>
<hr>

<?php
	switch($eho)
	{
		case 0: 
		
		echo('<center><font style="color:#cc0000; font-size:14px"><b>Вы уже на пенсии.<br>Поздравляем с заслуженным отдыхом!</b></font></center>');  
		break;
		
		case 1: 
		
		if ($seniority<5) {
$pension=0;
echo('Основным условием для назначения пенсии является наличие <b>страхового стажа не менее 5 лет.</b> На текущий момент ваша пенсия равна <b>0 руб.</b>/месяц<br><br>');
};

if ($birthday<=1966) {
    echo('Взнос в ПФР, перечисляемый работодателем, на ваш индивидуальный лицевой счет будет полностью состоять из страховой части и составит <b>'.($sal*0.14*12).' руб.</b> за <b>'.$year_today.'</b> год.<br><br>');
} 
else 
{
    if($gos_finance==1){
        $nakop_4ast="в том числе <b>".($capital_year_invest-$sal*0.06*12)." руб.</b> по государственной программе софинансирования;";
    }else{
        $nakop_4ast="";
    }
    echo('
    <p>За <b>'.$year_today.'</b> год взносы в ПФР на Ваш лицевой счет составят:
    <ul>
    <li>накопительная часть - <b>'.$capital_year_invest.' руб.</b> за год, '.$nakop_4ast.'</li>
    <li>страховая часть - <b>'.($sal*0.08*12).' руб.</b> за год.</li>
    </ul></p>');
};
	break;
	}

?>