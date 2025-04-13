<div id='forum'>
<!-- edit_post -->
{if $breadcrumbs}
<div class="smalltext">
{foreach name=breadcrumb from=$breadcrumbs item=entry}{$entry} {if !$smarty.foreach.breadcrumb.last}&raquo; {/if}{/foreach}
</div>
{/if}

{if isset($message)}<p class="message">{$message}</p>{/if}
<a name="top"></a>
<br />

{$form_start}
	<p>
	<b>{$topic_subject_label}</b>
	{$topic_subject_input}<br />
	</p>
	<p>
	<b>{$fms->Lang('post_body_label')}</b><br />
	{$post_body_input}<br />
	{if isset($captcha_image)}
		{if isset($captcha_error)}{$captcha_error}{/if}<br />
		{$captcha_image}{$captcha_input}
		{$fms->Lang('front_captcha_label')}<br />
	{/if}
	</p>
	<p>{$form_submit}</p>
{$form_end}

</div>
