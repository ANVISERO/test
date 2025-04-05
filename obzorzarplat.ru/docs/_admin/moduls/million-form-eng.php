<center><b>When Will You Become a Millioner?</b></center>
<br>
<form name="zp" method="post" action="?step=2" onsubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td width="200" align="right"><strong>Salary</strong></td>
    <td><input type="text" class="text" name="sal" value="20000"> rub/month</td>
  </tr>
   <tr>
    <td width="200" align="right">Salary progression per annum</td>
    <td><input style="text-align:right" name="rate_sal" type="text" class="text" value="0" size="8" maxlength="4"> %/year</td>
  </tr>
     <tr>
    <td width="200" align="right"><strong>Age</strong></td>
    <td><input type="text" class="text" name="age" value="25"> years</td>
  </tr>
      <tr>
    <td width="200" align="right"><strong>Savings</strong></td>
    <td><input type="text" class="text" name="econom" value="0"> rub</td>
  </tr>   
        <tr>
    <td width="200" align="right">Interest on bank loans</td>
    <td>
	<input style="text-align:right" name="rate" type="text" class="text" value="10" size="2" maxlength="2">.<input name="rate_dr" type="text" class="text" value="00" size="2" maxlength="2"> 
    %/year</td>
  </tr> 
          <tr>
    <td width="200" align="right">How much do You save per year</td>
    <td><input type="text" class="text" name="sav" value="0"> rub</td>
  </tr> 
           <tr>
    <td width="200" align="right"></td>
    <td><input type="submit" class="but" value="Calculate!"></td>
  </tr>  
  
</table>
</form>
<script>
function testform()
{
var reg = new RegExp("^\\d+$");

if (!(reg.test(document.zp.sal.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.zp.rate.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.zp.rate_dr.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.zp.rate_sal.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.zp.rate_sal_dr.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.zp.age.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.zp.econom.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.zp.sav.value))) {window.alert('Please, enter number only');return false;}

if (  ((document.zp.sal.value)*12) < (document.zp.sav.value))
{window.alert('You can’t spend more than You earn! ');return false;}

if ((document.zp.sal.value==0) & (document.zp.econom.value==0))
{window.alert('You should put salary or saving');return false;}

if ((document.zp.econom.value==0) & (document.zp.sav.value==0))
{window.alert('Without putting away money You will never become a Millioner');return false;}

if ((document.zp.rate.value==0) & (document.zp.sav.value==0))
{window.alert('Without savings You will never become a Millioner');return false;}

}
</script>
