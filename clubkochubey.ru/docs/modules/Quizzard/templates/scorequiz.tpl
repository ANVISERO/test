{*
   Other variables available:
   
   total_questions - number of questions
   total_scored - number of questions used for scoring quiz
   questions_skipped - number of questions that weren't answered
   questions_answered - number of questions that were answered
   percent_answered - percentage of the questions that were answered
   percent_skipped - percentage of the questions that were not answered
   score - number correct
   score_percent - percentage correct
   score_percent_answered - percent correct of non-skipped questions
   quiz_name - name of the quiz
   reviewing - equals "1" if reviewing in the quiz admin
   
   There's also the questions array, containing all of the questions
   of the exam in an object with the following attributes:
   
   q->num - question number
   q->question - the original text of the question
   q->question_txt - the original text of the question with no HTML
   q->correct - 1 if the answer was correct, 0 otherwise
   q->skipped - 1 if the question was skipped, 0 otherwise
   q->givenanswer - given answer(s)
   q->givenanswer_txt - given answer(s) with no HTML.
   q->correctanswer - the correct answer(s)
   q->correctanswer_txt - the correct answer(s) with no HTML.
   q->type - "m" for multiple choice, "f" for fill in the blank,
		     "c" for select one or more, "p" for content page,
             "s" for section, "t" for text line

   
   
*}

{if $reviewing == '1'}
<h3>{$taker_name} &lt;{$taker_email}&gt;</h3>
{foreach from=$extras item=entry}
<strong>{$entry.field_name}:</strong> {$entry.human_value}<br />
{/foreach}
<strong>Score: {$score} of {$total_questions} ({$score_percent}%)</strong><br />
<strong>Questions answered:</strong> {$questions_answered} ({$percent_answered}%)<br />
<strong>Questions Skipped:</strong> {$questions_skipped} ({$percent_skipped}%)<br />
<strong>Percentage of answered that were correct:</strong> {$score_percent_answered}% right.<br />
<br />

{else}

<h3>{$title_quiz_complete}</h3>
{*
   The next bit is an example of what you can do in smarty; it's
   not localized, but it'd be easy enough to change to do what
   you want.   
*}
<h4>Your Rating: {$score} of {$total_questions} ({$score_percent}%)</h4>
<h5>You answered {$questions_answered} ({$percent_answered}%) and skipped {$questions_skipped} ({$percent_skipped}%)</h5>
<h5>Of the questions you answered, you got {$score_percent_answered}% right.</h5>
<p>
{if $score_percent < 20}
	You don't know anything about anything.
{elseif $score_percent >= 20 && $score_percent < 40}
	You may know something about something, but not this subject.
{elseif $score_percent >= 40 && $score_percent < 60}
	You qualify as ignoramus, but not much more.
{elseif $score_percent >= 60 && $score_percent < 80}
	A Reasonable Effort. At best.
{elseif $score_percent >= 80 && $score_percent < 100}
	Well done! You've got some talent.
{else}
	You are awe inspiring. Perfect!
{/if}
</p>
{/if}

<!-- some inline styles. feel free to alter this stuff! -->
{literal}
<style>
.correct_answer { font-weight: bold; }
.given_answer { font-style: oblique; }
.quiz_correct { color: #33aa33; }
.quiz_incorrect { color: #aa3333; }
.quiz_skipped {color: #993333;}
</style>
{/literal}


<!-- the next part displays all the questions, and user's response -->
<h4>{$title_quiz_summary}</h4>
{foreach from=$questions item=entry}
{if $entry->is_scored == 1}
{if $entry->type == 's'}
<h2>{$entry->question}</h2>
{elseif $entry->type == 't'}
<h3>{$entry->question}</h3>
{elseif $entry->type == 'p'}
{elseif $entry->type == 'b'}{else}
	<p>{$entry->num}) {$entry->question}<br />
	{if $entry->skipped==1}
	<span class="quiz_skipped">{$title_skipped}</span><br />
	{else}
	<span class="{if $entry->correct == 1}quiz_correct{else}quiz_incorrect{/if}">{$title_your_answer}: {$entry->givenanswer}<br />
	{/if}
	{if $entry->correct == 1}{$title_correct}{else}
	{$title_correct_answer}: {$entry->correctanswer}
	{/if}
	</span>
	</p>
{/if}
{/if}
{/foreach}