<style>
input.pol_1{ border:0px; text-align:center; font-family:verdana; width:120px}
input.pol_2{ border:0px; text-align:center; font-family:verdana; font-weight:bold; color:#cc0000; width:120px}
input.pol_4{ border:0px; text-align:center; font-family:verdana; font-weight:bold; color: #00CC66; width:50px; font-size:16px}
select.pol_3{font-family:verdana; font-size:10px}
img.ram{border:1px solid #CCCCCC}
td.bb{border-bottom:2px solid #999}
td.b_r{border-bottom:1px dashed #ccc; border-right:1px dashed #ccc}
td.b{border-bottom:1px dashed #ccc;}
td.r{border-right:1px dashed #ccc;}
</style>
<script>
var price_1=25;
var price_2=50;
var price_3=3500;
var price_4=10000;
var price_5=15000;
var price_6=30000;
var price_7=220000;
var price_8=17500000;
var sec=0;

var echo_1_1=0;
var echo_2_1=0;
var echo_1_2=0;
var echo_2_2=0;
var echo_1_3=0;
var echo_2_3=0;
var echo_1_4=0;
var echo_2_4=0;
var echo_1_5=0;
var echo_2_5=0;
var echo_1_6=0;
var echo_2_6=0;
var echo_1_7=0;
var echo_2_7=0;
var echo_1_8=0;
var echo_2_8=0;

var tick;
var sal2=54000000;
function sal_mil(targ,selObj)
{ 
sal2=selObj.options[selObj.selectedIndex].value;
}

function stop() {
echo_1_1=0;
echo_2_1=0;
echo_1_2=0;
echo_2_2=0;
echo_1_3=0;
echo_2_3=0;
echo_1_4=0;
echo_2_4=0;
echo_1_5=0;
echo_2_5=0;
echo_1_6=0;
echo_2_6=0;
echo_1_7=0;
echo_2_7=0;
echo_1_8=0;
echo_2_8=0;
sec=0;
clearTimeout(tick);
}

function usnotime(){
if(document.rclock.sal.value>130000000000)
{document.rclock.sal.value=130000000000;}

var mak_1_1=document.rclock.sal.value/(597600*price_1);
var mak_2_1=sal2/(597600*price_1);

var mak_1_2=document.rclock.sal.value/(597600*price_2);
var mak_2_2=sal2/(597600*price_2);

var mak_1_3=document.rclock.sal.value/(597600*price_3);
var mak_2_3=sal2/(597600*price_3);

var mak_1_4=document.rclock.sal.value/(597600*price_4);
var mak_2_4=sal2/(597600*price_4);

var mak_1_5=document.rclock.sal.value/(597600*price_5);
var mak_2_5=sal2/(597600*price_5);

var mak_1_6=document.rclock.sal.value/(597600*price_6);
var mak_2_6=sal2/(597600*price_6);

var mak_1_7=document.rclock.sal.value/(597600*price_7);
var mak_2_7=sal2/(597600*price_7);

var mak_1_8=document.rclock.sal.value/(597600*price_8);
var mak_2_8=sal2/(597600*price_8);

echo_1_1+=mak_1_1;
echo_2_1+=mak_2_1;

echo_1_2+=mak_1_2;
echo_2_2+=mak_2_2;

echo_1_3+=mak_1_3;
echo_2_3+=mak_2_3;

echo_1_4+=mak_1_4;
echo_2_4+=mak_2_4;

echo_1_5+=mak_1_5;
echo_2_5+=mak_2_5;

echo_1_6+=mak_1_6;
echo_2_6+=mak_2_6;

echo_1_7+=mak_1_7;
echo_2_7+=mak_2_7;

echo_1_8+=mak_1_8;
echo_2_8+=mak_2_8;

document.rclock.mak_1_1.value=(Math.round(echo_1_1*10000))/10000;
document.rclock.mak_2_1.value=(Math.round(echo_2_1*10000))/10000;

document.rclock.mak_1_2.value=(Math.round(echo_1_2*10000))/10000;
document.rclock.mak_2_2.value=(Math.round(echo_2_2*10000))/10000;

document.rclock.mak_1_3.value=(Math.round(echo_1_3*10000))/10000;
document.rclock.mak_2_3.value=(Math.round(echo_2_3*10000))/10000;

document.rclock.mak_1_4.value=(Math.round(echo_1_4*10000))/10000;
document.rclock.mak_2_4.value=(Math.round(echo_2_4*10000))/10000;

document.rclock.mak_1_5.value=(Math.round(echo_1_5*10000))/10000;
document.rclock.mak_2_5.value=(Math.round(echo_2_5*10000))/10000;

document.rclock.mak_1_6.value=(Math.round(echo_1_6*10000))/10000;
document.rclock.mak_2_6.value=(Math.round(echo_2_6*10000))/10000;

document.rclock.mak_1_7.value=(Math.round(echo_1_7*10000))/10000;
document.rclock.mak_2_7.value=(Math.round(echo_2_7*10000))/10000;

document.rclock.mak_1_8.value=(Math.round(echo_1_8*10000))/10000;
document.rclock.mak_2_8.value=(Math.round(echo_2_8*10000))/10000;

document.rclock.sec.value=sec;
sec++;

tick=setTimeout('usnotime()',1000);
}
</script>


<center><b> How many Big Mac�s did I earn?</b></center>
<br>
<form name="rclock" style="margin:0px; padding:0px">

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td width="160" align="center">&nbsp;</td>
    <td align="center"><font style="color:#cc0000"><b>YOUR SALARY</b></font></td>
    <td align="center"><font style="color:#cc0000"><b>CHOOSE FOR COMPARISON</b></font></td>
    </tr>
  <tr>
    <td width="160" align="center">Time:<br><input type="text" name="sec" value="0" class="pol_4"></td>
    <td align="center"><strong>Salary</strong><br>
      <input name="sal" type="text" class="text" value="20000" maxlength="12"> rubles per month </td>
    <td align="center"><select name="millioner" class="pol_3" onchange="sal_mil('parent',this)">
<option value="2800000">��������� ��������, 2.8 ���.���./���.</option>
<option value="7600000">��������� �������, 7.6 ���.���./���.</option>
<option value="9000000">������� �������, 9 ���.���./���.</option>
<option value="3400000">������� �������, 3.4 ���.���./���.</option>
<option value="15200000">������� ����, 15.2 ���.���./���.</option>
<option value="7000000">���� ��������, 7 ���.���./���.</option>
<option value="5200000">������ �������, 5.2 ���.���./���.</option>
<option value="24800000">������ ���������, 24.8 ���.���./���.</option>
<option value="4400000">���� ��������, 4.4 ���.���./���.</option>
<option value="3400000">����� ������, 3.4 ���.���./���.</option>
<option value="7000000">������� �������, 7 ���.���./���.</option>
<option value="5400000">������� �������, 5.4 ���.���./���.</option>
<option value="7000000">�������, 7 ���.���./���.</option>
<option value="10000000">����� �������, 10 ���.���./���.</option>
<option value="5000000">�������� �������, 5 ���.���./���.</option>
<option value="2800000">������ "t.A.T.u", 2.8 ���.���./���.</option>
<option value="5200000">������ "��������� ������", 5.2 ���.���./���.</option>
<option value="4200000">������ "�����", 4.2 ���.���./���.</option>
<option value="3200000">����� �������, 3.2 ���.���./���.</option>
<option value="3200000">����� ������, 3.2 ���.���./���.</option>
<option value="32000000">�������� �������, 32 ���.���./���.</option>
<option value="8200000">���� �����, 8.2 ���.���./���.</option>
<option value="54000000">����� ������, 54 ���.���./���.</option>
<option value="4000000">������� ������, 4 ���.���./���.</option>
<option value="10000000">������� �������, 10 ���.���./���.</option>
<option value="2800000">������� ��������, 2.8 ���.���./���.</option>
<option value="3000000">���� �����, 3 ���.���./���.</option>
<option value="2600000">����� ������, 2.6 ���.���./���.</option>
<option value="2200000">�������, 2.2 ���.���./���.</option>
<option value="4000000">���� �������, 4 ���.���./���.</option>
<option value="10000000">���� ���������, 10 ���.���./���.</option>
<option value="3200000">�������� ���������, 3.2 ���.���./���.</option>
<option value="2400000">������ ������, 2.4 ���.���./���.</option>
<option value="3000000">���S��, 3 ���.���./���.</option>
<option value="5800000">������ ������, 5.8 ���.���./���.</option>
<option value="46000000">����� ��������, 46 ���.���./���.</option>
<option value="3000000">������ �����, 3 ���.���./���.</option>
<option value="5600000">������� ��������, 5.6 ���.���./���.</option>
<option value="2800000">������ ��������, 2.8 ���.���./���.</option>
<option value="5000000">������� ������, 5 ���.���./���.</option>
<option value="10400000">������� ������, 10.4 ���.���./���.</option>
<option value="5600000">������� ���������, 5.6 ���.���./���.</option>
<option value="13600000">������� ���������, 13.6 ���.���./���.</option>
<option value="2600000">���� ��������, 2.6 ���.���./���.</option>
<option value="6200000">���� �������, 6.2 ���.���./���.</option>
<option value="14000000">��� ���������, 14 ���.���./���.</option>
<option value="3200000">�������� ���������, 3.2 ���.���./���.</option>
<option value="9000000">������ ������, 9 ���.���./���.</option>
<option value="12200000">������ �������, 12.2 ���.���./���.</option>
<option value="2600000">������ ������, 2.6 ���.���./���.</option>
<option value="16000000">������ �������, 16 ���.���./���.</option>
<option value="76000000">������ �����, 76 ���.���./���.</option>
<option value="28000000">�������� ���������, 28 ���.���./���.</option>
<option value="8800000">������ Comedy Club, 8.8 ���.���./���.</option>
<option value="3800000">����� ���������, 3.8 ���.���./���.</option>
<option value="6800000">������ ��������, 6.8 ���.���./���.</option>
<option value="2600000">���� (����) �������, 2.6 ���.���./���.</option>
	  
	  
    </select></td>
    </tr>
  <tr>
    <td colspan="3" align="center" class="bb"><center>
      <input type="button" class="but" value="Start!" onClick="usnotime();"> <input type="button" class="but" value="Stop!" onClick="stop();">
    </center></td>
    </tr>
  <tr>
    <td width="160" align="center" class="b_r"><strong>Beer</strong><br><img class="ram" src="/_img/bigmak_1.jpg" width="75" height="75" hspace="3" vspace="3"><br><em>Price: <b>25 rub.</b></em></td>
    <td align="center" class="b_r"><input type="text" name="mak_1_1" value="0" class="pol_2"></td>
    <td align="center" class="b"><input type="text" name="mak_2_1" value="0" class="pol_2"></td>
    </tr>  
	  <tr>
    <td width="160" align="center" class="b_r"><strong>Hamburger</strong><br><img class="ram" src="/_img/bigmak_2.jpg" width="75" height="75" hspace="3" vspace="3"><br><em>Price: <b>50 rub.</b></em></td>
    <td align="center" class="b_r"><input type="text" name="mak_1_2" value="0" class="pol_2"></td>
    <td align="center" class="b"><input type="text" name="mak_2_2" value="0" class="pol_2"></td>
    </tr> 
	  <tr>
    <td width="160" align="center" class="b_r"><strong>iPod</strong><br><img class="ram" src="/_img/bigmak_3.jpg" width="75" height="75" hspace="3" vspace="3"><br><em>Price: <b>3 500 rub.</b></em></td>
    <td align="center" class="b_r"><input type="text" name="mak_1_3" value="0" class="pol_2"></td>
    <td align="center" class="b"><input type="text" name="mak_2_3" value="0" class="pol_2"></td>
    </tr> 
	  <tr>
    <td width="160" align="center" class="b_r"><strong>Camera</strong><br><img class="ram" src="/_img/bigmak_4.jpg" width="75" height="75" hspace="3" vspace="3"><br><em>Price: <b>10 000 rub.</b></em></td>
    <td align="center" class="b_r"><input type="text" name="mak_1_4" value="0" class="pol_2"></td>
    <td align="center" class="b"><input type="text" name="mak_2_4" value="0" class="pol_2"></td>
    </tr> 

	  <tr>
    <td width="160" align="center" class="b_r"><strong>Snowboard</strong><br><img class="ram" src="/_img/bigmak_5.jpg" width="75" height="75" hspace="3" vspace="3"><br><em>Price: <b>15 000 rub.</b></em></td>
    <td align="center" class="b_r"><input type="text" name="mak_1_5" value="0" class="pol_2"></td>
    <td align="center" class="b"><input type="text" name="mak_2_5" value="0" class="pol_2"></td>
    </tr> 
	  <tr>
    <td width="160" align="center" class="b_r"><strong>Laptop</strong><br><img class="ram" src="/_img/bigmak_6.jpg" width="75" height="75" hspace="3" vspace="3"><br><em>Price: <b>30 000 rub.</b></em></td>
    <td align="center" class="b_r"><input type="text" name="mak_1_6" value="0" class="pol_2"></td>
    <td align="center" class="b"><input type="text" name="mak_2_6" value="0" class="pol_2"></td>
    </tr> 
	  <tr>
    <td width="160" align="center" class="b_r"><strong>VAZ 2109</strong><br><img class="ram" src="/_img/bigmak_7.jpg" width="75" height="75" hspace="3" vspace="3"><br><em>Price: <b>220 000 rub.</b></em></td>
    <td align="center" class="b_r"><input type="text" name="mak_1_7" value="0" class="pol_2"></td>
    <td align="center" class="b"><input type="text" name="mak_2_7" value="0" class="pol_2"></td>
    </tr> 
	  <tr>
    <td width="160" align="center" class="r"><strong>Rolls-Royce Phantom</strong><br><img class="ram" src="/_img/bigmak_8.jpg" width="75" height="75" hspace="3" vspace="3"><br><em>Price: <b>17 500 000 rub.</b></em></td>
    <td align="center" class="r"><input type="text" name="mak_1_8" value="0" class="pol_2"></td>
    <td align="center"><input type="text" name="mak_2_8" value="0" class="pol_2"></td>
    </tr> 
</table>
</form>

