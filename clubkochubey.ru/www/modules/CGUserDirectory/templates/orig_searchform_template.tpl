{* search form template *}
{* valid fields are:
   {$actionid}ud_submit    - (string) for a submit button
   {$actionid}ud_cancel    - (string) for a cancel button
   {$actionid}ud_username  - (string) username expression
   {$actionid}ud_propvalue - (string) property value
*}

<div id="ud_searchform">
{$formstart}

<div class="row">
  <p class="col30">{$mod->Lang('username')}</p>
  <p class="col70">
    <input type="text" name="{$actionid}ud_username" size="20" maxlength="40"/>
  </p>
</div>

{if isset($searchprops)}
{foreach from=$searchprops key='propname' item='data'}
{$data|@debug_display}
<div class="row">
  <p class="col30">{$data.fielddefn.prompt}:</p>
  <p class="col70">
    {if $data.fieldtype == 'text'}
      <input type="text" name="{$actionid}ud_propvalue[{$propname}]" size="20" maxlength="20"/>
    {else if $data.fieldtype == 'select'}
      <select name="{$actionid}ud_propvalue[{$propname}]">
      {html_options options=$data.options}
      </select>
    {/if}
  </p>
</div>
{/foreach}
{/if}

<div class="row">
  <p class="col30">{$mod->Lang('results_all_any')}?</p>
  <p class="col70">
    <select name="{$actionid}ud_allany">
      <option value="all">{$mod->Lang('all')}</option>
      <option value="any">{$mod->Lang('any')}</option>
    </select>
  </p>
</div>

<div class="row">
  <p class="col30"> </p>
  <p class="col70">
    <input type="submit" name="{$actionid}ud_submit" value="{$mod->Lang('submit')}"/>
  </p>
</div>

{$formend}
</div>
{* search form template *}
{* valid fields are:
   {$actionid}ud_submit    - (string) for a submit button
   {$actionid}ud_cancel    - (string) for a cancel button
   {$actionid}ud_username  - (string) username expression
   {$actionid}ud_propvalue - (string) property value
*}

<div id="ud_searchform">
{$formstart}

<div class="row">
  <p class="col30">{$mod->Lang('username')}</p>
  <p class="col70">
    <input type="text" name="{$actionid}ud_username" size="20" maxlength="40"/>
  </p>
</div>

{if isset($searchprops)}
{foreach from=$searchprop key='propname' item=$data}
<div class="row">
  <p class="col30">{$data.fielddefn.prompt}:</p>
  <p class="col70">
    {if $data.fieldtype == 'text'}
      <input type="text" name="{$actionid}ud_propvalue[{$propname}]" size="20" maxlength="20"/>
    {else if $data.fieldtype == 'select'}
      <select name="{$actionid}ud_propvalue[{$propname}]">
      {html_options options=$ud_options}
      </select>
    {/if}
  </p>
</div>
{/foreach}
{/if}

<div class="row">
  <p class="col30">{$mod->Lang('results_all_any')}?</p>
  <p class="col70">
    <select name="{$actionid}ud_allany">
      <option value="all">{$mod->Lang('all')}</option>
      <option value="any">{$mod->Lang('any')}</option>
    </select>
  </p>
</div>

<div class="row">
  <p class="col30">&nbsp;</p>
  <p class="col70">
    <input type="submit" name="{$actionid}ud_submit" value="{$mod->Lang('submit')}"/>
  </p>
</div>

{$formend}
</div>