<?php
$lang['description'] = 'The comments module allows visitors to leave comments on your website.';
$lang['addacomment'] = 'コメントの追加';
$lang['active'] = 'Active';
$lang['cancel'] = 'キャンセル';
$lang['edit'] = '編集';
$lang['comment_updated'] = 'The comment was successfully updated.';
$lang['delete'] = '削除';
$lang['comment_deleted'] = 'The comment was successfully deleted.';
$lang['comments_deleted'] = 'The comments were successfully deleted.';
$lang['areyousure'] = 'Delete comment?';
$lang['comment'] = 'コメント';
$lang['error'] = 'エラー';
$lang['errorenterauthor'] = '作者を入力して下さい';
$lang['errorentercomment'] = 'コメントを入力して下さい';
$lang['errorenteremail'] = 'Incorrect email format';
$lang['errorenterwebsite'] = 'Incorrect URL format';
$lang['wrongcode'] = 'Code entered incorrectly.  Try again.';
$lang['submit'] = '送信';
$lang['yourname'] = 'あなたの名前';
$lang['needpermission'] = 'You need the \'%s\' permission to perform that function.';
$lang['entercode'] = 'Code in the picture';
$lang['continue_back'] = 'Continue Back to Page';
$lang['comment_awaiting_approval'] = 'Your comment has been received and is awaiting approval';
$lang['sysdefaults'] = 'Restore to defaults';
$lang['restoretodefaultsmsg'] = 'This operation will restore the template contents to their system defaults.  Are you sure you want to procede?';
$lang['comments'] = 'Comments';
$lang['list_template'] = 'Comment Display Template';
$lang['list_template_updated'] = 'The Comment Display Template was successfully updated.';
$lang['submit_template'] = 'Submit Form Template';
$lang['submit_template_updated'] = 'The Submit Form Template was successfully updated.';
$lang['options'] = 'Options';
$lang['options_updated'] = 'The options were successfully saved.';
$lang['nocommentsfound'] = 'No comments found';
$lang['help_akismet_check'] = '<b>Check for Spam</b> - Check this box to use Akismet module to detect spam. <b>Note: Using this feature requires that the CMSakismet module be installed.</b>';
$lang['author'] = 'Author';
$lang['comment_title'] = 'タイトル';
$lang['data'] = 'コメント';
$lang['email'] = 'メールアドレス';
$lang['modulename'] = 'Module Name';
$lang['website'] = 'Webサイト';
$lang['pageid'] = 'ページ';
$lang['postdate'] = '投稿日';
$lang['createdate'] = '作成日';
$lang['modifydate'] = '更新日';
$lang['delselected'] = 'Delete Selected';
$lang['notifysubj'] = 'Comment on \'%s\'! ';
$lang['notifymsg'] = 'A new comment has been posted on page \'%s\'. ';
$lang['postinstall'] = 'Don\'t forget to:<br />
  1) Make sure to set the <b>\'Manage Comments\' permission</b> on users who will be administering comments;<br />
  2) Install and configure the <b>CMSMailer module</b> to support mailing functionality.';
$lang['helpnumber'] = '表示できる項目の最大数の値 -- 空欄の場合は全項目を表示';
$lang['helpdateformat'] = 'Date/Time format using parameters from php\'s date function.  See
	<a href="http://php.net/date" target="_blank">here</a> for a parameter list and information.';
$lang['helplocaledateformat'] = '<p>You can use this with the lang parameter to get localized dates and <a href="http://us2.php.net/strftime" target="_blank">strftime</a> date formats will be used instead, for example:</p><p><b>English Dates (example output: Thursday, July 19, 2007, 07:51 AM)</b></p><pre>{cms_module module=\'comments\' localedateformat=\'%B %d, %Y, %I:%M %p\' lang=\'en_US\'}</pre><p><b>French Dates (example output: jeudi, juillet 19, 2007, 07:51)</b></p><pre>{cms_module module=\'comments\' localedateformat=\'%B %d, %Y, %I:%M %p\' lang=\'fr_FR\'}</pre>';
$lang['localedateformat_error'] = 'Error: Calling setlocale to set time format did not work because locale functionality is not implemented on your platform, the specified locale does not exist, or the category name is invalid.';
$lang['helpnotify'] = '<b>Notify</b> - email address for new comment notifications.  If not specified, notifications will not be sent.';
$lang['edit_comment'] = 'コメントの編集';
$lang['helpmoderate'] = '<b>Moderate</b> - Inactivate new comments.  They must then be set as active by an admin before being displayed on the site.';
$lang['comment_moderation_enabled'] = 'Important: Comment moderation is enabled. You will need to activate this comment before it will show up on your page.';
$lang['helpspamprotect'] = '<b>Spam Protectection</b> - Protect comments from spam. Check this box to use the Captcha module to help prevent automated comment spam. <b>Using this feature requires that the Captcha module be installed.</b>';
$lang['help_disable_html'] = '<b>HTMLを非表示</b> - コメント内のHTMLを非表示にする。';
$lang['help'] = '	<h3>何ができるのでしょうか?</h3>
	<p>コメントモジュールはタグモジュールです。訪問者が各ページにコメントを載せることができます。実用例では、ページへの追加コメントや情報を掲載するのにも便利です。</p>
	<h3>使用方法</h3>
	<p>コメントは単なるタグモジュールです。cms_moduleタグを利用して、ページやテンプレートで使うことができます。使用例: <code>{cms_module module="comments"}</code></p>';
$lang['utma'] = '156861353.1193756969.1199698276.1213318721.1213322938.6';
$lang['utmz'] = '156861353.1213322938.6.4.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>