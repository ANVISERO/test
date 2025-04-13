{$startform}
<div class="pageoverflow">
	<p class="pagetext">*{$prompt_template_name}:</p>
	<p class="pageinput">{$input_name}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">*{$prompt_template_code}:</p>
	<p class="pageinput">{$input_template}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{if isset($idfield)}{$idfield}{/if}{$submit}{$cancel}{$apply}</p>
</div>
{$endform}
