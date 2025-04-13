<?php /* Smarty version 2.6.25, created on 2014-01-13 14:56:20
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/49d11b7f4599f02b74293846a0526f6e^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '6d199338b9c975f5b260e9e0ef39df55';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_6d199338b9c975f5b260e9e0ef39df55_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6d199338b9c975f5b260e9e0ef39df55','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_6d199338b9c975f5b260e9e0ef39df55_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6d199338b9c975f5b260e9e0ef39df55','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_6d199338b9c975f5b260e9e0ef39df55_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6d199338b9c975f5b260e9e0ef39df55','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
