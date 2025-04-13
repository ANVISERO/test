{if $message!=""}<strong>{$message}</strong><br />{/if}
<div>
{$startform}
<div class="quizrow">
<label for="name">{$title_name}{if $req_user}*{/if}:</label>
{$input_name}
</div>

<div class="quizrow">
<label for="email">{$title_email}{if $req_user}*{/if}:</label>
{$input_email}
</div>

{foreach from=$extras item=entry}
        	<div class="quizrow">
			{$entry.label}{if $entry.required}*{/if}:
			{$entry.input}
			</div>
{/foreach}

<div class="quizrow">
<label for="send_a_copy">{$title_send_a_copy}:</label>
{$input_send_a_copy}
</div>

<div class="quizrow">
{$quiz_id}{$takequiz}
</div>
{$endform}
</div>
