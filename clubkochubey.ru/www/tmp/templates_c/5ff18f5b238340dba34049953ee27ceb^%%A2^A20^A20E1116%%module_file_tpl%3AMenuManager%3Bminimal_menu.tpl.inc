<?php /* Smarty version 2.6.25, created on 2014-01-13 16:28:40
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/5ff18f5b238340dba34049953ee27ceb^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '7b4c79cbc217cba674776df5a41b4e5e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_7b4c79cbc217cba674776df5a41b4e5e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7b4c79cbc217cba674776df5a41b4e5e','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_7b4c79cbc217cba674776df5a41b4e5e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7b4c79cbc217cba674776df5a41b4e5e','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_7b4c79cbc217cba674776df5a41b4e5e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7b4c79cbc217cba674776df5a41b4e5e','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
