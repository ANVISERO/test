<style type="text/css">
<!--
.style2 {font-size: 12px; color: #595959;}
-->
</style>
<center><b>Рассчитайте свои пособия</b></center>
<br>

<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
  <table width="100%" border="0" cellpadding="6" cellspacing="0"  style="border:1px solid #999">
    <tr>
      <td height="15" align="right" valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
      <td rowspan="5" valign="middle"> <div align="center"><img src="/_img/lgot.jpg" width="149" height="234"></div></td>
    </tr>
    <tr>
      <td width="110" height="20" align="right" valign="bottom" bgcolor="#FFFFFF"><strong>Введите Вашу среднюю зарплату</strong></td>
      <td valign="middle" bgcolor="#e0e0e0"><input type="text" class="text" name="sal" value="20000" onFocus="if(this.value==20000){value='';}" 
     onBlur="if(this.value==''){value=20000;}" style="width:150px; height:15px"/> руб/месяц</td>
    </tr>
    <tr>
      <td></td>
      <td bgcolor="#FFFFFF"> <em>Cредняя зарплата определяется исходя из фактически начисленной зарплаты и отработанного времени за 12 календарных месяцев, предшествующих периоду, для которого определяется средняя зарплата.</em> </td>
    </tr>
   
    <tr>
      <td height="20" align="right" bgcolor="#FFFFFF"><strong>Страховой стаж</strong></td>
      <td bgcolor="#e0e0e0"><select class="text_form" name="percent" style="width:150px; height:15px">
        <option value="0.6">до 5 лет</option>
        <option value="0.8">от 5 до 8 лет</option>
        <option value="1">8 и более лет</option>
      </select></td>
    </tr>

    <tr>
      <td height="36" align="right" bgcolor="#FFFFFF"></td>
      <td align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
        <input name="submit" type="submit" class="but_form" value="Расcчитать!" />
      </div></td>
    </tr>
    <tr>
      <td height="158" align="right" valign="top" bgcolor="#FFFFFF"></td>
      <td valign="top" bgcolor="#FFFFFF"><p>Раздел поможет Вам рассчитать следующие пособия:</p>
        <ul>
          <li> Пособие по временной нетрудоспособности</li>
          <li>Пособие по беременности и родам</li>
          <li>Единовременное пособие женщинам, вставшим на учет в медицинском учреждении в ранние сроки беременности (до 12 недель)</li>
          <li>Пособие при рождении ребенка</li>
          <li>Пособие на погребение</li>
      </ul></td>
    </tr>
    <tr>
      <td colspan="3" valign="top" style="border-top:1px solid #ccc;"><p align="center" class="style2">Пособия расчитываются на основании </p>
        <p class="style2">1. Федерального Закона &quot;О ГОСУДАРСТВЕННЫХ ПОСОБИЯХ ГРАЖДАНАМ, ИМЕЮЩИМ ДЕТЕЙ&quot;</p>
        <p class="style2">2. Федерального Закона &quot;О ВНЕСЕНИИ ИЗМЕНЕНИЙ В ОТДЕЛЬНЫЕ ЗАКОНОДАТЕЛЬНЫЕ АКТЫ РОССИЙСКОЙ ФЕДЕРАЦИИ В ЦЕЛЯХ ПОВЫШЕНИЯ РАЗМЕРОВ ОТДЕЛЬНЫХ ВИДОВ СОЦИАЛЬНЫХ ВЫПЛАТ И СТОИМОСТИ НАБОРА СОЦИАЛЬНЫХ УСЛУГ&quot;</p>
        <p class="style2">3. ПИСЬМА ФОНДА СОЦИАЛЬНОГО СТРАХОВАНИЯ РОССИЙСКОЙ ФЕДЕРАЦИИ от 5 марта 2008 г. N 02-18/07-1931 </p>
      <p align="left" class="style2">4. ПОСТАНОВЛЕНИЯ ПРАВИТЕЛЬСТВА РОССИЙСКОЙ ФЕДЕРАЦИИ &quot;О ПОРЯДКЕ ИСЧИСЛЕНИЯ ВЫСЛУГИ ЛЕТ, НАЗНАЧЕНИЯ И ВЫПЛАТЫ ПЕНСИЙ, КОМПЕНСАЦИЙ И ПОСОБИЙ ЛИЦАМ, ПРОХОДИВШИМ ВОЕННУЮ СЛУЖБУ В КАЧЕСТВЕ ОФИЦЕРОВ, ПРАПОРЩИКОВ, МИЧМАНОВ И ВОЕННОСЛУЖАЩИХ СВЕРХСРОЧНОЙ СЛУЖБЫ ИЛИ ПО КОНТРАКТУ В КАЧЕСТВЕ СОЛДАТ, МАТРОСОВ, СЕРЖАНТОВ И СТАРШИН ЛИБО СЛУЖБУ В ОРГАНАХ ВНУТРЕННИХ ДЕЛ, ГОСУДАРСТВЕННОЙ ПРОТИВОПОЖАРНОЙ СЛУЖБЕ, УЧРЕЖДЕНИЯХ И ОРГАНАХ УГОЛОВНО-ИСПОЛНИТЕЛЬНОЙ СИСТЕМЫ, И ИХ СЕМЬЯМ В РОССИЙСКОЙ ФЕДЕРАЦИИ&quot; </p></td>
    </tr>
  </table>
</form>

<script>
function testform()
{
var reg = new RegExp("^\\d+$");
if (!(reg.test(document.zp.sal.value))) {window.alert('Вводите только положительные цифры');return false;}
if (document.zp.sal.value=="")
{window.alert('Вы не указали зарплату');return false;}
}
</script>