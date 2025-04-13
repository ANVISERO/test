<?php /* Smarty version 2.6.25, created on 2014-01-13 15:53:18
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/7a7ecdfa24e0774263831fbc780ce698^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'da4241891e10d58830d6db932e84b16d';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_da4241891e10d58830d6db932e84b16d_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('da4241891e10d58830d6db932e84b16d','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_da4241891e10d58830d6db932e84b16d_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('da4241891e10d58830d6db932e84b16d','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_da4241891e10d58830d6db932e84b16d_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('da4241891e10d58830d6db932e84b16d','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
