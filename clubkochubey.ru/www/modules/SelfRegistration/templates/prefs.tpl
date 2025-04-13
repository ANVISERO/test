{if $message!=''}<p>{$message}</p>{/if}
{$startform}
<table width="100%">
  <tr>
    <td width="50%">
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_noregister')}:</p>
		<p class="pageinput">{$input_noregister}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_inline}:</p>
		<p class="pageinput">{$input_inline}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_notify}:</p>
		<p class="pageinput">{$input_notify}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_confirmmail_to}:</p>
		<p class="pageinput">{$input_confirmmail_to}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_email_confirmation}:</p>
		<p class="pageinput">{$input_email_confirmation}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_force_email_twice}:</p>
		<p class="pageinput">{$input_force_email_twice}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_skip_final_msg}:</p>
		<p class="pageinput">{$input_skip_final_msg}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_redirect_afterregister}:</p>
		<p class="pageinput">{$input_redirect_afterregister}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_login_afterverify}:</p>
		<p class="pageinput">{$input_login_afterverify}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_redirect_afterverify}:</p>
		<p class="pageinput">{$input_redirect_afterverify}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$hidden}{$submit}{$cancel}</p>
	</div>
   </td>
   <td width="50%" valign="top">
      <div class="pageoverflow">
	<p class="pagetext">{$prompt_numresetrecords}</p>
	<p class="pageinput">{$data_numresetrecords}</p>
      </div>
      <div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$input_remove1week}</p>
      </div>
      <div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$input_remove1month}</p>
      </div>
      <div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$input_remove1day}</p>
      </div>
      <div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$input_removeall}</p>
      </div>
      <div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$input_list1day}</p>
      </div>
   </td>
  </tr>
</table>
{$endform}
