<div id="forum">
<!-- forum -->
{if $breadcrumbs}
<div class="smalltext">
{foreach name=breadcrumb from=$breadcrumbs item=entry}{$entry} {if !$smarty.foreach.breadcrumb.last}&raquo; {/if}{/foreach}
</div>
{/if}

{if isset($message)}<p class="message">{$message}</p>{/if}
<a name="top"></a>
<br />

<div class="forum_link">
{if isset($new_topic_content)}{$new_topic_link}{/if}
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

{if $itemcount > 0}
<div class="forum_border">
	<table cellspacing="1" id="forum_table">
		<thead>
			<tr>
				<th class="catbg3">&nbsp;</th>
				<th class="catbg3">{$fms->Lang('topic_subject_label')}</th>
				<th class="catbg3">{$fms->Lang('topic_post_count_label')}</th>
				<th class="catbg3">{$fms->Lang('topic_post_views_label')}</th>
				<th class="catbg3">{$fms->Lang('topic_last_post_label')}</th>
			</tr>
		</thead>

		<tbody>
	{foreach from=$items item=entry}
			<tr>
				<td class="windowbg forum_icon">{$entry->icon}</td>
				<td class="windowbg2 forum_subject">
					<span>{$entry->topic_link}</span><br />
					<span class="smalltext">{$fms->Lang('started_by')} {$entry->startedby} {$entry->startedby_time}</span>
				</td>
				<td class="windowbg forum_replies">{$entry->posts_count}</td>
				<td class="windowbg forum_views">{$entry->views}</td>
				<td class="windowbg2 forum_lastpost smalltext">
				{if isset($entry->lastposter)}
					<strong>{$fms->Lang('topic_last_post_label')}</strong> {$fms->Lang('by')} {$entry->lastposter}<br />
					{if !empty($entry->lastposter_time)}{$entry->lastposter_time}{/if} <a href="{$entry->post_url}#msg{$entry->post_id}"><img src="{$ImageUrl}last_post.gif" title="{$fms->Lang('topic_last_post_label')}" alt="{$fms->Lang('topic_last_post_label')}" /></a><br />
				{/if}

				{if isset($entry->reset_topic_link)}
					{$entry->reset_topic_link}
				{else}
					{if isset($entry->sticky_topic_link)}{$entry->sticky_topic_link}{/if}
					{if isset($entry->closed_topic_link)}{$entry->closed_topic_link}{/if}
				{/if}
				{if isset($entry->delete_topic_link)}&nbsp; {$entry->delete_topic_link}{/if}
				{if isset($entry->approve_topic_link)}&nbsp; {$entry->approve_topic_link}{/if}
				</td>
			</tr>
	{/foreach}
		</tbody>
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

<div class="forum_link">
{if isset($new_topic_content)}{$new_topic_link}{/if}
</div>
<br />

{else}
	<p>{$fms->Lang('forum_empty')}</p>
{/if}

</div>
