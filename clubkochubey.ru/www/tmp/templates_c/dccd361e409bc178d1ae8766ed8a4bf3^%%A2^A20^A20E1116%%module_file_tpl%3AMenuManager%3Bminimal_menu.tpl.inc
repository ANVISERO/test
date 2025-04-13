<?php /* Smarty version 2.6.25, created on 2014-01-14 02:46:14
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/dccd361e409bc178d1ae8766ed8a4bf3^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '2ee4e381a1dc5dc77227ddc2054485a6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_2ee4e381a1dc5dc77227ddc2054485a6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2ee4e381a1dc5dc77227ddc2054485a6','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_2ee4e381a1dc5dc77227ddc2054485a6_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2ee4e381a1dc5dc77227ddc2054485a6','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_2ee4e381a1dc5dc77227ddc2054485a6_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2ee4e381a1dc5dc77227ddc2054485a6','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
