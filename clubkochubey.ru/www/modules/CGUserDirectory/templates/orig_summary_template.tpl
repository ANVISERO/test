{* CGUserDirectory summary template *}

<div id="userdirectory_summary">
{if isset($numpages) && $numpages > 1}
{if isset($firstpage_url)}
  <a href="{$firstpage_url}" title="{$mod->Lang('lbl_first_page')}">&lt;&lt;</a>
{/if}
{if isset($prevpage_url)}
  <a href="{$prevpage_url}" title="{$mod->Lang('libl_prev_page')}">&lt;</a>
{/if}
&nbsp;{$mod->Lang('page')}&nbsp;{$curpage}&nbsp;{$mod->Lang('of')}&nbsp;{$numpages}&nbsp;
{if isset($nextpage_url)}
  <a href="{$nextpage_url}" title="{$mod->Lang('lbl_next_page')}">&gt;</a>
{/if}
{if isset($lastpage_url)}
  <a href="{$lastpage_url}" title="{$mod->Lang('lbl_last_page')}">&gt;&gt;</a>
{/if}
{/if}

{foreach from=$users item='oneuser'}
<div class="userdirectory_oneuser" style="margin: 2em; padding-bottom; 2em;">

  <div class="row" style="margin: 0.5em;">
    <div style="width: 49%; float: left;">{$mod->Lang('username')}:</div>
    <div style="width: 49%; float: left;"><a href="{$oneuser.detail_url}" title="{$oneuser.username}">{$oneuser.username}</a> ({$oneuser.id})</div>
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
      {if $properties.$propname.type == 4}
        {$feu_smarty->get_dropdown_text($propname,$onepropvalue)}
        {* dropdown *}
      {elseif $properties.$propname.type == 5}
        {* multiselect *}
	{assign var='tmp' value=','|explode:$onepropvalue}
        {$feu_smarty->get_multiselect_text($propname,$onepropvalue,'values')}
        {cgud_getpropertysummary_url prop="$propname" propval="$onepropvalue" assign='urls'}
        <ul>
        {foreach from=$values name='multi' item='one'}
          <li>
            {assign var='i' value=$smarty.foreach.multi.index}
            <a href="{$urls[$i]}" title="{$one}">{$one}</a>
          </li>
        {/foreach}
        </ul>
      {else}
        {$onepropvalue}
      {/if}
    </div>
  </div>
  {/foreach}

</div>{* userdirectory_oneuser *}
<br/><br/>
{/foreach}
</div>{* userdirectory_summary *}