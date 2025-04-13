<p>{$new_forum_link} &nbsp; &nbsp; {if isset($mle_switch)}{$mle_switch}{/if}</p>

{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$fms->Lang('forum_id_label')}</th>
			<th>{$fms->Lang('forum_name_label')}</th>
			<th>{$fms->Lang('forum_description_label')}</th>
			<th class="pagepos">{$fms->Lang('forum_type_label')}</th>
			<th class="pagepos">{$fms->Lang('forum_topic_count_label')}</th>
			<th class="pagepos">
				{$fms->Lang('forum_post_count_label')}
				{if isset($posts_on_approve)}<br /><span style="color:#f00">({$fms->Lang('forum_post_approve_label')})</span>{/if}
			</th>
			<th class="pagepos">{$fms->Lang('forum_position_label')}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
			<td>{$entry->id}</td>
			<td>{'- '|str_repeat:$entry->level}{$entry->namelink}</td>
			<td>{$entry->description}</td>
			<td class="pagepos">{$entry->type}</td>
			<td class="pagepos">{$entry->topics_count}</td>
			<td class="pagepos">
				{$entry->posts_count}
				{if isset($entry->posts_on_approve)}<span style="color:#f00">({$entry->posts_on_approve})</span>{/if}
			</td>
			<td class="pagepos">{if isset($entry->uplink)}{$entry->uplink}{/if} {if isset($entry->downlink)}{$entry->downlink}{/if}</td>
			<td>{$entry->editlink}</td>
			<td>{if isset($entry->deletelink)}{$entry->deletelink}{/if}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{/if}

<p>{$new_forum_link} &nbsp; &nbsp; {if isset($mle_switch)}{$mle_switch}{/if}</p>
