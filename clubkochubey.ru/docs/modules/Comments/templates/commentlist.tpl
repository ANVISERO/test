{literal}
<script type="text/javascript">
function selectall() {
	checkboxes = document.getElementsByTagName("input");
	for (i=0; i<checkboxes.length ; i++) {
	  if (checkboxes[i].type == "checkbox") checkboxes[i].checked=!checkboxes[i].checked;
	}
}
</script>
{/literal}
<fieldset>
<legend>{$mod->Lang('filters')}:&nbsp;</legend>
{$filter_formstart}
<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('page_limit')}:</p>
  <p class="pageinput">{$input_pagelimit}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput"><input type="submit" name="{$mod->GetActionId()}submit" value="{$mod->Lang('submit')}"></p>
</div>
{$filter_formend}
</fieldset>

{if $itemcount > 0}
{if isset($firstpage_url)}
 <a href="{$firstpage_url}" title="{$mod->Lang('firstpage')}">{$mod->Lang('firstpage')}</a>
 <a href="{$prevpage_url}" title="{$mod->Lang('prevpage')}">{$mod->Lang('prevpage')}</a>
{/if}
{if isset($firstpage_url) || isset($lastpage_url)}
  {$mod->Lang('page_of',$pagenumber,$pagecount)}
{/if}
{if isset($lastpage_url)}
 <a href="{$nextpage_url}" title="{$mod->Lang('nextpage')}">{$mod->Lang('nextpage')}</a>
 <a href="{$lastpage_url}" title="{$mod->Lang('lastpage')}">{$mod->Lang('lastpage')}</a>
{/if}
{$formstart}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$datatext}</th>
			<th>{$titletext}</th>
			<th>{$authortext}</th>
			<th>{$activetext}</th>
			<th>{$postdatetext}</th>
			<th>{$modifydatetext}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">{$checkall}</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
			<td>{$entry->data}</td>
			<td>{$entry->title}</td>
			<td><a href="mailto:{$entry->email}" title="Click to send email">{$entry->author}</a></td>
			<td>{$entry->active}</td>
			<td>{$entry->postdate}</td>
			<td>{$entry->modifydate}</td>
			<td>{$entry->deletelink}</td>
			<td>{$entry->massdeletebox}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
<div style="text-align:right; padding-right: 37px;">{$massdelbutton}</div>
{$formend}
{else}
<br />{$message}<br />
{/if}
