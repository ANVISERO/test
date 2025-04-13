<?php /* Smarty version 2.6.25, created on 2014-01-15 01:44:27
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/fe73f3086d173e43723a144e35826006^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'e71e72a9c46f27af630a4fa692e4b6b0';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_e71e72a9c46f27af630a4fa692e4b6b0_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e71e72a9c46f27af630a4fa692e4b6b0','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e71e72a9c46f27af630a4fa692e4b6b0_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e71e72a9c46f27af630a4fa692e4b6b0','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e71e72a9c46f27af630a4fa692e4b6b0_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e71e72a9c46f27af630a4fa692e4b6b0','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
