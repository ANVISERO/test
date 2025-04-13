<script type="text/javascript">
{literal}
function toggle_nms_users_selectall()
{
  checkboxes = document.getElementsByName("{/literal}{$actionid}{literal}user_selected[]");
  elem = document.getElementById('users_selectall');
  state = elem.checked;
  for (i=0; i < checkboxes.length; i++)
  {
    if (checkboxes[i].type == "checkbox") 
    {
      checkboxes[i].checked=state;
    }
  }
}
//]]>
{/literal}
</script>

{if isset($message)}
  {if $error != ''}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
{if $noform == ''}
{$startform}
<div class="pageoverflow">
  <p class="pagetext">{$prompt_userfilter}</p>
  <p class="pageinput">{$userfilter}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{$prompt_usernamefilter}</p>
  <p class="pageinput">{$usernamefilter}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{$prompt_listfilter}</p>
  <p class="pageinput">{$listfilter}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">{$info_listfilter}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{$prompt_users_per_page}</p>
  <p class="pageinput">{$users_per_page}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">{$filter}</p>
</div>
{$endform}

<div class="pageoptions"><p class="pageoptions">{$itemcount}&nbsp;{$itemsfound}&nbsp;{$oftext}&nbsp;{$totalitems}</p></div>
{if $pagecount != ''}
<div class="pageoverflow">
<div class="pageshowrows">{$firstpage}&nbsp;{$prevpage}&nbsp;{$pagetext}&nbsp;{$curpage}&nbsp;{$oftext}&nbsp;{$pagecount}&nbsp;{$nextpage}&nbsp;{$lastpage}</div>
</div>
{/if}
{if $itemcount > 0}
{$formstart2}
<table border="0" cellspacing="0" cellpadding="0" class="pagetable">
 <thead>
  <tr>	
  <th>{$usertext}</th>
  <th>{$emailtext}</th>
  <th>{$nametext}</th>
  <th>{$confirmedtext}</th>
  <th>{$liststext}</th>
  <th>{$disabledtext}</th>
  <th class="pageicon">&nbsp;</th>
  <th class="pageicon">&nbsp;</th>
  <th class="pageicon"><input type="checkbox" id="users_selectall" name="users_selectall" value="1" onclick="toggle_nms_users_selectall();"/></th>
  </tr>
 </thead>
 <tbody>
{foreach from=$items item=entry}
  <tr class="{$entry->rowclass}">
    <td>{$entry->user}</td>
    <td>{$entry->email}</td>
    <td>{$entry->name}</td>
    <td>{$entry->confirmed}</td>
    <td>{$entry->lists}</td>
    <td>{$entry->disabled}</td>
    <td>{$entry->editlink}</td>
    <td>{$entry->deletelink}</td>
    <td><input type="checkbox" name="{$actionid}user_selected[]" value="{$entry->user}"/></td>
  </tr>
{/foreach}
 </tbody>
</table>
{/if}
<div class="pageoptions" style="height: 3em;">
  <div style="float: left; width: 40%;">
    {$createlink}&nbsp;{$importlink}&nbsp;{$feuimportlink}&nbsp;{$exportlink}&nbsp;{$bounceslink}
  </div>
  <div style="float: right; text-align: right; width: 40%; margin-top: 1em;">
    {$mod->Lang('with_selected')}:&nbsp;&nbsp;{$bulk_actions}
    <input type="submit" name="{$actionid}bulk_submit" value="{$mod->Lang('submit')}" onclick="confirm('{$mod->Lang('confirm_bulkactions')}');"/>
  </div>
</div>
{$formend2}
{/if}
