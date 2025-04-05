<form name="meeting_registration" method="post" action="">
    <input type="hidden" name="meeting_id" value="<?php echo($meeting_id);?>">
<table border="0" class="reg">
<tr>
  <td>Имя и фамилия</td>
  <td><input type="text" class="regfield" name="name" value=""></td>
</tr>
<tr>
  <td>Компания</td>
  <td><input type="text" class="regfield" name="company" value=""></td>
</tr>
<tr>
  <td>Должность</td>
  <td><input type="text" class="regfield" name="job" value=""></td>
</tr>
<tr>
  <td>Телефон</td>
  <td><input type="text" class="regfield" name="tel" value=""></td>
</tr>
<tr>
  <td>Электронная почта</td>
  <td><input type="text" class="regfield" name="email" value=""></td>
</tr>
<tr>
  <td></td>
  <td><input type="button" value="Зарегистрироваться" class="butSubmit" onClick="return testReg();"></td>
</tr>
</table>
</form>

<script language="javascript">
function testReg(){
text="";
if(document.meeting_registration.name.value==""){text=text+'Имя и фамилию;\n';}
if(document.meeting_registration.job.value==""){text=text+'Должность;\n';}
if(document.meeting_registration.company.value==""){text=text+'Компанию;\n';}
if(document.meeting_registration.tel.value==""){text=text+'Телефон;\n';}
if(document.meeting_registration.email.value==""){text=text+'Электронную почту;\n';}
if(text!=""){window.alert('Вы не указали:\n'+text);return false;}

var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(!regex.test(document.meeting_registration.elements['email'].value))
 		{
 			window.alert("Неправильный формат адреса электронной почты");
 			return false;
 		}else{
				document.meeting_registration.action="/hrclub/estimated_meeting/registration/";
          document.meeting_registration.submit();
}
}
</script>