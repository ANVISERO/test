<!--content -->
<style type="text/css">
<!--
.style4 {font-size:16px; font-weight:bold; text-align:center; color:#fff; text-decoration:none;}
-->
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="6" style="border:1px #FF0000">
  <td width="50%"><tr>
<td height="62" colspan="2" valign="top">
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
<center>
</center>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
 
  <tr>
    <td width="345" align="right">&nbsp;</td>
    <td width="328" bgcolor="#FFFFFF">&nbsp;</td>
    <td rowspan="7"><div align="right"><span class="style14"><span class="style2"><img src="/_img/pensiya.jpg" width="299" height="200"></span></span></div></td>
  </tr>
  <tr>
    <td align="right"><strong>Выберите год рождения</strong></td>
    <td width="328" bgcolor="#e0e0e0"><select class="text_form" name="birthday" style="width:150px; height:15px">
      <option value="">--- выбрать ---</option>
      <?
     $year_today=date("Y"); //Текущий год
     $year_begin=1950;
      for($i=$year_begin;$i<=$year_today-18;$i++){
        echo('<option value="'.$i.'">'.$i.'</option>');
      }
      ?>
      </tr>
  <tr>
    <td width="345" align="right"><strong>Введите сумму пенсионных накоплений:</strong></td>
    <td><input type="text" class="text" name="sum_pens" value="0" style="width:150px; height:15px" onFocus="if(this.value==0){value='';}" 
     onBlur="if(this.value==''){value=0;}"> руб</td>
    </tr>
 <tr>
    <td width="345" align="right"><strong>Введите зарплату:</strong></td>
    <td bgcolor="#e0e0e0"><input type="text" class="text" name="sal" value="20000" onFocus="if(this.value==20000){value='';}" 
     onBlur="if(this.value==''){value=20000;}" style="width:150px; height:15px" /> руб/месяц</td>
    </tr>
    <tr>
    <td width="345" align="right"><strong>Ваш пол</strong></td>
    <td>
<label><input type="radio" name="sex" value="1" checked="checked">М</label>
<label><input type="radio" name="sex" value="0">Ж</label></td>
    </tr>
    <tr>
    <td width="345" align="right"><strong>Введите ваш страховой стаж на текущий момент:</strong></td>
    <td bgcolor="#e0e0e0"><input name="seniority" type="text" class="text" value="0" size="3" maxlength="3" style="width:150px; height:15px" onFocus="if(this.value==0){value='';}" 
     onBlur="if(this.value==''){value=0;}"> лет</td>
    </tr>
  <tr>
    <td align="right">
	
      <div align="left"><strong>Введите ваш инвестиционный доход от накопительной части пенсии **</strong> </div>      </td>
    <td align="right"><div align="left">
      <input name="percent_capital" type="text" class="text" size="5" maxlength="5" value="10" style="width:150px; height:15px" onFocus="if(this.value==10){value='';}" 
     onBlur="if(this.value==''){value=10;}"> % в год</div></td>
    </tr>
  <tr>
    <td></td>
    <td align="right" bgcolor="#FFFFFF"><div align="left" class="style3">
      <div align="center"><span class="style3 style9">
        <input name="submit" type="submit" class="but_form" value="Расcчитать!">
      </span></div>
    </div>      </td>
    </tr>
  <style type="text/css">
<!--
.style1 {color: #666666}
-->
</style>
<style type="text/css">
<!--
.style1 {
	color: #666666;
	font-weight: bold;
	font-style: italic;
}
.style3 {color: #666666}
.style4 {color: #666666}
.style5 {color: #CCCCCC}
-->
</style>
<style type="text/css">
<!--
.style1 {
	color: #666666;
	font-weight: bold;
	font-style: italic;
}
.style3 {color: #666666}
.style6 {color: #999999}
-->
</style>
 <tr>
    <td colspan="3" align="right" style="border-top:1px solid #ccc;"><div align="left" class="style3 style15"><em><strong>* В страховой стаж включаются: </strong> </em> 
      <div align="left" class="style16">
        <ol>
          <li>работа по трудовому договору; </li>
          <li><em>государственная гражданская или муниципальная служба; </em></li>
          <li><em>иная деятельность, в течение которой вы подлежали обязательному социальному страхованию на случай временной нетрудоспособности и в связи с материнством. </em></li>
        </ol>
      </div>
      </div>
  </td>
</tr> 
<tr>
  <td colspan="3" align="right"><p align="left" class="style3 style15">Право на трудовую пенсию по старости имеют:</p>
    <div align="left">
<ul>
              <li><span class="style18 style3">Мужчины в возрасте 60 лет при страховом стаже не менее 5 лет. </span> </li>
              <li><span class="style18 style3">Женщины в возрасте 55 лет при страховом стаже не менее 5 лет.</span></li>
              <li><span class="style18 style3">Отдельные категории граждан имеют право на досрочное назначение трудовой пенсии при условиях, предусмотренных законодательством.</span><font class="style18" style="font-size:10px; font-weight:normal; font-style:normal; text-decoration:none; color:#494949"></font></span></li>
            </ul>
        </div></td>
        <td width="0" class="style6"></td>
      </tr>
    <tr>
    <td colspan="3" align="right" bgcolor="#FFFFFF">
	
      <div align="left" class="style18">
        <p class="style3">** В соответствии с пенсионным законодательством накопительная часть страхового взноса в ПФР должна быть инвестирована </p>
        <p><noindex><span style="color: #666666"><span style=""><span style=""><font style="font-size:14px">Страховая часть.</font> <br>
            <br>
Размер страховой части (СЧ) трудовой пенсии определяется по формуле: </span></span></span>
        <center class="style3">
СЧ=ПК/Т,
</center>
          <span class="style3">где:<br>
СЧ – страховая часть трудовой пенсии по старости;<br>
ПК – сумма расчетного пенсионного капитала, который исчисляется исходя из страховой части взноса;<br>
Т – количество месяцев ожидаемого периода выплаты трудовой пенсии по старости, применяемой для расчета страховой части трудовой пенсии. <br>
          <br>
Коэффициент Т составляет от 12 лет (144 мес.) до 19 лет (228 мес.). Эта величина не означает, что пенсионеру будет выплачиваться пенсия только в течение 12 или 19 лет, она применяется исключительно для расчета. </span><span class="style1"><br>
<br>
        </span></noindex></p>
        <hr>
        <span class="style3"><font style="font-size:14px">Накопительная часть.</font> <br>
        <br>
Размер накопительной части трудовой пенсии по старости определяется по формуле: </span>
        <center class="style3">
НЧ = ПН/Т;
</center>
        <span class="style3">где:<br>
НЧ – размер накопительной части трудовой пенсии;<br>
ПН – сумма пенсионных накоплений застрахованного лица, учтенных в специальной части его индивидуального лицевого счета по состоянию на день, с которого ему назначается накопительная часть трудовой пенсии по старости;<br>
Т – количество месяцев ожидаемого периода выплаты трудовой пенсии по старости, применяемой для расчета накопительной части трудовой пенсии. <br>
        <br>
В соответствии с пенсионным законодательством накопительная часть страхового взноса в ПФР должна быть инвестирована. Другими словами, эти деньги должны работать и приносить доход застрахованному лицу. Этот доход плюс сумма перечисленных работодателем за вас страховых взносов на формирование накопительной части пенсии и составят сумму пенсионных накоплений. <br>
<br>
Исчисление третьей части пенсии можно сделать весьма приблизительно, так как рассчитать сумму инвестиционного дохода на несколько лет вперед практически невозможно. <br>
<br>
Предполагается, что ваш инвестиционный доход будет составлять 10% годовых.</span></div>
</td>
    </tr>
</table>
</form>
<script>
function testform()
{
var reg = new RegExp("^\\d+$");
if (!(reg.test(document.zp.sal.value))) {window.alert('Вводите только цифры');return false;}

if (document.zp.birthday.value==""){window.alert('Вы не выбрали год рождения');return false;}
if (document.zp.sal.value==""){window.alert('Вы не указали зарплату');return false;}
if (document.zp.capital.value==""){window.alert('Вы не указали пенсионный капитал');return false;}
}
</script><div align="right">
  
</div></td>
</tr>
</table>
	<!--end content -->