<style>
input.forreg_1{ width:300px; font-size:10px; font-weight:bold}
select.forreg_2{font-size:10px; font-weight:bold}
</style>

Stay informed about your value in today's job market with FREE salary updates from Obzorzarplat.ru. 
<br>Get started now on your way to getting paid what you are worth!.
<br>Membership includes.
<br> Obzorzarplat.ru monthly Newswire
<br> Job Search Updates
<br> Customizable MySalary Page
<br><br>
<form name="regist" method="post" action="?step=1" onSubmit="return testform();" enctype="multipart/form-data">
<b>* Required fields</b><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
   <tr>
    <td width="150" align="right"><strong>* </strong>Name:</td>
    <td><input type="text" name="im" class="text" style=" width:300px"></td>
  </tr>
  <tr>
    <td width="150" align="right">Last Name:</td>
    <td><input type="text" name="fam" class="text" style=" width:300px"></td>
  </tr>
 
  <tr>
    <td width="150" align="right"><strong>* </strong> E-mail:<br><em>(login)</em></td>
    <td><input type="text" name="login" class="text" style=" width:300px"></td>
  </tr>
  <tr>
    <td width="150" align="right"><strong>* </strong>Password:</td>
    <td><input type="password" name="pass_1" class="text" style=" width:300px"></td>
  </tr>
  <tr>
    <td width="150" align="right"><strong>* </strong>Password Confirm:</td>
    <td><input type="password" name="pass_2" class="text" style=" width:300px"></td>
  </tr>
  <tr>
    <td width="150" align="right"><strong>* </strong>I have read and agree to Obzorzarplat.ru rules:</td>
    <td><input name="pravila" type="checkbox" value=""> <a href="#">Rules</a></td>
  </tr>
  
<tr>
<td width="150" align="right">
<?
$url_img=$folder.'_admin/_adminfiles/capcha/';
$cap[0]='q';$cap[1]='w'; $cap[2]='e'; $cap[3]='r'; $cap[4]='t'; $cap[5]='y'; $cap[6]='u'; $cap[7]='i'; $cap[8]='o'; $cap[9]='p';  
$cap_f=rand(0,9);$cap_s=rand(0,9);$cap_t=rand(0,9);
$cap_code=($cap_f*100 + $cap_s*10 + $cap_t)*123;
echo('
<img src="'.$url_img.'cap_'.$cap[$cap_f].'.gif" width="18" height="30" style="border:1px solid #eee">
<img src="'.$url_img.'cap_'.$cap[$cap_s].'.gif" width="18" height="30" style="border:1px solid #eee">
<img src="'.$url_img.'cap_'.$cap[$cap_t].'.gif" width="18" height="30" style="border:1px solid #eee">
<input type="hidden" name="cap_code" value="'.$cap_code.'">
');
?></td>
<td><strong>*</strong>Enter number: <input name="cap" type="text" class="text" size="3" maxlength="3" style="font-size:20px; font-weight:bold; height:27px"></td>
</tr>
  
    <tr>
    <td width="150" align="right"></td>
    <td><input type="submit" value="Register" class="but"></td>
  </tr>
</table>

</form>

<script>
function testform()
{
if (document.regist.im.value==""){window.alert('Please enter your email name');return false;}
if (document.regist.login.value==""){window.alert('Please enter your email');return false;}
if (document.regist.pass_1.value==""){window.alert(''Please enter your password');return false;}
if (document.regist.pass_2.value==""){window.alert('Password Confirm ');return false;}


}
</script>
