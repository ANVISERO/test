<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$header_name}</th>
			<th />
		</tr>
	</thead>
	<tbody>
{foreach from=$items item=entry}
		<tr class="{$entry.rowclass}" onmouseover="this.className='{$entry.rowclass}hover';" onmouseout="this.className='{$entry.rowclass}';">
			<td>{$entry.link}</td>
			<td>{$entry.delete}</td>
		</tr>
{/foreach}
	</tbody>
</table>
{$addlink}
