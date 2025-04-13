<?php /* Smarty version 2.6.25, created on 2013-03-07 11:32:28
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/b2b6f69c2289ce78d330eb64d19bf2c8^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '05a07ebbef6be0a0cb2b775f63d3c414';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_05a07ebbef6be0a0cb2b775f63d3c414_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('05a07ebbef6be0a0cb2b775f63d3c414','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_05a07ebbef6be0a0cb2b775f63d3c414_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('05a07ebbef6be0a0cb2b775f63d3c414','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_05a07ebbef6be0a0cb2b775f63d3c414_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('05a07ebbef6be0a0cb2b775f63d3c414','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
