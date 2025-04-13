<p><b>{$fms->Lang('settings_comment')}</b></p>

{$form_start}
	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('enable_report_moderators_label')}:</p>
		<p class="pageinput">{$enable_report_moderators_input} {$fms->Lang('check_cmsmailer')}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('topic_pagelimit_label')}:</p>
		<p class="pageinput">{$topic_pagelimit_input}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('post_pagelimit_label')}:</p>
		<p class="pageinput">{$post_pagelimit_input}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('avatar_property_name_label')}:</p>
		<p class="pageinput">{$avatar_property_name_input}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('ranking_label')}:</p>
		<p class="pageinput">{$ranking_input}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('bbcode_label')}:</p>
		<p class="pageinput">{$bbcode_input}</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('captcha_label')}:</p>
		<p class="pageinput">{$captcha_input}{$captcha_comment}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('akismet_label')}:</p>
		<p class="pageinput">{$akismet_input}{$akismet_comment}</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$fms->Lang('forumpage_label')}:</p>
		<p class="pageinput">{$forumpage_input}</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$form_submit}</p>
	</div>
{$form_end}
