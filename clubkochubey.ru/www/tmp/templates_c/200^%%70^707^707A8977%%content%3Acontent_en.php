<?php /* Smarty version 2.6.25, created on 2014-01-21 17:53:21
         compiled from content:content_en */ ?>
<div id="contentregform">Уважаемые коллеги!<br /><br />
<div>Благодарим Вас за участие  в мастер-классе <strong>"Современная организация труда и заработной платы"</strong>.</div>
<div>Пожалуйста заполните эту небольшую анкету обратной связи. <br />Обращаем Ваше внимание, что <em>демо-версию электронной  динамической модели системы   оплаты труда</em> Сергея Жданова мы вышлем Вам на е-майл указанный в этой анкете.<br />Поля, отмеченные звездочкой (*), являются обязательными.<br /><br /></div>
<?php echo ' <form id="regform"> 
<table class="regform" border="0" cellspacing="2" cellpadding="2">
<tbody>
<tr>
<td width="30%" align="right">Фамилия*</td>
<td><input id="fsurname" size="40" type="text" /></td>
</tr>
<tr>
<td align="right">Имя*</td>
<td><input id="fname" size="40" type="text" /></td>
</tr>
<tr>
<td align="right">Отчество*</td>
<td><input id="fpatronymic" size="40" type="text" /></td>
</tr>
<tr>
<td align="right">Навание компании*</td>
<td><input id="fcompanyname" size="40" type="text" /></td>
</tr>
<tr>
<td align="right">Должность*</td>
<td><input id="fposition" size="40" type="text" /></td>
</tr>
<tr>
<td align="right">E-mail*</td>
<td><input id="femail" size="40" type="text" /></td>
</tr>
</tbody>
</table>
<table class="regform" border="0" cellspacing="2" cellpadding="2">
<tbody>
<tr>
<td style="text-align: left;" width="40%" align="right">Из каких источников Вы узнали о мастер-классе</td>
<td><select id="fsourse"><option value=" Новостная рассылка Клуба"> Новостная рассылка Клуба </option><option value=" Портал Headhunter (www.hh.ru)"> Портал   Headhunter (www.hh.ru)</option><option value=" Job.Ru"> Job.Ru</option><option value=" Портал Obzorzarplat.ru"> Портал Obzorzarplat.ru</option><option value=" От коллег"> От коллег</option><option value=" Друг"> Другое</option></select></td>
</tr>
<tr>
<td style="text-align: right;" align="right" valign="top">Ваши ожидания от мастер-класса оправдались?</td>
<td style="vertical-align: bottom;"><textarea id="frecvisits_1" cols="40" rows="5" name="frecvisits_1"></textarea></td>
</tr>
<tr>
<td style="text-align: left;" align="right" valign="top">Вы получили в ходе встречи новые знания?</td>
<td style="vertical-align: bottom;"><textarea id="frecvisits_2" cols="40" rows="5" name="frecvisits_2"></textarea></td>
</tr>
<tr>
<td style="text-align: left;" align="right" valign="top">Информация полученная на мастер-классе поможет улучшению организации Вашей работы?</td>
<td style="vertical-align: bottom;"><textarea id="frecvisits_3" cols="40" rows="5" name="frecvisits_3"></textarea></td>
</tr>
<tr>
<td align="right">Считаете ли Вы мастер-класс удобным форматом для обучения по данной теме?</td>
<td><input id="fwithreport_1" onclick="if (this.checked) {this.value=\'Да\'} else {this.value=\'Нет\'}" name="fwithreport_1" type="radio" /> Да<br /> <input onclick="if (fwithreport_1[0].checked) {fwithreport_1[0].value=\'Да\'} else {fwithreport_1[0].value=\'Нет\'}" name="fwithreport_1" type="radio" /> Нет</td>
</tr>
<tr>
<td align="right">Вас устраивает время проведения?</td>
<td><input id="fwithreport_2" onclick="if (this.checked) {this.value=\'Да\'} else {this.value=\'Нет\'}" name="fwithreport_2" type="radio" /> Да<br /> <input onclick="if (fwithreport_2[0].checked) {fwithreport_2[0].value=\'Да\'} else {fwithreport_2[0].value=\'Нет\'}" name="fwithreport_2" type="radio" /> Нет</td>
</tr>
<tr>
<td align="right">Вас устраивает место проведения?</td>
<td><input id="fwithreport_3" onclick="if (this.checked) {this.value=\'Да\'} else {this.value=\'Нет\'}" name="fwithreport_3" type="radio" /> Да<br /> <input onclick="if (fwithreport_3[0].checked) {fwithreport_3[0].value=\'Да\'} else {fwithreport_3[0].value=\'Нет\'}" name="fwithreport_3" type="radio" /> Нет</td>
</tr>
<tr>
<td align="right">Есть ли нарекания по кофе-брейку?</td>
<td><input id="fwithreport_4" onclick="if (this.checked) {this.value=\'Да\'} else {this.value=\'Нет\'}" name="fwithreport_4" type="radio" /> Да<br /> <input onclick="if (fwithreport_4[0].checked) {fwithreport_4[0].value=\'Да\'} else {fwithreport_4[0].value=\'Нет\'}" name="fwithreport_4" type="radio" /> Нет</td>
</tr>
<tr>
<td align="right" valign="top">Какие темы Вам хотелось бы обсудить на следующих мастер-классах?</td>
<td style="vertical-align: bottom;"><textarea id="frecvisits_4" cols="40" rows="5" name="frecvisits_4"></textarea></td>
</tr>
<tr>
<td align="right">Интересно ли Вам принять участие в следующем мастер-классе, посвященном сложным увольнениям?</td>
<td><input id="fwithreport_5" onclick="if (this.checked) {this.value=\'Да\'} else {this.value=\'Нет\'}" name="fwithreport_5" type="radio" /> Да<br /> <input onclick="if (fwithreport_5[0].checked) {fwithreport_5[0].value=\'Да\'} else {fwithreport_5[0].value=\'Нет\'}" name="fwithreport_5" type="radio" /> Нет</td>
</tr>
<tr>
<td align="right">Интересно ли Вам принять участие в следующем мастер-классе, посвященном материальной ответственности?</td>
<td><input id="fwithreport_6" onclick="if (this.checked) {this.value=\'Да\'} else {this.value=\'Нет\'}" name="fwithreport_6" type="radio" /> Да<br /> <input onclick="if (fwithreport_6[0].checked) {fwithreport_6[0].value=\'Да\'} else {fwithreport_6[0].value=\'Нет\'}" name="fwithreport_6" type="radio" /> Нет</td>
</tr>
<tr>
<td align="right">Подписаться на рассылку новостей Клуба</td>
<td><input id="fmailer" onclick="if (this.checked) {this.value=\'Да\'} else {this.value=\'Нет\'}" checked="checked" type="checkbox" value="Да" /></td>
</tr>
</tbody>
</table>
<div><input type="submit" value="Отправить анкету" /></div>
</form></div>
<div id="contentmessag"></div>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">// <![CDATA[
function getRequestBody(oForm) {
var aParams = new Array();
for(var i = 0; i < oForm.elements.length; i++) {
var sParam = encodeURIComponent(oForm.elements[i].id);
sParam += "=";
sParam += encodeURIComponent(oForm.elements[i].value);
aParams.push(sParam);
}
return aParams.join("&");
}

