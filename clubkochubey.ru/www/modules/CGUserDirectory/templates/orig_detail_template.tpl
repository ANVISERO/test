{* CGUserDirectory detail template *}
<div id="userdirectory_detail">

  <div class="row" style="margin: 0.5em;">
    <div style="width: 49%; float: left;">{$mod->Lang('username')}:</div>
    <div style="width: 49%; float: left;">{$oneuser.username} ({$oneuser.id})</div>
  </div>

  <div class="row" style="margin: 0.5em;">
    <div style="width: 49%; float: left;">{$mod->Lang('created')}:</div>
    <div style="width: 49%; float: left;">{$oneuser.createdate|cms_date_format}</div>
  </div>

  <div class="row" style="margin: 0.5em;">
    <div style="width: 49%; float: left;">{$mod->Lang('expires')}:</div>
    <div style="width: 49%; float: left;">{$oneuser.expires|cms_date_format}</div>
  </div>

  {if isset($oneuser.refdate)}
  <div class="row" style="margin: 0.5em;">
    <div style="width: 49%; float: left;">{$mod->Lang('last_active')}:</div>
    <div style="width: 49%; float: left;">{$oneuser.refdate|cms_date_format}</div>
  </div>
  {/if}

  <div class="row" style="margin: 0.5em;">
    <div style="width: 49%; float: left;">{$mod->Lang('groups')}:</div>
    <div style="width: 49%; float: left;">     
    {foreach from=$oneuser.groups item='onegroup'}
      {$groups.$onegroup.groupname}&nbsp;
    {/foreach}
    </div>
  </div>

  {* properties *}
  {foreach from=$oneuser.properties item='onepropvalue' key='propname'}
  <div class="row" style="margin: 0.5em;">
    <div style="width: 49%; float: left;">{$properties.$propname.prompt}:</div>
    <div style="width: 49%; float: left;">
    {if $properties.$propname.type == 6}
       {* image *}
       <img src="{$file_location}/{$onepropvalue}" width="100"/>
    {else}
       {$onepropvalue}
    {/if}
    </div>
  </div>
  {/foreach}

  
</div>