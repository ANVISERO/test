<?php /* Smarty version 2.6.25, created on 2014-01-15 09:13:56
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/629fb6a977af14e884f89793275c3713^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '6be227ccfd76fd7c22e62be1722a8e7c';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_6be227ccfd76fd7c22e62be1722a8e7c_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6be227ccfd76fd7c22e62be1722a8e7c','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_6be227ccfd76fd7c22e62be1722a8e7c_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6be227ccfd76fd7c22e62be1722a8e7c','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_6be227ccfd76fd7c22e62be1722a8e7c_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6be227ccfd76fd7c22e62be1722a8e7c','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
