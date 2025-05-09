<h3>{$title}</h3>
{if isset($message) }
  {if isset($error) }
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
{$startform}
<div>{$orig_type}</div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_name}</p>
    <p class="pageinput">{$input_name}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_prompt}</p>
    <p class="pageinput">{$input_prompt}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_type}</p>
    <p class="pageinput">{$input_type}</p>
  </div>
  {if isset($fields)}
  {foreach from=$fields item='onefld'}
  <div class="pageoverflow">
    <p class="pagetext">{$onefld[0]}</p>
    <p class="pageinput">{$onefld[1]}</p>
  </div>
  {/foreach}
  {/if}
  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput">{$hidden}{$submit}{$cancel}</p>
  </div>
{$endform}
