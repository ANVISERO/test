<form name="mln" method="post" action="/eng/servis/million/?step=2" onsubmit="return testform();">
<table width="215" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="70" align="right"><strong>Salary</strong></td>
    <td width="145" align="left"><input type="text" class="text" name="sal" value="20000" size="8"> rub/month</td>
  </tr>
   <tr>
    <td width="70" align="right">Salary progression per annum</td>
    <td width="145" align="left"><input name="rate_sal" type="text" class="text" value="0" size="8" maxlength="5"> %/year</td>
  </tr>
     <tr>
    <td width="70" align="right"><strong>Age</strong></td>
    <td align="left"><input type="text" class="text" name="age" value="25" size="8"> years</td>
  </tr>
      <tr>
    <td width="70" align="right"><strong>Savings</strong></td>
    <td align="left"><input type="text" class="text" name="econom" value="0" size="8"> rub</td>
  </tr>   
        <tr>
    <td width="70" align="right">Interest on bank loans</td>
    <td align="left">
	<input name="rate" type="text" class="text" value="10" size="8" maxlength="5"> %/year</td>
  </tr> 
          <tr>
    <td width="70" align="right">How much do You save per year</td>
    <td align="left"><input type="text" class="text" name="sav" value="0" size="8"> rub</td>
  </tr> 
           <tr>
    <td width="70" align="right"></td>
    <td align="left"><input type="submit" class="but" value="Calculate!"></td>
  </tr>  
  
</table>
</form>
<script>
function testform()
{
var reg = new RegExp("^\\d+$");

if (!(reg.test(document.mln.sal.value))) {window.alert('Please, enter number only');return false;}
if (parseFloat(document.mln.rate.value)==NaN) {window.alert('Please, enter number only1');return false;}

if (parseFloat(document.mln.rate_sal.value)==NaN) {window.alert('Please, enter number only');return false;}

if (!(reg.test(document.mln.age.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.mln.econom.value))) {window.alert('Please, enter number only');return false;}
if (!(reg.test(document.mln.sav.value))) {window.alert('Please, enter number only');return false;}

if (  ((document.mln.sal.value)*12) < (document.mln.sav.value))
{window.alert('You can’t spend more than You earn! ');return false;}

if ((document.mln.sal.value==0) & (document.mln.econom.value==0))
{window.alert('You should put salary or saving');return false;}

if ((document.mln.econom.value==0) & (document.mln.sav.value==0))
{window.alert('Without putting away money You will never become a Millioner');return false;}

if ((document.mln.rate.value==0) & (document.mln.sav.value==0))
{window.alert('Without savings You will never become a Millioner');return false;}

}
</script>