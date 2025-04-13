<div id="forum">
<!-- index -->
{if $breadcrumbs}
<div class="smalltext">
{foreach name=breadcrumb from=$breadcrumbs item=entry}{$entry} {if !$smarty.foreach.breadcrumb.last}&raquo; {/if}{/foreach}
</div>
{/if}

{if isset($message)}<p class="message">{$message}</p>{/if}
<br />

{if $itemcount > 0}
<div class="forum_border">
{foreach from=$items item=entry}
	{if $entry->type=='section'}<br /><h3 class="catbg">{$entry->forum_link}</h3>
	{else}
	<table cellspacing="1" id="index_table">
		<tr>
			<td class="windowbg index_icon">
				<img src="{$entry->forum_icon}" alt="{$fms->Lang('forum')}" title="{$fms->Lang('forum')}" />
			</td>
			<td class="windowbg2 index_info">
				<h4>{$entry->forum_link}</h4>
				{if isset($entry->description)}<p>{$entry->description}</p>{/if}
			</td>
			<td class="windowbg index_stats smalltext">
				{$entry->posts_count} {$fms->Lang('num_posts_label')}<br />{$entry->topics_count} {$fms->Lang('num_topics_label')}
			</td>
			<td class="windowbg2 index_lastpost smalltext">
			{if isset($entry->lastposter)}
				<strong>{$fms->Lang('topic_last_post_label')}</strong> {$fms->Lang('by')} {$entry->lastposter} {$fms->Lang('in')} {$entry->topic_link}<br />
				{$entry->lastposter_time} <a href="{$entry->post_url}#msg{$entry->post_id}"><img src="{$ImageUrl}last_post.gif" title="{$fms->Lang('topic_last_post_label')}" alt="{$fms->Lang('topic_last_post_label')}" /></a>
			{/if}
			</td>
		</tr>
	</table>
	{/if}
{/foreach}
</div>

{else}
	<p>{$fms->Lang('forums_empty')}</p>
{/if}

</div>
