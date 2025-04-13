{if isset($message) }<p>{$message}</p>{/if}
{$startform}
<fieldset>
<legend>{$mod->Lang('general_settings')}:</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_username_is_email}:</p>
		<p class="pageinput">{$input_username_is_email}
                   <br/>{$info_username_is_email}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_allow_duplicate_emails}:</p>
		<p class="pageinput">{$input_allow_duplicate_emails}
                   <br/>{$info_allow_duplicate_emails}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_allow_repeated_logins}:</p>
		<p class="pageinput">{$input_allow_repeated_logins}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_allow_duplicate_reminders}:</p>
		<p class="pageinput">{$input_allow_duplicate_reminders}
                   <br/>{$info_allow_duplicate_reminders}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_requireonegroup}:</p>
		<p class="pageinput">{$input_requireonegroup}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_dfltgroup}:</p>
		<p class="pageinput">{$input_dfltgroup}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_expireage')}:</p>
		<p class="pageinput">{$input_expireage}&nbsp;({$mod->Lang('months')})</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_randomusername')}:</p>
		<p class="pageinput">{$input_randomusername}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_feusers_specific_permissions}:</p>
		<p class="pageinput">{$input_feusers_specific_permissions}<br/>
                   {$info_feusers_specific_permissions}</p>
	</div>
</fieldset>

<fieldset>
<legend>{$mod->Lang('field_settings')}:</legend>
	<div class="pageoverflow">
                <p><strong>{$info_minpwlen}</strong></p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_pwfldlen}:</p>
		<p class="pageinput">{$input_pwfldlen}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_minpwlen}:</p>
		<p class="pageinput">{$input_minpwlen}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_maxpwlen}:</p>
		<p class="pageinput">{$input_maxpwlen}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_unfldlen}:</p>
		<p class="pageinput">{$input_unfldlen}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_minunlen}:</p>
		<p class="pageinput">{$input_minunlen}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_maxunlen}:</p>
		<p class="pageinput">{$input_maxunlen}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_signin_button}:</p>
		<p class="pageinput">{$input_signin_button}</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$prompt_requiredmarker}:</p>
		<p class="pageinput">{$input_requiredmarker}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_requiredcolor}:</p>
		<p class="pageinput">{$input_requiredcolor}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_hiddenmarker}:</p>
		<p class="pageinput">{$input_hiddenmarker}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_hiddencolor}:</p>
		<p class="pageinput">{$input_hiddencolor}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_thumbnail_size}:</p>
		<p class="pageinput">{$input_thumbnail_size}</p>
	</div>
</fieldset>

<fieldset>
<legend>{$mod->Lang('session_settings')}:</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_sessiontimeout}:</p>
		<p class="pageinput">{$input_sessiontimeout}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_cookiekeepalive}:</p>
		<p class="pageinput">{$input_cookiekeepalive}{if isset($info_cookie_keepalive)}<br/>{$info_cookie_keepalive}{/if}</p>
	</div>
	<div class="pageoverflow">
                <hr width="50%" align="left"/>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_usecookiestoremember}:</p>
		<p class="pageinput">{$input_usecookiestoremember}{if isset($info_cookiestoremember)}<br/>{$info_cookiestoremember}{/if}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_cookiename}:</p>
		<p class="pageinput">{$input_cookiename}</p>
	</div>
</fieldset>

<fieldset>
<legend>{$mod->Lang('redirection_settings')}:</legend>
	<p class="pageoverflow">{$info_star}</p>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_forgotpw_page}:</p>
		<p class="pageinput">{$input_forgotpw_page}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_changesettings_page}:</p>
		<p class="pageinput">{$input_changesettings_page}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_after_change_settings}:</p>
		<p class="pageinput">{$input_after_change_settings}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_login_page}:</p>
		<p class="pageinput">{$input_login_page}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_logout_page}:</p>
		<p class="pageinput">{$input_logout_page}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_after_verify_code}:</p>
		<p class="pageinput">{$input_after_verify_code}</p>
	</div>
</fieldset>

<fieldset>
<legend>{$mod->Lang('property_settings')}:</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_image_destination_path}:</p>
		<p class="pageinput">{$input_image_destination_path}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$prompt_allowed_image_extensions}:</p>
		<p class="pageinput">{$input_allowed_image_extensions}</p>
	</div>
</fieldset>

<fieldset>
<legend>{$mod->Lang('notification_settings')}:</legend>
	<div class="pageoverflow">
	        <p class="pagetext">{$prompt_notifications}:</p>
                <p class="pageinput">{$input_notifications}</p>        
	</div>
	<div class="pageoverflow">
	        <p class="pagetext">{$prompt_notification_address}:</p>
                <p class="pageinput">{$input_notification_address}</p>        
	</div>
	<div class="pageoverflow">
	        <p class="pagetext">{$prompt_notification_subject}:</p>
                <p class="pageinput">{$input_notification_subject}</p>        
	</div>
	<div class="pageoverflow">
	        <p class="pagetext">{$prompt_notification_template}:</p>
                <p class="pageinput">{$input_notification_template}</p>        
	</div>
</fieldset>

        {if $data_numresetrecords != ""}
 	  <div class="pageoverflow">
                <hr width="50%" align="left"/>
  	  </div>
          <div class="pageoverflow">
   	    <p class="pagetext">{$prompt_numresetrecords}</p>
	    <p class="pageinput">{$data_numresetrecords}</p>
          </div>
          <div class="pageoverflow">
	    <p class="pagetext">&nbsp;</p>
	    <p class="pageinput">{$input_remove1week}{$input_remove1month}{$input_removeall}</p>
          </div>
        {/if}
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$hidden}{$submit}{$cancel}</p>
	</div>
{$endform}
