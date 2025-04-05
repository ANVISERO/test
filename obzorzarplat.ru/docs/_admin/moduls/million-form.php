<br>
<form name="zp" method="post" action="?step=2" onsubmit="return testform();">
<table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#FF0000" bgcolor="#FFFFFF"  style="border:1px solid #999">
  <tr>
    <td width="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="308" align="right" bgcolor="#FFFFFF"><strong>&#1042;&#1072;&#1096;&#1072; &#1079;ар&#1072;&#1073;&#1086;&#1090;&#1085;&#1072;&#1103; плата</strong></td>
    <td width="423" bgcolor="#FFFFFF"><input type="text" class="text" name="sal" value="20000"> руб/мес</td>
    <td width="462" rowspan="7"><img src="/_img/million_2.jpg" width="460" height="276"></td>
  </tr>
   <tr>
     <td width="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="308" align="right" bgcolor="#e0e0e0">Ежегодное увеличение зарплаты</td>
    <td bgcolor="#e0e0e0"><input style="text-align:right" name="rate_sal" type="text" class="text" value="0" size="3" maxlength="3">.<input name="rate_sal_dr" type="text" class="text" value="00" size="2" maxlength="2">
    %</td>
    </tr>
     <tr>
       <td width="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="308" align="right" bgcolor="#FFFFFF"><strong>&#1042;озраст</strong></td>
    <td bgcolor="#FFFFFF"><input type="text" class="text" name="age" value="25"> лет</td>
    </tr>
      <tr>
        <td width="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="308" align="right" bgcolor="#e0e0e0"><strong>Сбережения</strong></td>
    <td bgcolor="#e0e0e0"><input type="text" class="text" name="econom" value="0"> руб</td>
    </tr>   
        <tr>
          <td width="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="308" align="right">Процентная ставка банка</td>
    <td>
	<input style="text-align:right" name="rate" type="text" class="text" value="10" size="2" maxlength="2">.<input name="rate_dr" type="text" class="text" value="00" size="2" maxlength="2"> 
    %/год</td>
    </tr> 
          <tr>
            <td width="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="308" align="right" bgcolor="#e0e0e0">В среднем в год вы откладываете</td>
    <td bgcolor="#e0e0e0"><input type="text" class="text" name="sav" value="0"> руб</td>
    </tr> 
           <tr>
             <td width="2" align="right" bgcolor="#FFFFFF"></td>
    <td width="308" align="right"></td>
    <td><input type="submit" class="but" value="Рассчитать!"></td>
    </tr>  
</table>
</form>
<script>
function testform()
{
var reg = new RegExp("^\\d+$");

if (!(reg.test(document.zp.sal.value))) {window.alert('Вводите только цифры');return false;}
if (!(reg.test(document.zp.rate.value))) {window.alert('Вводите только цифры');return false;}
if (!(reg.test(document.zp.rate_dr.value))) {window.alert('Вводите только цифры');return false;}
if (!(reg.test(document.zp.rate_sal.value))) {window.alert('Вводите только цифры');return false;}
if (!(reg.test(document.zp.rate_sal_dr.value))) {window.alert('Вводите только цифры');return false;}
if (!(reg.test(document.zp.age.value))) {window.alert('Вводите только цифры');return false;}
if (!(reg.test(document.zp.econom.value))) {window.alert('Вводите только цифры');return false;}
if (!(reg.test(document.zp.sav.value))) {window.alert('Вводите только цифры');return false;}

if (  ((document.zp.sal.value)*12) < (document.zp.sav.value))
{window.alert('Вы не можете откладывать больше чем зарабатываете');return false;}

if ((document.zp.sal.value==0) & (document.zp.econom.value==0))
{window.alert('У вас должны быть сбережения или зарплата');return false;}

if ((document.zp.econom.value==0) & (document.zp.sav.value==0))
{window.alert('Ничего не откладывая, Вы не накопите миллион');return false;}

if ((document.zp.rate.value==0) & (document.zp.sav.value==0))
{window.alert('Ничего не откладывая Вы не накопите миллион, если у Вас нет сбережений');return false;}

}
</script>
