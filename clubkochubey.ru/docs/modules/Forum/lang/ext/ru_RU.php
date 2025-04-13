<?php
$lang['topic_post_views_label'] = 'Просмотров';
$lang['post_edit_label'] = 'Редактировать сообщение';
$lang['last_edit'] = 'Последнее редактирование:';
$lang['topic_sticky'] = 'Тема прилеплена';
$lang['topic'] = 'Тема';
$lang['started_by'] = 'Начата:';
$lang['forum'] = 'Форум';
$lang['topic_reset'] = 'Сбросить тему';
$lang['topic_delete_label'] = 'Удалить тему';
$lang['topic_delete_warning'] = 'Вы уверены, что Вы хотите удалить этот пост?';
$lang['topic_pagelimit_label'] = 'Лимит страниц для этого форума';
$lang['post_pagelimit_label'] = 'Лимит страниц для этой темы';
$lang['help_property_feu'] = 'Показ свойств модуля FEU. Если этот параметр не задан - значение по умолчанию имя входящего в систему';
$lang['help_topic_pagelimit'] = 'Максимальное число тем для отображения (на странице) в странице Форума. Если этот параметр не будет задан, то все соответствующие темы будут отображены. Если он будет задан, и имеется больше тем, чем доступно в указанном параметре, то будет расставлен текст и ссылки, чтобы позволить просматривать результаты';
$lang['help_post_pagelimit'] = 'Максимальное число постов для отображения (на странице) в странице темы. Если этот параметр не будет задан, то все соответствующие посты будут отображены. Если он будет задан, и имеется больше постов, чем доступно в указанном параметре, то будет расставлен текст и ссылки, чтобы позволить просматривать результаты';
$lang['firstpage'] = '<<';
$lang['prevpage'] = '<';
$lang['nextpage'] = '>';
$lang['lastpage'] = '>>';
$lang['prompt_page'] = 'Страница';
$lang['prompt_of'] = 'из';
$lang['forum_access'] = 'Доступ запрещён. Это приватный форум';
$lang['toolbar_textcolor'] = 'Изменить цвет&nbsp;';
$lang['date_time_format'] = 'M j Y, G:i';
$lang['denied_message'] = 'Доступ запрещён. Пожалуйста проверьте ваши права.';
$lang['error_title'] = 'Ошибка!';
$lang['upgraded'] = 'Модуль обновлён до версии %s.';
$lang['tab_defaultadmin'] = 'Список форумов';
$lang['tab_create_forum'] = 'Создать форум';
$lang['tab_settings'] = 'Настройки';
$lang['forum_name_label'] = 'Имя форума';
$lang['forum_description_label'] = 'Описание форума';
$lang['forum_topic_count_label'] = 'Темы';
$lang['forum_empty'] = 'На этом форуме нет никаких тем.';
$lang['topic_subject_label'] = 'Тема';
$lang['topic_post_count_label'] = 'Сообщений';
$lang['topic_last_post_label'] = 'Последнее сообщение';
$lang['post_body_label'] = 'Сообщение';
$lang['new_topic_label'] = 'Новая тема';
$lang['new_forum_label'] = 'Новый форум';
$lang['topic_reply_label'] = 'Ответ';
$lang['topic_closed'] = 'Тема закрыта';
$lang['topic_review_label'] = 'Обзор темы';
$lang['forum_index'] = 'Индекс';
$lang['create_forum_submit'] = 'Создать форум';
$lang['post_delete_label'] = 'Удалить сообщение';
$lang['post_delete_warning'] = 'Вы действительно хотите удалить этот пост?';
$lang['post_submit'] = 'Сообщение';
$lang['settings_submit'] = 'Сохранить';
$lang['guest_user_name'] = '[гость]';
$lang['forum_delete_warning'] = 'Вы уверены, что хотите удалить эту форму, темы и все посты?';
$lang['forum_created_message'] = 'Форум создан';
$lang['forum_deleted_message'] = 'Форум удалён';
$lang['delete'] = 'Удалить';
$lang['edit'] = 'Редактировать';
$lang['cancel'] = 'Отмена';
$lang['settings_saved_message'] = 'Настройки сохранены';
$lang['allow_guest_label'] = 'Разрешить гостям писать сообщения';
$lang['member_group_label'] = 'Члены';
$lang['moderator_group_label'] = 'Модераторы';
$lang['friendlyname'] = 'Форум Made Simple';
$lang['postinstall'] = 'Не забудьте установить права "Modify Forum" на использование доступа в панель администратора.';
$lang['postuninstall'] = '';
$lang['really_uninstall'] = 'Это позволит удалить все форумы, темы и сообщения. Вы уверены?';
$lang['uninstalled'] = 'Модуль удалён.';
$lang['installed'] = 'Модуль версии %s установлен.';
$lang['moddescription'] = 'Этот модуль предоставляет простую доску сообщений с множественными нитями форумов.';
$lang['welcome_text'] = '';
$lang['changelog'] = '<ul>
  <li>Version 0.9.0 Alpha - Bugfix: user guest can edit post of guest, encoding in topic title/post body, if missing topic title is missing link also; Improved: bbcode with center and color, substitute htmlspecialchars with cms_htmlentities, rel="nofollow" for post link; (alby)</li>
  <li>Version 0.8 Alpha - Added: pagination for topics and posts, property_feu param; Modify: module action; Bugfix: prettyurl; Improved: support 1.1 series; (alby)</li>
  <li>Version 0.7 Alpha - Added: reset topic; Modify: parser bbcode; Replaced: forum icons; Bugfix: delete post, delete topic, sticky, closed; (alby)</li>
  <li>Version 0.6 Alpha - Added: views, edit post, bbcode toolbar to textarea; Modify: last modify, prettyurl; Improved: flexibility in templates; (alby)</li>
  <li>Version 0.5 Alpha - fixed module name case bug (tamlyn), fixed bbcode bug, added modify/delete forums, added some classes to templates, improved search (markr)</li>
  <li>Version 0.4 Alpha - basic bbcode (tamlyn), pretty urls, search, other things (markr)</li>
  <li>Version 0.3 Alpha - added delete post for moderators (markr)</li>
  <li>Version 0.2 Alpha - added basic user auth</li>
  <li>Version 0.1 Alpha - initial release</li>
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This <strike>is</strike><sup>will be</sup> a simple message board with multiple threaded forums.</p>

<h3>How Do I Use It</h3>
<p>Admin users need the "Modify Forum" permission in order to access the admin panel.
From here one may create new forums, manage existing ones and change global settings.</p>
<p>Insert the forum in the front end with {cms_module module="Forum"}</p>

<h3>BBCode</h3>
<p>You may use BBCode in your posts but the parser is currently very basic and
requires that your BBCode syntax be correct.</p>

<h3>Support</h3>
<p>For the latest version of this module or to file a bug report please visit the
module homepage at the <a href="http://dev.cmsmadesimple.org/projects/forummadesimple/">CMS Forge</a>.</p>
<p>Discussion of this module can also be found in
<a href="http://forum.cmsmadesimple.org/index.php/topic,7300.0.html">this forum thread</a>.</p>

<h3>Copyright and License</h3>
<p>Copyright © 2006-7, Tamlyn Rhodes <<a href="mailto:http://tamlyn.org">tamlyn.org</a>>.
Some Rights Reserved.</p>
<p>This module has been released under the
<a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>.
You must agree to this license before using the module.</p>
';
$lang['utmz'] = '156861353.1199273691.20.7.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/forum/forum.php|utmcmd=referral';
$lang['utma'] = '156861353.1045566600.1193164440.1199638191.1199672608.36';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>