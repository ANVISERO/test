<form name="meeting_registration" method="post" action="">
    <input type="hidden" name="meeting_id" value="<?php echo($meeting_id);?>">
<table border="0" class="reg">
<tr>
  <td>��� � �������</td>
  <td><input type="text" class="regfield" name="name" value=""></td>
</tr>
<tr>
  <td>��������</td>
  <td><input type="text" class="regfield" name="company" value=""></td>
</tr>
<tr>
  <td>���������</td>
  <td><input type="text" class="regfield" name="job" value=""></td>
</tr>
<tr>
  <td>�������</td>
  <td><input type="text" class="regfield" name="tel" value=""></td>
</tr>
<tr>
  <td>����������� �����</td>
  <td><input type="text" class="regfield" name="email" value=""></td>
</tr>
<tr>
  <td></td>
  <td><input type="button" value="������������������" class="butSubmit" onClick="return testReg();"></td>
</tr>
</table>
</form>

<script language="javascript">
function testReg(){
text="";
if(document.meeting_registration.name.value==""){text=text+'��� � �������;\n';}
if(document.meeting_registration.job.value==""){text=text+'���������;\n';}
if(document.meeting_registration.company.value==""){text=text+'��������;\n';}
if(document.meeting_registration.tel.value==""){text=text+'�������;\n';}
if(document.meeting_registration.email.value==""){text=text+'����������� �����;\n';}
if(text!=""){window.alert('�� �� �������:\n'+text);return false;}

var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(!regex.test(document.meeting_registration.elements['email'].value))
 		{
 			window.alert("������������ ������ ������ ����������� �����");
 			return false;
 		}else{
				document.meeting_registration.action="/hrclub/estimated_meeting/registration/";
          document.meeting_registration.submit();
}
}
</script>