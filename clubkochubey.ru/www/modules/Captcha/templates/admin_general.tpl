{if isset($errors)}{$errors}{/if}
{foreach from=$tab->errors item=error}
{$error}
{/foreach}
{foreach from=$tab->messages item=message}
{$message}
{/foreach}

{$formstart}
	<fieldset>
		<legend>{$active_legend}</legend>
		<label for="select_captchalib">{$captchalib_select_label}:</label>
		{$captchalib_select} {$options_link}
	</fieldset>
{if isset($pear_legend)}
	<fieldset>
		<legend>{$pear_legend}</legend>
		<label for="enable_pear">{$enable_pear_label}:</label>
		{$enable_pear_checkbox}
	</fieldset>
{/if}
	<fieldset>
		<legend>{$cache_legend}</legend>
		<p>
			{$cache_directory_title}: {$cache_directory}<br />
			{$cache_overview}
		</p>
		<label for="clear_cache">{$clear_cache_label}</label>
		{$clear_cache_checkbox}
	</fieldset>
	<div>
		{$submit}
	</div>
{$formend}
