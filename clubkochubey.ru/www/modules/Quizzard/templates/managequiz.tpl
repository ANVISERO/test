{if $message}<h2>{$message}</h2><br />{/if}
<p>{$back_to_main}</p>
{literal}
<style type="text/css">
.small {font-size: 6px; display: inline;}
p {font-size: 12px;}
</style>
{/literal}
{$startform}
<div class="quiz">
{if $show_line_numbers == '1'}{counter start=1}{/if}
{foreach from=$questions item=entry}
{if $show_line_numbers == '1'}<p class="small">[{counter} : {$entry->type}]</p>{/if}
{if $entry->type == 's'}
<h2>{$entry->question}</h2>
{elseif $entry->type == 't'}
<h3>{$entry->question}</h3>
{else}
	<p>{if $entry->num != ""}{$entry->num}) {/if}
	{if $entry->type!='p'}{$entry->question}{else}{$entry->title}{/if} {if $entry->is_scored != 1}({$title_unscored}){/if}<br />
	{$entry->typefield}{if $entry->type == 'm' || $entry->type == 'c'}
		{foreach from=$entry->answers key=answer_no item=answer}
		{$answer}<br />
		{/foreach}
	{/if}
	</p>
{/if}
{/foreach}
<br />
{$submit}
{$endform}
<hr />
<p>{$back_to_main}</p>
</div>