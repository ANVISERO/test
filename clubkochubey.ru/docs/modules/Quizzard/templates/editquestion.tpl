{if $message != ""}<h3>{$message}</h3>{/if}
{literal}
<script type="text/javascript">

	function fast_add(field_type)
		{
		{/literal}
		var type=field_type.options[field_type.selectedIndex].value;
		var link = '{$reloadlink}&{$id}quiz_id={$quiz_id}&{$id}question_id={$question_id}&{$id}qtype='+type;
		this.location=link;
		return true;
		{literal}
		}
</script>
{/literal}
{$back_to_main}{$back_to_quiz}
{$startform}
<div class="pageoverflow">
	<p class="pagetext">{$title_question_type}:</p>
	<p class="pageinput">{$input_question_type}</p>
</div>
{if $qtype == 'p'}
<div id="questiontitle" class="pageoverflow">
	<p class="pagetext">{$title_question_title}:</p>
	<p class="pageinput">{$input_question_title}</p>
</div>
{/if}
{if $qtype != 'b' && $qtype != ''}
<div id="question" class="pageoverflow">
	<p class="pagetext">{$title_question_text}:</p>
	<p class="pageinput">{$input_question_text}</p>
</div>
{/if}
{if $qtype == 'f' || $qtype == 'm' || $qtype == 'c'}
<div id="scored" class="pageoverflow">
	<p class="pagetext">{$title_question_scored}:</p>
	<p class="pageinput">{$input_question_scored}</p>
</div>
{/if}
{if $qtype == 'f'}
<div id="quiz_fillin" class="pageoverflow">
	<p>{$title_answer_text_help}</p>
</div>
{/if}
{if $qtype == 'm' || $qtype == 'c' || $qtype == 'f'}
{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>{if $qtype == 'm' || $qtype == 'c'}
			<th>{$column_correct}</th>
			{/if}
			<th>{$column_answer}</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry key=k}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
			{if $qtype == 'm'}
			<td>{$entry->mcorrect}</td>
			{/if}
			{if $qtype == 'c'}
			<td>{$entry->ccorrect}</td>
			{/if}
			<td>{$entry->answer}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>{$noanswers}</p>
{/if}
{/if}
<div class="pageoverflow">
	<p class="pagetext"></p>
	<p class="pageinput">{$hidden}{$save}</p>
</div>
{$endform}
{$back_to_main}
