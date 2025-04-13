<div id='forum'>
<!-- report_moderator -->
{if $breadcrumbs}
<div class="smalltext">
{foreach name=breadcrumb from=$breadcrumbs item=entry}{$entry} {if !$smarty.foreach.breadcrumb.last}&raquo; {/if}{/foreach}
</div>
{/if}

{if isset($message)}<p class="message">{$message}</p>{/if}
<a name="top"></a>
<br />

{$form_start}
	<p>{$report_moderator_header}<br /></p>
	<p><b>{$fms->Lang('report_moderator_label')}:</b> {$report_moderator_input}<br /></p>
	<p>{$form_submit}</p>
{$form_end}

</div>
