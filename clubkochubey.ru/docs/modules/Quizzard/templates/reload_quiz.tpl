{if $message!=""}<strong>{$message}</strong><br />{/if}
<div>
{$startform}
{$hidden}
{if $step == 'first'}
<div class="quizrow">
<label for="{$id}quiz_id">{$title_quiz_name}*:</label>
<select id='{$id}quiz_id' name='{$id}quiz_id'>
	{foreach from=$items item=entry}
		<option value="{$entry->id}">{$entry->title}</option>
	{/foreach}
</select>
</div>
{elseif $step == 'second'}
<div class="quizrow">
<table>
	<tr><th>&nbsp;</th><th>{$sort_column_name}</th><th>{$sort_column_email}</th>
		<th>{$column_score}</th><th>{$sort_column_completed}</th></tr>
	{foreach from=$input_quiz_taker_email item=entry}
		<tr><td>{$entry->viewlink}</td>
			<td>{$entry->linkname}</td>
			<td>{$entry->email}</td>
			<td>{$entry->score}</td>
			<td>{$entry->completed_date}</td>
		</tr>
	{/foreach}
</table>
</div>
{/if}
{$endform}
</div>
