<input type="button" value="<< Back" class="but" onClick="self.location.href='/eng/servis/million/';">
<br><br>
<?
//Сбор данных
$sal=$_POST['sal']; //Зарплата
$rate_sal=$_POST['rate_sal']; //Увелечение зп в год
$age=$_POST['age']; //Возраст
$econom=$_POST['econom']; //Сбережения
$rate=$_POST['rate']+($_POST['rate_dr']/100); // Процент банка
$sav=$_POST['sav']; // Откладывает в год рублей
?>

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
<tr>
<td width="200" align="right">Actual Salary</td>
<td><b><?=$sal;?> rub</b></td>
</tr>
<tr>
<td width="200" align="right">Salary year progress</td>
<td><b><?=$rate_sal;?> %</b></td>
</tr> 
<tr>
<td width="200" align="right">Savings</td>
<td><b><?=$econom;?> rub</b></td>
</tr>   
<tr>
<td width="200" align="right">Interest of bank loans</td>
<td><b><?=$rate;?> %/year</b></td>
</tr>  
<tr>
<td width="200" align="right">Age</td>
<td><b><?=$age;?> year</b></td>
</tr>  
<tr>
<td width="200" align="right">How much do You put away in a year</td>
<td><b><?=$sav;?> rub</b></td>
</tr> 
  </table>


<?
if($econom>=1000000)
{
echo('
<center>
<br>
<font style="color:#cc0000"><b>Congratulate! You are Millioner already!</b></font>
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
<font style="color:#cc0000"><b>You will become a Millioner when You will get Your next salary!</b></font>
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
&nbsp;&nbsp;&nbsp;&nbsp;If You will put away <b>'.$sav.'</b> rub/month, in a year without spending money You save You will become a Millioner in <font style="font-size:16px; color:#cc0000"><b>'.$age_mil.'</b></font> years.
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;If You will put away <b>'.$proc.'</b>% of Your salary than You will become a Millioner in <font style="font-size:16px; color:#cc0000"><b>'.$age_mil2.'</b></font> years in case that Your salary is rising.
<br><br>');

$wid_1=$wid_2=200;
$otn=$age_mil/$age_mil2;
if($otn>=1){$wid_1=200; $wid_2=200/$otn;}
if($otn<1){$wid_2=200; $wid_1=200*$otn;}

echo('<b>Diagram:</b><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="250" align="right" valign="middle">Putting away <b>'.$sav.'</b> rub/month</td>
    <td valign="middle"><img src="/_img/r_dot.gif" width="'.$wid_1.'" height="14" align="absmiddle"> <b>'.$age_mil.'</b> years</td>
  </tr>
  <tr>
    <td width="250" align="right" valign="middle">Putting away <b>'.$proc.'</b> %/year</td>
    <td valign="middle"><img src="/_img/b_dot.gif" width="'.$wid_2.'" height="14" align="absmiddle"> <b>'.$age_mil2.'</b> years</td>
  </tr>
</table>');
}
}
?>


