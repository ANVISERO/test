<?php /* Smarty version 2.6.25, created on 2014-01-14 02:24:43
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/952b755e7db16e37d2163abf52c3721c^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '9105f4d135460d79b6356ef1a19d1bf7';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_9105f4d135460d79b6356ef1a19d1bf7_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9105f4d135460d79b6356ef1a19d1bf7','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_9105f4d135460d79b6356ef1a19d1bf7_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9105f4d135460d79b6356ef1a19d1bf7','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_9105f4d135460d79b6356ef1a19d1bf7_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9105f4d135460d79b6356ef1a19d1bf7','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
