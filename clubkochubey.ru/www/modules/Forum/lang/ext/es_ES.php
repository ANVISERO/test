<?php
$lang['topic_post_views_label'] = 'Views';
$lang['post_edit_label'] = 'Editar post';
$lang['last_edit'] = 'Modificado: ';
$lang['topic_sticky'] = 'Tema persistente';
$lang['topic'] = 'Tema';
$lang['started_by'] = 'Iniciado por:';
$lang['forum'] = 'Foro';
$lang['topic_reset'] = 'Topic reset';
$lang['topic_delete_label'] = 'Borrar tema';
$lang['topic_delete_warning'] = 'Est&aacute; seguro de querer borrar este post?';
$lang['topic_pagelimit_label'] = 'Page limit for Forum page';
$lang['post_pagelimit_label'] = 'Page limit for Topic page';
$lang['help_property_feu'] = 'Display property of FEU module. If this parameter is not supplied default is login name';
$lang['help_topic_pagelimit'] = 'Maximum number of topics to display (per page) in Forum page. If this parameter is not supplied all matching topics will be displayed. If it is, and there are more topics available than specified in the parameter, text and links will be supplied to allow scrolling through the results';
$lang['help_post_pagelimit'] = 'Maximum number of posts to display (per page) in Topic page. If this parameter is not supplied all matching posts will be displayed. If it is, and there are more posts available than specified in the parameter, text and links will be supplied to allow scrolling through the results';
$lang['firstpage'] = '<<';
$lang['prevpage'] = '<';
$lang['nextpage'] = '>';
$lang['lastpage'] = '>>';
$lang['prompt_page'] = 'Pagina';
$lang['prompt_of'] = 'de';
$lang['forum_access'] = 'Acceso denegado. Este foro es privado.';
$lang['toolbar_textcolor'] = 'Cambiar color &nbsp;';
$lang['date_time_format'] = 'M j Y, G:i';
$lang['denied_message'] = 'Acceso denegado. Por favor revise sus permisos.';
$lang['error_title'] = 'Error!';
$lang['upgraded'] = 'Modulo actualizado a la versi&oacute;n %s.';
$lang['tab_defaultadmin'] = 'Listar Foros';
$lang['tab_create_forum'] = 'Crear Foro';
$lang['tab_settings'] = 'Ajustes';
$lang['forum_name_label'] = 'Nombre del Foro';
$lang['forum_description_label'] = 'Descripci&oacute;n del Foro';
$lang['forum_topic_count_label'] = 'Temas';
$lang['forum_empty'] = 'No hay temas en este foro.';
$lang['topic_subject_label'] = 'Tema del foro';
$lang['topic_post_count_label'] = 'Posts';
$lang['topic_last_post_label'] = 'Last post';
$lang['post_body_label'] = 'Mensaje';
$lang['new_topic_label'] = 'Nuevo asunto';
$lang['new_forum_label'] = 'Nuevo foro';
$lang['topic_reply_label'] = 'Responder';
$lang['topic_closed'] = 'Asunto cerrado';
$lang['topic_review_label'] = 'Revisi&oacute;n del asunto';
$lang['forum_index'] = 'Indice';
$lang['create_forum_submit'] = 'Crear foro';
$lang['post_delete_label'] = 'Borrar post';
$lang['post_delete_warning'] = 'Are you sure you want to delete this post?';
$lang['post_submit'] = 'Post';
$lang['settings_submit'] = 'Guardar';
$lang['guest_user_name'] = '[invitado]';
$lang['forum_delete_warning'] = 'Are you sure you want to delete this form, topics and all posts?';
$lang['forum_created_message'] = 'Foro creado';
$lang['forum_deleted_message'] = 'Foro eliminado';
$lang['delete'] = 'Eliminar';
$lang['edit'] = 'Editar';
$lang['cancel'] = 'Cancelar';
$lang['settings_saved_message'] = 'Ajustes guardados';
$lang['allow_guest_label'] = 'Permitir posts de invitados';
$lang['member_group_label'] = 'Miembros';
$lang['moderator_group_label'] = 'Moderadores';
$lang['friendlyname'] = 'Foro Simplificado';
$lang['postinstall'] = 'Be sure to set &quot;Modify Forum&quot; permission to use access the admin panel.';
$lang['postuninstall'] = '';
$lang['really_uninstall'] = 'This will delete all forums, topics and posts. Are you sure?';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['moddescription'] = 'This module provides a simple message board with multiple threaded forums.';
$lang['welcome_text'] = '';
$lang['changelog'] = '<ul>
  <li>Version 0.9.0 Alpha - Bugfix: user guest can edit post of guest, encoding in topic title/post body, if missing topic title is missing link also; Improved: bbcode with center and color, substitute htmlspecialchars with cms_htmlentities, rel=&quot;nofollow&quot; for post link; (alby)</li>
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
<p>Admin users need the &quot;Modify Forum&quot; permission in order to access the admin panel.
From here one may create new forums, manage existing ones and change global settings.</p>
<p>Insert the forum in the front end with {cms_module module=&quot;Forum&quot;}</p>

<h3>BBCode</h3>
<p>You may use BBCode in your posts but the parser is currently very basic and
requires that your BBCode syntax be correct.</p>

<h3>Support</h3>
<p>For the latest version of this module or to file a bug report please visit the
module homepage at the <a href=&quot;http://dev.cmsmadesimple.org/projects/forummadesimple/&quot;>CMS Forge</a>.</p>
<p>Discussion of this module can also be found in
<a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,7300.0.html&quot;>this forum thread</a>.</p>

<h3>Copyright and License</h3>
<p>Copyright &copy; 2006-7, Tamlyn Rhodes <<a href=&quot;mailto:http://tamlyn.org&quot;>tamlyn.org</a>>.
Some Rights Reserved.</p>
<p>This module has been released under the
<a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>.
You must agree to this license before using the module.</p>
';
$lang['utma'] = '156861353.1283190177.1192572809.1198949935.1199260109.274';
$lang['utmz'] = '156861353.1199260109.274.65.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/forum/forum.php|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>