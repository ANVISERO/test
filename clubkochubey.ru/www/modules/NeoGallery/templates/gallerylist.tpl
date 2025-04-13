{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th class="pageicon">&nbsp;</th>
			<th>{$nametext}</th>
			<th>{$pathtext}</th>
			<th>{$templatetext}<!--{$subsystemtext}--></th>
			<th class="pageicon">{$default}</th>			
			<th class="pageicon">{$actions}</th>
		</tr>
	</thead>
	<tbody>
{foreach from=$items item=entry}
{cycle values="row1,row2" assign=rowclass}
		<tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
			<td>{$entry->id}</td>
			<td>{$entry->name}</td>
			<td>{$entry->path}</td>
			<td>{$entry->template}<!--{$entry->subsystem}--></td>
			<td style="text-align:center">{$entry->defaultlink}</td>			
			<td style="text-align:center">{$entry->editlink}{$entry->deletelink}</td>
		</tr>
{/foreach}
	</tbody>
</table>
{else}
<h4>{$nogalleriestext}</h4>
{/if}

<div class="pageoptions">
	<p class="pageoptions">{$addlink}</p>
</div>
