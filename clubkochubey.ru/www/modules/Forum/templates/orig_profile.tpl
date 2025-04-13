<div id='forum'>
<!-- profile -->
<div class="smalltext">
{$prev_content_link}
</div>


{if isset($message)}<p class="message">{$message}</p>{/if}
<br />

<div class="catbg3">
{$fms->Lang('profile_of')}: {$profile_name}
</div>
<br />

{if $avatar}
<img src="{$avatar}" alt="avatar" title="avatar" /><br />
{/if}

{if $feuproperties > 0}
<table cellspacing="1" id="index_table">
	{foreach from=$feuproperties key=key item=entry}
	<tr>
		<td class="windowbg">
			<b>{$key}</b>: {$entry}
		</td>
	</tr>
	{/foreach}
</table>
{/if}

{if isset($credit)}
<table cellspacing="1" id="index_table">
	{foreach from=$credit key=key item=entry}
	<tr>
		<td class="windowbg">
			<b>{$key}</b>: {$entry}
		</td>
	</tr>
	{/foreach}
</table>
{/if}

</div>
