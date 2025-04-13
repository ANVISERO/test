<div id="comments">
<!-- Start Comments Display Template -->

{if $items}
<ul>
{/if}
{foreach from=$items item=entry}
	<li class="{$entry->cssclass}">{if $entry->comment_title}<strong>{$entry->comment_title}</strong><br />{/if}
	{if $entry->comment_author}
            {* note, one could use the $entry->author_email field here, and the smarty mailto tag to generate a mailto link to this author, but it is not done by default. *}
            {$entry->comment_author} - 
        {/if}
	{if $entry->author_website}
            <a href="{$entry->author_website}" target="_blank">{$entry->author_website}</a> - 
	{/if}
	{$entry->date}<br />
	{$entry->comment_data}
	</li>
{/foreach}
{if $items}
</ul>
{/if}

{if FALSE == $errormessage}
{startExpandCollapse id="name" title="$addacomment"}
{else}
{$errormessage}
{/if}
<h3>{$addacomment}</h3>

{if isset($smarty.session.Comments.error)}
  {* display an error message from the comments module *}
  <div style="text-size: 1.5em; color: red;">{$smarty.session.Comments.error}</div>
{elseif isset($smarty.session.Comments.message)}
  {* display an optional message from the comments module *}
  <p style="text-size: 1.5em; color: green;">{$smarty.session.Comments.message)}</p>
{/if}

{$startform}
{$image}
{if $spamprotect}
{$spamprotectimage}<br />
{/if}

<table>
{if $spamprotect}
	<tr>
		<td>{$entercodetxt}:</td>
		<td>{$inputentercode}</td>
	</tr>
{/if}
	<tr>
		<td>{$titletxt}:</td>
		<td>{$inputtitle}</td>
	</tr>
	<tr>
		<td>{$yournametxt}(*):</td>
		<td>{$inputyourname}</td>
	</tr>
	<tr>
		<td>{$emailtxt}:</td>
		<td>{$inputemail}</td>
	</tr>
	<tr>
		<td>{$notifytxt}:</td>
		<td>{$inputnotify}</td>
	</tr>
	<tr>
		<td>{$websitetxt}:</td>
		<td>{$inputwebsite}</td>
	</tr>
	<tr>
		<td>{$commenttxt}(*):</td>
		<td>{$inputcomment}</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>{$submit} {$cancel}</td>
	</tr>
</table>

{$endform}
{if FALSE == $errormessage}
{stopExpandCollapse} 
{/if}

<!-- End Comments Display Template -->
</div>
