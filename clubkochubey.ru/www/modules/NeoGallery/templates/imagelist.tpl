{if $navigation!=""}

<h1>
<div align="center" style="width:100%;">
{$firstlink}&nbsp;&nbsp;
{$previouslink}&nbsp;&nbsp;
{$pagelinks}&nbsp;&nbsp;
{$nextlink}&nbsp;&nbsp;
{$lastlink}
</div>
</h1>

{/if}

{if $itemcount > 0}

{$formstart}
{$submittop}

<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<!--<th class="pageicon">&nbsp;</th>-->
			<th class="pageicon">&nbsp;</th>
			<th>{$nametext}</th>
			<th>{$descriptiontext}</th>
			<th class="pageicon">{$infotext}</th>						
			<th class="pageicon">{$hiddentext}</th>
		</tr>
	</thead>
	<tbody>
{foreach from=$items item=entry}
{cycle values="row1,row2" assign=rowclass}
		<tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
			<td>{$entry->thumbnailimg}</td>
			<td>{$entry->name}</td>
			<td>{$entry->descriptioninput}</td>
			<td>{$entry->info}</td>
			<td>{$entry->hiddeninput}</td>			
		</tr>
{/foreach}
	</tbody>
</table>

{$submitbottom}
{$formend}

{else}
<h4>{$noimagestext}</h4>
{/if}
