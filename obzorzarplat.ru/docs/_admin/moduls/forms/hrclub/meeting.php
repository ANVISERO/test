<form name="hrclub_news" method="post">
<table border="0" class="reg">
<tr>
  <td>Имя и фамилия</td>
  <td><input type="text" class="regfield" name="name" value=""></td>
</tr>
<tr>
  <td>Электронная почта</td>
  <td><input type="text" class="regfield" name="email" value=""></td>
</tr>
<tr>
  <td></td>
  <td><input type="button" value="Зарегистрироваться на заседание" class="butSubmit" onClick="return test();"></td>
</tr>
</table>
</form>

<script language="javascript">
function test(){
text="";
if(document.hrclub_news.name.value==""){text=text+'Имя и фамилию;\n';}
if(document.hrclub_news.email.value==""){text=text+'Электронную почту;\n';}
if(text!=""){window.alert('Вы не указали:\n'+text);return false;}

var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(!regex.test(document.hrclub_news.elements['email'].value))
 		{
 			window.alert("Неправильный формат адреса электронной почты");
 			return false;
 		}else{
				document.hrclub_news.action="/hrclub/estimated_meeting/registration/";
          document.hrclub_news.submit();
}
}
</script>