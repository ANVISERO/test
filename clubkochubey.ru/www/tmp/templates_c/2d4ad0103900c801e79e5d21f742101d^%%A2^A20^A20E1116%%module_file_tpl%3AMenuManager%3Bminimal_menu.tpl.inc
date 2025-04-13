<?php /* Smarty version 2.6.25, created on 2014-01-14 02:25:21
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/2d4ad0103900c801e79e5d21f742101d^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'c912c8ec80f67eb050842e754fc0802b';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_c912c8ec80f67eb050842e754fc0802b_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c912c8ec80f67eb050842e754fc0802b','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_c912c8ec80f67eb050842e754fc0802b_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c912c8ec80f67eb050842e754fc0802b','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_c912c8ec80f67eb050842e754fc0802b_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c912c8ec80f67eb050842e754fc0802b','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
