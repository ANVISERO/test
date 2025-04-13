<?php /* Smarty version 2.6.25, created on 2012-06-11 00:35:42
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/1211ac0f51ecb304dfe5fa5b43f311c6^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '2450de868c302bfbe9c72c615b9785b1';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_2450de868c302bfbe9c72c615b9785b1_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2450de868c302bfbe9c72c615b9785b1','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_2450de868c302bfbe9c72c615b9785b1_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2450de868c302bfbe9c72c615b9785b1','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_2450de868c302bfbe9c72c615b9785b1_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2450de868c302bfbe9c72c615b9785b1','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
