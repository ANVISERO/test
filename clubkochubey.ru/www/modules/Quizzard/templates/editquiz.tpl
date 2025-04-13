{if $message != ""}<h3>{$message}</h3>{/if}
{$back_to_main}
{$startform}

<div class="pageoverflow">
	<p class="pagetext">{$title_quiz_name}:</p>
	<p class="pageinput">{$input_quiz_name}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$title_quiz_desc}:</p>
	<p class="pageinput">{$input_quiz_desc}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"></p>
	<p class="pageinput">{$save}{$hidden}{$done}</p>
</div>
{if $itemcount > 0}
{if $qidset != 0}
<div class="pageoptions">
	<p class="pageoptions">{$addlink}&nbsp;{$order_field_link}</p>
</div>
{/if}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$column_question}</th>
			<th>{$column_type}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
			<td>{if $entry->num != ''}{$entry->num}. {/if}{$entry->name}</td>
			<td>{$entry->type}</td>
			<td>{$entry->downlink}</td>
			<td>{$entry->uplink}</td>
			<td>{$entry->editlink}</td>
			<td>{$entry->deletelink}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>{$noquestions}</p>
{/if}
{if $qidset == 0}
<p>{$title_save_help}</p>
{else}
<div class="pageoptions">
	<p class="pageoptions">{$addlink}&nbsp;{$order_field_link}</p>
</div>
{/if}
{$back_to_main}
