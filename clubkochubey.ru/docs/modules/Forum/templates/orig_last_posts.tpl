<div id="forum">
<!-- last_posts -->

{if $itemcount > 0}
	{foreach from=$items item=entry}
		{cycle values="windowbg2,windowbg3" assign="windowbg"}
		<p class="{$windowbg} mediumtext">
			{$entry->forum_name}: {$entry->topic_link}<br />
			<span class="smalltext">
				<strong>{$fms->Lang('topic_last_post_label')} {$fms->Lang('by')}</strong> {$entry->lastposter} {$entry->lastposter_time} <a href="{$entry->url}#msg{$entry->post_id}"><img src="{$ImageUrl}last_post.gif" title="{$fms->Lang('topic_last_post_label')}" alt="{$fms->Lang('topic_last_post_label')}" /></a><br />
				<strong>{$fms->Lang('started_by')}</strong> {$entry->startedby} {$entry->startedby_time}
			</span>
		</p>
	{/foreach}
{else}
	<p>{$fms->Lang('last_posts_empty')}</p>
{/if}

</div>
