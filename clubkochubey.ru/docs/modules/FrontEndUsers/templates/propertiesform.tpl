{$title}
{if isset($message) }
  {if isset($error) }
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
<div class="pageoverflow">
<p>{$propcount}&nbsp;{$propsfound}</p>
{if $propcount > 0}
<br/>
<table cellspacing="0" class="pagetable cms_sortable tablesorter">
	<thead>
		<tr>
			<th>{$nametext}</th>
			<th>{$prompttext}</th>
			<th>{$typetext}</th>
			<th>{$lengthtext}</th>
			<th class="pageicon {literal}{sorter: false}{/literal}">&nbsp;</th>
			<th class="pageicon {literal}{sorter: false}{/literal}">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
{foreach from=$props item=prope}
		<tr class="{$prope->rowclass}">
			<td>{$prope->name}</td>
			<td>{$prope->prompt}</td>
			<td>{$prope->type}</td>
			<td>{$prope->length}</td>
			<td>{$prope->editlink}</td>
			<td>{if isset($prope->deletelink)}{$prope->deletelink}{/if}</td>
		</tr>
{/foreach}
	</tbody>
</table>
{/if}
</div>
<br/>
<p>{$addlink}</p>
