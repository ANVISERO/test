Quiz Taker: {$taker_name} <{$taker_email}>
{foreach from=$extras item=entry}
{$entry.field_name}: {$entry.human_value}
{/foreach}
Quiz Results: {$score} of {$total_questions} ({$score_percent}% correct)
{if $user_email==1}
You answered {$questions_answered} ({$percent_answered}%) and skipped {$questions_skipped} ({$percent_skipped}%)
Of the questions you answered, you got {$score_percent_answered}% right.

Here's what you missed:
{else if $admin_email==1}
{$taker_name} answered {$questions_answered} ({$percent_answered}%) and skipped {$questions_skipped} ({$percent_skipped}%)
Of the questions {$taker_name} answered, he/she got {$score_percent_answered}% right.
{/if}

{foreach from=$questions item=entry}
{if ($user_email==1 && $entry->is_scored) || $admin_email}
{if $entry->type == 's'}{$entry->question}

{elseif $entry->skipped == 1 || $entry->correct == 0}{if $entry->type == 'f' || $entry->type == 'm' || $entry->type == 'c'}{$entry->num}) {/if} {$entry->question_txt}
{if $entry->type == 'f' || $entry->type == 'm' || $entry->type == 'c'}{if $entry->skipped==1}{$title_skipped}
{else}{$title_your_answer}: {$entry->givenanswer_txt}
{/if}
{if $entry->is_scored == 1}
{$title_correct_answer}: {$entry->correctanswer_txt}

{/if}
{/if}
{/if}
{/if}
{/foreach}	