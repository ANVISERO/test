<div id='forum'>
<!-- topic -->
{if $breadcrumbs}
<div class="smalltext">
{foreach name=breadcrumb from=$breadcrumbs item=entry}{$entry} {if !$smarty.foreach.breadcrumb.last}&raquo; {/if}{/foreach}
</div>
{/if}

{if isset($message)}<p class="message">{$message}</p>{/if}
<a name="top"></a>
<br />


{if $itemcount > 0}
<script type="text/javascript" src="{$ImageUrl}SMRcode.js"></script>
<div class="edit_topic">
	<table cellspacing="1" class="edit_table">
		<tr>
			<td class="topic_link">
				{if isset($reply_topic_link)}{$reply_topic_link}{/if}
			</td>
			<td class="topic_action">
				{if isset($approve_topic_link)}{$approve_topic_link}{/if}
				{if isset($select_move)}{$form_start}{$select_move}{$form_submit}{$form_end}{/if}
			</td>
		</tr>
	</table>
</div>
<br />

{if $pagecount > 1}
<div id="pages_top" class="floatleft middletext">
	{if $pagenumber > 1}
		{$firstpage}&nbsp; {$prevpage}&nbsp;
	{/if}
	{$fms->Lang('prompt_page')}&nbsp;{$pagenumber}&nbsp;{$fms->Lang('prompt_of')}&nbsp;{$pagecount}
	{if $pagenumber < $pagecount}
		&nbsp;{$nextpage} &nbsp;{$lastpage}
	{/if}
</div>
<br />
{/if}

{if $startedby}
<div class="catbg3 smalltext">{$fms->Lang('started_by')} {$startedby} {$startedby_time}</div>
{/if}

<div id="post" class="tborder">
	<table cellspacing="1" id="topic_table">
	{foreach from=$items item=entry}
		{cycle values="windowbg2,windowbg3" assign="windowbg"}
		<tr>
			<td class="{$windowbg} forum_author smalltext">
				{if $entry->avatar}<img src="{$entry->avatar}" alt="avatar" title="avatar" /><br />{/if}
				{$entry->poster}<br />
				{if $entry->moderator}{$fms->Lang('moderator')}<br />{/if}
				{if $entry->rank > 0}{repeat string=$starimage times=$entry->rank}<br />{/if}
				{if $entry->postings > 0}{$fms->Lang('forum_posts')}: {$entry->postings}<br />{/if}
{*
				{if $entry->feuproperties}
					{foreach from=$entry->feuproperties key=key item=item}
					{$key}: {$item}<br />
					{/foreach}
				{/if}
*}
				{if isset($entry->poster_ip)}<br />{$entry->poster_ip}{/if}
			</td>
			<td class="{$windowbg} forum_body middletext">
				<a name="msg{$entry->post_id}"></a>
				<span class="smalltext">{$entry->poster_time}</span><br />
				{$entry->body}<br />
				{if isset($entry->editor)}<span class="smalltext">{$fms->Lang('last_edit')}: {$entry->editor} {$entry->editor_time} {if isset($entry->editor_ip)}({$entry->editor_ip}){/if}</span>{/if}
			</td>

			<td class="{$windowbg} forum_edit smalltext">
				{if isset($entry->edit_post_link)}{$entry->edit_post_link}{/if}
				{if isset($entry->quote_topic_link)}{$entry->quote_topic_link}{/if}
				<br />
				{if isset($entry->delete_post_link)}{$entry->delete_post_link}<br />{/if}
				{if isset($entry->report_moderator_link)}{$entry->report_moderator_link}<br />{/if}
				<br />
				{if isset($entry->approve_post_link)}{$entry->approve_post_link}{/if}
			</td>
		</tr>
	{/foreach}
	</table>
</div>

{if $pagecount > 1}
<div id="pages_bottom" class="floatleft middletext">
	{if $pagenumber > 1}
		{$firstpage}&nbsp; {$prevpage}&nbsp;
	{/if}
	{$fms->Lang('prompt_page')}&nbsp;{$pagenumber}&nbsp;{$fms->Lang('prompt_of')}&nbsp;{$pagecount}
	{if $pagenumber < $pagecount}
		&nbsp;{$nextpage} &nbsp;{$lastpage}
	{/if}
</div>
<br />
{/if}
<br />

<div class="edit_topic">
	<table cellspacing="1" class="edit_table">
		<tr>
			<td class="topic_link">
				{if isset($reply_topic_link)}{$reply_topic_link}{/if}
			</td>
			<td class="topic_action">
				{if isset($approve_topic_link)}{$approve_topic_link}{/if}
				{if isset($select_move)}{$form_start}{$select_move}{$form_submit}{$form_end}{/if}
			</td>
		</tr>
	</table>
</div>
<br />

{else}
	<p>{$fms->Lang('topic_empty')}</p>
{/if}

</div>

