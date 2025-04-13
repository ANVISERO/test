{* directory template *}
<div class="userdirectory_directory">
  {if isset($chararray)}
  {foreach from=$chararray item='one'}

    {if isset($one[1])}
      <span class="userdirectory_directoryletter"><a href="{$one[1]}" title="{$one[0]}">{$one[0]}</a></span>
    {else}
      <span class="userdirectory_directoryletter">{$one[0]}</a>
    {/if}

  {/foreach}
  {/if}
</div>