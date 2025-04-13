{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th class="pageicon">&nbsp;</th>
			<th>{$template}</th>
			<th class="pageicon">{$default}</th>
			<th class="pageicon">{$singledefault}</th>
			<th class="pageicon">{$actions}</th>
		</tr>
	</thead>
	<tbody>
{foreach from=$items item=entry}
{cycle values="row1,row2" assign=rowclass}
		<tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
			<td>{if $entry->id>-1}{$entry->id}{else}&nbsp;{/if}</td>
			<td>{$entry->textid}</td>
			<td style="text-align:center">{$entry->defaultlink}</td>
			<td style="text-align:center">{$entry->singledefaultlink}</td>
			<td style="text-align:center">{$entry->copylink}&nbsp;{$entry->editlink}&nbsp;{$entry->deletelink}</td>
		</tr>
{/foreach}
	</tbody>
</table>
{else}
<h4>{$notemplatestext}</h4>
{/if}

<div class="pageoptions">
	<p class="pageoptions">{$addlink}</p>
</div>
