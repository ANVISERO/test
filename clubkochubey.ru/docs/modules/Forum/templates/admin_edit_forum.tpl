{$form_start}
<div class="pageoverflow">
  <p class="pagetext">{$fms->Lang('forum_type_label')}:</p>
  <p class="pageinput">{$forum_type_input}</p>
</div>

{if isset($mle_dd)}
<div class="pageoverflow">
  <p class="pagetext">{$fms->Lang('language')}:</p>
  <p class="pageinput">{$mle_dd}</p>
</div>
{/if}

<div class="pageoverflow">
  <p class="pagetext">{$fms->Lang('forum_name_label')}:</p>
  <p class="pageinput">{$forum_name_input}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{$fms->Lang('forum_description_label')}:</p>
  <p class="pageinput">{$forum_description_input}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{$fms->Lang('forum_parent_label')}:</p>
  <p class="pageinput">{$forum_parent_input}</p>
{if isset($forum_parent_order_input)}
  <p class="pagetext">{$fms->Lang('forum_parent_order_label')}:</p>
  <p class="pageinput">{$forum_parent_order_input}</p>
{/if}
</div>
<div class="pageoverflow">
  <p class="pagetext">{$fms->Lang('forum_icon_label')}:</p>
  <p class="pageinput">{$forum_icon_input}</p>
</div>
<hr />

{if isset($properties)}
	{foreach from=$properties item=item}
<div class="pageoverflow">
  <p class="pagetext">{$item.label}:</p>
  <p class="pageinput">{$item.edit} {if isset($item.comment)}&nbsp; - {$item.comment}{/if}</p>
</div>
	{/foreach}
{/if}

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">{$form_submit} {$form_cancel} {$form_hidden}</p>
</div>
{$form_end}
