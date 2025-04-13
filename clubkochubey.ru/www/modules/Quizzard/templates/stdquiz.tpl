{* this template controls the display of Quiz pages *}
{if $message!=""}<strong>{$message}</strong><br />{/if}
{if $remedial == '0'}
<p><strong>{$quizzard_taker_name}</strong> ({$quizzard_taker_email})</p>
<p class="place_in_quiz">{if empty($pagenav)}{$pagexofy}{else}{$pagenav}{/if}</p>
{/if}
<div class="quiz">
{$startform}
{foreach from=$questions item=entry}
{if $entry->type == 's'}
<h2>{$entry->question}</h2>
{elseif $entry->type == 't'}
<h3>{$entry->question}</h3>
{else}
	<p class="quiz_item">{if $entry->num != ""}{$entry->num}) {/if}<span class="question">{$entry->question}</span>{if $remedial == '1' && $entry->correct != '1'}{$question_wrong}{/if}<br />
	<span class="answers">
   {if $entry->type == 'm' || $entry->type == 'c'}
		{foreach from=$entry->answers key=answer_no item=answer}
		{$answer}<br />
		{/foreach}
	{/if}
	</span>
	</p>
{/if}
{/foreach}
<br />
{$hidden}{$back}{$save}{if $lastpage == 1}{$submit}{else}{$continue}{/if}
{$endform}
</div>