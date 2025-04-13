{* radio button group form template *}
{if isset($error)}
<div class="error"><p>{$error}</p></div>
{/if}

{$formstart}
{if isset($question)}
{$question}
<br/>
{/if}
<div id="decision">
  <p>
    {foreach from=$choices item='label' key='value'}
      <input type="radio" name="{$actionid}choice" value="{$value}"/>&nbsp;{$label}<br/>
    {/foreach}
  </p>
  <p>
    <input type="submit" name="{$actionid}next" value="{$mod->Lang('next')}"/>
    <input type="submit" name="{$actionid}prev" value="{$mod->Lang('prev')}"/>
  </p>
</div>
{$formend}