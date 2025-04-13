{* browse property values template *}
{if isset($browseoptions)}
<ul>
{foreach from=$browseoptions item='one'}
  <li><a href="{$one.url}" title="{$one.name}">{$one.name}{if isset($one.count)} ({$one.count}){/if}</a></li>
{/foreach}
</ul>
{/if}
