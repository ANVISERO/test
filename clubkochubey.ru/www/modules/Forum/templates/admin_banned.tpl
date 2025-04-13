{$fieldset_user_start}
{$form_start}
<p>
	<b>{$user_itemcount} {$fms->Lang('total_user')}</b>
	(<span style="color:red; font-weight:bold">{$user_banned} {$fms->Lang('banid_label')}</span>)
</p>

{if $user_itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$fms->Lang('userid_label')}</th>
			<th>{$fms->Lang('username_label')}</th>
			<th>{$fms->Lang('num_topics_label')}</th>
			<th>{$fms->Lang('num_posts_label')}</th>
			<th>{$fms->Lang('rank_label')}</th>
			<th>{$fms->Lang('banreason_label')}</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$user_items item=entry}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
			<td>{$entry->user_id}</td>
			<td>{if $entry->banned}<span style="color:red; font-weight:bold">{/if}{$entry->username}{if $entry->banned}</span>{/if}</td>
			<td>{$entry->num_topics}</td>
			<td>{$entry->num_posts}</td>
			<td>{repeat string=$starimage times=$entry->rank}</td>
			<td>{$entry->banreason}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
<div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$form_submit} {$banid_action}</p>
</div>
{/if}
{$form_end}
{$fieldset_user_end}

<br />

{$fieldset_ip_start}
{$form_start}
<p>
	<span style="color:red; font-weight:bold">{$ip_itemcount} {$fms->Lang('banip_label')}</span>
</p>

{if $ip_itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$fms->Lang('banip_label')}</th>
			<th>{$fms->Lang('banreason_label')}</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$ip_items item=entry}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
			<td>{$entry->banip}</td>
			<td>{$entry->banreason}</td>
			<td>{$entry->deletelink}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{/if}
<hr />
<div class="pageoverflow">
	<p class="pagetext">{$fms->Lang('banip_label')}:</p>
	<p class="pageinput">{$banip_input}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$fms->Lang('banreason_label')}:</p>
	<p class="pageinput">{$banreason_input}</p>
</div>

<div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$form_submit} {$banip_action}</p>
</div>
{$form_end}
{$fieldset_ip_end}
