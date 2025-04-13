<?php /* Smarty version 2.6.25, created on 2014-01-13 16:28:10
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/22f6a3cda986661d42fbf3bf14a8e24f^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '83039a781339bafa2fd6c5e62713f976';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_83039a781339bafa2fd6c5e62713f976_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('83039a781339bafa2fd6c5e62713f976','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_83039a781339bafa2fd6c5e62713f976_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('83039a781339bafa2fd6c5e62713f976','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_83039a781339bafa2fd6c5e62713f976_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('83039a781339bafa2fd6c5e62713f976','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
