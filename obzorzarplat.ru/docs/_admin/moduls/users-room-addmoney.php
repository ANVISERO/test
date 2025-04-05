<h1 class="title"><img src="/_img/arr_01" width="8" height="7">&nbsp;&nbsp;Пополнить счет</h1>

<br>
<table width="560" border="0" align="center" cellpadding="4" cellspacing="0">
<!--WebMoney -->
<form action="https://merchant.webmoney.ru/lmi/payment.asp" method="POST">
<input type="hidden" name="LMI_PAYMENT_DESC" value='Пополнение счета на сайте "Обзор зарплат"'>
<input type="hidden" name="LMI_PAYEE_PURSE" value="R441135464033">
<input type="hidden" name="LMI_PAYMENT_NO" value="<?=$user_id;?>"> 
<input type="hidden" name="LMI_SIM_MODE" value="0">
<input type="hidden" name="LMI_RESULT_URL" value="http://obzorzarplat.neogara.ru/users/">
<input type="hidden" name="LMI_SUCCESS_URL" value="http://obzorzarplat.neogara.ru/users/?page=history">
<input type="hidden" name="LMI_SUCCESS_METHOD" value="1">
<input type="hidden" name="LMI_FAIL_URL" value="http://obzorzarplat.neogara.ru/users/?page=money-wm-no">
<input type="hidden" name="LMI_FAIL_METHOD" value="1">
  <tr>
    <td><strong>Сервис</strong></td>
    <td align="right"><strong>Сумма, руб</strong>&nbsp;&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="border-top:1px solid #ddd"><img src="/_admin/_adminfiles/logo_webmoney.gif" alt="WebMoney"></td>
    <td align="right" style="border-top:1px solid #ddd"><input type="text" name="LMI_PAYMENT_AMOUNT" value="" class="text" style="font-weight:bold; width:100px"> руб.&nbsp;&nbsp;</td>
    <td align="right" style="border-top:1px solid #ddd">
	
<input type="submit" value="оплатить WebMoney" class="but" style="width:150px">	</td>
  </tr>
 </form>
<!--End WebMoney --> 
</table>




