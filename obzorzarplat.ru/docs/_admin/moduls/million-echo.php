<input type="button" value="<< Назад" class="but" onClick="self.location.href='/servis/million/';">
<br><br>
<?
//Сбор данных
$sal=$_POST['sal']; //Зарплата
$rate_sal=$_POST['rate_sal']+($_POST['rate_sal_dr']/100); //Увелечение зп в год
$age=$_POST['age']; //Возраст
$econom=$_POST['econom']; //Сбережения
$rate=$_POST['rate']+($_POST['rate_dr']/100); // Процент банка
$sav=$_POST['sav']; // Откладывает в год рублей
?>

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
<tr>
<td width="344" height="50" align="right">Зарплата в настоящее время</td>
<td width="603"><b><?=$sal;?> руб</b></td>
<td width="260" colspan="2" rowspan="6"><img src="/_img/milliion.gif" width="277" height="277"></td>
</tr>
<tr>
<td width="344" align="right">Ежегодное увеличение зарплаты</td>
<td><b><?=$rate_sal;?> %</b></td>
</tr> 
<tr>
<td width="344" align="right">Сбережения</td>
<td><b><?=$econom;?> руб</b></td>
</tr>   
<tr>
<td width="344" align="right">Процентная ставка</td>
<td><b><?=$rate;?> %/год</b></td>
</tr>  
<tr>
<td width="344" align="right">Возраст</td>
<td><b><?=$age;?> лет</b></td>
</tr>  
<tr>
<td width="344" align="right" valign="top">Вы откладываете в год</td>
<td height="60" valign="top"><b><?=$sav;?> руб</b></td>
</tr>
<tr>
  <td height="93" colspan="4" align="right" valign="top"><div align="left"></div>    <?
if($econom>=1000000)
{
echo('
<center>
<br>
<font style="color:#cc0000"><b>Поздравляем! Вы уже миллионер!</b></font>
</center>
');
}
else
{
if($sal>=1000000)
{
echo('
<center>
<br>
<font style="color:#cc0000"><b>Вы станете миллионером сразу после получения зарплаты!</b></font>
</center>
');
}
else
{
//Расчет
$age_mil=0;
$econom_1=$econom;
$age_1=$age;
$rate_1=$rate;
$sav_1=$sav;
while ($econom_1<1000000){
$econom_1=$econom_1*(1+$rate_1/100)+$sav_1;
$age_1++;
$age_mil=$age_1;
if($age_mil>=150){break;}
}


$sal_2=$sal;
$sav_2=$sav;
$age_2=$age;
$rate_2=$rate;
$rate_sal_2=$rate_sal;
$econom_2=$econom;

$sal_2=$sal_2*12; // зарплата за год
$percent=$sav_2/$sal_2;  //откладываем процент от зарплаты
while($econom_2<1000000){
$econom_2=$econom_2*(1+$rate_2/100)+$sav_2;
$sal_2=$sal_2*(1+$rate_sal_2/100);
$sav_2=$sal_2*(1+$rate_sal_2/100)*$percent;
$age_2++;
$age_mil2=$age_2;
if($age_mil2>=150){break;}
}
//Вывод данных

$proc=round(($sav/($sal*12))*100);
echo('
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;Если вы будет продолжать откладывать <b>'.$sav.'</b> руб/год, не растрачивая при этом накопленное, вы станете миллионером к <font style="font-size:16px; color:#cc0000"><b>'.$age_mil.'</b></font> годам.
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;Если вы будете откладывать <b>'.$proc.'</b>% от вашей зарплаты, то с учетом ее повышения, вы сумеете накопить ваш миллион к <font style="font-size:16px; color:#cc0000"><b>'.$age_mil2.'</b></font> годам.
<br><br>');

$wid_1=$wid_2=200;
$otn=$age_mil/$age_mil2;
if($otn>=1){$wid_1=200; $wid_2=200/$otn;}
if($otn<1){$wid_2=200; $wid_1=200*$otn;}

echo('<b>Диаграмма:</b><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="250" align="right" valign="middle">Откладывая <b>'.$sav.'</b> руб/год</td>
    <td valign="middle"><img src="/_img/r_dot.gif" width="'.$wid_1.'" height="14" align="absmiddle"> <b>'.$age_mil.'</b> лет</td>
  </tr>
  <tr>
    <td width="250" align="right" valign="middle">Откладывая <b>'.$proc.'</b> %/год</td>
    <td valign="middle"><img src="/_img/b_dot.gif" width="'.$wid_2.'" height="14" align="absmiddle"> <b>'.$age_mil2.'</b> лет</td>
  </tr>
</table>');
}
}
?></td>
  </tr> 
  </table>


