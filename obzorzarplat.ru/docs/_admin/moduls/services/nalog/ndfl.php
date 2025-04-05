<?php
//Сбор данных
$year_now=date("Y");
$sal=intval($_POST['sal']);
$sal_val=$_POST['sal_val'];
if($sal_val=="mnth"){$sal_year=12*$sal;}
elseif($sal_val=="year"){$sal_year=$sal;}
$tax = $sal_year*0.13; //НДФЛ

$deduction_social=0;
$deduction_social_lim=0;

if($sal==0){echo('Вы не указали заработную плату для расчетов');}
else{

$education=intval($_POST['education']); // На свое обучение
$education_baby=intval($_POST['education_baby']); // На образование детей
$treatment=intval($_POST['treatment']); // На лечение
$treatment_dear=intval($_POST['treatment_dear']); //На дорогое лечение
$welfair=intval($_POST['welfair']); //Благотвор
$pension=intval($_POST['pension']); //пенсионные взносы
$insurance=intval($_POST['insurance']); //страховые взносы

$education_max=120000;
$education_baby_max=50000;
$treatment_max=120000;
$pension_max=120000;
$insurance_max=120000;
$deduction_social_lim_max=120000;//ограничение по совокупности социальных вычетов

//Проверки максимума
if($education>$education_max){$education=$education_max;}
if($education_baby>$education_baby_max){$education_baby=$education_baby_max;}
if($treatment>$treatment_max){$treatment=$treatment_max;}
if($pension>$pension_max) {$pension=$pension_max;}
if($insurance>$insurance_max) {$insurance=$insurance_max;}
if($welfair>0.25*$sal_year) {$welfair=0.25*$sal_year;}

//------------РАСЧЕТЫ-------------------//
//------Расчеты социальных вычетов

//Обучение
$deduction_education=$education*0.13;
if($deduction_education>$tax) {$deduction_education=$tax;}
$deduction_education_baby=$education_baby*0.13;
if($deduction_education_baby>$tax) {$deduction_education_baby=$tax;}

//Лечение
$deduction_treatment=$treatment*0.13;
if($deduction_treatment>$tax) {$deduction_treatment = $tax;}

$deduction_treatment_dear=$treatment_dear*0.13;
if($deduction_treatment_dear>$tax) {$deduction_treatment_dear = $tax;}

//Благотворительность
$deduction_welfair=$welfair*0.13;

//Пенсионные взносы
$deduction_pension=$pension*0.13;
if($deduction_pension>$tax) {$deduction_pension = $tax;}

//Страховые взносы
$deduction_insurance=$insurance*0.13;
if($deduction_insurance>$tax) {$deduction_insurance = $tax;}

$deduction_social_lim=$deduction_education+$deduction_treatment +$deduction_welfair+$deduction_insurance+$deduction_pension;
if($deduction_social_lim>$deduction_social_lim_max*0.13) {$deduction_social_lim=$deduction_social_lim_max*0.13;}
//Вычеты при использовании всех социальных налоговых вычетов
$deduction_social = $deduction_social_lim +$deduction_education_baby +$deduction_treatment_dear;
if($deduction_social>$tax) {$deduction_social=$tax;}

?>
<p align="center">НДФЛ, уплаченный в <?php echo($year_now);?> году составляет <b><?php echo(number_format($tax,0,',',' '));?> руб.</b></p>
<p>Таким образом, Dы сможете уменьшить налогооблагаемую базу и вернуть из бюджета следующие суммы</p>
  <?php
  if($deduction_social!=='0' AND $deduction_social!==''){
      echo('<h3>Социальные налоговые вычеты:</h3><ul>');

    if($education!==0 AND $education!==''){echo('<li><b>'.number_format($deduction_education,0,',',' ').' руб.</b> – за свое обучение;</li>');}
    if($education_baby!==0 AND $education_baby!==''){echo('<li><b>'.number_format($deduction_education_baby,0,',',' ').' руб.</b> – за обучение своего ребенка, которому не исполнилось еще 24 лет;</li>');}
    if($treatment!==0 AND $treatment!==''){echo('<li><b>'.number_format($deduction_treatment,0,',',' ').' руб.</b> – за лечение в этом году;</li>');}
    if($treatment_dear!==0 AND $treatment_dear!==''){echo('<li><b>'.number_format($deduction_treatment_dear,0,',',' ').' руб.</b> – за дорогостоящее лечение в этом году;</li>');}
    if($welfair!==0 AND $welfair!==''){echo('<li><b>'.number_format($deduction_welfair,0,',',' ').' руб.</b> - при перечислении денег на благотворительные цели;</li>');}
    if($pension!==0 AND $pension!==''){echo('<li><b>'.number_format($deduction_pension,0,',',' ').' руб.</b> - при перечислении денег на пенсионные взносы;</li>');}
    if($insurance!==0 AND $insurance!==''){echo('<li><b>'.number_format($deduction_insurance,0,',',' ').' руб.</b> - при перечислении денег на страховые взносы;</li>');}

echo('</ul>
<p>Если вы использовали все указанные виды социальных налоговых вычетов, общая сумма, которая будет вам выплачена из бюджета
составит <b>'.round($deduction_social).' руб.</b></p>');
  }//end if, социальные вычеты


//Имущественные вычеты
$house=intval($_POST['house']); //На строительство
$house_sale=intval($_POST['house_sale']); //Продажа имущества

$house_max=2000000;
$house_sale3_max=1000000; //максимальная сумма от продажи жилья, которым вы владеете менее 3 лет

if($house>$house_max) {$house=$house_max;}

//Расходы на строительство и приобретение жилья
$deduction_house=$house*0.13;
$years=ceil($deduction_house/$tax);//количество лет, когда выплачивается имуществ.вычет
//Доходы от продажи квартиры
$deduction_house_sale=$house_sale*0.13;// вычет при продаже кв. со сроком владения от 3 лет
$house_sale3=$house_sale;
if($house_sale3>$house_sale3_max) {$house_sale3=$house_sale3_max;}
$deduction_house_sale3=$house_sale3*0.13;// вычет при продаже кв. со сроком владения менее 3 лет

  if($deduction_house!=='0' AND $deduction_house!==''){
      echo('<h3>Имущественные налоговые вычеты:</h3><ul>');
      echo('<p>Общий размер имущественного налогового вычета, не может превышать <b>2 000 000 руб.</b> Этот вычет может быть получен
          только один раз. Если в налоговом периоде (один год) он не может быть использован полностью, то остаток суммы вычета переносится
          на последующие периоды до полного ее использования.
<ul>');
if($house!==0 AND $house!==''){echo('<li><b>'.number_format($deduction_house,0,',',' ').' руб.</b> – сумма, которую Вы можете вернуть из бюджета при покупке имущества.</li>
<li><b>'.round($years).'</b> – количество лет, за которые Вам будет выплачена вся сумма.</li>');}
      echo('</ul>');
      if($house_sale!==0 AND $house_sale!==''){
echo('<p>Имущественный налоговый вычет при получении дохода от <em>продажи</em> имущества.</p>
');
echo('<ul>');
echo('<li><b>'.number_format($deduction_house_sale,0,',',' ').' руб.</b> – сумма, которую Вы можете вернуть из бюджета
        при продаже имущества, которым Вы владели <em>более 3-х лет.</em></li>
<li><b>'.number_format($deduction_house_sale3,0,',',' ').' руб.</b> – сумма, которую Вы можете вернуть из бюджета при продаже имущества, которым Вы владели
              <em>менее 3-х лет.</em></li>
</ul>');
}
  }//end if, имущественные вычеты

}//end else ?>