<?php /* Smarty version 2.6.25, created on 2013-03-18 17:30:20
         compiled from module_file_tpl:FrontEndUsers%3Badminprefs.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['message'] )): ?><p><?php echo $this->_tpl_vars['message']; ?>
</p><?php endif; ?>
<?php echo $this->_tpl_vars['startform']; ?>

<fieldset>
<legend><?php echo $this->_tpl_vars['mod']->Lang('general_settings'); ?>
:</legend>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_username_is_email']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_username_is_email']; ?>

                   <br/><?php echo $this->_tpl_vars['info_username_is_email']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_allow_duplicate_emails']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_allow_duplicate_emails']; ?>

                   <br/><?php echo $this->_tpl_vars['info_allow_duplicate_emails']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_allow_repeated_logins']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_allow_repeated_logins']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_allow_duplicate_reminders']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_allow_duplicate_reminders']; ?>

                   <br/><?php echo $this->_tpl_vars['info_allow_duplicate_reminders']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_requireonegroup']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_requireonegroup']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_dfltgroup']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_dfltgroup']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['mod']->Lang('prompt_expireage'); ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_expireage']; ?>
&nbsp;(<?php echo $this->_tpl_vars['mod']->Lang('months'); ?>
)</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['mod']->Lang('prompt_randomusername'); ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_randomusername']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_feusers_specific_permissions']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_feusers_specific_permissions']; ?>
<br/>
                   <?php echo $this->_tpl_vars['info_feusers_specific_permissions']; ?>
</p>
	</div>
</fieldset>

<fieldset>
<legend><?php echo $this->_tpl_vars['mod']->Lang('field_settings'); ?>
:</legend>
	<div class="pageoverflow">
                <p><strong><?php echo $this->_tpl_vars['info_minpwlen']; ?>
</strong></p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_pwfldlen']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_pwfldlen']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_minpwlen']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_minpwlen']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_maxpwlen']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_maxpwlen']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_unfldlen']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_unfldlen']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_minunlen']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_minunlen']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_maxunlen']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_maxunlen']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_signin_button']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_signin_button']; ?>
</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_requiredmarker']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_requiredmarker']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_requiredcolor']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_requiredcolor']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_hiddenmarker']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_hiddenmarker']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_hiddencolor']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_hiddencolor']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_thumbnail_size']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_thumbnail_size']; ?>
</p>
	</div>
</fieldset>

<fieldset>
<legend><?php echo $this->_tpl_vars['mod']->Lang('session_settings'); ?>
:</legend>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_sessiontimeout']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_sessiontimeout']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_cookiekeepalive']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_cookiekeepalive']; ?>
<?php if (isset ( $this->_tpl_vars['info_cookie_keepalive'] )): ?><br/><?php echo $this->_tpl_vars['info_cookie_keepalive']; ?>
<?php endif; ?></p>
	</div>
	<div class="pageoverflow">
                <hr width="50%" align="left"/>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_usecookiestoremember']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_usecookiestoremember']; ?>
<?php if (isset ( $this->_tpl_vars['info_cookiestoremember'] )): ?><br/><?php echo $this->_tpl_vars['info_cookiestoremember']; ?>
<?php endif; ?></p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_cookiename']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_cookiename']; ?>
</p>
	</div>
</fieldset>

<fieldset>
<legend><?php echo $this->_tpl_vars['mod']->Lang('redirection_settings'); ?>
:</legend>
	<p class="pageoverflow"><?php echo $this->_tpl_vars['info_star']; ?>
</p>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_forgotpw_page']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_forgotpw_page']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_changesettings_page']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_changesettings_page']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_after_change_settings']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_after_change_settings']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_login_page']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_login_page']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_logout_page']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_logout_page']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_after_verify_code']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_after_verify_code']; ?>
</p>
	</div>
</fieldset>

<fieldset>
<legend><?php echo $this->_tpl_vars['mod']->Lang('property_settings'); ?>
:</legend>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_image_destination_path']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_image_destination_path']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['prompt_allowed_image_extensions']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['input_allowed_image_extensions']; ?>
</p>
	</div>
</fieldset>

<fieldset>
<legend><?php echo $this->_tpl_vars['mod']->Lang('notification_settings'); ?>
:</legend>
	<div class="pageoverflow">
	        <p class="pagetext"><?php echo $this->_tpl_vars['prompt_notifications']; ?>
:</p>
                <p class="pageinput"><?php echo $this->_tpl_vars['input_notifications']; ?>
</p>        
	</div>
	<div class="pageoverflow">
	        <p class="pagetext"><?php echo $this->_tpl_vars['prompt_notification_address']; ?>
:</p>
                <p class="pageinput"><?php echo $this->_tpl_vars['input_notification_address']; ?>
</p>        
	</div>
	<div class="pageoverflow">
	        <p class="pagetext"><?php echo $this->_tpl_vars['prompt_notification_subject']; ?>
:</p>
                <p class="pageinput"><?php echo $this->_tpl_vars['input_notification_subject']; ?>
</p>        
	</div>
	<div class="pageoverflow">
	        <p class="pagetext"><?php echo $this->_tpl_vars['prompt_notification_template']; ?>
:</p>
                <p class="pageinput"><?php echo $this->_tpl_vars['input_notification_template']; ?>
</p>        
	</div>
</fieldset>

        <?php if ($this->_tpl_vars['data_numresetrecords'] != ""): ?>
 	  <div class="pageoverflow">
                <hr width="50%" align="left"/>
  	  </div>
          <div class="pageoverflow">
   	    <p class="pagetext"><?php echo $this->_tpl_vars['prompt_numresetrecords']; ?>
</p>
	    <p class="pageinput"><?php echo $this->_tpl_vars['data_numresetrecords']; ?>
</p>
          </div>
          <div class="pageoverflow">
	    <p class="pagetext">&nbsp;</p>
	    <p class="pageinput"><?php echo $this->_tpl_vars['input_remove1week']; ?>
<?php echo $this->_tpl_vars['input_remove1month']; ?>
<?php echo $this->_tpl_vars['input_removeall']; ?>
</p>
          </div>
        <?php endif; ?>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['hidden']; ?>
<?php echo $this->_tpl_vars['submit']; ?>
<?php echo $this->_tpl_vars['cancel']; ?>
</p>
	</div>
<?php echo $this->_tpl_vars['endform']; ?>