function CheckingData() {
var chmane=new Array(
"fsurname",
"fname",
"fpatronymic",
"fcompanyname",
"fposition",
"fsourse",
"femail",
"frecvisits_1",
"frecvisits_2",
"frecvisits_3",
"frecvisits_4",
"fwithreport_1",
"fwithreport_2",
"fwithreport_3",
"fwithreport_4",
"fwithreport_5",
"fwithreport_6",
"fmailer"
);
for(var i = 0; i < 10; i++) {
var inputelement=document.getElementById(chmane[i]);
if (inputelement.value==\'\')
{
alert(\'Необходимо заполнить поле!\');
inputelement.className=\'errorinput\';
inputelement.focus();
return false;
}
}

return true;
}

$(document).ready(function(){
$(\'#regform\').submit(
function(){
 if (CheckingData()) {
$.ajax({type: "POST",
url: "./newclient_kate.php",
data: getRequestBody(document.getElementById("regform")),
success: function(html) {
$("#contentmessag").html("");
if (html=="ok") {
$("#contentregform").html("");
$("#contentmessag").html("Заявка отправлена");
}
else {
$("#contentmessag").html(html+"<p class=\'error\'> <br>Заявка не отправлена. Не закрывайте эту страницу, проверьте правильность ввода и нажмите на кнопку еще раз");
}
},
error: function(){alert("error")}

});

};
return false;

});

});
// ]]></script>
'; ?>