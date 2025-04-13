{$tree}: {$tree_name}
<pre>

{foreach from=$dumps item=result}
{' '|str_repeat:$result.level*5}<em>{foreach from=$result key=key item=item}{if $key=='id'}<b>#ID:{$item}</b> {elseif $key!='lang'}<em>  {$key}:{$item}</em>{/if}</em>{/foreach}


{/foreach}

</pre>
