<style>
input.pol_1{ border:0px; text-align:center; font-family:verdana; width:120px}
input.pol_2{ border:0px; text-align:center; font-family:verdana; font-weight:bold; color:#cc0000; width:120px}
select.pol_3{font-family:verdana; font-size:10px}
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

document.rclock.inhoar.value=(Math.round(inhoar*100))/100 + ' rub.';
document.rclock.insec.value=(Math.round(sumsec*100))/100 + ' rub.';

document.rclock.inhoar2.value=(Math.round(inhoar2*100))/100 + ' rub.';
document.rclock.insec2.value=(Math.round(sumsec2*100))/100 + ' rub.';
tick=setTimeout('usnotime()',1000);
}
</script>


<center><b> How fast do You earn money?</b></center>
<br>
<form name="rclock" style="margin:0px; padding:0px">

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td colspan="2" align="left"><font style="color:#cc0000"><b>YOUR SALARY</b></font></td>
    <td width="120" align="center"><strong>Hourly Wage</strong></td>
    <td width="120" align="center"><strong>Real-Time Salary</strong></td>
  </tr>
  <tr>
    <td width="100" align="right"><strong>Salary</strong></td>
    <td><input name="sal" type="text" class="text" value="20000" maxlength="12"> rub/month</td>
    <td width="120" align="center"><input type="text" name="inhoar" value="0. rub." class="pol_1"></td>
    <td width="120" align="center"><input type="text" name="insec" value="0. rub." class="pol_2"></td>
  </tr>  
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td align="left"><font style="color:#cc0000"><b>CHOOSE FOR COMPARE</b></font></td>
    <td width="120" align="center"><strong>Hourly Wage</strong></td>
    <td width="120" align="center"><strong>Real-Time Salary</strong></td>
  </tr>
  <tr>
    <td align="left"><select name="millioner" class="pol_3" onchange="sal_mil('parent',this)">


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
</select>
</td>
    <td width="120" align="center"><input type="text" name="inhoar2" value="0. rub." class="pol_1"></td>
    <td width="120" align="center"><input type="text" name="insec2" value="0. rub." class="pol_2"></td>
  </tr>  
</table>
<br><br>
<center><input type="button" class="but" value="Start!" onClick="usnotime();"> <input type="button" class="but" value="Stop!" onClick="stop();"></center>
</form>
<hr>
<center><b>How fast do You earn money?</b></center>
&nbsp;&nbsp;&nbsp;&nbsp; Our web site makes Your life easier comparing Your salary with real things. Here You can easily calculate how many hot dogs You have earned while reading this text! You can also find out how fast do You earn Your Rolls-Royce Phantom.    
<br><br>
<div align="right"><input type="button" class="but" value="Search!" onClick="self.location.href='/eng/servis/bigmak/'"></div>
