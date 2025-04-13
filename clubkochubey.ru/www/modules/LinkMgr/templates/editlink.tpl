{$startform}
<div class="pageoverflow">
	<p class="pagetext">*{$prompt_name}:</p>
	<p class="pageinput">{$input_name}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">*{$prompt_url}:</p>
	<p class="pageinput">{$input_url}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"> {$prompt_img}:</p>
	<p class="pageinput">{$input_img}&nbsp;-&nbsp;<strong>{$note_img}</strong></p>
</div>
<div class="pageoverflow">
	<p class="pagetext">*{$prompt_link_category}:</p>
	<p class="pageinput">{$input_link_cat}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">*{$prompt_desc}:</p>
	<p class="pageinput">{$input_desc}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{if isset($idfield)}{$idfield}{/if}{$submit}{$cancel}{$apply}</p>
</div>
{$endform}
