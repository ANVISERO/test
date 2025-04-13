{if $message!=""}<h3>{$message}</h3>{/if}
{if $tab_message!=""}<h3>{$tab_message}</h3>{/if}

{$tabheaders}
{$start_quiztab}
{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$column_name}</th>
			<th>{$column_desc}</th>
			<th>{$column_qcount}</th>
			<th>{$column_embed}</th>
			<th>{$column_export}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
			<td>{$entry->name}</td>
			<td>{$entry->desc}</td>
			<td>{$entry->qcount}</td>
			<td>&#123;cms_module module='Quizzard' quiz_id='{$entry->id}'&#125;</td>
			<td>{$entry->browse} | {$entry->manage} | {$entry->export}</td>
			<td>{$entry->editlink}</td>
			<td>{$entry->deletelink}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>{$noquizzes}</p>
{/if}
<div class="pageoptions">
	<p class="pageoptions">{$addlink}</p>
</div>
{$end_tab}
{$start_extratab}
	{$start_extraform}
	<div class="pageoverflow">
	    <p class="pageinput">{$title_extrafields}</p>
	</div>
	<table cellspacing="0" class="pagetable">
		<thead>
			<tr>
				<th>{$title_field_name}</th>
				<th>{$title_field_type}</th>
				<th>{$title_field_display_len}</th>
				<th>{$title_field_max_len}</th>
				<th>{$title_field_weight}</th>
				<th>{$title_field_del}</th>
			</tr>
		</thead>
		<tbody>
	{foreach from=$extras item=entry}
		<tr>
	        <td>{$entry.input_name}</td>
	        <td>{$entry.input_type}</td>
			<td>{$entry.input_display_len}</td>
			<td>{$entry.input_max_len}</td>
	        <td>{$entry.input_weight}</td>
			<td>{$entry.input_del}</td>
		</tr>
	{/foreach}
	</tbody></table>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$submit}</p>
	</div>
	{$end_form}
{$end_tab}
{$start_thresholdtab}
	{$start_thresholdform}
	<div class="pageoverflow">
        <p class="pagetext">{$title_score_threshold}</p>
        <p class="pageinput">{$input_score_threshold}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_threshold_single_page}</p>
        <p class="pageinput">{$input_threshold_single_page}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_question_wrong}</p>
        <p class="pageinput">{$input_question_wrong}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_threshold_message}</p>
        <p class="pageinput">{$input_threshold_message}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$submit}</p>
	</div>
	{$end_form}
{$end_tab}
{$start_importtab}
	{$start_uploadform}
	<div class="pageoverflow">
        <p class="pagetext">{$title_file_to_upload}</p>
        <p class="pageinput">{$input_file_to_upload} {$title_file_to_upload_help}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$import}</p>
	</div>
	{$end_form}
{$end_tab}
{$start_templateform}
{$start_quiztemplatetab}
	<div class="pageoverflow">
        <p class="pagetext">{$title_quiz_template}</p>
        <p class="pageinput">{$input_quiz_template}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_signup_template}</p>
        <p class="pageinput">{$input_signup_template}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$submittemplates}</p>
	</div>
{$end_tab}
{$start_emailtemplatetab}
	<div class="pageoverflow">
        <p class="pagetext">{$title_email_template}</p>
        <p class="pageinput">{$input_email_template}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_html_email}</p>
        <p class="pageinput">{$input_html_email}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$submittemplates}</p>
	</div>
{$end_tab}
{$start_scoretemplatetab}
	<div class="pageoverflow">
        <p class="pagetext">{$title_score_template}</p>
        <p class="pageinput">{$input_score_template}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$submittemplates}</p>
	</div>
{$end_tab}
{$end_form}
{$start_configform}
{$start_emailconfigtab}
	<div class="pageoverflow">
        <p class="pagetext">{$title_send_email}</p>
        <p class="pageinput">{$input_send_email}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_send_to}</p>
        <p class="pageinput">{$input_send_to}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_email_subject}</p>
        <p class="pageinput">{$input_email_subject}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_email_fromname}</p>
        <p class="pageinput">{$input_email_fromname}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_email_from}</p>
        <p class="pageinput">{$input_email_from}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$submit}</p>
	</div>
{$end_tab}
{$start_charactertab}
{literal}
<script type="text/javascript">
	function all_chars()
		{
		setChecks(true);
		}
	function no_chars()
		{
		setChecks(false);
		}
	function setChecks(val)
		{
		for (i=0;i<{/literal}{$accentlen}{literal};i++)
			{
			cbx = document.getElementById('ac'+i);
			if (cbx)
				{
				if (val)
					{
					cbx.checked = 1;
					}
				else
					{
					cbx.checked = 0;
					}
				}
			}

		}
</script>
{/literal}
	<div class="pageoverflow">
        <p class="pagetext">{$title_show_palette}</p>
        <p class="pageinput">{$input_show_palette}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_palette_chars}</p>
        <p class="pageinput">
        	<a href="javascript:all_chars()">{$title_select_all}</a><br />
        	<a href="javascript:no_chars()">{$title_select_none}</a><br />
        {$input_palette_chars}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$submit}</p>
	</div>
{$end_tab}
{$start_configtab}
	<fieldset>
	<p>{$title_pagination_help}</p>
	<div class="pageoverflow">
        <p class="pagetext">{$title_pagination}</p>
        <p class="pageinput">{$input_pagination}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_default_questions}</p>
        <p class="pageinput">{$input_default_questions}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_show_pagenav}</p>
        <p class="pageinput">{$input_show_pagenav}</p>
	</div>
	</fieldset>
	<div class="pageoverflow">
        <p class="pagetext">{$title_max_answers}</p>
        <p class="pageinput">{$input_max_answers}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_quiz_inline}</p>
        <p class="pageinput">{$input_quiz_inline}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_smarty_process_pages}</p>
        <p class="pageinput">{$input_smarty_process_pages}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_save_button}</p>
        <p class="pageinput">{$input_save_button}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_require_user}</p>
        <p class="pageinput">{$input_require_user}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_questions_case_sensitive}</p>
        <p class="pageinput">{$input_questions_case_sensitive}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_fillin_len}</p>
        <p class="pageinput">{$input_fillin_len}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_renumber_by_section}</p>
        <p class="pageinput">{$input_renumber_by_section}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext">{$title_wysiwyg_questions}</p>
        <p class="pageinput">{$input_wysiwyg_questions}</p>
	</div>
	<div class="pageoverflow">
        <p class="pagetext"></p>
        <p class="pageinput">{$submit}</p>
	</div>
{$end_tab}
{$end_form}
{$end_tabs}