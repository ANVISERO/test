{if isset($errors)}{$errors}{/if}
{foreach from=$tab->errors item=error}
{$error}
{/foreach}
{foreach from=$tab->messages item=message}
{$message}
{/foreach}

{$formstart}
	<fieldset>
		<legend>{$options_legend}</legend>
<table>
{foreach from=$options item=option}
<tr>
	<td><label for="{$option->name}">{$option->name}:</label></td>
	<td>{$option->input}</td>
</tr>
{/foreach}
</table>
	</fieldset>
	<div>
		{$submit} {$cancel} {$reset}
	</div>
{$formend}
