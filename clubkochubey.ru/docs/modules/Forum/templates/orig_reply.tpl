<div id='forum'>
<!-- reply -->
{if $breadcrumbs}
<div class="smalltext">
{foreach name=breadcrumb from=$breadcrumbs item=entry}{$entry} {if !$smarty.foreach.breadcrumb.last}&raquo; {/if}{/foreach}
</div>
{/if}

{if isset($message)}<p class="message">{$message}</p>{/if}
<a name="top"></a>
<br />

{$form_start}
	<p>
	<b>{$post_body_label}</b><br />
	{$post_body_input}<br />
	{if isset($captcha_image)}
		{if isset($captcha_error)}{$captcha_error}{/if}<br />
		{$captcha_image}{$captcha_input}
		{$fms->Lang('front_captcha_label')}<br />
	{/if}
	</p>
	<p>{$form_submit}</p>
{$form_end}

<br />

<div class="catbg3 smalltext">
{$fms->Lang('topic_review_label')}
</div>

{if $itemcount > 0}
<div id="post" class="tborder">
	<table cellspacing="1" id="post_table">
	{foreach from=$items item=entry}
		{cycle values="windowbg2,windowbg3" assign="windowbg"}
		<tr>
			<td class="{$windowbg} forum_author smalltext">
				{$entry->poster}<br />
			</td>
			<td class="{$windowbg} forum_body middletext">
				<span class="smalltext">{$entry->poster_time}</span><br />
				{$entry->body}<br />
				{if isset($entry->editor)}<span class="smalltext">{$fms->Lang('last_edit')}: {$entry->editor} {$entry->editor_time} {if isset($entry->editor_ip)}({$entry->editor_ip}){/if}</span>{/if}
			</td>
		</tr>
	{/foreach}
	</table>
</div>
{/if}

</div>
