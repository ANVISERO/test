<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$header_name}</th>
			<th>{$header_url}</th>
			<th>{$header_img}</th>
			<th>{$header_category}</th>
			<th />
			<th />
		</tr>
	</thead>
	<tbody>
{foreach from=$items item=entry}
		<tr class="{$entry.rowclass}" onmouseover="this.className='{$entry.rowclass}hover';" onmouseout="this.className='{$entry.rowclass}';">
			<td>{$entry.link_name}</td>
			<td>{$entry.link_url}</td>
			<td>{$entry.link_img}</td>
			<td>{$entry.link_category}</td>
			<td>{$entry.editlink}</td>
			<td>{$entry.delete}</td>
		</tr>
{/foreach}
	</tbody>
</table>
{$addlink}
